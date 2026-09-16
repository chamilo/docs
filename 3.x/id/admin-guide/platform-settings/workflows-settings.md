# Pengaturan Alur Kerja

Sakelar alur kerja lintas fungsi — pembuatan kursus, validasi pendaftaran, alur kerja tugas, dan sejenisnya.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Alur Kerja**. Kategori ini berisi **23 pengaturan**, tercantum di bawah dengan judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_user_course_subscription_by_course_admin`

**Izinkan Pendaftaran Pengguna ke Kursus oleh Administrator Kursus**

Mengaktifkan opsi ini akan memungkinkan administrator kursus mendaftarkan pengguna ke dalam suatu kursus

*Default: `true`*


### `allow_users_to_create_courses`

**Izinkan non-admin membuat kursus**

Izinkan non-administrator (pengajar) membuat kursus baru di server

*Default: `false`*


### `allow_working_time_edition`

**Aktifkan pengeditan waktu kerja kursus**

Aktifkan fitur ini agar pengajar dapat memperbarui secara manual waktu yang dihabiskan di kursus oleh peserta didik.

*Default: `false`*


### `course_visibility_change_only_admin`

**Perubahan visibilitas kursus hanya untuk admin**

Hapus kemungkinan bagi non-admin untuk mengubah visibilitas kursus. Visibilitas dapat menjadi masalah ketika terlalu banyak pengajar untuk dikontrol secara langsung. Memaksa visibilitas memungkinkan organisasi mengelola katalog kursus dengan lebih baik.

*Default: `false`*


### `default_menu_entry_for_course_or_session`

**Entri menu default untuk kursus**

Tentukan sub-elemen default dari entri 'Kursus' yang ditampilkan jika pengguna tidak terdaftar di kursus maupun sesi mana pun.

*Default: `my_courses`*


### `disable_user_conditions_sender_id`

**ID internal pengguna yang digunakan untuk mengirim notifikasi akun dinonaktifkan**

Hindari terlalu personal dengan pengguna dengan menggunakan akun 'bot' untuk mengirim e-mail kepada pengguna ketika akun mereka dinonaktifkan karena suatu alasan.

*Default: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Nonaktifkan kemampuan mengedit tutor kursus**

Jika dinonaktifkan, administrator tidak memiliki tautan untuk dengan cepat menugaskan tutor ke kursus sesi pada halaman pengeditan kursus.

*Default: `false`*


### `drh_allow_access_to_all_students`

**HRM dapat mengakses semua siswa dari halaman pelaporan**

[inferred] Berikan manajer HR/DRH akses ke halaman pelaporan untuk semua peserta didik di seluruh platform.

*Default: `false`*


### `gamification_mode`

**Mode gamifikasi**

Aktifkan pencapaian bintang pada learning path

### `go_to_course_after_login`

**Langsung ke kursus setelah login**

Ketika pengguna terdaftar di satu kursus, langsung ke kursus tersebut setelah login

*Default: `false`*


### `load_term_conditions_section`

**Muat bagian syarat dan ketentuan**

Perjanjian hukum akan muncul selama login atau saat masuk ke suatu kursus.

*Default: `login`*


### `multiple_url_hide_disabled_settings`

**Sembunyikan pengaturan yang dinonaktifkan di sub-URL**

Setel ke ya untuk menyembunyikan pengaturan sepenuhnya di sub-URL jika pengaturan tersebut dinonaktifkan di URL utama (di mana field access_url_changeable = 0)

*Default: `false`*


### `plugin_redirection_enabled`

**Aktifkan plugin pengalihan**

Aktifkan hanya jika Anda menggunakan plugin Redirection

*Default: `false`*


### `redirect_index_to_url_for_logged_users`

**Alihkan index.php ke URL yang diberikan untuk pengguna terautentikasi**

Jika Anda tidak ingin menggunakan halaman indeks (pengumuman, kursus populer, dll.), Anda dapat menentukan di sini skrip (dari document root) tempat pengguna akan dialihkan saat mencoba memuat indeks.

### `send_all_emails_to`

**Kirim semua e-mail ke**

Berikan daftar alamat e-mail yang kepadanya *semua* e-mail yang dikirim dari platform akan dikirim. E-mail dikirim ke alamat-alamat ini sebagai tujuan yang terlihat.

### `session_admin_user_subscription_search_extra_field_to_search`

**Field ekstra pengguna yang digunakan untuk mencari dan menamai sesi**

Pengaturan ini mendefinisikan kunci field ekstra pengguna (misalnya, "company") yang akan digunakan untuk mencari pengguna dan untuk menentukan nama sesi saat mendaftarkan siswa dari /admin-dashboard/register.

### `teacher_can_select_course_template`

**Pengajar dapat memilih kursus sebagai templat**

Izinkan memilih suatu kursus sebagai templat untuk kursus baru yang sedang dibuat pengajar

*Default: `true`*


### `update_student_expiration_x_date`

**Tetapkan tanggal kedaluwarsa pada login pertama**

Array yang mendefinisikan 'days' dan 'months' untuk menetapkan tanggal kedaluwarsa akun ketika pengguna pertama kali login.

### `user_edition_extra_field_to_check`

**Tetapkan field ekstra sebagai pemicu pendaftaran sebagai mantan peserta didik**

Berikan label field ekstra di sini. Jika field ekstra ini diperbarui untuk pengguna mana pun, suatu proses dipicu untuk memeriksa akses pengguna tersebut ke kursus dengan field ekstra yang sama.

### `user_number_of_days_for_default_expiration_date_per_role`

**Hari kedaluwarsa default berdasarkan peran**

Sebuah array peran => angka yang merepresentasikan jumlah hari suatu akun berlaku sebelum kedaluwarsa, tergantung pada peran.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Nonaktifkan pembatalan pendaftaran pengguna dari kursus/sesi saat pembatalan pendaftaran pengguna dari grup/kelas**

[inferred] Saat menghapus pengguna dari grup/kelas, jangan secara otomatis membatalkan pendaftaran mereka dari kursus atau sesi terkait.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Nonaktifkan pembatalan pendaftaran pengguna dari kursus saat penghapusan kursus dari grup/kelas**

[inferred] Saat suatu kursus dihapus dari grup/kelas, jangan secara otomatis membatalkan pendaftaran pengguna dari kursus tersebut.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Nonaktifkan pembatalan pendaftaran pengguna dari sesi saat penghapusan sesi dari grup/kelas**

[inferred] Saat suatu sesi dihapus dari grup/kelas, jangan secara otomatis membatalkan pendaftaran pengguna dari sesi tersebut.

*Default: `false`*