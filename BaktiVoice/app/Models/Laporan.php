<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'id_status',
        'judul',
        'isi_laporan',
        'anonim',
        'bukti_url',
    ];

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'id_kategori',
            'id_kategori'
        );
    }

    // Relasi ke Status Laporan
    public function status()
    {
        return $this->belongsTo(
            StatusLaporan::class,
            'id_status',
            'id_status'
        );
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }

    // Relasi ke Tanggapan
    public function tanggapan()
    {
        return $this->hasMany(
            Tanggapan::class,
            'id_laporan',
            'id_laporan'
        );
    }
}
