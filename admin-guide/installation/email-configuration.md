# Ρύθμιση Email

Το Chamilo διαχειρίζεται πλέον τη ρύθμιση αποστολής email από τον πίνακα διαχείρισης, στην ενότητα ρυθμίσεων πλατφόρμας (υπάρχει ειδική καταχώριση για τα email). Τα email αποστέλλονται για δημιουργίες λογαριασμών, επαναφορά κωδικών πρόσβασης, ειδοποιήσεις μαθημάτων, ειδοποιήσεις μηνυμάτων και άλλα γεγονότα της πλατφόρμας. Η παράδοση email ρυθμίζεται μέσω της ρύθμισης `MAILER_DSN`.

## Ρύθμιση

Ορίστε την επιλογή `Mail DSN` στην ενότητα /admin/settings/mail. Η μορφή εξαρτάται από το email transport σας.

### SMTP

Η πιο συνηθισμένη ρύθμιση, κατάλληλη για οποιονδήποτε SMTP server:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Αντικαταστήστε το `username`, `password` και τον host με τα διαπιστευτήρια του SMTP server σας.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Το Symfony Amazon Mailer transport είναι ενσωματωμένο στο Chamilo. Δεν απαιτείται επιπλέον εγκατάσταση.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Το Symfony Mailjet transport είναι ενσωματωμένο στο Chamilo. Δεν απαιτείται επιπλέον εγκατάσταση.

### Brevo (πρώην Sendinblue)

```bash
brevo+api://API_KEY@default
```

Το Symfony Brevo transport είναι ενσωματωμένο στο Chamilo. Δεν απαιτείται επιπλέον εγκατάσταση.

### Gmail (Ανάπτυξη/Μικρές Πλατφόρμες)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Χρησιμοποιήστε App Password, όχι τον κανονικό κωδικό Gmail. Αυτό είναι κατάλληλο μόνο για μικρές πλατφόρμες ή ανάπτυξη, καθώς το Gmail έχει όρια αποστολής.

## Ρυθμίσεις Email Πλατφόρμας

Εκτός από το transport, ρυθμίστε την ταυτότητα αποστολέα στην ίδια σελίδα:

| Ρύθμιση | Περιγραφή |
|---------|-------------|
| **Αποστολή όλων των e-mails ως προερχόμενα από αυτό το (οργανωτικό) όνομα** | Το όνομα εμφάνισης που σχετίζεται με τα email του συστήματος. |
| **Αποστολή όλων των e-mails από αυτή τη διεύθυνση e-mail** | Η διεύθυνση "From" για όλα τα email του συστήματος. Πρέπει να είναι έγκυρη διεύθυνση που γίνεται αποδεκτή από το mail transport σας. Συνιστούμε τη χρήση διεύθυνσης "no reply" όπως `no-reply@yourdomain.com` για να αποφύγετε άσκοπες απαντήσεις σε αυτοματοποιημένα e-mails. |

## Δοκιμή Παράδοσης Email

Μετά τη ρύθμιση του `MAILER_DSN`, δοκιμάστε αν τα email παραδίδονται: Πηγαίνετε στο *Administration* > *System* > *E-mail tester*, καθορίστε παραλήπτη, θέμα και σώμα e-mail και κάντε κλικ στο **Send test email**.

Αν η εντολή ολοκληρωθεί χωρίς σφάλματα αλλά το email δεν ληφθεί:

1. Ελέγξτε τον φάκελο spam/junk του παραλήπτη.
2. Επαληθεύστε ότι ο τομέας αποστολής σας έχει σωστά DNS records (SPF, DKIM, DMARC).
3. Ελέγξτε τα logs αποστολής του παρόχου email σας για bounces ή απορρίψεις.
4. Ελέγξτε το log του Chamilo στο `var/log/prod.log` για σφάλματα mailer.
5. Στις ρυθμίσεις διαμόρφωσης E-mail, ενεργοποιήστε *Mail: Debug* (δεν είναι διαθέσιμο στο 2.0, θα είναι σύντομα).

## Πειραματικό: Ουρά Email (Ασύγχρονη Παράδοση)

Προεπιλογή, τα email αποστέλλονται συγχρονισμένα κατά το web request. Για καλύτερη απόδοση, ρυθμίστε ασύγχρονη παράδοση χρησιμοποιώντας Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Με ασύγχρονη παράδοση, τα email μπαίνουν σε ουρά και αποστέλλονται από background worker:

```bash
php bin/console messenger:consume async
```

Εκτελέστε το ως system service (π.χ. μέσω systemd ή supervisord) ώστε να παραμένει ενεργό.

## Συμβουλές

* **Χρησιμοποιήστε αποκλειστική υπηρεσία email** (SES, Mailjet, Brevo) για πλατφόρμες παραγωγής. Άμεση SMTP στον δικό σας mail server απαιτεί προσεκτική ρύθμιση για αποφυγή προβλημάτων παραδοσιμότητας.
* **Ρυθμίστε SPF, DKIM και DMARC** DNS records για τον τομέα αποστολής σας για να μεγιστοποιήσετε τα ποσοστά παράδοσης και να αποτρέψετε τα email από το να χαρακτηριστούν ως spam. Μπορείτε επίσης να ρυθμίσετε DKIM headers από τη σελίδα ρυθμίσεων e-mail.
* **Χρησιμοποιήστε ασύγχρονη παράδοση** σε πλατφόρμες με περισσότερους από λίγους δεκάδες ενεργούς χρήστες -- η συγχρονισμένη αποστολή email μπορεί να επιβραδύνει αισθητά τα web requests.