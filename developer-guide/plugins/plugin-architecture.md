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
my_plugin/
├── plugin.php              # Plugin class definition (extends Plugin)
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Main plugin page (if applicable)
├── config.php              # Configuration options
├── lang/                   # Translation files
│   ├── english.php
│   ├── french.php
│   └── ...
├── src/                    # PHP source files
└── README.md               # Plugin documentation
```

## Plugin Class

Each plugin extends the `Plugin` base class:

```php
class MyPlugin extends Plugin
{
    public function getName(): string
    {
        return 'my_plugin';
    }

    public function install(): void
    {
        // Create tables, add settings, etc.
    }

    public function uninstall(): void
    {
        // Clean up
    }
}
```

## Plugin Lifecycle

1. **Installation** — The admin activates the plugin, which runs `install.php`
2. **Configuration** — Settings are defined and managed through the admin panel
3. **Execution** — The plugin hooks into platform events or provides course tools
4. **Deactivation** — The plugin is disabled but its data is preserved
5. **Uninstallation** — Runs `uninstall.php` to clean up data and tables

## Plugin Entity

The `Plugin` entity (`src/CoreBundle/Entity/Plugin`) and `PluginRepository` track installed plugins and their configuration in the database.

## Legacy vs Modern

The current plugin system uses a legacy architecture. Plugins interact with both the legacy PHP code and the modern Symfony architecture through:

* `LegacyPluginCourseTool` — Bridges plugins to the course tool system
* `LegacyPluginCourseToolResolver` — Resolves plugin tools for courses
