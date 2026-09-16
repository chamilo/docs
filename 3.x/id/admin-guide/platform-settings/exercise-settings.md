# Pengaturan Latihan (Tes)

Nilai bawaan dan perilaku alat **Latihan (Tes)** — tampilan soal, penskoran, percobaan, dan sejenisnya.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Latihan (Tes)**. Kategori ini berisi **64 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirim dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `add_exercise_best_attempt_in_report`

**Aktifkan tampilan percobaan skor terbaik**

Sediakan daftar ID kursus dan tes yang akan menampilkan percobaan skor terbaik untuk setiap peserta didik dalam laporan.

### `allow_coach_feedback_exercises`

**Izinkan tutor memberi komentar saat meninjau latihan**

Izinkan tutor menyunting umpan balik saat meninjau latihan

*Default: `true`*

### `allow_edit_exercise_in_lp`

**Izinkan pengajar menyunting tes dalam jalur pembelajaran**

Secara bawaan, Chamilo mencegah Anda menyunting tes yang disertakan di dalam jalur pembelajaran. Hal ini untuk menghindari perubahan yang akan memengaruhi peserta didik (masa lalu dan masa depan) secara berbeda terkait hasil dan/atau kemajuan dalam jalur pembelajaran. Opsi ini memungkinkan pengajar melewati pembatasan tersebut.


### `allow_exercise_categories`

**Aktifkan kategori tes**

Kategori tes tidak diaktifkan secara bawaan karena menambah tingkat kompleksitas. Aktifkan fitur ini agar semua ikon pengelolaan terkait kategori tes muncul.

*Default: `false`*

### `allow_mandatory_question_in_category`

**Aktifkan pemilihan soal wajib**

Aktifkan pemilihan soal wajib dalam tes saat menggunakan kategori acak.

*Default: `false`*

### `allow_notification_setting_per_exercise`

**Pengaturan notifikasi tes pada tingkat tes**

Aktifkan konfigurasi notifikasi pengiriman tes pada tingkat tes, bukan pada tingkat kursus. Kembali ke pengaturan tingkat kursus jika tidak ditentukan pada tingkat tes.

*Default: `false`*

### `allow_quick_question_description_popup`

**Penambahan gambar cepat ke soal**

Aktifkan ikon tambahan dalam daftar soal tes untuk menambahkan gambar sebagai deskripsi soal. Hal ini sangat mempercepat penyuntingan soal ketika soal berada di judul dan deskripsi hanya berisi gambar.

*Default: `false`*

### `allow_quiz_question_feedback`

**Tambahkan umpan balik soal jika jawaban salah**

Secara bawaan, Chamilo memungkinkan Anda menampilkan umpan balik pada setiap jawaban dalam suatu soal. Dengan opsi ini, dibuat bidang tambahan untuk menyediakan umpan balik yang telah ditentukan untuk seluruh soal. Umpan balik ini hanya akan muncul jika pengguna menjawab salah.

*Default: `false`*

### `allow_quiz_results_page_config`

**Aktifkan konfigurasi halaman hasil tes**

Tentukan array pengaturan yang ingin Anda terapkan pada semua halaman hasil tes. Pengaturan dapat berupa ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ dan mungkin lebih banyak lagi di masa depan. Cari ‘getPageConfigurationAttribute’ dalam kode untuk melihat apa yang sedang digunakan.

*Default: `false`*

### `allow_quiz_show_previous_button_setting`

**Tampilkan tombol 'sebelumnya' dalam tes untuk menavigasi soal**

Setel ini ke false untuk menonaktifkan tombol 'sebelumnya' saat menjawab soal dalam tes, sehingga memaksa pengguna untuk selalu maju.

*Default: `false`*

### `allow_teacher_comment_audio`

**Umpan balik audio untuk jawaban yang dikirimkan**

Izinkan pengajar memberikan umpan balik kepada pengguna melalui audio (sebagai alternatif teks) pada setiap soal dalam tes.

