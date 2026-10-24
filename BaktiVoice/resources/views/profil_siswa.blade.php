<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Profil Siswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --primary-hover: #7b94d1;
            --background: #eaf1fb; /* Background main content disamakan (soft pastel blue-grey) */
            --card-bg: #ffffff;
            --border: rgba(186, 210, 240, 0.5);
            --text-main: #2c4a8e;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 12px;
            --shadow: 0 4px 15px rgba(123, 159, 232, 0.08);

            /* Gradasi Biru Pastel Identik */
            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background) !important;
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* =====================================================
           SIDEBAR (PASTEL BLUE - SAMA PERSIS)
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
            padding: 0 12px 24px;
        }

        .brand-logo-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: #ffffff;
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
            transition: .25s ease;
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
            background: #ffffff;
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
            margin-top: 16px;
            color: #e11d48;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #be123c;
        }

        /* =====================================================
           MAIN WRAPPER & TOPBAR (PASTEL BLUE - SAMA PERSIS)
        ===================================================== */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            background-color: var(--background) !important;
        }

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

        .topbar-icon {
            color: #274472;
            font-size: 18px;
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: all 0.2s ease;
            text-decoration: none;
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
           CONTENT (PROFIL)
        ===================================================== */
        .content {
            padding: 36px;
            flex: 1;
            background-color: var(--background) !important;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            line-height: 1.7;
            color: var(--text-muted);
        }

        .breadcrumb {
            display: flex;
            gap: 9px;
            align-items: center;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 18px;
        }

        .breadcrumb a {
            color: #3b62ac;
            text-decoration: none;
            font-weight: 600;
        }

        .profile-layout {
            display: grid;
            grid-template-columns: 300px minmax(0, 1fr);
            gap: 24px;
            align-items: start;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid rgba(186, 210, 240, 0.6);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .identity-card {
            padding: 30px 24px;
            text-align: center;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #eaf0ff;
            color: #3b62ac;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 12px rgba(123, 159, 232, 0.15);
        }

        .identity-name {
            font-size: 19px;
            font-weight: 700;
            color: #1e3a70;
            overflow-wrap: anywhere;
            margin-bottom: 8px;
        }

        .identity-username {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 18px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #eaf0ff;
            color: #3b62ac;
            border-radius: 20px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .identity-divider {
            height: 1px;
            background: rgba(186, 210, 240, 0.6);
            margin: 24px 0;
        }

        .identity-note {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .card-header {
            padding: 22px 24px;
            border-bottom: 1px solid rgba(186, 210, 240, 0.6);
        }

        .card-title {
            font-size: 17px;
            color: #1e3a70;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .card-subtitle {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .card-body {
            padding: 24px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert ul {
            padding-left: 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            color: #1e3a70;
            font-size: 13px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 8px;
            outline: none;
            color: #1e293b;
            background: #fff;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.25);
        }

        .form-control[readonly] {
            background: #f8fafc;
            color: #64748b;
            cursor: not-allowed;
        }

        .field-hint {
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .field-error {
            color: #dc2626;
            font-size: 12px;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            border-top: 1px solid rgba(186, 210, 240, 0.6);
            margin-top: 28px;
            padding-top: 22px;
        }

        .privacy-note {
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.7;
            max-width: 300px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            background: linear-gradient(135deg, #628cdb 0%, #4772c7 100%);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(98, 140, 219, 0.3);
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(98, 140, 219, 0.4);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid rgba(186, 210, 240, 0.8);
            border-radius: 8px;
            padding: 12px 16px;
            background: #fff;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #7b9fe8;
            color: #1e3a70;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .security-card {
            margin-top: 24px;
        }

        .security-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .security-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #eaf0ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b62ac;
            font-size: 18px;
        }

        .security-info {
            flex: 1;
            min-width: 0;
        }

        .security-info h3 {
            color: #1e3a70;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .security-info p {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .profile-layout {
                grid-template-columns: 240px minmax(0, 1fr);
            }

            .content {
                padding: 26px;
            }
        }

        @media (max-width: 850px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .identity-card {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .identity-divider {
                width: 100%;
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
                display: none !important;
            }

            .nav-item a,
            .logout-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .nav-content {
                justify-content: center;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 20px;
            }
        }

        @media (max-width: 550px) {
            .topbar {
                padding: 0 14px;
                gap: 12px;
            }

            .user-name {
                display: none;
            }

            .page-title {
                font-size: 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .card-header,
            .card-body {
                padding: 18px;
            }

            .form-footer {
                align-items: stretch;
            }

            .form-actions {
                width: 100%;
            }

            .form-actions button,
            .form-actions a {
                flex: 1;
            }

            .security-row {
                align-items: flex-start;
                flex-wrap: wrap;
            }
        }
        </style>
        <head>

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

                <li class="nav-item">
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

                <li class="nav-item active">
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
            <a
                href="{{ route('notifikasi_siswa') }}"
                class="topbar-icon"
                title="Notifikasi"
                aria-label="Notifikasi"
            >
                <i class="fa-regular fa-bell"></i>
            </a>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="user-name">
                    {{ Auth::user()->name ?? 'Nama Siswa' }}
                </span>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="content">

            <div class="breadcrumb">
                <a href="{{ route('dashboard_siswa') }}">Dashboard</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px"></i>
                <span>Profil</span>
            </div>

            <section class="page-heading">
                <h1 class="page-title">Profil Saya</h1>
                <p class="page-description">
                    Lihat dan kelola informasi akunmu di BaktiVoice.
                </p>
            </section>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data yang kamu masukkan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-layout">

                <!-- KARTU IDENTITAS -->
                <section class="card identity-card">
                    <div class="profile-avatar">
                        <i class="fa-regular fa-user"></i>
                    </div>

                    <h2 class="identity-name">
                        {{ Auth::user()->name ?? 'Nama Siswa' }}
                    </h2>

                    <p class="identity-username">
                        @if (Auth::check() && Auth::user()->username)
                            {{ '@' . Auth::user()->username }}
                        @else
                            Username belum diisi
                        @endif
                    </p>

                    <span class="role-badge">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Siswa BaktiVoice
                    </span>

                    <div class="identity-divider"></div>

                    <p class="identity-note">
                        <i class="fa-solid fa-shield-halved"></i>
                        <br>
                        Jaga kerahasiaan akunmu dan pastikan informasi
                        yang kamu masukkan sudah benar.
                    </p>
                </section>

                <!-- INFORMASI PRIBADI -->
                <div>

                    <section class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fa-regular fa-id-card"
                                   style="color:#96ace0;margin-right:8px"></i>
                                Informasi Pribadi
                            </h2>
                            <p class="card-subtitle">
                                Perbarui informasi akun yang ingin kamu gunakan.
                            </p>
                        </div>

                        <div class="card-body">
                            <form
                                action="{{ route('profil_siswa.update') }}"
                                method="POST"
                            >
                                @csrf
                                @method('PUT')

                                <div class="form-grid">

                                    <div class="form-group">
                                        <label for="name" class="form-label">
                                            Nama Lengkap
                                        </label>
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            class="form-control"
                                            value="{{ old('name', Auth::user()->name) }}"
                                            maxlength="255"
                                            required
                                        >
                                        @error('name')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="form-label">
                                            Username
                                        </label>
                                        <input
                                            type="text"
                                            id="username"
                                            name="username"
                                            class="form-control"
                                            value="{{ old('username', Auth::user()->username) }}"
                                            maxlength="255"
                                            required
                                        >
                                        @error('username')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group full-width">
                                        <label for="email" class="form-label">
                                            Alamat Email
                                        </label>
                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ old('email', Auth::user()->email) }}"
                                            maxlength="255"
                                            required
                                        >
                                        <span class="field-hint">
                                            Gunakan email yang aktif jika kamu memilikinya.
                                        </span>
                                        @error('email')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group full-width">
                                        <label for="nisn" class="form-label">
                                            NISN
                                        </label>
                                        <input
                                            type="text"
                                            id="nisn"
                                            name="nisn"
                                            class="form-control"
                                            value="{{ old('nisn', Auth::user()->nisn) }}"
                                            maxlength="20"
                                            inputmode="numeric"
                                        >
                                        <span class="field-hint">
                                            Pastikan NISN sesuai dengan data sekolah.
                                        </span>
                                        @error('nisn')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-footer">
                                    <p class="privacy-note">
                                        <i class="fa-solid fa-lock"></i>
                                        Informasi akun digunakan sesuai kebutuhan
                                        layanan BaktiVoice.
                                    </p>

                                    <div class="form-actions">
                                        <a
                                            href="{{ route('dashboard_siswa') }}"
                                            class="btn-secondary"
                                        >
                                            Batal
                                        </a>

                                        <button type="submit" class="btn-primary">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>

<!-- KEAMANAN AKUN -->
<section class="card security-card">
    <div class="card-header">
        <h2 class="card-title">
            <i class="fa-solid fa-shield-halved" style="color:#96ace0;margin-right:8px"></i>
            Keamanan Akun
        </h2>
        <p class="card-subtitle">
            Perbarui password untuk menjaga keamanan akun.
        </p>
    </div>

    <div class="card-body">
        <!-- Alert Info Box -->
        <div class="alert-info-box" style="background-color: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 8px; padding: 12px 16px; display: flex; gap: 10px; margin-bottom: 20px;">
            <i class="fa-solid fa-circle-info" style="color: #2563eb; margin-top: 2px;"></i>
            <div style="font-size: 13px; color: #1e3a70; line-height: 1.4;">
                <strong>Jaga kerahasiaan password kamu.</strong><br>
                Gunakan password yang kuat dan jangan membagikannya kepada orang lain.
            </div>
        </div>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Password Lama -->
            <div class="form-group" style="margin-bottom: 18px;">
                <label style="display: block; font-size: 13px; font-weight: 700; color: #1e3a70; margin-bottom: 8px;">
                    Password Lama <span style="color: #ef4444;">*</span>
                </label>
                <div class="input-wrapper" style="position: relative; display: flex; align-items: center;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 14px; color: #94a3b8; font-size: 14px;"></i>
                    <input type="password" name="current_password" class="form-input" placeholder="Masukkan password lama" style="width: 100%; padding: 12px 40px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 14px; color: #334155; background-color: #f8fafc;" required>
                    <i class="fa-regular fa-eye" style="position: absolute; right: 14px; color: #94a3b8; font-size: 14px; cursor: pointer;"></i>
                </div>
            </div>

            <!-- Password Baru -->
            <div class="form-group" style="margin-bottom: 18px;">
                <label style="display: block; font-size: 13px; font-weight: 700; color: #1e3a70; margin-bottom: 8px;">
                    Password Baru <span style="color: #ef4444;">*</span>
                </label>
                <div class="input-wrapper" style="position: relative; display: flex; align-items: center;">
                    <i class="fa-solid fa-key" style="position: absolute; left: 14px; color: #94a3b8; font-size: 14px;"></i>
                    <input type="password" name="password" class="form-input" placeholder="Masukkan password baru" style="width: 100%; padding: 12px 40px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 14px; color: #334155; background-color: #f8fafc;" required>
                    <i class="fa-regular fa-eye" style="position: absolute; right: 14px; color: #94a3b8; font-size: 14px; cursor: pointer;"></i>
                </div>
                <div style="font-size: 11px; color: #94a3b8; margin-top: 6px;">Minimal 8 karakter.</div>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="form-group" style="margin-bottom: 18px;">
                <label style="display: block; font-size: 13px; font-weight: 700; color: #1e3a70; margin-bottom: 8px;">
                    Konfirmasi Password Baru <span style="color: #ef4444;">*</span>
                </label>
                <div class="input-wrapper" style="position: relative; display: flex; align-items: center;">
                    <i class="fa-solid fa-key" style="position: absolute; left: 14px; color: #94a3b8; font-size: 14px;"></i>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password baru" style="width: 100%; padding: 12px 40px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 14px; color: #334155; background-color: #f8fafc;" required>
                    <i class="fa-regular fa-eye" style="position: absolute; right: 14px; color: #94a3b8; font-size: 14px; cursor: pointer;"></i>
                </div>
            </div>

            <button type="submit" class="btn-submit" style="background: linear-gradient(135deg, #4772c7 0%, #3b62ac 100%); color: #ffffff; border: none; padding: 12px 24px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(59, 98, 172, 0.25);">
                <i class="fa-solid fa-key"></i> Ubah Password
            </button>
        </form>
    </div>
</section>  

                </div>
            </div>
        </main>
    </div>

</body>
</html>
