# Controller

Chamilo 3.0 utilizza un gran numero di controller (nell'ordine delle decine) organizzati tra i bundle. Il conteggio esatto varia da versione a versione — considerare i nomi seguenti come illustrativi, non esaustivi.

## Tipi di controller

### Controller di amministrazione

Situati in `src/CoreBundle/Controller/Admin/`. Gestiscono l'amministrazione della piattaforma:

* `AdminController` — Dashboard, informazioni sui file, test delle e-mail
* `UserListController` — CRUD degli utenti
* `CourseListController` — Gestione dei corsi
* `SessionAdminController` — Gestione delle sessioni
* `SettingsController` — Impostazioni della piattaforma
* `SecurityController` — Tentativi di login, eventi IDS
* `PluginsController` — Gestione dei plugin
* `RoomController` — Gestione delle aule

### Controller di azione API

Azioni personalizzate di API Platform in `src/CoreBundle/Controller/Api/`:

Queste estendono il CRUD integrato di API Platform con logica di business personalizzata. Esempi:

* `CreateDocumentFileAction` — Caricamento file per i documenti
* `CreateStudentPublicationFileAction` — Caricamento della consegna di un compito
* `UpdateVisibilityDocument` — Attivazione/disattivazione della visibilità di un documento
* `ExportCGlossaryAction` — Esportazione del glossario
* `MoveDocumentAction` — Spostamento di un documento in una cartella diversa

Per le operazioni di lettura/scrittura che non necessitano di un controller HTTP dedicato — cioè quando si vuole solo modificare *come* un elemento o una collezione viene recuperato o persistito — è preferibile un **State Provider** o un **State Processor** (vedere sotto). I controller di azione API sono meglio riservati agli endpoint che necessitano realmente di logica a livello di richiesta (caricamenti di file, formati di risposta personalizzati, flussi multi-step).

### Controller AI

`src/CoreBundle/Controller/AiController.php` è il punto di ingresso per gli endpoint correlati all'IA (generazione di domande Aiken, generazione di percorsi di apprendimento, generazione di immagini/video, valutazione di risposte aperte, analisi di documenti…). L'insieme esatto delle route evolve rapidamente — leggere gli attributi `#[Route]` del controller per l'elenco attuale piuttosto che fare affidamento su una copia qui.

### Controller della chat

`src/CoreBundle/Controller/ChatController.php` gestisce la chat in tempo reale e il tutor IA:

* Messaggistica utente-utente
* Chat del tutor IA (pannello di chat agganciato)
* Cronologia dei messaggi e polling

## State Provider e Processor di API Platform

Non ogni endpoint API è supportato da un controller. API Platform 4 suddivide il lavoro tra due interfacce:

* **State Provider** (`ApiPlatform\State\ProviderInterface`) — restituiscono i dati per le operazioni `GET` (un singolo elemento o una collezione).
* **State Processor** (`ApiPlatform\State\ProcessorInterface`) — gestiscono le scritture per le operazioni `POST`, `PUT`, `PATCH` e `DELETE`.

Le implementazioni di Chamilo si trovano in `src/CoreBundle/State/` (circa 35+ classi). Sono collegate alle entità tramite gli argomenti `provider:` e `processor:` delle operazioni `#[ApiResource]` piuttosto che tramite le route.

### Quando utilizzarli

Ricorrere a un provider/processor — invece di un controller di azione API — quando:

* L'endpoint segue la forma REST standard (elenco / lettura / creazione / aggiornamento / eliminazione) ma necessita di logica personalizzata di assemblaggio dei dati o di persistenza.
* È necessario filtrare, denormalizzare o arricchire il risultato di una lettura di collezione o di elemento (ad es. rispettando l'Access URL corrente, il contesto del corso o le regole di visibilità).
* È necessario eseguire effetti collaterali in scrittura (log di audit, generazione di file, aggiornamenti di entità correlate) mantenendo la pipeline di normalizzazione, validazione e paginazione di API Platform.
* Si vuole mantenere l'operazione individuabile nello schema OpenAPI / Hydra senza registrare una route personalizzata.

Se invece l'endpoint necessita di accesso grezzo a `Request`, restituisce un payload non-risorsa (download di file, CSV, redirect) o orchestra un flusso multi-step, un controller di azione API in `src/CoreBundle/Controller/Api/` è più adatto.

### Collegamento sull'entità

Riferire la classe sull'operazione:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Esempio di provider

`src/CoreBundle/State/DocumentProvider.php` risolve un `CDocument` tramite la variabile URI e lancia `NotFoundHttpException` se manca:

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

### Esempio di processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega al `persistProcessor` Doctrine predefinito, quindi esegue effetti collaterali (genera un file CSS sul filesystem Flysystem dei temi, collega il tema all'Access URL corrente):

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

### Pattern da conoscere

* **Comporre con il processor predefinito.** Decorare `ProcessorInterface $persistProcessor` (quello integrato di Doctrine) in modo che la logica specifica di Chamilo venga eseguita *intorno* al persist standard, non al suo posto.
* **I collection provider gestiscono autonomamente la paginazione.** Quando un collection provider costruisce una query personalizzata, deve rispettare `?page`, `?itemsPerPage` e i filtri di ricerca — il paginator automatico di API Platform si attiva solo per il collection provider Doctrine predefinito.
* **Una classe per risorsa + tipo di operazione è comune**, ma un provider può servire più operazioni (si veda `UsergroupStateProvider`, riutilizzato su quattro operazioni di `Usergroup`).
* **Convenzione di denominazione**: `<Entity>StateProvider` / `<Entity>StateProcessor` per i gestori a livello di risorsa; `<Entity><Action>Processor` (ad es. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) per operazioni più ristrette.

## Routing

I controller usano **attributi PHP 8** per le definizioni delle route:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Le risorse API Platform usano attributi `#[ApiResource]` sulle entità, con operazioni personalizzate che puntano ad action dei controller.

## Trait

I controller usano trait condivisi per funzionalità comuni:

* `ControllerTrait` — Accesso a impostazioni, serializer e servizi comuni
* `CourseControllerTrait` — Helper per il contesto del corso
* `ResourceControllerTrait` — Operazioni sui nodi risorsa