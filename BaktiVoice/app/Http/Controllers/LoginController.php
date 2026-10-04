<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'role'     => 'required|string',
        ]);

        // Cek apakah inputan berupa email atau username/NISN
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Autentikasi dengan mencocokkan email/username, password, dan role yang dipilih
        $credentials = [
            $fieldType => $request->login,
            'password' => $request->password,
            'role'     => $request->role,
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect berdasarkan role pengguna
            switch ($user->role ?? $request->role) {
                case 'admin':
                    return redirect()->route('dashboard_admin');
                case 'siswa':
                    return redirect()->route('siswa.dashboard');
                case 'guru_bk':
                    return redirect()->route('bk.dashboard');
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
            'login' => 'Username/Email, Password, atau Peran yang dipilih tidak cocok.',
        ])->onlyInput('login', 'role');
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
