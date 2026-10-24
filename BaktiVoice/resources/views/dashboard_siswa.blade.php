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
    --primary-hover: #7b94d1;
    --background: #eaf1fb;
    --card-bg: #ffffff;
    --border: rgba(186, 210, 240, 0.5);
    --text-main: #2c4a8e;
    --text-muted: #64748b;

    --font-family: 'Inter', sans-serif;

    --sidebar-width: 250px;
    --topbar-height: 70px;
    --radius: 12px;

    --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);
    --gradient-pastel: linear-gradient(
        135deg,
        #7b9fe8 0%,
        #9bc3f8 50%,
        #b8d7ff 100%
    );
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: var(--font-family);
}

body {
    background-color: var(--background);
    color: var(--text-main);
    display: flex;
    min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: var(--sidebar-width);
    background: var(--gradient-pastel);
    border-right: 1px solid rgba(255, 255, 255, 0.4);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100;
    padding: 24px 16px;
    overflow-y: auto;
    box-shadow: 4px 0 20px rgba(123, 159, 232, 0.15);
}

.brand {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0 12px 24px 12px;
}

.brand-logo-img {
    width: 60px !important;
    height: 60px !important;
    max-width: 60px !important;
    background-color: #ffffff;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.brand-name {
    font-size: 20px;
    font-weight: 800;
    color: #1e3a70;
}

.nav-menu {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.nav-item a {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 12px 16px;
    color: #274472;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border-radius: 10px;
    transition: all 0.25s ease;
}

.nav-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nav-item a:hover {
    background-color: rgba(255, 255, 255, 0.4);
    color: #102a56;
    transform: translateX(4px);
}

.nav-item.active > a {
    background-color: #ffffff;
    color: #3b62ac;
    font-weight: 700;
    box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
}

.nav-item i {
    font-size: 16px;
    width: 20px;
    text-align: center;
}


    /* LOGOUT */

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px 16px;

            color: #e11d48;
            text-decoration: none;

            font-weight: 700;
            font-size: 14px;

            border-radius: 10px;

            transition: all 0.2s ease;

            margin-top: 16px;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }


/* MAIN WRAPPER */
.main-wrapper {
    margin-left: var(--sidebar-width);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: var(--background);
}

/* TOPBAR */
.topbar {
    height: var(--topbar-height);
    background: var(--gradient-pastel);
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 0 36px;
    gap: 20px;
    position: sticky;
    top: 0;
    z-index: 90;
    box-shadow: 0 4px 15px rgba(123, 159, 232, 0.12);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 30px;
    transition: background 0.2s;
}

.user-profile:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

.avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #3b62ac;
    font-size: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.user-name {
    font-size: 14px;
    font-weight: 700;
    color: #1e3a70;
}

/* TOPBAR */
.topbar {
    height: var(--topbar-height);
    background: var(--gradient-pastel);
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 0 36px;
    gap: 20px;
    position: sticky;
    top: 0;
    z-index: 90;
    box-shadow: 0 4px 15px rgba(123, 159, 232, 0.12);
}

.topbar-icon {
    color: #274472;
    font-size: 18px;
    cursor: pointer;
    position: relative;
    padding: 8px;
    border-radius: 50%;
    transition: all 0.2s ease;
}

.topbar-icon:hover {
    background-color: rgba(255, 255, 255, 0.4);
    color: #102a56;
}

/* MAIN CONTENT */
.content {
    padding: 36px;
    flex: 1;
    background-color: var(--background);
}

