# Testing

## PHP Testing

Chamilo utilizza **PHPUnit** per i test del backend.

### Test Database Setup

I test richiedono un database dedicato. Creare `.env.test.local` con le credenziali del database di test:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Quindi inizializzare il database di test:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Per reimpostare dopo modifiche allo schema:

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

I test si trovano nella directory `tests/`, che non è inclusa nei download confezionati di Chamilo — è presente solo con un `git clone`. `CoreBundle/` e `CourseBundle/` rispecchiano la struttura delle sottodirectory di `src/CoreBundle/` e `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Vedere [Struttura del progetto](../getting-started/project-structure.md) per il layout completo di `tests/`, comprese le cartelle non appartenenti alla suite di test (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Test Types

* **Test unitari/di integrazione** — test PHPUnit in `CoreBundle/` e `CourseBundle/`; la maggior parte interroga un database reale (tramite `dama/doctrine-test-bundle`)
* **Test funzionali (API)** — estendono `AbstractApiTest` e verificano gli endpoint HTTP end-to-end
* **Test Playwright** — test di accettazione a livello di browser in `tests/playwright/` (vedere sotto)

## Playwright (End-to-End) Tests

Chamilo utilizza [Playwright](https://playwright.dev/), guidato tramite [playwright-bdd](https://vitalets.github.io/playwright-bdd/) in modo che gli scenari restino in Gherkin semplice. Questo ha sostituito la vecchia suite Behat; gli scenari Behat restano nella cronologia git e vale la pena consultarli quando si aggiunge copertura per un'area che un tempo testavano (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), ma trattarli solo come un indizio di quali flussi contano — i selettori sono obsoleti, quindi verificare rispetto all'applicazione live.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Prima della prima esecuzione, popolare i fixture che la maggior parte degli scenari presuppone esistano, in questo ordine:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Quindi eseguire la suite (i seed e lo scenario dell'installer ne sono esclusi):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` copre l'installer web stesso. Ricrea il database, quindi è solo per la CI — non eseguirlo mai contro un'installazione a cui si tiene.

Dopo aver modificato un file `.feature` o qualsiasi cosa sotto `tests/playwright/steps/`, rigenerare le spec compilate prima di fidarsi di un'esecuzione:

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

Chamilo utilizza **ECS** (Easy Coding Standard), **PHPStan** e **Psalm** per la qualità del codice. Sono disponibili scorciatoie Composer per ciascuno:

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

# oppure direttamente:
vendor/bin/psalm --show-info=false
```

Nota: in questo progetto non è presente `php-cs-fixer`. ECS (`symplify/easy-coding-standard`) è lo strumento per lo stile del codice.

## Continuous Integration

Le pull request vengono verificate automaticamente da quattro workflow di GitHub Actions:

| Workflow | Cosa esegue |
|----------|-------------|
| `phpunit.yml` | Suite di test PHPUnit |
| `format_code.yml` | Controllo dello stile del codice con ECS |
| `php_analysis.yml` | Psalm, validazione dello schema Doctrine, controllo dei requisiti delle dipendenze |
| `playwright.yml` | Test end-to-end Playwright (installa Chamilo tramite il web installer, quindi esegue la suite) |