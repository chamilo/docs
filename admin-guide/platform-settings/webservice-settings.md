# Pengaturan Layanan Web

Konfigurasi layanan web SOAP / REST lama (terpisah dari titik akhir API Platform modern).

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Layanan Web**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_download_documents_by_api_key`

**Izinkan unduh dokumen kursus dengan Kunci API**

Mengunduh dokumen dengan memverifikasi kunci API REST untuk pengguna

*Default: `false`*

### `disable_webservices`

**Nonaktifkan layanan web**

Jika Anda tidak menggunakan layanan web, aktifkan ini untuk menghindari risiko keamanan yang tidak perlu.

*Default: `false`*

### `messaging_allow_send_push_notification`

**Izinkan Notifikasi Dorong ke aplikasi seluler Chamilo Messaging**

Mengirim Notifikasi Dorong melalui Konsol Firebase Google

*Default: `false`*

### `messaging_gdc_api_key`

**Kunci server dari Konsol Firebase untuk Cloud Messaging**

Kunci server (token lama) dari kredensial proyek

### `messaging_gdc_project_number`

**ID Pengirim dari Konsol Firebase untuk Cloud Messaging**

Anda perlu mendaftarkan proyek di <a href='https://console.firebase.google.com/'>Konsol Firebase Google</a>

### `webservice_enable_adminonly_api`

**Aktifkan layanan web khusus admin**

Beberapa layanan web REST ditandai hanya untuk admin dan dinonaktifkan secara default. Aktifkan fitur ini untuk memberikan akses ke layanan web tersebut (kepada pengguna dengan kredensial admin, tentu saja).

*Default: `false`*

### `webservice_return_user_field`

**Layanan web mengembalikan bidang pengguna**

Meminta layanan web REST (v2.php) untuk mengembalikan pengenal lain untuk bidang yang terkait dengan ID pengguna. Ini berguna jika sistem eksternal tidak benar-benar menangani ID pengguna seperti yang ada di Chamilo, karena membantu sistem eksternal mencocokkan data pengguna yang dikembalikan dengan beberapa data eksternal yang diketahui oleh Chamilo. Misalnya, jika Anda menggunakan sistem autentikasi eksternal, Anda dapat mengembalikan bidang tambahan yang digunakan untuk mencocokkan pengguna dengan sistem autentikasi eksternal daripada user.id.

*Default: `oauth2_id`*