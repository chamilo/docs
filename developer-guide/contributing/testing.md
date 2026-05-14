# Pengujian

## Pengujian di PHP

Chamilo menggunakan **PHPUnit** untuk pengujian backend.

### Konfigurasi Basis Data Pengujian

Pengujian memerlukan basis data khusus. Buat file `.env.test.local` dengan kredensial basis data pengujian Anda:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Kemudian, inisialisasi basis data pengujian:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Untuk mengatur ulang setelah perubahan pada skema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Menjalankan Pengujian

```bash
# Menjalankan semua pengujian
php bin/phpunit

# Menjalankan file pengujian tertentu
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Menjalankan pengujian dengan laporan cakupan dalam format HTML
php bin/phpunit --coverage-html var/coverage
```

### Lokasi Pengujian

Pengujian berada di direktori `tests/`:

```
tests/
├── CoreBundle/
│   ├── Api/
│   ├── Command/
│   ├── Controller/
│   ├── Migrations/
│   ├── Repository/
│   ├── Security/
│   ├── Serializer/
│   ├── Settings/
│   ├── Tool/
│   └── Twig/
├── CourseBundle/
│   ├── Repository/
│   └── Settings/
├── behat/               # Pengujian ujung ke ujung dengan Behat
├── fixtures/            # File fixtures dari Alice
├── AbstractApiTest.php  # Kelas dasar untuk pengujian API
└── ChamiloTestTrait.php # Pembantu bersama untuk pengujian
```

### Jenis Pengujian

* **Pengujian Unit/Integrasi** — Pengujian dengan PHPUnit di `CoreBundle/` dan `CourseBundle/`; sebagian besar mengakses basis data nyata (melalui `dama/doctrine-test-bundle`)
* **Pengujian Fungsional (API)** — Memperluas `AbstractApiTest` dan menguji endpoint HTTP secara ujung ke ujung
* **Pengujian Behat** — Pengujian penerimaan pada tingkat peramban di `tests/behat/features/` (lihat di bawah)

## Pengujian Behat (Ujung ke Ujung)

Chamilo memiliki serangkaian pengujian Behat untuk pengujian penerimaan pada tingkat peramban. Anda perlu memiliki instance Chamilo yang berjalan, serta Chrome dan ChromeDriver.

```bash
# Dari direktori tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Atau jalankan semua fitur:
../../vendor/behat/behat/bin/behat
```

Konfigurasikan URL dasar di `tests/behat/behat.yml` sebelum menjalankan.

## Pemeriksaan Frontend

```bash
# Memeriksa JavaScript/Vue (ESLint dengan Prettier)
yarn eslint assets/vue/

# Memeriksa tipe di TypeScript
yarn tsc --noEmit

# Membangun aset produksi (memeriksa apakah seluruh kompilasi berhasil)
yarn build
```

## Kualitas Kode PHP

Chamilo menggunakan **ECS** (Easy Coding Standard), **PHPStan**, dan **Psalm** untuk kualitas kode. Pintasan Composer tersedia untuk masing-masing:

```bash
# Memeriksa gaya kode (ECS — Easy Coding Standard)
composer phpcs
# atau langsung:
vendor/bin/ecs check

# Memperbaiki pelanggaran gaya kode secara otomatis
composer phpcs-fix
# atau langsung:
vendor/bin/ecs check --fix

# Analisis statis dengan PHPStan (level 5, memindai src/ dan tests/)
composer phpstan
# atau langsung:
vendor/bin/phpstan analyse

# Analisis statis dengan Psalm
composer psalm
# atau langsung:
vendor/bin/psalm --show-info=false
```

Catatan: tidak ada `php-cs-fixer` di proyek ini. ECS (`symplify/easy-coding-standard`) adalah alat gaya kode yang digunakan.

## Integrasi Berkelanjutan

Pull request diperiksa secara otomatis oleh empat alur kerja GitHub Actions:

| Alur Kerja | Apa yang Dijalankan |
|------------|----------------------|
| `phpunit.yml` | Kumpulan pengujian PHPUnit |
| `format_code.yml` | Pemeriksaan gaya kode dengan ECS |
| `php_analysis.yml` | Psalm, validasi skema Doctrine, pemeriksa keamanan |
| `behat.yml` | Pengujian ujung ke ujung dengan Behat |