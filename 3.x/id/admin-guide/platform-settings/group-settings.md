# Pengaturan Grup

Perilaku alat **Grup** pada kursus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Grup**. Kategori ini berisi **3 pengaturan**, tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_group_categories`

**Kategori grup**

Izinkan pengajar membuat kategori di alat Grup?

*Default: `false`*


### `hide_course_group_if_no_tools_available`

**Sembunyikan grup kursus jika tidak ada alat**

Jika tidak ada alat yang tersedia dalam suatu grup dan pengguna tidak terdaftar ke grup itu sendiri, sembunyikan grup sepenuhnya dari daftar grup.

*Default: `false`*


### `show_groups_to_users`

**Tampilkan kelas kepada pengguna**

Tampilkan kelas kepada pengguna. Kelas adalah fitur yang memungkinkan Anda mendaftarkan/membatalkan pendaftaran kelompok pengguna ke sesi atau kursus secara langsung, sehingga mengurangi beban administratif. Ketika Anda memilih opsi ini, peserta didik akan dapat melihat kelas mana mereka berada melalui antarmuka jejaring sosial mereka.

*Default: `false`*