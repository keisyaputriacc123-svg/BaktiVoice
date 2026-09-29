<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Suara Siswa, Untuk Sekolah yang Lebih Baik</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #87b0ea;
            --primary-hover: #111827;
            --background: #d2e3f4;
            --card-bg: #9eafdf;
            --border: #f3f4f6;
            --text-main: #1f2937;
            --text-muted: #64748b;
            --font-family: 'Inter', sans-serif;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-pill: 9999px;
            --shadow-card: 0px 1px 2px 0px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-family);
        }

        body {
            background-color: #ffffff;
            color: var(--text-main);
            line-height: 1.63;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* --- NAVBAR --- */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
            background-color: #ffffff;
        }

        .brand-logo-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo-img {
            width: 38px;
            height: 38px;
            object-fit: contain;
            background: transparent !important; /* Menghilangkan background putih */
    border: none !important;             /* Menghilangkan garis pinggir */
    box-shadow: none !important;         /* Menghilangkan bayangan jika ada */
    filter: drop-shadow(0px 10px 20px rgba(0, 0, 0, 0.08)); /* Efek bayangan halus jika diinginkan */
}

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-main);
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--text-main);
        }

        .auth-buttons {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-login {
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
            background-color: #f1f5f9;
            border-radius: var(--radius-md);
            transition: background 0.2s;
        }

        .btn-login:hover {
            background-color: #e2e8f0;
        }

        .btn-register {
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            background-color: var(--primary);
            border-radius: var(--radius-md);
            transition: background 0.2s;
        }

        .btn-register:hover {
            background-color: var(--primary-hover);
        }

        /* --- HERO SECTION --- */
        .hero {
            background-color: var(--background);
            padding: 64px 0 80px 0;
            border-radius: 24px;
            margin-top: 10px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .badge-pill {
            display: inline-block;
            background-color: #e2e8f0;
            color: var(--text-main);
            padding: 4px 16px;
            border-radius: var(--radius-pill);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 800;
            line-height: 1.15;
            color: var(--text-main);
            margin-bottom: 20px;
        }

        .hero-desc {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 32px;
            max-width: 480px;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
        }

        .btn-primary {
            padding: 12px 28px;
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
            border-radius: var(--radius-md);
            font-size: 14px;
        }

        .btn-secondary {
            padding: 12px 28px;
            background-color: #ffffff;
            color: var(--text-main);
            border: 1px solid #cbd5e1;
            font-weight: 600;
            border-radius: var(--radius-md);
            font-size: 14px;
        }

        .mockup-img {
            width: 100%;
            max-width: 480px;
            height: auto;
            border-radius: var(--radius-lg);
        }

        /* --- FEATURES SECTION --- */
        .features {
            padding: 80px 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .feature-card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: var(--radius-md);
            text-align: left;
        }

        .feature-icon-box {
            width: 48px;
            height: 48px;
            background-color: #f1f5f9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: var(--primary);
            font-size: 20px;
        }

        .feature-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* --- ABOUT SECTION --- */
        .about {
            padding: 60px 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: center;
        }

        .about-placeholder-box {
            width: 100%;
            height: 280px;
            background-color: #e2e8f0;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 48px;
        }

        .about-title {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 16px;
        }

        .about-desc {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .about-link {
            font-size: 14px;
            font-weight: 700;
            color: var(--primary);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* --- HOW IT WORKS SECTION --- */
        .how-it-works {
            padding: 80px 0;
            text-align: center;
        }

        .section-header {
            margin-bottom: 48px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .section-subtitle {
            font-size: 14px;
            color: var(--text-muted);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
            text-align: left;
        }

        .step-card {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .step-number {
            width: 36px;
            height: 36px;
            background-color: #64748b;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .step-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .step-desc {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* --- CTA BANNER --- */
        .cta-banner {
            margin: 40px 0 80px 0;
            background-color: #e2e8f0;
            border-radius: var(--radius-lg);
            padding: 48px;
            text-align: center;
        }

        .cta-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .cta-desc {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        /* --- FOOTER --- */
        .footer {
            border-top: 1px solid var(--border);
            padding: 32px 0;
        }

        .footer-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-copy {
            font-size: 12px;
            color: var(--text-muted);
        }

        .footer-links {
            display: flex;
            gap: 20px;
            list-style: none;
            font-size: 12px;
            color: var(--text-muted);
        }

        @media (max-width: 768px) {
            .hero-grid, .about-grid { grid-template-columns: 1fr; }
            .features-grid { grid-template-columns: repeat(2, 1fr); }
            .steps-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR HEADER -->
    <div class="container">
        <nav class="navbar">
            <div class="brand-logo-group">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="brand-logo-img">
                <span class="brand-title">BaktiVoice</span>
            </div>

            <ul class="nav-links">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#fitur">Fitur</a></li>
                <li><a href="#cara-kerja">Cara Kerja</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>

            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn-login">Masuk</a>
                <a href="{{ route('register') }}" class="btn-register">Daftar</a>
            </div>
        </nav>
    </div>

    <!-- HERO SECTION -->
    <section class="container" id="beranda">
        <div class="hero">
            <div class="container">
                <div class="hero-grid">
                    <div>
                        <span class="badge-pill">BaktiVoice</span>
                        <h1 class="hero-title">Suara Siswa,<br>Untuk Sekolah yang Lebih Baik</h1>
                        <p class="hero-desc">
                            <strong>BaktiVoice</strong> adalah sistem informasi aspirasi dan pengaduan siswa SMK Budi Bakti Ciwidey yang memudahkan kamu menyampaikan keluhan, saran, dan aspirasi dengan cepat, aman, dan terstruktur.
                        </p>
                        <div class="hero-actions">
                            <a href="{{ route('register') }}" class="btn-primary">Mulai Sekarang</a>
                            <a href="#tentang" class="btn-secondary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Preview" class="mockup-img" style="background:#fff; padding:20px; border:1px solid #e2e8f0;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="container features" id="fitur">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon-box"><i class="fa-regular fa-comment-dots"></i></div>
                <h3 class="feature-title">Mudah Digunakan</h3>
                <p class="feature-desc">Sampaikan aspirasi dan pengaduan dengan cepat dan praktis.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                <h3 class="feature-title">Aman & Terpercaya</h3>
                <p class="feature-desc">Data dan laporan kamu akan terlindungi dengan baik.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-box"><i class="fa-regular fa-clock"></i></div>
                <h3 class="feature-title">Pantau Status</h3>
                <p class="feature-desc">Lihat perkembangan laporan kamu secara real-time.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-box"><i class="fa-solid fa-users"></i></div>
                <h3 class="feature-title">Untuk Semua</h3>
                <p class="feature-desc">Tersedia untuk siswa, guru BK, admin sekolah, dan wakasek.</p>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="container about" id="tentang">
        <div class="about-grid">
            <div class="about-placeholder-box">
                <i class="fa-regular fa-image"></i>
            </div>
            <div>
                <span class="badge-pill">Tentang BaktiVoice</span>
                <h2 class="about-title">Wadah Aspirasi dan Pengaduan untuk Lingkungan Sekolah yang Lebih Baik</h2>
                <p class="about-desc">
                    <strong>BaktiVoice</strong> hadir sebagai jembatan komunikasi antara siswa dan pihak sekolah. Dengan sistem yang sederhana dan terstruktur, setiap suara kamu akan didengar, dicatat, dan ditindaklanjuti dengan serius.
                </p>
                <a href="#fitur" class="about-link">Pelajari Lebih Lanjut <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS SECTION -->
    <section class="container how-it-works" id="cara-kerja">
        <div class="section-header">
            <span class="badge-pill">Cara Kerja</span>
            <h2 class="section-title">Mudah dalam 3 Langkah</h2>
            <p class="section-subtitle">Hanya beberapa langkah untuk menyampaikan aspirasi atau pengaduan kamu.</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <div>
                    <h3 class="step-title">Daftar / Login</h3>
                    <p class="step-desc">Masuk ke akun BaktiVoice menggunakan username dan password kamu.</p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div>
                    <h3 class="step-title">Kirim Laporan</h3>
                    <p class="step-desc">Pilih kategori, tulis laporan, dan lampirkan bukti jika diperlukan.</p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <div>
                    <h3 class="step-title">Pantau dan Tunggu Tindak Lanjut</h3>
                    <p class="step-desc">Laporan akan diproses oleh pihak sekolah dan kamu bisa memantau statusnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANNER SECTION -->
    <section class="container">
        <div class="cta-banner">
            <h2 class="cta-title">Siap Menyampaikan Aspirasi?</h2>
            <p class="cta-desc">Bergabung sekarang dan jadilah bagian dari perubahan di SMK Budi Bakti Ciwidey.</p>
            <a href="{{ route('register') }}" class="btn-register" style="padding: 12px 32px;">Daftar Sekarang</a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer" id="kontak">
        <div class="container footer-container">
            <div>
                <div class="brand-logo-group">
                    <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo" class="brand-logo-img">
                    <span class="brand-title" style="font-size: 16px;">BaktiVoice</span>
                </div>
            </div>

            <ul class="footer-links">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#fitur">Fitur</a></li>
                <li><a href="#cara-kerja">Cara Kerja</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>

            <div class="footer-copy">
                &copy; 2026 BaktiVoice. SMK Budi Bakti Ciwidey
            </div>
        </div>
    </footer>

</body>
</html>
