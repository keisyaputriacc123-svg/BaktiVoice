<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Detail Laporan Wakasek</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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

    /* KONTEN */
    .content {
        padding: 30px 35px 45px;
        max-width: 1600px;
        margin: 0 auto;
    }

    .page-heading {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 12px;
    }

    .back-button {
        width: 39px;
        height: 39px;
        border: 1px solid var(--border);
        background: #fff;
        color: var(--text-main);
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.2s;
        flex-shrink: 0;
    }

    .back-button:hover {
        background: #f2f6ff;
        transform: translateX(-2px);
    }

    .page-heading h1 {
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -0.6px;
    }

    .page-subtitle {
        color: var(--text-muted);
        font-size: 12px;
        margin: 0 0 22px 54px;
        line-height: 1.7;
    }

    .heading-divider {
        border: 0;
        border-top: 1px solid rgba(150, 172, 224, 0.45);
        margin-bottom: 25px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .section-heading i {
        color: #628cdb;
        font-size: 18px;
    }

    .section-heading h2 {
        font-size: 17px;
        font-weight: 800;
    }

    .section-heading p {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 4px;
    }

    /* KARTU */
    .detail-grid {
        display: grid;
        grid-template-columns: minmax(280px, 0.9fr) minmax(0, 1.5fr);
        gap: 22px;
        align-items: start;
    }

    .left-column,
    .right-column {
        display: flex;
        flex-direction: column;
        gap: 22px;
        min-width: 0;
    }

    .card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        box-shadow: var(--shadow);
        min-width: 0;
    }

    .card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 21px;
    }

    .card-title-icon {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #edf3ff;
        border-radius: 10px;
        color: #628cdb;
        font-size: 15px;
    }

    /* INFORMASI LAPORAN */
    .report-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #e5edff, #f2f6ff);
        border-radius: 15px;
        color: #628cdb;
        font-size: 24px;
        margin-bottom: 16px;
    }

    .report-title {
        color: var(--text-main);
        font-size: 16px;
        line-height: 1.6;
        font-weight: 800;
        margin-bottom: 8px;
        overflow-wrap: anywhere;
    }

    .report-code {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #6481b9;
        background: #f1f5ff;
        border: 1px solid #e0eaff;
        border-radius: 7px;
        padding: 7px 10px;
        font-size: 10px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .info-list {
        display: flex;
        flex-direction: column;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #edf1f8;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: #f0f5ff;
        color: #628cdb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        flex-shrink: 0;
    }

    .info-content {
        min-width: 0;
        flex: 1;
    }

    .info-label {
        display: block;
        font-size: 10px;
        color: var(--text-muted);
        margin-bottom: 5px;
    }

    .info-value {
        display: block;
        font-size: 12px;
        color: var(--text-main);
        font-weight: 700;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 20px;
        padding: 6px 11px;
        font-size: 10px;
        font-weight: 700;
    }

    .status-badge.diproses {
        color: #a66a12;
        background: #fff4d9;
    }

    .status-badge.pending {
        color: #64748b;
        background: #edf1f7;
    }

    .status-badge.selesai {
        color: #198754;
        background: #e0f7e9;
    }

    .status-badge.ditolak {
        color: #c24141;
        background: #ffe5e5;
    }

    .evidence-button {
        width: 100%;
        min-height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: 1px solid #b7ccf3;
        border-radius: 9px;
        color: #4772c7;
        background: #f5f8ff;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 17px;
        transition: 0.2s;
    }

    .evidence-button:hover {
        background: #eaf1ff;
        border-color: #628cdb;
    }

    .demo-note {
        color: #8190a8;
        font-size: 10px;
        line-height: 1.7;
        margin-top: 12px;
    }

    /* ISI LAPORAN */
    .report-content {
        font-size: 13px;
        line-height: 1.9;
        color: #4c5e7d;
        overflow-wrap: anywhere;
        white-space: pre-line;
    }

    .report-content p + p {
        margin-top: 13px;
    }

    .report-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #8290a8;
        font-size: 10px;
        padding-top: 17px;
        margin-top: 18px;
        border-top: 1px solid #edf1f8;
    }

    /* TINDAK LANJUT */
    .follow-up-card {
        border-top: 3px solid #96ace0;
    }

    .follow-up-description {
        color: var(--text-muted);
        font-size: 11px;
        line-height: 1.8;
        margin: -8px 0 18px;
    }

    .form-label {
        display: block;
        color: var(--text-main);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .required-mark {
        color: #e05d70;
    }

    .textarea-wrapper {
        position: relative;
    }

    .follow-up-textarea {
        width: 100%;
        min-height: 155px;
        padding: 14px;
        border: 1px solid #dbe5f5;
        border-radius: 10px;
        background: #fbfcff;
        color: var(--text-main);
        outline: none;
        font-size: 12px;
        line-height: 1.8;
        resize: vertical;
        transition: 0.2s;
    }

    .follow-up-textarea::placeholder {
        color: #a2aec2;
    }

    .follow-up-textarea:focus {
        border-color: #8da9e5;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(150, 172, 224, 0.15);
    }

    .textarea-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-top: 9px;
        color: #8b98ad;
        font-size: 10px;
    }

    .save-button {
        width: 100%;
        min-height: 45px;
        border: none;
        border-radius: 9px;
        background: var(--gradient-button);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 22px;
        box-shadow: 0 4px 10px rgba(71, 114, 199, 0.18);
        transition: 0.2s;
    }

    .save-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(71, 114, 199, 0.25);
    }

    .success-message {
        display: none;
        align-items: flex-start;
        gap: 9px;
        padding: 12px;
        margin-top: 15px;
        border-radius: 9px;
        background: #e7f8ed;
        color: #237346;
        font-size: 11px;
        line-height: 1.7;
    }

    .success-message.show {
        display: flex;
    }

    @media (max-width: 1100px) {
        .content {
            padding: 27px 24px 38px;
        }

        .detail-grid {
            grid-template-columns: minmax(250px, 0.9fr) minmax(0, 1.2fr);
            gap: 16px;
        }

        .card {
            padding: 20px;
        }

        .topbar {
            padding: 0 24px;
        }
    }

    /* Custom File Upload Box */
