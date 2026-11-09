<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Menampilkan halaman notifikasi secara dinamis berdasarkan role/view yang diakses.
     */
    public function index(Request $request)
    {
        // Ambil notifikasi milik user yang sedang login
        $notifications = Notifikasi::where('id_user', Auth::id())
            ->latest()
            ->get();

        // Hitung statistik dinamis berdasarkan data database
        $totalCount  = $notifications->count();
        $unreadCount = $notifications->where('is_read', false)->count();

        // Mengambil nama view yang dikirimkan dari route (default ke 'notifikasi_admin' jika kosong)
        $viewName = $request->route()->parameter('viewName', 'notifikasi_admin');

        return view($viewName, compact('notifications', 'totalCount', 'unreadCount'));
    }

    // Tandai 1 Notifikasi Dibaca
    public function markAsRead($id)
    {
        $notif = Notifikasi::where('id_notifikasi', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $notif->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    // Tandai Semua Notifikasi Dibaca
    public function markAllAsRead()
    {
        Notifikasi::where('id_user', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}
