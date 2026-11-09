<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class MonitoringBkController extends Controller
{
    public function index()
    {
        // Query dasar: hanya laporan kategori Kesiswaan
        $query = Laporan::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Kesiswaan');
        });

        // Total laporan Kesiswaan
        $totalLaporan = (clone $query)->count();

        // Laporan berdasarkan status
        $pendingLaporan = (clone $query)
            ->where('status', 'pending')
            ->count();

        $diprosesLaporan = (clone $query)
            ->where('status', 'proses')
            ->count();

        $selesaiLaporan = (clone $query)
            ->where('status', 'selesai')
            ->count();

        $ditolakLaporan = (clone $query)
            ->where('status', 'ditolak')
            ->count();

        // Persentase kategori Kesiswaan
        $persenKesiswaan = $totalLaporan > 0 ? 100 : 0;

        return view('monitoring_bk', compact(
            'totalLaporan',
            'pendingLaporan',
            'diprosesLaporan',
            'selesaiLaporan',
            'ditolakLaporan',
            'persenKesiswaan'
        ));
    }
}
