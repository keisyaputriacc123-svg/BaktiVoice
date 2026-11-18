<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiLaporan extends Model
{
    use HasFactory;

    protected $table = 'bukti_laporan';
    protected $primaryKey = 'id_bukti';

    const UPDATED_AT = null;
    protected $fillable = [
        'id_laporan',
        'id_user',
        'file_path',
    ];

    // Relasi balik ke Laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan', 'id_laporan');
    }

    // Relasi ke User pengunggah bukti
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
