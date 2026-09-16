# Pengaturan Kursus

Nilai bawaan dan kebijakan yang berlaku untuk kursus di seluruh platform — visibilitas, hak pembuatan, alat yang diizinkan, izin peserta didik, dan sejenisnya.

Akses pengaturan ini di bawah **Administration > Configuration settings > Course**. Kategori ini berisi **45 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `active_tools_on_create`

**Alat aktif saat pembuatan kursus**

Pilih alat yang akan *aktif* setelah pembuatan suatu kursus.

*Default:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Gunakan kategori kursus dari URL teratas**

Dalam pengaturan multi-URL, izinkan administrator dan pengajar untuk menetapkan kategori dari URL teratas ke kursus di URL anak.

*Default: `false`*

### `allow_course_theme`

**Izinkan tema kursus**

Mengizinkan tema grafis kursus dan memungkinkan perubahan style sheet yang digunakan oleh suatu kursus ke salah satu style sheet yang tersedia di Chamilo. Ketika seorang pengguna memasuki kursus, style sheet kursus akan memiliki prioritas di atas style sheet milik pengguna dan style sheet bawaan platform.

*Default: `true`*

### `allow_public_course_with_no_terms_conditions`

**Akses kursus publik dengan syarat dan ketentuan**

Dengan opsi ini diaktifkan, jika suatu kursus memiliki visibilitas publik serta syarat dan ketentuan, syarat tersebut dinonaktifkan selama kursus bersifat publik.

*Default: `false`*

### `block_registered_users_access_to_open_course_contents`

**Blokir akses kursus publik bagi pengguna terautentikasi**

Hanya tampilkan kursus publik. Jangan izinkan pengguna terdaftar mengakses kursus dengan visibilitas 'open' kecuali mereka telah berlangganan ke masing-masing kursus tersebut.

*Default: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb beranda kursus**

Breadcrumb adalah sistem navigasi tautan horizontal yang biasanya berada di kiri atas halaman Anda. Opsi ini memilih apa yang ingin Anda tampilkan di breadcrumb pada beranda kursus

*Default: `course_title`*

### `course_about_teacher_name_hide`

**Sembunyikan info pengajar kursus pada halaman detail kursus**

Pada halaman detail kursus, sembunyikan informasi pengajar.

*Default: `false`*

### `course_category_code_to_use_as_model`

**Batasi templat kursus ke satu kategori kursus**

Berikan kode kategori untuk digunakan sebagai templat kursus. Hanya kursus-kursus tersebut yang akan ditampilkan di menu tarik-turun saat pembuatan kursus, dan pengguna tidak akan melihat kursus dalam kategori ini dari katalog kursus.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Bidang tambahan yang ditampilkan di pengaturan kursus**

Bidang yang didefinisikan dalam array ini akan muncul pada halaman pengaturan kursus.

### `course_creation_by_teacher_extra_fields_to_show`

**Bidang tambahan yang ditampilkan pada formulir pembuatan kursus**

Bidang yang didefinisikan dalam array ini akan muncul sebagai bidang tambahan dalam formulir pembuatan kursus.

### `course_creation_donate_link`

**Tautan donasi pada halaman pembuatan kursus**

Halaman yang harus ditautkan oleh pesan donasi (URL lengkap).

### `course_creation_donate_message_show`

**Tampilkan pesan donasi pada halaman pembuatan kursus**

Tambahkan kotak pesan pada halaman pembuatan kursus untuk pengajar, yang meminta mereka untuk berdonasi kepada proyek.

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

**Bidang tambahan yang wajib pada formulir pembuatan kursus**

Bidang yang didefinisikan dalam array ini akan menjadi wajib dalam formulir pembuatan kursus.

### `course_creation_splash_screen`

**Layar splash untuk kursus**

Tampilkan layar splash saat membuat kursus baru.

*Default: `true`*

### `course_creation_use_template`

