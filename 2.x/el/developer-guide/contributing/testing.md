# Δοκιμές

## Δοκιμές PHP

Το Chamilo χρησιμοποιεί το **PHPUnit** για δοκιμές backend.

### Ρύθμιση Βάσης Δεδομένων Δοκιμών

Οι δοκιμές απαιτούν μια ειδική βάση δεδομένων. Δημιουργήστε το `.env.test.local` με τα διαπιστευτήρια της βάσης δεδομένων δοκιμών σας:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Στη συνέχεια, αρχικοποιήστε τη βάση δεδομένων δοκιμών:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Για επαναφορά μετά από αλλαγές σχήματος:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Εκτέλεση Δοκιμών

```bash
# Εκτέλεση όλων των δοκιμών
php bin/phpunit

# Εκτέλεση συγκεκριμένου αρχείου δοκιμής
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Εκτέλεση δοκιμών με αναφορά κάλυψης HTML
php bin/phpunit --coverage-html var/coverage
```

### Τοποθεσία Δοκιμών

Οι δοκιμές βρίσκονται στον κατάλογο `tests/`:

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
├── fixtures/            # Alice fixture files
├── AbstractApiTest.php  # Base class for API tests
└── ChamiloTestTrait.php # Shared test helpers
```

### Τύποι Δοκιμών

* **Δοκιμές μονάδας/ενσωμάτωσης** — Δοκιμές PHPUnit στο `CoreBundle/` και `CourseBundle/`· οι περισσότερες αλληλεπιδρούν με πραγματική βάση δεδομένων (μέσω `dama/doctrine-test-bundle`)
* **Λειτουργικές (API) δοκιμές** — Επεκτείνουν το `AbstractApiTest` και δοκιμάζουν endpoints HTTP end-to-end
* **Δοκιμές Behat** — Δοκιμές αποδοχής επιπέδου προγράμματος περιήγησης στο `tests/behat/features/` (δείτε παρακάτω)

## Δοκιμές Behat (End-to-End)

Το Chamilo διαθέτει σουίτα δοκιμών Behat για δοκιμές αποδοχής επιπέδου προγράμματος περιήγησης. Απαιτεί μια εκτελόμενη εγκατάσταση Chamilo, Chrome και ChromeDriver.

```bash
# Από τον κατάλογο tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Ή εκτέλεση όλων των χαρακτηριστικών:
../../vendor/behat/behat/bin/behat
```

Ρυθμίστε τη βασική διεύθυνση URL στο `tests/behat/behat.yml` πριν την εκτέλεση.

## Ελέγχοι Frontend

```bash
# Έλεγχος σύνταξης JavaScript/Vue (ESLint με Prettier)
yarn eslint assets/vue/

# Έλεγχος τύπων TypeScript
yarn tsc --noEmit

# Δημιουργία assets παραγωγής (επαληθεύει ότι ολόκληρο το build μεταγλωττίζεται)
yarn build
```

## Ποιότητα Κώδικα PHP

Το Chamilo χρησιμοποιεί **ECS** (Easy Coding Standard), **PHPStan** και **Psalm** για ποιότητα κώδικα. Υπάρχουν διαθέσιμα συντομεύματα Composer για κάθε εργαλείο:

```bash
# Έλεγχος στυλ κώδικα (ECS — Easy Coding Standard)
composer phpcs
# ή απευθείας:
vendor/bin/ecs check

# Αυτόματη διόρθωση παραβάσεων στυλ κώδικα
composer phpcs-fix
# ή απευθείας:
vendor/bin/ecs check --fix

# Στατική ανάλυση με PHPStan (επίπεδο 5, σαρώνει src/ και tests/)
composer phpstan
# ή απευθείας:
vendor/bin/phpstan analyse

# Στατική ανάλυση με Psalm
composer psalm
# ή απευθείας:
vendor/bin/psalm --show-info=false
```

Σημείωση: δεν υπάρχει `php-cs-fixer` σε αυτό το έργο. Το ECS (`symplify/easy-coding-standard`) είναι το εργαλείο στυλ κώδικα.

## Συνεχής Ενσωμάτωση

Οι αιτήσεις έλξης ελέγχονται αυτόματα από τέσσερις ροές εργασιών GitHub Actions:

| Ροή εργασιών | Τι εκτελεί |
|--------------|------------|
| `phpunit.yml` | Σουίτα δοκιμών PHPUnit |
| `format_code.yml` | Έλεγχος στυλ κώδικα ECS |
| `php_analysis.yml` | Psalm, επικύρωση σχήματος Doctrine, ελεγκτής ασφαλείας |
| `behat.yml` | Δοκιμές Behat end-to-end |