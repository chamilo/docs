# Pengaturan Sesi

Pengaturan default dan perilaku untuk **Sesi** — siklus hidup sesi, jendela akses pelatih, visibilitas kursus dalam sesi, dan sejenisnya.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Sesi**. Kategori ini berisi **68 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `add_users_by_coach`

**Daftarkan pengguna oleh Pelatih**

Pengguna pelatih dapat membuat pengguna di platform dan mendaftarkan pengguna ke sesi.

*Default: `false`*

### `allow_career_diagram`

**Aktifkan diagram karier**

Diagram karier memungkinkan Anda menampilkan diagram karier, keterampilan, dan kursus.

*Default: `false`*

### `allow_career_users`

**Aktifkan diagram karier untuk pengguna**

Jika diagram karier diaktifkan, pengguna hanya dapat melihatnya (dan hanya diagram yang sesuai dengan studi mereka) jika Anda mengaktifkan opsi ini.

*Default: `false`*

### `allow_coach_to_edit_course_session`

**Izinkan pelatih mengedit di dalam sesi kursus**

Izinkan pelatih untuk mengedit di dalam sesi kursus.

*Default: `true`*

### `allow_delete_user_for_session_admin`

**Admin sesi dapat menghapus pengguna**

Administrator sesi dapat menghapus pengguna dari platform saat mengelola sesi mereka.

*Default: `false`*

### `allow_disable_user_for_session_admin`

**Admin sesi dapat menonaktifkan pengguna**

Administrator sesi dapat menonaktifkan akun pengguna untuk mencegah login sambil mempertahankan catatan pendaftaran di sesi mereka.

*Default: `false`*

### `allow_edit_tool_visibility_in_session`

**Izinkan pengeditan visibilitas alat dalam sesi**

Saat menggunakan sesi, perilaku default adalah menggunakan visibilitas alat yang ditentukan dalam kursus dasar. Pengaturan ini mengubahnya untuk memungkinkan pelatih dalam kursus sesi menyesuaikan visibilitas alat sesuai kebutuhan mereka.

*Default: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Alihkan ke sesi setelah pendaftaran di halaman 'Tentang' sesi**

Secara otomatis mengalihkan pengguna baru ke halaman sesi mereka setelah menyelesaikan pendaftaran melalui halaman Tentang sesi.

*Default: `false`*

### `allow_search_diagnostic`

**Aktifkan diagnosis pencarian sesi**

Izinkan tutor untuk mendapatkan diagnosis yang memungkinkan mereka mencari sesi terbaik untuk peserta didik.

*Default: `false`*

### `allow_session_admin_extra_access`

**Admin sesi dapat mengakses impor, pembaruan, dan ekspor pengguna secara massal**

Administrator sesi dapat mengakses fungsi impor, pembaruan, dan ekspor pengguna secara massal selain izin standar mereka.

*Default: `false`*

### `allow_session_admin_login_as_teacher`

**Admin sesi dapat 'masuk sebagai' guru**

Administrator sesi dapat menyamar sebagai akun guru untuk melihat pratinjau konten kursus dan pengalaman siswa dalam sesi mereka.

*Default: `false`*

### `allow_session_admin_read_careers`

**Admin sesi dapat melihat karier**

[disimpulkan] Administrator sesi dapat melihat dan mengakses jalur karier dan alur kerja promosi yang terkait dengan sesi yang mereka kelola.

*Default: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Izinkan administrator sesi melihat semua sesi**

Ketika opsi ini tidak diaktifkan (default), administrator sesi hanya dapat melihat sesi yang mereka buat. Ini membingungkan dalam lingkungan terbuka di mana administrator sesi mungkin perlu berbagi waktu dukungan antara dua sesi.

*Default: `false`*

### `allow_session_course_copy_for_teachers`

**Izinkan penyalinan sesi-ke-sesi untuk guru**

Aktifkan opsi ini untuk memungkinkan guru menyalin konten mereka dari satu kursus dalam sesi ke kursus di sesi lain. Secara default, opsi ini hanya tersedia untuk administrator platform.

*Default: `false`*

### `allow_teachers_to_create_sessions`

**Izinkan guru membuat sesi**

Guru dapat membuat, mengedit, dan menghapus sesi mereka sendiri.

*Default: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutor dapat menugaskan siswa ke sesi**

