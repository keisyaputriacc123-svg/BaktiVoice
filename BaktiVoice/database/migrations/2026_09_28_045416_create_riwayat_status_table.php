<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('riwayat_status', function (Blueprint $table) {
            $table->id('id_riwayat');

            $table->foreignId('id_laporan')
                  ->constrained('laporan', 'id_laporan')
                  ->onDelete('cascade');

            $table->foreignId('id_status')
                  ->constrained('status_laporan', 'id_status')
                  ->onDelete('cascade');

            $table->foreignId('id_user')
                  ->constrained('users', 'id_user')
                  ->onDelete('cascade');

            $table->timestamp('tanggal_perubahan')->useCurrent();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('riwayat_status');
    }
};
