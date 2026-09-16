# Pengaturan Learning Paths

Nilai bawaan dan perilaku alat **Learning Paths** — autostart, tampilan bawaan, prasyarat, perilaku SCORM, dan sejenisnya.

Akses pengaturan ini di **Administration > Configuration settings > Learning Paths**. Kategori ini berisi **51 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirim dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut secara global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `add_all_files_in_lp_export`

**Ekspor semua berkas saat mengekspor learning path**

Saat mengekspor LP, semua berkas dan folder pada path yang sama dengan html juga akan diekspor.

*Default: `false`*


### `allow_htaccess_import_from_scorm`

**Izinkan .htaccess dari paket SCORM**

Biasanya, semua berkas .htaccess disaring dan dihapus saat mengimpor konten ke Chamilo. Fitur ini mengizinkan .htaccess diimpor jika ada dalam paket SCORM.

*Default: `false`*


### `allow_import_scorm_package_in_course_builder`

**Impor SCORM dalam impor kursus**

Aktifkan penyalinan struktur direktori paket SCORM saat memulihkan kursus (dari alat pemeliharaan kursus).

*Default: `false`*


### `allow_lp_chamilo_export`

**Ekspor learning paths dalam format cadangan Chamilo**

Aktifkan kemungkinan untuk mengekspor learning path mana pun dalam format cadangan kursus Chamilo.

*Default: `false`*


### `allow_lp_return_link`

**Tampilkan tautan kembali learning paths**

Nonaktifkan opsi ini untuk menyembunyikan tombol 'Return to homepage' di learning paths

*Default: `true`*


### `allow_lp_subscription_to_usergroups`

**Langganan learning paths untuk kelas**

Aktifkan langganan ke learning paths dan kategori learning path untuk grup/kelas.

*Default: `false`*


### `allow_session_lp_category`

**Kategori learning paths dapat dikelola dalam sesi**

[inferred] Izinkan peserta didik dan instruktur untuk mengorganisasi dan mengelola learning paths berdasarkan kategori dalam kursus sesi.

*Default: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Pengajar dapat mengakses learning paths yang diblokir**

Pengajar tidak perlu menyelesaikan learning paths secara lengkap untuk dapat mengakses learning path yang diblokir oleh prasyarat.

*Default: `false`*


### `disable_js_in_lp_view`

**Nonaktifkan JS dalam tampilan learning paths**

Nonaktifkan berkas JS yang biasanya ditambahkan Chamilo ke berkas HTML dalam learning path (saat menampilkannya).

*Default: `false`*


### `disable_my_lps_page`

**Sembunyikan halaman 'My learning paths'**

Halaman 'My learning path' ditambahkan pada 1.11. Gunakan opsi ini untuk menyembunyikannya.

*Default: `false`*

### `download_files_after_all_lp_finished`

**Tombol unduh setelah menyelesaikan learning paths**

Tampilkan tombol unduh berkas setelah semua LP selesai. Contoh: jika ABC adalah kode kursus, dan 1 serta 100 adalah id dokumen, pilih: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Penyuntingan tes yang disertakan dalam learning paths**

Aktifkan penyuntingan tes meskipun tes tersebut telah disertakan dalam learning path. Nilai bawaan adalah mencegah penyuntingan jika tes berada dalam learning path, karena hal itu dapat memengaruhi konsistensi pelacakan di antara banyak peserta didik jika perubahan tes signifikan.

*Default: `false`*

### `hide_accessibility_label_on_lp_item`

**Sembunyikan label persyaratan dalam learning paths**

Sembunyikan tooltip prasyarat pada item learning path. Ini sebagian besar merupakan pilihan estetika.

*Default: `true`*

### `hide_lp_time`

**Sembunyikan waktu dari catatan learning paths**

Sembunyikan waktu yang dihabiskan pada learning paths dalam laporan secara umum.

*Default: `false`*

### `hide_scorm_copy_link`

**Sembunyikan SCORM Copy**

Sembunyikan ikon Learning Path Copy dari daftar Learning Paths

*Default: `false`*

### `hide_scorm_export_link`

**Sembunyikan SCORM Export**

Sembunyikan ikon SCORM Export dari daftar Learning Paths

*Default: `false`*

### `hide_scorm_pdf_link`

**Sembunyikan ekspor PDF Learning Path**

Sembunyikan ikon Learning Path PDF Export dari daftar Learning Paths

*Default: `true`*

### `lp_allow_export_to_students`

**Peserta didik dapat mengekspor learning paths**

Aktifkan opsi ini untuk mengizinkan peserta didik mengunduh learning paths sebagai paket SCORM.

*Default: `false`*

