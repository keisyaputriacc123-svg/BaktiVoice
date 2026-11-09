<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Laporan;
use App\Models\User;

class DashboardWakasekController extends Controller
{
    public function index($bidang = 'kesiswaan')
    {
        // Pemetaan bidang ke angka id_kategori di database
        $mappingId = [
            'kesiswaan' => 1,
            'kurikulum' => 2,
            'sarana'    => 3,
            'dudi'      => 4,
        ];

        $idKategori = $mappingId[$bidang] ?? 1;

        $roleMap = [
            'kesiswaan' => 'wakasek kesiswaan',
            'kurikulum' => 'wakasek kurikulum',
            'sarana'    => 'wakasek sarana',
            'dudi'      => 'wakasek dudi',
        ];
        $role = $roleMap[$bidang] ?? 'wakasek kesiswaan';

        // Query menggunakan id_kategori berupa angka dan status laporan
        $total = Laporan::where('id_kategori', $idKategori)->count();
        $pending = Laporan::where('id_kategori', $idKategori)->where('status', 'pending')->count();
        $diproses = Laporan::where('id_kategori', $idKategori)->where('status', 'proses')->count();
        $selesai = Laporan::where('id_kategori', $idKategori)->where('status', 'selesai')->count();
        $ditolak = Laporan::where('id_kategori', $idKategori)->where('status', 'ditolak')->count();

        $laporanTerbaru = Laporan::where('id_kategori', $idKategori)
                                ->latest()
                                ->take(5)
                                ->get();

        $rekapKategori = [
            ['nama' => 'Kesiswaan', 'jumlah' => Laporan::where('id_kategori', 1)->count()],
            ['nama' => 'Kurikulum', 'jumlah' => Laporan::where('id_kategori', 2)->count()],
            ['nama' => 'Sarana dan Prasarana', 'jumlah' => Laporan::where('id_kategori', 3)->count()],
            ['nama' => 'DUDI', 'jumlah' => Laporan::where('id_kategori', 4)->count()],
        ];

        $user = Auth::user();

        return view('dashboard_wakasek', compact(
            'total', 'pending', 'diproses', 'selesai', 'ditolak',
            'laporanTerbaru', 'rekapKategori', 'role', 'user'
        ));
    }

    // Menampilkan Rekap
    public function rekap($bidang = 'kesiswaan')
    {
        $mappingId = [
            'kesiswaan' => 1,
            'kurikulum' => 2,
            'sarana'    => 3,
            'dudi'      => 4,
        ];

        $idKategori = $mappingId[$bidang] ?? 1;

        $roleMap = [
            'kesiswaan' => 'wakasek kesiswaan',
            'kurikulum' => 'wakasek kurikulum',
            'sarana'    => 'wakasek sarana',
            'dudi'      => 'wakasek dudi',
        ];
        $role = $roleMap[$bidang] ?? 'wakasek kesiswaan';

        $laporanList = Laporan::where('id_kategori', $idKategori)->latest()->get();

        $total = $laporanList->count();
        $pending = $laporanList->where('status', 'pending')->count();
        $diproses = $laporanList->where('status', 'proses')->count();
        $selesai = $laporanList->where('status', 'selesai')->count();
        $ditolak = $laporanList->where('status', 'ditolak')->count();

        $user = Auth::user();

        return view('rekap_wakasek', compact(
            'laporanList', 'total', 'pending', 'diproses', 'selesai', 'ditolak', 'role', 'user', 'bidang'
        ));
    }

    // Method shortcut untuk Dashboard
    public function kesiswaan() { return $this->index('kesiswaan'); }
    public function kurikulum() { return $this->index('kurikulum'); }
    public function sarana() { return $this->index('sarana'); }
    public function dudi() { return $this->index('dudi'); }

    // Method shortcut untuk Rekap
    public function rekapKesiswaan() { return $this->rekap('kesiswaan'); }
    public function rekapKurikulum() { return $this->rekap('kurikulum'); }
    public function rekapSarana() { return $this->rekap('sarana'); }
    public function rekapDudi() { return $this->rekap('dudi'); }

    // Method Detail Laporan
    public function detailLaporan($id)
    {
        $user = Auth::user();
        $laporan = Laporan::findOrFail($id);

        $mapKategori = [
            1 => 'wakasek kesiswaan',
            2 => 'wakasek kurikulum',
            3 => 'wakasek sarana',
            4 => 'wakasek dudi',
        ];

        $role = $mapKategori[$laporan->id_kategori] ?? ($user->role ?? 'wakasek kesiswaan');

        return view('detail_laporan_wakasek', compact('laporan', 'role', 'user'));
    }

