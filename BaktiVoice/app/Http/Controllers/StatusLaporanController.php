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
        'status' => 'required|in:pending,proses,selesai,ditolak',
        'tanggapan' => 'nullable|string|max:2000',
    ]);

    // Cari laporan
    $laporan = Laporan::where('id_laporan', $id)->firstOrFail();

    // Simpan perubahan status
    $laporan->status = $request->status;
    $laporan->save();

    // Ambil tanggapan dari form
    $isiTanggapan = trim($request->tanggapan ?? '');

    // Ambil tanggapan terakhir
    $tanggapanTerakhir = $laporan->tanggapan()
        ->orderByDesc('id_tanggapan')
        ->first();

    // Simpan hanya jika tanggapan benar-benar baru atau berubah
    if (
        $isiTanggapan !== '' &&
        $isiTanggapan !== trim($tanggapanTerakhir?->tanggapan ?? '')
    ) {
        // Simpan tanggapan
        $tanggapanBaru = new \App\Models\Tanggapan();

        $tanggapanBaru->id_laporan = $laporan->id_laporan;
        $tanggapanBaru->id_user = auth()->id();
        $tanggapanBaru->tanggapan = $isiTanggapan;
        $tanggapanBaru->created_at = now();
        $tanggapanBaru->save();

        // Kirim notifikasi kepada siswa
        \App\Models\Notifikasi::create([
            'id_user' => $laporan->id_user,
            'id_laporan' => $laporan->id_laporan,
            'judul' => 'Tanggapan Baru',
            'pesan' => (auth()->user()?->name ?? 'Admin Sekolah')
                . ' memberikan tanggapan pada laporan "'
                . $laporan->judul . '".',
            'type' => 'tanggapan',
            'is_read' => false,
        ]);
    }

    return redirect()->back()->with(
        'success',
        'Status dan tanggapan laporan berhasil diperbarui!'
    );
}
}

