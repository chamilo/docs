# Pengaturan Web Services

Konfigurasi web services SOAP / REST warisan (terpisah dari endpoint API Platform modern).

Akses pengaturan ini di bawah **Administration > Configuration settings > Web Services**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_download_documents_by_api_key`

**Izinkan unduh dokumen kursus dengan API Key**

Unduh dokumen dengan memverifikasi kunci REST API untuk seorang pengguna

*Default: `false`*


### `disable_webservices`

**Nonaktifkan web services**

Jika Anda tidak menggunakan web services, aktifkan opsi ini untuk menghindari risiko keamanan yang tidak perlu.

*Default: `false`*


### `messaging_allow_send_push_notification`

**Izinkan Push Notifications ke aplikasi seluler Chamilo Messaging**

Kirim Push Notifications melalui Google's Firebase Console

*Default: `false`*


### `messaging_gdc_api_key`

**Server key Firebase Console untuk Cloud Messaging**

Server key (token warisan) dari kredensial proyek

### `messaging_gdc_project_number`

**Sender ID Firebase Console untuk Cloud Messaging**

Anda perlu mendaftarkan sebuah proyek di <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Aktifkan web services khusus admin**

Beberapa REST web services ditandai hanya untuk admin dan dinonaktifkan secara default. Aktifkan fitur ini untuk memberikan akses ke web services tersebut (kepada pengguna dengan kredensial admin, tentunya).

*Default: `false`*

### `webservice_return_user_field`

**Field pengguna yang dikembalikan webservices**

Minta REST webservices (v2.php) untuk mengembalikan pengidentifikasi lain bagi field yang terkait dengan ID pengguna. Hal ini berguna jika sistem eksternal tidak benar-benar menangani ID pengguna sebagaimana adanya di Chamilo, karena membantu sistem eksternal mencocokkan data pengguna yang dikembalikan dengan data eksternal yang diketahui Chamilo. Misalnya, jika Anda menggunakan sistem autentikasi eksternal, Anda dapat mengembalikan extra field yang digunakan untuk mencocokkan pengguna dengan sistem autentikasi eksternal alih-alih user.id.

*Default: `oauth2_id`*