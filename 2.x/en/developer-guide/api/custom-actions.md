# Custom Actions

Beyond standard CRUD operations, Chamilo has a number of custom API action controllers (in the order of dozens) that handle specialized operations. The exact count varies between releases — list `src/CoreBundle/Controller/Api/` for the current set.

## Location

Custom actions are in `src/CoreBundle/Controller/Api/`.

## Notable Custom Actions

### Documents

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

### Glossary

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Create a glossary term |
| `UpdateCGlossaryAction` | Update a glossary term |
| `ExportCGlossaryAction` | Export glossary to file |
| `ImportCGlossaryAction` | Import glossary from file |
| `ExportGlossaryToDocumentsAction` | Export glossary as a document in the course |
| `GetGlossaryCollectionController` | Get glossary collection with custom filtering |

### Links

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

### Learning Paths

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Create a learning path |
| `LpReorderController` | Reorder learning path items |

### Calendar

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Update a course calendar event |
| `CalendarMyStudentsScheduleAction` | Get the schedule of a teacher's students |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Create a blog post |
| `CreateBlogAttachmentAction` | Attach a file to a blog post |
| `UpdateVisibilityBlog` | Toggle blog visibility |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Upload a file to the dropbox (file exchange tool) |

### Student Work (Assignments)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Submit an assignment file |
| `CreateStudentPublicationCommentAction` | Add a comment to a submission |
| `CreateStudentPublicationCorrectionFileAction` | Upload a correction file for a submission |

### Personal Files

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Upload a file to the user's personal file space |
| `UpdatePersonalFileAction` | Update a personal file |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Like a social post |
| `DislikeSocialPostController` | Unlike a social post |
| `CreateSocialPostAttachmentAction` | Attach a file to a social post |
| `SocialPostAttachmentsController` | List attachments on a social post |
| `AbstractFeedbackSocialPostController` | Base class for social post feedback actions |

### Sessions

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Create a session and enrol users and courses in one call |

### Users & Access URLs

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Create a user and associate them with an access URL |
| `UserAccessUrlsController` | List access URLs a user belongs to |
| `UserSkillsController` | List skills awarded to a user |

### Video Conference

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Handle callbacks from external video conference providers |

### Base Classes

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Base class for file-upload actions; handles multipart parsing, resource node creation, and storage |

## Implementing a Custom Action

Custom actions are standard Symfony controllers referenced in API Platform operation definitions. The `#[ApiResource]` attribute lives on the **entity**, and each operation's `controller:` parameter points to the action class:

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

The action class itself is a plain invokable controller — services are injected via `__invoke()` method arguments:

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

Key points:
- `deserialize: false` is set when the action reads the request directly (e.g. multipart file uploads) instead of letting API Platform deserialize a JSON body.
- File-upload actions typically extend `BaseResourceFileAction`, which handles multipart parsing and resource node wiring.
- Security is enforced via the `security:` parameter on the operation, not inside the controller.
