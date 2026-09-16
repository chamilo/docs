# Events and Listeners

Chamilo uses Symfony's event system for decoupled communication between components.

## Event Listeners

Chamilo uses two listener locations:

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP listeners (request, response, exception, login/logout, course/session access, etc.). Examples: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine entity listeners attached to specific entities. Examples: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Pick the location that matches what you need to react to: HTTP-pipeline events go in `EventListener/`; entity lifecycle hooks go in `Entity/Listener/`.

## Event Subscribers

Located in `src/CoreBundle/EventSubscriber/`:

Event subscribers can listen to multiple events:

* **Security subscribers** — Handle login/logout events, track login attempts
* **API subscribers** — Pre/post processing for API requests
* **Doctrine subscribers** — React to entity lifecycle events

## Doctrine Lifecycle Events

Entities use `#[ORM\HasLifecycleCallbacks]` for database-level events:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creating Custom Listeners

To add custom behavior:

1. Create a listener/subscriber class in the appropriate bundle
2. Tag it as an event listener or subscriber in the service configuration
3. Implement the handler method

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Key Events

| Event | When it fires |
|-------|--------------|
| `kernel.request` | Every HTTP request |
| `kernel.response` | Before sending the HTTP response |
| `security.interactive_login` | User logs in |
| `doctrine.prePersist` | Before an entity is first saved |
| `doctrine.postUpdate` | After an entity is updated |

## Chamilo-Specific Events

These events are dispatched by Chamilo's own code and are the primary integration points for plugins. Constants are defined in `Chamilo\CoreBundle\Event\Events`.

| Constant | Event string | When it fires |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | After a course is created |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Before a user accesses a course |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Before a user enrols in a course |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | When a user attempts to resubscribe to a session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | After login credentials are validated |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | After additional login conditions are checked |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | When the document tool toolbar is rendered |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | When per-file action buttons are rendered |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | When a document is opened for viewing |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | When the exercise report page renders its action links |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | After a learner submits an exercise |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | After each question is answered |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | After a learning path is created |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | When a learner opens an LP item |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | After a learner completes a learning path |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | When the admin dashboard builds its block list |
| `Events::USER_CREATED` | `chamilo.event.user_created` | After a user account is created |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | After a user account is updated |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | After a user account is deleted |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | After a portfolio item is created |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | When a notification body is formatted |

## Plugin Example: Adding a Button to the Document Viewer

This section walks through how a plugin uses an event subscriber to inject a button into an existing Chamilo page — no core-code modification required.

### Scenario

A plugin called **MyViewer** wants to add an "Open in MyViewer" button next to every document in the course file manager. The relevant event is `Events::DOCUMENT_ITEM_VIEW`, dispatched by Chamilo whenever a document is about to be displayed, carrying the `CDocument` entity and a mutable list of links.

### Plugin directory layout

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### Main plugin class (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

The `Plugin` base class provides `isEnabled()`, `get($settingKey)`, and helpers for installing course tools and settings. The singleton pattern (`static $instance`) is the standard Chamilo convention because the plugin class is also instantiated outside the Symfony container (in legacy PHP pages).

### Event subscriber (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` appends HTML to the array that Chamilo's document view template renders alongside the built-in "Download" and "Preview" actions. The subscriber never modifies Chamilo core files.

### Registration

No manual service registration is needed. Chamilo's `config/services.yaml` enables Symfony's `autoconfigure` flag globally, which automatically tags any class implementing `EventSubscriberInterface` as a `kernel.event_subscriber`. As long as the plugin directory is loaded (via Composer's classmap or PSR-4 autoload), Symfony picks up the subscriber on the next cache clear.

```bash
php bin/console cache:clear
```

### How the event data flows

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

Multiple plugins can subscribe to the same event independently; each appends to the shared data without knowing about the others. The order of execution follows Symfony's priority system — pass a priority integer as the second element of the handler tuple in `getSubscribedEvents()` if ordering matters:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```
