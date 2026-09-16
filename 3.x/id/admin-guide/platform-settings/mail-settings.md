# Pengaturan Surat

Cara surat keluar dibangun — identitas pengirim, tata letak, tanda tangan, dan alamat untuk keperluan khusus.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Surat**. Kategori ini berisi **17 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut secara global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_email_editor_for_anonymous`

**Editor e-mail untuk anonim**

Izinkan pengguna anonim mengirim e-mail dari platform. Di era keamanan informasi saat ini, opsi ini tidak disarankan.

*Default: `true`*


### `cron_notification_help_desk`

**Alamat e-mail untuk mengirim laporan eksekusi cronjobs**

Diberikan sebagai array alamat e-mail. Belum berfungsi untuk semua cronjobs.

### `mail_content_style`

**Atribut HTML badan e-mail tambahan**

Atribut HTML tambahan yang diterapkan pada tag body e-mail notifikasi yang dihasilkan.

### `mail_header_style`

**Atribut HTML header e-mail tambahan**

Atribut HTML tambahan yang diterapkan pada bagian header e-mail notifikasi yang dihasilkan.

### `mailer_debug_enable`

**Surat: Debug**

Pilih apakah Anda ingin mengaktifkan log debug pengiriman e-mail. Log ini akan memberi Anda informasi lebih lanjut tentang apa yang terjadi saat terhubung ke layanan surat, tetapi tidak elegan dan dapat merusak desain halaman. Gunakan hanya saat tidak ada aktivitas pengguna.

*Default: `false`*


### `mailer_dkim`

**Surat: Header DKIM**

Masukkan array JSON dari pengaturan konfigurasi DKIM Anda (lihat contoh).

### `mailer_dsn`

**DSN surat**

DSN sepenuhnya mencakup semua parameter yang diperlukan untuk terhubung ke layanan surat. Anda dapat mempelajari lebih lanjut di https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Berikut beberapa contoh sintaks DSN yang didukung: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Untuk Microsoft 365, di mana SMTP dengan autentikasi dasar sedang dihentikan, kirim melalui Microsoft Graph API sebagai gantinya dengan `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-encode setiap karakter khusus dalam client secret). Ini memerlukan pendaftaran aplikasi Entra ID yang diberi izin aplikasi `Mail.Send` — lihat [Konfigurasi E-mail](../installation/email-configuration.md).

*Default: `null://null`*


### `mailer_exclude_json`

**Surat: Hindari penggunaan LD+JSON**

Beberapa klien e-mail tidak memahami format deskriptif LD+JSON, menampilkannya sebagai string JSON lepas kepada pengguna akhir. Jika ini kasus Anda, Anda mungkin ingin mengatur variabel di bawah ke 'false' untuk menonaktifkan header ini.

*Default: `false`*


### `mailer_from_email`

**Kirim semua e-mail dari alamat e-mail ini**

Mengatur alamat e-mail default yang digunakan pada kolom "from" e-mail.

### `mailer_from_name`

**Kirim semua e-mail seolah berasal dari nama (organisasi) ini**

Mengatur nama tampilan default yang digunakan untuk mengirim e-mail platform. misalnya "Tim dukungan".

### `mailer_mails_charset`

**Surat: set karakter**

Jika Anda perlu menentukan charset yang digunakan saat mengirim e-mail tersebut. Biarkan kosong jika Anda tidak yakin.

*Default: `UTF-8`*


### `messages_hide_mail_content`

**Sembunyikan isi e-mail untuk membawa pengguna ke platform**

Utamakan versi e-mail singkat dengan tautan ke ruang pesan di platform untuk meningkatkan keterlibatan berbasis platform.

*Default: `false`*


### `notifications_extended_footer_message`

**Footer notifikasi yang diperluas**

Tambahkan footer ekstra kustom untuk e-mail notifikasi pada bahasa tertentu, misalnya untuk pemberitahuan kebijakan privasi. Beberapa bahasa dan paragraf dapat ditambahkan.

### `send_notification_score_in_percentage`

**Kirim skor dalam persentase pada notifikasi hasil tes**

Mengirim skor latihan sebagai persentase alih-alih poin dalam e-mail notifikasi hasil tes.

*Default: `false`*


### `send_two_inscription_confirmation_mail`

**Kirim 2 e-mail pendaftaran**

Kirim dua e-mail terpisah saat pendaftaran. Satu untuk nama pengguna, satu lagi untuk kata sandi.

*Default: `false`*


### `show_user_email_in_notification`

**Tampilkan alamat e-mail pengirim dalam notifikasi**

Menyertakan alamat e-mail pengirim bersama namanya dalam e-mail pesan pribadi dan notifikasi.

*Default: `false`*


### `update_users_email_to_dummy_except_admins`

**Perbarui e-mail pengguna ke nilai dummy selama impor**

Selama impor cron CSV khusus pengguna, secara otomatis ganti e-mail dengan e-mail dummy username@example.com.

*Default: `false`*