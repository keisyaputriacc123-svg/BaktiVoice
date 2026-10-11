<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Laporan Berhasil Dikirim</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- FontAwesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >


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

            --shadow:
                0 1px 3px 0 rgba(119, 5, 5, 0.05),
                0 1px 2px 0 rgba(0, 0, 0, 0.03);
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


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: var(--sidebar-width);

            background-color: var(--card-bg);

            border-right: 1px solid var(--border);

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

            transition: all 0.2s ease;
        }


        .nav-content {
            display: flex;
            align-items: center;

            gap: 12px;
        }


        .nav-item a:hover {
            background-color: #f1f5f9;

            color: var(--text-main);
        }


        .nav-item.active > a {
            background-color: var(--primary);

            color: #ffffff;

            font-weight: 600;
        }


        .nav-item i {
            font-size: 16px;

            width: 20px;

            text-align: center;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-btn {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 12px 16px;

            color: #ef4444;

            text-decoration: none;

            font-weight: 600;

            font-size: 14px;

            border-radius: 8px;

            transition: background 0.2s;

            margin-top: 16px;
        }


        .logout-btn:hover {
            background-color: #fef2f2;
        }


        /* =====================================================
           MAIN WRAPPER
        ===================================================== */

        .main-wrapper {
            margin-left: var(--sidebar-width);

            flex: 1;

            display: flex;

            flex-direction: column;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            height: var(--topbar-height);

            background-color: var(--card-bg);

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: flex-end;

            padding: 0 36px;

            gap: 20px;

            position: sticky;

            top: 0;

            z-index: 90;
        }


        .topbar-icon {
            color: var(--text-muted);

            font-size: 18px;

            cursor: pointer;

            position: relative;

            padding: 8px;

            border-radius: 50%;

            transition: background 0.2s;
        }


        .topbar-icon:hover {
            background-color: #f1f5f9;

            color: var(--text-main);
        }


        .user-profile {
            display: flex;

            align-items: center;

            gap: 12px;

            cursor: pointer;
        }


        .avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background-color: #e2e8f0;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--text-muted);

            font-size: 16px;
        }


        .user-name {
            font-size: 14px;

            font-weight: 600;

            color: var(--text-main);
        }


        /* =====================================================
           CONTENT KONFIRMASI
        ===================================================== */

        .content {
            padding: 36px;

            flex: 1;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .confirmation-wrapper {
            width: 100%;

            max-width: 760px;
        }


        .confirmation-card {
            background-color: var(--card-bg);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            padding: 55px 50px;

            text-align: center;

            box-shadow: var(--shadow);

            position: relative;

            overflow: hidden;
        }


        /* =====================================================
           DECORATION
        ===================================================== */

        .card-decoration {
            position: absolute;

            width: 150px;
            height: 150px;

            border-radius: 50%;

            background-color: #f0f4ff;

            top: -85px;
            left: -65px;
        }


        .card-decoration-right {
            position: absolute;

            width: 130px;
            height: 130px;

            border-radius: 50%;

            background-color: #f3f6fd;

            right: -60px;
            bottom: -70px;
        }


        /* =====================================================
           SUCCESS ICON
        ===================================================== */

        .success-icon {
            width: 92px;
            height: 92px;

            margin: 0 auto 24px;

            border-radius: 50%;

            background-color: #e8f7f1;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #2eaa82;

            font-size: 43px;

            position: relative;
        }


        .success-icon i {
            font-size: 43px;
        }


        /* =====================================================
           TEXT
        ===================================================== */

        .confirmation-title {
            font-size: 30px;

            font-weight: 800;

            color: #1e293b;

            margin-bottom: 8px;
        }


        .confirmation-text {
            font-size: 15px;

            color: var(--text-muted);

            margin-bottom: 36px;
        }


        /* =====================================================
           NOMOR LAPORAN
        ===================================================== */

        .report-label {
            font-size: 14px;

            font-weight: 600;

            color: #475569;

            margin-bottom: 10px;
        }


        .report-number {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 190px;

            height: 56px;

            margin: 0 auto 40px;

            background-color: #f1f5ff;

            border: 1px solid #dbe5fb;

            border-radius: 10px;

            color: var(--text-main);

            font-size: 20px;

            font-weight: 800;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .button-group {
            display: flex;

            flex-direction: column;

            align-items: center;

            gap: 12px;
        }


        .btn {
            width: 100%;

            max-width: 350px;

            min-height: 56px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            border-radius: 8px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition: all 0.2s ease;
        }


        /* LIHAT LAPORAN */

        .btn-primary {
            background-color: var(--primary);

            color: #ffffff;
        }


        .btn-primary:hover {
            background-color: #7f99d4;

            transform: translateY(-1px);
        }


        /* KEMBALI */

        .btn-secondary {
            background-color: #ffffff;

            color: var(--text-main);

            border: 1px solid #cbd5e1;
        }


        .btn-secondary:hover {
            background-color: #f8fafc;

            border-color: var(--primary);

            transform: translateY(-1px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

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


            .confirmation-card {
                padding: 45px 25px;
            }

        }


        @media (max-width: 550px) {

            .topbar {
                padding: 0 16px;
            }


            .user-name {
                display: none;
            }


            .confirmation-title {
                font-size: 24px;
            }


            .confirmation-text {
                font-size: 13px;
            }


            .success-icon {
                width: 80px;
                height: 80px;
            }


            .success-icon i {
                font-size: 36px;
            }


            .btn {
                max-width: 100%;
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


            <!-- NAVIGASI -->

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

                <li class="nav-item">

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



    <!-- =====================================================
         MAIN WRAPPER
    ===================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">


            <!-- NOTIFICATION -->

            <div
                class="topbar-icon"
                title="Notifikasi"
            >

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



        <!-- =================================================
             MAIN CONTENT
        ================================================= -->

        <main class="content">


            <div class="confirmation-wrapper">


                <section class="confirmation-card">


                    <!-- DECORATION -->

                    <div class="card-decoration"></div>

                    <div class="card-decoration-right"></div>


                    <!-- SUCCESS ICON -->

                    <div class="success-icon">

                        <i class="fa-solid fa-check"></i>

                    </div>


                    <!-- TITLE -->

                    <h1 class="confirmation-title">

                        Laporan Berhasil Dikirim!

                    </h1>


                    <p class="confirmation-text">

                        Terimakasih Telah Menyampaikan Laporan.

                    </p>


                    <!-- NOMOR LAPORAN -->

                    <div class="report-label">

                        Nomor Laporan

                    </div>


                    <div class="report-number">

                        #BV001

                    </div>


                    <!-- BUTTON -->

                    <div class="button-group">


                        <!-- LIHAT LAPORAN -->

                        <a
                            href="{{ route('riwayat_laporan') }}"
                            class="btn btn-primary"
                        >

                            <i class="fa-regular fa-file-lines"></i>

                            Lihat Laporan

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>


                        <!-- KEMBALI KE BERANDA -->

                        <a
                            href="{{ route('dashboard_siswa') }}"
                            class="btn btn-secondary"
                        >

                            <i class="fa-solid fa-house"></i>

                            Kembali ke Beranda

                        </a>


                    </div>


                </section>


            </div>


        </main>


    </div>


</body>

</html>
