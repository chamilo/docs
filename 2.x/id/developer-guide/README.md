# Panduan Pengembang

Selamat datang di Panduan Pengembang Chamilo 2.0. Panduan ini ditujukan untuk pengembang yang ingin memahami arsitektur Chamilo, memperluas platform dengan plugin, menggunakan API, menyesuaikan antarmuka, atau berkontribusi pada proyek ini.

## Arsitektur Secara Singkat

Chamilo 2.0 dibangun berdasarkan:

* **Backend**: Symfony 6.4 (PHP 8.2+) dengan Doctrine ORM dan API Platform 3.0
* **Frontend**: Vue 3 dengan PrimeVue, manajemen status Pinia, dan Vue Router
* **Sistem Build**: Webpack 5 melalui Symfony Webpack Encore, dengan Tailwind CSS
* **Autentikasi**: Token JWT (lexik/jwt-authentication-bundle)
* **Penyimpanan File**: Flysystem (mendukung lokal, AWS S3, Azure Blob, Google Cloud)

Kode sumber diorganisasi dalam tiga bundle Symfony:

| Bundle | Tujuan |
|--------|--------|
| **CoreBundle** | Inti platform: pengguna, pengaturan, sumber daya, administrasi, penyedia AI, keamanan |
| **CourseBundle** | Fungsionalitas khusus kursus: dokumen, latihan, jalur pembelajaran, forum, dll. |
| **LtiBundle** | Integrasi LTI 1.3 untuk alat pembelajaran eksternal |

## Bagaimana Panduan Ini Disusun

1. **Langkah Awal** — Tumpukan teknologi, pengaturan pengembangan, struktur proyek
2. **Backend** — Arsitektur Symfony, entitas, sistem sumber daya, pengontrol, konfigurasi
3. **API** — API REST melalui API Platform, autentikasi JWT, tindakan khusus
4. **Frontend** — Komponen Vue, tampilan, perutean, manajemen status, sistem build
5. **Tema** — Tema warna, CSS/Tailwind, template Twig
6. **Plugin** — Arsitektur dan pengembangan plugin
7. **Kontribusi** — Konvensi pengkodean, alur kerja dengan git, pengujian