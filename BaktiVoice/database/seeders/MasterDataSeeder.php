<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class MasterDataSeeder extends Seeder
{
    public function run()
    {
        // Seed Kategori Utama
        $kategoris = [
            ['nama_kategori' => 'Kesiswaan', 'penanggung_jawab' => 'wakasek kesiswaan / guru_bk'],
            ['nama_kategori' => 'Kurikulum', 'penanggung_jawab' => 'wakasek kurikulum'],
            ['nama_kategori' => 'Sarana', 'penanggung_jawab' => 'wakasek sarana'],
            ['nama_kategori' => 'DUDI', 'penanggung_jawab' => 'wakasek dudi'],
        ];

        foreach ($kategoris as $kat) {
            Kategori::firstOrCreate(['nama_kategori' => $kat['nama_kategori']], $kat);
        }
    }
}
