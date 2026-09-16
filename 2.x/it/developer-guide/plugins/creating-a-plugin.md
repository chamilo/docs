# Creazione di un Plugin

Questa guida illustra come creare un plugin di base per Chamilo. Per ulteriori dettagli, consulta la [pagina wiki sullo sviluppo dei plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Passo 1: Creare la Directory del Plugin

Crea una directory in `public/plugin/`. Il nome della directory deve corrispondere all'identificatore del tuo plugin:

```
public/plugin/MyPlugin/
```

## Passo 2: Definire la Classe del Plugin

Crea `src/MyPluginPlugin.php`. La classe estende `Plugin` e segue il pattern singleton:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Tipi di Impostazioni Disponibili

| Tipo | Descrizione |
|------|-------------|
| `boolean` | Casella di controllo on/off |
| `text` | Input di testo a riga singola |
| `select` | Menu a tendina (fornisci un array `options`) |
| `wysiwyg` | Editor di testo ricco |
| `html` | Campo HTML grezzo |
| `checkbox` | Casella di controllo |
| `user` | Selettore utente |

Per le impostazioni di tipo `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Accedi alle impostazioni durante l'esecuzione:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // valore singolo
$all  = $plugin->get_settings();       // tutte le impostazioni
```

## Passo 3: Creare plugin.php

Il file `plugin.php` nella radice del plugin è **obbligatorio**. Deve assegnare `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Passo 4: Creare Script di Installazione e Disinstallazione

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Implementa la creazione/eliminazione dello schema effettivo all'interno della classe utilizzando `SchemaTool` di Doctrine.

## Passo 5: Aggiungere Traduzioni

Crea file di lingua in `lang/` utilizzando codici di localizzazione (ad esempio, `en_US.php`, `fr_FR.php`, `es_ES.php`). Il fallback è `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Accedi alle traduzioni tramite `$plugin->get_lang('key')`.

## Passo 6: Inserire Contenuti tramite Regioni di Visualizzazione

I plugin possono inserire HTML in 18 regioni predefinite del frontend Vue. Sovrascrivi `renderRegion()` nella tua classe:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Le regioni disponibili includono: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Passo 7: Reagire agli Eventi della Piattaforma (Opzionale)

I plugin possono reagire agli eventi della piattaforma utilizzando i subscriber di eventi di Symfony. Crea un file che termina con `EventSubscriber.php` all'interno di `src/EventSubscriber/` — viene registrato automaticamente tramite `PluginEventSubscriberPass`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Le classi dei plugin non sono servizi Symfony — usa il singleton create().
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // la tua logica qui
    }
}
```

Consulta `src/CoreBundle/Event/Events.php` per l'elenco completo degli eventi disponibili (utente, corso, sessione, LP, esercizio, portfolio, autenticazione e altro).

## Passo 8: Hook del Ciclo di Vita

Sovrascrivi questi metodi nella tua classe plugin per rispondere alle azioni della piattaforma:

| Metodo | Attivato quando |
|--------|-----------------|
| `install()` | Il plugin viene attivato |
| `uninstall()` | Il plugin viene rimosso |
| `performActionsAfterConfigure()` | L'amministratore salva il modulo di configurazione |
| `course_settings_updated(array $values)` | Le impostazioni a livello di corso vengono modificate |
| `validateCourseSetting(string $variable)` | Un'impostazione del corso viene salvata (restituisci `false` per rifiutare) |
| `doWhenDeletingUser(int $userId)` | Un utente viene eliminato |
| `doWhenDeletingCourse(int $courseId)` | Un corso viene eliminato |
| `doWhenDeletingSession(int $sessionId)` | Una sessione viene eliminata |

## Passo 9: Attivazione

Accedi come amministratore, vai su **Gestisci plugin**, trova il tuo plugin e clicca su **Attiva**.

## Suggerimenti

* **Segui i plugin esistenti come esempi** — `public/plugin/HelloWorld/` e `public/plugin/TopLinks/` sono buoni riferimenti semplici
* **Usa le traduzioni** — Utilizza sempre il sistema `lang/` per i testi visibili agli utenti
* **Pulisci durante la disinstallazione** — Rimuovi tabelle del database e impostazioni nello script di disinstallazione
* **Verifica lo stato di attivazione** — Negli abbonati agli eventi, chiama sempre `$this->plugin->isEnabled()` prima di eseguire la logica