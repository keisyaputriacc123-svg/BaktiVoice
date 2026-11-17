<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | BaktiVoice</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh; padding: 24px;
            display: flex; align-items: center; justify-content: center;
            font-family: Inter, Arial, sans-serif;
            color: #2c4a8e;
            background: linear-gradient(135deg, #eaf1fb, #dce8f8, #f5f8ff);
        }
        .error-card {
            width: 100%; max-width: 460px; padding: 42px 32px;
            background: #fff; border: 1px solid #dce7f7;
            border-radius: 24px; text-align: center;
            box-shadow: 0 18px 50px rgba(44,74,142,.10);
        }
        .brand { font-size: 23px; font-weight: 800; margin-bottom: 30px; }
        .brand span { color: #628cdb; }
        .error-icon {
            width: 82px; height: 82px; margin: auto auto 22px;
            display: grid; place-items: center;
            border-radius: 24px; background: #fff3df;
            font-size: 38px;
        }
        .error-code { font-size: 48px; font-weight: 900; color: #628cdb; margin: 0; }
        h1 { font-size: 21px; margin: 8px 0 10px; color: #2c4a8e; }
        .description { color: #7183a5; font-size: 13px; line-height: 1.8; }
        .incident {
            margin: 25px 0; padding: 14px;
            background: #f3f7fd; border: 1px solid #e1eafa;
            border-radius: 13px; color: #7183a5; font-size: 12px;
        }
        .home-btn {
            display: block; padding: 14px; border-radius: 12px;
            background: #628cdb; color: white; text-decoration: none;
            font-size: 13px; font-weight: 700;
            transition: .2s;
        }
        .home-btn:hover { background: #4772c7; transform: translateY(-2px); }
    </style>
</head>
<body>
    <main class="error-card">
        <div class="brand">Bakti<span>Voice</span></div>
        <div class="error-icon">🚫</div>
        <p class="error-code">403</p>
        <h1>Akses Ditolak</h1>
        <p class="description">
            Mohon maaf, akun kamu tidak memiliki izin untuk membuka halaman atau data ini.
        </p>
        <div class="incident">
            <strong>Kode Insiden:</strong> BV-ERR-403<br>
            <strong>Status:</strong> Otorisasi akses ditolak
        </div>
        <a href="{{ url('/') }}" class="home-btn">Kembali ke Beranda</a>
    </main>
    <script src="{{ asset('js/anti-double-click.js') }}"></script>
</body>
</html>
