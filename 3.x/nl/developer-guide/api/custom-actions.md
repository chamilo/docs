# Aangepaste acties

Naast standaard CRUD-bewerkingen heeft Chamilo een aantal aangepaste API-actiecontrollers (in de orde van tientallen) die gespecialiseerde bewerkingen afhandelen. Het exacte aantal verschilt per release — raadpleeg `src/CoreBundle/Controller/Api/` voor de huidige set.

## Locatie

Aangepaste acties staan in `src/CoreBundle/Controller/Api/`.

## Opmerkelijke aangepaste acties

### Documenten

| Controller | Doel |
|-----------|---------|
| `CreateDocumentFileAction` | Een bestand uploaden of een map-/linkdocument aanmaken |
| `UpdateDocumentFileAction` | Het bestand van een document vervangen |
| `ReplaceDocumentFileAction` | Een documentbestand vervangen, waarbij de ID's behouden blijven |
| `MoveDocumentAction` | Een document naar een andere map verplaatsen |
| `UpdateVisibilityDocument` | De zichtbaarheid van een document voor cursisten in- of uitschakelen |
| `DownloadAllDocumentsAction` | Alle documenten in een map als ZIP downloaden |
| `DownloadSelectedDocumentsAction` | Een geselecteerde set documenten als ZIP downloaden |
| `DocumentUsageAction` | Cursussen/sessies weergeven waarin een document wordt gebruikt |
| `DocumentLearningPathUsageAction` | Leerpaden weergeven waarin een document wordt gebruikt |

### Glossarium

| Controller | Doel |
|-----------|---------|
| `CreateCGlossaryAction` | Een glossariumterm aanmaken |
| `UpdateCGlossaryAction` | Een glossariumterm bijwerken |
| `ExportCGlossaryAction` | Glossarium naar bestand exporteren |
| `ImportCGlossaryAction` | Glossarium uit bestand importeren |
| `ExportGlossaryToDocumentsAction` | Glossarium als document in de cursus exporteren |
| `GetGlossaryCollectionController` | Glossariumcollectie ophalen met aangepaste filtering |

### Koppelingen

| Controller | Doel |
|-----------|---------|
| `CreateCLinkAction` | Een externe koppeling aanmaken |
| `UpdateCLinkAction` | Een externe koppeling bijwerken |
| `CreateCLinkCategoryAction` | Een koppelingscategorie aanmaken |
| `UpdateCLinkCategoryAction` | Een koppelingscategorie bijwerken |
| `CheckCLinkAction` | Controleren of een koppelings-URL bereikbaar is |
| `ExportCLinksAction` | Koppelingen naar bestand exporteren |
| `CLinkDetailsController` | Koppelingsdetails ophalen |
| `CLinkImageController` | De voorbeeldafbeelding van een koppeling ophalen of instellen |
| `GetLinksCollectionController` | Koppelingscollectie ophalen met aangepaste filtering |
| `UpdateVisibilityLink` | De zichtbaarheid van een koppeling in- of uitschakelen |
| `UpdateVisibilityLinkCategory` | De zichtbaarheid van een koppelingscategorie in- of uitschakelen |
| `UpdatePositionLink` | Koppelingen herschikken |

### Leerpaden

| Controller | Doel |
|-----------|---------|
| `CreateCLpAction` | Een leerpad aanmaken |
| `LpReorderController` | Leerpaditems herschikken |

### Agenda

| Controller | Doel |
|-----------|---------|
| `UpdateCCalendarEventAction` | Een cursusagenda-evenement bijwerken |
| `CalendarMyStudentsScheduleAction` | Het rooster van de studenten van een docent ophalen |

### Blog

| Controller | Doel |
|-----------|---------|
| `CreateCBlogAction` | Een blogbericht aanmaken |
| `CreateBlogAttachmentAction` | Een bestand aan een blogbericht koppelen |
| `UpdateVisibilityBlog` | De zichtbaarheid van een blog in- of uitschakelen |

### Dropbox

| Controller | Doel |
|-----------|---------|
| `CreateDropboxFileAction` | Een bestand naar de dropbox uploaden (hulpmiddel voor bestandsuitwisseling) |

### Studentenwerk (opdrachten)

| Controller | Doel |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Een opdrachtbestand indienen |
| `CreateStudentPublicationCommentAction` | Een opmerking bij een inzending toevoegen |
| `CreateStudentPublicationCorrectionFileAction` | Een correctiebestand voor een inzending uploaden |

### Persoonlijke bestanden

| Controller | Doel |
|-----------|---------|
| `CreatePersonalFileAction` | Een bestand naar de persoonlijke bestandsruimte van de gebruiker uploaden |
| `UpdatePersonalFileAction` | Een persoonlijk bestand bijwerken |

### Sociaal

| Controller | Doel |
|-----------|---------|
| `LikeSocialPostController` | Een sociaal bericht liken |
| `DislikeSocialPostController` | Een like van een sociaal bericht verwijderen |
| `CreateSocialPostAttachmentAction` | Een bestand aan een sociaal bericht koppelen |
| `SocialPostAttachmentsController` | Bijlagen bij een sociaal bericht weergeven |
| `AbstractFeedbackSocialPostController` | Basisklasse voor feedbackacties op sociale berichten |

### Sessies

| Controller | Doel |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Een sessie aanmaken en in één aanroep gebruikers en cursussen inschrijven |

### Gebruikers en toegang-URL's

| Controller | Doel |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Een gebruiker aanmaken en koppelen aan een toegang-URL |
| `UserAccessUrlsController` | Toegang-URL's weergeven waartoe een gebruiker behoort |
| `UserSkillsController` | Vaardigheden weergeven die aan een gebruiker zijn toegekend |

### Videoconferentie

| Controller | Doel |
|-----------|---------|
| `VideoConferenceCallbackController` | Callbacks van externe videoconferentieproviders afhandelen |

### Basisklassen

| Class | Doel |
|-------|---------|
| `BaseResourceFileAction` | Basisklasse voor bestandsuploadacties; handelt multipart-parsing, het aanmaken van resource nodes en opslag af |

## Een aangepaste actie implementeren

Aangepaste acties zijn standaard Symfony-controllers die worden gerefereerd in de operation-definities van API Platform. Het attribuut `#[ApiResource]` staat op de **entiteit**, en de parameter `controller:` van elke operation wijst naar de actieklasse:

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

De actieklasse zelf is een gewone invokable controller — services worden geïnjecteerd via de argumenten van de methode `__invoke()`:

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

Belangrijke punten:
- `deserialize: false` wordt ingesteld wanneer de actie het request rechtstreeks leest (bijv. multipart-bestandsuploads) in plaats van API Platform een JSON-body te laten deserialiseren.
- Acties voor bestandsupload breiden doorgaans `BaseResourceFileAction` uit, die multipart-parsing en de koppeling van resource nodes afhandelt.
- Beveiliging wordt afgedwongen via de parameter `security:` op de operation, niet binnen de controller.