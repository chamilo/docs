# Testes

## Testes PHP

O Chamilo usa **PHPUnit** para testes de backend.

### Configuração do banco de dados de testes

Os testes exigem um banco de dados dedicado. Crie `.env.test.local` com as credenciais do banco de dados de testes:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Em seguida, inicialize o banco de dados de testes:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Para redefinir após alterações de esquema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Execução dos testes

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Localização dos testes

Os testes ficam no diretório `tests/`, que não é incluído nos downloads empacotados do Chamilo — ele só vem com um `git clone`. `CoreBundle/` e `CourseBundle/` espelham a estrutura de subdiretórios de `src/CoreBundle/` e `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Consulte [Estrutura do projeto](../getting-started/project-structure.md) para o layout completo de `tests/`, incluindo as pastas que não fazem parte da suíte de testes (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Tipos de testes

* **Testes unitários/de integração** — testes PHPUnit em `CoreBundle/` e `CourseBundle/`; a maioria acessa um banco de dados real (via `dama/doctrine-test-bundle`)
* **Testes funcionais (API)** — estendem `AbstractApiTest` e testam endpoints HTTP de ponta a ponta
* **Testes Playwright** — testes de aceitação no nível do navegador em `tests/playwright/` (veja abaixo)

## Testes Playwright (ponta a ponta)

O Chamilo usa [Playwright](https://playwright.dev/), acionado por meio de [playwright-bdd](https://vitalets.github.io/playwright-bdd/), para que os cenários permaneçam em Gherkin puro. Isso substituiu a antiga suíte Behat; os cenários do Behat permanecem no histórico do git e vale consultá-los ao adicionar cobertura para uma área que ele já testou (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), mas trate-os apenas como uma indicação de quais fluxos importam — os seletores ficaram obsoletos, portanto verifique em relação à aplicação em execução.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Antes da primeira execução, carregue as fixtures que a maioria dos cenários pressupõe que existam, nesta ordem:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Em seguida, execute a suíte (as seeds e o cenário do instalador são excluídos dela):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` cobre o próprio instalador web. Ele recria o banco de dados, portanto é exclusivo de CI — nunca o execute contra uma instalação que você queira preservar.

Após editar um arquivo `.feature` ou qualquer coisa em `tests/playwright/steps/`, regenere as specs compiladas antes de confiar em uma execução:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Verificações de frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Qualidade de código PHP

O Chamilo usa **ECS** (Easy Coding Standard), **PHPStan** e **Psalm** para qualidade de código. Atalhos do Composer estão disponíveis para cada um:

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

Observação: não há `php-cs-fixer` neste projeto. O ECS (`symplify/easy-coding-standard`) é a ferramenta de estilo de código.

## Integração contínua

Os pull requests são verificados automaticamente por quatro workflows do GitHub Actions:

| Workflow | O que executa |
|----------|-------------|
| `phpunit.yml` | Suíte de testes PHPUnit |
| `format_code.yml` | Verificação de estilo de código ECS |
| `php_analysis.yml` | Psalm, validação de schema do Doctrine, verificador de requisitos de dependências |
| `playwright.yml` | Testes end-to-end Playwright (instala o Chamilo pelo instalador web e, em seguida, executa a suíte) |