# Pemeriksa Kekuatan Kata Sandi

Pemeriksa Kekuatan Kata Sandi memindai hash kata sandi tersimpan pengguna aktif terhadap daftar singkat kata sandi yang umum digunakan (`123456`, `password`, `qwerty123`, dan sejenisnya). Pemeriksa ini tidak pernah menampilkan atau mengirimkan kata sandi itu sendiri — hanya apakah kata sandi pengguna saat ini cocok dengan salah satu kandidat yang diketahui lemah.

## Mengakses Pemeriksa Kekuatan Kata Sandi

Dari panel administrasi, klik **Keamanan > Pemeriksa kekuatan kata sandi**.

## Menjalankan Pemindaian

![Halaman Pemeriksa kekuatan kata sandi, dengan kolom untuk ID pengguna yang akan dipindai dan tombol untuk menjalankan pemindaian](../../.gitbook/assets/admin-security-password-strength.png)

* Biarkan **ID pengguna yang akan dipindai** kosong untuk memindai setiap pengguna aktif, atau masukkan daftar ID pengguna yang dipisahkan koma untuk memeriksa subset
* Klik **Jalankan pemindaian kekuatan kata sandi**

Pemindaian berjalan secara asinkron di latar belakang sehingga tidak membekukan halaman, menampilkan progres langsung (pengguna yang telah diverifikasi sejauh ini, dari total, dan berapa banyak kata sandi lemah yang ditemukan). Karena setiap kata sandi kandidat harus diperiksa terhadap hash setiap pengguna yang dipilih, memindai semua pengguna pada platform besar dapat memakan waktu — daftar kandidat sengaja dibuat singkat untuk membatasi biaya ini.

## Menindaklanjuti Hasil

![Hasil pemindaian yang selesai, mencantumkan pengguna yang ditandai dengan kolom Nama, Nama pengguna, dan E-mail, serta tindakan per baris untuk meminta perubahan kata sandi atau memaksa reset kata sandi](../../.gitbook/assets/admin-security-password-strength-results.png)

Setelah pemindaian selesai, pengguna yang ditandai dicantumkan dengan dua tindakan yang tersedia, baik per pengguna maupun sebagai tindakan massal untuk semua pengguna yang dipilih:

* **Minta perubahan kata sandi** (ikon amplop) — Mengirim e-mail kepada pengguna yang meminta mereka mengubah kata sandinya
* **Paksa reset kata sandi** (ikon reset) — Segera membatalkan kata sandi pengguna saat ini dan mengirim e-mail kepada mereka kata sandi baru

Kedua tindakan memverifikasi ulang pengguna yang dipilih terhadap daftar kata sandi lemah sebelum bertindak, sehingga permintaan yang kedaluwarsa atau diubah tidak dapat digunakan untuk mereset akun yang tidak lagi memiliki kata sandi lemah.

## Penggunaan yang Disarankan

* Jalankan pemindaian ini secara berkala, terutama setelah impor pengguna massal (akun yang diimpor terkadang datang dengan kata sandi default yang sederhana)
* Padukan dengan pengaturan **Persyaratan sintaks kata sandi minimal** dan **Interval rotasi kata sandi** di [Pengaturan Keamanan](../platform-settings/security-settings.md) untuk mencegah kata sandi lemah ditetapkan sejak awal, alih-alih hanya menemukannya setelah terjadi