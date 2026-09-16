# Benutzerdefinierte Aktionen

Neben den standardmäßigen CRUD-Operationen verfügt Chamilo über eine Reihe von benutzerdefinierten API-Aktionscontrollern (in der Größenordnung von Dutzenden), die spezialisierte Operationen abwickeln. Die genaue Anzahl variiert zwischen den Versionen — listen Sie `src/CoreBundle/Controller/Api/` für den aktuellen Satz auf.

## Speicherort

Benutzerdefinierte Aktionen befinden sich in `src/CoreBundle/Controller/Api/`.

## Wichtige benutzerdefinierte Aktionen

### Dokumente

| Controller | Zweck |
|-----------|-------|
| `CreateDocumentFileAction` | Eine Datei hochladen oder ein Ordner-/Link-Dokument erstellen |
| `UpdateDocumentFileAction` | Die Datei eines Dokuments ersetzen |
| `ReplaceDocumentFileAction` | Eine Dokumentdatei ersetzen, wobei die IDs erhalten bleiben |
| `MoveDocumentAction` | Ein Dokument in einen anderen Ordner verschieben |
| `UpdateVisibilityDocument` | Sichtbarkeit eines Dokuments für Lernende umschalten |
| `DownloadAllDocumentsAction` | Alle Dokumente in einem Ordner als ZIP herunterladen |
| `DownloadSelectedDocumentsAction` | Eine ausgewählte Gruppe von Dokumenten als ZIP herunterladen |
| `DocumentUsageAction` | Kurse/Sitzungen auflisten, in denen ein Dokument verwendet wird |
| `DocumentLearningPathUsageAction` | Lernpfade auflisten, in denen ein Dokument verwendet wird |

### Glossar

| Controller | Zweck |
|-----------|-------|
| `CreateCGlossaryAction` | Einen Glossarbegriff erstellen |
| `UpdateCGlossaryAction` | Einen Glossarbegriff aktualisieren |
| `ExportCGlossaryAction` | Glossar in eine Datei exportieren |
| `ImportCGlossaryAction` | Glossar aus einer Datei importieren |
| `ExportGlossaryToDocumentsAction` | Glossar als Dokument im Kurs exportieren |
| `GetGlossaryCollectionController` | Glossarsammlung mit benutzerdefiniertem Filtern abrufen |

### Links

| Controller | Zweck |
|-----------|-------|
| `CreateCLinkAction` | Einen externen Link erstellen |
| `UpdateCLinkAction` | Einen externen Link aktualisieren |
| `CreateCLinkCategoryAction` | Eine Linkkategorie erstellen |
| `UpdateCLinkCategoryAction` | Eine Linkkategorie aktualisieren |
| `CheckCLinkAction` | Prüfen, ob eine Link-URL erreichbar ist |
| `ExportCLinksAction` | Links in eine Datei exportieren |
| `CLinkDetailsController` | Linkdetails abrufen |
| `CLinkImageController` | Vorschau-Bild eines Links abrufen oder setzen |
| `GetLinksCollectionController` | Linksammlung mit benutzerdefiniertem Filtern abrufen |
| `UpdateVisibilityLink` | Sichtbarkeit eines Links umschalten |
| `UpdateVisibilityLinkCategory` | Sichtbarkeit einer Linkkategorie umschalten |
| `UpdatePositionLink` | Links neu anordnen |

### Lernpfade

| Controller | Zweck |
|-----------|-------|
| `CreateCLpAction` | Einen Lernpfad erstellen |
| `LpReorderController` | Lernpfad-Elemente neu anordnen |

### Kalender

| Controller | Zweck |
|-----------|-------|
| `UpdateCCalendarEventAction` | Ein Kurskalenderereignis aktualisieren |
| `CalendarMyStudentsScheduleAction` | Den Zeitplan der Schüler eines Lehrers abrufen |

### Blog

