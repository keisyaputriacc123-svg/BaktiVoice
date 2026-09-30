<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->foreignId('id_laporan')->constrained('laporan', 'id_laporan')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->text('tanggapan');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE tanggapan ENABLE ROW LEVEL SECURITY;');
    }


    public function down(): void
    {
        Schema::dropIfExists('tanggapan');
    }
};
