# Testes

## Testes em PHP

Chamilo utiliza **PHPUnit** para testes de backend.

### Configuração do Banco de Dados de Teste

Os testes requerem um banco de dados dedicado. Crie o arquivo `.env.test.local` com as credenciais do seu banco de dados de teste:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Em seguida, inicialize o banco de dados de teste:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Para redefinir após alterações no esquema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Executando Testes

```bash
# Executar todos os testes
php bin/phpunit

# Executar um arquivo de teste específico
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Executar testes com relatório de cobertura em HTML
php bin/phpunit --coverage-html var/coverage
```

### Localização dos Testes

Os testes estão no diretório `tests/`:

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
├── behat/               # Testes de ponta a ponta com Behat
├── fixtures/            # Arquivos de fixtures do Alice
├── AbstractApiTest.php  # Classe base para testes de API
└── ChamiloTestTrait.php # Auxiliares compartilhados para testes
```

### Tipos de Testes

* **Testes de Unidade/Integração** — Testes com PHPUnit em `CoreBundle/` e `CourseBundle/`; a maioria acessa um banco de dados real (via `dama/doctrine-test-bundle`)
* **Testes Funcionais (API)** — Estendem `AbstractApiTest` e testam endpoints HTTP de ponta a ponta
* **Testes Behat** — Testes de aceitação no nível do navegador em `tests/behat/features/` (veja abaixo)

## Testes Behat (Ponta a Ponta)

Chamilo possui um conjunto de testes Behat para testes de aceitação no nível do navegador. É necessário ter uma instância do Chamilo em execução, além do Chrome e do ChromeDriver.

```bash
# A partir do diretório tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Ou executar todos os recursos:
../../vendor/behat/behat/bin/behat
```

Configure a URL base em `tests/behat/behat.yml` antes de executar.

## Verificações de Frontend

```bash
# Verificar JavaScript/Vue (ESLint com Prettier)
yarn eslint assets/vue/

# Verificar tipos em TypeScript
yarn tsc --noEmit

# Construir ativos de produção (verifica se toda a compilação é bem-sucedida)
yarn build
```

## Qualidade de Código PHP

Chamilo utiliza **ECS** (Easy Coding Standard), **PHPStan** e **Psalm** para qualidade de código. Atalhos do Composer estão disponíveis para cada um:

```bash
# Verificar estilo de código (ECS — Easy Coding Standard)
composer phpcs
# ou diretamente:
vendor/bin/ecs check

# Corrigir automaticamente violações de estilo de código
composer phpcs-fix
# ou diretamente:
vendor/bin/ecs check --fix

# Análise estática com PHPStan (nível 5, escaneia src/ e tests/)
composer phpstan
# ou diretamente:
vendor/bin/phpstan analyse

# Análise estática com Psalm
composer psalm
# ou diretamente:
vendor/bin/psalm --show-info=false
```

Nota: não há `php-cs-fixer` neste projeto. ECS (`symplify/easy-coding-standard`) é a ferramenta de estilo de código.

## Integração Contínua

Pull requests são verificados automaticamente por quatro fluxos de trabalho do GitHub Actions:

| Fluxo de Trabalho | O que executa |
|-------------------|---------------|
| `phpunit.yml` | Conjunto de testes PHPUnit |
| `format_code.yml` | Verificação de estilo de código com ECS |
| `php_analysis.yml` | Psalm, validação de esquema Doctrine, verificador de segurança |
| `behat.yml` | Testes de ponta a ponta com Behat |