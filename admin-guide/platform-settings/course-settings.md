# Pengaturan Kursus

Pengaturan bawaan dan kebijakan yang berlaku untuk kursus di seluruh platform — visibilitas, hak pembuatan, alat yang diizinkan, izin peserta didik, dan sejenisnya.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Kursus**. Kategori ini berisi **45 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `active_tools_on_create`

**Alat aktif saat pembuatan kursus**

Pilih alat yang akan *aktif* setelah pembuatan kursus.

*Default:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Gunakan kategori kursus dari URL utama**

Dalam pengaturan multi-URL, izinkan admin dan pengajar untuk menetapkan kategori dari URL utama ke kursus di URL anak.

*Default: `false`*

### `allow_course_theme`

**Izinkan tema kursus**

Mengizinkan tema grafis kursus dan memungkinkan untuk mengubah stylesheet yang digunakan oleh kursus ke salah satu stylesheet yang tersedia di Chamilo. Ketika pengguna masuk ke kursus, stylesheet kursus akan memiliki prioritas atas stylesheet pengguna sendiri dan stylesheet bawaan platform.

*Default: `true`*

### `allow_public_course_with_no_terms_conditions`

**Akses kursus publik dengan syarat dan ketentuan**

Dengan opsi ini diaktifkan, jika kursus memiliki visibilitas publik dan syarat serta ketentuan, syarat tersebut akan dinonaktifkan selama kursus bersifat publik.

*Default: `false`*

### `block_registered_users_access_to_open_course_contents`

**Blokir akses kursus publik untuk pengguna terautentikasi**

Hanya tampilkan kursus publik. Jangan izinkan pengguna terdaftar untuk mengakses kursus dengan visibilitas 'terbuka' kecuali mereka berlangganan ke masing-masing kursus tersebut.

*Default: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb halaman utama kursus**

Breadcrumb adalah sistem navigasi tautan horizontal yang biasanya berada di kiri atas halaman Anda. Opsi ini memilih apa yang ingin Anda tampilkan di breadcrumb pada halaman utama kursus.

*Default: `course_title`*

### `course_about_teacher_name_hide`

**Sembunyikan informasi pengajar kursus di halaman detail kursus**

Pada halaman detail kursus, sembunyikan informasi pengajar.

*Default: `false`*

### `course_category_code_to_use_as_model`

**Batasi templat kursus ke satu kategori kursus**

Berikan kode kategori untuk digunakan sebagai templat kursus. Hanya kursus tersebut yang akan muncul di dropdown saat pembuatan kursus, dan pengguna tidak akan melihat kursus dalam kategori ini dari katalog kursus.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Bidang tambahan untuk ditampilkan di pengaturan kursus**

Bidang yang didefinisikan dalam array ini akan muncul di halaman pengaturan kursus.

### `course_creation_by_teacher_extra_fields_to_show`

**Bidang tambahan untuk ditampilkan pada formulir pembuatan kursus**

Bidang yang didefinisikan dalam array ini akan muncul sebagai bidang tambahan di formulir pembuatan kursus.

### `course_creation_donate_link`

**Tautan donasi di halaman pembuatan kursus**

Halaman yang harus ditautkan oleh pesan donasi (URL lengkap).

### `course_creation_donate_message_show`

**Tampilkan pesan donasi di halaman pembuatan kursus**

Tambahkan kotak pesan di halaman pembuatan kursus untuk pengajar, meminta mereka untuk menyumbang ke proyek.

*Default: `false`*

### `course_creation_form_hide_course_code`

**Hapus bidang kode kursus dari formulir pembuatan kursus**

Jika tidak disediakan, kode kursus dihasilkan secara bawaan berdasarkan judul kursus, jadi aktifkan opsi ini untuk menghapus bidang kode dari formulir pembuatan kursus sepenuhnya.

*Default: `false`*

### `course_creation_form_set_course_category_mandatory`

**Jadikan kategori kursus wajib**

Saat membuat kursus, jadikan kategori kursus sebagai pengaturan yang wajib.

*Default: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Bidang tambahan yang wajib di formulir pembuatan kursus**

