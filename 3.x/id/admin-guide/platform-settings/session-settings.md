# Pengaturan Sesi

Nilai bawaan dan perilaku untuk **Sesi** — siklus hidup sesi, jendela akses tutor, visibilitas kursus dalam sesi, dan sejenisnya.

Akses pengaturan ini di **Administration > Configuration settings > Sessions**. Kategori ini berisi **68 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `add_users_by_coach`

**Izinkan tutor mendaftarkan pengguna**

Tutor dapat membuat pengguna di platform dan mendaftarkan pengguna ke suatu sesi.

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

**Izinkan tutor mengedit di dalam sesi kursus**

Izinkan tutor mengedit di dalam sesi kursus

*Default: `true`*

### `allow_delete_user_for_session_admin`

**Admin sesi dapat menghapus pengguna**

Administrator sesi dapat menghapus pengguna dari platform saat mengelola sesi mereka.

*Default: `false`*


### `allow_disable_user_for_session_admin`

**Admin sesi dapat menonaktifkan pengguna**

Administrator sesi dapat menonaktifkan akun pengguna untuk mencegah login sambil tetap mempertahankan catatan pendaftaran dalam sesi mereka.

*Default: `false`*


### `allow_edit_tool_visibility_in_session`

**Izinkan pengeditan visibilitas alat dalam sesi**

Saat menggunakan sesi, perilaku bawaan adalah menggunakan visibilitas alat yang ditentukan di kursus dasar. Pengaturan ini mengubah hal tersebut agar tutor dalam kursus sesi dapat menyesuaikan visibilitas alat sesuai kebutuhan mereka.

*Default: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Alihkan ke sesi setelah pendaftaran di halaman 'About' sesi**

Secara otomatis alihkan pengguna baru ke halaman sesi mereka setelah mereka menyelesaikan pendaftaran melalui halaman About suatu sesi.

*Default: `false`*


### `allow_search_diagnostic`

**Aktifkan diagnosis pencarian sesi**

Izinkan tutor mendapatkan diagnosis yang memungkinkan mereka mencari sesi terbaik untuk peserta didik.

*Default: `false`*


### `allow_session_admin_extra_access`

**Admin sesi dapat mengakses impor, pembaruan, dan ekspor pengguna secara batch**

Administrator sesi dapat mengakses fungsi impor, pembaruan, dan ekspor pengguna secara batch selain izin standar mereka.

*Default: `false`*


### `allow_session_admin_login_as_teacher`

**Admin sesi dapat 'login as' pengajar**

Administrator sesi dapat menyamar sebagai akun pengajar untuk meninjau konten kursus dan pengalaman siswa dalam sesi mereka.

*Default: `false`*


### `allow_session_admin_read_careers`

**Admin sesi dapat melihat karier**

[inferred] Administrator sesi dapat melihat dan mengakses jalur karier serta alur kerja promosi yang terkait dengan sesi yang mereka kelola.

*Default: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Izinkan administrator sesi melihat semua sesi**

Jika opsi ini tidak diaktifkan (bawaan), administrator sesi hanya dapat melihat sesi yang mereka buat. Hal ini membingungkan dalam lingkungan terbuka di mana administrator sesi mungkin perlu berbagi waktu dukungan antara dua sesi.

*Default: `false`*

### `allow_session_course_copy_for_teachers`

**Izinkan salin sesi-ke-sesi untuk pengajar**

Aktifkan opsi ini agar pengajar dapat menyalin konten mereka dari satu kursus dalam suatu sesi ke kursus di sesi lain. Secara bawaan, opsi ini hanya tersedia bagi administrator platform.

*Default: `false`*

### `allow_teachers_to_create_sessions`

**Izinkan pengajar membuat sesi**

Pengajar dapat membuat, mengedit, dan menghapus sesi mereka sendiri.

*Default: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutor dapat menugaskan siswa ke sesi**

Jika diaktifkan, tutor kursus dalam sesi dapat mendaftarkan pengguna baru ke sesi mereka. Opsi ini selain itu hanya tersedia bagi administrator dan administrator sesi.

