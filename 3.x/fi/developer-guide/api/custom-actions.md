# Mukautetut toiminnot

Tavallisten CRUD-operaatioiden lisäksi Chamilossa on lukuisia mukautettuja API-toimintokontrollereita (kymmeniä), jotka käsittelevät erikoistuneita operaatioita. Tarkka määrä vaihtelee julkaisujen välillä — luettele `src/CoreBundle/Controller/Api/` nähdäksesi nykyisen joukon.

## Sijainti

Mukautetut toiminnot sijaitsevat polussa `src/CoreBundle/Controller/Api/`.

## Huomionarvoiset mukautetut toiminnot

### Dokumentit

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Upload a file or create a folder/link document |
| `UpdateDocumentFileAction` | Replace a document's file |
| `ReplaceDocumentFileAction` | Replace a document file, preserving its IDs |
| `MoveDocumentAction` | Move a document to a different folder |
| `UpdateVisibilityDocument` | Toggle document visibility for learners |
| `DownloadAllDocumentsAction` | Download all documents in a folder as a ZIP |
| `DownloadSelectedDocumentsAction` | Download a selected set of documents as a ZIP |
| `DocumentUsageAction` | List courses/sessions where a document is used |
| `DocumentLearningPathUsageAction` | List learning paths where a document is used |

### Sanasto

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Create a glossary term |
| `UpdateCGlossaryAction` | Update a glossary term |
| `ExportCGlossaryAction` | Export glossary to file |
| `ImportCGlossaryAction` | Import glossary from file |
| `ExportGlossaryToDocumentsAction` | Export glossary as a document in the course |
| `GetGlossaryCollectionController` | Get glossary collection with custom filtering |

### Linkit

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Create an external link |
| `UpdateCLinkAction` | Update an external link |
| `CreateCLinkCategoryAction` | Create a link category |
| `UpdateCLinkCategoryAction` | Update a link category |
| `CheckCLinkAction` | Check whether a link URL is reachable |
| `ExportCLinksAction` | Export links to file |
| `CLinkDetailsController` | Get link details |
| `CLinkImageController` | Get or set a link's preview image |
| `GetLinksCollectionController` | Get links collection with custom filtering |
| `UpdateVisibilityLink` | Toggle link visibility |
| `UpdateVisibilityLinkCategory` | Toggle link category visibility |
| `UpdatePositionLink` | Reorder links |

### Oppimispolut

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Create a learning path |
| `LpReorderController` | Reorder learning path items |

### Kalenteri

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Update a course calendar event |
| `CalendarMyStudentsScheduleAction` | Get the schedule of a teacher's students |

### Blogi

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Create a blog post |
| `CreateBlogAttachmentAction` | Attach a file to a blog post |
| `UpdateVisibilityBlog` | Toggle blog visibility |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Upload a file to the dropbox (file exchange tool) |

### Opiskelijatyöt (tehtävät)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Submit an assignment file |
| `CreateStudentPublicationCommentAction` | Add a comment to a submission |
| `CreateStudentPublicationCorrectionFileAction` | Upload a correction file for a submission |

### Henkilökohtaiset tiedostot

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Upload a file to the user's personal file space |
| `UpdatePersonalFileAction` | Update a personal file |

### Sosiaalinen

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Like a social post |
| `DislikeSocialPostController` | Unlike a social post |
| `CreateSocialPostAttachmentAction` | Attach a file to a social post |
| `SocialPostAttachmentsController` | List attachments on a social post |
| `AbstractFeedbackSocialPostController` | Base class for social post feedback actions |

### Istunnot

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Create a session and enrol users and courses in one call |

### Käyttäjät ja käyttö-URL:t

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Create a user and associate them with an access URL |
| `UserAccessUrlsController` | List access URLs a user belongs to |
| `UserSkillsController` | List skills awarded to a user |

### Videoneuvottelu

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Handle callbacks from external video conference providers |

### Perusluokat

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Base class for file-upload actions; handles multipart parsing, resource node creation, and storage |

## Mukautetun toiminnon toteuttaminen

Mukautetut toiminnot ovat tavallisia Symfony-kontrolleria, joihin viitataan API Platformin operaatiomäärityksissä. `#[ApiResource]`-attribuutti sijaitsee **entiteetissä**, ja kunkin operaation `controller:`-parametri osoittaa toimintoluokkaan:

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

Itse toimintoluokka on tavallinen kutsuttava kontrolleri — palvelut injektoidaan `__invoke()`-metodin argumenttien kautta:

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

Keskeiset seikat:
- `deserialize: false` asetetaan, kun toiminto lukee pyynnön suoraan (esim. moniosaiset tiedostolähetykset) sen sijaan, että API Platform deserialisoisi JSON-rungon.
- Tiedostonlähetystoiminnot periytyvät tyypillisesti luokasta `BaseResourceFileAction`, joka hoitaa moniosaisen jäsennnyksen ja resurssisolmun kytkennän.
- Tietoturva toteutetaan operaation `security:`-parametrilla, ei kontrollerin sisällä.