<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusLaporan;
use App\Models\Tanggapan;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Notifikasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Statistik mengikuti kategori yang dipilih
        $statistikQuery = Laporan::query();

        if ($request->filled('kategori')) {
            $statistikQuery->where('id_kategori', $request->kategori);
        }

        $totalLaporan  = (clone $statistikQuery)->count();
        $pendingCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['pending'])->count();
        $diprosesCount = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['proses'])->count();
        $selesaiCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['selesai'])->count();
        $ditolakCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['ditolak'])->count();

        // Ambil 5 laporan terbaru sesuai kategori
        $laporanQuery = Laporan::with(['user']);

        if ($request->filled('kategori')) {
            $laporanQuery->where('id_kategori', $request->kategori);
        }

        $laporanTerbaru = $laporanQuery->latest('id_laporan')->take(5)->get();
        $kategoriList = Kategori::all();

        return view('dashboard_admin', compact(
            'totalLaporan',
            'pendingCount',
            'diprosesCount',
            'selesaiCount',
            'ditolakCount',
            'laporanTerbaru',
            'kategoriList'
        ));
    }

   // 4. Menampilkan halaman rekap laporan & filter
    public function rekap(Request $request)
    {
        // Statistik mengikuti kategori yang dipilih
        $statistikQuery = Laporan::query();

        if ($request->filled('kategori')) {
            $statistikQuery->where('id_kategori', $request->kategori);
        }

        $totalLaporan  = (clone $statistikQuery)->count();
        $pendingCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['pending'])->count();
        $diprosesCount = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['proses'])->count();
        $selesaiCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['selesai'])->count();
        $ditolakCount  = (clone $statistikQuery)->whereRaw('status::text ILIKE ?', ['ditolak'])->count();

        $query = Laporan::with(['kategori', 'user']);

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // Filter Status yang lebih fleksibel dan aman untuk PostgreSQL
        if ($request->filled('status')) {
            $statusFilter = strtolower(trim($request->status));
            $query->whereRaw('LOWER(status::text) = ?', [$statusFilter]);
        }

        // Filter Tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        $laporans = $query->latest('id_laporan')->get();
        $kategoriList = Kategori::all();

        return view('rekap_laporan', compact(
            'totalLaporan', 'pendingCount', 'diprosesCount', 'selesaiCount', 'ditolakCount', 'laporans', 'kategoriList'
        ));
    }

    // 5. Menampilkan halaman detail laporan
    public function show($id)
    {
        $laporan = Laporan::with(['kategori', 'user', 'tanggapan'])->findOrFail($id);
        $statusList = StatusLaporan::all();

        return view('detail_laporan_admin', compact('laporan', 'statusList'));
    }



    // 7. Menampilkan halaman profil admin
    public function profil()
    {
        return view('profil_admin');
    }

    // 8. Memproses update informasi pribadi admin
    public function updateProfil(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $request->validate([
            'name'     => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users,username,' . $userId . ',id_user',
            'email'    => 'required|email|max:100|unique:users,email,' . $userId . ',id_user',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->save();

        return redirect()->route('profil_admin')->with('success', 'Informasi profil berhasil diperbarui!');
    }

    // 9. Memproses update password baru admin


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,proses,selesai,ditolak',
        'tanggapan' => 'nullable|string|max:2000',
    ]);

    $laporan = Laporan::findOrFail($id);

    // Simpan status laporan dan catat perubahan jika status berbeda
    $statusSebelumnya = (string) $laporan->status;
    $statusBaru = $request->status;

    // Tentukan Wakasek penerima berdasarkan kategori laporan
    $namaKategori = strtolower(trim($laporan->kategori?->nama_kategori ?? ''));

    $roleWakasekTarget = match (true) {
        str_contains($namaKategori, 'kesiswaan') => 'wakasek kesiswaan',
        str_contains($namaKategori, 'kurikulum') => 'wakasek kurikulum',
        str_contains($namaKategori, 'sarana'),
        str_contains($namaKategori, 'prasarana') => 'wakasek sarana',
        str_contains($namaKategori, 'dudi') => 'wakasek dudi',
        default => null,
    };

    $wakasekUsers = $roleWakasekTarget
        ? User::whereRaw(
            'LOWER(TRIM(role::text)) = ?',
            [$roleWakasekTarget]
        )->get()
        : collect();

    if ($statusSebelumnya !== $statusBaru) {
        $labelStatus = [
            'pending' => 'Pending',
            'proses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ];

        $laporan->status = $statusBaru;
        $laporan->save();

        // Tentukan penerima notifikasi berdasarkan kategori laporan
        if (str_contains($namaKategori, 'kesiswaan')) {
            // Admin, Guru BK, dan Wakasek Kesiswaan
            $adminUsers = User::where('role', 'admin')->get();
            $bkUsers = User::where('role', 'guru_bk')->get();

            $targetUsers = $adminUsers
                ->concat($bkUsers)
                ->concat($wakasekUsers)
                ->unique('id_user');
        } else {
            // Admin yang mengubah status dan Wakasek bidang terkait
            $adminUser = User::where('id_user', Auth::id())->get();

            $targetUsers = $adminUser
                ->concat($wakasekUsers)
                ->unique('id_user');
        }

        foreach ($targetUsers as $targetUser) {
            Notifikasi::create([
                'id_user' => $targetUser->id_user,
                'id_laporan' => $laporan->id_laporan,
                'judul' => 'Status Laporan Diperbarui',
                'pesan' => (Auth::user()?->name ?? 'Admin Sekolah')
                    . ' mengubah status laporan "'
                    . $laporan->judul . '" dari '
                    . ($labelStatus[$statusSebelumnya] ?? $statusSebelumnya)
                    . ' menjadi '
                    . ($labelStatus[$statusBaru] ?? $statusBaru) . '.',
                'type' => 'status',
                'is_read' => false,
            ]);
        }
    }

    // Ambil isi tanggapan dari form
    $isiTanggapan = trim($request->tanggapan ?? '');

    // Ambil tanggapan terakhir
    $tanggapanTerakhir = $laporan->tanggapan()
        ->orderByDesc('id_tanggapan')
        ->first();

    // Simpan hanya jika tanggapan baru atau berubah
    if (
        $isiTanggapan !== '' &&
        $isiTanggapan !== trim($tanggapanTerakhir?->tanggapan ?? '')
    ) {
        // Simpan tanggapan
        $tanggapanBaru = new Tanggapan();
        $tanggapanBaru->id_laporan = $laporan->id_laporan;
        $tanggapanBaru->id_user = Auth::id();
        $tanggapanBaru->tanggapan = $isiTanggapan;
        $tanggapanBaru->created_at = now();
        $tanggapanBaru->save();

        // Kirim notifikasi kepada siswa
        Notifikasi::create([
            'id_user' => $laporan->id_user,
            'id_laporan' => $laporan->id_laporan,
            'judul' => 'Tanggapan Baru',
            'pesan' => (Auth::user()?->name ?? 'Admin Sekolah')
                . ' memberikan tanggapan pada laporan "'
                . $laporan->judul . '".',
            'type' => 'tanggapan',
            'is_read' => false,
        ]);

        // Kirim notifikasi tanggapan kepada Wakasek sesuai bidang laporan
        foreach ($wakasekUsers as $wakasekUser) {
            Notifikasi::create([
                'id_user' => $wakasekUser->id_user,
                'id_laporan' => $laporan->id_laporan,
                'judul' => 'Tanggapan Admin',
                'pesan' => (Auth::user()?->name ?? 'Admin Sekolah')
                    . ' memberikan tanggapan pada laporan "'
                    . $laporan->judul . '".',
                'type' => 'tanggapan',
                'is_read' => false,
            ]);
        }
    }

    return redirect()
        ->route('laporan.show', $id)
        ->with('success', 'Status dan tanggapan laporan berhasil disimpan!');
}
}




