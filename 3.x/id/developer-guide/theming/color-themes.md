# Tema Warna

Chamilo 3.0 menggunakan sistem tema warna yang digerakkan oleh basis data. Tema dikelola melalui UI admin, disimpan di basis data, dan ditulis ke disk sebagai berkas CSS. Tema dapat disesuaikan per access URL, sehingga instalasi multi-URL dapat memiliki identitas visual yang berbeda.

## Model Data

Dua entitas menggerakkan sistem tema:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Primary key |
| `title` | string | Nama yang mudah dibaca manusia |
| `slug` | string | Dihasilkan otomatis dari `title` (mis. `"My Theme"` → `my-theme`); digunakan sebagai nama direktori di `var/themes/` |
| `variables` | array (JSON) | Peta nama properti kustom CSS → nilai (mis. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Mengaitkan sebuah `ColorTheme` dengan sebuah `AccessUrl`. Bendera boolean `active` menandai tema mana yang sedang aktif untuk URL tersebut. Hanya satu tema yang dapat aktif per access URL pada satu waktu.

## Cara Tema Disimpan

Ketika tema dibuat atau diperbarui melalui API, `ColorThemeStateProcessor` menghasilkan berkas CSS dan menuliskannya ke Flysystem `themes_filesystem` (didukung oleh `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Berkas `colors.css` yang dihasilkan membungkus semua variabel dalam blok `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Nilainya adalah triplet kanal RGB yang dipisahkan spasi (bukan `rgb()`), yang memungkinkan Tailwind menyusun varian opasitas seperti `bg-primary/50` tanpa konfigurasi tambahan.

## Urutan Prioritas Resolusi Tema

`ThemeHelper::getVisualTheme()` menentukan slug tema mana yang diterapkan pada halaman tertentu, dengan urutan berikut:

1. **Tema aktif untuk AccessUrl saat ini** — rekaman `AccessUrlRelColorTheme` dengan `active = true`
2. **Tema yang dipilih pengguna** — tema yang disimpan pada entitas `User`, jika pengaturan platform `profile.user_selected_theme` diaktifkan
3. **Tema kursus** — pengaturan kursus `course_theme`, jika pengaturan platform `course.allow_course_theme` diaktifkan
4. **Tema learning path** — nilai `$lp_theme_css` pada LP, jika pengaturan kursus `allow_learning_path_theme` diaktifkan
5. **Variabel lingkungan `THEME_FALLBACK`** — diatur di `.env` sebagai `THEME_FALLBACK='chamilo'`
6. **Default** — `chamilo` (dikodekan secara tetap sebagai `ThemeHelper::DEFAULT_THEME`)

## Penyajian Aset

Aset tema disajikan oleh `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) di bawah prefiks `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Menyajikan aset tema apa pun (CSS, JS, gambar); jatuh kembali ke tema `chamilo` jika tidak ditemukan di tema yang diminta |
| `GET /themes/{slug}/logo/{type}` | Menyajikan logo yang diutamakan (`header` atau `email`), dengan fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Mengunggah logo header/email (SVG dan/atau PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Menghapus logo tertentu |

Rute aset umum (`/{name}/{path}`) secara otomatis jatuh kembali ke tema default `chamilo` ketika berkas tidak ada di tema yang diminta, sehingga tema hanya perlu menyertakan berkas yang benar-benar mereka timpa.

## Cara Tema Dimuat di Template

Template layout `head.html.twig` memuat aset tema aktif melalui fungsi helper Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Ketiga fungsi Twig (didaftarkan di `ChamiloExtension`) menyelesaikan jalur aset melalui `ThemeHelper`, menerapkan rantai fallback yang sama seperti di atas:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL ke aset pada tema yang telah diselesaikan |
| `theme_asset_link_tag('path')` | Tag `<link rel="stylesheet">` lengkap |
| `theme_asset_script_tag('path')` | Tag `<script src="...">` lengkap |
| `theme_asset_base64('path')` | Data URI aset yang dikodekan Base64 |
| `theme_logo('header'\|'email')` | URL ke logo terbaik yang tersedia |

## Endpoint API

Pengelolaan tema diekspos melalui REST API API Platform (hanya admin):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Membuat tema baru |
| `PUT` | `/api/color_themes/{id}` | Memperbarui tema yang sudah ada |
| `POST` | `/api/access_url_rel_color_themes` | Mengaitkan/mengaktifkan tema untuk sebuah access URL |
| `GET` | `/api/access_url_rel_color_themes` | Mencantumkan asosiasi tema untuk access URL saat ini |

## Membuat Tema Kustom

Alur kerja standar adalah melalui UI admin (**Admin → Color Themes**), yang memanggil endpoint API di atas. Untuk membuat tema secara terprogram:

1. `POST /api/color_themes` dengan body JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Ini menyimpan entitas dan menulis `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` untuk mengaitkan dan mengaktifkannya bagi access URL saat ini:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Untuk menambahkan gambar kustom (logo, favicon, latar belakang), unggah melalui `POST /themes/{slug}/logos` atau letakkan langsung di `var/themes/{slug}/images/`.

## Referensi Variabel Warna

Semua variabel yang diharapkan oleh konfigurasi Tailwind default:

| Variabel | Tujuan |
|----------|---------|
| `--color-primary-base` | Warna merek primer |
| `--color-primary-gradient` | Titik henti gradien yang lebih gelap untuk primer |
| `--color-primary-button-text` | Warna teks pada tombol primer |
| `--color-primary-button-alternative-text` | Warna teks alternatif pada tombol primer |
| `--color-secondary-base` | Warna aksen sekunder |
| `--color-secondary-gradient` | Titik henti gradien untuk sekunder |
| `--color-secondary-button-text` | Warna teks pada tombol sekunder |
| `--color-tertiary-base` | Warna tersier |
| `--color-tertiary-gradient` | Titik henti gradien untuk tersier |
| `--color-tertiary-button-text` | Warna teks pada tombol tersier |
| `--color-success-base` | Warna status sukses |
| `--color-success-gradient` | Titik henti gradien untuk sukses |
| `--color-success-button-text` | Warna teks pada tombol sukses |
| `--color-info-base` | Warna status info |
| `--color-info-gradient` | Titik henti gradien untuk info |
| `--color-info-button-text` | Warna teks pada tombol info |
| `--color-warning-base` | Warna status peringatan |
| `--color-warning-gradient` | Titik henti gradien untuk peringatan |
| `--color-warning-button-text` | Warna teks pada tombol peringatan |
| `--color-danger-base` | Warna status bahaya/kesalahan |
| `--color-danger-gradient` | Titik henti gradien untuk bahaya |
| `--color-danger-button-text` | Warna teks pada tombol bahaya |
| `--color-form-base` | Warna aksen elemen formulir |