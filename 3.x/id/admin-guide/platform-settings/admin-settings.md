# Pengaturan Identitas Administrator

Identitas dan detail kontak administrator platform. Nilai-nilai ini muncul di footer platform dan di beberapa email yang dihasilkan sistem.

Akses pengaturan ini di **Administration > Configuration settings > Administrator Identity**. Kategori ini berisi **12 pengaturan**, tercantum di bawah dengan judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `administrator_email`

**Administrator Portal: e-mail**

Alamat e-mail Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_name`

**Administrator Portal: Nama Depan**

Nama Depan Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_phone`

**Administrator Portal: Nomor telepon**

Nomor telepon Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_surname`

**Administrator Portal: Nama Belakang**

Nama Keluarga Administrator Platform (muncul di footer di sebelah kiri)

### `chamilo_latest_news`

**Berita terbaru**

Dapatkan berita terbaru dari Chamilo, termasuk kerentanan keamanan dan acara, langsung di dalam panel administrasi Anda. Potongan berita ini akan diperiksa pada server berita Chamilo setiap kali Anda memuat halaman administrasi dan hanya terlihat oleh administrator.

*Default: `true`*

### `chamilo_support`

**Blok dukungan Chamilo**

Dapatkan kiat profesional dan cara mudah untuk menghubungi penyedia layanan resmi untuk dukungan profesional, langsung dari pembuat Chamilo. Blok ini muncul di halaman administrasi Anda, hanya terlihat oleh administrator, dan diperbarui setiap kali Anda memuat halaman administrasi.

*Default: `true`*

### `max_anonymous_users`

**Beberapa pengguna anonim**

Aktifkan opsi ini untuk mengizinkan beberapa pengguna sistem bagi pengguna anonim. Hal ini berguna ketika menggunakan platform ini sebagai ruang pamer publik untuk beberapa kursus. Memiliki beberapa pengguna anonim akan memungkinkan pelacakan berfungsi selama durasi pengalaman bagi beberapa pengguna tanpa mencampur data mereka (yang jika tidak dapat membingungkan mereka).

*Default: `0`*

### `redirect_admin_to_courses_list`

**Alihkan admin ke daftar kursus**

Perilaku default adalah mengirim administrator langsung ke panel administrasi (sementara pengajar dan siswa dikirim ke daftar kursus atau beranda platform). Aktifkan untuk mengalihkan administrator juga ke daftar kursusnya.

*Default: `false`*

### `send_inscription_notification_to_general_admin_only`

**Beritahu hanya admin global tentang pengguna baru**

Jika diaktifkan, hanya administrator global yang menerima notifikasi email tentang pendaftaran pengguna baru, bukan semua administrator.

*Default: `false`*

### `show_link_request_hrm_user`

**Tampilkan tautan untuk meminta ikatan antara pengguna dan HRM**

Tampilkan tautan di halaman profil yang memungkinkan direktur Sumber Daya Manusia untuk meminta dihubungkan dengan akun pengguna.

*Default: `false`*

### `user_status_option_only_for_admin_enabled`

**Sembunyikan peran dari pengguna biasa**

Memungkinkan penyembunyian peran pengguna ketika opsi ini diatur ke true dan array berikut mengatur peran yang sesuai ke 'true'.

*Default: `false`*

### `user_status_option_show_only_for_admin`

**Tentukan peran mana yang disembunyikan dari pengguna biasa**

Peran yang diatur ke 'true' hanya akan muncul bagi administrator. Pengguna lain tidak akan dapat melihatnya.