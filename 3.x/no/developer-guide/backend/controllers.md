# Kontrollere

Chamilo 3.0 bruker et stort antall kontrollere (i størrelsesorden dusinvis) organisert på tvers av bundlene. Det nøyaktige antallet endrer seg fra versjon til versjon — betrakt navnene nedenfor som illustrative, ikke uttømmende.

## Kontrollertyper

### Admin-kontrollere

Plassert i `src/CoreBundle/Controller/Admin/`. Håndterer plattformadministrasjon:

* `AdminController` — Dashbord, filinfo, e-posttesting
* `UserListController` — Bruker-CRUD
* `CourseListController` — Kursadministrasjon
* `SessionAdminController` — Øktadministrasjon
* `SettingsController` — Plattforminnstillinger
* `SecurityController` — Innloggingsforsøk, IDS-hendelser
* `PluginsController` — Plugin-administrasjon
* `RoomController` — Romadministrasjon

### API Action-kontrollere

Tilpassede API Platform-handlinger i `src/CoreBundle/Controller/Api/`:

Disse utvider API Platforms innebygde CRUD med tilpasset forretningslogikk. Eksempler:

* `CreateDocumentFileAction` — Filopplasting for dokumenter
* `CreateStudentPublicationFileAction` — Opplasting av innlevering
* `UpdateVisibilityDocument` — Veksle dokumentets synlighet
* `ExportCGlossaryAction` — Eksportere ordliste
* `MoveDocumentAction` — Flytte et dokument til en annen mappe

For lese-/skriveoperasjoner som ikke trenger en dedikert HTTP-kontroller — dvs. når du bare vil endre *hvordan* et element eller en samling hentes eller persisteres — foretrekk en **State Provider** eller **State Processor** (se nedenfor). API Action-kontrollere bør forbeholdes endepunkter som virkelig trenger logikk på forespørselsnivå (filopplastinger, tilpassede svarformater, flertrinnsflyter).

### AI-kontroller

`src/CoreBundle/Controller/AiController.php` er inngangspunktet for AI-relaterte endepunkter (Aiken-spørsmålsgenerering, generering av læringsstier, bilde-/videogenerering, vurdering av åpne svar, dokumentanalyse…). Det nøyaktige settet av ruter utvikler seg raskt — les kontrollerens `#[Route]`-attributter for den gjeldende listen i stedet for å stole på en kopi her.

### Chat-kontroller

`src/CoreBundle/Controller/ChatController.php` håndterer sanntidschat og AI-veileder:

* Meldinger mellom brukere
* AI-veilederchat (dokket chatpanel)
* Meldingshistorikk og polling

## API Platform State Providers og Processors

Ikke hvert API-endepunkt støttes av en kontroller. API Platform 4 deler arbeidet mellom to grensesnitt:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — returnerer data for `GET`-operasjoner (et enkelt element eller en samling).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — håndterer skriving for `POST`-, `PUT`-, `PATCH`- og `DELETE`-operasjoner.

Chamilos implementasjoner ligger i `src/CoreBundle/State/` (rundt 35+ klasser). De kobles til entiteter via `provider:`- og `processor:`-argumentene til `#[ApiResource]`-operasjoner, ikke via ruter.

### Når de skal brukes

Velg en provider/processor — i stedet for en API Action-kontroller — når:

* Endepunktet følger den standard REST-formen (liste / les / opprett / oppdater / slett), men trenger tilpasset datasammensetting eller persistenslogikk.
* Du trenger å filtrere, denormalisere eller berike resultatet av en samlings- eller elementlesing (f.eks. med hensyn til gjeldende Access URL, kurskontekst eller synlighetsregler).
* Du trenger å kjøre sideeffekter ved skriving (revisjonslogger, filgenerering, oppdateringer av relaterte entiteter) mens du beholder API Platforms normaliserings-, validerings- og pagineringspipeline.
* Du vil holde operasjonen synlig i OpenAPI-/Hydra-skjemaet uten å registrere en tilpasset rute.

Hvis endepunktet i stedet trenger rå `Request`-tilgang, returnerer en nyttelast som ikke er en ressurs (filnedlasting, CSV, omdirigering), eller orkestrerer en flertrinnsflyt, er en API Action-kontroller i `src/CoreBundle/Controller/Api/` et bedre valg.

### Kabling på entiteten

Referer klassen på operasjonen:

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

`src/CoreBundle/State/DocumentProvider.php` løser en `CDocument` via URI-variabel og kaster `NotFoundHttpException` når den mangler:

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

### Prosessoreksempel

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegerer til standard Doctrine `persistProcessor`, og kjører deretter sideeffekter (genererer en CSS-fil på temasystemets Flysystem-filsystem, knytter temaet til gjeldende Access URL):

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

### Mønstre å kjenne til

* **Komponer med standardprosessoren.** Dekorer `ProcessorInterface $persistProcessor` (Doctrines innebygde) slik at Chamilo-spesifikk logikk kjører *rundt* den vanlige persistensen, ikke i stedet for den.
* **Samlingsleverandører håndterer paginering selv.** Når en samlingsleverandør bygger en tilpasset spørring, må den respektere `?page`, `?itemsPerPage` og søkefiltre — API Platforms automatiske paginator treffer bare inn for standard Doctrine-samlingsleverandør.
* **Én klasse per ressurs + operasjonstype er vanlig**, men en leverandør kan betjene flere operasjoner (se `UsergroupStateProvider`, gjenbrukt på tvers av fire operasjoner på `Usergroup`).
* **Navnekonvensjon**: `<Entity>StateProvider` / `<Entity>StateProcessor` for ressursomfattende behandlere; `<Entity><Action>Processor` (f.eks. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) for smalere operasjoner.

## Ruting

Kontrollere bruker **PHP 8-attributter** for rutedefinisjoner:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-ressurser bruker `#[ApiResource]`-attributter på entiteter, med tilpassede operasjoner som peker til kontrollerhandlinger.

## Traits

Kontrollere bruker delte traits for felles funksjonalitet:

* `ControllerTrait` — Tilgang til innstillinger, serializer og felles tjenester
* `CourseControllerTrait` — Hjelpere for kurskontekst
* `ResourceControllerTrait` — Operasjoner på ressursnoder