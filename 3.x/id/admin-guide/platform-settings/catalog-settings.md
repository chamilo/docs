# Pengaturan Katalog Kursus

Perilaku katalog kursus (daftar publik tempat pengguna dapat menelusuri dan mendaftar sendiri).

Akses pengaturan ini di **Administration > Configuration settings > Course Catalog**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_session_auto_subscription`

**Langganan Sesi Otomatis**

Aktifkan langganan otomatis ke sesi untuk pengguna.

*Default: `false`*

### `allow_students_to_browse_courses`

**Izinkan Penelusuran Mahasiswa**

Izinkan mahasiswa menelusuri dan memfilter katalog kursus.

*Default: `true`*

### `course_catalog_display_in_home`

**Tampilkan Katalog di Beranda**

Tampilkan blok katalog kursus di beranda platform.

*Default: `false`*

### `course_catalog_hide_private`

**Sembunyikan Kursus Privat**

Kecualikan kursus privat dari tampilan katalog.

*Default: `true`*

### `course_catalog_published`

**Terbitkan katalog kursus**

Buat katalog kursus tersedia bagi pengguna anonim (publik umum) tanpa perlu masuk.

*Default: `false`*

### `course_catalog_settings`

**Pengaturan katalog kursus**

Konfigurasi JSON untuk katalog kursus: pengaturan tautan, filter, opsi pengurutan, dan lainnya.

### `course_subscription_in_user_s_session`

**Langganan di Tampilan Sesi**

Izinkan pengguna berlangganan kursus langsung dari halaman sesi mereka.

*Default: `false`*

### `hide_public_link`

**Sembunyikan Tautan Publik**

Hapus tautan URL publik dari kartu kursus.

*Default: `false`*

### `only_show_course_from_selected_category`

**Hanya tampilkan kategori yang cocok di katalog kursus**

Jika tidak kosong, hanya kursus dari kategori yang diberikan yang akan muncul di katalog kursus.

### `only_show_selected_courses`

**Hanya Kursus Terpilih**

Tampilkan hanya kursus yang dipilih secara manual di katalog.

*Default: `false`*

### `session_catalog_settings`

**Pengaturan Katalog Sesi**

Konfigurasi JSON untuk katalog sesi: filter dan opsi tampilan.

### `show_courses_descriptions_in_catalog`

**Tampilkan Deskripsi Kursus**

Tampilkan deskripsi kursus dalam daftar katalog.

*Default: `false`*

### `show_courses_sessions`

**Tampilkan Kursus & Sesi**

Sertakan baik kursus maupun sesi dalam hasil katalog.

*Default: `0`*