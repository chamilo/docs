# Meningkatkan Versi

Catatan: Pada halaman ini, kami menggunakan 2.0.0 sebagai nomor versi yang ketat dan 2.x untuk mengidentifikasi semua versi yang dimulai dengan angka 2 (2.0.0, 2.0.1, 2.1.0, dll)

Proses peningkatan versi dari 1.11.x ke 2.x dijelaskan dalam file `public/documentation/installation_guide.html` di dalam kode Chamilo Anda. Informasi di sini sebagian besar bersifat redundan. Anda dapat melihatnya secara online di `https://campus.chamilo.net/documentation/installation_guide.html`. Meskipun kami telah melakukan pengujian ekstensif pada migrasi serupa, karena beberapa pengaturan 1.11.x belum didukung di 2.0.0, kami merekomendasikan untuk menunggu versi 2.1 sebelum meningkatkan sistem 1.11.x, atau untuk mendapatkan pendampingan profesional dari [penyedia resmi Chamilo](https://chamilo.org/providers) dalam upaya ini.

## Meningkatkan Versi dari 1.11.x ke 2.x

Meningkatkan versi dari Chamilo 1.11.x ke 2.x adalah **migrasi besar**, bukan pembaruan sederhana. Chamilo 2.0 dibangun ulang menggunakan kerangka kerja Symfony dengan skema basis data yang direstrukturisasi, API baru, dan organisasi file yang berbeda. Rencanakan migrasi ini dengan hati-hati dan cobalah di lingkungan pengujian sebelum diterapkan di produksi.

### Sebelum Memulai

1. **Baca catatan rilis** untuk Chamilo 2.x untuk memahami apa yang telah berubah, apa yang baru, dan fitur apa dari 1.11.x yang mungkin belum tersedia.
2. **Cadangkan semuanya**:
   - Dump basis data lengkap (`mysqldump` atau yang setara).
   - Semua file di direktori instalasi Chamilo 1.11.x, terutama `app/upload/`, `app/courses/`, dan `main/`.
   - File `configuration.php` Anda.
3. **Uji di server staging terlebih dahulu.** Jangan pernah menjalankan migrasi langsung di server produksi Anda.
4. **Verifikasi persyaratan server.** Chamilo 2.x memiliki persyaratan yang berbeda dari 1.11.x (terutama, PHP 8.2+). Lihat [Persyaratan Server](server-requirements.md).

### Hal yang Mungkin Memerlukan Perhatian Manual

| Area | Catatan |
|------|---------|
| **Plugin kustom** | Plugin 1.11.x tidak kompatibel dengan 2.x. Plugin tersebut harus ditulis ulang atau diganti, yang sebagian telah dilakukan di 2.0 dan seharusnya selesai pada 2.1 untuk plugin resmi. |
| **Tema kustom** | Tema 1.11.x tidak berfungsi di 2.x. Buat ulang branding Anda menggunakan sistem tema 2.x. |
| **Modifikasi basis data kustom** | Setiap modifikasi basis data langsung di luar Chamilo mungkin tidak akan dimigrasikan. |
| **Paket SCORM** | Konten SCORM seharusnya dapat dimigrasikan, tetapi uji paket secara individual untuk memverifikasi pemutaran. |
| **Integrasi eksternal** | Setiap integrasi yang menggunakan API atau layanan web 1.11.x perlu diperbarui untuk menggunakan API REST-only 2.x dengan [API Platform](https://github.com/api-platform/api-platform). |

## Memperbarui Chamilo 2.0.x

Pembaruan kecil dalam cabang 2.0 lebih sederhana.

### Proses Pembaruan

#### Menggunakan Paket

1. **Cadangkan** basis data dan file.

2. **Unduh versi terbaru 2.0.x** dari [chamilo.org](https://chamilo.org/download):

3. **Ekstrak secara lokal**

Sebagai contoh (sesuaikan dengan versi yang diunduh)
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Salin file ke instalasi Chamilo Anda yang sudah ada**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Jalankan migrasi basis data:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Bersihkan cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ubah izin**

Sesuaikan dengan pengguna server web Anda:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifikasi** bahwa platform dimuat dengan benar dan periksa fungsionalitas utama secara acak.

#### Menggunakan Git

Jika Anda menginstal Chamilo menggunakan Git, Anda dapat mengikuti petunjuk ini sebagai gantinya.

1. **Cadangkan** basis data dan file.

2. **Tarik kode terbaru** (atau unduh rilis baru):
   ```bash
   git pull origin 2.0
   ```

3. **Perbarui dependensi PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Perbarui dependensi JavaScript dan bangun ulang aset:**
   ```bash
   yarn install && yarn build
   ```

5. **Jalankan migrasi basis data:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Bersihkan cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ubah izin**

Sesuaikan dengan pengguna server web Anda:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifikasi** bahwa platform dimuat dengan benar dan periksa fungsionalitas utama secara acak.

### Mengotomatiskan Pembaruan

Untuk organisasi yang mengelola beberapa instance Chamilo, pertimbangkan untuk membuat skrip proses pembaruan:

```bash
#!/bin/bash
set -e

# Tarik kode
git pull origin 2.0

# Dependensi
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Basis data
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Pembaruan selesai."
```

---
## Tips

* **Selalu lakukan cadangan sebelum meningkatkan versi.** Migrasi basis data tidak dapat dibatalkan melalui antarmuka Chamilo.
* **Uji terlebih dahulu di lingkungan staging** -- terutama untuk migrasi dari 1.11.x ke 2.0, yang melibatkan transformasi data yang signifikan.
* **Jadwalkan peningkatan versi selama jendela pemeliharaan** ketika pengguna tidak aktif menggunakan platform.
* **Berlangganan rilis di GitHub** pada [Github](https://github.com/chamilo/chamilo-lms/releases) menggunakan ikon lonceng untuk mendapatkan pemberitahuan tentang versi baru dan patch keamanan.
* **Pembaruan web** belum tersedia di Chamilo 2.0, tetapi ini adalah proyek yang sedang berjalan dan kami harap akan segera dirilis.