
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - BaktiVoice</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            background: linear-gradient(135deg, #eaf1fb, #dce9fb, #eef5ff);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            background: #fff;
            border: 1px solid rgba(123, 159, 232, .4);
            border-radius: 22px;
            box-shadow: 0 10px 35px rgba(86, 125, 195, .15);
            text-align: center;
        }

        .logo {
            width: 175px;
            max-width: 100%;
            margin-bottom: 25px;
        }

        .icon-wrapper {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eaf1fb;
            color: #628cdb;
            font-size: 25px;
        }

        h2 {
            color: #2c4a8e;
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .description {
            color: #71809d;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            color: #2c4a8e;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #8da6d8;
        }

        .input-wrapper input {
            width: 100%;
            padding: 13px 14px 13px 42px;
            border: 1px solid #dce5f5;
            border-radius: 10px;
            outline: none;
            font-size: 13px;
            color: #2c4a8e;
            transition: .3s;
        }

        .input-wrapper input:focus {
            border-color: #7b9fe8;
            box-shadow: 0 0 0 3px rgba(123, 159, 232, .12);
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #7b9fe8, #9bc3f8, #b8d7ff);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(98, 140, 219, .25);
        }

        .back-link {
            display: inline-block;
            margin-top: 23px;
            color: #628cdb;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
            color: #2c4a8e;
        }

        .alert-error {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 9px;
            background: #fff0f0;
            color: #c0392b;
            font-size: 12px;
            text-align: left;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 32px 23px;
            }

            h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card">

        <img src="{{ asset('images/logo BaktiVoice.png') }}"
             alt="Logo BaktiVoice"
             class="logo">

        <div class="icon-wrapper">
            <i class="fa-solid fa-lock"></i>
        </div>

        <h2>Reset Password</h2>

        <p class="description">
            Buat password baru untuk akun BaktiVoice kamu.
            Pastikan password mudah diingat dan tetap aman.
        </p>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label>Email</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope"></i>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $email) }}"
                        placeholder="Masukkan email akun"
                        required
                        autofocus
                    >
                </div>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        required
                    >
                </div>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password baru"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fa-solid fa-check"></i>
                Simpan Password Baru
            </button>

        </form>

        <a href="{{ route('login') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Login
        </a>

    </div>

</body>
</html>
