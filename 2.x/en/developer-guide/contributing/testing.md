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

Tests are in the `tests/` directory:

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
├── behat/               # Behat end-to-end tests
├── fixtures/            # Alice fixture files
├── AbstractApiTest.php  # Base class for API tests
└── ChamiloTestTrait.php # Shared test helpers
```

### Test Types

* **Unit/Integration tests** — PHPUnit tests in `CoreBundle/` and `CourseBundle/`; most hit a real database (via `dama/doctrine-test-bundle`)
* **Functional (API) tests** — Extend `AbstractApiTest` and test HTTP endpoints end-to-end
* **Behat tests** — Browser-level acceptance tests in `tests/behat/features/` (see below)

## Behat (End-to-End) Tests

Chamilo has a Behat test suite for browser-level acceptance testing. It requires a running Chamilo instance, Chrome, and ChromeDriver.

```bash
# From the tests/behat/ directory:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Or run all features:
../../vendor/behat/behat/bin/behat
```

Configure the base URL in `tests/behat/behat.yml` before running.

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
| `php_analysis.yml` | Psalm, Doctrine schema validation, security checker |
| `behat.yml` | Behat end-to-end tests |
