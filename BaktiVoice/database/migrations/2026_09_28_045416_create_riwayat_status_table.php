<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('riwayat_status', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->foreignId('id_laporan')->constrained('laporan', 'id_laporan')->onDelete('cascade');
            $table->foreignId('id_status')->constrained('status_laporan', 'id_status')->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE riwayat_status ENABLE ROW LEVEL SECURITY;');
    }


    public function down(): void
    {
        Schema::dropIfExists('riwayat_status');
    }
};
