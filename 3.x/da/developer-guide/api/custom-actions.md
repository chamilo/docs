# Brugerdefinerede handlinger

Ud over standard CRUD-operationer har Chamilo et antal brugerdefinerede API-handlingscontrollere (i størrelsesordenen dusinvis), der håndterer specialiserede operationer. Det præcise antal varierer mellem udgivelser — list `src/CoreBundle/Controller/Api/` for det aktuelle sæt.

## Placering

Brugerdefinerede handlinger findes i `src/CoreBundle/Controller/Api/`.

## Bemærkelsesværdige brugerdefinerede handlinger

### Dokumenter

| Controller | Formål |
|-----------|---------|
| `CreateDocumentFileAction` | Upload en fil eller opret et mappe-/linkdokument |
| `UpdateDocumentFileAction` | Erstat et dokuments fil |
| `ReplaceDocumentFileAction` | Erstat en dokumentfil og bevar dens ID'er |
| `MoveDocumentAction` | Flyt et dokument til en anden mappe |
| `UpdateVisibilityDocument` | Skift dokumentsynlighed for kursister |
| `DownloadAllDocumentsAction` | Download alle dokumenter i en mappe som en ZIP |
| `DownloadSelectedDocumentsAction` | Download et udvalgt sæt dokumenter som en ZIP |
| `DocumentUsageAction` | List kurser/sessioner, hvor et dokument anvendes |
| `DocumentLearningPathUsageAction` | List læringsstier, hvor et dokument anvendes |

### Ordliste

| Controller | Formål |
|-----------|---------|
| `CreateCGlossaryAction` | Opret et ordlisteudtryk |
| `UpdateCGlossaryAction` | Opdater et ordlisteudtryk |
| `ExportCGlossaryAction` | Eksportér ordliste til fil |
| `ImportCGlossaryAction` | Importér ordliste fra fil |
| `ExportGlossaryToDocumentsAction` | Eksportér ordliste som et dokument i kurset |
| `GetGlossaryCollectionController` | Hent ordlistesamling med brugerdefineret filtrering |

### Links

| Controller | Formål |
|-----------|---------|
| `CreateCLinkAction` | Opret et eksternt link |
| `UpdateCLinkAction` | Opdater et eksternt link |
| `CreateCLinkCategoryAction` | Opret en linkkategori |
| `UpdateCLinkCategoryAction` | Opdater en linkkategori |
| `CheckCLinkAction` | Kontrollér, om en link-URL er tilgængelig |
| `ExportCLinksAction` | Eksportér links til fil |
| `CLinkDetailsController` | Hent linkdetaljer |
| `CLinkImageController` | Hent eller angiv et links forhåndsvisningsbillede |
| `GetLinksCollectionController` | Hent linksamling med brugerdefineret filtrering |
| `UpdateVisibilityLink` | Skift linksynlighed |
| `UpdateVisibilityLinkCategory` | Skift synlighed for linkkategori |
| `UpdatePositionLink` | Omarranger links |

### Læringsstier

| Controller | Formål |
|-----------|---------|
| `CreateCLpAction` | Opret en læringssti |
| `LpReorderController` | Omarranger elementer i læringsstien |

### Kalender

| Controller | Formål |
|-----------|---------|
| `UpdateCCalendarEventAction` | Opdater en kursuskalenderbegivenhed |
| `CalendarMyStudentsScheduleAction` | Hent tidsplanen for en undervisers kursister |

### Blog

| Controller | Formål |
|-----------|---------|
| `CreateCBlogAction` | Opret et blogindlæg |
| `CreateBlogAttachmentAction` | Vedhæft en fil til et blogindlæg |
| `UpdateVisibilityBlog` | Skift blogsynlighed |

### Dropbox

| Controller | Formål |
|-----------|---------|
| `CreateDropboxFileAction` | Upload en fil til dropbox (filudvekslingsværktøjet) |

### Elevopgaver (Assignments)

| Controller | Formål |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Indsend en opgavefil |
| `CreateStudentPublicationCommentAction` | Tilføj en kommentar til en aflevering |
| `CreateStudentPublicationCorrectionFileAction` | Upload en rettelsesfil til en aflevering |

### Personlige filer

| Controller | Formål |
|-----------|---------|
| `CreatePersonalFileAction` | Upload en fil til brugerens personlige filområde |
| `UpdatePersonalFileAction` | Opdater en personlig fil |

### Socialt

| Controller | Formål |
|-----------|---------|
| `LikeSocialPostController` | Like et socialt indlæg |
| `DislikeSocialPostController` | Fjern like fra et socialt indlæg |
| `CreateSocialPostAttachmentAction` | Vedhæft en fil til et socialt indlæg |
| `SocialPostAttachmentsController` | List vedhæftninger på et socialt indlæg |
| `AbstractFeedbackSocialPostController` | Basklasse for feedbackhandlinger til sociale indlæg |

### Sessioner

| Controller | Formål |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Opret en session og tilmeld brugere og kurser i ét kald |

### Brugere og adgangs-URL'er

| Controller | Formål |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Opret en bruger og knyt vedkommende til en adgangs-URL |
| `UserAccessUrlsController` | List adgangs-URL'er, som en bruger tilhører |
| `UserSkillsController` | List kompetencer tildelt en bruger |

### Videokonference

| Controller | Formål |
|-----------|---------|
| `VideoConferenceCallbackController` | Håndter callbacks fra eksterne videokonferenceudbydere |

### Basklasser

| Class | Formål |
|-------|---------|
| `BaseResourceFileAction` | Basklasse for filuploadhandlinger; håndterer multipart-parsing, oprettelse af ressourceknuder og lagring |

## Implementering af en Custom Action

Custom actions er almindelige Symfony-controllere, der refereres i API Platform-operationsdefinitioner. Attributten `#[ApiResource]` ligger på **entiteten**, og hver operations `controller:`-parameter peger på action-klassen:

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

Selve action-klassen er en almindelig invokable controller — services injiceres via argumenter til metoden `__invoke()`:

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

Vigtige punkter:
- `deserialize: false` sættes, når actionen læser requesten direkte (f.eks. multipart-filuploads) i stedet for at lade API Platform deserialisere en JSON-body.
- Handlinger til filupload udvider typisk `BaseResourceFileAction`, som håndterer multipart-parsing og tilkobling af resource nodes.
- Sikkerhed håndhæves via parameteren `security:` på operationen, ikke inde i controlleren.