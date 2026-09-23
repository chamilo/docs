# Pluginarkitektur

## Pluginplassering

Programtillegg lagres i `public/plugin/`. Hvert programtillegg har sin egen katalog:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Pluginstruktur

En typisk programtilleggskatalog inneholder:

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

Hvert programtillegg utvider basisklassen `Plugin` (`public/main/inc/lib/plugin.class.php`) og følger singleton-mønsteret:

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

### Viktige klasseegenskaper

| Egenskap | Type | Virkning |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registrerer programtillegget som et kursverktøy |
| `$isAdminPlugin` | bool | Legger til en administrasjonsside |
| `$isMailPlugin` | bool | Integrerer med e-postsystemet |
| `$addCourseTool` | bool | Legger til et ikon på kursets startsid |
| `$course_settings` | array | Definerer konfigurasjonsfelt per kurs |

## Pluginlivssyklus

1. **Installasjon** — Administratoren aktiverer programtillegget, som kjører `install.php`
2. **Konfigurasjon** — Innstillinger defineres og administreres via administrasjonspanelet; lagres i `access_url_rel_plugin` (støtter flere leietakere)
3. **Kjøring** — Programtillegget injiserer innhold i visningsområder eller reagerer på plattformhendelser
4. **Deaktivering** — Programtillegget deaktiveres, men dataene bevares
5. **Avinstallasjon** — Kjører `uninstall.php` for å rydde opp i data og tabeller

## Visningsområder

Programtillegg injiserer HTML i 18 forhåndsdefinerte områder i Vue-frontend ved å overstyre `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Tilgjengelige områder: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-integrasjon

### Hendelsesabonnenter

Filer som slutter på `EventSubscriber.php` og ligger i `src/EventSubscriber/` registreres automatisk via `PluginEventSubscriberPass`. De implementerer `EventSubscriberInterface` og reagerer på hendelser definert i `src/CoreBundle/Event/Events.php`.

Fordi pluginklassen (`MyPluginPlugin`) ikke er en Symfony-tjeneste, kan den ikke autowires inn i abonnentens konstruktør. Bruk `create()`-singletonen i stedet:

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

Doctrine-entiteter plassert i `src/Entity/` oppdages automatisk av `PluginEntityPass`. Bruk PHP 8-attributter for mapping. Navnerommet må følge `Chamilo\PluginBundle\{PluginName}`. Bruk unike tabellnavnprefikser (f.eks. `my_plugin_*`) for å unngå kollisjoner.

### PluginHelper-tjeneste

For å hente plugin-tilstand fra kjerne-Symfony-tjenester, injiser `PluginHelper` i stedet for å instansiere plugin-klassen direkte:

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

Tilgjengelige metoder:

| Metode | Formål |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Sjekk om en plugin er installert og aktiv for gjeldende tilgangs-URL |
| `loadLegacyPlugin(string $name): ?object` | Instansier og returner plugin-singletonen |
| `getPluginSetting(string $name, string $key): mixed` | Les en enkelt innstillingsverdi for pluginen |
| `getPluginOverrides(string $name): array` | Hent `plugin.yaml`-overstyringer (standardverdier + tilgangs-URL-spesifikke) for en plugin |

## Referanser til kjernefiler

| Fil | Formål |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Plugin-baseklasse |
| `public/main/inc/lib/plugin.lib.php` | Plugin-behandler |
| `src/CoreBundle/Entity/Plugin.php` | Plugin Doctrine-entitet |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-tjeneste |
| `src/CoreBundle/Event/Events.php` | Hendelseskonstanter |
| `public/plugin/HelloWorld/` | Minimalt eksempel-plugin |
| `public/plugin/TopLinks/` | Enkelt eksempel-plugin |