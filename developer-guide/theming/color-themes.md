# Tema Warna

Chamilo 2.0 menggunakan sistem tema warna yang didorong oleh basis data. Tema dikelola melalui antarmuka admin, disimpan di basis data, dan ditulis ke disk sebagai file CSS. Tema dapat disesuaikan per URL akses, memungkinkan instalasi multi-URL memiliki identitas visual yang berbeda.

## Model Data

Dua entitas menggerakkan sistem tema:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Tipe | Deskripsi |
|-------|------|-----------|
| `id` | int | Kunci utama |
| `title` | string | Nama yang dapat dibaca manusia |
| `slug` | string | Dibuat secara otomatis dari `title` (misalnya `"My Theme"` → `my-theme`); digunakan sebagai nama direktori di `var/themes/` |
| `variables` | array (JSON) | Peta nama properti khusus CSS → nilai (misalnya `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Mengaitkan `ColorTheme` dengan `AccessUrl`. Bendera boolean `active` menandai tema mana yang saat ini aktif untuk URL tersebut. Hanya satu tema yang dapat aktif per URL akses pada satu waktu.

## Cara Tema Disimpan

Ketika tema dibuat atau diperbarui melalui API, `ColorThemeStateProcessor` menghasilkan file CSS dan menulisnya ke `themes_filesystem` Flysystem (didukung oleh `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← dihasilkan dari ColorTheme.variables
```

File `colors.css` yang dihasilkan membungkus semua variabel dalam blok `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Nilai-nilai tersebut adalah triplet saluran RGB yang dipisahkan spasi (bukan `rgb()`), yang memungkinkan Tailwind untuk menyusun varian opacity seperti `bg-primary/50` tanpa konfigurasi tambahan.

## Prioritas Resolusi Tema

`ThemeHelper::getVisualTheme()` menentukan slug tema mana yang akan diterapkan pada halaman tertentu, dengan urutan sebagai berikut:

1. **Tema aktif untuk AccessUrl saat ini** — catatan `AccessUrlRelColorTheme` dengan `active = true`
2. **Tema yang dipilih pengguna** — tema yang disimpan pada entitas `User`, jika pengaturan platform `profile.user_selected_theme` diaktifkan
3. **Tema kursus** — pengaturan kursus `course_theme`, jika pengaturan platform `course.allow_course_theme` diaktifkan
4. **Tema jalur pembelajaran** — nilai `$lp_theme_css` dari LP, jika pengaturan kursus `allow_learning_path_theme` diaktifkan
5. **Variabel lingkungan `THEME_FALLBACK`** — diatur di `.env` sebagai `THEME_FALLBACK='chamilo'`
6. **Default** — `chamilo` (hardcoded sebagai `ThemeHelper::DEFAULT_THEME`)

## Penyajian Aset

Aset tema disajikan oleh `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) di bawah prefiks `/themes`.

| Rute | Tujuan |
|-------|--------|
| `GET /themes/{name}/{path}` | Menyajikan aset tema apa pun (CSS, JS, gambar); kembali ke tema `chamilo` jika tidak ditemukan di tema yang diminta |
| `GET /themes/{slug}/logo/{type}` | Menyajikan logo yang diinginkan (`header` atau `email`), dengan fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Mengunggah logo header/email (SVG dan/atau PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Menghapus logo tertentu |

Rute aset umum (`/{name}/{path}`) secara otomatis kembali ke tema default `chamilo` ketika file tidak ada di tema yang diminta, sehingga tema hanya perlu menyertakan file yang benar-benar mereka timpa.

## Cara Tema Dimuat di Template

Template tata letak `head.html.twig` memuat aset tema aktif melalui fungsi pembantu Twig:

```twig
{# Menyuntikkan variabel warna tema #}
{{ theme_asset_link_tag('colors.css') }}

{# Menyuntikkan palet warna TinyMCE #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Merujuk aset tema lainnya #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Tiga fungsi Twig (terdaftar di `ChamiloExtension`) menyelesaikan jalur aset melalui `ThemeHelper`, menerapkan rantai fallback yang sama seperti di atas:

| Fungsi | Mengembalikan |
|----------|---------------|
| `theme_asset('path')` | URL ke aset di tema yang diselesaikan |
| `theme_asset_link_tag('path')` | Tag `<link rel="stylesheet">` lengkap |
| `theme_asset_script_tag('path')` | Tag `<script src="...">` lengkap |
| `theme_asset_base64('path')` | URI data yang dikodekan Base64 dari aset |
| `theme_logo('header'\|'email')` | URL ke logo terbaik yang tersedia |

## Titik Akhir API

Manajemen tema diekspos melalui API REST API Platform (khusus admin):

| Metode | Titik Akhir | Tujuan |
|--------|-------------|--------|
| `POST` | `/api/color_themes` | Membuat tema baru |
| `PUT` | `/api/color_themes/{id}` | Memperbarui tema yang ada |
| `POST` | `/api/access_url_rel_color_themes` | Mengaitkan/mengaktifkan tema untuk URL akses |
| `GET` | `/api/access_url_rel_color_themes` | Mendaftar asosiasi tema untuk URL akses saat ini |

## Membuat Tema Kustom

Alur kerja standar dilakukan melalui antarmuka admin (**Admin → Color Themes**), yang memanggil endpoint API di atas. Untuk membuat tema secara terprogram:

1. `POST /api/color_themes` dengan tubuh JSON:

```json
{
  "title": "Tema Saya",
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

2. `POST /api/access_url_rel_color_themes` untuk mengaitkan dan mengaktifkannya untuk URL akses saat ini:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Untuk menambahkan gambar kustom (logo, favicon, latar belakang), unggah melalui `POST /themes/{slug}/logos` atau tempatkan langsung di `var/themes/{slug}/images/`.

## Referensi Variabel Warna

Semua variabel yang diharapkan oleh konfigurasi Tailwind default:

| Variabel | Tujuan |
|----------|--------|
| `--color-primary-base` | Warna merek utama |
| `--color-primary-gradient` | Titik gradasi yang lebih gelap untuk utama |
| `--color-primary-button-text` | Warna teks pada tombol utama |
| `--color-primary-button-alternative-text` | Warna teks alternatif pada tombol utama |
| `--color-secondary-base` | Warna aksen sekunder |
| `--color-secondary-gradient` | Titik gradasi untuk sekunder |
| `--color-secondary-button-text` | Warna teks pada tombol sekunder |
| `--color-tertiary-base` | Warna tersier |
| `--color-tertiary-gradient` | Titik gradasi untuk tersier |
| `--color-tertiary-button-text` | Warna teks pada tombol tersier |
| `--color-success-base` | Warna status keberhasilan |
| `--color-success-gradient` | Titik gradasi untuk keberhasilan |
| `--color-success-button-text` | Warna teks pada tombol keberhasilan |
| `--color-info-base` | Warna status informasi |
| `--color-info-gradient` | Titik gradasi untuk informasi |
| `--color-info-button-text` | Warna teks pada tombol informasi |
| `--color-warning-base` | Warna status peringatan |
| `--color-warning-gradient` | Titik gradasi untuk peringatan |
| `--color-warning-button-text` | Warna teks pada tombol peringatan |
| `--color-danger-base` | Warna status bahaya/kesalahan |
| `--color-danger-gradient` | Titik gradasi untuk bahaya |
| `--color-danger-button-text` | Warna teks pada tombol bahaya |
| `--color-form-base` | Warna aksen elemen formulir |