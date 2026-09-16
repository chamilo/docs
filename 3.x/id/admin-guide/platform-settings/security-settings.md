# Pengaturan Keamanan

Perlindungan login, kebijakan kata sandi, header keamanan konten, autentikasi dua faktor, dan sistem deteksi penyusupan ringan.

Halaman ini membahas *kebijakan* keamanan. Untuk alat pemantauan yang mengawasi platform menggunakan kebijakan ini (log percobaan login, peristiwa deteksi penyusupan, pemindaian kekuatan kata sandi, dan pemeriksaan integritas berkas), lihat [Keamanan](../security/README.md).

Akses pengaturan ini di **Administration > Configuration settings > Security**. Kategori ini berisi **32 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `2fa_enable`

**Aktifkan 2FA**

Menambahkan kolom pada halaman pembaruan kata sandi untuk mengaktifkan 2FA menggunakan aplikasi autentikator TOTP. Jika dinonaktifkan secara global, pengguna tidak akan melihat kolom 2FA dan tidak akan diminta 2FA saat login, meskipun mereka sebelumnya telah mengaktifkannya.

*Default: `false`*

### `access_to_personal_file_for_all`

**Akses ke berkas pribadi untuk semua**

Mengizinkan akses ke semua berkas pribadi tanpa pembatasan

*Default: `false`*


### `admins_can_set_users_pass`

**Admin dapat mengatur kata sandi pengguna secara manual**

[inferred] Jika diaktifkan, administrator dapat mengatur kata sandi pengguna secara manual tanpa mengharuskan pengguna meresetnya.

### `allow_captcha`

**CAPTCHA**

Mengaktifkan CAPTCHA pada formulir login, formulir pendaftaran, dan formulir lupa kata sandi untuk menghindari password hammering

*Default: `false`*

### `allow_online_users_by_status`

**Saring pengguna yang dapat dilihat sebagai daring**

Membatasi visibilitas pengguna daring hanya pada peran pengguna tertentu.

### `allow_strength_pass_checker`

**Pemeriksa kekuatan kata sandi**

Aktifkan opsi ini untuk menambahkan indikator visual kekuatan kata sandi saat pengguna mengubah kata sandinya. Ini TIDAK mencegah kata sandi yang buruk ditambahkan; hanya berfungsi sebagai bantuan visual.

*Default: `true`*


### `anonymous_autoprovisioning`

**Penyediaan otomatis lebih banyak pengguna anonim**

Secara dinamis membuat pengguna anonim baru untuk mendukung lalu lintas pengunjung yang tinggi.

*Default: `false`*


### `captcha_number_mistakes_to_block_account`

**Toleransi kesalahan CAPTCHA**

Jumlah kali pengguna dapat membuat kesalahan pada kotak CAPTCHA sebelum akunnya dikunci.

### `captcha_time_to_block`

**Waktu penguncian akun CAPTCHA**

Jika pengguna mencapai batas maksimum kesalahan login (saat menggunakan CAPTCHA), akunnya akan dikunci selama sejumlah menit ini.

### `check_password`

**Periksa persyaratan kata sandi**

Mengaktifkan validasi persyaratan kata sandi yang ditetapkan di atas selama pembuatan atau pembaruan kata sandi.

*Default: `false`*


### `file_integrity_check_notify_admins` **v3**

**Penerima notifikasi pemeriksaan integritas berkas**

Daftar alamat e-mail yang dipisahkan koma untuk diberitahu ketika pemindaian integritas berkas mendeteksi perubahan. Biarkan kosong untuk memberitahu setiap administrator global.

### `filter_terms`

**Saring istilah**

Berikan daftar istilah, satu per baris, yang akan disaring dari halaman web dan e-mail. Istilah-istilah ini akan diganti dengan ***.

### `force_renew_password_at_first_login`

**Paksa pembaruan kata sandi pada login pertama**

Ini adalah salah satu langkah sederhana untuk meningkatkan keamanan portal Anda dengan meminta pengguna segera mengubah kata sandinya, sehingga kata sandi yang dikirim melalui e-mail tidak lagi berlaku dan mereka kemudian akan menggunakan kata sandi yang mereka buat sendiri dan hanya diketahui oleh mereka.

*Default: `false`*


### `hide_breadcrumb_if_not_allowed`

**Sembunyikan breadcrumb jika 'tidak diizinkan'**

Jika pengguna tidak diizinkan mengakses halaman tertentu, sembunyikan juga breadcrumb. Ini meningkatkan keamanan dengan menghindari tampilan informasi yang tidak perlu.

*Default: `false`*


### `login_max_attempt_before_blocking_account`

**Percobaan login maksimum sebelum penguncian**

Jumlah percobaan login yang gagal yang ditoleransi sebelum akun pengguna dikunci dan harus dibuka oleh admin.

*Default: `0`*

### `password_requirements`

**Persyaratan sintaks kata sandi minimal**

Menentukan struktur yang diwajibkan untuk kata sandi pengguna. Contoh: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Gunakan "specials" (jamak) untuk mensyaratkan karakter khusus.

### `password_rotation_days`

**Interval rotasi kata sandi (hari)**

Jumlah hari sebelum pengguna harus merotasi kata sandinya (0 = dinonaktifkan).

*Default: `0`*


### `prevent_multiple_simultaneous_login`

**Cegah login bersamaan**

