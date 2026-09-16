# Γεγονότα και Ακροατές

Το Chamilo χρησιμοποιεί το σύστημα γεγονότων του Symfony για αποσυνδεδεμένη επικοινωνία μεταξύ των εξαρτημάτων.

## Ακροατές Γεγονότων

Το Chamilo χρησιμοποιεί δύο τοποθεσίες για ακροατές:

* **`src/CoreBundle/EventListener/`** — Ακροατές πυρήνα/HTTP του Symfony (αίτημα, απόκριση, εξαίρεση, είσοδος/έξοδος, πρόσβαση σε μάθημα/συνεδρία, κ.λπ.). Παραδείγματα: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Ακροατές οντοτήτων Doctrine συνδεδεμένοι με συγκεκριμένες οντότητες. Παραδείγματα: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Επιλέξτε την τοποθεσία που ταιριάζει με αυτό στο οποίο πρέπει να αντιδράσετε: τα γεγονότα του HTTP-pipeline πηγαίνουν στο `EventListener/`· οι γάντζοι κύκλου ζωής οντοτήτων πηγαίνουν στο `Entity/Listener/`.

## Εγγραφείς Γεγονότων

Βρίσκονται στο `src/CoreBundle/EventSubscriber/`:

Οι εγγραφείς γεγονότων μπορούν να ακούν πολλαπλά γεγονότα:

* **Εγγραφείς ασφαλείας** — Διαχειρίζονται γεγονότα εισόδου/εξόδου, παρακολουθούν προσπάθειες εισόδου
* **Εγγραφείς API** — Προεπεξεργασία/μεταεπεξεργασία για αιτήματα API
* **Εγγραφείς Doctrine** — Αντιδρούν σε γεγονότα κύκλου ζωής οντοτήτων

## Γεγονότα Κύκλου Ζωής Doctrine

Οι οντότητες χρησιμοποιούν το `#[ORM\HasLifecycleCallbacks]` για γεγονότα επιπέδου βάσης δεδομένων:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Δημιουργία Προσαρμοσμένων Ακροατών

Για την προσθήκη προσαρμοσμένης συμπεριφοράς:

1. Δημιουργήστε μια κλάση ακροατή/εγγραφέα στο κατάλληλο bundle
2. Επισήμανσέ την ως ακροατή ή εγγραφέα γεγονότος στη διαμόρφωση υπηρεσίας
3. Εφαρμόστε τη μέθοδο χειριστή

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Κύρια Γεγονότα

| Γεγονός | Πότε πυροδοτείται |
|---------|-------------------|
| `kernel.request` | Κάθε αίτημα HTTP |
| `kernel.response` | Πριν την αποστολή της απόκρισης HTTP |
| `security.interactive_login` | Ο χρήστης συνδέεται |
| `doctrine.prePersist` | Πριν αποθηκευτεί για πρώτη φορά μια οντότητα |
| `doctrine.postUpdate` | Μετά την ενημέρωση μιας οντότητας |

## Γεγονότα Ειδικά για το Chamilo

Αυτά τα γεγονότα εκπέμπονται από τον κώδικα του Chamilo και αποτελούν τα κύρια σημεία ενσωμάτωσης για πρόσθετα. Οι σταθερές ορίζονται στο `Chamilo\CoreBundle\Event\Events`.

| Σταθερά | Σtring γεγονότος | Πότε πυροδοτείται |
|---------|------------------|-------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Μετά τη δημιουργία μαθήματος |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Πριν την πρόσβαση χρήστη σε μάθημα |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Πριν την εγγραφή χρήστη σε μάθημα |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Όταν χρήστης επιχειρεί επανεγγραφή σε συνεδρία |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Μετά την επικύρωση διαπιστευτηρίων εισόδου |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Μετά τον έλεγχο πρόσθετων συνθηκών εισόδου |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Κατά την απόδοση γραμμής εργαλείων του εργαλείου εγγράφων |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Κατά την απόδοση κουμπιών ενεργειών ανά αρχείο |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Κατά το άνοιγμα εγγράφου για προβολή |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Κατά την απόδοση συνδέσμων ενεργειών στη σελίδα αναφοράς άσκησης |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Μετά την υποβολή άσκησης από μαθητή |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Μετά την απάντηση κάθε ερώτησης |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Μετά τη δημιουργία διαδρομής μάθησης |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Όταν μαθητής ανοίγει αντικείμενο LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Μετά την ολοκλήρωση διαδρομής μάθησης από μαθητή |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Κατά τη δημιουργία λίστας μπλοκ πίνακα ελέγχου διαχειριστή |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Μετά τη δημιουργία λογαριασμού χρήστη |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Μετά την ενημέρωση λογαριασμού χρήστη |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Μετά τη διαγραφή λογαριασμού χρήστη |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Μετά τη δημιουργία αντικειμένου χαρτοφυλακίου |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Κατά τη διαμόρφωση σώματος ειδοποίησης |

