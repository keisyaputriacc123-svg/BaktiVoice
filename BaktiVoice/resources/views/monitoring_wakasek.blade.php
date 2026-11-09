<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Monitoring Wakasek</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select {
            font: inherit;
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

        /* MAIN WRAPPER & TOPBAR */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background: var(--background);
        }

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
            text-decoration: none;
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
        .main-content {
            padding: 36px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
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
            font-size: 15px;
            line-height: 1.6;
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

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: var(--radius);
            color: #3b62ac;
            background: #ffffff;
            border: 1px solid var(--border);
            font-size: 13px;
            font-weight: 700;
            box-shadow: var(--shadow);
            white-space: nowrap;
        }

        /* STATS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(123, 159, 232, 0.12);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eaf0ff;
            color: #3b62ac;
            font-size: 16px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: #1e3a70;
        }

        .stat-caption {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 6px;
        }

        /* CONTENT CARD & TABLE */
        .content-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 6px;
        }

        .card-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .result-count {
            background: #eaf0ff;
            color: #3b62ac;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: minmax(200px, 1.5fr) repeat(2, minmax(160px, 1fr)) auto;
            gap: 16px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            background: #fbfdff;
        }

        .search-wrap {
            position: relative;
        }

        .search-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
        }

        .filter-input {
            width: 100%;
            min-height: 42px;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px;
            background: white;
            color: var(--text-main);
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-wrap .filter-input {
            padding-left: 38px;
        }

        .filter-input:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        .reset-button {
            height: 42px;
            padding: 0 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--text-main);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .reset-button:hover {
            background: #f1f5f9;
        }

        .table-wrap {
            width: 100%;
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
            color: var(--text-muted);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid #f1f5f9;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .report-id {
            color: #3b62ac;
            font-weight: 700;
        }

        .report-title {
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 4px;
        }

        .report-description {
            font-size: 12px;
            color: var(--text-muted);
        }

        .date-text {
            color: var(--text-muted);
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-pending { background: #eaf0ff; color: #496cbd; }
        .status-diproses { background: #fef3c7; color: #b45309; }
        .status-selesai { background: #dcfce7; color: #15803d; }
        .status-ditolak { background: #fee2e2; color: #b91c1c; }

        .detail-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            background: #eaf0ff;
            color: #3b62ac;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid var(--border);
            transition: all 0.2s ease;
        }

        .detail-button:hover {
            background: #3b62ac;
            color: #ffffff;
        }

        .empty-state {
            display: none;
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            display: block;
            font-size: 30px;
            color: #94a3b8;
            margin-bottom: 12px;
        }

        @media (max-width: 1100px) {
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .filter-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 760px) {
            .sidebar { width: 70px; padding: 16px 8px; }
            .brand { justify-content: center; padding: 0 0 24px; }
            .brand-logo-img { width: 42px; height: 42px; }
            .brand-name, .nav-item span { display: none; }
            .nav-item a { justify-content: center; padding: 13px 8px; }
            .main-wrapper { margin-left: 70px; }
            .topbar { padding: 0 18px; }
            .main-content { padding: 22px 16px; }
            .user-name { display: none; }
            .page-heading { flex-direction: column; }
            .filter-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
  @php
    $role = strtolower(trim($role ?? auth()->user()->role ?? 'wakasek kesiswaan'));

    $bidangMap = [
        'wakasek kesiswaan' => [
            'nama' => 'Wakasek Kesiswaan',
            'kategori' => 'Kesiswaan',
            'dashboard' => 'wakasek.kesiswaan.dashboard',
            'rekap' => 'wakasek.kesiswaan.rekap',
            'monitoring' => 'wakasek.kesiswaan.monitoring',
        ],
        'wakasek kurikulum' => [
            'nama' => 'Wakasek Kurikulum',
            'kategori' => 'Kurikulum',
            'dashboard' => 'wakasek.kurikulum.dashboard',
            'rekap' => 'wakasek.kurikulum.rekap',
            'monitoring' => 'wakasek.kurikulum.monitoring',
        ],
        'wakasek sarana' => [
            'nama' => 'Wakasek Sarana',
            'kategori' => 'Sarana dan Prasarana',
            'dashboard' => 'wakasek.sarana.dashboard',
            'rekap' => 'wakasek.sarana.rekap',
            'monitoring' => 'wakasek.sarana.monitoring',
        ],
        'wakasek dudi' => [
            'nama' => 'Wakasek DUDI',
            'kategori' => 'DUDI',
            'dashboard' => 'wakasek.dudi.dashboard',
            'rekap' => 'wakasek.dudi.rekap',
            'monitoring' => 'wakasek.dudi.monitoring',
        ],
    ];

    $jabatan = $bidangMap[$role] ?? $bidangMap['wakasek kesiswaan'];

    // Definisikan variabel route secara eksplisit
    $targetDashboard  = $jabatan['dashboard'];
    $targetRekap      = $jabatan['rekap'];
    $targetMonitoring = $jabatan['monitoring'];

    $namaPengguna = $user->name ?? $jabatan['nama'];
@endphp

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route($targetDashboard) }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route($targetRekap) }}">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Rekap</span>
                </a>
            </li>

            <li class="nav-item active">
                <a href="{{ route($targetMonitoring) }}">
                    <i class="fa-solid fa-eye"></i>
                    <span>Monitoring</span>
                </a>
            </li>
        </ul>

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

    <div class="main-wrapper">

        <header class="topbar">
            <a href="{{ route('wakasek.notifikasi') }}" class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </a>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="user-name">
                    {{ $namaPengguna }}
                </span>
            </div>
        </header>

        <main class="main-content">
            <section class="page-heading">
                <div>
                    <div class="breadcrumb">Dashboard &nbsp; / &nbsp; <span>Monitoring</span></div>
                    <h1 class="page-title">Monitoring Laporan</h1>
                    <p class="page-description">
                        Pantau perkembangan laporan masuk pada bidang {{ $jabatan['kategori'] }}.
                    </p>
                </div>

                <div class="role-badge">
                    <i class="fa-solid fa-shield-halved"></i>
                    {{ $jabatan['nama'] }}
                </div>
            </section>

            <!-- STATISTIK DINAMIS DARI DATABASE -->
            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Laporan</span>
                        <div class="stat-icon"><i class="fa-regular fa-folder-open"></i></div>
                    </div>
                    <div class="stat-number">{{ $total ?? 0 }}</div>
                    <div class="stat-caption">Laporan pada bidang Anda</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Pending</span>
                        <div class="stat-icon"><i class="fa-regular fa-clock"></i></div>
                    </div>
                    <div class="stat-number">{{ $pending ?? 0 }}</div>
                    <div class="stat-caption">Menunggu tindak lanjut</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Diproses</span>
                        <div class="stat-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                    </div>
                    <div class="stat-number">{{ $diproses ?? 0 }}</div>
                    <div class="stat-caption">Sedang ditindaklanjuti</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Selesai</span>
                        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <div class="stat-number">{{ $selesai ?? 0 }}</div>
                    <div class="stat-caption">Telah ditindaklanjuti</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Ditolak</span>
                        <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
                    </div>
                    <div class="stat-number">{{ $ditolak ?? 0 }}</div>
                    <div class="stat-caption">Laporan ditolak</div>
                </div>
            </section>

            <section class="content-card">
                <div class="card-heading">
                    <div>
                        <h2 class="card-title">Daftar Monitoring</h2>
                        <p class="card-subtitle">
                            Daftar laporan untuk kategori {{ $jabatan['kategori'] }}. Gunakan filter untuk menemukan laporan.
                        </p>
                    </div>

                    <div class="result-count">
                        <i class="fa-solid fa-list-check"></i>
                        <span id="result-count">{{ count($laporanList ?? []) }}</span> laporan
                    </div>
                </div>

                <div class="filter-grid">
                    <div class="search-wrap">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input
                            type="text"
                            id="searchInput"
                            class="filter-input"
                            placeholder="Cari ID atau judul laporan..."
                        >
                    </div>

                    <select id="statusFilter" class="filter-input">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="ditolak">Ditolak</option>
                    </select>

                    <select id="periodFilter" class="filter-input">
                        <option value="">Semua Periode</option>
                        <option value="7">7 hari terakhir</option>
                        <option value="30">30 hari terakhir</option>
                        <option value="90">90 hari terakhir</option>
                    </select>

                    <button type="button" class="reset-button" id="resetFilter">
                        <i class="fa-solid fa-rotate-left"></i> Reset
                    </button>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>ID LAPORAN</th>
                                <th>INFORMASI LAPORAN</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody id="reportTable">
                            @forelse ($laporanList as $item)
                                @php
                                    $statusLower = strtolower($item->status ?? 'pending');
                                    $tanggalItem = $item->created_at ? $item->created_at->format('Y-m-d') : '';
                                    $tanggalTampil = $item->created_at ? $item->created_at->format('d M Y') : '-';
                                @endphp
                                <tr
                                    class="report-row"
                                    data-id="lap-{{ $item->id_laporan ?? $item->id }}"
                                    data-title="{{ strtolower($item->judul ?? $item->deskripsi ?? '') }}"
                                    data-status="{{ $statusLower }}"
                                    data-date="{{ $tanggalItem }}"
                                >
                                    <td>
                                        <span class="report-id">LAP-{{ $item->id_laporan ?? $item->id }}</span>
                                    </td>

                                    <td>
                                        <div class="report-title">{{ $item->judul ?? $item->deskripsi ?? 'Laporan Pengaduan' }}</div>
                                        <div class="report-description">
                                            {{ Str::limit($item->isi ?? $item->deskripsi ?? '', 60) }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="date-text">
                                            {{ $tanggalTampil }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status status-{{ $statusLower }}">
                                            {{ ucfirst($item->status ?? 'Pending') }}
                                        </span>
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('wakasek.laporan.detail', $item->id_laporan ?? $item->id) }}"
                                            class="detail-button"
                                        >
                                            <i class="fa-regular fa-eye"></i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    <div class="empty-state" id="emptyState" style="{{ count($laporanList ?? []) == 0 ? 'display: block;' : 'display: none;' }}">
                        <i class="fa-regular fa-folder-open"></i>
                        <p>Tidak ada laporan yang ditemukan.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- SCRIPT FILTER & PENCARIAN INTERAKTIF -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const periodFilter = document.getElementById('periodFilter');
        const resetButton = document.getElementById('resetFilter');
        const rows = Array.from(document.querySelectorAll('.report-row'));
        const emptyState = document.getElementById('emptyState');
        const resultCount = document.getElementById('result-count');

        function filterTable() {
            const keyword = searchInput.value.toLowerCase().trim();
            const statusVal = statusFilter.value.toLowerCase();
            const periodVal = periodFilter.value;
            let visibleCount = 0;

            const now = new Date();

            rows.forEach(row => {
                const idText = row.dataset.id || '';
                const titleText = row.dataset.title || '';
                const rowStatus = row.dataset.status || '';
                const rowDateStr = row.dataset.date || '';

                const matchKeyword = idText.includes(keyword) || titleText.includes(keyword);
                const matchStatus = !statusVal || rowStatus === statusVal;

                let matchPeriod = true;
                if (periodVal && rowDateStr) {
                    const rowDate = new Date(rowDateStr);
                    const diffTime = Math.abs(now - rowDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    matchPeriod = diffDays <= parseInt(periodVal);
                }

                const isVisible = matchKeyword && matchStatus && matchPeriod;
                row.style.display = isVisible ? '' : 'none';

                if (isVisible) visibleCount++;
            });

            resultCount.textContent = visibleCount;
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        periodFilter.addEventListener('change', filterTable);

        resetButton.addEventListener('click', function() {
            searchInput.value = '';
            statusFilter.value = '';
            periodFilter.value = '';
            filterTable();
        });
    </script>
</body>
</html>
