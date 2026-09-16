# Impor dan Ekspor Kursus

Chamilo mendukung impor dan ekspor kursus untuk keperluan cadangan, migrasi, dan berbagi konten.

Fitur-fitur ini terletak di dalam kursus, pada alat **Pemeliharaan** yang berada di bawah ikon roda gigi di bagian atas halaman utama kursus.

## Mengekspor Kursus

Guru dapat mengekspor kursus mereka sendiri dari alat Pemeliharaan kursus. Sebagai administrator, Anda dapat mengekspor kursus apa pun:

1. Masuk ke kursus
2. Akses alat **Pemeliharaan kursus**
3. Pilih **Buat cadangan**
4. Pilih apa yang akan disertakan (konten, data pengguna, dll.)
5. Unduh file ekspor

Ekspor akan membuat paket yang berisi dokumen kursus, latihan, forum, jalur pembelajaran, dan konfigurasi.

## Mengimpor Kursus

Untuk mengimpor kursus dari file ekspor Chamilo:

1. Masuk ke kursus
2. Akses alat **Pemeliharaan kursus**
3. Pada bagian **Impor cadangan**, unggah file ekspor
4. Pilih apa yang akan disertakan (konten, data pengguna, dll.)
5. Konfigurasikan opsi impor:
   * Apakah akan menimpa konten yang sudah ada
   * Apakah akan menyertakan data pengguna
6. Jalankan impor

## Menyalin Kursus

Untuk menyalin konten dari kursus lain ke kursus Anda, Anda perlu membuat kursus sumber dan kursus tujuan terlebih dahulu.

1. Masuk ke kursus tujuan
2. Akses alat **Pemeliharaan kursus**
3. Pada bagian **Salin kursus**, pilih kursus **Sumber**
4. Validasi opsi
5. Klik **Lanjutkan** dan ikuti petunjuk

## Common Cartridge

Chamilo mendukung standar **IMS Common Cartridge 1.3** (IMS CC 1.3) untuk interoperabilitas dengan sistem manajemen pembelajaran lainnya. Anda dapat:

* **Mengimpor** paket Common Cartridge (file .imscc)
* **Mengekspor** konten kursus dalam format Common Cartridge

Ini memungkinkan pertukaran konten dengan platform lain yang mendukung standar Common Cartridge (Moodle, Canvas, Blackboard, dll.).

## Mendaur Ulang Kursus

Fitur daur ulang kursus memungkinkan Anda untuk mempertahankan kerangka kursus tetapi menghapus kontennya.

## Menghapus Kursus

Ini akan menghapus kursus Anda sepenuhnya, termasuk semua konten dan aktivitas pengguna di dalamnya.

Untuk menghapus kursus secara permanen:

1. Masuk ke kursus tujuan
2. Akses alat **Pemeliharaan kursus**
3. Pada bagian **Hapus kursus ini sepenuhnya**, masukkan kode kursus secara manual untuk mengonfirmasi niat Anda
4. Validasi

Anda kemudian akan diarahkan ke halaman utama portal, karena kursus tersebut tidak ada lagi.

## Impor Moodle

Chamilo dapat mengimpor cadangan kursus dari **Moodle**. Pengimpor mengonversi struktur konten Moodle ke format Chamilo, termasuk kuis, dokumen, dan pengaturan kursus.

> **Sedang dalam proses pengembangan.** Meskipun sudah mencakup banyak hal, pengimpor Moodle saat ini belum mencakup semua jenis aktivitas dan format konten Moodle. Anggap ini sebagai titik awal yang mungkin masih memerlukan penyesuaian manual setelah impor selesai. Jika Anda mendeteksi elemen yang gagal atau hilang dalam impor atau ekspor, harap laporkan kepada kami melalui [ruang Github kami](https://github.com/chamilo/chamilo-lms/issues) dengan mengklik **New issue** di bagian atas dan memberikan detail sebanyak mungkin (termasuk cadangan kursus itu sendiri jika tidak bersifat rahasia).

## Tips

* **Cadangan rutin** — Dorong guru untuk mengekspor kursus mereka secara berkala sebagai cadangan
* **Uji impor** — Saat mengimpor konten dari platform lain, uji impor di kursus percobaan terlebih dahulu untuk memverifikasi bahwa semuanya ditransfer dengan benar
* **Portabilitas konten** — Gunakan format Common Cartridge ketika Anda perlu berbagi konten dengan platform LMS lainnya