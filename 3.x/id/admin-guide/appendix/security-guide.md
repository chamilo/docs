# Panduan Keamanan

Panduan ini membahas praktik terbaik keamanan untuk menjalankan platform Chamilo 3.0 di lingkungan produksi. Keamanan merupakan tanggung jawab bersama antara perangkat lunak platform, konfigurasi server Anda, dan praktik operasional yang berkelanjutan.

Untuk alat pemantauan dan audit bawaan yang dirujuk di seluruh panduan ini (log percobaan masuk, deteksi penyusupan, pemindaian kekuatan kata sandi, dan pemeriksaan integritas berkas), lihat bab [Keamanan](../security/README.md).

## Jaga Chamilo Tetap Diperbarui

Praktik keamanan yang paling penting adalah menjaga instalasi Chamilo Anda tetap mutakhir.

* Berlangganan akun X keamanan Chamilo (@chamilosecurity) atau pantau repositori GitHub untuk pengumuman rilis.
* Terapkan patch keamanan dengan segera. Pembaruan minor dalam cabang 3.0 dirancang agar aman untuk diterapkan.
* Ikuti [proses peningkatan](../installation/upgrading.md) untuk setiap pembaruan.

## HTTPS

Selalu sajikan Chamilo melalui HTTPS di lingkungan produksi.

