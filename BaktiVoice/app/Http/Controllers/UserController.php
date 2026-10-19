<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method untuk menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => strtolower($request->role),
        ]);

        return redirect('/data_master?tab=users')->with('success', 'User baru berhasil ditambahkan!');
    }

    // Method untuk Memperbarui Data User (TAMBAHAN UNTUK TOMBOL EDIT)
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role'  => 'required|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = strtolower($request->role);

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/data_master?tab=users')->with('success', 'Data user berhasil diperbarui!');
    }

    // Method untuk Menghapus User
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/data_master?tab=users')->with('success', 'Data user berhasil dihapus!');
    }
}
