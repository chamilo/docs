# OAuth2

Η πιστοποίηση OAuth2 ρυθμίζεται στο `config/authentication.yaml`. Το Chamilo περιλαμβάνει ενσωματωμένη υποστήριξη για Azure AD, Keycloak, Facebook και οποιονδήποτε γενικό πάροχο συμβατό με OAuth2.

## Step 1 — Register Chamilo in your identity provider

Δημιουργήστε μια εφαρμογή στον πίνακα διαχείρισης του παρόχου σας και ορίστε το **redirect URI** σε:

```
https://your-chamilo-url/connect/<provider>/check
```

Όπου `<provider>` είναι `azure`, `keycloak`, `facebook` ή το όνομα που δίνετε σε έναν γενικό πάροχο. Σημειώστε το **Client ID** και το **Client Secret**.

## Step 2 — Configure authentication.yaml

Ενεργοποιήστε τον πάροχο και δώστε τα διαπιστευτήριά του. Όλοι οι πάροχοι μοιράζονται αυτά τα κοινά κλειδιά:

| Key | Description |
|-----|-------------|
| `enabled` | `true` για ενεργοποίηση |
| `title` | Ετικέτα που εμφανίζεται στο κουμπί σύνδεσης |
| `client_id` | Από τον πάροχο ταυτότητας |
| `client_secret` | Από τον πάροχο ταυτότητας |
| `allow_create_new_users` | Αυτόματη δημιουργία λογαριασμού Chamilo στην πρώτη σύνδεση |
| `allow_update_user_info` | Συγχρονισμός δεδομένων χρήστη σε κάθε σύνδεση |
| `force_as_login_method` | Απόκρυψη των άλλων μεθόδων και εμφάνιση μόνο του κουμπιού αυτού του παρόχου |
| `force_redirect` | Αυτόματη αποστολή ανώνυμου επισκέπτη σε αυτόν τον πάροχο, χωρίς κουμπί προς κλικ |
| `skip_force_redirect_in` | Λίστα τμημάτων URL που το `force_redirect` αφήνει ανέπαφα |

### Azure AD (Microsoft Entra ID)

Το Azure διαθέτει δική του ειδική σελίδα που καλύπτει την καταχώριση εφαρμογής, την αντιστοίχιση ρόλων βάσει ομάδων, την πιστοποίηση με πιστοποιητικό και τις εντολές συγχρονισμού παροχής λογαριασμών — δείτε [Azure Entra ID](azure-entra-id.md).

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

### Generic OAuth2

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

Η αντιστοίχιση πεδίων (πώς τα χαρακτηριστικά του παρόχου αντιστοιχίζονται στα `firstname`, `lastname`, `email` κ.λπ. του Chamilo) και η αντιστοίχιση ρόλων είναι επίσης ρυθμιζόμενες. Δείτε το [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) για την πλήρη λίστα κλειδιών αντιστοίχισης.

## Optional — Send every visitor to the provider automatically

Δύο κλειδιά ελέγχουν πόσο από τη σελίδα σύνδεσης βλέπει ακόμη ο επισκέπτης. Είναι ανεξάρτητα και καλύπτουν διαφορετικές ανάγκες:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | Η σελίδα σύνδεσης, περιορισμένη στο κουμπί αυτού του παρόχου. Ο επισκέπτης το πατάει. |
| `force_redirect: true` | Καμία σελίδα σύνδεσης. Το πρόγραμμα περιήγησης πηγαίνει μόνο του στον πάροχο. |

Χρησιμοποιήστε το `force_redirect` όταν ο πάροχος ταυτότητας κατέχει κάθε λογαριασμό και η τοπική φόρμα σύνδεσης δεν έχει λόγο ύπαρξης:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Μόνο ένας πάροχος μπορεί να επιβάλει την ανακατεύθυνση. Αν πολλοί την δηλώνουν, υπερισχύει ο πρώτος ενεργοποιημένος. Το LDAP δεν μπορεί να την δηλώσει, επειδή πιστοποιεί μέσω της τοπικής φόρμας.

