# Plugin Architecture

## Plugin Location

Plugins are stored in `public/plugin/`. Each plugin has its own directory:

```
public/plugin/
├── bbb/                    # BigBlueButton integration
├── zoom/                   # Zoom integration
├── onlyoffice/             # OnlyOffice document editing
├── xapi/                   # xAPI/Tin Can
├── ...                     # 56 plugins total
```

## Plugin Structure

A typical plugin directory contains:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## Plugin Class

Each plugin extends the `Plugin` base class (`public/main/inc/lib/plugin.class.php`) and follows the singleton pattern:

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Key Class Properties

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registers the plugin as a course tool |
| `$isAdminPlugin` | bool | Adds an admin interface page |
| `$isMailPlugin` | bool | Integrates with the mail system |
| `$addCourseTool` | bool | Adds an icon to the course homepage |
| `$course_settings` | array | Defines per-course configuration fields |

## Plugin Lifecycle

1. **Installation** — The admin activates the plugin, which runs `install.php`
2. **Configuration** — Settings are defined and managed through the admin panel; stored in `access_url_rel_plugin` (supports multi-tenant)
3. **Execution** — The plugin injects content into display regions or reacts to platform events
4. **Deactivation** — The plugin is disabled but its data is preserved
5. **Uninstallation** — Runs `uninstall.php` to clean up data and tables

## Display Regions

Plugins inject HTML into 18 predefined regions of the Vue frontend by overriding `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Available regions: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony Integration

### Event Subscribers

Files ending in `EventSubscriber.php` placed inside `src/EventSubscriber/` are auto-registered via `PluginEventSubscriberPass`. They implement `EventSubscriberInterface` and react to events defined in `src/CoreBundle/Event/Events.php`.

### Doctrine Entities

Doctrine entities placed in `src/Entity/` are auto-discovered by `PluginEntityPass`. Use PHP 8 attributes for mapping. The namespace must follow `Chamilo\PluginBundle\{PluginName}`. Use unique table name prefixes (e.g., `my_plugin_*`) to avoid collisions.

### PluginHelper Service

For accessing plugin state from core Symfony services, inject `PluginHelper` rather than instantiating the plugin class directly:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginConfigValue('MyPlugin', 'api_key');
        }
    }
}
```

Available methods: `isPluginEnabled()`, `loadLegacyPlugin()`, `getPluginSetting()`, `getPluginConfiguration()`, `getPluginConfigValue()`.

## Core File References

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Plugin base class |
| `public/main/inc/lib/plugin.lib.php` | Plugin manager |
| `src/CoreBundle/Entity/Plugin.php` | Plugin Doctrine entity |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper service |
| `src/CoreBundle/Event/Events.php` | Event constants |
| `public/plugin/HelloWorld/` | Minimal example plugin |
| `public/plugin/TopLinks/` | Simple example plugin |
