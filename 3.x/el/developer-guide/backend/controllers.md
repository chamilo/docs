# Controllers

Το Chamilo 3.0 χρησιμοποιεί μεγάλο αριθμό controllers (της τάξης των δεκάδων) οργανωμένους στα bundles. Ο ακριβής αριθμός μεταβάλλεται από έκδοση σε έκδοση — θεωρήστε τα ονόματα παρακάτω ενδεικτικά, όχι εξαντλητικά.

## Controller Types

### Admin Controllers

Βρίσκονται στο `src/CoreBundle/Controller/Admin/`. Διαχειρίζονται τη διαχείριση της πλατφόρμας:

* `AdminController` — Πίνακας ελέγχου, πληροφορίες αρχείων, δοκιμή email
* `UserListController` — CRUD χρηστών
* `CourseListController` — Διαχείριση μαθημάτων
* `SessionAdminController` — Διαχείριση συνεδριών
* `SettingsController` — Ρυθμίσεις πλατφόρμας
* `SecurityController` — Προσπάθειες σύνδεσης, συμβάντα IDS
* `PluginsController` — Διαχείριση πρόσθετων
* `RoomController` — Διαχείριση αιθουσών

### API Action Controllers

Προσαρμοσμένες ενέργειες API Platform στο `src/CoreBundle/Controller/Api/`:

Επεκτείνουν το ενσωματωμένο CRUD του API Platform με προσαρμοσμένη επιχειρηματική λογική. Παραδείγματα:

* `CreateDocumentFileAction` — Ανέβασμα αρχείου για έγγραφα
* `CreateStudentPublicationFileAction` — Ανέβασμα υποβολής εργασίας
* `UpdateVisibilityDocument` — Εναλλαγή ορατότητας εγγράφου
* `ExportCGlossaryAction` — Εξαγωγή γλωσσαρίου
* `MoveDocumentAction` — Μετακίνηση εγγράφου σε διαφορετικό φάκελο

Για λειτουργίες ανάγνωσης/εγγραφής που δεν χρειάζονται αποκλειστικό HTTP controller — δηλαδή όταν θέλετε μόνο να αλλάξετε *τον τρόπο* με τον οποίο ανακτάται ή αποθηκεύεται ένα στοιχείο ή μια συλλογή — προτιμήστε ένα **State Provider** ή **State Processor** (βλ. παρακάτω). Τα API Action Controllers είναι καλύτερα να διατηρούνται για τελικά σημεία που πραγματικά χρειάζονται λογική σε επίπεδο αιτήματος (ανεβάσματα αρχείων, προσαρμοσμένες μορφές απόκρισης, ροές πολλαπλών βημάτων).

### AI Controller

Το `src/CoreBundle/Controller/AiController.php` είναι το σημείο εισόδου για τελικά σημεία σχετιζόμενα με την ΤΝ (δημιουργία ερωτήσεων Aiken, δημιουργία μαθησιακής διαδρομής, δημιουργία εικόνας/βίντεο, βαθμολόγηση ανοιχτών απαντήσεων, ανάλυση εγγράφων…). Το ακριβές σύνολο διαδρομών εξελίσσεται γρήγορα — διαβάστε τα χαρακτηριστικά `#[Route]` του controller για την τρέχουσα λίστα αντί να βασίζεστε σε ένα αντίγραφο εδώ.

### Chat Controller

Το `src/CoreBundle/Controller/ChatController.php` χειρίζεται τη συνομιλία σε πραγματικό χρόνο και τον tutor ΤΝ:

* Μηνύματα χρήστη προς χρήστη
* Συνομιλία tutor ΤΝ (προσαρτημένο πάνελ συνομιλίας)
* Ιστορικό μηνυμάτων και polling

## API Platform State Providers & Processors

Δεν υποστηρίζεται κάθε τελικό σημείο API από έναν controller. Το API Platform 4 διαχωρίζει την εργασία μεταξύ δύο διεπαφών:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — επιστρέφουν δεδομένα για λειτουργίες `GET` (ένα μεμονωμένο στοιχείο ή μια συλλογή).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — χειρίζονται εγγραφές για λειτουργίες `POST`, `PUT`, `PATCH` και `DELETE`.

Οι υλοποιήσεις του Chamilo βρίσκονται στο `src/CoreBundle/State/` (περίπου 35+ κλάσεις). Συνδέονται με οντότητες μέσω των ορισμάτων `provider:` και `processor:` των λειτουργιών `#[ApiResource]` και όχι μέσω διαδρομών.

