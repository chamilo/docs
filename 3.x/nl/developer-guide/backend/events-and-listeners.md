# Events en Listeners

Chamilo gebruikt het eventsysteem van Symfony voor ontkoppelde communicatie tussen componenten.

## Event Listeners

Chamilo gebruikt twee locaties voor listeners:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP-listeners (request, response, exception, login/logout, toegang tot cursus/sessie, enz.). Voorbeelden: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entitylisteners die aan specifieke entities zijn gekoppeld. Voorbeelden: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Kies de locatie die past bij waar u op wilt reageren: HTTP-pipeline-events horen in `EventListener/`; entity-lifecyclehooks horen in `Entity/Listener/`.

## Event Subscribers

Gelegen in `src/CoreBundle/EventSubscriber/`:

Event subscribers kunnen naar meerdere events luisteren:

* **Security subscribers** — Verwerken login-/logout-events, volgen inlogpogingen
* **API subscribers** — Pre-/postverwerking voor API-requests
* **Doctrine subscribers** — Reageren op entity-lifecycle-events

## Doctrine Lifecycle Events

Entities gebruiken `#[ORM\HasLifecycleCallbacks]` voor events op databaseniveau:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Aangepaste listeners maken

Om aangepast gedrag toe te voegen:

1. Maak een listener-/subscriberklasse in de juiste bundle
2. Tag deze als event listener of subscriber in de serviceconfiguratie
3. Implementeer de handler-methode

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Belangrijke events

| Event | Wanneer het wordt afgevuurd |
|-------|--------------|
| `kernel.request` | Bij elk HTTP-request |
| `kernel.response` | Voordat de HTTP-response wordt verzonden |
| `security.interactive_login` | Gebruiker logt in |
| `doctrine.prePersist` | Voordat een entity voor het eerst wordt opgeslagen |
| `doctrine.postUpdate` | Nadat een entity is bijgewerkt |

## Chamilo-specifieke events

Deze events worden door de eigen code van Chamilo verzonden en zijn de primaire integratiepunten voor plugins. Constanten zijn gedefinieerd in `Chamilo\CoreBundle\Event\Events`.

| Constante | Event-string | Wanneer het wordt afgevuurd |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Nadat een cursus is aangemaakt |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Voordat een gebruiker een cursus opent |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Voordat een gebruiker zich inschrijft voor een cursus |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Wanneer een gebruiker probeert zich opnieuw in te schrijven voor een sessie |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Nadat inloggegevens zijn gevalideerd |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Nadat aanvullende inlogvoorwaarden zijn gecontroleerd |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Wanneer de werkbalk van de documententool wordt weergegeven |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Wanneer actieknoppen per bestand worden weergegeven |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Wanneer een document wordt geopend om te bekijken |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Wanneer de oefeningrapportpagina haar actielinks weergeeft |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Nadat een lerende een oefening indient |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Nadat elke vraag is beantwoord |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Nadat een leerpad is aangemaakt |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Wanneer een lerende een LP-item opent |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Nadat een lerende een leerpad voltooit |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Wanneer het beheerdersdashboard zijn blokkenlijst opbouwt |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Nadat een gebruikersaccount is aangemaakt |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Nadat een gebruikersaccount is bijgewerkt |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Nadat een gebruikersaccount is verwijderd |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Nadat een portfolio-item is aangemaakt |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Wanneer de inhoud van een melding wordt opgemaakt |

## Pluginvoorbeeld: een knop toevoegen aan de documentviewer

Deze sectie beschrijft hoe een plugin een event subscriber gebruikt om een knop in een bestaande Chamilo-pagina te injecteren — zonder wijziging van de kerncode.

### Scenario

Een plugin genaamd **MyViewer** wil een knop "Openen in MyViewer" toevoegen naast elk document in de bestandsbeheerder van de cursus. Het relevante event is `Events::DOCUMENT_ITEM_VIEW`, dat door Chamilo wordt verzonden wanneer een document op het punt staat te worden weergegeven, en dat de `CDocument`-entiteit en een wijzigbare lijst van links meedraagt.

### Plugin directory layout

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

### Hoofdklasse van de plugin (`src/MyViewerPlugin.php`)

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

De basisklasse `Plugin` biedt `isEnabled()`, `get($settingKey)` en helpers voor het installeren van cursustools en instellingen. Het singleton-patroon (`static $instance`) is de standaardconventie van Chamilo, omdat de pluginklasse ook buiten de Symfony-container wordt geïnstantieerd (in legacy PHP-pagina's).

### Event subscriber (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` voegt HTML toe aan de array die het documentweergavesjabloon van Chamilo naast de ingebouwde acties "Downloaden" en "Voorbeeld" rendert. De subscriber wijzigt nooit kernbestanden van Chamilo.

### Registratie

Er is geen handmatige serviceregistratie nodig. Het bestand `config/services.yaml` van Chamilo schakelt de `autoconfigure`-vlag van Symfony globaal in, waardoor elke klasse die `EventSubscriberInterface` implementeert automatisch als `kernel.event_subscriber` wordt getagd. Zolang de plugindirectory wordt geladen (via de classmap van Composer of PSR-4-autoload), pikt Symfony de subscriber op bij de volgende cache-clear.

```bash
php bin/console cache:clear
```

### Hoe de eventgegevens stromen

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

Meerdere plugins kunnen onafhankelijk van elkaar op hetzelfde event abonneren; elk voegt toe aan de gedeelde gegevens zonder van de anderen te weten. De uitvoeringsvolgorde volgt het prioriteitssysteem van Symfony — geef een prioriteitsgeheel getal door als tweede element van de handler-tuple in `getSubscribedEvents()` als de volgorde van belang is:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```