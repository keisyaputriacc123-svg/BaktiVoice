<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>500 - Terjadi Kendala Sistem | BaktiVoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4 font-sans text-slate-800">
    <div class="max-w-md w-full bg-white p-6 rounded-2xl border border-slate-200 shadow-xl text-center space-y-4">
        <div class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
            ⚠️
        </div>
        <div>
            <h1 class="text-xl font-black text-slate-900">Mohon Maaf, Terjadi Kendala (500)</h1>
            <p class="text-xs text-slate-500 mt-1">
                Sistem kami sedang mengalami gangguan koneksi sementara atau kendala pada server. Tim teknis telah menerima log laporan ini secara otomatis.
            </p>
        </div>
        <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-[11px] text-slate-600 text-left font-mono">
            Kode Insiden: BV-ERR-{{ date('YmdHis') }}<br>
            Status: Terisolasi Aman (Data Anda Tidak Hilang)
        </div>
        <div class="pt-2">
            <a href="{{ url('/') }}" class="inline-block w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
