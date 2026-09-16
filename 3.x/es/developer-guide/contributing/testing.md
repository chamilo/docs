# Pruebas

## Pruebas PHP

Chamilo utiliza **PHPUnit** para las pruebas de backend.

### Configuración de la base de datos de pruebas

Las pruebas requieren una base de datos dedicada. Cree `.env.test.local` con las credenciales de su base de datos de pruebas:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

A continuación, inicialice la base de datos de pruebas:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Para restablecerla tras cambios en el esquema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Ejecución de las pruebas

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Ubicación de las pruebas

Las pruebas se encuentran en el directorio `tests/`, que no se incluye en las descargas empaquetadas de Chamilo: solo está disponible con un `git clone`. `CoreBundle/` y `CourseBundle/` reflejan la estructura de subdirectorios de `src/CoreBundle/` y `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Consulte [Estructura del proyecto](../getting-started/project-structure.md) para ver el diseño completo de `tests/`, incluidos los directorios que no forman parte de la suite de pruebas (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Tipos de pruebas

* **Pruebas unitarias/de integración** — pruebas PHPUnit en `CoreBundle/` y `CourseBundle/`; la mayoría acceden a una base de datos real (mediante `dama/doctrine-test-bundle`)
* **Pruebas funcionales (API)** — extienden `AbstractApiTest` y prueban los endpoints HTTP de extremo a extremo
* **Pruebas Playwright** — pruebas de aceptación a nivel de navegador en `tests/playwright/` (véase más abajo)

## Pruebas Playwright (de extremo a extremo)

Chamilo utiliza [Playwright](https://playwright.dev/), impulsado a través de [playwright-bdd](https://vitalets.github.io/playwright-bdd/) para que los escenarios permanezcan en Gherkin sencillo. Esto sustituyó a la antigua suite Behat; los escenarios de Behat permanecen en el historial de git y conviene consultarlos al añadir cobertura de un área que antaño se probaba (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), pero trátenlos solo como una pista de qué flujos importan: los selectores se han degradado, así que verifique contra la aplicación en vivo.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Antes de la primera ejecución, cargue los fixtures que la mayoría de los escenarios dan por existentes, en este orden:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

A continuación, ejecute la suite (las semillas y el escenario del instalador quedan excluidos de ella):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` cubre el propio instalador web. Recrea la base de datos, por lo que es solo para CI: nunca lo ejecute contra una instalación que le importe.

Tras editar un archivo `.feature` o cualquier cosa bajo `tests/playwright/steps/`, regenere las especificaciones compiladas antes de confiar en una ejecución:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Comprobaciones de frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Calidad de código PHP

Chamilo utiliza **ECS** (Easy Coding Standard), **PHPStan** y **Psalm** para la calidad del código. Hay atajos de Composer disponibles para cada uno:

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

# o directamente:
vendor/bin/psalm --show-info=false
```

Nota: no hay `php-cs-fixer` en este proyecto. ECS (`symplify/easy-coding-standard`) es la herramienta de estilo de código.

## Integración continua

Las solicitudes de incorporación (pull requests) se comprueban automáticamente mediante cuatro flujos de trabajo de GitHub Actions:

| Flujo de trabajo | Qué ejecuta |
|----------|-------------|
| `phpunit.yml` | Suite de pruebas PHPUnit |
| `format_code.yml` | Comprobación de estilo de código ECS |
| `php_analysis.yml` | Psalm, validación del esquema de Doctrine, comprobador de requisitos de dependencias |
| `playwright.yml` | Pruebas de extremo a extremo Playwright (instala Chamilo mediante el instalador web y, a continuación, ejecuta la suite) |