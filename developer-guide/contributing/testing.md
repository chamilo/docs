# Testing

## PHP Testing

Chamilo uses **PHPUnit** for backend testing.

### Test Database Setup

Tests require a dedicated database. Create `.env.test.local` with your test database credentials:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Then initialise the test database:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

To reset after schema changes:

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

Tests are in the `tests/` directory, which is not included in packaged Chamilo downloads — it only comes with a `git clone`. `CoreBundle/` and `CourseBundle/` mirror the subdirectory layout of `src/CoreBundle/` and `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

See [Project Structure](../getting-started/project-structure.md) for the full `tests/` layout, including the non-test-suite folders (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Test Types

* **Unit/Integration tests** — PHPUnit tests in `CoreBundle/` and `CourseBundle/`; most hit a real database (via `dama/doctrine-test-bundle`)
* **Functional (API) tests** — Extend `AbstractApiTest` and test HTTP endpoints end-to-end
* **Playwright tests** — Browser-level acceptance tests in `tests/playwright/` (see below)

## Playwright (End-to-End) Tests

Chamilo uses [Playwright](https://playwright.dev/), driven through [playwright-bdd](https://vitalets.github.io/playwright-bdd/) so scenarios stay plain Gherkin. This replaced the old Behat suite; Behat's scenarios remain in git history and are worth consulting when adding coverage for an area it once tested (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), but treat them only as a hint of which flows matter — the selectors have rotted, so verify against the live app.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Before the first run, seed the fixtures most scenarios assume exist, in this order:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Then run the suite (the seeds and the installer scenario are excluded from it):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` covers the web installer itself. It recreates the database, so it is CI-only — never run it against an installation you care about.

After editing a `.feature` file or anything under `tests/playwright/steps/`, regenerate the compiled specs before trusting a run:

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

Chamilo uses **ECS** (Easy Coding Standard), **PHPStan**, and **Psalm** for code quality. Composer shortcuts are available for each:

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

Note: there is no `php-cs-fixer` in this project. ECS (`symplify/easy-coding-standard`) is the code style tool.

## Continuous Integration

Pull requests are automatically checked by four GitHub Actions workflows:

| Workflow | What it runs |
|----------|-------------|
| `phpunit.yml` | PHPUnit test suite |
| `format_code.yml` | ECS code style check |
| `php_analysis.yml` | Psalm, Doctrine schema validation, dependency requirements checker |
| `playwright.yml` | Playwright end-to-end tests (installs Chamilo via the web installer, then runs the suite) |
