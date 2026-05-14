# Pengaturan Jalur Pembelajaran

Pengaturan bawaan dan perilaku alat **Jalur Pembelajaran** — autostart, tampilan bawaan, prasyarat, perilaku SCORM, dan sejenisnya.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Jalur Pembelajaran**. Kategori ini berisi **51 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `add_all_files_in_lp_export`

**Ekspor semua file saat mengekspor jalur pembelajaran**

Saat mengekspor LP, semua file dan folder di jalur yang sama dengan file html juga akan diekspor.

*Default: `false`*

### `allow_htaccess_import_from_scorm`

**Izinkan .htaccess dari paket SCORM**

Biasanya, semua file .htaccess difilter dan dihapus saat mengimpor konten di Chamilo. Fitur ini memungkinkan .htaccess diimpor jika ada dalam paket SCORM.

*Default: `false`*

### `allow_import_scorm_package_in_course_builder`

**Impor SCORM dalam impor kursus**

Aktifkan untuk menyalin struktur direktori paket SCORM saat memulihkan kursus (dari alat pemeliharaan kursus).

*Default: `false`*

### `allow_lp_chamilo_export`

**Ekspor jalur pembelajaran dalam format cadangan Chamilo**

Aktifkan kemungkinan untuk mengekspor jalur pembelajaran Anda dalam format cadangan kursus Chamilo.

*Default: `false`*

### `allow_lp_return_link`

**Tampilkan tautan kembali jalur pembelajaran**

Nonaktifkan opsi ini untuk menyembunyikan tombol 'Kembali ke beranda' di jalur pembelajaran.

*Default: `true`*

### `allow_lp_subscription_to_usergroups`

**Langganan jalur pembelajaran untuk kelas**

Aktifkan langganan ke jalur pembelajaran dan kategori jalur pembelajaran untuk grup/kelas.

*Default: `false`*

### `allow_session_lp_category`

**Kategori jalur pembelajaran dapat dikelola dalam sesi**

[disimpulkan] Aktifkan peserta didik dan instruktur untuk mengatur dan mengelola jalur pembelajaran berdasarkan kategori dalam kursus sesi.

*Default: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Guru dapat mengakses jalur pembelajaran yang diblokir**

Guru tidak perlu menyelesaikan jalur pembelajaran untuk memiliki akses ke jalur pembelajaran yang diblokir oleh prasyarat.

*Default: `false`*

### `disable_js_in_lp_view`

**Nonaktifkan JS dalam tampilan jalur pembelajaran**

Nonaktifkan file JS yang biasanya ditambahkan Chamilo ke file HTML di jalur pembelajaran (saat menampilkannya).

*Default: `false`*

### `disable_my_lps_page`

**Sembunyikan halaman 'Jalur Pembelajaran Saya'**

Halaman 'Jalur Pembelajaran Saya' ditambahkan pada versi 1.11. Gunakan opsi ini untuk menyembunyikannya.

*Default: `false`*

### `download_files_after_all_lp_finished`

**Tombol unduh setelah menyelesaikan jalur pembelajaran**

Tampilkan tombol unduh file setelah menyelesaikan semua LP. Contoh: jika ABC adalah kode kursus, dan 1 serta 100 adalah ID dokumen, pilih: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Pengeditan tes yang termasuk dalam jalur pembelajaran**

Aktifkan pengeditan tes meskipun telah dimasukkan ke dalam jalur pembelajaran. Bawaan adalah mencegah pengeditan jika tes ada di jalur pembelajaran, karena itu dapat memengaruhi konsistensi pelacakan di antara banyak peserta didik jika modifikasi tes signifikan.

*Default: `false`*

### `hide_accessibility_label_on_lp_item`

**Sembunyikan label persyaratan di jalur pembelajaran**

Sembunyikan tooltip prasyarat pada item jalur pembelajaran. Ini lebih merupakan pilihan estetika.

*Default: `true`*

### `hide_lp_time`

**Sembunyikan waktu dari catatan jalur pembelajaran**

Sembunyikan waktu yang dihabiskan di jalur pembelajaran dalam laporan secara umum.

*Default: `false`*

### `hide_scorm_copy_link`

**Sembunyikan Salin SCORM**

Sembunyikan ikon Salin Jalur Pembelajaran dari daftar Jalur Pembelajaran.

*Default: `false`*

### `hide_scorm_export_link`

**Sembunyikan Ekspor SCORM**

Sembunyikan ikon Ekspor SCORM dari daftar Jalur Pembelajaran.

*Default: `false`*

### `hide_scorm_pdf_link`

**Sembunyikan ekspor PDF Jalur Pembelajaran**

Sembunyikan ikon Ekspor PDF Jalur Pembelajaran dari daftar Jalur Pembelajaran.

*Default: `true`*

### `lp_allow_export_to_students`

