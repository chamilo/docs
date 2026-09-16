# Προσαρμοσμένες Ενέργειες

Πέρα από τις τυπικές λειτουργίες CRUD, το Chamilo διαθέτει έναν αριθμό προσαρμοσμένων ελεγκτών ενεργειών API (της τάξης των δεκάδων) που χειρίζονται εξειδικευμένες λειτουργίες. Ο ακριβής αριθμός διαφέρει μεταξύ εκδόσεων — εμφανίστε τη λίστα `src/CoreBundle/Controller/Api/` για το τρέχον σύνολο.

## Τοποθεσία

Οι προσαρμοσμένες ενέργειες βρίσκονται στο `src/CoreBundle/Controller/Api/`.

## Αξιοσημείωτες προσαρμοσμένες ενέργειες

### Έγγραφα

| Controller | Σκοπός |
|-----------|---------|
| `CreateDocumentFileAction` | Ανέβασμα αρχείου ή δημιουργία φακέλου/εγγράφου συνδέσμου |
| `UpdateDocumentFileAction` | Αντικατάσταση του αρχείου ενός εγγράφου |
| `ReplaceDocumentFileAction` | Αντικατάσταση αρχείου εγγράφου, με διατήρηση των αναγνωριστικών του |
| `MoveDocumentAction` | Μετακίνηση εγγράφου σε διαφορετικό φάκελο |
| `UpdateVisibilityDocument` | Εναλλαγή ορατότητας εγγράφου για τους εκπαιδευόμενους |
| `DownloadAllDocumentsAction` | Λήψη όλων των εγγράφων ενός φακέλου ως ZIP |
| `DownloadSelectedDocumentsAction` | Λήψη επιλεγμένου συνόλου εγγράφων ως ZIP |
| `DocumentUsageAction` | Κατάλογος μαθημάτων/συνεδριών όπου χρησιμοποιείται ένα έγγραφο |
| `DocumentLearningPathUsageAction` | Κατάλογος μαθησιακών διαδρομών όπου χρησιμοποιείται ένα έγγραφο |

### Γλωσσάριο

| Controller | Σκοπός |
|-----------|---------|
| `CreateCGlossaryAction` | Δημιουργία όρου γλωσσαρίου |
| `UpdateCGlossaryAction` | Ενημέρωση όρου γλωσσαρίου |
| `ExportCGlossaryAction` | Εξαγωγή γλωσσαρίου σε αρχείο |
| `ImportCGlossaryAction` | Εισαγωγή γλωσσαρίου από αρχείο |
| `ExportGlossaryToDocumentsAction` | Εξαγωγή γλωσσαρίου ως έγγραφο στο μάθημα |
| `GetGlossaryCollectionController` | Λήψη συλλογής γλωσσαρίου με προσαρμοσμένο φιλτράρισμα |

### Σύνδεσμοι

| Controller | Σκοπός |
|-----------|---------|
| `CreateCLinkAction` | Δημιουργία εξωτερικού συνδέσμου |
| `UpdateCLinkAction` | Ενημέρωση εξωτερικού συνδέσμου |
| `CreateCLinkCategoryAction` | Δημιουργία κατηγορίας συνδέσμων |
| `UpdateCLinkCategoryAction` | Ενημέρωση κατηγορίας συνδέσμων |
| `CheckCLinkAction` | Έλεγχος προσβασιμότητας URL συνδέσμου |
| `ExportCLinksAction` | Εξαγωγή συνδέσμων σε αρχείο |
| `CLinkDetailsController` | Λήψη λεπτομερειών συνδέσμου |
| `CLinkImageController` | Λήψη ή ορισμός εικόνας προεπισκόπησης συνδέσμου |
| `GetLinksCollectionController` | Λήψη συλλογής συνδέσμων με προσαρμοσμένο φιλτράρισμα |
| `UpdateVisibilityLink` | Εναλλαγή ορατότητας συνδέσμου |
| `UpdateVisibilityLinkCategory` | Εναλλαγή ορατότητας κατηγορίας συνδέσμων |
| `UpdatePositionLink` | Αναδιάταξη συνδέσμων |

### Μαθησιακές διαδρομές

| Controller | Σκοπός |
|-----------|---------|
| `CreateCLpAction` | Δημιουργία μαθησιακής διαδρομής |
| `LpReorderController` | Αναδιάταξη στοιχείων μαθησιακής διαδρομής |

### Ημερολόγιο

| Controller | Σκοπός |
|-----------|---------|
| `UpdateCCalendarEventAction` | Ενημέρωση συμβάντος ημερολογίου μαθήματος |
| `CalendarMyStudentsScheduleAction` | Λήψη του προγράμματος των εκπαιδευόμενων ενός εκπαιδευτή |