### `lp_enable_flow`

**Navigasi antar learning paths**

Tambahkan kemungkinan untuk memilih learning path 'berikutnya' dan menampilkan tombol di dalam learning path untuk berpindah dari satu ke yang berikutnya.

*Default: `false`*

### `lp_fixed_encoding`

**Pengodean tetap dalam learning path**

Kurangi penggunaan sumber daya dengan mengabaikan pemeriksaan pengodean teks pada learning paths yang diimpor.

*Default: `false`*

### `lp_item_prerequisite_dates`

**Prasyarat item learning path berbasis tanggal**

Menambahkan opsi untuk menentukan prasyarat dengan tanggal mulai dan selesai untuk item learnpath.

*Default: `false`*

### `lp_menu_location`

**Lokasi menu jalur pembelajaran**

Atur ke 'left' atau 'right' untuk mengubah sisi menu jalur pembelajaran.

*Default: `left`*

### `lp_minimum_time`

**Waktu minimum untuk menyelesaikan jalur pembelajaran**

Tambahkan kolom waktu minimum pada jalur pembelajaran. Jika pengguna belum menghabiskan waktu sebanyak itu pada jalur pembelajaran, item terakhir jalur pembelajaran tidak dapat diselesaikan.

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Buka kunci item jalur pembelajaran jika percobaan maksimum tercapai untuk prasyarat tes**

[inferred] Secara otomatis membuka kunci item jalur pembelajaran berikutnya ketika peserta didik menghabiskan percobaan kuis maksimum untuk tes prasyarat.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Buka kunci prasyarat setelah percobaan tes terakhir**

Memungkinkan pengguna untuk melanjutkan dalam jalur pembelajaran setelah menggunakan semua percobaan kuis dari tes yang digunakan sebagai prasyarat untuk item lain.

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Gunakan skor terakhir pada prasyarat tes jalur pembelajaran**

Ketika tes digunakan sebagai prasyarat untuk suatu item dalam jalur pembelajaran, gunakan hanya percobaan terakhir tes tersebut sebagai validasi prasyarat (default adalah menggunakan percobaan terbaik).

*Default: `false`*

### `lp_prevents_beforeunload`

**Cegah peristiwa JS beforeunload pada jalur pembelajaran**

Ini membantu kompatibilitas peramban dengan mencegah peristiwa JS yang rumit dieksekusi.

*Default: `false`*

### `lp_score_as_progress_enable`

**Gunakan skor jalur pembelajaran sebagai kemajuan**

Ini berguna saat menggunakan konten SCORM dengan hanya satu SCO yang besar. SCORM tidak mengomunikasikan kemajuan, sehingga ini adalah trik untuk menggunakan skor sebagai kemajuan. Mengaktifkan opsi ini memungkinkan Anda mengonfigurasinya per jalur pembelajaran.

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**Tampilkan kemajuan maksimum alih-alih rata-rata untuk pelaporan jalur pembelajaran**

[inferred] Hitung kemajuan jalur pembelajaran berdasarkan penyelesaian item maksimum, bukan merata-ratakan semua item.

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Pilih kemajuan maksimum vs rata-rata untuk jalur pembelajaran pada tingkat kursus**

Aktifkan pendefinisian ulang pengaturan untuk menampilkan kemajuan terbaik alih-alih rata-rata dalam pelaporan jalur pembelajaran pada tingkat kursus.

*Default: `false`*

### `lp_show_reduced_report`

**Jalur pembelajaran: tampilkan laporan yang dipersingkat**

Di dalam alat jalur pembelajaran, ketika pengguna meninjau kemajuannya sendiri (melalui ikon statistik), tampilkan versi laporan kemajuan yang dipersingkat (kurang rinci).

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Tampilkan ketersediaan jalur pembelajaran kepada peserta didik**

Tampilkan jalur pembelajaran kepada peserta didik beserta tanggal ketersediaannya, alih-alih menyembunyikannya hingga tanggal tersebut tiba.

*Default: `false`*

### `lp_subscription_settings`

**Pengaturan langganan jalur pembelajaran**

Konfigurasikan opsi tambahan untuk fitur langganan jalur pembelajaran. Opsi mencakup 'allow_add_users_to_lp' dan 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Item jalur pembelajaran yang dapat dilipat**

[inferred] Tampilkan item jalur pembelajaran dalam format akordeon yang dapat dilipat untuk navigasi dan organisasi konten yang lebih baik.

*Default: `false`*

### `lp_view_settings`

**Pengaturan tampilan jalur pembelajaran**

