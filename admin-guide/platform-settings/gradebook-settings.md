# Pengaturan Buku Nilai (Penilaian)

Pengaturan default yang diterapkan pada alat **Buku Nilai (Penilaian)** — tampilan skor, presisi desimal, ambang batas skor sertifikat, dan agregasi.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Buku Nilai (Penilaian)**. Kategori ini berisi **34 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_gradebook_comments`

**Komentar Buku Nilai**

Aktifkan komentar buku nilai sehingga pengajar dapat menambahkan komentar mengenai kinerja keseluruhan peserta didik dalam kursus ini. Komentar akan muncul dalam ekspor PDF untuk peserta didik.

*Default: `false`*

### `allow_gradebook_stats`

**Simpan hasil dalam buku nilai**

Simpan beberapa perhitungan besar rata-rata dalam kolom cache untuk tautan dan evaluasi guna meningkatkan kecepatan (secara signifikan). Dampak negatif yang mungkin terjadi adalah bahwa pembaruan tabel hasil buku nilai dapat memakan waktu.

*Default: `false`*

### `gradebook_badge_sidebar`

**Sidebar lencana buku nilai**

Buat blok di dalam menu samping yang menampilkan beberapa lencana sebagai menunggu persetujuan. Membutuhkan buku nilai untuk dicantumkan di sini, berdasarkan ID (numerik).

### `gradebook_default_grade_model_id`

**Model nilai default**

Nilai ini akan dipilih secara default saat membuat kursus.

### `gradebook_default_weight`

**Bobot default di Buku Nilai**

Bobot ini akan digunakan di semua kursus secara default.

*Default: `100`*

### `gradebook_dependency`

**Ketergantungan antar buku nilai**

Mengaktifkan mekanisme ketergantungan buku nilai yang memberi tahu pengguna item mana yang perlu mereka selesaikan terlebih dahulu untuk menyelesaikan buku nilai.

*Default: `false`*

### `gradebook_dependency_mandatory_courses`

**Kursus wajib untuk ketergantungan buku nilai**

Saat menggunakan ketergantungan antar buku nilai, Anda dapat memilih daftar kursus wajib yang diperlukan sebelum menyetujui buku nilai yang memiliki ketergantungan.

### `gradebook_detailed_admin_view`

**Tampilkan kolom tambahan di buku nilai**

Tampilkan kolom tambahan di tampilan siswa pada buku nilai dengan skor terbaik dari semua siswa, posisi relatif siswa yang melihat laporan, dan skor rata-rata dari seluruh kelompok siswa.

*Default: `false`*

### `gradebook_display_extra_stats`

**Statistik tambahan buku nilai**

Tambahkan kolom tambahan ke laporan utama buku nilai (1 = peringkat, 2 = skor terbaik, 3 = rata-rata).

### `gradebook_enable`

**Aktivasi alat Penilaian**

Alat Penilaian memungkinkan Anda untuk menilai kompetensi di organisasi Anda dengan menggabungkan evaluasi kegiatan kelas dan daring ke dalam laporan Kinerja. Apakah Anda ingin mengaktifkannya?

*Default: `true`*

### `gradebook_enable_grade_model`

**Aktifkan model Buku Nilai**

Mengaktifkan pembuatan otomatis kategori buku nilai di dalam kursus tergantung pada model buku nilai.

*Default: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Aktifkan keterampilan berdasarkan subkategori buku nilai**

Keterampilan biasanya diberikan untuk menyelesaikan seluruh buku nilai. Dengan mengaktifkan opsi ini, Anda mengizinkan keterampilan untuk dilampirkan ke sub-bagian dari buku nilai.

*Default: `false`*

### `gradebook_flatview_extrafields_columns`

**Kolom bidang tambahan pengguna di tampilan datar buku nilai**

Tambahkan kolom yang diberikan (array 'variables') ke tabel hasil utama di buku nilai.

### `gradebook_hide_graph`

**Sembunyikan grafik buku nilai**

Jika portal Anda memiliki sumber daya terbatas, mengurangi pembuatan grafik buku nilai dinamis dengan potensi ribuan hasil adalah pilihan yang baik.

*Default: `false`*

### `gradebook_hide_link_to_item_for_student`

**Sembunyikan tautan item untuk peserta didik di buku nilai**

Hindari peserta didik mengklik item dari buku nilai dengan menghapus tautan pada item tersebut.

*Default: `false`*

### `gradebook_hide_pdf_report_button`

**Sembunyikan tombol 'unduh laporan PDF' di buku nilai**

Menghapus tombol ekspor PDF dari tampilan buku nilai untuk peserta didik.

*Default: `false`*

### `gradebook_hide_table`

**Sembunyikan tabel buku nilai untuk peserta didik**

Kurangi waktu muat buku nilai dengan menyembunyikan tabel hasil (tetapi tetap memberikan akses ke sertifikat, keterampilan, dll).

*Default: `false`*

---
### `gradebook_locking_enabled`

**Mengaktifkan penguncian penilaian oleh pengajar**

Setelah diaktifkan, opsi ini akan memungkinkan penguncian penilaian apa pun oleh pengajar dari kursus yang bersangkutan. Hal ini, pada gilirannya, akan mencegah perubahan hasil oleh pengajar di dalam sumber daya yang digunakan dalam penilaian: ujian, jalur pembelajaran, tugas, dll. Satu-satunya peran yang diizinkan untuk membuka kunci penilaian yang terkunci adalah administrator. Pengajar akan diberitahu tentang kemungkinan ini. Penguncian dan pembukaan kunci buku nilai akan dicatat dalam laporan aktivitas penting sistem.

*Default: `false`*

### `gradebook_multiple_evaluation_attempts`

**Mengizinkan beberapa upaya penilaian di buku nilai**

Mengizinkan penambahan komentar pada beberapa upaya penilaian di buku nilai dan tabel hasil.

*Default: `false`*

### `gradebook_number_decimals`

**Jumlah desimal**

Memungkinkan Anda untuk mengatur jumlah desimal yang diizinkan dalam skor.

*Default: `0`*

### `gradebook_pdf_export_settings`

**Opsi ekspor PDF buku nilai**

Mengubah ekspor PDF untuk peserta didik berdasarkan pengaturan yang diberikan ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Gaya skor laporan buku nilai**

Menambahkan konfigurasi gaya skor buku nilai di tampilan datar. Lihat api.lib.php untuk menemukan opsi: contoh SCORE_DIV = 1, SCORE_PERCENT = 2, dll.

*Default: `1`*

### `gradebook_score_display_colorsplit`

**Ambang batas**

Ambang batas (dalam %) di bawah mana skor akan diwarnai merah.

*Default: `50`*

### `gradebook_score_display_custom`

**Pelabelan tingkat kompetensi**

Centang kotak untuk mengaktifkan pelabelan tingkat kompetensi.

*Default: `false`*

### `gradebook_score_display_custom_standalone`

**Tampilan skor kustom di kolom mandiri buku nilai**

Menampilkan nilai tingkat kompetensi kustom di kolom terpisah di tampilan datar buku nilai saat menggunakan tampilan skor kustom.

*Default: `false`*

### `gradebook_score_display_upperlimit`

**Menampilkan batas atas skor**

Centang kotak untuk menunjukkan batas atas skor.

*Default: `false`*

### `gradebook_use_apcu_cache`

**Menggunakan cache APCu untuk mempercepat buku nilai**

Meningkatkan kecepatan saat merender laporan siswa buku nilai menggunakan cache Doctrine APCU. APCu adalah ekstensi PHP opsional tetapi direkomendasikan.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Menggunakan pengaturan tes untuk tampilan nilai**

Menerapkan pengaturan tampilan skor latihan (persentase vs. poin) ke skor kategori di buku nilai.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Menggunakan pengaturan tampilan skor global di buku nilai**

Menerapkan pengaturan tampilan skor latihan global ke perhitungan skor total di buku nilai.

*Default: `false`*

### `hide_gradebook_percentage_user_result`

**Menyembunyikan persentase di hasil buku nilai terbaik/rata-rata**

Menghapus tampilan persentase dari hasil skor terbaik/rata-rata yang ditunjukkan kepada peserta didik di buku nilai.

*Default: `true`*

### `my_display_coloring`

**Menampilkan warna untuk skor di buku nilai**

Mengaktifkan pengkodean warna untuk visibilitas skor yang lebih baik di buku nilai.

*Default: `false`*

### `student_publication_to_take_in_gradebook`

**Tugas yang dipertimbangkan untuk buku nilai**

Di alat tugas, siswa dapat mengunggah lebih dari satu file. Jika ada lebih dari satu untuk tugas yang sama, mana yang harus dipertimbangkan saat menentukan peringkat di buku nilai? Ini tergantung pada metodologi Anda. Gunakan 'first' untuk menekankan perhatian pada detail (seperti penyerahan tepat waktu dan penyerahan pekerjaan yang benar terlebih dahulu). Gunakan 'last' untuk menyoroti kerja kolaboratif dan adaptif.

*Default: `first`*

### `teachers_can_change_grade_model_settings`

**Pengajar dapat mengubah pengaturan model buku nilai**

Saat mengedit buku nilai.

*Default: `true`*

### `teachers_can_change_score_settings`

**Pengajar dapat mengubah pengaturan skor buku nilai**

Saat mengedit pengaturan buku nilai.

*Default: `true`*