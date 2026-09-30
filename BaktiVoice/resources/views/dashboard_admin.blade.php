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
            --shadow: 0 1px 3px 0 rgba(119, 5, 5, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03);
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

        /* --- SIDEBAR --- */
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

        .nav-item a, .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 12px 16px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
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
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active > a, .nav-item.active > .dropdown-btn {
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
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
            color: var(--text-muted);
            border-radius: 6px;
            text-decoration: none;
            display: block;
        }

        .sub-menu a:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

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

        /* --- MAIN WRAPPER --- */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- TOPBAR --- */
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

        /* --- MAIN CONTENT --- */
        .content {
            padding: 36px;
            flex: 1;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 28px;
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
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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


        .stat-card.total .stat-value { color: #1e293b; }
        .stat-card.diproses .stat-value { color: #d97706; }
        .stat-card.selesai .stat-value { color: #16a34a; }
        .stat-card.ditolak .stat-value { color: #dc2626; }

        /* --- RECENT REPORTS SECTION --- */
        .section-header {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
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
            transition: border-color 0.2s;
        }

        .report-card:hover {
            border-color: #cbd5e1;
        }

        .report-info-group {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .report-thumbnail {
            width: 52px;
            height: 52px;
            background-color: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 20px;
            border: 1px solid var(--border);
        }

        .report-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .report-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-main);
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
            border-radius: 6px;
            transition: background 0.2s;
        }

        .btn-dropdown:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }
            .brand-name, .nav-item span, .logout-btn span, .arrow-icon, .sub-menu {
                display: none !important;
            }
            .main-wrapper {
                margin-left: 70px;
            }
            .content {
                padding: 20px;
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
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <!-- Navigasi Utama -->
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan</span>
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
                        <li><a href="#">Data Pengguna</a></li>
                        <li><a href="#">Kategori Laporan</a></li>
                        <li><a href="#">Data Lokasi / Kelas</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Rekap Laporan</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
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

        <!-- Tombol Logout -->
        <a href="{{ route('login') }}" class="logout-btn">
            <i class="fa-solid fa-xmark"></i>
            <span>Logout</span>
        </a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">

        <!-- TOPBAR / HEADER -->
        <header class="topbar">
            <div class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="user-name">Admin Sekolah</span>
            </div>
        </header>

        <!-- MAIN CONTENT AREA -->
        <main class="content">
            <h1 class="page-title">Dashboard</h1>

            <!-- 4 SUMMARY STATS CARDS -->
            <section class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-title">Total</div>
                    <div class="stat-value">24</div>
                </div>
                <div class="stat-card diproses">
                    <div class="stat-title">Diproses</div>
                    <div class="stat-value">12</div>
                </div>
                <div class="stat-card selesai">
                    <div class="stat-title">Selesai</div>
                    <div class="stat-value">7</div>
                </div>
                <div class="stat-card ditolak">
                    <div class="stat-title">Ditolak</div>
                    <div class="stat-value">5</div>
                </div>
            </section>

            <!-- LAPORAN TERBARU SECTION -->
            <section>
                <h2 class="section-header">Laporan Terbaru</h2>

                <div class="report-list">
                    <!-- Item 1: Fasilitas Kelas -->
                    <div class="report-card">
                        <div class="report-info-group">
                            <div class="report-thumbnail">
                                <i class="fa-regular fa-image"></i>
                            </div>
                            <div class="report-details">
                                <div class="report-title">Fasilitas Kelas</div>
                                <div class="report-date">14 Sep 2026</div>
                            </div>
                        </div>
                        <div class="report-actions">
                            <span class="status-badge badge-diproses">Diproses</span>
                            <button class="btn-dropdown" title="Detail">
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Item 2: Fasilitas Toilet -->
                    <div class="report-card">
                        <div class="report-info-group">
                            <div class="report-thumbnail">
                                <i class="fa-regular fa-image"></i>
                            </div>
                            <div class="report-details">
                                <div class="report-title">Fasilitas Toilet</div>
                                <div class="report-date">12 Sep 2026</div>
                            </div>
                        </div>
                        <div class="report-actions">
                            <span class="status-badge badge-selesai">Selesai</span>
                            <button class="btn-dropdown" title="Detail">
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Item 3: Keamanan Sekolah -->
                    <div class="report-card">
                        <div class="report-info-group">
                            <div class="report-thumbnail">
                                <i class="fa-regular fa-image"></i>
                            </div>
                            <div class="report-details">
                                <div class="report-title">Keamanan Sekolah</div>
                                <div class="report-date">9 Sep 2026</div>
                            </div>
                        </div>
                        <div class="report-actions">
                            <span class="status-badge badge-ditolak">Ditolak</span>
                            <button class="btn-dropdown" title="Detail">
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </section>
        </main>
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
    </script>
</body>
</html>
