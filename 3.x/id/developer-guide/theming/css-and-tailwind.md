# CSS dan Tailwind

## Arsitektur Stylesheet

Gaya Chamilo disusun berlapis dalam urutan berikut:

1. **Tailwind CSS** — Kelas utilitas untuk tata letak, spasi, dan warna. Dikonfigurasi dengan `important: true` agar utilitas menimpa nilai default komponen PrimeVue.
2. **SCSS** — Gaya kustom di `assets/css/scss/`, diorganisasi ke dalam lapisan atoms, molecules, organisms, layout, dan components.
3. **Gaya komponen PrimeVue** — Ditimpakan per komponen di dalam `assets/css/scss/atoms/`.
4. **Tema `colors.css`** — Properti kustom CSS untuk tema warna yang aktif, dimuat terakhir agar mengalir (cascade) di atas semuanya.

PrimeFlex telah dihapus dari `package.json` — Tailwind mencakup semua kebutuhan utilitas.

## Stylesheet Utama (`assets/css/app.scss`)

`app.scss` adalah titik masuk Webpack untuk stylesheet utama. File ini mengimpor:

1. `_tailwind.scss` — Direktif Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — File barrel yang mengimpor semua partial SCSS
3. CSS pihak ketiga (cropper, select2, daterangepicker, skin TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Gaya yang disuntikkan ke body iframe editor TinyMCE

## Konfigurasi Tailwind (`tailwind.config.js`)

Pengaturan utama:

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

Jalur konten memindai komponen Vue, halaman PHP warisan, file plugin, dan templat Twig sehingga utilitas yang tidak terpakai dihapus pada build produksi.

### Sistem Warna Variabel CSS

Semua token warna didukung oleh properti kustom CSS, bukan nilai yang dikodekan secara tetap:

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

Pembantu `colorWithOpacity` menghasilkan `rgb(var(--color-primary-base) / <opacity>)`, sehingga memungkinkan varian opasitas seperti `bg-primary/50`. Nilai RGB sebenarnya didefinisikan per tema di `var/themes/{slug}/colors.css` dan dimuat saat runtime — lihat [Tema Warna](color-themes.md).

### Plugin Tailwind

`@tailwindcss/forms` dan `@tailwindcss/typography` diaktifkan.

### Skala Tipografi Kustom

Empat pasangan ukuran font/tinggi baris tambahan ditambahkan melalui `theme.extend.fontSize`:

| Kelas | Ukuran / Tinggi baris |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) dikonfigurasi secara inline di dalam `webpack.config.js` melalui `enablePostCssLoader()`. Tidak ada file `postcss.config.js` yang berdiri sendiri.

## Stylesheet Khusus

| File | Entri Webpack | Tujuan |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Gaya aplikasi utama |
| `assets/css/chat.scss` | `css/chat` | Gaya antarmuka obrolan |
| `assets/css/document.scss` | `css/document` | Gaya penampil dokumen |
| `assets/css/editor.scss` | `css/editor` | Gaya kerangka editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Gaya yang disuntikkan ke body iframe editor |
| `assets/css/markdown.scss` | `css/markdown` | Konten yang dirender Markdown |
| `assets/css/print.scss` | `css/print` | Stylesheet cetak |
| `assets/css/responsive.scss` | `css/responsive` | Penimpaan responsif |
| `assets/css/scorm.scss` | `css/scorm` | Gaya pemutar SCORM |

## Struktur Modul SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Menggunakan Tailwind di Komponen Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Karena `important: true` diatur di `tailwind.config.js`, utilitas Tailwind secara andal menimpa gaya komponen PrimeVue tanpa memerlukan spesifisitas tambahan.