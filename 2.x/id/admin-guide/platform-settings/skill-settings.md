# Pengaturan Keterampilan

Perilaku sistem **Keterampilan** — pohon keterampilan, aturan pemberian, integrasi profil.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Keterampilan**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_hr_skills_management`

**Izinkan manajemen keterampilan oleh HR**

Mengizinkan HR untuk mengelola keterampilan

*Default: `true`*

### `allow_private_skills`

**Sembunyikan keterampilan dari peserta didik**

Jika diaktifkan, keterampilan hanya dapat dilihat oleh admin, pengajar (yang terkait dengan pengguna melalui kursus), dan pengguna HRM (jika terkait dengan pengguna).

*Default: `false`*

### `allow_skill_rel_items`

**Aktifkan penautan keterampilan ke item**

Ini mengaktifkan fitur utama yang memungkinkan item apa pun untuk ditautkan ke (dan dengan demikian memungkinkan perolehan) keterampilan. Fitur ini masih memerlukan pengajar untuk mengonfirmasi perolehan keterampilan, sehingga perolehan tidak otomatis.

*Default: `false`*

### `allow_skills_tool`

**Izinkan alat Keterampilan**

Pengguna dapat melihat keterampilan mereka di jejaring sosial dan di blok di halaman utama.

*Default: `true`*

### `allow_teacher_access_student_skills`

**Izinkan pengajar mengakses keterampilan peserta didik**

[disimpulkan] Mengizinkan instruktur untuk melihat dan memantau keterampilan yang diperoleh oleh peserta didik dalam kursus mereka.

*Default: `false`*

### `badge_assignation_notification`

**Kirim pemberitahuan ke peserta didik ketika keterampilan/lencana telah diperoleh**

[disimpulkan] Mengirim pemberitahuan ke peserta didik ketika mereka memperoleh keterampilan baru atau pencapaian lencana.

*Default: `false`*

### `hide_skill_levels`

**Sembunyikan fitur tingkat keterampilan**

[disimpulkan] Menyembunyikan hierarki tingkat keterampilan dan label tingkat dalam tampilan terkait keterampilan.

*Default: `false`*

### `manual_assignment_subskill_autoload`

**Penugasan keterampilan ke pengguna: pemuatan otomatis sub-keterampilan**

Saat menugaskan keterampilan secara manual ke pengguna, formulir dapat diatur untuk secara otomatis menawarkan Anda untuk menugaskan sub-keterampilan alih-alih keterampilan yang Anda pilih.

*Default: `false`*

### `openbadges_backpack`

**URL ransel OpenBadges**

URL server ransel OpenBadges yang akan digunakan secara default untuk semua pengguna yang ingin mengekspor lencana mereka. Ini secara default mengarah ke repositori ransel gratis dan terbuka dari Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Tampilkan nama lengkap keterampilan di roda keterampilan**

Pada roda keterampilan, ini menampilkan nama keterampilan ketika memiliki kode pendek.

*Default: `false`*

### `skill_levels_names`

**Nama tingkat keterampilan**

Tentukan nama untuk tingkat keterampilan sebagai array id => nama.

### `skills_hierarchical_view_in_user_tracking`

**Tampilkan keterampilan sebagai tabel hierarkis**

[disimpulkan] Menampilkan keterampilan peserta didik sebagai struktur pohon hierarkis di halaman kemajuan dan pelaporan.

*Default: `false`*

### `skills_teachers_can_assign_skills`

**Izinkan pengajar menentukan keterampilan yang diperoleh melalui kursus mereka**

Secara default, hanya admin yang dapat menentukan keterampilan mana yang dapat diperoleh melalui kursus tertentu.

*Default: `false`*