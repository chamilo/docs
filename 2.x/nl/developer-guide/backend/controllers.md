# Controllers

Chamilo 2.0 maakt gebruik van een groot aantal controllers (in de orde van tientallen), georganiseerd over de verschillende bundles. Het exacte aantal varieert per versie — beschouw de onderstaande namen als illustratief, niet als uitputtend.

## Soorten Controllers

### Beheerderscontrollers

Gelegen in `src/CoreBundle/Controller/Admin/`. Behandelen platformbeheer:

* `AdminController` — Dashboard, bestandsinformatie, e-mailtesten
* `UserListController` — Gebruikers CRUD
* `CourseListController` — Cursusbeheer
* `SessionAdminController` — Sessiebeheer
* `SettingsController` — Platforminstellingen
* `SecurityController` — Inlogpogingen, IDS-gebeurtenissen
* `PluginsController` — Pluginbeheer
* `RoomController` — Ruimtebeheer

### API Actiecontrollers

Aangepaste API Platform-acties in `src/CoreBundle/Controller/Api/`:

Deze breiden de ingebouwde CRUD van API Platform uit met aangepaste bedrijfslogica. Voorbeelden:

* `CreateDocumentFileAction` — Bestandsupload voor documenten
* `CreateStudentPublicationFileAction` — Upload van opdrachtinzendingen
* `UpdateVisibilityDocument` — Zichtbaarheid van documenten aanpassen
* `ExportCGlossaryAction` — Woordenlijst exporteren
* `MoveDocumentAction` — Een document naar een andere map verplaatsen

Voor lees-/schrijfbewerkingen die geen speciale HTTP-controller nodig hebben — dat wil zeggen, wanneer je alleen wilt wijzigen *hoe* een item of verzameling wordt opgehaald of opgeslagen — geef de voorkeur aan een **State Provider** of **State Processor** (zie hieronder). API Actiecontrollers zijn het best gereserveerd voor endpoints die echt logica op verzoekniveau nodig hebben (bestandsuploads, aangepaste antwoordformaten, meerstapsstromen).

### AI Controller

`src/CoreBundle/Controller/AiController.php` is het toegangspunt voor AI-gerelateerde endpoints (Aiken-vraaggeneratie, leerpadgeneratie, beeld-/videogeneratie, open-antwoordbeoordeling, documentanalyse…). De exacte set routes evolueert snel — lees de `#[Route]`-attributen van de controller voor de huidige lijst in plaats van te vertrouwen op een kopie hier.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` behandelt real-time chat en AI-tutor:

* Gebruiker-tot-gebruiker berichten
* AI-tutor chat (vastgezette chatpaneel)
* Berichtgeschiedenis en polling

## API Platform State Providers & Processors

Niet elk API-endpoint wordt ondersteund door een controller. API Platform 3 splitst het werk tussen twee interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — leveren gegevens voor `GET`-bewerkingen (een enkel item of een verzameling).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — behandelen schrijfbewerkingen voor `POST`, `PUT`, `PATCH` en `DELETE`-bewerkingen.

Chamilo's implementaties bevinden zich in `src/CoreBundle/State/` (ongeveer 35+ klassen). Ze zijn verbonden met entiteiten via de `provider:` en `processor:` argumenten van `#[ApiResource]`-bewerkingen in plaats van via routes.

### Wanneer te gebruiken

Kies voor een provider/processor — in plaats van een API Actiecontroller — wanneer:

* Het endpoint de standaard REST-vorm volgt (lijst / lezen / aanmaken / bijwerken / verwijderen) maar aangepaste gegevenssamenstelling of persistentielogica nodig heeft.
* Je de resultaten van een verzameling of item-lezing moet filteren, denormaliseren of verrijken (bijvoorbeeld met respect voor de huidige Access URL, cursuscontext of zichtbaarheidsregels).
* Je neveneffecten moet uitvoeren bij schrijven (auditlogs, bestandsgeneratie, updates van gerelateerde entiteiten) terwijl je de normalisatie-, validatie- en paginatiepijplijn van API Platform behoudt.
* Je de bewerking vindbaar wilt houden in het OpenAPI / Hydra-schema zonder een aangepaste route te registreren.

Als het endpoint daarentegen directe toegang tot `Request` nodig heeft, een niet-bronpayload retourneert (bestandsdownload, CSV, omleiding), of een meerstapsstroom orkestreert, is een API Actiecontroller in `src/CoreBundle/Controller/Api/` een betere keuze.

### Koppeling aan de entiteit

Verwijs naar de klasse bij de bewerking:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Voorbeeld van een Provider

`src/CoreBundle/State/DocumentProvider.php` lost een `CDocument` op aan de hand van een URI-variabele en gooit een `NotFoundHttpException` wanneer deze ontbreekt:

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
### Voorbeeld van een processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegeert naar de standaard Doctrine `persistProcessor` en voert vervolgens neveneffecten uit (genereert een CSS-bestand op het Flysystem-bestandssysteem voor thema's, koppelt het thema aan de huidige Access URL):

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

        // …genereer colors.css, koppel aan huidige AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Patronen om te kennen

* **Samenstellen met de standaard processor.** Decoreer `ProcessorInterface $persistProcessor` (de ingebouwde van Doctrine) zodat Chamilo-specifieke logica *rondom* de standaard persist wordt uitgevoerd, niet in plaats daarvan.
* **Collectieproviders beheren hun eigen paginering.** Wanneer een collectieprovider een aangepaste query bouwt, moet deze rekening houden met `?page`, `?itemsPerPage` en zoekfilters — de automatische paginator van API Platform treedt alleen in werking voor de standaard Doctrine collectieprovider.
* **Eén klasse per bron + type operatie is gebruikelijk**, maar een provider kan meerdere operaties bedienen (zie `UsergroupStateProvider`, hergebruikt voor vier operaties op `Usergroup`).
* **Naamconventie**: `<Entity>StateProvider` / `<Entity>StateProcessor` voor resourcebrede handlers; `<Entity><Action>Processor` (bijv. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) voor specifiekere operaties.

## Routing

Controllers gebruiken **PHP 8 attributen** voor routedefinities:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-bronnen gebruiken `#[ApiResource]` attributen op entiteiten, met aangepaste operaties die verwijzen naar controlleracties.

## Traits

Controllers maken gebruik van gedeelde traits voor gemeenschappelijke functionaliteit:

* `ControllerTrait` — Toegang tot instellingen, serializer en algemene services
* `CourseControllerTrait` — Hulpmiddelen voor cursuscontext
* `ResourceControllerTrait` — Operaties voor resourceknooppunten