<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Dashboard Siswa</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --primary-hover: #0f172a;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-muted: #64748b;

            --font-family: 'Inter', sans-serif;

            --sidebar-width: 250px;
            --topbar-height: 70px;

            --radius: 12px;
            --shadow: 0 1px 3px 0 rgba(119, 5, 5, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: var(--font-family); }
        body { background-color: var(--background); color: var(--text-main); display: flex; min-height: 100vh; }
        .sidebar { width: var(--sidebar-width); background-color: var(--card-bg); border-right: 1px solid var(--border); display: flex; flex-direction: column; justify-content: space-between; position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; padding: 24px 16px; overflow-y: auto; }
        .brand { display: flex; align-items: center; gap: 12px; padding: 0 12px 24px 12px; }
        .brand-logo-img { width: 60px !important; height: 60px !important; border-radius: 8px; object-fit: cover; }
        .brand-name { font-size: 20px; font-weight: 800; color: var(--text-main); }
        .nav-menu { list-style: none; display: flex; flex-direction: column; gap: 6px; }
        .nav-item a { display: flex; align-items: center; width: 100%; padding: 12px 16px; color: var(--text-muted); text-decoration: none; font-weight: 500; font-size: 14px; border-radius: 8px; transition: all 0.2s ease; }
        .nav-content { display: flex; align-items: center; gap: 12px; }
        .nav-item a:hover { background-color: #f1f5f9; color: var(--text-main); }
        .nav-item.active > a { background-color: var(--primary); color: #ffffff; font-weight: 600; }
        .nav-item i { font-size: 16px; width: 20px; text-align: center; }
        .logout-btn { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #ef4444; text-decoration: none; font-weight: 600; font-size: 14px; border-radius: 8px; transition: background 0.2s; margin-top: 16px; }
        .logout-btn:hover { background-color: #fef2f2; }
        .main-wrapper { margin-left: var(--sidebar-width); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }
        .topbar { height: var(--topbar-height); background-color: var(--card-bg); border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: flex-end; padding: 0 36px; gap: 20px; position: sticky; top: 0; z-index: 90; }
        .user-profile { display: flex; align-items: center; gap: 12px; }
        .avatar { width: 38px; height: 38px; border-radius: 50%; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; color: var(--text-muted); }
        .user-name { font-size: 14px; font-weight: 600; color: var(--text-main); }
        .content { padding: 36px; flex: 1; }
        .welcome-section { margin-bottom: 28px; }
        .welcome-title { font-size: 30px; font-weight: 800; color: #1e293b; margin-bottom: 4px; }
        .welcome-text { font-size: 16px; color: var(--text-muted); margin-bottom: 18px; }
        .btn-create-report { display: inline-flex; align-items: center; gap: 8px; padding: 12px 20px; background-color: var(--primary); color: #ffffff; text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: 600; transition: all 0.2s ease; }

        /* Ubah grid statistik menjadi 5 kolom agar muat untuk Total, Pending, Diproses, Selesai, Ditolak */
        .stats-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; margin-bottom: 36px; }

        .stat-card { background-color: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); padding: 20px; text-align: center; box-shadow: var(--shadow); }
        .stat-title { font-size: 12px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; }
        .stat-value { font-size: 28px; font-weight: 800; }
        .stat-card.total .stat-value { color: #1e293b; }
        .stat-card.pending .stat-value { color: #4b5563; }
        .stat-card.diproses .stat-value { color: #d97706; }
        .stat-card.selesai .stat-value { color: #16a34a; }
        .stat-card.ditolak .stat-value { color: #dc2626; }

        .section-header { font-size: 22px; font-weight: 700; color: #1e293b; margin-bottom: 16px; }
        .report-list { display: flex; flex-direction: column; gap: 12px; }
        .report-card { background-color: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow); }
        .report-info-group { display: flex; align-items: center; gap: 16px; }
        .report-thumbnail { width: 52px; height: 52px; background-color: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); overflow: hidden; border: 1px solid var(--border); }
        .report-thumbnail img { width: 100%; height: 100%; object-fit: cover; }
        .report-title { font-size: 15px; font-weight: 700; color: #1e293b; }
        .report-date { font-size: 12px; color: var(--text-muted); }
        .status-badge { padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-flex; }
        .badge-pending { background-color: #f3f4f6; color: #4b5563; }
        .badge-diproses { background-color: #fef3c7; color: #b45309; }
        .badge-selesai { background-color: #dcfce7; color: #15803d; }
        .badge-ditolak { background-color: #fee2e2; color: #b91c1c; }
        .btn-detail { background: none; border: none; color: var(--text-muted); font-size: 16px; cursor: pointer; padding: 8px; border-radius: 6px; }
    </style>
</head>


<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>


            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>



            <ul class="nav-menu">
                <li class="nav-item active"><a href="{{ route('dashboard_siswa') }}"><div class="nav-content"><i class="fa-solid fa-house"></i><span>Dashboard</span></div></a></li>
                <li class="nav-item"><a href="{{ route('buat_laporan') }}"><div class="nav-content"><i class="fa-regular fa-file-lines"></i><span>Buat Laporan</span></div></a></li>
                <li class="nav-item"><a href="{{ route('riwayat_laporan') }}"><div class="nav-content"><i class="fa-solid fa-clock-rotate-left"></i><span>Riwayat Laporan</span></div></a></li>
            </ul>


        </div>

        <a href="{{ route('login') }}" class="logout-btn"><i class="fa-solid fa-xmark"></i><span>Logout</span></a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">




        <header class="topbar">


            <div class="user-profile">
                <div class="avatar"><i class="fa-regular fa-user"></i></div>
                <span class="user-name">{{ Auth::user()->name ?? 'Nama Siswa' }}</span>
            </div>

        </header>





        <main class="content">



            <section class="welcome-section">
                <h1 class="welcome-title">Hello, {{ Auth::user()->name ?? 'Siswa' }}!</h1>
                <p class="welcome-text">Sampaikan Keluhan atau Saranmu di Sini</p>
                <a href="{{ route('buat_laporan') }}" class="btn-create-report"><i class="fa-solid fa-plus"></i> Buat Laporan</a>
            </section>

            <!-- STATISTIK DINAMIS (TOTAL, PENDING, DIPROSES, SELESAI, DITOLAK) -->
            <section class="stats-grid">



                <div class="stat-card total">
                    <div class="stat-title">Total</div>
                    <div class="stat-value">{{ $totalLaporan }}</div>
                </div>
                <div class="stat-card pending">
                    <div class="stat-title">Pending</div>
                    <div class="stat-value">{{ $laporanPending }}</div>
                </div>



                <div class="stat-card diproses">
                    <div class="stat-title">Diproses</div>
                    <div class="stat-value">{{ $laporanDiproses }}</div>
                </div>



                <div class="stat-card selesai">
                    <div class="stat-title">Selesai</div>
                    <div class="stat-value">{{ $laporanSelesai }}</div>
                </div>




                <div class="stat-card ditolak">
                    <div class="stat-title">Ditolak</div>
                    <div class="stat-value">{{ $laporanDitolak }}</div>
                </div>


            </section>

            <!-- DAFTAR LAPORAN DINAMIS -->
            <section>
                <h2 class="section-header">Daftar Laporan Terbaru</h2>
                <div class="report-list">
                    @forelse($laporans as $laporan)
                        <div class="report-card">
                            <div class="report-info-group">
                                <div class="report-thumbnail">
                                    @if($laporan->bukti_url)
                                        <img src="{{ asset($laporan->bukti_url) }}" alt="Bukti">
                                    @else
                                        <i class="fa-regular fa-image"></i>
                                    @endif
                                </div>
                                <div class="report-details">
                                    <div class="report-title">{{ $laporan->judul_laporan }}</div>
                                    <div class="report-date">{{ $laporan->created_at->format('d M Y') }}</div>
                                </div>



                            </div>
                            <div class="report-actions">
                                @php
                                    $statusName = $laporan->status->nama_status ?? 'Pending';
                                    $badgeClass = match(strtolower($statusName)) {
                                        'proses' => 'badge-diproses',
                                        'selesai' => 'badge-selesai',
                                        'ditolak' => 'badge-ditolak',
                                        default => 'badge-pending'
                                    };
                                @endphp
                                <span class="status-badge {{ $badgeClass }}">{{ $statusName }}</span>
                                <a href="{{ route('konfirmasi_laporan', ['id' => $laporan->id_laporan]) }}" class="btn-detail" title="Detail"><i class="fa-solid fa-chevron-right"></i></a>
                            </div>




                        </div>
                    @empty
                        <p style="color: var(--text-muted); text-align: center; padding: 20px;">Belum ada laporan yang dikirim.</p>
                    @endforelse
                </div>


            </section>


        </main>


    </div>


</body>
</html>
