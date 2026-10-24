
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Notifikasi Siswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
       :root {
            --primary: #96ace0;
            --primary-hover: #7b94d1;
            --background: #eaf1fb; /* Background main content disamakan jadi abu-biru soft pastel */
            --card-bg: #ffffff;
            --border: rgba(186, 210, 240, 0.5);
            --text-main: #2c4a8e;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 12px;
            --red: #ef4444;

            /* Gradasi Biru Pastel Favorit Kamu */
            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
            --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background) !important;
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR (PASTEL BLUE) */
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
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: #ffffff;
            border-radius: 12px;
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
            transition: .25s ease;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item a:hover {
            background: rgba(255, 255, 255, 0.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active > a {
            background: #ffffff;
            color: #3b62ac;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
        }

        .nav-item i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-top: 16px;
            color: #e11d48;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }

        /* MAIN & TOPBAR (PASTEL BLUE) */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            background-color: var(--background) !important;
        }

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
            position: relative;
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .topbar-icon:hover {
            background: rgba(255, 255, 255, 0.4);
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
            background: #ffffff;
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

        /* INDICATOR BULAT */
        .notification-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            min-width: 8px;
            border-radius: 50%;
            background: var(--red);
        }

        .notification-dot.hidden {
            display: none;
        }

        .topbar-dot {
            position: absolute;
            top: 4px;
            right: 3px;
            border: 2px solid white;
        }

        .nav-notification-dot {
            margin-left: auto;
        }

        /* CONTENT */
        .content {
            padding: 36px;
            flex: 1;
            background-color: var(--background) !important;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .page-description {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .btn-mark-all {
            border: 1px solid rgba(186, 210, 240, 0.6);
            background: white;
            color: var(--text-main);
            border-radius: 10px;
            padding: 11px 16px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .btn-mark-all:hover {
            background: #f1f5f9;
            border-color: #7b9fe8;
        }

        /* FILTER */
        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: white;
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: .2s;
        }

        .filter-btn:hover {
            border-color: #7b9fe8;
            color: var(--text-main);
        }

        .filter-btn.active {
            background: #7b9fe8;
            color: white;
            border-color: #7b9fe8;
        }

        /* LIST NOTIFIKASI */
        .notification-section {
            margin-bottom: 26px;
        }

        .section-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            letter-spacing: .6px;
            margin-bottom: 12px;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .notification-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px;
            background: white;
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: all 0.25s ease;
        }

        .notification-card:hover {
            border-color: #7b9fe8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
        }

        .notification-card.unread {
            background: #f7f9ff;
            border-color: #b8d7ff;
        }

        .notification-icon {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .icon-status {
            background: #e8f0ff;
            color: #496cbd;
        }

        .icon-tanggapan {
            background: #f1eafe;
            color: #805ad5;
        }

        .icon-tindaklanjut {
            background: #e2f7eb;
            color: #198754;
        }

        .notification-body {
            flex: 1;
            min-width: 0;
        }

        .notification-heading {
            display: flex;
            align-items: center;
            gap: 9px;
            flex-wrap: wrap;
            margin-bottom: 7px;
        }

        .notification-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a70;
        }

        .notification-message {
            font-size: 13px;
            line-height: 1.7;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .notification-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            color: #94a3b8;
        }

        .meta-separator {
            color: #cbd5e1;
        }

        .notification-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 12px;
        }

        .btn-view {
            color: #3b62ac;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-view:hover {
            text-decoration: underline;
        }

        .btn-read {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 11px;
            cursor: pointer;
        }

        .btn-read:hover {
            color: var(--text-main);
        }

        .empty-state {
            background: white;
            border: 1px dashed rgba(186, 210, 240, 0.8);
            border-radius: var(--radius);
            padding: 45px 20px;
            text-align: center;
            color: var(--text-muted);
            box-shadow: var(--shadow);
        }

        .empty-state i {
            font-size: 32px;
            margin-bottom: 14px;
            color: #94a3b8;
        }

        .empty-state h3 {
            color: #1e3a70;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 13px;
            line-height: 1.7;
        }

        /* RESPONSIVE */
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
                width: 48px;
                height: 48px;
            }

            .brand-name,
            .nav-item span,
            .logout-btn span {
                display: none !important;
            }

            .nav-item a {
                justify-content: center;
                padding: 12px 8px;
                position: relative;
            }

            .nav-content {
                justify-content: center;
            }

            .nav-item i {
                font-size: 18px;
            }

            .nav-notification-dot {
                position: absolute;
                margin: 0;
                transform: translate(9px, -8px);
                border: 2px solid white;
            }

            .logout-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 22px 18px;
            }

            .topbar {
                padding: 0 18px;
            }

            .notification-card {
                padding: 16px;
                gap: 12px;
            }

            .notification-actions {
                gap: 14px;
            }
        }

        @media (max-width: 550px) {
            .user-name {
                display: none;
            }

            .page-heading {
                flex-direction: column;
            }

            .page-title {
                font-size: 24px;
            }

            .notification-card {
                flex-wrap: wrap;
            }

            .notification-body {
                flex-basis: calc(100% - 60px);
            }

            .notification-actions {
                flex-direction: row;
                align-items: center;
                width: 100%;
                padding-left: 58px;
            }

            .filter-container {
                gap: 8px;
            }

            .filter-btn {
                padding: 9px 10px;
                font-size: 12px;
            }
        }
        </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="brand">
                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >
                <span class="brand-name">BaktiVoice</span>
            </div>

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

                <li class="nav-item">
                    <a href="{{ route('riwayat_laporan') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Riwayat Laporan</span>
                        </div>
                    </a>
                </li>

                <!-- MENU AKTIF: NOTIFIKASI -->
                <li class="nav-item active">
                    <a href="{{ route('notifikasi_siswa') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
                        </div>
                        <span
                            class="notification-dot nav-notification-dot"
                            id="sidebarDot"
                            aria-label="Ada notifikasi belum dibaca"
                        ></span>
                    </a>
                </li>

                <!-- PROFIL -->
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