Bidang yang didefinisikan dalam array ini akan menjadi wajib di formulir pembuatan kursus.

### `course_creation_splash_screen`

**Layar pembuka untuk kursus**

Tampilkan layar pembuka saat membuat kursus baru.

*Default: `true`*

---
### `course_creation_use_template`

**Gunakan kursus templat untuk kursus baru**

Atur ini untuk menggunakan kursus templat yang sama (diidentifikasi oleh ID numerik kursus di basis data) untuk semua kursus baru yang akan dibuat di platform. Harap diperhatikan bahwa, jika tidak direncanakan dengan baik, pengaturan ini dapat memiliki dampak besar pada penggunaan ruang penyimpanan. Kursus templat akan digunakan seolah-olah pengajar melakukan salinan kursus dengan alat cadangan kursus, sehingga konten pengguna tidak disalin, hanya materi pengajar. Semua aturan cadangan kursus lainnya berlaku. Biarkan kosong (atau atur ke 0) untuk menonaktifkan.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Isi otomatis bidang kursus dengan bidang dari pengguna**

Jika tidak kosong, proses pembuatan kursus akan mencari beberapa bidang di profil pengguna dan mengisi otomatis bidang tersebut untuk kursus. Misalnya, seorang pengajar yang berspesialisasi dalam pemasaran digital dapat secara otomatis menetapkan tanda « pemasaran digital » pada setiap kursus yang dibuatnya.

### `course_hide_tools`

**Sembunyikan alat dari pengajar**

Centang alat yang ingin Anda sembunyikan dari pengajar. Ini akan melarang akses ke alat tersebut.

### `course_images_in_courses_list`

**Ikon khusus kursus**

Gunakan gambar kursus sebagai ikon kursus dalam daftar kursus (bukan ikon papan tulis hijau default).

*Default: `true`*

### `course_log_default_extra_fields`

**Bidang tambahan pengguna secara default di halaman statistik kursus**

Konfigurasikan array ini dengan ID internal dari bidang tambahan yang ingin Anda tampilkan secara default di halaman statistik kursus utama.

### `course_log_hide_columns`

**Sembunyikan kolom dari log kursus**

Array ini memberi Anda kemungkinan untuk mengatur kolom mana yang akan disembunyikan di halaman statistik kursus utama dan di laporan total waktu.

### `course_sequence_valid_only_in_same_session`

**Validasi prasyarat hanya dalam sesi yang sama**

Ketika diaktifkan, sebuah kursus akan dianggap tervalidasi hanya jika lulus dalam sesi saat ini. Jika dinonaktifkan, kursus yang lulus di sesi lain juga akan membuka kursus yang bergantung padanya.

*Default: `false`*

### `course_student_info`

**Tampilan informasi siswa kursus**

Di halaman ‘Kursus Saya’/’Sesi Saya’, tampilkan informasi tambahan mengenai skor, kemajuan, dan/atau perolehan sertifikat oleh siswa.

### `course_validation`

**Validasi kursus**

Ketika fitur 'Validasi Kursus' diaktifkan, seorang pengajar tidak dapat membuat kursus sendirian. Dia mengisi permintaan kursus. Administrator platform meninjau permintaan tersebut dan menyetujui atau menolaknya.<br />Fitur ini bergantung pada pengiriman pesan email otomatis; atur Chamilo untuk mengakses server email dan menggunakan akun email khusus.

*Default: `false`*

### `course_validation_terms_and_conditions_url`

**Validasi kursus - tautan ke syarat dan ketentuan**

Ini adalah URL ke dokumen 'Syarat dan Ketentuan' yang berlaku untuk membuat permintaan kursus. Jika alamat ini diatur di sini, pengguna harus membaca dan menyetujui syarat dan ketentuan ini sebelum mengirim permintaan kursus.<br />Jika Anda mengaktifkan modul 'Syarat dan Ketentuan' Chamilo dan ingin URL-nya digunakan, maka biarkan pengaturan ini kosong.

### `courses_default_creation_visibility`

**Visibilitas kursus default**

Visibilitas kursus default saat membuat kursus baru

*Default: `2`*

