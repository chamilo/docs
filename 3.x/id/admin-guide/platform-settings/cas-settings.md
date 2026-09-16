# Pengaturan CAS

Konfigurasi CAS (Central Authentication Service) warisan yang dibawa dari Chamilo 1.x. Lihat [CAS](../authentication/cas.md) untuk status terkini autentikator CAS di Chamilo 3.x.

Akses pengaturan ini di **Administration > Configuration settings > CAS**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `cas_activate`

**Aktifkan autentikasi CAS**

Mengaktifkan autentikasi CAS akan memungkinkan pengguna mengautentikasi dengan kredensial CAS mereka.<br/>Buka <a href='settings.php?category=CAS'>Plugin</a> untuk menambahkan tombol 'CAS Login' yang dapat dikonfigurasi untuk kampus Chamilo Anda. Atau Anda dapat memaksa autentikasi CAS dengan mengatur cas[force_redirect] di app/config/auth.conf.php.

### `cas_add_user_activate`

**Aktifkan penambahan pengguna CAS**

Aktifkan penambahan pengguna CAS. Untuk membuat akun pengguna dari direktori LDAP, tabel extldap_config dan extldap_user_correspondance harus diisi di app/config/auth.conf.php

### `cas_port`

**Port server CAS utama**

Port yang digunakan untuk terhubung ke server CAS utama

### `cas_protocol`

**Protokol server CAS utama**

Protokol yang digunakan untuk terhubung ke server CAS

### `cas_server`

**Server CAS utama**

Ini adalah server CAS utama yang akan digunakan untuk autentikasi (alamat IP atau hostname)

### `cas_server_uri`

**URI server CAS utama**

Jalur ke layanan CAS

### `update_user_info_cas_with_ldap`

**Perbarui informasi akun pengguna yang diautentikasi CAS dari LDAP**

Memastikan nama depan, nama belakang, dan alamat email pengguna sama dengan nilai terkini di direktori LDAP