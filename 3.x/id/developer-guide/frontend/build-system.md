# Sistem Build

Chamilo menggunakan **Webpack 5** melalui **Symfony Webpack Encore** untuk membangun aset frontend. Konfigurasi build lengkap berada di `webpack.config.js` pada akar proyek.

Keluaran ditulis ke `public/build/`, disajikan di bawah path publik `/build`.

## Titik Masuk

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Aplikasi Vue 3 utama |
| `vue_installer` | `assets/vue/main_installer.js` | Wizard instalasi |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript warisan |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Pemutar latihan |
| `legacy_lp` | `assets/js/legacy/lp.js` | Pemutar learning path |
| `legacy_document` | `assets/js/legacy/document.js` | Penampil dokumen |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget grid warisan |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Pemuat frame-ready untuk iframe warisan |
| `translatehtml` | `assets/js/translatehtml.js` | Pembantu terjemahan HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Penyorotan istilah glosarium otomatis |

### CSS

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Fitur Build

* **Vue 3 SFC** — komponen berkas tunggal `.vue` dikompilasi oleh `vue-loader`; kompiler runtime dinonaktifkan (`runtimeCompilerBuild: false`), sehingga semua templat harus dikompilasi terlebih dahulu
* **TypeScript** — mode transpile-only (`transpileOnly: true`) untuk build cepat, tanpa pemeriksaan tipe selama build
* **Sass/SCSS** — dukungan SCSS penuh melalui `sass-loader`
* **Tailwind CSS** — CSS berbasis utilitas diproses sebaris melalui PostCSS (dikonfigurasi di dalam `webpack.config.js`; tidak ada `postcss.config.js` terpisah)
* **Babel** — transpilasi ES6+ dengan `@babel/preset-env` dan polyfill `core-js@3` (`useBuiltIns: "usage"`)
* **Penyediaan jQuery otomatis** — `autoProvidejQuery()` membuat `$` dan `jQuery` tersedia secara global tanpa impor eksplisit, mendukung kode warisan
* **Source maps** — diaktifkan hanya pada pengembangan
* **Single runtime chunk** — runtime bersama untuk semua entry
* **Cache sistem berkas** — cache sistem berkas persisten Webpack diaktifkan untuk mempercepat rebuild inkremental
* **Namespace chunk** — `output.uniqueName` dan `output.chunkLoadingGlobal` diatur ke `"chamilo"` / `"webpackChunkChamilo"` untuk menghindari tabrakan pemuatan chunk ketika beberapa bundel Webpack hidup berdampingan pada satu halaman

## Fitur Khusus Produksi

* **Versioning** — akhiran hash konten pada semua nama berkas keluaran (`enableVersioning()`)
* **Subresource Integrity** — atribut `integrity` pada tag `<script>` dan `<link>` (`enableIntegrityHashes()`)
* **Pembersihan keluaran** — `public/build/` dikosongkan sebelum setiap build produksi

### Salinan aset tanpa hash (`CopyUnhashedAssetsPlugin`)

Beberapa halaman PHP warisan merujuk aset dengan nama berkas tetap dan tidak dapat menggunakan manifest Webpack. Plugin kustom `CopyUnhashedAssetsPlugin` (didefinisikan di bagian bawah `webpack.config.js`) menyalin berkas produksi yang di-hash tertentu ke path tambahan tanpa hash setelah setiap build:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Aset Pustaka yang Disalin

`copyFiles()` menyalin sejumlah paket npm langsung ke `public/build/libs/` tanpa membundelnya, untuk digunakan melalui tag `<script>` / `<link>` pada templat warisan:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Perintah Build

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Konfigurasi Tailwind

Tailwind dikonfigurasi di `tailwind.config.js`. Poin-poin utama:

* **`important: true`** — Semua utilitas yang dihasilkan menyertakan `!important`, sehingga dapat menimpa gaya komponen PrimeVue tanpa trik spesifisitas tambahan
* **Content paths** — Tailwind memindai `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}`, dan `src/CoreBundle/Resources/views/**/*.html.twig` untuk penggunaan class
* **Sistem warna CSS-variable** — Setiap token warna (primary, secondary, tertiary, success, info, warning, danger) didukung oleh properti kustom CSS (misalnya `--color-primary-base`) yang didefinisikan per tema di `var/themes/[theme-name]/colors.css`. Nilainya berupa triplet kanal RGB yang dipisahkan spasi, sehingga utilitas opacity Tailwind (`bg-primary/50`) dapat digunakan
* **Skala font kustom** — Pasangan ukuran/tinggi baris `body-1`, `body-2`, `caption`, `tiny` ditambahkan melalui `theme.extend.fontSize`
* **Plugin** — `@tailwindcss/forms` dan `@tailwindcss/typography` diaktifkan

PostCSS (Tailwind + Autoprefixer) dikonfigurasi secara inline di dalam `webpack.config.js` melalui `enablePostCssLoader()` — tidak ada berkas `postcss.config.js` yang berdiri sendiri.