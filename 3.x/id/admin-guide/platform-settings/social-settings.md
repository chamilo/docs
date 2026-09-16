# Pengaturan Jejaring Sosial

Perilaku **Jejaring Sosial** — teman, grup, unggahan dinding, album foto.

Akses pengaturan ini di bawah **Administration > Configuration settings > Social Network**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_social_tool`

**Alat jejaring sosial (serupa Facebook)**

Alat jejaring sosial memungkinkan pengguna mendefinisikan relasi dengan pengguna lain dan, dengan demikian, mendefinisikan grup teman. Digabungkan dengan alat perpesanan internal, alat ini memungkinkan komunikasi yang erat dengan teman, di dalam lingkungan portal.

*Default: `true`*

### `allow_students_to_create_groups_in_social`

**Izinkan peserta didik membuat grup di jejaring sosial**

Izinkan peserta didik membuat grup di jejaring sosial

*Default: `false`*


### `disable_dislike_option`

**Nonaktifkan 'dislike' untuk unggahan sosial**

Hapus opsi jempol ke bawah untuk umpan balik unggahan sosial. Hanya pertahankan jempol ke atas (suka).

*Default: `false`*

### `hide_social_groups_block`

**Sembunyikan blok grup di jejaring sosial**

Menghapus bagian grup dari tampilan jejaring sosial.

*Default: `false`*


### `social_enable_messages_feedback`

**Suka/Tidak suka untuk unggahan sosial**

Memungkinkan pengguna menambahkan umpan balik (suka atau tidak suka) pada unggahan di dinding sosial.

*Default: `false`*

### `social_make_teachers_friend_all`

**Pengajar dan admin melihat siswa sebagai teman di jejaring sosial**

Secara otomatis membuat instruktur dan administrator muncul sebagai teman bagi semua siswa di modul jejaring sosial.

*Default: `false`*


### `social_show_language_flag_in_profile`

**Tampilkan bendera bahasa di samping avatar di jejaring sosial**

Menampilkan preferensi bahasa pengguna sebagai ikon bendera di samping avatar mereka pada profil jejaring sosial.

*Default: `false`*