**Peserta didik dapat mengekspor jalur pembelajaran**

Aktifkan ini untuk memungkinkan peserta didik mengunduh jalur pembelajaran sebagai paket SCORM.

*Default: `false`*

### `lp_enable_flow`

**Navigasi antar jalur pembelajaran**

Tambahkan kemungkinan untuk memilih jalur pembelajaran 'berikutnya' dan tampilkan tombol di dalam jalur pembelajaran untuk berpindah dari satu ke yang berikutnya.

*Default: `false`*

### `lp_fixed_encoding`

**Pengkodean tetap di jalur pembelajaran**

Kurangi penggunaan sumber daya dengan mengabaikan pemeriksaan pada pengkodean teks di jalur pembelajaran yang diimpor.

*Default: `false`*

### `lp_item_prerequisite_dates`

**Prasyarat item jalur pembelajaran berbasis tanggal**

Tambahkan opsi untuk menentukan prasyarat dengan tanggal mulai dan akhir untuk item jalur pembelajaran.

*Default: `false`*

---
### `lp_menu_location`

**Lokasi Menu Jalur Pembelajaran**

Atur ke 'left' atau 'right' untuk mengubah sisi dari menu jalur pembelajaran.

*Default: `left`*

### `lp_minimum_time`

**Waktu Minimum untuk Menyelesaikan Jalur Pembelajaran**

Tambahkan kolom waktu minimum pada jalur pembelajaran. Jika pengguna belum menghabiskan waktu sebanyak itu di jalur pembelajaran, item terakhir dari jalur pembelajaran tidak dapat diselesaikan.

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Buka Item Jalur Pembelajaran jika Batas Maksimum Percobaan Tercapai untuk Tes Prasyarat**

[disimpulkan] Secara otomatis membuka item jalur pembelajaran berikutnya ketika peserta didik telah menghabiskan jumlah maksimum percobaan kuis untuk tes prasyarat.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Buka Prasyarat setelah Percobaan Tes Terakhir**

Memungkinkan pengguna untuk melanjutkan di jalur pembelajaran setelah menggunakan semua percobaan kuis dari tes yang digunakan sebagai prasyarat untuk item lain.

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Gunakan Skor Terakhir dalam Prasyarat Tes Jalur Pembelajaran**

Ketika tes digunakan sebagai prasyarat untuk item di jalur pembelajaran, gunakan hanya percobaan terakhir dari tes sebagai validasi untuk prasyarat (default adalah menggunakan percobaan terbaik).

*Default: `false`*

### `lp_prevents_beforeunload`

**Cegah Event JS beforeunload di Jalur Pembelajaran**

Ini membantu dengan kompatibilitas browser dengan mencegah event JS yang rumit untuk dijalankan.

*Default: `false`*

### `lp_score_as_progress_enable`

**Gunakan Skor Jalur Pembelajaran sebagai Kemajuan**

Ini berguna ketika menggunakan konten SCORM dengan hanya satu SCO besar. SCORM tidak mengkomunikasikan kemajuan, jadi ini adalah trik untuk menggunakan skor sebagai kemajuan. Mengaktifkan opsi ini akan memungkinkan Anda mengonfigurasi ini berdasarkan per jalur pembelajaran.

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**Tampilkan Kemajuan Maksimum daripada Rata-rata untuk Pelaporan Jalur Pembelajaran**

[disimpulkan] Hitung kemajuan jalur pembelajaran berdasarkan penyelesaian item maksimum daripada merata-ratakan semua item.

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Pilih Kemajuan Maksimum vs Rata-rata untuk Jalur Pembelajaran di Tingkat Kursus**

Aktifkan redefinisi pengaturan untuk menampilkan kemajuan terbaik daripada rata-rata dalam pelaporan jalur pembelajaran di tingkat kursus.

*Default: `false`*

### `lp_show_reduced_report`

**Jalur Pembelajaran: Tampilkan Laporan yang Disederhanakan**

Di dalam alat jalur pembelajaran, ketika pengguna meninjau kemajuan mereka sendiri (melalui ikon statistik), tampilkan versi laporan kemajuan yang lebih pendek (kurang rinci).

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Tampilkan Ketersediaan Jalur Pembelajaran kepada Peserta Didik**

Tampilkan jalur pembelajaran kepada peserta didik dengan tanggal ketersediaannya, daripada menyembunyikannya sampai tanggal tersebut tiba.

*Default: `false`*

### `lp_subscription_settings`

**Pengaturan Langganan Jalur Pembelajaran**

Konfigurasikan opsi tambahan untuk fitur langganan jalur pembelajaran. Opsi termasuk 'allow_add_users_to_lp' dan 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Item Jalur Pembelajaran yang Dapat Dilipat**

[disimpulkan] Tampilkan item jalur pembelajaran dalam format akordeon yang dapat dilipat untuk navigasi dan organisasi konten yang lebih baik.

