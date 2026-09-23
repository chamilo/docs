# Testning

## PHP-testning

Chamilo bruger **PHPUnit** til backend-testning.

### Opsætning af testdatabase

Tests kræver en dedikeret database. Opret `.env.test.local` med dine testdatabaseoplysninger:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initialisér derefter testdatabasen:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Sådan nulstiller du efter skemaændringer:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Kørsel af tests

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Placering af tests

Tests ligger i mappen `tests/`, som ikke indgår i pakkede Chamilo-downloads — den følger kun med ved et `git clone`. `CoreBundle/` og `CourseBundle/` spejler undermappestrukturen i `src/CoreBundle/` og `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Se [Projektstruktur](../getting-started/project-structure.md) for den fulde `tests/`-layout, herunder mapperne uden for testsuiterne (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Testtyper

* **Enheds-/integrationstests** — PHPUnit-tests i `CoreBundle/` og `CourseBundle/`; de fleste rammer en rigtig database (via `dama/doctrine-test-bundle`)
* **Funktionelle (API-)tests** — Udvider `AbstractApiTest` og tester HTTP-endepunkter fra ende til anden
* **Playwright-tests** — Acceptancetests på browserniveau i `tests/playwright/` (se nedenfor)

## Playwright-tests (ende-til-ende)

Chamilo bruger [Playwright](https://playwright.dev/), drevet via [playwright-bdd](https://vitalets.github.io/playwright-bdd/), så scenarier forbliver almindelig Gherkin. Dette erstattede den gamle Behat-suite; Behats scenarier ligger stadig i git-historikken og er værd at konsultere, når der tilføjes dækning for et område, den tidligere testede (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), men behandl dem kun som et hint om, hvilke flows der betyder noget — selektorerne er forældede, så verificér mod den kørende applikation.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Før første kørsel skal du seed’e de fixtures, de fleste scenarier forudsætter, i denne rækkefølge:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Kør derefter suiten (seeds og installationsscenariet er udeladt fra den):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` dækker selve webinstallationen. Den genskaber databasen, så den er kun til CI — kør den aldrig mod en installation, du er afhængig af.

Efter redigering af en `.feature`-fil eller noget under `tests/playwright/steps/` skal du regenerere de kompilerede specs, før du stoler på en kørsel:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Frontend-tjek

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP-kodekvalitet

Chamilo bruger **ECS** (Easy Coding Standard), **PHPStan** og **Psalm** til kodekvalitet. Der findes Composer-genveje til hver:

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

# eller direkte:
vendor/bin/psalm --show-info=false
```

Bemærk: der er ingen `php-cs-fixer` i dette projekt. ECS (`symplify/easy-coding-standard`) er værktøjet til kodestil.

## Continuous Integration

Pull requests tjekkes automatisk af fire GitHub Actions-workflows:

| Workflow | Hvad det kører |
|----------|-------------|
| `phpunit.yml` | PHPUnit-testsuite |
| `format_code.yml` | ECS-tjek af kodestil |
| `php_analysis.yml` | Psalm, validering af Doctrine-skema, tjekker af afhængighedskrav |
| `playwright.yml` | Playwright end-to-end-tests (installerer Chamilo via webinstalleren og kører derefter suiten) |