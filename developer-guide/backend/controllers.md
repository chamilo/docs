# Controllers

Chamilo 2.0 uses a large number of controllers (in the order of dozens) organized across the bundles. The exact count drifts version to version — treat the names below as illustrative, not exhaustive.

## Controller Types

### Admin Controllers

Located in `src/CoreBundle/Controller/`. Handle platform administration:

* `AdminController` — Dashboard, file info, email testing
* `UserListController` — User CRUD
* `CourseListController` — Course management
* `SessionAdminController` — Session management
* `SettingsController` — Platform settings
* `SecurityController` — Login attempts, IDS events
* `PluginsController` — Plugin management
* `RoomController` — Room management

### API Action Controllers

Custom API Platform actions in `src/CoreBundle/Controller/Api/`:

These extend API Platform's built-in CRUD with custom business logic. Examples:

* `CreateDocumentFileAction` — File upload for documents
* `CreateStudentPublicationFileAction` — Assignment submission upload
* `UpdateVisibilityDocument` — Toggle document visibility
* `ExportCGlossaryAction` — Export glossary
* `MoveDocumentAction` — Move a document to a different folder

### AI Controller

`src/CoreBundle/Controller/AiController.php` is the entry point for AI-related endpoints (Aiken question generation, learning-path generation, image/video generation, open-answer grading, document analysis…). The exact set of routes evolves quickly — read the controller's `#[Route]` attributes for the current list rather than relying on a copy here.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` handles real-time chat and AI tutor:

* User-to-user messaging
* AI tutor chat (docked chat panel)
* Message history and polling

## Routing

Controllers use **PHP 8 attributes** for route definitions:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform resources use `#[ApiResource]` attributes on entities, with custom operations pointing to controller actions.

## Traits

Controllers use shared traits for common functionality:

* `ControllerTrait` — Access to settings, serializer, and common services
* `CourseControllerTrait` — Course context helpers
* `ResourceControllerTrait` — Resource node operations
