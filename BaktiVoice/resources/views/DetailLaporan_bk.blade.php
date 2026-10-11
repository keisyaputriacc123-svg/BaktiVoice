
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Detail Laporan BK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --text: #496cbd;
            --text-dark: #344563;
            --background: #f6f8fc;
            --border: #e7ebf3;
            --sidebar-width: 250px;
            --topbar-height: 70px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text-dark);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 24px 16px;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px;
            margin-bottom: 35px;
        }

        .logo img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .logo-text {
            color: var(--text);
            font-size: 19px;
            font-weight: 700;
        }

        .nav-label {
            font-size: 11px;
            font-weight: 700;
            color: #a0a9bb;
            letter-spacing: 1px;
            margin: 0 12px 12px;
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
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            color: #78849b;
            transition: .2s;
        }

        .nav-link i {
            width: 18px;
            text-align: center;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #edf2ff;
            color: var(--text);
        }

        .nav-link.active {
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        /* TOPBAR */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            z-index: 90;
        }

        .topbar-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .notification {
            color: #78849b;
            font-size: 18px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            background: #edf2ff;
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-info p:first-child {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .user-info p:last-child {
            font-size: 10px;
            color: #8a95a8;
            margin-top: 3px;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: calc(var(--topbar-height) + 28px) 32px 35px;
            min-height: 100vh;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #909bad;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: var(--text);
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            font-size: 24px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .page-heading p {
            font-size: 13px;
            color: #8994a7;
            line-height: 1.6;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid #dce3f0;
            border-radius: 9px;
            background: #fff;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .detail-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 4px 16px rgba(43, 62, 102, .03);
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .report-title {
            font-size: 19px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 20px;
        }

        .information-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
            margin-bottom: 28px;
        }

        .info-item label {
            display: block;
            color: #8b96a9;
            font-size: 11px;
            margin-bottom: 8px;
        }

        .info-item p {
            color: var(--text-dark);
            font-size: 13px;
            font-weight: 600;
        }

        .category-badge {
            display: inline-block;
            padding: 6px 11px;
            background: #edf2ff;
            color: var(--text);
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fff3d9;
            color: #a96c00;
            font-size: 11px;
            font-weight: 700;
        }

        .content-section {
            border-top: 1px solid var(--border);
            padding-top: 23px;
            margin-top: 23px;
        }

        .description {
            font-size: 13px;
            line-height: 1.9;
            color: #68758c;
        }

        .evidence-box {
            margin-top: 14px;
            width: min(100%, 340px);
            min-height: 175px;
            background: #f8faff;
            border: 1px dashed #cbd6eb;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #9aa8c1;
        }

        .evidence-box i {
            font-size: 35px;
        }

        .evidence-box p {
            font-size: 12px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            min-height: 140px;
            padding: 14px;
            border: 1px solid #dce3f0;
            border-radius: 9px;
            outline: none;
            resize: vertical;
            font-family: inherit;
            font-size: 13px;
            color: var(--text-dark);
            line-height: 1.7;
        }

        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 172, 224, .15);
        }

        textarea::placeholder {
            color: #a5afc0;
        }

        .form-hint {
            color: #939db0;
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.6;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: none;
            border-radius: 9px;
            background: var(--text);
            color: #fff;
            padding: 12px 25px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #385ba9;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .topbar {
                left: 210px;
                padding: 0 20px;
            }

            .main-content {
                margin-left: 210px;
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 15px;
            }

            .logo {
                margin-bottom: 15px;
            }

            .nav-label {
                display: none;
            }

            .nav-menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .nav-link {
                padding: 10px;
                font-size: 11px;
            }

            .sidebar-bottom {
                margin-top: 12px;
            }

            .topbar {
                position: static;
                height: 60px;
                padding: 0 15px;
            }

            .main-content {
                margin-left: 0;
                padding: 22px 15px;
            }

            .information-grid {
                grid-template-columns: 1fr 1fr;
                gap: 18px 12px;
            }

            .detail-card {
                padding: 20px 16px;
            }

            .page-heading h1 {
                font-size: 20px;
            }

            .page-heading {
                flex-wrap: wrap;
            }

            .user-info {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <a href="{{ route('dashboard_bk') }}" class="logo">
            <img src="{{ asset('images/logo BaktiVoice.png') }}"
                 alt="Logo BaktiVoice">
            <span class="logo-text">BaktiVoice</span>
        </a>

        <p class="nav-label">MENU UTAMA</p>

        <nav class="nav-menu">
            <a href="{{ route('dashboard_bk') }}" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('LaporanSiswa_bk') }}"
               class="nav-link active">
                <i class="fa-solid fa-file-lines"></i>
                <span>Laporan Siswa</span>
            </a>

            <a href="#" class="nav-link">
                <i class="fa-solid fa-chart-line"></i>
                <span>Monitoring</span>
            </a>

            <a href="#" class="nav-link">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>
        </div>
    </aside>

    <!-- TOPBAR -->
    <header class="topbar">
        <h2 class="topbar-title">Detail Laporan</h2>

        <div class="topbar-right">
            <a href="#" class="notification" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </a>

            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="user-info">
                    <p>{{ Auth::user()->name ?? 'Guru BK' }}</p>
                    <p>Guru Bimbingan Konseling</p>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <div class="breadcrumb">
            <a href="{{ route('dashboard_bk') }}">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="{{ route('LaporanSiswa_bk') }}">Laporan Siswa</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Detail Laporan</span>
        </div>

        <div class="page-heading">
            <div>
                <h1>Detail Laporan</h1>
                <p>Lihat informasi laporan siswa dan berikan masukan atau tindak lanjut.</p>
            </div>

            <a href="{{ route('LaporanSiswa_bk') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <section class="detail-card">

            <h3 class="section-title">Informasi Laporan</h3>

            <h2 class="report-title">Perundungan Antar Siswa</h2>

            <div class="information-grid">
                <div class="info-item">
                    <label>Tanggal Laporan</label>
                    <p>16 September 2026</p>
                </div>

                <div class="info-item">
                    <label>Kategori</label>
                    <span class="category-badge">Kesiswaan</span>
                </div>

                <div class="info-item">
                    <label>Pelapor</label>
                    <p>Anonim</p>
                </div>

                <div class="info-item">
                    <label>Status Laporan</label>
                    <span class="status-badge">Diproses</span>
                </div>
            </div>

            <div class="content-section">
                <h3 class="section-title">Deskripsi Laporan</h3>

                <p class="description">
                    Terjadi tindakan perundungan yang dilakukan oleh beberapa
                    siswa terhadap teman sekelasnya. Pelapor berharap pihak
                    sekolah dapat menindaklanjuti kejadian tersebut agar
                    lingkungan sekolah tetap aman dan nyaman.
                </p>
            </div>

            <div class="content-section">
                <h3 class="section-title">Bukti Laporan</h3>

                <div class="evidence-box">
                    <i class="fa-regular fa-image"></i>
                    <p>Pratinjau bukti laporan</p>
                    <p>Bukti asli akan ditampilkan setelah terhubung ke database.</p>
                </div>
            </div>

            <div class="content-section">
                <h3 class="section-title">Masukan / Tindak Lanjut</h3>

                <form id="followUpForm">
                    <label for="followUp" class="form-label">
                        Catatan Guru BK
                    </label>

                    <textarea
                        id="followUp"
                        name="tindak_lanjut"
                        placeholder="Tuliskan masukan, hasil pemeriksaan, atau tindak lanjut terhadap laporan ini..."
                        required
                    ></textarea>

                    <p class="form-hint">
                        Pastikan catatan berisi tindak lanjut yang relevan
                        dan menjaga kerahasiaan siswa.
                    </p>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </section>
    </main>

    <script>
        document.getElementById('followUpForm').addEventListener('submit', function (event) {
            event.preventDefault();

            alert(
                'Form sudah diuji. Penyimpanan masukan ke database ' +
                'perlu dihubungkan melalui backend.'
            );
        });
    </script>

</body>
</html>
