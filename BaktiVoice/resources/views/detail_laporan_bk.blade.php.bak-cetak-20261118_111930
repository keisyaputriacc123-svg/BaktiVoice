
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Detail Laporan BK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    :root {
        --primary: #96ace0;
        --primary-hover: #7b94d1;
        --background: #eaf1fb;
        --card-bg: #ffffff;
        --border: rgba(186, 210, 240, 0.6);
        --text-main: #2c4a8e;
        --text-muted: #64748b;
        --text-dark: #1e293b;
        --text: #3b62ac; /* Menambahkan variabel --text yang tadi hilang */

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
       MAIN WRAPPER & TOPBAR (PERBAIKAN UTAMA DI SINI)
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

    /* MAIN CONTENT (DIPERBAIKI: Hapus margin-left ganda dan sesuaikan padding) */
    .main-content {
        padding: 32px;
        flex: 1;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #909bad;
        font-size: 12px;
        margin-bottom: 20px;
    }

    .breadcrumb a {
        color: var(--text);
        text-decoration: none;
    }

    .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 24px;
    }

    .page-heading h1 {
        font-size: 24px;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .page-heading p {
        font-size: 13px;
        color: #8994a7;
        line-height: 1.6;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 15px;
        border: 1px solid #dce3f0;
        border-radius: 9px;
        background: #fff;
        color: var(--text);
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        text-decoration: none;
    }

    .detail-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 4px 16px rgba(43, 62, 102, .03);
    }

    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .report-title {
        font-size: 19px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 20px;
    }

    .information-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
        margin-bottom: 28px;
    }

    .identity-info {
        padding: 14px;
        background: #f5f8ff;
        border: 1px solid #e2eafb;
        border-radius: 12px;
    }

    .identity-info .identity-name {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #2c4a8e;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .identity-info .identity-name i {
        color: #628cdb;
    }

    .identity-info .identity-meta {
        color: #687b9e;
        font-size: 12px;
        font-weight: 500;
        margin-top: 6px;
        margin-bottom: 0;
    }

    .identity-info .identity-meta i {
        width: 16px;
        color: #829ed2;
    }

    .identity-info .identity-private {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #62816e;
        font-size: 13px;
        font-weight: 600;
        margin: 0;
    }
    .info-item label {
        display: block;
        color: #8b96a9;
        font-size: 11px;
        margin-bottom: 8px;
    }

    .info-item p {
        color: var(--text-dark);
        font-size: 13px;
        font-weight: 600;
    }

    .category-badge {
        display: inline-block;
        padding: 6px 11px;
        background: #edf2ff;
        color: var(--text);
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-badge {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        background: #fff3d9;
        color: #a96c00;
        font-size: 11px;
        font-weight: 700;
    }

    .content-section {
        border-top: 1px solid var(--border);
        padding-top: 23px;
        margin-top: 23px;
    }

    .description {
        font-size: 13px;
        line-height: 1.9;
        color: #68758c;
    }

    .evidence-box {
        margin-top: 14px;
        width: min(100%, 340px);
        min-height: 175px;
        background: #f8faff;
        border: 1px dashed #cbd6eb;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #9aa8c1;
    }

    .evidence-box i {
        font-size: 35px;
    }

    .evidence-box p {
        font-size: 12px;
    }

    .form-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    textarea {
        width: 100%;
        min-height: 140px;
        padding: 14px;
        border: 1px solid #dce3f0;
        border-radius: 9px;
        outline: none;
        resize: vertical;
        font-family: inherit;
        font-size: 13px;
        color: var(--text-dark);
        line-height: 1.7;
    }

    textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(150, 172, 224, .15);
    }

    textarea::placeholder {
        color: #a5afc0;
    }

    .form-hint {
        color: #939db0;
        font-size: 11px;
        margin-top: 8px;
        line-height: 1.6;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 24px;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: none;
        border-radius: 9px;
        background: var(--text);
        color: #fff;
        padding: 12px 25px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #385ba9;
    }

    @media (max-width: 900px) {
        .sidebar {
            width: 210px;
        }

        .main-wrapper {
            margin-left: 210px;
        }

        .main-content {
            padding: 20px;
        }
    }

    @media (max-width: 650px) {
        .sidebar {
            position: static;
            width: 100%;
            height: auto;
            padding: 15px;
        }

        .main-wrapper {
            margin-left: 0;
        }

        .logo {
            margin-bottom: 15px;
        }

        .nav-label {
            display: none;
        }

        .nav-menu {
            flex-direction: row;
            flex-wrap: wrap;
        }

        .nav-link {
            padding: 10px;
            font-size: 11px;
        }

        .sidebar-bottom {
            margin-top: 12px;
        }

        .topbar {
            position: static;
            height: 60px;
            padding: 0 15px;
        }

        .main-content {
            padding: 22px 15px;
        }

        .information-grid {
            grid-template-columns: 1fr 1fr;
            gap: 18px 12px;
        }

        .detail-card {
            padding: 20px 16px;
        }

        .page-heading h1 {
            font-size: 20px;
        }

        .page-heading {
            flex-wrap: wrap;
        }

        .user-info {
            display: none;
        }
    }

