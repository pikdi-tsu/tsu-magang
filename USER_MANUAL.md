# Manual Book Sistem Informasi Magang

Selamat datang di Sistem Informasi Magang. Sistem ini dirancang untuk memfasilitasi mahasiswa, dosen pembimbing, dan admin dalam mengelola seluruh kegiatan magang, mulai dari tahap pendaftaran hingga penilaian akhir dan konversi SKS.

Dokumen ini panduan penggunaan sistem berdasarkan masing-masing hak akses pengguna (Role).

---

## Guest

User yang belum login ke sistem. User dapat membaca informasi program magang yang tersedia dan login ke sistem.

### Fitur Utama Guest:

1. **Landing Page (`/`)**
   - Halaman utama sistem informasi magang.
   - Menampilkan informasi program magang yang tersedia.

2. **Login (`/login`)**
   - Halaman login untuk mahasiswa
   - Halaman login khusus milik admin dan dosen terdapat di `/loginstaff`.

## 1. Panduan Mahasiswa

Role Mahasiswa digunakan oleh peserta didik untuk mendaftar program magang, melaporkan kegiatan harian (logbook), serta mengunggah laporan akhir dan penilaian.

### Fitur Utama Mahasiswa:

1. **Dashboard (`/dashboard`)**
   - Halaman utama setelah berhasil login.
   - Menampilkan pengumuman terbaru yang aktif dari fakultas/universitas.
   - Menampilkan ringkasan statistik, seperti jumlah logbook yang telah diisi dan status pendaftaran.

2. **Pengaturan Profil (`/setting`)**
   - Mengubah profil termasuk menambahkan foto profil.
   - Mengubah kata sandi (password).

3. **Program Magang (`/program`)**
   - Melihat daftar program magang (Magang Mandiri, Studi Independen, dll) yang tersedia.
   - Melihat detail kualifikasi dan deskripsi program beserta instansi mitra.

4. **Pendaftaran Magang (`/pendaftaran`)**
   - Melakukan pendaftaran ke program yang dipilih.

5. **Dokumen Persyaratan (`/documents`)**
   - Mengunggah berkas-berkas persyaratan yang diperlukan (SK, CV, Transkrip, Surat Rekomendasi).

6. **Logbook / Jurnal Kegiatan (`/logbook`)**
   - Mencatat kegiatan magang harian atau mingguan.
   - Mengisikan deskripsi pekerjaan, hari/tanggal, beserta dokumentasi bukti kegiatan.
   - Menunggu dan melihat status validasi dari dosen pembimbing.

7. **Dosen Pembimbing (`/pembimbing`)**
   - Melihat informasi dosen pembimbing yang telah dialokasikan oleh Admin.

8. **Penilaian dan Konversi (`/penilaian`)**
   - Mengunggah berkas penilaian hasil evaluasi dari pihak mitra perusahaan.
   - Mengajukan nilai mata kuliah konversi sebagai pengganti SKS.

---

## 2. Panduan Dosen Pembimbing

Role Dosen digunakan oleh tenaga pengajar yang ditugaskan sebagai dosen pembimbing lapangan/akademik. Dosen bertugas memantau perkembangan mahasiswa selama di instansi magang dan memberikan validasi serta penilaian.

### Fitur Utama Dosen:

1. **Dashboard (`/dosen/dashboard`)**
   - Halaman utama dosen untuk melihat berbagai pengumuman umum terkait operasional.

2. **Pengaturan Akun (`/dosen/setting`)**
   - Menambahkan foto profil, memperbarui *password*, serta *update* informasi kontak (WhatsApp, email) agar mudah dihubungi oleh mahasiswa bimbingan.

3. **Program Magang (`/dosen/program`)**
   - Melihat daftar program magang dan studi independen yang berjalan beserta rincian informasi dan pesertanya (sebagai referensi bagi dosen).

4. **Validasi Logbook (`/dosen/logbook`)**
   - Melihat daftar logbook atau jurnal harian yang disubmit oleh mahasiswa bimbingan.
   - Memberikan *feedback*, dan melakukan aksi **Validasi (Terima)** atau **Tolak (Revisi)**.

