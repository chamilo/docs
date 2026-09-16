# Controllers

Chamilo 3.0 gebruikt een groot aantal controllers (in de orde van tientallen) die over de bundles zijn georganiseerd. Het exacte aantal verschilt van versie tot versie — beschouw de onderstaande namen als illustratief, niet als uitputtend.

## Controller Types

### Admin Controllers

Gelegen in `src/CoreBundle/Controller/Admin/`. Verzorgen het platformbeheer:

* `AdminController` — Dashboard, bestandsinformatie, e-mailtesten
* `UserListController` — User CRUD
* `CourseListController` — Cursusbeheer
* `SessionAdminController` — Sessiebeheer
* `SettingsController` — Platforminstellingen
* `SecurityController` — Aanmeldpogingen, IDS-gebeurtenissen
* `PluginsController` — Pluginbeheer
* `RoomController` — Ruimtebeheer

### API Action Controllers

Aangepaste API Platform-acties in `src/CoreBundle/Controller/Api/`:

Deze breiden de ingebouwde CRUD van API Platform uit met aangepaste bedrijfslogica. Voorbeelden:

* `CreateDocumentFileAction` — Bestandsupload voor documenten
* `CreateStudentPublicationFileAction` — Upload van opdrachtinzending
* `UpdateVisibilityDocument` — Documentzichtbaarheid in- of uitschakelen
* `ExportCGlossaryAction` — Glossarium exporteren
* `MoveDocumentAction` — Een document naar een andere map verplaatsen

Voor lees-/schrijfbewerkingen die geen dedicated HTTP-controller nodig hebben — d.w.z. wanneer u alleen wilt wijzigen *hoe* een item of collectie wordt opgehaald of opgeslagen — geeft u de voorkeur aan een **State Provider** of **State Processor** (zie hieronder). API Action Controllers zijn het best voorbehouden aan endpoints die daadwerkelijk logica op requestniveau nodig hebben (bestandsuploads, aangepaste responseformaten, meerstapsflows).

### AI Controller

`src/CoreBundle/Controller/AiController.php` is het toegangspunt voor AI-gerelateerde endpoints (Aiken-vraaggeneratie, leerpadgeneratie, beeld-/videogeneratie, beoordeling van open antwoorden, documentanalyse…). De exacte set routes evolueert snel — lees de `#[Route]`-attributen van de controller voor de actuele lijst in plaats van te vertrouwen op een kopie hier.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` verzorgt realtime chat en AI-tutor:

* Berichtenverkeer van gebruiker tot gebruiker
* AI-tutorchat (vastgezet chatpaneel)
* Berichtengeschiedenis en polling

## API Platform State Providers & Processors

Niet elk API-endpoint wordt ondersteund door een controller. API Platform 4 verdeelt het werk over twee interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — geven data terug voor `GET`-bewerkingen (een enkel item of een collectie).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — verwerken schrijfbewerkingen voor `POST`-, `PUT`-, `PATCH`- en `DELETE`-bewerkingen.

De implementaties van Chamilo staan in `src/CoreBundle/State/` (ongeveer 35+ klassen). Ze worden aan entiteiten gekoppeld via de argumenten `provider:` en `processor:` van `#[ApiResource]`-bewerkingen, niet via routes.

### When to use them

Kies voor een provider/processor — in plaats van een API Action Controller — wanneer:

* Het endpoint de standaard REST-vorm volgt (lijst / lezen / aanmaken / bijwerken / verwijderen) maar aangepaste data-assemblage of persistentielogica nodig heeft.
* U het resultaat van een collectie- of itemlezing moet filteren, denormaliseren of verrijken (bijv. met respect voor de huidige Access URL, cursuscontext of zichtbaarheidsregels).
* U bij schrijven neveneffecten moet uitvoeren (auditlogs, bestandsgeneratie, updates van gerelateerde entiteiten) terwijl u de normalisatie-, validatie- en paginatiepijplijn van API Platform behoudt.
* U de bewerking ontdekbaar wilt houden in het OpenAPI-/Hydra-schema zonder een aangepaste route te registreren.

Als het endpoint in plaats daarvan ruwe `Request`-toegang nodig heeft, een payload teruggeeft die geen resource is (bestandsdownload, CSV, redirect), of een meerstapsflow orkestreert, is een API Action Controller in `src/CoreBundle/Controller/Api/` een betere keuze.

### Wiring on the entity

Verwijs naar de klasse op de bewerking:

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

`src/CoreBundle/State/DocumentProvider.php` lost een `CDocument` op via een URI-variabele en gooit `NotFoundHttpException` wanneer deze ontbreekt:

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

### Voorbeeld van een processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegeert naar de standaard Doctrine-`persistProcessor` en voert daarna neveneffecten uit (genereert een CSS-bestand op het Flysystem-bestandssysteem van de thema's, koppelt het thema aan de huidige Access URL):

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

### Patronen om te kennen

* **Combineer met de standaardprocessor.** Decoreer `ProcessorInterface $persistProcessor` (de ingebouwde van Doctrine) zodat Chamilo-specifieke logica *rondom* de standaard persist draait, en niet in plaats daarvan.
* **Collectieproviders doen hun eigen paginering.** Wanneer een collectieprovider een aangepaste query opbouwt, moet deze `?page`, `?itemsPerPage` en zoekfilters respecteren — de automatische paginator van API Platform treedt alleen in werking voor de standaard Doctrine-collectieprovider.
* **Eén klasse per resource + soort operatie is gebruikelijk**, maar een provider kan meerdere operaties bedienen (zie `UsergroupStateProvider`, hergebruikt over vier operaties op `Usergroup`).
* **Naamgevingsconventie**: `<Entity>StateProvider` / `<Entity>StateProcessor` voor resourcebrede handlers; `<Entity><Action>Processor` (bijv. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) voor smallere operaties.

## Routing

Controllers gebruiken **PHP 8-attributen** voor routedefinities:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-resources gebruiken `#[ApiResource]`-attributen op entiteiten, waarbij aangepaste operaties naar controlleracties wijzen.

## Traits

Controllers gebruiken gedeelde traits voor gemeenschappelijke functionaliteit:

* `ControllerTrait` — Toegang tot instellingen, serializer en gemeenschappelijke services
* `CourseControllerTrait` — Helpers voor de cursuscontext
* `ResourceControllerTrait` — Operaties op resource nodes