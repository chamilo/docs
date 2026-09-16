# Συμβάντα και Listeners

Το Chamilo χρησιμοποιεί το σύστημα συμβάντων του Symfony για αποσυνδεδεμένη επικοινωνία μεταξύ των συστατικών.

## Event Listeners

Το Chamilo χρησιμοποιεί δύο θέσεις listeners:

* **`src/CoreBundle/EventListener/`** — Listeners του πυρήνα Symfony/HTTP (αίτημα, απόκριση, εξαίρεση, σύνδεση/αποσύνδεση, πρόσβαση σε μάθημα/συνεδρία κ.λπ.). Παραδείγματα: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine entity listeners συνδεδεμένοι σε συγκεκριμένες οντότητες. Παραδείγματα: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Επιλέξτε τη θέση που αντιστοιχεί σε αυτό στο οποίο θέλετε να αντιδράσετε: τα συμβάντα του HTTP-pipeline πηγαίνουν στο `EventListener/`; τα hooks κύκλου ζωής οντοτήτων πηγαίνουν στο `Entity/Listener/`.

## Event Subscribers

Βρίσκονται στο `src/CoreBundle/EventSubscriber/`:

Οι event subscribers μπορούν να ακούν πολλαπλά συμβάντα:

* **Security subscribers** — Χειρίζονται συμβάντα σύνδεσης/αποσύνδεσης, καταγράφουν προσπάθειες σύνδεσης
* **API subscribers** — Προ/μετα επεξεργασία για αιτήματα API
* **Doctrine subscribers** — Αντιδρούν σε συμβάντα κύκλου ζωής οντοτήτων

## Συμβάντα κύκλου ζωής Doctrine

Οι οντότητες χρησιμοποιούν `#[ORM\HasLifecycleCallbacks]` για συμβάντα σε επίπεδο βάσης δεδομένων:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Δημιουργία προσαρμοσμένων Listeners

Για να προσθέσετε προσαρμοσμένη συμπεριφορά:

1. Δημιουργήστε μια κλάση listener/subscriber στο κατάλληλο bundle
2. Επισημάνετέ την ως event listener ή subscriber στη διαμόρφωση υπηρεσιών
3. Υλοποιήστε τη μέθοδο χειρισμού

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Βασικά συμβάντα

| Συμβάν | Πότε ενεργοποιείται |
|-------|--------------|
| `kernel.request` | Κάθε αίτημα HTTP |
| `kernel.response` | Πριν την αποστολή της απόκρισης HTTP |
| `security.interactive_login` | Ο χρήστης συνδέεται |
| `doctrine.prePersist` | Πριν αποθηκευτεί για πρώτη φορά μια οντότητα |
| `doctrine.postUpdate` | Μετά την ενημέρωση μιας οντότητας |

## Συμβάντα ειδικά για το Chamilo

Αυτά τα συμβάντα αποστέλλονται από τον ίδιο τον κώδικα του Chamilo και αποτελούν τα κύρια σημεία ενσωμάτωσης για πρόσθετα. Οι σταθερές ορίζονται στο `Chamilo\CoreBundle\Event\Events`.

| Σταθερά | Συμβολοσειρά συμβάντος | Πότε ενεργοποιείται |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Μετά τη δημιουργία ενός μαθήματος |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Πριν αποκτήσει πρόσβαση ένας χρήστης σε ένα μάθημα |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Πριν εγγραφεί ένας χρήστης σε ένα μάθημα |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Όταν ένας χρήστης επιχειρεί να επανεγγραφεί σε μια συνεδρία |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Μετά την επικύρωση των διαπιστευτηρίων σύνδεσης |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Μετά τον έλεγχο πρόσθετων συνθηκών σύνδεσης |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Όταν αποδίδεται η γραμμή εργαλείων του εργαλείου εγγράφων |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Όταν αποδίδονται τα κουμπιά ενεργειών ανά αρχείο |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Όταν ανοίγεται ένα έγγραφο για προβολή |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Όταν η σελίδα αναφοράς άσκησης αποδίδει τους συνδέσμους ενεργειών της |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Μετά την υποβολή μιας άσκησης από έναν εκπαιδευόμενο |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Μετά την απάντηση κάθε ερώτησης |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Μετά τη δημιουργία μιας μαθησιακής διαδρομής |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Όταν ένας εκπαιδευόμενος ανοίγει ένα στοιχείο LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Μετά την ολοκλήρωση μιας μαθησιακής διαδρομής από έναν εκπαιδευόμενο |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Όταν ο πίνακας διαχείρισης δημιουργεί τη λίστα των μπλοκ του |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Μετά τη δημιουργία ενός λογαριασμού χρήστη |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Μετά την ενημέρωση ενός λογαριασμού χρήστη |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Μετά τη διαγραφή ενός λογαριασμού χρήστη |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Μετά τη δημιουργία ενός στοιχείου χαρτοφυλακίου |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Όταν μορφοποιείται το σώμα μιας ειδοποίησης |

