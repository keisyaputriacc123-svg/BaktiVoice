<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Detail Laporan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
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

        /* SIDEBAR */
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
            object-fit: contain;
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

        /* SUB MENU */
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

        /* LOGOUT */
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
            background: none;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: #fef2f2;
        }

        /* MAIN WRAPPER */
        .main-wrapper {
            margin-left: var(--sidebar-width);

            flex: 1;
            display: flex;






            flex-direction: column;

            min-height: 100vh;
        }

        /* TOPBAR */
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

        /* CONTENT */
        .content {
            padding: 28px 32px 40px;
            flex: 1;
            width: 100%;
            box-sizing: border-box;
        }

        .detail-grid > div:last-child {
            position: sticky;
            top: 90px;
        }

        /* BREADCRUMB */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;

            font-size: 13px;
            color: var(--text-muted);

            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--text-main);
        }

        .breadcrumb i {
            font-size: 10px;
        }

        .breadcrumb .current {
            color: var(--text-main);
            font-weight: 600;
        }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-main);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 16px;

            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 8px;

            color: var(--text-muted);

            text-decoration: none;
            font-size: 13px;
            font-weight: 600;

            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        /* DETAIL GRID */
        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr);
            gap: 20px;
            width: 100%;
            align-items: start;
        }

        .detail-main,
        .detail-sidebar {
            width: 100%;
            min-width: 0;
        }

        /* CARD */
        .detail-card {
            width: 100%;





            box-sizing: border-box;
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);

            padding: 24px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-main);

            padding-bottom: 16px;
            margin-bottom: 20px;

            border-bottom: 1px solid var(--border);
        }

        /* REPORT HEADER */
        .report-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            gap: 20px;
        }

        .report-title {
            font-size: 22px;
            font-weight: 800;
            color: #1e293b;

            margin-bottom: 8px;
        }

        .report-date {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* STATUS BADGE */
        .status-badge {
            padding: 7px 14px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: 700;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            white-space: nowrap;
        }

        .badge-pending {
            background-color: #f1f5f9;
            color: #475569;
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

        /* REPORT DESCRIPTION */
        .description {
            color: #475569;
            font-size: 14px;
            line-height: 1.8;
        }

        /* INFORMATION */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .info-label {
            font-size: 13px;
            color: var(--text-muted);
        }

        .info-value {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            text-align: right;
        }

        /* IMAGE / EVIDENCE */
        .evidence-box {
            width: 100%;
            min-height: 220px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: #f8fafc;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .evidence-box img {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
        }

        .evidence-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;

            color: var(--text-muted);
            font-size: 13px;
        }

        .evidence-placeholder i {
            font-size: 36px;
        }

        /* RESPONSE / TANGGAPAN */
        .response-box {
            background: #f8fafc;

            border: 1px solid var(--border);
            border-radius: 10px;

            padding: 18px;
            margin-bottom: 12px;
        }

        .response-header {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 10px;
        }

        .response-avatar {
            width: 34px;
            height: 34px;

            background: #e2e8f0;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--text-muted);
        }

        .response-name {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .response-date {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .response-text {
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* RESPONSE INPUT */
        .response-input {
            width: 100%;
            min-height: 120px;

            padding: 14px 16px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background-color: #ffffff;
            color: #334155;

            font-size: 13px;
            line-height: 1.6;

            resize: vertical;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .response-input::placeholder {
            color: #94a3b8;
        }

        .response-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 172, 224, 0.15);
        }

        .response-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .response-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 10px 18px;

            background-color: var(--primary);
            color: #ffffff;

            border: none;
            border-radius: 8px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: background-color 0.2s ease;
        }

        .response-submit:hover {
            background-color: #7f99d2;
        }

        /* ADMIN ACTION */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-btn {
            width: 100%;

            padding: 11px 16px;

            border-radius: 8px;

            border: none;
            cursor: pointer;

            font-size: 13px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            transition: all 0.2s ease;
        }

        .btn-pending {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-pending:hover {
            background: #cbd5e1;
        }

        .btn-process {
            background: #96ace0;
            color: #ffffff;
        }

        .btn-process:hover {
            background: #7f99d2;
        }

        .btn-success {
            background: #dcfce7;
            color: #15803d;
        }

        .btn-success:hover {
            background: #bbf7d0;
        }

        .btn-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .alert-success {
            padding: 12px 16px;
            background-color: #dcfce7;
            color: #15803d;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        @media (max-width: 900px) {

            .detail-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand-name,
            .nav-item span,
            .logout-btn span,
            .arrow-icon,
            .sub-menu {
                display: none !important;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .report-heading {
                flex-direction: column;
            }

            .info-item {
                flex-direction: column;
                gap: 4px;
            }

            .info-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>

            <!-- Logo -->
            <div class="brand">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-name">BaktiVoice</span>
            </div>

            <!-- Navigation -->
            <ul class="nav-menu">







                <li class="nav-item active">
                    <a href="{{ route('laporan_admin') }}">
                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>Laporan</span>

                        </div>

                    </a>

                </li>


                <li class="nav-item">
                    <button class="dropdown-btn" onclick="toggleDropdown('masterMenu', 'masterArrow')">
                        <div class="nav-content">

                            <i class="fa-solid fa-database"></i>

                            <span>Data Master</span>

                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="masterArrow"></i>
                    </button>
                    <ul class="sub-menu" id="masterMenu">
                        <li><a href="#">Kategori Laporan</a></li>
                        <li><a href="#">Status Laporan</a></li>
                        <li><a href="#">User & Role</a></li>
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

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-xmark"></i>
                <span>Logout</span>
            </button>
        </form>
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
                    {{ Auth::user()->name ?? 'Admin Sekolah' }}
                </span>

            </div>

        </header>

        <!-- CONTENT -->
        <main class="content">

            <!-- Alert Pesan Sukses -->
            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Breadcrumb -->

            <div class="breadcrumb">
                <a href="{{ route('laporan_admin') }}">Laporan</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span class="current">Detail Laporan</span>
            </div>


            <!-- Page Header -->

            <div class="page-header">
                <h1 class="page-title">Detail Laporan</h1>
                <a href="{{ route('laporan_admin') }}" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

            </div>


            <!-- DETAIL GRID -->

            <div class="detail-grid">

                <!-- LEFT COLUMN -->
                <div class="detail-main">

                    <!-- Judul Laporan -->
                    <section class="detail-card">

                        <div class="report-heading">

                            <div>

                                <h2 class="report-title">
                                    {{ $laporan->judul }}
                                </h2>

                                <div class="report-date">
                                    Dilaporkan pada {{ \Carbon\Carbon::parse($laporan->created_at)->isoFormat('D MMMM YYYY') }}
                                </div>

                            </div>

                            @php
                                $statusName = $laporan->status->nama_status ?? $laporan->status ?? 'Menunggu';
                                $badgeClass = 'badge-pending';
                                if (strtolower($statusName) == 'diproses' || strtolower($statusName) == 'proses') {
                                    $badgeClass = 'badge-diproses';
                                } elseif (strtolower($statusName) == 'selesai') {
                                    $badgeClass = 'badge-selesai';
                                } elseif (strtolower($statusName) == 'ditolak') {
                                    $badgeClass = 'badge-ditolak';
                                }
                            @endphp

                            <span class="status-badge {{ $badgeClass }}">
                                {{ ucfirst($statusName) }}
                            </span>
                        </div>

                    </section>


                    <!-- Isi Laporan -->

                    <section class="detail-card">
                        <h3 class="card-title">Isi Laporan</h3>
                        <p class="description">
                            {{ $laporan->isi_laporan }}
                        </p>

                    </section>


                    <!-- Bukti Laporan -->

                    <section class="detail-card">
    <h3 class="card-title">Bukti Laporan</h3>
    <div class="evidence-box">
        @if(!empty($laporan->bukti_url))
            <!-- Menggunakan asset() langsung karena file disimpan di public/uploads/laporan -->
            <img src="{{ asset($laporan->bukti_url) }}" alt="Bukti Laporan">
        @else
            <div class="evidence-placeholder">
                <i class="fa-regular fa-image"></i>
                <span>Tidak ada bukti foto yang dilampirkan</span>
            </div>
        @endif
    </div>
                    </section>

                    <!-- Tanggapan & Tindak Lanjut -->
                    <section class="detail-card">
                        <h3 class="card-title">Tanggapan & Tindak Lanjut</h3>

                        <!-- Menampilkan daftar tanggapan sebelumnya jika ada -->
                        @if(isset($laporan->tanggapan) && $laporan->tanggapan->count() > 0)
    @foreach($laporan->tanggapan as $item)
        <div class="response-box">
            <div class="response-header">
                <div class="response-avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div>
                    <div class="response-name">
                        {{ $item->user->name ?? 'Admin Sekolah' }}
                    </div>
                    <div class="response-date">
                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
            <p class="response-text">{{ $item->tanggapan }}</p>
        </div>
    @endforeach
@endif

                        <!-- Form Input Tanggapan Baru -->
<form action="{{ url('/api/laporan/' . ($laporan->id_laporan ?? $laporan->id) . '/tanggapan') }}" method="POST" class="mt-3">
    @csrf
    <div class="response-box">
        <div class="response-header">
            <div class="response-avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <div>
                <div class="response-name">
                    {{ Auth::user()->name ?? 'Admin Sekolah' }}
                </div>
                <div class="response-date">
                    Tulis tanggapan untuk laporan ini
                </div>
            </div>

        </div>


        <textarea
            name="tanggapan"
            class="response-input"
            placeholder="Tulis tanggapan atau tindak lanjut laporan..."
            rows="4" required></textarea>


        <div class="response-actions">
            <button type="submit" class="response-submit">
                <i class="fa-solid fa-paper-plane"></i>

                Kirim Tanggapan

            </button>

        </div>

    </div>
</form>
                    </section>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="detail-sidebar">


                    <!-- Informasi Laporan -->

                    <section class="detail-card">
                        <h3 class="card-title">Informasi Laporan</h3>
                        <div class="info-list">

                            <div class="info-item">
                                <span class="info-label">ID Laporan</span>
                                <span class="info-value">#BV-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </div>

                            <div class="info-item">
                                <span class="info-label">Kategori</span>
                                <span class="info-value">{{ $laporan->kategori->nama_kategori ?? $laporan->kategori ?? 'Umum' }}</span>
                            </div>

                            <div class="info-item">
                                <span class="info-label">Pelapor</span>
                                <span class="info-value">
                                    @if($laporan->anonim)
                                        Anonim
                                    @else
                                        {{ $laporan->user->name ?? 'Siswa' }}
                                    @endif
                                </span>

                            </div>

                            <div class="info-item">
                                <span class="info-label">Tanggal</span>
                                <span class="info-value">{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</span>
                            </div>

                            <div class="info-item">
                                <span class="info-label">Status</span>
                                <span class="info-value">{{ ucfirst($statusName) }}</span>
                            </div>

                        </div>

                    </section>

                    <!-- Aksi Admin -->
<section class="detail-card">
    <h3 class="card-title">Aksi Laporan</h3>

    <!-- Perhatikan penambahan $laporan->id_laporan di dalam URL -->
    <form action="{{ url('/api/laporan/' . ($laporan->id_laporan ?? 1) . '/status') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="action-buttons">
            <button type="submit" name="status_id" value="1" class="action-btn btn-pending">
                <i class="fa-solid fa-clock"></i>
                Pending Laporan
            </button>

            <button type="submit" name="status_id" value="2" class="action-btn btn-process">
                <i class="fa-solid fa-spinner"></i>
                Proses Laporan
            </button>

            <button type="submit" name="status_id" value="3" class="action-btn btn-success">
                <i class="fa-solid fa-check"></i>
                Tandai Selesai
            </button>

            <button type="submit" name="status_id" value="4" class="action-btn btn-danger">
                <i class="fa-solid fa-xmark"></i>
                Tolak Laporan
            </button>
        </div>
    </form>
</section>

                </div>

            </div>

        </main>

    </div>

    <!-- JAVASCRIPT -->
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
