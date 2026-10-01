<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
        $table->string('name', 100);
        $table->string('username', 100)->unique();
        $table->string('email', 100)->unique()->nullable();
        $table->string('nisn', 20)->unique()->nullable();   
        $table->string('password');
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

        DB::statement('ALTER TABLE users ENABLE ROW LEVEL SECURITY;');
    }


    public function down(): void
    {

    Schema::dropIfExists('users');
    }
};