Mencegah pengguna terhubung dengan akun yang sama lebih dari sekali. Ini adalah opsi yang baik pada portal berbayar per akses, tetapi mungkin membatasi selama pengujian karena hanya satu peramban yang dapat terhubung dengan akun tertentu.

*Default: `false`*

### `proxy_settings`

**Pengaturan proxy**

Beberapa fitur Chamilo akan terhubung ke luar dari server. Misalnya untuk memastikan suatu konten eksternal ada saat membuat tautan atau menampilkan halaman tertanam dalam jalur pembelajaran. Jika server Chamilo Anda menggunakan proxy untuk keluar dari jaringannya, di sinilah tempat untuk mengonfigurasinya.

### `security_block_inactive_users_immediately`

**Blokir pengguna yang dinonaktifkan segera**

Segera blokir pengguna yang telah dinonaktifkan oleh admin melalui manajemen pengguna. Jika tidak, pengguna yang telah dinonaktifkan akan tetap memiliki hak istimewa sebelumnya hingga mereka keluar.

*Default: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy adalah langkah efektif untuk melindungi situs Anda dari serangan XSS. Dengan membuat daftar putih sumber konten yang disetujui, Anda dapat mencegah peramban memuat aset berbahaya. Pengaturan ini khususnya rumit untuk diatur dengan editor WYSIWYG, tetapi jika Anda menambahkan semua domain yang ingin Anda izinkan untuk penyertaan iframe dalam pernyataan child-src, contoh ini seharusnya berfungsi untuk Anda. Anda dapat mencegah JavaScript dieksekusi dari sumber eksternal (termasuk di dalam gambar SVG) dengan menggunakan daftar ketat pada argumen 'script-src'. Biarkan kosong untuk menonaktifkan. Contoh pengaturan: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy hanya laporan**

Pengaturan ini memungkinkan Anda bereksperimen dengan melaporkan tetapi tidak menegakkan beberapa Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning melindungi situs Anda dari serangan MiTM yang menggunakan sertifikat X.509 nakal. Dengan membuat daftar putih hanya identitas yang harus dipercaya peramban, pengguna Anda terlindungi jika suatu otoritas sertifikat dikompromikan.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning hanya laporan**

Pengaturan ini memungkinkan Anda bereksperimen dengan melaporkan tetapi tidak menegakkan beberapa HTTP Public Key Pinning.

### `security_referrer_policy`

**Kebijakan Referrer Keamanan**

Referrer Policy adalah header baru yang memungkinkan situs mengontrol seberapa banyak informasi yang disertakan peramban saat navigasi menjauh dari suatu dokumen dan seharusnya diatur oleh semua situs.

*Default: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Samesite cookie sesi**

Aktifkan parameter samesite:None untuk cookie sesi. Info lebih lanjut: https://www.chromium.org/updates/same-site dan https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Default: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security adalah fitur unggulan untuk didukung di situs Anda dan memperkuat implementasi TLS dengan membuat User Agent menegakkan penggunaan HTTPS. Nilai yang disarankan: 'strict-transport-security: max-age=63072000; includeSubDomains'. Lihat https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Anda dapat menyertakan sufiks 'preload', tetapi ini memiliki konsekuensi pada domain tingkat atas (TLD), jadi sebaiknya tidak dilakukan secara enteng. Lihat https://hstspreload.org/. Biarkan kosong untuk menonaktifkan.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options menghentikan peramban agar tidak mencoba MIME-sniff jenis konten dan memaksanya tetap pada content-type yang dideklarasikan. Satu-satunya nilai valid untuk header ini adalah 'nosniff'.

*Default: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options memberi tahu peramban apakah Anda ingin mengizinkan situs Anda di-frame atau tidak. Dengan mencegah peramban mem-frame situs Anda, Anda dapat bertahan dari serangan seperti clickjacking. Jika mendefinisikan URL di sini, itu harus mendefinisikan URL dari mana konten Anda harus terlihat, bukan URL dari mana situs Anda menerima konten. Misalnya, jika URL utama Anda (root_web di atas) adalah https://11.chamilo.org/, maka pengaturan ini harus: 'ALLOW-FROM https://11.chamilo.org'. Header ini hanya berlaku pada halaman di mana Chamilo bertanggung jawab atas pembuatan header HTTP (yaitu berkas '.php'). Tidak berlaku pada berkas statis. Jika bereksperimen dengan fitur ini, pastikan Anda juga memperbarui konfigurasi server web Anda untuk menambahkan header yang tepat bagi berkas statis. Lihat dokumentasi konfigurasi CDN di atas (cari 'add_header') untuk informasi lebih lanjut. Nilai yang disarankan (ketat) untuk pengaturan ini, jika diaktifkan: 'SAMEORIGIN'.

*Default: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection mengatur konfigurasi untuk filter cross-site scripting yang terpasang di sebagian besar peramban. Nilai yang disarankan '1; mode=block'.

*Default: `1; mode=block`*


### `user_reset_password`

**Aktifkan token reset kata sandi**

Opsi ini memungkinkan pembuatan token sekali pakai yang kedaluwarsa, dikirim melalui e-mail kepada pengguna untuk mereset kata sandinya.

*Default: `false`*

### `user_reset_password_token_limit`

**Batas waktu untuk token reset kata sandi**

Jumlah detik sebelum token yang dihasilkan secara otomatis kedaluwarsa dan tidak dapat digunakan lagi (token baru perlu dihasilkan).

*Default: `3600`*