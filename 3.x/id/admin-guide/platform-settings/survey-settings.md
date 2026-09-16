# Pengaturan Survei

Nilai bawaan dan perilaku alat **Surveys**.

Akses pengaturan ini di **Administration > Configuration settings > Surveys**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `extend_rights_for_coach_on_survey`

**Perluas hak tutor pada survei**

Aktifkan opsi ini untuk mengizinkan tutor membuat dan mengedit survei

*Default: `true`*


### `hide_survey_edition`

**Cegah pengeditan survei**

Cegah pengeditan survei untuk semua survei yang tercantum di sini (berdasarkan kode). Gunakan * untuk mencegah pengeditan semua survei.

### `hide_survey_reporting_button`

**Sembunyikan tombol pelaporan survei**

Memungkinkan admin menyembunyikan tombol pelaporan survei jika survei digunakan untuk mensurvei pengajar.

*Default: `false`*


### `show_pending_survey_in_menu`

**Tampilkan "Pending surveys" di menu**

Tampilkan item menu yang memungkinkan pengguna mengakses survei yang masih tertunda.

*Default: `false`*


### `show_surveys_base_in_sessions`

**Tampilkan survei dari kursus dasar di semua kursus sesi**

[inferred] Jadikan survei dari kursus dasar terlihat dan tersedia bagi peserta didik di semua kursus sesi terkait.

*Default: `false`*


### `survey_additional_teacher_modify_actions`

**Tambahkan tindakan tambahan (sebagai tautan) ke daftar survei untuk pengajar**

Tambahkan tindakan (biasanya terhubung ke plugin) dalam daftar survei. Gunakan sintaks array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Izinkan pengajar mengedit pertanyaan survei setelah mahasiswa menjawab**

[inferred] Izinkan instruktur mengubah pertanyaan survei meskipun peserta didik telah mengirimkan jawaban.

*Default: `false`*


### `survey_anonymous_show_answered`

**Izinkan pengajar melihat siapa yang menjawab dalam survei anonim**

Izinkan pengajar melihat peserta didik mana yang sudah menjawab survei anonim. Ini hanya muncul setelah lebih dari satu pengguna menjawab, sehingga tetap sulit mengidentifikasi siapa menjawab apa.

*Default: `false`*


### `survey_backwards_enable`

**Aktifkan tombol 'previous question' dalam survei**

[inferred] Aktifkan tombol navigasi "previous question" agar peserta didik dapat meninjau pertanyaan survei sebelumnya.

*Default: `false`*


### `survey_duplicate_order_by_name`

**Urutkan berdasarkan nama mahasiswa saat menggunakan fitur duplikasi survei**

Fitur duplikasi survei berorientasi pada pengajar dan dimaksudkan untuk meminta pengajar memberikan penilaian tentang setiap mahasiswa secara berurutan. Opsi ini akan mengurutkan pertanyaan berdasarkan nama belakang peserta didik.

*Default: `true`*


### `survey_email_sender_noreply`

**Pengirim e-mail survei (no-reply)**

Haruskah undangan survei menggunakan alamat e-mail tutor atau alamat no-reply yang didefinisikan di bagian konfigurasi utama?

*Default: `coach`* (pilihan "Course tutor email sender" — nilai yang disimpan tidak berubah dari versi Chamilo sebelumnya, tetapi opsi tersebut diberi label "tutor" di antarmuka)


### `survey_mark_question_as_required`

**Tandai semua pertanyaan survei sebagai 'required' secara default**

[inferred] Secara otomatis tandai semua pertanyaan survei yang baru dibuat sebagai jawaban wajib secara default.

*Default: `false`*