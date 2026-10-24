<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Exception;

class LaporanController extends Controller
{
    /**
     * Menampilkan Dashboard Siswa secara dinamis
     */
    public function dashboardSiswa()
    {
        $userId = Auth::id() ?? 1;

        // Hitung statistik laporan milik siswa berdasarkan id_status di database
        $totalLaporan   = Laporan::where('id_user', $userId)->count();
        $laporanPending  = Laporan::where('id_user', $userId)->where('id_status', 1)->count(); // ID 1 = Pending
        $laporanDiproses = Laporan::where('id_user', $userId)->where('id_status', 2)->count(); // ID 2 = Diproses
        $laporanSelesai  = Laporan::where('id_user', $userId)->where('id_status', 3)->count(); // ID 3 = Selesai
        $laporanDitolak  = Laporan::where('id_user', $userId)->where('id_status', 4)->count(); // ID 4 = Ditolak

        // Ambil daftar laporan terbaru milik siswa
        $laporans = Laporan::with(['kategori', 'status'])
            ->where('id_user', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard_siswa', compact(
            'totalLaporan',
            'laporanPending',
            'laporanDiproses',
            'laporanSelesai',
            'laporanDitolak',
            'laporans' 
        ));
    }

    /**
     * Menampilkan halaman Riwayat Laporan milik siswa yang login secara dinamis
     */
    public function riwayat(Request $request)
    {
        $userId = Auth::id() ?? 1;

        // Query dasar laporan milik user yang sedang login
        $query = Laporan::with(['kategori', 'status'])
            ->where('id_user', $userId)
            ->orderBy('created_at', 'desc');

        // Fitur pencarian server-side (opsional jika mencari via request HTTP)
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_laporan', 'like', "%{$search}%")
                  ->orWhere('isi_laporan', 'like', "%{$search}%");
            });
        }

        $laporans = $query->get();

        return view('riwayat_laporan', compact('laporans'));
    }

    /**
     * Menampilkan halaman Form Buat Laporan beserta daftar kategori dinamis
     */
    public function create()
    {
        // Ambil semua data kategori untuk isi dropdown di Blade
        $kategoris = Kategori::all();
        return view('buat_laporan', compact('kategoris'));
    }

    /**
     * Menampilkan halaman Konfirmasi Laporan
     */
    public function konfirmasi(Request $request, $id = null)
    {
        // Cari laporan berdasarkan ID (jika ada) - Sesuaikan primary key 'id_laporan'
        $laporan = null;
        if ($id) {
            $laporan = Laporan::where('id_laporan', $id)->first();
        }

        return view('konfirmasi_laporan', compact('laporan'));
    }

    /**
     * Menyimpan laporan baru dari form Blade dengan Database Transaction & Local Storage
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form Sesuai Nama 'name="..."' di buat_laporan.blade.php
        $validated = $request->validate([
            'judul_laporan'    => 'required|string|max:150',
            'id_kategori'      => 'required',
            'isi_laporan'      => 'required|string',
            'privasi'          => 'required|string',
            'bukti_pendukung' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,webp,mp4,doc,docx',
                'max:15210' // Maksimal 15 MB
            ],
        ], [
            'judul_laporan.required' => 'Judul laporan wajib diisi.',
            'judul_laporan.max'      => 'Judul laporan maksimal 150 karakter.',
            'id_kategori.required'   => 'Kategori laporan wajib dipilih.',
            'isi_laporan.required'   => 'Isi laporan wajib diisi.',
            'privasi.required'       => 'Pilihan privasi wajib dipilih.',
            'bukti_pendukung.mimes'  => 'Format berkas bukti harus JPG, PNG, WEBP, MP4, DOC, atau DOCX.',
            'bukti_pendukung.max'    => 'Ukuran berkas bukti maksimal adalah 5MB.',
        ]);

        // 2. Memulai Database Transaction
        DB::beginTransaction();
        try {
            $buktiUrl = null;

            // 3. Unggah Berkas ke Folder Lokal Public (public/uploads/laporan)
            if ($request->hasFile('bukti_pendukung')) {
                $file = $request->file('bukti_pendukung');

                if ($file && $file->isValid()) {
                    // Buat nama file unik
                    $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

                    // Pindahkan file ke folder public/uploads/laporan
                    $file->move(public_path('uploads/laporan'), $filename);

                    // Simpan path relatif untuk database
                    $buktiUrl = 'uploads/laporan/' . $filename;
                }
            }

            // Konversi nilai privasi ke boolean/integer (anonim = true/1, identitas = false/0)
            $isAnonim = ($request->privasi === 'anonim') ? 1 : 0;

            // 4. Menyimpan Data ke Database
            /** @var \App\Models\User $user */
            $userId = Auth::id() ?? 1;

            $laporan = Laporan::create([
                'id_user'       => $userId,
                'id_kategori'   => $validated['id_kategori'],
                'id_status'     => 1,
                'judul_laporan' => $validated['judul_laporan'],
                'isi_laporan'   => $validated['isi_laporan'],
                'anonim'        => $isAnonim,
                'bukti_url'     => $buktiUrl,
            ]);

            // 5. Commit Transaksi
            DB::commit();

            // Ambil ID laporan berdasarkan primary key 'id_laporan'
            $laporanId = $laporan->id_laporan ?? $laporan->id;

            // Redirect langsung ke halaman konfirmasi dengan membawa ID laporan terbaru
            return redirect()->route('konfirmasi_laporan', ['id' => $laporanId])
                ->with('success', 'Laporan Anda berhasil dikirim!');

        } catch (Exception $e) {
            // 6. Rollback Transaksi jika terjadi kegagalan
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengirim laporan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan Halaman Detail Laporan di Sisi Admin
     */
   
public function showAdmin($id = null)
{
    // Jika ID tersedia, tampilkan detail laporan yang dipilih.
    if ($id) {
        $laporan = Laporan::with([
            'kategori',
            'status',
            'user',
            'tanggapan.user'
        ])->findOrFail($id);

        return view('detail_laporan_admin', compact('laporan'));
    }

    // Jika tidak ada ID, tampilkan daftar laporan admin.
    $laporans = Laporan::with([
        'kategori',
        'status',
        'user',
        'tanggapan.user'
    ])->latest()->get();

    return view('laporan_admin', compact('laporans'));
}

    /**
     * Menampilkan Halaman Rekap Laporan di Sisi Admin secara dinamis dari database
     */
    public function rekapAdmin(Request $request)
    {
        $query = Laporan::with(['kategori', 'status', 'user']);

        // Filter berdasarkan status jika ada pilihan
        if ($request->has('status') && !empty($request->status)) {
            $query->where('id_status', $request->status);
        }

        // Fitur pencarian rekap
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_laporan', 'like', "%{$search}%")
                  ->orWhere('isi_laporan', 'like', "%{$search}%");
            });
        }

        $laporans = $query->orderBy('created_at', 'desc')->get();

        // Statistik ringkasan rekap laporan
        $totalLaporan    = Laporan::count();
        $laporanPending  = Laporan::where('id_status', 1)->count();
        $laporanDiproses = Laporan::where('id_status', 2)->count();
        $laporanSelesai  = Laporan::where('id_status', 3)->count();
        $laporanDitolak  = Laporan::where('id_status', 4)->count();

        return view('rekap_laporan', compact(
            'laporans',
            'totalLaporan',
            'laporanPending',
            'laporanDiproses',
            'laporanSelesai',
            'laporanDitolak'
        ));
    }
}
