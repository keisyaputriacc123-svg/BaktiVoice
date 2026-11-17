<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Rekap Laporan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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


            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
            --gradient-button: linear-gradient(135deg, #628cdb 0%, #4772c7 100%);
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


        /* =====================================================
        SIDEBAR
        ===================================================== */

        .sidebar {
            width: var(--sidebar-width);
            background: var(--gradient-pastel) !important;
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
            color: #1e3a70 !important;
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
            color: #274472 !important;
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
            background-color: rgba(255, 255, 255, 0.4) !important;
            color: #102a56 !important;
            transform: translateX(4px);
        }

        /* MENU AKTIF */
        .nav-item.active > a,
        .nav-item.active > .dropdown-btn {
            background-color: #ffffff !important;
            color: #3b62ac !important;
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


        /* =====================================================
        SUB MENU DATA MASTER
        ===================================================== */

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
            color: #274472 !important;
            border-radius: 6px;
            text-decoration: none;
            display: block;
            transition: background 0.2s;
        }

        .sub-menu a:hover {
            background-color: rgba(255, 255, 255, 0.4) !important;
            color: #102a56 !important;
        }


        /* =====================================================
        LOGOUT
        ===================================================== */

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #e11d48 !important;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
            margin-top: 16px;
            background: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.5) !important;
            color: #be123c !important;
        }


        /* =====================================================
        MAIN WRAPPER & TOPBAR (PASTEL BLUE)
        ===================================================== */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--background) !important;
        }

        .topbar {
            height: var(--topbar-height);
            background: var(--gradient-pastel) !important;
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
            color: #274472 !important;
            font-size: 18px;
            cursor: pointer;
            position: relative;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.2s ease;
            border: none;
            background: none;
        }

        .topbar-icon:hover {
            background-color: rgba(255, 255, 255, 0.4) !important;
            color: #102a56 !important;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            transition: background 0.2s;
            cursor: pointer;
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
            color: #3b62ac !important;
            font-size: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a70 !important;
        }


        /* =====================================================
        CONTENT
        ===================================================== */

        .content {
            padding: 36px;
            flex: 1;
            background-color: var(--background) !important;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70 !important;
            margin-bottom: 28px;
        }


        /* =====================================================
        FILTER AREA
        ===================================================== */

        .filter-wrapper {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            margin-bottom: 28px;
            box-shadow: var(--shadow);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(180px, 1fr)) auto;
            gap: 16px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .filter-select,
        .filter-date {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background-color: #ffffff;
            color: #334155;
            font-size: 14px;
            outline: none;
            cursor: pointer;
            transition: border-color 0.2s;
        }

        .filter-select:focus,
        .filter-date:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        .filter-button {
            height: 48px;
            padding: 0 24px;
            border: none;
            border-radius: 8px;
            background: var(--gradient-button) !important;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(98, 140, 219, 0.25);
            transition: all 0.2s ease;
        }

        .filter-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(98, 140, 219, 0.35);
        }


        /* =====================================================
        STATS
        ===================================================== */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(160px, 1fr));
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            min-height: 130px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
        }

        .stat-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: 800;
        }

        .stat-card.total .stat-value { color: #1e3a70; }
        .stat-card.pending .stat-value { color: #64748b; }
        .stat-card.diproses .stat-value { color: #d97706; }
        .stat-card.selesai .stat-value { color: #16a34a; }
        .stat-card.ditolak .stat-value { color: #dc2626; }


        /* =====================================================
        TABLE
        ===================================================== */

        .table-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e3a70;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .report-table th {
            background-color: #f8fafc;
            color: #1e3a70;
            font-size: 13px;
            font-weight: 700;
            padding: 15px 16px;
            text-align: left;
            border-bottom: 2px solid var(--border);
        }

        .report-table td {
            padding: 16px;
            font-size: 14px;
            color: #334155;
            border-bottom: 1px solid rgba(186, 210, 240, 0.4);
            vertical-align: middle;
        }

        .report-table tbody tr:hover {
            background-color: #f1f5f9;
        }

        .report-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* =====================================================
        STATUS BADGE
        ===================================================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-diproses { background-color: #fef3c7; color: #b45309; }
        .badge-selesai { background-color: #dcfce7; color: #15803d; }
        .badge-ditolak { background-color: #fee2e2; color: #b91c1c; }


        /* =====================================================
        BUTTON LIHAT
        ===================================================== */

        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: none;
            border-radius: 7px;
            background-color: #eaf0ff;
            color: #3b62ac;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-view:hover {
            background-color: #3b62ac;
            color: white;
        }

        .btn-view i {
            font-size: 13px;
        }


        /* =====================================================
        EMPTY STATE
        ===================================================== */

        .empty-row {
            text-align: center !important;
            padding: 40px !important;
            color: var(--text-muted) !important;
        }


        /* =====================================================
        RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .filter-button {
                width: 100%;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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
            .brand-logo-img {
                width: 45px !important;
                height: 45px !important;
            }
            .brand-name,
            .nav-item span,
            .logout-btn span,
            .arrow-icon,
            .sub-menu {
                display: none !important;
            }
            .nav-item a,
            .dropdown-btn,
            .logout-btn {
                justify-content: center;
                padding: 12px;
            }
            .main-wrapper {
                margin-left: 70px;
            }
            .topbar {
                padding: 0 20px;
            }
            .user-name {
                display: none;
            }
            .content {
                padding: 20px;
            }
            .page-title {
                font-size: 24px;
            }
            .filter-grid {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

/* ==========================================================
   RESPONSIVE MOBILE - BAKTIVOICE ADMIN
   ========================================================== */

.topbar-mobile-brand {
    display: none;
}

.topbar-right-group {
    display: flex;
    align-items: center;
    gap: 10px;
}

.mobile-bottom-nav {
    display: none;
}

@media (max-width: 768px) {

    .sidebar {
        display: none !important;
    }

    .main-wrapper {
        margin-left: 0 !important;
        width: 100% !important;
        min-height: 100vh;
        min-width: 0 !important;
    }

    .topbar {
        height: 60px;
        min-height: 60px;
        padding: 0 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        background: linear-gradient(110deg, #dbeafe, #bfdbfe, #93c5fd);
        position: sticky;
        top: 0;
        z-index: 900;
    }

    .topbar-mobile-brand {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 0;
    }

    .topbar-logo-img {
        width: 30px;
        height: 30px;
        object-fit: contain;
    }

    .topbar-brand-name {
        color: #274472;
        font-size: 16px;
        font-weight: 700;
    }

    .topbar-right-group {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .topbar-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .user-name {
        display: none !important;
    }

    main,
    .main-content,
    .content {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        box-sizing: border-box;
        padding: 24px 18px 105px !important;
    }

    .mobile-bottom-nav {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        min-height: 66px;
        padding: 7px 3px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 2px;
        background: linear-gradient(110deg, #dbeafe, #bfdbfe, #93c5fd);
        box-shadow: 0 -3px 14px rgba(55, 90, 150, 0.12);
        z-index: 1100;
    }

    .mobile-bottom-nav > a,
    .mobile-nav-dropdown > button {
        flex: 1;
        min-width: 0;
        min-height: 50px;
        padding: 5px 2px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        border: none;
        border-radius: 10px;
        background: transparent;
        color: #42618f;
        text-decoration: none;
        font-family: inherit;
        cursor: pointer;
    }

    .mobile-bottom-nav > a i,
    .mobile-nav-dropdown > button i {
        font-size: 17px;
    }

    .mobile-bottom-nav > a span,
    .mobile-nav-dropdown > button span {
        font-size: 9px;
        font-weight: 600;
        white-space: nowrap;
    }

    .mobile-bottom-nav > a.active,
    .mobile-nav-dropdown > button.active {
        color: #244a91;
        background: rgba(255, 255, 255, 0.55);
    }

    .mobile-nav-dropdown {
        position: relative;
        flex: 1;
        min-width: 0;
    }

    .mobile-data-master-menu {
        display: none;
        position: absolute;
        bottom: calc(100% + 10px);
        left: 50%;
        transform: translateX(-50%);
        width: 185px;
        padding: 7px;
        flex-direction: column;
        gap: 4px;
        background: #ffffff;
        border: 1px solid #dbeafe;
        border-radius: 13px;
        box-shadow: 0 5px 20px rgba(40, 70, 120, 0.18);
    }

    .mobile-data-master-menu.show {
        display: flex;
    }

    .mobile-data-master-menu a {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 11px 10px;
        border-radius: 8px;
        color: #365783;
        font-size: 12px;
        text-decoration: none;
    }

    .mobile-data-master-menu a:active {
        background: #eaf1fb;
    }

    .mobile-logout-link i,
    .mobile-logout-link span {
        color: #e11d48 !important;
    }
}

@media (max-width: 380px) {
    .mobile-bottom-nav > a span,
    .mobile-nav-dropdown > button span {
        font-size: 8px;
    }

    .mobile-bottom-nav > a i,
    .mobile-nav-dropdown > button i {
        font-size: 16px;
    }
}
</style>
</head>


<body>

    <!-- =====================================================
        SIDEBAR
    ====================================================== -->

    <aside class="sidebar">

        <div>


            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>



            <ul class="nav-menu">


                <li class="nav-item">

                    <a href="{{ route('dashboard_admin') }}">
                        <div class="nav-content"><i class="fa-regular fa-file-lines"></i><span>Laporan</span></div>
                    </a>

                </li>



                <li class="nav-item">
                    <button class="dropdown-btn" onclick="toggleDropdown('masterMenu', 'masterArrow')">
                        <div class="nav-content"><i class="fa-solid fa-database"></i><span>Data Master</span></div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="masterArrow"></i>
                    </button>
                    <ul class="sub-menu" id="masterMenu">
                        <li><a href="{{ route('data_master') }}">Kategori Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">Status Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">User & Role</a></li>
                    </ul>
                </li>



                <li class="nav-item active">

                    <a href="{{ route('rekap_laporan') }}">
                        <div class="nav-content"><i class="fa-solid fa-chart-column"></i><span>Rekap Laporan</span></div>
                    </a>

                </li>



                <li class="nav-item">

                    <a href="{{ route('notifikasi_admin') }}">
                        <div class="nav-content"><i class="fa-regular fa-bell"></i><span>Notifikasi</span></div>
                    </a>

                </li>



                <li class="nav-item">

                    <a href="{{ route('profil_admin') }}">
                        <div class="nav-content"><i class="fa-regular fa-user"></i><span>Profil</span></div>
                    </a>

                </li>

            </ul>

        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">




        <header class="topbar">
    <div class="topbar-mobile-brand">
        <img src="{{ asset('images/logo BaktiVoice.png') }}"
             alt="Logo BaktiVoice"
             class="topbar-logo-img">
        <span class="topbar-brand-name">BaktiVoice</span>
    </div>

    <div class="topbar-right-group">
        <a href="{{ route('notifikasi_admin') }}"
           class="topbar-icon"
           title="Notifikasi"
           aria-label="Notifikasi">
            <i class="fa-regular fa-bell"></i>
        </a>

        <a href="{{ route('profil_admin') }}" class="user-profile" style="text-decoration: none; color: inherit;">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <span class="user-name">{{ Auth::user()->name ?? 'Admin Sekolah' }}</span>
        </a>
    </div>
</header>





        <main class="content">
            <h1 class="page-title">Rekap Laporan</h1>

            <!-- FORM FILTER (GET) -->
            <form action="{{ route('rekap_laporan') }}" method="GET" class="filter-wrapper">
                <div class="filter-grid">




                    <div class="filter-group">
                        <label for="kategori" class="filter-label">Kategori</label>
                        <select id="kategori" name="kategori" class="filter-select">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoriList as $kat)
                                <option value="{{ $kat->id_kategori }}" {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                    </div>





                    <div class="filter-group">
                        <label for="status" class="filter-label">Status</label>
                        <select id="status" name="status" class="filter-select">
    <option value="">Semua Status</option>
    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
    <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Diproses</option>
    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
</select>

                    </div>





                    <div class="filter-group">
                        <label for="tanggal" class="filter-label">Pilih Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ request('tanggal') }}" class="filter-date">
                    </div>





                    <div class="filter-group">
                        <button type="submit" class="filter-button" id="btnTampilkanRekap">
    <i class="fa-solid fa-filter" id="iconTampilkanRekap"></i>
    <span id="textTampilkanRekap">Tampilkan</span>
</button>

                    </div>

                </div>
            </form>

            <!-- STATISTICS -->
            <section class="stats-grid">




                <div class="stat-card total">
                    <div class="stat-title">TOTAL</div>
                    <div class="stat-value" id="totalCount">{{ $totalLaporan ?? 0 }}</div>
                </div>
                <div class="stat-card pending">
                    <div class="stat-title">PENDING</div>
                    <div class="stat-value" id="pendingCount">{{ $pendingCount ?? 0 }}</div>
                </div>
                <div class="stat-card diproses">
                    <div class="stat-title">DIPROSES</div>
                    <div class="stat-value" id="diprosesCount">{{ $diprosesCount ?? 0 }}</div>
                </div>
                <div class="stat-card selesai">
                    <div class="stat-title">SELESAI</div>
                    <div class="stat-value" id="selesaiCount">{{ $selesaiCount ?? 0 }}</div>
                </div>
                <div class="stat-card ditolak">
                    <div class="stat-title">DITOLAK</div>
                    <div class="stat-value" id="ditolakCount">{{ $ditolakCount ?? 0 }}</div>
                </div>
            </section>

            <!-- TABLE -->

            <section class="table-card">




                <div class="table-header">
                    <h2 class="table-title">Daftar Laporan</h2>
                </div>





                <div class="table-wrapper">

                    <table class="report-table">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Laporan</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>


                        <tbody id="reportTableBody">
                            @forelse($laporans as $item)
                                @php
    $namaStatus = strtolower($item->status ?? 'pending');
@endphp
                                <tr>
                                    <td>BV{{ str_pad($item->id_laporan, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $item->judul_laporan }}</td>
                                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                    <td>
                                        <span class="status-badge badge-{{ $namaStatus }}">
                                            {{ ucfirst($namaStatus) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('laporan.show', $item->id_laporan) }}" class="btn-view">
                                            <span>Lihat</span>
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-row">Belum ada data rekap laporan yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>

            </section>


        </main>

    </div>

<!-- MOBILE BOTTOM NAVIGATION -->
<div class="mobile-bottom-nav">
    <a href="{{ route('dashboard_admin') }}"
       class="{{ request()->routeIs('dashboard_admin') ? 'active' : '' }}">
        <i class="fa-solid fa-house"></i>
        <span>Beranda</span>
    </a>

    <div class="mobile-nav-dropdown">
        <button type="button"
                class="mobile-nav-dropdown-btn {{ request()->routeIs('data_master') ? 'active' : '' }}"
                onclick="toggleMobileDataMasterMenu()"
                aria-expanded="false"
                id="mobileDataMasterButton">
            <i class="fa-solid fa-database"></i>
            <span>Data Master</span>
        </button>

        <div class="mobile-data-master-menu" id="mobileDataMasterMenu">
            <a href="{{ route('data_master', ['tab' => 'users']) }}">
                <i class="fa-solid fa-users"></i>
                <span>User & Role</span>
            </a>
            <a href="{{ route('data_master', ['tab' => 'kategori']) }}">
                <i class="fa-solid fa-layer-group"></i>
                <span>Kategori Laporan</span>
            </a>
            <a href="{{ route('data_master', ['tab' => 'status']) }}">
                <i class="fa-solid fa-list-check"></i>
                <span>Status Laporan</span>
            </a>
        </div>
    </div>

    <a href="{{ route('rekap_laporan') }}"
       class="{{ request()->routeIs('rekap_laporan') ? 'active' : '' }}">
        <i class="fa-solid fa-chart-column"></i>
        <span>Rekap</span>
    </a>

    <a href="{{ route('notifikasi_admin') }}"
       class="{{ request()->routeIs('notifikasi_admin') ? 'active' : '' }}">
        <i class="fa-regular fa-bell"></i>
        <span>Notif</span>
    </a>

    <a href="{{ route('profil_admin') }}"
       class="{{ request()->routeIs('profil_admin') ? 'active' : '' }}">
        <i class="fa-regular fa-user"></i>
        <span>Profil</span>
    </a>

    <form method="POST" action="{{ route('logout') }}"
          id="mobile-bottom-logout-form" style="display:none;">
        @csrf
    </form>

    <a href="#"
       class="mobile-logout-link"
       onclick="event.preventDefault(); document.getElementById('mobile-bottom-logout-form').submit();">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>
</div>





    <script>



        function toggleDropdown(menuId, arrowId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);
            menu.classList.toggle('show');
            arrow.style.transform = menu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
        }
    </script>



<script>
function toggleMobileDataMasterMenu() {
    const menu = document.getElementById('mobileDataMasterMenu');
    const button = document.getElementById('mobileDataMasterButton');

    if (!menu || !button) return;

    menu.classList.toggle('show');
    button.setAttribute(
        'aria-expanded',
        menu.classList.contains('show') ? 'true' : 'false'
    );
}

document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.mobile-nav-dropdown');

    if (dropdown && !dropdown.contains(event.target)) {
        const menu = document.getElementById('mobileDataMasterMenu');
        const button = document.getElementById('mobileDataMasterButton');

        if (menu) menu.classList.remove('show');
        if (button) button.setAttribute('aria-expanded', 'false');
    }
});
</script>
<script>
// ==========================================
// ANTI-DOUBLE CLICK TOMBOL TAMPILKAN REKAP
// ==========================================

document.addEventListener('DOMContentLoaded', function () {

    const formFilter = document.querySelector(
        'form.filter-wrapper'
    );

    const btnTampilkan = document.getElementById(
        'btnTampilkanRekap'
    );

    const iconTampilkan = document.getElementById(
        'iconTampilkanRekap'
    );

    const textTampilkan = document.getElementById(
        'textTampilkanRekap'
    );

    if (
        !formFilter ||
        !btnTampilkan ||
        !iconTampilkan ||
        !textTampilkan
    ) {
        return;
    }

    formFilter.addEventListener('submit', function (event) {

        // Mencegah pengiriman form berulang
        if (formFilter.dataset.submitting === 'true') {
            event.preventDefault();
            return;
        }

        // Tandai form sedang diproses
        formFilter.dataset.submitting = 'true';

        // Nonaktifkan tombol
        btnTampilkan.disabled = true;
        btnTampilkan.style.opacity = '0.7';
        btnTampilkan.style.cursor = 'not-allowed';

        // Tampilkan loading
        iconTampilkan.className =
            'fa-solid fa-spinner fa-spin';

        textTampilkan.textContent = 'Memuat...';

    });

});
</script>
    <script src="{{ asset('js/logout-handler.js') }}"></script>
</body>

</html>


