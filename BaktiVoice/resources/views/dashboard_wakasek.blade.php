```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Dashboard Wakasek</title>

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

        .sidebar {
            width: var(--sidebar-width);
            background: var(--card-bg);
            border-right: 1px solid var(--border);
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 28px;
        }

        .brand-logo-img {
            width: 52px;
            height: 52px;
            object-fit: contain;
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
            gap: 12px;
            padding: 12px 16px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: .2s;
        }

        .nav-item a:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active a {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            color: #ef4444;
            background: transparent;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
        }

        .logout-btn:hover {
            background: #fef2f2;
        }

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .topbar {
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            padding: 0 36px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-icon {
            color: var(--text-muted);
            font-size: 18px;
            padding: 8px;
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
        }

        .content {
            padding: 36px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .welcome-text {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 28px;
            line-height: 1.7;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,.04);
        }

        .stat-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: 800;
        }

        .total .stat-value { color: #1e293b; }
        .diproses .stat-value { color: #d97706; }
        .selesai .stat-value { color: #16a34a; }
        .ditolak .stat-value { color: #dc2626; }

        .section {
            margin-bottom: 36px;
        }

        .section-header {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 28px;
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
        }

        .category-item {
            display: grid;
            grid-template-columns: 100px minmax(50px, 1fr) 24px;
            align-items: center;
            gap: 12px;
            font-size: 13px;
        }

        .category-name {
            color: var(--text-muted);
        }

        .bar-track {
            height: 9px;
            background: #edf1f8;
            border-radius: 20px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 20px;
        }

        .category-count {
            font-weight: 700;
            text-align: right;
        }

        .report-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .report-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px 20px;
            transition: border-color .2s;
        }

        .report-card:hover {
            border-color: #cbd5e1;
        }

        .report-info {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
        }

        .report-thumbnail {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            background: #f1f5f9;
            border: 1px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
        }

        .report-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 6px;
            overflow-wrap: anywhere;
        }

        .report-date {
            font-size: 12px;
            color: var(--text-muted);
        }

        .report-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
        }

        .status-badge {
            padding: 6px 12px;
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
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 7px;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            text-decoration: none;
        }

        .btn-detail:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .empty-state {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            color: var(--text-muted);
            text-align: center;
        }

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
            .category-grid { grid-template-columns: 1fr; padding: 18px; }
            .category-item { grid-template-columns: 95px minmax(30px, 1fr) 20px; }
            .report-card { padding: 14px; }
            .report-info { gap: 10px; }
            .report-thumbnail { width: 38px; height: 38px; }
            .report-actions { gap: 4px; }
            .status-badge { padding: 5px 8px; }
        }

        @media (max-width: 420px) {
            .stats-grid { gap: 10px; }
            .stat-card { padding: 16px 8px; }
            .stat-value { font-size: 25px; }
            .stat-title { font-size: 10px; }
            .user-name { font-size: 12px; }
            .report-title { font-size: 12px; }
            .report-date { font-size: 11px; }
        }

        .badge-pending {
    background-color: #e2e8f0;
    color: #475569;
}
    </style>
</head>

<body>

    @php
        /*
         * Data contoh untuk pengerjaan tampilan.
         * Nantinya diganti dengan data dari controller dan database.
         */
        $role = auth()->user()->role ?? 'wakasek kesiswaan';

        $bidang = [
            'wakasek kesiswaan' => [
                'nama' => 'Wakasek Kesiswaan',
                'kategori' => 'Kesiswaan',
            ],
            'wakasek kurikulum' => [
                'nama' => 'Wakasek Kurikulum',
                'kategori' => 'Kurikulum',
            ],
            'wakasek sarana' => [
                'nama' => 'Wakasek Sarana',
                'kategori' => 'Sarana dan Prasarana',
            ],
            'wakasek dudi' => [
                'nama' => 'Wakasek DUDI',
                'kategori' => 'DUDI',
            ],
        ];

        $jabatan = $bidang[$role] ?? [
            'nama' => 'Wakasek',
            'kategori' => 'Kesiswaan',
        ];

        $laporanContoh = [
            [
                'judul' => 'Laporan Menunggu Pemeriksaan',
                'tanggal' => '17 Sep 2026',
                'status' => 'Pending',
                'kelas' => 'badge-pending',
],
            [
                'judul' => 'Perundungan Antar Siswa',
                'tanggal' => '16 Sep 2026',
                'status' => 'Diproses',
                'kelas' => 'badge-diproses',
            ],
            [
                'judul' => 'Konflik Antar Siswa',
                'tanggal' => '12 Sep 2026',
                'status' => 'Selesai',
                'kelas' => 'badge-selesai',
            ],
            [
                'judul' => 'Kendala Kegiatan Sekolah',
                'tanggal' => '9 Sep 2026',
                'status' => 'Ditolak',
                'kelas' => 'badge-ditolak',
            ],
        ];

        $rekapContoh = [
            ['nama' => 'Fasilitas', 'jumlah' => 8],
            ['nama' => 'Keamanan', 'jumlah' => 6],
            ['nama' => 'Kebersihan', 'jumlah' => 7],
            ['nama' => 'Saran', 'jumlah' => 9],
        ];
    @endphp

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
                <li class="nav-item active">
                    <a href="{{ url('/dashboard/wakasek') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Rekap</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <i class="fa-solid fa-eye"></i>
                        <span>Monitoring</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <i class="fa-regular fa-user"></i>
                        <span>Profil</span>
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
            <div class="topbar-icon" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </div>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>

                <span class="user-name">
                    {{ $jabatan['nama'] }}
                </span>
            </div>
        </header>

        <main class="content">

            <h1 class="page-title">Dashboard</h1>

            <p class="welcome-text">
                Selamat datang, {{ $jabatan['nama'] }}!<br>
                Pantau rekap laporan pengaduan siswa bidang
                {{ $jabatan['kategori'] }}.
            </p>

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
                    <div class="stat-value">9</div>
                </div>

                <div class="stat-card ditolak">
                    <div class="stat-title">Ditolak</div>
                    <div class="stat-value">3</div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-header">Rekap Laporan per Kategori</h2>

                <div class="category-grid">
                    @foreach ($rekapContoh as $kategori)
                        <div class="category-item">
                            <span class="category-name">
                                {{ $kategori['nama'] }}
                            </span>

                            <div class="bar-track">
                                <div
                                    class="bar-fill"
                                    style="width: {{ ($kategori['jumlah'] / 10) * 100 }}%"
                                ></div>
                            </div>

                            <span class="category-count">
                                {{ $kategori['jumlah'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="section">
                <h2 class="section-header">Laporan Terbaru</h2>

                <div class="report-list">
                    @forelse ($laporanContoh as $laporan)
                        <article class="report-card">
                            <div class="report-info">
                                <div class="report-thumbnail">
                                    <i class="fa-regular fa-image"></i>
                                </div>

                                <div>
                                    <div class="report-title">
                                        {{ $laporan['judul'] }}
                                    </div>

                                    <div class="report-date">
                                        {{ $laporan['tanggal'] }}
                                    </div>
                                </div>
                            </div>

                            <div class="report-actions">
                                <span class="status-badge {{ $laporan['kelas'] }}">
                                    {{ $laporan['status'] }}
                                </span>

                                <button
                                    type="button"
                                    class="btn-detail"
                                    title="Detail laporan"
                                    onclick="alert('Halaman detail laporan akan dibuat pada tahap berikutnya.')"
                                >
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">
                            Belum ada laporan.
                        </div>
                    @endforelse
                </div>
            </section>

        </main>
    </div>

</body>
</html>
```
