<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\StatusLaporan;
use Illuminate\Support\Facades\Hash;

class DataMasterController extends Controller
{
    // ==========================================
    // 1. MENAMPILKAN HALAMAN DATA MASTER
    // ==========================================

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Menampilkan data user dengan pencarian
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->get();

        // Menghitung jumlah user
        $totalUsers = User::count();
        $totalSiswa = User::where('role', 'siswa')->count();

        $totalBkWakasek = User::whereIn('role', [
            'guru_bk',
            'wakasek kurikulum',
            'wakasek kesiswaan',
            'wakasek dudi',
            'wakasek sarana'
        ])->count();

        $totalAdmin = User::where('role', 'admin')->count();

        // Mengambil data kategori dan status laporan
        $kategoris = Kategori::all();
        $statusLaporan = StatusLaporan::all();
        $statuses = $statusLaporan;

        // Daftar role penanggung jawab (Statistik array agar opsi select di modal selalu muncul)
        $penanggungJawabs = [
            'guru_bk',
            'wakasek kurikulum',
            'wakasek kesiswaan',
            'wakasek sarana',
            'wakasek dudi'
        ];

        return view('data_master', compact(
            'users',
            'totalUsers',
            'totalSiswa',
            'totalBkWakasek',
            'totalAdmin',
            'kategoris',
            'statusLaporan',
            'statuses',
            'penanggungJawabs'
        ));
    }


    // ==========================================
    // 2. MENAMBAHKAN USER BARU
    // ==========================================

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => strtolower(str_replace(' ', '_', $validated['name'])) . rand(10, 99),
            'role' => strtolower($validated['role']),
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('data_master', [
            'tab' => 'users'
        ])->with('success', 'User berhasil ditambahkan!');
    }


    // ==========================================
    // 3. MENAMBAHKAN KATEGORI LAPORAN
    // ==========================================

    public function storeKategori(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $validated['nama_kategori'],
            'penanggung_jawab' => $validated['penanggung_jawab'],
        ]);

        return redirect()->route('data_master', [
            'tab' => 'kategori'
        ])->with('success', 'Kategori laporan berhasil ditambahkan!');
    }


    // ==========================================
    // 4. MENAMBAHKAN STATUS LAPORAN
    // ==========================================

    public function storeStatus(Request $request)
    {
        $validated = $request->validate([
            'nama_status' => 'required|string|max:255',
        ]);

        StatusLaporan::create([
            'nama_status' => $validated['nama_status'],
        ]);

        return redirect()->route('data_master', [
            'tab' => 'status'
        ])->with('success', 'Status berhasil ditambahkan!');
    }


    // ==========================================
    // 5. MENGAMBIL DATA STATUS UNTUK EDIT
    // ==========================================

    public function editStatus($id)
    {
        $status = StatusLaporan::where('id_status', $id)->firstOrFail();

        return view('edit_status', compact('status'));
    }


    // ==========================================
    // 6. MEMPERBARUI STATUS LAPORAN
    // ==========================================

    public function updateStatus(Request $request, int $id)
    {
        $status = StatusLaporan::where('id_status', $id)->firstOrFail();

        $validated = $request->validate([
            'nama_status' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $status->update([
            'nama_status' => $validated['nama_status'],
            'deskripsi' => $validated['deskripsi'] ?? ($status->deskripsi ?? null),
        ]);

        return redirect()->route('data_master', [
            'tab' => 'status'
        ])->with('success', 'Status laporan berhasil diperbarui!');
    }


    // ==========================================
    // 7. MENGHAPUS STATUS LAPORAN
    // ==========================================

    public function destroyStatus(int $id)
    {
        $status = StatusLaporan::where('id_status', $id)->firstOrFail();
        $status->delete();

        return redirect()->route('data_master', [
            'tab' => 'status'
        ])->with('success', 'Status laporan berhasil dihapus!');
    }


    // ==========================================
    // 8. MENGHAPUS KATEGORI LAPORAN
    // ==========================================

    public function destroyKategori(int $id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();
        $kategori->delete();

        return redirect()->route('data_master', [
            'tab' => 'kategori'
        ])->with('success', 'Kategori laporan berhasil dihapus!');
    }


    // ==========================================
    // 9. MEMPERBARUI KATEGORI LAPORAN
    // ==========================================

    public function updateKategori(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();

        $kategori->update([
            'nama_kategori' => $validated['nama_kategori'],
            'penanggung_jawab' => $validated['penanggung_jawab'],
        ]);

        return redirect()->route('data_master', [
            'tab' => 'kategori'
        ])->with('success', 'Kategori laporan berhasil diperbarui!');
    }


    // ==========================================
    // 10. MEMPERBARUI DATA USER
    // ==========================================

    public function update(Request $request, int $id)
    {
        $user = User::where('id_user', $id)->orWhere('id_user', $id)->firstOrFail();

        $primaryKey = isset($user->id_user) ? 'id_user' : 'id_user';
        $keyValue = $user->$primaryKey;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $keyValue . ',' . $primaryKey,
            'role' => 'required|string',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = strtolower($validated['role']);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('data_master', [
            'tab' => 'users'
        ])->with('success', 'Data user berhasil diperbarui!');
    }


    // ==========================================
    // 11. MENGHAPUS DATA USER
    // ==========================================

    public function destroy(int $id)
    {
        $user = User::where('id_user', $id)->orWhere('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('data_master', [
            'tab' => 'users'
        ])->with('success', 'Data user berhasil dihapus!');
    }
}
