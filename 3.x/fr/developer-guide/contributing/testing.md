# Tests

## Tests PHP

Chamilo utilise **PHPUnit** pour les tests backend.

### Configuration de la base de données de test

Les tests nécessitent une base de données dédiée. Créez `.env.test.local` avec les identifiants de votre base de données de test :

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Puis initialisez la base de données de test :

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Pour réinitialiser après des modifications de schéma :

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Exécution des tests

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Emplacement des tests

Les tests se trouvent dans le répertoire `tests/`, qui n’est pas inclus dans les téléchargements empaquetés de Chamilo — il n’est fourni qu’avec un `git clone`. `CoreBundle/` et `CourseBundle/` reproduisent l’arborescence des sous-répertoires de `src/CoreBundle/` et `src/CourseBundle/` :

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Consultez [Structure du projet](../getting-started/project-structure.md) pour l’arborescence complète de `tests/`, y compris les dossiers hors suite de tests (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Types de tests

* **Tests unitaires/d’intégration** — tests PHPUnit dans `CoreBundle/` et `CourseBundle/` ; la plupart interrogent une vraie base de données (via `dama/doctrine-test-bundle`)
* **Tests fonctionnels (API)** — étendent `AbstractApiTest` et testent les points de terminaison HTTP de bout en bout
* **Tests Playwright** — tests d’acceptation au niveau du navigateur dans `tests/playwright/` (voir ci-dessous)

## Tests Playwright (de bout en bout)

Chamilo utilise [Playwright](https://playwright.dev/), piloté via [playwright-bdd](https://vitalets.github.io/playwright-bdd/) afin que les scénarios restent du Gherkin simple. Cela a remplacé l’ancienne suite Behat ; les scénarios Behat restent dans l’historique git et méritent d’être consultés lors de l’ajout de couverture pour un domaine qu’ils testaient autrefois (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), mais ne les considérez que comme une indication des flux importants — les sélecteurs ont vieilli, vérifiez donc par rapport à l’application réelle.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Avant la première exécution, semez les fixtures que la plupart des scénarios supposent existantes, dans cet ordre :

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Puis exécutez la suite (les seeds et le scénario d’installateur en sont exclus) :

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` couvre l’installateur web lui-même. Il recrée la base de données, il est donc réservé à la CI — ne l’exécutez jamais contre une installation qui vous importe.

Après modification d’un fichier `.feature` ou de tout élément sous `tests/playwright/steps/`, régénérez les spécifications compilées avant de faire confiance à une exécution :

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Contrôles frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Qualité du code PHP

Chamilo utilise **ECS** (Easy Coding Standard), **PHPStan** et **Psalm** pour la qualité du code. Des raccourcis Composer sont disponibles pour chacun :

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

# ou directement :
vendor/bin/psalm --show-info=false
```

Remarque : il n’y a pas de `php-cs-fixer` dans ce projet. ECS (`symplify/easy-coding-standard`) est l’outil de style de code.

## Intégration continue

Les demandes de fusion (pull requests) sont automatiquement vérifiées par quatre workflows GitHub Actions :

| Workflow | Ce qu’il exécute |
|----------|-------------|
| `phpunit.yml` | Suite de tests PHPUnit |
| `format_code.yml` | Contrôle du style de code ECS |
| `php_analysis.yml` | Psalm, validation du schéma Doctrine, vérificateur des exigences de dépendances |
| `playwright.yml` | Tests de bout en bout Playwright (installe Chamilo via l’installateur web, puis exécute la suite) |