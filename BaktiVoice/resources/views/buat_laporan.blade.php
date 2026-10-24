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
            --primary-hover: #7b94d1;
            --background: #eaf1fb; /* Background main content abu-biru soft pastel */
            --card-bg: #ffffff;
            --border: rgba(186, 210, 240, 0.5);
            --text-main: #2c4a8e;
            --text-muted: #64748b;

            --font-family: 'Inter', sans-serif;

            --sidebar-width: 250px;
            --topbar-height: 70px;

            --radius: 12px;

            --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);

            /* Gradasi Biru Pastel Favorit Kamu */
            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
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
           SIDEBAR (PASTEL BLUE KESUKAAN KAMU)
        ===================================================== */

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

            padding: 0 12px 24px 12px;
        }

        .brand-logo-img {
            width: 60px !important;
            height: 60px !important;
            max-width: 60px !important;

            background-color: #ffffff;
            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

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
            background-color: rgba(255, 255, 255, 0.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active > a {
            background-color: #ffffff;
            color: #3b62ac;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(60, 98, 172, 0.18);
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

            color: #e11d48;
            text-decoration: none;

            font-weight: 700;
            font-size: 14px;

            border-radius: 10px;

            transition: all 0.2s ease;

            margin-top: 16px;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: #be123c;
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
            background-color: var(--background) !important;
        }


        /* =====================================================
           TOPBAR (PASTEL BLUE KESUKAAN KAMU)
        ===================================================== */

        .topbar {
            height: var(--topbar-height);

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

        .topbar-icon {
            color: #274472;

            font-size: 18px;

            cursor: pointer;

            position: relative;

            padding: 8px;

            border-radius: 50%;

            transition: all 0.2s ease;
        }

        .topbar-icon:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #102a56;
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


        /* =====================================================
        MAIN CONTENT
        ===================================================== */

        .content {
            padding: 36px;

            flex: 1;
            background-color: var(--background) !important;
        }



        .page-title {
            font-size: 28px;

            font-weight: 800;

            color: #1e293b;

            margin-bottom: 20px;
        }


  /* =====================================================
           CARD PEMBUNGKUS FORM LAPORAN
        ===================================================== */
        .report-card {
            background: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 32px;
            width: 100%;
            max-width: 1150px;
        }

        .report-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1e3a70;
            margin-bottom: 8px;
            padding-left: 2px;
        }

        .required {
            color: #dc2626;
        }

        /* =====================================================
           INPUT, SELECT, TEXTAREA (DIPERHALUS & RADIUS KONSISTEN)
        ===================================================== */
        .form-input {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            background-color: #ffffff;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            color: #1e293b;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input::placeholder {
            color: #94a3b8;

            opacity: 1;
        }

        .form-input:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        .select-wrapper {
            position: relative;
        }

        .form-select {
            width: 100%;


            height: 52px;

            padding: 0 52px 0 13px;


            height: 48px;
            padding: 0 45px 0 16px;

            background-color: #ffffff;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            color: #1e293b;
            appearance: none;
            cursor: pointer;
        }

        .form-select:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        .select-arrow {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;


            font-size: 18px;


            font-size: 16px;

            pointer-events: none;
        }

        .form-textarea {
            width: 100%;
            min-height: 120px;
            padding: 14px 16px;
            resize: vertical;
            background-color: #ffffff;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            line-height: 1.6;
            color: #1e293b;
        }

        .form-textarea::placeholder {
            color: #94a3b8;
            opacity: 1;
        }

        .form-textarea:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.2);
        }

        /* =====================================================
           PRIVASI
        ===================================================== */
        .privacy-section {
            margin-top: 24px;
            margin-bottom: 24px;
        }

        .privacy-title {
            font-size: 14px;
            font-weight: 600;
            color: #1e3a70;
            margin-bottom: 12px;
        }

        .privacy-options {
            display: flex;
            align-items: center;
            gap: 36px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 14px;
            color: #334155;
            font-weight: 500;
        }

        .radio-option input {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #94a3b8;
            border-radius: 50%;
            background-color: #ffffff;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }

        .radio-option input:checked {
            border-color: #3b62ac;
        }

        .radio-option input:checked::after {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #496cbd;
            background-color: #3b62ac;
            top: 3px;
            left: 3px;
        }

        /* =====================================================
            BUKTI PENDUKUNG
        ===================================================== */
        .evidence-section {
            margin-top: 20px;
        }

        .evidence-title {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1e3a70;
            margin-bottom: 12px;
        }

        .upload-area {
            width: 100%;
            max-width: 100%;
            height: 160px;
            border: 2px dashed rgba(150, 172, 224, 0.8);
            background-color: #f8fafc;
            border-radius: var(--radius);
            display: flex;
            flex-direction: column;
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

        .upload-area:hover {
            background-color: #f1f5f9;
            border-color: #7b9fe8;
        }

        .upload-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #eaf0ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            color: #3b62ac;
            font-size: 18px;
        }

        .upload-text {
            font-size: 14px;
            font-weight: 600;
            color: #1e3a70;
            margin-bottom: 4px;
        }

        .upload-format {
            font-size: 12px;
            color: var(--text-muted);
        }

        .file-name {
            margin-top: 8px;
            font-size: 13px;
            color: #3b62ac;
            font-weight: 600;
            display: none;
        }

        /* =====================================================
           TOMBOL KIRIM (GRADASI PASTEL BLUE)
        ===================================================== */
        .form-bottom {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 30px;
            border-top: 1px solid rgba(186, 210, 240, 0.6);
            padding-top: 24px;
        }

        .btn-submit {
            min-width: 180px;
            height: 48px;
            padding: 0 24px;
            background: linear-gradient(135deg, #628cdb 0%, #4772c7 100%);
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(98, 140, 219, 0.3);
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(98, 140, 219, 0.4);
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

                    <a href="{{ route('riwayat_laporan') }}">

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

                    <a href="{{ route('notifikasi_siswa') }}">

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

                    <a href="{{ route('profil_siswa') }}">

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

        <!-- KODE BARU (pake ikon pitu/logout kaya wakasek) -->
<a href="{{ route('login') }}" class="logout-btn">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Logout</span>
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
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- CARD FORM LAPORAN -->
            <div class="report-card">

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
                            placeholder="Masukkan Judul Laporan"
                            value="{{ old('judul_laporan') }}"
                            required
                        >
                    </div>

                    <!-- KATEGORI DINAMIS -->
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
                                <option value="" disabled
                                    {{ old('id_kategori') ? '' : 'selected' }}>
                                    Pilih Kategori
                                </option>

                                @if(isset($kategoris))
                                    @foreach($kategoris as $kat)
                                        <option
                                            value="{{ $kat->id_kategori ?? $kat->id }}"
                                            {{ old('id_kategori') == ($kat->id_kategori ?? $kat->id) ? 'selected' : '' }}
                                        >
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
                        >{{ old('isi_laporan') }}</textarea>
                    </div>

                    <!-- PRIVASI -->
                    <div class="privacy-section">
                        <div class="privacy-title">Privasi</div>

                        <div class="privacy-options">
                            <label class="radio-option">
                                <input
                                    type="radio"
                                    name="privasi"
                                    value="identitas"
                                    {{ old('privasi', 'identitas') === 'identitas' ? 'checked' : '' }}
                                >
                                <span>Tampilkan Identitas</span>
                            </label>

                            <label class="radio-option">
                                <input
                                    type="radio"
                                    name="privasi"
                                    value="anonim"
                                    {{ old('privasi') === 'anonim' ? 'checked' : '' }}
                                >
                                <span>Kirim Secara Anonim</span>
                            </label>
                        </div>
                    </div>

                    <!-- BUKTI PENDUKUNG -->
                    <div class="evidence-section">
                        <label class="evidence-title">
                            Bukti Pendukung
                        </label>

                        <label for="file-upload" class="upload-area">
                            <div class="upload-icon">
                                <i class="fa-solid fa-arrow-up"></i>
                            </div>

                            <div class="upload-text">
                                Klik Untuk Mengunggah File
                            </div>

                            <div class="upload-format">
                                IMG, MP4, DOCX
                            </div>

                            <div class="file-name" id="file-name"></div>
                        </label>

                        <input
                            type="file"
                            id="file-upload"
                            name="bukti_pendukung"
                            accept=".jpg,.jpeg,.png,.webp,.mp4,.doc,.docx"
                            hidden
                        >
                    </div>

                    <!-- TOMBOL KIRIM -->
                    <div class="form-bottom">
                        <button type="submit" class="btn-submit">
                            Kirim Laporan
                        </button>
                    </div>

                </form>
            </div>


        </main>


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
