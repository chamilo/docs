# Pengaturan Pesan

Perilaku sistem **Pesan / Kotak Masuk**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Pesan**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_message_tool`

**Alat pesan internal**

Mengaktifkan alat pesan internal memungkinkan pengguna untuk mengirim pesan ke pengguna lain di platform dan memiliki kotak masuk pesan.

*Default: `true`*

### `allow_send_message_to_all_platform_users`

**Izinkan mengirim pesan ke semua pengguna platform**

Memungkinkan Anda untuk mengirim pesan ke pengguna mana pun di platform, tidak hanya teman Anda atau orang-orang yang sedang online.

*Default: `false`*

### `allow_user_message_tracking`

**Admin dapat melihat pesan pribadi**

Mengizinkan administrator untuk melihat pesan pribadi antara seorang pengajar dan peserta didik. Pastikan Anda menyertakan catatan dalam syarat dan ketentuan karena ini dapat memengaruhi perlindungan privasi.

*Default: `false`*

### `filter_interactivity_messages`

**Pengajar hanya dapat mengakses pesan peserta didik dalam rentang waktu sesi**

Menyaring pesan antara pengajar dan peserta didik berdasarkan tanggal mulai dan akhir sesi.

*Default: `false`*

### `message_max_upload_filesize`

**Ukuran maksimum unggahan file dalam pesan**

Ukuran maksimum untuk unggahan file dalam alat pesan (dalam Byte).

*Default: `20971520`*

### `private_messages_about_user`

**Izinkan pesan pribadi antara pengajar tentang seorang peserta didik**

Mengizinkan pertukaran pesan dari pengajar/atasan tentang seorang pengguna dari halaman pelacakan pengguna tersebut.

*Default: `false`*

### `private_messages_about_user_visible_to_user`

**Izinkan peserta didik melihat pesan tentang mereka antara pengajar**

Jika pertukaran pesan tentang seorang pengguna diaktifkan, opsi ini akan memungkinkan pengguna yang bersangkutan untuk melihat pesan tersebut. Ini untuk mematuhi aturan transparansi yang mungkin perlu dipatuhi oleh organisasi.

*Default: `false`*