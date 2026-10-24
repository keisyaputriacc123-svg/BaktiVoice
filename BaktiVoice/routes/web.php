<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\KategoriLaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;


// ======
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


// --------------------------------
// HALAMAN NOTIFIKASI ADMIN
// --------------------------------
Route::get('/dashboard/admin/notifikasi', function () {
    return view('notifikasi_admin');
})->name('notifikasi_admin');


// --------------------------------
// HALAMAN PROFIL ADMIN
// --------------------------------
Route::get('/dashboard/admin/profil', [ProfilAdminController::class, 'index'])
    ->name('profil_admin');

Route::put('/dashboard/admin/profil', [ProfilAdminController::class, 'update'])
    ->name('profil_admin.update');

});

// Route untuk Update Password Siswa
    Route::put('/dashboard/siswa/profil/password', function (\Illuminate\Http\Request $request) {
        $user = User::findOrFail(\Illuminate\Support\Facades\Auth::id());

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('profil_admin')
            ->with('success', 'Password berhasil diperbarui!');
    })->name('password.update');


// ================================
// DASHBOARD SISWA
// ================================
Route::middleware('auth')->group(function () {

Route::get('/siswa/dashboard', function () {
    if (Auth::user()->role !== 'siswa') {
        abort(403, 'Akses ditolak.');
    }
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
Route::get('/konfirmasi_laporan/{id?}', [LaporanController::class, 'konfirmasi'])
    ->name('konfirmasi_laporan');

// --------------------------------
// DETAIL LAPORAN SISWA
// --------------------------------
Route::get('/siswa/detail_laporan', function () {
    return view('detail_laporan_siswa');
})->name('detail_laporan_siswa');

// --------------------------------
// NOTIFIKASI SISWA
// --------------------------------
Route::get('/dashboard/siswa/notifikasi', function () {
    return view('notifikasi_siswa');
})->name('notifikasi_siswa');

// --------------------------------
// PROFIL SISWA
// --------------------------------
    Route::get('/dashboard/siswa/profil', function () {
        return view('profil_siswa');
    })->name('profil_siswa');

    Route::put('/dashboard/siswa/profil', function (\Illuminate\Http\Request $request) {
        $user = User::findOrFail(
            \Illuminate\Support\Facades\Auth::id()
        );

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                \Illuminate\Validation\Rule::unique('users', 'username')
                    ->ignore($user->id_user, 'id_user'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                \Illuminate\Validation\Rule::unique('users', 'email')
                    ->ignore($user->id_user, 'id_user'),
            ],
            'nisn' => [
                'nullable',
                'string',
                'max:20',
                \Illuminate\Validation\Rule::unique('users', 'nisn')
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
    Route::put('/dashboard/siswa/profil/password', function (\Illuminate\Http\Request $request) {
        $user = User::findOrFail(\Illuminate\Support\Facades\Auth::id());

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('profil_siswa')
            ->with('success', 'Password berhasil diperbarui!');
    })->name('password.update');
    });
// ================================
// DASHBOARD GURU BK
// ================================

Route::get('/bk/dashboard', function () {
    return view('dashboard_bk');
})->name('dashboard_bk');

Route::get('/siswa/dashboard', [LaporanController::class, 'dashboardSiswa'])->name('dashboard_siswa');

Route::get('/dashboard/bk/LaporanSiswa', function () {
    return view('LaporanSiswa_bk');
})->name('LaporanSiswa_bk');

Route::get('/dashboard/bk/detail_laporan', function () {
    return view('DetailLaporan_bk');
})->name('detail_laporan_bk');


Route::get('/dashboard/bk/monitoring', function () {
    return view('monitoring_bk');
})->name('monitoring_bk');

Route::get('/dashboard/bk/notifikasi', function () {
    return view('notifikasi_bk');
})->name('notifikasi_bk');

Route::get('/dashboard/bk/profil', function () {
    return view('profil_bk');
})->name('profil_bk');


// ================================
// DASHBOARD WAKASEK
// ================================

Route::get('/wakasek/kesiswaan/dashboard', function () {
    return view('dashboard_wakasek');
})->name('wakasek.kesiswaan.dashboard');


Route::get('/wakasek/kurikulum/dashboard', function () {
    return view('dashboard_wakasek');
})->name('wakasek.kurikulum.dashboard');

Route::get('/wakasek/sarana/dashboard', function () {
    return view('dashboard_wakasek');
})->name('wakasek.sarana.dashboard');

Route::get('/wakasek/dudi/dashboard', function () {
    return view('dashboard_wakasek');
})->name('wakasek.dudi.dashboard');


// ------------------------------------
// REKAP LAPORAN WAKASEK
// ------------------------------------

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


 // ------------------------------------
 // MONITORING WAKASEK
 // ------------------------------------

Route::get('/wakasek/kesiswaan/monitoring', function () {
    return view('monitoring_wakasek');
})->name('wakasek.kesiswaan.monitoring');

Route::get('/wakasek/kurikulum/monitoring', function () {
    return view('monitoring_wakasek');
})->name('wakasek.kurikulum.monitoring');

Route::get('/wakasek/sarana/monitoring', function () {
    return view('monitoring_wakasek');
})->name('wakasek.sarana.monitoring');

Route::get('/wakasek/dudi/monitoring', function () {
    return view('monitoring_wakasek');
})->name('wakasek.dudi.monitoring');

// --------------------------------
// PROFIL WAKASEK
// --------------------------------
Route::middleware('auth')->group(function () {

    // Menampilkan profil untuk seluruh role Wakasek
    Route::get('/wakasek/profil', function () {
        $role = Auth::user()->role ?? 'wakasek kesiswaan';

        $dashboardRoutes = [
            'wakasek kesiswaan' => 'wakasek.kesiswaan.dashboard',
            'wakasek kurikulum' => 'wakasek.kurikulum.dashboard',
            'wakasek sarana' => 'wakasek.sarana.dashboard',
            'wakasek dudi' => 'wakasek.dudi.dashboard',
        ];

        abort_unless(array_key_exists($role, $dashboardRoutes), 403);

        return view('profil_wakasek', [
            'routeDashboard' => $dashboardRoutes[$role],
        ]);
    })->name('profil_wakasek');

    // Menyimpan perubahan informasi pribadi
    Route::put('/wakasek/profil', function (Request $request) {
        $user = User::findOrFail(Auth::id());

        $role = $user->role;

        $dashboardRoutes = [
            'wakasek kesiswaan' => 'wakasek.kesiswaan.dashboard',
            'wakasek kurikulum' => 'wakasek.kurikulum.dashboard',
            'wakasek sarana' => 'wakasek.sarana.dashboard',
            'wakasek dudi' => 'wakasek.dudi.dashboard',
        ];

        abort_unless(array_key_exists($role, $dashboardRoutes), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique('users', 'username')
                    ->ignore($user->id_user, 'id_user'),
            ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id_user, 'id_user'),
            ],
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()
            ->route('profil_wakasek')
            ->with('success', 'Profil berhasil diperbarui!');
    })->name('profil_wakasek.update');

    // Mengubah password akun
    Route::put('/wakasek/profil/password', function (Request $request) {
        $user = User::findOrFail(Auth::id());

        $role = $user->role;

        abort_unless(in_array($role, [
            'wakasek kesiswaan',
            'wakasek kurikulum',
            'wakasek sarana',
            'wakasek dudi',
        ], true), 403);

        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.current_password' =>
                'Password lama yang kamu masukkan tidak sesuai.',
            'password.min' =>
                'Password baru minimal 8 karakter.',
            'password.confirmed' =>
                'Konfirmasi password baru tidak cocok.',
        ]);

        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()
            ->route('profil_wakasek')
            ->with('success_password', 'Password berhasil diubah!');
    })->name('profil_wakasek.password.update');

});

// --------------------------------
// NOTIFIKASI WAKASEK
// --------------------------------


Route::middleware('auth')->get('/wakasek/notifikasi', function () {
    $role = Auth::user()->role ?? '';

    abort_unless(in_array($role, [
        'wakasek kesiswaan',
        'wakasek kurikulum',
        'wakasek sarana',
        'wakasek dudi',
    ], true), 403);

    return view('notifikasi_wakasek');
})->name('wakasek.notifikasi');


Route::get('/wakasek/detail_laporan', function () {
    return view('detail_laporan_wakasek');
});
