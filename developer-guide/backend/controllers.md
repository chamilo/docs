# Controller

Chamilo 2.0 utilizza un gran numero di controller (nell'ordine di decine) organizzati tra i bundle. Il conteggio esatto varia da versione a versione — considera i nomi riportati di seguito come illustrativi, non esaustivi.

## Tipi di Controller

### Controller Amministrativi

Situati in `src/CoreBundle/Controller/Admin/`. Gestiscono l'amministrazione della piattaforma:

* `AdminController` — Dashboard, informazioni sui file, test email
* `UserListController` — CRUD degli utenti
* `CourseListController` — Gestione dei corsi
* `SessionAdminController` — Gestione delle sessioni
* `SettingsController` — Impostazioni della piattaforma
* `SecurityController` — Tentativi di accesso, eventi IDS
* `PluginsController` — Gestione dei plugin
* `RoomController` — Gestione delle stanze

### Controller per Azioni API

Azioni personalizzate di API Platform in `src/CoreBundle/Controller/Api/`:

Questi estendono il CRUD integrato di API Platform con logica di business personalizzata. Esempi:

* `CreateDocumentFileAction` — Caricamento di file per documenti
* `CreateStudentPublicationFileAction` — Caricamento di consegne per compiti
* `UpdateVisibilityDocument` — Modifica della visibilità di un documento
* `ExportCGlossaryAction` — Esportazione del glossario
* `MoveDocumentAction` — Spostamento di un documento in una cartella diversa

Per operazioni di lettura/scrittura che non richiedono un controller HTTP dedicato — ovvero quando si desidera solo modificare *come* un elemento o una collezione viene recuperata o salvata — preferisci un **State Provider** o un **State Processor** (vedi sotto). I Controller per Azioni API sono più indicati per endpoint che richiedono realmente logica a livello di richiesta (caricamenti di file, formati di risposta personalizzati, flussi a più fasi).

### Controller AI

`src/CoreBundle/Controller/AiController.php` è il punto di ingresso per gli endpoint relativi all'IA (generazione di domande Aiken, generazione di percorsi di apprendimento, generazione di immagini/video, valutazione di risposte aperte, analisi di documenti...). L'insieme esatto di route evolve rapidamente — leggi gli attributi `#[Route]` del controller per l'elenco aggiornato piuttosto che fare affidamento su una copia qui.

### Controller Chat

`src/CoreBundle/Controller/ChatController.php` gestisce la chat in tempo reale e il tutor AI:

* Messaggistica tra utenti
* Chat con tutor AI (pannello di chat ancorato)
* Cronologia dei messaggi e polling

## State Provider e Processor di API Platform

Non tutti gli endpoint API sono supportati da un controller. API Platform 3 divide il lavoro tra due interfacce:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — restituiscono dati per operazioni `GET` (un singolo elemento o una collezione).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — gestiscono le operazioni di scrittura per `POST`, `PUT`, `PATCH` e `DELETE`.

Le implementazioni di Chamilo si trovano in `src/CoreBundle/State/` (circa 35+ classi). Sono collegate alle entità tramite gli argomenti `provider:` e `processor:` delle operazioni `#[ApiResource]` piuttosto che tramite route.

### Quando usarli

Opta per un provider/processor — invece di un Controller per Azioni API — quando:

* L'endpoint segue la forma REST standard (elenco / lettura / creazione / aggiornamento / eliminazione) ma richiede logica personalizzata per l'assemblaggio o la persistenza dei dati.
* Devi filtrare, denormalizzare o arricchire il risultato di una lettura di collezione o elemento (ad esempio rispettando l'URL di accesso corrente, il contesto del corso o le regole di visibilità).
* Devi eseguire effetti collaterali in scrittura (log di audit, generazione di file, aggiornamenti di entità correlate) mantenendo la pipeline di normalizzazione, validazione e paginazione di API Platform.
* Vuoi mantenere l'operazione rilevabile nello schema OpenAPI / Hydra senza registrare una route personalizzata.

Se invece l'endpoint necessita di accesso diretto a `Request`, restituisce un payload non risorsa (download di file, CSV, reindirizzamento) o orchestra un flusso a più fasi, un Controller per Azioni API in `src/CoreBundle/Controller/Api/` è una scelta migliore.

### Collegamento sull'entità

Fai riferimento alla classe sull'operazione:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Esempio di Provider

`src/CoreBundle/State/DocumentProvider.php` risolve un `CDocument` tramite variabile URI e lancia `NotFoundHttpException` quando non trovato:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

---
### Esempio di Processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega al `persistProcessor` predefinito di Doctrine, quindi esegue effetti collaterali (genera un file CSS sul filesystem Flysystem dei temi, collega il tema all'attuale Access URL):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Modelli da conoscere

* **Composizione con il processor predefinito.** Decora `ProcessorInterface $persistProcessor` (quello integrato di Doctrine) in modo che la logica specifica di Chamilo venga eseguita *intorno* al persist standard, non al suo posto.
* **I provider di collezioni gestiscono la propria paginazione.** Quando un provider di collezioni costruisce una query personalizzata, deve rispettare `?page`, `?itemsPerPage` e i filtri di ricerca — il paginatore automatico di API Platform si attiva solo per il provider di collezioni predefinito di Doctrine.
* **Una classe per risorsa + tipo di operazione è comune**, ma un provider può servire diverse operazioni (vedi `UsergroupStateProvider`, riutilizzato in quattro operazioni su `Usergroup`).
* **Convenzione di denominazione**: `<Entity>StateProvider` / `<Entity>StateProcessor` per gestori a livello di risorsa; `<Entity><Action>Processor` (ad esempio `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) per operazioni più specifiche.

## Routing

I controller utilizzano **attributi di PHP 8** per le definizioni delle rotte:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Le risorse di API Platform utilizzano attributi `#[ApiResource]` sulle entità, con operazioni personalizzate che puntano ad azioni del controller.

## Tratti

I controller utilizzano tratti condivisi per funzionalità comuni:

* `ControllerTrait` — Accesso a impostazioni, serializzatore e servizi comuni
* `CourseControllerTrait` — Helper per il contesto del corso
* `ResourceControllerTrait` — Operazioni sui nodi delle risorse