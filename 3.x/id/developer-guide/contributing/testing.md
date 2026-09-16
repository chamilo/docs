# Pengujian

## Pengujian PHP

Chamilo menggunakan **PHPUnit** untuk pengujian backend.

### Penyiapan Basis Data Uji

Pengujian memerlukan basis data khusus. Buat `.env.test.local` dengan kredensial basis data uji Anda:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Kemudian inisialisasi basis data uji:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Untuk mereset setelah perubahan skema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Menjalankan Pengujian

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Lokasi Pengujian

Pengujian berada di direktori `tests/`, yang tidak disertakan dalam unduhan Chamilo yang dikemas — hanya tersedia melalui `git clone`. `CoreBundle/` dan `CourseBundle/` mencerminkan tata letak subdirektori dari `src/CoreBundle/` dan `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Lihat [Struktur Proyek](../getting-started/project-structure.md) untuk tata letak lengkap `tests/`, termasuk folder yang bukan bagian dari rangkaian pengujian (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Jenis Pengujian

* **Pengujian unit/integrasi** — pengujian PHPUnit di `CoreBundle/` dan `CourseBundle/`; sebagian besar mengakses basis data nyata (melalui `dama/doctrine-test-bundle`)
* **Pengujian fungsional (API)** — memperluas `AbstractApiTest` dan menguji endpoint HTTP dari ujung ke ujung
* **Pengujian Playwright** — pengujian penerimaan tingkat peramban di `tests/playwright/` (lihat di bawah)

## Pengujian Playwright (Ujung ke Ujung)

Chamilo menggunakan [Playwright](https://playwright.dev/), dijalankan melalui [playwright-bdd](https://vitalets.github.io/playwright-bdd/) agar skenario tetap berupa Gherkin biasa. Ini menggantikan rangkaian Behat yang lama; skenario Behat tetap ada dalam riwayat git dan layak dikonsultasikan saat menambahkan cakupan untuk area yang pernah diujinya (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), tetapi perlakukan hanya sebagai petunjuk alur mana yang penting — selektornya sudah usang, jadi verifikasi terhadap aplikasi yang sedang berjalan.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Sebelum menjalankan pertama kali, isi fixture yang diasumsikan ada oleh sebagian besar skenario, dalam urutan ini:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Kemudian jalankan rangkaiannya (seed dan skenario penginstal dikecualikan darinya):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` mencakup penginstal web itu sendiri. Perintah ini membuat ulang basis data, sehingga hanya untuk CI — jangan pernah menjalankannya terhadap instalasi yang Anda pedulikan.

Setelah mengedit berkas `.feature` atau apa pun di bawah `tests/playwright/steps/`, hasilkan ulang spesifikasi yang dikompilasi sebelum mempercayai suatu eksekusi:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Pemeriksaan Frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Kualitas Kode PHP

Chamilo menggunakan **ECS** (Easy Coding Standard), **PHPStan**, dan **Psalm** untuk kualitas kode. Pintasan Composer tersedia untuk masing-masing:

```bash
# Check code style (ECS — Easy Coding Standard)
composer phpcs
# or directly:
vendor/bin/ecs check

# Auto-fix code style violations
composer phpcs-fix
# or directly:
vendor/bin/ecs check --fix

# Static analysis with PHPStan (level 5, scans src/ and tests/)
composer phpstan
# or directly:
vendor/bin/phpstan analyse

# Static analysis with Psalm
composer psalm
# or directly:
vendor/bin/psalm --show-info=false
```

Catatan: tidak ada `php-cs-fixer` dalam proyek ini. ECS (`symplify/easy-coding-standard`) adalah alat gaya kode yang digunakan.

## Continuous Integration

Pull request diperiksa secara otomatis oleh empat alur kerja GitHub Actions:

| Workflow | Yang dijalankan |
|----------|-------------|
| `phpunit.yml` | Suite pengujian PHPUnit |
| `format_code.yml` | Pemeriksaan gaya kode ECS |
| `php_analysis.yml` | Psalm, validasi skema Doctrine, pemeriksa persyaratan dependensi |
| `playwright.yml` | Pengujian end-to-end Playwright (menginstal Chamilo melalui penginstal web, lalu menjalankan suite) |