# SCIM

Το **SCIM** (System for Cross-domain Identity Management) αυτοματοποιεί την παροχή χρηστών — δημιουργία, ενημέρωση και απενεργοποίηση λογαριασμών Chamilo βάσει αλλαγών στον πάροχο ταυτότητας. Σε αντίθεση με το OAuth2 ή το LDAP, το SCIM διαχειρίζεται την παροχή, όχι τη σύνδεση.

| Σενάριο | Ενέργεια SCIM |
|----------|-------------|
| Ένας νέος υπάλληλος προσλαμβάνεται | Δημιουργεί λογαριασμό Chamilo |
| Το όνομα ή ο ρόλος ενός υπαλλήλου αλλάζει | Ενημερώνει τον λογαριασμό Chamilo |
| Ένας υπάλληλος αποχωρεί | Απενεργοποιεί ή διαγράφει τον λογαριασμό Chamilo |

## Configuration

### 1. Set the SCIM token

Στο αρχείο `.env` (ή `.env.local`), ορίστε ένα ασφαλές τυχαίο διακριτικό:

```
SCIM_TOKEN=your-secure-random-token
```

Αυτό το διακριτικό χρησιμοποιείται από τον πάροχο ταυτότητας για την πιστοποίηση των αιτημάτων του προς τα τελικά σημεία SCIM του Chamilo.

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Καθαρίστε και προθερμάνετε την προσωρινή μνήμη μετά την επεξεργασία:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

Στον πάροχο ταυτότητας (Azure AD, Okta κ.λπ.):

1. Προσθέστε το Chamilo ως εφαρμογή SCIM
2. Ορίστε τη βασική διεύθυνση URL του SCIM σε `https://your-chamilo-url/scim/v2/`
3. Εισαγάγετε το διακριτικό από το βήμα 1 ως bearer token
4. Αντιστοιχίστε τα χαρακτηριστικά του παρόχου στα τυπικά πεδία SCIM (userName, name.givenName, name.familyName, emails)
5. Ενεργοποιήστε την αυτόματη παροχή

## SCIM endpoints

Το Chamilo υλοποιεί το SCIM 2.0:

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List users |
| `/scim/v2/Users` | POST | Create a user |
| `/scim/v2/Users/{id}` | GET | Get a user |
| `/scim/v2/Users/{id}` | PUT | Replace a user |
| `/scim/v2/Users/{id}` | PATCH | Update a user |
| `/scim/v2/Users/{id}` | DELETE | Remove a user |

## Tips

* **Ξεκινήστε με μια ομάδα δοκιμής** — παρέχετε ένα μικρό σύνολο χρηστών πριν ενεργοποιήσετε το SCIM για ολόκληρο τον οργανισμό.
* **Συνδυάστε με OAuth2** — μια συνηθισμένη διάταξη χρησιμοποιεί Azure AD OAuth2 για σύνδεση και Azure AD SCIM για παροχή.
* **Παρακολουθήστε τα αρχεία καταγραφής** — ελέγξτε τόσο το Chamilo (`var/log/`) όσο και τα αρχεία καταγραφής παροχής του παρόχου ταυτότητας για σφάλματα.