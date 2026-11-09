<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\ProfilSiswaController;
use App\Http\Controllers\ProfilBkController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\DashboardWakasekController;
use App\Http\Controllers\DashboardBkController;
use App\Http\Controllers\LaporanSiswaBkController;
use App\Http\Controllers\MonitoringBkController;
use App\Http\Controllers\KategoriLaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotifikasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;


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


/* ================================
    REGISTER
================================ */

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
        'password' => \Illuminate\Support\Facades\Hash::make(
            $validated['password']
        ),
        'role' => 'siswa',
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil! Silakan login dengan akun kamu.');
})->name('register.post');


// ================================
// DASHBOARD ADMIN
// ================================

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');

    // Route Update Status Laporan
    Route::get('/admin/laporan/{id}', [AdminController::class, 'show'])->name('laporan.show');
    Route::put('/admin/laporan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('laporan.updateStatus');

    // Route Halaman & Proses Profil Admin
    Route::get('/dashboard/admin/profil', [AdminController::class, 'profil'])->name('profil_admin');
    Route::put('/admin/profil/update', [AdminController::class, 'updateProfil'])->name('profil_admin.update');
    Route::put('/admin/password/update', [AdminController::class, 'updatePassword'])->name('password.update');

    // --------------------------------
    // DATA MASTER
    // --------------------------------
    Route::get('/data_master', [DataMasterController::class, 'index'])
        ->name('data_master');

    // USER
    Route::post('/users/store', [DataMasterController::class, 'store'])
        ->name('user.store');

    Route::put('/users/{id}', [DataMasterController::class, 'update'])
        ->name('user.update');

    Route::delete('/user/{id}', [DataMasterController::class, 'destroy'])
        ->name('user.destroy');

    // KATEGORI
    Route::post('/data_master/kategori', [DataMasterController::class, 'storeKategori'])
        ->name('kategori.store');

    Route::put('/data_master/kategori/{id}', [DataMasterController::class, 'updateKategori'])
        ->name('kategori.update');

    Route::delete('/data_master/kategori/{id}', [DataMasterController::class, 'destroyKategori'])
        ->name('kategori.destroy');

    // STATUS
    Route::post('/data_master/status', [DataMasterController::class, 'storeStatus'])
        ->name('status.store');

    Route::put('/data_master/status/{id}', [DataMasterController::class, 'updateStatus'])
        ->name('status.update');

    Route::delete('/data_master/status/{id}', [DataMasterController::class, 'destroyStatus'])
        ->name('status.destroy');

    // --------------------------------
    // HALAMAN LAPORAN ADMIN
    // --------------------------------
    Route::get('/laporan_admin/{id?}', [LaporanController::class, 'showAdmin'])->name('laporan_admin');
    Route::put('/api/laporan/{id}/status', [StatusLaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    Route::post('/api/laporan/{id}/tanggapan', [TanggapanController::class, 'store'])->name('laporan.tanggapan');

    // --------------------------------
    // HALAMAN REKAP LAPORAN
    // --------------------------------
    Route::get('/rekap_laporan', [AdminController::class, 'rekap'])->name('rekap_laporan');

    // --------------------------------
    // HALAMAN NOTIFIKASI ADMIN (DINAMIS DB)
    // --------------------------------
    Route::get('/dashboard/admin/notifikasi', [NotifikasiController::class, 'index'])
        ->defaults('viewName', 'notifikasi_admin')
        ->name('notifikasi_admin');

    // --------------------------------
    // HALAMAN PROFIL ADMIN (ALTERNATIF)
    // --------------------------------
    Route::get('/dashboard/admin/profil-alt', [ProfilAdminController::class, 'index'])->name('profil_admin.alt');
    Route::put('/dashboard/admin/profil-alt', [ProfilAdminController::class, 'update'])->name('profil_admin.alt.update');

});


// ================================
// DASHBOARD SISWA
// ================================
Route::middleware('auth')->group(function () {

    Route::get('/siswa/dashboard', [LaporanController::class, 'dashboardSiswa'])->name('dashboard_siswa');

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
    Route::get('/konfirmasi_laporan/{id?}', [LaporanController::class, 'konfirmasi'])
        ->name('konfirmasi_laporan');

    // --------------------------------
    // DETAIL LAPORAN SISWA
    // --------------------------------
    Route::get('/siswa/detail_laporan/{id}', [LaporanController::class, 'show'])->name('detail_laporan_siswa');

    // --------------------------------
    // NOTIFIKASI SISWA (DINAMIS DB)
    // --------------------------------
    Route::get('/dashboard/siswa/notifikasi', [NotifikasiController::class, 'index'])
        ->defaults('viewName', 'notifikasi_siswa')
        ->name('notifikasi_siswa');

    // --------------------------------
    // PROFIL SISWA
    // --------------------------------
    Route::get('/dashboard/siswa/profil', function () {
        return view('profil_siswa');
    })->name('profil_siswa');

    Route::put('/dashboard/siswa/profil', function (Request $request) {
        $user = User::findOrFail(Auth::id());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')
                    ->ignore($user->id_user, 'id_user'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id_user, 'id_user'),
            ],
            'nisn' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('users', 'nisn')
                    ->ignore($user->id_user, 'id_user'),
            ],
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->nisn = $validated['nisn'] ?? null;

        $user->save();

        return redirect()
            ->route('profil_siswa')
            ->with('success', 'Profil berhasil diperbarui!');
    })->name('profil_siswa.update');

    // Route untuk Update Password Siswa
    Route::put('/dashboard/siswa/profil/password', function (Request $request) {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('profil_siswa')
            ->with('success', 'Password berhasil diperbarui!');
    })->name('password.siswa.update');

});


