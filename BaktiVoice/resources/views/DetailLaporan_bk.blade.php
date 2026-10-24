
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
        --primary-hover: #7b94d1;
        --background: #eaf1fb;
        --card-bg: #ffffff;
        --border: rgba(186, 210, 240, 0.6);
        --text-main: #2c4a8e;
        --text-muted: #64748b;
        --text-dark: #1e293b;
        --text: #3b62ac; /* Menambahkan variabel --text yang tadi hilang */

        --font-family: 'Inter', sans-serif;

        --sidebar-width: 250px;
        --topbar-height: 70px;

        --radius: 12px;

        --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);

        --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
        --gradient-button: linear-gradient(135deg, #628cdb 0%, #4772c7 100%);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: var(--font-family);
    }

    body {
        background-color: var(--background) !important;
        color: var(--text-main);
        display: flex;
        min-height: 100vh;
    }


    /* =====================================================
       SIDEBAR
    ===================================================== */

    .sidebar {
        width: var(--sidebar-width);
        background: var(--gradient-pastel) !important;
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

        padding: 0 12px 24px 12px;
    }

    .brand-logo-img {
        width: 60px !important;
        height: 60px !important;
        max-width: 60px !important;

        background-color: #ffffff !important;
        color: #3b62ac;

        font-weight: 800;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 14px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        object-fit: contain;
    }

    .brand-name {
        font-size: 20px;
        font-weight: 800;
        color: #1e3a70 !important;
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

        color: #274472 !important;
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
        background-color: rgba(255, 255, 255, 0.4) !important;
        color: #102a56 !important;
        transform: translateX(4px);
    }

    .nav-item.active > a {
        background-color: #ffffff !important;
        color: #3b62ac !important;
        font-weight: 700;
        box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
    }

    .nav-item i {
        font-size: 16px;
        width: 20px;
        text-align: center;
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


    /* =====================================================
       LOGOUT
    ===================================================== */

    .logout-btn {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 12px 16px;

        color: #e11d48 !important;
        text-decoration: none;

        font-weight: 700;
        font-size: 14px;

        border-radius: 10px;

        transition: all 0.2s ease;

        margin-top: 16px;
    }

    .logout-btn:hover {
        background-color: rgba(255, 255, 255, 0.5) !important;
        color: #be123c !important;
    }


    /* =====================================================
       MAIN WRAPPER & TOPBAR (PERBAIKAN UTAMA DI SINI)
    ===================================================== */

    .main-wrapper {
        margin-left: var(--sidebar-width);
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: var(--background) !important;
    }

    .topbar {
        height: var(--topbar-height);
        background: var(--gradient-pastel) !important;
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

    .topbar-icon {
        color: #274472 !important;
        font-size: 18px;
        cursor: pointer;
        position: relative;
        padding: 8px;
        border-radius: 50%;
        transition: background 0.2s;
    }

    .topbar-icon:hover {
        background-color: rgba(255, 255, 255, 0.4) !important;
        color: #102a56 !important;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 6px 12px;
        border-radius: 30px;
        transition: background 0.2s;
        cursor: pointer;
    }

    .user-profile:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.8);

        display: flex;
        align-items: center;
        justify-content: center;

        color: #3b62ac !important;
        font-size: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .user-name {
        font-size: 14px;
        font-weight: 700;
        color: #1e3a70 !important;
    }

    /* MAIN CONTENT (DIPERBAIKI: Hapus margin-left ganda dan sesuaikan padding) */
    .main-content {
        padding: 32px;
        flex: 1;
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
        text-decoration: none;
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
        text-decoration: none;
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

        .main-wrapper {
            margin-left: 210px;
        }

        .main-content {
            padding: 20px;
        }
    }

    @media (max-width: 650px) {
        .sidebar {
            position: static;
            width: 100%;
            height: auto;
            padding: 15px;
        }

        .main-wrapper {
            margin-left: 0;
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

    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">

        <div>

            <!-- LOGO -->
            <div class="brand">

                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >

                <span class="brand-name">
                    BaktiVoice
                </span>

            </div>


            <!-- NAVIGASI GURU BK -->
            <ul class="nav-menu">


                <!-- DASHBOARD -->
                <li class="nav-item active">

                    <a href="{{ route('dashboard_bk') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-house"></i>

                            <span>
                                Dashboard
                            </span>

                        </div>

                    </a>

                </li>


                <!-- LAPORAN SISWA -->
                <li class="nav-item">

                    <a href="{{ route('LaporanSiswa_bk') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>
                                Laporan Siswa
                            </span>

                        </div>

                    </a>

                </li>


                <!-- MONITORING -->
                <li class="nav-item">

                    <a href="{{ route('monitoring_bk') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-eye"></i>

                            <span>
                                Monitoring
                            </span>

                        </div>

                    </a>

                </li>

                <!-- NOTIFIKASI -->
                <li class="nav-item">
    <a href="{{ route('notifikasi_bk') }}" class="nav-notification">
        <i class="fa-solid fa-bell"></i>
        <span>Notifikasi</span>
        <span class="notification-dot"></span>
    </a>
</li>

                <!-- PROFIL -->
                <li class="nav-item">

                    <a href="{{ route('profil_bk') }}" title="Profil">

                        <div class="nav-content">

                            <i class="fa-regular fa-user"></i>

                            <span>
                                Profil
                            </span>

                        </div>

                    </a>

                </li>


            </ul>

        </div>


        <!-- LOGOUT -->
        <a href="{{ route('login') }}" class="logout-btn">

            <i class="fa-solid fa-right-from-bracket"></i>

            <span>
                Logout
            </span>

        </a>

    </aside>



    <!-- =====================================================
         MAIN WRAPPER
    ===================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">

                <!-- NOTIFICATION -->
            <a
                href="{{ route('notifikasi_bk') }}"
                class="topbar-icon"
                title="Notifikasi"
                aria-label="Buka notifikasi"
            >

                <i class="fa-regular fa-bell"></i>

            </a>


            <!-- USER -->
            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Guru BK' }}
                </span>

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
</div>

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
