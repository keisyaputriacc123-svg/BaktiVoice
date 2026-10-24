
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Detail Laporan Siswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            background: var(--background);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR - mengikuti dashboard siswa */
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
            object-fit: cover;
            background: #fff;
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
            transition: all 0.25s ease;
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
            background: #fff;
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
            color: #e11d48;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
            margin-top: 16px;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }

        /* MAIN WRAPPER */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
        }


/* TOPBAR - disamakan dengan dashboard_siswa.blade.php */
.topbar {
    height: var(--topbar-height);
    min-height: var(--topbar-height);
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
    flex-shrink: 0;
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

        /* MAIN CONTENT */
        .content {
            padding: 36px;
            flex: 1;
            background: var(--background);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .btn-back {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #fff;
            color: var(--text-main);
            border: 1px solid var(--border);
            text-decoration: none;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #f1f5ff;
            transform: translateX(-2px);
        }

        .page-title {
            font-size: 28px;
            line-height: 1.3;
            font-weight: 800;
            color: var(--text-main);
        }

        .report-code {
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            color: var(--text-main);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.5px;
            white-space: nowrap;
            box-shadow: var(--shadow);
        }

        .page-divider {
            border: 0;
            border-top: 1px solid rgba(123, 159, 232, 0.35);
            margin-bottom: 24px;
        }

        /* INFORMASI LAPORAN */
        .report-info-card,
        .report-content-card,
        .evidence-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .report-info-card {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            padding: 22px;
            margin-bottom: 24px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            min-width: 0;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #edf3ff;
            color: #5278c3;
            font-size: 17px;
        }

        .info-label {
            display: block;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
            margin: 2px 0 7px;
        }

        .info-value {
            color: #1e3a70;
            font-size: 14px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }


.status-badge {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
    cursor: default;
    user-select: none;
}

.status-diproses {
    background: #fef3c7;
    color: #a16207;
    border: 1px solid #f3d28a;
}


        /* ISI LAPORAN */
        .report-content-card {
            padding: 24px;
            margin-bottom: 24px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1e3a70;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .section-title i {
            color: #628cdb;
            font-size: 19px;
        }

        .report-text {
            min-height: 100px;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #f8faff;
            color: #334155;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        /* BUKTI PENDUKUNG */
        .evidence-card {
            padding: 24px;
            margin-bottom: 24px;
        }

        .evidence-preview {
            width: 220px;
            max-width: 100%;
            height: 160px;
            border: 1px dashed #a9bee8;
            border-radius: 12px;
            background: #f5f8ff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: #7794ca;
        }

        .evidence-preview i {
            font-size: 42px;
        }

        .evidence-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #f5f8ff;
        }

        .evidence-caption {
            color: var(--text-muted);
            font-size: 12px;
            margin-top: 10px;
        }

        .evidence-link {
            display: inline-block;
            margin-top: 12px;
            color: #4772c7;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .evidence-link:hover {
            text-decoration: underline;
        }

        /* ACTION BUTTON */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 22px;
            border: none;
            border-radius: 10px;
            background: var(--gradient-button);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(98, 140, 219, 0.3);
            transition: all 0.25s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(98, 140, 219, 0.4);
        }

        .demo-notice {
            display: none;
            padding: 13px 16px;
            margin-top: 18px;
            border: 1px solid #b7d9c0;
            border-radius: 10px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
            line-height: 1.6;
        }

        .demo-notice.show {
            display: block;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .report-info-card {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content {
                padding: 28px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 24px;
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

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 22px 18px;
            }

            .page-title {
                font-size: 23px;
            }

            .report-info-card {
                gap: 20px 12px;
                padding: 18px;
            }

            .report-content-card,
            .evidence-card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .topbar {
                padding: 0 12px;
            }

            .user-name {
                display: none;
            }

            .content {
                padding: 18px 12px;
            }

            .page-header {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .page-title {
                font-size: 20px;
            }

            .btn-back {
                width: 36px;
                height: 36px;
            }

            .report-code {
                margin-left: 50px;
                padding: 8px 12px;
            }

            .report-info-card {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .info-value {
                font-size: 13px;
            }

            .section-title {
                font-size: 18px;
            }

            .report-text {
                padding: 14px;
                font-size: 13px;
            }

            .evidence-preview {
                width: 100%;
                height: 180px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-save {
                width: 100%;
            }
        }


    .notification-button {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e3a70;
    font-size: 20px;
    text-decoration: none;
    border-radius: 50%;
    transition: background 0.2s;
}

.notification-button:hover {
    background-color: rgba(255, 255, 255, 0.3);
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

<a href="{{ route('login') }}" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
</a>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">

        <!-- TOPBAR -->

<header class="topbar">
    <!-- Ikon Notifikasi -->
    <a href="{{ route('notifikasi_siswa') }}"
        class="notification-button"
        title="Notifikasi">
        <i class="fa-regular fa-bell"></i>
    </a>

    <!-- Profil Pengguna -->
    <div class="user-profile">
        <div class="avatar">
            <i class="fa-regular fa-user"></i>
        </div>

        <span class="user-name">
            {{ Auth::user()->name ?? 'Nama Siswa' }}
        </span>
    </div>
</header>


        <!-- MAIN CONTENT -->
        <main class="content">

            <!-- JUDUL DAN KODE LAPORAN -->
            <section class="page-header">
                <div class="page-heading">
                    <a
                        href="{{ route('riwayat_laporan') }}"
                        class="btn-back"
                        title="Kembali ke Riwayat Laporan"
                        aria-label="Kembali"
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <h1 class="page-title">Detail Laporan</h1>
                </div>

                <!-- Data contoh sementara -->
                <div class="report-code" id="reportCode">BV001</div>
            </section>

            <hr class="page-divider">

            <!-- FORM FRONTEND DEMO -->
            <form id="detailReportForm">

                <!-- INFORMASI LAPORAN -->
                <section class="report-info-card">

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <div>
                            <span class="info-label">Kategori</span>
                            <div class="info-value" id="reportCategory">
                                Sarana dan Prasarana
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div>
                            <span class="info-label">Pelapor</span>
                            <div class="info-value" id="reporterName">
                                Anonim
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-regular fa-calendar"></i>
                        </div>
                        <div>
                            <span class="info-label">Tanggal</span>
                            <div class="info-value" id="reportDate">
                                14 Sep 2026
                            </div>
                        </div>
                    </div>


<div class="info-item">
    <div class="info-icon">
        <i class="fa-solid fa-thumbtack"></i>
    </div>

    <div>
        <label class="info-label">Status</label>

        <span id="reportStatus" class="status-badge status-diproses">
            Diproses
        </span>
    </div>
</div>

                </section>

                <!-- ISI LAPORAN -->
                <section class="report-content-card">
                    <h2 class="section-title">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Isi Laporan
                    </h2>

                    <div class="report-text" id="reportDescription">
                        Keadaan kursi dan meja di kelas 10 RPL 2 mengalami
                        kerusakan.
                    </div>
                </section>

                <!-- BUKTI PENDUKUNG -->
                <section class="evidence-card">
                    <h2 class="section-title">
                        <i class="fa-regular fa-images"></i>
                        Bukti Pendukung
                    </h2>

                    <div class="evidence-preview" id="evidencePreview">
                        <i class="fa-regular fa-image"></i>
                    </div>

                    <p class="evidence-caption" id="evidenceCaption">
                        Belum ada gambar bukti yang ditampilkan.
                    </p>

                    <!--
                        Jika sudah ada gambar bukti, ganti area pratinjau
                        dengan elemen img dan isi src dengan path gambarnya.
                    -->
                </section>

                <!-- TOMBOL SIMPAN -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Perubahan
                    </button>
                </div>

                <div class="demo-notice" id="demoNotice" role="status">
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Perubahan demo berhasil diperbarui pada tampilan.</strong>
                    Status belum disimpan ke database. Fitur penyimpanan akan
                    dihubungkan setelah integrasi backend.
                </div>

            </form>

        </main>
    </div>


<script>
    // FRONTEND DEMO: hanya menampilkan status laporan.
    const reportStatus = document.getElementById('reportStatus');

    // Warna label berdasarkan status laporan.
    const statusColors = {
        'Pending': {
            background: '#f3f4f6',
            color: '#4b5563',
            border: '#d1d5db'
        },
        'Diproses': {
            background: '#fef3c7',
            color: '#a16207',
            border: '#f3d28a'
        },
        'Selesai': {
            background: '#dcfce7',
            color: '#15803d',
            border: '#bbf7d0'
        },
        'Ditolak': {
            background: '#fee2e2',
            color: '#b91c1c',
            border: '#fecaca'
        }
    };

    // Atur warna status yang sedang ditampilkan.
    if (reportStatus) {
        const currentStatus = reportStatus.textContent.trim();
        const colors = statusColors[currentStatus];

        if (colors) {
            reportStatus.style.backgroundColor = colors.background;
            reportStatus.style.color = colors.color;
            reportStatus.style.borderColor = colors.border;
        }
    }
</script>

</body>
</html>
