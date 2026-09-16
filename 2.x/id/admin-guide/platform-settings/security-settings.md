# Pengaturan Keamanan

Perlindungan login, kebijakan kata sandi, header keamanan konten, otentikasi dua faktor, dan sistem deteksi intrusi ringan.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Keamanan**. Kategori ini berisi **31 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `2fa_enable`

**Aktifkan 2FA**

Tambahkan kolom di halaman pembaruan kata sandi untuk mengaktifkan 2FA menggunakan aplikasi autentikator TOTP. Ketika dinonaktifkan secara global, pengguna tidak akan melihat kolom 2FA dan tidak akan diminta untuk 2FA saat login, bahkan jika mereka sebelumnya telah mengaktifkannya.

*Default: `false`*

### `access_to_personal_file_for_all`

**Akses ke file pribadi untuk semua**

Mengizinkan akses ke semua file pribadi tanpa batasan.

*Default: `false`*

### `admins_can_set_users_pass`

**Admin dapat mengatur kata sandi pengguna secara manual**

[disimpulkan] Ketika diaktifkan, administrator dapat mengatur kata sandi pengguna secara langsung tanpa meminta pengguna untuk meresetnya.

### `allow_captcha`

**CAPTCHA**

Aktifkan CAPTCHA pada formulir login, formulir pendaftaran, dan formulir lupa kata sandi untuk mencegah serangan brute force pada kata sandi.

*Default: `false`*

### `allow_online_users_by_status`

**Filter pengguna yang dapat dilihat sebagai online**

Membatasi visibilitas pengguna online hanya untuk peran pengguna tertentu.

### `allow_strength_pass_checker`

**Pemeriksa kekuatan kata sandi**

Aktifkan opsi ini untuk menambahkan indikator visual kekuatan kata sandi saat pengguna mengubah kata sandinya. Ini TIDAK akan mencegah kata sandi yang buruk untuk ditambahkan, hanya berfungsi sebagai bantuan visual.

*Default: `true`*

### `anonymous_autoprovisioning`

**Penyediaan otomatis pengguna anonim lebih banyak**

Membuat pengguna anonim baru secara dinamis untuk mendukung lalu lintas pengunjung yang tinggi.

*Default: `false`*

### `captcha_number_mistakes_to_block_account`

**Jumlah kesalahan CAPTCHA yang diizinkan**

Jumlah kesalahan yang dapat dilakukan pengguna pada kotak CAPTCHA sebelum akunnya dikunci.

### `captcha_time_to_block`

**Waktu penguncian akun CAPTCHA**

Jika pengguna mencapai batas maksimum kesalahan login (saat menggunakan CAPTCHA), akunnya akan dikunci selama jumlah menit ini.

### `check_password`

**Periksa persyaratan kata sandi**

Aktifkan validasi persyaratan kata sandi yang ditentukan di atas selama pembuatan atau pembaruan kata sandi.

*Default: `false`*

### `filter_terms`

**Filter istilah**

Berikan daftar istilah, satu per baris, yang akan disaring dari halaman web dan email. Istilah-istilah ini akan diganti dengan ***.

### `force_renew_password_at_first_login`

**Paksa pembaruan kata sandi pada login pertama**

Ini adalah salah satu langkah sederhana untuk meningkatkan keamanan portal Anda dengan meminta pengguna untuk segera mengubah kata sandi mereka, sehingga kata sandi yang dikirim melalui email tidak lagi berlaku dan mereka kemudian akan menggunakan kata sandi yang mereka buat sendiri dan hanya mereka yang mengetahuinya.

*Default: `false`*

### `hide_breadcrumb_if_not_allowed`

**Sembunyikan breadcrumb jika 'tidak diizinkan'**

Jika pengguna tidak diizinkan mengakses halaman tertentu, sembunyikan juga breadcrumb. Ini meningkatkan keamanan dengan menghindari tampilan informasi yang tidak perlu.

*Default: `false`*

### `login_max_attempt_before_blocking_account`

**Jumlah maksimum percobaan login sebelum penguncian**

Jumlah percobaan login gagal yang ditoleransi sebelum akun pengguna dikunci dan harus dibuka oleh admin.

*Default: `0`*

### `password_requirements`

**Persyaratan sintaks minimal kata sandi**

Menentukan struktur yang diperlukan untuk kata sandi pengguna. Contoh: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Gunakan "specials" (jamak) untuk meminta karakter khusus.

### `password_rotation_days`

**Interval rotasi kata sandi (hari)**

Jumlah hari sebelum pengguna harus merotasi kata sandi mereka (0 = dinonaktifkan).

*Default: `0`*

### `prevent_multiple_simultaneous_login`

**Cegah login simultan**

Mencegah pengguna terhubung dengan akun yang sama lebih dari sekali. Ini adalah opsi yang baik pada portal berbayar per akses, tetapi mungkin membatasi selama pengujian karena hanya satu browser yang dapat terhubung dengan akun tertentu.

*Default: `false`*

### `proxy_settings`

**Pengaturan proxy**

Beberapa fitur Chamilo akan terhubung ke luar dari server. Misalnya, untuk memastikan konten eksternal ada saat membuat tautan atau menampilkan halaman tertanam di jalur pembelajaran. Jika server Chamilo Anda menggunakan proxy untuk keluar dari jaringannya, ini adalah tempat untuk mengonfigurasinya.

