<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Dashboard Guru BK</title>

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

            background-color: #ffffff !important;
            color: #3b62ac;

            font-weight: 800;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
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

        .nav-item a {
            display: flex;
            align-items: center;

            width: 100%;

            padding: 12px 16px;

            color: #274472 !important;
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
            background-color: rgba(255, 255, 255, 0.4) !important;
            color: #102a56 !important;
            transform: translateX(4px);
        }

        .nav-item.active > a {
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

            transition: background 0.2s;
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
           MAIN CONTENT
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

            margin-bottom: 20px;
        }


        /* =====================================================
           WELCOME SECTION
        ===================================================== */

        .welcome-section {
            margin-bottom: 28px;
        }

        .welcome-title {
            font-size: 30px;

            font-weight: 800;

            color: #1e3a70 !important;

            margin-bottom: 4px;
        }

        .welcome-text {
            font-size: 16px;

            color: var(--text-muted);

            margin-bottom: 18px;
        }


        /* =====================================================
           STATS
        ===================================================== */

        .stats-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 36px;
        }

        .stat-card {
            background-color: var(--card-bg);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            padding: 24px;

            text-align: center;

            box-shadow: var(--shadow);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
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

            color: var(--text-main);
        }

        .stat-card.total .stat-value {
            color: #1e3a70;
        }

        .stat-card.diproses .stat-value {
            color: #d97706;
        }

        .stat-card.selesai .stat-value {
            color: #16a34a;
        }

        .stat-card.ditolak .stat-value {
            color: #dc2626;
        }


        /* =====================================================
           LAPORAN TERBARU
        ===================================================== */

        .section-header {
            font-size: 22px;

            font-weight: 700;

            color: #1e3a70 !important;

            margin-bottom: 16px;
        }

        .report-list {
            display: flex;

            flex-direction: column;

            gap: 12px;
        }

        .report-card {
            background-color: var(--card-bg);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            padding: 16px 20px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            box-shadow: var(--shadow);

            transition:
                border-color 0.2s,
                transform 0.2s;
        }

        .report-card:hover {
            border-color: #7b9fe8;

            transform: translateY(-1px);
        }

        .report-info-group {
            display: flex;

            align-items: center;

            gap: 16px;
        }

        .report-thumbnail {
            width: 52px;
            height: 52px;

            background-color: #eaf0ff;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #3b62ac;

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

        .report-actions {
            display: flex;

            align-items: center;

            gap: 20px;
        }


        /* =====================================================
           STATUS BADGE
        ===================================================== */

        .status-badge {
            padding: 6px 14px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 600;

            display: inline-flex;

            align-items: center;

            justify-content: center;
        }

        .badge-diproses {
            background-color: #fef3c7;
            color: #b45309;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #64748b;
        }

        .badge-selesai {
            background-color: #dcfce7;
            color: #15803d;
        }

        .badge-ditolak {
            background-color: #fee2e2;
            color: #b91c1c;
        }


        /* =====================================================
           DETAIL BUTTON
        ===================================================== */

        .btn-detail {
            background: #eaf0ff;

            border: none;

            color: #3b62ac;

            font-size: 16px;

            cursor: pointer;

            padding: 8px 12px;

            border-radius: 8px;

            transition: all 0.2s;
        }

        .btn-detail:hover {
            background-color: #3b62ac;

            color: white;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 768px) {

            .sidebar {
                width: 70px;

                padding: 16px 8px;
            }

            .brand-name,
            .nav-item span,
            .logout-btn span {
                display: none !important;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .report-card {
                padding: 14px;
            }

            .report-actions {
                gap: 8px;
            }

            .status-badge {
                padding: 5px 9px;
            }

        }


        @media (max-width: 550px) {

            .topbar {
                padding: 0 16px;
            }

            .user-name {
                display: none;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .welcome-title {
                font-size: 24px;
            }

            .report-thumbnail {
                width: 44px;
                height: 44px;
            }

            .report-title {
                font-size: 13px;
            }

        }

    </style>
</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">

        <div>

            <!-- LOGO -->
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


            <!-- NAVIGASI GURU BK -->
            <ul class="nav-menu">


                <!-- DASHBOARD -->
                <li class="nav-item active">

                    <a href="{{ route('dashboard_bk') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-house"></i>

                            <span>
                                Dashboard
                            </span>

                        </div>

                    </a>

                </li>


                <!-- LAPORAN SISWA -->
                <li class="nav-item">

                    <a href="{{ route('LaporanSiswa_bk') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>
                                Laporan Siswa
                            </span>

                        </div>

                    </a>

                </li>


                <!-- MONITORING -->
                <li class="nav-item">

                    <a href="{{ route('monitoring_bk') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-eye"></i>

                            <span>
                                Monitoring
                            </span>

                        </div>

                    </a>

                </li>

                <!-- NOTIFIKASI -->
                <li class="nav-item">
    <a href="{{ route('notifikasi_bk') }}" class="nav-notification">
        <i class="fa-solid fa-bell"></i>
        <span>Notifikasi</span>
        <span class="notification-dot"></span>
    </a>
</li>

                <!-- PROFIL -->
                <li class="nav-item">

                    <a href="{{ route('profil_bk') }}" title="Profil">

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

            <i class="fa-solid fa-right-from-bracket"></i>

            <span>
                Logout
            </span>

        </a>

    </aside>



    <!-- =====================================================
         MAIN WRAPPER
    ===================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">

                <!-- NOTIFICATION -->
            <a
                href="{{ route('notifikasi_bk') }}"
                class="topbar-icon"
                title="Notifikasi"
                aria-label="Buka notifikasi"
            >

                <i class="fa-regular fa-bell"></i>

            </a>


            <!-- USER -->
            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Guru BK' }}
                </span>

            </div>

        </header>



        <!-- =================================================
             MAIN CONTENT
        ================================================= -->

        <main class="content">


            <!-- WELCOME -->
            <section class="welcome-section">

                <h1 class="welcome-title">
                    Selamat Datang, Guru BK!
                </h1>

                <p class="welcome-text">
                    Pantau laporan yang berkaitan dengan siswa.
                </p>

            </section>



            <!-- =================================================
                 STATISTIK LAPORAN
            ================================================= -->

            <section class="stats-grid">


                <!-- TOTAL -->
                <div class="stat-card total">

                    <div class="stat-title">
                        Total
                    </div>

                    <div class="stat-value">
                        12
                    </div>

                </div>

<div class="stat-card pending">
             <div class="stat-title">
                 Pending
             </div>
             <div class="stat-value">
                 2
             </div>
         </div>

                <!-- DIPROSES -->
                <div class="stat-card diproses">

                    <div class="stat-title">
                        Diproses
                    </div>

                    <div class="stat-value">
                        5
                    </div>

                </div>


                <!-- SELESAI -->
                <div class="stat-card selesai">

                    <div class="stat-title">
                        Selesai
                    </div>

                    <div class="stat-value">
                        6
                    </div>

                </div>


                <!-- DITOLAK -->
                <div class="stat-card ditolak">

                    <div class="stat-title">
                        Ditolak
                    </div>

                    <div class="stat-value">
                        1
                    </div>

                </div>

            </section>



            <!-- =================================================
                 LAPORAN TERBARU
            ================================================= -->

            <section>

                <h2 class="section-header">
                    Laporan Terbaru
                </h2>


                <div class="report-list">


                    <!-- LAPORAN 1 -->
                    <div class="report-card">

                        <div class="report-info-group">

                            <div class="report-thumbnail">

                                <i class="fa-regular fa-image"></i>

                            </div>


                            <div class="report-details">

                                <div class="report-title">
                                    Perundungan Antar Siswa
                                </div>

                                <div class="report-date">
                                    16 Sep 2026
                                </div>

                            </div>

                        </div>


                        <div class="report-actions">

                            <span class="status-badge badge-diproses">
                                Diproses
                            </span>

                            <button
                                class="btn-detail"
                                title="Detail"
                            >

                                <i class="fa-solid fa-chevron-right"></i>

                            </button>

                        </div>

                    </div>



                    <!-- LAPORAN 2 -->
                    <div class="report-card">

                        <div class="report-info-group">

                            <div class="report-thumbnail">

                                <i class="fa-regular fa-image"></i>

                            </div>


                            <div class="report-details">

                                <div class="report-title">
                                    Konflik Antar Siswa
                                </div>

                                <div class="report-date">
                                    12 Sep 2026
                                </div>

                            </div>

                        </div>


                        <div class="report-actions">

                            <span class="status-badge badge-selesai">
                                Selesai
                            </span>

                            <button
                                class="btn-detail"
                                title="Detail"
                            >

                                <i class="fa-solid fa-chevron-right"></i>

                            </button>

                        </div>

                    </div>



                    <!-- LAPORAN 3 -->
                    <div class="report-card">

                        <div class="report-info-group">

                            <div class="report-thumbnail">

                                <i class="fa-regular fa-image"></i>

                            </div>


                            <div class="report-details">

                                <div class="report-title">
                                    Keamanan Sekolah
                                </div>

                                <div class="report-date">
                                    10 Sep 2026
                                </div>

                            </div>

                        </div>


                        <div class="report-actions">

                            <span class="status-badge badge-diproses">
                                Diproses
                            </span>

                            <button
                                class="btn-detail"
                                title="Detail"
                            >

                                <i class="fa-solid fa-chevron-right"></i>

                            </button>

                        </div>

                    </div>


                </div>

            </section>


        </main>

    </div>


</body>
</html>
