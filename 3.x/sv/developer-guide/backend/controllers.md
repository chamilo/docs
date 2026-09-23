# Controllers

Chamilo 3.0 använder ett stort antal controllers (i storleksordningen dussintals) organiserade över bundlarna. Det exakta antalet varierar från version till version — betrakta namnen nedan som illustrativa, inte uttömmande.

## Controller Types

### Admin Controllers

Finns i `src/CoreBundle/Controller/Admin/`. Hanterar plattformsadministration:

* `AdminController` — Dashboard, filinfo, e-posttestning
* `UserListController` — CRUD för användare
* `CourseListController` — Kursadministration
* `SessionAdminController` — Sessionsadministration
* `SettingsController` — Plattformsinställningar
* `SecurityController` — Inloggningsförsök, IDS-händelser
* `PluginsController` — Pluginhantering
* `RoomController` — Rumshantering

### API Action Controllers

Anpassade API Platform-åtgärder i `src/CoreBundle/Controller/Api/`:

Dessa utökar API Platforms inbyggda CRUD med anpassad affärslogik. Exempel:

* `CreateDocumentFileAction` — Filuppladdning för dokument
* `CreateStudentPublicationFileAction` — Uppladdning av uppgiftsinlämning
* `UpdateVisibilityDocument` — Växla dokumentsynlighet
* `ExportCGlossaryAction` — Exportera ordlista
* `MoveDocumentAction` — Flytta ett dokument till en annan mapp

För läs-/skrivoperationer som inte behöver en dedikerad HTTP-controller — dvs. när du bara vill ändra *hur* ett objekt eller en samling hämtas eller sparas — föredra en **State Provider** eller **State Processor** (se nedan). API Action Controllers bör reserveras för endpoints som verkligen behöver logik på begärandenivå (filuppladdningar, anpassade svarsformat, flerstegsflöden).

### AI Controller

`src/CoreBundle/Controller/AiController.php` är ingångspunkten för AI-relaterade endpoints (generering av Aiken-frågor, generering av lärstigar, bild-/videogenerering, rättning av öppna svar, dokumentanalys…). Den exakta uppsättningen rutter utvecklas snabbt — läs controllerns `#[Route]`-attribut för den aktuella listan i stället för att förlita dig på en kopia här.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` hanterar realtidschatt och AI-handledare:

* Meddelanden mellan användare
* AI-handledarchatt (dockad chattpanel)
* Meddelandehistorik och polling

## API Platform State Providers & Processors

Inte varje API-endpoint backas upp av en controller. API Platform 4 delar arbetet mellan två gränssnitt:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — returnerar data för `GET`-operationer (ett enskilt objekt eller en samling).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — hanterar skrivningar för `POST`-, `PUT`-, `PATCH`- och `DELETE`-operationer.

Chamilos implementationer finns i `src/CoreBundle/State/` (cirka 35+ klasser). De kopplas till entiteter via argumenten `provider:` och `processor:` i `#[ApiResource]`-operationer snarare än via rutter.

### When to use them

Använd en provider/processor — i stället för en API Action Controller — när:

* Endpointen följer den standardmässiga REST-formen (lista / läs / skapa / uppdatera / ta bort) men behöver anpassad datamontering eller persistenslogik.
* Du behöver filtrera, denormalisera eller berika resultatet av en samlings- eller objektsläsning (t.ex. med hänsyn till aktuell Access URL, kurskontext eller synlighetsregler).
* Du behöver köra sidoeffekter vid skrivning (revisionsloggar, filgenerering, uppdateringar av relaterade entiteter) samtidigt som du behåller API Platforms pipeline för normalisering, validering och paginering.
* Du vill hålla operationen upptäckbar i OpenAPI-/Hydra-schemat utan att registrera en anpassad rutt.

Om endpointen i stället behöver rå `Request`-åtkomst, returnerar en nyttolast som inte är en resurs (filnedladdning, CSV, omdirigering) eller orkestrerar ett flerstegsflöde, är en API Action Controller i `src/CoreBundle/Controller/Api/` ett bättre val.

### Wiring on the entity

Referera klassen på operationen:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider example

`src/CoreBundle/State/DocumentProvider.php` löser en `CDocument` via URI-variabel och kastar `NotFoundHttpException` när den saknas:

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

### Processorexempel

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegerar till Doctrine-standardprocessorn `persistProcessor` och kör därefter sidoeffekter (genererar en CSS-fil på temats Flysystem-filsystem och kopplar temat till den aktuella Access URL):

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

### Mönster att känna till

* **Komponera med standardprocessorn.** Dekorera `ProcessorInterface $persistProcessor` (Doctrines inbyggda) så att Chamilo-specifik logik körs *runt* den vanliga persistensen, inte i stället för den.
* **Samlingsproviders sköter sin egen paginering.** När en samlingsprovider bygger en anpassad fråga måste den respektera `?page`, `?itemsPerPage` och sökfilter — API Platforms automatiska paginator aktiveras endast för den förvalda Doctrine-samlingsprovidern.
* **En klass per resurs + operationsslag är vanligt**, men en provider kan betjäna flera operationer (se `UsergroupStateProvider`, som återanvänds över fyra operationer på `Usergroup`).
* **Namnkonvention**: `<Entity>StateProvider` / `<Entity>StateProcessor` för resurssomfattande hanterare; `<Entity><Action>Processor` (t.ex. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) för mer avgränsade operationer.

## Routing

Controllers använder **PHP 8-attribut** för ruttdefinitioner:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-resurser använder `#[ApiResource]`-attribut på entiteter, med anpassade operationer som pekar mot controller-åtgärder.

## Traits

Controllers använder delade traits för gemensam funktionalitet:

* `ControllerTrait` — Åtkomst till inställningar, serializer och gemensamma tjänster
* `CourseControllerTrait` — Hjälpfunktioner för kurskontext
* `ResourceControllerTrait` — Operationer på resursnoder