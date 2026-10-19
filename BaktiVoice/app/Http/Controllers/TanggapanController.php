<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        Tanggapan::create([
            'id_laporan' => $id,
            'id_user'    => Auth::id() ?? 1, // Menggunakan ID user yang sedang login
            'tanggapan'  => $request->tanggapan,
        ]);

        return redirect()->back()->with('success', 'Tanggapan berhasil dikirim!');
    }
}