### `security_block_inactive_users_immediately`

**Blokir pengguna yang dinonaktifkan segera**

Segera blokir pengguna yang telah dinonaktifkan oleh admin melalui manajemen pengguna. Jika tidak, pengguna yang telah dinonaktifkan akan tetap memiliki hak istimewa sebelumnya sampai mereka logout.

*Default: `false`*

---
### `security_content_policy`

**Kebijakan Keamanan Konten**

Kebijakan Keamanan Konten adalah langkah efektif untuk melindungi situs Anda dari serangan XSS. Dengan membuat daftar putih sumber konten yang disetujui, Anda dapat mencegah browser memuat aset berbahaya. Pengaturan ini sangat rumit untuk diterapkan dengan editor WYSIWYG, tetapi jika Anda menambahkan semua domain yang ingin Anda izinkan untuk penyertaan iframe dalam pernyataan child-src, contoh ini seharusnya berfungsi untuk Anda. Anda dapat mencegah JavaScript dijalankan dari sumber eksternal (termasuk di dalam gambar SVG) dengan menggunakan daftar ketat dalam argumen 'script-src'. Biarkan kosong untuk menonaktifkan. Contoh pengaturan: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Kebijakan Keamanan Konten hanya laporan**

Pengaturan ini memungkinkan Anda untuk bereksperimen dengan melaporkan tetapi tidak memberlakukan beberapa Kebijakan Keamanan Konten.

### `security_public_key_pins`

**Pinning Kunci Publik HTTP**

Pinning Kunci Publik HTTP melindungi situs Anda dari serangan MiTM menggunakan sertifikat X.509 yang tidak sah. Dengan hanya mengizinkan identitas yang harus dipercaya oleh browser, pengguna Anda terlindungi jika otoritas sertifikat dikompromikan.

### `security_public_key_pins_report_only`

**Pinning Kunci Publik HTTP hanya laporan**

Pengaturan ini memungkinkan Anda untuk bereksperimen dengan melaporkan tetapi tidak memberlakukan beberapa Pinning Kunci Publik HTTP.

### `security_referrer_policy`

**Kebijakan Referrer Keamanan**

Kebijakan Referrer adalah header baru yang memungkinkan situs untuk mengontrol seberapa banyak informasi yang disertakan browser saat navigasi meninggalkan dokumen dan harus diatur oleh semua situs.

*Default: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie sesi samesite**

Aktifkan parameter samesite:None untuk cookie sesi. Informasi lebih lanjut: https://www.chromium.org/updates/same-site dan https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Default: `false`*

### `security_strict_transport`

**Keamanan Transportasi Ketat HTTP**

Keamanan Transportasi Ketat HTTP adalah fitur yang sangat baik untuk didukung di situs Anda dan memperkuat implementasi TLS Anda dengan meminta Agen Pengguna untuk memaksakan penggunaan HTTPS. Nilai yang direkomendasikan: 'strict-transport-security: max-age=63072000; includeSubDomains'. Lihat https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Anda dapat menyertakan akhiran 'preload', tetapi ini memiliki konsekuensi pada domain tingkat atas (TLD), jadi mungkin tidak boleh dilakukan dengan sembarangan. Lihat https://hstspreload.org/. Biarkan kosong untuk menonaktifkan.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options mencegah browser mencoba mendeteksi jenis konten MIME dan memaksanya untuk tetap menggunakan jenis konten yang dideklarasikan. Satu-satunya nilai yang valid untuk header ini adalah 'nosniff'.

*Default: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options memberi tahu browser apakah Anda ingin mengizinkan situs Anda dibingkai atau tidak. Dengan mencegah browser membingkai situs Anda, Anda dapat melindungi dari serangan seperti clickjacking. Jika menentukan URL di sini, itu harus menentukan URL dari mana konten Anda harus terlihat, bukan URL dari mana situs Anda menerima konten. Misalnya, jika URL utama Anda (root_web di atas) adalah https://11.chamilo.org/, maka pengaturan ini harus: 'ALLOW-FROM https://11.chamilo.org'. Header ini hanya berlaku untuk halaman di mana Chamilo bertanggung jawab atas pembuatan header HTTP (yaitu file '.php'). Ini tidak berlaku untuk file statis. Jika bermain dengan fitur ini, pastikan Anda juga memperbarui konfigurasi server web Anda untuk menambahkan header yang tepat untuk file statis. Lihat dokumentasi konfigurasi CDN di atas (cari 'add_header') untuk informasi lebih lanjut. Nilai yang direkomendasikan (ketat) untuk pengaturan ini, jika diaktifkan: 'SAMEORIGIN'.

*Default: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection mengatur konfigurasi untuk filter skrip lintas situs yang terintegrasi di sebagian besar browser. Nilai yang direkomendasikan '1; mode=block'.

*Default: `1; mode=block`*


### `user_reset_password`

**Aktifkan token reset kata sandi**

Opsi ini memungkinkan untuk menghasilkan token sekali pakai yang kadaluarsa yang dikirim melalui email kepada pengguna untuk mengatur ulang kata sandinya.

*Default: `false`*


### `user_reset_password_token_limit`

**Batas waktu untuk token reset kata sandi**

Jumlah detik sebelum token yang dihasilkan secara otomatis kadaluarsa dan tidak dapat digunakan lagi (token baru perlu dihasilkan).

*Default: `3600`*