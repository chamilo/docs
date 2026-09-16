# Plugin Architectuur

## Locatie van Plugins

Plugins worden opgeslagen in `public/plugin/`. Elke plugin heeft zijn eigen map:

```
public/plugin/
├── Bbb/                    # BigBlueButton integratie
├── Zoom/                   # Zoom integratie
├── Onlyoffice/             # OnlyOffice documentbewerking
├── XApi/                   # xAPI/Tin Can
├── ...                     # meegeleverde plugins worden geleverd onder public/plugin/
```

## Plugin Structuur

Een typische pluginmap bevat:

```
public/plugin/MyPlugin/
├── plugin.php              # VEREIST — wijst $plugin_info toe
├── install.php             # Installatiescript
├── uninstall.php           # De-installatiescript
├── index.php               # Ingangspunt voor het renderen van regio's (indien van toepassing)
├── admin.php               # Beheerdersinterface (optioneel)
├── lang/                   # Vertalingsbestanden (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Hoofdklasse van de plugin (erft over van Plugin)
│   ├── Entity/                   # Doctrine entiteiten (automatisch gedetecteerd)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (automatisch geregistreerd)
├── templates/              # Twig sjablonen
└── resources/              # CSS/JS bestanden
```

## Plugin Klasse

Elke plugin erft over van de basisklasse `Plugin` (`public/main/inc/lib/plugin.class.php`) en volgt het singleton-patroon:

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

### Belangrijke Klasse-eigenschappen

| Eigenschap | Type | Effect |
|------------|------|--------|
| `$isCoursePlugin` | bool | Registreert de plugin als een cursusgereedschap |
| `$isAdminPlugin` | bool | Voegt een beheerdersinterfacepagina toe |
| `$isMailPlugin` | bool | Integreert met het e-mailsysteem |
| `$addCourseTool` | bool | Voegt een pictogram toe aan de cursusstartpagina |
| `$course_settings` | array | Definieert configuratievelden per cursus |

## Plugin Levenscyclus

1. **Installatie** — De beheerder activeert de plugin, wat `install.php` uitvoert
2. **Configuratie** — Instellingen worden gedefinieerd en beheerd via het beheerderspaneel; opgeslagen in `access_url_rel_plugin` (ondersteunt multi-tenant)
3. **Uitvoering** — De plugin voegt inhoud toe aan weergaveregio's of reageert op platformgebeurtenissen
4. **Deactivatie** — De plugin wordt uitgeschakeld, maar de gegevens blijven behouden
5. **De-installatie** — Voert `uninstall.php` uit om gegevens en tabellen op te ruimen

## Weergaveregio's

Plugins voegen HTML toe aan 18 vooraf gedefinieerde regio's van de Vue-frontend door `renderRegion()` te overschrijven:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Mijn Plugin voettekstinhoud</p>';
}
```

Beschikbare regio's: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony Integratie

### Event Subscribers

Bestanden die eindigen op `EventSubscriber.php` en geplaatst zijn in `src/EventSubscriber/` worden automatisch geregistreerd via `PluginEventSubscriberPass`. Ze implementeren `EventSubscriberInterface` en reageren op gebeurtenissen gedefinieerd in `src/CoreBundle/Event/Events.php`.

Omdat de plugin-klasse (`MyPluginPlugin`) geen Symfony-service is, kan deze niet automatisch worden geïnjecteerd in de constructor van de subscriber. Gebruik in plaats daarvan de `create()` singleton:

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

### Doctrine Entiteiten

Doctrine entiteiten geplaatst in `src/Entity/` worden automatisch gedetecteerd door `PluginEntityPass`. Gebruik PHP 8 attributen voor mapping. De namespace moet `Chamilo\PluginBundle\{PluginName}` volgen. Gebruik unieke tabelnaamvoorvoegsels (bijv. `my_plugin_*`) om botsingen te vermijden.

### PluginHelper Service

Voor het benaderen van de status van een plugin vanuit kern Symfony-services, injecteer `PluginHelper` in plaats van de plugin-klasse direct te instantiëren:

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
|--------|------|
| `isPluginEnabled(string $name): bool` | Controleer of een plugin is geïnstalleerd en actief voor de huidige toegang-URL |
| `loadLegacyPlugin(string $name): ?object` | Instantieer en retourneer de plugin singleton |
| `getPluginSetting(string $name, string $key): mixed` | Lees een enkele plugin-instellingswaarde |
| `getPluginOverrides(string $name): array` | Haal `plugin.yaml` overschrijvingen (standaard + specifiek voor toegang-URL) op voor een plugin |

## Kernbestand Referenties

| Bestand | Doel |
|------|------|
| `public/main/inc/lib/plugin.class.php` | Plugin basisklasse |
| `public/main/inc/lib/plugin.lib.php` | Pluginbeheerder |
| `src/CoreBundle/Entity/Plugin.php` | Plugin Doctrine-entiteit |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper service |
| `src/CoreBundle/Event/Events.php` | Evenementconstanten |
| `public/plugin/HelloWorld/` | Minimaal voorbeeld van een plugin |
| `public/plugin/TopLinks/` | Eenvoudig voorbeeld van een plugin |