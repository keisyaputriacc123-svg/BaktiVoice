<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bukti_laporan', function (Blueprint $table) {
            $table->id('id_bukti');
            $table->foreignId('id_laporan')->constrained('laporan', 'id_laporan')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE bukti_laporan ENABLE ROW LEVEL SECURITY;');
    }


    public function down(): void
    {
        Schema::dropIfExists('bukti_laporan');
    }
};
