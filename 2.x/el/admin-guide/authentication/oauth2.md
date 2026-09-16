# OAuth2

Η πιστοποίηση OAuth2 ρυθμίζεται στο `config/authentication.yaml`. Το Chamilo περιλαμβάνει ενσωματωμένη υποστήριξη για Azure AD, Keycloak, Facebook και οποιονδήποτε γενικό πάροχο συμβατό με OAuth2.

## Βήμα 1 — Εγγραφή του Chamilo στον πάροχο ταυτότητας

Δημιουργήστε μια εφαρμογή στον πίνακα διαχείρισης του παρόχου σας και ορίστε το **redirect URI** σε:

```
https://your-chamilo-url/connect/<provider>/check
```

Όπου το `<provider>` είναι `azure`, `keycloak`, `facebook` ή το όνομα που δίνετε σε έναν γενικό πάροχο. Σημειώστε το **Client ID** και το **Client Secret**.

## Βήμα 2 — Ρύθμιση του authentication.yaml

Ενεργοποιήστε τον πάροχο και παρέχετε τα διαπιστευτήριά του. Όλοι οι πάροχοι μοιράζονται αυτά τα κοινά κλειδιά:

| Κλειδί | Περιγραφή |
|--------|-----------|
| `enabled` | `true` για ενεργοποίηση |
| `title` | Ετικέτα που εμφανίζεται στο κουμπί σύνδεσης |
| `client_id` | Από τον πάροχο ταυτότητας |
| `client_secret` | Από τον πάροχο ταυτότητας |
| `allow_create_new_users` | Αυτόματη δημιουργία λογαριασμού Chamilo στην πρώτη σύνδεση |
| `allow_update_user_info` | Συγχρονισμός δεδομένων χρήστη σε κάθε σύνδεση |
| `force_as_login_method` | Απενεργοποίηση άλλων μεθόδων και επιβολή αυτής |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Το Azure υποστηρίζει επίσης χαρτογράφηση ρόλων βασισμένη σε ομάδες (χαρτογράφηση ID ομάδων Azure σε ρόλους Chamilo όπως δάσκαλος ή διαχειριστής), εντολές συγχρονισμού delta χρηστών και πιστοποίηση με πιστοποιητικό αντί για client secret. Δείτε το [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) για αυτές τις επιλογές.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Γενικό OAuth2

Χρησιμοποιήστε αυτό για Google, GitLab ή οποιονδήποτε πάροχο συμβατό με OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Η χαρτογράφηση πεδίων (πώς τα χαρακτηριστικά του παρόχου χαρτογραφούνται στα `firstname`, `lastname`, `email` κ.λπ. του Chamilo) και η χαρτογράφηση ρόλων είναι επίσης ρυθμιζόμενες. Δείτε το [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) για την πλήρη λίστα κλειδιών χαρτογράφησης.

## Βήμα 3 — Εκκαθάριση cache και δοκιμή

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Αποσυνδεθείτε από το Chamilo. Το κουμπί του ρυθμισμένου παρόχου πρέπει να εμφανίζεται στη σελίδα σύνδεσης. Δοκιμάστε με έναν ειδικό λογαριασμό πριν την εφαρμογή σε όλους τους χρήστες.

## Συμβουλές

* Διατηρήστε ενεργή τη standard φόρμα σύνδεσης ώστε οι διαχειριστές να μπορούν πάντα να συνδέονται αν υπάρξουν προβλήματα με το OAuth2.
* Κατά τη χρήση Azure με υπάρχοντες χρήστες, ρυθμίστε το `existing_user_verification_order` για να ελέγξετε πώς το Chamilo ταιριάζει τους εισερχόμενους χρήστες με υπάρχοντες λογαριασμούς.
* Η ανάθεση ρόλου προεπιλογής είναι μαθητής· χρησιμοποιήστε χαρτογράφηση ομάδας για αυτόματη προαγωγή χρηστών σε ρόλους δασκάλου ή διαχειριστή.