<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusLaporan;
use App\Models\Tanggapan;
use App\Models\Kategori;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Hitung total laporan
        $totalLaporan = Laporan::count();

        // 2. Hitung statistik disesuaikan dengan format huruf kapital enum (Pending, Diproses, Selesai, Ditolak)
        $pendingCount  = Laporan::whereRaw('status::text ILIKE ?', ['pending'])->count();
        $diprosesCount = Laporan::whereRaw('status::text ILIKE ?', ['proses'])->count();
        $selesaiCount  = Laporan::whereRaw('status::text ILIKE ?', ['selesai'])->count();
        $ditolakCount  = Laporan::whereRaw('status::text ILIKE ?', ['ditolak'])->count();

        // 3. Ambil 5 laporan terbaru beserta relasi user-nya
        $laporanTerbaru = Laporan::with(['user'])->latest('id_laporan')->take(5)->get();

        return view('dashboard_admin', compact(
            'totalLaporan',
            'pendingCount',
            'diprosesCount',
            'selesaiCount',
            'ditolakCount',
            'laporanTerbaru'
        ));
    }

   // 4. Menampilkan halaman rekap laporan & filter
    public function rekap(Request $request)
    {
        $totalLaporan  = Laporan::count();
        $pendingCount  = Laporan::whereRaw('status::text ILIKE ?', ['pending'])->count();
        $diprosesCount = Laporan::whereRaw('status::text ILIKE ?', ['proses'])->count();
        $selesaiCount  = Laporan::whereRaw('status::text ILIKE ?', ['selesai'])->count();
        $ditolakCount  = Laporan::whereRaw('status::text ILIKE ?', ['ditolak'])->count();

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

// 6. Memproses perubahan status dan tanggapan laporan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status'    => 'required|string',
            'tanggapan' => 'nullable|string',
        ]);

        $laporan = Laporan::findOrFail($id);

        // Petakan nilai status dari form agar sesuai persis dengan ENUM di database PostgreSQL
        $statusMap = [
            'pending' => 'Pending',
            'proses'  => 'proses', // Sesuaikan jika di database menggunakan 'Proses' atau 'Diproses'
            'selesai' => 'Selesai',
            'ditolak' => 'ditolak',
        ];

        $inputStatus = strtolower(trim($request->status));
        // Mapping atau pastikan hasilnya huruf kecil
$statusMap = [
    'pending' => 'pending',
    'proses' => 'proses',
    'selesai' => 'selesai',
    'ditolak' => 'ditolak'
];

        // Gunakan mapping jika ada, atau fallback ke ucfirst jika tidak ditemukan
        $laporan->status = $statusMap[$inputStatus] ?? ucfirst($inputStatus);
        $laporan->save();

        // Simpan tanggapan jika admin mengisi kolom tanggapan
        if ($request->filled('tanggapan')) {
            Tanggapan::create([
                'id_laporan' => $id,
                'id_user'    => Auth::id() ?? 1,
                'tanggapan'  => $request->tanggapan,
            ]);
        }

        return redirect()->route('laporan.show', $id)->with('success', 'Status dan tanggapan laporan berhasil disimpan!');
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
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password lama yang kamu masukkan salah.'],
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profil_admin')->with('success', 'Password akun berhasil diubah!');
    }
}
