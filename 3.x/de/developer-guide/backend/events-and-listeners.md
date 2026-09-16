# Ereignisse und Listener

Chamilo verwendet das Ereignissystem von Symfony für entkoppelte Kommunikation zwischen Komponenten.

## Event-Listener

Chamilo verwendet zwei Listener-Speicherorte:

* **`src/CoreBundle/EventListener/`** — Symfony-Kernel-/HTTP-Listener (Request, Response, Exception, Login/Logout, Kurs-/Sitzungszugriff usw.). Beispiele: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-Entity-Listener, die an bestimmte Entitäten gebunden sind. Beispiele: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Wählen Sie den Speicherort, der zu dem passt, worauf Sie reagieren müssen: Ereignisse der HTTP-Pipeline gehören nach `EventListener/`; Lebenszyklus-Hooks von Entitäten gehören nach `Entity/Listener/`.

## Event-Subscriber

Befinden sich in `src/CoreBundle/EventSubscriber/`:

Event-Subscriber können auf mehrere Ereignisse hören:

* **Security-Subscriber** — Behandeln Login-/Logout-Ereignisse, protokollieren Anmeldeversuche
* **API-Subscriber** — Vor-/Nachverarbeitung für API-Anfragen
* **Doctrine-Subscriber** — Reagieren auf Lebenszyklusereignisse von Entitäten

## Doctrine-Lebenszyklusereignisse

Entitäten verwenden `#[ORM\HasLifecycleCallbacks]` für ereignisse auf Datenbankebene:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Eigene Listener erstellen

So fügen Sie eigenes Verhalten hinzu:

1. Erstellen Sie eine Listener-/Subscriber-Klasse im entsprechenden Bundle
2. Markieren Sie sie in der Service-Konfiguration als Event-Listener oder Subscriber
3. Implementieren Sie die Handler-Methode

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Wichtige Ereignisse

| Ereignis | Wann es ausgelöst wird |
|-------|--------------|
| `kernel.request` | Bei jeder HTTP-Anfrage |
| `kernel.response` | Vor dem Senden der HTTP-Antwort |
| `security.interactive_login` | Benutzer meldet sich an |
| `doctrine.prePersist` | Bevor eine Entität erstmals gespeichert wird |
| `doctrine.postUpdate` | Nachdem eine Entität aktualisiert wurde |

## Chamilo-spezifische Ereignisse

Diese Ereignisse werden vom eigenen Code von Chamilo ausgelöst und sind die primären Integrationspunkte für Plugins. Konstanten sind in `Chamilo\CoreBundle\Event\Events` definiert.

| Konstante | Ereigniszeichenkette | Wann es ausgelöst wird |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Nachdem ein Kurs erstellt wurde |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Bevor ein Benutzer auf einen Kurs zugreift |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Bevor ein Benutzer sich in einen Kurs einschreibt |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Wenn ein Benutzer versucht, sich erneut für eine Sitzung anzumelden |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Nachdem die Anmeldedaten validiert wurden |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Nachdem zusätzliche Anmeldebedingungen geprüft wurden |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Wenn die Symbolleiste des Dokumenten-Tools gerendert wird |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Wenn Aktionsbuttons pro Datei gerendert werden |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Wenn ein Dokument zur Ansicht geöffnet wird |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Wenn die Übungsberichtsseite ihre Aktionslinks rendert |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Nachdem ein Lernender eine Übung abgibt |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Nachdem jede Frage beantwortet wurde |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Nachdem ein Lernpfad erstellt wurde |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Wenn ein Lernender ein LP-Element öffnet |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Nachdem ein Lernender einen Lernpfad abgeschlossen hat |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Wenn das Admin-Dashboard seine Blockliste aufbaut |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Nachdem ein Benutzerkonto erstellt wurde |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Nachdem ein Benutzerkonto aktualisiert wurde |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Nachdem ein Benutzerkonto gelöscht wurde |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Nachdem ein Portfolio-Element erstellt wurde |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Wenn der Inhalt einer Benachrichtigung formatiert wird |

## Plugin-Beispiel: Einen Button in den Dokumenten-Viewer einfügen

Dieser Abschnitt zeigt, wie ein Plugin über einen Event-Subscriber einen Button in eine bestehende Chamilo-Seite einfügt — ohne Änderung des Kerncodes.

### Szenario

Ein Plugin namens **MyViewer** möchte neben jedem Dokument im Kursdateimanager eine Schaltfläche „In MyViewer öffnen“ hinzufügen. Das relevante Event ist `Events::DOCUMENT_ITEM_VIEW`, das von Chamilo ausgelöst wird, sobald ein Dokument angezeigt werden soll, und die Entität `CDocument` sowie eine veränderbare Liste von Links mitführt.

### Verzeichnisstruktur des Plugins

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

### Hauptklasse des Plugins (`src/MyViewerPlugin.php`)

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

Die Basisklasse `Plugin` stellt `isEnabled()`, `get($settingKey)` sowie Hilfsmethoden für die Installation von Kurstools und Einstellungen bereit. Das Singleton-Muster (`static $instance`) ist die übliche Chamilo-Konvention, weil die Plugin-Klasse auch außerhalb des Symfony-Containers instanziiert wird (in älteren PHP-Seiten).

### Event-Subscriber (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` hängt HTML an das Array an, das das Dokumentansicht-Template von Chamilo neben den integrierten Aktionen „Download“ und „Vorschau“ rendert. Der Subscriber ändert niemals Chamilo-Core-Dateien.

### Registrierung

Eine manuelle Service-Registrierung ist nicht erforderlich. Die Datei `config/services.yaml` von Chamilo aktiviert global das Symfony-Flag `autoconfigure`, wodurch jede Klasse, die `EventSubscriberInterface` implementiert, automatisch als `kernel.event_subscriber` markiert wird. Sobald das Plugin-Verzeichnis geladen ist (über die Classmap von Composer oder PSR-4-Autoload), erkennt Symfony den Subscriber beim nächsten Cache-Clear.

```bash
php bin/console cache:clear
```

### Ablauf der Event-Daten

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

Mehrere Plugins können unabhängig voneinander dasselbe Event abonnieren; jedes hängt an die gemeinsamen Daten an, ohne von den anderen zu wissen. Die Ausführungsreihenfolge folgt dem Prioritätssystem von Symfony — übergeben Sie eine Prioritätszahl als zweites Element des Handler-Tupels in `getSubscribedEvents()`, wenn die Reihenfolge relevant ist:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```