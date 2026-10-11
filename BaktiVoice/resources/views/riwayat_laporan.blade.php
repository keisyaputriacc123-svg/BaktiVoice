<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Riwayat Laporan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --primary-hover: #7f99d4;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-dark: #0f172a;
            --text-muted: #64748b;

            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 12px;

            --font-family: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            width: var(--sidebar-width);

            background-color: #ffffff;
            border-right: 1px solid var(--border);

            padding: 24px 16px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 8px;
            margin-bottom: 28px;
        }

        .brand-logo-img {
            width: 60px;
            height: 60px;

            object-fit: contain;

            background-color: var(--primary);
            border-radius: 8px;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 800;
            color: #496cbd;
        }

        .nav-menu {
            list-style: none;

            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .nav-item a {
            display: flex;
            align-items: center;

            text-decoration: none;

            color: #496cbd;

            padding: 11px 12px;

            border-radius: 9px;

            transition: 0.2s ease;
        }

        .nav-content {
            display: flex;
            align-items: center;

            gap: 14px;
        }

        .nav-item i {
            width: 18px;

            text-align: center;

            font-size: 15px;
        }

        .nav-item a:hover {
            background-color: #f1f5f9;
        }

        /* MENU AKTIF */

        .nav-item.active > a {
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
        }

        /* LOGOUT */

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 14px;

            text-decoration: none;

            color: #ef4444;

            padding: 11px 12px;

            border-radius: 9px;

            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #fef2f2;
        }

        .logout-btn i {
            width: 18px;
            text-align: center;
        }

        /* =========================
           MAIN WRAPPER
        ========================= */

        .main-wrapper {
            margin-left: var(--sidebar-width);

            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: var(--topbar-height);

            background-color: #ffffff;

            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: flex-end;

            padding: 0 36px;

            position: sticky;
            top: 0;

            z-index: 900;
        }

        .topbar-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #496cbd;

            border-radius: 50%;

            margin-right: 12px;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .topbar-icon:hover {
            background-color: #f1f5f9;
        }

        .topbar-icon i {
            font-size: 17px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background-color: #e2e8f0;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #496cbd;
        }

        .avatar i {
            font-size: 15px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;

            color: #496cbd;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 32px 36px 50px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;

            color: #0f172a;

            margin-bottom: 24px;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-wrapper {
            position: relative;

            margin-bottom: 28px;
        }

        .search-icon {
            position: absolute;

            left: 17px;
            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;

            font-size: 16px;
        }

        .search-input {
            width: 100%;

            height: 48px;

            padding: 0 48px;

            border: 1px solid var(--border);

            border-radius: 10px;

            background-color: #ffffff;

            font-family: var(--font-family);
            font-size: 14px;

            color: var(--text-dark);

            outline: none;

            transition: 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 172, 224, 0.15);
        }

        .search-button {
            position: absolute;

            right: 8px;
            top: 50%;

            transform: translateY(-50%);

            width: 36px;
            height: 36px;

            border: none;

            background: transparent;

            color: #94a3b8;

            cursor: pointer;
        }

        .search-button i {
            font-size: 16px;
        }

        /* =========================
           LAPORAN CARD
        ========================= */

        .report-list {
            display: flex;
            flex-direction: column;

            gap: 14px;
        }

        .report-card {
            background-color: var(--card-bg);

            border: 1px solid var(--border);

            border-radius: 12px;

            padding: 18px;

            display: flex;
            align-items: center;

            gap: 16px;

            transition: 0.2s ease;
        }

        .report-card:hover {
            border-color: #cbd5e1;

            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.05);
        }

        /* GAMBAR / BUKTI */

        .report-image {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            border-radius: 8px;

            background-color: #f1f5f9;

            border: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #7f99d4;

            overflow: hidden;
        }

        .report-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .report-image i {
            font-size: 18px;
        }

        /* INFO LAPORAN */

        .report-info {
            flex: 1;

            min-width: 0;
        }

        .report-title {
            font-size: 15px;
            font-weight: 700;

            color: #0f172a;

            margin-bottom: 5px;
        }

        .report-date {
            font-size: 12px;

            color: var(--text-muted);
        }

        /* STATUS */

        .report-status {
            min-width: 90px;

            padding: 8px 14px;

            border-radius: 999px;

            text-align: center;

            font-size: 12px;

            font-weight: 600;
        }

        .status-diproses {
            background-color: #fff4cc;
            color: #d97706;
        }

        .status-selesai {
            background-color: #d1fae5;
            color: #059669;
        }

        .status-ditolak {
            background-color: #fee2e2;
            color: #dc2626;
        }

        /* PANAH */

        .report-arrow {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #94a3b8;

            flex-shrink: 0;
        }

        .report-arrow i {
            font-size: 14px;
        }

        .report-card:hover .report-arrow {
            color: #496cbd;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;

                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;

                margin-bottom: 28px;
            }

            .brand-logo-img {
                width: 48px;
                height: 48px;
            }

            .brand-name {
                display: none;
            }

            .nav-item a {
                justify-content: center;

                padding: 12px 8px;
            }

            .nav-content {
                justify-content: center;
            }

            .nav-content span {
                display: none;
            }

            .nav-item i {
                font-size: 17px;
            }

            .logout-btn {
                justify-content: center;

                padding: 12px 8px;
            }

            .logout-btn span {
                display: none;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 28px 20px 40px;
            }
        }

        @media (max-width: 550px) {

            .user-name {
                display: none;
            }

            .page-title {
                font-size: 24px;
            }

            .report-card {
                padding: 14px;

                gap: 12px;
            }

            .report-image {
                width: 42px;
                height: 42px;
            }

            .report-title {
                font-size: 13px;
            }

            .report-date {
                font-size: 11px;
            }

            .report-status {
                min-width: auto;

                padding: 6px 9px;

                font-size: 10px;
            }

            .report-arrow {
                width: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div>

            <!-- BRAND -->
            <div class="brand">

                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >

                <span class="brand-name">
                    BaktiVoice
                </span>

            </div>


            <!-- NAVIGATION -->
            <ul class="nav-menu">

                <!-- DASHBOARD -->
                <li class="nav-item">

                    <a href="{{ route('dashboard_siswa') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-house"></i>

                            <span>
                                Dashboard
                            </span>

                        </div>

                    </a>

                </li>


                <!-- BUAT LAPORAN -->
                <li class="nav-item">

                    <a href="{{ route('buat_laporan') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>
                                Buat Laporan
                            </span>

                        </div>

                    </a>

                </li>


                <!-- RIWAYAT LAPORAN -->
                <li class="nav-item active">

                    <a href="{{ route('riwayat_laporan') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-clock-rotate-left"></i>

                            <span>
                                Riwayat Laporan
                            </span>

                        </div>

                    </a>

                </li>


                <!-- NOTIFIKASI -->
                <li class="nav-item">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-regular fa-bell"></i>

                            <span>
                                Notifikasi
                            </span>

                        </div>

                    </a>

                </li>


                <!-- PROFIL -->
                <li class="nav-item">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-regular fa-user"></i>

                            <span>
                                Profil
                            </span>

                        </div>

                    </a>

                </li>

            </ul>

        </div>


        <!-- LOGOUT -->
        <a href="{{ route('login') }}" class="logout-btn">

            <i class="fa-solid fa-xmark"></i>

            <span>
                Logout
            </span>

        </a>

    </aside>


    <!-- =========================
         MAIN WRAPPER
    ========================== -->

    <div class="main-wrapper">


        <!-- TOPBAR -->
        <header class="topbar">

            <!-- NOTIFICATION -->
            <div class="topbar-icon" title="Notifikasi">

                <i class="fa-regular fa-bell"></i>

            </div>


            <!-- USER -->
            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Nama Siswa' }}
                </span>

            </div>

        </header>


        <!-- =========================
             CONTENT
        ========================== -->

        <main class="content">

            <h1 class="page-title">
                Riwayat Laporan
            </h1>


            <!-- SEARCH -->
            <div class="search-wrapper">

                <i class="fa-solid fa-magnifying-glass search-icon"></i>

                <input
                    type="text"
                    class="search-input"
                    id="searchInput"
                    placeholder="Cari..."
                >

                <button
                    type="button"
                    class="search-button"
                >
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

            </div>


            <!-- DAFTAR LAPORAN -->
            <div class="report-list" id="reportList">


                <!-- LAPORAN 1 -->
                <div
                    class="report-card"
                    data-title="Fasilitas Kelas"
                    data-date="14 Sep 2026"
                >

                    <div class="report-image">

                        <i class="fa-regular fa-image"></i>

                    </div>


                    <div class="report-info">

                        <div class="report-title">
                            Fasilitas Kelas
                        </div>

                        <div class="report-date">
                            14 Sep 2026
                        </div>

                    </div>


                    <div class="report-status status-diproses">
                        Diproses
                    </div>


                    <div class="report-arrow">

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>

                </div>


                <!-- LAPORAN 2 -->
                <div
                    class="report-card"
                    data-title="Fasilitas Toilet"
                    data-date="12 Sep 2026"
                >

                    <div class="report-image">

                        <i class="fa-regular fa-image"></i>

                    </div>


                    <div class="report-info">

                        <div class="report-title">
                            Fasilitas Toilet
                        </div>

                        <div class="report-date">
                            12 Sep 2026
                        </div>

                    </div>


                    <div class="report-status status-selesai">
                        Selesai
                    </div>


                    <div class="report-arrow">

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>

                </div>


                <!-- LAPORAN 3 -->
                <div
                    class="report-card"
                    data-title="Keamanan Sekolah"
                    data-date="9 Sep 2026"
                >

                    <div class="report-image">

                        <i class="fa-regular fa-image"></i>

                    </div>


                    <div class="report-info">

                        <div class="report-title">
                            Keamanan Sekolah
                        </div>

                        <div class="report-date">
                            9 Sep 2026
                        </div>

                    </div>


                    <div class="report-status status-ditolak">
                        Ditolak
                    </div>


                    <div class="report-arrow">

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>

                </div>


                <!-- LAPORAN 4 -->
                <div
                    class="report-card"
                    data-title="Saran"
                    data-date="7 Sep 2026"
                >

                    <div class="report-image">

                        <i class="fa-regular fa-image"></i>

                    </div>


                    <div class="report-info">

                        <div class="report-title">
                            Saran
                        </div>

                        <div class="report-date">
                            7 Sep 2026
                        </div>

                    </div>


                    <div class="report-status status-selesai">
                        Selesai
                    </div>


                    <div class="report-arrow">

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>

                </div>

            </div>

        </main>

    </div>


    <!-- =========================
         SEARCH JAVASCRIPT
    ========================== -->

    <script>

        const searchInput = document.getElementById('searchInput');

        const reportCards = document.querySelectorAll('.report-card');


        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();


            reportCards.forEach(function (card) {

                const title = card.dataset.title.toLowerCase();

                const date = card.dataset.date.toLowerCase();


                if (
                    title.includes(keyword) ||
                    date.includes(keyword)
                ) {

                    card.style.display = 'flex';

                } else {

                    card.style.display = 'none';

                }

            });

        });

    </script>

</body>
</html>
