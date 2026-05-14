# URL Akses

URL Akses memungkinkan satu instalasi Chamilo untuk melayani beberapa portal terpisah.

## Kasus Penggunaan

* **Penerapan multi-tenant** — Menghosting portal pelatihan terpisah untuk organisasi yang berbeda pada satu server
* **Portal departemen** — Memberikan portal bermerek sendiri untuk setiap departemen (misalnya, `hr.training.company.com`, `it.training.company.com`)
* **Portal regional** — Portal terpisah untuk wilayah atau bahasa yang berbeda

## Cara Kerja

Setiap URL akses adalah titik masuk terpisah ke instalasi Chamilo yang sama:

* Pengguna dapat ditetapkan ke satu atau lebih URL akses
* Kursus dan sesi milik URL akses tertentu
* Pengaturan platform dapat disesuaikan per URL akses
* Branding dan tema dapat berbeda per URL
* Pengguna di satu portal tidak dapat melihat pengguna atau kursus di portal lain (kecuali jika dibagikan secara eksplisit)

## Konfigurasi

### Mengaktifkan Multi-URL

Multi-URL harus diaktifkan dalam konfigurasi Chamilo (biasanya di pengaturan lingkungan). Ini biasanya dilakukan selama pengaturan awal.

### Membuat URL Akses

1. Dari panel administrasi, navigasikan ke **URL Akses**
2. Klik **Tambah URL**
3. Masukkan URL (misalnya, `https://portal2.yoursite.com`)
4. Konfigurasikan pengaturan khusus untuk URL ini
5. Simpan

### Menetapkan Pengguna dan Kursus

* **Pengguna** — Tetapkan pengguna ke URL akses tertentu. Seorang pengguna dapat tergabung ke beberapa URL.
* **Kursus** — Tetapkan kursus ke URL akses tertentu
* **Sesi** — Tetapkan sesi ke URL akses tertentu

### Pengaturan Per-URL

Setiap URL akses dapat memiliki:

* **Tema warna** — Branding visual yang berbeda
* **Nama dan logo platform** — Identitas khusus
* **Pengaturan override** — Pengaturan platform tertentu dapat disesuaikan per URL

## Tips

* **Putuskan sejak awal** — Jika memilih pengaturan multi-URL, Anda harus melakukannya di awal proyek Chamilo Anda karena ini membutuhkan URL pertama relatif kosong dari konten. Mengaktifkan multi-URL setelahnya lebih menantang (memerlukan perubahan basis data manual).
* **Rencanakan struktur URL** — Tentukan skema URL Anda sebelum membuat URL akses, karena mengubah URL nanti akan memengaruhi semua tautan dan bookmark yang ada
* **Konfigurasi DNS** — Setiap URL akses harus mengarah ke server Chamilo yang sama. Konfigurasikan catatan DNS sesuai kebutuhan.
* **Administrator global** — Gunakan peran Administrator Global untuk mengelola semua URL akses