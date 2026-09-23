# Händelser och lyssnare

Chamilo använder Symfonys händelsesystem för löst kopplad kommunikation mellan komponenter.

## Händelselyssnare

Chamilo använder två lyssnarplatser:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP-lyssnare (request, response, exception, inloggning/utloggning, kurs-/sessionsåtkomst osv.). Exempel: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entitetslyssnare kopplade till specifika entiteter. Exempel: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Välj den plats som matchar det du behöver reagera på: händelser i HTTP-pipelinen hör hemma i `EventListener/`; entiteters livscykelkrokar hör hemma i `Entity/Listener/`.

## Händelseprenumeranter

Placerade i `src/CoreBundle/EventSubscriber/`:

Händelseprenumeranter kan lyssna på flera händelser:

* **Säkerhetsprenumeranter** — Hanterar inloggnings-/utloggningshändelser, spårar inloggningsförsök
* **API-prenumeranter** — För-/efterbehandling av API-förfrågningar
* **Doctrine-prenumeranter** — Reagerar på entiteters livscykelhändelser

## Doctrine-livscykelhändelser

Entiteter använder `#[ORM\HasLifecycleCallbacks]` för databasnivåhändelser:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Skapa egna lyssnare

För att lägga till eget beteende:

1. Skapa en lyssnar-/prenumerantklass i lämpligt bundle
2. Märk den som händelselyssnare eller prenumerant i tjänstekonfigurationen
3. Implementera hanterarmetoden

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Viktiga händelser

| Händelse | När den utlöses |
|-------|--------------|
| `kernel.request` | Varje HTTP-förfrågan |
| `kernel.response` | Innan HTTP-svaret skickas |
| `security.interactive_login` | Användaren loggar in |
| `doctrine.prePersist` | Innan en entitet sparas första gången |
| `doctrine.postUpdate` | Efter att en entitet har uppdaterats |

## Chamilo-specifika händelser

Dessa händelser skickas av Chamilos egen kod och är de primära integrationspunkterna för tillägg. Konstanter definieras i `Chamilo\CoreBundle\Event\Events`.

| Konstant | Händelsesträng | När den utlöses |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Efter att en kurs har skapats |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Innan en användare får åtkomst till en kurs |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Innan en användare anmäler sig till en kurs |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | När en användare försöker anmäla sig på nytt till en session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Efter att inloggningsuppgifter har validerats |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Efter att ytterligare inloggningsvillkor har kontrollerats |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | När verktygsfältet i dokumentverktyget renderas |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | När åtgärdsknappar per fil renderas |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | När ett dokument öppnas för visning |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | När övningsrapportens sida renderar sina åtgärdslänkar |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Efter att en deltagare har skickat in en övning |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Efter att varje fråga har besvarats |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Efter att en lärstig har skapats |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | När en deltagare öppnar ett LP-objekt |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Efter att en deltagare har slutfört en lärstig |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | När administratörspanelen bygger sin blocklista |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Efter att ett användarkonto har skapats |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Efter att ett användarkonto har uppdaterats |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Efter att ett användarkonto har tagits bort |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Efter att ett portföljobjekt har skapats |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | När en aviseringskropp formateras |

## Tilläggsexempel: Lägga till en knapp i dokumentvisaren

Detta avsnitt går igenom hur ett tillägg använder en händelseprenumerant för att injicera en knapp på en befintlig Chamilo-sida — utan att kärnkoden behöver ändras.

### Scenario

Ett plugin kallat **MyViewer** vill lägga till en knapp "Öppna i MyViewer" bredvid varje dokument i kursens filhanterare. Den relevanta händelsen är `Events::DOCUMENT_ITEM_VIEW`, som Chamilo skickar ut när ett dokument är på väg att visas, och som bär med sig entiteten `CDocument` samt en föränderlig lista med länkar.

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

### Huvudklass för pluginet (`src/MyViewerPlugin.php`)

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

Basklassen `Plugin` tillhandahåller `isEnabled()`, `get($settingKey)` samt hjälpmetoder för att installera kursverktyg och inställningar. Singleton-mönstret (`static $instance`) är den vanliga Chamilo-konventionen eftersom plugin-klassen även instansieras utanför Symfony-containern (på äldre PHP-sidor).

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

`addLink()` lägger till HTML i den array som Chamilos dokumentvisningsmall renderar tillsammans med de inbyggda åtgärderna "Ladda ned" och "Förhandsgranska". Prenumeranten ändrar aldrig Chamilos kärnfiler.

### Registrering

Ingen manuell tjänsteregistrering behövs. Chamilos `config/services.yaml` aktiverar Symfonys flagga `autoconfigure` globalt, vilket automatiskt taggar varje klass som implementerar `EventSubscriberInterface` som en `kernel.event_subscriber`. Så länge plugin-katalogen laddas (via Composers classmap eller PSR-4-autoload) plockar Symfony upp prenumeranten vid nästa cache-rensning.

```bash
php bin/console cache:clear
```

### How the event data flows

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

Flera plugin kan prenumerera på samma händelse oberoende av varandra; vart och ett lägger till i den delade datan utan att känna till de andra. Körningsordningen följer Symfonys prioritetssystem — skicka ett prioritetsheltal som det andra elementet i hanterartupeln i `getSubscribedEvents()` om ordningen spelar roll:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```