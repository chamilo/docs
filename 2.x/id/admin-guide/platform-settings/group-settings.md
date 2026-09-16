# Pengaturan Grup

Perilaku alat **Grup** dalam kursus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Grup**. Kategori ini berisi **3 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam pengaturan bawaan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_group_categories`

**Kategori Grup**

Izinkan pengajar untuk membuat kategori di alat Grup?

*Default: `false`*


### `hide_course_group_if_no_tools_available`

**Sembunyikan grup kursus jika tidak ada alat**

Jika tidak ada alat yang tersedia dalam sebuah grup dan pengguna tidak terdaftar di grup tersebut, sembunyikan grup sepenuhnya dalam daftar grup.

*Default: `false`*


### `show_groups_to_users`

**Tampilkan kelas kepada pengguna**

Tampilkan kelas kepada pengguna. Kelas adalah fitur yang memungkinkan Anda untuk mendaftarkan/membatalkan pendaftaran sekelompok pengguna ke dalam sesi atau kursus secara langsung, mengurangi kerumitan administratif. Ketika Anda memilih opsi ini, peserta didik akan dapat melihat di kelas mana mereka berada melalui antarmuka jejaring sosial mereka.

*Default: `false`*