## Παράδειγμα πρόσθετου: Προσθήκη κουμπιού στον προβολέα εγγράφων

Αυτή η ενότητα παρουσιάζει πώς ένα πρόσθετο χρησιμοποιεί έναν event subscriber για να εισαγάγει ένα κουμπί σε μια υπάρχουσα σελίδα του Chamilo — χωρίς να απαιτείται τροποποίηση του κώδικα πυρήνα.

### Σενάριο

Ένα πρόσθετο με όνομα **MyViewer** θέλει να προσθέσει ένα κουμπί «Άνοιγμα στο MyViewer» δίπλα σε κάθε έγγραφο στον διαχειριστή αρχείων του μαθήματος. Το σχετικό γεγονός είναι το `Events::DOCUMENT_ITEM_VIEW`, το οποίο αποστέλλεται από το Chamilo κάθε φορά που ένα έγγραφο πρόκειται να εμφανιστεί, μεταφέροντας την οντότητα `CDocument` και μια μεταβλητή λίστα συνδέσμων.

### Διάταξη καταλόγου πρόσθετου

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

Η βασική κλάση `Plugin` παρέχει τις μεθόδους `isEnabled()`, `get($settingKey)` και βοηθητικές συναρτήσεις για την εγκατάσταση εργαλείων μαθήματος και ρυθμίσεων. Το μοτίβο singleton (`static $instance`) είναι η τυπική σύμβαση του Chamilo, επειδή η κλάση του πρόσθετου δημιουργείται επίσης εκτός του περιέκτη Symfony (σε παλαιότερες σελίδες PHP).

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

Η `addLink()` προσαρτά HTML στον πίνακα που το πρότυπο προβολής εγγράφων του Chamilo αποδίδει δίπλα στις ενσωματωμένες ενέργειες «Λήψη» και «Προεπισκόπηση». Ο συνδρομητής δεν τροποποιεί ποτέ αρχεία του πυρήνα του Chamilo.

### Καταχώριση

Δεν απαιτείται χειροκίνητη καταχώριση υπηρεσίας. Το `config/services.yaml` του Chamilo ενεργοποιεί καθολικά τη σημαία `autoconfigure` του Symfony, η οποία επισημαίνει αυτόματα οποιαδήποτε κλάση που υλοποιεί το `EventSubscriberInterface` ως `kernel.event_subscriber`. Εφόσον ο κατάλογος του πρόσθετου φορτώνεται (μέσω classmap του Composer ή PSR-4 autoload), το Symfony εντοπίζει τον συνδρομητή στην επόμενη εκκαθάριση της προσωρινής μνήμης.

```bash
php bin/console cache:clear
```

### Πώς ρέουν τα δεδομένα του γεγονότος

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

Πολλά πρόσθετα μπορούν να εγγραφούν ανεξάρτητα στο ίδιο γεγονός· καθένα προσαρτά δεδομένα στα κοινά δεδομένα χωρίς να γνωρίζει τα υπόλοιπα. Η σειρά εκτέλεσης ακολουθεί το σύστημα προτεραιότητας του Symfony — περάστε έναν ακέραιο προτεραιότητας ως δεύτερο στοιχείο της πλειάδας χειριστή στο `getSubscribedEvents()` εάν έχει σημασία η σειρά:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```