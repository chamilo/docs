# Pengaturan Katalog Kursus

Perilaku katalog kursus (daftar publik di mana pengguna dapat menjelajah dan mendaftar sendiri).

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Katalog Kursus**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_session_auto_subscription`

**Langganan Otomatis Sesi**

Mengaktifkan langganan otomatis ke sesi untuk pengguna.

*Default: `false`*

### `allow_students_to_browse_courses`

**Izinkan Penjelajahan Siswa**

Mengizinkan siswa untuk menjelajah dan menyaring katalog kursus.

*Default: `true`*

### `course_catalog_display_in_home`

**Tampilkan Katalog di Beranda**

Menampilkan blok katalog kursus di beranda platform.

*Default: `false`*

### `course_catalog_hide_private`

**Sembunyikan Kursus Privat**

Mengecualikan kursus privat dari tampilan katalog.

*Default: `true`*

### `course_catalog_published`

**Publikasikan Katalog Kursus**

Membuat katalog kursus tersedia untuk pengguna anonim (publik umum) tanpa perlu masuk.

*Default: `false`*

### `course_catalog_settings`

**Pengaturan Katalog Kursus**

Konfigurasi JSON untuk katalog kursus: pengaturan tautan, filter, opsi pengurutan, dan lainnya.

### `course_subscription_in_user_s_session`

**Langganan di Tampilan Sesi**

Mengizinkan pengguna untuk berlangganan kursus langsung dari halaman sesi mereka.

*Default: `false`*

### `hide_public_link`

**Sembunyikan Tautan Publik**

Menghapus tautan URL publik dari kartu kursus.

*Default: `false`*

### `only_show_course_from_selected_category`

**Hanya Tampilkan Kategori yang Cocok di Katalog Kursus**

Jika tidak kosong, hanya kursus dari kategori yang diberikan yang akan muncul di katalog kursus.

### `only_show_selected_courses`

**Hanya Kursus yang Dipilih**

Hanya menampilkan kursus yang dipilih secara manual di katalog.

*Default: `false`*

### `session_catalog_settings`

**Pengaturan Katalog Sesi**

Konfigurasi JSON untuk katalog sesi: filter dan opsi tampilan.

### `show_courses_descriptions_in_catalog`

**Tampilkan Deskripsi Kursus**

Menampilkan deskripsi kursus dalam daftar katalog.

*Default: `false`*

### `show_courses_sessions`

**Tampilkan Kursus & Sesi**

Menyertakan baik kursus maupun sesi dalam hasil katalog.

*Default: `0`*