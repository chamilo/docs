# Pengaturan Jaringan Sosial

Perilaku dari **Jaringan Sosial** — teman, grup, postingan dinding, album foto.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Jaringan Sosial**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_social_tool`

**Alat jaringan sosial (mirip Facebook)**

Alat jaringan sosial memungkinkan pengguna untuk menentukan hubungan dengan pengguna lain dan, dengan demikian, membentuk grup teman. Dikombinasikan dengan alat pesan internal, alat ini memungkinkan komunikasi yang erat dengan teman di dalam lingkungan portal.

*Default: `true`*

### `allow_students_to_create_groups_in_social`

**Izinkan peserta didik membuat grup di jaringan sosial**

Mengizinkan peserta didik untuk membuat grup di jaringan sosial.

*Default: `false`*

### `disable_dislike_option`

**Nonaktifkan opsi 'tidak suka' untuk postingan sosial**

Menghapus opsi jempol ke bawah untuk umpan balik postingan sosial. Hanya mempertahankan opsi jempol ke atas (suka).

*Default: `false`*

### `hide_social_groups_block`

**Sembunyikan blok grup di jaringan sosial**

Menghapus bagian grup dari tampilan jaringan sosial.

*Default: `false`*

### `social_enable_messages_feedback`

**Suka/Tidak Suka untuk postingan sosial**

Mengizinkan pengguna untuk menambahkan umpan balik (suka atau tidak suka) pada postingan di dinding sosial.

*Default: `false`*

### `social_make_teachers_friend_all`

**Guru dan admin terlihat sebagai teman bagi siswa di jaringan sosial**

Secara otomatis menjadikan instruktur dan administrator tampak sebagai teman bagi semua siswa di modul jaringan sosial.

*Default: `false`*

### `social_show_language_flag_in_profile`

**Tampilkan bendera bahasa di samping avatar di jaringan sosial**

Menampilkan preferensi bahasa pengguna sebagai ikon bendera di samping avatar mereka di profil jaringan sosial.

*Default: `false`*