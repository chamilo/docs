# Status Sistem

Halaman status sistem membantu Anda memverifikasi bahwa server Chamilo Anda dikonfigurasi dengan benar dan mengidentifikasi potensi masalah.

## Mengakses Status Sistem

Dari panel administrasi, klik **Status sistem** (atau **Informasi sistem**).

## Apa yang Ditampilkan

![Halaman status sistem yang menunjukkan konfigurasi PHP, status basis data, izin file, dan informasi server](/.gitbook/assets/admin-system-status.png)

### Konfigurasi PHP

* **Versi PHP** — Chamilo 2.0 membutuhkan PHP 8.2 atau lebih tinggi
* **Ekstensi yang diperlukan** — Memeriksa bahwa semua ekstensi PHP yang diperlukan telah terinstal
* **Pengaturan PHP** — Memverifikasi pengaturan PHP yang penting seperti batas memori, batas unggah, dan waktu eksekusi

### Status Basis Data

* **Koneksi basis data** — Mengonfirmasi bahwa basis data dapat diakses
* **Versi basis data** — Menampilkan versi server basis data

### Izin File

* **Direktori yang dapat ditulis** — Memeriksa bahwa Chamilo dapat menulis ke direktori yang diperlukan (cache, unggahan, log)

### Informasi Server

* **Sistem operasi** — Detail OS server
* **Server web** — Apache, Nginx, atau lainnya
* **Ruang penyimpanan** — Penyimpanan yang tersedia

## Pemeriksaan yang Direkomendasikan

Lakukan pemeriksaan ini secara rutin:

* **Setelah instalasi** — Pastikan semua persyaratan terpenuhi
* **Setelah pembaruan** — Pastikan versi PHP dan ekstensi masih kompatibel
* **Ketika masalah muncul** — Periksa status sistem terlebih dahulu saat menangani masalah