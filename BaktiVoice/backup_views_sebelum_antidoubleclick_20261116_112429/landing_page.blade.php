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
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-md);
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #f1f5f9;
            border-color: #94a3b8;
            transform: translateY(-1px);
        }

        .btn-register {
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 600;
            color:#1e3a8a !important;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 50%, #93c5fd 100%) !important;
            border-radius: var(--radius-md);
            box-shadow: 0 4px 12px rgba(147, 197, 253, 0.3);
            transition: all 0.2s ease;
            display: inline-block;
        }

        .btn-register:hover {
            background:linear-gradient(135deg, #bfdbfe 0%, #93c5fd 50%, #60a5fa 100%) !important;
            box-shadow: 0 6px 15px rgba(147, 197, 253, 0.4);
            transform: translateY(-1px);
        }

        /* --- HERO SECTION --- */
        .hero {
            background:linear-gradient(135deg, #dbeafe 0%, #bfdbfe 50%, #93c5fd 100%) !important;
            padding: 64px 48px 80px 48px;
            border-radius: 24px;
            margin-top: 10px;
            box-shadow: 0 10px 25px -5px rgba(147, 197, 253, 0.3);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
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
            color: #0f172a;
            margin-bottom: 16px;
        }

        .hero-desc {
            font-size: 16px;
            color: #334155;
            margin-bottom: 32px;
            max-width: 100%;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
        }

        .btn-primary {
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            color: #1e3a8a !important; /* Warna teks biru tua supaya pas dengan background pastel */
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 50%, #93c5fd 100%) !important; /* Biru pastel gradasi persis tombol Daftar */
            border: 1px solid #93c5fd;
            border-radius: var(--radius-md);
            box-shadow: 0 4px 12px rgba(147, 197, 253, 0.3);
            transition: all 0.2s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 50%, #60a5fa 100%) !important;
            box-shadow: 0 6px 15px rgba(147, 197, 253, 0.4);
            transform: translateY(-1px);
        }

        .btn-secondary {
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
            background-color: #f8fafc !important; /* Warna putih bersih persis tombol Masuk */
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-md);
            transition: all 0.2s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #f1f5f9 !important;
            border-color: #94a3b8;
            transform: translateY(-1px);
        }

        .mockup-img {
            width: 100%;
            max-width: 480px;
            height: auto;
            border-radius: var(--radius-lg);
        }

        .Bavi-mascot {
            width: 300px;
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            animation: Bavi-float 3s ease-in-out infinite;
            will-change: transform;
        }

        @keyframes Bavi-float {
            0%, 100% {
            transform: translateY(0);
        }

            50% {
            transform: translateY(-8px);
        }
        }

        
/* Wadah maskot Bavi */
.hero-mascot {
    position: relative;
}

/* Balon percakapan Bavi */
.bavi-speech {
    position: absolute;
    top: -65px;
    left: 50%;
    transform: translateX(-50%) translateY(8px);

    width: max-content;
    max-width: 260px;
    padding: 14px 18px;

    background: #ffffff;
    color: #496cbd;
    border: 1px solid #dce6ff;
    border-radius: 18px;
    box-shadow: 0 8px 24px rgba(73, 108, 189, 0.15);

    font-size: 14px;
    line-height: 1.6;
    text-align: center;

    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    z-index: 10;

    transition:
        opacity 0.3s ease,
        transform 0.3s ease,
        visibility 0.3s ease;
}

/* Ekor balon */
.bavi-speech::after {
    content: "";
    position: absolute;
    bottom: -9px;
    left: 50%;

    width: 16px;
    height: 16px;

    background: #ffffff;
    border-right: 1px solid #dce6ff;
    border-bottom: 1px solid #dce6ff;

    transform: translateX(-50%) rotate(45deg);
}

/* Balon muncul */
.bavi-speech.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

/* Tampilan HP */
@media (max-width: 768px) {
    .bavi-speech {
        top: -60px;
        max-width: 220px;
        font-size: 13px;
        padding: 12px 14px;
    }
}


        @media (prefers-reduced-motion: reduce) {
        .Bavi-mascot {
            animation: none;
            will-change: auto;
    }
}


       /* --- FEATURES SECTION --- */
        .features {
            padding: 60px 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        /* Kartu Fitur Mewah & Modern */
        .feature-card {
            background-color: #ffffff;
            padding: 28px 24px;
            border-radius: var(--radius-lg, 16px);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            text-align: left;
            transition: all 0.3s ease;
        }

        /* Efek Melayang & Glow saat Kursor Diarahkan */
        .feature-card:hover {
            transform: translateY(-6px);
            border-color: #93c5fd;
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.08);
        }

        /* Wadah Ikon dengan Gradasi Biru Pastel */
        .feature-icon-box {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #2563eb;
            font-size: 22px;
            box-shadow: 0 4px 10px rgba(147, 197, 253, 0.4);
            transition: all 0.3s ease;
        }

        /* Animasi Ikon saat Kartu Di-hover */
        .feature-card:hover .feature-icon-box {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            transform: scale(1.05);
        }

        .feature-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-main, #1e293b);
        }

        .feature-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Responsif untuk Layar Tablet dan HP */
        @media (max-width: 992px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
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

        .about-image {
            width: 100%;
            height: 280px; /* Menyesuaikan tinggi kotak sebelumnya */
            border-radius: var(--radius-lg);
            overflow: hidden; /* Supaya sudut gambar melengkung rapi mengikuti radius */
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); /* Efek bayangan halus */
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Agar gambar tidak gepeng atau terdistorsi */
            display: block;
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
            color: var(--text-main, #1e293b);
        }

        .section-subtitle {
            font-size: 14px;
            color: var(--text-muted);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            text-align: left;
        }

        /* Tampilan Kartu Mewah & Modern */
        .step-card {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            background: #ffffff;
            padding: 28px 20px;
            border-radius: var(--radius-lg, 16px);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        /* Efek Melayang saat di-hover */
        .step-card:hover {
            transform: translateY(-5px);
            border-color: #93c5fd;
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.1);
        }

        /* Lingkaran Angka dengan Gradasi Biru */
        .step-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2563eb, #60a5fa);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .step-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--text-main, #1e293b);
        }

        .step-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Responsif untuk Layar HP/Tablet */
        @media (max-width: 768px) {
            .steps-grid {
                grid-template-columns: 1fr;
            }
        }
       /* --- CTA BANNER --- */
        .cta-banner {
            margin: 40px 0 80px 0;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 50%, #93c5fd 100%);
            border: 1px solid #93c5fd;
            border-radius: var(--radius-lg);
            padding: 48px;
            text-align: center;
            box-shadow: 0 10px 25px -5px rgba(147, 197, 253, 0.3);
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

        /* --- FAQ SECTION --- */
        .faq-section {
            padding: 60px 0;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-top: 32px;
        }

        /* Kartu FAQ Modern */
        .faq-card {
            background-color: #ffffff;
            padding: 28px;
            border-radius: var(--radius-lg, 16px);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
            text-align: left;
        }

        /* Efek Hover Melayang & Aksen Biru */
        .faq-card:hover {
            transform: translateY(-4px);
            border-color: #93c5fd;
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.06);
        }

        .faq-card h3 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-main, #1e293b);
            margin-bottom: 10px;
        }

        .faq-card p {
            font-size: 13px;
            color: var(--text-muted, #64748b);
            line-height: 1.6;
        }

        /* Responsif untuk Layar HP */
        @media (max-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr;
            }
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
                    <div class="hero-mascot" id="baviContainer">

                        <div class="bavi-speech" id="baviSpeech" role="status" aria-live="polite">
                            Hai, Sobat Bakti! 👋
                            <br>
                            Aku Bavi, siap menemanimu!
                    </div>
                        <img
                            src="{{ asset('images/Bavi.png') }}"
                            data-eyes-open="{{ asset('images/Bavi.png') }}"
                            data-eyes-closed="{{ asset('images/Bavi_EyesClosed.png') }}"
                            alt="Bavi, maskot BaktiVoice"
                            class="Bavi-mascot"
                            id="baviMascot">
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
            <div class="about-image">
                <img src="images/landing.jpg" alt="Tentang BaktiVoice">
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

<!-- FAQ SECTION -->
<section class="container faq-section" id="faq">
    <div class="section-header text-center">
        <span class="badge-pill">Bantuan & FAQ</span>
        <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
        <p class="section-subtitle">Temukan jawaban cepat seputar penggunaan sistem BaktiVoice.</p>
    </div>

    <div class="faq-grid">
        <!-- Item FAQ 1 -->
        <div class="faq-card">
            <h3>Apakah identitas saya aman saat mengirim laporan?</h3>
            <p>Ya, sangat aman. Sistem BaktiVoice menjaga kerahasiaan identitas pelapor agar kamu bisa menyampaikan aspirasi dengan tenang.</p>
        </div>

        <!-- Item FAQ 2 -->
        <div class="faq-card">
            <h3>Berapa lama laporan saya akan ditindaklanjuti?</h3>
            <p>Laporan akan segera diverifikasi oleh pihak sekolah (Admin/Guru BK) dalam waktu 1x24 jam kerja.</p>
        </div>

        <!-- Item FAQ 3 -->
        <div class="faq-card">
            <h3>Bagaimana cara memantau status laporan saya?</h3>
            <p>Kamu cukup login ke akun BaktiVoice kamu, lalu buka menu riwayat atau status laporan untuk melihat perkembangannya secara *real-time*.</p>
        </div>

        <!-- Item FAQ 4 -->
        <div class="faq-card">
            <h3>Siapa saja yang bisa menggunakan BaktiVoice?</h3>
            <p>Sistem ini dapat digunakan oleh seluruh siswa SMK Budi Bakti Ciwidey, guru BK, admin sekolah, hingga wakasek.</p>
        </div>
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


<script>
document.addEventListener('DOMContentLoaded', function () {
    const bavi = document.getElementById('baviMascot');
    const container = document.getElementById('baviContainer');
    const speech = document.getElementById('baviSpeech');

    if (!bavi || !container || !speech) return;

    // =========================
    // ANIMASI KEDIPAN BAVI
    // =========================
    const mataTerbuka = bavi.dataset.eyesOpen;
    const mataTertutup = bavi.dataset.eyesClosed;

    let blinkTimer;
    let speechTimer;
    let hideTimer;

    function kedipBavi() {
        bavi.src = mataTertutup;

        setTimeout(function () {
            bavi.src = mataTerbuka;
        }, 350);
    }

    function jadwalkanKedipan() {
        blinkTimer = setTimeout(function () {
            kedipBavi();
            jadwalkanKedipan();
        }, Math.random() * 2000 + 2500);
    }

    jadwalkanKedipan();

    // =========================
    // SAPAAN BAVI
    // =========================
    const pesanBavi = [
        'Hai, Sobat Bakti! 👋 Aku Bavi, siap menemanimu!',
        'Punya aspirasi untuk sekolah? Yuk, sampaikan suaramu! 💙',
        'Jangan ragu untuk berbagi saran demi sekolah yang lebih baik! ✨'
    ];

    let pesanIndex = 0;

    function tampilkanPesan(gantiPesan = false) {
        clearTimeout(hideTimer);

        if (gantiPesan) {
            pesanIndex = (pesanIndex + 1) % pesanBavi.length;
        }

        speech.innerHTML = pesanBavi[pesanIndex]
            .replace(' 👋', ' 👋')
            .replace(' 💙', ' 💙')
            .replace(' ✨', ' ✨');

        speech.classList.add('show');

        hideTimer = setTimeout(function () {
            speech.classList.remove('show');
        }, 5000);
    }

    // Sapaan pertama setelah 1,5 detik
    speechTimer = setTimeout(function () {
        tampilkanPesan(false);
    }, 1500);

    // Hover untuk pengguna laptop/komputer
    container.addEventListener('mouseenter', function () {
        clearTimeout(speechTimer);
        tampilkanPesan(true);
    });

    container.addEventListener('mouseleave', function () {
        clearTimeout(hideTimer);

        hideTimer = setTimeout(function () {
            speech.classList.remove('show');
        }, 1200);
    });

    // Klik atau sentuh Bavi
    bavi.addEventListener('click', function () {
        clearTimeout(speechTimer);
        tampilkanPesan(true);
    });

    // Akses dengan keyboard
    bavi.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            tampilkanPesan(true);
        }
    });
});
</script>

</body>
</html>