/* ==========================================
   RESPONSIVE RESTORATION - GURU BK FINAL
   ========================================== */

.topbar-mobile-brand {
    display: none;
    align-items: center;
    gap: 9px;
}

.topbar-logo-img {
    width: 34px;
    height: 34px;
    object-fit: contain;
}

.topbar-brand-name {
    font-size: 16px;
    font-weight: 700;
    color: #2c4a8e;
}

.topbar-right-group {
    display: flex;
    align-items: center;
    gap: 12px;
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
    }

    .topbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        height: 60px !important;
        min-height: 60px;
        padding: 0 14px !important;
        display: flex !important;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        background: #fff;
    }

    .topbar-mobile-brand {
        display: flex !important;
        flex-shrink: 0;
    }

    .topbar-right-group {
        display: flex !important;
        align-items: center;
        gap: 10px;
    }

    .topbar-icon {
        display: flex !important;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .user-profile {
        display: flex !important;
        align-items: center;
        gap: 7px;
        min-width: 0;
    }

    .user-name {
        max-width: 105px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
    }

    .content,
    .main-content {
        width: 100% !important;
        max-width: 100%;
        margin-left: 0 !important;
        box-sizing: border-box;
        padding-bottom: 110px !important;
    }

    .mobile-bottom-nav {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1100;
        display: flex !important;
        justify-content: space-around;
        align-items: center;
        min-height: 66px;
        padding: 7px 3px;
        padding-bottom: max(7px, env(safe-area-inset-bottom));
        background: linear-gradient(110deg, #dbeafe, #bfdbfe, #93c5fd);
        box-shadow: 0 -3px 15px rgba(65, 105, 170, 0.12);
        border-top: 1px solid rgba(255,255,255,0.65);
        box-sizing: border-box;
    }

    .mobile-nav-item {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        color: #46669f;
        text-decoration: none;
        font-family: inherit;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
        background: transparent;
        border: none;
        padding: 5px 1px;
        cursor: pointer;
    }

    .mobile-nav-item i {
        font-size: 17px;
    }

    .mobile-nav-item.active {
        color: #244b91;
    }

    .mobile-nav-item.active i {
        transform: translateY(-2px);
    }

    .mobile-nav-logout,
    .mobile-nav-logout-form {
        color: #a34455;
    }

    .mobile-nav-logout-form {
        display: flex;
        flex: 1;
        min-width: 0;
        margin: 0;
        padding: 0;
    }

    .mobile-nav-logout-form button {
        width: 100%;
    }

    .content img,
    .main-content img {
        max-width: 100%;
    }
}

@media (max-width: 550px) {

    .topbar-brand-name {
        font-size: 14px;
    }

    .topbar-logo-img {
        width: 30px;
        height: 30px;
    }

    .user-name {
        max-width: 75px;
        font-size: 11px;
    }

    .content,
    .main-content {
        padding-left: 12px !important;
        padding-right: 12px !important;
    }
}

@media (max-width: 380px) {

    .mobile-nav-item {
        font-size: 9px;
        gap: 4px;
    }

    .mobile-nav-item i {
        font-size: 15px;
    }

    .topbar {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    .topbar-right-group {
        gap: 7px;
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
.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link { background: transparent !important; background-color: transparent !important; box-shadow: none !important; }:is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link),:is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link):is(:hover,:focus,:active) {color:#ef4444!important;background:transparent!important;border:0!important;box-shadow:none!important;} :is(.logout-btn,.mobile-nav-logout,.mobile-logout,.mobile-logout-link) i {color:#ef4444!important;}

/* BAKTIVOICE - STANDAR BADGE STATUS LAPORAN */
.status-badge,
.report-status,
.status.status-pending,
.status.status-diproses,
.status.status-proses,
.status.status-selesai,
.status.status-ditolak {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-sizing: border-box !important;
    min-height: 30px !important;
    padding: 6px 20px !important;
    border: none !important;
    border-radius: 999px !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 12px !important;
    font-weight: 600 !important;
    line-height: 1.4 !important;
    white-space: nowrap !important;
    text-transform: lowercase;
}

:is(
    .badge-pending,
    .status-pending,
    .status-badge.pending,
    .status-badge.badge-pending
) {
    background: #f1f2f4 !important;
    color: #64748b !important;
}

:is(
    .badge-diproses,
    .badge-proses,
    .status-diproses,
    .status-proses,
    .status-badge.diproses,
    .status-badge.proses
) {
    background: #fff1c7 !important;
    color: #d97706 !important;
}

:is(
    .badge-selesai,
    .status-selesai,
    .status-badge.selesai
) {
    background: #c9f7e8 !important;
    color: #059669 !important;
}

:is(
    .badge-ditolak,
    .status-ditolak,
    .status-badge.ditolak
) {
    background: #ffe0e0 !important;
    color: #e05252 !important;
}

/* AKHIR STANDAR BADGE STATUS LAPORAN */
</style>
</head>

<body>

    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">
        <div>
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard_bk') }}">
                        <div class="nav-content"><i class="fa-solid fa-house"></i><span>Dashboard</span></div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('LaporanSiswa_bk') }}">
                        <div class="nav-content"><i class="fa-regular fa-file-lines"></i><span>Laporan Siswa</span></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('monitoring_bk') }}">
                        <div class="nav-content"><i class="fa-regular fa-eye"></i><span>Monitoring</span></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notifikasi_bk') }}" class="nav-notification">
                        <span class="notification-icon-wrapper">
    <i class="fa-solid fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
                        <span>Notifikasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil_bk') }}" title="Profil">
                        <div class="nav-content"><i class="fa-regular fa-user"></i><span>Profil</span></div>
                    </a>
                </li>
            </ul>
        </div>

        <button type="submit" form="logoutFormBK" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </button>
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
        <a href="{{ route('notifikasi_bk') }}"
           class="topbar-icon"
           title="Notifikasi"
           aria-label="Notifikasi">
            <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
        </a>

        <a href="{{ route('profil_bk') }}" class="user-profile" style="text-decoration: none; color: inherit;">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <span class="user-name">
                {{ Auth::user()->name ?? 'Guru BK' }}
            </span>
        </a>
    </div>
