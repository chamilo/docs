# Konfigurasi SSO

Halaman ini membahas topik yang berlaku untuk berbagai metode autentikasi.

## Beberapa Penyedia

Anda dapat mengaktifkan lebih dari satu metode autentikasi secara bersamaan. Setiap penyedia yang diaktifkan akan menampilkan tombolnya sendiri di halaman login bersama dengan formulir standar nama pengguna/kata sandi. Pengguna dapat memilih metode yang mereka sukai.

Tetap aktifkan formulir standar agar administrator platform selalu dapat masuk, bahkan jika penyedia eksternal salah dikonfigurasi.

## Prioritas Autentikasi

Ketika beberapa metode aktif, sistem memeriksa kredensial dengan urutan berikut:

1. LDAP (jika `force_as_login_method` diatur)
2. Penyedia OAuth2 (sesuai urutan yang muncul di `authentication.yaml`)
3. Basis data internal Chamilo

## Token JWT untuk Akses API

Chamilo menggunakan JWT (JSON Web Tokens) untuk REST API-nya. Masa berlaku token dan perilaku penyegaran dikonfigurasi di `config/packages/lexik_jwt_authentication.yaml`. Ini terpisah dari alur login SSO dan hanya berlaku untuk klien API.

## Pemecahan Masalah

### Tombol Login Tidak Muncul Setelah Konfigurasi

Cache harus dibersihkan setelah setiap perubahan pada `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Pengguna Tidak Dapat Masuk melalui SSO

* **Ketidaksesuaian URI Pengalihan** — URI yang terdaftar di penyedia identitas Anda harus sama persis dengan `https://your-chamilo-url/connect/<provider>/check`.
* **Pergeseran Waktu** — Token SSO sensitif terhadap waktu. Pastikan jam server Anda tersinkronisasi (NTP).
* **Sertifikat SSL** — Chamilo harus mempercayai sertifikat penyedia identitas. Periksa masalah sertifikat yang ditandatangani sendiri.
* **Log** — Tinjau `var/log/` dan log penyedia identitas Anda untuk pesan kesalahan spesifik.

### Pengguna Dibuat dengan Peran yang Salah

Periksa konfigurasi pemetaan peran untuk penyedia tersebut. Pengguna baru secara default akan memiliki peran siswa kecuali pemetaan grup atau atribut mempromosikan mereka.

### Pengguna Ada di Penyedia tetapi Tidak Dapat Mengakses Chamilo

* Jika `allow_create_new_users` bernilai false, pengguna harus sudah memiliki akun Chamilo yang email atau nama penggunanya sesuai dengan data penyedia.
* Pastikan pengguna tidak dinonaktifkan di Chamilo.
* Untuk Azure, tinjau `existing_user_verification_order` untuk memahami bagaimana Chamilo mencocokkan pengguna yang masuk dengan akun yang sudah ada.