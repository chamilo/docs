# Struktur Proyek

## Direktori Tingkat Atas

```
chamilo/
├── assets/          # Kode sumber frontend
│   ├── vue/         # Aplikasi Vue 3 (komponen, tampilan, router, store)
│   ├── css/         # Lembar gaya SCSS
│   └── js/          # JavaScript lama
├── config/          # Konfigurasi Symfony (rute, layanan, paket)
├── public/          # Akar web (index.php, halaman PHP lama, plugin)
│   ├── main/        # Modul PHP lama (satu subdirektori per alat)
│   └── plugin/      # Plugin bawaan dan kustom
├── src/             # Kode sumber PHP (bundle Symfony)
│   ├── CoreBundle/  # Logika inti platform
│   ├── CourseBundle/# Fitur khusus kursus
│   └── LtiBundle/   # Integrasi LTI 1.3
├── templates/       # Templat Twig
├── var/             # Cache, log, unggahan (dibuat otomatis)
├── vendor/          # Dependensi Composer (dibuat otomatis)
├── node_modules/    # Dependensi npm (dibuat otomatis)
└── translations/    # Berkas terjemahan
```

## Kode Sumber (`src/`)

### CoreBundle

Bundle terbesar. Subdirektori yang penting:

| Direktori | Isi |
|-----------|-----|
| `Entity/` | Entitas Doctrine (User, Course, Session, ResourceNode, dll.) |
| `Controller/` | Pengontrol administrasi, aksi API, dan halaman (subfolder Api/ berisi aksi kustom API Platform) |
| `Settings/` | Berkas skema pengaturan (konfigurasi platform) |
| `Repository/` | Repositori Doctrine |
| `AiProvider/` | Implementasi penyedia AI (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definisi alat kursus |
| `Security/` | Voters, autentikator, otorisasi |
| `EventListener/` | Pendengar acara |
| `EventSubscriber/` | Pelanggan acara |
| `Command/` | Perintah konsol Symfony |
| `Migrations/` | Migrasi basis data |
| `Twig/` | Ekstensi Twig |
| `Storage/` | Adaptor penyimpanan Flysystem |

### CourseBundle

Entitas dan logika khusus kursus:

| Direktori | Isi |
|-----------|-----|
| `Entity/` | Entitas konten kursus (CDocument, CQuiz, CLp, CForum, CStudentPublication, dll.) |
| `Controller/` | Pengontrol kursus |
| `Settings/` | Skema pengaturan di tingkat kursus |
| `Component/CourseCopy/` | Impor/ekspor kursus (Common Cartridge, Moodle) |

### LtiBundle

Integrasi LTI 1.3:

| Direktori | Isi |
|-----------|-----|
| `Entity/` | Entitas platform, alat, dan penyebaran LTI |
| `Controller/` | Titik akhir peluncuran dan konfigurasi LTI |

---
## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Titik masuk aplikasi
├── main_installer.js    # Titik masuk penginstal
├── components/          # Komponen Vue yang dapat digunakan kembali
│   ├── accessurl/       # Komponen multi-URL (portal)
│   ├── admin/           # Komponen khusus untuk administrator
│   ├── assignments/     # Formulir dan daftar tugas
│   ├── attendance/      # Komponen lembar kehadiran
│   ├── basecomponents/  # Komponen dasar yang dibagikan (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, dll.) dan ChamiloIcons.js
│   ├── blog/            # Komponen blog
│   ├── branch/          # Komponen cabang/kampus jaringan
│   ├── ccalendarevent/  # Komponen acara kalender kursus
│   ├── chat/            # Obrolan dan tutor AI
│   ├── course/          # Kartu kursus, katalog, formulir
│   ├── coursecategory/  # Komponen kategori kursus
│   ├── coursemaintenance/ # Komponen cadangan/pemulihan kursus
│   ├── ctoolintro/      # Komponen pengenalan alat kursus
│   ├── documents/       # Komponen manajemen dokumen
│   ├── dropbox/         # Komponen Dropbox (pertukaran berkas)
│   ├── filemanager/     # Komponen penjelajah berkas
│   ├── glossary/        # Komponen glosarium
│   ├── installer/       # Asisten instalasi
│   ├── layout/          # Bilah samping, bilah atas, tata letak shell
│   ├── links/           # Komponen tautan eksternal
│   ├── login/           # Komponen formulir masuk
│   ├── lp/              # Komponen jalur pembelajaran
│   ├── message/         # Komponen pesan
│   ├── page/            # Komponen halaman statis
│   ├── pageLayout/      # Komponen pembungkus tata letak halaman
│   ├── personalfile/    # Komponen ruang berkas pribadi
│   ├── platform/        # Komponen UI pada tingkat platform
│   ├── resource_links/  # Komponen manajemen tautan sumber daya
│   ├── room/            # Komponen ruang virtual
│   ├── session/         # Komponen sesi (kampanye pembelajaran)
│   ├── sessionadmin/    # Komponen administrasi sesi
│   ├── skill/           # Komponen keterampilan dan kompetensi
│   ├── social/          # Komponen jejaring sosial
│   ├── systemannouncement/ # Komponen pengumuman sistem
│   ├── user/            # Komponen profil dan manajemen pengguna
│   ├── usergroup/       # Komponen grup pengguna (kelas)
│   └── userreluser/     # Komponen hubungan pengguna (teman/mengikuti)
├── views/               # Tampilan Vue pada tingkat halaman (mencerminkan struktur components/)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + satu modul per area fungsionalitas)
├── store/               # Store Pinia
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Fungsi komposisi yang dibagikan (subdirektori berdasarkan fungsionalitas)
├── services/            # Lapisan layanan API (satu berkas per entitas/domain)
├── utils/               # Pembantu utilitas (tanggal, hydra, fetch, sanitizeHtml, dll.)
├── config/              # Konfigurasi saat runtime (api.js, env.js)
├── constants/           # Konstanta yang dibagikan
│   └── entity/          # Konstanta spesifik entitas (sesi, pesan, bidang tambahan, dll.)
├── layouts/             # Komponen tata letak tingkat tinggi (MyCourses.vue)
├── pages/               # Komponen halaman mandiri (Home, Login, Faq, Demo)
├── mixins/              # Mixin gaya Vue 2 lama (ListMixin, CreateMixin, dll.)
├── hooks/               # Hook yang dapat dikomposisi (useSidebar, useState)
├── plugins/             # Pendaftaran plugin Vue (httpErrors, vuetify)
├── validators/          # Validator kustom Vuelidate
└── error/               # Komponen batas kesalahan
```

---
## Konfigurasi (`config/`)

```
config/
├── packages/            # Konfigurasi paket dan framework (satu file YAML per paket)
│   ├── security.yaml    # Hierarki peran, firewall, kontrol akses
│   ├── doctrine.yaml    # Pengaturan Doctrine ORM dan DBAL
│   ├── api_platform.yaml# Konfigurasi API Platform
│   ├── framework.yaml   # Pengaturan utama Symfony
│   ├── lexik_jwt_authentication.yaml  # Pengaturan token JWT
│   ├── nelmio_cors.yaml # Header CORS untuk konsumen API
│   ├── oneup_flysystem.yaml  # Adaptor penyimpanan cloud
│   ├── webpack_encore.yaml   # Integrasi dengan Webpack Encore
│   ├── ... (lebih dari 30 file paket)
│   ├── dev/             # Penggantian khusus untuk pengembangan (web profiler, debug, routing)
│   ├── prod/            # Penggantian khusus untuk produksi (saat ini hanya placeholder kosong)
│   └── test/            # Penggantian untuk lingkungan pengujian (JWT, validator, web profiler)
├── routes/              # Definisi rute
│   ├── api_platform.yaml     # Awalan rute API Platform
│   ├── attributes.yaml       # Rute berbasis anotasi controller
│   ├── fos_js_routing.yaml   # Eksposur routing FOS JS
│   ├── legacy.yaml           # Rute untuk halaman PHP lama di public/main/
│   ├── security.yaml         # Rute login/logout/OAuth2
│   ├── dev/                  # Rute khusus untuk pengembangan (profiler, Maker bundle)
│   └── test/                 # Penggantian rute khusus untuk pengujian
├── jwt/                 # Pasangan kunci JWT (kunci privat/publik)
└── jwt-test/            # Kunci JWT untuk lingkungan pengujian
```

Symfony secara otomatis menggabungkan file dasar `packages/*.yaml` dengan file di subdirektori lingkungan yang sesuai (`dev/`, `prod/`, atau `test/`), sehingga file khusus lingkungan hanya perlu mengganti nilai yang berbeda.

## Konfigurasi Build

| File | Tujuan |
|------|---------|
| `webpack.config.js` | Konfigurasi Webpack Encore (entri, loader, plugin) |
| `tailwind.config.js` | Konfigurasi Tailwind CSS (jalur konten, ekstensi tema, plugin) |
| `tsconfig.json` | Konfigurasi TypeScript |
| `eslint.config.mjs` | Aturan ESLint (konfigurasi datar) |
| `.prettierrc.json` | Aturan pemformatan Prettier |

Semua file berada di root proyek. Plugin PostCSS (Tailwind + Autoprefixer) dikonfigurasi secara inline di dalam `webpack.config.js` melalui `enablePostCssLoader()` — tidak ada file terpisah `postcss.config.js`. File `webpack.config.js` membaca `tailwind.config.js` secara tidak langsung melalui PostCSS, sehingga perubahan pada bagian `content` atau `theme` di Tailwind akan berlaku pada eksekusi berikutnya dari `yarn encore dev` / `yarn encore production`.

## Titik Masuk Webpack

Build menghasilkan paket-paket berikut:

**JavaScript:**
* `vue` — Aplikasi utama Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Panduan instalasi (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS lama untuk halaman yang belum bermigrasi ke Vue

**CSS:**
* `app` — Lembar gaya utama (`assets/css/app.scss`)
* Selain itu, lembar gaya khusus: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

---
## Struktur CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Titik masuk — mengimpor Tailwind, indeks SCSS, dan CSS pihak ketiga
├── _tailwind.scss       # Direktif Tailwind (@tailwind base / components / utilities)
├── chat.scss            # Gaya untuk panel obrolan dan tutor AI
├── document.scss        # Gaya untuk penampil dokumen
├── editor.scss          # Gaya untuk antarmuka editor TinyMCE
├── editor_content.scss  # Gaya yang disuntikkan ke dalam tubuh iframe editor
├── markdown.scss        # Gaya konten yang dirender dalam Markdown
├── print.scss           # Lembar gaya untuk pencetakan
├── responsive.scss      # Penimpaan responsif
├── scorm.scss           # Gaya untuk pemutar SCORM
├── legacy/              # Gaya untuk halaman PHP lama (mis.: frameReadyLoader.scss)
└── scss/                # Bagian modular dari SCSS
    ├── index.scss           # File barrel — mengimpor semua bagian di bawah ini
    ├── abstracts/           # Mixin dan fungsi yang dibagikan
    ├── settings/            # Token desain (tipografi, basis komponen)
    ├── atoms/               # Penimpaan PrimeVue per komponen (tombol, input, kalender, dll.)
    ├── molecules/           # Pola UI kecil yang tersusun (chip, bilah alat, status kosong)
    ├── organisms/           # Area fungsionalitas yang lebih besar (bilah sisi, tabel data, dialog, panel LP, dll.)
    ├── layout/              # Bagian kerangka halaman (bilah atas, wadah utama, breadcrumb)
    ├── components/          # File spesifik komponen lama (blog, latihan, sosial, keterampilan, dll.)
    └── libs/                # Penimpaan pustaka pihak ketiga (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

Tailwind terintegrasi melalui PostCSS. File `assets/css/_tailwind.scss` menghasilkan lapisan dasar, komponen, dan utilitas; file `assets/css/app.scss` mengimpornya terlebih dahulu, sehingga utilitas Tailwind tersedia di semua file parsial lainnya. Konfigurasi Tailwind — jalur konten untuk pembersihan, ekstensi tema, dan plugin — terletak di `tailwind.config.js` di akar proyek (`/var/www/chamilo/tailwind.config.js`).

Kelas utilitas kustom dan kelas komponen yang didefinisikan dengan `@layer` (terlihat di `app.scss`) mengikuti konvensi lapisan Tailwind, sehingga kelas yang ditentukan pengguna menghormati aturan spesifisitas yang sama seperti utilitas yang dihasilkan.

### Tema Warna

Chamilo mendukung sistem tema warna yang dapat dikonfigurasi langsung melalui antarmuka administrasi (**Admin > Tema Warna**). Setiap tema yang disimpan akan menyimpan file-nya di direktori khusus di bawah `var/themes/`:

```
var/themes/
└── [nama-tema]/
    ├── colors.css       # Properti CSS kustom untuk palet warna lengkap
    ├── default.css      # Aturan CSS kustom tambahan opsional
    ├── learnpath.css    # Penimpaan khusus untuk jalur pembelajaran
    ├── tiny-settings.js # Pengaturan palet warna editor TinyMCE
    └── images/          # Gambar tema (logo, favicon, latar belakang, ikon PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Gambar latar belakang, gambar blok administrasi, dll.
```

File `colors.css` mendefinisikan properti CSS kustom sebagai triplet kanal RGB yang dipisahkan oleh spasi, bukan nilai `rgb()`, yang memungkinkan Tailwind untuk menyusun varian opasitas (misalnya, `bg-primary/50`) tanpa konfigurasi tambahan:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Lapisan tema berada di atas paket Tailwind/SCSS yang dikompilasi: peramban memuat `colors.css` setelah lembar gaya utama, sehingga perubahan tema berlaku segera tanpa perlu langkah kompilasi.