<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\StatusLaporan;
use Illuminate\Support\Facades\Hash;

class DataMasterController extends Controller
{
    // 1. Menampilkan halaman Data Master beserta data dari database
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->get();

        $totalUsers = User::count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalBkWakasek = User::whereIn('role', ['guru_bk', 'wakasek kurikulum', 'wakasek kesiswaan', 'wakasek dudi', 'wakasek sarana'])->count();
        $totalAdmin = User::where('role', 'admin')->count();

        $kategoris = Kategori::all();
        $statusLaporan = StatusLaporan::all();
        $statuses = $statusLaporan;

        return view('data_master', compact('users', 'totalUsers', 'totalSiswa', 'totalBkWakasek', 'totalAdmin', 'kategoris', 'statusLaporan', 'statuses'));
    }

    // 2. Menyimpan Data User Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => strtolower(str_replace(' ', '_', $request->name)) . rand(10, 99),
            'role' => strtolower($request->role),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('data_master', ['tab' => 'users'])
                    ->with('success', 'User berhasil ditambahkan!');
    }

    // 3. Menambah Kategori Baru (Sesuai Route Baru)
    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'penanggung_jawab' => $request->penanggung_jawab ?? 'Guru BK / Wakasek',
        ]);

        return redirect()->route('data_master', ['tab' => 'kategori'])
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // 4. Menambah Status Baru (Sesuai Route Baru)
    public function storeStatus(Request $request)
    {
        $request->validate([
            'nama_status' => 'required|string|max:255',
        ]);

        StatusLaporan::create([
            'nama_status' => $request->nama_status,
        ]);

        return redirect()->route('data_master', ['tab' => 'status'])
            ->with('success', 'Status berhasil ditambahkan!');
    }

    // 5. Edit Status Laporan
    public function editStatus($id)
    {
        $status = StatusLaporan::findOrFail($id);
        return view('edit_status', compact('status'));
    }

    // 6. Update Status Laporan
    public function updateStatus(Request $request, int $id)
    {
        $status = StatusLaporan::findOrFail($id);

        $request->validate([
            'nama_status' => 'required|string|max:255',
        ]);

        $status->update([
            'nama_status' => $request->nama_status,
            'deskripsi' => $request->deskripsi ?? $status->deskripsi,
        ]);

        return redirect()->route('data_master', ['tab' => 'status'])->with('success', 'Status laporan berhasil diperbarui!');
    }

    // 7. Hapus Status Laporan
    public function destroyStatus(int $id)
    {
        $status = StatusLaporan::findOrFail($id);
        $status->delete();

        return redirect()->route('data_master', ['tab' => 'status'])->with('success', 'Status laporan berhasil dihapus!');
    }

    // 8. Hapus Kategori Laporan
    public function destroyKategori(int $id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();
        $kategori->delete();

        return redirect()->route('data_master', ['tab' => 'kategori'])->with('success', 'Kategori laporan berhasil dihapus!');
    }

    // 9. Update Kategori Laporan
    public function updateKategori(Request $request, int $id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'penanggung_jawab' => $request->penanggung_jawab ?? $kategori->penanggung_jawab,
        ]);

        return redirect()->route('data_master', ['tab' => 'kategori'])->with('success', 'Kategori laporan berhasil diperbarui!');
    }

    // 10. Memperbarui data User
    public function update(Request $request, int $id)
    {
        $user = User::where('id_user', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id . ',id_user',
            'role' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = strtolower($request->role);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('data_master', ['tab' => 'users'])->with('success', 'Data user berhasil diperbarui!');
    }

    // 11. Menghapus data user
    public function destroy(int $id)
    {
        $user = User::where('id_user', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('data_master', ['tab' => 'users'])->with('success', 'Data user berhasil dihapus!');
    }
}