**Gunakan kursus templat untuk kursus baru**

Atur ini untuk menggunakan kursus templat yang sama (diidentifikasi dengan ID numerik kursus di basis data) bagi semua kursus baru yang akan dibuat di platform. Harap dicatat bahwa, jika tidak direncanakan dengan baik, pengaturan ini dapat berdampak besar pada penggunaan ruang. Kursus templat akan digunakan seolah-olah pengajar melakukan salinan kursus dengan alat cadangan kursus, sehingga konten pengguna tidak disalin, hanya materi pengajar. Semua aturan cadangan kursus lainnya berlaku. Biarkan kosong (atau atur ke 0) untuk menonaktifkan.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Isi otomatis bidang kursus dengan bidang dari pengguna**

Jika tidak kosong, proses pembuatan kursus akan mencari beberapa bidang di profil pengguna dan mengisinya secara otomatis untuk kursus. Misalnya, pengajar yang mengkhususkan diri dalam pemasaran digital dapat secara otomatis menetapkan bendera « pemasaran digital » pada setiap kursus yang (s)ia buat.

### `course_hide_tools`

**Sembunyikan alat dari pengajar**

Centang alat yang ingin Anda sembunyikan dari pengajar. Ini akan melarang akses ke alat tersebut.

### `course_images_in_courses_list`

**Ikon kustom kursus**

Gunakan gambar kursus sebagai ikon kursus dalam daftar kursus (sebagai pengganti ikon papan tulis hijau bawaan).

*Default: `true`*

### `course_log_default_extra_fields`

**Bidang ekstra pengguna secara default di halaman statistik kursus**

Konfigurasikan array ini dengan ID internal bidang ekstra yang ingin Anda tampilkan secara default di halaman statistik kursus utama.

### `course_log_hide_columns`

**Sembunyikan kolom dari log kursus**

Array ini memberi Anda kemungkinan untuk mengonfigurasi kolom mana yang disembunyikan di halaman statistik kursus utama dan di laporan waktu total.

### `course_sequence_valid_only_in_same_session`

**Validasi prasyarat hanya dalam sesi yang sama**

Jika diaktifkan, suatu kursus akan dianggap tervalidasi hanya jika lulus dalam sesi saat ini. Jika dinonaktifkan, kursus yang lulus di sesi lain juga akan membuka kursus yang bergantung.

*Default: `false`*


### `course_student_info`

**Tampilan info mahasiswa kursus**

Pada halaman ‘Kursus saya’/’Sesi saya’, tampilkan informasi tambahan mengenai skor, kemajuan, dan/atau perolehan sertifikat oleh mahasiswa.

### `course_validation`

**Validasi kursus**

Ketika fitur 'Validasi kursus' diaktifkan, pengajar tidak dapat membuat kursus sendirian. Ia mengisi permintaan kursus. Administrator platform meninjau permintaan tersebut dan menyetujuinya atau menolaknya.<br />Fitur ini mengandalkan pesan e-mail otomatis; atur Chamilo untuk mengakses server e-mail dan menggunakan akun e-mail khusus.

*Default: `false`*


### `course_validation_terms_and_conditions_url`

**Validasi kursus - tautan ke syarat dan ketentuan**

Ini adalah URL ke dokumen 'Syarat dan Ketentuan' yang berlaku untuk membuat permintaan kursus. Jika alamat diatur di sini, pengguna harus membaca dan menyetujui syarat dan ketentuan ini sebelum mengirim permintaan kursus.<br />Jika Anda mengaktifkan modul 'Syarat dan Ketentuan' Chamilo dan ingin URL-nya digunakan, biarkan pengaturan ini kosong.

### `courses_default_creation_visibility`

**Visibilitas kursus default**

Visibilitas kursus default saat membuat kursus baru

*Default: `2`*


### `display_coursecode_in_courselist`

**Tampilkan Kode dalam nama Kursus**