5. **Penilaian Mahasiswa (`/dosen/penilaian`)**
   - Melihat rekap mahasiswa yang telah menyelesaikan magang.
   - Memberikan form penilaian akhir terkait kemampuan akademik dan softskill mahasiswa.

---

## 3. Panduan Admin (Universitas, Fakultas, Prodi)

Role ini menjembatani urusan pendataan dan administrasi magang. Pembagian kewenangan mencakup fungsi pemantauan terpusat maupun pengelola utama (biasanya pada level fakultas).

### Akses Umum Admin (Prodi, Universitas, Fakultas)
Pihak admin prodi/universitas secara umum dapat memantau dan memvalidasi hasil akhir magang:
1. **Dashboard (`/admin/dashboard`)**: Melihat visualisasi statistik pendaftaran, sebaran prodi mahasiswa magang, dan grafik terkait.
2. **Data Mahasiswa (`/admin/mahasiswa`)**: Melihat pangkalan data mahasiswa yang telah masuk ke dalam sistem beserta detail kelengkapannya.
3. **Validasi Konversi SKS (`/konversi`)**: Peninjauan akhir terhadap pengajuan konversi mata kuliah mahasiswa, validasi sertifikat magang, dan penyetujuan mata kuliah serta SKS.

### Akses Admin Pengelola Utama (Fakultas / Superadmin)
Selain akses umum di atas, pengelola fakultas (`role: admin` penuh) bertindak sebagai *controller* aplikasi dengan kapabilitas berikut:

1. **Kelola Program (`/admin/program`)**
   - **Tutup/Buka Program**: Manajemen lowongan program magang atau program MBKM lainnya.
   - **Buat dan Update**: Mendaftarkan program baru beserta kelengkapan kualifikasi yang dibutuhkan dari mahasiswa.

2. **Kelola Pendaftaran & Penugasan (`/admin/pendaftaran`)**
   - Mengelola lalu lintas mahasiswa yang melamar magang.
   - **Merubah Status**: Menyetujui atau menolak pendaftaran mahasiswa berdasarkan kelengkapan prasyarat/seleksi.
   - **Plotting Dosen (Assign Dospem)**: Mengalokasikan/menugaskan dosen tertentu untuk mendampingi mahasiswa selama kegiatan program berjalan.

3. **Kelola Pengumuman (`/admin/pengumuman`)**
   - Menyiarkan informasi (*broadcast*) yang akan termuat dalam dashboard seluruh Mahasiswa dan Dosen, seperti batas akhir input nilai, sosialisasi, dan instruksi resmi.


### Yang bisa ditambahkan di program 

- **Kurangnya Notifikasi Real-Time** 
Sistem ini masih menitikberatkan pada dashboard. Oleh karenanya, jika dosen selesai memvalidasi logbook atau ada pengumuman baru, pengguna tidak mendapat notifikasi push (seperti email/WhatsApp secara instan) dan harus terus mengecek/me-refresh website secara berkala.
- **Ketergantungan Input Manual** 
Pengalokasian (plot) dosen pembimbing ke mahasiswa dan penyetujuan/validasi SKS pada proses konversi masih banyak bergantung pada input dan kebijaksanaan manual dari pihak Admin atau Dosen terkait, yang memakan waktu jika pesertanya banyak.
- **Integrasi Sistem Eksternal** 
Jika aplikasi ini bersifat mandiri (berdiri sendiri), maka di tahap akhir pihak Dosen maupun staf akademik tetap perlu melakukan input ulang nilai konversi mahasiswa ke sistem akademik kampus utama (SIAKAD/Portal Akademik).
- **Fitur Chat** 
Tidak ada fitur chat antara mahasiswa dan dosen pembimbing.
- **Reset status magang masih manual** 
Reset status magang masih manual dilakukan dari database.
- **pembatasan maksimal pendaftaran masih dari hardcode** 
pembatasan maksimal pendaftaran masih dari hardcode, perlu dibuatkan sistem agar bisa diatur dari admin.
- **pembuatan user admin masih manual** 
pembuatan user admin masih manual dilakukan dari database.