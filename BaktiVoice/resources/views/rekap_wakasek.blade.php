
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Rekap Laporan Wakasek</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --primary-dark: #496cbd;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #334155;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text-main);
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input, select {
            font: inherit;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid var(--border);
            padding: 24px 16px;
            z-index: 20;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px 30px;
            color: var(--primary-dark);
            font-size: 19px;
            font-weight: 700;
        }

        .brand img {
            width: 38px;
            height: 38px;
            object-fit: contain;
        }

        .menu-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            border-radius: 9px;
            color: var(--text-muted);
            font-weight: 500;
            transition: .2s;
        }

        .nav-link i {
            width: 19px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #edf2ff;
            color: var(--primary-dark);
        }

        .nav-link.active {
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 15px;
        }

        .logout-button {
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            z-index: 10;
        }

        .topbar-title {
            font-size: 14px;
            color: var(--text-muted);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            font-size: 19px;
            color: var(--text-muted);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #edf2ff;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-name {
            font-weight: 600;
            font-size: 13px;
        }

        .user-role {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: calc(var(--topbar-height) + 30px) 32px 40px;
        }

        .breadcrumb {
            color: var(--text-muted);
            font-size: 12px;
            margin-bottom: 18px;
        }

        .breadcrumb span {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            font-size: 24px;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: var(--text-muted);
            line-height: 1.6;
        }

        .category-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #edf2ff;
            color: var(--primary-dark);
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px;
            min-width: 0;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 18px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 500;
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf2ff;
            color: var(--primary-dark);
        }

        .stat-number {
            font-size: 27px;
            font-weight: 700;
            color: #1e293b;
        }

        .stat-note {
            color: var(--text-muted);
            font-size: 11px;
            margin-top: 7px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .panel-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
        }

        .panel-header h2 {
            font-size: 16px;
            margin-bottom: 6px;
        }

        .panel-header p {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .filters {
            display: grid;
            grid-template-columns: minmax(200px, 1fr) 180px 180px;
            gap: 12px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .control {
            width: 100%;
            min-height: 42px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--text-main);
            padding: 10px 12px;
            outline: none;
        }

        .search-box .control {
            padding-left: 38px;
        }

        .control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px #96ace020;
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
            background: #f8fafc;
        }

        th {
            padding: 14px 20px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .4px;
            color: var(--text-muted);
            font-weight: 700;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #f1f5f9;
            font-size: 12px;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .report-title {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 5px;
        }

        .report-id {
            color: #94a3b8;
            font-size: 11px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
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

        .badge-pending {
            background: #f1f5f9;
            color: #475569;
        }

        .badge-diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .badge-ditolak {
            background: #fee2e2;
            color: #b91c1c;
        }

        .detail-button {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid var(--border);
            color: var(--primary-dark);
            border-radius: 8px;
            cursor: pointer;
        }

        .detail-button:hover {
            background: #edf2ff;
        }

        .empty-state {
            text-align: center;
            padding: 38px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            display: block;
            font-size: 28px;
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
        }

        .reset-button {
            border: 1px solid var(--border);
            background: white;
            color: var(--text-main);
            border-radius: 8px;
            padding: 9px 12px;
            cursor: pointer;
        }

        .reset-button:hover {
            background: #f8fafc;
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            :root {
                --sidebar-width: 76px;
            }

            .sidebar {
                padding: 22px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 30px;
            }

            .brand img {
                width: 38px;
            }

            .brand span,
            .menu-label,
            .nav-link span,
            .sidebar-bottom .nav-link span {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 14px 8px;
            }

            .nav-link i {
                font-size: 18px;
            }

            .main-content {
                padding-left: 22px;
                padding-right: 22px;
            }

            .topbar {
                padding: 0 22px;
            }
        }

        @media (max-width: 600px) {
            .main-content {
                padding: calc(var(--topbar-height) + 22px) 14px 28px;
            }

            .topbar {
                padding: 0 14px;
            }

            .topbar-title {
                font-size: 12px;
            }

            .user-name {
                max-width: 110px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .page-heading {
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 21px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .stat-card {
                padding: 14px;
            }

            .stat-number {
                font-size: 23px;
            }

            .filters {
                grid-template-columns: 1fr;
                padding: 16px;
            }

            .panel-header {
                padding: 18px 16px;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
                padding: 16px;
            }
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
        ],
        'wakasek kurikulum' => [
            'nama' => 'Wakasek Kurikulum',
            'kategori' => 'Kurikulum',
            'dashboard' => 'wakasek.kurikulum.dashboard',
            'rekap' => 'wakasek.kurikulum.rekap',
        ],
        'wakasek sarana' => [
            'nama' => 'Wakasek Sarana',
            'kategori' => 'Sarana dan Prasarana',
            'dashboard' => 'wakasek.sarana.dashboard',
            'rekap' => 'wakasek.sarana.rekap',
        ],
        'wakasek dudi' => [
            'nama' => 'Wakasek DUDI',
            'kategori' => 'DUDI',
            'dashboard' => 'wakasek.dudi.dashboard',
            'rekap' => 'wakasek.dudi.rekap',
        ],
    ];

    $jabatan = $bidang[$role] ?? $bidang['wakasek kesiswaan'];

    // DATA DUMMY UNTUK TAMPILAN SEMENTARA
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

    // Tampilkan hanya laporan bidang Wakasek yang sedang login.
    $laporan = array_values(array_filter(
        $laporanSemua,
        fn ($item) => $item['kategori'] === $jabatan['kategori']
    ));

    $jumlahStatus = [
        'Pending' => 0,
        'Diproses' => 0,
        'Selesai' => 0,
        'Ditolak' => 0,
    ];

    foreach ($laporan as $item) {
        if (isset($jumlahStatus[$item['status']])) {
            $jumlahStatus[$item['status']]++;
        }
    }

    $namaPengguna = auth()->user()->name ?? $jabatan['nama'];
@endphp

<aside class="sidebar">
    <a href="{{ route($jabatan['wakasek.kesiswaan.dashboard']) }}" class="brand">
        <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice">
        <span>BaktiVoice</span>
    </a>

    <div class="menu-label">MENU UTAMA</div>

    <nav class="nav-menu">
        <a href="{{ route($jabatan['wakasek.kesiswaan.dashboard']) }}" class="nav-link">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route($jabatan['wakasek.kesiswaan.rekap']) }}" class="nav-link active">
            <i class="fa-solid fa-chart-column"></i>
            <span>Rekap Laporan</span>
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Monitoring</span>
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link logout-button">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<header class="topbar">
    <div class="topbar-title">Panel {{ $jabatan['nama'] }}</div>

    <div class="topbar-right">
        <a href="#" class="notification" title="Notifikasi">
            <i class="fa-regular fa-bell"></i>
        </a>

        <div class="user-info">
            <div class="avatar">
                {{ strtoupper(substr($namaPengguna, 0, 1)) }}
            </div>

            <div>
                <div class="user-name">{{ $namaPengguna }}</div>
                <div class="user-role">{{ $jabatan['nama'] }}</div>
            </div>
        </div>
    </div>
</header>

<main class="main-content">

    <div class="breadcrumb">
        Dashboard &nbsp; / &nbsp; <span>Rekap Laporan</span>
    </div>

    <section class="page-heading">
        <div>
            <h1>Rekap Laporan</h1>
            <p>
                Pantau dan tinjau rekap pengaduan siswa bidang
                {{ $jabatan['kategori'] }}.
            </p>
        </div>

        <div class="category-chip">
            <i class="fa-solid fa-folder-open"></i>
            {{ $jabatan['kategori'] }}
        </div>
    </section>

    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Laporan</span>
                <span class="stat-icon"><i class="fa-solid fa-file-lines"></i></span>
            </div>
            <div class="stat-number">{{ count($laporan) }}</div>
            <div class="stat-note">Laporan bidang {{ $jabatan['kategori'] }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Pending</span>
                <span class="stat-icon"><i class="fa-regular fa-clock"></i></span>
            </div>
            <div class="stat-number">{{ $jumlahStatus['Pending'] }}</div>
            <div class="stat-note">Menunggu pemeriksaan</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Diproses</span>
                <span class="stat-icon"><i class="fa-solid fa-spinner"></i></span>
            </div>
            <div class="stat-number">{{ $jumlahStatus['Diproses'] }}</div>
            <div class="stat-note">Sedang ditindaklanjuti</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Selesai</span>
                <span class="stat-icon"><i class="fa-solid fa-circle-check"></i></span>
            </div>
            <div class="stat-number">{{ $jumlahStatus['Selesai'] }}</div>
            <div class="stat-note">Sudah ditangani</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Ditolak</span>
                <span class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></span>
            </div>
            <div class="stat-number">{{ $jumlahStatus['Ditolak'] }}</div>
            <div class="stat-note">Laporan ditolak</div>
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
                                <span class="status {{ $kelasStatus }}">
                                    {{ $item['status'] }}
                                </span>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="detail-button"
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