Konfigurasikan opsi tambahan untuk tampilan jalur pembelajaran. Opsi mencakup 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' dan 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Gunakan kolom ekstra sebagai student\_id dalam komunikasi SCORM**

Berikan nama kolom ekstra yang akan digunakan sebagai student_id untuk semua komunikasi SCORM.

### `scorm_api_username_as_student_id`

**Gunakan nama pengguna sebagai student\_id dalam komunikasi SCORM**

[inferred] Gunakan nama pengguna peserta didik sebagai pengidentifikasi siswa dalam komunikasi API SCORM alih-alih ID peserta didik.

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**Perbarui status SCO secara otonom**

Jika SCO tidak mengirimkan status, ambil alih dan perbarui status berdasarkan apa yang dapat diamati di Chamilo.

*Default: `false`*

### `scorm_upload_from_cache`

**Unggah SCORM dari direktori cache**

Izinkan administrator mengunggah paket SCORM (dalam bentuk zip) ke direktori cache dan menggunakannya sebagai sumber impor pada halaman unggah SCORM.

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**Tampilkan tes dari jalur pembelajaran meskipun tidak terlihat**

Tampilkan latihan tersembunyi yang ditambahkan ke LP dalam daftar latihan. Jika kita berada dalam sesi, tes tidak terlihat di kursus dasar, tes tersebut disertakan dalam LP, dan pengaturan untuk menampilkannya tidak secara khusus diatur ke true, maka sembunyikan.

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**Tampilkan tes dalam daftar tes jalur pembelajaran meskipun tidak terlihat**

[inferred] Sertakan tes tersembunyi dalam daftar tes yang tersedia saat melihat isi jalur pembelajaran.

*Default: `false`*

### `show_invisible_exercise_in_lp_toc`

**Tes tak terlihat ditampilkan dalam jalur pembelajaran**

Membuat tes yang ditandai sebagai 'tak terlihat' di alat tes tetap muncul ketika tes tersebut disertakan dalam suatu jalur pembelajaran.

*Default: `false`*

### `show_invisible_lp_in_course_home`

**Tampilkan tautan ke jalur pembelajaran di beranda kursus saat tak terlihat**

Jika suatu jalur pembelajaran diatur sebagai tak terlihat tetapi pengajar/tutor memutuskan untuk menyediakannya dari beranda kursus, opsi ini mencegah Chamilo menyembunyikan tautan tersebut di beranda kursus.

*Default: `false`*

### `show_prerequisite_as_blocked`

**Prasyarat jalur pembelajaran**

Pada daftar jalur pembelajaran, tampilkan elemen visual yang menunjukkan bahwa jalur pembelajaran lain saat ini diblokir oleh suatu aturan prasyarat.

*Default: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Tambahkan kolom akuisisi pada tindak lanjut peserta didik**

Tambahkan kolom pada halaman tindak lanjut peserta didik untuk menampilkan status akuisisi peserta didik pada suatu jalur pembelajaran.

*Default: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Tambahkan informasi visibilitas untuk jalur pembelajaran pada halaman tindak lanjut peserta didik**

[inferred] Tampilkan indikator status visibilitas untuk jalur pembelajaran pada halaman pelacakan kemajuan peserta didik.

*Default: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informasi terbuka pada daftar jalur pembelajaran**

Opsi ini menambahkan kolom 'terbuka' pada daftar jalur pembelajaran jika peserta didik terdaftar pada jalur pembelajaran tersebut dan memiliki akses ke dalamnya.

*Default: `false`*

### `student_follow_page_hide_lp_tests_average`

**Sembunyikan tanda persentase pada rata-rata tes dalam jalur pembelajaran di tindak lanjut peserta didik**

Menyembunyikan ikon persentase pada indikasi 'Rata-rata tes dalam Jalur Pembelajaran' pada pelacakan peserta didik

*Default: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Sertakan jalur pembelajaran yang tidak didaftarkan pada halaman tindak lanjut peserta didik**

[inferred] Tampilkan jalur pembelajaran pada halaman kemajuan meskipun peserta didik tidak terdaftar pada jalur tersebut.

*Default: `false`*

### `ticket_lp_quiz_info_add`

**Tambahkan informasi jalur pembelajaran dan tes ke pelaporan tiket**

[inferred] Sertakan informasi jalur pembelajaran dan tes dalam pelaporan tiket dukungan untuk pelacakan isu yang lebih baik.

*Default: `false`*

### `validate_lp_prerequisite_from_other_session`

**Gunakan status item jalur pembelajaran dari sesi lain**

Izinkan pengguna menyelesaikan prasyarat dalam suatu jalur pembelajaran jika item yang bersangkutan sudah diselesaikan pada sesi lain.

*Default: `false`*