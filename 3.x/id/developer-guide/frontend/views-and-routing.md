# Views and Routing

Chamilo memiliki kumpulan besar view Vue (komponen tingkat halaman) yang terhubung melalui Vue Router. File sebenarnya berada di bawah `assets/vue/views/`.

## Router Architecture

Router didefinisikan di `assets/vue/router/index.js` menggunakan `createWebHistory` untuk URL yang bersih.

Rute bersifat modular — diorganisasi ke dalam file rute per-fitur yang diimpor ke router utama:

| Route module | Pages |
|-------------|-------|
| `admin` | Halaman panel administrasi |
| `sessionAdmin` | Halaman administrasi sesi |
| `course` | Daftar kursus, pembuatan, beranda, katalog |
| `account` | Profil dan pengaturan pengguna |
| `personalfile` | Ruang berkas pribadi |
| `message` | Pesan / kotak masuk |
| `user` | Halaman manajemen pengguna |
| `usergroup` | Halaman grup pengguna (kelas) |
| `userreluser` | Halaman relasi pengguna (teman/ikuti) |
| `ccalendarevent` | Kalender dan agenda kursus |
| `ctoolintro` | Halaman pengantar alat kursus |
| `page` | Halaman CMS statis |
| `pageLayout` | Pembungkus tata letak halaman |
| `publicPage` | Halaman yang dapat diakses publik |
| `social` | Halaman jejaring sosial |
| `filemanager` | Manajer berkas (peramban dokumen kursus) |
| `skill` | Halaman keterampilan dan kompetensi |
| `accessurl` | Halaman manajemen multi-URL (portal) |
| `branch` | Halaman cabang / kampus jaringan |
| `room` | Halaman ruang virtual |
| `buycourses` | Halaman pembelian kursus |
| `documents` | Manajemen dokumen |
| `assignments` | Alur kerja tugas |
| `links` | Manajemen tautan eksternal |
| `glossary` | Manajemen glosarium |
| `attendance` | Pelacakan kehadiran |
| `lp` | Pemutar dan editor learning path |
| `dropbox` | Dropbox / pertukaran berkas |
| `blog` | Halaman blog |
| `blogAdmin` | Administrasi blog |
| `coursemaintenance` | Cadangan dan pemulihan kursus |
| `catalogue` | Katalog kursus dan sesi |

## Key Routes

| Path | View | Description |
|------|------|-------------|
| `/` | `AppIndex.vue` (or custom) | Titik masuk aplikasi |
| `/home` | `pages/Home.vue` | Halaman beranda platform |
| `/login` | `pages/Login.vue` | Halaman masuk |
| `/courses` | `views/user/courses/List.vue` | Kursus yang diikuti pengguna |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sesi saat ini |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sesi lalu |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sesi mendatang |
| `/course/:id/home` | `views/course/CourseHome.vue` | Beranda kursus |
| `/account/home` | `views/account/Home.vue` | Profil pengguna |
| `/admin` | Admin views | Panel administrasi |
| `/faq` | `pages/Faq.vue` | Halaman FAQ |

## Route Guards

Router menggunakan navigation guards (dideklarasikan dengan `beforeEach` dan `afterEach`) untuk:

* Memeriksa status autentikasi melalui `useSecurityStore` dan mengalihkan pengguna yang tidak terautentikasi ke `/login`
* Memverifikasi konteks kursus melalui `useCidReqStore`
* Menerapkan kelas CSS tipe halaman selama navigasi SPA (menggantikan apa yang akan dilakukan `PageHelper` Twig pada pemuatan halaman penuh)
* Mendukung override templat Vue kustom — komponen entri di `/` diganti dengan `AppIndex.vue` kustom ketika templat Vue kustom diaktifkan (`var/vue_templates/pages/AppIndex.vue`)

## View Organization

View berada di `assets/vue/views/`, diorganisasi berdasarkan fitur:

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```