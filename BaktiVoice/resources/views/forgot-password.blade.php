
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Lupa Password</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #1f2937;
            --background: #f8fafc;
            --border: #e5e7eb;
            --text: #1f2937;
            --text-muted: #6b7280;
            --font-family: 'Inter', sans-serif;

            --radius-sm: 8px;
            --radius-lg: 16px;

            --shadow-elevated: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
                               0 8px 10px -6px rgba(0, 0, 0, 0.1);
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
            border: 1px solid rgba(123, 159, 232, 0.4);

            box-shadow:
                0 0 25px rgba(123, 159, 232, 0.35),
                0 0 50px rgba(123, 159, 232, 0.15),
                var(--shadow-elevated);

            text-align: center;
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

        .forgot-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3ff;
            border-radius: 50%;
            color: #7b9fe8;
            font-size: 23px;
        }

        .page-title {
            font-size: 21px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-description {
            font-size: 13px;
            line-height: 1.7;
            color: var(--text-muted);
            margin-bottom: 26px;
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
            padding-left: 18px;
        }

        .alert-success {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            padding: 12px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            margin-bottom: 18px;
            text-align: left;
            line-height: 1.6;
        }

        .forgot-form {
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
            pointer-events: none;
            transition: color 150ms ease;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            font-size: 14px;
            color: var(--text);
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            outline: none;
            transition: border-color 150ms ease,
                        box-shadow 150ms ease;
        }

        .form-input:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, 0.15);
        }

        .input-wrapper:focus-within .input-icon {
            color: #7b9fe8;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(
                135deg,
                #7b9fe8 0%,
                #9bc3f8 50%,
                #b8d7ff 100%
            );
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(123, 159, 232, 0.3);
            transition: all 0.3s ease;
            margin-top: 4px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(123, 159, 232, 0.45);
            background: linear-gradient(
                135deg,
                #6b90e0 0%,
                #8bb7f5 50%,
                #a8ccff 100%
            );
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        .form-footer {
            margin-top: 26px;
            font-size: 13px;
        }

        .back-login {
            color: #628cdb;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: opacity 150ms ease;
        }

        .back-login:hover {
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

        <!-- BRAND LOGO -->
        <div class="brand-wrapper">
            <img
                src="{{ asset('images/logo BaktiVoice.png') }}"
                alt="Logo BaktiVoice"
                class="logo-icon"
            >

            <h1 class="brand-title">BaktiVoice</h1>
            <p class="brand-subtitle">Sistem Pengaduan Sekolah</p>
        </div>

        <!-- ICON LUPA PASSWORD -->
        <div class="forgot-icon">
            <i class="fa-solid fa-lock"></i>
        </div>

        <!-- JUDUL HALAMAN -->
        <h2 class="page-title">Lupa Password?</h2>

        <p class="page-description">
            Jangan khawatir! Masukkan alamat email yang terdaftar
            pada akun BaktiVoice kamu. Kami akan mengirimkan
            tautan untuk mengatur ulang kata sandi.
        </p>

        <!-- NOTIFIKASI ERROR -->
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- NOTIFIKASI BERHASIL -->
        @if (session('status'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('status') }}
            </div>
        @endif

        <!-- FORM LUPA PASSWORD -->
        <form
            class="forgot-form"
            action="{{ route('password.email') }}"
            method="POST"
        >
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">
                    Email Terdaftar
                </label>

                <div class="input-wrapper">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="Masukkan email kamu"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >

                    <i class="fa-regular fa-envelope input-icon"></i>
                </div>
            </div>

            <!-- TOMBOL KIRIM -->
            <button type="submit" class="btn-submit">
                <span>Kirim Link Reset Password</span>
                <i class="fa-solid fa-paper-plane"></i>
            </button>

        </form>

        <!-- KEMBALI KE LOGIN -->
        <div class="form-footer">
            <a href="{{ route('login') }}" class="back-login">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Login
            </a>
        </div>

    </main>

</body>
</html>