### Ιστολόγιο

| Controller | Σκοπός |
|-----------|---------|
| `CreateCBlogAction` | Δημιουργία ανάρτησης ιστολογίου |
| `CreateBlogAttachmentAction` | Επισύναψη αρχείου σε ανάρτηση ιστολογίου |
| `UpdateVisibilityBlog` | Εναλλαγή ορατότητας ιστολογίου |

### Dropbox

| Controller | Σκοπός |
|-----------|---------|
| `CreateDropboxFileAction` | Ανέβασμα αρχείου στο dropbox (εργαλείο ανταλλαγής αρχείων) |

### Εργασίες εκπαιδευόμενων (Αναθέσεις)

| Controller | Σκοπός |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Υποβολή αρχείου εργασίας |
| `CreateStudentPublicationCommentAction` | Προσθήκη σχολίου σε υποβολή |
| `CreateStudentPublicationCorrectionFileAction` | Ανέβασμα αρχείου διόρθωσης για μια υποβολή |

### Προσωπικά αρχεία

| Controller | Σκοπός |
|-----------|---------|
| `CreatePersonalFileAction` | Ανέβασμα αρχείου στον προσωπικό χώρο αρχείων του χρήστη |
| `UpdatePersonalFileAction` | Ενημέρωση προσωπικού αρχείου |

### Κοινωνικό δίκτυο

| Controller | Σκοπός |
|-----------|---------|
| `LikeSocialPostController` | Επισήμανση «μου αρέσει» σε κοινωνική ανάρτηση |
| `DislikeSocialPostController` | Αφαίρεση επισήμανσης «μου αρέσει» από κοινωνική ανάρτηση |
| `CreateSocialPostAttachmentAction` | Επισύναψη αρχείου σε κοινωνική ανάρτηση |
| `SocialPostAttachmentsController` | Κατάλογος συνημμένων κοινωνικής ανάρτησης |
| `AbstractFeedbackSocialPostController` | Βασική κλάση για ενέργειες ανατροφοδότησης κοινωνικών αναρτήσεων |

### Συνεδρίες

| Controller | Σκοπός |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Δημιουργία συνεδρίας και εγγραφή χρηστών και μαθημάτων με μία κλήση |

### Χρήστες και URL πρόσβασης

| Controller | Σκοπός |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Δημιουργία χρήστη και συσχέτισή του με URL πρόσβασης |
| `UserAccessUrlsController` | Κατάλογος URL πρόσβασης στα οποία ανήκει ένας χρήστης |
| `UserSkillsController` | Κατάλογος δεξιοτήτων που έχουν απονεμηθεί σε έναν χρήστη |

### Τηλεδιάσκεψη

| Controller | Σκοπός |
|-----------|---------|
| `VideoConferenceCallbackController` | Χειρισμός κλήσεων επιστροφής από εξωτερικούς παρόχους τηλεδιάσκεψης |

### Βασικές κλάσεις

| Class | Σκοπός |
|-------|---------|
| `BaseResourceFileAction` | Βασική κλάση για ενέργειες ανεβάσματος αρχείων· χειρίζεται την ανάλυση multipart, τη δημιουργία κόμβου πόρου και την αποθήκευση |

## Υλοποίηση μιας Προσαρμοσμένης Ενέργειας

Οι προσαρμοσμένες ενέργειες είναι τυπικοί ελεγκτές Symfony που αναφέρονται στους ορισμούς λειτουργιών του API Platform. Το χαρακτηριστικό `#[ApiResource]` βρίσκεται στην **οντότητα**, και η παράμετρος `controller:` κάθε λειτουργίας δείχνει στην κλάση της ενέργειας:

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

Η ίδια η κλάση της ενέργειας είναι ένας απλός invokable ελεγκτής — οι υπηρεσίες εγχέονται μέσω των ορισμάτων της μεθόδου `__invoke()`:

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

Βασικά σημεία:
- Το `deserialize: false` ορίζεται όταν η ενέργεια διαβάζει απευθείας το αίτημα (π.χ. μεταφορτώσεις αρχείων multipart) αντί να αφήνει το API Platform να αποσειριοποιήσει ένα σώμα JSON.
- Οι ενέργειες μεταφόρτωσης αρχείων επεκτείνουν συνήθως την `BaseResourceFileAction`, η οποία χειρίζεται την ανάλυση multipart και τη διασύνδεση των κόμβων πόρων.
- Η ασφάλεια επιβάλλεται μέσω της παραμέτρου `security:` στη λειτουργία, όχι μέσα στον ελεγκτή.