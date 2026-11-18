<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class CetakLaporanController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();
        abort_unless($user, 403);

        $role = strtolower(trim($user->role ?? ''));

        $laporan = Laporan::with([
            'kategori',
            'user',
            'buktiLaporan',
            'tanggapan.user',
        ])->findOrFail($id);

        // Hak akses berdasarkan role
        if ($role === 'siswa') {
            abort_unless(
                (int) $laporan->id_user === (int) $user->getKey(),
                403,
                'Kamu hanya dapat mencetak laporan milik sendiri.'
            );
        } elseif ($role === 'admin') {
            // Admin dapat mencetak semua laporan.
        } elseif ($role === 'guru_bk') {
            abort_unless(
                $laporan->kategori?->nama_kategori === 'Kesiswaan',
                403,
                'Guru BK hanya dapat mencetak laporan kategori Kesiswaan.'
            );
        } else {
            $kategoriWakasek = [
                'wakasek kesiswaan' => 1,
                'wakasek kurikulum' => 2,
                'wakasek sarana' => 3,
                'wakasek dudi' => 4,
            ];

            abort_unless(
                isset($kategoriWakasek[$role]) &&
                (int) $laporan->id_kategori === $kategoriWakasek[$role],
                403,
                'Kamu tidak memiliki akses untuk mencetak laporan ini.'
            );
        }

        // Ambil bukti laporan, bukan lampiran tindak lanjut.
        $buktiList = $laporan->buktiLaporan
            ->filter(fn ($bukti) =>
                str_starts_with($bukti->file_path ?? '', 'uploads/laporan/')
            )
            ->values();

        // Dukungan untuk laporan lama yang menyimpan bukti di tabel laporan.
        if ($buktiList->isEmpty() && !empty($laporan->file_path)) {
            $buktiList = collect([
                (object) ['file_path' => $laporan->file_path]
            ]);
        }

        return view('cetak_laporan', compact(
            'laporan',
            'buktiList'
        ));
    }
}
