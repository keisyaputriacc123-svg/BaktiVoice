<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'id_status',
        'judul_laporan',
        'isi_laporan',
    ];
}
