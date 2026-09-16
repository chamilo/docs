# Testing

## Testing PHP

Chamilo utilizza **PHPUnit** per il testing del backend.

### Configurazione del Database di Test

I test richiedono un database dedicato. Crea il file `.env.test.local` con le credenziali del tuo database di test:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Quindi inizializza il database di test:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Per resettare dopo modifiche allo schema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Esecuzione dei Test

```bash
# Esegui tutti i test
php bin/phpunit

# Esegui un file di test specifico
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Esegui i test con report di copertura HTML
php bin/phpunit --coverage-html var/coverage
```

### Posizione dei Test

I test si trovano nella directory `tests/`:

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
├── behat/               # Test end-to-end Behat
├── fixtures/            # File di fixture Alice
├── AbstractApiTest.php  # Classe base per test API
└── ChamiloTestTrait.php # Helper condivisi per i test
```

### Tipi di Test

* **Test di unità/integrazione** — Test PHPUnit in `CoreBundle/` e `CourseBundle/`; la maggior parte accede a un database reale (tramite `dama/doctrine-test-bundle`)
* **Test funzionali (API)** — Estendono `AbstractApiTest` e testano gli endpoint HTTP end-to-end
* **Test Behat** — Test di accettazione a livello di browser in `tests/behat/features/` (vedi sotto)

## Test Behat (End-to-End)

Chamilo dispone di una suite di test Behat per il testing di accettazione a livello di browser. Richiede un'istanza di Chamilo in esecuzione, Chrome e ChromeDriver.

```bash
# Dalla directory tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Oppure esegui tutte le funzionalità:
../../vendor/behat/behat/bin/behat
```

Configura l'URL di base in `tests/behat/behat.yml` prima di eseguire i test.

## Controlli Frontend

```bash
# Lint JavaScript/Vue (ESLint con Prettier)
yarn eslint assets/vue/

# Controllo tipi TypeScript
yarn tsc --noEmit

# Costruisci asset di produzione (verifica che l'intera build si compili)
yarn build
```

## Qualità del Codice PHP

Chamilo utilizza **ECS** (Easy Coding Standard), **PHPStan** e **Psalm** per la qualità del codice. Sono disponibili scorciatoie Composer per ciascuno:

```bash
# Controlla lo stile del codice (ECS — Easy Coding Standard)
composer phpcs
# oppure direttamente:
vendor/bin/ecs check

# Correggi automaticamente le violazioni dello stile del codice
composer phpcs-fix
# oppure direttamente:
vendor/bin/ecs check --fix

# Analisi statica con PHPStan (livello 5, scansiona src/ e tests/)
composer phpstan
# oppure direttamente:
vendor/bin/phpstan analyse

# Analisi statica con Psalm
composer psalm
# oppure direttamente:
vendor/bin/psalm --show-info=false
```

Nota: in questo progetto non è presente `php-cs-fixer`. ECS (`symplify/easy-coding-standard`) è lo strumento per lo stile del codice.

## Integrazione Continua

Le pull request vengono automaticamente controllate da quattro workflow di GitHub Actions:

| Workflow | Cosa esegue |
|----------|-------------|
| `phpunit.yml` | Suite di test PHPUnit |
| `format_code.yml` | Controllo stile codice ECS |
| `php_analysis.yml` | Psalm, validazione schema Doctrine, controllo sicurezza |
| `behat.yml` | Test end-to-end Behat |