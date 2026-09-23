# Testaus

## PHP-testaus

Chamilo käyttää **PHPUnit**-kehystä taustajärjestelmän testaukseen.

### Testitietokannan asetus

Testit edellyttävät erillistä tietokantaa. Luo `.env.test.local` testitietokannan tunnuksilla:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Alusta sitten testitietokanta:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Palauta skeeman muutosten jälkeen:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Testien suorittaminen

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Testien sijainti

Testit ovat hakemistossa `tests/`, jota ei sisällytetä pakattuihin Chamilo-latauksiin — se tulee vain `git clone` -kloonauksen mukana. `CoreBundle/` ja `CourseBundle/` peilaavat alihakemistorakennetta hakemistoissa `src/CoreBundle/` ja `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Katso [Projektin rakenne](../getting-started/project-structure.md) koko `tests/`-asettelusta, mukaan lukien testisarjaan kuulumattomat kansiot (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Testityypit

* **Yksikkö-/integraatiotestit** — PHPUnit-testit hakemistoissa `CoreBundle/` ja `CourseBundle/`; useimmat käyttävät oikeaa tietokantaa (paketin `dama/doctrine-test-bundle` kautta)
* **Toiminnalliset (API) testit** — Laajentavat luokkaa `AbstractApiTest` ja testaavat HTTP-päätepisteitä päästä päähän
* **Playwright-testit** — Selaintason hyväksymistestit hakemistossa `tests/playwright/` (ks. alla)

## Playwright-testit (päästä päähän)

Chamilo käyttää [Playwright](https://playwright.dev/)-kehystä, jota ohjataan [playwright-bdd](https://vitalets.github.io/playwright-bdd/)-kirjastolla, jotta skenaariot pysyvät pelkkänä Gherkin-kielenä. Tämä korvasi vanhan Behat-sarjan; Behatin skenaariot säilyvät git-historiassa, ja niihin kannattaa tutustua, kun lisätään kattavuutta alueelle, jota se aiemmin testasi (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), mutta käsittele niitä vain vihjeenä siitä, mitkä kulut ovat tärkeitä — valitsimet ovat vanhentuneet, joten varmista ne elävää sovellusta vasten.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Ennen ensimmäistä ajoa kylvä fixturet, joiden useimmat skenaariot olettavat olevan olemassa, tässä järjestyksessä:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Suorita sitten sarja (kylvöt ja asennusskenaario on jätetty sen ulkopuolelle):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` kattaa itse web-asennusohjelman. Se luo tietokannan uudelleen, joten se on vain CI:tä varten — älä koskaan suorita sitä asennusta vastaan, josta välität.

Kun olet muokannut `.feature`-tiedostoa tai mitä tahansa hakemistossa `tests/playwright/steps/`, regeneroi käännetyt specit ennen kuin luotat ajoon:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Käyttöliittymän tarkistukset

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP-koodin laatu

Chamilo käyttää **ECS**-työkalua (Easy Coding Standard), **PHPStan**-analyysiä ja **Psalm**-analyysiä koodin laatuun. Composer-oikopolut ovat saatavilla kullekin:

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

# tai suoraan:
vendor/bin/psalm --show-info=false
```

Huom: tässä projektissa ei ole `php-cs-fixer`-työkalua. ECS (`symplify/easy-coding-standard`) on koodityylin työkalu.

## Jatkuva integraatio

Pull requestit tarkistetaan automaattisesti neljällä GitHub Actions -työnkululla:

| Työnkulku | Mitä se suorittaa |
|----------|-------------|
| `phpunit.yml` | PHPUnit-testisarja |
| `format_code.yml` | ECS-koodityylitarkistus |
| `php_analysis.yml` | Psalm, Doctrine-skeeman validointi, riippuvuusvaatimusten tarkistin |
| `playwright.yml` | Playwrightin päästä päähän -testit (asentaa Chamilon web-asentajalla ja suorittaa sitten testisarjan) |