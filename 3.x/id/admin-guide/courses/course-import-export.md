# Impor dan Ekspor Kursus

Chamilo mendukung impor dan ekspor kursus untuk keperluan cadangan, migrasi, dan berbagi konten.

Fitur-fitur ini berada di dalam kursus, pada alat **Maintenance** yang terletak di bawah ikon roda gigi di bagian atas beranda kursus.

## Mengekspor Kursus

Pengajar dapat mengekspor kursus mereka sendiri dari alat Maintenance kursus. Sebagai administrator, Anda dapat mengekspor kursus mana pun:

1. Masuk ke kursus
2. Akses alat **Course maintenance**
3. Pilih **Create a backup**
4. Pilih apa yang akan disertakan (konten, data pengguna, dll.)
5. Unduh berkas ekspor

Ekspor menghasilkan paket yang berisi dokumen, latihan, forum, jalur pembelajaran, dan konfigurasi kursus.

## Mengimpor Kursus

Untuk mengimpor kursus dari berkas ekspor Chamilo:

1. Masuk ke kursus
2. Akses alat **Course maintenance**
3. Pada bagian **Import backup**, unggah berkas ekspor
4. Pilih apa yang akan disertakan (konten, data pengguna, dll.)
5. Konfigurasikan opsi impor:
   * Apakah akan menimpa konten yang sudah ada
   * Apakah akan menyertakan data pengguna
6. Jalankan impor

## Menyalin Kursus

Untuk menyalin isi dari kursus lain ke dalam kursus Anda, Anda memerlukan kursus sumber dan kursus tujuan yang sudah dibuat terlebih dahulu.

1. Masuk ke kursus tujuan
2. Akses alat **Course maintenance**
3. Pada bagian **Copy course**, pilih kursus **Source**
4. Validasi opsi
5. Klik **Continue** dan ikuti petunjuknya

## Common Cartridge

Chamilo mendukung standar **IMS Common Cartridge 1.3** (IMS CC 1.3) untuk interoperabilitas dengan sistem manajemen pembelajaran lainnya. Anda dapat:

* **Mengimpor** paket Common Cartridge (berkas .imscc)
* **Mengekspor** konten kursus dalam format Common Cartridge

Hal ini memungkinkan pertukaran konten dengan platform lain yang mendukung standar Common Cartridge (Moodle, Canvas, Blackboard, dll.).

## Mendaur ulang kursus

Fitur daur ulang kursus memungkinkan Anda mempertahankan kerangka kursus tetapi menghapus isinya.

## Menghapus kursus

Tindakan ini akan menghapus kursus Anda sepenuhnya, termasuk seluruh isinya dan aktivitas pengguna di dalamnya.

Untuk menghapus kursus secara permanen:

1. Masuk ke kursus tujuan
2. Akses alat **Course maintenance**
3. Pada bagian **Completely delete this course**, masukkan kode kursus secara manual untuk mengonfirmasi niat Anda
4. Validasi

Anda kemudian dialihkan ke beranda portal, karena kursus tersebut sudah tidak ada lagi.

## Impor Moodle

Chamilo dapat mengimpor cadangan kursus dari **Moodle**. Pengimpor mengonversi struktur konten Moodle ke format Chamilo, termasuk kuis, dokumen, dan pengaturan kursus.

> **Masih dalam pengembangan.** Meskipun sudah mencakup basis yang luas, pengimpor Moodle saat ini belum mencakup setiap jenis aktivitas dan format konten Moodle. Anggaplah ini sebagai titik awal yang mungkin masih memerlukan penyesuaian manual setelah impor selesai. Jika Anda menemukan elemen yang gagal/hilang dalam impor atau ekspor, harap laporkan kepada kami melalui [ruang Github](https://github.com/chamilo/chamilo-lms/issues) kami dengan mengklik **New issue** di bagian atas dan memberikan sebanyak mungkin rincian (termasuk cadangan kursus itu sendiri jika tidak bersifat rahasia).

## Tips

* **Cadangan berkala** — Dorong pengajar untuk mengekspor kursus mereka secara berkala sebagai cadangan
* **Uji impor** — Saat mengimpor konten dari platform lain, uji impor tersebut terlebih dahulu di kursus percobaan untuk memverifikasi bahwa semuanya tertransfer dengan benar
* **Portabilitas konten** — Gunakan format Common Cartridge ketika Anda perlu berbagi konten dengan platform LMS lain