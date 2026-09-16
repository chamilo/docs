# Testen

## PHP-testen

Chamilo gebruikt **PHPUnit** voor backendtesten.

### Instellen van de testdatabase

Tests vereisen een aparte database. Maak `.env.test.local` aan met de inloggegevens van uw testdatabase:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initialiseer vervolgens de testdatabase:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Om te resetten na schemawijzigingen:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Tests uitvoeren

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Locatie van tests

Tests staan in de map `tests/`, die niet is opgenomen in verpakte Chamilo-downloads — deze is alleen aanwezig bij een `git clone`. `CoreBundle/` en `CourseBundle/` weerspiegelen de subdirectorystructuur van `src/CoreBundle/` en `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Zie [Projectstructuur](../getting-started/project-structure.md) voor de volledige indeling van `tests/`, inclusief de mappen die geen testsuite zijn (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Testtypen

* **Unit-/integratietests** — PHPUnit-tests in `CoreBundle/` en `CourseBundle/`; de meeste raken een echte database (via `dama/doctrine-test-bundle`)
* **Functionele (API-)tests** — Breiden `AbstractApiTest` uit en testen HTTP-eindpunten van begin tot eind
* **Playwright-tests** — Acceptatietests op browseniveau in `tests/playwright/` (zie hieronder)

## Playwright-tests (end-to-end)

Chamilo gebruikt [Playwright](https://playwright.dev/), aangestuurd via [playwright-bdd](https://vitalets.github.io/playwright-bdd/), zodat scenario's gewone Gherkin blijven. Dit vervangt de oude Behat-suite; de Behat-scenario's blijven in de git-geschiedenis en zijn het raadplegen waard wanneer u dekking toevoegt voor een gebied dat ooit getest werd (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), maar behandel ze alleen als een hint van welke stromen ertoe doen — de selectors zijn verouderd, dus verifieer tegen de live applicatie.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Voor de eerste run, zaai de fixtures waarvan de meeste scenario's aannemen dat ze bestaan, in deze volgorde:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Voer daarna de suite uit (de seeds en het installer-scenario zijn hiervan uitgesloten):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` dekt de webinstaller zelf. Het herschept de database, dus het is alleen voor CI — voer het nooit uit tegen een installatie waar u om geeft.

Na het bewerken van een `.feature`-bestand of iets onder `tests/playwright/steps/`, genereer de gecompileerde specs opnieuw voordat u een run vertrouwt:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Frontendcontroles

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP-codekwaliteit

Chamilo gebruikt **ECS** (Easy Coding Standard), **PHPStan** en **Psalm** voor codekwaliteit. Composer-snelkoppelingen zijn beschikbaar voor elk:

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

# of rechtstreeks:
vendor/bin/psalm --show-info=false
```

Opmerking: er is geen `php-cs-fixer` in dit project. ECS (`symplify/easy-coding-standard`) is het hulpmiddel voor de codestijl.

## Continuous Integration

Pull requests worden automatisch gecontroleerd door vier GitHub Actions-workflows:

| Workflow | Wat het uitvoert |
|----------|-------------|
| `phpunit.yml` | PHPUnit-testsuite |
| `format_code.yml` | ECS-codestijlcontrole |
| `php_analysis.yml` | Psalm, Doctrine-schemavalidatie, dependency requirements checker |
| `playwright.yml` | Playwright end-to-endtests (installeert Chamilo via de webinstaller en voert daarna de suite uit) |