</header>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            <div class="breadcrumb">
                <a href="{{ route('dashboard_bk') }}">Dashboard</a>
                <i class="fa-solid fa-chevron-right"></i>
                <a href="{{ route('LaporanSiswa_bk') }}">Laporan Siswa</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Detail Laporan</span>
            </div>

            <div class="page-heading">
                <div>
                    <h1>Detail Laporan</h1>
                    <p>Lihat informasi laporan siswa dan berikan masukan atau tindak lanjut.</p>
                </div>

                <a href="{{ route('LaporanSiswa_bk') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            <section class="detail-card">
                <h3 class="section-title">Informasi Laporan</h3>

                <h2 class="report-title">{{ $laporan->judul ?? 'Tanpa Judul' }}</h2>

                <div class="report-id">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>{{ 'BV' . str_pad($laporan->id_laporan ?? $laporan->id, 3, '0', STR_PAD_LEFT) }}</span>
                </div>

                <div class="information-grid">
                    <div class="info-item">
                        <label>Tanggal Laporan</label>
                        <p>{{ $laporan->created_at->format('d F Y') }}</p>
                    </div>

                    <div class="info-item">
                        <label>Kategori</label>
                        <span class="category-badge">{{ $laporan->kategori->nama_kategori ?? 'Umum' }}</span>
                    </div>

                    <div class="info-item identity-info">
                        <label>Identitas Pelapor</label>

                        @if ((string) $laporan->anonim === '0' && $laporan->user)
                            <p class="identity-name">
                                <i class="fa-solid fa-user-graduate"></i>
                                {{ $laporan->user->name ?? 'Nama tidak tersedia' }}
                            </p>

                            <p class="identity-meta">
                                <i class="fa-solid fa-school"></i>
                                Kelas: {{ $laporan->user->kelas ?? 'Tidak tersedia' }}
                            </p>

                            <p class="identity-meta">
                                <i class="fa-solid fa-book-open"></i>
                                Jurusan: {{ $laporan->user->jurusan ?? 'Tidak tersedia' }}
                            </p>
                        @else
                            <p class="identity-private">
                                <i class="fa-solid fa-user-shield"></i>
                                Identitas Dirahasiakan
                            </p>
                        @endif
                    </div>

                    <div class="info-item">
                        <label>Status Laporan</label>
                        <span class="status-badge badge-{{ strtolower($laporan->status ?? 'pending') }}">
                            {{ ucfirst($laporan->status ?? 'Pending') }}
                        </span>
                    </div>
                </div>

                <div class="content-section">
                    <h3 class="section-title">Deskripsi Laporan</h3>
                    <p class="description">
                        {{ $laporan->deskripsi ?? 'Tidak ada deskripsi.' }}
                    </p>
                </div>

               <div class="content-section">
    <h3 class="section-title">Bukti Laporan</h3>
    <div class="evidence-box" style="padding: 15px;">
        @if($laporan->buktiLaporan && $laporan->buktiLaporan->count() > 0)
            @foreach($laporan->buktiLaporan as $bukti)
                <div style="margin-bottom: 12px; text-align: center;">
                    <a href="{{ asset($bukti->file_path) }}" target="_blank" style="display: inline-block;">
                        <img src="{{ asset($bukti->file_path) }}" alt="Bukti Laporan" style="max-width: 250px; max-height: 180px; border-radius: 8px; object-fit: cover; display: block; margin-bottom: 8px; border: 1px solid #cbd6eb;">
                    </a>
                    <br>
                    <a href="{{ asset($bukti->file_path) }}" target="_blank" class="evidence-button" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none; padding: 6px 12px; background: #eaf1fb; border-radius: 6px; color: #2c4a8e; font-size: 12px; font-weight: 600;">
                        <i class="fa-solid fa-paperclip"></i> Lihat Bukti Full Size
                    </a>
                </div>
            @endforeach
        @else
            <div style="text-align: center; color: #9aa8c1; padding: 20px;">
                <i class="fa-regular fa-image" style="font-size: 35px; margin-bottom: 8px;"></i>
                <p style="font-size: 12px;">Tidak ada lampiran foto bukti.</p>
            </div>
        @endif
    </div>
