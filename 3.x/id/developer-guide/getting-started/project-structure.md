# Struktur Proyek

## Direktori Tingkat Atas

```
chamilo/
├── assets/          # Frontend source code
│   ├── vue/         # Vue 3 application (components, views, router, stores)
│   ├── css/         # SCSS stylesheets
│   └── js/          # Legacy JavaScript
├── config/          # Symfony configuration (routes, services, packages)
├── public/          # Web root (index.php, legacy PHP pages, plugins)
│   ├── main/        # Legacy PHP modules (one subdirectory per tool)
│   └── plugin/      # Bundled and custom plugins
├── src/             # PHP source code (Symfony bundles)
│   ├── CoreBundle/  # Core platform logic
│   ├── CourseBundle/# Course-specific features
│   └── LtiBundle/   # LTI 1.3 integration
├── templates/       # Twig templates
├── var/             # Cache, logs, uploads (generated)
├── vendor/          # Composer dependencies (generated)
├── node_modules/    # npm dependencies (generated)
└── translations/    # Translation files
```

## Kode Sumber (`src/`)

### CoreBundle

Bundle terbesar. Subdirektori yang menonjol:

| Direktori | Isi |
|-----------|----------|
| `Entity/` | Entitas Doctrine (User, Course, Session, ResourceNode, dll.) |
| `Controller/` | Controller admin, aksi API, dan halaman (subfolder Api/ menampung aksi API Platform kustom) |
| `Settings/` | Berkas skema pengaturan (konfigurasi platform) |
| `Repository/` | Repository Doctrine |
| `AiProvider/` | Implementasi penyedia AI (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definisi alat kursus |
| `Security/` | Voter, authenticator, otorisasi |
| `EventListener/` | Event listener |
| `EventSubscriber/` | Event subscriber |
| `Command/` | Perintah konsol Symfony |
| `Migrations/` | Migrasi basis data |
| `Twig/` | Ekstensi Twig |
| `Storage/` | Adapter penyimpanan Flysystem |

### CourseBundle

Entitas dan logika khusus kursus:

| Direktori | Isi |
|-----------|----------|
| `Entity/` | Entitas konten kursus (CDocument, CQuiz, CLp, CForum, CStudentPublication, dll.) |
| `Controller/` | Controller kursus |
| `Settings/` | Skema pengaturan tingkat kursus |
| `Component/CourseCopy/` | Impor/ekspor kursus (Common Cartridge, Moodle) |

### LtiBundle

Integrasi LTI 1.3:

| Direktori | Isi |
|-----------|----------|
| `Entity/` | Entitas platform, tool, dan deployment LTI |
| `Controller/` | Endpoint peluncuran dan konfigurasi LTI |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Application entry point
├── main_installer.js    # Installer entry point
├── components/          # Reusable Vue components
│   ├── accessurl/       # Multi-URL (portal) components
│   ├── admin/           # Admin-specific components
│   ├── assignments/     # Assignment forms and lists
│   ├── attendance/      # Attendance sheet components
│   ├── basecomponents/  # Shared base components (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) and ChamiloIcons.js
│   ├── blog/            # Blog components
│   ├── branch/          # Branch/network campus components
│   ├── ccalendarevent/  # Course calendar event components
│   ├── chat/            # Chat and AI tutor
│   ├── course/          # Course cards, catalogs, forms
│   ├── coursecategory/  # Course category components
│   ├── coursemaintenance/ # Course backup/restore components
│   ├── ctoolintro/      # Course tool introduction components
│   ├── documents/       # Document management components
│   ├── dropbox/         # Dropbox (file exchange) components
│   ├── filemanager/     # File browser components
│   ├── glossary/        # Glossary components
│   ├── installer/       # Installation wizard
│   ├── layout/          # Sidebar, Topbar, shell layout
│   ├── links/           # External links components
│   ├── login/           # Login form components
│   ├── lp/              # Learning path components
│   ├── message/         # Messaging components
│   ├── page/            # Static page components
│   ├── pageLayout/      # Page layout wrapper components
│   ├── personalfile/    # Personal file space components
│   ├── platform/        # Platform-level UI components
│   ├── resource_links/  # Resource link management components
│   ├── room/            # Virtual room components
│   ├── session/         # Session (learning campaign) components
│   ├── sessionadmin/    # Session administration components
│   ├── skill/           # Skills and competencies components
│   ├── social/          # Social network components
│   ├── systemannouncement/ # System announcement components
│   ├── user/            # User profile and management components
│   ├── usergroup/       # User group (class) components
│   └── userreluser/     # User relationship (friend/follow) components
├── views/               # Page-level Vue views (mirrors components/ structure)
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
├── router/              # Vue Router (index.js + one module per feature area)
├── store/               # Pinia stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Shared composition functions (per-feature subdirectories)
├── services/            # API service layer (one file per entity/domain)
├── utils/               # Utility helpers (dates, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Runtime configuration (api.js, env.js)
├── constants/           # Shared constants
│   └── entity/          # Entity-specific constants (session, message, extrafield, etc.)
├── layouts/             # Top-level layout components (MyCourses.vue)
├── pages/               # Standalone page components (Home, Login, Faq, Demo)
├── mixins/              # Legacy Vue 2-style mixins (ListMixin, CreateMixin, etc.)
├── hooks/               # Composable hooks (useSidebar, useState)
├── plugins/             # Vue plugin registrations (httpErrors, vuetify)
├── validators/          # Vuelidate custom validators
└── error/               # Error boundary components
```

## Konfigurasi (`config/`)

```
config/
├── packages/            # Bundle and framework configuration (one YAML file per package)
│   ├── security.yaml    # Role hierarchy, firewalls, access control
│   ├── doctrine.yaml    # Doctrine ORM and DBAL settings
│   ├── api_platform.yaml# API Platform configuration
│   ├── framework.yaml   # Core Symfony settings
│   ├── lexik_jwt_authentication.yaml  # JWT token settings
│   ├── nelmio_cors.yaml # CORS headers for API consumers
│   ├── oneup_flysystem.yaml  # Cloud storage adapters
│   ├── webpack_encore.yaml   # Webpack Encore integration
│   ├── ... (30+ package files)
│   ├── dev/             # Development-only overrides (web profiler, debug, routing)
│   ├── prod/            # Production-only overrides (currently empty placeholder)
│   └── test/            # Test-environment overrides (JWT, validator, web profiler)
├── routes/              # Route definitions
│   ├── api_platform.yaml     # API Platform route prefix
│   ├── attributes.yaml       # Controller annotation-based routes
│   ├── fos_js_routing.yaml   # FOS JS Routing exposure
│   ├── legacy.yaml           # Routes for legacy PHP pages under public/main/
│   ├── security.yaml         # Login/logout/OAuth2 routes
│   ├── dev/                  # Development-only routes (profiler, Maker bundle)
│   └── test/                 # Test-only route overrides
├── jwt/                 # JWT key pair (private/public keys)
└── jwt-test/            # JWT keys for the test environment
```

Symfony secara otomatis menggabungkan berkas dasar `packages/*.yaml` dengan berkas di subdirektori lingkungan yang sesuai (`dev/`, `prod/`, atau `test/`), sehingga berkas khusus lingkungan hanya perlu menimpa nilai yang berbeda.

## Pengujian (`tests/`)

`tests/` **tidak disertakan dalam unduhan Chamilo yang dikemas** (ZIP/tarball rilis) — folder ini dihapus karena tidak memiliki tujuan saat runtime dan beberapa skripnya dapat menimbulkan risiko jika dibiarkan di server produksi. Folder ini hanya ada ketika proyek diperoleh melalui `git clone`.

```
tests/
├── CoreBundle/       # PHPUnit tests, mirroring src/CoreBundle/'s subdirectory layout
├── CourseBundle/     # PHPUnit tests, mirroring src/CourseBundle/'s subdirectory layout
├── datafiller/       # Scripts that seed a test installation with demo courses/users/content
├── history/          # Snapshots of what Chamilo looked like at past versions
├── phpstan/          # Bootstrap file used by PHPStan when analyzing Doctrine ORM code
├── playwright/       # Browser-driven end-to-end tests (Gherkin + playwright-bdd)
├── procedures/       # Spreadsheets used as a base for manual QA of features
├── scripts/          # Standalone maintenance/fix/migration scripts for existing portals
├── AbstractApiTest.php                        # Base class for API Platform test cases
├── ApplicationAvailabilityFunctionalTest.php   # Smoke test asserting core pages load
├── ChamiloTestTrait.php                        # Shared fixtures/auth/request helpers
├── bootstrap.php                               # PHPUnit bootstrap
├── deprecations.baseline.json                  # Accepted deprecation warnings, excluded from failing the suite
└── README.md                                   # Setup instructions for PHPUnit and Playwright
```

| Direktori | Isi |
|-----------|----------|
| `CoreBundle/` | Pengujian PHPUnit yang mencerminkan `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Pengujian PHPUnit yang mencerminkan `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Skrip yang mengisi instalasi uji dengan konten demo: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (menjalankan yang lain), plus `images/` dan contoh impor pengguna CSV yang besar |
| `history/` | Snapshot yang mendokumentasikan struktur Chamilo pada rilis terdahulu (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, dimuat oleh PHPStan saat menganalisis kode Doctrine ORM |
| `playwright/` | Pengujian browser ujung ke ujung: `features/*.feature` (skenario Gherkin dijalankan melalui [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (definisi langkah TypeScript), `fixtures/` (berkas uji, misalnya spreadsheet), `scripts/check-results.mjs`, `playwright.config.ts`, dan keluaran `.features-gen/` yang dihasilkan. Menggantikan suite Behat lama, yang skenarionya tetap ada dalam riwayat git sebagai referensi |
| `procedures/` | Spreadsheet (saat ini `spanish/`) yang digunakan sebagai dasar daftar periksa untuk tinjauan mutu manual fitur |
| `scripts/` | Skrip pemeliharaan/perbaikan/migrasi sekali pakai untuk portal Chamilo yang sudah ada (sebagian besar menargetkan versi yang lebih lama), plus subfolder `git-hooks/`, `img/`, `lang/`, dan `packaging/` |

Lihat [Pengujian](../contributing/testing.md) untuk cara menyiapkan basis data uji dan menjalankan suite PHPUnit serta Playwright.

## Konfigurasi Build

| Berkas | Tujuan |
|------|---------|
| `webpack.config.js` | Konfigurasi Webpack Encore (entri, loader, plugin) |
| `tailwind.config.js` | Konfigurasi Tailwind CSS (jalur konten, ekstensi tema, plugin) |
| `tsconfig.json` | Konfigurasi TypeScript |
| `eslint.config.mjs` | Aturan ESLint (flat config) |
| `.prettierrc.json` | Aturan pemformatan Prettier |

Semua berkas berada di akar proyek. Plugin PostCSS (Tailwind + Autoprefixer) dikonfigurasi secara inline di dalam `webpack.config.js` melalui `enablePostCssLoader()` — tidak ada `postcss.config.js` mandiri. `webpack.config.js` membaca `tailwind.config.js` secara tidak langsung melalui PostCSS, sehingga perubahan pada bagian `content` atau `theme` Tailwind berlaku pada eksekusi `yarn encore dev` / `yarn encore production` berikutnya.

## Titik Entri Webpack

Build menghasilkan bundel berikut:

**JavaScript:**
* `vue` — Aplikasi Vue 3 utama (`assets/vue/main.js`)
* `vue_installer` — Wizard instalasi (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS warisan untuk halaman yang belum dimigrasikan ke Vue

**CSS:**
* `app` — Stylesheet utama (`assets/css/app.scss`)
* Plus lembar khusus: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Struktur CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Entry point — imports Tailwind, the SCSS index, and third-party CSS
├── _tailwind.scss       # Tailwind directives (@tailwind base / components / utilities)
├── chat.scss            # Chat and AI tutor panel styles
├── document.scss        # Document viewer styles
├── editor.scss          # TinyMCE editor shell styles
├── editor_content.scss  # Styles injected into the editor iframe body
├── markdown.scss        # Markdown-rendered content styles
├── print.scss           # Print stylesheet
├── responsive.scss      # Responsive overrides
├── scorm.scss           # SCORM player styles
├── legacy/              # Styles for legacy PHP pages (e.g. frameReadyLoader.scss)
└── scss/                # Modular SCSS partials
    ├── index.scss           # Barrel file — imports all partials below
    ├── abstracts/           # Mixins and shared functions
    ├── settings/            # Design tokens (typography, component base)
    ├── atoms/               # Per-component PrimeVue overrides (buttons, inputs, calendar, etc.)
    ├── molecules/           # Small composed UI patterns (chips, toolbars, empty states)
    ├── organisms/           # Larger feature areas (sidebar, datatable, dialog, LP panel, etc.)
    ├── layout/              # Page skeleton partials (topbar, main container, breadcrumb)
    ├── components/          # Legacy component-specific files (blog, exercise, social, skill, etc.)
    └── libs/                # Third-party library overrides (FullCalendar, MediaElement.js)
```

### Tailwind CSS

Tailwind diintegrasikan melalui PostCSS. `assets/css/_tailwind.scss` menghasilkan layer base, component, dan utility; `assets/css/app.scss` mengimpornya terlebih dahulu sehingga utilitas Tailwind tersedia di seluruh partial lainnya. Konfigurasi Tailwind — path konten untuk purging, ekstensi tema, dan plugin — berada di `tailwind.config.js` pada akar proyek (`/var/www/chamilo/tailwind.config.js`).

Kelas utilitas kustom dan kelas komponen yang didefinisikan dengan `@layer` (terlihat di `app.scss`) mengikuti konvensi pelapisan Tailwind sehingga kelas yang didefinisikan pengguna mematuhi aturan spesifisitas yang sama dengan utilitas yang dihasilkan.

### Tema Warna

Chamilo mendukung sistem penentuan tema warna yang dapat dikonfigurasi langsung dari antarmuka admin (**Admin > Color Themes**). Setiap tema yang disimpan menuliskan berkasnya ke direktori khusus di bawah `var/themes/`:

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS custom properties for the full color palette
    ├── default.css      # Optional additional custom CSS rules
    ├── learnpath.css    # Learning path-specific overrides
    ├── tiny-settings.js # TinyMCE editor color palette settings
    └── images/          # Theme images (logo, favicon, backgrounds, PWA icons)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Background images, admin block images, etc.
```

`colors.css` mendefinisikan properti kustom CSS sebagai triplet kanal RGB yang dipisahkan spasi, bukan nilai `rgb()`, sehingga Tailwind dapat menyusun varian opasitas (misalnya `bg-primary/50`) tanpa konfigurasi tambahan:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Layer tema berada di atas bundel Tailwind/SCSS yang telah dikompilasi: peramban memuat `colors.css` setelah stylesheet utama, sehingga perubahan tema berlaku segera tanpa langkah build.