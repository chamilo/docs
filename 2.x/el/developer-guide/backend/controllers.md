# Controllers

Το Chamilo 2.0 χρησιμοποιεί μεγάλο αριθμό controllers (της τάξης δεκάδων) οργανωμένων σε bundles. Ο ακριβής αριθμός ποικίλλει από έκδοση σε έκδοση — αντιμετωπίστε τα ονόματα παρακάτω ως εικονογραφητικά, όχι εξαντλητικά.

## Controller Types

### Admin Controllers

Βρίσκονται στο `src/CoreBundle/Controller/Admin/`. Διαχειρίζονται τη διαχείριση της πλατφόρμας:

* `AdminController` — Dashboard, πληροφορίες αρχείου, δοκιμή email
* `UserListController` — User CRUD
* `CourseListController` — Διαχείριση μαθημάτων
* `SessionAdminController` — Διαχείριση συνεδριών
* `SettingsController` — Ρυθμίσεις πλατφόρμας
* `SecurityController` — Προσπάθειες σύνδεσης, γεγονότα IDS
* `PluginsController` — Διαχείριση plugins
* `RoomController` — Διαχείριση αιθουσών

### API Action Controllers

Προσαρμοσμένες ενέργειες API Platform στο `src/CoreBundle/Controller/Api/`:

Αυτές επεκτείνουν το ενσωματωμένο CRUD της API Platform με προσαρμοσμένη λογική επιχειρήσεων. Παραδείγματα:

* `CreateDocumentFileAction` — Ανέβασμα αρχείου για έγγραφα
* `CreateStudentPublicationFileAction` — Ανέβασμα υποβολής εργασίας
* `UpdateVisibilityDocument` — Εναλλαγή ορατότητας εγγράφου
* `ExportCGlossaryAction` — Εξαγωγή γλωσσάριου
* `MoveDocumentAction` — Μετακίνηση εγγράφου σε διαφορετικό φάκελο

Για λειτουργίες ανάγνωσης/εγγραφής που δεν χρειάζονται ειδικό HTTP controller — δηλαδή όταν θέλετε μόνο να αλλάξετε *πώς* ανακτάται ή αποθηκεύεται ένα αντικείμενο ή συλλογή — προτιμήστε ένα **State Provider** ή **State Processor** (δείτε παρακάτω). Τα API Action Controllers είναι καλύτερα να διατηρούνται για endpoints που πραγματικά χρειάζονται λογική σε επίπεδο αιτήματος (ανεβάσματα αρχείων, προσαρμοσμένες μορφές απόκρισης, πολυβή flows).

### AI Controller

Το `src/CoreBundle/Controller/AiController.php` είναι το σημείο εισόδου για endpoints σχετικά με AI (δημιουργία ερωτήσεων Aiken, δημιουργία μονοπατιού μάθησης, δημιουργία εικόνας/βίντεο, βαθμολόγηση ανοιχτών απαντήσεων, ανάλυση εγγράφων…). Το ακριβές σύνολο διαδρομών εξελίσσεται γρήγορα — διαβάστε τα χαρακτηριστικά `#[Route]` του controller για την τρέχουσα λίστα αντί να βασίζεστε σε αντίγραφο εδώ.

### Chat Controller

Το `src/CoreBundle/Controller/ChatController.php` διαχειρίζεται real-time chat και AI tutor:

* Μηνύματα χρήστη-προς-χρήστη
* Chat AI tutor (προσαρτημένο πάνελ chat)
* Ιστορικό μηνυμάτων και polling

## API Platform State Providers & Processors

Δεν υποστηρίζεται κάθε endpoint API από controller. Η API Platform 3 χωρίζει τη δουλειά μεταξύ δύο διεπαφών:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — επιστρέφουν δεδομένα για λειτουργίες `GET` (ένα μεμονωμένο αντικείμενο ή μια συλλογή).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — διαχειρίζονται εγγραφές για λειτουργίες `POST`, `PUT`, `PATCH` και `DELETE`.

Οι υλοποιήσεις του Chamilo βρίσκονται στο `src/CoreBundle/State/` (περίπου 35+ κλάσεις). Συνδέονται με οντότητες μέσω των παραμέτρων `provider:` και `processor:` των λειτουργιών `#[ApiResource]` αντί μέσω διαδρομών.

### Πότε να τα χρησιμοποιήσετε

Χρησιμοποιήστε ένα provider/processor — αντί για API Action Controller — όταν:

