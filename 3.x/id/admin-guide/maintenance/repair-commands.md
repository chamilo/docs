# Perintah Perbaikan dan Konversi

> **Perubahan yang tidak kompatibel.** Perintah pemeliharaan di bawah ini sebelumnya menulis ke basis data segera setelah dijalankan. Kini perintah tersebut **hanya-baca (dry-run) secara bawaan** dan hanya menulis ketika `--apply` diberikan, mengikuti model `chamilo:migration:repair-quiz-relations-from-legacy`.

| Perintah | Catatan |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | tanpa `--expected-count` (operasi tunggal semua-atau-tidak-sama-sekali) |

## Apa yang Berubah bagi Administrator

1. Jalankan perintah tanpa opsi: perintah melaporkan apa yang akan dilakukan, tidak menulis apa pun, dan mencetak baris
   `--apply --expected-count=N` yang tepat untuk digunakan.
2. Untuk menulis, jalankan lagi dengan `--apply --expected-count=N`, di mana N adalah angka yang dilaporkan oleh eksekusi hanya-baca.
   Jika jumlah baris yang akan diubah berbeda dari N (data berubah di antaranya), perintah menolak
   dan tidak menulis apa pun.
3. `--dry-run` tetap diterima (kini menjadi bawaan dan tidak melakukan apa pun); menggabungkannya dengan `--apply` adalah kesalahan.
4. Skrip dan tugas cron yang menjalankan perintah ini tanpa argumen dan mengandalkan penulisan harus kini meneruskan
   `--apply --expected-count=N`. Kode keluar tidak berubah (0 berhasil, 1 gagal, 2 penggunaan tidak valid).

Contoh:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Perintah Baru: `app:repair-user-tag-counters`

Menghitung ulang penghitung penggunaan (`tag.count`) tag dari baris relasi yang menggunakannya (tag pengguna, tag
bidang tambahan, tag portofolio). Versi yang lebih lama membiarkan penghitung menyimpang. Model yang sama: jalankan tanpa opsi untuk menampilkan tag yang menyimpang
dan mendapatkan baris `--apply --expected-count=N`, lalu jalankan baris tersebut untuk menulis. Tidak ada migrasi yang terlibat: jalankan
ketika Anda ingin penghitung disinkronkan ulang.