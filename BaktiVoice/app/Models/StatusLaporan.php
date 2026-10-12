<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusLaporan extends Model
{
    protected $table = 'status_laporan'; // Sesuaikan jika nama tabel di database Anda berbeda
    protected $primaryKey = 'id_status'; // Sesuaikan dengan primary key di database Anda
}
