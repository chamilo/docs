# Persyaratan Server

Sebelum menginstal Chamilo 3.0, pastikan server Anda memenuhi persyaratan berikut.

## Persyaratan Perangkat Lunak

### PHP

| Persyaratan | Minimum | Direkomendasikan |
|-------------|---------|-------------|
| **Versi PHP** | 8.3 | 8.5 |

### Ekstensi PHP yang Diperlukan

| Ekstensi | Tujuan |
|-----------|---------|
| **bcmath** | Matematika presisi arbitrer |
| **ctype** | Pemeriksaan tipe karakter |
| **curl** | Permintaan HTTP (integrasi API, layanan eksternal) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Penguraian XML dan penanganan DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Pembacaan metadata gambar (mis. orientasi otomatis foto yang diunggah) |
| **fileinfo** | Deteksi tipe MIME untuk berkas yang diunggah |
| **gd** | Pemrosesan gambar (thumbnail, CAPTCHA) |
| **iconv** | Konversi set karakter |
| **intl** | Internasionalisasi (pemformatan tanggal, angka, dan string) |
| **json** | Pengodean/pengodean ulang JSON |
| **ldap** | Konektor LDAP. Meskipun Anda mungkin tidak menggunakan LDAP, Chamilo membutuhkannya |
| **mbstring** | Penanganan string multibyte (dukungan UTF-8) |
| **openssl** | Operasi kriptografi (HTTPS, hashing kata sandi, token JWT) |
| **pdo**, plus **pdo_mysql** atau **pdo_pgsql** | Konektivitas basis data (instal driver yang sesuai dengan basis data Anda) |
| **soap** | Penanganan layanan web SOAP |
| **zip** | Penanganan arsip ZIP (paket SCORM, impor/ekspor massal) |
| **zlib** | Kompresi yang digunakan secara internal oleh beberapa dependensi |
| **apcu** | Caching tingkat pengguna (direkomendasikan, diperiksa tetapi tidak diwajibkan oleh penginstal) |
| **opcache** | Caching opcode (sangat direkomendasikan untuk kinerja, diperiksa tetapi tidak diwajibkan oleh penginstal) |
| **xapian** | Pencarian teks penuh (opsional, hanya jika Anda menggunakan pencarian) |

### Basis Data

| Basis Data | Versi Minimum | Direkomendasikan |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 atau lebih tinggi |
| **MySQL** | 5.7 | 8.0 atau lebih tinggi |

Versi MariaDB yang lebih lama dari 10.2.2 (dan versi MySQL yang lebih lama dari 5.7) memerlukan dukungan indeks/awalan besar yang diaktifkan secara manual dalam konfigurasi server sebelum menginstal Chamilo.

### Server Web

| Server | Catatan |
|--------|-------|
| **Apache** | Memerlukan `mod_rewrite` (serta `ssl`, `headers`, `expires`) yang diaktifkan. Chamilo menyertakan contoh vhost di `public/main/install/apache.dist.conf`. |
| **Nginx** | Memerlukan konfigurasi manual untuk penulisan ulang URL — Chamilo tidak menyertakan contoh konfigurasi Nginx. Lihat dokumentasi Nginx Symfony untuk konfigurasi referensi. |

### Alat Build

| Alat | Tujuan |
|------|---------|
| **Composer** (^2.8) | Manajemen dependensi PHP. Diperlukan untuk menginstal pustaka PHP Chamilo. |
| **Node.js** (20+ LTS) | Runtime JavaScript. Diperlukan untuk membangun aset frontend. |
| **Yarn** (^4, via Corepack) | Manajer paket JavaScript yang digunakan untuk membangun aset frontend (`yarn install`, `yarn encore production`). |

## Persyaratan Perangkat Keras

| Sumber Daya | Minimum | Direkomendasikan |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB atau lebih (membangun aset frontend dari sumber membutuhkan setidaknya 4 GB tersendiri) |
| **CPU** | 2 vCPU | 2+ inti |
| **Ruang disk** | 4 GB (hanya aplikasi) | 20+ GB (termasuk konten yang diunggah); membangun dari sumber membutuhkan ~10 GB ruang kosong selama proses build |
| **Jenis disk** | HDD | SSD (secara signifikan meningkatkan kinerja basis data dan cache) |

Angka-angka ini merupakan angka dasar dari panduan instalasi Chamilo sendiri. Persyaratan aktual bergantung pada jumlah pengguna bersamaan dan volume konten yang dihosting.

## Sistem Operasi

| OS | Catatan |
|----|-------|
| **Linux** | Direkomendasikan. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+, atau setara. |
| **Windows** | Memungkinkan tetapi belum diuji secara menyeluruh. Gunakan WSL2 untuk pengembangan. |
| **macOS** | Hanya untuk pengembangan / belum diuji. |

## Persyaratan Jaringan

* Nama domain yang mengarah ke server Anda.
* Sertifikat SSL/TLS untuk HTTPS (Let's Encrypt menyediakan sertifikat gratis).
* Akses SMTP keluar jika mengirim email secara langsung (atau gunakan layanan email pihak ketiga).
* Port 443 (HTTPS) dan secara opsional port 80 (HTTP, untuk pengalihan ke HTTPS).

## Memeriksa Persyaratan

Setelah menempatkan sumber Chamilo di server Anda, Anda dapat memeriksa konfigurasi PHP secara langsung:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Gunakan PHP-FPM** dengan Apache atau Nginx untuk kinerja yang lebih baik daripada mod_php.
* **Pisahkan basis data Anda** ke server khusus untuk platform yang mengharapkan lebih dari 500 pengguna bersamaan.
* **Gunakan penyimpanan SSD** -- Aplikasi yang berat pada basis data seperti Chamilo sangat diuntungkan dari I/O disk yang cepat.