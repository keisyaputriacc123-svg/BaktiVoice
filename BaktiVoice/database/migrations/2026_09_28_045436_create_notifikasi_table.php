<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->text('pesan');
            $table->timestamp('tanggal_notifikasi')->useCurrent();
            $table->boolean('status_baca')->default(false);

            $table->foreignId('id_user')
                  ->constrained('users', 'id_user')
                  ->onDelete('cascade');

            $table->foreignId('id_laporan')
                  ->constrained('laporan', 'id_laporan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
