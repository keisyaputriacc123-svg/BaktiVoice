<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Dashboard Admin</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

    :root { --primary: #96ace0;
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

        /* --- SIDEBAR  --- */
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

        .nav-item a, .dropdown-btn {
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

        .nav-item a:hover, .dropdown-btn:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active > a, .nav-item.active > .dropdown-btn {
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

        /* --- SUB-MENU DATA MASTER --- */
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

        /* --- MAIN WRAPPER --- */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--background) !important;
        }

        /* --- TOPBAR (PASTEL BLUE) --- */
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

        /* Elemen khusus tampilan mobile */
.topbar-right-group {
    display: flex;
    align-items: center;
    gap: 20px;
}
.topbar-mobile-brand {
    display: none;
}
.mobile-bottom-nav {
    display: none;
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

        /* --- MAIN CONTENT --- */
        .content {
            padding: 36px;
            flex: 1;
            background-color: var(--background) !important;
        }


        .welcome-banner {
            background: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
            border-radius: var(--radius);
            padding: 28px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
            margin-bottom: 28px;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .welcome-text h1 {
            color: #1e3a70;
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .welcome-text p {
            color: #2c4a8e;
            font-size: 15px;
            font-weight: 500;
        }

        .btn-banner {
            background: var(--gradient-button);
            color: #ffffff;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(71, 114, 199, 0.3);
            transition: transform 0.2s ease;
        }

        .btn-banner:hover {
            transform: translateY(-2px);
        }
        /* --- INFORMASI KATEGORI LAPORAN --- */
        .category-info-section {
            margin: 28px 0 30px;
        }

        .category-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .category-info-card {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 18px;
            background: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
            cursor: pointer;
        }

        .category-info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(71, 114, 199, 0.16);
            border-color: #93b4eb;
        }

        .category-info-card:active {
            transform: translateY(-1px) scale(0.99);
        }

        .category-info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #eff6ff;
            color: #1e40af;
            font-size: 18px;
        }

        .category-info-card h3 {
            margin: 0 0 6px;
            color: #1e3a70;
            font-size: 15px;
            font-weight: 700;
        }

        .category-info-card p {
            margin: 0;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.6;
        }
        /* --- STATS GRID --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
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

        .stat-card.total .stat-value { color: #1e3a70; }
        .stat-card.pending .stat-value { color: #64748b; }
        .stat-card.diproses .stat-value { color: #d97706; }
        .stat-card.selesai .stat-value { color: #16a34a; }
        .stat-card.ditolak .stat-value { color: #dc2626; }

        /* --- RECENT REPORTS SECTION --- */
        .section-header {
            font-size: 18px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 16px;
        }

        .report-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .report-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .report-card:hover {
            border-color: #7b9fe8;
            box-shadow: 0 6px 16px rgba(123, 159, 232, 0.1);
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
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b62ac;
            font-size: 20px;
            border: 1px solid rgba(186, 210, 240, 0.6);
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

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .badge-diproses { background-color: #fef3c7; color: #b45309; }
        .badge-selesai { background-color: #dcfce7; color: #15803d; }
        .badge-ditolak { background-color: #fee2e2; color: #b91c1c; }

        .btn-dropdown {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 16px;
            cursor: pointer;
            padding: 8px;
    }

/* =========================================
   RESPONSIVE DASHBOARD ADMIN
========================================= */

@media (max-width: 768px) {

    /* SIDEBAR */
    .sidebar {
        display: none !important;
    }

    /* MAIN WRAPPER */
    .main-wrapper {
        margin-left: 0;
        width: 100%;
        min-height: 100vh;
        min-width: 0;
    }

    /* TOPBAR */
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

    .topbar-logo-img {
        width: 30px;
        height: 30px;
        object-fit: contain;
        border-radius: 8px;
    }

    .topbar-brand-name {
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

    /* MAIN CONTENT */
    .content {
        padding: 24px 18px 90px;
    }

    .page-title {
        font-size: 23px;
        margin-bottom: 22px;
    }

    /* STATISTICS */
    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 28px;
    }

    .stat-card {
        padding: 20px 12px;
    }

    .stat-title {
        font-size: 11px;
    }

    .stat-value {
        font-size: 27px;
    }

    /* RECENT REPORTS */
    .section-header {
        font-size: 17px;
    }

    .report-list {
        gap: 12px;
    }

    .report-card {
        padding: 15px;
        gap: 12px;
    }

    .report-info-group {
        gap: 10px;
        min-width: 0;
    }

    .report-thumbnail {
        width: 42px;
        height: 42px;
        min-width: 42px;
        font-size: 17px;
    }

    .report-details {
        min-width: 0;
    }

    .report-title {
        font-size: 13px;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .report-date {
        font-size: 11px;
    }

    .report-actions {
        gap: 5px;
        flex-shrink: 0;
    }

    .status-badge {
        padding: 5px 9px;
        font-size: 10px;
    }

    .btn-dropdown {
        padding: 6px;
        font-size: 13px;
    }

    /* MOBILE BOTTOM NAVIGATION */
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

    /* MOBILE DATA MASTER DROPDOWN */
.mobile-nav-dropdown {
    position: relative;
    display: flex;
    flex: 1;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.mobile-nav-dropdown-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    width: 100%;
    height: 100%;
    background: none;
    border: none;
    color: #274472;
    font-size: 10px;
    font-weight: 600;
    cursor: pointer;
}

.mobile-nav-dropdown-btn i {
    font-size: 18px;
}

.mobile-nav-dropdown-btn.active {
    color: #3b62ac;
    font-weight: 800;
}

.mobile-nav-dropdown-btn.active i {
    transform: translateY(-2px);
}

/* PANEL SUBMENU */
.mobile-data-master-menu {
    display: none;
    position: absolute;
    bottom: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%);
    width: 190px;
    padding: 8px;
    background: #ffffff;
    border: 1px solid rgba(186, 210, 240, 0.7);
    border-radius: 14px;
    box-shadow: 0 5px 20px rgba(44, 74, 142, 0.18);
    z-index: 1100;
}

.mobile-data-master-menu.show {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.mobile-data-master-menu a {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    padding: 11px 12px;
    border-radius: 9px;
    color: #274472;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
}

.mobile-data-master-menu a:hover {
    background: #eaf1fb;
    color: #3b62ac;
}

.mobile-data-master-menu a i {
    width: 17px;
    font-size: 14px;
    text-align: center;
}
}

/* RESPONSIVE HP KECIL */
@media (max-width: 550px) {

    .content {
        padding: 20px 14px 90px;
    }

    .page-title {
        font-size: 21px;
        margin-bottom: 20px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .stat-card {
        padding: 17px 10px;
    }

    .stat-title {
        font-size: 10px;
        letter-spacing: 0.2px;
    }

    .stat-value {
        font-size: 25px;
    }

    .section-header {
        font-size: 16px;
    }

    .report-card {
        align-items: flex-start;
        padding: 13px 11px;
        gap: 8px;
    }

    .report-info-group {
        gap: 8px;
    }

    .report-thumbnail {
        width: 36px;
        height: 36px;
        min-width: 36px;
        font-size: 15px;
    }

    .report-title {
        font-size: 12px;
    }

    .report-date {
        font-size: 10px;
    }

    .report-actions {
        gap: 2px;
    }

    .status-badge {
        padding: 5px 7px;
        font-size: 9px;
    }

    .btn-dropdown {
        padding: 5px;
        font-size: 12px;
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

/* FILTER KATEGORI CHIP */
.category-filter {
    margin: 20px 0;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}

.category-filter-label {
    font-weight: 700;
    color: #2c4a8e;
    font-size: 14px;
}

.category-filter-options {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.category-filter-chip {
    border: 1px solid #dce7f7;
    background: #eef4fc;
    color: #45618e;
    padding: 9px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.category-filter-chip:hover {
    background: #dce9fb;
    border-color: #96ace0;
    color: #2c4a8e;
}

.category-filter-chip.active {
    background: linear-gradient(135deg, #7b9fe8, #4772c7);
    border-color: #628cdb;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(98, 140, 219, 0.2);
}

@media (max-width: 600px) {
    .category-filter {
        align-items: flex-start;
        flex-direction: column;
    }

    .category-filter-options {
        width: 100%;
    }

    .category-filter-chip {
        padding: 8px 13px;
    }
}

/* ANTI-DOUBLE CLICK FILTER KATEGORI */
.category-filter-chip:disabled {
    opacity: 0.65;
    cursor: wait;
    pointer-events: none;
}

.category-filter-spinner {
    margin-left: 8px;
    font-size: 12px;
}
</style>
    </head>
<body>

    <!-- SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div>
            <!-- Logo Brand -->
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <!-- Navigasi Utama -->
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="{{ route('dashboard_admin') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <!-- MENU DATA MASTER (DROPDOWN) -->
                <li class="nav-item">
                    <button class="dropdown-btn" onclick="toggleDropdown('masterMenu', 'masterArrow')">
                        <div class="nav-content">
                            <i class="fa-solid fa-database"></i>
                            <span>Data Master</span>
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="masterArrow"></i>
                    </button>
                    <ul class="sub-menu" id="masterMenu">
                        <li><a href="{{ route('data_master') }}">Kategori Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">Status Laporan</a></li>
                        <li><a href="{{ route('data_master') }}">User & Role</a></li>
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
                            <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
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

        <!-- TOPBAR / HEADER -->
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
           title="Notifikasi">
            <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
        </a>

        <a href="{{ route('profil_admin') }}" class="user-profile" style="text-decoration: none; color: inherit;">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>

            <span class="user-name">{{ Auth::user()->name ?? 'Admin Sekolah' }}</span>
        </a>

    </div>

</header>

        <!-- MAIN CONTENT AREA -->
        <main class="content">
            <!-- =========================================
                 KOTAK SAMBUTAN (BANNER BIRU)
            ========================================= -->
            <div class="welcome-banner">
                <div class="welcome-text">
                    <h1>Hello, {{ Auth::user()->name ?? 'Admin Sekolah' }}!</h1>
                    <p>Pantau dan kelola semua laporan masuk dari siswa di sini</p>
                </div>
                <div class="welcome-action">
<a href="{{ route('rekap_laporan') }}"
   class="btn-banner"
   id="btnKelolaLaporan">

    <i class="fa-solid fa-chart-line"></i>
    <span id="kelolaLaporanText">Kelola Laporan</span>

</a>
                </div>
            </div>

            <!-- FILTER KATEGORI DASHBOARD -->
<form method="GET" action="{{ route('dashboard_admin') }}" class="category-filter">

    <span class="category-filter-label">FILTER KATEGORI:</span>

    <div class="category-filter-options">

        <button type="submit"
                name="kategori"
                value=""
                class="category-filter-chip {{ request('kategori') ? '' : 'active' }}">
            Semua
        </button>

        @foreach($kategoriList as $kategori)
            <button type="submit"
                    name="kategori"
                    value="{{ $kategori->id_kategori }}"
                    class="category-filter-chip {{ request('kategori') == $kategori->id_kategori ? 'active' : '' }}">
                {{ $kategori->nama_kategori }}
            </button>
        @endforeach

    </div>
</form>

            <!-- INFORMASI KATEGORI LAPORAN -->
            <section class="category-info-section">
                <h2 class="section-header">Informasi Kategori Laporan</h2>

                <div class="category-info-grid">

                    <div class="category-info-card">
                        <div class="category-info-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <h3>Kesiswaan</h3>
                            <p>Pengaduan seputar perilaku, kedisiplinan, dan kegiatan siswa.</p>
                        </div>
                    </div>

                    <div class="category-info-card">
                        <div class="category-info-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <div>
                            <h3>Kurikulum</h3>
                            <p>Pengaduan seputar pembelajaran, jadwal, dan kegiatan akademik.</p>
                        </div>
                    </div>

                    <div class="category-info-card">
                        <div class="category-info-icon">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <div>
                            <h3>Sarana dan Prasarana</h3>
                            <p>Pengaduan mengenai fasilitas sekolah yang rusak atau bermasalah.</p>
                        </div>
                    </div>

                    <div class="category-info-card">
                        <div class="category-info-icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <div>
                            <h3>DUDI</h3>
                            <p>Pengaduan seputar PKL dan kegiatan kerja sama industri.</p>
                        </div>
                    </div>

                </div>
            </section>
            <!-- 5 SUMMARY STATS CARDS (DINAMIS) -->
            <section class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-title">Total</div>
                    <div class="stat-value">{{ $totalLaporan ?? 0 }}</div>
                </div>
                <div class="stat-card pending">
                    <div class="stat-title">Pending</div>
                    <div class="stat-value">{{ $pendingCount ?? 0 }}</div>
                </div>
                <div class="stat-card diproses">
                    <div class="stat-title">Diproses</div>
                    <div class="stat-value">{{ $diprosesCount ?? 0 }}</div>
                </div>
                <div class="stat-card selesai">
                    <div class="stat-title">Selesai</div>
                    <div class="stat-value">{{ $selesaiCount ?? 0 }}</div>
                </div>
                <div class="stat-card ditolak">
                    <div class="stat-title">Ditolak</div>
                    <div class="stat-value">{{ $ditolakCount ?? 0 }}</div>
                </div>
            </section>

            <!-- LAPORAN TERBARU SECTION (DINAMIS) -->
           <section>
    <h2 class="section-header">Laporan Terbaru</h2>

    <div class="report-list">

        @forelse($laporanTerbaru as $item)

            <div class="report-card">

                <div class="report-info-group">

                    <div class="report-thumbnail">
                        @if($item->buktiLaporan && $item->buktiLaporan->count() > 0)
                            <img
                                src="{{ asset($item->buktiLaporan->first()->file_path) }}"
                                alt="Bukti Laporan"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"
                            >
                        @else
                            <i class="fa-regular fa-image"></i>
                        @endif
                    </div>

                    <div class="report-details">
                        <div class="report-title">
                            {{ $item->judul }}
                        </div>

                        <div class="report-date">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>

                </div>

                <div class="report-actions">

                    @php
                        $namaStatus = strtolower($item->status ?? 'pending');
                    @endphp

                    <span class="status-badge badge-{{ $namaStatus }}">
                        {{ ucfirst($namaStatus) }}
                    </span>

                    <a
                        href="{{ route('laporan.show', $item->id_laporan) }}"
                        class="btn-dropdown"
                        title="Detail"
                    >
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>

                </div>

            </div>

        @empty

            <div class="empty-state">
                <i class="fa-regular fa-folder-open"
                   style="font-size: 32px; margin-bottom: 8px;"></i>
                <p>Belum ada laporan terbaru.</p>
            </div>

        @endforelse

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

<!-- DATA MASTER DROPDOWN MOBILE -->
<div class="mobile-nav-dropdown">

    <button
        type="button"
        class="mobile-nav-dropdown-btn {{ request()->routeIs('data_master') ? 'active' : '' }}"
        onclick="toggleMobileDataMasterMenu()"
        aria-expanded="false"
        id="mobileDataMasterButton"
    >
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
        <span class="notification-icon-wrapper">
    <i class="fa-regular fa-bell"></i>
    @if (($adaNotifikasiBelumDibaca ?? false))
        <span class="unread-notification-dot" aria-label="Ada notifikasi belum dibaca"></span>
    @endif
</span>
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
       onclick="event.preventDefault(); document.getElementById('mobile-bottom-logout-form').submit();"
       class="mobile-logout-link">
        <i class="fa-solid fa-right-from-bracket" style="color:#e11d48;"></i>
        <span style="color:#e11d48;">Logout</span>
    </a>

</div>

<!-- SCRIPT DROPDOWN TOGGLE -->
    <script>
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

// Toggle submenu Data Master pada mobile bottom navbar
function toggleMobileDataMasterMenu() {
    const menu = document.getElementById('mobileDataMasterMenu');
    const button = document.getElementById('mobileDataMasterButton');

    if (!menu || !button) return;

    menu.classList.toggle('show');

    const isOpen = menu.classList.contains('show');

    button.setAttribute('aria-expanded', isOpen);
}

// Tutup submenu ketika pengguna menekan area di luar menu
document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobileDataMasterMenu');
    const button = document.getElementById('mobileDataMasterButton');

    if (!menu || !button) return;

    if (!menu.contains(event.target) && !button.contains(event.target)) {
        menu.classList.remove('show');
        button.setAttribute('aria-expanded', 'false');
    }
});

</script>
<script>
// ==========================================
// ANTI-DOUBLE CLICK TOMBOL KELOLA LAPORAN
// DASHBOARD ADMIN
// ==========================================

document.addEventListener('DOMContentLoaded', function () {

    const btnKelolaLaporan = document.getElementById('btnKelolaLaporan');
    const kelolaLaporanText = document.getElementById('kelolaLaporanText');

    let kelolaLaporanLoading = false;

    if (btnKelolaLaporan && kelolaLaporanText) {

        btnKelolaLaporan.addEventListener('click', function (event) {

            // Mencegah klik berulang
            if (kelolaLaporanLoading) {
                event.preventDefault();
                return;
            }

            // Kunci tombol
            kelolaLaporanLoading = true;

            // Tampilkan loading
            btnKelolaLaporan.style.pointerEvents = 'none';
            btnKelolaLaporan.style.opacity = '0.8';

            kelolaLaporanText.innerHTML = 'Membuka...';

            btnKelolaLaporan.querySelector('i').className =
                'fa-solid fa-spinner fa-spin';

        });

    }

});
</script>
    <script>
// ==========================================
// ANTI-DOUBLE CLICK FILTER KATEGORI
// DASHBOARD ADMIN
// ==========================================

document.addEventListener('DOMContentLoaded', function () {
    const formFilter = document.querySelector('.category-filter');

    if (!formFilter) return;

    let isSubmitting = false;

    formFilter.addEventListener('submit', function (event) {
        if (isSubmitting) {
            event.preventDefault();
            return;
        }

        const tombolDipilih = event.submitter;

        // Pertahankan nilai kategori sebelum tombol dinonaktifkan
        if (tombolDipilih && tombolDipilih.name === 'kategori') {
            let inputKategori = formFilter.querySelector(
                'input[data-category-filter-value]'
            );

            if (!inputKategori) {
                inputKategori = document.createElement('input');
                inputKategori.type = 'hidden';
                inputKategori.name = 'kategori';
                inputKategori.setAttribute(
                    'data-category-filter-value',
                    'true'
                );
                formFilter.appendChild(inputKategori);
            }

            inputKategori.value = tombolDipilih.value;
            tombolDipilih.removeAttribute('name');
        }

        isSubmitting = true;

        // Nonaktifkan semua chip
        formFilter.querySelectorAll('.category-filter-chip').forEach(function (button) {
            button.disabled = true;
        });

        // Tampilkan spinner pada chip yang dipilih
        if (tombolDipilih) {
            const spinner = document.createElement('i');
            spinner.className =
                'fa-solid fa-spinner fa-spin category-filter-spinner';
            spinner.setAttribute('aria-hidden', 'true');

            tombolDipilih.appendChild(spinner);
            tombolDipilih.setAttribute(
                'aria-label',
                tombolDipilih.textContent.trim() + ' sedang dimuat'
            );
        }
    });
});
</script>

<script src="{{ asset('js/logout-handler.js') }}"></script>
<script src="{{ asset('js/anti-double-click.js') }}"></script>
</body>
</html>
