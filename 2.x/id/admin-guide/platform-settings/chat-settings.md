# Pengaturan Obrolan

Perilaku alat **Obrolan** dalam kursus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Obrolan**. Kategori ini berisi **5 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_global_chat`

**Izinkan obrolan global**

Pengguna dapat mengobrol satu sama lain

*Default: `false`*

### `course_chat_restrict_to_coach`

**Batasi obrolan kursus hanya untuk pelatih**

Hanya izinkan siswa untuk berbicara dengan tutor dalam kursus (bukan dengan siswa lain).

*Default: `false`*

### `hide_chat_video`

**Sembunyikan opsi obrolan video di obrolan global**

Jika diaktifkan, fungsi obrolan video akan dinonaktifkan dan tidak tersedia di alat obrolan global.

*Default: `true`*

### `save_private_conversations_in_documents`

**Simpan percakapan pribadi dalam dokumen**

Jika diaktifkan, pesan obrolan pribadi 1:1 akan dicerminkan dalam dokumen riwayat obrolan kursus. Disarankan untuk tetap dinonaktifkan demi privasi.

*Default: `false`*

### `show_chat_folder`

**Tampilkan folder riwayat percakapan obrolan**

Ini akan menampilkan kepada guru folder yang berisi semua sesi yang telah dilakukan di obrolan, guru dapat membuatnya terlihat atau tidak bagi peserta didik dan menggunakannya sebagai sumber daya

*Default: `true`*