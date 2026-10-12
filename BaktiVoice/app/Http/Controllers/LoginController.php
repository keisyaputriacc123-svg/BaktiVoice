<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login'); // Pastikan file blade kamu bernama login.blade.php di folder resources/views
    }

    // Memproses form login dan mengarahkan sesuai role
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',

        ]);

        // Cek apakah inputan berupa email atau username/NISN
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect berdasarkan role pengguna
            switch ($user->role ?? null) {
                case 'admin':
                    return redirect()->route('dashboard_admin');
                case 'siswa':
                    return redirect()->route('dashboard_siswa');
                case 'guru_bk':
                    return redirect()->route('dashboard_bk');
                case 'wakasek_kesiswaan':
                    return redirect()->route('wakasek.kesiswaan.dashboard');
                case 'wakasek_kurikulum':
                    return redirect()->route('wakasek.kurikulum.dashboard');
                case 'wakasek_sarana':
                    return redirect()->route('wakasek.sarana.dashboard');
                case 'wakasek_dudi':
                    return redirect()->route('wakasek.dudi.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['login' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors([
            'login' => 'Kredensial yang dimasukkan tidak sesuai.',
        ])->onlyInput('login');
    }
    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('register'); // Pastikan file blade kamu bernama register.blade.php di folder resources/views
    }

    // Memproses form register dan menyimpan data ke database
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'login'    => 'required|string|unique:users,email|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|string', // Menangkap pilihan role dari form pendaftaran
        ]);

        // Cek apakah inputan berupa email atau username
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Simpan data pengguna baru ke database secara otomatis
        User::create([
            'name'     => $request->name,
            $fieldType => $request->login,
            'password' => Hash::make($request->password),
            'role'     => $request->role, // Role akan tersimpan sesuai pilihan di form register
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