| Controller | Zweck |
|-----------|-------|
| `CreateCBlogAction` | Einen Blogbeitrag erstellen |
| `CreateBlogAttachmentAction` | Eine Datei an einen Blogbeitrag anhängen |
| `UpdateVisibilityBlog` | Sichtbarkeit eines Blogs umschalten |

### Dropbox

| Controller | Zweck |
|-----------|-------|
| `CreateDropboxFileAction` | Eine Datei in die Dropbox (Dateiaustausch-Tool) hochladen |

### Schülerarbeiten (Aufgaben)

| Controller | Zweck |
|-----------|-------|
| `CreateStudentPublicationFileAction` | Eine Aufgabendatei einreichen |
| `CreateStudentPublicationCommentAction` | Einen Kommentar zu einer Einreichung hinzufügen |
| `CreateStudentPublicationCorrectionFileAction` | Eine Korrekturdatei für eine Einreichung hochladen |

### Persönliche Dateien

| Controller | Zweck |
|-----------|-------|
| `CreatePersonalFileAction` | Eine Datei in den persönlichen Dateibereich des Benutzers hochladen |
| `UpdatePersonalFileAction` | Eine persönliche Datei aktualisieren |

### Soziales

| Controller | Zweck |
|-----------|-------|
| `LikeSocialPostController` | Einen sozialen Beitrag liken |
| `DislikeSocialPostController` | Einen sozialen Beitrag nicht mehr liken |
| `CreateSocialPostAttachmentAction` | Eine Datei an einen sozialen Beitrag anhängen |
| `SocialPostAttachmentsController` | Anhänge eines sozialen Beitrags auflisten |
| `AbstractFeedbackSocialPostController` | Basisklasse für Feedback-Aktionen zu sozialen Beiträgen |

### Sitzungen

| Controller | Zweck |
|-----------|-------|
| `CreateSessionWithUsersAndCoursesAction` | Eine Sitzung erstellen und Benutzer sowie Kurse in einem Aufruf einschreiben |

### Benutzer & Zugriffs-URLs

| Controller | Zweck |
|-----------|-------|
| `CreateUserOnAccessUrlAction` | Einen Benutzer erstellen und mit einer Zugriffs-URL verknüpfen |
| `UserAccessUrlsController` | Zugriffs-URLs auflisten, zu denen ein Benutzer gehört |
| `UserSkillsController` | Fähigkeiten auflisten, die einem Benutzer verliehen wurden |

### Videokonferenz

| Controller | Zweck |
|-----------|-------|
| `VideoConferenceCallbackController` | Rückrufe von externen Videokonferenzanbietern verarbeiten |

### Basisklassen

| Klasse | Zweck |
|-------|-------|
| `BaseResourceFileAction` | Basisklasse für Datei-Upload-Aktionen; behandelt Multipart-Parsing, Erstellung von Ressourcenknoten und Speicherung |

---
## Implementierung einer benutzerdefinierten Aktion

Benutzerdefinierte Aktionen sind standardmäßige Symfony-Controller, die in den Betriebsdefinitionen von API Platform referenziert werden. Das Attribut `#[ApiResource]` befindet sich auf der **Entität**, und der Parameter `controller:` jeder Operation verweist auf die Aktionsklasse:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

Die Aktionsklasse selbst ist ein einfacher aufrufbarer Controller — Dienste werden über Argumente der Methode `__invoke()` eingebunden:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Wichtige Punkte:
- `deserialize: false` wird gesetzt, wenn die Aktion die Anfrage direkt liest (z. B. bei Multipart-Datei-Uploads), anstatt API Platform den JSON-Body deserialisieren zu lassen.
- Aktionen für Datei-Uploads erweitern in der Regel `BaseResourceFileAction`, das die Multipart-Verarbeitung und die Verknüpfung von Ressourcenknoten übernimmt.
- Die Sicherheit wird über den Parameter `security:` der Operation durchgesetzt, nicht innerhalb des Controllers.