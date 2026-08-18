# Creating a Plugin

This guide walks through creating a basic Chamilo plugin. For additional detail, see the [Plugin development wiki page](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Step 1: Create the Plugin Directory

Create a directory in `public/plugin/`. The directory name should match your plugin's identifier:

```
public/plugin/MyPlugin/
```

## Step 2: Define the Plugin Class

Create `src/MyPluginPlugin.php`. The class extends `Plugin` and follows the singleton pattern:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Available Setting Types

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

For `select` settings:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Access settings at runtime:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Step 3: Create plugin.php

`plugin.php` at the plugin root is **required**. It must assign `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Step 4: Create Install and Uninstall Scripts

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Implement the actual schema creation/deletion inside the class using Doctrine's `SchemaTool`.

## Step 5: Add Translations

Create language files in `lang/` using locale codes (e.g., `en_US.php`, `fr_FR.php`, `es_ES.php`). The fallback is `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Access translations via `$plugin->get_lang('key')`.

## Step 6: Inject Content via Display Regions

Plugins can inject HTML into 18 predefined regions of the Vue frontend. Override `renderRegion()` in your class:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Available regions include: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Step 7: React to Platform Events (Optional)

Plugins can react to platform events using Symfony event subscribers. Create a file ending in `EventSubscriber.php` inside `src/EventSubscriber/` — it is auto-registered via `PluginEventSubscriberPass`.

Two requirements, or the subscriber is skipped silently: the class must be in the **global namespace** (the pass resolves it from the file name), and you must run `composer dump-autoload` after adding it (`public/plugin` is a classmap entry). Check the result with `php bin/console debug:event-dispatcher <event.name>`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

See `src/CoreBundle/Event/Events.php` for the full list of available events (user, course, session, LP, exercise, portfolio, authentication, and more).

### Cleaning up when a course, session or user is deleted

If your plugin stores rows keyed on a course, session or user, subscribe to `Events::COURSE_DELETED`, `Events::SESSION_DELETED` or `Events::USER_DELETED`. These are the only way to clean up — the old `doWhenDeleting*` methods no longer exist. Three rules apply to these listeners:

* **Act on `AbstractEvent::TYPE_PRE`** — the event fires before the row is removed, the only moment when your foreign key still resolves and the data is still readable. `USER_DELETED` also fires as `TYPE_POST`, so the check is not optional there.
* **Guard on installed, not enabled** — use `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Your rows survive the plugin being deactivated, or being enabled only on another access URL, and their foreign key blocks the deletion either way.
* **On `USER_DELETED`, check `$event->isHardDelete()`** — a soft delete keeps the user restorable, so its data must survive.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

The `StudentFollowUp` plugin is the reference for users; `Bbb`, `BuyCourses` and `EmbedRegistry` carry the course and session equivalents.

## Step 8: Lifecycle Hooks

Override these methods in your plugin class to respond to platform actions:

| Method | Triggered when |
|--------|----------------|
| `install()` | Plugin is activated |
| `uninstall()` | Plugin is removed |
| `performActionsAfterConfigure()` | Admin saves the config form |
| `course_settings_updated(array $values)` | Course-level settings change |
| `validateCourseSetting(string $variable)` | Course setting saved (return `false` to reject) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` and `doWhenDeletingSession()` were removed, along with the `AppPlugin::performActionsWhenDeletingItem()` trigger that called them — overriding them now does nothing. Use the deletion events from [Step 7](#cleaning-up-when-a-course-session-or-user-is-deleted) instead.

## Step 9: Activate

Log in as administrator, navigate to **Manage plugins**, find your plugin, and click **Activate**.

## Tips

* **Follow existing plugins as examples** — `public/plugin/HelloWorld/` and `public/plugin/TopLinks/` are good simple references
* **Use translations** — Always use the `lang/` system for user-facing text
* **Clean up on uninstall** — Remove database tables and settings in the uninstall script
* **Check enabled state** — In event subscribers, call `$this->plugin->isEnabled()` before executing logic. The exception is cleanup on deletion: guard on installed instead, since the rows outlive the plugin being disabled
