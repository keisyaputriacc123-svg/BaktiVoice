
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Monitoring Guru BK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --primary-dark: #496cbd;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 16px;
            --shadow: 0 4px 16px rgba(30, 41, 59, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text-main);
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 24px;
        }

        .brand-logo-img {
            width: 60px !important;
            height: 60px !important;
            max-width: 60px !important;

            background-color: var(--primary);
            color: #96ace0;

            font-weight: 800;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
        }
        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-main);
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
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border-radius: 8px;
            transition: .2s;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item a:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active > a {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-top: 16px;
            color: #ef4444;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
        }

        .logout-btn:hover {
            background: #fef2f2;
        }

        /* MAIN & TOPBAR */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            padding: 0 36px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-icon {
            font-size: 18px;
            color: var(--text-muted);
            padding: 8px;
            border-radius: 50%;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e8eefb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        .content {
            padding: 32px 36px 40px;
            flex: 1;
            max-width: 1600px;
            width: 100%;
            margin: 0 auto;
        }

        /* PAGE HEADER */

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px;
        }

        .breadcrumb {
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .breadcrumb span {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .page-title {
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .page-description {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .period-label {
            background: #edf2ff;
            color: var(--primary-dark);
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(30, 41, 59, .07);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .stat-note {
            font-size: 11px;
            color: var(--text-muted);
        }

        .total .stat-icon {
            background: #edf2ff;
            color: #496cbd;
        }

        .pending .stat-icon {
            background: #f3e8ff;
            color: #9333ea;
        }

        .diproses .stat-icon {
            background: #fff3d8;
            color: #d97706;
        }

        .selesai .stat-icon {
            background: #dcfce7;
            color: #16a34a;
        }

        .ditolak .stat-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        /* PANEL & CHART LAYOUT */

        .analytics-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(280px, .9fr);
            gap: 22px;
            margin-bottom: 24px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 24px;
        }

        .panel-title {
            color: var(--text-dark);
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .panel-subtitle {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .panel-icon {
            width: 38px;
            height: 38px;
            background: #edf2ff;
            color: var(--primary-dark);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CATEGORY CARD */

        .category-summary {
            background: linear-gradient(135deg, #edf2ff, #f8faff);
            border: 1px solid #e1e9ff;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .category-top {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 20px;
        }

        .category-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: white;
            color: #496cbd;
            font-size: 20px;
            box-shadow: 0 2px 8px rgba(73, 108, 189, .08);
        }

        .category-name {
            font-size: 14px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .category-caption {
            font-size: 11px;
            color: var(--text-muted);
        }

        .category-count {
            font-size: 27px;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .category-count small {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-muted);
        }

        .progress-track {
            width: 100%;
            height: 9px;
            background: #dce5f8;
            border-radius: 99px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #96ace0, #496cbd);
        }

        .category-footer {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 10px;
            font-size: 11px;
            color: var(--text-muted);
        }

        .category-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px;
            border-radius: 10px;
            background: #f8fafc;
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .category-note i {
            color: var(--primary-dark);
            margin-top: 2px;
        }

        /* STATUS BREAKDOWN */

        .status-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .status-row {
            display: grid;
            grid-template-columns: 95px minmax(0, 1fr) 28px;
            align-items: center;
            gap: 12px;
        }

        .status-name {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .status-track {
            height: 10px;
            border-radius: 99px;
            background: #f1f5f9;
            overflow: hidden;
        }

        .status-fill {
            height: 100%;
            border-radius: 99px;
        }

        .fill-pending {
            width: 16.67%;
            background: #a855f7;
        }

        .fill-diproses {
            width: 33.33%;
            background: #f59e0b;
        }

        .fill-selesai {
            width: 41.67%;
            background: #22c55e;
        }

        .fill-ditolak {
            width: 8.33%;
            background: #ef4444;
        }

        .status-number {
            text-align: right;
            color: var(--text-dark);
            font-size: 12px;
            font-weight: 800;
        }

        .status-legend {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            padding-top: 20px;
            margin-top: 22px;
            border-top: 1px solid var(--border);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--text-muted);
            font-size: 11px;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* MONTHLY MONITORING */

        .monthly-panel {
            margin-bottom: 24px;
        }

        .monthly-total {
            background: #edf2ff;
            color: var(--primary-dark);
            padding: 8px 11px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .chart-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }

        .chart-area {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .month-row {
            display: grid;
            grid-template-columns: 95px minmax(0, 1fr) 28px;
            gap: 16px;
            align-items: center;
        }

        .month-name {
            font-size: 12px;
            font-weight: 700;
            color: #475569;
        }

        .stacked-track {
            display: flex;
            height: 30px;
            overflow: hidden;
            border-radius: 8px;
            background: #f1f5f9;
        }

        .stacked-segment {
            height: 100%;
            min-width: 0;
            transition: filter .2s;
        }

        .stacked-segment:hover {
            filter: brightness(.94);
        }

        .segment-pending {
            width: 16.67%;
            background: #a855f7;
        }

        .segment-diproses {
            width: 33.33%;
            background: #f59e0b;
        }

        .segment-selesai {
            width: 41.67%;
            background: #22c55e;
        }

        .segment-ditolak {
            width: 8.33%;
            background: #ef4444;
        }

        .month-total {
            font-size: 12px;
            text-align: right;
            color: var(--text-dark);
            font-weight: 800;
        }

        .chart-footnote {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            padding: 14px 16px;
            background: #f8fafc;
            border: 1px solid #eef2f7;
            border-radius: 10px;
            margin-top: 24px;
            font-size: 11px;
            line-height: 1.7;
            color: var(--text-muted);
        }

        .chart-footnote i {
            color: var(--primary-dark);
            margin-top: 2px;
        }

        /* SUMMARY BOTTOM */

        .insight-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            background: linear-gradient(120deg, #496cbd, #819bda);
            border-radius: var(--radius);
            padding: 23px 25px;
            color: white;
            box-shadow: 0 8px 22px rgba(73, 108, 189, .14);
        }

        .insight-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .17);
            border-radius: 12px;
            font-size: 18px;
        }

        .insight-title {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .insight-text {
            font-size: 12px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .91);
        }

        .footer-note {
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
            margin-top: 25px;
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .analytics-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                padding: 0 2px 24px;
                justify-content: center;
            }

            .brand-logo-img {
                width: 46px;
                height: 46px;
            }

            .brand-name,
            .nav-item span,
            .logout-btn span {
                display: none !important;
            }

            .nav-item a,
            .logout-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .nav-content {
                justify-content: center;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 24px 18px 30px;
            }

            .topbar {
                padding: 0 18px;
            }

            .page-title {
                font-size: 23px;
            }

            .panel {
                padding: 19px;
            }

            .page-heading {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-top {
                margin-bottom: 15px;
                align-items: flex-start;
            }

            .stat-label {
                font-size: 10px;
            }

            .stat-icon {
                width: 32px;
                height: 32px;
                font-size: 13px;
            }

            .stat-value {
                font-size: 27px;
            }

            .stat-note {
                font-size: 10px;
                line-height: 1.6;
            }

            .month-row {
                grid-template-columns: 65px minmax(0, 1fr) 22px;
                gap: 8px;
            }

            .status-row {
                grid-template-columns: 75px minmax(0, 1fr) 22px;
                gap: 8px;
            }

            .panel-title {
                font-size: 14px;
            }

            .panel-subtitle {
                font-size: 11px;
            }

            .monthly-total {
                font-size: 10px;
            }

            .insight-card {
                padding: 18px;
            }

            .period-label {
                font-size: 11px;
            }

            .user-name {
                display: none;
            }
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
                <li class="nav-item">
                    <a href="{{ route('dashboard_bk') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('LaporanSiswa_bk') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan Siswa</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('monitoring_bk') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-eye"></i>
                            <span>Monitoring</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-user"></i>
                            <span>Profil</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <a href="{{ route('login') }}" class="logout-btn">
            <i class="fa-solid fa-xmark"></i>
            <span>Logout</span>
        </a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">

        <!-- TOPBAR -->
        <header class="topbar">
            <div class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </div>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Guru BK' }}
                </span>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="content">

            <!-- HEADER -->
            <section class="page-heading">
                <div>
                    <div class="breadcrumb">
                        Dashboard <i class="fa-solid fa-chevron-right" style="font-size:9px;margin:0 7px;"></i>
                        <span>Monitoring</span>
                    </div>

                    <h1 class="page-title">Monitoring Laporan</h1>

                    <p class="page-description">
                        Pantau status dan perkembangan laporan siswa kategori Kesiswaan.
                    </p>
                </div>

                <div class="period-label">
                    <i class="fa-regular fa-calendar" style="margin-right:7px;"></i>
                    Periode September 2026
                </div>
            </section>

            <!-- STATISTICS -->
            <section class="stats-grid">

                <div class="stat-card total">
                    <div class="stat-top">
                        <span class="stat-label">Total Laporan</span>
                        <div class="stat-icon">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                    </div>
                    <div class="stat-value">12</div>
                    <div class="stat-note">Seluruh laporan Kesiswaan</div>
                </div>

                <div class="stat-card pending">
                    <div class="stat-top">
                        <span class="stat-label">Pending</span>
                        <div class="stat-icon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-value">2</div>
                    <div class="stat-note">Menunggu tindak lanjut</div>
                </div>

                <div class="stat-card diproses">
                    <div class="stat-top">
                        <span class="stat-label">Diproses</span>
                        <div class="stat-icon">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </div>
                    </div>
                    <div class="stat-value">4</div>
                    <div class="stat-note">Sedang ditangani</div>
                </div>

                <div class="stat-card selesai">
                    <div class="stat-top">
                        <span class="stat-label">Selesai</span>
                        <div class="stat-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">5</div>
                    <div class="stat-note">Sudah ditindaklanjuti</div>
                </div>

            </section>

            <!-- REJECTED STAT + ANALYTICS -->
            <section class="analytics-grid">

                <!-- CATEGORY -->
                <div class="panel">
                    <div class="panel-header">
                        <div>
                            <h2 class="panel-title">Laporan Berdasarkan Kategori</h2>
                            <p class="panel-subtitle">
                                Distribusi laporan yang menjadi cakupan Guru BK.
                            </p>
                        </div>

                        <div class="panel-icon">
                            <i class="fa-solid fa-chart-column"></i>
                        </div>
                    </div>

                    <div class="category-summary">
                        <div class="category-top">
                            <div class="category-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>

                            <div style="flex:1;">
                                <div class="category-name">Kesiswaan</div>
                                <div class="category-caption">Kategori laporan Guru BK</div>
                            </div>

                            <div class="category-count">
                                12 <small>laporan</small>
                            </div>
                        </div>

                        <div class="progress-track">
                            <div class="progress-fill"></div>
                        </div>

                        <div class="category-footer">
                            <span>Seluruh laporan yang dipantau</span>
                            <strong>100%</strong>
                        </div>
                    </div>

                    <div class="category-note">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>
                            Monitoring Guru BK difokuskan pada kategori Kesiswaan.
                            Kategori lain tidak ditampilkan pada halaman ini.
                        </span>
                    </div>
                </div>

                <!-- STATUS BREAKDOWN -->
                <div class="panel">
                    <div class="panel-header">
                        <div>
                            <h2 class="panel-title">Ringkasan Status</h2>
                            <p class="panel-subtitle">
                                Jumlah laporan menurut status saat ini.
                            </p>
                        </div>

                        <div class="panel-icon">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                    </div>

                    <div class="status-list">

                        <div class="status-row">
                            <span class="status-name">Pending</span>
                            <div class="status-track">
                                <div class="status-fill fill-pending"></div>
                            </div>
                            <span class="status-number">2</span>
                        </div>

                        <div class="status-row">
                            <span class="status-name">Diproses</span>
                            <div class="status-track">
                                <div class="status-fill fill-diproses"></div>
                            </div>
                            <span class="status-number">4</span>
                        </div>

                        <div class="status-row">
                            <span class="status-name">Selesai</span>
                            <div class="status-track">
                                <div class="status-fill fill-selesai"></div>
                            </div>
                            <span class="status-number">5</span>
                        </div>

                        <div class="status-row">
                            <span class="status-name">Ditolak</span>
                            <div class="status-track">
                                <div class="status-fill fill-ditolak"></div>
                            </div>
                            <span class="status-number">1</span>
                        </div>

                    </div>

                    <div class="status-legend">
                        <div class="legend-item">
                            <span class="legend-dot" style="background:#a855f7;"></span>
                            Pending
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot" style="background:#f59e0b;"></span>
                            Diproses
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot" style="background:#22c55e;"></span>
                            Selesai
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot" style="background:#ef4444;"></span>
                            Ditolak
                        </div>
                    </div>
                </div>

            </section>

            <!-- MONTHLY PROGRESS -->
            <section class="panel monthly-panel">

                <div class="panel-header">
                    <div>
                        <h2 class="panel-title">Perkembangan Laporan</h2>
                        <p class="panel-subtitle">
                            Perbandingan jumlah laporan berdasarkan status pada September 2026.
                        </p>
                    </div>

                    <div class="monthly-total">
                        <i class="fa-solid fa-file-lines" style="margin-right:5px;"></i>
                        12 Laporan
                    </div>
                </div>

                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#a855f7;"></span>
                        Pending
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot" style="background:#f59e0b;"></span>
                        Diproses
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot" style="background:#22c55e;"></span>
                        Selesai
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot" style="background:#ef4444;"></span>
                        Ditolak
                    </div>
                </div>

                <div class="chart-area">

                    <div class="month-row">
                        <span class="month-name">September</span>

                        <div class="stacked-track"
                             role="img"
                             aria-label="September: 2 pending, 4 diproses, 5 selesai, 1 ditolak">
                            <div class="stacked-segment segment-pending" title="Pending: 2"></div>
                            <div class="stacked-segment segment-diproses" title="Diproses: 4"></div>
                            <div class="stacked-segment segment-selesai" title="Selesai: 5"></div>
                            <div class="stacked-segment segment-ditolak" title="Ditolak: 1"></div>
                        </div>

                        <span class="month-total">12</span>
                    </div>

                </div>

                <div class="chart-footnote">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>
                        Grafik menggunakan data contoh. Setiap warna menunjukkan
                        jumlah laporan pada status terkait, dan seluruh status
                        berjumlah 12 laporan.
                    </span>
                </div>

            </section>

            <!-- INSIGHT -->
            <section class="insight-card">
                <div class="insight-icon">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>

                <div>
                    <h3 class="insight-title">Ringkasan Monitoring</h3>
                    <p class="insight-text">
                        Dari 12 laporan Kesiswaan, 5 laporan telah selesai,
                        4 sedang diproses, 2 masih pending, dan 1 ditolak.
                        Guru BK dapat memprioritaskan peninjauan laporan pending
                        agar dapat segera ditindaklanjuti.
                    </p>
                </div>
            </section>

            <div class="footer-note">
                BaktiVoice &copy; 2026 · Monitoring Guru BK
            </div>

        </main>
    </div>

</body>
</html>
