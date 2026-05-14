# Aangepaste Acties

Naast standaard CRUD-operaties heeft Chamilo een aantal aangepaste API-actiecontrollers (in de orde van tientallen) die gespecialiseerde operaties afhandelen. Het exacte aantal varieert tussen releases — bekijk `src/CoreBundle/Controller/Api/` voor de huidige set.

## Locatie

Aangepaste acties bevinden zich in `src/CoreBundle/Controller/Api/`.

## Opmerkelijke Aangepaste Acties

### Documenten

| Controller | Doel |
|-----------|------|
| `CreateDocumentFileAction` | Een bestand uploaden of een map/linkdocument aanmaken |
| `UpdateDocumentFileAction` | Het bestand van een document vervangen |
| `ReplaceDocumentFileAction` | Een documentbestand vervangen, met behoud van de ID's |
| `MoveDocumentAction` | Een document naar een andere map verplaatsen |
| `UpdateVisibilityDocument` | De zichtbaarheid van een document voor leerlingen in- of uitschakelen |
| `DownloadAllDocumentsAction` | Alle documenten in een map als ZIP downloaden |
| `DownloadSelectedDocumentsAction` | Een geselecteerde set documenten als ZIP downloaden |
| `DocumentUsageAction` | Lijst van cursussen/sessies waar een document wordt gebruikt |
| `DocumentLearningPathUsageAction` | Lijst van leerpaden waar een document wordt gebruikt |

### Woordenlijst

| Controller | Doel |
|-----------|------|
| `CreateCGlossaryAction` | Een woordenlijstterm aanmaken |
| `UpdateCGlossaryAction` | Een woordenlijstterm bijwerken |
| `ExportCGlossaryAction` | Woordenlijst exporteren naar een bestand |
| `ImportCGlossaryAction` | Woordenlijst importeren uit een bestand |
| `ExportGlossaryToDocumentsAction` | Woordenlijst exporteren als document in de cursus |
| `GetGlossaryCollectionController` | Woordenlijstverzameling ophalen met aangepaste filtering |

### Links

| Controller | Doel |
|-----------|------|
| `CreateCLinkAction` | Een externe link aanmaken |
| `UpdateCLinkAction` | Een externe link bijwerken |
| `CreateCLinkCategoryAction` | Een linkcategorie aanmaken |
| `UpdateCLinkCategoryAction` | Een linkcategorie bijwerken |
| `CheckCLinkAction` | Controleren of een link-URL bereikbaar is |
| `ExportCLinksAction` | Links exporteren naar een bestand |
| `CLinkDetailsController` | Linkdetails ophalen |
| `CLinkImageController` | Een voorbeeldafbeelding van een link ophalen of instellen |
| `GetLinksCollectionController` | Linkverzameling ophalen met aangepaste filtering |
| `UpdateVisibilityLink` | Zichtbaarheid van een link in- of uitschakelen |
| `UpdateVisibilityLinkCategory` | Zichtbaarheid van een linkcategorie in- of uitschakelen |
| `UpdatePositionLink` | Links opnieuw ordenen |

### Leerpaden

| Controller | Doel |
|-----------|------|
| `CreateCLpAction` | Een leerpad aanmaken |
| `LpReorderController` | Items in een leerpad opnieuw ordenen |

### Kalender

| Controller | Doel |
|-----------|------|
| `UpdateCCalendarEventAction` | Een cursuskalendergebeurtenis bijwerken |
| `CalendarMyStudentsScheduleAction` | Het rooster van de studenten van een docent ophalen |

### Blog

| Controller | Doel |
|-----------|------|
| `CreateCBlogAction` | Een blogbericht aanmaken |
| `CreateBlogAttachmentAction` | Een bestand aan een blogbericht koppelen |
| `UpdateVisibilityBlog` | Zichtbaarheid van een blog in- of uitschakelen |

### Dropbox

| Controller | Doel |
|-----------|------|
| `CreateDropboxFileAction` | Een bestand uploaden naar de dropbox (bestandsuitwisselingstool) |

### Studentenwerk (Opdrachten)

| Controller | Doel |
|-----------|------|
| `CreateStudentPublicationFileAction` | Een opdrachtbestand indienen |
| `CreateStudentPublicationCommentAction` | Een opmerking toevoegen aan een inzending |
| `CreateStudentPublicationCorrectionFileAction` | Een correctiebestand uploaden voor een inzending |

### Persoonlijke Bestanden

| Controller | Doel |
|-----------|------|
| `CreatePersonalFileAction` | Een bestand uploaden naar de persoonlijke bestandsruimte van de gebruiker |
| `UpdatePersonalFileAction` | Een persoonlijk bestand bijwerken |

### Sociaal

| Controller | Doel |
|-----------|------|
| `LikeSocialPostController` | Een sociaal bericht liken |
| `DislikeSocialPostController` | Een sociaal bericht niet meer liken |
| `CreateSocialPostAttachmentAction` | Een bestand aan een sociaal bericht koppelen |
| `SocialPostAttachmentsController` | Bijlagen bij een sociaal bericht weergeven |
| `AbstractFeedbackSocialPostController` | Basisklasse voor feedbackacties op sociale berichten |

### Sessies

| Controller | Doel |
|-----------|------|
| `CreateSessionWithUsersAndCoursesAction` | Een sessie aanmaken en gebruikers en cursussen in één oproep inschrijven |

### Gebruikers & Toegangs-URL's

| Controller | Doel |
|-----------|------|
| `CreateUserOnAccessUrlAction` | Een gebruiker aanmaken en koppelen aan een toegangs-URL |
| `UserAccessUrlsController` | Lijst van toegangs-URL's waartoe een gebruiker behoort |
| `UserSkillsController` | Lijst van vaardigheden die aan een gebruiker zijn toegekend |

### Videoconferentie

| Controller | Doel |
|-----------|------|
| `VideoConferenceCallbackController` | Callbacks van externe videoconferentieproviders afhandelen |

### Basisklassen

| Klasse | Doel |
|-------|------|
| `BaseResourceFileAction` | Basisklasse voor bestand-uploadacties; behandelt multipart parsing, aanmaken van resource nodes en opslag |

---
## Een Aangepaste Actie Implementeren

Aangepaste acties zijn standaard Symfony-controllers die worden gerefereerd in de operationele definities van API Platform. Het `#[ApiResource]`-attribuut bevindt zich op de **entiteit**, en de `controller:`-parameter van elke operatie verwijst naar de actieklasse:

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

De actieklasse zelf is een eenvoudige aanroepbare controller — services worden geïnjecteerd via argumenten van de `__invoke()`-methode:

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
- `deserialize: false` wordt ingesteld wanneer de actie de aanvraag direct leest (bijvoorbeeld bij multipart-bestandsuploads) in plaats van API Platform een JSON-body te laten deserialiseren.
- Acties voor bestandsuploads erven doorgaans van `BaseResourceFileAction`, dat multipart-parsing en resource node-koppeling afhandelt.
- Beveiliging wordt afgedwongen via de `security:`-parameter op de operatie, niet binnen de controller.