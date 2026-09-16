# Pengaturan Platform

Identitas dan perilaku tingkat platform — nama institusi, zona waktu, kebijakan pendaftaran, pengguna online, flag performa.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Platform**. Kategori ini berisi **29 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_my_files`

**Aktifkan bagian 'File Saya'**

Izinkan pengguna untuk mengunggah file ke ruang pribadi di platform.

*Default: `true`*

### `chamilo_database_version`

**Versi saat ini dari skema basis data yang digunakan oleh Chamilo**

Menampilkan versi DB saat ini untuk mencocokkan versi inti Chamilo.

### `cookie_warning`

**Pemberitahuan privasi cookie**

Jika diaktifkan, opsi ini menampilkan spanduk di bagian atas platform Anda yang meminta pengguna untuk mengakui bahwa platform menggunakan cookie yang diperlukan untuk memberikan pengalaman pengguna. Spanduk ini dapat dengan mudah diakui dan disembunyikan oleh pengguna. Ini memungkinkan Chamilo untuk mematuhi regulasi cookie web Uni Eropa.

*Default: `false`*

### `disable_copy_paste`

**Nonaktifkan salin-tempel**

Ketika diaktifkan, opsi ini menonaktifkan mekanisme salin-tempel sebisa mungkin. Berguna dalam pengaturan ujian yang ketat.

*Default: `false`*

### `donotlistcampus`

**Jangan daftarkan kampus ini di chamilo.org**

Secara default, portal Chamilo secara otomatis terdaftar dalam daftar publik di chamilo.org, hanya menggunakan judul yang Anda berikan untuk portal ini (bukan URL atau data pribadi apa pun). Centang kotak ini untuk menghindari judul portal Anda muncul.

*Default: `false`*

### `generate_random_login`

**Buat nama pengguna acak**

Saat mengimpor pengguna (proses batch), secara otomatis menghasilkan string acak untuk nama pengguna. Jika tidak, nama pengguna akan dibuat berdasarkan nama depan dan nama belakang, atau awalan dari email.

*Default: `false`*

### `hosting_limit_identical_email`

**Batasi penggunaan email yang sama**

Jumlah maksimum akun yang diizinkan untuk berbagi alamat email yang sama. Atur ke 0 untuk menonaktifkan batasan ini.

*Default: `0`*

### `hosting_limit_users_per_course`

**Batas global pengguna per kursus**

Menentukan jumlah maksimum global pengguna (termasuk pengajar) yang diizinkan untuk mendaftar ke satu kursus di platform. Atur nilai ini ke 0 untuk menonaktifkan batasan. Ini membantu mencegah kursus menjadi terlalu penuh di portal terbuka.

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

**Jumlah maksimum kursus per pengguna**

Jumlah maksimum kursus yang dapat dibuat oleh seorang pengajar/pelatih. Atur ke 0 untuk menonaktifkan batasan. Dapat ditimpa per pengguna melalui pembelian layanan BuyCourses.

*Default: `0`*

### `notification_event`

**Aktifkan alat pemberitahuan untuk saluran komunikasi yang lebih berdampak dengan siswa**

Mengaktifkan pemberitahuan popup atau sistem untuk acara penting di platform.

*Default: `false`*

### `pdf_img_dpi`

**Resolusi ekspor PDF**

Ini mewakili resolusi file PDF yang dihasilkan (dalam dot per inch, atau dpi). Defaultnya adalah 96. Meningkatkannya akan memberikan file PDF dengan resolusi lebih baik tetapi juga akan meningkatkan ukuran dan waktu pembuatan file.

*Default: `96`*

### `platform_logo_url`

**URL untuk logo platform alternatif**

Mengganti logo Chamilo dengan memuat URL (mungkin jarak jauh). Pastikan ini diizinkan oleh kebijakan keamanan Anda.

*Default: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Aktifkan berbagi lanjutan portofolio**

Tentukan siapa yang dapat melihat posting dan komentar portofolio.

*Default: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Tampilkan posting kursus dasar di kursus sesi**

Tentukan siapa yang dapat melihat posting dan komentar portofolio.

*Default: `false`*

### `push_notification_settings`

**Pengaturan pemberitahuan push (JSON)**

Konfigurasi JSON untuk integrasi pemberitahuan Push.

### `server_type`

**Tipe Server**

Menentukan tipe lingkungan: "prod" (produksi normal), "validation" (seperti produksi tetapi tanpa pelaporan statistik), atau "test" (mode debug dengan alat pengembang seperti indikator string yang belum diterjemahkan).

*Default: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Izinkan admin sesi untuk melihat semua pengguna di semua URL**

Jika diaktifkan, admin sesi dapat mencari dan melihat daftar pengguna dari semua URL akses, terlepas dari URL mereka saat ini.

*Default: `false`*

---
### `site_name`

**Nama portal e-learning**

Nama Portal Chamilo Anda (muncul di header)

*Default: `Chamilo site`*


### `timepicker_increment`

**Inkremen pemilih waktu**

Inkremen waktu minimal (dalam menit) saat memilih tanggal dan waktu dengan widget pemilih waktu. Misalnya, mungkin tidak berguna untuk memiliki inkremen kurang dari 5 atau 15 menit ketika berbicara tentang pengumpulan tugas, ketersediaan tes, waktu mulai sesi, dll.

*Default: `15`*


### `timezone`

**Zona waktu default**

Pilih zona waktu default untuk portal ini. Ini akan membantu mengatur zona waktu (jika fitur ini diaktifkan) untuk setiap pengguna baru atau untuk pengguna yang belum mengatur zona waktu tertentu. Zona waktu membantu menampilkan semua informasi terkait waktu di layar sesuai dengan zona waktu spesifik setiap pengguna.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**Binari konverter UNO**

Berikan jalur sistem ke pustaka konverter UNO untuk mengaktifkan beberapa fitur ekspor tambahan.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Gunakan ID karier eksternal dalam diagram**

Jika menggunakan diagram karier, tampilkan bidang tambahan alih-alih ID karier internal.

*Default: `false`*


### `use_custom_pages`

**Gunakan halaman kustom**

Aktifkan fitur ini untuk mengonfigurasi halaman login spesifik berdasarkan peran.

*Default: `false`*


### `use_virtual_keyboard`

**Gunakan keyboard virtual**

Tampilkan keyboard virtual. Ini berguna saat mengatur ujian yang ketat di ruangan fisik di mana siswa tidak memiliki keyboard untuk membatasi kemampuan mereka untuk curang.

*Default: `false`*


### `user_status_show_option`

**Opsi tampilan peran**

Sebuah array dari peran => true/false yang menentukan apakah peran tersebut harus ditampilkan atau disembunyikan.


### `user_status_show_options_enabled`

**Tampilan selektif peran**

Aktifkan untuk menggunakan array guna menentukan peran mana yang harus ditampilkan dengan jelas dan mana yang harus disembunyikan.

*Default: `false`*