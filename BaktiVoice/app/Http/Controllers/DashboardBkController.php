<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class DashboardBkController extends Controller
{
    public function index()
    {
        // Filter khusus laporan kategori Kesiswaan
        $queryLaporan = Laporan::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Kesiswaan');
        });

        // Statistik hanya menghitung laporan Kesiswaan
        $totalLaporan = (clone $queryLaporan)->count();

        $pendingLaporan = (clone $queryLaporan)
            ->where('status', 'pending')
            ->count();

        $diprosesLaporan = (clone $queryLaporan)
            ->where('status', 'proses')
            ->count();

        $selesaiLaporan = (clone $queryLaporan)
            ->where('status', 'selesai')
            ->count();

        $ditolakLaporan = (clone $queryLaporan)
            ->where('status', 'ditolak')
            ->count();

        // Mengambil 5 laporan Kesiswaan terbaru
        $laporanTerbaru = (clone $queryLaporan)
            ->with('kategori')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard_bk', compact(
            'totalLaporan',
            'pendingLaporan',
            'diprosesLaporan',
            'selesaiLaporan',
            'ditolakLaporan',
            'laporanTerbaru'
        ));
    }
}
