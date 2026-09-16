# Visualisasi dan Rute

Chamilo memiliki sejumlah besar visualisasi Vue (komponen tingkat halaman) yang terhubung melalui Vue Router. File-file aktual terletak di `assets/vue/views/`.

## Arsitektur Router

Router didefinisikan di `assets/vue/router/index.js` menggunakan `createWebHistory` untuk URL yang bersih.

Rute-rute bersifat modular — diorganisir dalam file rute berdasarkan fungsionalitas, diimpor ke router utama:

| Modul Rute | Halaman |
|------------|---------|
| `admin` | Halaman panel administrasi |
| `sessionAdmin` | Halaman administrasi sesi |
| `course` | Daftar kursus, pembuatan, halaman utama, katalog |
| `account` | Profil dan pengaturan pengguna |
| `personalfile` | Ruang file pribadi |
| `message` | Pesan / kotak masuk |
| `user` | Halaman manajemen pengguna |
| `usergroup` | Halaman grup pengguna (kelas) |
| `userreluser` | Halaman hubungan antar pengguna (teman/pengikut) |
| `ccalendarevent` | Kalender dan agenda kursus |
| `ctoolintro` | Halaman pengenalan alat kursus |
| `page` | Halaman statis CMS |
| `pageLayout` | Pembungkus tata letak halaman |
| `publicPage` | Halaman yang dapat diakses secara publik |
| `social` | Halaman jejaring sosial |
| `filemanager` | Pengelola file (penjelajah dokumen kursus) |
| `skill` | Halaman keterampilan dan kompetensi |
| `accessurl` | Halaman manajemen multi-URL (portal) |
| `branch` | Halaman cabang / kampus jaringan |
| `room` | Halaman ruang virtual |
| `buycourses` | Halaman pembelian kursus |
| `documents` | Pengelolaan dokumen |
| `assignments` | Alur kerja tugas |
| `links` | Pengelolaan tautan eksternal |
| `glossary` | Pengelolaan glosarium |
| `attendance` | Pelacakan kehadiran |
| `lp` | Pemutar dan editor jalur pembelajaran |
| `dropbox` | Dropbox / pertukaran file |
| `blog` | Halaman blog |
| `blogAdmin` | Administrasi blog |
| `coursemaintenance` | Cadangan dan pemulihan kursus |
| `catalogue` | Katalog kursus dan sesi |

## Rute Utama

| Jalur | Visualisasi | Deskripsi |
|-------|-------------|-----------|
| `/` | `AppIndex.vue` (atau disesuaikan) | Titik masuk aplikasi |
| `/home` | `pages/Home.vue` | Halaman utama platform |
| `/login` | `pages/Login.vue` | Halaman masuk |
| `/courses` | `views/user/courses/List.vue` | Kursus yang diikuti pengguna |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sesi saat ini |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sesi yang telah lalu |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sesi yang akan datang |
| `/course/:id/home` | `views/course/CourseHome.vue` | Halaman utama kursus |
| `/account/home` | `views/account/Home.vue` | Profil pengguna |
| `/admin` | Visualisasi administrator | Panel administrasi |
| `/faq` | `pages/Faq.vue` | Halaman pertanyaan yang sering diajukan (FAQ) |

## Penjaga Rute

Router menggunakan penjaga navigasi (dideklarasikan dengan `beforeEach` dan `afterEach`) untuk:

* Memeriksa status autentikasi melalui `useSecurityStore` dan mengarahkan pengguna yang tidak terautentikasi ke `/login`
* Memeriksa konteks kursus melalui `useCidReqStore`
* Menerapkan kelas CSS tipe halaman selama navigasi SPA (menggantikan apa yang akan dilakukan `PageHelper` dari Twig pada pemuatan halaman penuh)
* Mendukung penggantian template Vue yang disesuaikan — komponen masuk di `/` diganti dengan `AppIndex.vue` yang disesuaikan ketika template Vue yang disesuaikan diaktifkan (`var/vue_templates/pages/AppIndex.vue`)

---
## Organisasi Tampilan

Tampilan berada di `assets/vue/views/`, diorganisasi berdasarkan fungsionalitas:

```
views/
├── account/          # Profil dan pengaturan pengguna
├── admin/            # Halaman administrasi
├── assignments/      # Pengiriman dan penilaian tugas
├── attendance/       # Lembar kehadiran
├── blog/             # Postingan dan komentar blog
├── branch/           # Manajemen kampus jaringan
├── buycourses/       # Alur pembelian kursus
├── ccalendarevent/   # Kalender kursus
├── course/           # Daftar kursus, halaman utama, pembuatan, katalog
├── coursecategory/   # Manajemen kategori kursus
├── coursemaintenance/# Cadangan/pemulihan kursus
├── ctoolintro/       # Halaman pengenalan alat
├── documents/        # Daftar dokumen, pembuatan, pembuatan media
├── dropbox/          # Dropbox / pertukaran berkas
├── filemanager/      # Penjelajah berkas
├── glossary/         # Daftar glosarium dan manajemen istilah
├── links/            # Tautan eksternal
├── lp/               # Pemutar dan editor jalur pembelajaran
├── message/          # Kotak masuk dan pesan
├── page/             # Halaman statis CMS
├── pageLayout/       # Pembungkus tata letak halaman
├── personalfile/     # Ruang berkas pribadi
├── room/             # Ruang virtual
├── sessionadmin/     # Administrasi sesi
├── skill/            # Keterampilan dan kompetensi
├── social/           # Jejaring sosial
├── terms/            # Syarat layanan
├── user/             # Manajemen pengguna dan daftar kursus/sesi
├── usergroup/        # Grup pengguna (kelas)
└── userreluser/      # Hubungan antar pengguna (teman/pengikut)
```