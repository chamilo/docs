# Sistem Build

Chamilo menggunakan **Webpack 5** melalui **Symfony Webpack Encore** untuk membangun aset frontend. Konfigurasi build lengkap berada di `webpack.config.js` di root proyek.

Output ditulis ke `public/build/`, disajikan di bawah jalur publik `/build`.

## Titik Masuk

### JavaScript

| Titik Masuk | Sumber | Tujuan |
|-------------|--------|--------|
| `vue` | `assets/vue/main.js` | Aplikasi utama Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Asisten instalasi |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript lama |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Pemutar latihan |
| `legacy_lp` | `assets/js/legacy/lp.js` | Pemutar jalur pembelajaran |
| `legacy_document` | `assets/js/legacy/document.js` | Penampil dokumen |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget grid lama |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Pemuat frame siap untuk iframe lama |
| `translatehtml` | `assets/js/translatehtml.js` | Pembantu terjemahan HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Penyorotan otomatis istilah glosarium |

### CSS

| Titik Masuk | Sumber |
|-------------|--------|
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

* **Vue 3 SFC** — Komponen file tunggal `.vue` dikompilasi oleh `vue-loader`; kompiler runtime dinonaktifkan (`runtimeCompilerBuild: false`), sehingga semua template harus dikompilasi sebelumnya
* **TypeScript** — Mode transpilation saja (`transpileOnly: true`) untuk build cepat, tanpa pemeriksaan tipe selama build
* **Sass/SCSS** — Dukungan penuh untuk SCSS melalui `sass-loader`
* **Tailwind CSS** — CSS utilitas diproses inline melalui PostCSS (dikonfigurasi di dalam `webpack.config.js`; tidak ada file terpisah `postcss.config.js`)
* **Babel** — Transpilasi ES6+ dengan `@babel/preset-env` dan polyfills dari `core-js@3` (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` membuat `$` dan `jQuery` tersedia secara global tanpa impor eksplisit, mendukung kode lama
* **Source maps** — Diaktifkan hanya pada pengembangan
* **Single runtime chunk** — Runtime bersama untuk semua titik masuk
* **Filesystem cache** — Cache sistem file persisten Webpack diaktifkan untuk mempercepat rebuild inkremental
* **Chunk namespacing** — `output.uniqueName` dan `output.chunkLoadingGlobal` diatur sebagai `"chamilo"` / `"webpackChunkChamilo"` untuk mencegah tabrakan pemuatan chunk ketika beberapa bundel Webpack ada bersama di satu halaman

## Fitur Eksklusif Produksi

* **Versioning** — Sufiks hash konten pada semua nama file output (`enableVersioning()`)
* **Integritas Subresource** — Atribut `integrity` pada tag `<script>` dan `<link>` (`enableIntegrityHashes()`)
* **Pembersihan Output** — `public/build/` dibersihkan sebelum setiap build produksi

### Salinan Aset Tanpa Hash (`CopyUnhashedAssetsPlugin`)

Beberapa halaman PHP lama merujuk aset dengan nama file tetap dan tidak dapat menggunakan manifest Webpack. Plugin khusus `CopyUnhashedAssetsPlugin` (didefinisikan di akhir `webpack.config.js`) menyalin file produksi tertentu dengan hash ke jalur tambahan tanpa hash setelah setiap build:

| File dengan Hash | Salinan tanpa Hash |
|------------------|--------------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Aset Perpustakaan yang Disalin

`copyFiles()` menyalin beberapa paket npm langsung ke `public/build/libs/` tanpa mengemasnya, untuk digunakan melalui tag `<script>` / `<link>` di template lama:

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
# Build pengembangan
yarn encore dev

# Build pengembangan dengan pengamatan file
yarn encore dev --watch

# Build produksi (diminifikasi, diberi versi, hash integritas)
yarn encore production
```

---
## Konfigurasi Tailwind

Tailwind dikonfigurasi dalam file `tailwind.config.js`. Poin utama:

* **`important: true`** — Semua utilitas yang dihasilkan menyertakan `!important`, memungkinkan mereka untuk mengesampingkan gaya komponen PrimeVue tanpa perlu trik spesifisitas tambahan
* **Jalur konten** — Tailwind memindai `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}`, dan `src/CoreBundle/Resources/views/**/*.html.twig` untuk penggunaan kelas
* **Sistem warna dengan variabel CSS** — Setiap token warna (primer, sekunder, tersier, sukses, informasi, peringatan, bahaya) didukung oleh properti khusus CSS (misalnya, `--color-primary-base`) yang ditentukan oleh tema di `var/themes/[theme-name]/colors.css`. Nilai-nilai tersebut adalah trio kanal RGB yang dipisahkan oleh spasi, memungkinkan penggunaan utilitas opasitas Tailwind (`bg-primary/50`)
* **Skala font khusus** — Pasangan ukuran/tinggi baris `body-1`, `body-2`, `caption`, `tiny` ditambahkan melalui `theme.extend.fontSize`
* **Plugin** — `@tailwindcss/forms` dan `@tailwindcss/typography` diaktifkan

PostCSS (Tailwind + Autoprefixer) dikonfigurasi secara inline di dalam `webpack.config.js` melalui `enablePostCssLoader()` — tidak ada file terpisah `postcss.config.js`.