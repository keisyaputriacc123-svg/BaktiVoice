<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|exists:status_laporan,id_status',
        ]);

        $laporan = Laporan::findOrFail($id);

        $laporan->id_status = $request->id_status;
        $laporan->save();

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