Η ανακατεύθυνση ισχύει για μια σελίδα που εμφανίζει το πρόγραμμα περιήγησης και για τίποτα άλλο. Αυτά τα αιτήματα παραμένουν πάντα εκεί που είναι:

* Κλήση API, SCIM, MCP ή XHR, που δεν μπορεί να ακολουθήσει χειραψία προορισμένη για πρόγραμμα περιήγησης.
* Εικόνα, φύλλο στυλ ή λήψη αρχείου.
* Οποιαδήποτε εγγραφή (POST, PUT, DELETE), επειδή το πρόγραμμα περιήγησης επαναλαμβάνει μια ανακατευθυνόμενη εγγραφή ως GET και απορρίπτει το σώμα.
* Η ίδια η χειραψία του παρόχου (`/connect/...`) και το `/logout`, που διαφορετικά θα δημιουργούσαν ατέρμονο βρόχο.
* Επισκέπτης που έχει ήδη συνεδρία, συμπεριλαμβανομένου του ανώνυμου λογαριασμού δημόσιου μαθήματος.

Προσθέστε ένα τμήμα URL στο `skip_force_redirect_in` για κάθε δημόσια περιοχή που πρέπει να παραμένει ανοιχτή, όπως ένας κατάλογος μαθημάτων.

### Η έξοδος κινδύνου

Ένας μη προσβάσιμος πάροχος θα κλείδωνε κάθε λογαριασμό, συμπεριλαμβανομένου του τοπικού διαχειριστή. Προσθέστε `skipForcedRedirect=1` σε οποιοδήποτε URL για να φτάσετε ούτως ή άλλως στη φόρμα τοπικής σύνδεσης:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Η επιλογή παραμένει στη συνεδρία, ώστε οι σελίδες που ακολουθούν να συνεχίζουν να εμφανίζουν τη φόρμα. Ακυρώνει επίσης το `force_as_login_method` για εκείνη τη συνεδρία, γεγονός που επαναφέρει κάθε μέθοδο σύνδεσης στη σελίδα. Για να επιστρέψετε την πλατφόρμα στον πάροχο, χρησιμοποιήστε `?skipForcedRedirect=0`, ή κλείστε τη συνεδρία του προγράμματος περιήγησης.

Η παράμετρος ανήκει αποκλειστικά στο `force_redirect`. Όσο κανένας πάροχος δεν δηλώνει αυτό το κλειδί, η παράμετρος δεν κάνει τίποτα απολύτως, και το `force_as_login_method` διατηρεί το μοναδικό του κουμπί.

Κρατήστε αυτό το URL μαζί με τις σημειώσεις ανάκτησής σας. Δοκιμάστε το πριν ενεργοποιήσετε το `force_redirect` σε παραγωγή.

## Βήμα 3 — Εκκαθάριση cache και δοκιμή

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Αποσυνδεθείτε από το Chamilo. Το κουμπί του ρυθμισμένου παρόχου θα πρέπει να εμφανίζεται στη σελίδα σύνδεσης. Δοκιμάστε με έναν αποκλειστικό λογαριασμό πριν την ανάπτυξη σε όλους τους χρήστες.

## Συμβουλές

* Διατηρήστε ενεργοποιημένη την τυπική φόρμα σύνδεσης ώστε οι διαχειριστές να μπορούν πάντα να συνδεθούν αν το OAuth2 παρουσιάσει προβλήματα. Αν ορίσετε `force_redirect`, μάθετε αντί αυτού το URL `?skipForcedRedirect=1`: είναι ο μοναδικός τρόπος επιστροφής σε εκείνη τη φόρμα.
* Η ανάθεση ρόλων προεπιλέγεται σε φοιτητή· χρησιμοποιήστε αντιστοίχιση ομάδων (Azure) για να προάγετε αυτόματα χρήστες σε ρόλους εκπαιδευτή ή διαχειριστή — δείτε το [Azure Entra ID](azure-entra-id.md) για λεπτομέρειες σχετικά με αυτό και με την αντιστοίχιση εισερχόμενων χρηστών σε υπάρχοντες λογαριασμούς.