<a href="{{ route('login') }}" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
</a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">

        <!-- TOPBAR -->
        <header class="topbar">
            <a
                href="{{ route('notifikasi_siswa') }}"
                class="topbar-icon"
                title="Notifikasi"
                aria-label="Buka notifikasi"
            >
                <i class="fa-regular fa-bell"></i>
                <span class="notification-dot topbar-dot" id="topbarDot"></span>
            </a>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="user-name">
                    {{ Auth::user()->name ?? 'Nama Siswa' }}
                </span>
            </div>
        </header>

        <!-- KONTEN NOTIFIKASI -->
        <main class="content">

            <div class="page-heading">
                <div>
                    <h1 class="page-title">Notifikasi</h1>
                    <p class="page-description">
                        Pantau pembaruan status, tanggapan, dan tindak lanjut laporanmu.
                    </p>
                </div>

                <button type="button" class="btn-mark-all" id="markAllBtn">
                    <i class="fa-solid fa-check-double"></i>
                    Tandai Semua Dibaca
                </button>
            </div>

            <!-- FILTER KATEGORI -->
            <div class="filter-container" aria-label="Filter notifikasi">

                <button class="filter-btn active" data-filter="semua" type="button">
                    Semua
                    <span class="notification-dot filter-dot" data-dot="semua"></span>
                </button>

                <button class="filter-btn" data-filter="belum-dibaca" type="button">
                    Belum Dibaca
                    <span class="notification-dot filter-dot" data-dot="belum-dibaca"></span>
                </button>

                <button class="filter-btn" data-filter="status" type="button">
                    Status Laporan
                    <span class="notification-dot filter-dot" data-dot="status"></span>
                </button>

                <button class="filter-btn" data-filter="tanggapan" type="button">
                    Tanggapan
                    <span class="notification-dot filter-dot" data-dot="tanggapan"></span>
                </button>

                <button class="filter-btn" data-filter="tindak-lanjut" type="button">
                    Tindak Lanjut
                    <span class="notification-dot filter-dot" data-dot="tindak-lanjut"></span>
                </button>

            </div>

            <section class="notification-section">
                <h2 class="section-label">DAFTAR PEMBERITAHUAN</h2>

                <div class="notification-list" id="notificationList">

                    <!-- NOTIFIKASI 1: TANGGAPAN WAKASEK -->
                    <article
                        class="notification-card unread"
                        data-category="tanggapan"
                        data-read="false"
                    >
                        <div class="notification-icon icon-tanggapan">
                            <i class="fa-solid fa-message"></i>
                        </div>

                        <div class="notification-body">
                            <div class="notification-heading">
                                <h3 class="notification-title">
                                    Tanggapan Baru dari Wakasek
                                </h3>
                                <span class="notification-dot item-dot"></span>
                            </div>

                            <p class="notification-message">
                                Wakasek Sarana memberikan tanggapan pada laporan
                                Fasilitas Kelas. Buka laporan untuk melihat
                                informasi selengkapnya.
                            </p>

                            <div class="notification-meta">
                                <span>Wakasek Sarana</span>
                                <span class="meta-separator">•</span>
                                <span>Hari ini, 10.30</span>
                            </div>
                        </div>

                        <div class="notification-actions">
                            <a href="{{ route('riwayat_laporan') }}" class="btn-view">
                                Lihat Laporan <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <button type="button" class="btn-read">
                                Tandai dibaca
                            </button>
                        </div>
                    </article>

                    <!-- NOTIFIKASI 2: TINDAK LANJUT GURU BK -->
                    <article
                        class="notification-card unread"
                        data-category="tindak-lanjut"
                        data-read="false"
                    >
                        <div class="notification-icon icon-tindaklanjut">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <div class="notification-body">
                            <div class="notification-heading">
                                <h3 class="notification-title">
                                    Tindak Lanjut Laporan Tersedia
                                </h3>
                                <span class="notification-dot item-dot"></span>
                            </div>

                            <p class="notification-message">
                                Guru BK telah memberikan tindak lanjut
                                untuk laporanmu. Silakan buka laporan untuk
                                membaca informasinya.
                            </p>

                            <div class="notification-meta">
                                <span>Guru BK</span>
                                <span class="meta-separator">•</span>
                                <span>Hari ini, 09.15</span>
                            </div>
                        </div>

                        <div class="notification-actions">
                            <a href="{{ route('riwayat_laporan') }}" class="btn-view">
                                Lihat Laporan <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <button type="button" class="btn-read">
                                Tandai dibaca
                            </button>
                        </div>
                    </article>

                    <!-- NOTIFIKASI 3: STATUS LAPORAN -->
                    <article
                        class="notification-card"
                        data-category="status"
                        data-read="true"
                    >
                        <div class="notification-icon icon-status">
                            <i class="fa-solid fa-rotate"></i>
                        </div>

                        <div class="notification-body">
                            <div class="notification-heading">
                                <h3 class="notification-title">
                                    Status Laporan Diperbarui
                                </h3>
                            </div>

                            <p class="notification-message">
                                Laporan Fasilitas Toilet telah selesai
                                ditindaklanjuti oleh pihak sekolah.
                            </p>

                            <div class="notification-meta">
                                <span>Admin Sekolah</span>
                                <span class="meta-separator">•</span>
                                <span>10 Oktober 2026, 15.00</span>
                            </div>
                        </div>

                        <div class="notification-actions">
                            <a href="{{ route('riwayat_laporan') }}" class="btn-view">
                                Lihat Laporan <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                </div>

                <!-- PESAN JIKA FILTER KOSONG -->
                <div class="empty-state" id="emptyState" hidden>
                    <i class="fa-regular fa-bell-slash"></i>
                    <h3>Tidak Ada Notifikasi</h3>
                    <p>Belum ada notifikasi pada kategori ini.</p>
                </div>
            </section>

        </main>
    </div>

    <script>
        const filterButtons = document.querySelectorAll('.filter-btn');
        const notificationCards = document.querySelectorAll('.notification-card');
        const emptyState = document.getElementById('emptyState');

        let activeFilter = 'semua';

        // Memperbarui indikator berdasarkan notifikasi yang belum dibaca.
        function updateIndicators() {
            const unreadCards = [...notificationCards].filter(
                card => card.dataset.read === 'false'
            );

            const counts = {
                'semua': unreadCards.length,
                'belum-dibaca': unreadCards.length,
                'status': unreadCards.filter(
                    card => card.dataset.category === 'status'
                ).length,
                'tanggapan': unreadCards.filter(
                    card => card.dataset.category === 'tanggapan'
                ).length,
                'tindak-lanjut': unreadCards.filter(
                    card => card.dataset.category === 'tindak-lanjut'
                ).length
            };

            document.querySelectorAll('.filter-dot').forEach(dot => {
                const category = dot.dataset.dot;
                dot.classList.toggle('hidden', counts[category] === 0);
            });

            document.getElementById('sidebarDot')
                .classList.toggle('hidden', counts.semua === 0);

            document.getElementById('topbarDot')
                .classList.toggle('hidden', counts.semua === 0);
        }

        // Menampilkan notifikasi sesuai kategori yang dipilih.
        function applyFilter() {
            let visibleCount = 0;

            notificationCards.forEach(card => {
                const category = card.dataset.category;
                const isUnread = card.dataset.read === 'false';

                let show = false;

                if (activeFilter === 'semua') {
                    show = true;
                } else if (activeFilter === 'belum-dibaca') {
                    show = isUnread;
                } else {
                    show = category === activeFilter;
                }

                card.hidden = !show;

                if (show) visibleCount++;
            });

            emptyState.hidden = visibleCount !== 0;
        }

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                activeFilter = button.dataset.filter;

                filterButtons.forEach(item => {
                    item.classList.toggle('active', item === button);
                });

                applyFilter();
            });
        });

        // Tandai satu notifikasi sudah dibaca.
        notificationCards.forEach(card => {
            const readButton = card.querySelector('.btn-read');

            if (!readButton) return;

            readButton.addEventListener('click', () => {
                card.dataset.read = 'true';
                card.classList.remove('unread');

                const itemDot = card.querySelector('.item-dot');
                if (itemDot) itemDot.classList.add('hidden');

                readButton.remove();

                updateIndicators();
                applyFilter();
            });
        });

        // Tandai semua notifikasi sudah dibaca.
        document.getElementById('markAllBtn').addEventListener('click', () => {
            notificationCards.forEach(card => {
                card.dataset.read = 'true';
                card.classList.remove('unread');

                const itemDot = card.querySelector('.item-dot');
                if (itemDot) itemDot.classList.add('hidden');

                const readButton = card.querySelector('.btn-read');
                if (readButton) readButton.remove();
            });

            updateIndicators();
            applyFilter();
        });

        // Inisialisasi halaman.
        updateIndicators();
        applyFilter();
    </script>

</body>
</html>
