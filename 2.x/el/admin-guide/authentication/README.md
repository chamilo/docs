# Πιστοποίηση

Το Chamilo υποστηρίζει πολλαπλές μεθόδους πιστοποίησης, από το ενσωματωμένο σύστημα username/password έως λύσεις enterprise single sign-on.

## Αρχείο διαμόρφωσης

Όλες οι εξωτερικές μέθοδοι πιστοποίησης διαμορφώνονται στο `config/authentication.yaml`. Παρέχεται πρότυπο στο `config/authentication.dist.yaml`. Η γενική δομή είναι:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Μετά την επεξεργασία του αρχείου, καθαρίστε και θερμάνετε την cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Τα κουμπιά εξωτερικής σύνδεσης εμφανίζονται στη σελίδα σύνδεσης μετά την ανανέωση της cache.

## Υποστηριζόμενες μέθοδοι

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook, και γενικοί πάροχοι OAuth2
* **[LDAP](ldap.md)** — Πιστοποίηση έναντι εξυπηρετητή LDAP ή Active Directory
* **[CAS](cas.md)** — Central Authentication Service (παρωχημένη, μη λειτουργική στο 2.x)
* **[SCIM](scim.md)** — Αυτοματοποιημένη προμήθεια χρηστών από εξωτερικούς παρόχους ταυτότητας
* **[Διαμόρφωση SSO](sso-configuration.md)** — Αντιμετώπιση προβλημάτων και σημειώσεις διατομής μεθόδων

## Προεπιλεγμένη πιστοποίηση

Προεπιλογή, το Chamilo χρησιμοποιεί το δικό του εσωτερικό σύστημα — οι χρήστες συνδέονται με username και password αποθηκευμένα στη βάση δεδομένων του Chamilo. Οι εξωτερικές μέθοδοι είναι πρόσθετες: η τυπική φόρμα σύνδεσης παραμένει διαθέσιμη παράλληλα με οποιονδήποτε διαμορφωμένους παρόχους.

## Περαιτέρω αναφορά

Για πλήρη αναφορά παραμέτρων και προχωρημένα σενάρια, δείτε τη [σελίδα wiki διαμόρφωσης Εξωτερικής Πιστοποίησης](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).