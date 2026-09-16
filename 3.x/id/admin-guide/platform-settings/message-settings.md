# Pengaturan Pesan

Perilaku sistem **Pesan / Kotak Masuk**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pesan**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_message_tool`

**Alat pesan internal**

Mengaktifkan alat pesan internal memungkinkan pengguna mengirim pesan kepada pengguna lain di platform dan memiliki kotak masuk pesan.

*Default: `true`*

### `allow_send_message_to_all_platform_users`

**Izinkan pengiriman pesan kepada pengguna platform mana pun**

Memungkinkan Anda mengirim pesan kepada pengguna mana pun di platform, bukan hanya teman atau orang yang sedang daring.

*Default: `false`*

### `allow_user_message_tracking`

**Admin dapat melihat pesan pribadi**

Izinkan administrator melihat pesan pribadi antara pengajar dan peserta didik. Pastikan Anda menyertakan catatan dalam syarat dan ketentuan karena hal ini dapat memengaruhi perlindungan privasi.

*Default: `false`*


### `filter_interactivity_messages`

**Pengajar hanya dapat mengakses pesan peserta didik dalam jangka waktu sesi**

Saring pesan antara pengajar dan peserta didik antara tanggal mulai dan berakhir sesi

*Default: `false`*


### `message_max_upload_filesize`

**Ukuran unggah berkas maksimum dalam pesan**

Ukuran maksimum untuk unggahan berkas dalam alat pesan (dalam Byte)

*Default: `20971520`*

### `private_messages_about_user`

**Izinkan pesan pribadi antar pengajar tentang seorang peserta didik**

Izinkan pertukaran pesan dari pengajar/atasan tentang seorang pengguna dari halaman pelacakan pengguna tersebut.

*Default: `false`*


### `private_messages_about_user_visible_to_user`

**Izinkan peserta didik melihat pesan tentang mereka antar pengajar**

Jika pertukaran pesan tentang seorang pengguna diaktifkan, opsi ini akan memungkinkan pengguna yang bersangkutan melihat pesan tersebut. Ini untuk mematuhi aturan transparansi yang mungkin perlu dipenuhi organisasi.

*Default: `false`*