// ================================
// DASHBOARD GURU BK
// ================================

Route::middleware('auth')->group(function () {
    Route::get('/bk/dashboard', [DashboardBkController::class, 'index'])->name('dashboard_bk');

    Route::get('/dashboard/bk/LaporanSiswa', [LaporanSiswaBkController::class, 'index'])->name('LaporanSiswa_bk');

    // ROUTE DETAIL & TINDAK LANJUT
    Route::get('/dashboard/bk/laporan/{id}', [LaporanSiswaBkController::class, 'show'])->name('detail_laporan_bk');
    Route::post('/dashboard/bk/laporan/{id}/tindak-lanjut', [LaporanSiswaBkController::class, 'updateTindakLanjut'])->name('laporan.tindak_lanjut');

    Route::get('/dashboard/bk/monitoring', [MonitoringBkController::class, 'index'])->name('monitoring_bk');

    // NOTIFIKASI GURU BK (DINAMIS DB)
    Route::get('/dashboard/bk/notifikasi', [NotifikasiController::class, 'index'])
        ->defaults('viewName', 'notifikasi_bk')
        ->name('notifikasi_bk');

    Route::post('/dashboard/bk/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');
    Route::post('/dashboard/bk/notifikasi/mark-all', [NotifikasiController::class, 'markAllAsRead'])->name('notifikasi.readAll');

    // Route halaman profil BK
    Route::get('/dashboard/bk/profil', [ProfilBkController::class, 'index'])->name('profil_bk');

    // Route untuk update informasi profil
    Route::put('/dashboard/bk/profil', [ProfilBkController::class, 'update'])->name('profil_bk.update');

    // Route untuk update password
    Route::put('/dashboard/bk/profil/password', [ProfilBkController::class, 'updatePassword'])->name('profil_bk.password');
});


// ================================
// DASHBOARD WAKASEK
// ================================

Route::middleware(['auth'])->group(function () {
    Route::get('/wakasek/kesiswaan/dashboard', [DashboardWakasekController::class, 'kesiswaan'])->name('wakasek.kesiswaan.dashboard');
    Route::get('/wakasek/kurikulum/dashboard', [DashboardWakasekController::class, 'kurikulum'])->name('wakasek.kurikulum.dashboard');
    Route::get('/wakasek/sarana/dashboard', [DashboardWakasekController::class, 'sarana'])->name('wakasek.sarana.dashboard');
    Route::get('/wakasek/dudi/dashboard', [DashboardWakasekController::class, 'dudi'])->name('wakasek.dudi.dashboard');
});

