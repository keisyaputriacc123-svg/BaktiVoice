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
            --primary-hover: #7b94d1;
            --background: #eaf1fb; /* Background main content abu-biru soft pastel */
            --card-bg: #ffffff;
            --border: rgba(186, 210, 240, 0.5);
            --text-main: #2c4a8e;
            --text-muted: #64748b;

            --font-family: 'Inter', sans-serif;

            --sidebar-width: 250px;
            --topbar-height: 70px;

            --radius: 12px;

            --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);

            /* Gradasi Biru Pastel Favorit Kamu */
            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
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
           SIDEBAR (PASTEL BLUE KESUKAAN KAMU)
        ===================================================== */

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



        /* =====================================================
           LOGOUT
        ===================================================== */

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


        /* =====================================================
           MAIN WRAPPER
        ===================================================== */

        .main-wrapper {
            margin-left: var(--sidebar-width);

            flex: 1;

            display: flex;
            flex-direction: column;

            min-height: 100vh;
            background-color: var(--background) !important;
        }


        /* =====================================================
           TOPBAR (PASTEL BLUE KESUKAAN KAMU)
        ===================================================== */

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


    /* RESPONSIVE RESTORE FROM STASH - SELECTIVE */
    .topbar-mobile-brand,
    .mobile-bottom-nav {
        display: none;
    }
@media (max-width: 768px) {

    .sidebar {
        display: none !important;
    }

    .main-wrapper {
        margin-left: 0;
        width: 100%;
        min-height: 100vh;
        min-width: 0;
    }

    /* Topbar Mobile */
    .topbar {
        height: 60px;
        min-height: 60px;
        padding: 0 16px;
        justify-content: space-between;
        gap: 12px;
        background: linear-gradient(
            135deg,
            #dbeafe 0%,
            #bfdbfe 50%,
            #93c5fd 100%
        );
    }

    .topbar-mobile-brand {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .topbar-mobile-brand img {
        width: 30px;
        height: 30px;
        object-fit: contain;
        border-radius: 8px;
    }

    .topbar-mobile-brand span {
        font-size: 15px;
        font-weight: 800;
        color: #1e3a70;
    }

    .topbar-right-group {
        gap: 8px;
    }

    .topbar-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .user-name {
        display: none;
    }

    /* Konten Konfirmasi */
    .content {
        padding: 24px 18px 90px;
        min-height: calc(100vh - 60px);
    }

    .confirmation-card {
        padding: 45px 25px;
    }

    .confirmation-title {
        font-size: 24px;
    }

    .confirmation-text {
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 28px;
    }

    .success-icon {
        width: 80px;
        height: 80px;
    }

    .success-icon i {
        font-size: 36px;
    }

    .report-number {
        max-width: 100%;
        margin-bottom: 32px;
    }

    .btn {
        max-width: 100%;
        min-height: 52px;
    }

    /* Navigasi Bawah Mobile */
    .mobile-bottom-nav {
        display: flex;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        min-height: 66px;
        background: linear-gradient(
            135deg,
            #dbeafe 0%,
            #bfdbfe 50%,
            #93c5fd 100%
        );
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 -4px 15px rgba(123, 159, 232, 0.12);
        justify-content: space-around;
        align-items: center;
        padding: 6px 4px;
        z-index: 1000;
    }

    .mobile-bottom-nav a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        flex: 1;
        color: #274472;
        text-decoration: none;
        font-size: 10px;
        font-weight: 600;
    }

    .mobile-bottom-nav a i {
        font-size: 18px;
    }

    .mobile-bottom-nav a.active {
        color: #3b62ac;
        font-weight: 800;
    }

    .mobile-bottom-nav a.active i {
        transform: translateY(-2px);
    }
}

/* FIX TOPBAR KONFIRMASI LAPORAN - DESKTOP & MOBILE */

/* Pengaturan umum */
.topbar-right-group {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: flex-end !important;
    gap: 20px !important;
    margin-left: auto !important;
}

.topbar-right-group .topbar-icon,
.topbar-right-group .user-profile {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 !important;
}

/* DESKTOP */
@media (min-width: 769px) {
    .topbar {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: flex-end !important;
    }

    .topbar-right-group {
        height: 100%;
        gap: 20px !important;
    }
}

