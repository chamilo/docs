# Benutzerdefinierte Aktionen

Über die standardmäßigen CRUD-Operationen hinaus verfügt Chamilo über eine Reihe benutzerdefinierter API-Aktionscontroller (in der Größenordnung von mehreren Dutzend), die spezialisierte Operationen verarbeiten. Die genaue Anzahl variiert zwischen den Releases — listen Sie `src/CoreBundle/Controller/Api/` auf, um den aktuellen Bestand zu erhalten.

## Speicherort

Benutzerdefinierte Aktionen befinden sich in `src/CoreBundle/Controller/Api/`.

## Bemerkenswerte benutzerdefinierte Aktionen

### Dokumente

| Controller | Zweck |
|-----------|---------|
| `CreateDocumentFileAction` | Eine Datei hochladen oder ein Ordner-/Link-Dokument erstellen |
| `UpdateDocumentFileAction` | Die Datei eines Dokuments ersetzen |
| `ReplaceDocumentFileAction` | Eine Dokumentdatei ersetzen und dabei ihre IDs beibehalten |
| `MoveDocumentAction` | Ein Dokument in einen anderen Ordner verschieben |
| `UpdateVisibilityDocument` | Die Sichtbarkeit eines Dokuments für Lernende umschalten |
| `DownloadAllDocumentsAction` | Alle Dokumente in einem Ordner als ZIP herunterladen |
| `DownloadSelectedDocumentsAction` | Eine ausgewählte Menge von Dokumenten als ZIP herunterladen |
| `DocumentUsageAction` | Kurse/Sitzungen auflisten, in denen ein Dokument verwendet wird |
| `DocumentLearningPathUsageAction` | Lernpfade auflisten, in denen ein Dokument verwendet wird |

### Glossar

| Controller | Zweck |
|-----------|---------|
| `CreateCGlossaryAction` | Einen Glossarbegriff erstellen |
| `UpdateCGlossaryAction` | Einen Glossarbegriff aktualisieren |
| `ExportCGlossaryAction` | Das Glossar in eine Datei exportieren |
| `ImportCGlossaryAction` | Ein Glossar aus einer Datei importieren |
| `ExportGlossaryToDocumentsAction` | Das Glossar als Dokument im Kurs exportieren |
| `GetGlossaryCollectionController` | Die Glossarsammlung mit benutzerdefinierter Filterung abrufen |

### Links

| Controller | Zweck |
|-----------|---------|
| `CreateCLinkAction` | Einen externen Link erstellen |
| `UpdateCLinkAction` | Einen externen Link aktualisieren |
| `CreateCLinkCategoryAction` | Eine Linkkategorie erstellen |
| `UpdateCLinkCategoryAction` | Eine Linkkategorie aktualisieren |
| `CheckCLinkAction` | Prüfen, ob eine Link-URL erreichbar ist |
| `ExportCLinksAction` | Links in eine Datei exportieren |
| `CLinkDetailsController` | Linkdetails abrufen |
| `CLinkImageController` | Das Vorschaubild eines Links abrufen oder festlegen |
| `GetLinksCollectionController` | Die Linksammlung mit benutzerdefinierter Filterung abrufen |
| `UpdateVisibilityLink` | Die Sichtbarkeit eines Links umschalten |
| `UpdateVisibilityLinkCategory` | Die Sichtbarkeit einer Linkkategorie umschalten |
| `UpdatePositionLink` | Links neu anordnen |

### Lernpfade

| Controller | Zweck |
|-----------|---------|
| `CreateCLpAction` | Einen Lernpfad erstellen |
| `LpReorderController` | Elemente eines Lernpfads neu anordnen |

### Kalender

| Controller | Zweck |
|-----------|---------|
| `UpdateCCalendarEventAction` | Ein Kurskalenderereignis aktualisieren |
| `CalendarMyStudentsScheduleAction` | Den Stundenplan der Studierenden einer Lehrkraft abrufen |

### Blog

