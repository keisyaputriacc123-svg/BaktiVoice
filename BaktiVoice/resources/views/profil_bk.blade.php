
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Profil Guru BK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --background: #eaf1fb;
            --card-bg: #fff;
            --text-main: #2c4a8e;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --radius: 12px;
            --shadow: 0 4px 15px rgba(123,159,232,.08);
            --gradient-pastel: linear-gradient(135deg,#7b9fe8 0%,#9bc3f8 50%,#b8d7ff 100%);
            --gradient-button: linear-gradient(135deg,#628cdb 0%,#4772c7 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            color: var(--text-main);
            background: var(--background);
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px 16px;
            overflow-y: auto;
            background: var(--gradient-pastel);
            border-right: 1px solid rgba(255,255,255,.4);
            box-shadow: 4px 0 20px rgba(123,159,232,.15);
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
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,.05);
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: #1e3a70;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
            list-style: none;
        }

        .nav-item a,
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 16px;
            color: #274472;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            border-radius: 10px;
            transition: .25s ease;
        }

        .nav-item a:hover {
            background: rgba(255,255,255,.4);
            color: #102a56;
            transform: translateX(4px);
        }

        .nav-item.active > a {
            background: #fff;
            color: #3b62ac;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(60,98,172,.18);
        }

        .nav-item i,
        .logout-btn i {
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

        .logout-btn {
            margin-top: 16px;
            color: #e11d48;
            background: transparent;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,.5);
            color: #be123c;
        }

        /* MAIN & TOPBAR */
        .main-wrapper {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-width: 0;
            min-height: 100vh;
            margin-left: var(--sidebar-width);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 90;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            height: var(--topbar-height);
            min-height: var(--topbar-height);
            padding: 0 36px;
            background: var(--gradient-pastel);
            border-bottom: 1px solid rgba(255,255,255,.4);
            box-shadow: 0 4px 15px rgba(123,159,232,.12);
        }

        .topbar-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            color: #274472;
            font-size: 18px;
            text-decoration: none;
            border-radius: 50%;
        }

        .topbar-icon:hover {
            background: rgba(255,255,255,.4);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 30px;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            color: #3b62ac;
            background: #fff;
            border: 2px solid rgba(255,255,255,.8);
            border-radius: 50%;
        }

        .user-name {
            color: #1e3a70;
            font-size: 14px;
            font-weight: 700;
        }

        /* CONTENT */
        .content {
            flex: 1;
            padding: 36px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 18px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .breadcrumb a {
            color: #3b62ac;
            font-weight: 600;
            text-decoration: none;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .page-title {
            margin-bottom: 8px;
            color: #1e3a70;
            font-size: 28px;
            font-weight: 800;
        }

        .page-description {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .profile-layout {
            display: grid;
            grid-template-columns: 280px minmax(0,1fr);
            align-items: start;
            gap: 24px;
        }

        .card {
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid rgba(186,210,240,.6);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .identity-card {
            padding: 30px 24px;
            text-align: center;
        }

        .profile-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            margin: 0 auto 18px;
            color: #3b62ac;
            background: #eaf0ff;
            border: 4px solid white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(123,159,232,.15);
            font-size: 40px;
        }

        .identity-name {
            margin-bottom: 8px;
            color: #1e3a70;
            font-size: 19px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .identity-username {
            margin-bottom: 18px;
            color: var(--text-muted);
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            color: #3b62ac;
            background: #eaf0ff;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .identity-divider {
            height: 1px;
            margin: 24px 0;
            background: rgba(186,210,240,.6);
        }

        .identity-note {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .card-header {
            padding: 22px 24px;
            border-bottom: 1px solid rgba(186,210,240,.6);
        }

        .card-title {
            margin-bottom: 6px;
            color: #1e3a70;
            font-size: 17px;
            font-weight: 700;
        }

        .card-title i {
            margin-right: 8px;
            color: var(--primary);
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
            margin-bottom: 20px;
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-success {
            color: #166534;
            background: #dcfce7;
        }

        .alert-error {
            color: #991b1b;
            background: #fee2e2;
        }

        .alert ul {
            padding-left: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2,minmax(0,1fr));
            gap: 22px 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
            min-width: 0;
        }

        .full-width {
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
            color: #1e293b;
            background: #fff;
            border: 1px solid rgba(186,210,240,.8);
            border-radius: 8px;
            outline: none;
            font-size: 13px;
            transition: .2s;
        }

        .form-control:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123,159,232,.25);
        }

        .field-hint {
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid rgba(186,210,240,.6);
        }

        .privacy-note {
            max-width: 280px;
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: var(--gradient-button);
            border: none;
            box-shadow: 0 4px 12px rgba(98,140,219,.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(98,140,219,.4);
        }

        .btn-secondary {
            color: var(--text-muted);
            background: white;
            border: 1px solid rgba(186,210,240,.8);
        }

        .btn-secondary:hover {
            color: #1e3a70;
            border-color: #7b9fe8;
        }

        .security-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .security-icon {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            color: #3b62ac;
            background: #eaf0ff;
            border-radius: 10px;
            font-size: 18px;
        }

        .security-info {
            flex: 1;
            min-width: 0;
        }

        .security-info h3 {
            margin-bottom: 5px;
            color: #1e3a70;
            font-size: 14px;
        }

        .security-info p {
            color: var(--text-muted);
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 1000px) {
            .profile-layout {
                grid-template-columns: 230px minmax(0,1fr);
            }

            .content {
                padding: 26px;
            }
        }

        @media (max-width: 850px) {
            .profile-layout {
                grid-template-columns: 1fr;
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
                padding: 12px 8px;
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
                gap: 12px;
                padding: 0 14px;
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

            .full-width {
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

            .form-actions a,
            .form-actions button {
                flex: 1;
            }
        }
    </style>
</head>

<body>
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
                    <a href="{{ route('dashboard_bk') }}" title="Dashboard">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('LaporanSiswa_bk') }}" title="Laporan Siswa">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Laporan Siswa</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('monitoring_bk') }}" title="Monitoring">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Monitoring</span>
                    </a>
                </li>

<li class="nav-item">
    <a href="{{ route('notifikasi_bk') }}" class="nav-notification">
        <i class="fa-solid fa-bell"></i>
        <span>Notifikasi</span>
        <span class="notification-dot"></span>
    </a>
</li>

                <li class="nav-item active">
                    <a href="{{ route('profil_bk') }}" title="profil">
                        <i class="fa-regular fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            </ul>
        </div>

        <a href="{{ route('login') }}" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <a
                href="{{ route('notifikasi_bk') }}"
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
                    {{ Auth::user()->name ?? 'Guru BK' }}
                </span>
            </div>
        </header>

        <main class="content">
            <div class="breadcrumb">
                <a href="{{ route('dashboard_bk') }}">Dashboard</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px"></i>
                <span>Profil</span>
            </div>

            <section class="page-heading">
                <h1 class="page-title">Profil Guru BK</h1>
                <p class="page-description">
                    Lihat dan kelola informasi akun Guru BK di BaktiVoice.
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
                <section class="card identity-card">
                    <div class="profile-avatar">
                        <i class="fa-regular fa-user"></i>
                    </div>

                    <h2 class="identity-name">
                        {{ Auth::user()->name ?? 'Guru BK' }}
                    </h2>

                    <p class="identity-username">
                        @if (Auth::user()->username)
                            {{ '@' . Auth::user()->username }}
                        @else
                            Username belum diisi
                        @endif
                    </p>

                    <span class="role-badge">
                        <i class="fa-solid fa-shield-halved"></i>
                        Guru BK
                    </span>

                    <div class="identity-divider"></div>

                    <p class="identity-note">
                        <i class="fa-solid fa-lock"></i>
                        <br>
                        Jaga kerahasiaan akun dan pastikan informasi
                        profil selalu benar.
                    </p>
                </section>

                <div>
                    <section class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fa-regular fa-id-card"></i>
                                Informasi Pribadi
                            </h2>
                            <p class="card-subtitle">
                                Informasi akun Guru BK yang sedang digunakan.
                            </p>
                        </div>

                        <div class="card-body">
                            <form id="profileForm">
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
                                            maxlength="100"
                                            required
                                        >
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
                                            maxlength="100"
                                            required
                                        >
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
                                            maxlength="100"
                                            required
                                        >
                                        <span class="field-hint">
                                            Gunakan alamat email yang aktif.
                                        </span>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <p class="privacy-note">
                                        <i class="fa-solid fa-lock"></i>
                                        Role Guru BK tidak dapat diubah
                                        melalui halaman profil.
                                    </p>

                                    <div class="form-actions">
                                        <a
                                            href="{{ route('dashboard_bk') }}"
                                            class="btn-secondary"
                                        >
                                            Batal
                                        </a>

                                        <button
                                            type="button"
                                            class="btn-primary"
                                            id="saveButton"
                                        >
                                            <i class="fa-solid fa-floppy-disk"></i>
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>

                    <section class="card" style="margin-top:24px">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fa-solid fa-shield-halved"></i>
                                Keamanan Akun
                            </h2>
                            <p class="card-subtitle">
                                Jaga keamanan akses akun Guru BK.
                            </p>
                        </div>

                        <div class="card-body">
                            <div class="security-row">
                                <div class="security-icon">
                                    <i class="fa-solid fa-key"></i>
                                </div>
                                <div class="security-info">
                                    <h3>Password Akun</h3>
                                    <p>
                                        Password tidak ditampilkan demi keamanan.
                                        Jangan membagikan password kepada orang lain.
                                        Fitur ubah password dapat ditambahkan
                                        setelah fitur profil terhubung.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('saveButton').addEventListener('click', function () {
            alert('Fitur simpan profil belum dihubungkan ke database.');
        });
    </script>
</body>
</html>
