<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataMasterController;

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
        'role' => 'required|string', // Pastikan validasi role ini ada
    ]);

    \App\Models\User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'] ?? null,
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        'role' => $validated['role'], // Mengambil role sesuai yang Anda pilih di halaman register
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
Route::post('/data_master/store', [DataMasterController::class, 'store'])->name('data.store');
Route::delete('/data_master/{id}', [DataMasterController::class, 'destroy'])->name('data.destroy');


// --------------------------------
// HALAMAN LAPORAN ADMIN
// --------------------------------
Route::get('/laporan_admin', function () {
    return view('laporan_admin');
})->name('laporan_admin');

Route::patch('/laporan_admin/{id}/status', [LaporanController::class, 'updateStatus'])
    ->name('laporan.update-status');

// --------------------------------
// HALAMAN REKAP LAPORAN
// --------------------------------
Route::get('/rekap_laporan', function () {
    return view('rekap_laporan');
})->name('rekap_laporan');

// ================================
 // DASHBOARD SISWA
 // ================================

Route::get('/siswa/dashboard', function () {
    return view('dashboard_siswa');
})->name('dashboard_siswa');

// --------------------------------
// BUAT LAPORAN
// --------------------------------
Route::get('/buat_laporan', function () {
    return view('buat_laporan');
})->name('buat_laporan');

// --------------------------------
// RIWAYAT LAPORAN
// --------------------------------
Route::get('/dashboard/siswa/riwayat_laporan', function () {
    return view('riwayat_laporan');
})->name('riwayat_laporan');

// --------------------------------
// KONFIRMASI LAPORAN
// --------------------------------
Route::get('/dashboard/siswa/konfirmasi_laporan', function () {
    return view('konfirmasi_laporan');
})->name('konfirmasi_laporan');


// ================================
// DASHBOARD GURU BK
// ================================

Route::get('/bk/dashboard', function () {
    return view('dashboard_bk');
})->name('dashboard_bk');

// --------------------------------
// LAPORAN SISWA
// --------------------------------
Route::get('/dashboard/bk/laporan-siswa', function () {
    return view('LaporanSiswa_bk');
})->name('LaporanSiswa_bk');

// --------------------------------
// DETAIL LAPORAN
// --------------------------------
Route::get('/dashboard/bk/detail-laporan', function () {
    return view('DetailLaporan_bk');
})->name('detail_laporan_bk');

// --------------------------------
// MONITORING
// --------------------------------
Route::get('/dashboard/bk/monitoring', function () {
    return view('monitoring_bk');
})->name('monitoring_bk');


// ================================
// DASHBOARD WAKASEK
// ================================

Route::get('/wakasek/kesiswaan/dashboard', function () {

return view('dashboard_wakasek');
})->name('wakasek.kesiswaan.dashboard');

Route::get('/wakasek/kurikulum/dashboard', function () {
    return view('wakasek.kurikulum.dashboard');
})->name('wakasek.kurikulum.dashboard');

Route::get('/wakasek/sarana/dashboard', function () {
    return view('wakasek.sarana.dashboard');
})->name('wakasek.sarana.dashboard');

Route::get('/wakasek/dudi/dashboard', function () {
    return view('wakasek.dudi.dashboard');

})->name('wakasek.dudi.dashboard');

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
