# 🔊 BaktiVoice — Sistem Informasi Pengaduan Sekolah

<p align="center">
  <img src="public/images/logo%20BaktiVoice.png" width="180" alt="Logo BaktiVoice">
</p>

<p align="center">
  <strong>Sampaikan Aspirasi, Wujudkan Sekolah yang Lebih Baik.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
  <img src="https://img.shields.io/badge/PostgreSQL-Supabase-4169E1?style=for-the-badge&logo=postgresql&logoColor=white">
  <img src="https://img.shields.io/badge/Status-Local%20Development-orange?style=for-the-badge">
</p>

> Proyek Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak / PPLG
> Tahun Ajaran 2026/2027

---

## 📌 1. Latar Belakang Masalah dan Solusi

Penyampaian pengaduan di lingkungan sekolah membutuhkan sistem yang terorganisasi agar setiap aspirasi, keluhan, dan permasalahan dapat diterima serta ditindaklanjuti oleh pihak yang bertanggung jawab.

Proses penyampaian pengaduan yang belum terintegrasi dapat menyulitkan siswa dalam mengetahui perkembangan laporan dan pihak sekolah dalam melakukan pemantauan.

**BaktiVoice** merupakan aplikasi berbasis web yang dikembangkan sebagai sarana pengaduan digital di lingkungan SMK Budi Bakti Ciwidey.

BaktiVoice menyediakan beberapa fungsi utama:

1. **Pengajuan Pengaduan:** Siswa dapat menyampaikan laporan berdasarkan kategori permasalahan.
2. **Privasi Pelapor:** Mendukung pilihan penyampaian laporan secara anonim.
3. **Bukti Pendukung:** Mendukung penyertaan bukti pada laporan.
4. **Pemantauan Laporan:** Pengguna dapat mengetahui perkembangan laporan.
5. **Pengelolaan Pengaduan:** Admin dan pihak terkait dapat mengelola serta menindaklanjuti laporan.
6. **Notifikasi:** Mendukung pemberitahuan terkait perkembangan laporan.

### Kategori Pengaduan

| Kategori | Penanggung Jawab |
|---|---|
| Kesiswaan | Guru BK / Wakasek Kesiswaan |
| Kurikulum | Wakasek Kurikulum |
| Sarana | Wakasek Sarana |
| DUDI | Wakasek DUDI |

### Status Pengaduan

| Status | Keterangan |
|---|---|
| pending | Laporan menunggu penanganan |
| proses | Laporan sedang ditindaklanjuti |
| selesai | Laporan telah diselesaikan |
| ditolak | Laporan tidak dapat diproses |

---

## 🛠️ 2. Tech Stack dan Arsitektur

Teknologi yang digunakan dalam pengembangan BaktiVoice:

| Komponen | Teknologi |
|---|---|
| Bahasa Backend | PHP 8.2 |
| Framework Backend | Laravel 12 |
| Frontend | HTML, CSS, JavaScript |
| Template Engine | Laravel Blade |
| CSS Framework | Tailwind CSS 4 |
| Build Tool | Vite 6 |
| Database | PostgreSQL |
| Database Hosting | Supabase |
| Dependency Manager PHP | Composer |
| Dependency Manager Frontend | NPM |
| Version Control | Git dan GitHub |

### Arsitektur Sistem

BaktiVoice menggunakan pola arsitektur Model-View-Controller (MVC) dari Laravel.

- **Model:** Mengelola data dan interaksi dengan database PostgreSQL.
- **View:** Menampilkan antarmuka aplikasi menggunakan Blade, HTML, CSS, dan JavaScript.
- **Controller:** Mengatur proses aplikasi, pengolahan pengaduan, dan komunikasi antara model dengan tampilan.

### Struktur Database

Beberapa tabel utama yang digunakan:

| Tabel | Fungsi |
|---|---|
| users | Menyimpan data pengguna dan role |
| kategori | Menyimpan kategori pengaduan |
| status_laporan | Menyimpan status pengaduan |
| laporan | Menyimpan data pengaduan |
| bukti_laporan | Menyimpan bukti pendukung |
| tanggapan | Menyimpan tanggapan laporan |
| riwayat_status | Menyimpan perubahan status |
| notifikasi | Menyimpan notifikasi pengguna |

---

## 🚀 3. Panduan Instalasi Lokal

Panduan berikut digunakan untuk menjalankan BaktiVoice di komputer pengembang atau penguji.

### A. Prasyarat Sistem

Pastikan perangkat sudah memiliki:

- PHP versi 8.2 atau lebih baru.
- Composer.
- Node.js dan NPM.
- Git.
- Akun Supabase dan database PostgreSQL.
- Visual Studio Code atau editor kode lainnya.

### B. Clone Repository

Buka PowerShell, kemudian jalankan:

```powershell
git clone https://github.com/keisyaputriacc123-svg/BaktiVoice.git

cd BaktiVoice
```

### C. Install Dependency

Install dependency Laravel:

```powershell
composer install
```

Install dependency frontend:

```powershell
npm install
```

### D. Konfigurasi Environment

Salin file konfigurasi:

