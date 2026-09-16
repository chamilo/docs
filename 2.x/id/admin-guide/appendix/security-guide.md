# Panduan Keamanan

Panduan ini mencakup praktik terbaik keamanan untuk menjalankan platform Chamilo 2.0 dalam lingkungan produksi. Keamanan adalah tanggung jawab bersama antara perangkat lunak platform, konfigurasi server Anda, dan praktik operasional yang berkelanjutan.

## Selalu Perbarui Chamilo

Praktik keamanan yang paling penting adalah menjaga instalasi Chamilo Anda tetap diperbarui.

* Berlangganan ke akun X keamanan Chamilo (@chamilosecurity) atau pantau repositori GitHub untuk pengumuman rilis.
* Terapkan patch keamanan dengan segera. Pembaruan minor dalam cabang 2.0 dirancang agar aman untuk diterapkan.
* Ikuti [proses peningkatan](../installation/upgrading.md) untuk setiap pembaruan.

## HTTPS

Selalu layani Chamilo melalui HTTPS dalam lingkungan produksi.

* Dapatkan sertifikat SSL/TLS (Let's Encrypt menyediakan sertifikat gratis melalui Certbot).
* Konfigurasikan server web Anda untuk mengalihkan semua lalu lintas HTTP ke HTTPS.
* Aktifkan header HSTS (HTTP Strict Transport Security) untuk mencegah serangan downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Tanpa HTTPS, kredensial login, cookie sesi, dan semua data pengguna dikirim dalam teks biasa dan dapat dicegat di jaringan.

## Izin File

Batasi izin file seminimal mungkin.

| Jalur | Pemilik | Izin | Catatan |
|------|-------|-------------|-------|
| File aplikasi (kode sumber) | root atau pengguna deploy | 755 (direktori), 644 (file) | Server web hanya membutuhkan akses baca. |
| `var/` | pengguna server web | 775 | Harus dapat ditulis untuk cache Symfony, log, dan unggahan file |
| `.env` | root atau pengguna deploy | 640 | Berisi rahasia. Server web hanya membutuhkan akses baca selama penggunaan normal, tetapi membutuhkan akses tulis selama instalasi. |
| `config/` | root atau pengguna deploy | 750 | Berisi rahasia. Server web hanya membutuhkan akses baca selama penggunaan normal, tetapi membutuhkan akses tulis selama instalasi. |

Jangan pernah mengatur izin ke 777. Jangan pernah menjalankan server web sebagai root.

## Kebijakan Kata Sandi

Konfigurasikan persyaratan kata sandi yang kuat di [Pengaturan Keamanan](../platform-settings/security-settings.md):

* Panjang minimum 8 karakter (disarankan 12+).
* Wajibkan kombinasi huruf besar, huruf kecil, angka, dan karakter khusus.
* Pertimbangkan untuk mengaktifkan kedaluwarsa kata sandi untuk lingkungan yang mematuhi kepatuhan.
* Edukasi pengguna tentang memilih kata sandi yang kuat dan unik.

## Pembatasan Tingkat dan Perlindungan Brute-Force

### Tingkat Aplikasi

* Atur **Jumlah maksimum percobaan login sebelum memblokir akun** (`login_max_attempt_before_blocking_account`) ke nilai kecil (misalnya 5).
* Aktifkan **CAPTCHA** di halaman login. CAPTCHA aktif/nonaktif — tidak diaktifkan secara otomatis setelah N kali gagal login. Pasangkan dengan **Kesalahan CAPTCHA sebelum memblokir** (`captcha_number_mistakes_to_block_account`) untuk mengunci akun yang terus gagal CAPTCHA.

### Tingkat Server

Gunakan **fail2ban** untuk memantau kegagalan login dan memblokir alamat IP yang melanggar:

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

Buat filter yang sesuai di `/etc/fail2ban/filter.d/chamilo-auth.conf` untuk mencocokkan entri log kegagalan otentikasi.

## Manajemen Sesi

* Atur **masa pakai sesi** yang wajar (misalnya, 3600 detik / 1 jam) di pengaturan keamanan.
* Konfigurasikan **flag cookie sesi** di konfigurasi Symfony Anda:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Hanya dikirim melalui HTTPS
          cookie_httponly: true     # Tidak dapat diakses melalui JavaScript
          cookie_samesite: lax     # Perlindungan CSRF
  ```

* Pertimbangkan untuk menonaktifkan "Ingat saya" pada platform dengan konten sensitif.

## Header Keamanan HTTP

Konfigurasikan server web Anda untuk mengirim header keamanan:

| Header | Nilai | Tujuan |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Mencegah sniffing tipe MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Mencegah clickjacking melalui iframe. |
| `X-XSS-Protection` | `1; mode=block` | Perlindungan XSS lama untuk browser lama. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Mengontrol kebocoran informasi referrer. |
| `Content-Security-Policy` | Bervariasi | Mengontrol sumber daya yang dapat dimuat. Memerlukan penyesuaian cermat untuk Chamilo. |

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

---
## Keamanan Unggahan Berkas

* Blokir ekstensi berkas yang dapat dieksekusi (exe, bat, sh, php, phtml, cgi) di [Pengaturan Keamanan](../platform-settings/security-settings.md).
* Konfigurasikan server web Anda untuk **tidak pernah mengeksekusi berkas yang diunggah**. Untuk Apache, tambahkan ke seluruh direktori var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Pindai berkas yang diunggah dengan antivirus (ClamAV) jika lingkungan Anda membutuhkannya.

## Keamanan Basis Data

* Gunakan **pengguna basis data khusus** untuk Chamilo dengan hanya hak akses yang diperlukan (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX pada basis data Chamilo).
* Jangan gunakan akun root basis data.
* Pastikan basis data tidak dapat diakses dari internet publik. Ikat ke localhost atau jaringan pribadi.
* Aktifkan pencatatan audit basis data untuk lingkungan yang sensitif terhadap kepatuhan.

## Cadangan (Backup)

* Jadwalkan **cadangan otomatis harian** untuk basis data dan berkas yang diunggah.
* Simpan cadangan di lokasi terpisah dari server (offsite atau penyimpanan cloud).
* Uji pemulihan cadangan secara berkala untuk memastikan cadangan dapat digunakan.
* Enkripsi cadangan jika mengandung data sensitif.

Lihat [Cadangan](../maintenance/backups.md) untuk petunjuk terperinci.

## Pemantauan

* Pantau log Chamilo di `var/log/prod.log` untuk mendeteksi kesalahan dan aktivitas mencurigakan.
* Siapkan pemantauan server (CPU, memori, disk) untuk mendeteksi kehabisan sumber daya.
* Konfigurasikan peringatan untuk kegagalan autentikasi yang berulang.
* Tinjau akun pengguna secara berkala untuk mendeteksi akun yang tidak sah atau tidak aktif.

## Daftar Periksa

Gunakan daftar periksa ini saat menerapkan atau mengaudit instalasi Chamilo:

- [ ] HTTPS diaktifkan dengan sertifikat yang valid
- [ ] Pengalihan HTTP ke HTTPS dikonfigurasi
- [ ] `APP_ENV=prod` dan `APP_DEBUG=0` di `.env`
- [ ] `APP_SECRET` unik telah dibuat
- [ ] Izin berkas dibatasi (tidak ada 777)
- [ ] Kebijakan kata sandi dikonfigurasi
- [ ] Batas maksimum upaya masuk dan CAPTCHA diaktifkan
- [ ] Ekstensi berkas yang dapat dieksekusi diblokir
- [ ] Header keamanan dikonfigurasi di server web
- [ ] Flag cookie sesi diatur (secure, httponly, samesite)
- [ ] Pengguna basis data memiliki hak akses minimal
- [ ] Cadangan otomatis dijadwalkan dan diuji
- [ ] Pemantauan log telah diterapkan
- [ ] Versi Chamilo adalah yang terbaru