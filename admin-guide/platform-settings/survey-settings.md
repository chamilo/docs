# Pengaturan Survei

Pengaturan bawaan dan perilaku alat **Survei**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Survei**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `extend_rights_for_coach_on_survey`

**Perluas hak untuk pelatih pada survei**

Mengaktifkan opsi ini akan memungkinkan pelatih untuk membuat dan mengedit survei.

*Default: `true`*


### `hide_survey_edition`

**Cegah pengeditan survei**

Mencegah pengeditan survei untuk semua survei yang tercantum di sini (berdasarkan kode). Gunakan * untuk mencegah pengeditan semua survei.

### `hide_survey_reporting_button`

**Sembunyikan tombol pelaporan survei**

Memungkinkan admin untuk menyembunyikan tombol pelaporan survei jika survei digunakan untuk mengevaluasi guru.

*Default: `false`*


### `show_pending_survey_in_menu`

**Tampilkan "Survei Tertunda" di menu**

Menampilkan item menu yang memungkinkan pengguna mengakses survei tertunda mereka.

*Default: `false`*


### `show_surveys_base_in_sessions`

**Tampilkan survei dari kursus dasar di semua kursus sesi**

Membuat survei dari kursus dasar terlihat dan tersedia bagi peserta didik di semua kursus sesi terkait.

*Default: `false`*


### `survey_additional_teacher_modify_actions`

**Tambahkan tindakan tambahan (sebagai tautan) ke daftar survei untuk guru**

Menambahkan tindakan (biasanya terhubung ke plugin) dalam daftar survei. Gunakan sintaks array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Izinkan guru mengedit pertanyaan survei setelah siswa menjawab**

Mengizinkan instruktur untuk mengubah pertanyaan survei bahkan setelah peserta didik telah mengirimkan tanggapan.

*Default: `false`*


### `survey_anonymous_show_answered`

**Izinkan guru melihat siapa yang menjawab dalam survei anonim**

Mengizinkan guru untuk melihat peserta didik mana yang telah menjawab survei anonim. Ini hanya muncul setelah lebih dari satu pengguna menjawab, sehingga tetap sulit untuk mengidentifikasi siapa yang menjawab apa.

*Default: `false`*


### `survey_backwards_enable`

**Aktifkan tombol 'pertanyaan sebelumnya' dalam survei**

Mengaktifkan tombol navigasi "pertanyaan sebelumnya" untuk memungkinkan peserta didik meninjau pertanyaan survei sebelumnya.

*Default: `false`*


### `survey_duplicate_order_by_name`

**Urutkan berdasarkan nama siswa saat menggunakan fitur duplikasi survei**

Fitur duplikasi survei ditujukan untuk guru dan dimaksudkan untuk meminta guru memberikan penilaian tentang setiap siswa secara berurutan. Opsi ini akan mengurutkan pertanyaan berdasarkan nama belakang peserta didik.

*Default: `true`*


### `survey_email_sender_noreply`

**Pengirim email survei (tanpa balasan)**

Haruskah undangan survei menggunakan alamat email pelatih atau alamat tanpa balasan yang ditentukan di bagian konfigurasi utama?

*Default: `coach`*


### `survey_mark_question_as_required`

**Tandai semua pertanyaan survei sebagai 'wajib' secara bawaan**

Secara otomatis menandai semua pertanyaan survei yang baru dibuat sebagai tanggapan wajib secara bawaan.

*Default: `false`*