*Default: `false`*

### `allow_user_session_collapsable`

**Izinkan pengguna menciutkan sesi di My sessions**

Pengguna dapat menciutkan kartu atau grup sesi di halaman My sessions untuk mengurangi kekacauan visual dan meningkatkan navigasi.

*Default: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Pengajar kursus dasar dapat melihat tugas dari semua sesi**

Tampilkan semua publikasi peserta didik (dari kursus dasar dan dari semua sesi) di halaman work/pending.php pada kursus dasar.

*Default: `false`*

### `career_diagram_disclaimer`

**Tampilkan pernyataan penafian di bawah diagram karier**

Tambahkan pernyataan penafian di bawah diagram karier. Variabel bahasa bernama 'Career diagram disclaimer' harus ada di sub-bahasa Anda.

*Default: `false`*

### `career_diagram_legend`

**Tampilkan legenda di bawah diagram karier**

Tambahkan legenda karier di bawah diagram karier. Variabel bahasa bernama 'Career diagram legend' harus ada di sub-bahasa Anda.

*Default: `false`*

### `courses_list_session_title_link`

**Jenis tautan untuk judul sesi**

Pada halaman kursus/sesi, judul sesi dapat berupa salah satu dari berikut: 0 = tanpa tautan (sembunyikan judul sesi) ; 1 = tautkan judul ke halaman sesi khusus ; 2 = tautkan ke kursus jika hanya ada satu kursus ; 3 = judul sesi membuat daftar kursus dapat dilipat ; 4 = tanpa tautan (tampilkan judul sesi).

*Default: `1`*

### `default_session_list_view`

**Tampilan daftar sesi default**

Pilih tab default yang ingin Anda lihat saat membuka daftar sesi sebagai admin.

*Default: `all`*


### `drh_can_access_all_session_content`

**Direktur SDM mengakses semua konten sesi**

Jika diaktifkan, direktur sumber daya manusia akan mendapatkan akses ke semua konten dan pengguna dari sesi yang diikutinya.

*Default: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Aktifkan penyalinan konten khusus sesi ke sesi lain**

Memungkinkan duplikasi sumber daya yang dibuat dalam sesi saat menduplikasi sesi.

*Default: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Tambahkan tautan atur ulang kata sandi ke notifikasi e-mail langganan ke sesi**

Sertakan tautan atur ulang kata sandi dalam e-mail konfirmasi langganan yang dikirim kepada pengguna saat mereka didaftarkan ke suatu sesi.

*Default: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Tambahkan nama pengguna ke notifikasi e-mail langganan ke sesi**

Sertakan nama pengguna dalam e-mail konfirmasi langganan yang dikirim saat mereka didaftarkan ke suatu sesi.

*Default: `false`*


### `enable_auto_reinscription`

**Aktifkan Pendaftaran Ulang Otomatis**

Aktifkan atau nonaktifkan pendaftaran ulang otomatis ketika masa berlaku kursus berakhir. Cron job terkait juga harus diaktifkan.

*Default: `false`*


### `enable_session_replication`

**Aktifkan Replikasi Sesi**

Aktifkan atau nonaktifkan replikasi sesi otomatis. Cron job terkait juga harus diaktifkan.

*Default: `false`*


### `extend_rights_for_coach`

**Perluas hak untuk tutor**

Aktifkan opsi ini untuk memberikan tutor izin yang sama dengan pelatih pada alat penyusunan konten

*Default: `false`*

### `hide_courses_in_sessions`

**Sembunyikan daftar kursus dalam sesi**

Saat menampilkan blok sesi di halaman kursus Anda, sembunyikan daftar kursus di dalam sesi tersebut (hanya tampilkan di dalam layar sesi tertentu).

*Default: `false`*

### `hide_reporting_session_list`

**Sembunyikan daftar sesi di alat pelaporan**

Sesi yang mencakup kursus tercantum di alat pelaporan di dalam kursus itu sendiri, yang dapat menambah beban yang cukup besar jika kursus yang sama digunakan dalam ratusan sesi. Opsi ini menghapus daftar tersebut.

