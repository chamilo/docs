# Pengaturan Tampilan

Cara platform ditampilkan kepada pengguna — tata letak beranda, gravatar, menu, perilaku branding, dan preferensi visual serupa.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Tampilan**. Kategori ini berisi **28 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut secara global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `accessibility_font_resize`

**Fitur aksesibilitas pengubahan ukuran font**

Aktifkan opsi ini untuk menampilkan serangkaian opsi pengubahan ukuran font di sisi kanan atas kampus Anda. Ini akan memudahkan pengguna dengan gangguan penglihatan untuk membaca konten kursus mereka.

*Default: `false`*

### `display_categories_on_homepage`

**Tampilkan kategori di halaman beranda**

Opsi ini akan menampilkan atau menyembunyikan kategori kursus di halaman beranda portal

*Default: `false`*

### `enable_help_link`

**Aktifkan tautan bantuan**

Tautan Bantuan terletak di bagian kanan atas layar

*Default: `true`*

### `gravatar_enabled`

**Gambar pengguna Gravatar**

Aktifkan opsi ini untuk mencari repositori Gravatar guna mendapatkan gambar pengguna saat ini, jika pengguna belum menentukan gambar secara lokal. Ini sangat berguna untuk mengisi gambar secara otomatis di situs Anda, khususnya jika pengguna Anda aktif di internet. Gambar Gravatar dapat dikonfigurasi dengan mudah berdasarkan alamat e-mail pengguna, di http://en.gravatar.com/

*Default: `false`*

### `gravatar_type`

**Jenis avatar Gravatar**

Jika opsi Gravatar diaktifkan dan pengguna tidak memiliki gambar yang dikonfigurasi di Gravatar, opsi ini memungkinkan Anda memilih jenis avatar yang akan dihasilkan Gravatar untuk setiap pengguna. Lihat <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> untuk contoh jenis avatar.

*Default: `mm`*

### `hide_complete_name_in_whoisonline`

**Sembunyikan nama pengguna lengkap di 'siapa yang daring'**

Halaman 'siapa yang daring' (jika diaktifkan) akan menampilkan gambar dan nama untuk setiap pengguna yang sedang daring. Aktifkan opsi ini untuk menyembunyikan nama.

*Default: `false`*

### `hide_home_top_when_connected` **v3**

**Sembunyikan konten atas di beranda saat sudah masuk**

Di halaman beranda platform, opsi ini memungkinkan Anda menyembunyikan blok pengantar (misalnya agar hanya pengumuman yang tersisa), untuk semua pengguna yang sudah masuk. Blok pengantar umum tetap akan muncul bagi pengguna yang belum masuk.

*Default: `false`*

### `hide_logout_button`

**Sembunyikan tombol keluar**

Sembunyikan tombol keluar. Ini biasanya hanya relevan saat menggunakan metode masuk/keluar eksternal, misalnya saat menggunakan Single Sign On.

*Default: `false`*

### `hide_main_navigation_menu`

**Sembunyikan menu navigasi utama**

Saat menggunakan Chamilo untuk tujuan tertentu (misalnya satu ujian daring masif), Anda mungkin ingin mengurangi gangguan lebih jauh dengan menghapus menu samping.

*Default: `false`*

### `hide_social_media_links`

**Sembunyikan tautan media sosial**

Beberapa halaman memungkinkan Anda mempromosikan portal atau kursus di jejaring sosial. Aktifkan pengaturan ini untuk menghapus tautan tersebut.

*Default: `false`*

### `order_user_list_by_official_code`

**Urutkan pengguna berdasarkan kode resmi**

Gunakan 'kode resmi' untuk mengurutkan sebagian besar daftar mahasiswa di platform, alih-alih nama belakang atau nama depan mereka.

*Default: `false`*

### `pdf_logo_header`

**Logo header PDF**

Apakah akan menggunakan gambar di var/themes/[your-theme]/images/pdf_logo_header.png sebagai logo header PDF untuk semua ekspor PDF (alih-alih logo portal biasa)

### `show_admin_toolbar`

**Tampilkan bilah alat admin**

Menampilkan bilah alat global di bagian atas halaman kepada peran pengguna yang ditentukan. Bilah alat ini, sangat mirip dengan bilah alat hitam Wordpress dan Google, dapat mempercepat tindakan yang rumit dan meningkatkan ruang yang tersedia untuk konten pembelajaran, tetapi mungkin membingungkan bagi sebagian pengguna

*Default: `do_not_show`*

### `show_administrator_data` **v3**

**Informasi Administrator Platform di footer**

Tampilkan Informasi Administrator Platform di footer?

*Default: `true`*

### `show_back_link_on_top_of_tree`

**Tampilkan tautan kembali dari kategori/kursus**

Tampilkan tautan untuk kembali dalam hierarki kursus. Tautan tetap tersedia di bagian bawah daftar.

*Default: `false`*

### `show_closed_courses`

**Tampilkan kursus tertutup di halaman masuk dan halaman awal portal?**

Tampilkan kursus tertutup di halaman masuk dan halaman awal kursus? Di halaman awal portal akan muncul ikon di samping kursus untuk berlangganan dengan cepat ke setiap kursus. Ini hanya akan muncul di halaman awal portal ketika pengguna sudah masuk dan ketika pengguna belum berlangganan ke portal.

*Default: `false`*

### `show_email_addresses`

**Tampilkan alamat email**

Tampilkan alamat email kepada pengguna

*Default: `false`*

### `show_empty_course_categories`

**Tampilkan kategori kursus kosong**

Tampilkan kategori kursus di beranda, meskipun kosong

*Default: `true`*

### `show_hot_courses`

**Tampilkan kursus populer**

Daftar kursus populer akan ditambahkan di halaman indeks

*Default: `true`*

### `show_number_of_courses`

**Tampilkan jumlah kursus**

Tampilkan jumlah kursus di setiap kategori pada kategori kursus di beranda

*Default: `false`*

### `show_tabs`

**Entri menu utama**

Centang entri yang ingin ditampilkan di menu utama

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entri menu utama per peran**

Tentukan visibilitas tab header per peran.

*Default: `{}`*

### `show_teacher_data` **v3**

**Tampilkan informasi pengajar di footer**

Tampilkan referensi pengajar (nama dan email jika tersedia) di footer?

*Default: `true`*

### `show_tutor_data` **v3**

**Data tutor sesi ditampilkan di footer.**

Tampilkan referensi tutor sesi (nama dan email jika tersedia) di footer?

*Default: `true`*

### `showonline`

**Siapa yang Online**

Tampilkan jumlah orang yang sedang online?

*Default: `world`*

### `table_default_row`

**Jumlah baris tabel default**

Berapa banyak baris yang harus ditampilkan di semua tabel secara default.

*Default: `20`*

### `table_row_list`

**Nomor paginasi default yang ditawarkan di tabel**

Atur opsi yang ingin ditampilkan di navigasi di sekitar tabel untuk menampilkan lebih sedikit atau lebih banyak baris pada satu halaman. mis. [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Batas waktu pada Siapa yang Online**

Batas waktu ini menentukan berapa menit setelah tindakan terakhirnya seorang pengguna akan dianggap *online*

*Default: `30`*