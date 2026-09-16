# Templat Twig

Chamilo menggunakan Twig untuk halaman yang dirender di sisi server. Templat berada di `src/CoreBundle/Resources/views/` dan dirujuk dengan awalan namespace `@ChamiloCore/` (misalnya `@ChamiloCore/Layout/base-layout.html.twig`).

Tidak ada direktori tingkat atas `templates/` — semua templat Twig berada di bawah `src/CoreBundle/Resources/views/`.

## Bagaimana Twig dan Vue Bekerja Bersama

Sebagian besar halaman mengikuti alur berikut:

1. Pengontrol Symfony merender templat Twig yang memperluas tata letak (layout).
2. Tata letak menyertakan `vue_setup.html.twig`, yang menghasilkan `<div id="app">` dan menyuntikkan variabel global runtime (`window.user`, `window.breadcrumb`, dll.) melalui `vue_js_setup.html.twig`.
3. Vue dipasang pada `#app` dan menangani semua rendering UI di dalam elemen tersebut.
4. Aplikasi Vue berkomunikasi dengan backend melalui REST API.

Untuk halaman lama yang belum dimigrasikan ke Vue, Symfony merender HTML halaman penuh melalui Twig dan konten ditempatkan di dalam `#sectionMainContent`. Vue tetap dipasang (menyediakan shell sidebar dan topbar), tetapi area konten utama adalah HTML yang dirender di server.

## Templat Tata Letak

Semua tata letak memperluas `@ChamiloCore/Layout/base-layout.html.twig`, yang menyediakan struktur `<html>`, `<head>`, dan `<body>`. Varian tata letak yang tersedia:

| Templat | Tujuan |
|----------|---------|
| `Layout/base-layout.html.twig` | Templat akar — shell `<html>`, mengimpor Makro, menghasilkan `<head>` dan `<body>` |
| `Layout/layout.html.twig` | Tata letak penuh standar dengan sidebar, topbar, dan area konten |
| `Layout/layout_one_col.html.twig` | Tata letak satu kolom (tanpa sidebar) |
| `Layout/layout_two_col.html.twig` | Tata letak dua kolom |
| `Layout/layout_content.html.twig` | Pembungkus hanya konten |
| `Layout/layout_empty.html.twig` | Tata letak kosong dengan chrome minimal |
| `Layout/no_layout.html.twig` | Tanpa header/footer; konten langsung masuk ke dalam `<body>` |
| `Layout/no_layout_scorm.html.twig` | Tata letak kosong untuk frame konten SCORM |
| `Layout/blank.html.twig` | Halaman yang sepenuhnya kosong |
| `Layout/skill_layout.html.twig` | Tata letak untuk halaman roda keterampilan |

## Bagian Penting (Partials)

| Templat | Tujuan |
|----------|---------|
| `Layout/head.html.twig` | Konten `<head>`: tag meta, semua entri CSS Encore, tema `colors.css`, entri JS lama, tag OpenGraph/Twitter |
| `Layout/foot.html.twig` | Akhir tubuh: titik masuk JS Vue, injeksi `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Menghasilkan `<div id="app">` dan menyertakan `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Menyuntikkan `window.user`, `window.breadcrumb`, `window.languages`, dll. |
| `Layout/cookie_banner.html.twig` | Banner persetujuan cookie GDPR |
| `Layout/footer.html.twig` | Bilah footer halaman |
| `Layout/course_navigation.html.twig` | Breadcrumb navigasi alat kursus |

## Integrasi Webpack Encore

`head.html.twig` memuat CSS untuk semua entri; `foot.html.twig` memuat bundel JS Vue:

```twig
{# Di head.html.twig — entri CSS #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# Di foot.html.twig — JS Vue (dimuat di akhir body) #}
{{ encore_entry_script_tags('vue') }}
```

Entri JS lama (`legacy_app`, `legacy_lp`, dll.) dimuat di `<head>` karena halaman PHP lama bergantung pada ketersediaan mereka sebelum DOM siap.

## Makro

Makro Twig yang dapat digunakan kembali berada di `Macros/` dan diimpor di bagian atas `base-layout.html.twig`:

| File Makro | Menyediakan |
|-----------|---------|
| `Macros/box.html.twig` | Pembantu kotak konten |
| `Macros/actions.html.twig` | Rendering tombol aksi |
| `Macros/buttons.html.twig` | Pembantu HTML tombol |
| `Macros/headers.html.twig` | Pembantu header halaman |
| `Macros/image.html.twig` | Pembantu rendering gambar |
| `Macros/modals.html.twig` | Pembantu dialog modal |

Penggunaan di dalam templat apa pun yang memperluas `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Simpan') }}
{{ macro_box.content_box('Judul', konten) }}
```

## Templat Vue Kustom

Chamilo mendukung penggantian halaman Vue per instalasi melalui variabel lingkungan `APP_CUSTOM_VUE_TEMPLATE`. Ketika diatur, build Webpack mengekspos konstanta `ENV_CUSTOM_VUE_TEMPLATE` melalui `DefinePlugin`, dan router Vue secara kondisional mengimpor komponen pengganti dari `var/vue_templates/`.

Lokasi penggantian saat ini:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Menggantikan halaman masuk default /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Hanya file yang ada di `var/vue_templates/` yang diganti — semua halaman dan komponen lainnya menggunakan asli inti.

---
## Referensi Fungsi Twig

Fungsi-fungsi Twig utama yang tersedia di semua templat (terdaftar di `ChamiloExtension`):

| Fungsi | Tujuan |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Membaca pengaturan platform |
| `chamilo_settings_has('ns.key')` | Memeriksa apakah pengaturan ada |
| `chamilo_settings_all()` | Mendapatkan semua pengaturan sebagai array |
| `theme_asset('path')` | URL ke aset di tema aktif |
| `theme_asset_link_tag('path')` | Tag `<link>` untuk file CSS tema |
| `theme_asset_script_tag('path')` | Tag `<script>` untuk file JS tema |
| `theme_asset_base64('path')` | URI data Base64 untuk aset tema |
| `theme_logo('header'\|'email')` | URL ke logo yang dipilih |
| `is_allowed_to_edit(...)` | Pembantu pemeriksaan izin |