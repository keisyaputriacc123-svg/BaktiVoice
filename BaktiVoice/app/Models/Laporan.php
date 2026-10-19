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
        'id_status',   // Wajib ada agar id_status tidak null
        'judul_laporan',
        'isi_laporan',
        'anonim',
        'bukti_url',
    ];

    // Relasi ke Kategori
public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori'); // Sesuaikan primary key kategori di db
}

// Relasi ke Status Laporan
            public function status()
{
    return $this->belongsTo(StatusLaporan::class, 'id_status', 'id_status'); // Sesuaikan primary key status di db
}

// Relasi ke User (Pelapor)
public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id_user');
}

/// Relasi ke Tanggapan
public function tanggapan()
{
    return $this->hasMany(Tanggapan::class, 'id_laporan', 'id_laporan');
}
}
