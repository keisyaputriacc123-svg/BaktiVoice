<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Laporan;

class LaporanPolicy
{
    /**
     * S3-01: Menentukan apakah pengguna boleh melihat rincian laporan tertentu
     */
    public function view(User $user, Laporan $laporan): bool
    {
        // 1. Admin, Guru BK, dan Semua jenis Wakasek diizinkan melihat seluruh laporan
        if (in_array($user->role, [
            'admin',
            'guru_bk',
            'wakasek kurikulum',
            'wakasek kesiswaan',
            'wakasek sarana',
            'wakasek dudi'
        ])) {
            return true;
        }

        // 2. Siswa HANYA diizinkan melihat laporan miliknya sendiri (Anti-IDOR)
        return $user->id_user === $laporan->id_user;
    }
}
