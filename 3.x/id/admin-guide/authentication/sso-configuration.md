# Konfigurasi SSO

Halaman ini membahas topik yang berlaku lintas metode autentikasi.

## Beberapa penyedia

Anda dapat mengaktifkan lebih dari satu metode autentikasi secara bersamaan. Setiap penyedia yang diaktifkan menampilkan tombolnya sendiri pada halaman masuk di samping formulir nama pengguna/kata sandi standar. Pengguna memilih metode yang mereka inginkan.

Tetap aktifkan formulir standar agar administrator platform selalu dapat masuk, bahkan jika penyedia eksternal salah dikonfigurasi.

## Prioritas autentikasi

Ketika beberapa metode aktif, sistem memeriksa kredensial dalam urutan berikut:

1. LDAP (jika `force_as_login_method` diatur)
2. Penyedia OAuth2 (sesuai urutan kemunculannya di `authentication.yaml`)
3. Basis data internal Chamilo

## Token JWT untuk akses API

Chamilo menggunakan JWT (JSON Web Tokens) untuk REST API-nya. Masa berlaku token dan perilaku penyegaran dikonfigurasi di `config/packages/lexik_jwt_authentication.yaml`. Ini terpisah dari alur masuk SSO dan hanya berlaku untuk klien API.

## Pemecahan masalah

### Tombol masuk tidak muncul setelah konfigurasi

Cache harus dibersihkan setelah setiap perubahan pada `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Pengguna tidak dapat masuk melalui SSO

* **Ketidakcocokan Redirect URI** — URI yang didaftarkan di penyedia identitas Anda harus tepat cocok dengan `https://your-chamilo-url/connect/<provider>/check`.
* **Pergeseran jam** — Token SSO peka terhadap waktu. Pastikan jam server Anda tersinkronisasi (NTP).
* **Sertifikat SSL** — Chamilo harus memercayai sertifikat penyedia identitas. Periksa masalah sertifikat yang ditandatangani sendiri.
* **Log** — Tinjau `var/log/` dan log penyedia identitas Anda untuk pesan kesalahan spesifik.

### Pengguna dibuat dengan peran yang salah

Periksa konfigurasi pemetaan peran untuk penyedia tersebut. Pengguna baru secara default mendapat peran siswa kecuali pemetaan grup atau atribut menaikkan peran mereka.

### Pengguna ada di penyedia tetapi tidak dapat mengakses Chamilo

* Jika `allow_create_new_users` bernilai false, pengguna harus sudah memiliki akun Chamilo yang email atau nama penggunanya cocok dengan data penyedia.
* Periksa bahwa pengguna tidak dinonaktifkan di Chamilo.
* Untuk Azure, tinjau `existing_user_verification_order` untuk memahami cara Chamilo mencocokkan pengguna yang masuk dengan akun yang sudah ada.