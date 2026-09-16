# Testing

## PHP-Testing

Chamilo verwendet **PHPUnit** für Backend-Tests.

### Einrichtung der Testdatenbank

Tests erfordern eine dedizierte Datenbank. Erstellen Sie `.env.test.local` mit Ihren Testdatenbank-Zugangsdaten:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Initialisieren Sie dann die Testdatenbank:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Um nach Schemaänderungen zurückzusetzen:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Tests ausführen

```bash
# Alle Tests ausführen
php bin/phpunit

# Eine bestimmte Testdatei ausführen
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Tests mit HTML-Abdeckungsbericht ausführen
php bin/phpunit --coverage-html var/coverage
```

### Testverzeichnis

Tests befinden sich im Verzeichnis `tests/`:

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
├── behat/               # Behat End-to-End-Tests
├── fixtures/            # Alice-Fixture-Dateien
├── AbstractApiTest.php  # Basisklasse für API-Tests
└── ChamiloTestTrait.php # Gemeinsame Test-Helfer
```

### Testarten

* **Unit-/Integrationstests** — PHPUnit-Tests in `CoreBundle/` und `CourseBundle/`; die meisten greifen auf eine echte Datenbank zu (via `dama/doctrine-test-bundle`)
* **Funktionale (API-)Tests** — Erweitern `AbstractApiTest` und testen HTTP-Endpunkte von Anfang bis Ende
* **Behat-Tests** — Akzeptanztests auf Browser-Ebene in `tests/behat/features/` (siehe unten)

## Behat (End-to-End) Tests

Chamilo verfügt über eine Behat-TestSuite für Akzeptanztests auf Browser-Ebene. Es erfordert eine laufende Chamilo-Instanz, Chrome und ChromeDriver.

```bash
# Aus dem Verzeichnis tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Oder alle Features ausführen:
../../vendor/behat/behat/bin/behat
```

Konfigurieren Sie die Basis-URL in `tests/behat/behat.yml`, bevor Sie die Tests ausführen.

## Frontend-Prüfungen

```bash
# JavaScript/Vue linten (ESLint mit Prettier)
yarn eslint assets/vue/

# TypeScript Typprüfung
yarn tsc --noEmit

# Produktions-Assets bauen (überprüft, ob der gesamte Build kompiliert wird)
yarn build
```

## PHP-Codequalität

Chamilo verwendet **ECS** (Easy Coding Standard), **PHPStan** und **Psalm** für die Codequalität. Composer-Kurzbefehle sind für jeden verfügbar:

```bash
# Code-Stil überprüfen (ECS — Easy Coding Standard)
composer phpcs
# oder direkt:
vendor/bin/ecs check

# Code-Stil-Verletzungen automatisch beheben
composer phpcs-fix
# oder direkt:
vendor/bin/ecs check --fix

# Statische Analyse mit PHPStan (Level 5, scannt src/ und tests/)
composer phpstan
# oder direkt:
vendor/bin/phpstan analyse

# Statische Analyse mit Psalm
composer psalm
# oder direkt:
vendor/bin/psalm --show-info=false
```

Hinweis: Es gibt kein `php-cs-fixer` in diesem Projekt. ECS (`symplify/easy-coding-standard`) ist das Code-Stil-Tool.

## Continuous Integration

Pull Requests werden automatisch von vier GitHub Actions-Workflows überprüft:

| Workflow | Was wird ausgeführt |
|----------|---------------------|
| `phpunit.yml` | PHPUnit-TestSuite |
| `format_code.yml` | ECS-Code-Stil-Überprüfung |
| `php_analysis.yml` | Psalm, Doctrine-Schema-Validierung, Sicherheitsprüfung |
| `behat.yml` | Behat End-to-End-Tests |