# Eventi e Listener

Chamilo utilizza il sistema di eventi di Symfony per una comunicazione disaccoppiata tra i componenti.

## Listener di Eventi

Chamilo utilizza due posizioni per i listener:

* **`src/CoreBundle/EventListener/`** — Listener del kernel/HTTP di Symfony (richiesta, risposta, eccezione, login/logout, accesso a corsi/sessioni, ecc.). Esempi: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Listener di entità Doctrine collegati a entità specifiche. Esempi: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Scegli la posizione che corrisponde a ciò a cui devi reagire: gli eventi della pipeline HTTP vanno in `EventListener/`; i ganci del ciclo di vita delle entità vanno in `Entity/Listener/`.

## Sottoscrittori di Eventi

Situati in `src/CoreBundle/EventSubscriber/`:

I sottoscrittori di eventi possono ascoltare più eventi:

* **Sottoscrittori di sicurezza** — Gestiscono eventi di login/logout, tengono traccia dei tentativi di accesso
* **Sottoscrittori API** — Elaborazione pre/post per le richieste API
* **Sottoscrittori Doctrine** — Reagiscono agli eventi del ciclo di vita delle entità

## Eventi del Ciclo di Vita di Doctrine

Le entità utilizzano `#[ORM\HasLifecycleCallbacks]` per eventi a livello di database:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creazione di Listener Personalizzati

Per aggiungere un comportamento personalizzato:

1. Crea una classe listener/sottoscrittore nel bundle appropriato
2. Contrassegnala come listener o sottoscrittore di eventi nella configurazione del servizio
3. Implementa il metodo di gestione

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // La tua logica qui
    }
}
```

## Eventi Chiave

| Evento | Quando si attiva |
|-------|------------------|
| `kernel.request` | Ogni richiesta HTTP |
| `kernel.response` | Prima di inviare la risposta HTTP |
| `security.interactive_login` | Quando un utente effettua il login |
| `doctrine.prePersist` | Prima che un'entità venga salvata per la prima volta |
| `doctrine.postUpdate` | Dopo che un'entità viene aggiornata |

## Eventi Specifici di Chamilo

Questi eventi vengono inviati dal codice proprio di Chamilo e rappresentano i principali punti di integrazione per i plugin. Le costanti sono definite in `Chamilo\CoreBundle\Event\Events`.

| Costante | Stringa dell'evento | Quando si attiva |
|----------|---------------------|------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Dopo la creazione di un corso |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Prima che un utente acceda a un corso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Prima che un utente si iscriva a un corso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Quando un utente tenta di riscriversi a una sessione |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Dopo la convalida delle credenziali di accesso |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Dopo il controllo di condizioni aggiuntive per il login |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Quando viene renderizzata la barra degli strumenti dello strumento documento |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Quando vengono renderizzati i pulsanti di azione per file |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Quando un documento viene aperto per la visualizzazione |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Quando la pagina del rapporto sull'esercizio renderizza i link di azione |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Dopo che uno studente invia un esercizio |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Dopo che viene data risposta a ogni domanda |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Dopo la creazione di un percorso di apprendimento |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Quando uno studente apre un elemento di un percorso di apprendimento |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Dopo che uno studente completa un percorso di apprendimento |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Quando la dashboard dell'amministratore costruisce la lista dei blocchi |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Dopo la creazione di un account utente |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Dopo l'aggiornamento di un account utente |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Dopo l'eliminazione di un account utente |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Dopo la creazione di un elemento del portfolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Quando viene formattato il corpo di una notifica |

## Esempio di Plugin: Aggiungere un Pulsante al Visualizzatore di Documenti

Questa sezione illustra come un plugin utilizza un sottoscrittore di eventi per inserire un pulsante in una pagina esistente di Chamilo, senza necessità di modificare il codice principale.

---
### Scenario

Un plugin chiamato **MyViewer** desidera aggiungere un pulsante "Apri in MyViewer" accanto a ogni documento nel gestore dei file del corso. L'evento rilevante è `Events::DOCUMENT_ITEM_VIEW`, inviato da Chamilo ogni volta che un documento sta per essere visualizzato, portando con sé l'entità `CDocument` e un elenco modificabile di collegamenti.

### Struttura della directory del plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Dichiara $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Pagina delle impostazioni del plugin
├── lang/                               # Stringhe di traduzione
└── src/
    ├── MyViewerPlugin.php              # Classe principale del plugin (estende Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Sottoscrittore di eventi
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

La classe base `Plugin` fornisce `isEnabled()`, `get($settingKey)` e helper per l'installazione di strumenti del corso e impostazioni. Il pattern singleton (`static $instance`) è la convenzione standard di Chamilo poiché la classe del plugin viene istanziata anche al di fuori del container Symfony (nelle pagine PHP legacy).

### Sottoscrittore di eventi (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` aggiunge HTML all'array che il template di visualizzazione dei documenti di Chamilo rende insieme alle azioni integrate "Download" e "Anteprima". Il sottoscrittore non modifica mai i file core di Chamilo.

### Registrazione

Non è necessaria alcuna registrazione manuale del servizio. Il file `config/services.yaml` di Chamilo abilita globalmente il flag `autoconfigure` di Symfony, che contrassegna automaticamente qualsiasi classe che implementa `EventSubscriberInterface` come `kernel.event_subscriber`. Finché la directory del plugin è caricata (tramite la classmap di Composer o l'autoload PSR-4), Symfony rileva il sottoscrittore al successivo svuotamento della cache.

```bash
php bin/console cache:clear
```

### Flusso dei dati dell'evento

```
Elenco dei documenti renderizzato
        │
        ▼
Chamilo invia DocumentItemViewEvent (trasporta l'entità CDocument + links[] vuoto)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → aggiunge link HTML
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → aggiunge pulsante "Modifica"
        │   (un numero qualsiasi di plugin può ascoltare lo stesso evento)
        ▼
Il template rende event->getLinks() insieme alle azioni integrate sui file
```

Più plugin possono sottoscriversi allo stesso evento in modo indipendente; ciascuno aggiunge dati condivisi senza sapere degli altri. L'ordine di esecuzione segue il sistema di priorità di Symfony — passa un intero di priorità come secondo elemento della tupla del gestore in `getSubscribedEvents()` se l'ordine è importante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // più alto = prima
    ];
}
```