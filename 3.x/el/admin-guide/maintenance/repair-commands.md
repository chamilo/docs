# Εντολές επιδιόρθωσης και μετατροπής

> **Αλλαγή που διακόπτει τη συμβατότητα.** Οι εντολές συντήρησης παρακάτω έγραφαν στη βάση δεδομένων μόλις εκτελούνταν. Τώρα είναι **μόνο για ανάγνωση (dry-run) από προεπιλογή** και γράφουν μόνο όταν δίνεται το `--apply`, ακολουθώντας το μοντέλο της `chamilo:migration:repair-quiz-relations-from-legacy`.

| Εντολή | Σημειώσεις |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | χωρίς `--expected-count` (μία ενιαία λειτουργία όλα ή τίποτα) |

## Τι άλλαξε για τους διαχειριστές

1. Εκτελέστε την εντολή χωρίς επιλογές: αναφέρει τι θα έκανε, δεν γράφει τίποτα και εκτυπώνει την ακριβή
   γραμμή `--apply --expected-count=N` που πρέπει να χρησιμοποιηθεί.
2. Για εγγραφή, εκτελέστε την ξανά με `--apply --expected-count=N`, όπου N είναι ο αριθμός που αναφέρθηκε από την εκτέλεση μόνο για ανάγνωση.
   Αν ο αριθμός των γραμμών που θα άλλαζαν διαφέρει από το N (τα δεδομένα άλλαξαν στο μεταξύ), η εντολή αρνείται
   και δεν γράφει τίποτα.
3. Το `--dry-run` εξακολουθεί να γίνεται αποδεκτό (είναι πλέον η προεπιλογή και δεν κάνει τίποτα)· ο συνδυασμός του με `--apply` αποτελεί σφάλμα.
4. Τα σενάρια και οι εργασίες cron που εκτελούσαν αυτές τις εντολές χωρίς ορίσματα και βασίζονταν στο ότι έγραφαν πρέπει πλέον να περνούν
   `--apply --expected-count=N`. Οι κωδικοί εξόδου παραμένουν αμετάβλητοι (0 επιτυχία, 1 αποτυχία, 2 μη έγκυρη χρήση).

Παράδειγμα:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Νέα εντολή: `app:repair-user-tag-counters`

Επαναϋπολογίζει τον μετρητή χρήσης (`tag.count`) των ετικετών από τις γραμμές σχέσης που τις χρησιμοποιούν (ετικέτες χρηστών, ετικέτες πρόσθετων πεδίων,
ετικέτες χαρτοφυλακίου). Οι παλαιότερες εκδόσεις άφηναν τους μετρητές να αποκλίνουν. Ίδιο μοντέλο: εκτελέστε την χωρίς επιλογές για να εμφανιστούν οι αποκλίνουσες
ετικέτες και να ληφθεί η γραμμή `--apply --expected-count=N`, και έπειτα εκτελέστε αυτή τη γραμμή για εγγραφή. Δεν εμπλέκεται μετανάστευση: εκτελέστε την
όταν θέλετε να επανασυγχρονιστούν οι μετρητές.