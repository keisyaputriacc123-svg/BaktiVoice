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

        .nav-item a,
        .dropdown-btn {
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

        .nav-item a:hover,
        .dropdown-btn:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        /* MENU AKTIF */
        .nav-item.active > a,
        .nav-item.active > .dropdown-btn {
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
            color: var(--text-muted);

            border-radius: 6px;

            text-decoration: none;
            display: block;
        }

        .sub-menu a:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
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
        CONTENT
        ===================================================== */

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

            grid-template-columns:
                repeat(3, minmax(180px, 1fr))
                auto;

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
        }

        .filter-select:focus,
        .filter-date:focus {
            border-color: var(--primary);
        }

        .filter-button {
            height: 48px;

            padding: 0 24px;

            border: none;

            border-radius: 8px;

            background-color: var(--primary);

            color: white;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .filter-button:hover {
            background-color: #819bd5;
            transform: translateY(-1px);
        }


        /* =====================================================
        STATS
        ===================================================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(160px, 1fr));

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

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.05);
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

        .stat-card.total .stat-value {
            color: #1e293b;
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

            color: var(--text-main);
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

            color: #475569;

            font-size: 13px;

            font-weight: 700;

            padding: 15px 16px;

            text-align: left;

            border-bottom: 1px solid var(--border);
        }

        .report-table td {
            padding: 16px;

            font-size: 14px;

            color: #334155;

            border-bottom: 1px solid var(--border);

            vertical-align: middle;
        }

        .report-table tbody tr:hover {
            background-color: #f8fafc;
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

        .badge-diproses {
            background-color: #fef3c7;
            color: #b45309;
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
        BUTTON LIHAT
        ===================================================== */

        .btn-view {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 8px 14px;

            border: none;

            border-radius: 7px;

            background-color: #eef2ff;

            color: #496cbd;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .btn-view:hover {
            background-color: var(--primary);

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

    </style>
</head>


<body>

    <!-- =====================================================
        SIDEBAR
    ====================================================== -->

    <aside class="sidebar">

        <div>

            <!-- Logo -->
            <div class="brand">

                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img">

                <span class="brand-name">
                    BaktiVoice
                </span>

            </div>


            <!-- Navigation -->
            <ul class="nav-menu">

                <!-- LAPORAN -->
                <li class="nav-item">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>
                                Laporan
                            </span>

                        </div>

                    </a>

                </li>


                <!-- DATA MASTER -->
                <li class="nav-item">

                    <button
                        class="dropdown-btn"
                        onclick="toggleDropdown('masterMenu', 'masterArrow')">

                        <div class="nav-content">

                            <i class="fa-solid fa-database"></i>

                            <span>
                                Data Master
                            </span>

                        </div>

                        <i
                            class="fa-solid fa-chevron-down arrow-icon"
                            id="masterArrow">
                        </i>

                    </button>


                    <ul
                        class="sub-menu"
                        id="masterMenu">

                        <li>
                            <a href="#">
                                Kategori Laporan
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Status Laporan
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                User & Role
                            </a>
                        </li>

                    </ul>

                </li>


                <!-- REKAP LAPORAN -->
                <li class="nav-item active">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-solid fa-chart-column"></i>

                            <span>
                                Rekap Laporan
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
        <a
            href="{{ route('login') }}"
            class="logout-btn">

            <i class="fa-solid fa-xmark"></i>

            <span>
                Logout
            </span>

        </a>

    </aside>



    <!-- =====================================================
        MAIN WRAPPER
    ====================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
            TOPBAR
        ================================================== -->

        <header class="topbar">

            <div
                class="topbar-icon"
                title="Notifikasi">

                <i class="fa-regular fa-bell"></i>

            </div>


            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>

                <span class="user-name">
                    Admin Sekolah
                </span>

            </div>

        </header>



        <!-- =================================================
            CONTENT
        ================================================== -->

        <main class="content">


            <!-- PAGE TITLE -->

            <h1 class="page-title">
                Rekap Laporan
            </h1>



            <!-- =================================================
                FILTER
            ================================================== -->

            <section class="filter-wrapper">

                <div class="filter-grid">


                    <!-- KATEGORI -->

                    <div class="filter-group">

                        <label
                            for="kategori"
                            class="filter-label">

                            Kategori

                        </label>

                        <select
                            id="kategori"
                            class="filter-select">

                            <option value="">
                                Semua Kategori
                            </option>

                            <option value="Kesiswaan">
                                Kesiswaan
                            </option>

                            <option value="Kurikulum">
                                Kurikulum
                            </option>

                            <option value="Sarana dan Prasarana">
                                Sarana dan Prasarana
                            </option>

                            <option value="DUDI">
                                DUDI
                            </option>

                        </select>

                    </div>



                    <!-- STATUS -->

                    <div class="filter-group">

                        <label
                            for="status"
                            class="filter-label">

                            Status

                        </label>

                        <select
                            id="status"
                            class="filter-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Diproses">
                                Diproses
                            </option>

                            <option value="Selesai">
                                Selesai
                            </option>

                            <option value="Ditolak">
                                Ditolak
                            </option>

                        </select>

                    </div>



                    <!-- TANGGAL -->

                    <div class="filter-group">

                        <label
                            for="tanggal"
                            class="filter-label">

                            Pilih Tanggal

                        </label>

                        <input
                            type="date"
                            id="tanggal"
                            class="filter-date">

                    </div>



                    <!-- BUTTON -->

                    <div class="filter-group">

                        <button
                            type="button"
                            class="filter-button"
                            onclick="tampilkanData()">

                            <i class="fa-solid fa-filter"></i>

                            Tampilkan

                        </button>

                    </div>

                </div>

            </section>



            <!-- =================================================
                STATISTICS
            ================================================== -->

            <section class="stats-grid">


                <!-- TOTAL -->

                <div class="stat-card total">

                    <div class="stat-title">
                        TOTAL
                    </div>

                    <div
                        class="stat-value"
                        id="totalCount">

                        24

                    </div>

                </div>



                <!-- DIPROSES -->

                <div class="stat-card diproses">

                    <div class="stat-title">
                        DIPROSES
                    </div>

                    <div
                        class="stat-value"
                        id="diprosesCount">

                        12

                    </div>

                </div>



                <!-- SELESAI -->

                <div class="stat-card selesai">

                    <div class="stat-title">
                        SELESAI
                    </div>

                    <div
                        class="stat-value"
                        id="selesaiCount">

                        7

                    </div>

                </div>



                <!-- DITOLAK -->

                <div class="stat-card ditolak">

                    <div class="stat-title">
                        DITOLAK
                    </div>

                    <div
                        class="stat-value"
                        id="ditolakCount">

                        5

                    </div>

                </div>

            </section>



            <!-- =================================================
                TABLE
            ================================================== -->

            <section class="table-card">


                <!-- TABLE HEADER -->

                <div class="table-header">

                    <h2 class="table-title">
                        Daftar Laporan
                    </h2>

                </div>



                <!-- TABLE -->

                <div class="table-wrapper">

                    <table class="report-table">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Laporan
                                </th>

                                <th>
                                    Kategori
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody id="reportTableBody">


                            <!-- DATA 1 -->

                            <tr
                                data-kategori="Sarana dan Prasarana"
                                data-status="Diproses"
                                data-tanggal="2026-09-14">

                                <td>
                                    BV001
                                </td>

                                <td>
                                    Fasilitas Kelas
                                </td>

                                <td>
                                    Sarana dan Prasarana
                                </td>

                                <td>

                                    <span class="status-badge badge-diproses">
                                        Diproses
                                    </span>

                                </td>

                                <td>
                                    14 Sep 2026
                                </td>

                                <td>

                                    <a
                                        href="#"
                                        class="btn-view">

                                        <span>
                                            Lihat
                                        </span>

                                        <i class="fa-regular fa-eye"></i>

                                    </a>

                                </td>

                            </tr>



                            <!-- DATA 2 -->

                            <tr
                                data-kategori="Sarana dan Prasarana"
                                data-status="Selesai"
                                data-tanggal="2026-09-12">

                                <td>
                                    BV002
                                </td>

                                <td>
                                    Fasilitas Toilet
                                </td>

                                <td>
                                    Sarana dan Prasarana
                                </td>

                                <td>

                                    <span class="status-badge badge-selesai">
                                        Selesai
                                    </span>

                                </td>

                                <td>
                                    12 Sep 2026
                                </td>

                                <td>

                                    <a
                                        href="#"
                                        class="btn-view">

                                        <span>
                                            Lihat
                                        </span>

                                        <i class="fa-regular fa-eye"></i>

                                    </a>

                                </td>

                            </tr>



                            <!-- DATA 3 -->

                            <tr
                                data-kategori="Kesiswaan"
                                data-status="Ditolak"
                                data-tanggal="2026-09-09">

                                <td>
                                    BV003
                                </td>

                                <td>
                                    Keamanan Sekolah
                                </td>

                                <td>
                                    Kesiswaan
                                </td>

                                <td>

                                    <span class="status-badge badge-ditolak">
                                        Ditolak
                                    </span>

                                </td>

                                <td>
                                    9 Sep 2026
                                </td>

                                <td>

                                    <a
                                        href="#"
                                        class="btn-view">

                                        <span>
                                            Lihat
                                        </span>

                                        <i class="fa-regular fa-eye"></i>

                                    </a>

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>

            </section>


        </main>

    </div>



    <!-- =====================================================
        JAVASCRIPT
    ====================================================== -->

    <script>

        /* ==========================================
        DROPDOWN DATA MASTER
        ========================================== */

        function toggleDropdown(menuId, arrowId) {

            const menu =
                document.getElementById(menuId);

            const arrow =
                document.getElementById(arrowId);


            menu.classList.toggle('show');


            if (menu.classList.contains('show')) {

                arrow.style.transform =
                    'rotate(180deg)';

            } else {

                arrow.style.transform =
                    'rotate(0deg)';

            }

        }



        /* ==========================================
        FILTER LAPORAN
        ========================================== */

        function tampilkanData() {

            const kategori =
                document
                    .getElementById('kategori')
                    .value;

            const status =
                document
                    .getElementById('status')
                    .value;

            const tanggal =
                document
                    .getElementById('tanggal')
                    .value;


            const rows =
                document.querySelectorAll(
                    '#reportTableBody tr'
                );


            let total = 0;

            let diproses = 0;

            let selesai = 0;

            let ditolak = 0;


            rows.forEach(row => {

                const rowKategori =
                    row.dataset.kategori;

                const rowStatus =
                    row.dataset.status;

                const rowTanggal =
                    row.dataset.tanggal;


                const cocokKategori =
                    kategori === '' ||
                    rowKategori === kategori;


                const cocokStatus =
                    status === '' ||
                    rowStatus === status;


                const cocokTanggal =
                    tanggal === '' ||
                    rowTanggal === tanggal;


                if (
                    cocokKategori &&
                    cocokStatus &&
                    cocokTanggal
                ) {

                    row.style.display = '';

                    total++;


                    if (rowStatus === 'Diproses') {

                        diproses++;

                    }

                    if (rowStatus === 'Selesai') {

                        selesai++;

                    }

                    if (rowStatus === 'Ditolak') {

                        ditolak++;

                    }

                } else {

                    row.style.display = 'none';

                }

            });


            /* Update jumlah */

            document.getElementById(
                'totalCount'
            ).textContent = total;


            document.getElementById(
                'diprosesCount'
            ).textContent = diproses;


            document.getElementById(
                'selesaiCount'
            ).textContent = selesai;


            document.getElementById(
                'ditolakCount'
            ).textContent = ditolak;

        }

    </script>

</body>

</html>
