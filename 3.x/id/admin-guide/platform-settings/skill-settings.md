# Pengaturan Skills

Perilaku sistem **Skills** — pohon skills, aturan pemberian, integrasi profil.

Akses pengaturan ini di **Administration > Configuration settings > Skills**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut secara global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_hr_skills_management`

**Izinkan pengelolaan skills HR**

Mengizinkan HR mengelola skills

*Default: `true`*


### `allow_private_skills`

**Sembunyikan skills dari peserta didik**

Jika diaktifkan, skills hanya dapat terlihat bagi admin, pengajar (terkait dengan pengguna melalui kursus), dan pengguna HRM (jika terkait dengan pengguna).

*Default: `false`*


### `allow_skill_rel_items`

**Aktifkan tautan skills ke item**

Ini mengaktifkan fitur utama yang memungkinkan item apa pun ditautkan ke (dan dengan demikian memungkinkan perolehan) suatu skill. Fitur ini tetap mensyaratkan pengajar untuk mengonfirmasi perolehan skill, sehingga perolehan tidak otomatis.

*Default: `false`*


### `allow_skills_tool`

**Izinkan alat Skills**

Pengguna dapat melihat skills mereka di jejaring sosial dan di sebuah blok pada beranda.

*Default: `true`*

### `allow_teacher_access_student_skills`

**Izinkan pengajar mengakses skills peserta didik**

[inferred] Izinkan instruktur melihat dan memantau skills yang diperoleh peserta didik dalam kursus mereka.

*Default: `false`*


### `badge_assignation_notification`

**Kirim notifikasi kepada peserta didik ketika skill/badge telah diperoleh**

[inferred] Kirim notifikasi kepada peserta didik ketika mereka memperoleh skill atau pencapaian badge baru.

*Default: `false`*


### `hide_skill_levels`

**Sembunyikan fitur tingkat skill**

[inferred] Sembunyikan hierarki tingkat skill dan label tingkat pada tampilan terkait skill.

*Default: `false`*


### `manual_assignment_subskill_autoload`

**Penetapan skills ke pengguna: pemuatan otomatis sub-skills**

Saat menetapkan skills secara manual kepada pengguna, formulir dapat diatur agar secara otomatis menawarkan Anda untuk menetapkan sub-skill alih-alih skill yang Anda pilih.

*Default: `false`*


### `openbadges_backpack`

**URL backpack OpenBadges**

URL server backpack OpenBadges yang akan digunakan secara default untuk semua pengguna yang ingin mengekspor badge mereka. Nilai default-nya adalah repositori backpack Mozilla Foundation yang terbuka dan gratis: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Tampilkan nama skill lengkap pada roda skill**

Pada roda skills, menampilkan nama skill ketika skill tersebut memiliki kode singkat.

*Default: `false`*


### `skill_levels_names`

**Nama tingkat skill**

Tentukan nama untuk tingkat skills sebagai array id => name.

### `skills_hierarchical_view_in_user_tracking`

**Tampilkan skills sebagai tabel hierarkis**

[inferred] Tampilkan skills peserta didik sebagai struktur pohon hierarkis pada halaman kemajuan dan pelaporan.

*Default: `false`*


### `skills_teachers_can_assign_skills`

**Izinkan pengajar menetapkan skills mana yang diperoleh melalui kursus mereka**

Secara default, hanya admin yang dapat memutuskan skills mana yang dapat diperoleh melalui kursus mana.

*Default: `false`*