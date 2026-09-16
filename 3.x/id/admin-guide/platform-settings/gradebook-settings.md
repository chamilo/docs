# Pengaturan Gradebook (Penilaian)

Nilai bawaan yang diterapkan di seluruh alat **Gradebook (Penilaian)** — tampilan skor, presisi desimal, ambang skor sertifikat, dan agregasi.

Akses pengaturan ini di **Administration > Configuration settings > Gradebook (Assessments)**. Kategori ini berisi **34 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_gradebook_comments`

**Komentar gradebook**

Aktifkan komentar gradebook agar pengajar dapat menambahkan komentar terhadap kinerja keseluruhan peserta didik dalam kursus ini. Komentar akan muncul dalam ekspor PDF untuk peserta didik.

*Default: `false`*


### `allow_gradebook_stats`

**Cache hasil di gradebook**

Simpan sebagian perhitungan rata-rata yang besar dalam field cache untuk tautan dan evaluasi guna meningkatkan kecepatan (secara signifikan). Dampak negatif potensialnya adalah penyegaran tabel hasil gradebook dapat memakan waktu.

*Default: `false`*

### `gradebook_badge_sidebar`

**Bilah sisi lencana gradebook**

Hasilkan blok di dalam menu samping tempat beberapa lencana dapat ditampilkan sebagai menunggu persetujuan. Mengharuskan gradebook dicantumkan di sini, berdasarkan ID (numerik).

### `gradebook_default_grade_model_id`

**Model nilai bawaan**

Nilai ini akan dipilih secara bawaan saat membuat kursus

### `gradebook_default_weight`

**Bobot bawaan di Gradebook**

Bobot ini akan digunakan di semua kursus secara bawaan

*Default: `100`*

### `gradebook_dependency`

**Ketergantungan antar-gradebook**

Mengaktifkan mekanisme ketergantungan gradebook yang memberi tahu orang item lain mana yang perlu mereka selesaikan terlebih dahulu agar dapat menyelesaikan gradebook.

*Default: `false`*


### `gradebook_dependency_mandatory_courses`

**Kursus wajib untuk ketergantungan gradebook**

Saat menggunakan ketergantungan antar-gradebook, Anda dapat memilih daftar kursus wajib yang akan diperlukan sebelum menyetujui gradebook mana pun yang memiliki ketergantungan.

### `gradebook_detailed_admin_view`

**Tampilkan kolom tambahan di gradebook**

Tampilkan kolom tambahan pada tampilan gradebook peserta didik dengan skor terbaik semua peserta didik, posisi relatif peserta didik yang melihat laporan, dan skor rata-rata seluruh kelompok peserta didik.

*Default: `false`*


### `gradebook_display_extra_stats`

**Statistik tambahan gradebook**

Tambahkan kolom tambahan ke laporan utama gradebook (1 = peringkat, 2 = skor terbaik, 3 = rata-rata).

### `gradebook_enable`

**Aktivasi alat Penilaian**

Alat Penilaian memungkinkan Anda menilai kompetensi di organisasi Anda dengan menggabungkan evaluasi kegiatan kelas dan daring ke dalam laporan Kinerja. Apakah Anda ingin mengaktifkannya?

*Default: `true`*


### `gradebook_enable_grade_model`

**Aktifkan model Gradebook**

Mengaktifkan pembuatan otomatis kategori gradebook di dalam kursus tergantung pada model gradebook.

*Default: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Aktifkan keterampilan berdasarkan subkategori gradebook**

Keterampilan biasanya diberikan untuk menyelesaikan seluruh gradebook. Dengan mengaktifkan opsi ini, Anda mengizinkan keterampilan dilampirkan ke subbagian gradebook.

*Default: `false`*


### `gradebook_flatview_extrafields_columns`

**Field tambahan pengguna pada tampilan datar gradebook**

Tambahkan kolom yang diberikan (array 'variables') ke tabel hasil utama di gradebook.

### `gradebook_hide_graph`

**Sembunyikan grafik gradebook**

Jika portal Anda terbatas sumber dayanya, mengurangi pembuatan grafik gradebook dinamis dengan berpotensi ribuan hasil adalah opsi yang baik.

*Default: `false`*


### `gradebook_hide_link_to_item_for_student`

**Sembunyikan tautan item bagi peserta didik di gradebook**

Cegah peserta didik mengklik item dari gradebook dengan menghapus tautan pada item.

*Default: `false`*


### `gradebook_hide_pdf_report_button`

**Sembunyikan tombol gradebook 'unduh laporan PDF'**

Menghapus tombol ekspor PDF dari tampilan gradebook untuk peserta didik.

*Default: `false`*


### `gradebook_hide_table`

**Sembunyikan tabel gradebook untuk peserta didik**

Kurangi waktu muat gradebook dengan menyembunyikan tabel hasil (tetapi tetap memberikan akses ke sertifikat, keterampilan, dll.).

*Default: `false`*

### `gradebook_locking_enabled`

**Aktifkan penguncian penilaian oleh pengajar**

Setelah diaktifkan, opsi ini akan memungkinkan penguncian penilaian apa pun oleh pengajar pada kursus yang bersangkutan. Hal ini, pada gilirannya, akan mencegah pengajar mengubah hasil di dalam sumber daya yang digunakan dalam penilaian: ujian, learning path, tugas, dan sebagainya. Satu-satunya peran yang berwenang untuk membuka kunci penilaian yang terkunci adalah administrator. Pengajar akan diinformasikan mengenai kemungkinan ini. Penguncian dan pembukaan kunci gradebook akan dicatat dalam laporan aktivitas penting sistem

*Default: `false`*

### `gradebook_multiple_evaluation_attempts`

**Izinkan beberapa percobaan evaluasi di gradebook**

Memungkinkan penambahan komentar pada beberapa percobaan evaluasi di gradebook dan tabel hasil.

*Default: `false`*


### `gradebook_number_decimals`

**Jumlah desimal**

Memungkinkan Anda mengatur jumlah desimal yang diizinkan dalam skor

*Default: `0`*

### `gradebook_pdf_export_settings`

**Opsi ekspor PDF gradebook**

Mengubah ekspor PDF untuk peserta didik berdasarkan pengaturan yang diberikan ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Gaya skor laporan gradebook**

Menambahkan konfigurasi gaya skor gradebook pada tampilan datar. Lihat api.lib.php untuk menemukan opsi: contoh SCORE_DIV = 1, SCORE_PERCENT = 2, dan sebagainya

*Default: `1`*


### `gradebook_score_display_colorsplit`

**Ambang batas**

Ambang batas (dalam %) di bawah mana skor akan diwarnai merah

*Default: `50`*


### `gradebook_score_display_custom`

**Pelabelan tingkat kompetensi**

Centang kotak untuk mengaktifkan pelabelan tingkat kompetensi

*Default: `false`*


### `gradebook_score_display_custom_standalone`

**Tampilan skor kustom pada kolom mandiri gradebook**

Menampilkan nilai tingkat kompetensi kustom pada kolom terpisah dalam tampilan datar gradebook saat menggunakan tampilan skor kustom.

*Default: `false`*


### `gradebook_score_display_upperlimit`

**Tampilkan batas atas skor**

Centang kotak untuk menampilkan batas atas skor

*Default: `false`*


### `gradebook_use_apcu_cache`

**Gunakan cache APCu untuk mempercepat gradebook**

Meningkatkan kecepatan saat merender laporan peserta didik gradebook menggunakan cache Doctrine APCU. APCu adalah ekstensi PHP opsional tetapi direkomendasikan.

*Default: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Gunakan pengaturan tes untuk tampilan nilai**

Menerapkan pengaturan tampilan skor latihan (persentase vs. poin) pada skor kategori di gradebook.

*Default: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Gunakan pengaturan tampilan skor global di gradebook**

Menerapkan pengaturan tampilan skor latihan global pada perhitungan skor total di gradebook.

*Default: `false`*


### `hide_gradebook_percentage_user_result`

**Sembunyikan persentase pada hasil gradebook terbaik/rata-rata**

Menghapus tampilan persentase dari hasil skor terbaik/rata-rata yang ditampilkan kepada peserta didik di gradebook.

*Default: `true`*


### `my_display_coloring`

**Tampilkan warna untuk skor di gradebook**

Mengaktifkan pengodean warna agar visibilitas skor lebih baik di gradebook.

*Default: `false`*


### `student_publication_to_take_in_gradebook`

**Tugas yang diperhitungkan untuk gradebook**

Pada alat tugas, peserta didik dapat mengunggah lebih dari satu berkas. Jika terdapat lebih dari satu berkas untuk satu tugas, berkas mana yang harus diperhitungkan saat merangking mereka di gradebook? Hal ini bergantung pada metodologi Anda. Gunakan 'first' untuk menekankan ketelitian (seperti mengumpulkan tepat waktu dan mengumpulkan pekerjaan yang benar terlebih dahulu). Gunakan 'last' untuk menyoroti kerja kolaboratif dan adaptif.

*Default: `first`*


### `teachers_can_change_grade_model_settings`

**Pengajar dapat mengubah pengaturan model Gradebook**

Saat mengedit Gradebook

*Default: `true`*


### `teachers_can_change_score_settings`

**Pengajar dapat mengubah pengaturan skor Gradebook**

Saat mengedit pengaturan Gradebook

*Default: `true`*