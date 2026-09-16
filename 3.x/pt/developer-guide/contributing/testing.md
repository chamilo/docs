# Testes

## Testes PHP

O Chamilo utiliza **PHPUnit** para testes de backend.

### Configuração da Base de Dados de Teste

Os testes exigem uma base de dados dedicada. Crie `.env.test.local` com as credenciais da sua base de dados de teste:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Em seguida, inicialize a base de dados de teste:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Para repor após alterações de esquema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Execução dos Testes

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Localização dos Testes

Os testes encontram-se no diretório `tests/`, que não está incluído nas transferências empacotadas do Chamilo — só vem com um `git clone`. `CoreBundle/` e `CourseBundle/` espelham a estrutura de subdiretórios de `src/CoreBundle/` e `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Consulte [Estrutura do Projeto](../getting-started/project-structure.md) para o layout completo de `tests/`, incluindo as pastas que não pertencem à suíte de testes (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Tipos de Testes

* **Testes unitários/de integração** — testes PHPUnit em `CoreBundle/` e `CourseBundle/`; a maioria acede a uma base de dados real (via `dama/doctrine-test-bundle`)
* **Testes funcionais (API)** — estendem `AbstractApiTest` e testam endpoints HTTP de ponta a ponta
* **Testes Playwright** — testes de aceitação ao nível do navegador em `tests/playwright/` (ver abaixo)

## Testes Playwright (ponta a ponta)

O Chamilo utiliza [Playwright](https://playwright.dev/), acionado através de [playwright-bdd](https://vitalets.github.io/playwright-bdd/) para que os cenários permaneçam em Gherkin simples. Isto substituiu a antiga suíte Behat; os cenários do Behat permanecem no histórico do git e vale a pena consultá-los ao acrescentar cobertura para uma área que outrora testava (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), mas trate-os apenas como indício de quais fluxos importam — os seletores degradaram-se, por isso verifique face à aplicação em produção.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Antes da primeira execução, carregue as fixtures que a maioria dos cenários assume existirem, nesta ordem:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Em seguida, execute a suíte (as seeds e o cenário do instalador estão excluídos dela):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` cobre o próprio instalador web. Recria a base de dados, pelo que é apenas para CI — nunca o execute contra uma instalação que lhe importe.

Após editar um ficheiro `.feature` ou qualquer coisa em `tests/playwright/steps/`, regenere as specs compiladas antes de confiar numa execução:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Verificações de Frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Qualidade de Código PHP

O Chamilo utiliza **ECS** (Easy Coding Standard), **PHPStan** e **Psalm** para qualidade de código. Estão disponíveis atalhos Composer para cada um:

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

# ou diretamente:
vendor/bin/psalm --show-info=false
```

Nota: não existe `php-cs-fixer` neste projeto. O ECS (`symplify/easy-coding-standard`) é a ferramenta de estilo de código.

## Integração contínua

Os pull requests são verificados automaticamente por quatro fluxos de trabalho do GitHub Actions:

| Workflow | O que executa |
|----------|-------------|
| `phpunit.yml` | Conjunto de testes PHPUnit |
| `format_code.yml` | Verificação de estilo de código ECS |
| `php_analysis.yml` | Psalm, validação do esquema Doctrine, verificador de requisitos de dependências |
| `playwright.yml` | Testes ponta a ponta Playwright (instala o Chamilo através do instalador web e, em seguida, executa o conjunto) |