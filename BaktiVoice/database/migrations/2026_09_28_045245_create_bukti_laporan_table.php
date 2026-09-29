<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bukti_laporan', function (Blueprint $table) {
            $table->id('id_bukti');
            $table->string('file_bukti');
            $table->timestamp('tanggal_upload')->useCurrent();

            $table->foreignId('id_laporan')
                  ->constrained('laporan', 'id_laporan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bukti_laporan');
    }
};
