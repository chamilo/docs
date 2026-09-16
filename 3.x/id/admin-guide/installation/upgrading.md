# Peningkatan Versi

Catatan: Pada halaman ini, kami menggunakan 3.0.0 sebagai nomor versi yang ketat dan 3.x untuk mengidentifikasi semua versi yang dimulai dengan angka 3 (3.0.0, 3.0.1, 3.1.0, dan seterusnya). Konvensi yang sama berlaku untuk 2.x.

Proses peningkatan versi dari 1.11.x juga dijelaskan dalam berkas `public/documentation/installation_guide.html` Anda, di dalam kode Chamilo.
Informasi di sini sebagian besar bersifat berulang. Anda dapat melihatnya secara daring di `https://campus.chamilo.net/documentation/installation_guide.html`.

**Tingkatkan ke 3.0, bukan ke 2.x.** Versi 3.0 adalah rilis saat ini, dan beberapa pengaturan 1.11.x belum memiliki padanan di 2.0.0. Oleh karena itu, sistem 1.11.x langsung menuju 3.0. Kami telah menguji migrasi serupa secara ekstensif, tetapi setiap platform memiliki riwayatnya sendiri: cobalah terlebih dahulu di lingkungan uji, dan pertimbangkan untuk didampingi secara profesional oleh [penyedia resmi Chamilo](https://chamilo.org/providers) dalam upaya ini.

## Peningkatan versi dari 1.11.x ke 3.0

Peningkatan versi dari Chamilo 1.11.x ke 3.0 adalah **migrasi besar**, bukan pembaruan sederhana. Chamilo 2.0 dibangun ulang di atas kerangka kerja Symfony dengan skema basis data yang disusun ulang, API baru, dan organisasi berkas yang berbeda, dan 3.0 melanjutkan jalur tersebut. Rencanakan migrasi ini dengan cermat dan cobalah di lingkungan uji sebelum diterapkan ke produksi.

### Sebelum Anda Mulai

1. **Baca catatan rilis** untuk Chamilo 3.x guna memahami apa yang telah berubah, apa yang baru, dan fitur mana dari 1.11.x yang mungkin belum tersedia.
2. **Cadangkan semuanya**:
   - Dump basis data lengkap (`mysqldump` atau yang setara).
   - Semua berkas di direktori instalasi Chamilo 1.11.x, terutama `app/upload/`, `app/courses/`, dan `main/`.
   - Berkas `configuration.php` Anda.
3. **Uji di server staging terlebih dahulu.** Jangan pernah menjalankan migrasi langsung di server produksi Anda.
4. **Verifikasi persyaratan server.** Chamilo 3.x memiliki persyaratan yang berbeda dari 1.11.x (khususnya, PHP 8.3 atau lebih baru — penginstal menolak apa pun yang lebih lama). Lihat [Persyaratan Server](server-requirements.md).
5. **Hapus tabel `version` dari basis data 1.11.x.** Langkah ini wajib. Chamilo 2.x dan yang lebih baru menyimpan riwayat migrasi Doctrine dalam tabel dengan nama tersebut, dengan kolom yang berbeda. Jika Anda membiarkan tabel 1.11.x tetap ada, peningkatan versi akan berhenti segera. Tabel tersebut tidak diperlukan agar Chamilo 1.11.x berfungsi.
6. **Ekstrak kode baru di direktori baru.** Berkas 1.11.x tetap di tempatnya. Penginstal membacanya sebagai sumber kursus dan unggahan Anda, dan menulis hasilnya ke dalam pohon baru.

### Menjalankan Peningkatan Versi

Anda dapat menjalankan peningkatan versi melalui wizard web atau melalui baris perintah.

#### Wizard web

1. Arahkan `DocumentRoot` dari virtual host Anda ke subdirektori `public/` dari pohon baru.
2. Buka URL Anda. Wizard dimulai, karena pohon baru belum memiliki berkas `.env`.
3. Pada langkah 2, pilih opsi peningkatan versi dan berikan jalur akar instalasi 1.11.x Anda.
4. Ikuti wizard hingga selesai.

#### Baris perintah

Atur `UPDATE_PATH` ke akar instalasi 1.11.x Anda, lalu jalankan migrasi:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Naikkan `memory_limit` dan `max_execution_time` terlebih dahulu. Migrasi membaca setiap berkas kursus, sehingga membutuhkan jauh lebih banyak daripada nilai bawaan.

#### Berapa lama waktu yang dibutuhkan

Durasi mengikuti ukuran basis data dan berkas kursus Anda. Sebagai satu titik acuan, platform 1.11.28 dengan 238 tabel, 11 kursus, 63 pengguna, dan 1489 berkas kursus membutuhkan **6 menit** dan 1,7 GB memori, serta menjalankan 393 migrasi. Platform produksi yang besar membutuhkan waktu berjam-jam. Rencanakan jendela pemeliharaan, dan baca [forum Chamilo](https://chamilo.org) atau hubungi [penyedia resmi](https://chamilo.org/providers) sebelum Anda menjalankannya di produksi.

### Hal yang Mungkin Memerlukan Perhatian Manual

| Area | Catatan |
|------|-------|
| **Plugin kustom** | Plugin 1.11.x tidak berfungsi di 2.x atau 3.x. Plugin tersebut harus ditulis ulang atau diganti. Plugin resmi telah diport secara bertahap sejak 2.0 — periksa daftar plugin versi Anda untuk melihat mana yang tersedia. |
| **Tema kustom** | Tema 1.11.x tidak berfungsi di 2.x atau 3.x. Buat ulang merek Anda menggunakan sistem penataan tema 3.x. |
| **Modifikasi basis data kustom** | Setiap modifikasi basis data langsung di luar Chamilo mungkin tidak dimigrasikan. |
| **Paket SCORM** | Konten SCORM seharusnya bermigrasi, tetapi uji paket satu per satu untuk memverifikasi pemutaran. |
| **Integrasi eksternal** | Setiap integrasi yang menggunakan API atau layanan web 1.11.x perlu diperbarui agar menggunakan API REST-only 2.x dengan [API Platform](https://github.com/api-platform/api-platform). |

## Peningkatan versi dari 2.x ke 3.0

Peningkatan versi ini mempertahankan direktori yang ada dan basis data yang ada. Anda menyalin kode baru di atas pohon lama, lalu menjalankan migrasi, baik melalui wizard web maupun melalui baris perintah.

### Isi riwayat migrasi terlebih dahulu

Chamilo memasang skema basis data langsung dari definisi entitas, sehingga instalasi yang dibuat oleh penginstal memiliki skema akhir tetapi **riwayat migrasi kosong**. Instalasi yang dibuat sebelum Chamilo 3.0 tidak pernah diberi riwayat tersebut. Dua hal bergantung padanya:

* `doctrine:migrations:migrate` memutuskan apa yang akan dijalankan darinya. Dengan riwayat kosong, perintah itu mencoba memutar ulang setiap migrasi dari awal pada skema yang sudah mutakhir.
* Penginstal web memutuskan darinya apakah peningkatan tertunda. Dengan riwayat kosong, permintaan ditolak, karena tidak ada bukti bahwa peningkatan diperlukan.

Jadi isi riwayat itu sekali, dan perhatikan urutan di bawah.

> **Peringatan: isi riwayat sebelum Anda menyalin kode baru.** Perintah-perintah tersebut menandai setiap migrasi yang dibawa oleh kode yang **sedang terpasang** sebagai sudah dijalankan. Jika Anda menjalankannya setelah menyalin kode 3.0, migrasi 3.0 juga ikut ditandai, dan peningkatan Anda tidak pernah dijalankan.

Dengan versi Anda saat ini masih terpasang, jalankan:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Perintah pertama membuat tabel riwayat. Perintah kedua menandai migrasi versi Anda saat ini. `doctrine:migrations:version` gagal dengan sendirinya jika tabel belum ada, jadi jangan lewati perintah pertama.

Periksa hasilnya:

```bash
php bin/console doctrine:migrations:status
```

`Executed` harus sama dengan `Available`, dan `New` harus 0. Sekarang salin kode 3.0.

### Jalankan peningkatan

Salin kode baru, lalu buka URL Anda dan ikuti wizard, atau jalankan migrasi dari baris perintah:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Wizard web hanya terbuka selama migrasi masih tertunda. Setelah peningkatan selesai, wizard menjawab `409 Conflict` lagi, itulah yang melindunginya: wizard tidak memiliki login sendiri.

## Memperbarui Chamilo 3.0.x

Pembaruan minor dalam cabang 3.0 lebih sederhana.

### Proses Pembaruan

#### Menggunakan paket

1. **Cadangkan** basis data dan berkas.

2. **Unduh versi 3.0.x terbaru** dari [chamilo.org](https://chamilo.org/download):

3. **Ekstrak secara lokal**

Contoh (sesuaikan dengan versi yang diunduh)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Salin berkas ke instalasi Chamilo yang ada**
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

8. **Verifikasi** bahwa platform dimuat dengan benar dan periksa secara acak fungsi-fungsi utama.

#### Menggunakan Git

Jika Anda memasang Chamilo menggunakan Git, Anda dapat mengikuti petunjuk ini sebagai gantinya.

1. **Cadangkan** basis data dan berkas.

2. **Tarik kode terbaru** (atau unduh rilis baru):
   ```bash
   git pull origin 3.0
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

8. **Verifikasi** bahwa platform dimuat dengan benar dan periksa secara acak fungsi-fungsi utama.

### Mengotomatiskan Pembaruan

Bagi organisasi yang mengelola beberapa instans Chamilo, pertimbangkan untuk membuat skrip proses pembaruan:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Tips

* **Selalu cadangkan sebelum meningkatkan versi.** Migrasi basis data tidak dapat dibatalkan melalui antarmuka Chamilo.
* **Uji di staging terlebih dahulu** -- terutama untuk migrasi 1.11.x ke 3.0, yang melibatkan transformasi data yang signifikan.
* **Jadwalkan peningkatan versi selama jendela pemeliharaan** ketika pengguna tidak sedang aktif menggunakan platform.
* **Berlangganan rilis GitHub** di [Github](https://github.com/chamilo/chamilo-lms/releases) menggunakan ikon lonceng agar diberitahu tentang versi baru dan patch keamanan.
* **Jika wizard menjawab `Chamilo is already installed`**, wizard tidak menemukan migrasi yang tertunda. Jalankan `php bin/console doctrine:migrations:status` untuk memeriksa. Jika `Executed` bernilai 0 pada platform yang berfungsi, riwayat migrasi Anda tidak pernah di-seed — lihat [Seed riwayat migrasi terlebih dahulu](#seed-the-migration-history-first).
* **Unduhan otomatis versi baru** belum tersedia di Chamilo 3.0, tetapi ini adalah proyek yang sedang berjalan dan kami berharap dapat merilisnya segera. Peningkatan versi itu sendiri sudah berjalan dari wizard web.