*Default: `true`*

### `allow_time_per_question`

**Aktifkan waktu per soal dalam tes**

Secara bawaan, hanya mungkin membatasi waktu per tes. Membatasinya per soal menambah lapisan kemungkinan tambahan, dan Anda dapat (dengan hati-hati) menggabungkan keduanya.

*Default: `false`*

### `block_category_questions`

**Kunci soal dari kategori sebelumnya dalam tes**

Saat menggunakan opsi ini, opsi tambahan akan muncul dalam konfigurasi tes. Saat menggunakan tes dengan beberapa kategori soal dan meminta distribusi berdasarkan kategori, ini akan memungkinkan pengguna menavigasi soal per kategori. Setelah suatu kategori selesai, ia berpindah ke kategori berikutnya dan tidak dapat kembali ke kategori sebelumnya.

*Default: `false`*

### `block_quiz_mail_notification_general_coach`

**Blokir pengiriman notifikasi tes kepada tutor umum**

Ketika peserta didik menyelesaikan tes, notifikasi biasanya dikirim kepada tutor, termasuk tutor sesi umum. Aktifkan opsi ini untuk menghilangkan tutor umum dari notifikasi tersebut.

*Default: `false`*

### `configure_exercise_visibility_in_course`

**Aktifkan untuk melewati konfigurasi Latihan tidak terlihat dalam sesi pada tingkat kursus dasar**

Untuk mengaktifkan konfigurasi ketidakvisibilan latihan dalam sesi pada kursus dasar agar melewati konfigurasi global. Jika tidak diatur, parameter global yang digunakan.

*Default: `false`*

### `disable_clean_exercise_results_for_teachers`

**Nonaktifkan 'bersihkan hasil' untuk pengajar**

Nonaktifkan opsi untuk menghapus hasil tes dari daftar tes. Ini sering digunakan ketika pengajar yang kurang teliti mengelola kursus, untuk menghindari kesalahan kritis.

*Default: `true`*

### `email_alert_manager_on_new_quiz`

**Pengaturan peringatan e-mail default pada kuis baru**

Apakah Anda ingin manajer kursus (pengajar) diberitahu melalui e-mail ketika sebuah kuis dijawab oleh siswa. Ini adalah nilai default yang diberikan kepada semua kursus baru, tetapi setiap pengajar masih dapat mengubah pengaturan ini di kursusnya sendiri.

*Default: `true`*

### `enable_quiz_scenario`

**Aktifkan skenario Kuis**

Dari sini Anda akan dapat membuat latihan yang mengusulkan pertanyaan berbeda tergantung pada jawaban pengguna.

*Default: `true`*

### `exercise_additional_teacher_modify_actions`

**Tautan tambahan untuk pengajar dalam daftar tes**

Konfigurasikan elemen callback untuk menghasilkan ikon aksi baru bagi pengajar di sisi kanan daftar tes, dalam bentuk array, misalnya ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Tampilkan nama pengguna di halaman hasil tes**

Tampilkan nama pengguna (sebagai pengganti, atau bersama dengan, info pengguna) pada halaman hasil tes.

*Default: `false`*

### `exercise_category_report_user_extra_fields`

**Tambahkan bidang ekstra pengguna dalam laporan kategori latihan**

Tentukan array dengan daftar bidang ekstra pengguna yang akan ditambahkan ke laporan.

### `exercise_category_round_score_in_export`

**Bulatkan skor dalam ekspor tes**

Jika diaktifkan, skor tes dibulatkan ke bilangan bulat terdekat saat mengekspor laporan latihan.

*Default: `false`*

### `exercise_embeddable_extra_types`

**Jenis pertanyaan yang dapat disematkan**

