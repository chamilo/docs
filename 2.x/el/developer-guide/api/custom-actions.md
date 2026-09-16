# Προσαρμοσμένες Ενέργειες

Πέρα από τις τυπικές λειτουργίες CRUD, το Chamilo διαθέτει έναν αριθμό προσαρμοσμένων ελεγκτών ενεργειών API (της τάξης δεκάδων) που διαχειρίζονται εξειδικευμένες λειτουργίες. Ο ακριβής αριθμός ποικίλλει μεταξύ εκδόσεων — απαριθμήστε το `src/CoreBundle/Controller/Api/` για το τρέχον σύνολο.

## Τοποθεσία

Οι προσαρμοσμένες ενέργειες βρίσκονται στο `src/CoreBundle/Controller/Api/`.

## Σημαντικές Προσαρμοσμένες Ενέργειες

### Documents

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Ανέβασμα αρχείου ή δημιουργία φακέλου/συνδέσμου εγγράφου |
| `UpdateDocumentFileAction` | Αντικατάσταση αρχείου εγγράφου |
| `ReplaceDocumentFileAction` | Αντικατάσταση αρχείου εγγράφου, διατηρώντας τα IDs του |
| `MoveDocumentAction` | Μετακίνηση εγγράφου σε διαφορετικό φάκελο |
| `UpdateVisibilityDocument` | Εναλλαγή ορατότητας εγγράφου για μαθητές |
| `DownloadAllDocumentsAction` | Λήψη όλων των εγγράφων σε φάκελο ως ZIP |
| `DownloadSelectedDocumentsAction` | Λήψη επιλεγμένου συνόλου εγγράφων ως ZIP |
| `DocumentUsageAction` | Λίστα μαθημάτων/συνεδριών όπου χρησιμοποιείται ένα έγγραφο |
| `DocumentLearningPathUsageAction` | Λίστα διαδρομών μάθησης όπου χρησιμοποιείται ένα έγγραφο |

### Glossary

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Δημιουργία όρου γλωσσαρίου |
| `UpdateCGlossaryAction` | Ενημέρωση όρου γλωσσαρίου |
| `ExportCGlossaryAction` | Εξαγωγή γλωσσαρίου σε αρχείο |
| `ImportCGlossaryAction` | Εισαγωγή γλωσσαρίου από αρχείο |
| `ExportGlossaryToDocumentsAction` | Εξαγωγή γλωσσαρίου ως εγγράφου στο μάθημα |
| `GetGlossaryCollectionController` | Λήψη συλλογής γλωσσαρίου με προσαρμοσμένη φιλτράρισμα |

### Links

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Δημιουργία εξωτερικού συνδέσμου |
| `UpdateCLinkAction` | Ενημέρωση εξωτερικού συνδέσμου |
| `CreateCLinkCategoryAction` | Δημιουργία κατηγορίας συνδέσμων |
| `UpdateCLinkCategoryAction` | Ενημέρωση κατηγορίας συνδέσμων |
| `CheckCLinkAction` | Έλεγχος αν η διεύθυνση URL συνδέσμου είναι προσβάσιμη |
| `ExportCLinksAction` | Εξαγωγή συνδέσμων σε αρχείο |
| `CLinkDetailsController` | Λήψη λεπτομερειών συνδέσμου |
| `CLinkImageController` | Λήψη ή ρύθμιση εικόνας προεπισκόπησης συνδέσμου |
| `GetLinksCollectionController` | Λήψη συλλογής συνδέσμων με προσαρμοσμένη φιλτράρισμα |
| `UpdateVisibilityLink` | Εναλλαγή ορατότητας συνδέσμου |
| `UpdateVisibilityLinkCategory` | Εναλλαγή ορατότητας κατηγορίας συνδέσμων |
| `UpdatePositionLink` | Επανατάξη συνδέσμων |

