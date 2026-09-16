# Konvensi Pengkodean

## PHP

* **Standar**: Gaya pengkodean PSR-12
* **Deklarasi Tipe**: Gunakan deklarasi tipe dari PHP 8.2 (tipe parameter, tipe pengembalian, tipe properti)
* **Tipe Ketat**: Semua file PHP harus mendeklarasikan `strict_types=1`
* **Namespaces**: Ikuti autoloading PSR-4 (misalnya, `Chamilo\CoreBundle\Entity\User`)
* **Standar Symfony**: Ikuti standar pengkodean dan praktik terbaik Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Kode diperiksa dengan ESLint dan diformat dengan Prettier; konfigurasi berada di `eslint.config.mjs` di root proyek. Plugin `prettier-plugin-tailwindcss` juga diaktifkan untuk pengurutan otomatis kelas Tailwind.
* **Composition API**: Gunakan sintaks `<script setup>` dari Vue 3 untuk komponen baru
* **TypeScript**: TypeScript didukung; gunakan untuk kode dengan keamanan tipe

## CSS

* **Tailwind CSS**: Lebih suka kelas utilitas daripada CSS kustom
* **Penamaan BEM**: Ketika CSS kustom diperlukan, gunakan konvensi penamaan BEM
* **SCSS**: Gunakan SCSS untuk lembar gaya yang kompleks

## Alat Analisis Statis dan Refaktorisasi PHP

Proyek ini mencakup konfigurasi untuk tiga alat tambahan:

| Alat        | File Konfigurasi     | Tujuan                                      |
|-------------|----------------------|---------------------------------------------|
| **PHPStan** | `phpstan.neon`      | Analisis statis (level 5, memindai direktori `src/` dan direktori pengujian) |
| **Psalm**   | `psalm.xml`         | Analisis statis kedua; dijalankan di CI pada setiap push |
| **Rector**  | `rector.php`        | Transformasi dan pembaruan kode otomatis    |

Jalankan melalui pintasan Composer: `composer phpstan`, `composer psalm`. Lihat [Pengujian](../contributing/testing.md) untuk perintah lengkap.

## Umum

* **Bahasa Inggris**: Semua komentar kode, nama variabel, dan dokumentasi harus dalam bahasa Inggris
* **Terjemahan**: Semua teks yang ditujukan untuk pengguna harus menggunakan sistem terjemahan (Vue I18n untuk frontend, Symfony Translator untuk backend)
* **Tanpa Nilai Ajaib**: Gunakan konstanta atau enum alih-alih nilai yang dikodekan secara langsung