Ketika diaktifkan, pelatih/tutor kursus dalam sesi dapat mendaftarkan pengguna baru ke sesi mereka. Opsi ini sebaliknya hanya tersedia untuk administrator dan administrator sesi.

*Default: `false`*

### `allow_user_session_collapsable`

**Izinkan pengguna untuk menciutkan sesi di Sesi Saya**

Pengguna dapat menciutkan kartu atau grup sesi di halaman Sesi Saya untuk mengurangi kekacauan visual dan meningkatkan navigasi.

*Default: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**Guru kursus dasar dapat melihat tugas dari semua sesi**

Tampilkan semua publikasi peserta didik (dari kursus dasar dan dari semua sesi) di halaman work/pending.php kursus dasar.

*Default: `false`*

---
### `career_diagram_disclaimer`

**Menampilkan penafian di bawah diagram karier**

Tambahkan penafian di bawah diagram karier. Variabel bahasa yang disebut 'Career diagram disclaimer' harus ada dalam sub-bahasa Anda.

*Default: `false`*

### `career_diagram_legend`

**Menampilkan legenda di bawah diagram karier**

Tambahkan legenda karier di bawah diagram karier. Variabel bahasa yang disebut 'Career diagram legend' harus ada dalam sub-bahasa Anda.

*Default: `false`*

### `courses_list_session_title_link`

**Jenis tautan untuk judul sesi**

Pada halaman kursus/sesi, judul sesi dapat berupa salah satu dari berikut: 0 = tanpa tautan (sembunyikan judul sesi); 1 = tautkan judul ke halaman sesi khusus; 2 = tautkan ke kursus jika hanya ada satu kursus; 3 = judul sesi membuat daftar kursus dapat dilipat; 4 = tanpa tautan (tampilkan judul sesi).

*Default: `1`*

### `default_session_list_view`

**Tampilan daftar sesi default**

Pilih tab default yang ingin Anda lihat saat membuka daftar sesi sebagai admin.

*Default: `all`*

### `drh_can_access_all_session_content`

**Direktur SDM dapat mengakses semua konten sesi**

Jika diaktifkan, direktur sumber daya manusia akan mendapatkan akses ke semua konten dan pengguna dari sesi yang diikutinya.

*Default: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Mengaktifkan penyalinan konten khusus sesi ke sesi lain**

Memungkinkan duplikasi sumber daya yang dibuat dalam sesi saat menduplikasi sesi tersebut.

*Default: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Tambahkan tautan reset kata sandi ke pemberitahuan email langganan sesi**

Sertakan tautan reset kata sandi dalam email konfirmasi langganan yang dikirim ke pengguna saat mereka terdaftar dalam sesi.

*Default: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Tambahkan nama pengguna ke pemberitahuan email langganan sesi**

Sertakan nama pengguna pengguna dalam email konfirmasi langganan yang dikirim saat mereka terdaftar dalam sesi.

*Default: `false`*

### `enable_auto_reinscription`

**Mengaktifkan Pendaftaran Ulang Otomatis**

Aktifkan atau nonaktifkan pendaftaran ulang otomatis saat masa berlaku kursus berakhir. Pekerjaan cron terkait juga harus diaktifkan.

*Default: `false`*

### `enable_session_replication`

**Mengaktifkan Replikasi Sesi**

Aktifkan atau nonaktifkan replikasi sesi otomatis. Pekerjaan cron terkait juga harus diaktifkan.

*Default: `false`*

### `extend_rights_for_coach`

**Memperluas hak untuk pelatih**

Mengaktifkan opsi ini akan memberikan pelatih izin yang sama dengan pelatih pada alat pembuatan konten.

*Default: `false`*

### `hide_courses_in_sessions`

**Sembunyikan daftar kursus dalam sesi**

Saat menampilkan blok sesi di halaman kursus Anda, sembunyikan daftar kursus di dalam sesi tersebut (hanya tampilkan di layar sesi khusus).

*Default: `false`*

### `hide_reporting_session_list`

**Sembunyikan daftar sesi di alat pelaporan**

Sesi yang mencakup kursus terdaftar di alat pelaporan di dalam kursus itu sendiri, yang dapat menambah beban signifikan jika kursus yang sama digunakan dalam ratusan sesi. Opsi ini menghapus daftar tersebut.

*Default: `false`*

### `hide_search_form_in_session_list`

**Sembunyikan formulir pencarian di daftar sesi**

