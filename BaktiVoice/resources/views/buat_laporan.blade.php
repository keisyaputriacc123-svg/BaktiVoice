<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Buat Laporan</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- FontAwesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <style>

        :root {
            --primary: #96ace0;
            --primary-hover: #7f99d4;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-muted: #64748b;

            --font-family: 'Inter', sans-serif;

            --sidebar-width: 250px;
            --topbar-height: 70px;

            --radius: 12px;

            --shadow:
                0 1px 3px 0 rgba(119, 5, 5, 0.05),
                0 1px 2px 0 rgba(0, 0, 0, 0.03);
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


        /* =====================================================
        SIDEBAR
        ===================================================== */

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

            width: 100%;

            padding: 12px 16px;

            color: var(--text-muted);

            text-decoration: none;

            font-weight: 500;

            font-size: 14px;

            border-radius: 8px;

            transition: all 0.2s ease;
        }


        .nav-content {
            display: flex;
            align-items: center;

            gap: 12px;
        }


        .nav-item a:hover {
            background-color: #f1f5f9;

            color: var(--text-main);
        }


        .nav-item.active > a {
            background-color: var(--primary);

            color: #ffffff;

            font-weight: 600;
        }


        .nav-item i {
            font-size: 16px;

            width: 20px;

            text-align: center;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

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
        }


        .logout-btn:hover {
            background-color: #fef2f2;
        }


        /* =====================================================
           MAIN WRAPPER
        ===================================================== */

        .main-wrapper {
            margin-left: var(--sidebar-width);

            flex: 1;

            display: flex;
            flex-direction: column;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

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


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .content {
            padding: 36px;

            flex: 1;
        }


        .page-title {
            font-size: 28px;

            font-weight: 800;

            color: #1e293b;

            margin-bottom: 20px;
        }


        /* =====================================================
           FORM LAPORAN
        ===================================================== */

        .report-form {
            width: 100%;

            max-width: 1150px;
        }


        .form-group {
            margin-bottom: 18px;
        }


        .form-label {
            display: block;

            font-size: 16px;

            font-weight: 500;

            color: #1e293b;

            margin-bottom: 7px;

            padding-left: 4px;
        }


        .required {
            color: #dc2626;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .form-input {
            width: 100%;

            height: 48px;

            padding: 0 13px;

            background-color: #ffffff;

            border: 1px solid #cbd5e1;

            border-radius: 0;

            outline: none;

            font-size: 15px;

            color: #1e293b;

            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }


        .form-input::placeholder {
            color: #94a3b8;

            opacity: 1;
        }


        .form-input:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 2px rgba(150, 172, 224, 0.2);
        }


        /* =====================================================
           SELECT
        ===================================================== */

        .select-wrapper {
            position: relative;
        }


        .form-select {
            width: 100%;

            height: 52px;

            padding: 0 52px 0 13px;

            background-color: #ffffff;

            border: 1px solid #cbd5e1;

            border-radius: 0;

            outline: none;

            font-size: 15px;

            color: #1e293b;

            appearance: none;

            cursor: pointer;
        }


        .select-arrow {
            position: absolute;

            right: 22px;

            top: 50%;

            transform: translateY(-50%);

            color: #64748b;

            font-size: 18px;

            pointer-events: none;
        }


        /* =====================================================
           TEXTAREA
        ===================================================== */

        .form-textarea {
            width: 100%;

            min-height: 110px;

            padding: 12px 13px;

            resize: vertical;

            background-color: #ffffff;

            border: 1px solid #cbd5e1;

            border-radius: 0;

            outline: none;

            font-size: 15px;

            line-height: 1.5;

            color: #1e293b;
        }


        .form-textarea::placeholder {
            color: #94a3b8;

            opacity: 1;
        }


        .form-textarea:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 2px rgba(150, 172, 224, 0.2);
        }


        /* =====================================================
           PRIVASI
        ===================================================== */

        .privacy-section {
            margin-top: 20px;

            margin-bottom: 22px;
        }


        .privacy-title {
            font-size: 16px;

            font-weight: 500;

            color: #1e293b;

            margin-bottom: 15px;
        }


        .privacy-options {
            display: flex;

            align-items: center;

            gap: 48px;

            padding-left: 5px;
        }


        .radio-option {
            display: flex;

            align-items: center;

            gap: 8px;

            cursor: pointer;

            font-size: 15px;

            color: #1e293b;
        }


        .radio-option input {
            appearance: none;
            -webkit-appearance: none;

            width: 22px;
            height: 22px;

            border: 1px solid #64748b;

            border-radius: 50%;

            background-color: #ffffff;

            cursor: pointer;

            position: relative;
        }


        .radio-option input:checked::after {
            content: "";

            position: absolute;

            width: 14px;
            height: 14px;

            border-radius: 50%;

            background-color: #496cbd;

            top: 3px;
            left: 3px;
        }


        /* =====================================================
           BUKTI PENDUKUNG
        ===================================================== */

        .evidence-section {
            margin-top: 10px;

            margin-left: 5px;
        }


        .evidence-title {
            display: block;

            font-size: 16px;

            font-weight: 500;

            color: #1e293b;

            margin-bottom: 20px;
        }


        .upload-area {
            width: 607px;

            max-width: 100%;

            height: 181px;

            border: 1px solid #94a3b8;

            background-color: #ffffff;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition:
                background 0.2s,
                border-color 0.2s;
        }


        .upload-area:hover {
            background-color: #f8fafc;

            border-color: var(--primary);
        }


        .upload-icon {
            width: 42px;
            height: 42px;

            border: 1px solid #94a3b8;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 8px;

            color: #64748b;

            font-size: 20px;
        }


        .upload-text {
            font-size: 15px;

            font-weight: 500;

            color: #1e293b;

            margin-bottom: 3px;
        }


        .upload-format {
            font-size: 12px;

            color: #475569;
        }


        .file-name {
            margin-top: 10px;

            font-size: 13px;

            color: var(--text-main);

            display: none;
        }

        /* ALERT STYLING */
        .alert-success {
            padding: 14px 18px;
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-error {
            padding: 14px 18px;
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
        }


        /* =====================================================
           BUTTON KIRIM
        ===================================================== */

        .form-bottom {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            margin-top: 25px;

            padding-right: 28px;
        }


        .btn-submit {
            min-width: 180px;

            height: 52px;

            padding: 0 24px;

            background-color: #f8fafc;

            border: 1px solid #94a3b8;

            color: #334155;

            font-size: 16px;

            font-weight: 500;

            cursor: pointer;

            transition: all 0.2s ease;
        }


        .btn-submit:hover {
            background-color: var(--primary);

            border-color: var(--primary);

            color: #ffffff;

            transform: translateY(-1px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .form-bottom {
                justify-content: flex-end;

                padding-right: 0;
            }

        }


        @media (max-width: 768px) {

            .sidebar {
                width: 70px;

                padding: 16px 8px;
            }


            .brand-name,
            .nav-item span,
            .logout-btn span {
                display: none !important;
            }


            .main-wrapper {
                margin-left: 70px;
            }


            .content {
                padding: 20px;
            }


            .page-title {
                font-size: 24px;
            }


            .privacy-options {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }


            .upload-area {
                height: 160px;
            }

        }


        @media (max-width: 550px) {

            .topbar {
                padding: 0 16px;
            }


            .user-name {
                display: none;
            }


            .content {
                padding: 18px;
            }


            .page-title {
                font-size: 22px;

                margin-bottom: 18px;
            }


            .form-label,
            .privacy-title,
            .evidence-title {
                font-size: 14px;
            }


            .form-input {
                height: 45px;

                font-size: 14px;
            }


            .form-select {
                height: 52px;

                font-size: 14px;
            }


            .form-textarea {
                min-height: 120px;

                font-size: 14px;
            }


            .upload-area {
                height: 150px;
            }


            .btn-submit {
                width: 100%;

                height: 48px;
            }


            .form-bottom {
                margin-top: 25px;

                padding-right: 0;
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


            <!-- NAVIGASI -->

            <ul class="nav-menu">


                <!-- DASHBOARD -->

                <li class="nav-item">

                    <a href="{{ route('dashboard_siswa') }}">

                        <div class="nav-content">

                            <i class="fa-solid fa-house"></i>

                            <span>
                                Dashboard
                            </span>

                        </div>

                    </a>

                </li>


                <!-- BUAT LAPORAN -->

                <li class="nav-item active">

                    <a href="{{ route('buat_laporan') }}">

                        <div class="nav-content">

                            <i class="fa-regular fa-file-lines"></i>

                            <span>
                                Buat Laporan
                            </span>

                        </div>

                    </a>

                </li>


                <!-- RIWAYAT LAPORAN -->

                <li class="nav-item">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-solid fa-clock-rotate-left"></i>

                            <span>
                                Riwayat Laporan
                            </span>

                        </div>

                    </a>

                </li>


                <!-- NOTIFIKASI -->

                <li class="nav-item">

                    <a href="#">

                        <div class="nav-content">

                            <i class="fa-regular fa-bell"></i>

                            <span>
                                Notifikasi
                            </span>

                        </div>

                    </a>

                </li>


                <!-- PROFIL -->

                <li class="nav-item">

                    <a href="#">

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

        <a
            href="{{ route('login') }}"
            class="logout-btn"
        >

            <i class="fa-solid fa-xmark"></i>

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

            <div
                class="topbar-icon"
                title="Notifikasi"
            >

                <i class="fa-regular fa-bell"></i>

            </div>


            <!-- USER -->

            <div class="user-profile">

                <div class="avatar">

                    <i class="fa-regular fa-user"></i>

                </div>


                <span class="user-name">

                    {{ Auth::user()->name ?? 'Nama Siswa' }}

                </span>

            </div>

        </header>



        <!-- =================================================
             MAIN CONTENT
        ================================================= -->

        <main class="content">


            <!-- PAGE TITLE -->

            <h1 class="page-title">
                Buat Laporan
            </h1>

            <!-- NOTIFIKASI SUKSES / ERROR -->
            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
                </div>
            @endif


            <!-- =================================================
                 FORM LAPORAN
            ================================================= -->

            <form
                class="report-form"
                action="{{ route('laporan.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- JUDUL LAPORAN -->

                <div class="form-group">

                    <label class="form-label">

                        Judul Laporan<span class="required">*</span>

                    </label>


                    <input
                        type="text"
                        name="judul_laporan"
                        class="form-input"
                        placeholder="Masukan Judul Laporan"
                        required
                    >

                </div>



                <!-- KATEGORI (DINAMIS DARI DATABASE) -->

                <div class="form-group">

                    <label class="form-label">

                        Pilih Kategori<span class="required">*</span>

                    </label>


                    <div class="select-wrapper">

                        <select
                            name="id_kategori"
                            class="form-select"
                            required
                        >

                            <option value="" selected disabled>
                                Pilih Kategori
                            </option>

                            @if(isset($kategoris) && count($kategoris) > 0)
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id_kategori ?? $kat->id }}">
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            @endif

                        </select>


                        <i class="fa-solid fa-chevron-down select-arrow"></i>

                    </div>

                </div>



                <!-- ISI LAPORAN -->

                <div class="form-group">

                    <label class="form-label">

                        Isi Laporan<span class="required">*</span>

                    </label>


                    <textarea
                        name="isi_laporan"
                        class="form-textarea"
                        placeholder="Jelaskan Keluhan atau Saranmu"
                        required
                    ></textarea>

                </div>



                <!-- =================================================
                     PRIVASI
                ================================================= -->

                <div class="privacy-section">

                    <div class="privacy-title">
                        Privasi
                    </div>


                    <div class="privacy-options">


                        <!-- TAMPILKAN IDENTITAS -->

                        <label class="radio-option">

                            <input
                                type="radio"
                                name="privasi"
                                value="identitas"
                                checked
                            >

                            <span>
                                Tampilkan Identitas
                            </span>

                        </label>



                        <!-- ANONIM -->

                        <label class="radio-option">

                            <input
                                type="radio"
                                name="privasi"
                                value="anonim"
                            >

                            <span>
                                Kirim Secara Anonim
                            </span>

                        </label>


                    </div>

                </div>



                <!-- =================================================
                     BUKTI PENDUKUNG
                ================================================= -->

                <div class="evidence-section">

                    <label class="evidence-title">
                        Bukti Pendukung
                    </label>


                    <label
                        for="file-upload"
                        class="upload-area"
                    >

                        <div class="upload-icon">

                            <i class="fa-solid fa-arrow-up"></i>

                        </div>


                        <div class="upload-text">
                            Klik Untuk Mengunggah file
                        </div>


                        <div class="upload-format">
                            IMG, MP4, DOCX
                        </div>


                        <div
                            class="file-name"
                            id="file-name"
                        ></div>

                    </label>


                    <input
                        type="file"
                        id="file-upload"
                        name="bukti_pendukung"
                        accept=".jpg,.jpeg,.png,.webp,.mp4,.doc,.docx"
                        hidden
                    >

                </div>



                <!-- =================================================
                     TOMBOL KIRIM
                ================================================= -->

                <div class="form-bottom">

                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Kirim Laporan
                    </button>

                </div>


            </form>


        </main>

    </div>



    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        const fileInput =
            document.getElementById('file-upload');

        const fileName =
            document.getElementById('file-name');


        fileInput.addEventListener('change', function () {

            if (this.files.length > 0) {

                fileName.textContent =
                    this.files[0].name;

                fileName.style.display =
                    'block';

            } else {

                fileName.textContent = '';

                fileName.style.display =
                    'none';

            }

        });

    </script>


</body>

</html>
