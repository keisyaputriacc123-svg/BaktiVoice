
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Laporan Siswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text-main);
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--card-bg);
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
            padding: 0 12px 24px;
        }

        .brand-logo-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: var(--primary);
            border-radius: 8px;
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
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: .2s;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-item a:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active > a {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-top: 16px;
            color: #ef4444;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
        }

        .logout-btn:hover {
            background: #fef2f2;
        }

        /* MAIN */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* TOPBAR */
        .topbar {
            height: var(--topbar-height);
            background: var(--card-bg);
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
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
        }

        .topbar-icon:hover {
            background: #f1f5f9;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        /* CONTENT */
        .content {
            padding: 36px;
            flex: 1;
            min-width: 0;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            line-height: 1.7;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        /* SEARCH AND FILTER */
        .filter-bar {
            display: grid;
            grid-template-columns: minmax(180px, 1fr) 190px 220px;
            gap: 14px;
            margin-bottom: 22px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .search-box input,
        .filter-select {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            color: #334155;
            font-size: 13px;
        }

        .search-box input {
            padding-left: 42px;
        }

        .search-box input:focus,
        .filter-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 172, 224, .15);
        }

        /* REPORT CARDS */
        .report-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .report-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .03);
            transition: .2s;
        }

        .report-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
        }

        .report-thumbnail {
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            background: #f1f5f9;
            border: 1px solid var(--border);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 24px;
        }

        .report-info {
            flex: 1;
            min-width: 0;
        }

        .report-title {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 9px;
            line-height: 1.5;
        }

        .report-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 16px;
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 9px;
        }

        .report-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .report-meta i {
            color: var(--text-main);
        }

        .report-description {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .report-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .status-badge {
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-diproses {
            background: #fef3c7;
            color: #b45309;
        }

        .badge-selesai {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-ditolak {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-detail {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 7px;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 14px;
        }

        .btn-detail:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .empty-state {
            display: none;
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 40px 20px;
            text-align: center;
            color: var(--text-muted);
            line-height: 1.8;
        }

        .empty-state i {
            display: block;
            font-size: 32px;
            margin-bottom: 12px;
            color: #94a3b8;
        }

        /* PAGINATION */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 24px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .page-btn {
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: white;
            color: var(--text-muted);
            cursor: pointer;
        }

        .page-btn:hover:not(:disabled) {
            border-color: var(--primary);
            color: var(--text-main);
        }

        .page-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .page-btn:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .content {
                padding: 28px;
            }

            .filter-bar {
                grid-template-columns: 1fr 1fr;
            }

            .search-box {
                grid-column: 1 / -1;
            }

            .report-card {
                align-items: flex-start;
            }
        }

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
                display: none;
            }

            .nav-item a,
            .logout-btn {
                justify-content: center;
                padding: 13px 8px;
            }

            .nav-content {
                justify-content: center;
            }

            .nav-item i,
            .logout-btn i {
                font-size: 17px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 22px 16px;
            }

            .topbar {
                padding: 0 16px;
                gap: 12px;
            }

            .page-title {
                font-size: 24px;
            }

            .report-card {
                padding: 14px;
                gap: 12px;
                flex-wrap: wrap;
            }

            .report-thumbnail {
                width: 48px;
                height: 48px;
                font-size: 19px;
            }

            .report-info {
                flex: 1;
                width: calc(100% - 65px);
            }

            .report-actions {
                width: 100%;
                justify-content: flex-end;
                border-top: 1px solid #f1f5f9;
                padding-top: 10px;
            }

            .pagination-wrapper {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .user-name {
                display: none;
            }

            .filter-bar {
                grid-template-columns: 1fr;
            }

            .search-box {
                grid-column: auto;
            }

            .page-title {
                font-size: 22px;
            }

            .report-title {
                font-size: 13px;
            }

            .report-description {
                font-size: 11px;
            }

            .report-meta {
                gap: 7px 12px;
            }

            .pagination {
                gap: 4px;
            }

            .page-btn {
                min-width: 30px;
                height: 32px;
                padding: 0 8px;
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
                    <a href="{{ route('dashboard_bk') }}">
                        <div class="nav-content">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ url('/dashboard/bk/laporan-siswa') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan Siswa</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-eye"></i>
                            <span>Monitoring</span>
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

        <a href="{{ route('login') }}" class="logout-btn">
            <i class="fa-solid fa-xmark"></i>
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
                    {{ Auth::user()->name ?? 'Guru BK' }}
                </span>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="content">

            <h1 class="page-title">Laporan Siswa</h1>

            <p class="page-description">
                Kelola dan pantau laporan yang berkaitan dengan siswa.
            </p>

            <!-- SEARCH & FILTER -->
            <section class="filter-bar">

                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari laporan..."
                        aria-label="Cari laporan"
                    >
                </div>

                <select id="statusFilter" class="filter-select"
                    aria-label="Filter status">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>

                <select id="categoryFilter" class="filter-select"
                aria-label="Filter kategori">
                <option value="Kesiswaan">Kesiswaan</option>
                </select>

            </section>


<!-- REPORT LIST -->
<section class="report-list" id="reportList">

    <!-- LAPORAN 1 -->
    <article class="report-card"
        data-status="Diproses" data-category="Kesiswaan">

        <div class="report-thumbnail">
            <i class="fa-regular fa-image"></i>
        </div>

        <div class="report-info">
            <h2 class="report-title">Perundungan Antar Siswa</h2>

            <div class="report-meta">
                <span>
                    <i class="fa-regular fa-calendar"></i>
                    16 Sep 2026
                </span>
                <span>
                    <i class="fa-solid fa-tag"></i>
                    Kesiswaan
                </span>
            </div>

            <p class="report-description">
                Terjadi tindakan perundungan yang dilakukan oleh beberapa
                siswa terhadap teman sekelasnya.
            </p>
        </div>


        <div class="report-actions">
        <span class="status-badge badge-diproses">Diproses</span>

        <a href="{{ route('detail_laporan_bk') }}"
        class="btn-detail"
        title="Lihat detail laporan"
        aria-label="Detail Perundungan Antar Siswa">
        <i class="fa-solid fa-chevron-right"></i>
        </a>
        </div>
        </article>

    <!-- LAPORAN 2 -->
    <article class="report-card"
        data-status="Selesai" data-category="Kesiswaan">

        <div class="report-thumbnail">
            <i class="fa-regular fa-image"></i>
        </div>

        <div class="report-info">
            <h2 class="report-title">Konflik Antar Siswa</h2>

            <div class="report-meta">
                <span>
                    <i class="fa-regular fa-calendar"></i>
                    12 Sep 2026
                </span>
                <span>
                    <i class="fa-solid fa-tag"></i>
                    Kesiswaan
                </span>
            </div>

            <p class="report-description">
                Terjadi perselisihan antara dua siswa yang berujung
                pada pertengkaran di lingkungan sekolah.
            </p>
        </div>


<div class="report-actions">
    <span class="status-badge badge-selesai">Selesai</span>

        <a href="{{ route('detail_laporan_bk') }}"
        class="btn-detail"
        title="Lihat detail laporan"
        aria-label="Detail Konflik Antar Siswa">
        <i class="fa-solid fa-chevron-right"></i>
        </a>
</div>
</article>


    <!-- LAPORAN 3 -->
    <article class="report-card"
        data-status="Ditolak" data-category="Kesiswaan">

        <div class="report-thumbnail">
            <i class="fa-regular fa-image"></i>
        </div>

        <div class="report-info">
            <h2 class="report-title">Pelanggaran Tata Tertib</h2>

            <div class="report-meta">
                <span>
                    <i class="fa-regular fa-calendar"></i>
                    5 Sep 2026
                </span>
                <span>
                    <i class="fa-solid fa-tag"></i>
                    Kesiswaan
                </span>
            </div>

            <p class="report-description">
                Siswa melanggar tata tertib sekolah dengan membawa
                barang yang tidak semestinya.
            </p>
        </div>

<div class="report-actions">
    <span class="status-badge badge-ditolak">Ditolak</span>

        <a href="{{ route('detail_laporan_bk') }}"
        class="btn-detail"
        title="Lihat detail laporan"
        aria-label="Detail Pelanggaran Tata Tertib">
        <i class="fa-solid fa-chevron-right"></i>
        </a>
</div>
</article>
</section>

            <div class="empty-state" id="emptyState">
                <i class="fa-regular fa-folder-open"></i>
                <strong>Laporan tidak ditemukan</strong>
                <p>Coba gunakan kata kunci atau filter yang berbeda.</p>
            </div>

            <!-- PAGINATION -->
            <div class="pagination-wrapper">
                <p id="resultInfo">Menampilkan 1-5 dari 5 laporan contoh</p>

                <div class="pagination" aria-label="Navigasi halaman">
                    <button class="page-btn" type="button" disabled
                        aria-label="Halaman sebelumnya">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <button class="page-btn active" type="button"
                        aria-current="page">1</button>

                    <button class="page-btn" type="button" disabled
                        aria-label="Halaman berikutnya">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

        </main>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const categoryFilter = document.getElementById('categoryFilter');
        const reportCards = Array.from(
            document.querySelectorAll('.report-card')
        );
        const emptyState = document.getElementById('emptyState');
        const resultInfo = document.getElementById('resultInfo');

        function filterReports() {
            const keyword = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value;
            const selectedCategory = categoryFilter.value;

            let visibleCount = 0;

            reportCards.forEach(function(card) {
                const searchableText = card.innerText.toLowerCase();
                const status = card.dataset.status;
                const category = card.dataset.category;

                const matchesKeyword = searchableText.includes(keyword);
                const matchesStatus =
                    selectedStatus === '' || status === selectedStatus;
                const matchesCategory =
                    selectedCategory === '' || category === selectedCategory;

                const isVisible =
                    matchesKeyword && matchesStatus && matchesCategory;

                card.style.display = isVisible ? 'flex' : 'none';

                if (isVisible) {
                    visibleCount++;
                }
            });

            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';

            if (visibleCount === 0) {
                resultInfo.textContent = 'Tidak ada laporan yang sesuai';
            } else {
                resultInfo.textContent =
                    'Menampilkan ' + visibleCount +
                    ' dari ' + reportCards.length + ' laporan contoh';
            }
        }

        searchInput.addEventListener('input', filterReports);
        statusFilter.addEventListener('change', filterReports);
        categoryFilter.addEventListener('change', filterReports);

        function showDetail(title) {
            alert(
                'Laporan: ' + title +
                '\n\nHalaman detail laporan belum dihubungkan.'
            );
        }
    </script>

</body>
</html>
