# Controllers

Chamilo 2.0 uses a large number of controllers (in the order of dozens) organized across the bundles. The exact count drifts version to version — treat the names below as illustrative, not exhaustive.

## Controller Types

### Admin Controllers

Located in `src/CoreBundle/Controller/Admin/`. Handle platform administration:

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

For read/write operations that don't need a dedicated HTTP controller — i.e. when you only want to change *how* an item or collection is fetched or persisted — prefer a **State Provider** or **State Processor** (see below). API Action Controllers are best reserved for endpoints that genuinely need request-level logic (file uploads, custom response formats, multi-step flows).

### AI Controller

`src/CoreBundle/Controller/AiController.php` is the entry point for AI-related endpoints (Aiken question generation, learning-path generation, image/video generation, open-answer grading, document analysis…). The exact set of routes evolves quickly — read the controller's `#[Route]` attributes for the current list rather than relying on a copy here.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` handles real-time chat and AI tutor:

* User-to-user messaging
* AI tutor chat (docked chat panel)
* Message history and polling

## API Platform State Providers & Processors

Not every API endpoint is backed by a controller. API Platform 3 splits the work between two interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — return data for `GET` operations (a single item or a collection).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — handle writes for `POST`, `PUT`, `PATCH`, and `DELETE` operations.

Chamilo's implementations live in `src/CoreBundle/State/` (around 35+ classes). They are wired to entities via the `provider:` and `processor:` arguments of `#[ApiResource]` operations rather than via routes.

### When to use them

Reach for a provider/processor — instead of an API Action Controller — when:

* The endpoint follows the standard REST shape (list / read / create / update / delete) but needs custom data assembly or persistence logic.
* You need to filter, denormalize, or enrich the result of a collection or item read (e.g. respecting the current Access URL, course context, or visibility rules).
* You need to run side effects on write (audit logs, file generation, related-entity updates) while keeping API Platform's normalization, validation, and pagination pipeline.
* You want to keep the operation discoverable in the OpenAPI / Hydra schema without registering a custom route.

If the endpoint instead needs raw `Request` access, returns a non-resource payload (file download, CSV, redirect), or orchestrates a multi-step flow, an API Action Controller in `src/CoreBundle/Controller/Api/` is a better fit.

### Wiring on the entity

Reference the class on the operation:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider example

`src/CoreBundle/State/DocumentProvider.php` resolves a `CDocument` by URI variable and throws `NotFoundHttpException` when missing:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

### Processor example

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegates to the default Doctrine `persistProcessor`, then runs side effects (generates a CSS file on the themes Flysystem filesystem, links the theme to the current Access URL):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Patterns to know

* **Compose with the default processor.** Decorate `ProcessorInterface $persistProcessor` (Doctrine's built-in) so Chamilo-specific logic runs *around* the standard persist, not instead of it.
* **Collection providers do their own pagination.** When a collection provider builds a custom query, it must respect `?page`, `?itemsPerPage`, and search filters — API Platform's automatic paginator only kicks in for the default Doctrine collection provider.
* **One class per resource + operation kind is common**, but a provider can serve several operations (see `UsergroupStateProvider`, reused across four operations on `Usergroup`).
* **Naming convention**: `<Entity>StateProvider` / `<Entity>StateProcessor` for resource-wide handlers; `<Entity><Action>Processor` (e.g. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) for narrower operations.

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
