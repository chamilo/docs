# Events and Listeners

Chamilo anvender Symfony's event-system til afkoblet kommunikation mellem komponenter.

## Event Listeners

Chamilo anvender to lytterplaceringer:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP-lyttere (request, response, exception, login/logout, kursus-/sessionsadgang osv.). Eksempler: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entitetslyttere knyttet til specifikke entiteter. Eksempler: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Vælg den placering, der matcher det, du skal reagere på: HTTP-pipeline-events hører hjemme i `EventListener/`; entitets-livscyklus-hooks hører hjemme i `Entity/Listener/`.

## Event Subscribers

Placeret i `src/CoreBundle/EventSubscriber/`:

Event-subscribers kan lytte til flere events:

* **Sikkerheds-subscribers** — Håndterer login-/logout-events, sporer loginforsøg
* **API-subscribers** — For-/efterbehandling af API-forespørgsler
* **Doctrine-subscribers** — Reagerer på entitets-livscyklus-events

## Doctrine Lifecycle Events

Entiteter anvender `#[ORM\HasLifecycleCallbacks]` til database-niveau-events:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Oprettelse af brugerdefinerede lyttere

Sådan tilføjer du brugerdefineret adfærd:

1. Opret en lytter-/subscriber-klasse i det relevante bundle
2. Tag den som event-lytter eller subscriber i servicekonfigurationen
3. Implementér handler-metoden

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Centrale events

| Event | Hvornår den udløses |
|-------|--------------|
| `kernel.request` | Ved hver HTTP-forespørgsel |
| `kernel.response` | Før HTTP-svaret sendes |
| `security.interactive_login` | Brugeren logger ind |
| `doctrine.prePersist` | Før en entitet gemmes første gang |
| `doctrine.postUpdate` | Efter en entitet er opdateret |

## Chamilo-specifikke events

Disse events udsendes af Chamilo's egen kode og er de primære integrationspunkter for plugins. Konstanter er defineret i `Chamilo\CoreBundle\Event\Events`.

| Konstant | Event-streng | Hvornår den udløses |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Efter et kursus er oprettet |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Før en bruger tilgår et kursus |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Før en bruger tilmeldes et kursus |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Når en bruger forsøger at gen-tilmelde sig en session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Efter loginoplysninger er valideret |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Efter yderligere loginbetingelser er tjekket |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Når dokumentværktøjets værktøjslinje renderes |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Når handlingsknapper pr. fil renderes |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Når et dokument åbnes til visning |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Når øvelsesrapport-siden renderer sine handlingslinks |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Efter en kursist afleverer en øvelse |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Efter hvert spørgsmål er besvaret |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Efter et læringsforløb er oprettet |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Når en kursist åbner et LP-element |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Efter en kursist gennemfører et læringsforløb |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Når administrationsdashboardet opbygger sin blokliste |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Efter en brugerkonto er oprettet |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Efter en brugerkonto er opdateret |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Efter en brugerkonto er slettet |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Efter et portfolio-element er oprettet |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Når en notifikationsbrødtekst formateres |

## Plugin-eksempel: Tilføjelse af en knap til dokumentviseren

Dette afsnit gennemgår, hvordan et plugin anvender en event-subscriber til at indsætte en knap på en eksisterende Chamilo-side — uden ændring af kernekoden.

### Scenarie

Et plugin kaldet **MyViewer** vil tilføje en knap "Åbn i MyViewer" ved siden af hvert dokument i kursets filhåndtering. Den relevante hændelse er `Events::DOCUMENT_ITEM_VIEW`, som Chamilo udsender, når et dokument er ved at blive vist, og som medbringer entiteten `CDocument` samt en muterbar liste af links.

### Plugin-katalogstruktur

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

### Hovedplugin-klasse (`src/MyViewerPlugin.php`)

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

Basisklassen `Plugin` stiller `isEnabled()`, `get($settingKey)` og hjælpemetoder til installation af kursusværktøjer og indstillinger til rådighed. Singleton-mønstret (`static $instance`) er den gængse Chamilo-konvention, fordi plugin-klassen også instantieres uden for Symfony-containeren (på ældre PHP-sider).

### Event-subscriber (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` tilføjer HTML til det array, som Chamilos dokumentvisningsskabelon renderer sammen med de indbyggede handlinger "Download" og "Preview". Subscriberen ændrer aldrig Chamilos kernefiler.

### Registrering

Der kræves ingen manuel serviceregistrering. Chamilos `config/services.yaml` aktiverer Symfonys `autoconfigure`-flag globalt, hvilket automatisk tagger enhver klasse, der implementerer `EventSubscriberInterface`, som `kernel.event_subscriber`. Så længe plugin-kataloget indlæses (via Composers classmap eller PSR-4-autoload), opfanger Symfony subscriberen ved næste cache-rydning.

```bash
php bin/console cache:clear
```

### Hvordan hændelsesdataene flyder

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

Flere plugins kan abonnere på den samme hændelse uafhængigt af hinanden; hver tilføjer til de delte data uden at kende til de øvrige. Udførelsesrækkefølgen følger Symfonys prioritetssystem — angiv et prioritetstal som det andet element i handler-tuplen i `getSubscribedEvents()`, hvis rækkefølgen har betydning:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```