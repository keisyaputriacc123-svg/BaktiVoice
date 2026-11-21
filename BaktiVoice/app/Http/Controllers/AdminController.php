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

        $query = Laporan::with(['kategori', 'user', 'tanggapan.user', 'buktiLaporan']);

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

    // CETAK SEMUA LAPORAN ADMIN
    public function cetakSemua(Request $request)
    {
        $request->validate([
            'kategori' => 'nullable|integer',
            'status' => 'nullable|in:pending,proses,selesai,ditolak',
            'tanggal' => 'nullable|date',
        ]);

        $query = Laporan::with(['kategori', 'user', 'tanggapan.user', 'buktiLaporan']);

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->whereRaw('LOWER(status::text) = ?', [
                strtolower(trim($request->status))
            ]);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        $laporans = $query->latest('id_laporan')->get();

        // Filter tanggapan dan bukti untuk dokumen cetak massal
        $laporans->each(function ($laporan) {
            $tanggapanCetak = $laporan->tanggapan
                ->filter(function ($tanggapan) {
                    $role = strtolower(trim($tanggapan->user?->role ?? ''));

                    return $role === 'admin' || str_starts_with($role, 'wakasek');
                })
                ->values();

            $laporan->setRelation('tanggapan', $tanggapanCetak);

            $buktiCetak = $laporan->buktiLaporan
                ->filter(function ($bukti) {
                    return str_starts_with($bukti->file_path ?? '', 'uploads/laporan/');
                })
                ->values();

            // Dukungan untuk laporan lama
            if ($buktiCetak->isEmpty() && !empty($laporan->file_path)) {
                $buktiCetak = collect([
                    (object) ['file_path' => $laporan->file_path]
                ]);
            }

            $laporan->setRelation('buktiLaporan', $buktiCetak);
        });

        $totalLaporan = $laporans->count();
        $pendingCount = $laporans->filter(fn($item) => strtolower((string) $item->status) === 'pending')->count();
        $diprosesCount = $laporans->filter(fn($item) => strtolower((string) $item->status) === 'proses')->count();
        $selesaiCount = $laporans->filter(fn($item) => strtolower((string) $item->status) === 'selesai')->count();
        $ditolakCount = $laporans->filter(fn($item) => strtolower((string) $item->status) === 'ditolak')->count();

        return view('cetak_semua_laporan', compact(
            'laporans',
            'totalLaporan',
            'pendingCount',
            'diprosesCount',
            'selesaiCount',
            'ditolakCount'
        ));
    }
    // 5. Menampilkan halaman detail laporan
    public function show($id)
    {
        $laporan = Laporan::with(['kategori', 'user', 'tanggapan.user', 'buktiLaporan.user'])->findOrFail($id);
        $statusList = StatusLaporan::all();

        $tanggapanAdmin = $laporan->tanggapan->filter(
            fn($item) => $item->user?->role === 'admin'
        );

        $tindakLanjutWakasek = $laporan->tanggapan->filter(
            fn($item) => str_starts_with($item->user?->role ?? '', 'wakasek')
        );

        $buktiWakasek = $laporan->buktiLaporan->filter(
            fn($item) => str_starts_with($item->user?->role ?? '', 'wakasek')
        );

        return view('detail_laporan_admin', compact(
            'laporan',
            'statusList',
            'tanggapanAdmin',
            'tindakLanjutWakasek',
            'buktiWakasek'
        ));
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


public function storeTanggapan(Request $request, $id)
{
    $request->validate([
        'tanggapan' => 'required|string|max:2000',
    ]);

    $laporan = Laporan::findOrFail($id);
    $isiTanggapan = trim($request->tanggapan);

    $namaKategori = strtolower(trim(
        $laporan->kategori?->nama_kategori ?? ''
    ));

    $roleWakasekTarget = match (true) {
        str_contains($namaKategori, 'kesiswaan') => 'wakasek kesiswaan',
        str_contains($namaKategori, 'kurikulum') => 'wakasek kurikulum',
        str_contains($namaKategori, 'sarana'),
        str_contains($namaKategori, 'prasarana') => 'wakasek sarana',
        str_contains($namaKategori, 'dudi') => 'wakasek dudi',
        default => null,
    };

    $wakasekUsers = $roleWakasekTarget
        ? User::whereRaw('LOWER(TRIM(role::text)) = ?', [$roleWakasekTarget])->get()
        : collect();

    $tanggapanTerakhir = $laporan->tanggapan()
        ->whereHas('user', function ($query) {
            $query->where('role', 'admin');
        })
        ->orderByDesc('id_tanggapan')
        ->first();

    if ($isiTanggapan !== trim($tanggapanTerakhir?->tanggapan ?? '')) {
        $tanggapanBaru = new Tanggapan();
        $tanggapanBaru->id_laporan = $laporan->id_laporan;
        $tanggapanBaru->id_user = Auth::id();
        $tanggapanBaru->tanggapan = $isiTanggapan;
        $tanggapanBaru->created_at = now();
        $tanggapanBaru->save();

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
        ->with('success', 'Tanggapan laporan berhasil disimpan!');
}
}

