<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    // Memberitahu Eloquent bahwa primary key tabel ini bukan 'id', melainkan 'id_notifikasi'
    protected $primaryKey = 'id_notifikasi';

    protected $fillable = [
    'id_user',
    'id_laporan',
    'judul',
    'pesan',
    'type',
    'is_read',
];

    public function user()
    {
        // Mendefinisikan foreign key kustom 'id_user'
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
