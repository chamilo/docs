# Controller

Chamilo 3.0 verwendet eine große Anzahl von Controllern (im Bereich von Dutzenden), die über die Bundles verteilt sind. Die genaue Anzahl schwankt von Version zu Version — die nachstehenden Namen sind als illustrativ, nicht als vollständig zu verstehen.

## Controllertypen

### Admin-Controller

Befinden sich in `src/CoreBundle/Controller/Admin/`. Zuständig für die Plattformadministration:

* `AdminController` — Dashboard, Dateiinformationen, E-Mail-Tests
* `UserListController` — Benutzer-CRUD
* `CourseListController` — Kursverwaltung
* `SessionAdminController` — Session-Verwaltung
* `SettingsController` — Plattformeinstellungen
* `SecurityController` — Anmeldeversuche, IDS-Ereignisse
* `PluginsController` — Plugin-Verwaltung
* `RoomController` — Raumverwaltung

### API-Action-Controller

Benutzerdefinierte API-Platform-Actions in `src/CoreBundle/Controller/Api/`:

Diese erweitern das eingebaute CRUD von API Platform um benutzerdefinierte Geschäftslogik. Beispiele:

* `CreateDocumentFileAction` — Datei-Upload für Dokumente
* `CreateStudentPublicationFileAction` — Upload einer Aufgabenabgabe
* `UpdateVisibilityDocument` — Sichtbarkeit eines Dokuments umschalten
* `ExportCGlossaryAction` — Glossar exportieren
* `MoveDocumentAction` — Ein Dokument in einen anderen Ordner verschieben

Für Lese-/Schreiboperationen, die keinen eigenen HTTP-Controller benötigen — d. h. wenn Sie nur ändern möchten, *wie* ein Element oder eine Collection abgerufen oder persistiert wird — bevorzugen Sie einen **State Provider** oder **State Processor** (siehe unten). API-Action-Controller sollten Endpunkten vorbehalten bleiben, die tatsächlich Logik auf Anfrageebene benötigen (Datei-Uploads, benutzerdefinierte Antwortformate, mehrstufige Abläufe).

### AI-Controller

`src/CoreBundle/Controller/AiController.php` ist der Einstiegspunkt für KI-bezogene Endpunkte (Aiken-Fragengenerierung, Lernpfadgenerierung, Bild-/Videogenerierung, Bewertung offener Antworten, Dokumentenanalyse …). Die genaue Menge der Routen ändert sich schnell — lesen Sie die `#[Route]`-Attribute des Controllers für die aktuelle Liste, statt sich auf eine Kopie hier zu verlassen.

### Chat-Controller

`src/CoreBundle/Controller/ChatController.php` steuert Echtzeit-Chat und KI-Tutor:

* Nachrichten von Benutzer zu Benutzer
* KI-Tutor-Chat (angedocktes Chat-Panel)
* Nachrichtenverlauf und Polling

## API Platform State Providers & Processors

Nicht jeder API-Endpunkt wird von einem Controller bedient. API Platform 4 teilt die Arbeit auf zwei Schnittstellen auf:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — liefern Daten für `GET`-Operationen (ein einzelnes Element oder eine Collection).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — behandeln Schreibvorgänge für `POST`-, `PUT`-, `PATCH`- und `DELETE`-Operationen.

Chamilos Implementierungen liegen in `src/CoreBundle/State/` (rund 35+ Klassen). Sie werden über die Argumente `provider:` und `processor:` der Operationen von `#[ApiResource]` an Entitäten angebunden, nicht über Routen.

### Wann sie zu verwenden sind

Greifen Sie zu einem Provider/Processor — statt zu einem API-Action-Controller — wenn:

* Der Endpunkt der üblichen REST-Form folgt (Liste / Lesen / Anlegen / Aktualisieren / Löschen), aber benutzerdefinierte Datenzusammenstellung oder Persistenzlogik benötigt.
* Sie das Ergebnis eines Collection- oder Element-Lesevorgangs filtern, denormalisieren oder anreichern müssen (z. B. unter Berücksichtigung der aktuellen Access URL, des Kurskontexts oder von Sichtbarkeitsregeln).
* Sie bei Schreibvorgängen Nebeneffekte ausführen müssen (Audit-Protokolle, Dateigenerierung, Aktualisierungen verwandter Entitäten), während die Normalisierungs-, Validierungs- und Paginierungspipeline von API Platform erhalten bleibt.
* Sie die Operation im OpenAPI-/Hydra-Schema auffindbar halten wollen, ohne eine benutzerdefinierte Route zu registrieren.

Wenn der Endpunkt stattdessen direkten Zugriff auf `Request` benötigt, eine Nicht-Ressourcen-Nutzlast zurückgibt (Dateidownload, CSV, Redirect) oder einen mehrstufigen Ablauf orchestriert, ist ein API-Action-Controller in `src/CoreBundle/Controller/Api/` besser geeignet.

### Anbindung an der Entität

Referenzieren Sie die Klasse an der Operation:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider-Beispiel

`src/CoreBundle/State/DocumentProvider.php` löst ein `CDocument` über die URI-Variable auf und wirft `NotFoundHttpException`, wenn es fehlt:

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

### Processor-Beispiel

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegiert an den Standard-Doctrine-`persistProcessor` und führt anschließend Seiteneffekte aus (erzeugt eine CSS-Datei im Themes-Flysystem-Dateisystem, verknüpft das Theme mit der aktuellen Access URL):

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

### Wichtige Muster

* **Mit dem Standard-Processor komponieren.** Dekorieren Sie `ProcessorInterface $persistProcessor` (den eingebauten Doctrine-Processor), sodass chamilo-spezifische Logik *um* das Standard-Persistieren herum läuft, nicht an seiner Stelle.
* **Collection-Provider paginieren selbst.** Wenn ein Collection-Provider eine eigene Abfrage aufbaut, muss er `?page`, `?itemsPerPage` und Suchfilter berücksichtigen — der automatische Paginator von API Platform greift nur beim Standard-Doctrine-Collection-Provider.
* **Eine Klasse pro Ressource + Operationsart ist üblich**, ein Provider kann aber mehrere Operationen bedienen (siehe `UsergroupStateProvider`, der für vier Operationen auf `Usergroup` wiederverwendet wird).
* **Namenskonvention**: `<Entity>StateProvider` / `<Entity>StateProcessor` für ressourcenweite Handler; `<Entity><Action>Processor` (z. B. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) für engere Operationen.

## Routing

Controller verwenden **PHP-8-Attribute** für Routendefinitionen:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API-Platform-Ressourcen verwenden `#[ApiResource]`-Attribute an Entitäten; benutzerdefinierte Operationen verweisen auf Controller-Aktionen.

## Traits

Controller nutzen gemeinsame Traits für wiederkehrende Funktionalität:

* `ControllerTrait` — Zugriff auf Einstellungen, Serializer und gemeinsame Dienste
* `CourseControllerTrait` — Hilfen für den Kurskontext
* `ResourceControllerTrait` — Operationen an Resource Nodes