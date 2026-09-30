<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 100);

            $table->timestamps();
        });

        DB::statement('ALTER TABLE kategori ENABLE ROW LEVEL SECURITY;');
    }


    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
