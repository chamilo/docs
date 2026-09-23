# Pluginarkitektur

## Pluginplacering

Plugins gemmes i `public/plugin/`. Hver plugin har sit eget bibliotek:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Pluginstruktur

Et typisk pluginbibliotek indeholder:

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

## Pluginklasse

Hver plugin udvider basisklassen `Plugin` (`public/main/inc/lib/plugin.class.php`) og følger singleton-mønsteret:

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

### Centrale klasseegenskaber

| Egenskab | Type | Effekt |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registrerer pluginnet som et kursusværktøj |
| `$isAdminPlugin` | bool | Tilføjer en administrationsgrænsefladeside |
| `$isMailPlugin` | bool | Integrerer med mailsystemet |
| `$addCourseTool` | bool | Tilføjer et ikon på kursets startside |
| `$course_settings` | array | Definerer konfigurationsfelter pr. kursus |

## Pluginlivscyklus

1. **Installation** — Administratoren aktiverer pluginnet, hvilket kører `install.php`
2. **Konfiguration** — Indstillinger defineres og administreres via administrationspanelet; gemmes i `access_url_rel_plugin` (understøtter multi-tenant)
3. **Kørsel** — Pluginnet injicerer indhold i visningsregioner eller reagerer på platformhændelser
4. **Deaktivering** — Pluginnet deaktiveres, men dets data bevares
5. **Afinstallation** — Kører `uninstall.php` for at rydde op i data og tabeller

## Visningsregioner

Plugins injicerer HTML i 18 foruddefinerede regioner i Vue-frontend ved at overskrive `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Tilgængelige regioner: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-integration

### Event subscribers

Filer, der ender på `EventSubscriber.php` og er placeret i `src/EventSubscriber/`, registreres automatisk via `PluginEventSubscriberPass`. De implementerer `EventSubscriberInterface` og reagerer på hændelser defineret i `src/CoreBundle/Event/Events.php`.

Da pluginklassen (`MyPluginPlugin`) ikke er en Symfony-service, kan den ikke autowires ind i subscriber-konstruktøren. Brug i stedet singleton-metoden `create()`:

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

Doctrine-entiteter placeret i `src/Entity/` opdages automatisk af `PluginEntityPass`. Brug PHP 8-attributter til mapping. Namespace skal følge `Chamilo\PluginBundle\{PluginName}`. Brug unikke tabelnavnepræfikser (f.eks. `my_plugin_*`) for at undgå kollisioner.

### PluginHelper-tjeneste

For at tilgå plugin-tilstand fra kerne-Symfony-tjenester skal du injicere `PluginHelper` i stedet for at instantiere plugin-klassen direkte:

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

Tilgængelige metoder:

| Metode | Formål |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Tjek om et plugin er installeret og aktivt for den aktuelle adgangs-URL |
| `loadLegacyPlugin(string $name): ?object` | Instantiér og returnér plugin-singletonen |
| `getPluginSetting(string $name, string $key): mixed` | Læs en enkelt plugin-indstillingsværdi |
| `getPluginOverrides(string $name): array` | Hent `plugin.yaml`-overskrivninger (standardværdier + adgangs-URL-specifikke) for et plugin |

## Kernefilreferencer

| Fil | Formål |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Plugin-basklasse |
| `public/main/inc/lib/plugin.lib.php` | Plugin-manager |
| `src/CoreBundle/Entity/Plugin.php` | Plugin Doctrine-entitet |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-tjeneste |
| `src/CoreBundle/Event/Events.php` | Event-konstanter |
| `public/plugin/HelloWorld/` | Minimalt eksempel-plugin |
| `public/plugin/TopLinks/` | Enkelt eksempel-plugin |