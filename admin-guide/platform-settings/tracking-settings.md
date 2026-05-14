# Pengaturan Pelacakan

Pengaturan bawaan terkait pelacakan — apa yang dicatat, laporan apa yang ditampilkan, aturan perhitungan waktu.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pelacakan**. Kategori ini berisi **10 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan nama ini saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `block_my_progress_page`

**Mencegah akses ke halaman 'Kemajuan Saya'**

Dalam implementasi tertentu seperti ujian daring, Anda mungkin ingin mencegah pengguna mengakses halaman 'Kemajuan Saya'.

*Default: `false`*

### `footer_extra_content`

**Konten tambahan di footer**

Anda dapat menambahkan kode HTML seperti tag meta

### `header_extra_content`

**Konten tambahan di header**

Anda dapat menambahkan kode HTML seperti tag meta

### `meta_description`

**Deskripsi meta**

Ini akan menampilkan meta Deskripsi OpenGraph (og:description) di header situs Anda

### `meta_image_path`

**Path gambar meta**

Path Gambar Meta ini adalah jalur ke file di dalam direktori Chamilo Anda (misalnya home/image.png) yang seharusnya muncul di kartu Twitter atau kartu OpenGraph saat menampilkan tautan ke LMS Anda. Twitter merekomendasikan gambar berukuran 120 x 120 piksel, yang kadang-kadang dapat dipotong menjadi 120x90.

### `meta_title`

**Judul meta OpenGraph**

Ini akan menampilkan meta Judul OpenGraph (og:title) di header situs Anda

### `meta_twitter_creator`

**Akun Pencipta Twitter**

Pencipta Twitter adalah akun Twitter (misalnya @ywarnier) yang mewakili *orang* yang membuat situs tersebut. Kolom ini bersifat opsional.

### `meta_twitter_site`

**Akun Situs Twitter**

Situs Twitter adalah akun Twitter (misalnya @chamilo_news) yang terkait dengan situs Anda. Biasanya ini adalah akun yang lebih sementara dibandingkan akun pencipta Twitter, atau mewakili suatu entitas (bukan individu). Kolom ini wajib diisi jika Anda ingin bidang meta kartu Twitter ditampilkan.

### `my_progress_course_tools_order`

**Urutan alat di halaman 'Kemajuan Saya'**

Ubah urutan alat yang ditampilkan di halaman 'Kemajuan Saya' untuk peserta didik. Pilihan termasuk 'quizzes', 'learning_paths', dan 'skills'.

### `tracking_skip_generic_data`

**Lewati data generik di halaman pelacakan mandiri peserta didik**

Jika halaman 'Kemajuan Saya' membutuhkan waktu lama untuk dimuat, Anda mungkin ingin menghapus pemrosesan statistik generik untuk pengguna. Dalam hal ini, aktifkan pengaturan ini.

*Default: `false`*