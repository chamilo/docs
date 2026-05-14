# Gambaran Umum Antarmuka Admin

Panel administrasi adalah pusat kendali Anda untuk mengelola platform Chamilo. Akses panel ini dengan mengklik **Administrasi** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> di bilah sisi.

## Dasbor Administrasi

![Dasbor administrasi yang menampilkan blok fungsional untuk Pengguna, Kursus, Sesi, dan Pengaturan](/.gitbook/assets/admin-dashboard-overview.png)

Dasbor admin diorganisasi ke dalam blok-blok fungsional. Setiap blok mengelompokkan alat manajemen yang terkait:

### Pengguna

* **Daftar pengguna** — Melihat, mencari, mengedit, dan mengelola semua pengguna di platform
* **Tambah pengguna** — Membuat akun pengguna individu
* **Kelompok pengguna** — Mengelola kelompok pengguna untuk keperluan organisasi
* **Kelas** — Mengelola kelas pengguna untuk pendaftaran sesi secara massal

### Kursus

* **Daftar kursus** — Melihat dan mengelola semua kursus di platform
* **Buat kursus** — Membuat kursus baru
* **Kategori kursus** — Mengatur kursus ke dalam kategori untuk katalog

### Sesi

* **Daftar sesi** — Melihat dan mengelola sesi pelatihan
* **Buat sesi** — Menyiapkan sesi baru dengan kursus dan pendaftaran
* **Kategori sesi** — Mengatur sesi ke dalam kategori
* **Karier dan promosi** — Mengelola jalur karier dan alur kerja promosi

### Pengaturan Platform

* **Pengaturan konfigurasi** — Mengakses panel pengaturan platform yang komprehensif dengan kategori untuk portal, kursus, sesi, pengguna, keamanan, dan lainnya

### Plugin

* **Kelola plugin** — Memasang, mengaktifkan, mengonfigurasi, dan menonaktifkan plugin platform

### Sistem

* **Status sistem** — Memeriksa konfigurasi PHP, status basis data, dan kesehatan server
* **Pembersihan arsip** — Mengelola file sementara dan cache

### Branding

* **Warna** — Menyesuaikan tampilan visual platform
* **Kustomisasi portal** — Mengonfigurasi halaman utama portal, berita, dan elemen branding

Setiap bagian dijelaskan secara rinci dalam bab yang sesuai di panduan ini.

Metode autentikasi seperti OAuth2, LDAP, CAS, dan penyedia autentikasi eksternal lainnya tidak dikonfigurasi di dasbor administrasi, melainkan di `config/authentication.yaml`.