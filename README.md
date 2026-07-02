<p align="center">
  <img src="public/images/logo_tsu.svg" height="120" alt="TSU Logo">
</p>

<h1 align="center">Sistem Informasi Magang TSU</h1>

<p align="center">
  Platform cerdas untuk mencari, mengelola, dan melaporkan kegiatan Magang Mahasiswa Universitas Tiga Serangkai (TSU) dengan lebih efisien dan transparan.
</p>

## 🚀 Fitur Utama
Sistem ini menggunakan arsitektur *multi-role* untuk mengelola alur magang secara end-to-end:
- **Mahasiswa**: Pendaftaran magang ke mitra, pengisian logbook harian digital, dan pengajuan konversi nilai.
- **Dosen Pembimbing**: Monitor perkembangan mahasiswa, validasi logbook, dan input penilaian akhir magang.
- **Admin (Prodi & Universitas)**: Mengelola master data, memvalidasi pendaftaran magang, dan mengatur pengumuman program.
- **Auto Deployment (CI/CD)**: Terintegrasi dengan GitHub Actions untuk kemudahan rilis ke server *Development* (VPS) dan *Production* (DirectAdmin).

## 🛠️ Teknologi yang Digunakan
- **Framework**: [Laravel 10](https://laravel.com) (PHP 8.1+)
- **Frontend**: Blade Template Engine & [TailwindCSS](https://tailwindcss.com)
- **Database**: MySQL / MariaDB
- **JavaScript**: Alpine.js

## ⚙️ Persyaratan Sistem (Local Development)
Pastikan komputer Anda sudah terinstal:
- PHP 8.1 atau lebih baru (Disarankan PHP 8.2)
- Composer
- Node.js & NPM
- MySQL / MariaDB (Laragon/XAMPP)
- Git

## 💻 Cara Instalasi (Lokal)

1. **Clone repositori ini:**
   ```bash
   git clone https://github.com/USERNAME/tsu-magang.git
   cd tsu-magang
   ```

2. **Install dependensi PHP & Node.js:**
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Konfigurasi Lingkungan (.env):**
   ```bash
   cp .env.example .env
   ```
   *Buka file `.env` dan sesuaikan pengaturan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan database lokal Anda.*

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi & Seeder Database:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Catatan: Seeder (`UserSeeder`) akan membuat akun default untuk hak akses Admin.*

6. **Tautkan Folder Storage (Symlink):**
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Akses aplikasi di: `http://localhost:8000` (atau URL Laragon Anda misal `http://tsu-magang.test`).

## 🔄 CI/CD Deployment Guide

Proyek ini telah dikonfigurasi dengan **GitHub Actions** untuk *auto-deployment*:

1. **Development (VPS)**
   - **Branch:** `development`
   - **Metode:** Rsync (SSH)
   - **File Workflow:** `.github/workflows/deploy-dev.yml`
   - Setiap *push* ke branch `development` akan otomatis mem-build dan mensinkronisasikan file ke server VPS, serta menjalankan migrasi secara otomatis.

2. **Production (DirectAdmin)**
   - **Branch:** `main`
   - **Metode:** FTP Sync + SSH Scripting
   - **File Workflow:** `.github/workflows/deploy-prod.yml`
   - Direktori akan secara otomatis dipecah menjadi *core* (`tsu_magang_core`) dan *public* (`public_html`) untuk menjaga standar keamanan DirectAdmin.
   - Fitur `URL::forceScheme('https')` akan aktif secara dinamis di server produksi.

---

**© 2026 Universitas Tiga Serangkai.** All Rights Reserved.
