<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Sarana',
                'penanggung_jawab' => 'wakasek sarana', // sesuaikan nama kolom di database kamu
            ],
            [
                'nama_kategori' => 'Dudi',
                'penanggung_jawab' => 'wakasek dudi',
            ],
            [
                'nama_kategori' => 'Kurikulum',
                'penanggung_jawab' => 'wakasek kurikulum',
            ],
            [
                'nama_kategori' => 'Kesiswaan',
                'penanggung_jawab' => 'wakasek kesiswaan',
            ],
        ];

        foreach ($categories as $category) {
            // updateOrCreate mencegah data terduplikat jika seeder dijalankan ulang
            Kategori::updateOrCreate(
                ['nama_kategori' => $category['nama_kategori']],
                $category
            );
        }
    }
}
