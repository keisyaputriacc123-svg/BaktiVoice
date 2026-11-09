<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfilSiswaController extends Controller
{
    // Menampilkan halaman profil
    public function edit()
    {
        return view('profil_siswa');
    }

    // Memperbarui Informasi Pribadi
    public function update(Request $request)
    {
        // Menggunakan model User agar instance data dikenali dengan baik
        $user = User::findOrFail(Auth::id());
        $userId = $user->id_user ?? $user->id;

        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique('users', 'username')->ignore($userId, 'id_user')
            ],
            'email'    => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($userId, 'id_user')
            ],
            'nisn'     => [
                'nullable', 'string', 'max:20',
                Rule::unique('users', 'nisn')->ignore($userId, 'id_user')
            ],
        ]);

        // Menyimpan menggunakan properti dan save() agar aman dari error editor
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nisn = $request->nisn;
        $user->save();

        return redirect()->route('profil_siswa')->with('success', 'Informasi profil berhasil diperbarui!');
    }

    // Memperbarui Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.current_password' => 'Password lama yang kamu masukkan tidak sesuai.',
            'password.min'                      => 'Password baru minimal 8 karakter.',
            'password.confirmed'                => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = User::findOrFail(Auth::id());

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profil_siswa')->with('success', 'Password berhasil diperbarui!');
    }
}
