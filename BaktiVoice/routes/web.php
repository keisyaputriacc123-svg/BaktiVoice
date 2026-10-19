<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\KategoriLaporanController;
use App\Http\Controllers\UserController;

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
        'role' => 'required|string',
    ]);

    \App\Models\User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'] ?? null,
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil! Silakan login dengan akun kamu.');
})->name('register.post');


// ================================
// DASHBOARD ADMIN
// ================================

Route::get('/dashboard_admin', function () {
    return view('dashboard_admin');
})->name('dashboard_admin');

// --------------------------------
// DATA MASTER
// --------------------------------
Route::get('/data_master', [DataMasterController::class, 'index'])->name('data_master');

Route::post('/data_master/store', [DataMasterController::class, 'store'])->name('data_master.store');
Route::post('/data_master/status', [DataMasterController::class, 'store'])->name('status.store');
Route::post('/data_master/kategori', [DataMasterController::class, 'store'])->name('kategori.store');
Route::post('/users/store', [DataMasterController::class, 'store'])->name('user.store');

Route::put('/data_master/{id}', [DataMasterController::class, 'update'])->name('data_master.update');
Route::put('/users/{id}', [DataMasterController::class, 'update'])->name('user.update');
Route::delete('/data_master/{id}', [DataMasterController::class, 'destroy'])->name('data_master.destroy');
Route::delete('/user/{id}', [DataMasterController::class, 'destroy'])->name('user.destroy');

Route::get('/data_master/status/{id}/edit', [DataMasterController::class, 'editStatus'])->name('status.edit');
Route::put('/data_master/status/{id}', [DataMasterController::class, 'updateStatus'])->name('status.update');
Route::delete('/data_master/status/{id}', [DataMasterController::class, 'destroyStatus'])->name('status.destroy');

Route::put('/data_master/kategori/{id}', [DataMasterController::class, 'updateKategori'])->name('kategori.update');
Route::post('/data_master/kategori', [DataMasterController::class, 'store'])->name('kategori.store');
Route::delete('/data_master/kategori/{id}', [DataMasterController::class, 'destroyKategori'])->name('kategori.destroy');

// --------------------------------
// HALAMAN LAPORAN ADMIN (DIUPDATE)
// --------------------------------

// Menampilkan daftar atau halaman detail laporan admin berdasarkan ID
Route::get('/laporan_admin/{id?}', [LaporanController::class, 'showAdmin'])->name('laporan_admin');

// Route untuk mengubah status laporan dari tombol aksi admin
Route::put('/api/laporan/{id}/status', [StatusLaporanController::class, 'updateStatus'])->name('laporan.updateStatus');

// Route untuk menyimpan tanggapan admin
Route::post('/api/laporan/{id}/tanggapan', [TanggapanController::class, 'store'])->name('laporan.tanggapan');


// --------------------------------
// HALAMAN REKAP LAPORAN
// --------------------------------
Route::get('/rekap_laporan', [LaporanController::class, 'rekapAdmin'])->name('rekap_laporan');

// ================================
// DASHBOARD SISWA
// ================================

Route::get('/siswa/dashboard', function () {
    return view('dashboard_siswa');
})->name('dashboard_siswa');

// --------------------------------
// BUAT LAPORAN
// --------------------------------
Route::get('/buat_laporan', [LaporanController::class, 'create'])->name('buat_laporan');
Route::post('/buat_laporan/store', [LaporanController::class, 'store'])->name('laporan.store');

// --------------------------------
// RIWAYAT LAPORAN
// --------------------------------
Route::get('/siswa/riwayat', [LaporanController::class, 'riwayat'])->name('riwayat_laporan');

// --------------------------------
// KONFIRMASI LAPORAN
// --------------------------------
Route::get('/konfirmasi_laporan/{id?}', [LaporanController::class, 'konfirmasi'])->name('konfirmasi_laporan');

// ================================
// DASHBOARD GURU BK
// ================================

Route::get('/bk/dashboard', function () {
    return view('dashboard_bk');
})->name('dashboard_bk');

Route::get('/siswa/dashboard', [LaporanController::class, 'dashboardSiswa'])->name('dashboard_siswa');

Route::get('/dashboard/bk/detail-laporan', function () {
    return view('DetailLaporan_bk');
})->name('detail_laporan_bk');


Route::get('/dashboard/bk/monitoring', function () {
    return view('monitoring_bk');
})->name('monitoring_bk');


// ================================
// DASHBOARD WAKASEK
// ================================

Route::get('/wakasek/kesiswaan/dashboard', function () {
    return view('dashboard_wakasek');
})->name('wakasek.kesiswaan.dashboard');




// ================================
// REKAP LAPORAN WAKASEK
// ================================

Route::get('/wakasek/kesiswaan/rekap', function () {
    return view('rekap_wakasek');
})->name('wakasek.kesiswaan.rekap');

Route::get('/wakasek/kurikulum/rekap', function () {
    return view('rekap_wakasek');
})->name('wakasek.kurikulum.rekap');

Route::get('/wakasek/sarana/rekap', function () {
    return view('rekap_wakasek');
})->name('wakasek.sarana.rekap');

Route::get('/wakasek/dudi/rekap', function () {
    return view('rekap_wakasek');
})->name('wakasek.dudi.rekap');