### When to use them

Καταφύγετε σε provider/processor — αντί για API Action Controller — όταν:

* Το τελικό σημείο ακολουθεί το τυπικό σχήμα REST (λίστα / ανάγνωση / δημιουργία / ενημέρωση / διαγραφή) αλλά χρειάζεται προσαρμοσμένη συναρμολόγηση δεδομένων ή λογική διατήρησης.
* Χρειάζεται να φιλτράρετε, να αποκανονικοποιήσετε ή να εμπλουτίσετε το αποτέλεσμα μιας ανάγνωσης συλλογής ή στοιχείου (π.χ. σεβόμενοι το τρέχον Access URL, το πλαίσιο μαθήματος ή τους κανόνες ορατότητας).
* Χρειάζεται να εκτελέσετε παράπλευρες ενέργειες κατά την εγγραφή (αρχεία ελέγχου, δημιουργία αρχείων, ενημερώσεις σχετικών οντοτήτων) διατηρώντας παράλληλα τη διοχέτευση κανονικοποίησης, επικύρωσης και σελιδοποίησης του API Platform.
* Θέλετε να διατηρήσετε τη λειτουργία ανιχνεύσιμη στο σχήμα OpenAPI / Hydra χωρίς να καταχωρίσετε προσαρμοσμένη διαδρομή.

Αν το τελικό σημείο χρειάζεται αντίθετα ακατέργαστη πρόσβαση στο `Request`, επιστρέφει ωφέλιμο φορτίο που δεν είναι πόρος (λήψη αρχείου, CSV, ανακατεύθυνση) ή ενορχηστρώνει ροή πολλαπλών βημάτων, ένα API Action Controller στο `src/CoreBundle/Controller/Api/` είναι καταλληλότερο.

### Wiring on the entity

Αναφέρετε την κλάση στη λειτουργία:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider example

Το `src/CoreBundle/State/DocumentProvider.php` επιλύει ένα `CDocument` με μεταβλητή URI και ρίχνει `NotFoundHttpException` όταν λείπει:

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

### Παράδειγμα processor

Το `src/CoreBundle/State/ColorThemeStateProcessor.php` αναθέτει στον προεπιλεγμένο Doctrine `persistProcessor` και στη συνέχεια εκτελεί παράπλευρες ενέργειες (δημιουργεί αρχείο CSS στο Flysystem filesystem των θεμάτων, συνδέει το θέμα με το τρέχον Access URL):

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

### Μοτίβα που πρέπει να γνωρίζετε

* **Σύνθεση με τον προεπιλεγμένο processor.** Διακοσμήστε το `ProcessorInterface $persistProcessor` (το ενσωματωμένο του Doctrine) ώστε η λογική ειδικά για το Chamilo να εκτελείται *γύρω* από την τυπική persist, όχι αντί αυτής.
* **Οι collection providers κάνουν τη δική τους σελιδοποίηση.** Όταν ένας collection provider κατασκευάζει προσαρμοσμένο ερώτημα, πρέπει να τηρεί τα `?page`, `?itemsPerPage` και τα φίλτρα αναζήτησης — ο αυτόματος paginator του API Platform ενεργοποιείται μόνο για τον προεπιλεγμένο Doctrine collection provider.
* **Μία κλάση ανά πόρο + είδος λειτουργίας είναι συνηθισμένη**, αλλά ένας provider μπορεί να εξυπηρετεί πολλές λειτουργίες (βλ. `UsergroupStateProvider`, που επαναχρησιμοποιείται σε τέσσερις λειτουργίες στο `Usergroup`).
* **Σύμβαση ονοματοδοσίας**: `<Entity>StateProvider` / `<Entity>StateProcessor` για χειριστές σε επίπεδο πόρου· `<Entity><Action>Processor` (π.χ. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) για στενότερες λειτουργίες.

## Δρομολόγηση

Οι controllers χρησιμοποιούν **χαρακτηριστικά PHP 8** για τους ορισμούς διαδρομών:

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

Οι controllers χρησιμοποιούν κοινόχρηστα traits για κοινή λειτουργικότητα:

* `ControllerTrait` — Πρόσβαση σε ρυθμίσεις, serializer και κοινές υπηρεσίες
* `CourseControllerTrait` — Βοηθήματα πλαισίου μαθήματος
* `ResourceControllerTrait` — Λειτουργίες κόμβου πόρου