### `display_coursecode_in_courselist`

**Tampilkan Kode Kursus di nama kursus**

Tampilkan Kode Kursus dalam daftar kursus

*Default: `false`*

### `display_teacher_in_courselist`

**Tampilkan pengajar di nama kursus**

Tampilkan pengajar dalam daftar kursus

*Default: `true`*

### `enable_tool_introduction`

**Aktifkan pengenalan alat**

Aktifkan pengenalan di beranda setiap alat

*Default: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Tampilkan tombol berhenti berlangganan di ‘Kursus Saya’**

Tambahkan tombol untuk berhenti berlangganan dari kursus di halaman ‘Kursus Saya’.

*Default: `false`*

### `example_material_course_creation`

**Materi contoh saat pembuatan kursus**

Buat materi contoh secara otomatis saat membuat kursus baru

*Default: `true`*

### `hide_course_rating`

**Sembunyikan peringkat kursus**

Fitur peringkat kursus tersedia secara default di berbagai tempat. Jika Anda tidak menginginkannya, aktifkan opsi ini.

*Default: `false`*

### `hide_course_sidebar`

**Sembunyikan blok kursus di bilah sisi**

Saat berada di layar di mana menu kiri terlihat, jangan tampilkan bagian « Kursus ».

*Default: `true`*

### `multiple_access_url_show_shared_course_marker`

**Tampilkan penanda kursus bersama multi-URL**

Tambahkan ikon tautan ke kursus yang dibagikan antar URL, sehingga pengguna (khususnya pengajar) tahu bahwa mereka harus berhati-hati saat mengedit konten kursus.

*Default: `false`*

### `my_courses_show_courses_in_user_language_only`

**Hanya tampilkan kursus dalam bahasa pengguna**

Jika diaktifkan, opsi ini akan menyembunyikan semua kursus yang tidak diatur dalam bahasa pengguna.

*Default: `false`*

---
### `profiling_filter_adding_users`

**Filter pengguna berdasarkan bidang profil saat pendaftaran ke kursus**

Izinkan pengajar untuk memfilter pengguna berdasarkan bidang tambahan pada halaman untuk mendaftarkan pengguna ke kursus mereka.

*Default: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Tampilkan ketergantungan di pengantar kursus**

Saat menggunakan pengurutan sumber daya dengan kursus atau sesi, tampilkan ketergantungan kursus di halaman utama kursus.

*Default: `false`*


### `scorm_cumulative_session_time`

**Waktu sesi kumulatif untuk SCORM**

Ketika diaktifkan, waktu sesi untuk Jalur Pembelajaran SCORM akan bersifat kumulatif, jika tidak, waktu tersebut hanya akan dihitung dari waktu pembaruan terakhir. Ini adalah pengaturan global. Pengaturan ini digunakan saat membuat Jalur Pembelajaran baru tetapi kemudian dapat didefinisikan ulang untuk masing-masing.

*Default: `true`*


### `send_email_to_admin_when_create_course`

**Peringatan email saat pembuatan kursus**

Kirim email ke administrator platform setiap kali seorang pengajar membuat kursus baru.

*Default: `false`*


### `show_course_duration`

**Tampilkan durasi kursus**

Tampilkan durasi kursus di samping judul kursus di katalog kursus dan daftar kursus.

*Default: `false`*


### `show_navigation_menu`

**Tampilkan menu navigasi kursus**

Tampilkan menu navigasi yang mempercepat akses ke alat-alat.

*Default: `false`*


### `show_toolshortcuts`

**Pintasan alat**

Tampilkan pintasan alat di banner?

*Default: `false`*


### `student_view_enabled`

**Aktifkan tampilan pembelajar**

Aktifkan tampilan pembelajar, yang memungkinkan pengajar atau admin untuk melihat kursus sebagaimana yang dilihat oleh pembelajar.

*Default: `true`*


### `view_grid_courses`

**Lihat kursus dalam tata letak grid**

Lihat kursus dalam tata letak dengan beberapa kursus per baris. Jika tidak, tata letak akan menunjukkan satu kursus per baris.

*Default: `true`*