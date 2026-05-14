# Pengaturan Alur Kerja

Pengaturan alur kerja lintas fungsi — pembuatan kursus, validasi pendaftaran, alur kerja tugas, dan sejenisnya.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Alur Kerja**. Kategori ini berisi **23 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_user_course_subscription_by_course_admin`

**Izinkan Pendaftaran Pengguna ke Kursus oleh Administrator Kursus**

Mengaktifkan opsi ini akan memungkinkan administrator kursus untuk mendaftarkan pengguna ke dalam kursus.

*Default: `true`*

### `allow_users_to_create_courses`

**Izinkan Non-Admin untuk Membuat Kursus**

Izinkan non-administrator (guru) untuk membuat kursus baru di server.

*Default: `false`*

### `allow_working_time_edition`

**Aktifkan Pengeditan Waktu Kerja Kursus**

Aktifkan fitur ini untuk memungkinkan guru memperbarui secara manual waktu yang dihabiskan peserta didik dalam kursus.

*Default: `false`*

### `course_visibility_change_only_admin`

**Perubahan Visibilitas Kursus Hanya untuk Admin**

Hapus kemungkinan bagi non-admin untuk mengubah visibilitas kursus. Visibilitas bisa menjadi masalah ketika ada terlalu banyak guru untuk dikontrol secara langsung. Memaksa visibilitas memungkinkan organisasi untuk mengelola katalog kursus dengan lebih baik.

*Default: `false`*

### `default_menu_entry_for_course_or_session`

**Entri Menu Default untuk Kursus**

Tentukan sub-elemen default dari entri 'Kursus' yang akan ditampilkan jika pengguna tidak terdaftar di kursus atau sesi mana pun.

*Default: `my_courses`*

### `disable_user_conditions_sender_id`

**ID Internal Pengguna yang Digunakan untuk Mengirim Pemberitahuan Akun Nonaktif**

Hindari terlalu personal dengan pengguna dengan menggunakan akun 'bot' untuk mengirim email kepada pengguna ketika akun mereka dinonaktifkan karena alasan tertentu.

*Default: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Nonaktifkan Kemampuan untuk Mengedit Pelatih Kursus**

Ketika dinonaktifkan, admin tidak memiliki tautan untuk dengan cepat menugaskan pelatih ke sesi-kursus di halaman pengeditan kursus.

*Default: `false`*

### `drh_allow_access_to_all_students`

**HRM Dapat Mengakses Semua Siswa dari Halaman Pelaporan**

[disimpulkan] Berikan akses kepada manajer HR/DRH ke halaman pelaporan untuk semua peserta didik di seluruh platform.

*Default: `false`*

### `gamification_mode`

**Mode Gamifikasi**

Aktifkan pencapaian bintang di jalur pembelajaran.

### `go_to_course_after_login`

**Langsung ke Kursus Setelah Login**

Ketika pengguna terdaftar dalam satu kursus, langsung menuju ke kursus setelah login.

*Default: `false`*

### `load_term_conditions_section`

**Muat Bagian Syarat dan Ketentuan**

Perjanjian hukum akan muncul selama login atau saat masuk ke kursus.

*Default: `login`*

### `multiple_url_hide_disabled_settings`

**Sembunyikan Pengaturan yang Dinonaktifkan di Sub-URL**

Atur ke ya untuk menyembunyikan pengaturan sepenuhnya di sub-URL jika pengaturan tersebut dinonaktifkan di URL utama (di mana bidang access_url_changeable = 0).

*Default: `false`*

### `plugin_redirection_enabled`

**Aktifkan Plugin Pengalihan**

Aktifkan hanya jika Anda menggunakan plugin Pengalihan.

*Default: `false`*

### `redirect_index_to_url_for_logged_users`

**Alihkan index.php ke URL yang Diberikan untuk Pengguna yang Terautentikasi**

Jika Anda tidak ingin menggunakan halaman indeks (pengumuman, kursus populer, dll.), Anda dapat menentukan di sini skrip (dari root dokumen) ke mana pengguna akan dialihkan saat mencoba memuat indeks.

### `send_all_emails_to`

**Kirim Semua Email ke**

Berikan daftar alamat email kepada siapa *semua* email yang dikirim dari platform akan dikirim. Email dikirim ke alamat-alamat ini sebagai tujuan yang terlihat.

### `session_admin_user_subscription_search_extra_field_to_search`

**Bidang Pengguna Ekstra yang Digunakan untuk Mencari dan Menamai Sesi**

Pengaturan ini menentukan kunci bidang pengguna ekstra (misalnya, "company") yang akan digunakan untuk mencari pengguna dan untuk menentukan nama sesi saat mendaftarkan siswa dari /admin-dashboard/register.

### `teacher_can_select_course_template`

**Guru Dapat Memilih Kursus sebagai Templat**

Izinkan memilih kursus sebagai templat untuk kursus baru yang dibuat oleh guru.

*Default: `true`*

### `update_student_expiration_x_date`

**Tetapkan Tanggal Kedaluwarsa pada Login Pertama**

Array yang menentukan 'hari' dan 'bulan' untuk menetapkan tanggal kedaluwarsa akun ketika pengguna pertama kali login.

### `user_edition_extra_field_to_check`

**Tetapkan Bidang Ekstra sebagai Pemicu untuk Pendaftaran sebagai Mantan Peserta Didik**

Berikan label bidang ekstra di sini. Jika bidang ekstra ini diperbarui untuk pengguna mana pun, proses akan dipicu untuk memeriksa akses pengguna ini ke kursus dengan bidang ekstra yang sama.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Jumlah hari kedaluwarsa default berdasarkan peran**

Sebuah array dari peran => angka yang mewakili jumlah hari sebelum akun kedaluwarsa, tergantung pada peran tersebut.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Nonaktifkan pembatalan langganan pengguna dari kursus/sesi saat pengguna dibatalkan dari grup/kelas**

[disimpulkan] Saat menghapus pengguna dari grup/kelas, jangan secara otomatis membatalkan langganan mereka dari kursus atau sesi yang terkait.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Nonaktifkan pembatalan langganan pengguna dari kursus saat kursus dihapus dari grup/kelas**

[disimpulkan] Saat kursus dihapus dari grup/kelas, jangan secara otomatis membatalkan langganan pengguna dari kursus tersebut.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Nonaktifkan pembatalan langganan pengguna dari sesi saat sesi dihapus dari grup/kelas**

[disimpulkan] Saat sesi dihapus dari grup/kelas, jangan secara otomatis membatalkan langganan pengguna dari sesi tersebut.

*Default: `false`*