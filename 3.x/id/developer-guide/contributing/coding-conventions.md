# Konvensi Pengodean

## PHP

* **Standar**: gaya pengodean PSR-12
* **Deklarasi tipe**: Gunakan deklarasi tipe PHP 8.3 (tipe parameter, tipe nilai kembalian, tipe properti)
* **Tipe ketat**: Semua berkas PHP harus mendeklarasikan `strict_types=1`
* **Namespace**: Ikuti autoloading PSR-4 (misalnya, `Chamilo\CoreBundle\Entity\User`)
* **Standar Symfony**: Ikuti standar pengodean dan praktik terbaik Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Kode dilinting dengan ESLint dan diformat dengan Prettier; konfigurasi berada di `eslint.config.mjs` pada akar proyek. `prettier-plugin-tailwindcss` juga diaktifkan untuk pengurutan kelas Tailwind secara otomatis.
* **Composition API**: Gunakan sintaks `<script setup>` Vue 3 untuk komponen baru
* **TypeScript**: TypeScript didukung; gunakan untuk kode yang type-safe

## CSS

* **Tailwind CSS**: Utamakan kelas utilitas daripada CSS kustom
* **Penamaan BEM**: Ketika CSS kustom diperlukan, gunakan konvensi penamaan BEM
* **SCSS**: Gunakan SCSS untuk stylesheet yang kompleks

## Analisis Statis PHP dan Alat Refaktorisasi

Proyek ini menyertakan konfigurasi untuk tiga alat tambahan:

| Alat | Berkas konfigurasi | Tujuan |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Analisis statis (level 5, memindai `src/` dan direktori pengujian) |
| **Psalm** | `psalm.xml` | Lulusan analisis statis kedua; dijalankan di CI pada setiap push |
| **Rector** | `rector.php` | Transformasi dan peningkatan kode secara otomatis |

Jalankan melalui pintasan composer: `composer phpstan`, `composer psalm`. Lihat [Pengujian](../contributing/testing.md) untuk perintah lengkap.

## Umum

* **Bahasa Inggris**: Semua komentar kode, nama variabel, dan dokumentasi harus dalam bahasa Inggris
* **Terjemahan**: Semua teks yang dihadapi pengguna harus menggunakan sistem terjemahan (Vue I18n untuk frontend, Symfony Translator untuk backend)
* **Tanpa nilai magis**: Gunakan konstanta atau enum alih-alih nilai yang dikodekan secara keras