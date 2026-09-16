# Pengaturan Platform

Identitas dan perilaku tingkat platform — nama institusi, zona waktu, kebijakan pendaftaran, pengguna daring, bendera kinerja.

Akses pengaturan ini di bawah **Administration > Configuration settings > Platform**. Kategori ini berisi **29 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_my_files`

**Aktifkan bagian 'My Files'**

Izinkan pengguna mengunggah berkas ke ruang pribadi di platform.

*Default: `true`*

### `chamilo_database_version`

**Versi skema basis data yang saat ini digunakan oleh Chamilo**

Menampilkan versi DB saat ini agar sesuai dengan versi inti Chamilo.

### `cookie_warning`

**Notifikasi privasi cookie**

Jika diaktifkan, opsi ini menampilkan spanduk di bagian atas platform yang meminta pengguna untuk mengakui bahwa platform menggunakan cookie yang diperlukan untuk menyediakan pengalaman pengguna. Spanduk tersebut dapat dengan mudah diakui dan disembunyikan oleh pengguna. Hal ini memungkinkan Chamilo mematuhi peraturan cookie web Uni Eropa.

*Default: `false`*

### `disable_copy_paste`

**Nonaktifkan salin-tempel**

Ketika diaktifkan, opsi ini menonaktifkan mekanisme salin-tempel sejauh mungkin. Berguna dalam pengaturan ujian yang ketat.

*Default: `false`*

### `donotlistcampus`

**Jangan cantumkan kampus ini di chamilo.org**

Secara default, portal Chamilo didaftarkan secara otomatis dalam daftar publik di chamilo.org, hanya menggunakan judul yang Anda berikan pada portal ini (bukan URL maupun data pribadi apa pun). Centang kotak ini untuk menghindari tampilnya judul portal Anda.

*Default: `false`*

### `generate_random_login`

**Hasilkan nama pengguna acak**

Saat mengimpor pengguna (proses batch), secara otomatis hasilkan string acak untuk nama pengguna. Jika tidak, nama pengguna akan dihasilkan berdasarkan nama depan dan nama belakang, atau prefiks surel.

*Default: `false`*

### `hosting_limit_identical_email`

**Batasi penggunaan surel yang identik**

Jumlah maksimum akun yang diizinkan berbagi alamat surel yang sama. Atur ke 0 untuk menonaktifkan batas ini.

*Default: `0`*

### `hosting_limit_users_per_course`

**Batas global pengguna per kursus**

Menentukan jumlah maksimum global pengguna (termasuk pengajar) yang diizinkan berlangganan pada satu kursus mana pun di platform. Atur nilai ini ke 0 untuk menonaktifkan batas. Hal ini membantu menghindari kursus yang kelebihan beban di portal terbuka.

*Default: `0`*

### `institution`

**Nama organisasi**

Nama organisasi (muncul di header di sebelah kanan)

*Default: `Chamilo.org`*


### `institution_address`

**Alamat institusi**

Alamat

### `institution_url`

**URL organisasi (alamat web)**

URL institusi (tautan yang muncul di header di sebelah kanan)

*Default: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maksimum kursus per pengguna**

Jumlah maksimum kursus yang dapat dibuat oleh seorang pengajar/pelatih. Atur ke 0 untuk menonaktifkan batas. Dapat diganti per pengguna melalui pembelian layanan BuyCourses.

*Default: `0`*

### `notification_event`

**Aktifkan alat notifikasi untuk saluran komunikasi yang lebih berdampak dengan siswa**

Mengaktifkan notifikasi popup atau sistem untuk peristiwa platform yang penting.

*Default: `false`*

### `pdf_img_dpi`

**Resolusi ekspor PDF**

Ini merepresentasikan resolusi berkas PDF yang dihasilkan (dalam titik per inci, atau dpi). Default-nya adalah 96. Meningkatkannya akan memberikan berkas PDF dengan resolusi lebih baik tetapi juga akan meningkatkan ukuran dan waktu pembuatan berkas.

*Default: `96`*

### `platform_logo_url`

**URL untuk logo platform alternatif**

Mengganti logo Chamilo dengan memuat URL (yang mungkin jarak jauh). Pastikan hal ini diizinkan oleh kebijakan keamanan Anda.

*Default: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Aktifkan berbagi portofolio tingkat lanjut**

Tentukan siapa yang dapat melihat kiriman dan komentar portofolio.

*Default: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Tampilkan kiriman kursus dasar di kursus sesi**

Tentukan siapa yang dapat melihat kiriman dan komentar portofolio.

*Default: `false`*

### `push_notification_settings`

**Pengaturan notifikasi push (JSON)**

Konfigurasi JSON untuk integrasi notifikasi Push.

### `server_type`

**Tipe Server**

Menentukan tipe lingkungan: "prod" (produksi normal), "validation" (seperti produksi tetapi tanpa pelaporan statistik), atau "test" (mode debug dengan alat pengembang seperti indikator string yang belum diterjemahkan).

*Default: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Izinkan admin sesi melihat semua pengguna di semua URL**

Jika diaktifkan, admin sesi dapat mencari dan menampilkan pengguna dari semua URL akses, terlepas dari URL mereka saat ini.

*Default: `false`*

### `site_name`

**Nama portal e-learning**

Nama Portal Chamilo Anda (muncul di header)

*Default: `Chamilo site`*


### `timepicker_increment`

**Kenaikan timepicker**

Kenaikan waktu minimal (dalam menit) saat memilih tanggal dan waktu dengan widget timepicker. Misalnya, mungkin tidak berguna untuk memiliki kenaikan kurang dari 5 atau 15 menit ketika berbicara tentang pengumpulan tugas, ketersediaan tes, waktu mulai sesi, dan sebagainya.

*Default: `15`*

### `timezone`

**Zona waktu default**

Pilih zona waktu default untuk portal ini. Ini akan membantu menetapkan zona waktu (jika fitur diaktifkan) untuk setiap pengguna baru atau untuk pengguna mana pun yang belum menetapkan zona waktu tertentu. Zona waktu membantu menampilkan semua informasi terkait waktu di layar sesuai zona waktu spesifik masing-masing pengguna.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**Biner konverter UNO**

Berikan path sistem ke pustaka konverter UNO untuk mengaktifkan beberapa fitur ekspor tambahan.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Gunakan ID karier eksternal dalam diagram**

Jika menggunakan diagram karier, tampilkan bidang tambahan alih-alih ID karier internal.

*Default: `false`*

### `use_custom_pages`

**Gunakan halaman kustom**

Aktifkan fitur ini untuk mengonfigurasi halaman login tertentu berdasarkan peran

*Default: `false`*

### `use_virtual_keyboard`

**Gunakan papan ketik virtual**

Tampilkan papan ketik virtual. Ini berguna saat menyiapkan ujian yang ketat di ruang fisik di mana mahasiswa tidak memiliki papan ketik, untuk membatasi kemampuan mereka berbuat curang.

*Default: `false`*

### `user_status_show_option`

**Opsi tampilan peran**

Array role => true/false yang menentukan apakah peran tersebut harus ditampilkan atau disembunyikan.

### `user_status_show_options_enabled`

**Tampilan selektif peran**

Aktifkan untuk menggunakan array yang menentukan peran mana yang harus ditampilkan secara jelas dan mana yang harus disembunyikan.

*Default: `false`*