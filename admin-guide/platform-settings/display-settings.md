# Pengaturan Tampilan

Bagaimana platform ditampilkan kepada pengguna — tata letak halaman utama, gravatar, menu, perilaku merek, dan preferensi visual serupa.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Tampilan**. Kategori ini berisi **24 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `accessibility_font_resize`

**Fitur aksesibilitas pengubahan ukuran font**

Aktifkan opsi ini untuk menampilkan serangkaian opsi pengubahan ukuran font di sisi kanan atas kampus Anda. Ini akan memungkinkan pengguna dengan gangguan penglihatan untuk membaca konten kursus mereka dengan lebih mudah.

*Default: `false`*

### `display_categories_on_homepage`

**Tampilkan kategori di halaman utama**

Opsi ini akan menampilkan atau menyembunyikan kategori kursus di halaman utama portal.

*Default: `false`*

### `enable_help_link`

**Aktifkan tautan bantuan**

Tautan Bantuan terletak di bagian kanan atas layar.

*Default: `true`*

### `gravatar_enabled`

**Gambar pengguna Gravatar**

Aktifkan opsi ini untuk mencari gambar pengguna saat ini di repositori Gravatar, jika pengguna belum menentukan gambar secara lokal. Ini sangat berguna untuk mengisi gambar secara otomatis di situs Anda, terutama jika pengguna Anda adalah pengguna internet aktif. Gambar Gravatar dapat dikonfigurasi dengan mudah berdasarkan alamat email pengguna di http://en.gravatar.com/

*Default: `false`*

### `gravatar_type`

**Tipe avatar Gravatar**

Jika opsi Gravatar diaktifkan dan pengguna tidak memiliki gambar yang dikonfigurasi di Gravatar, opsi ini memungkinkan Anda memilih tipe avatar yang akan dihasilkan Gravatar untuk setiap pengguna. Periksa <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> untuk contoh tipe avatar.

*Default: `mm`*

### `hide_complete_name_in_whoisonline`

**Sembunyikan nama lengkap pengguna di 'siapa yang online'**

Halaman 'siapa yang online' (jika diaktifkan) akan menampilkan gambar dan nama untuk setiap pengguna yang sedang online. Aktifkan opsi ini untuk menyembunyikan nama.

*Default: `false`*

### `hide_logout_button`

**Sembunyikan tombol logout**

Sembunyikan tombol logout. Ini biasanya hanya berguna ketika menggunakan metode login/logout eksternal, misalnya saat menggunakan Single Sign On.

*Default: `false`*

### `hide_main_navigation_menu`

**Sembunyikan menu navigasi utama**

Saat menggunakan Chamilo untuk tujuan tertentu (seperti ujian online besar-besaran), Anda mungkin ingin mengurangi gangguan lebih lanjut dengan menghapus menu samping.

*Default: `false`*

### `hide_social_media_links`

**Sembunyikan tautan media sosial**

Beberapa halaman memungkinkan Anda mempromosikan portal atau kursus di jejaring sosial. Aktifkan pengaturan ini untuk menghapus tautan tersebut.

*Default: `false`*

### `order_user_list_by_official_code`

**Urutkan pengguna berdasarkan kode resmi**

Gunakan 'kode resmi' untuk mengurutkan daftar siswa di platform, bukan berdasarkan nama belakang atau nama depan mereka.

*Default: `false`*

### `pdf_logo_header`

**Logo header PDF**

Apakah akan menggunakan gambar di var/themes/[your-theme]/images/pdf_logo_header.png sebagai logo header PDF untuk semua ekspor PDF (bukan logo portal biasa).

### `show_admin_toolbar`

**Tampilkan toolbar admin**

Menampilkan toolbar global di bagian atas halaman untuk peran pengguna yang ditunjuk. Toolbar ini, sangat mirip dengan toolbar Wordpress dan Google yang berwarna hitam, dapat mempercepat tindakan yang rumit dan meningkatkan ruang yang tersedia untuk konten pembelajaran, tetapi mungkin membingungkan bagi beberapa pengguna.

*Default: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Tampilkan tautan kembali dari kategori/kursus**

Tampilkan tautan untuk kembali ke hierarki kursus. Tautan tersedia di bagian bawah daftar.

*Default: `false`*

### `show_closed_courses`

**Tampilkan kursus tertutup di halaman login dan halaman awal portal?**

Tampilkan kursus tertutup di halaman login dan halaman awal kursus? Di halaman awal portal, ikon akan muncul di samping kursus untuk mendaftar dengan cepat ke setiap kursus. Ini hanya akan muncul di halaman awal portal ketika pengguna sudah login dan ketika pengguna belum mendaftar ke portal.

*Default: `false`*

### `show_email_addresses`

**Tampilkan alamat email**

Tampilkan alamat email kepada pengguna.

*Default: `false`*

### `show_empty_course_categories`

**Tampilkan kategori kursus kosong**

Tampilkan kategori kursus di halaman utama, meskipun kategori tersebut kosong.

*Default: `true`*

### `show_hot_courses`

**Tampilkan kursus populer**

Daftar kursus populer akan ditambahkan di halaman indeks.

*Default: `true`*

### `show_number_of_courses`

**Tampilkan jumlah kursus**

Tampilkan jumlah kursus di setiap kategori dalam kategori kursus di halaman utama.

*Default: `false`*

---
### `show_tabs`

**Entri Menu Utama**

Centang entri yang ingin Anda tampilkan di menu utama.

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entri Menu Utama per Peran**

Tentukan visibilitas tab header berdasarkan peran.

*Default: `{}`*

### `showonline`

**Siapa yang Online**

Menampilkan jumlah orang yang sedang online?

*Default: `world`*

### `table_default_row`

**Jumlah Baris Tabel Default**

Berapa banyak baris yang harus ditampilkan di semua tabel secara default.

*Default: `20`*

### `table_row_list`

**Angka Paginasi Default yang Ditawarkan di Tabel**

Tetapkan opsi yang ingin muncul di navigasi sekitar tabel untuk menampilkan lebih sedikit atau lebih banyak baris pada satu halaman. Contoh: [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Batas Waktu untuk Siapa yang Online**

Batas waktu ini menentukan berapa menit setelah tindakan terakhirnya seorang pengguna akan dianggap *online*.

*Default: `30`*