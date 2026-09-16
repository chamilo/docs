# Pengaturan Pembantu AI

Konfigurasi untuk pembantu AI (pembuatan teks, pembuatan gambar, pembuatan video, tutor AI, penilaian AI). Setiap penyedia dapat diaktifkan berdasarkan jenis tugas. Lihat juga [Konfigurasi AI](../integrations/ai-configuration.md).

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pembantu AI**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

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

Menganalisis semua sumber daya dalam satu atau beberapa kursus dan melatih model AI terlebih dahulu untuk menjawab pertanyaan apa pun terkait kursus ini atau kursus-kursus tersebut (pastikan konten dapat dibagikan dengan layanan AI yang dikonfigurasi).

*Default: `false`*

### `disclose_ai_assistance`

**Mengungkapkan bantuan AI**

Menampilkan tag pada konten atau umpan balik apa pun yang telah dibuat atau dibuat bersama oleh sistem AI, sebagai bukti kepada pengguna bahwa konten tersebut dibuat dengan bantuan sistem AI. Detail tentang sistem AI mana yang digunakan dalam kasus tertentu disimpan di dalam basis data untuk audit, tetapi tidak dapat diakses langsung oleh pengguna akhir.

*Default: `true`*

### `enable_ai_helpers`

**Aktifkan alat pembantu AI**

Mengaktifkan semua fitur bertenaga AI yang tersedia di platform.

*Default: `false`*

### `exercise_generator`

**Pembuat latihan**

Menghasilkan tes yang dipersonalisasi dengan AI berdasarkan konten kursus.

*Default: `false`*

### `glossary_terms_generator`

**Pembuat istilah glosarium**

Memungkinkan pengajar untuk meminta istilah glosarium yang dihasilkan AI dalam kursus mereka. Ini akan menghasilkan 20 istilah berdasarkan judul kursus dan deskripsi umum di alat deskripsi kursus. Jika digunakan lebih dari sekali, ini akan mengecualikan istilah yang sudah ada di glosarium tersebut (pastikan konten dapat dibagikan dengan layanan AI yang dikonfigurasi).

*Default: `false`*

### `image_generator`

**Pembuat gambar**

Menghasilkan gambar berdasarkan perintah atau konten menggunakan AI.

*Default: `false`*

### `learning_path_generator`

**Pembuat jalur pembelajaran**

Menghasilkan jalur pembelajaran yang dipersonalisasi menggunakan saran AI.

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

Memberikan asisten tutor bertenaga AI kepada siswa.

*Default: `false`*

### `video_generator`

**Pembuat video**

Menghasilkan video berdasarkan perintah atau konten menggunakan AI (ini mungkin mengonsumsi banyak token).

*Default: `false`*