* Το endpoint ακολουθεί το τυπικό σχήμα REST (λίστα / ανάγνωση / δημιουργία / ενημέρωση / διαγραφή) αλλά χρειάζεται προσαρμοσμένη συναρμολόγηση δεδομένων ή λογική αποθήκευσης.
* Χρειάζεται να φιλτράρετε, να αποκανονίσετε ή να εμπλουτίσετε το αποτέλεσμα μιας ανάγνωσης συλλογής ή αντικειμένου (π.χ. σεβόμενοι το τρέχον Access URL, πλαίσιο μαθήματος ή κανόνες ορατότητας).
* Χρειάζεται να εκτελέσετε παρεπόμενες ενέργειες κατά την εγγραφή (καταγραφές ελέγχου, δημιουργία αρχείου, ενημερώσεις σχετικών οντοτήτων) διατηρώντας τον αγωγό κανονικοποίησης, επικύρωσης και σελιδοποίησης της API Platform.
* Θέλετε να διατηρήσετε τη λειτουργία ανακαλύψιμη στο σχήμα OpenAPI / Hydra χωρίς να καταχωρήσετε προσαρμοσμένη διαδρομή.

Αν το endpoint αντίθετα χρειάζεται πρόσβαση σε ακατέργαστο `Request`, επιστρέφει μη-πόρο payload (λήψη αρχείου, CSV, ανακατεύθυνση) ή συντονίζει πολυβή flow, ένα API Action Controller στο `src/CoreBundle/Controller/Api/` είναι καλύτερη επιλογή.

### Σύνδεση στην οντότητα

Αναφορά της κλάσης στη λειτουργία:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Παράδειγμα Provider

Το `src/CoreBundle/State/DocumentProvider.php` επιλύει ένα `CDocument` μέσω μεταβλητής URI και εκτοξεύει `NotFoundHttpException` όταν λείπει:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

---
### Παράδειγμα επεξεργαστή

Το `src/CoreBundle/State/ColorThemeStateProcessor.php` αναθέτει στον προεπιλεγμένο επεξεργαστή `persistProcessor` του Doctrine, στη συνέχεια εκτελεί παρενέργειες (δημιουργεί ένα αρχείο CSS στο σύστημα αρχείων Flysystem των θεμάτων, συνδέει το θέμα με την τρέχουσα `Access URL`):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Σχήματα που πρέπει να γνωρίζετε

* **Σύνθεση με τον προεπιλεγμένο επεξεργαστή.** Διακοσμήστε το `ProcessorInterface $persistProcessor` (ενσωματωμένο του Doctrine) ώστε η λογική ειδική για το Chamilo να εκτελείται *γύρω* από την τυπική αποθήκευση, όχι αντί αυτής.
* **Οι πάροχοι συλλογών κάνουν τη δική τους σελιδοποίηση.** Όταν ένας πάροχος συλλογής δημιουργεί προσαρμοσμένη ερώτηση, πρέπει να σέβεται τα `?page`, `?itemsPerPage` και φίλτρα αναζήτησης — ο αυτόματος σελιδοποιητής του API Platform ενεργοποιείται μόνο για τον προεπιλεγμένο πάροχο συλλογής Doctrine.
* **Μία κλάση ανά πόρο + είδος λειτουργίας είναι συνηθισμένη**, αλλά ένας πάροχος μπορεί να εξυπηρετεί αρκετές λειτουργίες (δείτε το `UsergroupStateProvider`, που επαναχρησιμοποιείται σε τέσσερις λειτουργίες στο `Usergroup`).
* **Σύμβαση ονοματολογίας**: `<Entity>StateProvider` / `<Entity>StateProcessor` για handlers σε όλο τον πόρο· `<Entity><Action>Processor` (π.χ. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) για πιο στενές λειτουργίες.

## Δρομολόγηση

Οι controllers χρησιμοποιούν **χαρακτηριστικά PHP 8** για ορισμούς διαδρομών:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Οι πόροι του API Platform χρησιμοποιούν χαρακτηριστικά `#[ApiResource]` στις οντότητες, με προσαρμοσμένες λειτουργίες που δείχνουν σε ενέργειες controller.

## Traits

Οι controllers χρησιμοποιούν κοινά traits για κοινές λειτουργίες:

* `ControllerTrait` — Πρόσβαση σε ρυθμίσεις, serializer και κοινές υπηρεσίες
* `CourseControllerTrait` — Βοηθοί περιβάλλοντος μαθήματος
* `ResourceControllerTrait` — Λειτουργίες κόμβων πόρων