* Dapatkan sertifikat SSL/TLS (Let's Encrypt menyediakan sertifikat gratis melalui Certbot).
* Konfigurasikan server web Anda agar mengalihkan semua lalu lintas HTTP ke HTTPS.
* Aktifkan header HSTS (HTTP Strict Transport Security) untuk mencegah serangan downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Tanpa HTTPS, kredensial masuk, cookie sesi, dan semua data pengguna dikirim dalam teks biasa dan dapat disadap di jaringan.

## Izin Berkas

Batasi izin berkas hingga seminimal yang diperlukan.

| Path | Owner | Permissions | Notes |
|------|-------|-------------|-------|
| Application files (source code) | root or deploy user | 755 (dirs), 644 (files) | Web server needs read-only access. |
| `var/` | web server user | 775 | Must be writable for Symfony cache, logs and file uploads |
| `.env` | root or deploy user | 640 | Contains secrets. Web server needs read access only during normal use, but needs write access during installation. |
| `config/` | root or deploy user | 750 | Contains secrets. Web server needs read access only during normal use, but needs write access during installation. |

Jangan pernah mengatur izin ke 777. Jangan pernah menjalankan server web sebagai root.

## Kebijakan Kata Sandi

Konfigurasikan persyaratan kata sandi yang kuat di [Pengaturan Keamanan](../platform-settings/security-settings.md):

* Panjang minimum 8 karakter (12+ disarankan).
* Wajibkan campuran huruf besar, huruf kecil, angka, dan karakter khusus.
* Pertimbangkan mengaktifkan kedaluwarsa kata sandi untuk lingkungan yang didorong kepatuhan.
* Edukasi pengguna tentang memilih kata sandi yang kuat dan unik.

## Pembatasan Laju dan Perlindungan Brute-Force

### Tingkat Aplikasi

* Atur **Percobaan masuk maksimum sebelum memblokir akun** (`login_max_attempt_before_blocking_account`) ke nilai kecil (misalnya 5).
* Aktifkan **CAPTCHA** pada halaman masuk. CAPTCHA bersifat on/off — tidak diaktifkan secara otomatis setelah N kegagalan masuk. Padukan dengan **Kesalahan CAPTCHA sebelum pemblokiran** (`captcha_number_mistakes_to_block_account`) untuk mengunci akun yang terus gagal melewati CAPTCHA.
* Tinjau laporan [Percobaan Masuk](../security/login-attempts.md) secara berkala untuk menemukan pola brute-force, dan laporan [Simple IDS](../security/simple-ids.md) untuk permintaan lain yang ditandai (percobaan XSS, path traversal, dan sejenisnya).

### Tingkat Server

Gunakan **fail2ban** untuk memantau kegagalan masuk dan memblokir alamat IP yang melanggar:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Buat filter yang sesuai di `/etc/fail2ban/filter.d/chamilo-auth.conf` untuk mencocokkan entri log kegagalan autentikasi.

## Manajemen Sesi

* Atur **masa hidup sesi** yang wajar (misalnya 3600 detik / 1 jam) di pengaturan keamanan.
* Konfigurasikan **flag cookie sesi** di konfigurasi Symfony Anda:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Pertimbangkan menonaktifkan "Remember me" pada platform dengan konten sensitif.

## Header Keamanan HTTP

Konfigurasikan server web Anda agar mengirim header keamanan:

| Header | Nilai | Tujuan |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Mencegah MIME-type sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Mencegah clickjacking melalui iframe. |
| `X-XSS-Protection` | `1; mode=block` | Perlindungan XSS warisan untuk peramban lama. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Mengendalikan kebocoran informasi referrer. |
| `Content-Security-Policy` | Bervariasi | Mengendalikan sumber daya mana yang dapat dimuat. Memerlukan penyetelan cermat untuk Chamilo. |

Contoh untuk Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Contoh untuk Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Keamanan Unggah Berkas

* Blokir ekstensi berkas yang dapat dieksekusi (exe, bat, sh, php, phtml, cgi) di [Pengaturan Keamanan](../platform-settings/security-settings.md).
* Konfigurasikan server web Anda agar **tidak pernah mengeksekusi berkas yang diunggah**. Untuk Apache, tambahkan ke seluruh direktori var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Pindai berkas yang diunggah dengan antivirus (ClamAV) jika lingkungan Anda memerlukannya.

## Keamanan Basis Data

* Gunakan **pengguna basis data khusus** untuk Chamilo dengan hanya hak istimewa yang dibutuhkannya (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX pada basis data Chamilo).
* Jangan gunakan akun basis data root.
* Pastikan basis data tidak dapat diakses dari internet publik. Ikat ke localhost atau jaringan privat.
* Aktifkan pencatatan audit basis data untuk lingkungan yang sensitif terhadap kepatuhan.

## Cadangan

* Jadwalkan **cadangan otomatis harian** untuk basis data sekaligus berkas yang diunggah.
* Simpan cadangan di lokasi terpisah dari server (offsite atau penyimpanan cloud).
* Uji pemulihan cadangan secara berkala untuk memverifikasi bahwa cadangan dapat digunakan.
* Enkripsi cadangan jika berisi data sensitif.

Lihat [Cadangan](../maintenance/backups.md) untuk petunjuk terperinci.

## Pemantauan

* Pantau log Chamilo di `var/log/prod.log` untuk kesalahan dan aktivitas mencurigakan.
* Siapkan pemantauan server (CPU, memori, disk) untuk mendeteksi kehabisan sumber daya.
* Konfigurasikan peringatan untuk kegagalan autentikasi berulang.
* Tinjau akun pengguna secara berkala untuk akun yang tidak sah atau tidak aktif.
* Jadwalkan pemeriksaan [Integritas Berkas](../security/file-integrity.md) (Chamilo 3.0+) di cron agar diberi tahu ketika berkas terpasang berubah secara tidak terduga, dan jalankan [Pemeriksa Kekuatan Kata Sandi](../security/password-strength-checker.md) secara berkala, terutama setelah impor pengguna massal.

## Daftar Periksa

Gunakan daftar periksa ini saat men-deploy atau mengaudit instalasi Chamilo:

- [ ] HTTPS diaktifkan dengan sertifikat yang valid
- [ ] Pengalihan HTTP ke HTTPS dikonfigurasi
- [ ] `APP_ENV=prod` dan `APP_DEBUG=0` di `.env`
- [ ] `APP_SECRET` unik dihasilkan
- [ ] Izin berkas dibatasi (tidak 777)
- [ ] Kebijakan kata sandi dikonfigurasi
- [ ] Percobaan login maksimum dan CAPTCHA diaktifkan
- [ ] Ekstensi berkas yang dapat dieksekusi diblokir
- [ ] Header keamanan dikonfigurasi pada server web
- [ ] Bendera cookie sesi diatur (secure, httponly, samesite)
- [ ] Pengguna basis data memiliki hak istimewa minimal
- [ ] Cadangan otomatis dijadwalkan dan diuji
- [ ] Baseline integritas berkas ditetapkan dan pemindaian dijadwalkan di cron (Chamilo 3.0+)
- [ ] Pemantauan log tersedia
- [ ] Versi Chamilo adalah yang terkini