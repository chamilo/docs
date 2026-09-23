# Controllere

Chamilo 3.0 anvender et stort antal controllere (i størrelsesordenen dusinvis) organiseret på tværs af bundles. Det nøjagtige antal ændrer sig fra version til version — betragt navnene nedenfor som illustrative, ikke udtømmende.

## Controllertyper

### Admin-controllere

Placeret i `src/CoreBundle/Controller/Admin/`. Håndterer platformadministration:

* `AdminController` — Dashboard, filinfo, e-mailtest
* `UserListController` — Bruger-CRUD
* `CourseListController` — Kursusstyring
* `SessionAdminController` — Sessionsstyring
* `SettingsController` — Platformindstillinger
* `SecurityController` — Login-forsøg, IDS-hændelser
* `PluginsController` — Plugin-styring
* `RoomController` — Rumstyring

### API Action-controllere

Tilpassede API Platform-actions i `src/CoreBundle/Controller/Api/`:

Disse udvider API Platforms indbyggede CRUD med tilpasset forretningslogik. Eksempler:

* `CreateDocumentFileAction` — Filupload til dokumenter
* `CreateStudentPublicationFileAction` — Upload af opgaveaflevering
* `UpdateVisibilityDocument` — Skift dokumentsynlighed
* `ExportCGlossaryAction` — Eksportér ordliste
* `MoveDocumentAction` — Flyt et dokument til en anden mappe

For læse-/skriveoperationer, der ikke har brug for en dedikeret HTTP-controller — dvs. når du kun vil ændre *hvordan* et element eller en samling hentes eller persisteres — foretræk en **State Provider** eller **State Processor** (se nedenfor). API Action-controllere bør forbeholdes endepunkter, der reelt har brug for logik på request-niveau (filuploads, tilpassede svarformater, flertrinsforløb).

### AI-controller

`src/CoreBundle/Controller/AiController.php` er indgangspunktet for AI-relaterede endepunkter (Aiken-spørgsmålsgenerering, generering af læringsstier, billed-/videogenerering, bedømmelse af åbne svar, dokumentanalyse…). Det nøjagtige sæt af ruter udvikler sig hurtigt — læs controllerens `#[Route]`-attributter for den aktuelle liste i stedet for at stole på en kopi her.

### Chat-controller

`src/CoreBundle/Controller/ChatController.php` håndterer realtidschat og AI-tutor:

* Beskeder mellem brugere
* AI-tutor-chat (docked chatpanel)
* Beskedhistorik og polling

## API Platform State Providers & Processors

Ikke alle API-endepunkter er bakket op af en controller. API Platform 4 deler arbejdet mellem to interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — returnerer data for `GET`-operationer (et enkelt element eller en samling).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — håndterer skrivninger for `POST`-, `PUT`-, `PATCH`- og `DELETE`-operationer.

Chamilos implementeringer ligger i `src/CoreBundle/State/` (omkring 35+ klasser). De tilknyttes entiteter via argumenterne `provider:` og `processor:` på `#[ApiResource]`-operationer frem for via ruter.

### Hvornår de skal bruges

Vælg en provider/processor — i stedet for en API Action-controller — når:

* Endepunktet følger den standard REST-form (liste / læs / opret / opdater / slet), men har brug for tilpasset datasamling eller persistenslogik.
* Du skal filtrere, denormalisere eller berige resultatet af en samlings- eller elementlæsning (f.eks. under hensyntagen til den aktuelle Access URL, kursuskontekst eller synlighedsregler).
* Du skal køre sideeffekter ved skrivning (revisionslogge, filgenerering, opdateringer af relaterede entiteter), samtidig med at API Platforms normaliserings-, validerings- og pagineringspipeline bevares.
* Du vil holde operationen synlig i OpenAPI-/Hydra-skemaet uden at registrere en tilpasset rute.

Hvis endepunktet i stedet har brug for rå `Request`-adgang, returnerer en payload, der ikke er en ressource (filoverførsel, CSV, omdirigering), eller orkestrerer et flertrinsforløb, er en API Action-controller i `src/CoreBundle/Controller/Api/` et bedre valg.

### Tilknytning på entiteten

Referér klassen på operationen:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider-eksempel

`src/CoreBundle/State/DocumentProvider.php` resolver et `CDocument` via URI-variabel og kaster `NotFoundHttpException`, når det mangler:

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

### Processor-eksempel

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegerer til den standard Doctrine `persistProcessor` og kører derefter sideeffekter (genererer en CSS-fil på themes Flysystem-filsystemet og knytter temaet til den aktuelle Access URL):

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

### Mønstre, du bør kende

* **Komponer med standardprocessoren.** Dekorer `ProcessorInterface $persistProcessor` (Doctrines indbyggede), så Chamilo-specifik logik kører *omkring* den almindelige persist, ikke i stedet for den.
* **Collection-providers håndterer selv paginering.** Når en collection-provider bygger en brugerdefineret forespørgsel, skal den respektere `?page`, `?itemsPerPage` og søgefiltre — API Platforms automatiske paginator træder kun i kraft for den standard Doctrine collection-provider.
* **Én klasse pr. ressource + operationstype er almindeligt**, men en provider kan betjene flere operationer (se `UsergroupStateProvider`, genbrugt på tværs af fire operationer på `Usergroup`).
* **Navngivningskonvention**: `<Entity>StateProvider` / `<Entity>StateProcessor` til ressourceomfattende handlere; `<Entity><Action>Processor` (f.eks. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) til snævrere operationer.

## Routing

Controllers bruger **PHP 8-attributter** til routedefinitioner:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-ressourcer bruger `#[ApiResource]`-attributter på entiteter, hvor brugerdefinerede operationer peger på controller-actions.

## Traits

Controllers bruger delte traits til fælles funktionalitet:

* `ControllerTrait` — Adgang til indstillinger, serializer og fælles services
* `CourseControllerTrait` — Hjælpere til kursuskontekst
* `ResourceControllerTrait` — Operationer på resource nodes