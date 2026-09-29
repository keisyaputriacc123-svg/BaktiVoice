<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('judul', 100);
            $table->text('isi_laporan');
            $table->timestamp('tanggal_laporan')->useCurrent();
            $table->boolean('anonim')->default(false);

            // Foreign Keys
            $table->foreignId('id_user')
                  ->constrained('users', 'id_user')
                  ->onDelete('cascade');

            $table->foreignId('id_kategori')
                  ->nullable()
                  ->constrained('kategori', 'id_kategori')
                  ->nullOnDelete();

            $table->foreignId('id_status')
                  ->nullable()
                  ->constrained('status_laporan', 'id_status')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
