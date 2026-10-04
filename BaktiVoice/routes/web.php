<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// ================================
// LANDING PAGE
// ================================
Route::get('/', function () {
    return view('landing_page');
})->name('landing');

// ================================
// LOGIN & LOGOUT
// ================================
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// ================================
// LUPA PASSWORD
// ================================
Route::get('/forgot-password', function () {
    return view('welcome');
})->name('password.request');

// ================================
// REGISTER
// ================================
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'username' => 'required|string|max:100|unique:users,username',
        'email' => 'nullable|email|max:100|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    \App\Models\User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'] ?? null,
        'password' => $validated['password'],
        'role' => 'siswa',
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil! Silakan login dengan akun kamu.');
})->name('register.post');

// ================================
// DASHBOARD ADMIN
// ================================
Route::get('/admin_dashboard', function () {
    return view('dashboard_admin');
})->name('dashboard_admin');

// --------------------------------
// DATA MASTER
// --------------------------------
Route::get('/data_master', function () {
    return view('data_master');
})->name('data_master');

// --------------------------------
// HALAMAN LAPORAN ADMIN
// --------------------------------
Route::get('/laporan_admin', function () {
    return view('laporan_admin');
})->name('laporan.admin');

// ================================
// DASHBOARD SISWA
// ================================
Route::get('/siswa/dashboard', function () {
    return view('welcome');
})->name('siswa.dashboard');

// ================================
// DASHBOARD GURU BK
// ================================
Route::get('/bk/dashboard', function () {
    return view('welcome');
})->name('bk.dashboard');

// ================================
// DASHBOARD WAKASEK
// ================================
Route::get('/wakasek/kesiswaan/dashboard', function () {
    return view('welcome');
})->name('wakasek.kesiswaan.dashboard');

Route::get('/wakasek/kurikulum/dashboard', function () {
    return view('welcome');
})->name('wakasek.kurikulum.dashboard');

Route::get('/wakasek/sarana/dashboard', function () {
    return view('welcome');
})->name('wakasek.sarana.dashboard');

Route::get('/wakasek/dudi/dashboard', function () {
    return view('welcome');
})->name('wakasek.dudi.dashboard');
