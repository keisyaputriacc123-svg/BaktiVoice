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
    public function index()
    {
        $users = User::all();
        $totalUsers = $users->count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalBkWakasek = User::whereIn('role', ['guru_bk', 'wakasek kurikulum', 'wakasek kesiswaan', 'wakasek dudi', 'wakasek sarana'])->count();
        $totalAdmin = User::where('role', 'admin')->count();

        $kategoris = Kategori::all();
        $statuses = StatusLaporan::all();

        return view('data_master', compact('users', 'totalUsers', 'totalSiswa', 'totalBkWakasek', 'totalAdmin', 'kategoris', 'statuses'));
    }

    // 2. Menyimpan data baru (User, Kategori, atau Status)
    public function store(Request $request)
    {
        // Jika form yang dikirim adalah form tambah user
        if ($request->has('name') && $request->has('email')) {
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
        }
        elseif ($request->has('nama_kategori')) {
            $request->validate([
                'nama_kategori' => 'required|string|max:255',
            ]);

            Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'penanggung_jawab' => $request->penanggung_jawab ?? 'Guru BK / Wakasek',
            ]);
        }
        elseif ($request->has('nama_status')) {
            $request->validate([
                'nama_status' => 'required|string|max:255',
            ]);

            StatusLaporan::create([
                'nama_status' => $request->nama_status,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('data_master')->with('success', 'Data berhasil ditambahkan!');
    }

    // 3. Memperbarui data (Edit User)
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = strtolower($request->role);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('data_master')->with('success', 'Data user berhasil diperbarui!');
    }

    // 4. Menghapus data user berdasarkan ID
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('data_master')->with('success', 'Data user berhasil dihapus!');
    }
}
