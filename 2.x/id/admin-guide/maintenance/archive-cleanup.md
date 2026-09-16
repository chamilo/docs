# Pembersihan Arsip

Seiring waktu, Chamilo mengumpulkan berkas sementara di direktori cache dan arsipnya. Pembersihan secara berkala mencegah masalah ruang penyimpanan disk.

## Apa yang Dapat Dibersihkan

* **Cache Symfony** — Templat yang dikompilasi, konfigurasi yang di-cache, dan data perutean
* **Berkas sementara** — Berkas yang dihasilkan selama proses ekspor, impor, dan operasi lainnya
* **Data sesi** — Berkas sesi PHP yang telah kedaluwarsa
* **Berkas log** — Berkas log lama yang tidak lagi diperlukan

## Melakukan Pembersihan

### Dari Panel Administrasi

Navigasikan ke **Pembersihan Arsip** di panel administrasi. Klik tombol pembersihan untuk menghapus berkas sementara.

### Dari Baris Perintah

Untuk kontrol yang lebih besar, gunakan perintah konsol Symfony:

```bash
# Membersihkan cache Symfony
php bin/console cache:clear

# Membersihkan hanya cache produksi
php bin/console cache:clear --env=prod
```

## Tips

* **Jadwalkan pembersihan rutin** — Atur tugas cron mingguan atau bulanan untuk membersihkan berkas sementara
* **Pantau penggunaan disk** — Perhatikan ukuran direktori `var/`, karena ukurannya bertambah seiring dengan cache dan berkas log
* **Berhati-hati dengan log** — Sebelum menghapus berkas log, periksa apakah berkas tersebut berisi informasi yang mungkin Anda perlukan untuk pemecahan masalah