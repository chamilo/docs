# Αποθήκευση Σύννεφου

Το Chamilo 2.0 υποστηρίζει backends αποθήκευσης σύννεφου για αρχεία που ανεβάζουν οι χρήστες μέσω του **Flysystem**, μιας βιβλιοθήκης αφαίρεσης συστήματος αρχείων PHP ενσωματωμένης στο Symfony. Αυτό σας επιτρέπει να αποθηκεύετε αρχεία σε υπηρεσίες σύννεφου αντί για (ή σε προσθήκη με) το τοπικό σύστημα αρχείων.

## Γιατί να Χρησιμοποιήσετε την Αποθήκευση Σύννεφου;

* **Κλιμάκωση** -- Η αποθήκευση σύννεφου αναπτύσσεται μαζί με την πλατφόρμα σας χωρίς διαχείριση χώρου δίσκου.
* **Αναπτύξεις πολλαπλών εξυπηρετητών** -- Όταν εκτελείτε πολλούς web servers πίσω από έναν load balancer, η αποθήκευση σύννεφου εξασφαλίζει ότι όλοι οι servers έχουν πρόσβαση στα ίδια αρχεία.
* **Ανθεκτικότητα** -- Οι πάροχοι σύννεφου προσφέρουν ενσωματωμένη επανεξασφάλιση και αντιγράφων ασφαλείας.
* **Κόστος** -- Η αποθήκευση αντικειμένων είναι συχνά φθηνότερη ανά gigabyte από την αποθήκευση μπλοκ συνδεδεμένη με servers.

## Υποστηριζόμενοι Πάροχοι

| Πάροχος | Flysystem Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3-compatible) | Uses the S3 adapter with a custom endpoint |
| **Local filesystem** | Default, no additional packages needed |

## Εγκατάσταση

Το Chamilo περιλαμβάνει ήδη προεγκατεστημένους τους εξής παρόχους:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Διαμόρφωση

Το Chamilo χωρίζει τα αρχεία του σε αρκετά mounts του Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes**, και **plugins**. Κάθε mount μπορεί να στοχεύει σε διαφορετικό bucket ή container. Η διαμόρφωση σύννεφου στο `config/packages/oneup_flysystem.yaml` επιλέγεται ανά περιβάλλον χρησιμοποιώντας συνθήκες `when@` και διαβάζει τις μεταβλητές που ορίζετε στο `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Διαμορφώστε το GCS με τον ίδιο τρόπο όπως το S3, χρησιμοποιώντας μεταβλητές περιβάλλοντος ειδικές για το GCS και ένα bucket ανά mount. Ανατρέξτε στο `oneup_flysystem.yaml` που συνοδεύει την έκδοσή σας για τα ακριβή ονόματα μεταβλητών — είναι επίσης τεκμηριωμένες στο `.env`.

### MinIO (S3-Compatible)

Το MinIO λειτουργεί μέσω του S3 adapter με προσαρμοσμένο endpoint και path-style addressing — ορίστε `AWS_S3_STORAGE_*` όπως για το S3 και προσθέστε το endpoint του MinIO και τις σημαίες path-style που υποστηρίζονται από το bundle.

> Το πλήρες σύνολο ονομάτων μεταβλητών παρατίθεται στο αρχείο `.env.dist` που συνοδεύει το Chamilo. Αντιγράψτε μόνο τις γραμμές για τον πάροχο που χρησιμοποιείτε πραγματικά στο `.env` σας και καταργήστε τα σχόλιά τους.

## Μεταφορά Υπάρχοντων Αρχείων

Αν μεταβαίνετε από τοπική αποθήκευση σε αποθήκευση σύννεφου σε μια υπάρχουσα πλατφόρμα, πρέπει να μεταφέρετε τα υπάρχοντα αρχεία:

1. Διαμορφώστε τον νέο storage adapter όπως περιγράφεται παραπάνω.
2. Αντιγράψτε τα υπάρχοντα αρχεία από τον τοπικό κατάλογο `var/upload/` στο bucket αποθήκευσης σύννεφου, διατηρώντας τη δομή καταλόγου.
3. Επαληθεύστε ότι τα αρχεία είναι προσβάσιμα μέσω της πλατφόρμας μετά τη μεταφορά.

## Δικαιώματα και Πρόσβαση

Βεβαιωθείτε ότι το bucket αποθήκευσης σύννεφου σας **δεν είναι δημόσια προσβάσιμο** εκτός αν χρειάζεστε ρητά δημόσιες URLs αρχείων. Το Chamilo παρέχει αρχεία μέσω του δικού του στρώματος ελέγχου πρόσβασης, οπότε η άμεση δημόσια πρόσβαση στο bucket είναι περιττή και κίνδυνος ασφαλείας.

Για το S3, χρησιμοποιήστε μια bucket policy που περιορίζει την πρόσβαση στα IAM credentials που διαμορφώσατε παραπάνω.

## Συμβουλές

* **Δοκιμάστε με MinIO τοπικά** πριν την ανάπτυξη σε πάροχο σύννεφου -- Το MinIO είναι ένας δωρεάν, S3-compatible server που μπορείτε να εκτελέσετε στο δικό σας μηχάνημα.
* **Χρησιμοποιήστε ένα αποκλειστικό bucket** για το Chamilo αντί να μοιραστείτε bucket με άλλες εφαρμογές.
* **Ρυθμίστε lifecycle policies** στο cloud bucket σας για τη διαχείριση κόστους αποθήκευσης (π.χ., μετακίνηση παλιών αρχείων σε φθηνότερα tiers αποθήκευσης).