## Παράδειγμα Πρόσθετου: Προσθήκη Κουμπιού στον Προβολέα Εγγράφων

Αυτή η ενότητα περιγράφει βήμα-βήμα πώς ένα πρόσθετο χρησιμοποιεί εγγραφέα γεγονότων για να εισάγει ένα κουμπί σε υπάρχουσα σελίδα του Chamilo — χωρίς τροποποίηση πυρήνα κώδικα.

---

---
### Σενάριο

Ένα πρόσθετο με το όνομα **MyViewer** θέλει να προσθέσει ένα κουμπί «Άνοιγμα στο MyViewer» δίπλα σε κάθε έγγραφο στον διαχειριστή αρχείων του μαθήματος. Το σχετικό γεγονός είναι το `Events::DOCUMENT_ITEM_VIEW`, το οποίο εκπέμπεται από το Chamilo κάθε φορά που ένα έγγραφο πρόκειται να εμφανιστεί, μεταφέροντας την οντότητα `CDocument` και μια μεταβλητή λίστα συνδέσμων.

### Δομή καταλόγου πρόσθετου

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### Κύρια κλάση πρόσθετου (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

Η βασική κλάση `Plugin` παρέχει τις μεθόδους `isEnabled()`, `get($settingKey)` και βοηθητικές συναρτήσεις για την εγκατάσταση εργαλείων μαθήματος και ρυθμίσεων. Το μοτίβο singleton (`static $instance`) είναι η τυπική σύμβαση του Chamilo επειδή η κλάση του πρόσθετου δημιουργείται επίσης εκτός του δοχείου Symfony (σε legacy σελίδες PHP).

### Συνδρομητής γεγονότων (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

Η μέθοδος `addLink()` προσθέτει HTML στον πίνακα που αποδίδει το πρότυπο προβολής εγγράφων του Chamilo μαζί με τις ενσωματωμένες ενέργειες «Λήψη» και «Προεπισκόπηση». Ο συνδρομητής δεν τροποποιεί ποτέ αρχεία πυρήνα του Chamilo.

### Εγγραφή

Δεν απαιτείται χειροκίνητη εγγραφή υπηρεσίας. Το `config/services.yaml` του Chamilo ενεργοποιεί τη σημαία `autoconfigure` του Symfony παγκοσμίως, η οποία επισημαίνει αυτόματα οποιαδήποτε κλάση υλοποιεί το `EventSubscriberInterface` ως `kernel.event_subscriber`. Εφόσον φορτώνεται ο κατάλογος του πρόσθετου (μέσω classmap του Composer ή PSR-4 autoload), το Symfony εντοπίζει τον συνδρομητή στην επόμενη εκκαθάριση cache.

```bash
php bin/console cache:clear
```

### Πώς ρέει τα δεδομένα του γεγονότος

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

Πολλαπλά πρόσθετα μπορούν να εγγραφούν ανεξάρτητα στο ίδιο γεγονός· το καθένα προσθέτει στα κοινόχρηστα δεδομένα χωρίς να γνωρίζει τα άλλα. Η σειρά εκτέλεσης ακολουθεί το σύστημα προτεραιότητας του Symfony — περάστε έναν ακέραιο προτεραιότητας ως το δεύτερο στοιχείο του tuple του χειριστή στο `getSubscribedEvents()` αν η σειρά έχει σημασία:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```