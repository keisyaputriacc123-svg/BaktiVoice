
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Notifikasi Admin</title>

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
            background-color: var(--background) !important;
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR - DIPERTAHANKAN */

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
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            object-fit: contain;
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

        .nav-item a,
        .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 12px 16px;
            color: #274472;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.25s ease;
            background: none;
            border: none;
            cursor: pointer;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item a:hover,
        .dropdown-btn:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active > a,
        .nav-item.active > .dropdown-btn {
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

        .arrow-icon {
            font-size: 12px !important;
            transition: transform 0.3s ease;
        }

        .sub-menu {
            list-style: none;
            display: none;
            flex-direction: column;
            gap: 4px;
            padding-left: 32px;
            margin-top: 4px;
        }

        .sub-menu.show {
            display: flex;
        }

        .sub-menu a {
            padding: 8px 12px;
            font-size: 13px;
            color: #274472;
            border-radius: 6px;
            text-decoration: none;
            display: block;
            transition: background 0.2s;
        }

        .sub-menu a:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #102a56;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 16px;
            color: #e11d48;
            background: transparent;
            border: none;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
            cursor: pointer;
            text-align: left;
            margin-top: 16px;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }

        /* MAIN WRAPPER - DIPERTAHANKAN */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--background) !important;
        }

        /* TOPBAR - DIPERTAHANKAN */

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

        /* KONTEN NOTIFIKASI */

        .content {
            padding: 36px;
            flex: 1;
            background-color: var(--background) !important;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
        }

        .btn-mark-all {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            background: #ffffff;
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: 10px;
            color: var(--text-main);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .btn-mark-all:hover {
            background: #f7f9ff;
            border-color: #7b9fe8;
        }

        /* RINGKASAN NOTIFIKASI */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .stat-icon.blue {
            background: #eaf0ff;
            color: #3b62ac;
        }

        .stat-icon.orange {
            background: #fff7e6;
            color: #d97706;
        }

        .stat-icon.green {
            background: #e8f9ef;
            color: #16a34a;
        }

        .stat-icon.purple {
            background: #f1eaff;
            color: #7c3aed;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .stat-value {
            color: #1e3a70;
            font-size: 26px;
            font-weight: 800;
        }

        /* FILTER */

        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .filter-btn {
            padding: 10px 15px;
            background: #ffffff;
            color: var(--text-main);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-btn:hover {
            border-color: #7b9fe8;
        }

        .filter-btn.active {
            background: #7b9fe8;
            color: #ffffff;
            border-color: #7b9fe8;
        }

        /* DAFTAR NOTIFIKASI */

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .notification-card {
            background: #ffffff;
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            padding: 20px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .notification-card:hover {
            border-color: #7b9fe8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
        }

        .notification-card.unread {
            background: #f7f9ff;
            border-color: #b8d7ff;
        }

        .notification-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 19px;
        }

        .icon-laporan {
            background: #eaf0ff;
            color: #3b62ac;
        }

        .icon-status {
            background: #fff7e6;
            color: #d97706;
        }

        .icon-bk {
            background: #f1eaff;
            color: #7c3aed;
        }

        .icon-wakasek {
            background: #e8f9ef;
            color: #16a34a;
        }

        .notification-body {
            flex: 1;
            min-width: 0;
        }

        .notification-title-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }

        .notification-title {
            font-size: 15px;
            font-weight: 800;
            color: #1e3a70;
            line-height: 1.5;
        }

        .type-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-laporan {
            background: #eaf0ff;
            color: #3b62ac;
        }

        .badge-status {
            background: #fff7e6;
            color: #b45309;
        }

        .badge-bk {
            background: #f1eaff;
            color: #6d28d9;
        }

        .badge-wakasek {
            background: #e8f9ef;
            color: #15803d;
        }

        .notification-message {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .notification-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            color: #8491a5;
            font-size: 11px;
        }

        .notification-meta i {
            margin-right: 4px;
        }

        .unread-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #4772c7;
            flex-shrink: 0;
            margin-top: 7px;
        }

        .notification-card:not(.unread) .unread-dot {
            visibility: hidden;
        }

        .notification-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn-view,
        .btn-read {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-view {
            background: var(--gradient-button);
            color: #ffffff;
            border: none;
        }

        .btn-view:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-read {
            background: #ffffff;
            color: var(--text-main);
            border: 1px solid rgba(186, 210, 240, 0.7);
        }

        .btn-read:hover {
            background: #f1f5ff;
        }

        .btn-read:disabled {
            cursor: default;
            opacity: 0.65;
        }

        /* KETIKA DAFTAR KOSONG */

        .empty-state {
            display: none;
            text-align: center;
            padding: 50px 20px;
            background: #ffffff;
            border: 1px dashed rgba(186, 210, 240, 0.9);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .empty-state.show {
            display: block;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #eaf0ff;
            color: #7b9fe8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin: 0 auto 16px;
        }

        .empty-state h3 {
            font-size: 17px;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .notification-card {
                flex-wrap: wrap;
            }

            .notification-actions {
                width: 100%;
                flex-direction: row;
                justify-content: flex-end;
                padding-left: 62px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 24px;
            }

            .brand-name,
            .nav-item span,
            .logout-btn span,
            .arrow-icon,
            .sub-menu {
                display: none !important;
            }

            .brand-logo-img {
                width: 48px !important;
                height: 48px !important;
            }

            .nav-item a,
            .dropdown-btn,
            .logout-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 18px;
                gap: 10px;
            }

            .content {
                padding: 22px 18px;
            }

            .page-title {
                font-size: 24px;
            }

            .page-heading {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-mark-all {
                align-self: flex-start;
            }

            .stats-grid {
                gap: 12px;
            }

            .stat-card {
                padding: 14px;
                gap: 10px;
            }

            .stat-icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .stat-value {
                font-size: 22px;
            }

            .stat-label {
                font-size: 10px;
            }

            .filter-container {
                gap: 8px;
            }

            .filter-btn {
                padding: 9px 11px;
                font-size: 11px;
            }

            .notification-card {
                padding: 15px;
                gap: 12px;
            }

            .notification-icon {
                width: 40px;
                height: 40px;
                font-size: 17px;
            }

            .notification-title {
                font-size: 13px;
            }

            .notification-message {
                font-size: 12px;
            }

            .notification-actions {
                padding-left: 0;
            }

            .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div>
            <!-- Logo Brand -->
            <div class="brand">
                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >
                <span class="brand-name">BaktiVoice</span>
            </div>

            <!-- Navigasi Utama -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard_admin') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan</span>
                        </div>
                    </a>
                </li>

                <!-- MENU DATA MASTER -->
                <li class="nav-item">
                    <button
                        type="button"
                        class="dropdown-btn"
                        onclick="toggleDropdown('masterMenu', 'masterArrow')"
                    >
                        <div class="nav-content">
                            <i class="fa-solid fa-database"></i>
                            <span>Data Master</span>
                        </div>
                        <i
                            class="fa-solid fa-chevron-down arrow-icon"
                            id="masterArrow"
                        ></i>
                    </button>

                    <ul class="sub-menu" id="masterMenu">
                        <li>
                            <a href="{{ route('data_master') }}">
                                Kategori Laporan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data_master') }}">
                                Status Laporan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data_master') }}">
                                User &amp; Role
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('rekap_laporan') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Rekap Laporan</span>
                        </div>
                    </a>
                </li>

                <!-- MENU NOTIFIKASI AKTIF -->
                <li class="nav-item active">
                    <a href="{{ route('notifikasi_admin') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profil_admin') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-user"></i>
                            <span>Profil</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Form Logout -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 16px;">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">

        <!-- TOPBAR - STRUKTUR DIPERTAHANKAN -->
        <header class="topbar">
            <div class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </div>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="user-name">
                    {{ Auth::user()->name ?? 'Admin Sekolah' }}
                </span>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="content">

            <div class="page-heading">
                <div>
                    <h1 class="page-title">Notifikasi</h1>
                    <p class="page-description">
                        Pantau laporan baru, perubahan status, masukan Guru BK,
                        dan tindak lanjut Wakasek.
                    </p>
                </div>

                <button
                    type="button"
                    class="btn-mark-all"
                    id="markAllRead"
                >
                    <i class="fa-solid fa-check-double"></i>
                    Tandai Semua Dibaca
                </button>
            </div>

            <!-- RINGKASAN NOTIFIKASI -->
            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Notifikasi</div>
                        <div class="stat-value" id="totalCount">5</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div>
                        <div class="stat-label">Belum Dibaca</div>
                        <div class="stat-value" id="unreadCount">4</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </div>
                    <div>
                        <div class="stat-label">Laporan Baru</div>
                        <div class="stat-value" id="newReportCount">1</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <div class="stat-label">Masukan &amp; Tindak Lanjut</div>
                        <div class="stat-value" id="feedbackCount">2</div>
                    </div>
                </div>
            </section>

            <!-- FILTER NOTIFIKASI -->
            <div class="filter-container">
                <button type="button" class="filter-btn active" data-filter="all">
                    Semua
                </button>

                <button type="button" class="filter-btn" data-filter="unread">
                    Belum Dibaca
                </button>

                <button type="button" class="filter-btn" data-filter="laporan">
                    Laporan Baru
                </button>

                <button type="button" class="filter-btn" data-filter="bk">
                    Masukan Guru BK
                </button>

                <button type="button" class="filter-btn" data-filter="wakasek">
                    Tindak Lanjut Wakasek
                </button>

                <button type="button" class="filter-btn" data-filter="status">
                    Status Laporan
                </button>
            </div>

            <!-- DAFTAR NOTIFIKASI -->
            <section class="notification-list" id="notificationList">

                <!-- NOTIFIKASI 1: LAPORAN BARU -->
                <article
                    class="notification-card unread"
                    data-category="laporan"
                >
                    <div class="notification-icon icon-laporan">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </div>

                    <div class="notification-body">
                        <div class="notification-title-row">
                            <h3 class="notification-title">Laporan Baru Diterima</h3>
                            <span class="type-badge badge-laporan">Laporan Baru</span>
                        </div>

                        <p class="notification-message">
                            Ada laporan baru berjudul
                            <strong>“Kendala Fasilitas Kelas”</strong>
                            yang dikirimkan oleh siswa. Silakan periksa laporan
                            untuk menentukan status penanganannya.
                        </p>

                        <div class="notification-meta">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                                Hari ini, 09.15
                            </span>
                            <span>
                                <i class="fa-solid fa-user"></i>
                                Sistem BaktiVoice
                            </span>
                        </div>
                    </div>

                    <div class="unread-dot" title="Belum dibaca"></div>

                    <div class="notification-actions">
                        <a href="{{ route('dashboard_admin') }}" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Laporan
                        </a>

                        <button type="button" class="btn-read">
                            Tandai Dibaca
                        </button>
                    </div>
                </article>

                <!-- NOTIFIKASI 2: MASUKAN GURU BK -->
                <article
                    class="notification-card unread"
                    data-category="bk"
                >
                    <div class="notification-icon icon-bk">
                        <i class="fa-solid fa-comments"></i>
                    </div>

                    <div class="notification-body">
                        <div class="notification-title-row">
                            <h3 class="notification-title">Masukan dari Guru BK</h3>
                            <span class="type-badge badge-bk">Masukan Guru BK</span>
                        </div>

                        <p class="notification-message">
                            Guru BK memberikan masukan terkait laporan
                            <strong>“Kasus Perundungan Siswa”</strong>.
                            Tinjau masukan tersebut sebagai bahan pertimbangan
                            sebelum menentukan langkah penanganan.
                        </p>

                        <div class="notification-meta">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                                Hari ini, 08.45
                            </span>
                            <span>
                                <i class="fa-solid fa-user-tie"></i>
                                Guru BK
                            </span>
                        </div>
                    </div>

                    <div class="unread-dot" title="Belum dibaca"></div>

                    <div class="notification-actions">
                        <a href="{{ route('rekap_laporan') }}" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Laporan
                        </a>

                        <button type="button" class="btn-read">
                            Tandai Dibaca
                        </button>
                    </div>
                </article>

                <!-- NOTIFIKASI 3: TINDAK LANJUT WAKASEK -->
                <article
                    class="notification-card unread"
                    data-category="wakasek"
                >
                    <div class="notification-icon icon-wakasek">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>

                    <div class="notification-body">
                        <div class="notification-title-row">
                            <h3 class="notification-title">Tindak Lanjut dari Wakasek</h3>
                            <span class="type-badge badge-wakasek">Tindak Lanjut</span>
                        </div>

                        <p class="notification-message">
                            Wakasek memberikan informasi tindak lanjut atas
                            laporan <strong>“Jadwal Pelajaran Bentrok”</strong>.
                            Silakan tinjau informasi tersebut untuk proses
                            pengelolaan laporan selanjutnya.
                        </p>

                        <div class="notification-meta">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                                Kemarin, 14.30
                            </span>
                            <span>
                                <i class="fa-solid fa-user-tie"></i>
                                Wakasek
                            </span>
                        </div>
                    </div>

                    <div class="unread-dot" title="Belum dibaca"></div>

                    <div class="notification-actions">
                        <a href="{{ route('rekap_laporan') }}" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Laporan
                        </a>

                        <button type="button" class="btn-read">
                            Tandai Dibaca
                        </button>
                    </div>
                </article>

                <!-- NOTIFIKASI 4: STATUS LAPORAN -->
                <article
                    class="notification-card unread"
                    data-category="status"
                >
                    <div class="notification-icon icon-status">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </div>

                    <div class="notification-body">
                        <div class="notification-title-row">
                            <h3 class="notification-title">Laporan Memerlukan Penanganan</h3>
                            <span class="type-badge badge-status">Status Laporan</span>
                        </div>

                        <p class="notification-message">
                            Laporan <strong>“Kendala Tempat Magang”</strong>
                            memerlukan peninjauan status oleh Admin Sekolah.
                            Periksa detail laporan sebelum mengambil keputusan.
                        </p>

                        <div class="notification-meta">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                                Kemarin, 11.20
                            </span>
                            <span>
                                <i class="fa-solid fa-rotate"></i>
                                Pengingat peninjauan
                            </span>
                        </div>
                    </div>

                    <div class="unread-dot" title="Belum dibaca"></div>

                    <div class="notification-actions">
                        <a href="{{ route('dashboard_admin') }}" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Laporan
                        </a>

                        <button type="button" class="btn-read">
                            Tandai Dibaca
                        </button>
                    </div>
                </article>

                <!-- NOTIFIKASI 5: SUDAH DIBACA -->
                <article
                    class="notification-card"
                    data-category="status"
                >
                    <div class="notification-icon icon-status">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div class="notification-body">
                        <div class="notification-title-row">
                            <h3 class="notification-title">Informasi Status Laporan</h3>
                            <span class="type-badge badge-status">Status Laporan</span>
                        </div>

                        <p class="notification-message">
                            Informasi pembaruan laporan
                            <strong>“Jadwal Pelajaran Bentrok”</strong>
                            tersedia untuk ditinjau melalui halaman pengelolaan
                            laporan.
                        </p>

                        <div class="notification-meta">
                            <span>
                                <i class="fa-regular fa-clock"></i>
                                16 Oktober 2026, 10.00
                            </span>
                            <span>
                                <i class="fa-regular fa-envelope-open"></i>
                                Sudah dibaca
                            </span>
                        </div>
                    </div>

                    <div class="unread-dot" title="Belum dibaca"></div>

                    <div class="notification-actions">
                        <a href="{{ route('dashboard_admin') }}" class="btn-view">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Laporan
                        </a>

                        <button type="button" class="btn-read" disabled>
                            <i class="fa-solid fa-check"></i>
                            Sudah Dibaca
                        </button>
                    </div>
                </article>

            </section>

            <!-- EMPTY STATE -->
            <div class="empty-state" id="emptyState">
                <div class="empty-icon">
                    <i class="fa-regular fa-bell-slash"></i>
                </div>
                <h3>Tidak Ada Notifikasi</h3>
                <p>
                    Belum ada notifikasi untuk kategori ini.
                    Silakan pilih kategori lainnya.
                </p>
            </div>

        </main>
    </div>

    <!-- SCRIPT -->
    <script>
        // Dropdown Data Master
        function toggleDropdown(menuId, arrowId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);

            menu.classList.toggle('show');

            if (menu.classList.contains('show')) {
                arrow.style.transform = 'rotate(180deg)';
            } else {
                arrow.style.transform = 'rotate(0deg)';
            }
        }

        // Filter notifikasi
        const filterButtons = document.querySelectorAll('.filter-btn');
        const notificationCards = document.querySelectorAll('.notification-card');
        const emptyState = document.getElementById('emptyState');

        function updateNotifications() {
            const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
            let visibleCount = 0;

            notificationCards.forEach(function(card) {
                const category = card.dataset.category;
                const isUnread = card.classList.contains('unread');

                let shouldShow = false;

                if (activeFilter === 'all') {
                    shouldShow = true;
                } else if (activeFilter === 'unread') {
                    shouldShow = isUnread;
                } else {
                    shouldShow = category === activeFilter;
                }

                card.style.display = shouldShow ? 'flex' : 'none';

                if (shouldShow) {
                    visibleCount++;
                }
            });

            emptyState.classList.toggle('show', visibleCount === 0);
        }

        filterButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                filterButtons.forEach(function(item) {
                    item.classList.remove('active');
                });

                button.classList.add('active');
                updateNotifications();
            });
        });

        // Tandai satu notifikasi sebagai dibaca
        document.querySelectorAll('.btn-read:not(:disabled)').forEach(function(button) {
            button.addEventListener('click', function() {
                const card = button.closest('.notification-card');

                card.classList.remove('unread');

                button.innerHTML = '<i class="fa-solid fa-check"></i> Sudah Dibaca';
                button.disabled = true;

                const meta = card.querySelector('.notification-meta');
                const readLabel = document.createElement('span');

                readLabel.innerHTML =
                    '<i class="fa-regular fa-envelope-open"></i> Sudah dibaca';

                meta.appendChild(readLabel);

                updateCounters();
                updateNotifications();
            });
        });

        // Tandai semua notifikasi sebagai dibaca
        document.getElementById('markAllRead').addEventListener('click', function() {
            notificationCards.forEach(function(card) {
                card.classList.remove('unread');

                const button = card.querySelector('.btn-read');

                if (button) {
                    button.innerHTML =
                        '<i class="fa-solid fa-check"></i> Sudah Dibaca';
                    button.disabled = true;
                }
            });

            updateCounters();
            updateNotifications();
        });

        // Perbarui jumlah notifikasi
        function updateCounters() {
            const total = notificationCards.length;

            const unread = document.querySelectorAll(
                '.notification-card.unread'
            ).length;

            const newReports = document.querySelectorAll(
                '.notification-card[data-category="laporan"]'
            ).length;

            const feedback = document.querySelectorAll(
                '.notification-card[data-category="bk"], ' +
                '.notification-card[data-category="wakasek"]'
            ).length;

            document.getElementById('totalCount').textContent = total;
            document.getElementById('unreadCount').textContent = unread;
            document.getElementById('newReportCount').textContent = newReports;
            document.getElementById('feedbackCount').textContent = feedback;
        }

        updateCounters();
        updateNotifications();
    </script>

</body>
</html>
