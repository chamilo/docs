# Sertifikat Pencapaian (Pembuatan Massal)

Chamilo dapat secara otomatis membuat sertifikat pencapaian suatu kursus untuk setiap mahasiswa yang telah menyelesaikannya — di dalam kursus dasar maupun di dalam sesi mana pun yang menggunakan kembali kursus tersebut — tanpa guru harus membuka setiap kursus satu per satu. Dua perintah konsol mencakup hal ini, satu untuk satu kursus dan satu untuk seluruh platform, dan keduanya bukan operasi basis data yang berat yang harus diawasi terus-menerus: keduanya bekerja dalam batch terbatas, mendukung dry run, dan dapat dilanjutkan dengan aman jika terputus.

## Perintah seluruh platform

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Untuk setiap kursus yang memiliki kategori gradebook akar yang memenuhi syarat — tingkat atas, bukan subkategori, dengan **Generate certificates** diaktifkan — perintah ini mengevaluasi setiap mahasiswa yang terdaftar yang belum memiliki sertifikat untuk kategori tersebut, dan membuat sertifikat bagi siapa pun yang telah memenuhi persyaratan penyelesaian. Suatu kursus dapat menyumbang **lebih dari satu** konteks: pendaftaran dasarnya, dan secara terpisah, satu konteks per sesi yang menggunakan kembali kursus tersebut, karena suatu sesi dapat memiliki kategori akarnya sendiri dan ambang kelulusannya sendiri.

Suatu kursus, atau salah satu konteks sesinya, dilewati — tidak diperlakukan sebagai kesalahan — ketika tidak memenuhi syarat untuk pemrosesan otomatis: tidak ada aturan penyelesaian yang dikonfigurasi, lebih dari satu kategori akar yang memenuhi syarat untuk konteks tersebut (ambigu, memerlukan pilihan manual), atau konten notifikasi sertifikat yang hilang. Ringkasan eksekusi di akhir melaporkan berapa banyak konteks yang masuk ke setiap kasus, sehingga tidak ada yang dilewati tanpa ditampilkan.

### Sumber penyelesaian

* `--completion-mode=course-rule` (default): menggunakan aturan penyelesaian yang dikonfigurasi untuk kursus.
* `--completion-mode=gradebook`: menggunakan skor gradebook bawaan secara langsung untuk konteks tersebut. Hanya konteks dengan tepat satu kategori akar yang memenuhi syarat yang lolos dalam mode ini — konteks dengan beberapa kategori dilewati dan dilaporkan, untuk diproses secara individual (lihat di bawah).

### Opsi keamanan

| Option                     | Purpose                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Mengevaluasi dan melaporkan tanpa membuat sertifikat atau mengirim notifikasi. Selalu jalankan ini terlebih dahulu.                                      |
| `--send-notification`       | Diperlukan untuk eksekusi nyata (bukan dry-run). Mengirim pesan internal dan surel yang dikonfigurasi pada kursus setelah setiap sertifikat dibuat. |
| `--sender-id=<id>`          | Administrator platform yang aktif, digunakan sebagai pengirim notifikasi. Diperlukan bersama dengan `--send-notification`.                            |
| `--limit=<n>`                | Jumlah maksimum sertifikat yang dibuat (atau, pada dry-run, dilaporkan) dalam satu eksekusi. `0` = tidak terbatas. Default `100`.                                    |
| `--scan-limit=<n>`           | Jumlah maksimum mahasiswa yang dievaluasi dalam satu eksekusi, di seluruh kursus dan sesi. `0` = tidak terbatas. Default `1000`.                                 |
| `--batch-size=<n>`           | Mahasiswa yang dimuat per batch basis data dalam satu konteks kursus/sesi. Default `25`.                                                     |
| `--course-batch-size=<n>`    | Kursus yang dimuat per batch basis data. Default `50`.                                                                                         |
| `--after-course-id=<id>`     | Melanjutkan pemindaian setelah ID kursus ini. Aman digunakan kembali setelah eksekusi terputus — suatu kursus tidak pernah membuat ulang sertifikat untuk mahasiswa yang sudah memilikinya. |
| `--user-id=<id>`             | Membatasi eksekusi pada satu mahasiswa, diperiksa di setiap kursus dan sesi yang memenuhi syarat — berguna untuk memvalidasi perilaku sebelum eksekusi seluruh platform. |
| `--regenerate-empty`         | Juga memproses mahasiswa yang catatan sertifikatnya ada tetapi tidak memiliki berkas sertifikat tersimpan — misalnya setelah pembuatan yang gagal di tengah jalan — dan membuat sertifikat tersebut lagi. Mahasiswa dengan sertifikat lengkap tidak pernah disentuh. |

### Contoh

Jalankan dry-run untuk seluruh platform terlebih dahulu, untuk melihat apa yang akan dihasilkan:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Eksekusi nyata, dengan pemberitahuan kepada peserta didik, administrator dengan ID 1 sebagai pengirim:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Lanjutkan eksekusi yang terputus setelah kursus 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Hasilkan kembali sertifikat yang catatannya ada tetapi berkasnya tidak pernah disimpan (jalankan dry-run terlebih dahulu
untuk menampilkannya):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Penjadwalan sebagai cron job

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Memproses satu kursus secara individual

`chamilo:migration:process-achievement-certificates --course-id=<id>` menawarkan opsi dry-run,
pemberitahuan, dan paginasi yang sama dengan perintah tingkat platform, terbatas hanya pada kursus dasar
(bukan sesinya), dengan `--category-id` eksplisit untuk menghilangkan ambiguitas ketika suatu kursus memiliki lebih dari
satu kategori akar yang memenuhi syarat:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Gunakan untuk menguji satu kursus sebelum eksekusi tingkat platform, atau untuk memproses kursus yang dilaporkan
dilewati oleh eksekusi tingkat platform karena kategori yang ambigu.

## Kode keluar

Kedua perintah keluar dengan status kegagalan jika setidaknya satu pembuatan sertifikat benar-benar gagal
selama eksekusi nyata (periksa `var/log/dev.log` — atau log produksi yang setara — untuk kesalahan
yang mendasarinya). Konteks yang dilewati karena alasan struktural (tidak ada aturan, kategori ambigu, konfigurasi
pemberitahuan yang hilang) tidak menyebabkan kode keluar kegagalan; konteks tersebut dilaporkan dalam ringkasan.

## Terkait: peserta didik yang tertahan di bawah 100% pada jalur pembelajaran prasyarat

Jika aturan penyelesaian suatu kursus mensyaratkan jalur pembelajaran mencapai 100%, peserta didik yang menyelesaikan setiap
langkah tetapi tidak pernah membuka halaman "Congratulations" terakhir pada jalur tersebut tetap tertahan tepat di bawah 100% dan tidak pernah
menjadi memenuhi syarat di sini. Lihat
[Menyelesaikan Item Akhir Jalur Pembelajaran yang Tertahan](learning-path-final-items.md) — jalankan terlebih dahulu jika
peserta didik tidak menerima sertifikat yang Anda perkirakan telah mereka peroleh.

## Digantikan: skrip cron lama

`public/main/cron/add_gradebook_certificates.php` tidak lagi direkomendasikan. Skrip ini memuat setiap
hasil gradebook pada platform ke dalam memori dalam satu kueri tanpa batas dan tidak pernah melepaskannya
selama perulangan, sehingga dapat menghabiskan memori pada instans dengan jumlah kursus atau
latihan yang tidak sepele, dan tidak pernah mengirim pemberitahuan "Anda memperoleh sertifikat". Gunakan
`chamilo:gradebook:process-achievement-certificates` sebagai gantinya.