Secara default, hanya pertanyaan jawaban tunggal dan jawaban ganda yang dipertimbangkan saat memutuskan apakah sebuah tes dapat disematkan dalam video atau tidak. Dengan opsi ini, Anda dapat memutuskan bahwa lebih banyak jenis pertanyaan tersedia. Perhatikan bahwa tidak semua jenis pertanyaan cocok dengan baik di ruang yang dialokasikan untuk video. Jenis pertanyaan tersedia dalam kode di question.class.php.

### `exercise_hide_ip`

**Sembunyikan IP pengguna dari laporan tes**

Secara default, kami menampilkan informasi pengguna dan alamat IP-nya, tetapi ini mungkin dianggap sebagai data pribadi, jadi opsi ini memungkinkan Anda menghapus info ini dari semua laporan tes.

*Default: `false`*

### `exercise_hide_label`

**Sembunyikan pita pertanyaan (benar/salah) dalam hasil tes**

Dalam hasil tes, pita muncul secara default untuk menunjukkan apakah jawaban benar atau salah. Aktifkan opsi ini untuk menghapus pita secara global.

*Default: `false`*

### `exercise_invisible_in_session`

**Latihan tidak terlihat dalam Sesi**

Jika sebuah latihan terlihat di kursus dasar maka latihan tersebut muncul tidak terlihat dalam sesi. Jika sebuah latihan tidak terlihat di kursus dasar maka latihan tersebut tidak muncul dalam sesi.

*Default: `false`*

### `exercise_max_editors_in_page`

**Maksimum editor di layar hasil latihan**

Karena jumlah pertanyaan yang mungkin muncul dalam sebuah latihan, layar koreksi, yang memungkinkan pengajar menambahkan komentar pada setiap jawaban, mungkin sangat lambat untuk dimuat. Atur angka ini ke 5 untuk meminta platform hanya menampilkan editor WYSIWYG hingga jumlah jawaban tertentu di layar. Ini akan mempercepat waktu pemuatan halaman koreksi secara signifikan, tetapi akan menghapus editor WYSIWYG dan hanya menyisakan editor teks biasa.

*Default: `0`*


### `exercise_max_score`

**Skor maksimum latihan**

Tentukan skor maksimum (umumnya 10, 20, atau 100) untuk semua latihan di platform. Ini akan menentukan bagaimana hasil akhir ditampilkan kepada pengguna dan pengajar.

*Default: `20`*


### `exercise_min_score`

**Skor minimum latihan**

Tentukan skor minimum (umumnya 0) untuk semua latihan di platform. Ini akan menentukan bagaimana hasil akhir ditampilkan kepada pengguna dan pengajar.

*Default: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Lewati pemfilteran HTML dalam pesan akhir tes**

Anggap pesan di akhir tes selalu aman. Menghapus filter memungkinkan penggunaan JavaScript di sana.

*Default: `false`*


### `exercise_score_format`

**Format skor tes**

Pilih di antara bentuk berikut untuk tampilan skor pengguna dalam berbagai laporan: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Gunakan ID numerik dari bentuk yang ingin Anda gunakan.

*Default: `0`*

### `exercises_disable_new_attempts`

**Nonaktifkan percobaan tes baru**

Nonaktifkan percobaan tes baru secara global. Biasanya digunakan ketika ada masalah dengan tes secara umum dan Anda ingin waktu untuk menganalisis tanpa memblokir seluruh platform.

*Default: `false`*

### `hide_free_question_score`

**Sembunyikan skor pertanyaan terbuka**

Sembunyikan fakta bahwa pertanyaan terbuka (termasuk audio dan anotasi) memiliki skor dengan menyembunyikan tampilan skor di semua laporan yang dilihat peserta didik.

*Default: `false`*


### `hide_user_info_in_quiz_result`

**Sembunyikan info pengguna di halaman hasil tes**

Halaman hasil tes default menampilkan lembar data pengguna (foto, nama, dll.) yang dalam beberapa konteks mungkin dianggap mendekati batas perlakuan data pribadi. Aktifkan opsi ini untuk menghapus detail pengguna dari hasil tes.

