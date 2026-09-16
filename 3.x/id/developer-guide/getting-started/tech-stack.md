# Tumpukan Teknologi

Berikut ini menjelaskan tumpukan teknologi untuk Chamilo 3.0. Semua versi yang disebutkan di sini kemungkinan akan berubah seiring dirilisnya versi baru Chamilo. Nomor versi menggunakan [notasi versi Composer](https://getcomposer.org/doc/articles/versions.md) yang menetapkan aturan untuk memungkinkan fleksibilitas tertentu seputar versi.

Termasuk dependensi hierarkis, Chamilo menggunakan beberapa ratus pustaka Perangkat Lunak Bebas. Daftar ini hanya mencakup pustaka yang paling sering kami gunakan dan yang kemungkinan akan memengaruhi pekerjaan pengembang Chamilo setiap minggu atau lebih. Kami berterima kasih kepada semua pengembang Perangkat Lunak Bebas lainnya yang membuat pekerjaan kami lebih mudah, lebih mudah dipelihara, dan lebih aman.

## Backend

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Runtime |
| Symfony | 7.4.* | Framework |
| Doctrine ORM | ^3.3 | Abstraksi basis data |
| API Platform | ^4.2 | Framework REST API |
| oneup/flysystem-bundle | ~4.0 | Abstraksi penyimpanan berkas |
| vich/uploader-bundle | ^2.8 | Penanganan unggah berkas |
| stof/doctrine-extensions-bundle | ^1.12 | Ekstensi Doctrine (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autentikasi JWT |
| nelmio/cors-bundle | ^2.2 | Header CORS |
| mpdf/mpdf | ~8.0 | Pembuatan PDF |
| phpoffice/phpspreadsheet | ~1.16 | Penanganan Excel/spreadsheet |
| firebase/php-jwt | ^7.0 | Penanganan token JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integrasi BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementasi LTI 1.3 |

## Frontend

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework UI |
| PrimeVue | ^4.5 | Pustaka komponen |
| Pinia | ^3.0 | Manajemen state |
| Vue Router | ^5.1 | Perutean sisi klien |
| Vue I18n | ^11.4 | Internasionalisasi |
| Axios | ^1.16 | Klien HTTP |
| TinyMCE | ^5.10 | Editor teks kaya |
| Chart.js | ^4.5 | Grafik dan visualisasi |
| FullCalendar | ^6.1 | Komponen kalender |
| Uppy | ^4.5 | Widget unggah berkas |

## Alat Build

| Teknologi | Versi | Tujuan |
|-----------|---------|---------|
| Composer | ^2.8 | Manajer dependensi PHP |
| Webpack | ^5.107 | Bundler modul |
| Symfony Webpack Encore | ^5.3 | Pembungkus Webpack untuk Symfony |
| Tailwind CSS | ^3.4 | Framework CSS utility-first |
| Sass | ^1.100 | Preprocessor CSS |
| TypeScript | ^5.9 | JavaScript yang type-safe |
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

Melalui adapter Flysystem:

* Sistem berkas lokal (bawaan)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)