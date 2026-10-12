<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
class LaporanController extends Controller
{
    /**
     * S2-03 & S2-06: Menyimpan laporan baru dengan Validasi Keamanan & Database Transaction
     */
    public function store(Request $request)
    {
        // 1. Validasi Sisi Server (Standar Keamanan Input & Pencegahan Unrestricted File Upload)
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul'       => 'required|string|max:150',
            'isi_laporan' => 'required|string',
            'anonim'      => 'required|boolean',
            'bukti'       => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048' // Maksimal ukuran 2048 KB (2 Megabyte)
            ],
        ], [
            'kategori_id.required' => 'Kategori laporan wajib dipilih.',
            'kategori_id.exists'   => 'Kategori laporan tidak valid.',
            'judul.required'       => 'Judul laporan wajib diisi.',
            'judul.max'            => 'Judul laporan maksimal 150 karakter.',
            'isi_laporan.required' => 'Isi laporan wajib diisi.',
            'anonim.required'      => 'Status anonim wajib diisi.',
            'bukti.image'          => 'Berkas bukti harus berupa gambar foto yang valid.',
            'bukti.mimes'          => 'Format gambar yang diperbolehkan hanya JPG, JPEG, PNG, atau WEBP.',
            'bukti.max'            => 'Ukuran berkas bukti maksimal adalah 2MB.',
        ]);

        // 2. Memulai Database Transaction (Prinsip ACID untuk Integritas Data)
        DB::beginTransaction();
        try {
            $buktiUrl = null;

            // 3. Proses Unggah Berkas ke Supabase Storage (Bucket: bukti-laporan)
            if ($request->hasFile('bukti')) {
                $file = $request->file('bukti');

                // Membuat nama file unik untuk keamanan
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

                // Mengunggah ke Supabase Storage
                $path = $file->storeAs('', $filename, 'supabase');


                // Mendapatkan URL publik file dari Supabase Storage
                $buktiUrl = Storage::url($path);

            }

            // 4. Menyimpan Data Utama ke Database Supabase PostgreSQL
            $laporan = Laporan::create([
                'user_id' => \Illuminate\Support\Facades\Auth::id(), // Mengambil ID siswa yang sedang aktif login
                'kategori_id' => $validated['kategori_id'],
                'status_id'   => 1, // Status default awal: 'Menunggu'
                'judul'       => $validated['judul'],
                'isi_laporan' => $validated['isi_laporan'],
                'anonim'      => $validated['anonim'],
                'bukti_url'   => $buktiUrl, // Menyimpan metadata URL file
            ]);

            // 5. Commit Transaksi jika seluruh proses berhasil
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Laporan berhasil dikirim dan disimpan ke dalam sistem.',
                'data'    => [
                    'id'          => $laporan->id,
                    'judul'       => $laporan->judul,
                    'kategori_id' => $laporan->kategori_id,
                    'status_id'   => $laporan->status_id,
                    'anonim'      => $laporan->anonim,
                    'bukti_url'   => $laporan->bukti_url,
                    'created_at'  => $laporan->created_at,
                ]
            ], 201);

        } catch (\Exception $e) {
            // 6. Rollback Transaksi jika terjadi kegagalan sistem / penyimpanan
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem saat menyimpan transaksi laporan.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
