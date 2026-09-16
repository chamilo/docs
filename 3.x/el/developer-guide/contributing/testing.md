# Δοκιμές

## Δοκιμές PHP

Το Chamilo χρησιμοποιεί **PHPUnit** για τις δοκιμές του backend.

### Ρύθμιση βάσης δεδομένων δοκιμών

Οι δοκιμές απαιτούν αποκλειστική βάση δεδομένων. Δημιουργήστε το `.env.test.local` με τα διαπιστευτήρια της βάσης δεδομένων δοκιμών:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Στη συνέχεια αρχικοποιήστε τη βάση δεδομένων δοκιμών:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Για επαναφορά μετά από αλλαγές στο σχήμα:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Εκτέλεση δοκιμών

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### Τοποθεσία δοκιμών

Οι δοκιμές βρίσκονται στον κατάλογο `tests/`, ο οποίος δεν περιλαμβάνεται στα συσκευασμένα πακέτα λήψης του Chamilo — παρέχεται μόνο με `git clone`. Τα `CoreBundle/` και `CourseBundle/` αντικατοπτρίζουν τη διάταξη υποκαταλόγων των `src/CoreBundle/` και `src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

Δείτε τη [Δομή έργου](../getting-started/project-structure.md) για την πλήρη διάταξη του `tests/`, συμπεριλαμβανομένων των φακέλων που δεν ανήκουν στη σουίτα δοκιμών (`datafiller/`, `history/`, `procedures/`, `scripts/`).

### Τύποι δοκιμών

* **Δοκιμές μονάδας/ολοκλήρωσης** — δοκιμές PHPUnit στα `CoreBundle/` και `CourseBundle/`· οι περισσότερες χτυπούν πραγματική βάση δεδομένων (μέσω του `dama/doctrine-test-bundle`)
* **Λειτουργικές δοκιμές (API)** — επεκτείνουν το `AbstractApiTest` και δοκιμάζουν τα HTTP endpoints από άκρο σε άκρο
* **Δοκιμές Playwright** — δοκιμές αποδοχής σε επίπεδο προγράμματος περιήγησης στο `tests/playwright/` (βλ. παρακάτω)

## Δοκιμές Playwright (από άκρο σε άκρο)

Το Chamilo χρησιμοποιεί το [Playwright](https://playwright.dev/), οδηγούμενο μέσω του [playwright-bdd](https://vitalets.github.io/playwright-bdd/) ώστε τα σενάρια να παραμένουν απλό Gherkin. Αυτό αντικατέστησε την παλιά σουίτα Behat· τα σενάρια του Behat παραμένουν στο ιστορικό του git και αξίζει να τα συμβουλεύεστε όταν προσθέτετε κάλυψη για μια περιοχή που δοκίμαζε κάποτε (`git ls-tree -r --name-only 98c77757ea6 tests/behat`), αλλά να τα αντιμετωπίζετε μόνο ως ένδειξη ποιες ροές έχουν σημασία — οι επιλογείς έχουν σαπίσει, οπότε επαληθεύστε έναντι της ζωντανής εφαρμογής.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

Πριν την πρώτη εκτέλεση, σπείρετε τα fixtures που τα περισσότερα σενάρια υποθέτουν ότι υπάρχουν, με αυτή τη σειρά:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

Στη συνέχεια εκτελέστε τη σουίτα (τα seeds και το σενάριο του εγκαταστάτη εξαιρούνται από αυτήν):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

Το `yarn test:playwright:install` καλύπτει τον ίδιο τον διαδικτυακό εγκαταστάτη. Αναδημιουργεί τη βάση δεδομένων, επομένως είναι μόνο για CI — μην το εκτελείτε ποτέ έναντι εγκατάστασης που σας ενδιαφέρει.

Μετά την επεξεργασία ενός αρχείου `.feature` ή οτιδήποτε κάτω από το `tests/playwright/steps/`, αναδημιουργήστε τα μεταγλωττισμένα specs πριν εμπιστευτείτε μια εκτέλεση:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## Έλεγχοι frontend

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## Ποιότητα κώδικα PHP

Το Chamilo χρησιμοποιεί **ECS** (Easy Coding Standard), **PHPStan** και **Psalm** για την ποιότητα κώδικα. Υπάρχουν διαθέσιμες συντομεύσεις Composer για το καθένα:

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

# ή απευθείας:
vendor/bin/psalm --show-info=false
```

Σημείωση: δεν υπάρχει `php-cs-fixer` σε αυτό το έργο. Το ECS (`symplify/easy-coding-standard`) είναι το εργαλείο στυλ κώδικα.

## Συνεχής ολοκλήρωση

Τα pull requests ελέγχονται αυτόματα από τέσσερα workflows του GitHub Actions:

| Workflow | Τι εκτελεί |
|----------|-------------|
| `phpunit.yml` | Σουίτα δοκιμών PHPUnit |
| `format_code.yml` | Έλεγχος στυλ κώδικα ECS |
| `php_analysis.yml` | Psalm, επικύρωση σχήματος Doctrine, έλεγχος απαιτήσεων εξαρτήσεων |
| `playwright.yml` | Δοκιμές end-to-end Playwright (εγκαθιστά το Chamilo μέσω του web installer και στη συνέχεια εκτελεί τη σουίτα) |