    // Method Simpan Tanggapan & Upload Bukti Gambar
    public function simpanTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|max:2000',
            'bukti_tanggapan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $laporan = Laporan::findOrFail($id);

        $dataUpdate = [
            'tanggapan' => $request->tanggapan,
            'status'    => 'proses',
        ];

        if ($request->hasFile('bukti_tanggapan')) {
            if (!empty($laporan->bukti_tanggapan) && Storage::disk('public')->exists($laporan->bukti_tanggapan)) {
                Storage::disk('public')->delete($laporan->bukti_tanggapan);
            }

            $path = $request->file('bukti_tanggapan')->store('tanggapan', 'public');
            $dataUpdate['bukti_tanggapan'] = $path;
        }

        $laporan->update($dataUpdate);

        return back()->with('success', 'Tindak lanjut dan tanggapan berhasil disimpan!');
    }

    // Menampilkan Monitoring
    public function monitoring($bidang = 'kesiswaan')
    {
        $mappingId = [
            'kesiswaan' => 1,
            'kurikulum' => 2,
            'sarana'    => 3,
            'dudi'      => 4,
        ];

        $idKategori = $mappingId[$bidang] ?? 1;

        $roleMap = [
            'kesiswaan' => 'wakasek kesiswaan',
            'kurikulum' => 'wakasek kurikulum',
            'sarana'    => 'wakasek sarana',
            'dudi'      => 'wakasek dudi',
        ];
        $role = $roleMap[$bidang] ?? 'wakasek kesiswaan';

        $laporanList = Laporan::where('id_kategori', $idKategori)->latest()->get();

        $total = $laporanList->count();
        $pending = $laporanList->where('status', 'pending')->count();
        $diproses = $laporanList->where('status', 'proses')->count();
        $selesai = $laporanList->where('status', 'selesai')->count();
        $ditolak = $laporanList->where('status', 'ditolak')->count();

        $user = Auth::user();

        return view('monitoring_wakasek', compact(
            'laporanList', 'total', 'pending', 'diproses', 'selesai', 'ditolak', 'role', 'user', 'bidang'
        ));
    }

    // Method shortcut routing untuk Monitoring
    public function monitoringKesiswaan() { return $this->monitoring('kesiswaan'); }
    public function monitoringKurikulum() { return $this->monitoring('kurikulum'); }
    public function monitoringSarana() { return $this->monitoring('sarana'); }
    public function monitoringDudi() { return $this->monitoring('dudi'); }

    // Menampilkan Notifikasi
    public function notifikasi($bidang = 'kesiswaan')
    {
        $mappingId = [
            'kesiswaan' => 1,
            'kurikulum' => 2,
            'sarana'    => 3,
            'dudi'      => 4,
        ];

        $idKategori = $mappingId[$bidang] ?? 1;

        $roleMap = [
            'kesiswaan' => 'wakasek kesiswaan',
            'kurikulum' => 'wakasek kurikulum',
            'sarana'    => 'wakasek sarana',
            'dudi'      => 'wakasek dudi',
        ];
        $role = $roleMap[$bidang] ?? 'wakasek kesiswaan';

        $notifikasiBidang = \App\Models\Notifikasi::where('id_kategori', $idKategori)
                            ->latest()
                            ->get();

        $user = Auth::user();

        return view('notifikasi_wakasek', compact('notifikasiBidang', 'role', 'user', 'bidang'));
    }

    // Method shortcut routing notifikasi per bidang
    public function notifikasiKesiswaan() { return $this->notifikasi('kesiswaan'); }
    public function notifikasiKurikulum() { return $this->notifikasi('kurikulum'); }
    public function notifikasiSarana() { return $this->notifikasi('sarana'); }
    public function notifikasiDudi() { return $this->notifikasi('dudi'); }

    // Method aksi tanda dibaca
    public function tandaiDibaca($id)
    {
        $notif = \App\Models\Notifikasi::find($id);
        if ($notif) {
            $notif->update(['unread' => false]);
        }
        return response()->json(['success' => true]);
    }

    public function tandaiSemuaDibaca()
    {
        return response()->json(['success' => true]);
    }

    // Menampilkan halaman profil wakasek
    public function profil()
    {
        $user = Auth::user();
        $role = strtolower(trim($user->role ?? 'wakasek kesiswaan'));
        return view('profil_wakasek', compact('user', 'role'));
    }

    // Menyimpan pembaruan informasi profil
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
        ]);

        \App\Models\User::where('id_user', $user->id_user)->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Informasi profil berhasil diperbarui!');
    }

    // Menyimpan pembaruan password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama yang kamu masukkan salah.']);
        }


        \App\Models\User::where('id_user', $user->id_user)->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return back()->with('success_password', 'Password berhasil diubah!');
    }
}
