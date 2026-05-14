# Pengaturan Tugas (Pekerjaan)

Pengaturan bawaan dan perilaku alat **Tugas (Publikasi Siswa)**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Tugas (Pekerjaan)**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_compilatio_tool`

**Aktifkan Compilatio**

Compilatio adalah layanan anti-kecurangan yang membandingkan teks antara dua pengiriman dan melaporkan jika ada kemungkinan tinggi bahwa konten (biasanya tugas) tidak asli.

*Default: `false`*

### `allow_my_student_publication_page`

**Aktifkan halaman Tugas Saya**

[disimpulkan] Aktifkan halaman khusus bagi peserta didik untuk melihat dan mengelola tugas yang telah mereka kirimkan.

*Default: `false`*

### `allow_only_one_student_publication_per_user`

**Siswa hanya dapat mengunggah satu tugas**

[disimpulkan] Batasi peserta didik untuk hanya mengirimkan satu tugas per aktivitas, mencegah pengiriman berulang.

*Default: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Alihkan ke beranda alat tugas setelah unggah atau komentar**

Alihkan ke daftar tugas setelah mengunggah tugas atau menambahkan komentar.

*Default: `false`*

### `assignment_prevent_duplicate_upload`

**Cegah unggahan duplikat pada tugas**

[disimpulkan] Cegah peserta didik mengunggah file yang sama untuk pengiriman tugas yang sama.

*Default: `false`*

### `block_student_publication_add_documents`

**Cegah penambahan dokumen ke tugas**

[disimpulkan] Cegah peserta didik menambahkan atau melampirkan dokumen saat mengirimkan tugas.

*Default: `false`*

### `block_student_publication_edition`

**Cegah pengeditan tugas**

[disimpulkan] Cegah peserta didik mengubah atau memperbarui tugas yang telah mereka kirimkan setelah pengiriman awal.

*Default: `false`*

### `block_student_publication_score_edition`

**Cegah guru mengubah skor tugas**

[disimpulkan] Cegah instruktur mengubah skor tugas setelah skor tersebut dicatat.

*Default: `false`*

### `compilatio_tool`

**Pengaturan Compilatio**

Konfigurasikan detail koneksi Compilatio di sini.

### `considered_working_time`

**Aktifkan estimasi waktu untuk tugas**

Ini akan memungkinkan guru memberikan estimasi waktu yang diperlukan (dalam format jj:mm:dd) untuk menyelesaikan tugas. Setelah pengiriman tugas dan persetujuan oleh guru (tugas diberi skor), peserta didik akan secara otomatis diberikan waktu yang sesuai.

*Default: `work_time`*

### `force_download_doc_before_upload_work`

**Paksa unduh dokumen sebelum unggah tugas**

Paksa pengguna untuk mengunduh dokumen yang disediakan dalam definisi tugas sebelum mereka dapat mengunggah tugas mereka.

*Default: `true`*

### `my_courses_show_pending_work`

**Tampilkan tautan ke tugas 'tertunda' dari halaman Kursus Saya**

[disimpulkan] Tampilkan tautan atau jumlah tugas tertunda di halaman Kursus Saya peserta didik untuk akses cepat.

*Default: `false`*