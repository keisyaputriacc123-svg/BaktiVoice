<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class LaporanSiswaBkController extends Controller
{
    // Menampilkan laporan khusus kategori Kesiswaan
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        // WAJIB: Hanya mengambil laporan kategori Kesiswaan
        $query = Laporan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Kesiswaan');
            })
            ->latest();

        // Pencarian laporan
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi_laporan', 'like', "%{$search}%"); // Diperbarui dari 'deskripsi' ke 'isi_laporan'
            });
        }

        // Filter status
        if ($status) {
            $query->whereRaw('status::text ILIKE ?', [$status]);
        }
        // Pagination
        $laporanList = $query->paginate(5)->withQueryString();

        // Dropdown hanya menampilkan kategori Kesiswaan
        $kategoriList = Kategori::where(
            'nama_kategori',
            'Kesiswaan'
        )->get();

        return view(
            'LaporanSiswa_bk',
            compact('laporanList', 'kategoriList')
        );
    }

    // Detail laporan hanya boleh dibuka jika kategorinya Kesiswaan
    public function show($id)
    {
        $laporan = Laporan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Kesiswaan');
            })
            ->findOrFail($id);

        return view('detail_laporan_bk', compact('laporan'));
    }

   // Menyimpan tindak lanjut Guru BK ke tabel tanggapan
    public function updateTindakLanjut(Request $request, $id)
    {
        $request->validate([
            'tindak_lanjut' => 'required|string',
        ]);

        // Pastikan laporan termasuk kategori Kesiswaan
        $laporan = Laporan::whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Kesiswaan');
            })
            ->findOrFail($id);

        \App\Models\Tanggapan::create([
            'id_laporan' => $id,
            'id_user'    => Auth::id() ?? 1,
            'tanggapan'  => $request->tindak_lanjut,
        ]);

        return redirect()
            ->route('detail_laporan_bk', $id)
            ->with('success', 'Catatan tindak lanjut berhasil disimpan!');
    }
}