/* MOBILE */
@media (max-width: 768px) {
    .topbar {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: space-between !important;
    }

    .topbar-mobile-brand {
        flex-shrink: 0;
        margin-right: auto !important;
    }

    .topbar-right-group {
        flex-shrink: 0;
        height: 100%;
        gap: 12px !important;
        margin-left: auto !important;
    }

    .topbar-right-group .user-name {
        display: none !important;
    }
}
/* INDIKATOR NOTIFIKASI BELUM DIBACA */
.notification-icon-wrapper {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

.unread-notification-dot {
    position: absolute;
    top: -3px;
    right: -4px;
    width: 9px;
    height: 9px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    background: #22c55e;
    box-sizing: content-box;
    z-index: 5;
    pointer-events: none;
}

.logout-btn:hover, .logout-btn:focus, .mobile-nav-logout:hover, .mobile-logout:hover, .mobile-logout-link:hover { background: transparent !important; background-color: transparent !important; box-shadow: none !important; }

.logout-btn,
.logout-btn:hover,
.logout-btn:focus,
.logout-btn:active,
.mobile-nav-logout,
.mobile-nav-logout:hover,
.mobile-nav-logout:focus,
.mobile-nav-logout:active,
.mobile-logout,
.mobile-logout:hover,
.mobile-logout:focus,
.mobile-logout:active,
.mobile-logout-link,
.mobile-logout-link:hover,
.mobile-logout-link:focus,
.mobile-logout-link:active {
    background: transparent !important;
    background-color: transparent !important;
    box-shadow: none !important;
    -webkit-appearance: none !important;
    appearance: none !important;
}
.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link { background: transparent !important; background-color: transparent !important; box-shadow: none !important; }:is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link),:is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link):is(:hover,:focus,:active) {color:#ef4444!important;background:transparent!important;border:0!important;box-shadow:none!important;} :is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link) i {color:#ef4444!important;}        .breadcrumb {
            display: flex;
            gap: 9px;
            align-items: center;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 18px;
        }

        .breadcrumb a {
            color: #3b62ac;
            text-decoration: none;
            font-weight: 600;
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

                    <a href="{{ route('notifikasi_siswa') }}">


                        <div class="nav-content">

                            <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>

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

<button type="submit" form="mobile-bottom-logout-form" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
</button>

    </aside>



    <!-- =====================================================
         MAIN WRAPPER
    ===================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar"><div class="topbar-mobile-brand">
    <img src="{{ asset('images/logo BaktiVoice.png') }}"
         alt="Logo" class="topbar-logo-img">
    <span class="topbar-brand-name">BaktiVoice</span>
</div>
<div class="topbar-right-group">



            <!-- NOTIFICATION -->

            <div
                class="topbar-icon"
                title="Notifikasi"
            >

                <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>

            </div>


            <!-- USER -->

            <a href="{{ route('profil_siswa') }}" class="user-profile" style="text-decoration: none; color: inherit;">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>


                <span class="user-name">

                    {{ Auth::user()->name ?? 'Nama Siswa' }}

                </span>

            </a>


        </div></header>



        <!-- =================================================
             MAIN CONTENT
        ================================================= -->

        <main class="content">

    <div class="breadcrumb">
        <a href="{{ route('dashboard_siswa') }}">Dashboard</a>
        <i class="fa-solid fa-chevron-right" style="font-size:10px"></i>
        <a href="{{ route('buat_laporan') }}">Buat Laporan</a>
        <i class="fa-solid fa-chevron-right" style="font-size:10px"></i>
        <span>Konfirmasi Laporan</span>
    </div>



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


                    <!-- NOMOR LAPORAN (DINAMIS) -->

                    <div class="report-label">

                        Nomor Laporan

                    </div>


                    <div class="report-number">

                        #BV{{ str_pad($laporan->id ?? $laporan->id_laporan ?? 1, 3, '0', STR_PAD_LEFT) }}

                    </div>


                    <!-- BUTTON -->

                    <div class="button-group">


                        <!-- LIHAT LAPORAN -->

@if(isset($laporan))
    <a
        href="{{ route('detail_laporan_siswa', $laporan->id_laporan ?? $laporan->id) }}"
        class="btn btn-primary"
        id="btnLihatLaporan"
    >
        <span id="lihatLaporanText">
            <i class="fa-regular fa-file-lines"></i>
            Lihat Laporan
            <i class="fa-solid fa-arrow-right"></i>
        </span>

        <span id="lihatLaporanSpinner" style="display: none;">
            <i class="fa-solid fa-spinner fa-spin"></i>
            Membuka Laporan...
        </span>
    </a>
@else
    <a href="{{ route('dashboard_siswa') }}" class="btn btn-primary">
        <i class="fa-solid fa-house"></i>
        Kembali ke Dashboard
    </a>
@endif
                        <!-- KEMBALI KE BERANDA -->

                        <a
    href="{{ route('dashboard_siswa') }}"
    class="btn btn-secondary"
    id="btnKembaliDashboard"
>
    <span id="kembaliDashboardText">
        <i class="fa-solid fa-house"></i>
        Kembali ke Beranda
    </span>

    <span id="kembaliDashboardSpinner" style="display: none;">
        <i class="fa-solid fa-spinner fa-spin"></i>
        Membuka Dashboard...
    </span>
</a>


                    </div>


                </section>


            </div>


        </main>


    </div>


<div class="mobile-bottom-nav">

    <a href="{{ route('dashboard_siswa') }}"
       class="{{ request()->routeIs('dashboard_siswa') ? 'active' : '' }}">
        <i class="fa-solid fa-house"></i>
        <span>Beranda</span>
    </a>

    <a href="{{ route('buat_laporan') }}"
       class="{{ request()->routeIs('buat_laporan', 'konfirmasi_laporan') ? 'active' : '' }}">
        <i class="fa-regular fa-file-lines"></i>
        <span>Laporan</span>
    </a>

    <a href="{{ route('riwayat_laporan') }}"
       class="{{ request()->routeIs('riwayat_laporan') ? 'active' : '' }}">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>Riwayat</span>
    </a>

    <a href="{{ route('notifikasi_siswa') }}"
       class="{{ request()->routeIs('notifikasi_siswa') ? 'active' : '' }}">
        <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
        <span>Notif</span>
    </a>

    <a href="{{ route('profil_siswa') }}"
       class="{{ request()->routeIs('profil_siswa') ? 'active' : '' }}">
        <i class="fa-regular fa-user"></i>
        <span>Profil</span>
    </a>

    <!-- Form & Tombol Logout Mobile -->
    <form method="POST" action="{{ route('logout') }}"
          id="mobile-bottom-logout-form" style="display: none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('mobile-bottom-logout-form').submit();"
       class="mobile-logout-link" title="Logout">
        <i class="fa-solid fa-right-from-bracket" style="color: #e11d48;"></i>
        <span style="color: #e11d48;">Logout</span>
    </a>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Anti-Double Click pada Tombol Lihat Laporan
        const btnLihat = document.getElementById('btnLihatLaporan');
        const textLihat = document.getElementById('lihatLaporanText');
        const spinnerLihat = document.getElementById('lihatLaporanSpinner');

        if (btnLihat && textLihat && spinnerLihat) {
            btnLihat.addEventListener('click', function (event) {

                if (btnLihat.dataset.loading === 'true') {
                    event.preventDefault();
                    return;
                }

                btnLihat.dataset.loading = 'true';
                btnLihat.style.pointerEvents = 'none';
                btnLihat.style.opacity = '0.7';
                btnLihat.style.cursor = 'not-allowed';

                textLihat.style.display = 'none';
                spinnerLihat.style.display = 'inline-block';
            });
        }

        // Anti-Double Click pada Tombol Kembali ke Dashboard
        const btnKembali = document.getElementById('btnKembaliDashboard');
        const textKembali = document.getElementById('kembaliDashboardText');
        const spinnerKembali = document.getElementById('kembaliDashboardSpinner');

        if (btnKembali && textKembali && spinnerKembali) {
            btnKembali.addEventListener('click', function (event) {

                if (btnKembali.dataset.loading === 'true') {
                    event.preventDefault();
                    return;
                }

                btnKembali.dataset.loading = 'true';
                btnKembali.style.pointerEvents = 'none';
                btnKembali.style.opacity = '0.7';
                btnKembali.style.cursor = 'not-allowed';

                textKembali.style.display = 'none';
                spinnerKembali.style.display = 'inline-block';
            });
        }

    });
</script>

    <script src="{{ asset('js/logout-handler.js') }}"></script>
<script src="{{ asset('js/anti-double-click.js') }}"></script>
</body>

</html>









