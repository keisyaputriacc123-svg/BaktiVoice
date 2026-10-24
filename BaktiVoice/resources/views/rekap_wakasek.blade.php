<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Rekap Laporan Wakasek</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
            --gradient-pastel: linear-gradient(
                135deg,
                #7b9fe8 0%,
                #9bc3f8 50%,
                #b8d7ff 100%
            );
            --gradient-button: linear-gradient(
                135deg,
                #628cdb 0%,
                #4772c7 100%
            );
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
            min-height: 100vh;
        }

        /* SIDEBAR */

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
            max-width: 60px;
            object-fit: contain;
            border-radius: 12px;
            background: #ffffff;
            padding: 3px;
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
            gap: 12px;
            width: 100%;
            padding: 12px 16px;

            color: #274472;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;

            border-radius: 10px;
            transition: all 0.25s ease;
        }

        .nav-item a:hover {
            background: rgba(255, 255, 255, 0.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active a {
            background: #ffffff;
            color: #3b62ac;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 16px;
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

        /* LOGOUT */

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;

            border: none;
            border-radius: 10px;
            background: transparent;

            color: #e11d48;
            font-size: 14px;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }

        /* MAIN WRAPPER */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background: var(--background);
        }

        /* TOPBAR */

        .topbar {
            height: var(--topbar-height);
            background: var(--gradient-pastel);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);

            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            padding: 0 36px;

            position: sticky;
            top: 0;
            z-index: 90;

            box-shadow: 0 4px 15px rgba(123, 159, 232, 0.12);
        }

        .topbar-icon {
            color: #274472;
            font-size: 18px;
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.2s;
        }

        .topbar-icon:hover {
            background: rgba(255, 255, 255, 0.4);
            color: #102a56;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            transition: background 0.2s;
        }

        .user-profile:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
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

        /* MAIN CONTENT */

        .content {
            padding: 36px;
            min-height: calc(100vh - var(--topbar-height));
            background: var(--background);
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 10px;
        }

        .breadcrumb {
            color: var(--text-muted);
            font-size: 13px;
            margin-bottom: 12px;
            font-weight: 500;
        }

        .breadcrumb span {
            color: #3b62ac;
            font-weight: 700;
        }

        .welcome-text {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 28px;
            line-height: 1.7;
        }

        /* STATISTICS (4 COLUMNS - MATCHING DASHBOARD) */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
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
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-main);
        }

        .total .stat-value { color: #1e3a70; }
        .pending .stat-value { color: #496cbd; }
        .diproses .stat-value { color: #d97706; }
        .selesai .stat-value { color: #16a34a; }
        .ditolak .stat-value { color: #dc2626; }

        /* PANEL & TABLE STYLING */

        .panel {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .panel-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
        }

        .panel-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 6px;
        }

        .panel-header p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .filters {
            display: grid;
            grid-template-columns: minmax(200px, 1fr) 180px 180px;
            gap: 16px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            background: #fbfdff;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .control {
            width: 100%;
            min-height: 42px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--text-main);
            padding: 10px 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-box .control {
            padding-left: 38px;
        }

        .control:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap;
        }

        thead {
            background: #f4f8ff;
        }

        th {
            padding: 14px 20px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--text-muted);
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .report-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 4px;
        }

        .report-id {
            color: var(--text-muted);
            font-size: 11px;
        }

        /* STATUS BADGES */

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-pending {
            background: #eaf0ff;
            color: #496cbd;
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
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 8px;
            background: #eaf0ff;
            color: #3b62ac;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-detail:hover {
            background: #3b62ac;
            color: #ffffff;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            display: block;
            font-size: 30px;
            margin-bottom: 12px;
            color: #94a3b8;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 16px 24px;
            border-top: 1px solid var(--border);
            color: var(--text-muted);
            font-size: 12px;
            background: #fbfdff;
        }

        .reset-button {
            border: 1px solid var(--border);
            background: white;
            color: var(--text-main);
            border-radius: 8px;
            padding: 8px 14px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }

        .reset-button:hover {
            background: #f1f5f9;
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {
            .content { padding: 26px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                padding: 0 0 24px;
                justify-content: center;
            }

            .brand-logo-img {
                width: 42px;
                height: 42px;
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

            .main-wrapper { margin-left: 70px; }
            .topbar { padding: 0 18px; }
            .content { padding: 22px 16px; }
            .page-title { font-size: 24px; }
            .filters { grid-template-columns: 1fr; }
        }

        @media (max-width: 550px) {
            .topbar { padding: 0 12px; gap: 8px; }
            .user-name { font-size: 12px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
            .stat-card { padding: 18px 10px; }
            .stat-value { font-size: 26px; }
            .stat-title { font-size: 10px; }
        }
    </style>
</head>
<body>

@php
    $role = auth()->user()->role ?? 'wakasek kesiswaan';

    $bidang = [
        'wakasek kesiswaan' => [
            'nama' => 'Wakasek Kesiswaan',
            'kategori' => 'Kesiswaan',
            'dashboard' => 'wakasek.kesiswaan.dashboard',
            'rekap' => 'wakasek.kesiswaan.rekap',
            'monitoring' => 'wakasek.kesiswaan.monitoring',
            'profil' => 'profil_wakasek',
        ],
        'wakasek kurikulum' => [
            'nama' => 'Wakasek Kurikulum',
            'kategori' => 'Kurikulum',
            'dashboard' => 'wakasek.kurikulum.dashboard',
            'rekap' => 'wakasek.kurikulum.rekap',
            'monitoring' => 'wakasek.kurikulum.monitoring',
            'profil' => 'profil_wakasek',
        ],
        'wakasek sarana' => [
            'nama' => 'Wakasek Sarana',
            'kategori' => 'Sarana dan Prasarana',
            'dashboard' => 'wakasek.sarana.dashboard',
            'rekap' => 'wakasek.sarana.rekap',
            'monitoring' => 'wakasek.sarana.monitoring',
            'profil' => 'profil_wakasek',
        ],
        'wakasek dudi' => [
            'nama' => 'Wakasek DUDI',
            'kategori' => 'DUDI',
            'dashboard' => 'wakasek.dudi.dashboard',
            'rekap' => 'wakasek.dudi.rekap',
            'monitoring' => 'wakasek.dudi.monitoring',
            'profil' => 'profil_wakasek',
        ],
    ];

    $jabatan =$bidang[$role] ?? $bidang['wakasek kesiswaan'];
    $routeDashboard =$jabatan['dashboard'];
    $routeRekap =$jabatan['rekap'];
    $routeMonitoring = $jabatan['monitoring'];
    $routeProfil = $jabatan['profil'];

    $laporanSemua = [
        [
            'id' => 'LAP-001',
            'judul' => 'Perundungan Antar Siswa',
            'kategori' => 'Kesiswaan',
            'tanggal' => '2026-09-16',
            'status' => 'Diproses',
        ],
        [
            'id' => 'LAP-002',
            'judul' => 'Konflik Antar Siswa',
            'kategori' => 'Kesiswaan',
            'tanggal' => '2026-09-17',
            'status' => 'Pending',
        ],
        [
            'id' => 'LAP-003',
            'judul' => 'Pelanggaran Tata Tertib',
            'kategori' => 'Kesiswaan',
            'tanggal' => '2026-09-18',
            'status' => 'Selesai',
        ],
        [
            'id' => 'LAP-004',
            'judul' => 'Kendala Pelaksanaan Pembelajaran',
            'kategori' => 'Kurikulum',
            'tanggal' => '2026-09-15',
            'status' => 'Diproses',
        ],
        [
            'id' => 'LAP-005',
            'judul' => 'Masukan Jadwal Pelajaran',
            'kategori' => 'Kurikulum',
            'tanggal' => '2026-09-19',
            'status' => 'Selesai',
        ],
        [
            'id' => 'LAP-006',
            'judul' => 'Kerusakan Meja dan Kursi',
            'kategori' => 'Sarana dan Prasarana',
            'tanggal' => '2026-09-14',
            'status' => 'Pending',
        ],
        [
            'id' => 'LAP-007',
            'judul' => 'Fasilitas Kelas Perlu Perbaikan',
            'kategori' => 'Sarana dan Prasarana',
            'tanggal' => '2026-09-20',
            'status' => 'Ditolak',
        ],
        [
            'id' => 'LAP-008',
            'judul' => 'Masukan Kegiatan Praktik Industri',
            'kategori' => 'DUDI',
            'tanggal' => '2026-09-13',
            'status' => 'Diproses',
        ],
        [
            'id' => 'LAP-009',
            'judul' => 'Evaluasi Kerja Sama Industri',
            'kategori' => 'DUDI',
            'tanggal' => '2026-09-21',
            'status' => 'Pending',
        ],
    ];

    $laporan = array_values(array_filter($laporanSemua,
        fn ($item) => $item['kategori'] ===$jabatan['kategori']
    ));

    $jumlahStatus = [
        'Pending' => 0,
        'Diproses' => 0,
        'Selesai' => 0,
        'Ditolak' => 0,
    ];

    foreach ($laporan as$item) {
        if (isset($jumlahStatus[$item['status']])) {
            $jumlahStatus[$item['status']]++;
        }
    }

    $namaPengguna = auth()->user()->name ?? $jabatan['nama'];
@endphp

<!-- SIDEBAR SAMAKAN PERSIS DENGAN DASHBOARD -->
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
                <a href="{{ route($routeDashboard) }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item active">
                <a href="{{ route($routeRekap) }}">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Rekap</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route($routeMonitoring) }}">
                    <i class="fa-solid fa-eye"></i>
                    <span>Monitoring</span>
                </a>
            </li>

                <li class="nav-item">
                    <a href="{{ route('profil_wakasek') }}">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('wakasek.notifikasi') }}" class="nav-notification">
                        <i class="fa-solid fa-bell"></i>
                        <span>Notifikasi</span>
                        <span class="notification-dot"></span>
                    </a>
                </li>

        </ul>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </button>
    </form>
</aside>

<!-- MAIN WRAPPER BERADA DI SINI SAMA PERSIS DENGAN DASHBOARD -->
<div class="main-wrapper">

    <!-- TOPBAR SAMAKAN PERSIS DENGAN DASHBOARD -->
    <header class="topbar">
        <div class="topbar-icon" title="Notifikasi">
            <i class="fa-regular fa-bell"></i>
        </div>

        <div class="user-profile">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>

            <span class="user-name">
                {{ $namaPengguna }}
            </span>
        </div>
    </header>

    <main class="content">

        <div class="breadcrumb">
            Dashboard &nbsp; / &nbsp; <span>Rekap Laporan</span>
        </div>

        <h1 class="page-title">Rekap Laporan</h1>

        <p class="welcome-text">
            Pantau dan tinjau rekap pengaduan siswa bidang {{ $jabatan['kategori'] }}.
        </p>

        <!-- CARDS STATISTIK DISAMAKAN GAYA DASHBOARD -->
        <section class="stats-grid">
            <div class="stat-card total">
                <div class="stat-title">Total</div>
                <div class="stat-value">{{ count($laporan) }}</div>
            </div>

            <div class="stat-card diproses">
                <div class="stat-title">Diproses</div>
                <div class="stat-value">{{ $jumlahStatus['Diproses'] }}</div>
            </div>

            <div class="stat-card selesai">
                <div class="stat-title">Selesai</div>
                <div class="stat-value">{{ $jumlahStatus['Selesai'] }}</div>
            </div>

            <div class="stat-card ditolak">
                <div class="stat-title">Ditolak</div>
                <div class="stat-value">{{ $jumlahStatus['Ditolak'] }}</div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
                <h2>Daftar Rekap Laporan</h2>
                <p>
                    Gunakan pencarian dan filter untuk menemukan laporan
                    berdasarkan judul, status, atau periode.
                </p>
            </div>

            <div class="filters">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input
                        type="search"
                        id="searchInput"
                        class="control"
                        placeholder="Cari judul atau ID laporan..."
                        aria-label="Cari laporan"
                    >
                </div>

                <select id="statusFilter" class="control" aria-label="Filter status">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>

                <select id="periodFilter" class="control" aria-label="Filter periode">
                    <option value="">Semua Periode</option>
                    <option value="2026-09">September 2026</option>
                    <option value="2026-08">Agustus 2026</option>
                    <option value="2026-07">Juli 2026</option>
                </select>
            </div>

            <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Informasi Laporan</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody id="reportTable">
            @forelse ($laporan as $item)
                @php
                    $kelasStatus = [
                        'Pending' => 'badge-pending',
                        'Diproses' => 'badge-diproses',
                        'Selesai' => 'badge-selesai',
                        'Ditolak' => 'badge-ditolak',
                    ][$item['status']] ?? 'badge-pending';

                    $tanggalTampil = \Carbon\Carbon::parse(
                        $item['tanggal']
                    )->translatedFormat('d M Y');
                @endphp

                <tr
                    class="report-row"
                    data-search="{{ strtolower($item['judul'].' '.$item['id']) }}"
                    data-status="{{ $item['status'] }}"
                    data-date="{{ $item['tanggal'] }}"
                >
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <div class="report-title">
                            {{ $item['judul'] }}
                        </div>
                        <div class="report-id">
                            ID: {{ $item['id'] }}
                        </div>
                    </td>

                    <td>{{ $item['kategori'] }}</td>
                    <td>{{ $tanggalTampil }}</td>

                    <td>
                        <span class="status-badge {{ $kelasStatus }}">
                            {{ $item['status'] }}
                        </span>
                    </td>

                    <td>
                        <button
                            type="button"
                            class="btn-detail"
                            title="Detail laporan"
                            aria-label="Lihat detail {{ $item['judul'] }}"
                            onclick="showDetail('{{ $item['id'] }}', '{{ addslashes($item['judul']) }}', '{{ $item['status'] }}')"
                        >
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty-state">
                        Belum ada laporan pada kategori ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            <div id="noResults" class="empty-state" style="display:none">
                <i class="fa-solid fa-magnifying-glass"></i>
                Tidak ada laporan yang cocok dengan pencarian atau filter.
            </div>

            <div class="table-footer">
                <span id="resultCount">
                    Menampilkan {{ count($laporan) }} laporan
                </span>

                <button type="button" class="reset-button" onclick="resetFilters()">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset Filter
                </button>
            </div>
        </section>

    </main>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const periodFilter = document.getElementById('periodFilter');
    const rows = Array.from(document.querySelectorAll('.report-row'));

    function filterReports() {
        const keyword = searchInput.value.trim().toLowerCase();
        const selectedStatus = statusFilter.value;
        const selectedPeriod = periodFilter.value;
        let visibleCount = 0;

        rows.forEach((row) => {
            const searchText = row.dataset.search || '';
            const status = row.dataset.status || '';
            const date = row.dataset.date || '';

            const matchKeyword = searchText.includes(keyword);
            const matchStatus = !selectedStatus || status === selectedStatus;
            const matchPeriod = !selectedPeriod || date.startsWith(selectedPeriod);

            const visible = matchKeyword && matchStatus && matchPeriod;

            row.style.display = visible ? '' : 'none';

            if (visible) visibleCount++;
        });

        document.getElementById('noResults').style.display =
            visibleCount === 0 ? 'block' : 'none';

        document.getElementById('resultCount').textContent =
            `Menampilkan ${visibleCount} dari ${rows.length} laporan`;
    }

    searchInput.addEventListener('input', filterReports);
    statusFilter.addEventListener('change', filterReports);
    periodFilter.addEventListener('change', filterReports);

    function resetFilters() {
        searchInput.value = '';
        statusFilter.value = '';
        periodFilter.value = '';
        filterReports();
    }

    function showDetail(id, judul, status) {
        alert(
            'Detail Laporan (data sementara)\n\n' +
            'ID: ' + id + '\n' +
            'Judul: ' + judul + '\n' +
            'Status: ' + status +
            '\n\nHalaman detail laporan akan dihubungkan pada tahap berikutnya.'
        );
    }
</script>

</body>
</html>
