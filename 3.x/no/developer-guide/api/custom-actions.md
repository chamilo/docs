# Egendefinerte handlinger

Utover standard CRUD-operasjoner har Chamilo en rekke egendefinerte API-handlingskontrollere (i størrelsesorden flere dusin) som håndterer spesialiserte operasjoner. Det nøyaktige antallet varierer mellom utgivelser — list `src/CoreBundle/Controller/Api/` for det gjeldende settet.

## Plassering

Egendefinerte handlinger ligger i `src/CoreBundle/Controller/Api/`.

## Bemerkelsesverdige egendefinerte handlinger

### Dokumenter

| Controller | Formål |
|-----------|---------|
| `CreateDocumentFileAction` | Last opp en fil eller opprett en mappe/lenkedokument |
| `UpdateDocumentFileAction` | Erstatt et dokuments fil |
| `ReplaceDocumentFileAction` | Erstatt en dokumentfil og behold ID-ene |
| `MoveDocumentAction` | Flytt et dokument til en annen mappe |
| `UpdateVisibilityDocument` | Slå av/på dokumentsynlighet for lærende |
| `DownloadAllDocumentsAction` | Last ned alle dokumenter i en mappe som en ZIP |
| `DownloadSelectedDocumentsAction` | Last ned et utvalg dokumenter som en ZIP |
| `DocumentUsageAction` | List kurs/økter der et dokument brukes |
| `DocumentLearningPathUsageAction` | List læringsstier der et dokument brukes |

### Ordliste

| Controller | Formål |
|-----------|---------|
| `CreateCGlossaryAction` | Opprett et ordlistebegrep |
| `UpdateCGlossaryAction` | Oppdater et ordlistebegrep |
| `ExportCGlossaryAction` | Eksporter ordliste til fil |
| `ImportCGlossaryAction` | Importer ordliste fra fil |
| `ExportGlossaryToDocumentsAction` | Eksporter ordliste som et dokument i kurset |
| `GetGlossaryCollectionController` | Hent ordlistesamling med egendefinert filtrering |

### Lenker

| Controller | Formål |
|-----------|---------|
| `CreateCLinkAction` | Opprett en ekstern lenke |
| `UpdateCLinkAction` | Oppdater en ekstern lenke |
| `CreateCLinkCategoryAction` | Opprett en lenkekategori |
| `UpdateCLinkCategoryAction` | Oppdater en lenkekategori |
| `CheckCLinkAction` | Sjekk om en lenke-URL er tilgjengelig |
| `ExportCLinksAction` | Eksporter lenker til fil |
| `CLinkDetailsController` | Hent lenkedetaljer |
| `CLinkImageController` | Hent eller sett forhåndsvisningsbilde for en lenke |
| `GetLinksCollectionController` | Hent lenkesamling med egendefinert filtrering |
| `UpdateVisibilityLink` | Slå av/på lenkesynlighet |
| `UpdateVisibilityLinkCategory` | Slå av/på synlighet for lenkekategori |
| `UpdatePositionLink` | Endre rekkefølge på lenker |

### Læringsstier

| Controller | Formål |
|-----------|---------|
| `CreateCLpAction` | Opprett en læringssti |
| `LpReorderController` | Endre rekkefølge på elementer i læringssti |

### Kalender

| Controller | Formål |
|-----------|---------|
| `UpdateCCalendarEventAction` | Oppdater en kurskalenderhendelse |
| `CalendarMyStudentsScheduleAction` | Hent timeplanen til en lærers studenter |

### Blogg

| Controller | Formål |
|-----------|---------|
| `CreateCBlogAction` | Opprett et blogginnlegg |
| `CreateBlogAttachmentAction` | Legg ved en fil til et blogginnlegg |
| `UpdateVisibilityBlog` | Slå av/på bloggsynlighet |

### Dropbox

| Controller | Formål |
|-----------|---------|
| `CreateDropboxFileAction` | Last opp en fil til dropbox (filutvekslingsverktøy) |

### Studentarbeid (oppgaver)

| Controller | Formål |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Lever en oppgavefil |
| `CreateStudentPublicationCommentAction` | Legg til en kommentar på en innlevering |
| `CreateStudentPublicationCorrectionFileAction` | Last opp en rettelsesfil for en innlevering |

### Personlige filer

| Controller | Formål |
|-----------|---------|
| `CreatePersonalFileAction` | Last opp en fil til brukerens personlige filområde |
| `UpdatePersonalFileAction` | Oppdater en personlig fil |

### Sosialt

| Controller | Formål |
|-----------|---------|
| `LikeSocialPostController` | Lik et sosialt innlegg |
| `DislikeSocialPostController` | Fjern like på et sosialt innlegg |
| `CreateSocialPostAttachmentAction` | Legg ved en fil til et sosialt innlegg |
| `SocialPostAttachmentsController` | List vedlegg på et sosialt innlegg |
| `AbstractFeedbackSocialPostController` | Baseklasse for tilbakemeldingshandlinger på sosiale innlegg |

### Økter

| Controller | Formål |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Opprett en økt og meld inn brukere og kurs i ett kall |

### Brukere og tilgangs-URL-er

| Controller | Formål |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Opprett en bruker og knytt dem til en tilgangs-URL |
| `UserAccessUrlsController` | List tilgangs-URL-er en bruker tilhører |
| `UserSkillsController` | List ferdigheter tildelt en bruker |

### Videokonferanse

| Controller | Formål |
|-----------|---------|
| `VideoConferenceCallbackController` | Håndter tilbakekall fra eksterne videokonferanseleverandører |

### Baseklasser

| Class | Formål |
|-------|---------|
| `BaseResourceFileAction` | Baseklasse for filopplastingshandlinger; håndterer multipart-parsing, opprettelse av ressursnoder og lagring |

## Implementering av en egendefinert handling

Egendefinerte handlinger er vanlige Symfony-kontrollere som refereres i API Platform-operasjonsdefinisjoner. Attributtet `#[ApiResource]` ligger på **entiteten**, og hver operasjons `controller:`-parameter peker til handlingsklassen:

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

Selve handlingsklassen er en vanlig invokable kontroller — tjenester injiseres via argumentene til metoden `__invoke()`:

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

Viktige punkter:
- `deserialize: false` settes når handlingen leser forespørselen direkte (f.eks. multipart-filopplastinger) i stedet for å la API Platform deserialisere en JSON-kropp.
- Handlinger for filopplasting utvider vanligvis `BaseResourceFileAction`, som håndterer multipart-tolking og tilkobling av ressursnoder.
- Sikkerhet håndheves via parameteren `security:` på operasjonen, ikke inne i kontrolleren.