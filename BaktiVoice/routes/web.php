<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\LoginController;

// ================================
// LANDING PAGE
// ================================
Route::get('/', function () {
    return view('landing_page');
})->name('landing');

// ================================
// GUEST ROUTES (LOGIN & REGISTER)
// ================================
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Lupa Password
    Route::get('/forgot-password', function () {
        return view('welcome');
    })->name('password.request');

    // Register
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', function (Request $request) {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users,username',
            'email'    => 'nullable|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'username' => $validated['username'],
            'email'    => $validated['email'] ?? null,
            'password' => Hash::make($validated['password']),
            'role'     => 'siswa',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login dengan akun kamu.');
    })->name('register.post');
});

// ================================
// AUTHENTICATED ROUTES (LOGOUT & DASHBOARDS)
// ================================
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('dashboard_admin');
    })->name('dashboard_admin');

    // Dashboard Siswa (Menyesuaikan dengan view siswa_dashboard.blade.php / folder)
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    // Dashboard Guru BK
    Route::get('/bk/dashboard', function () {
        return view('bk.dashboard');
    })->name('bk.dashboard');

    // Dashboard Wakasek
    Route::prefix('wakasek')->name('wakasek.')->group(function () {
        Route::get('/kesiswaan/dashboard', function () {
            return view('wakasek.kesiswaan.dashboard');
        })->name('kesiswaan.dashboard');

        Route::get('/kurikulum/dashboard', function () {
            return view('wakasek.kurikulum.dashboard');
        })->name('kurikulum.dashboard');

        Route::get('/sarana/dashboard', function () {
            return view('wakasek.sarana.dashboard');
        })->name('sarana.dashboard');

        Route::get('/dudi/dashboard', function () {
            return view('wakasek.dudi.dashboard');
        })->name('dudi.dashboard');
    });

    // Data Master (Menggunakan penamaan 'data_master' agar sesuai dengan controller/blade)
    Route::get('/admin/data-master', function () {
        return view('data_master');
    })->name('data_master');
});