// ------------------------------------
// REKAP LAPORAN WAKASEK
// ------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/wakasek/kesiswaan/rekap', [DashboardWakasekController::class, 'rekapKesiswaan'])->name('wakasek.kesiswaan.rekap');
    Route::get('/wakasek/kurikulum/rekap', [DashboardWakasekController::class, 'rekapKurikulum'])->name('wakasek.kurikulum.rekap');
    Route::get('/wakasek/sarana/rekap', [DashboardWakasekController::class, 'rekapSarana'])->name('wakasek.sarana.rekap');
    Route::get('/wakasek/dudi/rekap', [DashboardWakasekController::class, 'rekapDudi'])->name('wakasek.dudi.rekap');

    // Detail Laporan & Tanggapan Wakasek
    Route::get('/wakasek/laporan/{id}', [DashboardWakasekController::class, 'detailLaporan'])->name('wakasek.laporan.detail');
    Route::post('/wakasek/laporan/{id}/tanggapan', [DashboardWakasekController::class, 'simpanTanggapan'])->name('wakasek.laporan.tanggapan');
});


// ------------------------------------
// MONITORING WAKASEK
// ------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/wakasek/kesiswaan/monitoring', [DashboardWakasekController::class, 'monitoringKesiswaan'])->name('wakasek.kesiswaan.monitoring');
    Route::get('/wakasek/kurikulum/monitoring', [DashboardWakasekController::class, 'monitoringKurikulum'])->name('wakasek.kurikulum.monitoring');
    Route::get('/wakasek/sarana/monitoring', [DashboardWakasekController::class, 'monitoringSarana'])->name('wakasek.sarana.monitoring');
    Route::get('/wakasek/dudi/monitoring', [DashboardWakasekController::class, 'monitoringDudi'])->name('wakasek.dudi.monitoring');
});

// --------------------------------
// PROFIL WAKASEK
// --------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/wakasek/profil', [DashboardWakasekController::class, 'profil'])->name('profil_wakasek');
    Route::put('/wakasek/profil', [DashboardWakasekController::class, 'updateProfil'])->name('profil_wakasek.update');
    Route::put('/wakasek/profil/password', [DashboardWakasekController::class, 'updatePassword'])->name('profil_wakasek.password.update');
});

// ------------------------------------
// NOTIFIKASI WAKASEK
// ------------------------------------

Route::middleware(['auth'])->prefix('wakasek')->name('wakasek.')->group(function () {
    Route::get('/kesiswaan/notifikasi', [DashboardWakasekController::class, 'notifikasiKesiswaan'])->name('kesiswaan.notifikasi');
    Route::get('/kurikulum/notifikasi', [DashboardWakasekController::class, 'notifikasiKurikulum'])->name('kurikulum.notifikasi');
    Route::get('/sarana/notifikasi', [DashboardWakasekController::class, 'notifikasiSarana'])->name('sarana.notifikasi');
    Route::get('/dudi/notifikasi', [DashboardWakasekController::class, 'notifikasiDudi'])->name('dudi.notifikasi');

    // Route umum jika diakses langsung
    Route::get('/notifikasi', [DashboardWakasekController::class, 'notifikasiKesiswaan'])->name('notifikasi');
});

// ================================
// GLOBAL ROUTE AKSI NOTIFIKASI (UNIVERSAL)
// ================================
Route::middleware(['auth'])->group(function () {
    Route::post('/dashboard/notifikasi/read/{id}', [DashboardWakasekController::class, 'tandaiDibaca'])->name('notifikasi.read');
    Route::post('/dashboard/notifikasi/read-all', [DashboardWakasekController::class, 'tandaiSemuaDibaca'])->name('notifikasi.readAll');
});
