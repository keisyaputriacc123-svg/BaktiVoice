<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Route Login & Logout menggunakan LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 3. rute utk memproses fitur lupa pssword
Route::get('/forgot-password', function () {
    return view('welcome'); // atau view halaman lupa password Anda
})->name('password.request');

// Route Dashboard Sesuai Role
Route::get('/admin/dashboard', function () { return view('welcome'); })->name('admin.dashboard');
Route::get('/siswa/dashboard', function () { return view('welcome'); })->name('siswa.dashboard');
Route::get('/bk/dashboard', function () { return view('welcome'); })->name('bk.dashboard');
Route::get('/wakasek/kesiswaan/dashboard', function () { return view('welcome'); })->name('wakasek.kesiswaan.dashboard');
Route::get('/wakasek/kurikulum/dashboard', function () { return view('welcome'); })->name('wakasek.kurikulum.dashboard');
Route::get('/wakasek/sarana/dashboard', function () { return view('welcome'); })->name('wakasek.sarana.dashboard');
Route::get('/wakasek/dudi/dashboard', function () { return view('welcome'); })->name('wakasek.dudi.dashboard');

// 4. Route utk daftar akun pengaduan
Route::get('/register', function () {
    return view ('register');
})->name('register');

// 5. Route untuk halaman register
Route::post('/register', function () {
    // Logika simpan data pendaftaran nanti di sini
})->name('register.post');

// 6. route halaman dashboard admin
Route::get('/dashboard', function () {
return view ('dashboard_admin');
})->name('dashboard');

// 7. Route halaman landing page
Route::get('/', function () {
    return view('landing_page');
})->name('landing');

// 8. Route halaman data master
Route::get('/data-master', function () {
    return view('data_master');
});
