<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Akun Siswa
        User::create([
            'name' => 'Siswa Contoh',
            'username' => 'siswa',
            'nisn' => '0081429690',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // 3. Akun Guru BK
        User::create([
            'name' => 'Guru BK Contoh',
            'username' => 'gurubk',
            'email' => 'bk@example.com',
            'password' => Hash::make('password'),
            'role' => 'guru_bk',
        ]);

        // 4. Akun Wakasek Kurikulum
        User::create([
            'name' => 'Wakasek Kurikulum',
            'username' => 'kurikulum',
            'email' => 'kurikulum@example.com',
            'password' => Hash::make('password'),
            'role' => 'wakasek kurikulum',
        ]);

        // 5. Akun Wakasek Kesiswaan
        User::create([
            'name' => 'Wakasek Kesiswaan',
            'username' => 'kesiswaan',
            'email' => 'kesiswaan@example.com',
            'password' => Hash::make('password'),
            'role' => 'wakasek kesiswaan',
        ]);

        // 6. Akun Wakasek Sarana
        User::create([
            'name' => 'Wakasek Sarana',
            'username' => 'sarana',
            'email' => 'sarana@example.com',
            'password' => Hash::make('password'),
            'role' => 'wakasek sarana',
        ]);

        // 7. Akun Wakasek DUDI
        User::create([
            'name' => 'Wakasek DUDI',
            'username' => 'dudi',
            'email' => 'dudi@example.com',
            'password' => Hash::make('password'),
            'role' => 'wakasek dudi',
        ]);

        // Membuat 10 data user acak variatif lewat UserFactory
        User::factory(10)->create();
    }
}
