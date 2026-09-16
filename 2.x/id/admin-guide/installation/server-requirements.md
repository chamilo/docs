# Persyaratan Server

Sebelum menginstal Chamilo 2.0, pastikan server Anda memenuhi persyaratan berikut.

## Persyaratan Perangkat Lunak

### PHP

| Persyaratan | Minimum | Direkomendasikan |
|-------------|---------|------------------|
| **Versi PHP** | 8.2 | 8.3 atau lebih baru |

### Ekstensi PHP yang Diperlukan

| Ekstensi | Tujuan |
|-----------|--------|
| **curl** | Permintaan HTTP (integrasi API, layanan eksternal) |
| **fileinfo** | Deteksi tipe MIME untuk file yang diunggah |
| **gd** | Pemrosesan gambar (thumbnail, CAPTCHA) |
| **intl** | Internasionalisasi (format tanggal, angka, dan string) |
| **json** | Pengkodean/dekode JSON |
| **ldap** | Konektor LDAP. Meskipun Anda mungkin tidak menggunakan LDAP, Chamilo membutuhkannya |
| **mbstring** | Penanganan string multibyte (dukungan UTF-8) |
| **openssl** | Operasi kriptografi (HTTPS, hashing kata sandi, token) |
| **pdo_mysql** atau **pdo_pgsql** | Konektivitas basis data (instal yang sesuai dengan basis data Anda) |
| **xml** | Penguraian XML (SCORM, RSS, SOAP) |
| **zip** | Penanganan arsip ZIP (paket SCORM, impor/ekspor massal) |
| **apcu** | Caching tingkat pengguna (direkomendasikan) |
| **opcache** | Caching opcode (sangat direkomendasikan untuk performa) |
| **xapian** | Pencarian teks lengkap (opsional, hanya jika Anda menggunakan fitur pencarian) |

### Basis Data

| Basis Data | Versi Minimum |
|------------|---------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Server Web

| Server | Catatan |
|--------|---------|
| **Apache** | Memerlukan `mod_rewrite` diaktifkan. |
| **Nginx** | Memerlukan konfigurasi manual untuk penulisan ulang URL. Lihat dokumentasi Symfony Nginx untuk konfigurasi referensi. |

### Alat Pengembangan

| Alat | Tujuan |
|------|--------|
| **Composer** | Manajemen dependensi PHP. Diperlukan untuk menginstal pustaka PHP Chamilo. |
| **Node.js** (18+) | Runtime JavaScript. Diperlukan untuk membangun aset frontend. |
| **npm** | Manajer paket JavaScript. Terinstal bersama Node.js. |

## Persyaratan Perangkat Keras

| Sumber Daya | Minimum | Direkomendasikan |
|-------------|---------|------------------|
| **RAM** | 2 GB | 4 GB atau lebih |
| **CPU** | 1 inti | 2+ inti |
| **Ruang Disk** | 2 GB (hanya aplikasi) | 20+ GB (termasuk konten yang diunggah) |
| **Jenis Disk** | HDD | SSD (secara signifikan meningkatkan performa basis data dan cache) |

Angka-angka ini adalah dasar. Persyaratan aktual tergantung pada jumlah pengguna bersamaan dan volume konten yang dihosting.

## Sistem Operasi

| OS | Catatan |
|----|---------|
| **Linux** | Direkomendasikan. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+, atau setara. |
| **Windows** | Memungkinkan tetapi belum diuji secara menyeluruh. Gunakan WSL2 untuk pengembangan. |
| **macOS** | Hanya untuk pengembangan / belum diuji. |

## Persyaratan Jaringan

* Nama domain yang mengarah ke server Anda.
* Sertifikat SSL/TLS untuk HTTPS (Let's Encrypt menyediakan sertifikat gratis).
* Akses SMTP keluar jika mengirim email secara langsung (atau gunakan layanan email pihak ketiga).
* Port 443 (HTTPS) dan opsional port 80 (HTTP, untuk pengalihan ke HTTPS).

## Memeriksa Persyaratan

Setelah menempatkan sumber Chamilo di server Anda, Anda dapat memeriksa konfigurasi PHP secara langsung:

```bash
php -m          # Daftar ekstensi yang terinstal
php -i          # Informasi lengkap PHP
```

## Tips

* **Gunakan PHP-FPM** dengan Apache atau Nginx untuk performa yang lebih baik dibandingkan mod_php.
* **Pisahkan basis data Anda** ke server khusus untuk platform yang mengharapkan lebih dari 500 pengguna bersamaan.
* **Gunakan penyimpanan SSD** -- Aplikasi yang berat pada basis data seperti Chamilo sangat diuntungkan dari I/O disk yang cepat.