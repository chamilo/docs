# Plugin-Architektur

## Plugin-Speicherort

Plugins werden in `public/plugin/` gespeichert. Jedes Plugin besitzt ein eigenes Verzeichnis:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Plugin-Struktur

Ein typisches Plugin-Verzeichnis enthält:

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

## Plugin-Klasse

Jedes Plugin erweitert die Basisklasse `Plugin` (`public/main/inc/lib/plugin.class.php`) und folgt dem Singleton-Muster:

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

### Wichtige Klasseneigenschaften

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registriert das Plugin als Kurswerkzeug |
| `$isAdminPlugin` | bool | Fügt eine Administrationsoberfläche hinzu |
| `$isMailPlugin` | bool | Integriert sich in das Mailsystem |
| `$addCourseTool` | bool | Fügt ein Symbol auf der Kursstartseite hinzu |
| `$course_settings` | array | Definiert kursbezogene Konfigurationsfelder |

## Plugin-Lebenszyklus

1. **Installation** — Der Administrator aktiviert das Plugin, wodurch `install.php` ausgeführt wird
2. **Konfiguration** — Einstellungen werden über das Administrationspanel definiert und verwaltet; gespeichert in `access_url_rel_plugin` (unterstützt Multi-Tenant)
3. **Ausführung** — Das Plugin fügt Inhalte in Anzeigebereiche ein oder reagiert auf Plattformereignisse
4. **Deaktivierung** — Das Plugin wird deaktiviert, seine Daten bleiben jedoch erhalten
5. **Deinstallation** — Führt `uninstall.php` aus, um Daten und Tabellen zu bereinigen

## Anzeigebereiche (Display Regions)

Plugins fügen HTML in 18 vordefinierte Bereiche des Vue-Frontends ein, indem sie `renderRegion()` überschreiben:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Verfügbare Bereiche: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-Integration

### Event-Subscriber

Dateien, die auf `EventSubscriber.php` enden und in `src/EventSubscriber/` liegen, werden über `PluginEventSubscriberPass` automatisch registriert. Sie implementieren `EventSubscriberInterface` und reagieren auf Ereignisse, die in `src/CoreBundle/Event/Events.php` definiert sind.

Da die Plugin-Klasse (`MyPluginPlugin`) kein Symfony-Service ist, kann sie nicht in den Konstruktor des Subscribers autowired werden. Verwenden Sie stattdessen das Singleton `create()`:

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Doctrine-Entitäten

Doctrine-Entitäten in `src/Entity/` werden von `PluginEntityPass` automatisch erkannt. Verwenden Sie PHP-8-Attribute für das Mapping. Der Namensraum muss `Chamilo\PluginBundle\{PluginName}` folgen. Verwenden Sie eindeutige Tabellennamenpräfixe (z. B. `my_plugin_*`), um Kollisionen zu vermeiden.

### PluginHelper-Dienst

Um den Plugin-Status aus zentralen Symfony-Diensten heraus abzurufen, injizieren Sie `PluginHelper`, anstatt die Plugin-Klasse direkt zu instanziieren:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

Verfügbare Methoden:

| Methode | Zweck |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Prüfen, ob ein Plugin installiert und für die aktuelle Zugriffs-URL aktiv ist |
| `loadLegacyPlugin(string $name): ?object` | Das Plugin-Singleton instanziieren und zurückgeben |
| `getPluginSetting(string $name, string $key): mixed` | Einen einzelnen Plugin-Einstellungswert lesen |
| `getPluginOverrides(string $name): array` | `plugin.yaml`-Überschreibungen (Standardwerte + zugriffs-URL-spezifisch) für ein Plugin abrufen |

## Referenzen auf Kerndateien

| Datei | Zweck |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Plugin-Basisklasse |
| `public/main/inc/lib/plugin.lib.php` | Plugin-Manager |
| `src/CoreBundle/Entity/Plugin.php` | Plugin-Doctrine-Entität |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-Dienst |
| `src/CoreBundle/Event/Events.php` | Ereigniskonstanten |
| `public/plugin/HelloWorld/` | Minimales Beispiel-Plugin |
| `public/plugin/TopLinks/` | Einfaches Beispiel-Plugin |