/* WELCOME SECTION */
.welcome-section {
    background: var(--gradient-pastel);
    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: var(--radius);
    padding: 32px 36px;
    margin-bottom: 28px;
    box-shadow: 0 4px 20px rgba(123, 159, 232, 0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.welcome-title {
    font-size: 28px;
    font-weight: 800;
    color: #1e3a70;
    margin-bottom: 6px;
}

.welcome-text {
    font-size: 15px;
    color: #274472;
    font-weight: 500;
    margin-bottom: 0;
}

.btn-create-report {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    background: linear-gradient(135deg, #628cdb 0%, #4772c7 100%);
    color: #ffffff;
    text-decoration: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(98, 140, 219, 0.35);
    transition: all 0.25s ease;
}

.btn-create-report:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(98, 140, 219, 0.45);
}

/* STATS */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 36px;
}

.stat-card {
    background-color: #ffffff;
    border: 1px solid rgba(186, 210, 240, 0.6);
    border-radius: var(--radius);
    padding: 24px;
    text-align: center;
    box-shadow: var(--shadow);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(123, 159, 232, 0.18);
}

.stat-title {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-muted);
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.stat-value {
    font-size: 32px;
    font-weight: 800;
}

.stat-card.total .stat-value { color: #1e3a70; }
.stat-card.diproses .stat-value { color: #d97706; }
.stat-card.selesai .stat-value { color: #16a34a; }
.stat-card.ditolak .stat-value { color: #dc2626; }

/* DAFTAR LAPORAN */
.section-header {
    font-size: 22px;
    font-weight: 700;
    color: #1e3a70;
    margin-bottom: 16px;
}

.report-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.report-card {
    background-color: #ffffff;
    border: 1px solid rgba(186, 210, 240, 0.6);
    border-radius: var(--radius);
    padding: 18px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--shadow);
    transition: all 0.25s ease;
}

.report-card:hover {
    border-color: #7b9fe8;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(123, 159, 232, 0.18);
}

.report-info-group {
    display: flex;
    align-items: center;
    gap: 16px;
}

.report-thumbnail {
    width: 52px;
    height: 52px;
    background-color: #f1f5f9;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 20px;
    border: 1px solid var(--border);
    overflow: hidden;
}

.report-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.report-details {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.report-title {
    font-size: 15px;
    font-weight: 700;
    color: #1e3a70;
}

.report-date {
    font-size: 12px;
    color: var(--text-muted);
}

/* STATUS BADGE */
.status-badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.badge-diproses { background-color: #fef3c7; color: #b45309; }
.badge-selesai { background-color: #dcfce7; color: #15803d; }
.badge-ditolak { background-color: #fee2e2; color: #b91c1c; }

.btn-detail {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 16px;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    transition: background 0.2s;
}

.btn-detail:hover {
    background-color: #f1f5f9;
    color: var(--text-main);
}

/* RESPONSIVE */
@media (max-width: 1000px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
    .sidebar { width: 70px; padding: 16px 8px; }
    .brand-name, .nav-item span, .logout-btn span { display: none !important; }
    .main-wrapper { margin-left: 70px; }
    .content { padding: 20px; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 550px) {
    .topbar { padding: 0 16px; }
    .user-name { display: none; }
    .stats-grid { grid-template-columns: 1fr; }
    .welcome-title { font-size: 24px; }
}


    </style>
</head>


<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="brand">
                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >
                <span class="brand-name">BaktiVoice</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('dashboard_siswa') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('buat_laporan') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Buat Laporan</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('riwayat_laporan') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Riwayat Laporan</span>
                        </div>
                    </a>
                </li>

<li class="nav-item">


    <a href="{{ route('notifikasi_siswa') }}">


                        <div class="nav-content">

                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
                        </div>

                    </a>

                </li>

                <li class="nav-item">
                    <a href="{{ route('profil_siswa') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-user"></i>
                            <span>Profil</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

<a href="{{ route('login') }}" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
</a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">


        <!-- TOPBAR -->
<header class="topbar">
    <a href="{{ route('notifikasi_siswa') }}" class="topbar-icon" title="Notifikasi">
        <i class="fa-regular fa-bell"></i>
    </a>

    <div class="user-profile">
        <div class="avatar"><i class="fa-regular fa-user"></i></div>
        <span class="user-name">{{ Auth::user()->name ?? 'Nama Siswa' }}</span>
    </div>
</header>

        <!-- MAIN CONTENT -->
        <main class="content">

            <!-- WELCOME SECTION (Udah dibersihin dari duplikat) -->
            <section class="welcome-section">
                <div class="welcome-content">
                    <h1 class="welcome-title">
                        Hello, {{ Auth::user()->name ?? 'Siswa' }}!
                    </h1>
                    <p class="welcome-text">
                        Sampaikan Keluhan atau Saranmu di Sini
                    </p>
                </div>
                <a href="{{ route('buat_laporan') }}" class="btn-create-report">
                    <i class="fa-solid fa-plus"></i>
                    Buat Laporan
                </a>
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
                                        'proses', 'diproses' => 'badge-diproses',
                                        'selesai' => 'badge-selesai',
                                        'ditolak' => 'badge-ditolak',
                                        default => 'badge-pending'
                                    };
                                @endphp
                                <span class="status-badge {{ $badgeClass }}">{{ $statusName }}</span>
                                <a href="{{ route('konfirmasi_laporan', ['id' => $laporan->id_laporan]) }}" class="btn-detail" title="Detail">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
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
