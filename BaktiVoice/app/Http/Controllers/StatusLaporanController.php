<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StatusLaporan;
use App\Models\Laporan;

class StatusLaporanController extends Controller
{
    /**
     * Menampilkan halaman daftar status laporan (Data Master).
     */
    public function index()
    {
        $statusLaporan = StatusLaporan::all();

        // Sesuaikan karena file blade berada di langsung di dalam views/
        return view('data_master', compact('statusLaporan'));
    }

    public function store(Request $request)
    {
        // 1. Validasi hanya untuk nama_status saja
        $request->validate([
            'nama_status' => 'required|string|max:255',
        ]);

        // 2. Simpan ke database
        StatusLaporan::create([
            'nama_status' => $request->nama_status,
            'tampilan_badge' => 'bg-blue-100 text-blue-800',
            'deskripsi_keterangan' => 'Status laporan baru',
        ]);

        // 3. Redirect kembali ke halaman data master tab status
        return redirect()
            ->route('data_master', ['tab' => 'status'])
            ->with('success', 'Status laporan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $status = StatusLaporan::findOrFail($id);
        return view('edit_status', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_status' => 'required|string|max:255',
            'badge'       => 'nullable|string|max:100',
            'deskripsi'   => 'required|string',
        ]);

        $status = StatusLaporan::findOrFail($id);
        $status->update([
            'nama_status' => $request->nama_status,
            'badge'       => $request->badge,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('data_master')->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $status = StatusLaporan::findOrFail($id);
        $status->delete();

        return redirect()->route('data_master')->with('success', 'Status laporan berhasil dihapus!');
    }

    /**
     * KHUSUS: Mengubah status laporan dari halaman detail admin (laporan_admin.blade.php)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required',
        ]);

        // Cari laporan berdasarkan primary key 'id_laporan' di database Supabase
        $laporan = Laporan::where('id_laporan', $id)->firstOrFail();

        // Simpan perubahan ke kolom id_status
        $laporan->id_status = $request->status_id;
        $laporan->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }
}
