# Pengaturan Identitas Administrator

Identitas dan detail kontak dari administrator platform. Nilai-nilai ini muncul di footer platform dan dalam beberapa email yang dihasilkan oleh sistem.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Identitas Administrator**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `administrator_email`

**Administrator Portal: E-mail**

Alamat e-mail dari Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_name`

**Administrator Portal: Nama Depan**

Nama Depan dari Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_phone`

**Administrator Portal: Nomor Telepon**

Nomor telepon dari Administrator Platform (muncul di footer di sebelah kiri)

### `administrator_surname`

**Administrator Portal: Nama Belakang**

Nama Keluarga dari Administrator Platform (muncul di footer di sebelah kiri)

### `chamilo_latest_news`

**Berita Terbaru**

Dapatkan berita terbaru dari Chamilo, termasuk kerentanan keamanan dan acara, langsung di dalam panel administrasi Anda. Berita-berita ini akan diperiksa di server berita Chamilo setiap kali Anda memuat halaman administrasi dan hanya terlihat oleh administrator.

*Default: `true`*

### `chamilo_support`

**Blok Dukungan Chamilo**

Dapatkan tips profesional dan cara mudah untuk menghubungi penyedia layanan resmi untuk dukungan profesional, langsung dari pembuat Chamilo. Blok ini muncul di halaman administrasi Anda, hanya terlihat oleh administrator, dan diperbarui setiap kali Anda memuat halaman administrasi.

*Default: `true`*

### `max_anonymous_users`

**Pengguna Anonim Ganda**

Aktifkan opsi ini untuk mengizinkan beberapa pengguna sistem sebagai pengguna anonim. Ini berguna ketika menggunakan platform ini sebagai etalase publik untuk beberapa kursus. Memiliki beberapa pengguna anonim akan memungkinkan pelacakan berfungsi selama pengalaman untuk beberapa pengguna tanpa mencampur data mereka (yang jika tidak dapat membingungkan mereka).

*Default: `0`*

### `redirect_admin_to_courses_list`

**Arahkan Admin ke Daftar Kursus**

Perilaku default adalah mengirim administrator langsung ke panel administrasi (sementara guru dan siswa dikirim ke daftar kursus atau halaman utama platform). Aktifkan untuk mengarahkan administrator juga ke daftar kursusnya.

*Default: `false`*

### `send_inscription_notification_to_general_admin_only`

**Beritahu Hanya Admin Global tentang Pengguna Baru**

Ketika diaktifkan, hanya administrator global yang menerima pemberitahuan email tentang pendaftaran pengguna baru, bukan semua administrator.

*Default: `false`*

### `show_link_request_hrm_user`

**Tampilkan Tautan untuk Meminta Ikatan antara Pengguna dan HRM**

Tampilkan tautan di halaman profil yang memungkinkan direktur Sumber Daya Manusia untuk meminta dihubungkan dengan akun pengguna.

*Default: `false`*

### `user_status_option_only_for_admin_enabled`

**Sembunyikan Peran dari Pengguna Biasa**

Memungkinkan menyembunyikan peran pengguna ketika opsi ini diatur ke true dan array berikutnya mengatur peran yang sesuai ke 'true'.

*Default: `false`*

### `user_status_option_show_only_for_admin`

**Tentukan Peran Mana yang Disembunyikan dari Pengguna Biasa**

Peran yang diatur ke 'true' hanya akan muncul bagi administrator. Pengguna lain tidak akan dapat melihatnya.