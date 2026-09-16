# Pengaturan Pelacakan

Nilai bawaan terkait pelacakan — apa yang dicatat, laporan mana yang ditampilkan, aturan perhitungan waktu.

Akses pengaturan ini di **Administration > Configuration settings > Tracking**. Kategori ini berisi **10 pengaturan**, tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `block_my_progress_page`

**Cegah akses ke 'My progress'**

Dalam implementasi khusus seperti ujian daring, Anda mungkin ingin mencegah akses pengguna ke halaman 'My progress'.

*Default: `false`*

### `footer_extra_content`

**Konten tambahan di footer**

Anda dapat menambahkan kode HTML seperti meta tag

### `header_extra_content`

**Konten tambahan di header**

Anda dapat menambahkan kode HTML seperti meta tag

### `meta_description`

**Deskripsi meta**

Ini akan menampilkan meta Deskripsi OpenGraph (og:description) di header situs Anda

### `meta_image_path`

**Path gambar meta**

Path Gambar Meta ini adalah path ke sebuah berkas di dalam direktori Chamilo Anda (mis. home/image.png) yang akan ditampilkan pada kartu Twitter atau kartu OpenGraph saat menampilkan tautan ke LMS Anda. Twitter merekomendasikan gambar berukuran 120 x 120 piksel, yang terkadang dapat dipotong menjadi 120x90.

### `meta_title`

**Judul meta OpenGraph**

Ini akan menampilkan meta Judul OpenGraph (og:title) di header situs Anda

### `meta_twitter_creator`

**Akun Twitter Creator**

Twitter Creator adalah akun Twitter (mis. @ywarnier) yang merepresentasikan *orang* yang membuat situs. Bidang ini bersifat opsional.

### `meta_twitter_site`

**Akun Twitter Site**

Twitter site adalah akun Twitter (mis. @chamilo_news) yang terkait dengan situs Anda. Biasanya akun ini lebih bersifat sementara dibandingkan akun Twitter creator, atau merepresentasikan suatu entitas (bukan orang). Bidang ini wajib diisi jika Anda ingin meta kartu Twitter ditampilkan.

### `my_progress_course_tools_order`

**Urutan alat pada halaman 'My progress'**

Ubah urutan alat yang ditampilkan pada halaman 'My progress' untuk peserta didik. Pilihan mencakup 'quizzes', 'learning_paths', dan 'skills'.

### `tracking_skip_generic_data`

**Lewati data generik pada halaman pelacakan mandiri peserta didik**

Jika halaman 'My progress' terlalu lama dimuat, Anda mungkin ingin menghapus pemrosesan statistik generik untuk pengguna. Dalam kasus ini, aktifkan pengaturan ini.

*Default: `false`*