Hapus kolom input pencarian dari tampilan daftar sesi di antarmuka administrasi.

*Default: `false`*

### `hide_session_graph_in_my_progress`

**Sembunyikan grafik sesi di Kemajuan Saya**

Sembunyikan grafik dan visualisasi kemajuan sesi dari halaman Kemajuan Saya di dasbor pembelajar.

*Default: `false`*

### `hide_tab_list`

**Sembunyikan tab di halaman sesi**

Hapus tab navigasi dari halaman detail sesi untuk menyederhanakan antarmuka.

### `limit_session_admin_list_users`

**Admin sesi dilarang mengakses daftar pengguna**

Cegah administrator sesi mengakses daftar pengguna global di antarmuka administrasi.

*Default: `false`*

### `limit_session_admin_role`

**Batasi izin admin sesi**

Jika diaktifkan, administrator sesi hanya akan melihat blok Pengguna dengan opsi 'Tambah pengguna' dan blok Sesi dengan opsi 'Daftar sesi'.

*Default: `false`*

### `my_courses_session_order`

**Ubah pengurutan default sesi di Sesi Saya**

Secara default, sesi diurutkan berdasarkan tanggal mulai. Ubah ini dengan menyediakan array bertipe ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Lihat kursus saya berdasarkan sesi**

Aktifkan halaman tambahan 'Kursus Saya' di mana sesi muncul sebagai bagian dari kursus, bukan sebaliknya.

*Default: `false`*

### `my_progress_session_show_all_courses`

**Kemajuan Saya: tampilkan detail kursus dalam sesi**

Tampilkan semua detail setiap kursus dalam sesi saat mengklik detail sesi.

*Default: `false`*

### `prevent_session_admins_to_manage_all_users`

**Cegah admin sesi mengelola semua pengguna**

Dengan mengaktifkan opsi ini, admin sesi hanya akan dapat melihat pengguna yang mereka buat di halaman administrasi.

*Default: `false`*

---
### `remove_session_url`

**Sembunyikan tautan ke halaman sesi**

Sembunyikan tautan ke halaman sesi dari daftar sesi.

*Default: `false`*


### `session_admins_access_all_content`

**Administrator sesi dapat mengakses semua konten kursus**

Administrator sesi dapat melihat semua konten kursus dalam sesi mereka, termasuk materi yang dibatasi atau diarsipkan.

*Default: `false`*


### `session_admins_edit_courses_content`

**Administrator sesi dapat mengedit konten kursus**

Administrator sesi dapat mengubah konten kursus (dokumen, latihan, alat) dalam kursus yang ditugaskan ke sesi mereka.

*Default: `false`*


### `session_automatic_creation_user_id`

**ID pencipta sesi yang dibuat otomatis**

Tetapkan pengguna yang akan digunakan sebagai pencipta sesi yang dibuat secara otomatis (untuk menghindari penugasan setiap sesi ke pengguna '1' yang sering kali merupakan administrator portal).

*Default: `1`*


### `session_classes_tab_disable`

**Nonaktifkan tab tambah kelas di kursus sesi untuk non-admin**

Nonaktifkan tab untuk menambahkan kelas di kursus sesi bagi pengguna non-admin.

*Default: `false`*


### `session_coach_access_after_duration_end`

**Sesi berdasarkan durasi selalu tersedia untuk pelatih**

Jika tidak, pelatih sesi hanya memiliki akses ke sesi berdasarkan durasi selama durasi aktif.

*Default: `false`*


### `session_course_ordering`

**Pengurutan manual kursus sesi**

Aktifkan opsi ini untuk memungkinkan administrator sesi mengatur urutan kursus di dalam sesi secara manual. Jika dinonaktifkan, kursus diurutkan secara alfabetis berdasarkan judul kursus.

*Default: `false`*


### `session_course_users_subscription_limited_to_session_users`

**Batasi langganan kursus hanya untuk pengguna sesi**

Batasi daftar siswa yang dapat berlangganan di sesi kursus. Dan nonaktifkan pendaftaran untuk pengguna di semua kursus dari halaman Resume Sesi.

*Default: `false`*


### `session_courses_read_only_mode`

**Tetapkan kursus hanya-baca di sesi**

Izinkan pengajar untuk menetapkan beberapa kursus dalam mode hanya-baca saat dibuka melalui sesi. Di properti kursus, centang opsi 'Kunci kursus di sesi'.

