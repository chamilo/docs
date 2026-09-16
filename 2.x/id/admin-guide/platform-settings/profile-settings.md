# Pengaturan Profil Pengguna

Bidang mana yang muncul di profil pengguna, mana yang dapat diedit oleh pengguna, dan preferensi terkait.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Profil Pengguna**. Kategori ini berisi **29 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `account_valid_duration`

**Validitas Akun**

Akun pengguna berlaku selama jumlah hari ini setelah dibuat

*Default: `3660`*

### `add_user_course_information_in_mailto`

**Isi awal email dengan info pengguna dan kursus di kontak footer**

Tambahkan subjek dan isi di mailto: footer.

*Default: `false`*

### `allow_show_linkedin_url`

**Izinkan menampilkan URL LinkedIn pengguna**

Tambahkan tautan di blok sosial pengguna, yang memungkinkan mengunjungi profil LinkedIn pengguna

### `allow_show_skype_account`

**Izinkan menampilkan akun Skype pengguna**

Tambahkan tautan di blok sosial pengguna yang memungkinkan memulai obrolan melalui Skype

### `allow_social_map_fields`

**Geolokasi pengguna di peta**

Aktifkan tampilan peta di jejaring sosial yang memungkinkan Anda menemukan lokasi pengguna lain. Ini mencakup beberapa posisi (saat ini dan tujuan) yang harus ditentukan sebagai alamat atau koordinat di bidang tambahan terpisah. Bidang tambahan harus diatur sebagai array di sini.

### `allow_teachers_to_classes`

**Izinkan guru mengelola kelas**

Memungkinkan guru untuk mengelola grup kelas dan keanggotaannya dalam sistem.

*Default: `false`*

### `allow_user_headings`

**Izinkan profil pengguna di dalam kursus**

Dapatkah seorang guru menentukan bidang profil peserta didik untuk mengambil informasi tambahan?

### `allow_users_to_change_email_with_no_password`

**Izinkan pengguna mengubah email tanpa kata sandi**

Saat mengubah informasi akun

*Default: `false`*

### `changeable_options`

**Bidang yang diizinkan untuk diubah pengguna di profil mereka**

Pilih bidang yang dapat diubah pengguna di halaman profil mereka.

### `enable_profile_user_address_geolocalization`

**Aktifkan geolokasi pengguna**

Aktifkan bidang alamat pengguna dan tampilkan di peta menggunakan fitur geolokasi

### `extended_profile`

**Portofolio**

Jika pengaturan ini aktif, pengguna dapat mengisi bidang opsional berikut: 'Area terbuka pribadi saya', 'Kompetensi saya', 'Diploma saya', 'Apa yang dapat saya ajarkan'

*Default: `false`*

### `hide_username_in_course_chat`

**Sembunyikan nama pengguna di obrolan kursus**

Di obrolan kursus, sembunyikan nama pengguna. Hanya tampilkan nama orang.

*Default: `false`*

### `hide_username_with_complete_name`

**Sembunyikan nama pengguna saat sudah menampilkan nama lengkap**

Beberapa fungsi internal akan mengembalikan nama pengguna saat mengembalikan nama lengkap pengguna. Dengan opsi ini diaktifkan, Anda memastikan nama pengguna tidak akan muncul.

*Default: `false`*

### `linkedin_organization_id`

**ID Organisasi LinkedIn**

Saat membagikan lencana di LinkedIn, LinkedIn memungkinkan Anda untuk menetapkan ID organisasi yang akan terhubung ke halaman LinkedIn organisasi Anda (untuk menghubungkan organisasi yang memberikan lencana).

*Default: `false`*

### `login_is_email`

**Gunakan email sebagai nama pengguna**

Gunakan email untuk masuk ke sistem

*Default: `false`*

### `my_space_users_items_per_page`

**Jumlah item default per halaman di mySpace**

Jumlah catatan yang ditampilkan per halaman di bagian pelacakan MySpace (pengguna, statistik pekerjaan, daftar siswa).

*Default: `10`*

### `pass_reminder_custom_link`

**Halaman khusus untuk pengingat kata sandi**

Tetapkan URL Anda sendiri ke halaman pengaturan ulang kata sandi. Berguna saat menggunakan sistem manajemen akun federasi.

