
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Dashboard Wakasek</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<style>
    :root {
        --primary: #96ace0;
        --primary-hover: #7b94d1;
        --background: #eaf1fb;
        --card-bg: #ffffff;
        --border: rgba(186, 210, 240, 0.6);
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
        --gradient-button: linear-gradient(
            135deg,
            #628cdb 0%,
            #4772c7 100%
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
        padding: 0 12px 24px;
    }

    .brand-logo-img {
        width: 60px;
        height: 60px;
        max-width: 60px;
        object-fit: contain;
        border-radius: 12px;
        background: #ffffff;
        padding: 3px;
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
        gap: 12px;
        width: 100%;
        padding: 12px 16px;

        color: #274472;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;

        border-radius: 10px;
        transition: all 0.25s ease;
    }

    .nav-item a:hover {
        background: rgba(255, 255, 255, 0.4);
        color: #102a56;
        transform: translateX(4px);
    }

    .nav-item.active a {
        background: #ffffff;
        color: #3b62ac;
        font-weight: 700;
        box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
    }

    .nav-item i {
        width: 20px;
        text-align: center;
        font-size: 16px;
    }

    .nav-notification {
    position: relative;
}

.nav-notification .notification-dot {
    position: absolute;
    top: 9px;
    left: 29px;
    width: 8px;
    height: 8px;
    background: #ef7777;
    border: 2px solid #ffffff;
    border-radius: 50%;
}

    /* LOGOUT */

    .logout-btn {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;

        border: none;
        border-radius: 10px;
        background: transparent;

        color: #e11d48;
        font-size: 14px;
        font-weight: 700;
        text-align: left;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .logout-btn:hover {
        background: rgba(255, 255, 255, 0.5);
        color: #be123c;
    }

    /* MAIN WRAPPER */

    .main-wrapper {
        margin-left: var(--sidebar-width);
        min-height: 100vh;
        background: var(--background);
    }

    /* TOPBAR */

    .topbar {
        height: var(--topbar-height);
        background: var(--gradient-pastel);
        border-bottom: 1px solid rgba(255, 255, 255, 0.4);

        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 20px;
        padding: 0 36px;

        position: sticky;
        top: 0;
        z-index: 90;

        box-shadow: 0 4px 15px rgba(123, 159, 232, 0.12);
    }

    .topbar-icon {
        color: #274472;
        font-size: 18px;
        padding: 8px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.2s;
    }

    .topbar-icon:hover {
        background: rgba(255, 255, 255, 0.4);
        color: #102a56;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 6px 12px;
        border-radius: 30px;
        transition: background 0.2s;
    }

    .user-profile:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .avatar {
        width: 38px;
        height: 38px;
        flex-shrink: 0;
        border-radius: 50%;

        background: #ffffff;
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

    /* MAIN CONTENT */

    .content {
        padding: 36px;
        min-height: calc(100vh - var(--topbar-height));
        background: var(--background);
    }

    .page-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e3a70;
        margin-bottom: 10px;
    }

    .welcome-text {
        font-size: 15px;
        color: var(--text-muted);
        margin-bottom: 28px;
        line-height: 1.7;
    }

    /* STATISTICS */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        text-align: center;
        box-shadow: var(--shadow);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
    }

    .stat-title {
        font-size: 12px;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-main);
    }

    .total .stat-value {
        color: #1e3a70;
    }

    .pending .stat-value {
        color: #64748b;
    }

    .diproses .stat-value {
        color: #d97706;
    }

    .selesai .stat-value {
        color: #16a34a;
    }

    .ditolak .stat-value {
        color: #dc2626;
    }

    /* SECTION */

    .section {
        margin-bottom: 36px;
    }

    .section-header {
        font-size: 22px;
        font-weight: 700;
        color: #1e3a70;
        margin-bottom: 16px;
    }

    /* CATEGORY RECAP */

    .category-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px 28px;

        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        box-shadow: var(--shadow);
    }

    .category-item {
        display: grid;
        grid-template-columns: 100px minmax(50px, 1fr) 24px;
        align-items: center;
        gap: 12px;
        font-size: 13px;
    }

    .category-name {
        color: var(--text-muted);
    }

    .bar-track {
        height: 9px;
        background: #edf1f8;
        border-radius: 20px;
        overflow: hidden;
    }

    .bar-fill {
        height: 100%;
        background: var(--gradient-pastel);
        border-radius: 20px;
        transition: width 0.3s ease;
    }

    .category-count {
        font-weight: 700;
        color: #2c4a8e;
        text-align: right;
    }

    /* LATEST REPORTS */

    .report-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .report-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;

        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 16px 20px;

        box-shadow: var(--shadow);
        transition: border-color 0.2s ease, transform 0.2s ease;
    }

    .report-card:hover {
        border-color: #7b9fe8;
        transform: translateY(-1px);
    }

    .report-info {
        display: flex;
        align-items: center;
        gap: 16px;
        min-width: 0;
    }

    .report-thumbnail {
        width: 52px;
        height: 52px;
        flex-shrink: 0;

        background: #eaf0ff;
        border: 1px solid var(--border);
        border-radius: 8px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #3b62ac;
        font-size: 20px;
    }

    .report-title {
        font-size: 14px;
        font-weight: 700;
        color: #1e3a70;
        margin-bottom: 6px;
        overflow-wrap: anywhere;
    }

    .report-date {
        font-size: 12px;
        color: var(--text-muted);
    }

    .report-actions {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
    }

    /* STATUS BADGES */

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-pending {
        background: #eaf0ff;
        color: #496cbd;
    }

    .badge-diproses {
        background: #fef3c7;
        color: #b45309;
    }

    .badge-selesai {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-ditolak {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* DETAIL BUTTON */

    .btn-detail {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: none;
        border-radius: 8px;
        background: #eaf0ff;
        color: #3b62ac;

        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-detail:hover {
        background: #3b62ac;
        color: #ffffff;
    }

    /* EMPTY STATE */

    .empty-state {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px;
        color: var(--text-muted);
        text-align: center;
        box-shadow: var(--shadow);
    }

    /* RESPONSIVE */

    @media (max-width: 1050px) {
        .content {
            padding: 26px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 70px;
            padding: 16px 8px;
        }

        .brand {
            padding: 0 0 24px;
            justify-content: center;
        }

        .brand-logo-img {
            width: 42px;
            height: 42px;
        }

        .brand-name,
        .nav-item span,
        .logout-btn span {
            display: none;
        }

        .nav-item a,
        .logout-btn {
            justify-content: center;
            padding: 13px 8px;
        }

        .main-wrapper {
            margin-left: 70px;
        }

        .topbar {
            padding: 0 18px;
        }

        .content {
            padding: 22px 16px;
        }

        .page-title {
            font-size: 24px;
        }

        .category-grid {
            grid-template-columns: 1fr;
            padding: 18px;
        }

        .category-item {
            grid-template-columns: 95px minmax(30px, 1fr) 20px;
        }

        .report-card {
            padding: 14px;
        }

        .report-info {
            gap: 10px;
        }

        .report-thumbnail {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .report-actions {
            gap: 6px;
        }

        .status-badge {
            padding: 5px 8px;
        }
    }

    @media (max-width: 550px) {
        .topbar {
            padding: 0 12px;
            gap: 8px;
        }

        .user-name {
            font-size: 12px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .stat-card {
            padding: 18px 10px;
        }

        .stat-value {
            font-size: 26px;
        }

        .stat-title {
            font-size: 10px;
        }

        .section-header {
            font-size: 19px;
        }

        .report-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .report-actions {
            width: 100%;
            justify-content: flex-end;
        }

        .report-title {
            font-size: 13px;
        }
    }

    @media (max-width: 380px) {
        .user-name {
            max-width: 115px;
            overflow-wrap: anywhere;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .category-item {
            grid-template-columns: 85px minmax(25px, 1fr) 18px;
            gap: 8px;
            font-size: 12px;
        }
    }
</style>

</head>

<body>

    @php
        /*
         * Data contoh untuk pengerjaan tampilan.
         * Nantinya diganti dengan data dari controller dan database.
         */
        $role = auth()->user()->role ?? 'wakasek kesiswaan';


$bidang = [
    'wakasek kesiswaan' => [
        'nama' => 'Wakasek Kesiswaan',
        'kategori' => 'Kesiswaan',
        'route_monitoring' => 'wakasek.kesiswaan.monitoring',
        'profil' => 'profil_wakasek',
    ],
    'wakasek kurikulum' => [
        'nama' => 'Wakasek Kurikulum',
        'kategori' => 'Kurikulum',
        'route_monitoring' => 'wakasek.kurikulum.monitoring',
        'profil' => 'profil_wakasek',
    ],
    'wakasek sarana' => [
        'nama' => 'Wakasek Sarana',
        'kategori' => 'Sarana dan Prasarana',
        'route_monitoring' => 'wakasek.sarana.monitoring',
        'profil' => 'profil_wakasek',
    ],
    'wakasek dudi' => [
        'nama' => 'Wakasek DUDI',
        'kategori' => 'DUDI',
        'route_monitoring' => 'wakasek.dudi.monitoring',
        'profil' => 'profil_wakasek',
    ],
];


        $jabatan = $bidang[$role] ?? [
            'nama' => 'Wakasek',
            'kategori' => 'Kesiswaan',
        ];
        $routeMonitoring = $jabatan['route_monitoring']
        ?? 'wakasek.kesiswaan.monitoring';

        $laporanContoh = [
            [
                'judul' => 'Laporan Menunggu Pemeriksaan',
                'tanggal' => '17 Sep 2026',
                'status' => 'Pending',
                'kelas' => 'badge-pending',
],
            [
                'judul' => 'Perundungan Antar Siswa',
                'tanggal' => '16 Sep 2026',
                'status' => 'Diproses',
                'kelas' => 'badge-diproses',
            ],
            [
                'judul' => 'Konflik Antar Siswa',
                'tanggal' => '12 Sep 2026',
                'status' => 'Selesai',
                'kelas' => 'badge-selesai',
            ],
            [
                'judul' => 'Kendala Kegiatan Sekolah',
                'tanggal' => '9 Sep 2026',
                'status' => 'Ditolak',
                'kelas' => 'badge-ditolak',
            ],
        ];

        $rekapContoh = [
            ['nama' => 'Kesiswaan', 'jumlah' => 8],
            ['nama' => 'Kurikulum', 'jumlah' => 6],
            ['nama' => 'Sarana dan Prasarana', 'jumlah' => 7],
            ['nama' => 'DUDI', 'jumlah' => 9],
        ];
    @endphp

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
                    <a href="{{ url('/dashboard/wakasek') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>



<li class="nav-item">
    <a href="{{ route('wakasek.kesiswaan.rekap') }}">
        <i class="fa-solid fa-chart-column"></i>
        <span>Rekap</span>
    </a>
</li>



                <li class="nav-item">
                    <a href="{{ route($routeMonitoring) }}">
                        <i class="fa-solid fa-eye"></i>
                        <span>Monitoring</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profil_wakasek') }}">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Profil</span>
                    </a>
                </li>

<li class="nav-item">
    <a href="{{ route('wakasek.notifikasi') }}" class="nav-notification">
        <i class="fa-solid fa-bell"></i>
        <span>Notifikasi</span>
        <span class="notification-dot"></span>
    </a>
</li>

            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <div class="main-wrapper">

        <header class="topbar">
            <div class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </div>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>

                <span class="user-name">
                    {{ $jabatan['nama'] }}
                </span>
            </div>
        </header>

        <main class="content">

            <h1 class="page-title">Dashboard</h1>

            <p class="welcome-text">
                Selamat datang, {{ $jabatan['nama'] }}!<br>
                Pantau rekap laporan pengaduan siswa bidang
                {{ $jabatan['kategori'] }}.
            </p>

            <section class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-title">Total</div>
                    <div class="stat-value">24</div>
                </div>

                <div class="stat-card pending">
                    <div class="stat-title">Pending</div>
                    <div class="stat-value">2</div>
                </div>

                <div class="stat-card diproses">
                    <div class="stat-title">Diproses</div>
                    <div class="stat-value">12</div>
                </div>

                <div class="stat-card selesai">
                    <div class="stat-title">Selesai</div>
                    <div class="stat-value">9</div>
                </div>

                <div class="stat-card ditolak">
                    <div class="stat-title">Ditolak</div>
                    <div class="stat-value">3</div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-header">Rekap Laporan per Kategori</h2>

                <div class="category-grid">
                    @foreach ($rekapContoh as $kategori)
                        <div class="category-item">
                            <span class="category-name">
                                {{ $kategori['nama'] }}
                            </span>

                            <div class="bar-track">
                                <div
                                    class="bar-fill"
                                    style="width: {{ ($kategori['jumlah'] / 10) * 100 }}%"
                                ></div>
                            </div>

                            <span class="category-count">
                                {{ $kategori['jumlah'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="section">
                <h2 class="section-header">Laporan Terbaru</h2>

                <div class="report-list">
                    @forelse ($laporanContoh as $laporan)
                        <article class="report-card">
                            <div class="report-info">
                                <div class="report-thumbnail">
                                    <i class="fa-regular fa-image"></i>
                                </div>

                                <div>
                                    <div class="report-title">
                                        {{ $laporan['judul'] }}
                                    </div>

                                    <div class="report-date">
                                        {{ $laporan['tanggal'] }}
                                    </div>
                                </div>
                            </div>

                            <div class="report-actions">
                                <span class="status-badge {{ $laporan['kelas'] }}">
                                    {{ $laporan['status'] }}
                                </span>

                                <button
                                    type="button"
                                    class="btn-detail"
                                    title="Detail laporan"
                                    onclick="alert('Halaman detail laporan akan dibuat pada tahap berikutnya.')"
                                >
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">
                            Belum ada laporan.
                        </div>
                    @endforelse
                </div>
            </section>

        </main>
    </div>

</body>
</html>

