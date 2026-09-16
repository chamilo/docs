# Pengaturan Chat

Perilaku alat **Chat** kursus.

Akses pengaturan ini di **Administration > Configuration settings > Chat**. Kategori ini berisi **5 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_global_chat`

**Izinkan chat global**

Pengguna dapat mengobrol satu sama lain

*Default: `false`*

### `course_chat_restrict_to_coach`

**Batasi chat kursus hanya untuk tutor**

Hanya izinkan siswa berbicara dengan tutor di kursus (bukan dengan siswa lain).

*Default: `false`*

### `hide_chat_video`

**Sembunyikan opsi videochat di chat global**

Jika diaktifkan, fungsionalitas video chat dinonaktifkan dan tidak tersedia di alat chat global.

*Default: `true`*

### `save_private_conversations_in_documents`

**Simpan percakapan pribadi di dokumen**

Jika diaktifkan, pesan chat pribadi 1:1 akan dicerminkan di dokumen riwayat chat kursus. Disarankan untuk tetap dinonaktifkan demi privasi.

*Default: `false`*

### `show_chat_folder`

**Tampilkan folder riwayat percakapan chat**

Ini akan menampilkan kepada pengajar folder yang berisi semua sesi yang telah dibuat di chat; pengajar dapat membuatnya terlihat atau tidak bagi peserta didik dan menggunakannya sebagai sumber daya

*Default: `true`*