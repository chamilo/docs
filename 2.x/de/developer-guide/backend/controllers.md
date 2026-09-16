# Controller

Chamilo 2.0 verwendet eine große Anzahl von Controllern (in der Größenordnung von Dutzenden), die über die Bundles verteilt sind. Die genaue Anzahl variiert von Version zu Version — betrachten Sie die unten aufgeführten Namen als illustrativ, nicht als vollständig.

## Controller-Typen

### Admin-Controller

Befinden sich in `src/CoreBundle/Controller/Admin/`. Verwalten die Plattformadministration:

* `AdminController` — Dashboard, Dateiinformationen, E-Mail-Tests
* `UserListController` — Benutzer-CRUD
* `CourseListController` — Kursverwaltung
* `SessionAdminController` — Sitzungsverwaltung
* `SettingsController` — Plattformeinstellungen
* `SecurityController` — Anmeldeversuche, IDS-Ereignisse
* `PluginsController` — Plugin-Verwaltung
* `RoomController` — Raumverwaltung

### API-Aktions-Controller

Benutzerdefinierte API-Platform-Aktionen in `src/CoreBundle/Controller/Api/`:

Diese erweitern die integrierten CRUD-Funktionen von API Platform mit benutzerdefinierter Geschäftslogik. Beispiele:

* `CreateDocumentFileAction` — Datei-Upload für Dokumente
* `CreateStudentPublicationFileAction` — Upload von Aufgabenabgaben
* `UpdateVisibilityDocument` — Sichtbarkeit von Dokumenten umschalten
* `ExportCGlossaryAction` — Glossar exportieren
* `MoveDocumentAction` — Dokument in einen anderen Ordner verschieben

Für Lese-/Schreiboperationen, die keinen dedizierten HTTP-Controller benötigen — d.h. wenn Sie nur ändern möchten, *wie* ein Element oder eine Sammlung abgerufen oder gespeichert wird — bevorzugen Sie einen **State Provider** oder **State Processor** (siehe unten). API-Aktions-Controller sollten für Endpunkte reserviert werden, die tatsächlich Logik auf Anfrageebene benötigen (Datei-Uploads, benutzerdefinierte Antwortformate, mehrstufige Abläufe).

### AI-Controller

`src/CoreBundle/Controller/AiController.php` ist der Einstiegspunkt für KI-bezogene Endpunkte (Aiken-Fragen-Generierung, Lernpfad-Generierung, Bild-/Video-Generierung, Bewertung offener Antworten, Dokumentenanalyse…). Die genaue Menge an Routen entwickelt sich schnell weiter — lesen Sie die `#[Route]`-Attribute des Controllers für die aktuelle Liste, anstatt sich auf eine Kopie hier zu verlassen.

### Chat-Controller

`src/CoreBundle/Controller/ChatController.php` verwaltet Echtzeit-Chat und KI-Tutor:

* Benutzer-zu-Benutzer-Nachrichten
* KI-Tutor-Chat (angedocktes Chat-Fenster)
* Nachrichtenverlauf und Abfrage

## API Platform State Providers & Processors

Nicht jeder API-Endpunkt wird von einem Controller unterstützt. API Platform 3 teilt die Arbeit zwischen zwei Schnittstellen auf:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — liefern Daten für `GET`-Operationen (ein einzelnes Element oder eine Sammlung).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — verwalten Schreibvorgänge für `POST`, `PUT`, `PATCH` und `DELETE`-Operationen.

Chamilo-Implementierungen befinden sich in `src/CoreBundle/State/` (etwa 35+ Klassen). Sie sind über die Argumente `provider:` und `processor:` der `#[ApiResource]`-Operationen mit Entitäten verknüpft, nicht über Routen.

### Wann sie verwendet werden sollten

Greifen Sie zu einem Provider/Processor — anstelle eines API-Aktions-Controllers —, wenn:

* Der Endpunkt der standardmäßigen REST-Struktur folgt (Liste / Lesen / Erstellen / Aktualisieren / Löschen), aber benutzerdefinierte Datenassemblierung oder Persistenzlogik benötigt.
* Sie die Ergebnisse einer Sammlung oder eines Elements beim Lesen filtern, denormalisieren oder anreichern müssen (z.B. unter Berücksichtigung der aktuellen Zugriffs-URL, des Kurskontexts oder der Sichtbarkeitsregeln).
* Sie bei Schreibvorgängen Nebenwirkungen ausführen müssen (Audit-Logs, Dateigenerierung, Aktualisierungen verwandter Entitäten), während Sie die Normalisierungs-, Validierungs- und Paginierungspipeline von API Platform beibehalten.
* Sie möchten, dass die Operation im OpenAPI-/Hydra-Schema auffindbar bleibt, ohne eine benutzerdefinierte Route zu registrieren.

Wenn der Endpunkt hingegen direkten Zugriff auf `Request` benötigt, eine Nicht-Ressourcen-Nutzlast zurückgibt (Datei-Download, CSV, Weiterleitung) oder einen mehrstufigen Ablauf orchestriert, ist ein API-Aktions-Controller in `src/CoreBundle/Controller/Api/` besser geeignet.

### Verknüpfung mit der Entität

Verweisen Sie auf die Klasse bei der Operation:

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

`src/CoreBundle/State/DocumentProvider.php` löst ein `CDocument` anhand einer URI-Variable auf und wirft `NotFoundHttpException`, wenn es fehlt:

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
### Beispiel für einen Prozessor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegiert an den standardmäßigen Doctrine `persistProcessor` und führt dann Nebeneffekte aus (generiert eine CSS-Datei im Themes-Flysystem-Dateisystem, verknüpft das Theme mit der aktuellen Zugriffs-URL):

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

* **Kombination mit dem Standardprozessor.** Dekorieren Sie `ProcessorInterface $persistProcessor` (der integrierte von Doctrine), sodass Chamilo-spezifische Logik *um* den Standard-Persist herum ausgeführt wird, nicht anstelle davon.
* **Sammlungsanbieter übernehmen ihre eigene Paginierung.** Wenn ein Sammlungsanbieter eine benutzerdefinierte Abfrage erstellt, muss er `?page`, `?itemsPerPage` und Suchfilter berücksichtigen – der automatische Paginator von API Platform greift nur beim standardmäßigen Doctrine-Sammlungsanbieter ein.
* **Eine Klasse pro Ressource + Operationsart ist üblich**, aber ein Anbieter kann mehrere Operationen bedienen (siehe `UsergroupStateProvider`, der für vier Operationen auf `Usergroup` wiederverwendet wird).
* **Namenskonvention**: `<Entity>StateProvider` / `<Entity>StateProcessor` für ressourcenweite Handler; `<Entity><Action>Processor` (z. B. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) für spezifischere Operationen.

## Routing

Controller verwenden **PHP 8 Attribute** für Routendefinitionen:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform-Ressourcen verwenden `#[ApiResource]`-Attribute auf Entitäten, wobei benutzerdefinierte Operationen auf Controller-Aktionen verweisen.

## Traits

Controller verwenden gemeinsame Traits für häufig benötigte Funktionalitäten:

* `ControllerTrait` – Zugriff auf Einstellungen, Serializer und allgemeine Dienste
* `CourseControllerTrait` – Hilfsfunktionen für den Kurskontext
* `ResourceControllerTrait` – Operationen für Ressourcenknoten