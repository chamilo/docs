# Konfigurasi

Chamilo 2.0 menggunakan variabel lingkungan dan file konfigurasi Symfony untuk pengaturan intinya. Halaman ini mencakup file konfigurasi utama dan variabel-variabel penting.

## Variabel Lingkungan (.env)

File konfigurasi utama adalah `.env` yang terletak di direktori root Chamilo. File ini berisi pengaturan khusus lingkungan yang tidak boleh dimasukkan ke dalam kontrol versi.

File default `.env.dist` disertakan bersama Chamilo dan berisi default yang didokumentasikan. Buat file `.env` (diperlukan untuk memulai instalasi) untuk mengganti nilai sesuai dengan lingkungan Anda.

### Variabel Utama

| Variabel | Deskripsi | Contoh |
|----------|-----------|--------|
| `APP_ENV` | Lingkungan aplikasi, pada level Symfony. Gunakan `prod` untuk produksi, `dev` untuk pengembangan, 'test' untuk pengujian. | `prod` |
| `APP_SECRET` | String acak yang digunakan untuk token CSRF, penandatanganan cookie, dan operasi kriptografi lainnya. Chamilo menghasilkan nilai unik untuk setiap instalasi. Jangan ubah nilai ini. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Host database. Defaultnya adalah localhost | `localhost` |
| `DATABASE_PORT` | Port database. Defaultnya adalah 3306 untuk MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Nama database, sebagaimana diberikan oleh Anda pada wizard instalasi. | Lihat di bawah. |
| `DATABASE_USER` | Nama pengguna database, sebagaimana diberikan oleh Anda pada wizard instalasi. | Lihat di bawah. |
| `DATABASE_PASSWORD` | Kata sandi pengguna database, sebagaimana diberikan oleh Anda pada wizard instalasi. | Lihat di bawah. |
| `TRUSTED_PROXIES` | (Opsional) Jika Anda menghosting Chamilo di belakang reverse proxy, Anda perlu menyediakan IP reverse proxy di sini agar Chamilo dapat menginterpretasikan panggilan dan menghasilkan respons dengan benar. | |

Pengaturan lain di .env relatif jarang dimodifikasi.

Perhatikan bahwa, pada versi mendatang, pengaturan DATABASE_* akan digabungkan menjadi satu variabel tunggal `DATABASE_URL`.

Konfigurasi pengiriman email disajikan selama instalasi, tetapi dapat dimodifikasi kemudian di bagian `Pengaturan Platform` pada dashboard administrasi.

## Konfigurasi Symfony (Direktori config/)

Konfigurasi pada level Symfony berada di direktori `config/`. File YAML ini mengontrol perilaku framework, definisi layanan, dan pengaturan khusus paket.

Tidak sering perlu untuk memodifikasi file-file ini, dan mengubahnya dapat membuat portal Anda tidak berfungsi, jadi harap jangan mencoba mengubahnya jika Anda harus memastikan ketersediaan sistem.

### File Konfigurasi Utama

| File | Tujuan |
|------|--------|
| `config/authentication.yaml` | Konfigurasi metode autentikasi. |
| `config/packages/doctrine.yaml` | Konfigurasi database dan ORM. |
| `config/packages/security.yaml` | Autentikasi, firewall, kontrol akses, dan hierarki peran. |
| `config/packages/cache.yaml` | Konfigurasi adapter cache (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | Pengaturan umum framework Symfony (sesi, CSRF, router, caching HTTP). |
| `config/packages/twig.yaml` | Konfigurasi mesin template. |
| `config/services.yaml` | Definisi layanan aplikasi dan injeksi dependensi. |

### Penggantian Khusus Lingkungan

Symfony mendukung konfigurasi per lingkungan. File di `config/packages/prod/` menggantikan default ketika `APP_ENV=prod`, dan `config/packages/dev/` menggantikan ketika `APP_ENV=dev`.

Sebagai contoh, `config/packages/prod/monolog.yaml` biasanya mengatur logging yang kurang verbose dibandingkan dengan yang setara di lingkungan pengembangan.

Chamilo tidak mendefinisikan konfigurasi apa pun di `config/packages/prod/` dalam perangkat lunak itu sendiri, jadi jika Anda ingin menyesuaikan pengaturan dari `config/packages/*.yaml`, cukup buat salinan file yaml di dalam direktori tersebut dan ubah pengaturan di sana.

## Izin File

Kami telah berupaya di versi 2.0+ untuk memastikan bahwa hanya satu direktori yang membutuhkan izin. Ini adalah direktori `var/`, dan untuk menghindari masalah yang rumit, cukup mengatur seluruh folder sebagai dapat ditulis oleh pengguna sistem server web sudah cukup.

Atur izin dengan tepat pada sistem berbasis Debian:

```bash
# Untuk sistem di mana server web berjalan sebagai www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tugas Konfigurasi Umum

### Beralih ke Mode Produksi

```bash
# Di .env
APP_ENV=prod
APP_DEBUG=0
```

Kemudian bersihkan dan panaskan cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Mengatur Trusted Proxies

Jika Chamilo berjalan di belakang reverse proxy atau load balancer, konfigurasikan trusted proxies agar deteksi HTTPS dan resolusi IP klien berfungsi dengan benar:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Mengatur Penyimpanan Sesi

Secara default, sesi disimpan di filesystem. Untuk penyebaran multi-server, konfigurasikan sesi yang didukung Redis atau database:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Tips

* **Jangan pernah mengedit `.env.dist` secara langsung** -- Selalu gunakan `.env` untuk pengaturan Anda. File `.env.dist` dapat ditimpa selama proses pembaruan.
* **Tetap pertahankan `APP_DEBUG=0` di lingkungan produksi** -- Mode debug dapat menampilkan informasi sensitif pada halaman error.
* **Cadangkan `.env`** secara terpisah dari basis kode karena file ini berisi kredensial dan dikecualikan dari kontrol versi.