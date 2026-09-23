# Pluginarkitektur

## Pluginplacering

Plugins lagras i `public/plugin/`. Varje plugin har en egen katalog:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Pluginstruktur

En typisk pluginkatalog innehåller:

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

## Pluginklass

Varje plugin utökar basklassen `Plugin` (`public/main/inc/lib/plugin.class.php`) och följer singleton-mönstret:

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

### Viktiga klassegenskaper

| Egenskap | Typ | Effekt |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registrerar pluginen som ett kursverktyg |
| `$isAdminPlugin` | bool | Lägger till en administratörssida |
| `$isMailPlugin` | bool | Integrerar med e-postsystemet |
| `$addCourseTool` | bool | Lägger till en ikon på kurssidan |
| `$course_settings` | array | Definierar konfigurationsfält per kurs |

## Pluginlivscykel

1. **Installation** — Administratören aktiverar pluginen, vilket kör `install.php`
2. **Konfiguration** — Inställningar definieras och hanteras via administratörspanelen; lagras i `access_url_rel_plugin` (stöder multi-tenant)
3. **Körning** — Pluginen injicerar innehåll i visningsregioner eller reagerar på plattformshändelser
4. **Inaktivering** — Pluginen inaktiveras men dess data bevaras
5. **Avinstallation** — Kör `uninstall.php` för att rensa data och tabeller

## Visningsregioner

Plugins injicerar HTML i 18 fördefinierade regioner i Vue-frontend genom att åsidosätta `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Tillgängliga regioner: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-integration

### Event subscribers

Filer som slutar på `EventSubscriber.php` och ligger i `src/EventSubscriber/` registreras automatiskt via `PluginEventSubscriberPass`. De implementerar `EventSubscriberInterface` och reagerar på händelser definierade i `src/CoreBundle/Event/Events.php`.

Eftersom pluginklassen (`MyPluginPlugin`) inte är en Symfony-tjänst kan den inte autowiras in i subscriber-konstruktorn. Använd singleton-metoden `create()` i stället:

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

### Doctrine-entiteter

Doctrine-entiteter som placeras i `src/Entity/` upptäcks automatiskt av `PluginEntityPass`. Använd PHP 8-attribut för mappning. Namnrymden måste följa `Chamilo\PluginBundle\{PluginName}`. Använd unika tabellnamnsprefix (t.ex. `my_plugin_*`) för att undvika krockar.

### PluginHelper-tjänst

För att komma åt plugin-tillstånd från Symfony-kärntjänster, injicera `PluginHelper` i stället för att instansiera plugin-klassen direkt:

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

Tillgängliga metoder:

| Metod | Syfte |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Kontrollera om ett plugin är installerat och aktivt för den aktuella åtkomst-URL:en |
| `loadLegacyPlugin(string $name): ?object` | Instansiera och returnera plugin-singletonen |
| `getPluginSetting(string $name, string $key): mixed` | Läs ett enskilt inställningsvärde för pluginet |
| `getPluginOverrides(string $name): array` | Hämta `plugin.yaml`-överskrivningar (standardvärden + åtkomst-URL-specifika) för ett plugin |

## Referenser till kärnfiler

| Fil | Syfte |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Basklass för plugin |
| `public/main/inc/lib/plugin.lib.php` | Plugin-hanterare |
| `src/CoreBundle/Entity/Plugin.php` | Doctrine-entitet för plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-tjänst |
| `src/CoreBundle/Event/Events.php` | Händelsekonstanter |
| `public/plugin/HelloWorld/` | Minimalt exempelplugin |
| `public/plugin/TopLinks/` | Enkelt exempelplugin |