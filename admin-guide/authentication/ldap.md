# LDAP

Το Chamilo μπορεί να πιστοποιεί χρήστες έναντι ενός διακομιστή LDAP, συμπεριλαμβανομένου του Microsoft Active Directory. Το LDAP ρυθμίζεται στο `config/authentication.yaml`.

## Ρύθμιση

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind και αναζήτηση

Δύο προσεγγίσεις για τον εντοπισμό του χρήστη στον κατάλογο:

**Direct bind** — κατασκευάζει το DN απευθείας από το όνομα χρήστη:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — αναζητά πρώτα τον κατάλογο με λογαριασμό υπηρεσίας και στη συνέχεια συνδέεται ως ο εντοπισθείς χρήστης:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Για το Active Directory, χρησιμοποιήστε `sAMAccountName` ως `uid_key` και προσαρμόστε το `query_string` σε `(sAMAccountName=%s)`.

### Χαρτογράφηση χαρακτηριστικών

Χαρτογραφήστε χαρακτηριστικά LDAP σε πεδία χρήστη Chamilo κάτω από `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

Τα `firstname`, `lastname` και `email` είναι υποχρεωτικά. Ο χρήστης ταιριάζει με υπάρχοντα λογαριασμό Chamilo μέσω email ή ονόματος χρήστη· αν δεν βρεθεί ταίριασμα και το `allow_create_new_users` είναι true, δημιουργείται νέος λογαριασμός.

## Συμβουλές

* **Χρησιμοποιήστε LDAPS σε παραγωγή** — αλλάξτε το `ldap://` σε `ldaps://` (θύρα 636) για κρυπτογραφημένες συνδέσεις.
* **Λογαριασμός υπηρεσίας** — ο λογαριασμός search bind χρειάζεται μόνο πρόσβαση ανάγνωσης σε καταχωρήσεις χρηστών.
* **Δοκιμάστε πρώτα** — ελέγξτε το connection string και την ερώτηση σας με `ldapsearch` πριν ρυθμίσετε το Chamilo.
* **`force_as_login_method: true`** — κρύβει άλλες μεθόδους σύνδεσης και αναγκάζει όλους τους χρήστες μέσω LDAP. Αφήστε το `false` κατά τις δοκιμές ώστε να μπορείτε ακόμα να συνδεθείτε ως διαχειριστής μέσω της τυπικής φόρμας.

Για την πλήρη αναφορά παραμέτρων, δείτε το [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).