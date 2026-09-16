# Architettura dei plugin

## Posizione dei plugin

I plugin sono memorizzati in `public/plugin/`. Ogni plugin ha una propria directory:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Struttura di un plugin

Una directory tipica di un plugin contiene:

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

## Classe del plugin

Ogni plugin estende la classe base `Plugin` (`public/main/inc/lib/plugin.class.php`) e segue il pattern singleton:

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

### Proprietà chiave della classe

| Proprietà | Tipo | Effetto |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registra il plugin come strumento del corso |
| `$isAdminPlugin` | bool | Aggiunge una pagina di interfaccia di amministrazione |
| `$isMailPlugin` | bool | Si integra con il sistema di posta |
| `$addCourseTool` | bool | Aggiunge un'icona alla homepage del corso |
| `$course_settings` | array | Definisce i campi di configurazione per corso |

## Ciclo di vita del plugin

1. **Installazione** — L'amministratore attiva il plugin, che esegue `install.php`
2. **Configurazione** — Le impostazioni sono definite e gestite tramite il pannello di amministrazione; memorizzate in `access_url_rel_plugin` (supporta il multi-tenant)
3. **Esecuzione** — Il plugin inserisce contenuti nelle regioni di visualizzazione o reagisce agli eventi della piattaforma
4. **Disattivazione** — Il plugin viene disabilitato ma i suoi dati sono conservati
5. **Disinstallazione** — Esegue `uninstall.php` per rimuovere dati e tabelle

## Regioni di visualizzazione

I plugin inseriscono HTML in 18 regioni predefinite del frontend Vue sovrascrivendo `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Regioni disponibili: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integrazione Symfony

### Event subscriber

I file che terminano con `EventSubscriber.php` collocati in `src/EventSubscriber/` sono registrati automaticamente tramite `PluginEventSubscriberPass`. Implementano `EventSubscriberInterface` e reagiscono agli eventi definiti in `src/CoreBundle/Event/Events.php`.

Poiché la classe del plugin (`MyPluginPlugin`) non è un servizio Symfony, non può essere iniettata automaticamente nel costruttore dello subscriber. Utilizzare invece il singleton `create()`:

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

### Entità Doctrine

Le entità Doctrine collocate in `src/Entity/` sono scoperte automaticamente da `PluginEntityPass`. Utilizzare gli attributi PHP 8 per il mapping. Il namespace deve seguire `Chamilo\PluginBundle\{PluginName}`. Usare prefissi univoci per i nomi delle tabelle (ad es. `my_plugin_*`) per evitare collisioni.

### Servizio PluginHelper

Per accedere allo stato dei plugin dai servizi Symfony del core, iniettare `PluginHelper` invece di istanziare direttamente la classe del plugin:

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

Metodi disponibili:

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Verifica se un plugin è installato e attivo per l'URL di accesso corrente |
| `loadLegacyPlugin(string $name): ?object` | Istanzia e restituisce il singleton del plugin |
| `getPluginSetting(string $name, string $key): mixed` | Legge il valore di una singola impostazione del plugin |
| `getPluginOverrides(string $name): array` | Ottiene gli override di `plugin.yaml` (valori predefiniti + specifici per URL di accesso) per un plugin |

## Riferimenti ai file del core

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Classe base del plugin |
| `public/main/inc/lib/plugin.lib.php` | Gestore dei plugin |
| `src/CoreBundle/Entity/Plugin.php` | Entità Doctrine del plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Servizio PluginHelper |
| `src/CoreBundle/Event/Events.php` | Costanti degli eventi |
| `public/plugin/HelloWorld/` | Plugin di esempio minimale |
| `public/plugin/TopLinks/` | Plugin di esempio semplice |