<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriLaporanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Simpan ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // Redirect kembali ke halaman data master dengan tab kategori
        return redirect('/data_master?tab=kategori')->with('success', 'Kategori laporan berhasil ditambahkan!');
    }
}
