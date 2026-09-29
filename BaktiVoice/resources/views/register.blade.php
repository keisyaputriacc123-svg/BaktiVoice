<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Buat Akun Baru</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #1e293b;
            --primary-hover: #0f172a;
            --background: #f1f5f9;
            --border: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --font-family: 'Inter', sans-serif;
            --radius-sm: 8px;
            --radius-md: 16px;
            --shadow-card: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-family);
        }
        body {
        background-color: var(--background);
37:     color: var(--text-main);
38:     min-height: 100vh;
39:     display: flex !important;
40:     align-items: center !important;
41:     justify-content: center !important;
42:     padding: 32px 16px;
43:     margin: 0;
        }
        .card-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 40px 36px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            text-align: center;
            border: 1px solid var(--border);
            margin: 0 auto !important;
        }

        /* Logo Badge BV */
        .logo-badge {
            width: 80px;
            height: 80px;
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 800;
            font-size: 32px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
            letter-spacing: -0.5px;
        }

        .brand-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .section-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        /* Form Controls */
        .register-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
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
            color: var(--text-main);
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #94a3b8;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            font-size: 14px;
            color: var(--text-main);
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(30, 41, 59, 0.1);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        /* Toggle Password Button */
        .toggle-password {
            position: absolute;
            right: 14px;
            cursor: pointer;
            color: #94a3b8;
            font-size: 14px;
            background: none;
            border: none;
        }

        .toggle-password:hover {
            color: var(--text-main);
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 8px;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        /* Footer */
        .form-footer {
            margin-top: 24px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .login-link {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .card-container {
                padding: 28px 20px;
                box-shadow: none;
                background-color: transparent;
                border: none;
            }
        }
    </style>
</head>
<body>

    <main class="card-container">
    <img
    src="{{ asset('images/logo BaktiVoice.png') }}"
    alt="Logo BaktiVoice"
    class="logo-badge"
>

        <!-- Header Info -->
        <h1 class="brand-title">BaktiVoice</h1>
        <p class="brand-subtitle">Sistem Informasi Aspirasi & Pengaduan Siswa</p>

        <h2 class="section-title">Buat Akun Baru</h2>
        <p class="section-subtitle">Daftar untuk menggunakan BaktiVoice</p>

        <!-- Form Register -->
        <form class="register-form" action="{{ route('register.post') }}" method="POST">
            @csrf

            <!-- Field: Nama Lengkap -->
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-wrapper">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <!-- Field: Username -->
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-at input-icon"></i>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Masukkan username" value="{{ old('username') }}" required>
                </div>
            </div>

            <!-- Field: Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan email" value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- Field: Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password', 'eye1')">
                        <i class="fa-regular fa-eye" id="eye1"></i>
                    </button>
                </div>
            </div>

            <!-- Field: Konfirmasi Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password_confirmation', 'eye2')">
                        <i class="fa-regular fa-eye" id="eye2"></i>
                    </button>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn-submit">Daftar</button>
        </form>

        <!-- Footer Link ke Login -->
        <div class="form-footer">
            Sudah punya akun? <a href="{{ route('login') }}" class="login-link">Masuk</a>
        </div>
    </main>

    <!-- JS untuk Toggle Show/Hide Password -->
    <script>
        function togglePasswordVisibility(inputId, eyeIconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(eyeIconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
