# Eventi e listener

Chamilo utilizza il sistema di eventi di Symfony per una comunicazione disaccoppiata tra i componenti.

## Event listener

Chamilo utilizza due posizioni per i listener:

* **`src/CoreBundle/EventListener/`** — listener del kernel/HTTP di Symfony (request, response, exception, login/logout, accesso a corso/sessione, ecc.). Esempi: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — listener di entità Doctrine associati a entità specifiche. Esempi: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Scegliere la posizione in base a ciò a cui si deve reagire: gli eventi della pipeline HTTP vanno in `EventListener/`; gli hook del ciclo di vita delle entità vanno in `Entity/Listener/`.

## Event subscriber

Si trovano in `src/CoreBundle/EventSubscriber/`:

Gli event subscriber possono ascoltare più eventi:

* **Subscriber di sicurezza** — Gestiscono gli eventi di login/logout, tracciano i tentativi di accesso
* **Subscriber API** — Pre/post-elaborazione per le richieste API
* **Subscriber Doctrine** — Reagiscono agli eventi del ciclo di vita delle entità

## Eventi del ciclo di vita Doctrine

Le entità usano `#[ORM\HasLifecycleCallbacks]` per gli eventi a livello di database:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creazione di listener personalizzati

Per aggiungere un comportamento personalizzato:

1. Creare una classe listener/subscriber nel bundle appropriato
2. Taggare la classe come event listener o subscriber nella configurazione dei servizi
3. Implementare il metodo gestore

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Eventi principali

| Evento | Quando viene emesso |
|-------|--------------|
| `kernel.request` | Ogni richiesta HTTP |
| `kernel.response` | Prima dell'invio della risposta HTTP |
| `security.interactive_login` | L'utente effettua l'accesso |
| `doctrine.prePersist` | Prima che un'entità venga salvata per la prima volta |
| `doctrine.postUpdate` | Dopo l'aggiornamento di un'entità |

## Eventi specifici di Chamilo

Questi eventi sono emessi dal codice di Chamilo e costituiscono i principali punti di integrazione per i plugin. Le costanti sono definite in `Chamilo\CoreBundle\Event\Events`.

| Costante | Stringa dell'evento | Quando viene emesso |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Dopo la creazione di un corso |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Prima che un utente acceda a un corso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Prima che un utente si iscriva a un corso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Quando un utente tenta di reiscriversi a una sessione |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Dopo la convalida delle credenziali di accesso |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Dopo la verifica di condizioni di accesso aggiuntive |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Quando viene renderizzata la barra degli strumenti dello strumento documenti |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Quando vengono renderizzati i pulsanti di azione per ciascun file |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Quando un documento viene aperto per la visualizzazione |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Quando la pagina del report degli esercizi renderizza i propri collegamenti di azione |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Dopo che un discente invia un esercizio |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Dopo che è stata data risposta a ciascuna domanda |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Dopo la creazione di un percorso di apprendimento |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Quando un discente apre un elemento di un LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Dopo che un discente completa un percorso di apprendimento |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Quando la dashboard di amministrazione costruisce l'elenco dei propri blocchi |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Dopo la creazione di un account utente |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Dopo l'aggiornamento di un account utente |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Dopo l'eliminazione di un account utente |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Dopo la creazione di un elemento di portfolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Quando viene formattato il corpo di una notifica |

## Esempio di plugin: aggiungere un pulsante al visualizzatore di documenti

Questa sezione illustra come un plugin utilizza un event subscriber per iniettare un pulsante in una pagina Chamilo esistente — senza alcuna modifica al codice del core.

### Scenario

Un plugin chiamato **MyViewer** vuole aggiungere un pulsante "Apri in MyViewer" accanto a ogni documento nel file manager del corso. L'evento pertinente è `Events::DOCUMENT_ITEM_VIEW`, inviato da Chamilo ogni volta che un documento sta per essere visualizzato, e che trasporta l'entità `CDocument` e un elenco modificabile di collegamenti.

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

### Classe principale del plugin (`src/MyViewerPlugin.php`)

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

La classe base `Plugin` fornisce `isEnabled()`, `get($settingKey)` e helper per l'installazione di strumenti del corso e impostazioni. Il pattern singleton (`static $instance`) è la convenzione standard di Chamilo perché la classe del plugin viene istanziata anche al di fuori del container Symfony (nelle pagine PHP legacy).

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

`addLink()` aggiunge HTML all'array che il template di visualizzazione dei documenti di Chamilo renderizza accanto alle azioni integrate "Download" e "Preview". Il subscriber non modifica mai i file del core di Chamilo.

### Registration

Non è necessaria alcuna registrazione manuale dei servizi. Il file `config/services.yaml` di Chamilo abilita globalmente il flag `autoconfigure` di Symfony, che etichetta automaticamente qualsiasi classe che implementa `EventSubscriberInterface` come `kernel.event_subscriber`. Finché la directory del plugin è caricata (tramite classmap di Composer o autoload PSR-4), Symfony rileva il subscriber al successivo svuotamento della cache.

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

Più plugin possono iscriversi allo stesso evento in modo indipendente; ciascuno aggiunge dati condivisi senza conoscere gli altri. L'ordine di esecuzione segue il sistema di priorità di Symfony — passare un intero di priorità come secondo elemento della tupla del gestore in `getSubscribedEvents()` se l'ordinamento è rilevante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```