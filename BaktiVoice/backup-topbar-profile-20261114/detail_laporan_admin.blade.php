<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BaktiVoice - Detail Laporan</title>

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
            --border: rgba(186, 210, 240, 0.5);
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
            width: 60px !important;
            height: 60px !important;
            max-width: 60px !important;
            background-color: #fff;
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
            background-color: #fff;
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

        /* MAIN WRAPPER */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            background-color: var(--background) !important;
        }

        /* TOPBAR */
        .topbar {
            height: var(--topbar-height);
            min-height: var(--topbar-height);
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
            text-decoration: none;
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
            background-color: #fff;
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
            flex: 1;
            background-color: var(--background) !important;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .heading-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .back-btn {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(186, 210, 240, 0.7);
            border-radius: 10px;
            background: #fff;
            color: var(--text-main);
            font-size: 16px;
            text-decoration: none;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background: #f1f5ff;
            transform: translateX(-2px);
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            line-height: 1.3;
        }

        .report-code {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid rgba(186, 210, 240, 0.6);
            padding: 10px 16px;
            border-radius: 10px;
            color: #3b62ac;
            font-size: 13px;
            font-weight: 800;
            box-shadow: var(--shadow);
        }

        .report-code i {
            font-size: 14px;
        }

        .detail-card {
            background: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .detail-divider {
            border: 0;
            border-top: 1px solid rgba(186, 210, 240, 0.65);
            margin: 0 0 26px;
        }

        .metadata-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 20px 28px;
            margin-bottom: 30px;
        }

        .metadata-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .metadata-item label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-muted);
        }

        .metadata-value {
            min-height: 44px;
            display: flex;
            align-items: center;
            padding: 11px 14px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 9px;
            background: #f8faff;
            color: #2c4a8e;
            font-size: 14px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .metadata-value i {
            margin-right: 9px;
            color: #628cdb;
        }

        .status-select {
            width: 100%;
            min-height: 44px;
            padding: 10px 36px 10px 14px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 9px;
            background-color: #f8faff;
            color: #2c4a8e;
            font-size: 14px;
            font-weight: 600;
            outline: none;
            cursor: pointer;
        }

        .status-select:focus,
        .response-textarea:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.15);
        }

        .form-section {
            margin-bottom: 28px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1e3a70;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .section-title i {
            color: #628cdb;
            width: 20px;
            text-align: center;
        }

        .report-description {
            min-height: 110px;
            padding: 18px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 10px;
            background: #f8faff;
            color: #334e7d;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .evidence-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            flex-wrap: wrap;
        }

        .evidence-item {
            width: 112px;
            height: 112px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 10px;
            background: #eaf0ff;
            color: #628cdb;
            font-size: 30px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .evidence-item:hover {
            border-color: #7b9fe8;
            box-shadow: 0 5px 14px rgba(123, 159, 232, 0.18);
            transform: translateY(-2px);
        }

        .evidence-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-evidence {
            color: var(--text-muted);
            font-size: 13px;
            padding: 14px 0;
        }

        .response-textarea {
            display: block;
            width: 100%;
            min-height: 130px;
            resize: vertical;
            padding: 16px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 10px;
            background: #f8faff;
            color: #334e7d;
            font-size: 14px;
            line-height: 1.7;
            outline: none;
            transition: all 0.2s ease;
        }

        .response-textarea::placeholder {
            color: #94a3b8;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            border-top: 1px solid rgba(186, 210, 240, 0.65);
            padding-top: 24px;
            margin-top: 8px;
        }

        .form-note {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 46px;
            padding: 13px 22px;
            background: var(--gradient-button);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(71, 114, 199, 0.2);
            transition: all 0.2s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 16px rgba(71, 114, 199, 0.28);
        }

        .btn-save:disabled {
            opacity: 0.65;
            cursor: wait;
            transform: none;
        }

        .alert-message {
            display: none;
            padding: 13px 16px;
            border-radius: 9px;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .alert-message.show {
            display: block;
        }

        .alert-message.success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-message.error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .content {
                padding: 26px;
            }

            .detail-card {
                padding: 24px;
            }

            .metadata-grid {
                gap: 18px;
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
                width: 46px !important;
                height: 46px !important;
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
                padding: 12px 8px;
            }

            .nav-content {
                justify-content: center;
                gap: 0;
            }

            .nav-item i,
            .logout-btn i {
                font-size: 18px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 16px;
                gap: 10px;
            }

            .user-profile {
                gap: 8px;
                padding: 5px;
            }

            .user-name {
                font-size: 12px;
            }

            .content {
                padding: 20px 14px;
            }

            .page-title {
                font-size: 22px;
            }

            .detail-card {
                padding: 18px;
            }

            .metadata-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .btn-save {
                width: 100%;
            }
        }

        @media (max-width: 380px) {
            .report-code {
                padding: 9px 11px;
            }

            .heading-left {
                gap: 9px;
            }

            .page-title {
                font-size: 20px;
            }

            .avatar {
                width: 32px;
                height: 32px;
            }
        }

/* ==========================================================
   RESPONSIVE MOBILE - DETAIL LAPORAN ADMIN
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
        background: #fff;
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
}
</style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div>
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('dashboard_admin') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('masterMenu', 'masterArrow')">
                        <div class="nav-content">
                            <i class="fa-solid fa-database"></i>
                            <span>Data Master</span>
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="masterArrow"></i>
                    </button>

                    <ul class="sub-menu" id="masterMenu">
                        <li><a href="{{ route('data_master') }}">Kategori Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">Status Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">User &amp; Role</a></li>
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

                <li class="nav-item">
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

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 16px;">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper">

        {{-- TOPBAR --}}
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

        <div class="user-profile">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <span class="user-name">{{ auth()->user()->name ?? 'Admin Sekolah' }}</span>
        </div>
    </div>
</header>

        {{-- MAIN CONTENT --}}
        <main class="content">

            <div class="page-heading">
                <div class="heading-left">
                    <a href="{{ route('dashboard_admin') }}" class="back-btn" title="Kembali">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <h1 class="page-title">Detail Laporan</h1>
                </div>

                <div class="report-code">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>{{ $laporan->id_laporan ?? 'BV001' }}</span>
                </div>
            </div>

            <div class="detail-card">

                @if(session('success'))
                    <div class="alert-message success show">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif

                <hr class="detail-divider">

                {{-- FORM DINAMIS KE CONTROLLER --}}
                <form action="{{ route('laporan.updateStatus', $laporan->id_laporan) }}"
      method="POST"
      id="formUpdateStatusAdmin">
                    @csrf
                    @method('PUT')

                    <section class="metadata-grid">

                        <div class="metadata-item">
                            <label>Kategori</label>
                            <div class="metadata-value">
                                <i class="fa-solid fa-layer-group"></i>
                                {{ $laporan->kategori->nama_kategori ?? '-' }}
                            </div>
                        </div>

                        <div class="metadata-item">
                            <label>Pelapor</label>
                            <div class="metadata-value">
                                <i class="fa-regular fa-user"></i>
                                {{ $laporan->anonim ? 'Anonim' : ($laporan->user->name ?? 'Siswa') }}
                            </div>
                        </div>

                        <div class="metadata-item">
                            <label>Tanggal Laporan</label>
                            <div class="metadata-value">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $laporan->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <div class="metadata-item">
                            <label for="reportStatus">Status Laporan</label>
                            <select class="status-select" id="reportStatus" name="status">
                                @php
                                    $statusSekarang = strtolower($laporan->status ?? 'pending');
                                @endphp
                                <option value="pending" {{ $statusSekarang === 'pending' ? 'selected' : '' }}>Pending</option>
<option value="proses" {{ $statusSekarang === 'proses' ? 'selected' : '' }}>Diproses</option>
<option value="selesai" {{ $statusSekarang === 'selesai' ? 'selected' : '' }}>Selesai</option>
<option value="ditolak" {{ $statusSekarang === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                    </section>


                    <section class="form-section">
                        <h2 class="section-title">
                            <i class="fa-regular fa-file-lines"></i> Isi Laporan
                        </h2>

                        <div class="report-description">
                            {{ $laporan->isi_laporan }}
                        </div>
                    </section>


                   <section class="form-section">
    <h2 class="section-title">
        <i class="fa-regular fa-images"></i> Bukti Pendukung
    </h2>

    <div class="evidence-wrapper">
        @if($laporan->buktiLaporan && $laporan->buktiLaporan->count() > 0)
            @foreach($laporan->buktiLaporan as $bukti)
                <a href="{{ asset($bukti->file_path) }}" target="_blank" class="evidence-item">
                    <img src="{{ asset($bukti->file_path) }}" alt="Bukti Laporan">
                </a>
            @endforeach
        @else
            <div class="no-evidence" style="color: var(--text-muted); font-size: 13px;">
                Tidak ada bukti lampiran.
            </div>
        @endif
    </div>
</section>


                    <section class="form-section">
                        <h2 class="section-title">
                            <i class="fa-regular fa-comment-dots"></i> Isi Tanggapan
                        </h2>
                        <textarea class="response-textarea" name="tanggapan" placeholder="Tuliskan tanggapan atau tindak lanjut terhadap laporan ini...">{{ optional($laporan->tanggapan->last())->tanggapan ?? '' }}</textarea>
                    </section>


                    <div class="form-footer">
                        <p class="form-note">
                            <i class="fa-solid fa-circle-info"></i> Periksa status dan tanggapan sebelum menyimpan perubahan.
                        </p>
                        <button type="submit" class="btn-save" id="btnSimpanPerubahanAdmin">
    <i class="fa-solid fa-floppy-disk" id="iconSimpanPerubahanAdmin"></i>
    <span id="textSimpanPerubahanAdmin">Simpan Perubahan</span>
</button>
                    </div>

                </form>
            </div>
        </main>
    </div>

<!-- MOBILE BOTTOM NAVIGATION -->
<div class="mobile-bottom-nav">
    <a href="{{ route('dashboard_admin') }}">
        <i class="fa-solid fa-house"></i>
        <span>Beranda</span>
    </a>

    <div class="mobile-nav-dropdown">
        <button type="button"
                class="mobile-nav-dropdown-btn"
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

    <a href="{{ route('rekap_laporan') }}">
        <i class="fa-solid fa-chart-column"></i>
        <span>Rekap</span>
    </a>

    <a href="{{ route('notifikasi_admin') }}">
        <i class="fa-regular fa-bell"></i>
        <span>Notif</span>
    </a>

    <a href="{{ route('profil_admin') }}">
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
    <!-- ANTI DOUBLE CLICK SIMPAN PERUBAHAN -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('formUpdateStatusAdmin');
        const button = document.getElementById('btnSimpanPerubahanAdmin');
        const icon = document.getElementById('iconSimpanPerubahanAdmin');
        const text = document.getElementById('textSimpanPerubahanAdmin');

        if (!form || !button || !icon || !text) return;

        form.addEventListener('submit', function (event) {

            if (form.dataset.submitting === 'true') {
                event.preventDefault();
                return;
            }

            form.dataset.submitting = 'true';

            button.disabled = true;
            button.style.opacity = '0.7';
            button.style.cursor = 'not-allowed';

            icon.className = 'fa-solid fa-spinner fa-spin';
            text.textContent = 'Menyimpan...';

        });

    });
    </script>
    <script src="{{ asset('js/logout-handler.js') }}"></script>
</body>
</html>

