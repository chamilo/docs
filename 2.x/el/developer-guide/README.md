# Οδηγός Προγραμματιστή

Καλώς ήρθατε στον Οδηγό Προγραμματιστή του Chamilo 2.0. Αυτός ο οδηγός απευθύνεται σε προγραμματιστές που επιθυμούν να κατανοήσουν την αρχιτεκτονική του Chamilo, να επεκτείνουν την πλατφόρμα με plugins, να χρησιμοποιήσουν το API, να προσαρμόσουν τη διεπαφή ή να συνεισφέρουν στο έργο.

## Η Αρχιτεκτονική με μια Ματιά

Το Chamilo 2.0 βασίζεται σε:

* **Backend**: Symfony 6.4 (PHP 8.2+) με Doctrine ORM και API Platform 3.0
* **Frontend**: Vue 3 με PrimeVue, Pinia state management, και Vue Router
* **Build system**: Webpack 5 μέσω Symfony Webpack Encore, με Tailwind CSS
* **Authentication**: JWT tokens (lexik/jwt-authentication-bundle)
* **File storage**: Flysystem (υποστηρίζει local, AWS S3, Azure Blob, Google Cloud)

Ο κώδικας οργανώνεται σε τρία Symfony bundles:

| Bundle | Σκοπός |
|--------|---------|
| **CoreBundle** | Κεντρικός πυρήνας της πλατφόρμας: χρήστες, ρυθμίσεις, πόροι, διαχειριστής, AI providers, ασφάλεια |
| **CourseBundle** | Χαρακτηριστικά ειδικά για μαθήματα: έγγραφα, ασκήσεις, μονοπάτια μάθησης, φόρουμ, κ.λπ. |
| **LtiBundle** | Ενσωμάτωση LTI 1.3 για εξωτερικά εκπαιδευτικά εργαλεία |

## Πώς Οργανώνεται Αυτός ο Οδηγός

1. **Ξεκινώντας** — Tech stack, εγκατάσταση ανάπτυξης, δομή έργου
2. **Backend** — Αρχιτεκτονική Symfony, οντότητες, σύστημα πόρων, controllers, ρυθμίσεις
3. **API** — REST API μέσω API Platform, JWT authentication, προσαρμοσμένες ενέργειες
4. **Frontend** — Vue components, views, routing, state management, build system
5. **Theming** — Color themes, CSS/Tailwind, Twig templates
6. **Plugins** — Plugin architecture και ανάπτυξη
7. **Συνεισφορά** — Συνήθειες κωδικοποίησης, git workflow, δοκιμές