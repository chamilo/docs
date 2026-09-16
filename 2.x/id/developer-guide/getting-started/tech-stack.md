# Tumpukan Teknologi

Berikut ini adalah deskripsi tumpukan teknologi Chamilo 2.0. Semua versi yang disebutkan di sini dapat berubah seiring dengan dirilisnya versi baru Chamilo. Nomor versi menggunakan [notasi versi Composer](https://getcomposer.org/doc/articles/versions.md), yang menetapkan aturan untuk memungkinkan fleksibilitas tertentu terkait versi.

Termasuk dependensi hierarkis, Chamilo menggunakan ratusan pustaka Perangkat Lunak Bebas. Daftar ini hanya mencakup pustaka yang paling sering kami gunakan dan kemungkinan besar akan memengaruhi pekerjaan seorang pengembang Chamilo setiap minggu. Kami berterima kasih kepada semua pengembang Perangkat Lunak Bebas lainnya yang membuat pekerjaan kami lebih mudah, berkelanjutan, dan aman.

## Backend

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| PHP | 8.2+ | Lingkungan eksekusi |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Abstraksi basis data |
| API Platform | ^3.0 | Framework untuk API REST |
| oneup/flysystem-bundle | ~4.0 | Abstraksi penyimpanan berkas |
| vich/uploader-bundle | ^2.8 | Manajemen unggah berkas |
| stof/doctrine-extensions-bundle | ^1.12 | Ekstensi Doctrine (pohon, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autentikasi JWT |
| nelmio/cors-bundle | ^2.2 | Header CORS |
| mpdf/mpdf | ~8.0 | Pembuatan PDF |
| phpoffice/phpspreadsheet | ~1.16 | Manipulasi lembar kerja Excel |
| firebase/php-jwt | ^7.0 | Manipulasi token JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integrasi dengan BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementasi LTI 1.3 |

## Frontend

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework antarmuka pengguna |
| PrimeVue | ^4.5 | Pustaka komponen |
| Pinia | ^3.0 | Manajemen status |
| Vue Router | 5.0 | Perutean sisi klien |
| Vue I18n | 11.3 | Internasionalisasi |
| Axios | ^1.13 | Klien HTTP |
| TinyMCE | ^5.10 | Editor teks kaya |
| Chart.js | ^4.5 | Grafik dan visualisasi |
| FullCalendar | ^6.1 | Komponen kalender |
| Uppy | ^4.5 | Widget unggah berkas |
| PrimeFlex | ^4.0 | Framework utilitas CSS |

## Alat Build

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| Composer | ^2.8 | Manajer dependensi PHP |
| Webpack | ^5.105 | Pengemas modul |
| Symfony Webpack Encore | ^5.3 | Pembungkus Webpack untuk Symfony |
| Tailwind CSS | ^3.4 | Framework CSS utilitas |
| Sass | ^1.98 | Preprosesor CSS |
| TypeScript | ^5.9 | JavaScript dengan tipe aman |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Pemformatan kode |

## Ikon

| Pustaka | Versi | Penggunaan |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (kelas CSS `mdi mdi-*`) |

## Basis Data

Chamilo mendukung:

* MySQL 5.7+
* MariaDB 10.11.2+

## Penyimpanan Cloud

Melalui adaptor Flysystem:

* Sistem berkas lokal (default)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)