*Default: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Tetapkan bidang tambahan wajib di formulir pembuatan sesi**

Wajibkan bidang-bidang yang terdaftar selama pembuatan sesi.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Isi otomatis bidang sesi dengan bidang pengguna**

Array hubungan antara bidang tambahan pengguna dan bidang tambahan sesi, sehingga sesi dapat diisi otomatis dengan data yang sesuai dengan data pengguna.

### `session_days_after_coach_access`

**Jumlah hari akses pelatih default setelah sesi**

Jumlah hari default seorang pelatih dapat mengakses sesinya setelah tanggal akhir sesi resmi.

### `session_days_before_coach_access`

**Jumlah hari akses pelatih default sebelum sesi**

Jumlah hari default seorang pelatih dapat mengakses sesinya sebelum tanggal mulai sesi resmi.

### `session_import_settings`

**Opsi untuk impor sesi**

Array opsi yang diterapkan sebagai parameter default dalam impor sesi CSV/XML.

### `session_list_order`

**Daftar sesi mendukung pengurutan manual**

Aktifkan pengurutan ulang manual sesi di daftar sesi administrasi melalui mekanisme seret-dan-lepaskan atau sejenisnya.

*Default: `false`*


### `session_list_show_count_users`

**Tampilkan jumlah pengguna di daftar sesi**

Admin dapat melihat jumlah pengguna di setiap sesi. Ini menambah beban tambahan pada daftar sesi, jadi jika Anda sering menggunakannya, pertimbangkan dengan cermat apakah Anda menginginkan waktu tunggu ekstra.

*Default: `false`*


### `session_list_view_remaining_days`

**Tampilkan hari tersisa di Halaman Sesi Saya**

Jika diaktifkan, tanggal sesi di halaman "Sesi Saya" akan diganti dengan jumlah hari yang tersisa.

*Default: `false`*


### `session_model_list_field_ordered_by_id`

**Urutkan templat sesi berdasarkan ID di formulir pembuatan sesi**

Urutkan templat sesi berdasarkan ID numerik mereka di dropdown formulir pembuatan sesi, bukan secara alfabetis berdasarkan nama.

*Default: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Cegah pengosongan pengguna yang berlangganan di langganan sesi**

Saat menggunakan langganan banyak peserta ke sesi, cegah perilaku normal yaitu membatalkan langganan pengguna yang tidak ada di panel kanan saat mengklik kirim. Pertahankan semua pengguna di sana.

*Default: `false`*


### `show_all_sessions_on_my_course_page`

**Tampilkan semua sesi di halaman 'Kursus Saya'**

Jika diaktifkan, opsi ini menampilkan semua sesi pengguna dalam tampilan berbasis kalender.

*Default: `true`*


### `show_session_coach`

**Tampilkan pelatih sesi**

Tampilkan nama pelatih sesi global di kotak judul sesi dalam daftar kursus.

*Default: `false`*


### `show_session_data`

**Tampilkan judul data sesi**

Tampilkan komentar data sesi.

*Default: `false`*


### `show_session_description`

**Tampilkan deskripsi sesi**

Tampilkan deskripsi sesi di mana pun opsi ini diterapkan (halaman pelacakan sesi, dll).

*Default: `false`*

---
### `show_simple_session_info`

**Tampilkan informasi sesi sederhana**

Tambahkan pelatih dan tanggal ke subtitle sesi dalam daftar sesi.

*Default: `true`*


### `show_users_in_active_sessions_in_tracking`

**Hanya tampilkan pengguna dari sesi aktif dalam pelacakan**

Tampilkan hanya pengguna dari sesi yang sedang aktif dalam tampilan pelacakan dan laporan peserta didik.

*Default: `false`*


### `tracking_columns`

**Sesuaikan kolom pelacakan kursus-sesi**

Tentukan array kolom untuk laporan berikut: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durasi sesi yang dibuat otomatis**

Durasi (dalam hari) dari sesi yang dibuat otomatis untuk pengguna tunggal. Setelah kedaluwarsa, pengguna tidak dapat mendaftar ke kursus yang sama (tidak ada sesi lain yang dibuat).

*Default: `1095`*


### `user_session_display_mode`

**Mode tampilan Sesi Saya**

Pilih cara halaman "Sesi Saya" ditampilkan: sebagai tampilan blok visual modern (kartu) atau gaya daftar klasik.

*Default: `list`*