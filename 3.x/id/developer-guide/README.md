# Panduan Pengembang

Selamat datang di Panduan Pengembang Chamilo 3.0. Panduan ini ditujukan bagi pengembang yang ingin memahami arsitektur Chamilo, memperluas platform dengan plugin, menggunakan API, menyesuaikan antarmuka, atau berkontribusi pada proyek.

## Arsitektur Secara Ringkas

Chamilo 3.0 dibangun di atas:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) dengan Doctrine ORM dan API Platform 4
* **Frontend**: Vue 3 dengan PrimeVue, manajemen state Pinia, dan Vue Router
* **Sistem build**: Webpack 5 melalui Symfony Webpack Encore, dengan Tailwind CSS
* **Autentikasi**: token JWT (lexik/jwt-authentication-bundle)
* **Penyimpanan berkas**: Flysystem (mendukung lokal, AWS S3, Azure Blob, Google Cloud)

Kode sumber diorganisasi ke dalam tiga bundle Symfony:

| Bundle | Tujuan |
|--------|---------|
| **CoreBundle** | Inti platform: pengguna, pengaturan, sumber daya, admin, penyedia AI, keamanan |
| **CourseBundle** | Fitur khusus kursus: dokumen, latihan, jalur pembelajaran, forum, dll. |
| **LtiBundle** | Integrasi LTI 1.3 untuk alat pembelajaran eksternal |

## Bagaimana Panduan Ini Diorganisasi

1. **Memulai** — Tumpukan teknologi, penyiapan pengembangan, struktur proyek
2. **Backend** — Arsitektur Symfony, entitas, sistem sumber daya, controller, pengaturan
3. **API** — REST API melalui API Platform, autentikasi JWT, aksi kustom
4. **Frontend** — Komponen Vue, view, routing, manajemen state, sistem build
5. **Theming** — Tema warna, CSS/Tailwind, templat Twig
6. **Plugins** — Arsitektur plugin dan pengembangannya
7. **Berkontribusi** — Konvensi pengodean, alur kerja git, pengujian