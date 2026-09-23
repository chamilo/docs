# Testing

## PHP Testing

Chamilo bruker **PHPUnit** til backend-testing.

### Oppsett av testdatabase

Tester krever en dedikert database. Opprett `.env.test.local` med påloggingsinformasjonen til testdatabasen:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initialiser deretter testdatabasen:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

For å tilbakestille etter skjemaendringer:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Kjøre tester

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Testplassering

Tester ligger i katalogen `tests/`, som ikke er inkludert i pakkede Chamilo-nedlastinger — den følger bare med ved `git clone`. `CoreBundle/` og `CourseBundle/` speiler underkatalogstrukturen til `src/CoreBundle/` og `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Se [Prosjektstruktur](../getting-started/project-structure.md) for den fullstendige `tests/`-strukturen, inkludert mappene som ikke er en del av testsuiter (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Testtyper

* **Enhets-/integrasjonstester** — PHPUnit-tester i `CoreBundle/` og `CourseBundle/`; de fleste treffer en ekte database (via `dama/doctrine-test-bundle`)
* **Funksjonelle (API-)tester** — Utvider `AbstractApiTest` og tester HTTP-endepunkter ende-til-ende
* **Playwright-tester** — Akseptansetester på nettlesernivå i `tests/playwright/` (se nedenfor)

## Playwright-tester (ende-til-ende)

Chamilo bruker [Playwright](https://playwright.dev/), styrt via [playwright-bdd](https://vitalets.github.io/playwright-bdd/) slik at scenariene forblir vanlig Gherkin. Dette erstattet den gamle Behat-suiten; Behats scenarier ligger fortsatt i git-historikken og er verd å konsultere når man legger til dekning for et område den en gang testet (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), men behandle dem kun som et hint om hvilke flyter som er viktige — selektorene har råtnet, så verifiser mot den kjørende applikasjonen.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Før første kjøring, så fixtures som de fleste scenariene forutsetter at finnes, i denne rekkefølgen:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Kjør deretter suiten (seeds og installasjonsscenariet er utelatt fra den):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` dekker selve webinstallasjonen. Den gjenskaper databasen, så den er kun for CI — kjør den aldri mot en installasjon du bryr deg om.

Etter redigering av en `.feature`-fil eller noe under `tests/playwright/steps/`, regenerer de kompilerte spesifikasjonene før du stoler på en kjøring:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Frontend-sjekker

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP-kodekvalitet

Chamilo bruker **ECS** (Easy Coding Standard), **PHPStan** og **Psalm** for kodekvalitet. Composer-snarveier er tilgjengelige for hver:

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

Merk: det finnes ingen `php-cs-fixer` i dette prosjektet. ECS (`symplify/easy-coding-standard`) er verktøyet for kodestil.

## Kontinuerlig integrasjon

Pull requests sjekkes automatisk av fire GitHub Actions-arbeidsflyter:

| Arbeidsflyt | Hva den kjører |
|----------|-------------|
| `phpunit.yml` | PHPUnit-testsuite |
| `format_code.yml` | ECS-sjekk av kodestil |
| `php_analysis.yml` | Psalm, validering av Doctrine-skjema, sjekk av avhengighetskrav |
| `playwright.yml` | Playwright ende-til-ende-tester (installerer Chamilo via webinstalleren, og kjører deretter suiten) |