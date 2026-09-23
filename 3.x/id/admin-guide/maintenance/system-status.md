# Status Sistem

Halaman status sistem membantu Anda memverifikasi bahwa server Chamilo Anda dikonfigurasi dengan benar dan mengidentifikasi potensi masalah.

## Mengakses Status Sistem

Dari panel administrasi, klik **System status** (atau **System information**).

## Apa yang Ditampilkan

![Halaman status sistem yang menampilkan konfigurasi PHP, status basis data, izin berkas, dan informasi server](../../.gitbook/assets/admin-system-status.png)

### Konfigurasi PHP

* **PHP version** — Chamilo 3.0 mendukung PHP 8.3, 8.4, dan 8.5
* **Required extensions** — Memeriksa bahwa semua ekstensi PHP yang diperlukan telah terpasang
* **PHP settings** — Memverifikasi pengaturan PHP penting seperti batas memori, batas unggah, dan waktu eksekusi

### Status Basis Data

* **Database connection** — Mengonfirmasi bahwa basis data dapat diakses
* **Database version** — Menampilkan versi server basis data

### Izin Berkas

* **Writable directories** — Memeriksa bahwa Chamilo dapat menulis ke direktori yang diperlukan (cache, uploads, logs)

### Informasi Server

* **Operating system** — Detail OS server
* **Web server** — Apache, Nginx, atau lainnya
* **Disk space** — Penyimpanan yang tersedia

## Pemeriksaan yang Direkomendasikan

Lakukan pemeriksaan ini secara berkala:

* **After installation** — Verifikasi bahwa semua persyaratan terpenuhi
* **After upgrades** — Pastikan versi PHP dan ekstensi masih kompatibel
* **When issues arise** — Periksa status sistem terlebih dahulu saat memecahkan masalah