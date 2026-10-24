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
SIDEBAR
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
       TOPBAR
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

            color: #0f172a;

            margin-bottom: 24px;
        }

        /* SEARCH */
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

        /* LAPORAN CARD */
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
            text-decoration: none;
            color: inherit;
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

        .status-pending {
            background-color: #f3f4f6;
            color: #4b5563;
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

        /* RESPONSIVE */
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

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>

            <!-- BRAND -->
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>


            <!-- NAVIGATION -->
            <ul class="nav-menu">


                <li class="nav-item">

                    <a href="{{ route('dashboard_siswa') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="{{ route('buat_laporan') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>
                            <span>Buat Laporan</span>
                        </div>

                    </a>

                </li>



                <li class="nav-item active">

                    <a href="{{ route('riwayat_laporan') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Riwayat Laporan</span>
                        </div>

                    </a>

                </li>



                <li class="nav-item">


    <a href="{{ route('notifikasi_siswa') }}">


                        <div class="nav-content">

                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
                        </div>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="{{ route('profil_siswa') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-user"></i>
                            <span>Profil</span>
                        </div>

                    </a>

                </li>

            </ul>

        </div>


        <!-- LOGOUT -->
<a href="{{ route('login') }}" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
</a>

    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">


        <!-- TOPBAR -->
        <header class="topbar">


            <div class="topbar-icon" title="Notifikasi">

                <i class="fa-regular fa-bell"></i>

            </div>



            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Nama Siswa' }}
                </span>

            </div>

        </header>

        <!-- CONTENT -->
        <main class="content">
            <h1 class="page-title">Riwayat Laporan</h1>

            <!-- SEARCH -->
            <div class="search-wrapper">

                <i class="fa-solid fa-magnifying-glass search-icon"></i>

                <input
                    type="text"
                    class="search-input"
                    id="searchInput"
                    placeholder="Cari..."
                >
                <button type="button" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

            </div>

            <!-- DAFTAR LAPORAN DINAMIS -->
            <div class="report-list" id="reportList">
                @forelse($laporans as $laporan)
                    @php
                        $statusNama = $laporan->status->nama_status ?? 'Pending';
                        $statusClass = match(strtolower($statusNama)) {
                            'proses', 'diproses' => 'status-diproses',
                            'selesai' => 'status-selesai',
                            'ditolak' => 'status-ditolak',
                            default => 'status-pending'
                        };
                    @endphp

                    <a href="{{ route('konfirmasi_laporan', ['id' => $laporan->id_laporan]) }}"
                       class="report-card"
                       data-title="{{ $laporan->judul_laporan }}"
                       data-date="{{ $laporan->created_at->format('d M Y') }}">

                        <div class="report-image">
                            @if($laporan->bukti_url)
                                <img src="{{ asset($laporan->bukti_url) }}" alt="Bukti">
                            @else
                                <i class="fa-regular fa-image"></i>
                            @endif
                        </div>

                        <div class="report-info">
                            <div class="report-title">
                                {{ $laporan->judul_laporan }}
                            </div>
                            <div class="report-date">
                                {{ $laporan->created_at->format('d M Y') }}
                            </div>
                        </div>

                        <div class="report-status {{ $statusClass }}">
                            {{ $statusNama }}
                        </div>

                        <div class="report-arrow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </a>
                @empty
                    <div style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Belum ada riwayat laporan yang dikirim.
                    </div>
                @endforelse
            </div>
        </main>

    </div>

    <!-- SEARCH JAVASCRIPT -->
    <script>

        const searchInput = document.getElementById('searchInput');

        const reportCards = document.querySelectorAll('.report-card');


        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();


            reportCards.forEach(function (card) {
                const title = card.dataset.title ? card.dataset.title.toLowerCase() : '';
                const date = card.dataset.date ? card.dataset.date.toLowerCase() : '';

                if (title.includes(keyword) || date.includes(keyword)) {
                    card.style.display = 'flex';

                } else {

                    card.style.display = 'none';

                }

            });

        });

    </script>

</body>
</html>
