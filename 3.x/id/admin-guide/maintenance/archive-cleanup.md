# Pembersihan Arsip

Seiring waktu, Chamilo mengakumulasi berkas sementara di direktori cache dan arsipnya. Pembersihan berkala mencegah masalah ruang disk.

## Apa yang Dapat Dibersihkan

* **Berkas unggahan sementara** — Berkas yang dihasilkan selama ekspor, impor, dan operasi lain, plus berkas build frontend warisan yang kedaluwarsa
* **Cache aplikasi Symfony** — Kontainer terkompilasi, konfigurasi yang di-cache, dan data routing. Ini *tidak* tercakup oleh aksi panel administrasi di bawah — lihat [Dari Baris Perintah](#from-the-command-line).
* **Data sesi** — Berkas sesi PHP yang kedaluwarsa
* **Berkas log** — Berkas log lama yang tidak lagi diperlukan

## Melakukan Pembersihan

### Dari Panel Administrasi

Navigasikan ke **Sistem > Bersihkan berkas sementara** di panel administrasi (lihat [Alat Sistem](../system/system-tools.md#clean-temporary-files)). Tindakan ini melaporkan berapa banyak berkas sementara yang ada dan berapa banyak ruang yang mereka gunakan, lalu memungkinkan Anda membersihkan semuanya atau hanya berkas yang lebih tua dari usia yang dipilih, dengan pratinjau dry-run. Tindakan ini juga menghapus berkas build warisan yang kedaluwarsa dan meregenerasi aset CSS terkompilasi.

Tindakan ini secara sengaja mengecualikan direktori cache milik Symfony sendiri (`var/cache/dev`, `var/cache/prod`, `var/cache/test`, dan cache pool), sehingga tidak akan membuat perubahan `.env` atau `config/` berlaku — gunakan baris perintah untuk itu.

### Dari Baris Perintah

Untuk kontrol lebih, dan untuk benar-benar membersihkan cache aplikasi Symfony, gunakan perintah konsol Symfony:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Jadwalkan pembersihan berkala** — Siapkan cron job mingguan atau bulanan untuk membersihkan berkas sementara
* **Pantau penggunaan disk** — Perhatikan ukuran direktori `var/`, karena ia bertambah seiring cache dan berkas log
* **Hati-hati dengan log** — Sebelum menghapus berkas log, periksa apakah mereka berisi informasi yang mungkin Anda butuhkan untuk pemecahan masalah