*Default: `false`*


### `limit_exercise_teacher_access`

**Batasi izin pengajar atas tes**

Jika diaktifkan, pengajar tidak dapat menghapus tes maupun pertanyaan, mengubah visibilitas tes, mengunduh ke QTI, membersihkan hasil, dll.

*Default: `false`*


### `my_courses_show_pending_exercise_attempts`

**Daftar tes tertunda global**

Aktifkan untuk menampilkan kepada pengguna akhir sebuah halaman berisi daftar tes tertunda di semua kursus.

*Default: `false`*


### `question_exercise_html_strict_filtering`

**Lewati penyaringan HTML pada pertanyaan tes**

Anggap teks pertanyaan dalam tes selalu aman. Menghapus filter memungkinkan penggunaan JavaScript di sana.

*Default: `false`*


### `question_pagination_length`

**Panjang paginasi pertanyaan untuk pengajar**

Jumlah pertanyaan yang ditampilkan di setiap halaman saat menggunakan opsi paginasi pertanyaan untuk pengajar.

*Default: `20`*


### `quiz_answer_extra_recording`

**Aktifkan pencatatan jawaban tes tambahan**

Aktifkan pencatatan semua jawaban (bahkan yang sementara) di tabel track_e_attempt_recording. Fitur ini bersifat eksperimental dan dapat menimbulkan masalah di halaman pelaporan saat mencoba menilai tes.

*Default: `false`*


### `quiz_check_all_answers_before_end_test`

**Periksa semua jawaban sebelum mengirim tes**

Tampilkan popup berisi daftar pertanyaan yang sudah/belum dijawab sebelum mengirim tes.

*Default: `false`*


### `quiz_check_button_enable`

**Tambahkan pemeriksaan proses penyimpanan jawaban sebelum tes**

Pastikan pengguna siap memulai tes dengan menyediakan simulasi proses penyimpanan pertanyaan sebelum masuk ke tes. Hal ini memungkinkan deteksi dini beberapa masalah koneksi dan mengurangi gesekan pengalaman pengguna.

*Default: `false`*


### `quiz_confirm_saved_answers`

**Tambahkan kotak centang konfirmasi jumlah jawaban**

Opsi ini menambahkan kotak centang di akhir setiap tes yang meminta pengguna mengonfirmasi jumlah jawaban yang disimpan. Hal ini menyediakan data audit yang lebih baik untuk tes kritis.

*Default: `false`*


### `quiz_discard_orphan_in_course_export`

**Buang pertanyaan yatim saat ekspor kursus**

Saat mengekspor kursus, jangan ekspor pertanyaan yang bukan bagian dari tes mana pun.

*Default: `false`*


### `quiz_generate_certificate_ending`

**Hasilkan sertifikat saat tes berakhir**

Hasilkan sertifikat saat mengakhiri kuis. Kuis harus ditautkan di alat gradebook dan memiliki persentase kelulusan yang dikonfigurasi.

*Default: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Sembunyikan tabel percobaan tes di halaman mulai tes**

Sembunyikan tabel yang menampilkan semua percobaan sebelumnya di halaman mulai tes.

*Default: `false`*


### `quiz_hide_question_number`

**Sembunyikan nomor pertanyaan**

Sembunyikan penomoran bertahap pertanyaan saat mengerjakan tes.

*Default: `false`*


### `quiz_image_zoom`

**Aktifkan zoom gambar tes**

Aktifkan fitur ini untuk memungkinkan pengguna memperbesar gambar yang digunakan dalam tes.

### `quiz_keep_alive_ping_interval`

**Jaga sesi tetap aktif dalam tes**

Jaga sesi tetap aktif dengan mempertahankan sinyal ping berkala ke server setiap x detik, tentukan di sini. Kami merekomendasikan sekali setiap 300 detik.

*Default: `0`*