| Controller | Zweck |
|-----------|---------|
| `CreateCBlogAction` | Einen Blogbeitrag erstellen |
| `CreateBlogAttachmentAction` | Eine Datei an einen Blogbeitrag anhängen |
| `UpdateVisibilityBlog` | Die Sichtbarkeit eines Blogs umschalten |

### Dropbox

| Controller | Zweck |
|-----------|---------|
| `CreateDropboxFileAction` | Eine Datei in die Dropbox (Dateiaustausch-Werkzeug) hochladen |

### Studierendenarbeiten (Aufgaben)

| Controller | Zweck |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Eine Aufgabendatei einreichen |
| `CreateStudentPublicationCommentAction` | Einen Kommentar zu einer Einreichung hinzufügen |
| `CreateStudentPublicationCorrectionFileAction` | Eine Korrekturdatei für eine Einreichung hochladen |

### Persönliche Dateien

| Controller | Zweck |
|-----------|---------|
| `CreatePersonalFileAction` | Eine Datei in den persönlichen Dateibereich des Benutzers hochladen |
| `UpdatePersonalFileAction` | Eine persönliche Datei aktualisieren |

### Soziales

| Controller | Zweck |
|-----------|---------|
| `LikeSocialPostController` | Einen sozialen Beitrag mit „Gefällt mir“ markieren |
| `DislikeSocialPostController` | Die „Gefällt mir“-Markierung eines sozialen Beitrags entfernen |
| `CreateSocialPostAttachmentAction` | Eine Datei an einen sozialen Beitrag anhängen |
| `SocialPostAttachmentsController` | Anhänge eines sozialen Beitrags auflisten |
| `AbstractFeedbackSocialPostController` | Basisklasse für Feedback-Aktionen zu sozialen Beiträgen |

### Sitzungen

| Controller | Zweck |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Eine Sitzung erstellen und Benutzer sowie Kurse in einem Aufruf einschreiben |
| `SessionDuplicateProcessor` (`POST /api/sessions/{id}/duplicate`) | Eine Sitzung aus einer Modellsitzung erstellen — siehe [Sitzungsduplizierung](session-duplication.md) |

### Benutzer und Zugriffs-URLs

| Controller | Zweck |
|-----------|---------|
| `CreateUserOnAccessUrlAction` (`POST /api/access_urls/{id}/user`) | Einen Benutzer erstellen und ihn einer Zugriffs-URL zuordnen — siehe [Benutzererstellung](user-creation.md) |
| `UserAccessUrlsController` | Zugriffs-URLs auflisten, denen ein Benutzer angehört |
| `UserSkillsController` | Einem Benutzer verliehene Kompetenzen auflisten |

### Videokonferenz

| Controller | Zweck |
|-----------|---------|
| `VideoConferenceCallbackController` | Callbacks externer Videokonferenzanbieter verarbeiten |

---
### Basisklassen

| Klasse | Zweck |
|-------|---------|
| `BaseResourceFileAction` | Basisklasse für Datei-Upload-Aktionen; übernimmt das Multipart-Parsing, die Erstellung von Ressourcenknoten und die Speicherung |

## Implementierung einer benutzerdefinierten Aktion

Benutzerdefinierte Aktionen sind Standard-Symfony-Controller, die in den Operationsdefinitionen von API Platform referenziert werden. Das Attribut `#[ApiResource]` befindet sich auf der **Entität**, und der Parameter `controller:` jeder Operation verweist auf die Aktionsklasse:

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

Die Aktionsklasse selbst ist ein einfacher aufrufbarer Controller — Dienste werden über die Methodenargumente von `__invoke()` injiziert:

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
- `deserialize: false` wird gesetzt, wenn die Aktion die Anfrage direkt liest (z. B. Multipart-Datei-Uploads), anstatt API Platform einen JSON-Body deserialisieren zu lassen.
- Datei-Upload-Aktionen erweitern in der Regel `BaseResourceFileAction`, das das Multipart-Parsing und die Verknüpfung von Ressourcenknoten übernimmt.
- Die Sicherheit wird über den Parameter `security:` der Operation durchgesetzt, nicht innerhalb des Controllers.