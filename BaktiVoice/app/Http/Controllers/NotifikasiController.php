<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
     /**
     * Menampilkan notifikasi milik user yang sedang login.
     */
    public function index(Request $request)
    {

        $notifications = Notifikasi::where('id_user', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

            dd([
    'id_user_login' => Auth::id(),
    'jumlah_notifikasi' => $notifications->count(),
    'data_notifikasi' => $notifications->toArray(),
]);

        $totalCount = $notifications->count();

        $unreadCount = $notifications
            ->where('is_read', false)
            ->count();

        $viewName = $request->route()->parameter(
            'viewName',
            'notifikasi_admin'
        );

        return view($viewName, compact(
            'notifications',
            'totalCount',
            'unreadCount'
        ));
    }

    /**
     * Menandai satu notifikasi sebagai dibaca.
     */
    public function markAsRead($id)
    {
        $notif = Notifikasi::where('id_notifikasi', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $notif->update([
            'is_read' => true
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Menandai semua notifikasi sebagai dibaca.
     */
    public function markAllAsRead()
    {
        Notifikasi::where('id_user', Auth::id())
            ->where('is_read', false)
            ->update([
                'is_read' => true
            ]);

        return back()->with(
            'success',
            'Semua notifikasi berhasil ditandai sudah dibaca.'
        );
    }
}
