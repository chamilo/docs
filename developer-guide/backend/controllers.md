# Controllers

Chamilo 2.0 uses 131+ controllers organized across the bundles.

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

These extend API Platform's built-in CRUD with custom business logic. There are 80+ custom actions, for example:

* `CreateDocumentFileAction` — File upload for documents
* `CreateStudentPublicationFileAction` — Assignment submission upload
* `UpdateVisibilityDocument` — Toggle document visibility
* `ExportCGlossaryAction` — Export glossary
* `GetCourseStatsAction` — Course statistics endpoint
* `MoveDocumentAction` — Move a document to a different folder

### AI Controller

`src/CoreBundle/Controller/AiController.php` handles all AI-related endpoints:

* `/ai/generate_aiken` — Generate exercise questions
* `/ai/generate_learnpath` — Generate learning paths
* `/ai/generate_image` — Generate images
* `/ai/generate_video` — Generate videos
* `/ai/open_answer_grade` — Grade open-ended answers
* `/ai/document_feedback` — Analyze document content
* `/ai/task_grade` — Grade assignments

### Chat Controller

`src/CoreBundle/Controller/AccountChatController.php` handles real-time chat and AI tutor:

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
