# Autentikasi Dua Faktor

Autentikasi dua faktor (2FA) menambahkan langkah kedua saat masuk — kode 6 digit dari aplikasi di ponsel Anda, selain kata sandi — sehingga mengetahui kata sandi saja tidak cukup untuk mengakses akun Anda.

Fitur ini hanya muncul jika administrator Anda telah mengaktifkannya di seluruh platform. Jika Anda tidak melihatnya di halaman akun, fitur ini belum diaktifkan untuk platform Anda.

## Mengaktifkan 2FA

1. Buka **menu avatar** Anda dan klik **Profil saya**.
2. Klik **Ubah kata sandi**.
3. Masukkan **kata sandi saat ini**, centang kotak **Aktifkan autentikasi dua faktor (2FA)**, lalu klik **Perbarui pengaturan**.
4. Halaman dimuat ulang dengan kode QR dan pesan "Pindai kode QR untuk mengaktifkan 2FA." Pindai dengan aplikasi autentikator di ponsel Anda (semua aplikasi yang kompatibel dengan TOTP dapat digunakan, misalnya Google Authenticator, Microsoft Authenticator, atau Authy).

![Formulir Ubah Kata Sandi setelah dikirim, menampilkan kode QR yang harus dipindai dan kolom kode 2FA](/.gitbook/assets/student-2fa-qr-code.png)

5. Masukkan lagi kata sandi saat ini, bersama kode 6 digit yang kini ditampilkan aplikasi Anda, di kolom **Kode 2FA**, lalu klik **Perbarui pengaturan** sekali lagi. Anda akan melihat konfirmasi bahwa 2FA telah diaktifkan.

Hanya mencentang kotak tidak menampilkan kode QR — Anda baru melihatnya setelah pengiriman pertama itu, dan kolom kata sandi dikosongkan setiap kali halaman dimuat ulang, jadi Anda perlu memasukkan lagi kata sandi saat ini pada pengiriman kedua ini.

## Masuk dengan 2FA Diaktifkan

Setelah memasukkan nama pengguna dan kata sandi seperti biasa, formulir masuk menampilkan kolom tambahan **Kode 2FA** di layar yang sama — masukkan kode 6 digit saat ini dari aplikasi autentikator Anda lalu kirim (tombol berbunyi **Kirim kode** alih-alih **Masuk** pada titik ini).

## Jika Anda Kehilangan Akses ke Aplikasi Autentikator

Chamilo tidak menghasilkan kode cadangan atau pemulihan untuk 2FA. Jika Anda kehilangan perangkat yang berisi aplikasi autentikator, Anda tidak akan dapat menghasilkan kode yang valid sendiri — hubungi administrator platform, yang dapat menonaktifkan 2FA pada akun Anda agar Anda dapat masuk lagi dan, jika diinginkan, mengaturnya di perangkat baru.

## Menonaktifkan 2FA

Kembali ke **Ubah kata sandi**, hapus centang **Aktifkan autentikasi dua faktor (2FA)**, masukkan kata sandi saat ini, lalu kirim.

## Tips

* **Atur sebelum Anda membutuhkannya** — mengaktifkan 2FA hanya memakan waktu satu menit dan melindungi akun Anda secara berarti.
* **Pastikan aplikasi autentikator tetap dapat diakses** — kehilangannya berarti Anda bergantung pada administrator untuk masuk kembali, karena tidak ada kode cadangan.
* **Jangan bagikan kode 2FA Anda** — siapa pun yang memiliki kata sandi dan kode yang valid dapat masuk sebagai Anda.