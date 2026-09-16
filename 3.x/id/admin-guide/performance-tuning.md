# Penyetelan Kinerja

Pengaturan kinerja membantu mengoptimalkan Chamilo agar pemuatan halaman lebih cepat dan pemanfaatan sumber daya lebih baik, terutama pada platform dengan banyak pengguna bersamaan.

> **Referensi tambahan**: Instalasi Chamilo Anda menyertakan panduan pengoptimalan yang lebih lengkap. Buka `/documentation/optimization.html` di peramban (misalnya `https://your-chamilo-site/documentation/optimization.html`) untuk rekomendasi tingkat server yang spesifik bagi versi Anda.

## Cache Symfony

Chamilo 3.0 dibangun di atas Symfony, yang menggunakan cache terkompilasi untuk routing, injeksi dependensi, dan templat. Mengelola cache ini sangat penting bagi kinerja.

### Mengosongkan Cache

Setelah perubahan konfigurasi, deployment, atau peningkatan, kosongkan cache Symfony:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Di produksi, selalu pastikan `APP_ENV=prod` diatur di berkas `.env.local` Anda. Lingkungan pengembangan (`APP_ENV=dev`) menyertakan overhead debugging yang ekstensif dan tidak boleh digunakan di produksi.

### Pemanasan Cache

Setelah mengosongkan cache, panaskan cache untuk mengompilasi terlebih dahulu templat dan konfigurasi:

```bash
php bin/console cache:warmup --env=prod
```

## Strategi Caching

| Strategi | Deskripsi |
|----------|-------------|
| **OPcache** | Cache opcode bawaan PHP. Pastikan diaktifkan di `php.ini` Anda dengan memori yang memadai (`opcache.memory_consumption=256`). Ini adalah pengoptimalan kinerja yang paling berdampak. |
| **APCu** | Cache kunci-nilai di memori yang digunakan Symfony untuk menyimpan metadata. Instal ekstensi PHP APCu dan konfigurasikan di konfigurasi cache Symfony Anda. |
| **Redis / Memcached** | Untuk platform dengan lalu lintas tinggi, konfigurasikan backend cache eksternal. Atur adapter cache di `config/packages/cache.yaml`. |

### Pengaturan OPcache yang Direkomendasikan

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Ketika `validate_timestamps` diatur ke 0, Anda harus mengosongkan OPcache setelah men-deploy kode baru (restart PHP-FPM atau panggil `opcache_reset()`).

## Lazy Loading

| Pengaturan | Deskripsi |
|---------|-------------|
| **Lazy-load images** | Mengaktifkan atribut `loading="lazy"` pada gambar sehingga gambar di luar layar hanya dimuat saat digulir ke dalam tampilan. Mengurangi waktu pemuatan halaman awal. |
| **Deferred JavaScript loading** | Memuat berkas JavaScript non-kritis secara asinkron agar tidak memblokir rendering halaman. |

## CDN (Content Delivery Network)

Untuk platform yang melayani pengguna di berbagai wilayah geografis, CDN dapat secara signifikan meningkatkan waktu pemuatan aset statis (CSS, JavaScript, gambar).

Untuk mengonfigurasi CDN:

1. Siapkan distribusi CDN (misalnya CloudFront, Cloudflare, atau penyedia lain) yang mengarah ke server Chamilo Anda.
2. Konfigurasikan URL dasar aset di lingkungan atau konfigurasi Symfony Anda agar aset statis disajikan melalui CDN.
3. Atur header cache yang sesuai untuk berkas statis (kedaluwarsa panjang untuk aset berversi).

## Pengoptimalan Basis Data

| Tindakan | Deskripsi |
|--------|-------------|
| **Use database connection pooling** | Untuk platform dengan konkurensi tinggi, konfigurasikan connection pooling untuk mengurangi overhead pembentukan koneksi basis data. |
| **Optimize queries** | Chamilo menyertakan indeks basis data untuk kueri umum. Jalankan `ANALYZE TABLE` secara berkala pada MySQL/MariaDB agar statistik query planner tetap mutakhir. |
| **Separate database server** | Untuk instalasi besar, jalankan basis data pada server khusus alih-alih berbagi sumber daya dengan server web. |

## Konfigurasi Server Web

| Pengoptimalan | Deskripsi |
|--------------|-------------|
| **Enable gzip/brotli compression** | Kompres respons HTML, CSS, dan JavaScript. Sebagian besar server web mendukung ini secara native. |
| **Static file caching** | Atur header `Cache-Control` dan `Expires` yang panjang untuk aset statis. |
| **PHP-FPM tuning** | Sesuaikan `pm.max_children`, `pm.start_servers`, dan `pm.max_requests` berdasarkan RAM yang tersedia dan konkurensi yang diharapkan. |
| **HTTP/2** | Aktifkan HTTP/2 di server web Anda untuk koneksi multipleks dan kompresi header. |

## Tips

* **OPcache adalah keuntungan terbesar** -- Pastikan diaktifkan dan berukuran tepat sebelum mengejar pengoptimalan lain.
* **Jangan pernah menjalankan produksi dengan `APP_ENV=dev`** -- Toolbar debug dan profiler menambahkan overhead signifikan pada setiap permintaan.
* **Pantau sebelum menyetel** -- Gunakan alat seperti New Relic, Blackfire, atau profiler bawaan Symfony (dalam mode dev) untuk mengidentifikasi bottleneck yang sebenarnya, bukan menebak.
* **Panaskan cache setelah setiap deployment** agar pengguna pertama tidak terkena permintaan lambat yang belum di-cache.