Tampilkan Kode Kursus dalam daftar kursus

*Default: `false`*


### `display_teacher_in_courselist`

**Tampilkan pengajar dalam nama kursus**

Tampilkan pengajar dalam daftar kursus

*Default: `true`*


### `enable_tool_introduction`

**Aktifkan pengantar alat**

Aktifkan pengantar pada beranda setiap alat

*Default: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Tampilkan tombol berhenti berlangganan di ‘Kursus saya’**

Tambahkan tombol untuk berhenti berlangganan dari suatu kursus pada halaman ‘Kursus saya’.

*Default: `false`*

### `example_material_course_creation`

**Materi contoh saat pembuatan kursus**

Buat materi contoh secara otomatis saat membuat kursus baru

*Default: `true`*


### `hide_course_rating`

**Sembunyikan penilaian kursus**

Fitur penilaian kursus muncul secara default di berbagai tempat. Jika Anda tidak menginginkannya, aktifkan opsi ini.

*Default: `false`*

### `hide_course_sidebar`

**Sembunyikan blok kursus di bilah sisi**

Pada layar di mana menu kiri terlihat, jangan tampilkan bagian « Kursus ».

*Default: `true`*

### `multiple_access_url_show_shared_course_marker`

**Tampilkan penanda kursus bersama multi-URL**

Menambahkan ikon tautan pada kursus yang dibagikan antar URL, sehingga pengguna (khususnya pengajar) tahu bahwa mereka harus berhati-hati khusus saat mengedit konten kursus.

*Default: `false`*

### `my_courses_show_courses_in_user_language_only`

**Hanya tampilkan kursus dalam bahasa pengguna**

Jika diaktifkan, opsi ini akan menyembunyikan semua kursus yang tidak diatur dalam bahasa pengguna.

*Default: `false`*

### `profiling_filter_adding_users`

**Saring pengguna berdasarkan bidang profil saat berlangganan ke kursus**

Izinkan pengajar menyaring pengguna berdasarkan bidang tambahan pada halaman untuk mendaftarkan pengguna ke kursus mereka.

*Default: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Tampilkan dependensi di pengantar kursus**

Saat menggunakan pengurutan sumber daya dengan kursus atau sesi, tampilkan dependensi kursus di beranda kursus.

*Default: `false`*

### `scorm_cumulative_session_time`

**Waktu sesi kumulatif untuk SCORM**

Jika diaktifkan, waktu sesi untuk Learning Path SCORM akan bersifat kumulatif; jika tidak, waktu hanya dihitung dari waktu pembaruan terakhir. Ini adalah pengaturan global. Digunakan saat membuat Learning Path baru, tetapi kemudian dapat didefinisikan ulang untuk masing-masing Learning Path.

*Default: `true`*


### `send_email_to_admin_when_create_course`

**Peringatan e-mail saat pembuatan kursus**

Kirim email kepada administrator platform setiap kali pengajar membuat kursus baru

*Default: `false`*


### `show_course_duration`

**Tampilkan durasi kursus**

Tampilkan durasi kursus di samping judul kursus dalam katalog kursus dan daftar kursus.

*Default: `false`*

### `show_navigation_menu`

**Tampilkan menu navigasi kursus**

Tampilkan menu navigasi yang mempercepat akses ke alat

*Default: `false`*


### `show_toolshortcuts`

**Pintasan alat**

Tampilkan pintasan alat di banner?

*Default: `false`*

### `student_view_enabled`

**Aktifkan tampilan pembelajar**

Aktifkan tampilan pembelajar, yang memungkinkan pengajar atau admin melihat kursus sebagaimana yang akan dilihat oleh pembelajar

*Default: `true`*


### `view_grid_courses`

**Tampilkan kursus dalam tata letak kisi**

Tampilkan kursus dalam tata letak dengan beberapa kursus per baris. Jika tidak, tata letak akan menampilkan satu kursus per baris.

*Default: `true`*