*Default: `false`*


### `hide_search_form_in_session_list`

**Sembunyikan formulir pencarian di daftar sesi**

Hapus kolom input pencarian dari tampilan daftar sesi di antarmuka administrasi.

*Default: `false`*


### `hide_session_graph_in_my_progress`

**Sembunyikan bagan sesi di Kemajuan saya**

Sembunyikan bagan kemajuan sesi dan visualisasi dari halaman Kemajuan saya di dasbor peserta didik.

*Default: `false`*


### `hide_tab_list`

**Sembunyikan tab pada halaman sesi**

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

**Ubah pengurutan default sesi di Sesi saya**

Secara default, sesi diurutkan berdasarkan tanggal mulai. Ubah ini dengan menyediakan array bertipe ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Lihat kursus saya berdasarkan sesi**

Aktifkan halaman 'Kursus saya' tambahan di mana sesi muncul sebagai bagian dari kursus, bukan sebaliknya.

*Default: `false`*

### `my_progress_session_show_all_courses`

**Kemajuan saya: tampilkan detail kursus dalam sesi**

Tampilkan semua detail setiap kursus dalam sesi saat mengklik detail sesi.

*Default: `false`*


### `prevent_session_admins_to_manage_all_users`

**Cegah admin sesi mengelola semua pengguna**

Dengan mengaktifkan opsi ini, admin sesi hanya akan dapat melihat, di halaman administrasi, pengguna yang mereka buat.

*Default: `false`*

### `remove_session_url`

**Sembunyikan tautan ke halaman sesi**

Sembunyikan tautan ke halaman sesi dari daftar sesi.

*Default: `false`*


### `session_admins_access_all_content`

**Admin sesi dapat mengakses semua konten kursus**

Administrator sesi dapat melihat semua konten kursus dalam sesi mereka, termasuk materi yang dibatasi atau diarsipkan.

*Default: `false`*

### `session_admins_edit_courses_content`

**Admin sesi dapat mengedit konten kursus**

Administrator sesi dapat mengubah konten kursus (dokumen, latihan, alat) pada kursus yang ditetapkan ke sesi mereka.

*Default: `false`*

### `session_automatic_creation_user_id`

**ID pembuat sesi yang dibuat otomatis**

Tetapkan pengguna yang akan digunakan sebagai pembuat sesi yang dibuat secara otomatis (untuk menghindari penetapan setiap sesi ke pengguna '1' yang sering kali adalah administrator portal).

*Default: `1`*


### `session_classes_tab_disable`

**Nonaktifkan penambahan kelas di kursus sesi untuk non-admin**

Nonaktifkan tab untuk menambahkan kelas di kursus sesi bagi non-admin.

*Default: `false`*


### `session_coach_access_after_duration_end`

**Sesi berdasarkan durasi selalu tersedia bagi tutor**

Jika tidak, tutor sesi hanya memiliki akses ke sesi berdasarkan durasi selama durasi aktif.

*Default: `false`*


### `session_course_ordering`

**Pengurutan manual kursus sesi**

Aktifkan opsi ini untuk memungkinkan administrator sesi mengurutkan kursus di dalam sesi secara manual. Jika dinonaktifkan, kursus diurutkan secara alfabetis berdasarkan judul kursus.

*Default: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Batasi langganan ke kursus hanya untuk pengguna sesi**

Batasi daftar siswa yang dapat dilanggankan ke sesi kursus. Dan nonaktifkan pendaftaran pengguna di semua kursus dari halaman Resume Session.

*Default: `false`*


### `session_courses_read_only_mode`

**Tetapkan kursus hanya-baca dalam sesi**

Izinkan pengajar menetapkan beberapa kursus dalam mode hanya-baca ketika dibuka melalui sesi. Di properti kursus, centang opsi 'Lock course in session'.

*Default: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Tetapkan bidang tambahan wajib pada formulir pembuatan sesi**

Wajibkan bidang yang tercantum selama pembuatan sesi.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Isi otomatis bidang sesi dengan bidang pengguna**

