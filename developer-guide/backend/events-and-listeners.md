# Gebeurtenissen en Luisteraars

Chamilo gebruikt het gebeurtenissysteem van Symfony voor ontkoppelde communicatie tussen componenten.

## Gebeurtenisluisteraars

Chamilo gebruikt twee locaties voor luisteraars:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP-luisteraars (verzoek, respons, uitzondering, inloggen/uitloggen, cursus/sessie-toegang, enz.). Voorbeelden: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entiteitsluisteraars gekoppeld aan specifieke entiteiten. Voorbeelden: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Kies de locatie die past bij wat u wilt reageren: HTTP-pijplijngebeurtenissen gaan naar `EventListener/`; entiteitslevenscyclus-hooks gaan naar `Entity/Listener/`.

## Gebeurtenisabonnees

Gelegen in `src/CoreBundle/EventSubscriber/`:

Gebeurtenisabonnees kunnen naar meerdere gebeurtenissen luisteren:

* **Beveiligingsabonnees** — Behandelen inlog-/uitloggebeurtenissen, volgen inlogpogingen
* **API-abonnees** — Voor-/na-verwerking voor API-verzoeken
* **Doctrine-abonnees** — Reageren op entiteitslevenscyclusgebeurtenissen

## Doctrine Levenscyclusgebeurtenissen

Entiteiten gebruiken `#[ORM\HasLifecycleCallbacks]` voor gebeurtenissen op databaseniveau:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Aangepaste Luisteraars Maken

Om aangepast gedrag toe te voegen:

1. Maak een luisteraar/abonneeklasse in de juiste bundle
2. Tag deze als een gebeurtenisluisteraar of abonnee in de serviceconfiguratie
3. Implementeer de handler-methode

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Uw logica hier
    }
}
```

## Belangrijke Gebeurtenissen

| Gebeurtenis | Wanneer deze wordt geactiveerd |
|-------------|--------------------------------|
| `kernel.request` | Bij elk HTTP-verzoek |
| `kernel.response` | Vóór het verzenden van de HTTP-respons |
| `security.interactive_login` | Gebruiker logt in |
| `doctrine.prePersist` | Vóór een entiteit voor het eerst wordt opgeslagen |
| `doctrine.postUpdate` | Nadat een entiteit is bijgewerkt |

## Chamilo-Specifieke Gebeurtenissen

Deze gebeurtenissen worden verzonden door Chamilo's eigen code en zijn de belangrijkste integratiepunten voor plugins. Constanten zijn gedefinieerd in `Chamilo\CoreBundle\Event\Events`.

| Constante | Gebeurtenisstring | Wanneer deze wordt geactiveerd |
|-----------|-------------------|--------------------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Nadat een cursus is aangemaakt |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Vóór een gebruiker toegang krijgt tot een cursus |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Vóór een gebruiker zich inschrijft voor een cursus |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Wanneer een gebruiker probeert zich opnieuw in te schrijven voor een sessie |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Nadat inloggegevens zijn gevalideerd |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Nadat aanvullende inlogvoorwaarden zijn gecontroleerd |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Wanneer de werkbalk van het documentgereedschap wordt weergegeven |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Wanneer actieknoppen per bestand worden weergegeven |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Wanneer een document wordt geopend om te bekijken |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Wanneer de oefenrapportpagina zijn actielinks weergeeft |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Nadat een leerling een oefening heeft ingediend |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Nadat elke vraag is beantwoord |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Nadat een leerpad is aangemaakt |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Wanneer een leerling een leerpaditem opent |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Nadat een leerling een leerpad heeft voltooid |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Wanneer het beheerdersdashboard zijn blokkenlijst opbouwt |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Nadat een gebruikersaccount is aangemaakt |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Nadat een gebruikersaccount is bijgewerkt |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Nadat een gebruikersaccount is verwijderd |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Nadat een portfolio-item is aangemaakt |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Wanneer de inhoud van een melding wordt opgemaakt |

## Pluginvoorbeeld: Een Knop Toevoegen aan de Documentviewer

Deze sectie leidt u door hoe een plugin een gebeurtenisabonnee gebruikt om een knop in een bestaande Chamilo-pagina te injecteren — zonder aanpassing van de kerncode.

---
### Scenario

Een plugin genaamd **MyViewer** wil een knop "Openen in MyViewer" toevoegen naast elk document in de cursusbestandsbeheerder. Het relevante evenement is `Events::DOCUMENT_ITEM_VIEW`, dat door Chamilo wordt verzonden telkens wanneer een document wordt weergegeven, met de `CDocument`-entiteit en een aanpasbare lijst van links.

### Plugin directory structuur

```
public/plugin/MyViewer/
├── plugin.php                          # Declareert $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin instellingenpagina
├── lang/                               # Vertalingsreeksen
└── src/
    ├── MyViewerPlugin.php              # Hoofd plugin klasse (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Evenementabonnee
```

### Hoofd plugin klasse (`src/MyViewerPlugin.php`)

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

De basisklasse `Plugin` biedt `isEnabled()`, `get($settingKey)` en hulpmiddelen voor het installeren van cursustools en instellingen. Het singleton-patroon (`static $instance`) is de standaard Chamilo-conventie omdat de plugin-klasse ook buiten de Symfony-container wordt geïnstantieerd (in oudere PHP-pagina's).

### Evenementabonnee (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` voegt HTML toe aan de array die Chamilo's documentweergavesjabloon weergeeft naast de ingebouwde "Download" en "Voorbeeld" acties. De abonnee wijzigt nooit de kernbestanden van Chamilo.

### Registratie

Er is geen handmatige serviceregistratie nodig. Chamilo's `config/services.yaml` schakelt Symfony's `autoconfigure`-vlag globaal in, wat automatisch elke klasse die `EventSubscriberInterface` implementeert, tagt als een `kernel.event_subscriber`. Zolang de plugin-directory is geladen (via Composer's classmap of PSR-4 autoload), pikt Symfony de abonnee op bij de volgende cache-opschoning.

```bash
php bin/console cache:clear
```

### Hoe de evenementgegevens stromen

```
Documentlijst weergegeven
        │
        ▼
Chamilo verzendt DocumentItemViewEvent (draagt CDocument-entiteit + lege links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → voegt HTML-link toe
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → voegt "Bewerken" knop toe
        │   (elk aantal plugins kan naar hetzelfde evenement luisteren)
        ▼
Sjabloon rendert event->getLinks() naast ingebouwde bestandsacties
```

Meerdere plugins kunnen onafhankelijk van elkaar abonneren op hetzelfde evenement; elk voegt toe aan de gedeelde gegevens zonder van de anderen af te weten. De uitvoeringsvolgorde volgt Symfony's prioriteitssysteem — geef een prioriteitsinteger door als het tweede element van de handler-tuple in `getSubscribedEvents()` als de volgorde belangrijk is:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // hoger = eerder
    ];
}
```