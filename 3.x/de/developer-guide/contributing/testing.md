# Testing

## PHP Testing

Chamilo verwendet **PHPUnit** für Backend-Tests.

### Test Database Setup

Tests benötigen eine eigene Datenbank. Erstellen Sie `.env.test.local` mit den Zugangsdaten Ihrer Testdatenbank:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initialisieren Sie anschließend die Testdatenbank:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Zum Zurücksetzen nach Schemaänderungen:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Running Tests

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Test Location

Die Tests liegen im Verzeichnis `tests/`, das in paketierten Chamilo-Downloads nicht enthalten ist — es ist nur bei einem `git clone` vorhanden. `CoreBundle/` und `CourseBundle/` spiegeln die Unterverzeichnisstruktur von `src/CoreBundle/` und `src/CourseBundle/` wider:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Siehe [Projektstruktur](../getting-started/project-structure.md) für die vollständige `tests/`-Struktur, einschließlich der Ordner außerhalb der Test-Suite (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Test Types

* **Unit-/Integrationstests** — PHPUnit-Tests in `CoreBundle/` und `CourseBundle/`; die meisten greifen auf eine echte Datenbank zu (über `dama/doctrine-test-bundle`)
* **Funktionale (API-)Tests** — Erweitern `AbstractApiTest` und testen HTTP-Endpunkte durchgängig
* **Playwright-Tests** — Browserbasierte Akzeptanztests in `tests/playwright/` (siehe unten)

## Playwright (End-to-End) Tests

Chamilo verwendet [Playwright](https://playwright.dev/), angesteuert über [playwright-bdd](https://vitalets.github.io/playwright-bdd/), sodass Szenarien in klarem Gherkin bleiben. Dies hat die frühere Behat-Suite abgelöst; die Behat-Szenarien bleiben in der Git-Historie und lohnen sich als Orientierung, wenn Abdeckung für einen Bereich ergänzt wird, den sie einst testeten (`git ls-tree -r --name-only 98c77757ea6 tests/behat`). Behandeln Sie sie jedoch nur als Hinweis darauf, welche Abläufe relevant sind — die Selektoren sind veraltet, prüfen Sie daher gegen die laufende Anwendung.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Vor dem ersten Lauf die Fixtures anlegen, von denen die meisten Szenarien ausgehen, in dieser Reihenfolge:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Anschließend die Suite ausführen (die Seeds und das Installer-Szenario sind davon ausgenommen):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` deckt den Web-Installer selbst ab. Es erzeugt die Datenbank neu und ist daher nur für CI gedacht — führen Sie es niemals gegen eine Installation aus, die Ihnen wichtig ist.

Nach dem Bearbeiten einer `.feature`-Datei oder von Inhalten unter `tests/playwright/steps/` die kompilierten Specs neu erzeugen, bevor Sie einem Lauf vertrauen:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Frontend Checks

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP Code Quality

Chamilo verwendet **ECS** (Easy Coding Standard), **PHPStan** und **Psalm** für die Codequalität. Für jedes Tool stehen Composer-Kurzbefehle zur Verfügung:

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

# oder direkt:
vendor/bin/psalm --show-info=false
```

Hinweis: In diesem Projekt gibt es kein `php-cs-fixer`. ECS (`symplify/easy-coding-standard`) ist das Werkzeug für den Codestil.

## Continuous Integration

Pull Requests werden automatisch durch vier GitHub-Actions-Workflows geprüft:

| Workflow | Was ausgeführt wird |
|----------|-------------|
| `phpunit.yml` | PHPUnit-Testsuite |
| `format_code.yml` | ECS-Codestilprüfung |
| `php_analysis.yml` | Psalm, Doctrine-Schema-Validierung, Dependency-Requirements-Checker |
| `playwright.yml` | Playwright-End-to-End-Tests (installiert Chamilo über den Web-Installer und führt anschließend die Suite aus) |