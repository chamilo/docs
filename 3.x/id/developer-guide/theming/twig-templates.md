# Template Twig

Chamilo menggunakan Twig untuk halaman yang dirender di sisi server. Template berada di `src/CoreBundle/Resources/views/` dan dirujuk dengan prefiks namespace `@ChamiloCore/` (misalnya `@ChamiloCore/Layout/base-layout.html.twig`).

Tidak ada direktori `templates/` di tingkat atas — semua template Twig berada di bawah `src/CoreBundle/Resources/views/`.

## Bagaimana Twig dan Vue Hidup Bersama

Sebagian besar halaman mengikuti alur berikut:

1. Controller Symfony merender template Twig yang mewarisi sebuah layout.
2. Layout menyertakan `vue_setup.html.twig`, yang mengeluarkan `<div id="app">` dan menyuntikkan global runtime (`window.user`, `window.breadcrumb`, dll.) melalui `vue_js_setup.html.twig`.
3. Vue dipasang pada `#app` dan menangani seluruh rendering UI di dalam elemen tersebut.
4. Aplikasi Vue berkomunikasi dengan backend melalui REST API.

Untuk halaman warisan yang belum dimigrasikan ke Vue, Symfony merender HTML halaman penuh melalui Twig dan kontennya diletakkan di dalam `#sectionMainContent`. Vue tetap dipasang (menyediakan kerangka sidebar dan topbar), tetapi area konten utama adalah HTML yang dirender di server.

## Template Layout

Semua layout mewarisi `@ChamiloCore/Layout/base-layout.html.twig`, yang menyediakan struktur `<html>`, `<head>`, dan `<body>`. Varian layout yang tersedia:

| Template | Tujuan |
|----------|---------|
| `Layout/base-layout.html.twig` | Template akar — kerangka `<html>`, mengimpor Macros, mengeluarkan `<head>` dan `<body>` |
| `Layout/layout.html.twig` | Layout penuh standar dengan sidebar, topbar, dan area konten |
| `Layout/layout_one_col.html.twig` | Layout satu kolom (tanpa sidebar) |
| `Layout/layout_two_col.html.twig` | Layout dua kolom |
| `Layout/layout_content.html.twig` | Pembungkus hanya-konten |
| `Layout/layout_empty.html.twig` | Layout kosong dengan krom minimal |
| `Layout/no_layout.html.twig` | Tanpa header/footer; konten langsung masuk ke dalam `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout polos untuk frame konten SCORM |
| `Layout/blank.html.twig` | Halaman sepenuhnya kosong |
| `Layout/skill_layout.html.twig` | Layout untuk halaman roda keterampilan |

## Partial Utama

| Template | Tujuan |
|----------|---------|
| `Layout/head.html.twig` | Konten `<head>`: meta tag, semua entri CSS Encore, `colors.css` tema, entri JS warisan, tag OpenGraph/Twitter |
| `Layout/foot.html.twig` | Akhir body: titik masuk JS Vue, injeksi `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Mengeluarkan `<div id="app">` dan menyertakan `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Menyuntikkan `window.user`, `window.breadcrumb`, `window.languages`, dll. |
| `Layout/cookie_banner.html.twig` | Banner persetujuan cookie GDPR |
| `Layout/footer.html.twig` | Bilah footer halaman |
| `Layout/course_navigation.html.twig` | Breadcrumb navigasi alat kursus |

## Integrasi Webpack Encore

`head.html.twig` memuat CSS untuk semua entri; `foot.html.twig` memuat bundel JS Vue:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Entri JS warisan (`legacy_app`, `legacy_lp`, dll.) dimuat di `<head>` karena halaman PHP warisan bergantung pada ketersediaannya sebelum DOM siap.

## Macro

Macro Twig yang dapat digunakan ulang berada di `Macros/` dan diimpor di bagian atas `base-layout.html.twig`:

| File macro | Menyediakan |
|-----------|---------|
| `Macros/box.html.twig` | Pembantu kotak konten |
| `Macros/actions.html.twig` | Rendering tombol aksi |
| `Macros/buttons.html.twig` | Pembantu HTML tombol |
| `Macros/headers.html.twig` | Pembantu header halaman |
| `Macros/image.html.twig` | Pembantu rendering gambar |
| `Macros/modals.html.twig` | Pembantu dialog modal |

Penggunaan di dalam template mana pun yang mewarisi `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Template Vue Kustom

Chamilo mendukung penggantian halaman Vue per instalasi melalui variabel lingkungan `APP_CUSTOM_VUE_TEMPLATE`. Ketika diatur, build Webpack mengekspos konstanta `ENV_CUSTOM_VUE_TEMPLATE` melalui `DefinePlugin`, dan router Vue secara bersyarat mengimpor komponen pengganti dari `var/vue_templates/`.

Lokasi penggantian saat ini:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Hanya file yang ada di `var/vue_templates/` yang diganti — semua halaman dan komponen lain menggunakan yang asli dari inti.

## Referensi Fungsi Twig

Fungsi Twig utama yang tersedia di semua templat (didaftarkan di `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Membaca pengaturan platform |
| `chamilo_settings_has('ns.key')` | Memeriksa apakah suatu pengaturan ada |
| `chamilo_settings_all()` | Mengambil semua pengaturan sebagai array |
| `theme_asset('path')` | URL ke aset di tema aktif |
| `theme_asset_link_tag('path')` | Tag `<link>` untuk berkas CSS tema |
| `theme_asset_script_tag('path')` | Tag `<script>` untuk berkas JS tema |
| `theme_asset_base64('path')` | URI data Base64 untuk aset tema |
| `theme_logo('header'\|'email')` | URL ke logo yang dipilih |
| `is_allowed_to_edit(...)` | Pembantu pemeriksaan izin |