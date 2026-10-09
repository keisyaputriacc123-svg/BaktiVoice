<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Masuk ke Sistem Pengaduan Sekolah</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



<style>
        :root {
            --primary: #1f2937;
            --on-primary: #ffffff;
            --background: #f8fafc;
            --surface: #d1fae5;
            --border: #e5e7eb;
            --text: #1f2937;
            --text-muted: #6b7280;
            --accent: #111827;

            --font-family: 'Inter', sans-serif;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-pill: 9999px;


            --shadow-elevated: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);

            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-family);
        }

        body {
            background-color: var(--background);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }


        .login-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 40px 32px;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-elevated);
            text-align: center;
            transition: transform var(--transition-base);
        }


        .brand-wrapper {
            margin-bottom: 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        .logo-icon {
            width: 72px;
            height: 72px;
            margin-bottom: 12px;
            object-fit: contain;
        }

        .brand-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .alert-danger {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            margin-bottom: 18px;
            text-align: left;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 18px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: left;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #9ca3af;
            font-size: 15px;
            transition: color var(--transition-fast);
            pointer-events: none;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 12px 14px 12px 42px;
            font-size: 14px;
            color: var(--text);
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
        }

        .form-select {
            appearance: none;
            cursor: pointer;
        }

        .form-input:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(31, 41, 55, 0.1);
        }

        .form-input:focus + .input-icon,
        .form-select:focus + .input-icon,
        .input-wrapper:focus-within .input-icon {
            color: var(--primary);
        }



        .toggle-password {
            position: absolute;
            right: 14px;
            cursor: pointer;
            color: #9ca3af;
            font-size: 15px;
            background: none;
            border: none;
            padding: 0;
        }

        .toggle-password:hover {
            color: var(--text);
        }


        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            margin-top: -4px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text-muted);
            user-select: none;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            border-radius: 4px;
            cursor: pointer;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: opacity var(--transition-fast);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }


        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            color: var(--on-primary);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-color var(--transition-fast), transform var(--transition-fast);
            margin-top: 4px;
        }

        .btn-submit:hover {
            background-color: var(--accent);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }


        .form-footer {
            margin-top: 24px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            margin-left: 4px;
        }

        .register-link:hover {
            text-decoration: underline;
        }


        @media (max-width: 480px) {
            .login-card {
                padding: 28px 20px;
                border: none;
                box-shadow: none;
                background-color: transparent;
            }

            body {
                background-color: #ffffff;
                align-items: flex-start;
                padding-top: 40px;
            }
        }
    </style>
</head>
<body>

    <main class="login-card">
        <!-- BRAND LOGO & TITLE -->
        <div class="brand-wrapper">
            <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="logo-icon">
            <h1 class="brand-title">BaktiVoice</h1>
            <p class="brand-subtitle">Sistem Pengaduan Sekolah</p>
        </div>

        <!-- TAMPILAN ERROR VALIDASI/LOGIN -->
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



    <!-- FORM LOGIN -->
        <form class="login-form" action="{{ route('login.post') }}" method="POST" id="loginForm">
            @csrf

            <!-- Field Role / Jabatan -->
            <div class="form-group">
                <label for="role" class="form-label">Masuk Sebagai</label>
                <div class="input-wrapper">
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Peran / Hak Akses --</option>
                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru_bk" {{ old('role') == 'guru_bk' ? 'selected' : '' }}>Guru BK</option>
                        <option value="wakasek_kesiswaan" {{ old('role') == 'wakasek_kesiswaan' ? 'selected' : '' }}>Wakasek Kesiswaan</option>
                        <option value="wakasek_kurikulum" {{ old('role') == 'wakasek_kurikulum' ? 'selected' : '' }}>Wakasek Kurikulum</option>
                        <option value="wakasek_sarana" {{ old('role') == 'wakasek_sarana' ? 'selected' : '' }}>Wakasek Sarana & Prasarana</option>
                        <option value="wakasek_dudi" {{ old('role') == 'wakasek_dudi' ? 'selected' : '' }}>Wakasek Humas / Hubin / DUDI</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin </option>
                    </select>
                    <i class="fa-solid fa-user-shield input-icon"></i>
                </div>
            </div>

            <!-- Field Email / Username / NISN -->
            <div class="form-group">
                <label for="username" class="form-label">Username / NISN / Email</label>
                <div class="input-wrapper">
                    <input
                        type="text"
                        id="username"
                        name="login"
                        class="form-input"
                        placeholder="Masukkan NISN atau Email"
                        value="{{ old('login') }}"
                        required
                        autofocus
                    >
                    <i class="fa-regular fa-user input-icon"></i>
                </div>
            </div>

            <!-- Field Password -->
            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan Kata Sandi"
                        required
                    >
                    <i class="fa-solid fa-lock input-icon"></i>
                    <button type="button" class="toggle-password" id="btnTogglePassword" aria-label="Tampilkan Password">
                        <i class="fa-regular fa-eye" id="iconEye"></i>
                    </button>
                </div>
            </div>

            <!-- Opsi Tambahan -->
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat Saya</span>
                </label>
                <a href="#" class="forgot-password">Lupa Password?</a>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn-submit">
                <span>Masuk Sekarang</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <!-- FOOTER / LINK REGISTRASI -->
        <div class="form-footer">
            Belum punya akun?
            <a href="{{ route('register') }}" class="register-link">Daftar Akun Pengaduan</a>
        </div>
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordBtn = document.getElementById('btnTogglePassword');
            const passwordInput = document.getElementById('password');
            const iconEye = document.getElementById('iconEye');


            if (togglePasswordBtn && passwordInput && iconEye) {
                togglePasswordBtn.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);


                    if (type === 'text') {
                        iconEye.classList.remove('fa-eye');
                        iconEye.classList.add('fa-eye-slash');
                    } else {
                        iconEye.classList.remove('fa-eye-slash');
                        iconEye.classList.add('fa-eye');
                    }
                });
            }
        });
    </script>
</body>
</html>