*Default: `false`*

### `lp_view_settings`

**Pengaturan Tampilan Jalur Pembelajaran**

Konfigurasikan opsi tambahan untuk tampilan jalur pembelajaran. Opsi termasuk 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle', dan 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Gunakan Kolom Ekstra sebagai student_id dalam Komunikasi SCORM**

Berikan nama kolom ekstra yang akan digunakan sebagai student_id untuk semua komunikasi SCORM.

### `scorm_api_username_as_student_id`

**Gunakan Nama Pengguna sebagai student_id dalam Komunikasi SCORM**

[disimpulkan] Gunakan nama pengguna peserta didik sebagai pengenal siswa dalam komunikasi API SCORM alih-alih ID peserta didik.

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**Perbarui Status SCO secara Otonom**

Jika SCO tidak mengirimkan status, ambil alih dan perbarui status berdasarkan apa yang dapat diamati di Chamilo.

*Default: `false`*

### `scorm_upload_from_cache`

**Unggah SCORM dari Direktori Cache**

Izinkan admin untuk mengunggah paket SCORM (dalam bentuk zip) ke direktori cache dan menggunakannya sebagai sumber impor di halaman unggah SCORM.

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**Tampilkan Tes dari Jalur Pembelajaran meskipun Tidak Terlihat**

Tampilkan latihan tersembunyi yang ditambahkan ke LP dalam daftar latihan. Jika kita berada dalam sesi, tes tidak terlihat di kursus dasar, itu termasuk dalam LP dan pengaturan untuk menampilkannya tidak secara khusus diatur ke true, maka sembunyikan.

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**Tampilkan Tes dalam Daftar Tes Jalur Pembelajaran meskipun Tidak Terlihat**

[disimpulkan] Sertakan tes tersembunyi dalam daftar tes yang tersedia saat melihat isi jalur pembelajaran.

*Default: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Tes tak terlihat ditampilkan dalam jalur pembelajaran**

Membuat tes yang ditandai sebagai 'tak terlihat' di alat tes muncul ketika dimasukkan ke dalam jalur pembelajaran.

*Default: `false`*

### `show_invisible_lp_in_course_home`

**Tampilkan tautan ke jalur pembelajaran di beranda kursus saat tak terlihat**

Jika jalur pembelajaran diatur sebagai tak terlihat tetapi pengajar/pelatih memutuskan untuk membuatnya tersedia dari beranda kursus, opsi ini mencegah Chamilo menyembunyikan tautan di beranda kursus.

*Default: `false`*

### `show_prerequisite_as_blocked`

**Prasyarat jalur pembelajaran**

Pada daftar jalur pembelajaran, tampilkan elemen visual untuk menunjukkan bahwa jalur pembelajaran lain saat ini diblokir oleh aturan prasyarat tertentu.

*Default: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Tambahkan kolom akuisisi di halaman tindak lanjut peserta didik**

Tambahkan kolom ke halaman tindak lanjut peserta didik untuk menunjukkan status akuisisi oleh peserta didik pada jalur pembelajaran.

*Default: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Tambahkan informasi visibilitas untuk jalur pembelajaran di halaman tindak lanjut peserta didik**

Menampilkan indikator status visibilitas untuk jalur pembelajaran di halaman pelacakan kemajuan peserta didik.

*Default: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informasi tidak terkunci di daftar jalur pembelajaran**

Ini menambahkan kolom 'tidak terkunci' di daftar jalur pembelajaran jika peserta didik berlangganan ke jalur pembelajaran tersebut dan memiliki akses ke sana.

*Default: `false`*

### `student_follow_page_hide_lp_tests_average`

**Sembunyikan tanda persentase pada rata-rata tes di jalur pembelajaran di tindak lanjut peserta didik**

Menyembunyikan ikon persentase pada indikasi 'Rata-rata tes di Jalur Pembelajaran' pada pelacakan siswa.

*Default: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Sertakan jalur pembelajaran yang tidak diikuti di halaman tindak lanjut peserta didik**

Menampilkan jalur pembelajaran di halaman kemajuan meskipun peserta didik tidak berlangganan ke jalur tersebut.

*Default: `false`*

### `ticket_lp_quiz_info_add`

**Tambahkan informasi jalur pembelajaran dan tes ke laporan tiket**

Menyertakan informasi jalur pembelajaran dan tes dalam laporan tiket dukungan untuk pelacakan masalah yang lebih baik.

*Default: `false`*

### `validate_lp_prerequisite_from_other_session`

**Gunakan status item jalur pembelajaran dari sesi lain**

Mengizinkan pengguna untuk menyelesaikan prasyarat dalam jalur pembelajaran jika item yang sesuai sudah diselesaikan di sesi lain.

*Default: `false`*