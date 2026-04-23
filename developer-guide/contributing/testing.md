# Testing

## PHP Testing

Chamilo uses **PHPUnit** for backend testing.

### Running Tests

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Entity/UserTest.php

# Run tests with coverage
php bin/phpunit --coverage-html var/coverage
```

### Test Location

Tests are in the `tests/` directory, mirroring the `src/` structure:

```
tests/
├── CoreBundle/
│   ├── Entity/
│   ├── Controller/
│   └── Repository/
├── CourseBundle/
└── ...
```

### Test Types

* **Unit tests** — Test individual classes and methods
* **Integration tests** — Test interactions between components
* **Functional tests** — Test HTTP endpoints and controllers

## Frontend Testing

Frontend code can be linted and checked:

```bash
# Lint JavaScript/Vue
yarn eslint assets/vue/

# Type check TypeScript
yarn tsc --noEmit
```

## Code Quality

```bash
# PHP code style check
php-cs-fixer fix --dry-run --diff

# PHP static analysis
phpstan analyse src/
```

## Continuous Integration

Pull requests are automatically checked for:

* Passing tests
* Code style compliance
* Build success (frontend assets compile)
