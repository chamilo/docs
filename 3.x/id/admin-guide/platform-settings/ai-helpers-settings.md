# Pengaturan AI Helpers

Konfigurasi AI helpers (pembuatan teks, pembuatan gambar, pembuatan video, tutor AI, penilaian AI). Setiap penyedia dapat diaktifkan per jenis tugas. Lihat juga [Konfigurasi AI](../integrations/ai-configuration.md).

Akses pengaturan ini di **Administration > Configuration settings > AI Helpers**. Kategori ini berisi **14 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `ai_providers`

**Data koneksi penyedia AI**

Data konfigurasi untuk terhubung dengan layanan AI eksternal.

### `content_analyser`

**Penganalisis konten**

Menganalisis materi pembelajaran untuk mengekstrak wawasan atau meningkatkan kualitas.

*Default: `false`*

### `course_analyser`

**Penganalisis kursus**

Menganalisis semua sumber daya dalam satu atau beberapa kursus dan melakukan pra-pelatihan model AI agar dapat menjawab pertanyaan apa pun tentang kursus tersebut (pastikan konten dapat dibagikan dengan layanan AI yang dikonfigurasi).

*Default: `false`*

### `disclose_ai_assistance`

**Ungkap bantuan AI**

Tampilkan tag pada setiap konten atau umpan balik yang telah dihasilkan atau dihasilkan bersama oleh sistem AI mana pun, sebagai bukti kepada pengguna bahwa konten tersebut dibuat dengan bantuan suatu sistem AI. Rincian tentang sistem AI mana yang digunakan dalam kasus mana disimpan di dalam basis data untuk audit, tetapi tidak dapat diakses secara langsung oleh pengguna akhir.

*Default: `true`*

### `enable_ai_helpers`

**Aktifkan alat AI helper**

Mengaktifkan semua fitur bertenaga AI yang tersedia di platform.

*Default: `false`*

### `exercise_generator`

**Pembuat latihan**

Menghasilkan tes yang dipersonalisasi dengan AI berdasarkan konten kursus.

*Default: `false`*

### `glossary_terms_generator`

**Pembuat istilah glosarium**

Memungkinkan pengajar meminta istilah glosarium yang dihasilkan AI di kursus mereka. Ini akan menghasilkan 20 istilah berdasarkan judul kursus dan deskripsi umum di alat deskripsi kursus. Jika digunakan lebih dari sekali, istilah yang sudah ada dalam glosarium tersebut akan dikecualikan (pastikan konten dapat dibagikan dengan layanan AI yang dikonfigurasi).

*Default: `false`*

### `image_generator`

**Pembuat gambar**

Menghasilkan gambar berdasarkan prompt atau konten menggunakan AI.

*Default: `false`*

### `learning_path_generator`

**Pembuat learning path**

Menghasilkan learning path yang dipersonalisasi menggunakan saran AI.

*Default: `false`*

### `open_answers_grader`

**Penilai jawaban terbuka**

Secara otomatis menilai jawaban terbuka menggunakan AI.

*Default: `false`*

### `task_grader`

**Penilai tugas**

Menggunakan AI untuk mengevaluasi dan menilai tugas yang diunggah.

*Default: `false`*

### `tutor_chatbot`

**Chatbot tutor bertenaga AI**

Menyediakan asisten tutoring bertenaga AI bagi siswa.

*Default: `false`*

### `video_generator`

**Pembuat video**

Menghasilkan video berdasarkan prompt atau konten menggunakan AI (ini dapat mengonsumsi banyak token).

*Default: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Izinkan terjemahan AI ke semua bahasa aktif di editor WYSIWYG**

Memungkinkan pengajar menghasilkan terjemahan untuk semua bahasa platform yang aktif dalam satu tindakan WYSIWYG. Ini dapat mengonsumsi sejumlah besar token AI.

*Default: `true`*