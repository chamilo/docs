# Authentication

Το Chamilo υποστηρίζει πολλαπλές μεθόδους αυθεντικοποίησης, από το ενσωματωμένο σύστημα ονόματος χρήστη/κωδικού πρόσβασης έως λύσεις ενιαίας σύνδεσης (single sign-on) επιχειρησιακού επιπέδου.

## Configuration file

Όλες οι εξωτερικές μέθοδοι αυθεντικοποίησης ρυθμίζονται στο `config/authentication.yaml`. Ένα πρότυπο παρέχεται στο `config/authentication.dist.yaml`. Η γενική δομή είναι:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Μετά την επεξεργασία του αρχείου, καθαρίστε και προθερμάνετε την cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Τα κουμπιά εξωτερικής σύνδεσης εμφανίζονται στη σελίδα σύνδεσης μετά την ανανέωση της cache.

## Supported methods

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook και γενικοί πάροχοι OAuth2
* **[Azure Entra ID](azure-entra-id.md)** — Αναλυτική ρύθμιση Azure/Entra ID: καταχώριση εφαρμογής, αντιστοίχιση ρόλων βάσει ομάδων, αυθεντικοποίηση με πιστοποιητικό και εντολές συγχρονισμού χρηστών/ομάδων
* **[LDAP](ldap.md)** — Αυθεντικοποίηση έναντι διακομιστή LDAP ή Active Directory
* **[CAS](cas.md)** — Central Authentication Service (παλαιού τύπου, μη λειτουργικό στην έκδοση 3.x)
* **[SCIM](scim.md)** — Αυτοματοποιημένη παροχή χρηστών από εξωτερικούς παρόχους ταυτότητας
* **[SSO Configuration](sso-configuration.md)** — Αντιμετώπιση προβλημάτων και σημειώσεις μεταξύ μεθόδων

## Default authentication

Εξ ορισμού, το Chamilo χρησιμοποιεί το δικό του εσωτερικό σύστημα — οι χρήστες συνδέονται με όνομα χρήστη και κωδικό πρόσβασης που αποθηκεύονται στη βάση δεδομένων του Chamilo. Οι εξωτερικές μέθοδοι είναι προσθετικές: η τυπική φόρμα σύνδεσης παραμένει διαθέσιμη παράλληλα με οποιουσδήποτε ρυθμισμένους παρόχους.

## Further reference

Για πλήρη αναφορά παραμέτρων και προηγμένα σενάρια, δείτε τη [σελίδα wiki External Authentication configuration](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).