Array relasi antara bidang tambahan pengguna dan bidang tambahan sesi, sehingga sesi dapat diisi otomatis dengan data yang sesuai dengan data pengguna.

### `session_days_after_coach_access`

**Hari akses tutor default setelah sesi**

Jumlah hari default seorang tutor dapat mengakses sesi setelah tanggal berakhir resmi sesi

### `session_days_before_coach_access`

**Hari akses tutor default sebelum sesi**

Jumlah hari default seorang tutor dapat mengakses sesi sebelum tanggal mulai resmi sesi

### `session_import_settings`

**Opsi untuk impor sesi**

Array opsi yang diterapkan sebagai parameter default pada impor sesi CSV/XML.

### `session_list_order`

**Sesi mendukung pengurutan manual**

Aktifkan pengurutan ulang manual sesi pada daftar sesi administrasi melalui seret-dan-lepas atau mekanisme serupa.

*Default: `false`*


### `session_list_show_count_users`

**Tampilkan jumlah pengguna pada daftar sesi**

Admin dapat melihat jumlah pengguna di setiap sesi. Ini menambah beban pada daftar sesi, jadi jika Anda sering menggunakannya, pertimbangkan dengan saksama apakah Anda menginginkan waktu tunggu tambahan tersebut.

*Default: `false`*


### `session_list_view_remaining_days`

**Tampilkan sisa hari di Sesi Saya**

Jika diaktifkan, tanggal sesi pada halaman "My Sessions" akan diganti dengan jumlah sisa hari.

*Default: `false`*

### `session_model_list_field_ordered_by_id`

**Urutkan templat sesi berdasarkan id pada formulir pembuatan sesi**

[inferred] Urutkan templat sesi berdasarkan ID numeriknya pada dropdown formulir pembuatan sesi, bukan secara alfabetis berdasarkan nama.

*Default: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Cegah pengosongan pengguna yang dilanggankan pada langganan sesi**

Saat menggunakan langganan beberapa pembelajar ke suatu sesi, cegah perilaku normal yang membatalkan langganan pengguna yang tidak berada di panel kanan saat mengklik kirim. Pertahankan semua pengguna di sana.

*Default: `false`*


### `show_all_sessions_on_my_course_page`

**Tampilkan semua sesi pada halaman 'Kursus saya'**

Jika diaktifkan, opsi ini menampilkan semua sesi pengguna dalam tampilan berbasis kalender.

*Default: `true`*


### `show_session_coach`

**Tampilkan tutor sesi**

Tampilkan nama tutor sesi umum pada kotak judul sesi di daftar kursus

*Default: `false`*

### `show_session_data`

**Tampilkan judul data sesi**

Tampilkan komentar data sesi

*Default: `false`*

### `show_session_description`

**Tampilkan deskripsi sesi**

Tampilkan deskripsi sesi di mana pun opsi ini diimplementasikan (halaman pelacakan sesi, dll.)

*Default: `false`*

### `show_simple_session_info`

**Tampilkan info sesi sederhana**

Tambahkan tutor dan tanggal ke subtitle sesi dalam daftar sesi.

*Default: `true`*


### `show_users_in_active_sessions_in_tracking`

**Hanya tampilkan pengguna dari sesi aktif dalam pelacakan**

Tampilkan hanya pengguna dari sesi yang sedang aktif dalam tampilan pelacakan dan pelaporan peserta didik.

*Default: `false`*


### `tracking_columns`

**Sesuaikan kolom pelacakan kursus-sesi**

Tentukan array kolom untuk laporan berikut: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durasi sesi yang dibuat otomatis**

Durasi (dalam hari) sesi pengguna tunggal yang dibuat otomatis. Setelah kedaluwarsa, pengguna tidak dapat mendaftar ke kursus yang sama (tidak ada sesi lain yang dibuat).

*Default: `1095`*


### `user_session_display_mode`

**Mode tampilan Sesi Saya**

Pilih cara halaman "Sesi Saya" ditampilkan: sebagai tampilan blok visual modern (kartu) atau gaya daftar klasik.

*Default: `list`*