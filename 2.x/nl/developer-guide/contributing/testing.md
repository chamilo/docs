# Testen

## PHP Testen

Chamilo gebruikt **PHPUnit** voor backend-testen.

### Testdatabase Instellen

Tests vereisen een speciale database. Maak een `.env.test.local` aan met de inloggegevens van je testdatabase:

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

Om te resetten na schema-aanpassingen:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Tests Uitvoeren

```bash
# Alle tests uitvoeren
php bin/phpunit

# Een specifiek testbestand uitvoeren
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Tests uitvoeren met HTML-dekkingsrapport
php bin/phpunit --coverage-html var/coverage
```

### Testlocatie

Tests bevinden zich in de map `tests/`:

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
├── fixtures/            # Alice fixture-bestanden
├── AbstractApiTest.php  # Basisklasse voor API-tests
└── ChamiloTestTrait.php # Gedeelde testhelpers
```

### Testtypen

* **Unit/Integratietests** — PHPUnit-tests in `CoreBundle/` en `CourseBundle/`; de meeste maken gebruik van een echte database (via `dama/doctrine-test-bundle`)
* **Functionele (API) tests** — Breid `AbstractApiTest` uit en test HTTP-eindpunten van begin tot eind
* **Behat-tests** — Acceptatietests op browserniveau in `tests/behat/features/` (zie hieronder)

## Behat (End-to-End) Tests

Chamilo heeft een Behat-testsuite voor acceptatietesten op browserniveau. Hiervoor is een draaiende Chamilo-instantie, Chrome en ChromeDriver vereist.

```bash
# Vanuit de map tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Of voer alle features uit:
../../vendor/behat/behat/bin/behat
```

Configureer de basis-URL in `tests/behat/behat.yml` voordat je de tests uitvoert.

## Frontend Controles

```bash
# Lint JavaScript/Vue (ESLint met Prettier)
yarn eslint assets/vue/

# Typecontrole voor TypeScript
yarn tsc --noEmit

# Productie-assets bouwen (controleert of de hele build compileert)
yarn build
```

## PHP Codekwaliteit

Chamilo gebruikt **ECS** (Easy Coding Standard), **PHPStan** en **Psalm** voor codekwaliteit. Composer-snelkoppelingen zijn beschikbaar voor elk:

```bash
# Codestijl controleren (ECS — Easy Coding Standard)
composer phpcs
# of direct:
vendor/bin/ecs check

# Codestijlproblemen automatisch corrigeren
composer phpcs-fix
# of direct:
vendor/bin/ecs check --fix

# Statische analyse met PHPStan (niveau 5, scant src/ en tests/)
composer phpstan
# of direct:
vendor/bin/phpstan analyse

# Statische analyse met Psalm
composer psalm
# of direct:
vendor/bin/psalm --show-info=false
```

Let op: er is geen `php-cs-fixer` in dit project. ECS (`symplify/easy-coding-standard`) is het hulpmiddel voor codestijl.

## Continue Integratie

Pull requests worden automatisch gecontroleerd door vier GitHub Actions-workflows:

| Workflow | Wat het uitvoert |
|----------|------------------|
| `phpunit.yml` | PHPUnit-testsuite |
| `format_code.yml` | ECS codestijlcontrole |
| `php_analysis.yml` | Psalm, Doctrine schema-validatie, beveiligingscontrole |
| `behat.yml` | Behat end-to-end tests |