<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama', 100);
            $table->string('username', 100)->unique();
            $table->string('password'); // Panjang default 255 aman untuk bcrypt
            $table->enum('role', [
                'siswa',
                'admin',
                'guru_bk',
                'wakasek kurikulum',
                'wakasek kesiswaan',
                'wakasek sarana',
                'wakasek dudi'
            ]);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