.custom-file-upload {
    border: 2px dashed #b7ccf3;
    background: #f8fafe;
    border-radius: 12px;
    padding: 16px;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s ease;
}

.custom-file-upload:hover {
    background: #edf3ff;
    border-color: #628cdb;
    transform: translateY(-1px);
}

.upload-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.upload-icon {
    font-size: 22px;
    color: #4772c7;
    background: #ffffff;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(71, 114, 199, 0.12);
}

.upload-text {
    text-align: left;
}

.upload-text span {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: var(--text-main);
}

.upload-text p {
    font-size: 10px;
    color: var(--text-muted);
    margin-top: 2px;
}

    @media (max-width: 850px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.25s ease;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .main-wrapper {
            margin-left: 0;
        }

        .topbar {
            justify-content: space-between;
            padding: 0 20px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
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
            'route_dashboard' => 'wakasek.kesiswaan.dashboard',
            'route_rekap' => 'wakasek.kesiswaan.rekap',
            'route_monitoring' => 'wakasek.kesiswaan.monitoring',
        ],
        'wakasek kurikulum' => [
            'nama' => 'Wakasek Kurikulum',
            'kategori' => 'Kurikulum',
            'route_dashboard' => 'wakasek.kurikulum.dashboard',
            'route_rekap' => 'wakasek.kurikulum.rekap',
            'route_monitoring' => 'wakasek.kurikulum.monitoring',
        ],
        'wakasek sarana' => [
            'nama' => 'Wakasek Sarana',
            'kategori' => 'Sarana dan Prasarana',
            'route_dashboard' => 'wakasek.sarana.dashboard',
            'route_rekap' => 'wakasek.sarana.rekap',
            'route_monitoring' => 'wakasek.sarana.monitoring',
        ],
        'wakasek dudi' => [
            'nama' => 'Wakasek DUDI',
            'kategori' => 'DUDI',
            'route_dashboard' => 'wakasek.dudi.dashboard',
            'route_rekap' => 'wakasek.dudi.rekap',
            'route_monitoring' => 'wakasek.dudi.monitoring',
        ],
    ];

    $jabatan = $bidang[$role] ?? $bidang['wakasek kesiswaan'];

    $contohLaporan = [
        'kode' => 'LAP-2026-001',
        'judul' => 'Kendala Fasilitas dan Lingkungan Sekolah',
        'tanggal' => '22 Oktober 2026',
        'pelapor' => 'Siswa (Anonim)',
        'kategori' => $jabatan['kategori'],
        'status' => 'Diproses',
        'bukti' => null,
        'isi' => 'Saya ingin melaporkan adanya kendala yang perlu mendapat perhatian di lingkungan sekolah.

Mohon agar laporan ini dapat ditinjau dan ditindaklanjuti oleh pihak terkait. Saya berharap ada solusi yang baik agar kegiatan belajar mengajar dapat berlangsung dengan nyaman.',
    ];

    $statusClass = match (strtolower($contohLaporan['status'])) {
        'diproses' => 'diproses',
        'selesai' => 'selesai',
        'ditolak' => 'ditolak',
        default => 'pending',
    };
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
                <a href="{{ route($jabatan['route_dashboard']) }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route($jabatan['route_rekap']) }}">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Rekap</span>
                </a>
            </li>

            <li class="nav-item active">
                <a href="{{ route($jabatan['route_monitoring']) }}">
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

