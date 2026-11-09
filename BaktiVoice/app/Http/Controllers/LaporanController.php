<?php

namespace App\Http\Controllers;


use App\Models\Laporan;
use App\Models\Kategori;
use App\Models\Notifikasi;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LaporanController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan Dashboard Siswa
     */
    public function dashboardSiswa()
    {
        $userId = Auth::id();

        $totalLaporan = Laporan::where('id_user', $userId)->count();

        $laporanPending = Laporan::where('id_user', $userId)
            ->whereRaw('status::text ILIKE ?', ['pending'])
            ->count();

        $laporanDiproses = Laporan::where('id_user', $userId)
            ->whereRaw('status::text ILIKE ?', ['proses'])
            ->count();

        $laporanSelesai = Laporan::where('id_user', $userId)
            ->whereRaw('status::text ILIKE ?', ['selesai'])
            ->count();

        $laporanDitolak = Laporan::where('id_user', $userId)
            ->whereRaw('status::text ILIKE ?', ['ditolak'])
            ->count();

        $laporans = Laporan::with(['kategori'])
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
     * Menampilkan Riwayat Laporan Siswa
     */
    public function riwayat(Request $request)
    {
        $userId = Auth::id();

        $query = Laporan::with(['kategori'])
            ->where('id_user', $userId)
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi_laporan', 'like', "%{$search}%");
            });
        }

        $laporans = $query->get();

        return view('riwayat_laporan', compact('laporans'));
    }


    /**
     * Menampilkan Form Buat Laporan
     */
    public function create()
    {

        $kategoris = Kategori::all();

        return view('buat_laporan', compact('kategoris'));
    }


    /**
     * Menampilkan Halaman Konfirmasi Laporan
     */
    public function konfirmasi(Request $request, $id = null)
    {

        $laporan = null;

        if ($id) {
            $laporan = Laporan::where('id_laporan', $id)->first();
        }

        return view('konfirmasi_laporan', compact('laporan'));
    }


    /**
     * Menampilkan Detail Laporan Siswa
     */
    public function show($id)
    {
        $laporan = Laporan::with(['kategori', 'user'])
            ->findOrFail($id);

        if (method_exists($this, 'authorize')) {
            try {
                $this->authorize('view', $laporan);
            } catch (\Exception $e) {
                if (
                    $laporan->id_user != Auth::id() &&
                    Auth::user()->role !== 'admin'
                ) {
                    abort(403, 'Akses ditolak.');
                }
            }
        }

        return view('detail_laporan_siswa', compact('laporan'));
    }


    /**
     * Menyimpan Laporan Baru
     * Sekaligus membuat notifikasi untuk Guru BK
     * jika kategori laporan adalah Kesiswaan.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:150',

            'id_kategori' => [
                'required',
                'exists:kategori,id_kategori'
            ],

            'isi_laporan' => 'required|string',

            'privasi' => 'required|string',

            'bukti_pendukung' => [
                'nullable',
                'file',
                'mimes:jpeg,png,jpg,webp,mp4,doc,docx',
                'max:15210'
            ],
        ], [
            'judul.required' => 'Judul laporan wajib diisi.',
            'judul.max' => 'Judul laporan maksimal 150 karakter.',
            'id_kategori.required' => 'Kategori laporan wajib dipilih.',
            'id_kategori.exists' => 'Kategori laporan tidak ditemukan.',
            'isi_laporan.required' => 'Isi laporan wajib diisi.',
            'privasi.required' => 'Pilihan privasi wajib dipilih.',
            'bukti_pendukung.mimes' =>
                'Format berkas bukti harus JPG, PNG, WEBP, MP4, DOC, atau DOCX.',
            'bukti_pendukung.max' =>
                'Ukuran berkas bukti maksimal adalah 15MB.',
        ]);

        $userId = Auth::id();

        // Pastikan pengguna sudah login
        if (!$userId) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        DB::beginTransaction();

        $filePath = null;

        try {

            // 1. Mengambil kategori laporan
            $kategori = Kategori::findOrFail(
                $validated['id_kategori']
            );


            // 2. Menentukan privasi laporan
            $isAnonim = ($request->privasi === 'anonim');


            // 3. Menyimpan file bukti jika tersedia
            if ($request->hasFile('bukti_pendukung')) {

                $file = $request->file('bukti_pendukung');

                if ($file && $file->isValid()) {

                    $folder = public_path('uploads/laporan');

                    if (!is_dir($folder)) {
                        mkdir($folder, 0755, true);
                    }

                    $filename = time() . '_' .
                        preg_replace(
                            '/[^A-Za-z0-9._-]/',
                            '_',
                            $file->getClientOriginalName()
                        );

                    $file->move($folder, $filename);

                    $filePath = 'uploads/laporan/' . $filename;
                }
            }



            // 4. Menyimpan data laporan
            $laporan = Laporan::create([
                'id_user' => $userId,
                'id_kategori' => $validated['id_kategori'],
                'status' => 'pending',
                'judul' => $validated['judul'],
                'isi_laporan' => $validated['isi_laporan'],
                'anonim' => $isAnonim,
            ]);


            // 5. Menyimpan bukti ke tabel bukti_laporan
            if ($filePath) {

                DB::table('bukti_laporan')->insert([
                    'id_laporan' => $laporan->id_laporan,
                    'file_path' => $filePath,
                    'created_at' => now(),
                ]);
            }


            // 6. Memeriksa apakah kategori adalah Kesiswaan
            if (
                strtolower(trim($kategori->nama_kategori))
                === 'kesiswaan'
            ) {

                // Mengambil semua akun Guru BK
                $guruBk = User::where('role', 'guru_bk')->get();

                // Membuat notifikasi untuk setiap Guru BK
                foreach ($guruBk as $guru) {

                    Notifikasi::create([
                        'id_user' => $guru->id_user,
                        'id_laporan' => $laporan->id_laporan,
                        'judul' => 'Laporan Kesiswaan Baru',
                        'pesan' =>
                            'Ada laporan Kesiswaan baru yang perlu diperiksa.',
                        'type' => 'laporan',
                        'is_read' => false,
                    ]);
                }
            }


            // 7. Menyelesaikan transaksi
            DB::commit();


            // 8. Mengarahkan siswa ke halaman konfirmasi
            return redirect()->route(
                'konfirmasi_laporan',
                ['id' => $laporan->id_laporan]
            )->with(
                'success',
                'Laporan Anda berhasil dikirim!'
            );

        } catch (\Throwable $e) {

            // Membatalkan transaksi jika terjadi kesalahan
            DB::rollBack();

            // Menghapus file jika penyimpanan database gagal
            if ($filePath && file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat mengirim laporan: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * Menampilkan Halaman Detail Laporan Admin
     */
    public function showAdmin($id = null)
    {
        if ($id) {

            $laporan = Laporan::with([
                'kategori',
                'user',
                'tanggapan.user'
            ])->findOrFail($id);

            return view('detail_laporan_admin', compact('laporan'));
        }

        $laporans = Laporan::with([
            'kategori',
            'user',
            'tanggapan.user'
        ])->latest()->get();

        return view('laporan_admin', compact('laporans'));
    }


    /**
     * Menampilkan Rekap Laporan Admin
     */
    public function rekapAdmin(Request $request)
    {
        $query = Laporan::with(['kategori', 'user']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi_laporan', 'like', "%{$search}%");
            });
        }

        $laporans = $query
            ->orderBy('created_at', 'desc')
            ->get();


        $totalLaporan = Laporan::count();

        $laporanPending = Laporan::where('status', 'pending')->count();

        $laporanDiproses = Laporan::where('status', 'proses')->count();

        $laporanSelesai = Laporan::where('status', 'selesai')->count();

        $laporanDitolak = Laporan::where('status', 'ditolak')->count();

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
