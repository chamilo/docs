# Testning

## PHP-testning

Chamilo använder **PHPUnit** för backend-testning.

### Konfiguration av testdatabas

Testerna kräver en dedikerad databas. Skapa `.env.test.local` med dina inloggningsuppgifter för testdatabasen:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initiera därefter testdatabasen:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

För att återställa efter schemaändringar:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Köra tester

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Testplacering

Testerna ligger i katalogen `tests/`, som inte ingår i paketerade Chamilo-nedladdningar — den medföljer endast vid en `git clone`. `CoreBundle/` och `CourseBundle/` speglar underkatalogstrukturen i `src/CoreBundle/` och `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Se [Projektstruktur](../getting-started/project-structure.md) för den fullständiga layouten av `tests/`, inklusive mapparna som inte ingår i testsuiten (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Testtyper

* **Enhets-/integrationstester** — PHPUnit-tester i `CoreBundle/` och `CourseBundle/`; de flesta träffar en riktig databas (via `dama/doctrine-test-bundle`)
* **Funktionella (API-)tester** — Utökar `AbstractApiTest` och testar HTTP-ändpunkter från ände till ände
* **Playwright-tester** — Acceptanstester på webbläsarnivå i `tests/playwright/` (se nedan)

## Playwright-tester (ände till ände)

Chamilo använder [Playwright](https://playwright.dev/), styrt via [playwright-bdd](https://vitalets.github.io/playwright-bdd/) så att scenarierna förblir vanlig Gherkin. Detta ersatte den gamla Behat-sviten; Behats scenarier finns kvar i git-historiken och är värda att konsultera när täckning läggs till för ett område som de en gång testade (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), men behandla dem endast som en indikation på vilka flöden som spelar roll — selektorerna har förfallit, så verifiera mot den levande applikationen.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Innan den första körningen, så fixtures som de flesta scenarier förutsätter finns, i denna ordning:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Kör därefter sviten (seed-körningarna och installationsscenariot är undantagna från den):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` täcker själva webbinstallationen. Den återskapar databasen, så den är endast för CI — kör den aldrig mot en installation du bryr dig om.

Efter att du redigerat en `.feature`-fil eller något under `tests/playwright/steps/` ska du regenerera de kompilerade specifikationerna innan du litar på en körning:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Frontendkontroller

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP-kodkvalitet

Chamilo använder **ECS** (Easy Coding Standard), **PHPStan** och **Psalm** för kodkvalitet. Composer-genvägar finns för var och en:

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

# eller direkt:
vendor/bin/psalm --show-info=false
```

Obs: det finns ingen `php-cs-fixer` i det här projektet. ECS (`symplify/easy-coding-standard`) är verktyget för kodstil.

## Continuous Integration

Pull requests kontrolleras automatiskt av fyra GitHub Actions-arbetsflöden:

| Workflow | Vad det kör |
|----------|-------------|
| `phpunit.yml` | PHPUnit-testsvit |
| `format_code.yml` | ECS-kontroll av kodstil |
| `php_analysis.yml` | Psalm, validering av Doctrine-schema, kontroll av beroendekrav |
| `playwright.yml` | Playwright-tester från ände till ände (installerar Chamilo via webbinstallationsprogrammet och kör därefter sviten) |