<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    // Beritahu Laravel bahwa primary key tabel ini adalah 'id_kategori'
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'penanggung_jawab',
    ];
}