### `profile_fields_visibility`

**Bidang yang terlihat di halaman profil**

Array bidang dan apakah (boolean) mereka terlihat atau tidak di halaman profil pengguna (juga berfungsi dengan label bidang tambahan).

### `registration_add_helptext_for_2_names`

**Tambahkan bantuan untuk menambahkan dua nama di pendaftaran**

Tambahkan teks bantuan bagi pengguna untuk memasukkan dua nama di formulir pendaftaran ketika nama belakang ganda umum digunakan.

*Default: `false`*

### `send_notification_when_user_added`

**Kirim email ke admin saat pengguna dibuat**

Kirim pemberitahuan email ke admin saat pengguna dibuat.

### `show_conditions_to_user`

**Tampilkan kondisi pendaftaran khusus**

Tampilkan beberapa kondisi kepada pengguna selama proses pendaftaran. Sediakan array dengan setiap elemen berisi 'variable' (nama bidang tambahan internal), 'display_text' (teks sederhana untuk kotak centang), 'text_area' (teks panjang kondisi).

### `show_official_code_whoisonline`

**Kode resmi di 'Siapa yang online'**

Tampilkan kode resmi di halaman 'Siapa yang online', di bawah nama pengguna.

*Default: `false`*

---
### `show_terms_if_profile_completed`

**Syarat dan ketentuan hanya jika profil lengkap**

Dengan mengaktifkan opsi ini, syarat dan ketentuan hanya akan tersedia bagi pengguna ketika bidang profil tambahan yang dimulai dengan 'terms_' dan diatur sebagai terlihat telah diisi.

*Default: `false`*


### `split_users_upload_directory`

**Pisahkan direktori unggahan pengguna**

Pada portal dengan beban tinggi, di mana banyak pengguna terdaftar dan mengirimkan foto mereka, direktori unggahan (main/upload/users/) mungkin berisi terlalu banyak file untuk ditangani oleh sistem file (telah dilaporkan dengan lebih dari 36.000 file pada server Debian). Mengubah opsi ini akan mengaktifkan pemisahan direktori satu tingkat di direktori unggahan. 9 direktori akan digunakan di direktori dasar dan semua direktori pengguna berikutnya akan disimpan ke salah satu dari 9 direktori tersebut. Perubahan opsi ini tidak akan memengaruhi struktur direktori di disk, tetapi akan memengaruhi perilaku kode Chamilo, jadi jika Anda mengubah opsi ini, Anda harus membuat direktori baru dan memindahkan direktori yang ada secara manual di server. Perhatikan bahwa saat membuat dan memindahkan direktori tersebut, Anda harus memindahkan direktori pengguna 1 hingga 9 ke subdirektori dengan nama yang sama. Jika Anda tidak yakin tentang opsi ini, sebaiknya tidak mengaktifkannya.

*Default: `true`*

### `use_users_timezone`

**Aktifkan zona waktu pengguna**

Mengaktifkan kemungkinan bagi pengguna untuk memilih zona waktu mereka sendiri. Setelah dikonfigurasi, pengguna akan dapat melihat batas waktu tugas dan referensi waktu lainnya dalam zona waktu mereka sendiri, yang akan mengurangi kesalahan pada saat pengiriman.

*Default: `true`*

### `user_import_settings`

**Opsi untuk impor pengguna**

Array opsi yang diterapkan sebagai parameter default dalam impor pengguna CSV/XML.

### `user_search_on_extra_fields`

**Cari pengguna berdasarkan bidang tambahan di daftar pengguna untuk admin**

Secara alami menyertakan bidang tambahan yang diberikan (array label bidang tambahan) dalam pencarian pengguna.

### `user_selected_theme`

**Pemilihan tema pengguna**

Izinkan pengguna untuk memilih tema visual mereka sendiri di profil mereka. Ini akan mengubah tampilan Chamilo bagi mereka, tetapi akan membiarkan gaya default portal tetap utuh. Jika kursus atau sesi tertentu memiliki tema khusus yang ditetapkan, tema tersebut akan memiliki prioritas atas tema yang ditentukan pengguna.

*Default: `false`*

### `visible_options`

**Daftar bidang yang terlihat di profil**

Mengontrol bidang profil mana yang terlihat oleh pengguna dan orang lain.