# Konfigurasi

Chamilo 3.0 menggunakan variabel lingkungan dan berkas konfigurasi Symfony untuk pengaturan intinya. Halaman ini membahas berkas dan variabel konfigurasi utama.

## Variabel Lingkungan (.env)

Berkas konfigurasi utama adalah `.env` di direktori akar Chamilo. Berkas ini berisi pengaturan spesifik lingkungan yang tidak boleh dikomit ke kontrol versi.

Berkas `.env.dist` bawaan disertakan bersama Chamilo dan berisi nilai default yang terdokumentasi. Buat `.env` (wajib untuk memulai instalasi) guna menimpa nilai sesuai lingkungan Anda.

### Variabel Utama

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | Lingkungan aplikasi, pada tingkat Symfony. Gunakan `prod` untuk produksi, `dev` untuk pengembangan, 'test' untuk pengujian. | `prod` |
| `APP_SECRET` | String acak yang digunakan untuk token CSRF, penandatanganan cookie, dan operasi kriptografi lainnya. Chamilo menghasilkan nilai unik untuk setiap instalasi. Jangan mengubahnya. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Host basis data. Default-nya localhost | `localhost` |
| `DATABASE_PORT` | Port basis data. Default-nya 3306 untuk MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Nama basis data, sebagaimana Anda berikan pada wizard instalasi. | Lihat di bawah. |
| `DATABASE_USER` | Nama pengguna basis data, sebagaimana Anda berikan pada wizard instalasi. | Lihat di bawah. |
| `DATABASE_PASSWORD` | Kata sandi pengguna basis data, sebagaimana Anda berikan pada wizard instalasi. | Lihat di bawah. |
| `TRUSTED_PROXIES` | (Opsional) Jika Anda meng-host Chamilo di belakang reverse proxy, Anda perlu menyediakan IP reverse proxy di sini agar Chamilo dapat menafsirkan panggilan dan menghasilkan respons dengan benar. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Opsional) Mengekspos dokumentasi API interaktif (Swagger/OpenAPI) di `/api`. Nonaktif secara default. Memerlukan cache clear agar berlaku — lihat [Aktifkan Dokumentasi API](#enable-the-api-documentation) di bawah. | `true` |

Pengaturan lain di .env relatif jarang diubah.

Perhatikan bahwa, pada versi mendatang, pengaturan DATABASE_* akan digabungkan menjadi satu variabel `DATABASE_URL`.

Konfigurasi pengiriman e-mail disajikan selama instalasi, tetapi dapat diubah kemudian di bagian `Platform settings` pada dasbor administrasi.

## Konfigurasi Symfony (Direktori config/)

Konfigurasi tingkat Symfony berada di direktori `config/`. Berkas YAML ini mengontrol perilaku kerangka kerja, definisi layanan, dan pengaturan spesifik paket.

Seluruh direktori `config/` disertakan bersama setiap paket Chamilo dan setiap pembaruan — tidak seperti, misalnya, `.env`, direktori ini tidak dikecualikan atau dilindungi secara khusus selama peningkatan. **Setiap perubahan yang dibuat langsung pada berkas di bawah `config/` atau `config/packages/` akan ditimpa secara senyap saat Anda memperbarui Chamilo berikutnya.** Lihat [Penimpaan Spesifik Lingkungan](#environment-specific-overrides) di bawah untuk cara yang didukung dalam menyesuaikan konfigurasi tanpa kehilangan perubahan Anda.

Tidak sering diperlukan untuk mengubah berkas-berkas tersebut, dan mengubahnya dapat membuat portal Anda tidak berfungsi, jadi jangan mencoba mengubahnya jika Anda harus menjamin ketersediaan sistem.

### Berkas Konfigurasi Utama

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Konfigurasi metode autentikasi. |
| `config/packages/doctrine.yaml` | Konfigurasi basis data dan ORM. |
| `config/packages/security.yaml` | Autentikasi, firewall, kontrol akses, dan hierarki peran. |
| `config/packages/cache.yaml` | Konfigurasi adapter cache (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | Pengaturan umum kerangka kerja Symfony (sesi, CSRF, router, HTTP caching). |
| `config/packages/twig.yaml` | Konfigurasi mesin templat. |
| `config/services.yaml` | Definisi layanan aplikasi dan injeksi dependensi. |

### Penimpaan Spesifik Lingkungan

Symfony mendukung konfigurasi per lingkungan. Berkas di `config/packages/prod/` menimpa default ketika `APP_ENV=prod`, dan `config/packages/dev/` menimpa ketika `APP_ENV=dev`.

Sebagai contoh, `config/packages/prod/monolog.yaml` biasanya mengonfigurasi pencatatan yang kurang verbose dibandingkan padanannya di pengembangan.

Chamilo tidak mendefinisikan konfigurasi apa pun di `config/packages/prod/` dalam perangkat lunak itu sendiri, jadi jika Anda ingin menyesuaikan pengaturan dari `config/packages/*.yaml`, **jangan sunting berkas dasar** — buat berkas dengan nama yang sama di dalam `config/packages/prod/` (atau `dev/`/`test/`, sesuai lingkungan yang ingin Anda pengaruhi) yang hanya berisi kunci yang ingin Anda timpa, dan letakkan perubahan Anda di sana.

Hal ini penting karena berkas dasar `config/packages/*.yaml` adalah bagian dari paket Chamilo: setiap pembaruan mengirimkannya lagi dan menimpa apa pun yang ada di sana, sehingga suntingan yang dibuat langsung pada berkas tersebut tidak bertahan setelah peningkatan. Karena Chamilo tidak pernah mengirimkan apa pun di bawah `config/packages/prod/` (atau `dev/`/`test/`), direktori itu aman dari penimpaan oleh pembaruan dan merupakan tempat yang didukung untuk menyimpan kustomisasi lokal.

## Izin File

Kami telah berupaya pada 2.0+ agar hanya satu direktori yang memerlukan izin, dan hal ini tetap berlaku di 3.0. Direktori tersebut adalah `var/`, dan untuk menghindari masalah yang rumit, cukup atur seluruh folder agar dapat ditulis oleh pengguna sistem server web.

Atur izin dengan tepat pada sistem berbasis Debian:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tugas Konfigurasi Umum

### Beralih ke Mode Produksi

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Kemudian bersihkan dan panaskan cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Mengaktifkan Dokumentasi API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Kemudian bersihkan cache agar perubahan berlaku:

```bash
php bin/console cache:clear
```

Dokumentasi API interaktif (Swagger/OpenAPI) kemudian tersedia di `/api`. Mengedit `.env` saja tidak cukup: nilai yang telah diselesaikan tertanam dalam cache terkompilasi Symfony, sehingga `/api` tetap mengembalikan status sebelumnya (aktif atau tidak) hingga cache dibersihkan. Tindakan **Sistem > Bersihkan berkas sementara** di panel administrasi *tidak* melakukan hal ini — lihat [Alat Sistem](../system/system-tools.md#clean-temporary-files) untuk alasannya — sehingga perubahan khusus ini memerlukan akses shell untuk menjalankan `cache:clear`.

### Mengonfigurasi Proxy Tepercaya

Jika Chamilo berjalan di belakang reverse proxy atau load balancer, konfigurasikan proxy tepercaya agar deteksi HTTPS dan resolusi IP klien berfungsi dengan benar:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Mengonfigurasi Penyimpanan Sesi

Secara default, sesi disimpan di sistem berkas. Untuk penerapan multi-server, konfigurasikan sesi berbasis Redis atau basis data:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Jangan pernah mengedit `.env.dist` secara langsung** -- Selalu gunakan `.env` untuk penimpaan Anda. Berkas `.env.dist` dapat tertimpa selama pemutakhiran.
* **Pertahankan `APP_DEBUG=0` di produksi** -- Mode debug mengekspos informasi sensitif pada halaman kesalahan.
* **Cadangkan `.env`** secara terpisah dari basis kode karena berisi kredensial dan dikecualikan dari kontrol versi.