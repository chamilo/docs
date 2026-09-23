# Anpassade åtgärder

Utöver standardåtgärder för CRUD har Chamilo ett antal anpassade API-åtgärdskontroller (i storleksordningen dussintals) som hanterar specialiserade operationer. Det exakta antalet varierar mellan utgåvor — lista `src/CoreBundle/Controller/Api/` för den aktuella uppsättningen.

## Plats

Anpassade åtgärder finns i `src/CoreBundle/Controller/Api/`.

## Anmärkningsvärda anpassade åtgärder

### Dokument

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Ladda upp en fil eller skapa ett mapp-/länkdokument |
| `UpdateDocumentFileAction` | Ersätt ett dokuments fil |
| `ReplaceDocumentFileAction` | Ersätt en dokumentfil och bevara dess ID:n |
| `MoveDocumentAction` | Flytta ett dokument till en annan mapp |
| `UpdateVisibilityDocument` | Växla dokumentets synlighet för deltagare |
| `DownloadAllDocumentsAction` | Ladda ner alla dokument i en mapp som en ZIP |
| `DownloadSelectedDocumentsAction` | Ladda ner en vald uppsättning dokument som en ZIP |
| `DocumentUsageAction` | Lista kurser/sessioner där ett dokument används |
| `DocumentLearningPathUsageAction` | Lista lärstigar där ett dokument används |

### Ordlista

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Skapa en ordlisteterm |
| `UpdateCGlossaryAction` | Uppdatera en ordlisteterm |
| `ExportCGlossaryAction` | Exportera ordlista till fil |
| `ImportCGlossaryAction` | Importera ordlista från fil |
| `ExportGlossaryToDocumentsAction` | Exportera ordlista som ett dokument i kursen |
| `GetGlossaryCollectionController` | Hämta ordlistesamling med anpassad filtrering |

### Länkar

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Skapa en extern länk |
| `UpdateCLinkAction` | Uppdatera en extern länk |
| `CreateCLinkCategoryAction` | Skapa en länkkategori |
| `UpdateCLinkCategoryAction` | Uppdatera en länkkategori |
| `CheckCLinkAction` | Kontrollera om en länk-URL är nåbar |
| `ExportCLinksAction` | Exportera länkar till fil |
| `CLinkDetailsController` | Hämta länkdetaljer |
| `CLinkImageController` | Hämta eller ange en länks förhandsgranskningsbild |
| `GetLinksCollectionController` | Hämta länksamling med anpassad filtrering |
| `UpdateVisibilityLink` | Växla länksynlighet |
| `UpdateVisibilityLinkCategory` | Växla synlighet för länkkategori |
| `UpdatePositionLink` | Ändra ordning på länkar |

### Lärstigar

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Skapa en lärstig |
| `LpReorderController` | Ändra ordning på objekt i lärstigen |

### Kalender

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Uppdatera en kurskalenderhändelse |
| `CalendarMyStudentsScheduleAction` | Hämta schemat för en lärares studenter |

### Blogg

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Skapa ett blogginlägg |
| `CreateBlogAttachmentAction` | Bifoga en fil till ett blogginlägg |
| `UpdateVisibilityBlog` | Växla bloggsynlighet |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Ladda upp en fil till dropbox (verktyg för filutbyte) |

### Studentarbete (inlämningsuppgifter)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Lämna in en fil till en uppgift |
| `CreateStudentPublicationCommentAction` | Lägg till en kommentar till en inlämning |
| `CreateStudentPublicationCorrectionFileAction` | Ladda upp en rättningsfil för en inlämning |

### Personliga filer

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Ladda upp en fil till användarens personliga filutrymme |
| `UpdatePersonalFileAction` | Uppdatera en personlig fil |

### Socialt

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Gilla ett socialt inlägg |
| `DislikeSocialPostController` | Ta bort gillande av ett socialt inlägg |
| `CreateSocialPostAttachmentAction` | Bifoga en fil till ett socialt inlägg |
| `SocialPostAttachmentsController` | Lista bilagor på ett socialt inlägg |
| `AbstractFeedbackSocialPostController` | Basklass för återkopplingsåtgärder för sociala inlägg |

### Sessioner

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Skapa en session och registrera användare och kurser i ett anrop |

### Användare och åtkomst-URL:er

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Skapa en användare och koppla dem till en åtkomst-URL |
| `UserAccessUrlsController` | Lista åtkomst-URL:er som en användare tillhör |
| `UserSkillsController` | Lista färdigheter som tilldelats en användare |

### Videokonferens

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Hantera återanrop från externa videokonferensleverantörer |

### Basklasser

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Basklass för filuppladdningsåtgärder; hanterar multipart-tolkning, skapande av resursnoder och lagring |

## Implementera en anpassad åtgärd

Anpassade åtgärder är vanliga Symfony-kontroller som refereras i API Platforms operationsdefinitioner. Attributet `#[ApiResource]` finns på **entiteten**, och varje operations parameter `controller:` pekar på åtgärdsklassen:

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

Åtgärdsklassen i sig är en vanlig invokable-kontroller — tjänster injiceras via argument till metoden `__invoke()`:

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

Viktiga punkter:
- `deserialize: false` anges när åtgärden läser begäran direkt (t.ex. multipart-filuppladdningar) i stället för att låta API Platform deserialisera en JSON-kropp.
- Åtgärder för filuppladdning utökar vanligtvis `BaseResourceFileAction`, som hanterar multipart-parsning och koppling av resursnoder.
- Säkerhet upprätthålls via parametern `security:` på operationen, inte inuti kontrollern.