```powershell
Copy-Item .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database dengan proyek Supabase milik penguji.

### E. Generate Application Key

```powershell
php artisan key:generate
```

### F. Migrasi Database

Jalankan migrasi:

```powershell
php artisan migrate
```

Pastikan koneksi ke Supabase berhasil dan seluruh tabel berhasil dibuat.

### G. Mengisi Data Kategori

Jalankan seeder kategori:

```powershell
php artisan db:seed --class=MasterDataSeeder
```

### H. Mengisi Data Status Laporan

Jalankan SQL berikut melalui Supabase SQL Editor setelah migrasi berhasil:

```sql
INSERT INTO status_laporan (nama_status, created_at, updated_at)
SELECT s.nama_status, NOW(), NOW()
FROM (
    VALUES ('pending'), ('proses'), ('selesai'), ('ditolak')
) AS s(nama_status)
WHERE NOT EXISTS (
    SELECT 1
    FROM status_laporan existing
    WHERE existing.nama_status = s.nama_status
);
```

### I. Membuat Akun Pengujian

Jalankan:

```powershell
php artisan db:seed
```

Perintah tersebut menjalankan DatabaseSeeder yang membuat tujuh akun pengujian dan sepuluh pengguna tambahan melalui UserFactory.

Jalankan seeder ini satu kali pada database pengujian yang baru agar tidak terjadi duplikasi akun.

### J. Build Frontend

```powershell
npm run build
```

### K. Jalankan Aplikasi

```powershell
php artisan serve
```

Buka browser dan akses:

http://127.0.0.1:8000

---

## ⚙️ 4. Contoh Konfigurasi Environment (.env.example)

Berikut contoh konfigurasi environment untuk menjalankan BaktiVoice menggunakan Supabase PostgreSQL.

```env
APP_NAME="BaktiVoice"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

APP_LOCALE=id
APP_FALLBACK_LOCALE=en

DB_CONNECTION=pgsql
DB_HOST=your-project-pooler.supabase.com
DB_PORT=6543
DB_DATABASE=postgres
DB_USERNAME=postgres.your-project-ref
DB_PASSWORD=your_database_password

SESSION_DRIVER=file
SESSION_LIFETIME=120

FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database

LOG_CHANNEL=stack
LOG_LEVEL=debug

MAIL_MAILER=log
```

**Catatan konfigurasi:**

- Ganti `DB_HOST`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai informasi koneksi Supabase milik masing-masing pengguna.
- Port `6543` digunakan sebagai contoh koneksi Supabase Transaction Pooler.
- Jangan membagikan file `.env` yang berisi kredensial asli.
- File `.env.example` hanya berisi contoh konfigurasi dan tidak boleh berisi password database asli.

---

## 🔑 5. Akun Pengujian Default

Akun berikut disediakan oleh DatabaseSeeder untuk kebutuhan pengujian lokal.

**Password seluruh akun: `password`**

| Role | Nama Pengguna | Email |
|---|---|---|
| Admin | admin | admin@example.com |
| Siswa | siswa | siswa@example.com |
| Guru BK | gurubk | bk@example.com |
| Wakasek Kurikulum | kurikulum | kurikulum@example.com |
| Wakasek Kesiswaan | kesiswaan | kesiswaan@example.com |
| Wakasek Sarana | sarana | sarana@example.com |
| Wakasek DUDI | dudi | dudi@example.com |

**Peringatan Keamanan:**

Akun di atas merupakan akun demonstrasi untuk pengujian lokal. Password default tidak boleh digunakan pada lingkungan produksi.

---

## 👥 6. Anggota Pengembang dan Pembagian Peran

BaktiVoice dikembangkan oleh dua anggota dengan pembagian tanggung jawab sebagai berikut:

### 1. Tiara — Frontend & UI/UX Specialist

Tanggung jawab:

- Merancang antarmuka pengguna.
- Mengembangkan tampilan frontend.
- Mengimplementasikan desain responsif.
- Memperhatikan kenyamanan dan pengalaman pengguna.
- Mengintegrasikan tampilan dengan kebutuhan sistem.

### 2. Keisya — Backend & Database/API Specialist

Tanggung jawab:

- Mengembangkan backend menggunakan Laravel 12.
- Mengelola database PostgreSQL melalui Supabase.
- Mengembangkan proses pengolahan data pengaduan.
- Mengelola autentikasi dan hak akses pengguna.
- Mengintegrasikan backend dengan frontend.

---

## 📍 7. Status Pengembangan

Saat ini BaktiVoice masih berada dalam tahap pengembangan dan pengujian lokal (*Local Development*).

Aplikasi belum di-deploy ke layanan hosting atau server produksi.

Pengembangan selanjutnya difokuskan pada penyempurnaan fitur, pengujian sistem, dan persiapan deployment.

---

## 📂 8. Repository dan Kontribusi

Repository GitHub:

https://github.com/keisyaputriacc123-svg/BaktiVoice

Untuk melihat kode sumber dan perkembangan proyek, silakan kunjungi repository tersebut.

---

## 📄 9. Lisensi

BaktiVoice merupakan proyek pengembangan aplikasi untuk kebutuhan Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak / PPLG SMK Budi Bakti Ciwidey Tahun Ajaran 2026/2027.

---
