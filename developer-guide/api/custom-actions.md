# Custom Actions

Beyond standard CRUD operations, Chamilo has 80+ custom API action controllers that handle specialized operations.

## Location

Custom actions are in `src/CoreBundle/Controller/Api/`.

## Notable Custom Actions

### Document Operations

| Action | Purpose |
|--------|---------|
| `CreateDocumentFileAction` | Upload a file to create a document |
| `UpdateDocumentFileAction` | Replace a document's file |
| `ReplaceDocumentFileAction` | Replace with a new version |
| `MoveDocumentAction` | Move to a different folder |
| `UpdateVisibilityDocument` | Toggle visibility |

### Content Operations

| Action | Purpose |
|--------|---------|
| `CreateCGlossaryAction` | Create glossary term |
| `ExportCGlossaryAction` | Export glossary |
| `ImportCGlossaryAction` | Import glossary from file |
| `CreateCLinkAction` | Create external link |
| `ExportCLinksAction` | Export links |

### Student Work

| Action | Purpose |
|--------|---------|
| `CreateStudentPublicationFileAction` | Submit assignment file |
| `CreateStudentPublicationCommentAction` | Add comment to submission |

### Statistics

| Action | Purpose |
|--------|---------|
| `GetCourseStatsAction` | Course-level statistics |
| `GetStatsAction` | Platform-wide statistics |

### Social

| Action | Purpose |
|--------|---------|
| `LikeSocialPostController` | Like a social post |
| `DislikeSocialPostController` | Unlike a social post |

## Implementing a Custom Action

Custom actions are standard Symfony controllers that are referenced in API Platform operation definitions:

```php
// In the entity:
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/documents/upload',
            controller: CreateDocumentFileAction::class,
        ),
    ]
)]
```

The controller class:

```php
class CreateDocumentFileAction extends AbstractController
{
    public function __invoke(Request $request): CDocument
    {
        // Handle the file upload and create the document
    }
}
```
