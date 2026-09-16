# Pengaturan Tugas (Work)

Nilai bawaan dan perilaku alat **Tugas (Publikasi Siswa)**.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Tugas (Work)**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_compilatio_tool`

**Aktifkan Compilatio**

Compilatio adalah layanan anti-kecurangan yang membandingkan teks antara dua kiriman dan melaporkan jika ada probabilitas tinggi bahwa konten (biasanya tugas) tidak asli.

*Default: `false`*

### `allow_my_student_publication_page`

**Aktifkan halaman Tugas saya**

[inferred] Aktifkan halaman khusus bagi peserta didik untuk melihat dan mengelola tugas yang mereka kirimkan sendiri.

*Default: `false`*

### `allow_only_one_student_publication_per_user`

**Siswa hanya dapat mengunggah satu tugas**

[inferred] Batasi peserta didik agar hanya mengirimkan satu tugas per aktivitas, sehingga mencegah pengiriman berulang.

*Default: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Alihkan ke beranda alat tugas setelah unggah atau komentar**

Alihkan ke daftar tugas setelah mengunggah tugas atau menambahkan komentar

*Default: `false`*

### `assignment_prevent_duplicate_upload`

**Cegah unggahan duplikat pada tugas**

[inferred] Blokir peserta didik agar tidak mengunggah berkas yang identik untuk pengiriman tugas yang sama.

*Default: `false`*

### `block_student_publication_add_documents`

**Cegah penambahan dokumen ke tugas**

[inferred] Cegah peserta didik menambahkan atau melampirkan dokumen saat mengirimkan tugas.

*Default: `false`*

### `block_student_publication_edition`

**Cegah penyuntingan tugas**

[inferred] Cegah peserta didik mengubah atau memperbarui tugas yang telah dikirimkan setelah pengiriman awal.

*Default: `false`*

### `block_student_publication_score_edition`

**Cegah pengajar mengubah skor tugas**

[inferred] Cegah instruktur mengubah skor tugas setelah skor tersebut dicatat.

*Default: `false`*

### `compilatio_tool`

**Pengaturan Compilatio**

Konfigurasikan detail koneksi Compilatio di sini.

### `considered_working_time`

**Aktifkan upaya waktu untuk tugas**

Ini memungkinkan pengajar memberikan perkiraan upaya waktu (dalam format hh:mm:ss) untuk menyelesaikan tugas. Setelah tugas dikirimkan dan disetujui oleh pengajar (tugas diberi skor), peserta didik secara otomatis akan ditetapkan waktu yang sesuai.

*Default: `work_time`*

### `force_download_doc_before_upload_work`

**Wajibkan unduhan dokumen sebelum unggah tugas**

Wajibkan pengguna mengunduh dokumen yang disediakan dalam definisi tugas sebelum mereka dapat mengunggah tugas mereka.

*Default: `true`*

### `my_courses_show_pending_work`

**Tampilkan tautan ke tugas yang 'tertunda' dari halaman Kursus saya**

[inferred] Tampilkan tautan atau jumlah tugas yang tertunda pada halaman Kursus Saya peserta didik untuk akses cepat.

*Default: `false`*