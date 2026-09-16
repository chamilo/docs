# Architettura dei Plugin

## Posizione dei Plugin

I plugin sono memorizzati in `public/plugin/`. Ogni plugin ha la propria directory:

```
public/plugin/
├── Bbb/                    # Integrazione con BigBlueButton
├── Zoom/                   # Integrazione con Zoom
├── Onlyoffice/             # Modifica documenti con OnlyOffice
├── XApi/                   # xAPI/Tin Can
├── ...                     # i plugin inclusi sono forniti sotto public/plugin/
```

## Struttura dei Plugin

Una tipica directory di un plugin contiene:

```
public/plugin/MyPlugin/
├── plugin.php              # OBBLIGATORIO — assegna $plugin_info
├── install.php             # Script di installazione
├── uninstall.php           # Script di disinstallazione
├── index.php               # Punto di ingresso per il rendering della regione (se applicabile)
├── admin.php               # Interfaccia di amministrazione (opzionale)
├── lang/                   # File di traduzione (codici locali: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Classe principale del plugin (estende Plugin)
│   ├── Entity/                   # Entità Doctrine (rilevate automaticamente)
│   ├── Repository/               # Repository Doctrine
│   └── EventSubscriber/          # Sottoscrittori di eventi Symfony (registrati automaticamente)
├── templates/              # Template Twig
└── resources/              # Risorse CSS/JS
```

## Classe del Plugin

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

### Proprietà Chiave della Classe

| Proprietà | Tipo | Effetto |
|-----------|------|---------|
| `$isCoursePlugin` | bool | Registra il plugin come strumento del corso |
| `$isAdminPlugin` | bool | Aggiunge una pagina di interfaccia di amministrazione |
| `$isMailPlugin` | bool | Si integra con il sistema di posta |
| `$addCourseTool` | bool | Aggiunge un'icona alla homepage del corso |
| `$course_settings` | array | Definisce i campi di configurazione per corso |

## Ciclo di Vita del Plugin

1. **Installazione** — L'amministratore attiva il plugin, che esegue `install.php`
2. **Configurazione** — Le impostazioni sono definite e gestite tramite il pannello di amministrazione; memorizzate in `access_url_rel_plugin` (supporta multi-tenant)
3. **Esecuzione** — Il plugin inserisce contenuti nelle regioni di visualizzazione o reagisce agli eventi della piattaforma
4. **Disattivazione** — Il plugin viene disabilitato ma i suoi dati vengono conservati
5. **Disinstallazione** — Esegue `uninstall.php` per ripulire dati e tabelle

## Regioni di Visualizzazione

I plugin inseriscono HTML in 18 regioni predefinite del frontend Vue sovrascrivendo `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Contenuto del footer del mio plugin</p>';
}
```

Regioni disponibili: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integrazione con Symfony

### Sottoscrittori di Eventi

I file che terminano con `EventSubscriber.php` collocati in `src/EventSubscriber/` vengono registrati automaticamente tramite `PluginEventSubscriberPass`. Implementano `EventSubscriberInterface` e reagiscono agli eventi definiti in `src/CoreBundle/Event/Events.php`.

Poiché la classe del plugin (`MyPluginPlugin`) non è un servizio Symfony, non può essere iniettata automaticamente nel costruttore del sottoscrittore. Utilizzare invece il singleton `create()`:

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

Le entità Doctrine collocate in `src/Entity/` vengono rilevate automaticamente da `PluginEntityPass`. Utilizzare gli attributi di PHP 8 per il mapping. Il namespace deve seguire `Chamilo\PluginBundle\{PluginName}`. Utilizzare prefissi univoci per i nomi delle tabelle (ad esempio, `my_plugin_*`) per evitare collisioni.

### Servizio PluginHelper

Per accedere allo stato dei plugin dai servizi core di Symfony, iniettare `PluginHelper` anziché istanziare direttamente la classe del plugin:

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

| Metodo | Scopo |
|--------|-------|
| `isPluginEnabled(string $name): bool` | Verifica se un plugin è installato e attivo per l'URL di accesso corrente |
| `loadLegacyPlugin(string $name): ?object` | Istanzia e restituisce il singleton del plugin |
| `getPluginSetting(string $name, string $key): mixed` | Legge un singolo valore di impostazione del plugin |
| `getPluginOverrides(string $name): array` | Ottiene le override di `plugin.yaml` (predefinite + specifiche per URL di accesso) per un plugin |

## Riferimenti ai File Core

| File | Scopo |
|------|-------|
| `public/main/inc/lib/plugin.class.php` | Classe base del plugin |
| `public/main/inc/lib/plugin.lib.php` | Gestore dei plugin |
| `src/CoreBundle/Entity/Plugin.php` | Entità Doctrine del plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Servizio PluginHelper |
| `src/CoreBundle/Event/Events.php` | Costanti degli eventi |
| `public/plugin/HelloWorld/` | Esempio minimo di plugin |
| `public/plugin/TopLinks/` | Esempio semplice di plugin |