# Αναφορά Endpoints

Το API Platform παράγει αυτόματα REST endpoints για οντότητες που έχουν σχολιαστεί με `#[ApiResource]`. Το Chamilo εκθέτει 100+ πόρους.

## Τυπικές Λειτουργίες

Για κάθε πόρο API, οι εξής λειτουργίες είναι συνήθως διαθέσιμες:

| Method | Path | Περιγραφή |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Λίστα (συλλογή) |
| `POST` | `/api/{resources}` | Δημιουργία |
| `GET` | `/api/{resources}/{id}` | Ανάγνωση (ένα στοιχείο) |
| `PUT` | `/api/{resources}/{id}` | Πλήρης ενημέρωση |
| `PATCH` | `/api/{resources}/{id}` | Μερική ενημέρωση |
| `DELETE` | `/api/{resources}/{id}` | Διαγραφή |

Δεν είναι όλες οι λειτουργίες ενεργοποιημένες για κάθε πόρο — ισχύουν περιορισμοί ασφαλείας.

## Κύριοι Πόροι API

### Πόροι Πλατφόρμας

| Resource | Path | Περιγραφή |
|----------|------|-------------|
| Users | `/api/users` | Λογαριασμοί χρηστών |
| Courses | `/api/courses` | Μαθήματα |
| Sessions | `/api/sessions` | Συνεδρίες εκπαίδευσης |
| Resource Nodes | `/api/resource_nodes` | Ενιαίοι κόμβοι περιεχομένου |
| Access URLs | `/api/access_urls` | Πολλαπλές πύλες URL |
| Messages | `/api/messages` | Μηνύματα πλατφόρμας |

### Πόροι Περιεχομένου Μαθήματος

| Resource | Path | Περιγραφή |
|----------|------|-------------|
| Documents | `/api/documents` | Έγγραφα μαθήματος |
| Learning Paths | `/api/learning_paths` | Μονοπάτια μάθησης |
| Glossaries | `/api/glossaries` | Όροι γλωσσαρίου |
| Links | `/api/links` | Εξωτερικοί σύνδεσμοι |
| Calendar Events | `/api/c_calendar_events` | Γεγονότα ημερολογίου |
| Student Publications | `/api/c_student_publications` | Αναθέσεις |
| Blogs | `/api/c_blogs` | Blogs μαθήματος |
| Groups | `/api/c_groups` | Ομάδες μαθήματος |

### Πόροι Παρακολούθησης

| Resource | Path | Περιγραφή |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Ρύθμιση βαθμολογίου |
| Gradebook Results | `/api/gradebook_results` | Βαθμοί |

## Φιλτράρισμα και Σελιδοποίηση

Το API Platform υποστηρίζει:

* **Σελιδοποίηση**: `?page=2&itemsPerPage=30`
* **Φιλτράρισμα**: `?title=Introduction` (εξαρτάται από τα ρυθμισμένα φίλτρα)
* **Ταξινόμηση**: `?order[title]=asc`
* **Αναζήτηση**: Πλήρης αναζήτηση κειμένου σε ρυθμισμένα πεδία

## Διαπραγμάτευση Περιεχομένου

Το API υποστηρίζει πολλαπλές μορφές:

* `application/ld+json` (προεπιλογή — JSON-LD)
* `application/json`
* `text/html` (τεκμηρίωση API)

Ορίστε το header `Accept` για να επιλέξετε τη μορφή απόκρισης.

## Ασφάλεια

Κάθε endpoint επιβάλλει ασφάλεια μέσω:

* JWT authentication (απαιτείται για τα περισσότερα endpoints)
* Symfony security voters (άδειες σε επίπεδο πόρου)
* Role-based access control (π.χ. endpoints μόνο για διαχειριστές)