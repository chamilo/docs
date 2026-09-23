# Hendelser og lyttere

Chamilo bruker Symfony sitt hendelsessystem for frakoblet kommunikasjon mellom komponenter.

## Hendelseslyttere

Chamilo bruker to lytterplasseringer:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP-lyttere (forespørsel, svar, unntak, innlogging/utlogging, kurs-/øktilgang osv.). Eksempler: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entitetslyttere knyttet til spesifikke entiteter. Eksempler: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Velg plasseringen som matcher det du trenger å reagere på: hendelser i HTTP-pipelinen går i `EventListener/`; livssykluskroker for entiteter går i `Entity/Listener/`.

## Hendelsesabonnenter

Plassert i `src/CoreBundle/EventSubscriber/`:

Hendelsesabonnenter kan lytte til flere hendelser:

* **Sikkerhetsabonnenter** — Håndterer innloggings-/utloggingshendelser, sporer innloggingsforsøk
* **API-abonnenter** — For-/etterbehandling av API-forespørsler
* **Doctrine-abonnenter** — Reagerer på livssyklushendelser for entiteter

## Doctrine-livssyklushendelser

Entiteter bruker `#[ORM\HasLifecycleCallbacks]` for hendelser på databasenivå:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Opprette egendefinerte lyttere

For å legge til egendefinert atferd:

1. Opprett en lytter-/abonnentklasse i den aktuelle bundelen
2. Merk den som hendelseslytter eller -abonnent i tjenestekonfigurasjonen
3. Implementer behandlermetoden

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Viktige hendelser

| Hendelse | Når den utløses |
|-------|--------------|
| `kernel.request` | Hver HTTP-forespørsel |
| `kernel.response` | Før HTTP-svaret sendes |
| `security.interactive_login` | Bruker logger inn |
| `doctrine.prePersist` | Før en entitet lagres første gang |
| `doctrine.postUpdate` | Etter at en entitet er oppdatert |

## Chamilo-spesifikke hendelser

Disse hendelsene utløses av Chamilo sin egen kode og er de primære integrasjonspunktene for programtillegg. Konstanter er definert i `Chamilo\CoreBundle\Event\Events`.

| Konstant | Hendelsesstreng | Når den utløses |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Etter at et kurs er opprettet |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Før en bruker får tilgang til et kurs |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Før en bruker melder seg på et kurs |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Når en bruker forsøker å melde seg på en økt på nytt |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Etter at innloggingsopplysninger er validert |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Etter at ytterligere innloggingsbetingelser er sjekket |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Når verktøylinjen i dokumentverktøyet vises |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Når handlingsknapper per fil vises |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Når et dokument åpnes for visning |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Når øvelsesrapport-siden viser sine handlingslenker |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Etter at en lærende sender inn en øvelse |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Etter at hvert spørsmål er besvart |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Etter at en læringssti er opprettet |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Når en lærende åpner et LP-element |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Etter at en lærende fullfører en læringssti |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Når administrasjonspanelet bygger blokklisten sin |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Etter at en brukerkonto er opprettet |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Etter at en brukerkonto er oppdatert |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Etter at en brukerkonto er slettet |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Etter at et porteføljeelement er opprettet |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Når innholdet i et varsel formateres |

## Programtilleggseksempel: Legge til en knapp i dokumentviseren

Denne delen går gjennom hvordan et programtillegg bruker en hendelsesabonnent til å injisere en knapp på en eksisterende Chamilo-side — uten at kjernekoden trenger å endres.

### Scenario

En plugin kalt **MyViewer** ønsker å legge til en «Åpne i MyViewer»-knapp ved siden av hvert dokument i kursfilbehandleren. Den relevante hendelsen er `Events::DOCUMENT_ITEM_VIEW`, som utløses av Chamilo hver gang et dokument er i ferd med å vises, og som bærer `CDocument`-entiteten og en muterbar liste over lenker.

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

Grunnklassen `Plugin` tilbyr `isEnabled()`, `get($settingKey)` og hjelpemetoder for å installere kursverktøy og innstillinger. Singleton-mønsteret (`static $instance`) er den vanlige Chamilo-konvensjonen fordi plugin-klassen også instansieres utenfor Symfony-containeren (på eldre PHP-sider).

### Hendelsesabonnent (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` legger HTML til tabellen som Chamilos dokumentvisningsmal gjengir sammen med de innebygde handlingene «Last ned» og «Forhåndsvis». Abonnenten endrer aldri Chamilo-kjernefiler.

### Registrering

Ingen manuell tjenesteregistrering er nødvendig. Chamilos `config/services.yaml` aktiverer Symfonys `autoconfigure`-flagg globalt, som automatisk merker enhver klasse som implementerer `EventSubscriberInterface` som en `kernel.event_subscriber`. Så lenge plugin-katalogen lastes (via Composers classmap eller PSR-4-autoload), plukker Symfony opp abonnenten ved neste cache-tømming.

```bash
php bin/console cache:clear
```

### Hvordan hendelsesdataene flyter

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

Flere plugins kan abonnere på samme hendelse uavhengig av hverandre; hver legger til i de delte dataene uten å kjenne til de andre. Utførelsesrekkefølgen følger Symfonys prioritetssystem — send et prioritetstall som det andre elementet i behandler-tuppelen i `getSubscribedEvents()` hvis rekkefølge er viktig:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```