# Aangepaste acties

Naast standaard CRUD-bewerkingen beschikt Chamilo over een aantal aangepaste API-actiecontrollers (in de orde van tientallen) die gespecialiseerde bewerkingen afhandelen. Het exacte aantal varieert tussen releases — bekijk `src/CoreBundle/Controller/Api/` voor de huidige set.

## Locatie

Aangepaste acties bevinden zich in `src/CoreBundle/Controller/Api/`.

## Opmerkelijke aangepaste acties

### Documenten

| Controller | Doel |
|-----------|---------|
| `CreateDocumentFileAction` | Een bestand uploaden of een map-/koppelingsdocument aanmaken |
| `UpdateDocumentFileAction` | Het bestand van een document vervangen |
| `ReplaceDocumentFileAction` | Een documentbestand vervangen, met behoud van de ID's |
| `MoveDocumentAction` | Een document naar een andere map verplaatsen |
| `UpdateVisibilityDocument` | De zichtbaarheid van een document voor cursisten in- of uitschakelen |
| `DownloadAllDocumentsAction` | Alle documenten in een map downloaden als ZIP |
| `DownloadSelectedDocumentsAction` | Een geselecteerde set documenten downloaden als ZIP |
| `DocumentUsageAction` | Cursussen/sessies weergeven waarin een document wordt gebruikt |
| `DocumentLearningPathUsageAction` | Leerpaden weergeven waarin een document wordt gebruikt |

### Woordenlijst

| Controller | Doel |
|-----------|---------|
| `CreateCGlossaryAction` | Een woordenlijstterm aanmaken |
| `UpdateCGlossaryAction` | Een woordenlijstterm bijwerken |
| `ExportCGlossaryAction` | Woordenlijst exporteren naar een bestand |
| `ImportCGlossaryAction` | Woordenlijst importeren vanuit een bestand |
| `ExportGlossaryToDocumentsAction` | Woordenlijst exporteren als document in de cursus |
| `GetGlossaryCollectionController` | Woordenlijstverzameling ophalen met aangepaste filtering |

### Koppelingen

| Controller | Doel |
|-----------|---------|
| `CreateCLinkAction` | Een externe koppeling aanmaken |
| `UpdateCLinkAction` | Een externe koppeling bijwerken |
| `CreateCLinkCategoryAction` | Een koppelingscategorie aanmaken |
| `UpdateCLinkCategoryAction` | Een koppelingscategorie bijwerken |
| `CheckCLinkAction` | Controleren of een koppelings-URL bereikbaar is |
| `ExportCLinksAction` | Koppelingen exporteren naar een bestand |
| `CLinkDetailsController` | Koppelingsdetails ophalen |
| `CLinkImageController` | De voorbeeldafbeelding van een koppeling ophalen of instellen |
| `GetLinksCollectionController` | Koppelingenverzameling ophalen met aangepaste filtering |
| `UpdateVisibilityLink` | De zichtbaarheid van een koppeling in- of uitschakelen |
| `UpdateVisibilityLinkCategory` | De zichtbaarheid van een koppelingscategorie in- of uitschakelen |
| `UpdatePositionLink` | Koppelingen opnieuw ordenen |

### Leerpaden

| Controller | Doel |
|-----------|---------|
| `CreateCLpAction` | Een leerpad aanmaken |
| `LpReorderController` | Leerpaditems opnieuw ordenen |

### Agenda

| Controller | Doel |
|-----------|---------|
| `UpdateCCalendarEventAction` | Een cursusagenda-gebeurtenis bijwerken |
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
| `CreateDropboxFileAction` | Een bestand uploaden naar de dropbox (hulpmiddel voor bestandsuitwisseling) |

### Studentenwerk (opdrachten)

| Controller | Doel |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Een opdrachtbestand indienen |
| `CreateStudentPublicationCommentAction` | Een opmerking aan een inzending toevoegen |
| `CreateStudentPublicationCorrectionFileAction` | Een correctiebestand voor een inzending uploaden |

### Persoonlijke bestanden

| Controller | Doel |
|-----------|---------|
| `CreatePersonalFileAction` | Een bestand uploaden naar de persoonlijke bestandsruimte van de gebruiker |
| `UpdatePersonalFileAction` | Een persoonlijk bestand bijwerken |

### Sociaal

| Controller | Doel |
|-----------|---------|
| `LikeSocialPostController` | Een sociaal bericht leuk vinden |
| `DislikeSocialPostController` | Een sociaal bericht niet meer leuk vinden |
| `CreateSocialPostAttachmentAction` | Een bestand aan een sociaal bericht koppelen |
| `SocialPostAttachmentsController` | Bijlagen bij een sociaal bericht weergeven |
| `AbstractFeedbackSocialPostController` | Basisklasse voor feedbackacties op sociale berichten |

### Sessies

| Controller | Doel |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Een sessie aanmaken en in één aanroep gebruikers en cursussen inschrijven |
| `SessionDuplicateProcessor` (`POST /api/sessions/{id}/duplicate`) | Een sessie aanmaken op basis van een modelsessie — zie [Sessieduplicatie](session-duplication.md) |

### Gebruikers en toegangs-URL's

| Controller | Doel |
|-----------|---------|
| `CreateUserOnAccessUrlAction` (`POST /api/access_urls/{id}/user`) | Een gebruiker aanmaken en koppelen aan een toegangs-URL — zie [Gebruikersaanmaak](user-creation.md) |
| `UserAccessUrlsController` | Toegangs-URL's weergeven waartoe een gebruiker behoort |
| `UserSkillsController` | Vaardigheden weergeven die aan een gebruiker zijn toegekend |

### Videoconferentie

| Controller | Doel |
|-----------|---------|
| `VideoConferenceCallbackController` | Callbacks van externe videoconferentieproviders afhandelen |

### Basisklassen

| Klasse | Doel |
|-------|---------|
| `BaseResourceFileAction` | Basisklasse voor acties voor het uploaden van bestanden; verzorgt het parsen van multipart-verzoeken, het aanmaken van resourceknooppunten en de opslag |

## Een aangepaste actie implementeren

Aangepaste acties zijn standaard Symfony-controllers die worden verwezen in de operatiedefinities van API Platform. Het attribuut `#[ApiResource]` staat op de **entiteit**, en de parameter `controller:` van elke operatie verwijst naar de actieklasse:

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

De actieklasse zelf is een gewone aanroepbare controller — services worden geïnjecteerd via de argumenten van de methode `__invoke()`:

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
- `deserialize: false` wordt ingesteld wanneer de actie het verzoek rechtstreeks leest (bijvoorbeeld bij multipart-bestandsuploads) in plaats van API Platform een JSON-body te laten deserialiseren.
- Acties voor het uploaden van bestanden breiden doorgaans `BaseResourceFileAction` uit, die het parsen van multipart-verzoeken en de koppeling van resourceknooppunten verzorgt.
- Beveiliging wordt afgedwongen via de parameter `security:` op de operatie, niet binnen de controller.