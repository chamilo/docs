# Ρύθμιση Ανάπτυξης

## Προαπαιτούμενα

* PHP 8.3, 8.4 ή 8.5 με επεκτάσεις: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js και npm (ή Yarn — το έργο χρησιμοποιεί Yarn 4· δείτε το `package.json` για την ακριβή καρφιτσωμένη έκδοση)
* MySQL 5.7+ ή MariaDB 10.11+
* Git

## Βήματα Εγκατάστασης

### 1. Κλωνοποίηση του Αποθετηρίου

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Εγκατάσταση Εξαρτήσεων PHP

```bash
composer install
```

### 3. Ρύθμιση Περιβάλλοντος

Το αποθετήριο περιλαμβάνει το `.env.dist` ως αναφορά. Δημιουργήστε ένα κενό αρχείο `.env` το οποίο θα συμπληρώσει ο διαδικτυακός εγκαταστάτης — η διατήρησή του κενού διασφαλίζει ότι οι αναβαθμίσεις δεν θα αντικαταστήσουν ποτέ την τοπική σας διαμόρφωση:

```bash
touch .env
```

Στη συνέχεια κάντε τα `.env` και `config/` εγγράψιμα από τον διακομιστή ιστού ώστε ο εγκαταστάτης να μπορέσει να γράψει την τοπική σας διαμόρφωση:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Εγκατάσταση Εξαρτήσεων Frontend και Δόμηση

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Εκκίνηση του Διακομιστή Ανάπτυξης

```bash
symfony server:start
```

Ή χρησιμοποιήστε Apache/Nginx με κατάδειξη στον κατάλογο `public/`.

### 6. Ρύθμιση της Βάσης Δεδομένων

Εκτελέστε τον διαδικτυακό οδηγό εγκατάστασης μεταβαίνοντας στη διεύθυνση URL του Chamilo σε ένα πρόγραμμα περιήγησης.

### 7. Δημιουργία Κλειδιών JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Ασφάλιση του συστήματός σας

Το αρχείο `.env` και ο κατάλογος `config/` χρειάζεται να είναι εγγράψιμα μόνο κατά τη διάρκεια της εγκατάστασης. Ασφαλίστε τα στη συνέχεια:

```bash
sudo chown -R root: .env config/
```

Ο κατάλογος `var/` πρέπει να παραμείνει εγγράψιμος από τον διακομιστή ιστού.


## Εντολές Δόμησης

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Δόμηση frontend για ανάπτυξη |
| `yarn encore dev --watch` | Δόμηση και παρακολούθηση αλλαγών |
| `yarn encore production` | Δόμηση βελτιστοποιημένη για παραγωγή |
| `php bin/console cache:clear` | Εκκαθάριση της προσωρινής μνήμης Symfony |

## Συμβουλές Ανάπτυξης

* Ορίστε `APP_ENV=dev` και `APP_DEBUG=1` στο `.env` για λεπτομερή μηνύματα σφάλματος
* Η γραμμή εργαλείων εντοπισμού σφαλμάτων του Symfony εμφανίζεται στο κάτω μέρος των σελίδων σε λειτουργία ανάπτυξης
* Η τεκμηρίωση API είναι διαθέσιμη στο `/api` όταν `APP_ENABLE_API_ENTRYPOINT=true` (μετά από εκκαθάριση προσωρινής μνήμης — δείτε [Διαμόρφωση](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Χρησιμοποιήστε `yarn encore dev --watch` για αυτόματη αναδόμηση των αλλαγών στο frontend