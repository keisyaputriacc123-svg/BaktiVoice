<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Profil Wakasek</title>

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

        /* SIDEBAR PERSIS DASHBOARD */
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

        /* LOGOUT PERSIS DASHBOARD */
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

        /* TOPBAR PERSIS DASHBOARD */
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

        /* CONTENT & STYLING PROFIL */
        .content {
            padding: 36px;
            min-height: calc(100vh - var(--topbar-height));
            background: var(--background);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .breadcrumb a {
            color: #3b62ac;
            text-decoration: none;
            font-weight: 600;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 6px;
        }

        .welcome-text {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 28px;
            line-height: 1.7;
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            margin-bottom: 24px;
            border-radius: var(--radius);
            font-size: 13px;
            box-shadow: var(--shadow);
        }

        .alert-success {
            background: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .alert ul {
            margin-top: 6px;
            padding-left: 18px;
        }

        .profile-banner {
            background: var(--gradient-pastel);
            border-radius: var(--radius);
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 24px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.6);
            margin-bottom: 28px;
        }

        .profile-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ffffff;
            border: 3px solid rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 800;
            color: #3b62ac;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            flex-shrink: 0;
        }

        .profile-banner-info h2 {
            font-size: 22px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 4px;
        }

        .profile-banner-info p {
            font-size: 13px;
            color: #274472;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .role-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.6);
            color: #102a56;
            font-size: 12px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #eaf0ff;
            color: #3b62ac;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .card-header-text h3 {
            font-size: 17px;
            font-weight: 700;
            color: #1e3a70;
        }

        .card-header-text p {
            font-size: 12px;
            color: var(--text-muted);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: #f8fafc;
            color: var(--text-main);
            font-size: 13px;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #7b9fe8;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.18);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 14px;
        }

        .field-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .field-hint {
            color: var(--text-muted);
            font-size: 11px;
            margin-top: 6px;
        }

        .security-notice {
            background: #eaf0ff;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 14px;
            margin-bottom: 18px;
            font-size: 12px;
            color: #2c4a8e;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            line-height: 1.5;
        }

        .btn-primary {
            background: var(--gradient-button);
            color: #ffffff;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px rgba(71, 114, 199, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-1px);
        }

        @media (max-width: 992px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }
            .brand {
                padding: 0 0 24px;
                justify-content: center;
            }
            .brand-logo-img {
                width: 48px;
                height: 48px;
            }
            .brand-name, .nav-item span, .logout-btn span {
                display: none;
            }
            .nav-item a, .logout-btn {
                justify-content: center;
                padding: 13px 8px;
            }
            .main-wrapper {
                margin-left: 70px;
            }
            .topbar {
                padding: 0 18px;
            }
            .content {
                padding: 22px 16px;
            }
            .profile-banner {
                flex-direction: column;
                text-align: center;
            }
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
            'dashboard' => 'wakasek.kesiswaan.dashboard',
            'rekap' => 'wakasek.kesiswaan.rekap',
            'monitoring' => 'wakasek.kesiswaan.monitoring',
        ],
        'wakasek kurikulum' => [
            'nama' => 'Wakasek Kurikulum',
            'dashboard' => 'wakasek.kurikulum.dashboard',
            'rekap' => 'wakasek.kurikulum.rekap',
            'monitoring' => 'wakasek.kurikulum.monitoring',
        ],
        'wakasek sarana' => [
            'nama' => 'Wakasek Sarana',
            'dashboard' => 'wakasek.sarana.dashboard',
            'rekap' => 'wakasek.sarana.rekap',
            'monitoring' => 'wakasek.sarana.monitoring',
        ],
        'wakasek dudi' => [
            'nama' => 'Wakasek DUDI',
            'dashboard' => 'wakasek.dudi.dashboard',
            'rekap' => 'wakasek.dudi.rekap',
            'monitoring' => 'wakasek.dudi.monitoring',
        ],
    ];

    $jabatan = $bidang[$role] ?? $bidang['wakasek kesiswaan'];
    $routeDashboard = $jabatan['dashboard'];
    $routeRekap = $jabatan['rekap'];
    $routeMonitoring = $jabatan['monitoring'];

    $namaPengguna = $user->name ?? 'Wakasek';
    $inisial = strtoupper(substr(trim($namaPengguna), 0, 1));
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

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
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
            <span class="user-name">{{ $jabatan['nama'] }}</span>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="content">

        <div class="breadcrumb">
            <a href="{{ route($routeDashboard) }}"><i class="fa-solid fa-house"></i> Beranda</a>
            <i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i>
            <span>Profil Saya</span>
        </div>

        <h1 class="page-title">Profil Saya</h1>
        <p class="welcome-text">Kelola informasi pribadi dan keamanan akun kamu di platform BaktiVoice.</p>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if (session('success_password'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success_password') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <strong>Periksa kembali data yang kamu masukkan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- PROFILE BANNER -->
        <section class="profile-banner">
            <div class="profile-avatar-large">
                {{ $inisial }}
            </div>
            <div class="profile-banner-info">
                <h2>{{ $namaPengguna }}</h2>
                <p><i class="fa-regular fa-envelope"></i> {{ $user->email ?? 'Email belum tersedia' }}</p>
                <span class="role-badge"><i class="fa-solid fa-user-shield"></i> {{ $jabatan['nama'] }}</span>
            </div>
        </section>

        <!-- PROFILE GRID -->
        <div class="profile-grid">

            <!-- EDIT PROFIL -->
            <section class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                    <div class="card-header-text">
                        <h3>Informasi Profil</h3>
                        <p>Perbarui informasi akun yang kamu gunakan.</p>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('profil_wakasek.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fa-regular fa-user input-icon"></i>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap" maxlength="255" required>
                            </div>
                            @error('name')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                        </div>

{{-- EMAIL --}}
<div class="form-group">
    <label for="email" class="form-label">
        Email
        <span class="required">*</span>
    </label>

    <div class="input-wrapper">
        <i class="fa-regular fa-envelope input-icon"></i>

        <input
            type="email"
            id="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email) }}"
            placeholder="Masukkan alamat email"
            maxlength="255"
            required
        >
    </div>

    @error('email')
        <p class="field-error">{{ $message }}</p>
    @enderror
</div>
                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </section>

            <!-- UBAH PASSWORD -->
            <section class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="card-header-text">
                        <h3>Keamanan Akun</h3>
                        <p>Perbarui password untuk menjaga keamanan akun.</p>
                    </div>
                </div>

                <div class="card-body">
                    <div class="security-notice">
                        <i class="fa-solid fa-circle-info"></i>
                        <div>
                            <strong>Jaga kerahasiaan password kamu.</strong><br>
                            Gunakan password yang kuat dan jangan membagikannya kepada orang lain.
                        </div>
                    </div>

                    <form action="{{ route('profil_wakasek.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password" class="form-label">Password Lama <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-lock input-icon"></i>
                                <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Masukkan password lama" required>
                                <button type="button" class="toggle-password" onclick="toggleVisibility('current_password', this)">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password Baru <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-key input-icon"></i>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru" required>
                                <button type="button" class="toggle-password" onclick="toggleVisibility('password', this)">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                            <p class="field-hint">Minimal 8 karakter.</p>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-key input-icon"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
                                <button type="button" class="toggle-password" onclick="toggleVisibility('password_confirmation', this)">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-key"></i> Ubah Password
                        </button>
                    </form>
                </div>
            </section>

        </div>

    </main>
</div>

<script>
    function toggleVisibility(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>