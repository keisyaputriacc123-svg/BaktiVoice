<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Rute untuk Buka Halaman Login (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

// 2. Rute untuk Memproses Data Login Saat Tombol Diklik (POST)
Route::post('/login', function () {
    // Di sini nanti logika untuk mengecek password & email/NISN
})->name('login.post');

// 3. rute utk memproses fitur lupa pssword
Route::get('/forgot-password', function () {
    return view('welcome'); // atau view halaman lupa password Anda
})->name('password.request');

// 4. Route utk daftar akun pengaduan
Route::get('/register', function () {
    return view ('register');
})->name('register');

Route::post('/register', function () {
    // Logika simpan data pendaftaran nanti di sini
})->name('register.post');

//route halaman dashboard admin
Route::get('/dashboard', function () {
return view ('dashboard_admin');
})->name('dashboard');


Route::get('/', function () {
    return view('landing_page');
})->name('landing');
