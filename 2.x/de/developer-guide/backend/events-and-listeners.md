# Ereignisse und Listener

Chamilo verwendet das Ereignissystem von Symfony für eine entkoppelte Kommunikation zwischen Komponenten.

## Ereignis-Listener

Chamilo verwendet zwei Speicherorte für Listener:

* **`src/CoreBundle/EventListener/`** — Symfony-Kernel/HTTP-Listener (Anfrage, Antwort, Ausnahme, Login/Logout, Kurs-/Sitzungszugriff usw.). Beispiele: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-Entitäts-Listener, die an spezifische Entitäten gebunden sind. Beispiele: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Wählen Sie den Speicherort, der zu dem passt, auf das Sie reagieren möchten: HTTP-Pipeline-Ereignisse gehören in `EventListener/`; Entitätslebenszyklus-Hooks gehören in `Entity/Listener/`.

## Ereignis-Abonnenten

Befindet sich in `src/CoreBundle/EventSubscriber/`:

Ereignis-Abonnenten können auf mehrere Ereignisse lauschen:

* **Sicherheits-Abonnenten** — Behandeln von Login-/Logout-Ereignissen, Verfolgen von Login-Versuchen
* **API-Abonnenten** — Vor-/Nachverarbeitung für API-Anfragen
* **Doctrine-Abonnenten** — Reagieren auf Entitätslebenszyklus-Ereignisse

## Doctrine-Lebenszyklus-Ereignisse

Entitäten verwenden `#[ORM\HasLifecycleCallbacks]` für Datenbankebene-Ereignisse:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Erstellen benutzerdefinierter Listener

Um benutzerdefiniertes Verhalten hinzuzufügen:

1. Erstellen Sie eine Listener-/Abonnenten-Klasse im entsprechenden Bundle
2. Kennzeichnen Sie sie als Ereignis-Listener oder Abonnent in der Dienstkonfiguration
3. Implementieren Sie die Handler-Methode

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Ihre Logik hier
    }
}
```

## Wichtige Ereignisse

| Ereignis | Wann es ausgelöst wird |
|-------|-----------------------|
| `kernel.request` | Bei jeder HTTP-Anfrage |
| `kernel.response` | Vor dem Senden der HTTP-Antwort |
| `security.interactive_login` | Benutzer meldet sich an |
| `doctrine.prePersist` | Bevor eine Entität zum ersten Mal gespeichert wird |
| `doctrine.postUpdate` | Nachdem eine Entität aktualisiert wurde |

## Chamilo-spezifische Ereignisse

Diese Ereignisse werden von Chamilos eigenem Code ausgelöst und sind die primären Integrationspunkte für Plugins. Konstanten sind in `Chamilo\CoreBundle\Event\Events` definiert.

| Konstante | Ereignis-String | Wann es ausgelöst wird |
|----------|----------------|-----------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Nachdem ein Kurs erstellt wurde |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Bevor ein Benutzer auf einen Kurs zugreift |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Bevor sich ein Benutzer für einen Kurs einschreibt |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Wenn ein Benutzer versucht, sich erneut für eine Sitzung anzumelden |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Nachdem die Anmeldedaten validiert wurden |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Nachdem zusätzliche Anmeldebedingungen überprüft wurden |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Wenn die Symbolleiste des Dokumententools gerendert wird |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Wenn pro Datei Aktionsschaltflächen gerendert werden |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Wenn ein Dokument zur Ansicht geöffnet wird |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Wenn die Übungsbericht-Seite ihre Aktionslinks rendert |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Nachdem ein Lernender eine Übung abgeschickt hat |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Nachdem jede Frage beantwortet wurde |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Nachdem ein Lernpfad erstellt wurde |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Wenn ein Lernender ein LP-Element öffnet |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Nachdem ein Lernender einen Lernpfad abgeschlossen hat |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Wenn das Admin-Dashboard seine Blockliste erstellt |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Nachdem ein Benutzerkonto erstellt wurde |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Nachdem ein Benutzerkonto aktualisiert wurde |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Nachdem ein Benutzerkonto gelöscht wurde |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Nachdem ein Portfolio-Element erstellt wurde |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Wenn der Inhalt einer Benachrichtigung formatiert wird |

## Plugin-Beispiel: Hinzufügen einer Schaltfläche zum Dokumenten-Viewer

Dieser Abschnitt führt durch, wie ein Plugin einen Ereignis-Abonnenten verwendet, um eine Schaltfläche in eine bestehende Chamilo-Seite einzufügen – ohne Änderung des Kerncodes.

---
### Szenario

Ein Plugin namens **MyViewer** möchte neben jedem Dokument im Kursdatei-Manager eine Schaltfläche "In MyViewer öffnen" hinzufügen. Das relevante Ereignis ist `Events::DOCUMENT_ITEM_VIEW`, das von Chamilo ausgelöst wird, wenn ein Dokument angezeigt werden soll. Es enthält die Entität `CDocument` und eine veränderbare Liste von Links.

### Plugin-Verzeichnisstruktur

```
public/plugin/MyViewer/
├── plugin.php                          # Deklariert $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin-Einstellungsseite
├── lang/                               # Übersetzungsstrings
└── src/
    ├── MyViewerPlugin.php              # Haupt-Plugin-Klasse (erweitert Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Ereignis-Subscriber
```

### Haupt-Plugin-Klasse (`src/MyViewerPlugin.php`)

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

Die Basisklasse `Plugin` bietet `isEnabled()`, `get($settingKey)` und Hilfsfunktionen für die Installation von Kurstools und Einstellungen. Das Singleton-Muster (`static $instance`) ist die Standardkonvention in Chamilo, da die Plugin-Klasse auch außerhalb des Symfony-Containers (in älteren PHP-Seiten) instanziiert wird.

### Ereignis-Subscriber (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` fügt HTML zu dem Array hinzu, das von Chamilos Dokumentenansicht-Template neben den integrierten Aktionen "Herunterladen" und "Vorschau" gerendert wird. Der Subscriber verändert niemals die Kern-Dateien von Chamilo.

### Registrierung

Es ist keine manuelle Dienstregistrierung erforderlich. Chamilos `config/services.yaml` aktiviert global das `autoconfigure`-Flag von Symfony, wodurch jede Klasse, die `EventSubscriberInterface` implementiert, automatisch als `kernel.event_subscriber` markiert wird. Solange das Plugin-Verzeichnis geladen ist (über Composers Classmap oder PSR-4 Autoload), erkennt Symfony den Subscriber beim nächsten Cache-Leeren.

```bash
php bin/console cache:clear
```

### Wie die Ereignisdaten fließen

```
Dokumentenliste wird gerendert
        │
        ▼
Chamilo löst DocumentItemViewEvent aus (enthält CDocument-Entität + leeres links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → fügt HTML-Link hinzu
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → fügt "Bearbeiten"-Schaltfläche hinzu
        │   (beliebig viele Plugins können dasselbe Ereignis abhören)
        ▼
Template rendert event->getLinks() neben den integrierten Dateiaktionen
```

Mehrere Plugins können unabhängig voneinander dasselbe Ereignis abonnieren; jedes fügt Daten zu den gemeinsamen Daten hinzu, ohne von den anderen zu wissen. Die Reihenfolge der Ausführung folgt dem Prioritätssystem von Symfony – übergeben Sie eine Prioritätsganzzahl als zweites Element des Handler-Tupels in `getSubscribedEvents()`, wenn die Reihenfolge wichtig ist:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // höher = früher
    ];
}
```