### Learning Paths

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Δημιουργία διαδρομής μάθησης |
| `LpReorderController` | Επανατάξη στοιχείων διαδρομής μάθησης |

### Calendar

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Ενημέρωση γεγονότος ημερολογίου μαθήματος |
| `CalendarMyStudentsScheduleAction` | Λήψη προγράμματος μαθητών ενός εκπαιδευτικού |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Δημιουργία ανάρτησης blog |
| `CreateBlogAttachmentAction` | Σύνδεση αρχείου με ανάρτηση blog |
| `UpdateVisibilityBlog` | Εναλλαγή ορατότητας blog |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Ανέβασμα αρχείου στο dropbox (εργαλείο ανταλλαγής αρχείων) |

### Student Work (Assignments)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Υποβολή αρχείου εργασίας |
| `CreateStudentPublicationCommentAction` | Πρόσθεση σχολίου σε υποβολή |
| `CreateStudentPublicationCorrectionFileAction` | Ανέβασμα αρχείου διόρθωσης για υποβολή |

### Personal Files

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Ανέβασμα αρχείου στον προσωπικό χώρο αρχείων χρήστη |
| `UpdatePersonalFileAction` | Ενημέρωση προσωπικού αρχείου |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Μου αρέσει σε κοινωνική ανάρτηση |
| `DislikeSocialPostController` | Αναιρέσει μου αρέσει από κοινωνική ανάρτηση |
| `CreateSocialPostAttachmentAction` | Σύνδεση αρχείου με κοινωνική ανάρτηση |
| `SocialPostAttachmentsController` | Λίστα συννημμένων σε κοινωνική ανάρτηση |
| `AbstractFeedbackSocialPostController` | Βασική κλάση για ενέργειες ανατροφοδότησης κοινωνικών αναρτήσεων |

### Sessions

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Δημιουργία συνεδρίας και εγγραφή χρηστών και μαθημάτων σε μία κλήση |

### Users & Access URLs

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Δημιουργία χρήστη και συσχετισμός με Access URL |
| `UserAccessUrlsController` | Λίστα Access URLs στα οποία ανήκει ένας χρήστης |
| `UserSkillsController` | Λίστα δεξιοτήτων που έχουν απονεμηθεί σε χρήστη |

### Video Conference

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Διαχείριση callbacks από παρόχους εξωτερικών βιντεοδιασκέψεων |

### Base Classes

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Βασική κλάση για ενέργειες ανεβάσματος αρχείων· διαχειρίζεται ανάλυση multipart, δημιουργία κόμβου πόρου και αποθήκευση |

---
## Υλοποίηση Προσαρμοσμένης Ενέργειας

Οι προσαρμοσμένες ενέργειες είναι τυπικοί ελεγκτές Symfony που αναφέρονται σε ορισμούς λειτουργιών του API Platform. Το χαρακτηριστικό `#[ApiResource]` βρίσκεται στην **οντότητα**, και η παράμετρος `controller:` κάθε λειτουργίας δείχνει στην κλάση της ενέργειας:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

Η ίδια η κλάση της ενέργειας είναι ένας απλός ελεγκτής που μπορεί να καλεστεί — οι υπηρεσίες εγχέονται μέσω των παραμέτρων της μεθόδου `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Κύρια σημεία:
- Η ρύθμιση `deserialize: false` χρησιμοποιείται όταν η ενέργεια διαβάζει απευθείας το αίτημα (π.χ. φόρτωση αρχείων multipart) αντί να επιτρέπει στο API Platform να αποσυμπιέσει ένα σώμα JSON.
- Οι ενέργειες φόρτωσης αρχείων επεκτείνουν συνήθως το `BaseResourceFileAction`, το οποίο χειρίζεται την ανάλυση multipart και τη σύνδεση κόμβων πόρων.
- Η ασφάλεια επιβάλλεται μέσω της παραμέτρου `security:` στη λειτουργία, όχι μέσα στον ελεγκτή.