### `quiz_open_question_decimal_score`

**Skor desimal pada jenis pertanyaan terbuka**

Izinkan pengajar menilai jenis pertanyaan terbuka, ekspresi lisan, dan anotasi dengan skor desimal.

*Default: `false`*


### `quiz_prevent_copy_paste`

**Blokir salin-tempel dalam tes**

Blokir tombol salin/tempel/simpan/cetak dan klik kanan dalam latihan.

*Default: `false`*

### `quiz_question_category_destinations` **v3**

**Aktifkan tes adaptif progresif berdasarkan tujuan kategori**

Aktifkan tes adaptif progresif di mana setiap kategori pertanyaan dapat mengarahkan peserta didik ke kategori lain tergantung pada skor mereka.

*Default: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Hapus pertanyaan secara otomatis saat menghapus tes**

Perilaku default adalah menjadikan pertanyaan yatim ketika satu-satunya tes yang menggunakannya dihapus. Jika diaktifkan, opsi ini memastikan bahwa semua pertanyaan yang seharusnya menjadi yatim juga dihapus.

*Default: `false`*


### `quiz_results_answers_report`

**Tampilkan tautan unduh hasil tes**

Di halaman hasil tes, tampilkan tautan untuk mengunduh hasil sebagai berkas.

*Default: `false`*


### `quiz_show_description_on_results_page`

**Selalu tampilkan deskripsi tes di halaman hasil**

Jika diaktifkan, deskripsi tes selalu ditampilkan di halaman hasil setelah tes selesai.

*Default: `false`*

### `score_grade_model`

**Model nilai skor**

Tentukan array rentang skor dan warna untuk menampilkan laporan menggunakan model ini. Hal ini memungkinkan Anda menampilkan warna alih-alih nilai numerik.

### `send_score_in_exam_notification_mail_to_manager`

**Tambahkan skor dalam notifikasi email pengiriman tes**

Tambahkan skor peserta didik ke notifikasi e-mail yang dikirim kepada pengajar setelah tes dikirimkan.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Tampilkan percobaan tes dari semua sesi dalam laporan tes tertunda**

Tampilkan percobaan tes dari pengguna di semua sesi yang dapat diakses tutor umum dalam laporan tes tertunda.

*Default: `false`*


### `show_exercise_expected_choice`

**Tampilkan pilihan yang diharapkan dalam hasil tes**

Tampilkan pilihan yang diharapkan dan status (benar/salah) untuk setiap jawaban pada halaman hasil tes (jika tes telah dikonfigurasi untuk menampilkan hasil).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Tampilkan skor untuk pertanyaan tingkat kepastian**

Secara default, Chamilo tidak menampilkan skor untuk jenis pertanyaan tingkat kepastian.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Tampilkan percobaan tes dari semua sesi di kursus dasar**

Tampilkan percobaan tes dari pengguna di semua sesi kepada pengajar di kursus dasar.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Tampilkan kode resmi dalam hasil latihan**

Apakah kode resmi siswa ditampilkan dalam laporan hasil latihan

*Default: `false`*

### `show_question_id`

**Tampilkan ID pertanyaan dalam tes**

Tampilkan ID internal pertanyaan agar pengguna dapat mencatat masalah pada pertanyaan tertentu dan melaporkannya dengan lebih efisien.

*Default: `false`*


### `show_question_pagination`

**Tampilkan paginasi pertanyaan untuk pengajar**

Untuk tes dengan banyak pertanyaan, gunakan paginasi jika jumlah pertanyaan lebih tinggi dari pengaturan ini. Atur ke 0 untuk mencegah penggunaan paginasi.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Tampilkan tes yang dihapus di 'Kemajuan saya'**

Aktifkan opsi ini untuk menampilkan, pada halaman 'Kemajuan saya', hasil semua tes yang telah Anda kerjakan, termasuk yang telah dihapus.

*Default: `false`*