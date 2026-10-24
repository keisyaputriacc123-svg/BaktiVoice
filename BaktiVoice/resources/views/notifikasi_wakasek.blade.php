<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Notifikasi Wakasek</title>

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

        a {
            text-decoration: none;
            color: inherit;
        }

        /* SIDEBAR PERSIS DASHBOARD WAKASEK */
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

        /* LOGOUT BUTTON PERSIS DASHBOARD WAKASEK */
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
        .main {
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

        /* STYLE KONTEN NOTIFIKASI */
        .content {
            padding: 30px 32px;
            max-width: 1400px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .page-heading p {
            font-size: 14px;
            line-height: 1.7;
            color: var(--text-muted);
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

        .summary-card {
            background: linear-gradient(120deg, #7898df, #a8bdec);
            border-radius: 18px;
            padding: 22px 25px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
            box-shadow: 0 8px 20px rgba(96, 127, 195, .14);
        }

        .summary-card h2 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .summary-card p {
            font-size: 12px;
            line-height: 1.8;
            opacity: .9;
            max-width: 520px;
        }

        .summary-icon {
            width: 58px;
            height: 58px;
            border-radius: 17px;
            background: rgba(255, 255, 255, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            flex-shrink: 0;
        }

        .notification-panel {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            padding-bottom: 20px;
            border-bottom: 1px solid #edf1f8;
        }

        .panel-heading h2 {
            font-size: 16px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 6px;
        }

        .panel-heading p {
            font-size: 12px;
            color: var(--text-muted);
        }

        .mark-all-btn {
            border: 1px solid #dce6fa;
            background: #f4f7ff;
            color: #496cbd;
            border-radius: 10px;
            padding: 10px 13px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .mark-all-btn:hover {
            background: #e8efff;
        }

        .filters {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            padding: 20px 0;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border: 1px solid #e7edf8;
            background: #fff;
            color: #8290aa;
            border-radius: 10px;
            padding: 10px 14px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .filter-btn:hover {
            background: #f5f7ff;
            color: #496cbd;
        }

        .filter-btn.active {
            background: #eaf0ff;
            border-color: #d6e2ff;
            color: #496cbd;
        }

        .filter-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ef7777;
            display: inline-block;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
        }

        .notification-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px 15px;
            border-bottom: 1px solid #f0f3f9;
            border-radius: 12px;
            transition: .2s;
        }

        .notification-card:last-child {
            border-bottom: none;
        }

        .notification-card:hover {
            background: #f9fbff;
        }

        .notification-card.unread {
            background: #f7f9ff;
        }

        .notification-card[hidden] {
            display: none !important;
        }

        .notif-icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }

        .icon-laporan { color: #547bd0; background: #eaf0ff; }
        .icon-status { color: #b78636; background: #fff5df; }
        .icon-tanggapan { color: #7b69c7; background: #f0edff; }
        .icon-tindak-lanjut { color: #429b83; background: #e4f8f0; }

        .notif-body {
            flex: 1;
            min-width: 0;
        }

        .notif-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .notif-title {
            color: #1e3a70;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.7;
        }

        .notif-message {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.8;
            margin-top: 5px;
        }

        .notif-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            font-size: 11px;
            color: #9aa7bc;
        }

        .notif-meta i {
            margin-right: 4px;
        }

        .type-label {
            display: inline-block;
            padding: 5px 8px;
            background: #f0f4ff;
            color: #6683c6;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #6e91e1;
            flex-shrink: 0;
            margin-top: 6px;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: var(--text-muted);
            display: none;
        }

        .empty-state i {
            font-size: 35px;
            color: #b9c9ed;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            color: #1e3a70;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 12px;
            line-height: 1.7;
        }

        .footer-note {
            text-align: center;
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 20px;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            .sidebar { width: 70px; padding: 16px 8px; }
            .brand { justify-content: center; padding: 0 0 24px; }
            .brand-logo-img { width: 42px; height: 42px; }
            .brand-name, .nav-item span { display: none; }
            .nav-item a { justify-content: center; padding: 13px 8px; }
            .main { margin-left: 70px; }
            .topbar { padding: 0 18px; }
            .user-name { display: none; }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $role = $user->role ?? 'wakasek kesiswaan';

    $bidang = [
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
            'nama' => 'Wakasek Sarana dan Prasarana',
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

    abort_unless(isset($bidang[$role]), 403);

    $jabatan = $bidang[$role];

    $routeDashboard = $jabatan['dashboard'];
    $routeRekap = $jabatan['rekap'];
    $routeMonitoring = $jabatan['monitoring'];
    $routeProfil = 'profil_wakasek';

    $semuaNotifikasi = [
        [
            'id' => 1,
            'kategori' => 'Kesiswaan',
            'type' => 'laporan',
            'icon' => 'fa-file-circle-plus',
            'judul' => 'Laporan baru diterima',
            'pesan' => 'Ada laporan baru terkait kedisiplinan siswa yang perlu ditinjau.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Baru saja',
            'unread' => true,
        ],
        [
            'id' => 2,
            'kategori' => 'Kesiswaan',
            'type' => 'status',
            'icon' => 'fa-arrows-rotate',
            'judul' => 'Pembaruan status laporan',
            'pesan' => 'Status salah satu laporan Kesiswaan telah diperbarui menjadi Diproses.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => '1 jam yang lalu',
            'unread' => true,
        ],
        [
            'id' => 3,
            'kategori' => 'Kesiswaan',
            'type' => 'tanggapan',
            'icon' => 'fa-comments',
            'judul' => 'Tanggapan baru tersedia',
            'pesan' => 'Guru BK atau Admin Sekolah telah memberikan tanggapan pada laporan.',
            'pengirim' => 'Guru BK',
            'waktu' => 'Hari ini',
            'unread' => false,
        ],
        [
            'id' => 4,
            'kategori' => 'Kesiswaan',
            'type' => 'tindak-lanjut',
            'icon' => 'fa-clipboard-check',
            'judul' => 'Tindak lanjut laporan',
            'pesan' => 'Ada laporan yang memerlukan tindak lanjut dari bidang Kesiswaan.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Hari ini',
            'unread' => true,
        ],

        [
            'id' => 5,
            'kategori' => 'Kurikulum',
            'type' => 'laporan',
            'icon' => 'fa-file-circle-plus',
            'judul' => 'Laporan baru diterima',
            'pesan' => 'Ada laporan baru yang berkaitan dengan kegiatan pembelajaran.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Baru saja',
            'unread' => true,
        ],
        [
            'id' => 6,
            'kategori' => 'Kurikulum',
            'type' => 'status',
            'icon' => 'fa-arrows-rotate',
            'judul' => 'Pembaruan status laporan',
            'pesan' => 'Status laporan bidang Kurikulum telah diperbarui.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => '1 jam yang lalu',
            'unread' => true,
        ],
        [
            'id' => 7,
            'kategori' => 'Kurikulum',
            'type' => 'tanggapan',
            'icon' => 'fa-comments',
            'judul' => 'Tanggapan baru tersedia',
            'pesan' => 'Terdapat tanggapan baru dari Admin Sekolah pada laporan terkait.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => 'Hari ini',
            'unread' => false,
        ],
        [
            'id' => 8,
            'kategori' => 'Kurikulum',
            'type' => 'tindak-lanjut',
            'icon' => 'fa-clipboard-check',
            'judul' => 'Tindak lanjut laporan',
            'pesan' => 'Ada laporan Kurikulum yang perlu ditinjau lebih lanjut.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Hari ini',
            'unread' => true,
        ],

        [
            'id' => 9,
            'kategori' => 'Sarana dan Prasarana',
            'type' => 'laporan',
            'icon' => 'fa-file-circle-plus',
            'judul' => 'Laporan baru diterima',
            'pesan' => 'Ada laporan baru mengenai fasilitas atau sarana sekolah.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Baru saja',
            'unread' => true,
        ],
        [
            'id' => 10,
            'kategori' => 'Sarana dan Prasarana',
            'type' => 'status',
            'icon' => 'fa-arrows-rotate',
            'judul' => 'Pembaruan status laporan',
            'pesan' => 'Status laporan fasilitas sekolah telah mengalami perubahan.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => '1 jam yang lalu',
            'unread' => true,
        ],
        [
            'id' => 11,
            'kategori' => 'Sarana dan Prasarana',
            'type' => 'tanggapan',
            'icon' => 'fa-comments',
            'judul' => 'Tanggapan baru tersedia',
            'pesan' => 'Admin Sekolah telah memberikan tanggapan terhadap laporan sarana.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => 'Hari ini',
            'unread' => false,
        ],
        [
            'id' => 12,
            'kategori' => 'Sarana dan Prasarana',
            'type' => 'tindak-lanjut',
            'icon' => 'fa-clipboard-check',
            'judul' => 'Tindak lanjut laporan',
            'pesan' => 'Ada laporan fasilitas yang membutuhkan tindak lanjut.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Hari ini',
            'unread' => true,
        ],

        [
            'id' => 13,
            'kategori' => 'DUDI',
            'type' => 'laporan',
            'icon' => 'fa-file-circle-plus',
            'judul' => 'Laporan baru diterima',
            'pesan' => 'Ada laporan baru yang berkaitan dengan bidang DUDI atau kerja sama industri.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Baru saja',
            'unread' => true,
        ],
        [
            'id' => 14,
            'kategori' => 'DUDI',
            'type' => 'status',
            'icon' => 'fa-arrows-rotate',
            'judul' => 'Pembaruan status laporan',
            'pesan' => 'Status laporan bidang DUDI telah diperbarui.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => '1 jam yang lalu',
            'unread' => true,
        ],
        [
            'id' => 15,
            'kategori' => 'DUDI',
            'type' => 'tanggapan',
            'icon' => 'fa-comments',
            'judul' => 'Tanggapan baru tersedia',
            'pesan' => 'Ada tanggapan baru dari Admin Sekolah pada laporan DUDI.',
            'pengirim' => 'Admin Sekolah',
            'waktu' => 'Hari ini',
            'unread' => false,
        ],
        [
            'id' => 16,
            'kategori' => 'DUDI',
            'type' => 'tindak-lanjut',
            'icon' => 'fa-clipboard-check',
            'judul' => 'Tindak lanjut laporan',
            'pesan' => 'Ada laporan DUDI yang membutuhkan tindak lanjut.',
            'pengirim' => 'Sistem BaktiVoice',
            'waktu' => 'Hari ini',
            'unread' => true,
        ],
    ];

    $notifikasiBidang = array_values(array_filter(
        $semuaNotifikasi,
        fn ($item) => $item['kategori'] === $jabatan['kategori']
    ));
@endphp

<!-- SIDEBAR DISAMAKAN DENGAN DASHBOARD WAKASEK -->
<aside class="sidebar">
    <div>
        <div class="brand">
            <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
            <span class="brand-name">BaktiVoice</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route($routeDashboard) }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
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
                <a href="{{ route($routeProfil) }}">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="nav-item active">
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

<div class="main">
    <!-- TOPBAR DISAMAKAN DENGAN DASHBOARD WAKASEK -->
    <header class="topbar">
        <a href="{{ route('wakasek.notifikasi') }}" class="topbar-icon" title="Notifikasi">
            <i class="fa-regular fa-bell"></i>
        </a>

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
        <div class="page-heading">
            <div>
                <h1>Notifikasi</h1>
                <p>
                    Pantau laporan baru, pembaruan status, tanggapan, dan tindak lanjut
                    untuk bidang {{ $jabatan['kategori'] }}.
                </p>
            </div>

            <div class="role-badge">
                <i class="fa-solid fa-shield-halved"></i>
                {{ $jabatan['nama'] }}
            </div>
        </div>

        <section class="summary-card">
            <div>
                <h2>Halo, {{ $user->name ?? 'Wakasek' }}!</h2>
                <p>
                    Berikut informasi aktivitas laporan pada bidang
                    {{ $jabatan['kategori'] }}. Periksa notifikasi secara berkala
                    agar tidak melewatkan pembaruan penting.
                </p>
            </div>

            <div class="summary-icon">
                <i class="fa-solid fa-bell"></i>
            </div>
        </section>

        <section class="notification-panel">
            <div class="panel-heading">
                <div>
                    <h2>Aktivitas Terbaru</h2>
                    <p>Notifikasi laporan untuk bidang {{ $jabatan['kategori'] }}</p>
                </div>

                <button type="button" class="mark-all-btn" id="markAllRead">
                    <i class="fa-solid fa-check-double"></i>
                    Tandai semua dibaca
                </button>
            </div>

            <div class="filters" id="notificationFilters">
                <button type="button" class="filter-btn active" data-filter="semua">
                    Semua
                    <span class="filter-dot" id="allUnreadDot"></span>
                </button>

                <button type="button" class="filter-btn" data-filter="belum">
                    Belum Dibaca
                </button>

                <button type="button" class="filter-btn" data-filter="laporan">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    Laporan Baru
                </button>

                <button type="button" class="filter-btn" data-filter="status">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Pembaruan Status
                </button>

                <button type="button" class="filter-btn" data-filter="tanggapan">
                    <i class="fa-solid fa-comments"></i>
                    Tanggapan
                </button>

                <button type="button" class="filter-btn" data-filter="tindak-lanjut">
                    <i class="fa-solid fa-clipboard-check"></i>
                    Tindak Lanjut
                </button>
            </div>

            <div class="notification-list" id="notificationList">
                @forelse ($notifikasiBidang as $notif)
                    <article
                        class="notification-card {{ $notif['unread'] ? 'unread' : '' }}"
                        data-type="{{ $notif['type'] }}"
                        data-unread="{{ $notif['unread'] ? '1' : '0' }}"
                        data-id="{{ $notif['id'] }}"
                    >
                        <div class="notif-icon icon-{{ $notif['type'] }}">
                            <i class="fa-solid {{ $notif['icon'] }}"></i>
                        </div>

                        <div class="notif-body">
                            <div class="notif-title-row">
                                <div class="notif-title">{{ $notif['judul'] }}</div>

                                @if ($notif['unread'])
                                    <span class="unread-dot" title="Belum dibaca"></span>
                                @endif
                            </div>

                            <p class="notif-message">{{ $notif['pesan'] }}</p>

                            <div class="notif-meta">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                    {{ $notif['pengirim'] }}
                                </span>

                                <span>
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $notif['waktu'] }}
                                </span>

                                <span class="type-label">
                                    @switch($notif['type'])
                                        @case('laporan')
                                            Laporan Baru
                                            @break
                                        @case('status')
                                            Pembaruan Status
                                            @break
                                        @case('tanggapan')
                                            Tanggapan
                                            @break
                                        @case('tindak-lanjut')
                                            Tindak Lanjut
                                            @break
                                    @endswitch
                                </span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state" style="display:block">
                        <i class="fa-regular fa-bell-slash"></i>
                        <h3>Belum ada notifikasi</h3>
                        <p>Notifikasi untuk bidangmu akan ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>

            <div class="empty-state" id="emptyState">
                <i class="fa-regular fa-bell-slash"></i>
                <h3>Tidak ada notifikasi</h3>
                <p>Tidak ditemukan notifikasi yang sesuai dengan filter ini.</p>
            </div>
        </section>

        <p class="footer-note">
            <i class="fa-solid fa-circle-info"></i>
            Notifikasi yang ditampilkan saat ini merupakan data contoh untuk tampilan.
        </p>
    </main>
</div>

<script>
    const filterButtons = document.querySelectorAll('.filter-btn');
    const notificationCards = document.querySelectorAll('.notification-card');
    const emptyState = document.getElementById('emptyState');
    const markAllReadButton = document.getElementById('markAllRead');
    const allUnreadDot = document.getElementById('allUnreadDot');
    const bellDot = document.getElementById('bellDot');

    let activeFilter = 'semua';

    function updateUnreadIndicators() {
        const unreadExists = Array.from(notificationCards).some(card => {
            return card.dataset.unread === '1';
        });

        if (allUnreadDot) {
            allUnreadDot.style.display = unreadExists ? 'inline-block' : 'none';
        }

        if (bellDot) {
            bellDot.style.display = unreadExists ? 'block' : 'none';
        }
    }

    function applyFilter(filter) {
        activeFilter = filter;
        let visibleCount = 0;

        notificationCards.forEach(card => {
            const type = card.dataset.type;
            const isUnread = card.dataset.unread === '1';

            let show = false;

            if (filter === 'semua') {
                show = true;
            } else if (filter === 'belum') {
                show = isUnread;
            } else {
                show = type === filter;
            }

            card.hidden = !show;

            if (show) {
                visibleCount++;
            }
        });

        emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            filterButtons.forEach(item => item.classList.remove('active'));
            this.classList.add('active');

            applyFilter(this.dataset.filter);
        });
    });

    notificationCards.forEach(card => {
        card.addEventListener('click', function () {
            this.classList.remove('unread');
            this.dataset.unread = '0';

            const dot = this.querySelector('.unread-dot');
            if (dot) {
                dot.remove();
            }

            updateUnreadIndicators();

            if (activeFilter === 'belum') {
                applyFilter('belum');
            }
        });
    });

    markAllReadButton.addEventListener('click', function () {
        notificationCards.forEach(card => {
            card.classList.remove('unread');
            card.dataset.unread = '0';

            const dot = card.querySelector('.unread-dot');
            if (dot) {
                dot.remove();
            }
        });

        updateUnreadIndicators();
        applyFilter(activeFilter);
    });

    updateUnreadIndicators();
    applyFilter('semua');
</script>

</body>
</html>
