# Menyelesaikan Item Akhir Learning Path yang Tertahan

Langkah terakhir sebuah learning path — halaman "Congratulations" yang memuat blok sertifikat dan keterampilan — baru dihitung selesai setelah peserta benar-benar membukanya. Peserta yang menyelesaikan setiap langkah lain tetapi tidak pernah mengklik hingga halaman terakhir itu tetap tertahan tepat di bawah 100% selamanya, dan karena kelayakan sertifikat pencapaian (serta pemberian keterampilan) bergantung pada learning path yang mencapai 100%, mereka tidak pernah menerima sertifikat atau keterampilan yang sebenarnya sudah mereka peroleh.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Untuk setiap learning path di platform yang langkah terakhirnya bertipe **Final item**, perintah ini memeriksa setiap peserta dengan percobaan yang sedang berlangsung (di bawah 100%) yang telah menyelesaikan setiap langkah lain — di seluruh kursus dan seluruh sesi yang menggunakan kembali learning path tersebut. Jika demikian, perintah ini menyelesaikan item akhir untuk mereka persis seolah-olah mereka sendiri yang membukanya: mencatat tampilan item yang sama, menjalankan perhitungan ulang progres yang sama, serta memicu pembuatan sertifikat dan pemberian keterampilan yang sama seperti kunjungan sungguhan.

Seperti `chamilo:gradebook:process-achievement-certificates` (lihat [Sertifikat Pencapaian](achievement-certificates.md)), perintah ini bekerja dalam batch terbatas, mendukung dry run, dan dapat dilanjutkan dengan aman jika terputus — peserta yang item akhirnya sudah selesai tidak akan disentuh lagi pada eksekusi berikutnya.

## Opsi

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Mengevaluasi dan melaporkan tanpa menyelesaikan apa pun. Selalu jalankan ini terlebih dahulu.                                           |
| `--sender-id=<id>`      | ID administrator platform yang aktif, digunakan sebagai pembuat sumber daya ketika penyelesaian item akhir memicu pembuatan sertifikat atau pemberian keterampilan. Wajib untuk eksekusi sungguhan (bukan dry-run). |
| `--limit=<n>`           | Jumlah maksimum item akhir yang diselesaikan (atau, pada dry-run, dilaporkan) dalam satu eksekusi. `0` = tidak terbatas. Default `500`.              |
| `--scan-limit=<n>`      | Jumlah maksimum rekaman progres peserta yang dipindai dalam satu eksekusi, di seluruh learning path. `0` = tidak terbatas. Default `5000`. |
| `--batch-size=<n>`      | Rekaman progres peserta yang dimuat per batch basis data, dalam satu learning path. Default `50`.                       |
| `--lp-batch-size=<n>`   | Learning path yang dimuat per batch basis data. Default `50`.                                                            |
| `--after-lp-id=<id>`    | Melanjutkan pemindaian setelah ID learning path ini.                                                                       |

## Contoh

Jalankan dry-run untuk seluruh platform terlebih dahulu, untuk melihat siapa yang akan diselesaikan:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Eksekusi sungguhan, administrator dengan ID 1 sebagai pembuat sumber daya:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Melanjutkan eksekusi yang terputus setelah learning path 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Kode keluar

Perintah ini keluar dengan status gagal jika setidaknya satu item akhir benar-benar gagal diselesaikan selama eksekusi sungguhan — tabel ringkasan menyebutkan learning path dan peserta serta alasannya; log aplikasi memuat exception lengkap. Peserta yang dengan benar dikecualikan (item akhir sudah selesai, atau langkah lain masih belum selesai) bukan kesalahan dan tidak pernah menyebabkan kode keluar gagal.

## Skor Gradebook setelah penyelesaian

Skor yang ditampilkan untuk sebuah learning path di tabel Gradebook tidak pernah disimpan — skor dihitung secara langsung dari progres peserta saat ini setiap kali halaman dimuat, sehingga langsung mencerminkan 100%, tanpa langkah tambahan.

**Sertifikat** peserta, jika sudah ada sebelum mereka mencapai 100% (dengan skor lama yang lebih rendah tertanam di dalamnya), hanya memperbarui skor tersimpan dan HTML yang dirender jika regenerasi sertifikat itu sendiri berhasil ketika perintah ini menyelesaikan item akhir mereka — panggilan yang sama yang akan dipicu oleh kunjungan sungguhan. Jika pembuatan sertifikat gagal karena alasan apa pun (lihat [Sertifikat Pencapaian](achievement-certificates.md) untuk penyebab umum, misalnya izin penyimpanan berkas), progres peserta tetap dengan benar mencapai 100% dan tabel Gradebook tetap menampilkannya — hanya sertifikat mereka yang masih menampilkan skor lama, dan karena perintah ini tidak pernah meninjau ulang peserta yang sudah mencapai 100%, perintah tidak akan mencoba lagi pada eksekusi berikutnya. Regenerasi sertifikat tersebut secara manual (tindakan **Generate** di daftar Certificates) setelah masalah yang mendasarinya diperbaiki.

`--sender-id` ada secara khusus untuk menghindari salah satu penyebab umum kegagalan tersebut: menyelesaikan item akhir di luar permintaan sungguhan tidak memiliki pengguna yang masuk untuk dicatat sebagai pembuat sumber daya sertifikat, dan pembuatan gagal sepenuhnya tanpa pengguna tersebut.