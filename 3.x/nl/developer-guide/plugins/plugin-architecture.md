# Pluginarchitectuur

## Pluginlocatie

Plugins worden opgeslagen in `public/plugin/`. Elke plugin heeft een eigen map:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Pluginstructuur

Een typische pluginmap bevat:

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

Elke plugin erft van de basisklasse `Plugin` (`public/main/inc/lib/plugin.class.php`) en volgt het singletonpatroon:

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

### Belangrijke klasse-eigenschappen

| Eigenschap | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registreert de plugin als een coursetool |
| `$isAdminPlugin` | bool | Voegt een beheerdersinterfacepagina toe |
| `$isMailPlugin` | bool | Integreert met het mailsysteem |
| `$addCourseTool` | bool | Voegt een pictogram toe aan de course-startpagina |
| `$course_settings` | array | Definieert configuratievelden per course |

## Pluginlevenscyclus

1. **Installatie** — De beheerder activeert de plugin, waarbij `install.php` wordt uitgevoerd
2. **Configuratie** — Instellingen worden gedefinieerd en beheerd via het beheerderspaneel; opgeslagen in `access_url_rel_plugin` (ondersteunt multi-tenant)
3. **Uitvoering** — De plugin injecteert inhoud in weergaveregio's of reageert op platformgebeurtenissen
4. **Deactivering** — De plugin wordt uitgeschakeld, maar de gegevens blijven behouden
5. **De-installatie** — Voert `uninstall.php` uit om gegevens en tabellen op te schonen

## Weergaveregio's

Plugins injecteren HTML in 18 vooraf gedefinieerde regio's van de Vue-frontend door `renderRegion()` te overschrijven:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Beschikbare regio's: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-integratie

### Eventsubscribers

Bestanden die eindigen op `EventSubscriber.php` en in `src/EventSubscriber/` staan, worden automatisch geregistreerd via `PluginEventSubscriberPass`. Ze implementeren `EventSubscriberInterface` en reageren op gebeurtenissen die zijn gedefinieerd in `src/CoreBundle/Event/Events.php`.

Omdat de pluginklasse (`MyPluginPlugin`) geen Symfony-service is, kan deze niet via autowiring in de constructor van de subscriber worden geïnjecteerd. Gebruik in plaats daarvan de singleton `create()`:

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

### Doctrine-entiteiten

Doctrine-entiteiten in `src/Entity/` worden automatisch ontdekt door `PluginEntityPass`. Gebruik PHP 8-attributen voor mapping. De namespace moet `Chamilo\PluginBundle\{PluginName}` volgen. Gebruik unieke tabelnaamprefixen (bijv. `my_plugin_*`) om botsingen te voorkomen.

### PluginHelper-service

Om de pluginstatus vanuit kern-Symfony-services te benaderen, injecteer `PluginHelper` in plaats van de pluginklasse rechtstreeks te instantiëren:

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

Beschikbare methoden:

| Methode | Doel |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Controleren of een plugin is geïnstalleerd en actief is voor de huidige toegang-URL |
| `loadLegacyPlugin(string $name): ?object` | De plugin-singleton instantiëren en teruggeven |
| `getPluginSetting(string $name, string $key): mixed` | Eén plugininstellingswaarde uitlezen |
| `getPluginOverrides(string $name): array` | `plugin.yaml`-overschrijvingen (standaardwaarden + specifiek voor toegang-URL) voor een plugin ophalen |

## Referenties naar kernbestanden

| Bestand | Doel |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Basisclasse van de plugin |
| `public/main/inc/lib/plugin.lib.php` | Pluginbeheerder |
| `src/CoreBundle/Entity/Plugin.php` | Plugin-Doctrine-entiteit |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-service |
| `src/CoreBundle/Event/Events.php` | Eventconstanten |
| `public/plugin/HelloWorld/` | Minimale voorbeeldplugin |
| `public/plugin/TopLinks/` | Eenvoudige voorbeeldplugin |