# Plugin-Architektur

## Plugin-Speicherort

Plugins werden in `public/plugin/` gespeichert. Jedes Plugin hat sein eigenes Verzeichnis:

```
public/plugin/
├── Bbb/                    # BigBlueButton-Integration
├── Zoom/                   # Zoom-Integration
├── Onlyoffice/             # OnlyOffice-Dokumentbearbeitung
├── XApi/                   # xAPI/Tin Can
├── ...                     # Mitgelieferte Plugins befinden sich unter public/plugin/
```

## Plugin-Struktur

Ein typisches Plugin-Verzeichnis enthält:

```
public/plugin/MyPlugin/
├── plugin.php              # ERFORDERLICH — weist $plugin_info zu
├── install.php             # Installationsskript
├── uninstall.php           # Deinstallationsskript
├── index.php               # Einstiegspunkt für die Regionsdarstellung (falls zutreffend)
├── admin.php               # Admin-Oberfläche (optional)
├── lang/                   # Übersetzungsdateien (Lokalisierungscodes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Haupt-Plugin-Klasse (erweitert Plugin)
│   ├── Entity/                   # Doctrine-Entitäten (automatisch erkannt)
│   ├── Repository/               # Doctrine-Repositories
│   └── EventSubscriber/          # Symfony-Ereignisabonnenten (automatisch registriert)
├── templates/              # Twig-Vorlagen
└── resources/              # CSS/JS-Ressourcen
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

| Eigenschaft | Typ | Wirkung |
|-------------|-----|---------|
| `$isCoursePlugin` | bool | Registriert das Plugin als Kurstool |
| `$isAdminPlugin` | bool | Fügt eine Admin-Oberflächenseite hinzu |
| `$isMailPlugin` | bool | Integriert sich in das Mail-System |
| `$addCourseTool` | bool | Fügt ein Symbol zur Kurs-Startseite hinzu |
| `$course_settings` | array | Definiert Konfigurationsfelder pro Kurs |

## Plugin-Lebenszyklus

1. **Installation** — Der Administrator aktiviert das Plugin, wodurch `install.php` ausgeführt wird
2. **Konfiguration** — Einstellungen werden über das Admin-Panel definiert und verwaltet; gespeichert in `access_url_rel_plugin` (unterstützt Multi-Tenant)
3. **Ausführung** — Das Plugin fügt Inhalte in Anzeigebereiche ein oder reagiert auf Plattformereignisse
4. **Deaktivierung** — Das Plugin wird deaktiviert, aber seine Daten bleiben erhalten
5. **Deinstallation** — Führt `uninstall.php` aus, um Daten und Tabellen zu bereinigen

## Anzeigebereiche

Plugins fügen HTML in 18 vordefinierte Bereiche der Vue-Oberfläche ein, indem sie `renderRegion()` überschreiben:

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

### Ereignisabonnenten

Dateien, die auf `EventSubscriber.php` enden und sich in `src/EventSubscriber/` befinden, werden automatisch über `PluginEventSubscriberPass` registriert. Sie implementieren `EventSubscriberInterface` und reagieren auf Ereignisse, die in `src/CoreBundle/Event/Events.php` definiert sind.

Da die Plugin-Klasse (`MyPluginPlugin`) kein Symfony-Service ist, kann sie nicht automatisch in den Konstruktor des Abonnenten eingebunden werden. Verwenden Sie stattdessen das Singleton `create()`:

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

Doctrine-Entitäten, die sich in `src/Entity/` befinden, werden automatisch durch `PluginEntityPass` erkannt. Verwenden Sie PHP 8-Attribute für das Mapping. Der Namespace muss `Chamilo\PluginBundle\{PluginName}` folgen. Verwenden Sie eindeutige Tabellenname-Präfixe (z. B. `my_plugin_*`), um Kollisionen zu vermeiden.

---
### PluginHelper-Dienst

Um den Zustand von Plugins aus den zentralen Symfony-Diensten abzufragen, injizieren Sie `PluginHelper`, anstatt die Plugin-Klasse direkt zu instanziieren:

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
|--------|-------|
| `isPluginEnabled(string $name): bool` | Überprüft, ob ein Plugin installiert und für die aktuelle Zugriffs-URL aktiv ist |
| `loadLegacyPlugin(string $name): ?object` | Instanziiert und gibt das Plugin-Singleton zurück |
| `getPluginSetting(string $name, string $key): mixed` | Liest einen einzelnen Plugin-Einstellungswert |
| `getPluginOverrides(string $name): array` | Ruft die `plugin.yaml`-Überschreibungen (Standardwerte + Zugriffs-URL-spezifisch) für ein Plugin ab |

## Referenzen zu zentralen Dateien

| Datei | Zweck |
|------|-------|
| `public/main/inc/lib/plugin.class.php` | Plugin-Basis-Klasse |
| `public/main/inc/lib/plugin.lib.php` | Plugin-Manager |
| `src/CoreBundle/Entity/Plugin.php` | Plugin-Doctrine-Entität |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-Dienst |
| `src/CoreBundle/Event/Events.php` | Ereignis-Konstanten |
| `public/plugin/HelloWorld/` | Minimales Beispiel-Plugin |
| `public/plugin/TopLinks/` | Einfaches Beispiel-Plugin |