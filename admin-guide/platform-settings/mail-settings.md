# Pengaturan Email

Bagaimana email keluar dibuat — identitas pengirim, tata letak, tanda tangan, dan alamat untuk tujuan khusus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Email**. Kategori ini berisi **18 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_email_editor_for_anonymous`

**Editor Email untuk Pengguna Anonim**

Izinkan pengguna anonim untuk mengirim email dari platform. Di era keamanan informasi saat ini, opsi ini tidak direkomendasikan.

*Default: `true`*

### `cron_notification_help_desk`

**Alamat Email untuk Mengirim Laporan Eksekusi Cronjobs**

Diberikan sebagai array dari alamat email. Belum berfungsi untuk semua cronjobs.

### `mail_content_style`

**Atribut Tambahan HTML untuk Badan Email**

Atribut HTML tambahan yang diterapkan pada tag body dari email notifikasi yang dihasilkan.

### `mail_header_style`

**Atribut Tambahan HTML untuk Header Email**

Atribut HTML tambahan yang diterapkan pada bagian header dari email notifikasi yang dihasilkan.

### `mailer_debug_enable`

**Email: Debug**

Pilih apakah Anda ingin mengaktifkan log debug pengiriman email. Log ini akan memberikan informasi lebih lanjut tentang apa yang terjadi saat terhubung ke layanan email, tetapi tidak elegan dan dapat mengganggu desain halaman. Gunakan hanya ketika tidak ada aktivitas pengguna.

*Default: `false`*

### `mailer_dkim`

**Email: Header DKIM**

Masukkan array JSON dari pengaturan konfigurasi DKIM Anda (lihat contoh).

### `mailer_dsn`

**DSN Email**

DSN mencakup semua parameter yang diperlukan untuk terhubung ke layanan email. Anda dapat mempelajari lebih lanjut di https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Berikut adalah beberapa contoh sintaks DSN yang didukung: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Default: `null://null`*

### `mailer_exclude_json`

**Email: Hindari Penggunaan LD+JSON**

Beberapa klien email tidak memahami format deskriptif LD+JSON, menampilkannya sebagai string JSON yang lepas kepada pengguna akhir. Jika ini terjadi pada Anda, Anda mungkin ingin mengatur variabel di bawah ini menjadi 'false' untuk menonaktifkan header ini.

*Default: `false`*

### `mailer_from_email`

**Kirim Semua Email dari Alamat Email Ini**

Mengatur alamat email default yang digunakan di bidang "from" pada email.

### `mailer_from_name`

**Kirim Semua Email sebagai Berasal dari Nama (Organisasi) Ini**

Mengatur nama tampilan default yang digunakan untuk mengirim email platform, misalnya "Tim Dukungan".

### `mailer_mails_charset`

**Email: Set Karakter**

Jika Anda perlu menentukan set karakter yang digunakan saat mengirim email tersebut. Biarkan kosong jika Anda tidak yakin.

*Default: `UTF-8`*

### `mailer_xoauth2`

**Email: Opsi XOAuth2**

Jika Anda menggunakan layanan email berbasis XOAuth2, gunakan pengaturan ini dalam format JSON untuk menyimpan konfigurasi spesifik Anda (lihat contoh) dan pilih XOAuth2 di pengaturan layanan email.

### `messages_hide_mail_content`

**Sembunyikan Konten Email untuk Membawa Pengguna ke Platform**

Lebih memilih versi email pendek dengan tautan ke ruang pesan di platform untuk meningkatkan keterlibatan berbasis platform.

*Default: `false`*

### `notifications_extended_footer_message`

**Footer Notifikasi yang Diperluas**

Tambahkan footer tambahan khusus untuk email notifikasi dalam bahasa tertentu, misalnya untuk pemberitahuan kebijakan privasi. Beberapa bahasa dan paragraf dapat ditambahkan.

### `send_notification_score_in_percentage`

**Kirim Skor dalam Persentase pada Notifikasi Hasil Tes**

Mengirim skor latihan sebagai persentase alih-alih poin dalam email notifikasi hasil tes.

*Default: `false`*

### `send_two_inscription_confirmation_mail`

**Kirim 2 Email Pendaftaran**

Kirim dua email terpisah saat pendaftaran. Satu untuk nama pengguna, satu lagi untuk kata sandi.

*Default: `false`*

### `show_user_email_in_notification`

**Tampilkan Alamat Email Pengirim dalam Notifikasi**

Menyertakan alamat email pengirim bersama dengan nama mereka dalam email pesan pribadi dan notifikasi.

*Default: `false`*

### `update_users_email_to_dummy_except_admins`

**Perbarui Email Pengguna ke Nilai Dummy Selama Impor**

Selama impor cron CSV khusus pengguna, secara otomatis ganti email dengan email dummy username@example.com.

*Default: `false`*