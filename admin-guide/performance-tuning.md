# Penyetelan Performa

Pengaturan performa membantu mengoptimalkan Chamilo untuk pemuatan halaman yang lebih cepat dan pemanfaatan sumber daya yang lebih baik, terutama pada platform dengan banyak pengguna bersamaan.

> **Referensi tambahan**: Instalasi Chamilo Anda menyertakan panduan optimasi yang lebih luas. Buka `/documentation/optimization.html` di peramban (misalnya `https://your-chamilo-site/documentation/optimization.html`) untuk rekomendasi tingkat server yang spesifik untuk versi Anda.

## Cache Symfony

Chamilo 2.0 dibangun di atas Symfony, yang menggunakan cache yang dikompilasi untuk routing, injeksi dependensi, dan template. Mengelola cache ini sangat penting untuk performa.

### Menghapus Cache

Setelah perubahan konfigurasi, deployment, atau pembaruan, hapus cache Symfony:

```bash
# Menghapus cache untuk lingkungan saat ini
php bin/console cache:clear

# Khusus untuk lingkungan produksi
php bin/console cache:clear --env=prod
```

Dalam lingkungan produksi, pastikan selalu `APP_ENV=prod` diatur dalam file `.env.local` Anda. Lingkungan pengembangan (`APP_ENV=dev`) menyertakan overhead debugging yang ekstensif dan tidak boleh digunakan dalam produksi.

### Pemanasan Cache

Setelah menghapus cache, panaskan cache untuk mengkompilasi ulang template dan konfigurasi:

```bash
php bin/console cache:warmup --env=prod
```

## Strategi Cache

| Strategi | Deskripsi |
|----------|-----------|
| **OPcache** | Cache opcode bawaan PHP. Pastikan diaktifkan di `php.ini` Anda dengan memori yang memadai (`opcache.memory_consumption=256`). Ini adalah optimasi performa yang paling berdampak. |
| **APCu** | Cache key-value dalam memori yang digunakan oleh Symfony untuk menyimpan metadata. Instal ekstensi PHP APCu dan konfigurasikan di konfigurasi cache Symfony Anda. |
| **Redis / Memcached** | Untuk platform dengan lalu lintas tinggi, konfigurasikan backend cache eksternal. Atur adapter cache di `config/packages/cache.yaml`. |

### Pengaturan OPcache yang Direkomendasikan

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Atur ke 0 di produksi untuk performa terbaik
opcache.revalidate_freq=0
```

Ketika `validate_timestamps` diatur ke 0, Anda harus menghapus OPcache setelah mendeploy kode baru (restart PHP-FPM atau panggil `opcache_reset()`).

## Lazy Loading

| Pengaturan | Deskripsi |
|------------|-----------|
| **Lazy-load gambar** | Mengaktifkan atribut `loading="lazy"` pada gambar sehingga gambar di luar layar hanya dimuat saat digulir ke tampilan. Mengurangi waktu pemuatan halaman awal. |
| **Pemuatan JavaScript tertunda** | Memuat file JavaScript yang tidak kritis secara asinkron untuk menghindari pemblokiran rendering halaman. |

## CDN (Content Delivery Network)

Untuk platform yang melayani pengguna di berbagai wilayah geografis, CDN dapat secara signifikan meningkatkan waktu pemuatan untuk aset statis (CSS, JavaScript, gambar).

Untuk mengkonfigurasi CDN:

1. Siapkan distribusi CDN (misalnya, CloudFront, Cloudflare, atau penyedia lain) yang mengarah ke server Chamilo Anda.
2. Konfigurasikan URL dasar aset di lingkungan atau konfigurasi Symfony Anda sehingga aset statis disajikan melalui CDN.
3. Atur header cache yang sesuai untuk file statis (kadaluarsa panjang untuk aset yang memiliki versi).

## Optimasi Basis Data

| Tindakan | Deskripsi |
|----------|-----------|
| **Gunakan pooling koneksi basis data** | Untuk platform dengan konkurensi tinggi, konfigurasikan pooling koneksi untuk mengurangi overhead dalam membangun koneksi basis data. |
| **Optimasi kueri** | Chamilo menyertakan indeks basis data untuk kueri umum. Jalankan `ANALYZE TABLE` secara berkala di MySQL/MariaDB untuk menjaga statistik perencana kueri tetap terkini. |
| **Server basis data terpisah** | Untuk instalasi besar, jalankan basis data di server khusus daripada berbagi sumber daya dengan server web. |

## Konfigurasi Server Web

| Optimasi | Deskripsi |
|----------|-----------|
| **Aktifkan kompresi gzip/brotli** | Kompres respons HTML, CSS, dan JavaScript. Sebagian besar server web mendukung ini secara bawaan. |
| **Cache file statis** | Atur header `Cache-Control` dan `Expires` yang panjang untuk aset statis. |
| **Penyetelan PHP-FPM** | Sesuaikan `pm.max_children`, `pm.start_servers`, dan `pm.max_requests` berdasarkan RAM yang tersedia dan konkurensi yang diharapkan. |
| **HTTP/2** | Aktifkan HTTP/2 di server web Anda untuk koneksi multipleks dan kompresi header. |

## Tips

* **OPcache adalah keuntungan terbesar** -- Pastikan diaktifkan dan ukurannya sesuai sebelum mengejar optimasi lain.
* **Jangan pernah menjalankan produksi dengan `APP_ENV=dev`** -- Toolbar debug dan profiler menambahkan overhead signifikan pada setiap permintaan.
* **Pantau sebelum menyetel** -- Gunakan alat seperti New Relic, Blackfire, atau profiler bawaan Symfony (dalam mode dev) untuk mengidentifikasi hambatan aktual daripada menebak.
* **Panaskan cache setelah setiap deployment** untuk menghindari pengguna pertama mengalami permintaan yang lambat karena cache belum terisi.