</div>

                <!-- FORM SIMPAN TINDAK LANJUT -->
                <div class="content-section">
                    <h3 class="section-title">Masukan / Tindak Lanjut</h3>

                    <form action="{{ route('laporan.tindak_lanjut', $laporan->id_laporan) }}" method="POST">
                        @csrf
                        <label for="followUp" class="form-label">
                            Catatan Guru BK
                        </label>

                        <textarea
                            id="followUp"
                            name="tindak_lanjut"
                            placeholder="Tuliskan masukan, hasil pemeriksaan, atau tindak lanjut terhadap laporan ini..."
                            required
                        >{{ old('tindak_lanjut', $laporan->tindak_lanjut) }}</textarea>

                        <p class="form-hint">
                            Pastikan catatan berisi tindak lanjut yang relevan dan menjaga kerahasiaan siswa. Data akan langsung tersimpan ke database.
                        </p>

                        <div class="form-actions">
                            <button type="submit" class="btn-save">
                                <i class="fa-solid fa-floppy-disk"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

            </section>
        </main>
    </div>

<nav class="mobile-bottom-nav" aria-label="Navigasi utama">    <a href="{{ route('dashboard_bk') }}" class="mobile-nav-item">
        <i class="fa-solid fa-house"></i>
        <span>Beranda</span>
    </a>    <a href="{{ route('LaporanSiswa_bk') }}" class="mobile-nav-item active">
        <i class="fa-regular fa-file-lines"></i>
        <span>Laporan</span>
    </a>    <a href="{{ route('monitoring_bk') }}" class="mobile-nav-item">
        <i class="fa-regular fa-eye"></i>
        <span>Monitoring</span>
    </a>    <a href="{{ route('notifikasi_bk') }}" class="mobile-nav-item">
        <span class="notification-icon-wrapper">
    <i class="fa-solid fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
        <span>Notif</span>
    </a>    <a href="{{ route('profil_bk') }}" class="mobile-nav-item">
        <i class="fa-regular fa-user"></i>
        <span>Profil</span>
    </a>    <button type="submit" form="logoutFormBK" class="mobile-nav-item mobile-nav-logout">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
    </button>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const formTindakLanjut = document.querySelector('.btn-save')?.closest('form');

    if (!formTindakLanjut) return;

    const btnSimpan = formTindakLanjut.querySelector('.btn-save');

    if (!btnSimpan) return;

    formTindakLanjut.addEventListener('submit', function (event) {

        if (btnSimpan.dataset.submitted === 'true') {
            event.preventDefault();
            return;
        }

        btnSimpan.dataset.submitted = 'true';
        btnSimpan.disabled = true;

        btnSimpan.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            Menyimpan...
        `;

    });

});
</script>

<form id="logoutFormBK" method="POST" action="{{ route('logout') }}" style="display:none;">
    @csrf
</form>

<script src="{{ asset('js/logout-handler.js') }}"></script>
<script src="{{ asset('js/anti-double-click.js') }}"></script>
</body>
</html>








