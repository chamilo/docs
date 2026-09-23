# Tapahtumat ja kuuntelijat

Chamilo käyttää Symfonyn tapahtumajärjestelmää komponenttien väliseen irrotettuun viestintään.

## Tapahtumakuuntelijat

Chamilo käyttää kahta kuuntelijasijaintia:

* **`src/CoreBundle/EventListener/`** — Symfony-ytimen/HTTP-kuuntelijat (pyyntö, vastaus, poikkeus, kirjautuminen/uloskirjautuminen, kurssi-/istuntopääsy jne.). Esimerkkejä: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine-entiteettikuuntelijat, jotka on liitetty tiettyihin entiteetteihin. Esimerkkejä: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Valitse sijainti sen mukaan, mihin haluat reagoida: HTTP-putken tapahtumat kuuluvat hakemistoon `EventListener/`; entiteetin elinkaaren koukkuja varten käytä hakemistoa `Entity/Listener/`.

## Tapahtumatilaajat

Sijainti: `src/CoreBundle/EventSubscriber/`:

Tapahtumatilaajat voivat kuunnella useita tapahtumia:

* **Turvallisuustilaajat** — Käsittelevät kirjautumis-/uloskirjautumistapahtumia, seuraavat kirjautumisyrityksiä
* **API-tilaajat** — API-pyyntöjen esi- ja jälkikäsittely
* **Doctrine-tilaajat** — Reagoivat entiteetin elinkaaritapahtumiin

## Doctrinen elinkaaritapahtumat

Entiteetit käyttävät attribuuttia `#[ORM\HasLifecycleCallbacks]` tietokantatason tapahtumiin:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Mukautettujen kuuntelijoiden luominen

Mukautetun käyttäytymisen lisääminen:

1. Luo kuuntelija-/tilaajaluokka sopivaan bundleen
2. Merkitse se tapahtumakuuntelijaksi tai -tilaajaksi palvelukonfiguraatiossa
3. Toteuta käsittelijämetodi

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Keskeiset tapahtumat

| Tapahtuma | Milloin se laukeaa |
|-------|--------------|
| `kernel.request` | Jokaisella HTTP-pyynnöllä |
| `kernel.response` | Ennen HTTP-vastauksen lähettämistä |
| `security.interactive_login` | Käyttäjä kirjautuu sisään |
| `doctrine.prePersist` | Ennen kuin entiteetti tallennetaan ensimmäisen kerran |
| `doctrine.postUpdate` | Entiteetin päivityksen jälkeen |

## Chamilo-kohtaiset tapahtumat

Nämä tapahtumat lähettää Chamilon oma koodi, ja ne ovat lisäosien ensisijaisia integrointipisteitä. Vakiot on määritelty luokassa `Chamilo\CoreBundle\Event\Events`.

| Vakio | Tapahtumamerkkijono | Milloin se laukeaa |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Kurssin luomisen jälkeen |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Ennen kuin käyttäjä avaa kurssin |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Ennen kuin käyttäjä ilmoittautuu kurssille |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Kun käyttäjä yrittää ilmoittautua uudelleen istuntoon |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Kirjautumistunnusten tarkistuksen jälkeen |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Lisäkirjautumisehtojen tarkistuksen jälkeen |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Kun asiakirjatyökalun työkalupalkki renderöidään |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Kun tiedostokohtaiset toimintopainikkeet renderöidään |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Kun asiakirja avataan katseltavaksi |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Kun harjoitusraporttisivu renderöi toimintolinkkinsä |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Kun oppija on lähettänyt harjoituksen |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Jokaisen kysymyksen vastaamisen jälkeen |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Oppimispolun luomisen jälkeen |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Kun oppija avaa LP-kohteen |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Kun oppija on suorittanut oppimispolun |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Kun hallintapaneeli rakentaa lohkoluettelonsa |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Käyttäjätilin luomisen jälkeen |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Käyttäjätilin päivityksen jälkeen |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Käyttäjätilin poistamisen jälkeen |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Portfoliokohteen luomisen jälkeen |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Kun ilmoituksen runko muotoillaan |

## Lisäosaesimerkki: painikkeen lisääminen asiakirjakatselijaan

Tässä osiossa käydään läpi, miten lisäosa käyttää tapahtumatilaajaa injektoidakseen painikkeen olemassa olevalle Chamilo-sivulle — ilman ytimen koodin muokkaamista.

### Skenaario

Liitännäinen nimeltä **MyViewer** haluaa lisätä "Avaa MyViewerissä" -painikkeen jokaisen asiakirjan viereen kurssin tiedostonhallinnassa. Asiaankuuluva tapahtuma on `Events::DOCUMENT_ITEM_VIEW`, jonka Chamilo lähettää aina, kun asiakirja on juuri näytettävänä. Tapahtuma sisältää `CDocument`-entiteetin ja muokattavan linkkilistan.

### Liitännäisen hakemistorakenne

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

### Pääluokka (`src/MyViewerPlugin.php`)

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

`Plugin`-kantaluokka tarjoaa metodit `isEnabled()`, `get($settingKey)` sekä apuvälineet kurssityökalujen ja asetusten asennukseen. Singleton-malli (`static $instance`) on Chamilon vakiokäytäntö, koska liitännäisluokka instansoidaan myös Symfony-säiliön ulkopuolella (vanhoilla PHP-sivuilla).

### Tapahtumatilaaja (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` liittää HTML:n taulukkoon, jonka Chamilon asiakirjanäkymän malli renderöi sisäänrakennettujen "Lataa"- ja "Esikatselu"-toimintojen rinnalle. Tilaaja ei koskaan muokkaa Chamilon ydinTiedostoja.

### Rekisteröinti

Manuaalista palvelurekisteröintiä ei tarvita. Chamilon `config/services.yaml` ottaa Symfony-kirjaston `autoconfigure`-lipun käyttöön globaalisti, jolloin mikä tahansa `EventSubscriberInterface`-rajapinnan toteuttava luokka merkitään automaattisesti tunnisteella `kernel.event_subscriber`. Kunhan liitännäishakemisto on ladattu (Composerin classmapin tai PSR-4-autoloadin kautta), Symfony poimii tilaajan seuraavassa välimuistin tyhjennyksessä.

```bash
php bin/console cache:clear
```

### Miten tapahtumatiedot kulkevat

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

Useat liitännäiset voivat tilata saman tapahtuman toisistaan riippumatta; kukin lisää jaettuun dataan tietämättä muista. Suoritusjärjestys noudattaa Symfonyn prioriteettijärjestelmää — välitä prioriteettiluku käsittelijätuplen toisena alkiona metodissa `getSubscribedEvents()`, jos järjestyksellä on merkitystä:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```