<!-- MAIN WRAPPER & TOPBAR -->
<div class="main-wrapper">
    <header class="topbar">
        <div class="topbar-icon" title="Notifikasi">
            <i class="fa-regular fa-bell"></i>
        </div>

        <div class="user-profile">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <span class="user-name">{{ $jabatan['nama'] }}</span>
        </div>
    </header>

    <!-- KONTEN -->
    <main class="content">
        <div class="page-heading">
            <button type="button" class="back-button" onclick="history.back()" aria-label="Kembali" title="Kembali ke halaman sebelumnya">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h1>Detail Laporan</h1>
        </div>

        <p class="page-subtitle">
            Kelola dan tinjau informasi laporan sesuai bidang {{ $jabatan['nama'] }}.
        </p>

        <hr class="heading-divider">

        <div class="section-heading">
            <i class="fa-solid fa-file-circle-check"></i>
            <div>
                <h2>Informasi & Tindak Lanjut</h2>
                <p>Informasi lengkap dan tindak lanjut laporan.</p>
            </div>
        </div>

        <div class="detail-grid">
            <!-- KOLOM KIRI -->
            <div class="left-column">
                <section class="card">
                    <div class="card-title">
                        <div class="card-title-icon">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <span>Informasi Laporan</span>
                    </div>

                    <div class="report-icon">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>

                    <h3 class="report-title">{{ $contohLaporan['judul'] }}</h3>

                    <div class="report-code">
                        <i class="fa-solid fa-hashtag"></i>
                        {{ $contohLaporan['kode'] }}
                    </div>

                    <div class="info-list">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Tanggal Laporan</span>
                                <span class="info-value">{{ $contohLaporan['tanggal'] }}</span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Pelapor</span>
                                <span class="info-value">{{ $contohLaporan['pelapor'] }}</span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Kategori Laporan</span>
                                <span class="info-value">{{ $contohLaporan['kategori'] }}</span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Status Laporan</span>
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="fa-solid fa-circle"></i>
                                    {{ $contohLaporan['status'] }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="evidence-button" id="evidenceButton">
                        <i class="fa-solid fa-paperclip"></i>
                        Lihat Bukti Laporan
                    </button>

                    <p class="demo-note">
                        <i class="fa-solid fa-circle-info"></i>
                        Bukti laporan akan dihubungkan setelah integrasi database.
                    </p>
                </section>
            </div>

            <!-- KOLOM KANAN -->
            <div class="right-column">
                <section class="card">
                    <div class="card-title">
                        <div class="card-title-icon">
                            <i class="fa-solid fa-align-left"></i>
                        </div>
                        <span>Isi Laporan</span>
                    </div>

                    <div class="report-content">{{ $contohLaporan['isi'] }}</div>

                    <div class="report-meta">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Informasi laporan ditampilkan untuk keperluan peninjauan.</span>
                    </div>
                </section>

                <section class="card follow-up-card">
                    <div class="card-title">
                        <div class="card-title-icon">
                            <i class="fa-solid fa-comment-dots"></i>
                        </div>
                        <span>Tindak Lanjut</span>
                    </div>

                    <p class="follow-up-description">
                        Tuliskan tindak lanjut atau langkah penanganan terhadap laporan ini dengan jelas.
                    </p>

                    <!-- Form diperbarui dengan enctype untuk mendukung unggah file gambar -->
                    <form id="followUpForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label" for="followUpText">
                            Isi Tindak Lanjut
                            <span class="required-mark">*</span>
                        </label>

                        <div class="textarea-wrapper">
                            <textarea
                                class="follow-up-textarea"
                                id="followUpText"
                                name="tanggapan"
                                maxlength="2000"
                                placeholder="Tuliskan tindak lanjut laporan di sini..."
                                required
                            ></textarea>
                        </div>

                        <div class="textarea-footer">
                            <span>
                                <i class="fa-solid fa-circle-info"></i>
                                Gunakan bahasa yang jelas dan sopan.
                            </span>
                            <span id="characterCount">0 / 2000 karakter</span>
                        </div>

<!-- INPUT UPLOAD BUKTI GAMBAR -->
<div style="margin-top: 18px;">
    <label class="form-label">
        Lampirkan Bukti Gambar <span style="font-weight: normal; color: var(--text-muted);">(Opsional)</span>
    </label>
    
    <div class="custom-file-upload" id="fileUploadContainer" onclick="document.getElementById('buktiTanggapan').click();">
        <input 
            type="file" 
            name="bukti_tanggapan" 
            id="buktiTanggapan" 
            accept="image/*"
            style="display: none;"
            onchange="previewFileName(this)"
        >
        <div class="upload-content">
            <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
            <div class="upload-text">
                <span id="fileNameText">Klik untuk mengunggah gambar bukti</span>
                <p>Format: JPG, JPEG, PNG (Maks. 2MB)</p>
            </div>
        </div>
    </div>
</div>

                        <button type="submit" class="save-button">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan Tindak Lanjut
                        </button>

                        <div class="success-message" id="demoMessage" role="status">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>
                                Ini masih tampilan demo. Tindak lanjut belum disimpan ke database.
                            </span>
                        </div>
                    </form>

                    <p class="demo-note">
                        <i class="fa-solid fa-circle-info"></i>
                        Penyimpanan akan dihubungkan oleh tim backend.
                    </p>
                </section>
            </div>
        </div>
    </main>
</div>

<script>
    // Penghitung karakter
    const followUpText = document.getElementById('followUpText');
    const characterCount = document.getElementById('characterCount');

    followUpText.addEventListener('input', function () {
        characterCount.textContent = this.value.length + ' / 2000 karakter';
    });

    // Demo frontend saja
    document.getElementById('followUpForm').addEventListener('submit', function (event) {
        event.preventDefault();

        if (!followUpText.value.trim()) {
            followUpText.focus();
            return;
        }

        document.getElementById('demoMessage').classList.add('show');
    });

    // Tombol bukti sementara
    document.getElementById('evidenceButton').addEventListener('click', function () {
        alert('Fitur bukti laporan akan dihubungkan setelah integrasi database.');
    });
    function previewFileName(input) {
    const fileNameText = document.getElementById('fileNameText');
    if (input.files && input.files[0]) {
        fileNameText.textContent = 'Gambar dipilih: ' + input.files[0].name;
        fileNameText.style.color = '#15803d'; // Warna hijau penanda berhasil
    } else {
        fileNameText.textContent = 'Klik untuk mengunggah gambar bukti';
        fileNameText.style.color = 'var(--text-main)';
    }
}
</script>

</body>
</html>