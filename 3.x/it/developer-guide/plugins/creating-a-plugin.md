# Creazione di un plugin

Questa guida illustra la creazione di un plugin di base per Chamilo. Per ulteriori dettagli, consultare la [pagina wiki sullo sviluppo dei plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Passo 1: Creare la directory del plugin

Creare una directory in `public/plugin/`. Il nome della directory deve corrispondere all'identificatore del plugin:

```
public/plugin/MyPlugin/
```

## Passo 2: Definire la classe del plugin

Creare `src/MyPluginPlugin.php`. La classe estende `Plugin` e segue il pattern singleton:

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

### Tipi di impostazione disponibili

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

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

Accesso alle impostazioni a runtime:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Passo 3: Creare plugin.php

`plugin.php` nella radice del plugin è **obbligatorio**. Deve assegnare `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Passo 4: Creare gli script di installazione e disinstallazione

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

Implementare la creazione/eliminazione effettiva dello schema all'interno della classe utilizzando `SchemaTool` di Doctrine.

## Passo 5: Aggiungere le traduzioni

Creare i file di lingua in `lang/` utilizzando i codici di localizzazione (ad es. `en_US.php`, `fr_FR.php`, `es.php`). Il fallback è `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Accesso alle traduzioni tramite `$plugin->get_lang('key')`.

## Passo 6: Iniettare contenuti tramite le regioni di visualizzazione

I plugin possono iniettare HTML in 18 regioni predefinite dell'interfaccia. Il meccanismo che esegue il rendering di una regione dipende da quale essa sia:

* **`course_tool_plugin`** è l'unica regione renderizzata sovrascrivendo `renderRegion(string $region): string` nella classe del plugin. Viene chiamata (tramite `PluginRegionController`) solo per un plugin con ambito corso (`is_course_plugin`) mentre è aperta una pagina del corso:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **Le 16 regioni generali** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — sono renderizzate includendo l'`index.php` del plugin stesso, non `renderRegion()`. Il framework imposta `$plugin_info['current_region']` prima di includere quel file, così esso può eseguire `echo` dell'HTML direttamente per quella regione oppure dichiarare template Twig da renderizzare tramite `$plugin_info['templates']`:

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` è un esempio funzionante completo — HelloWorld non sovrascrive affatto `renderRegion()`; ogni regione che riempie passa attraverso `index.php`.

* **`menu_administrator`** è un caso speciale riservato ai collegamenti visibili solo agli amministratori nella dashboard di amministrazione legacy, non ai due meccanismi precedenti. `Dashboard` e `CleanDeletedFiles` sono plugin reali che lo utilizzano.

Qualunque meccanismo si utilizzi, un amministratore deve comunque attivare la o le regioni per il plugin dal pulsante **Regioni** accanto ad esso nella pagina **Gestione plugin** (vedere [Passo 9](#step-9-activate)) — un plugin non esegue il rendering di nulla in una regione che non sia stata esplicitamente abilitata in quella sede.

## Passo 7: Reagire agli eventi della piattaforma (opzionale)

I plugin possono reagire agli eventi della piattaforma tramite i subscriber di eventi Symfony. Creare un file che termini con `EventSubscriber.php` all'interno di `src/EventSubscriber/` — viene registrato automaticamente tramite `PluginEventSubscriberPass`.

Due requisiti, altrimenti il subscriber viene ignorato silenziosamente: la classe deve essere nel **namespace globale** (il pass la risolve dal nome del file) e dopo averla aggiunta è necessario eseguire `composer dump-autoload` (`public/plugin` è una voce classmap). Verificare il risultato con `php bin/console debug:event-dispatcher <event.name>`.

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
        // Plugin classes are not Symfony services — use the create() singleton.
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
        // your logic here
    }
}
```

Consultare `src/CoreBundle/Event/Events.php` per l'elenco completo degli eventi disponibili (utente, corso, sessione, LP, esercizio, portfolio, autenticazione e altro).

### Pulizia alla cancellazione di un corso, una sessione o un utente

Se il plugin memorizza righe con chiave su un corso, una sessione o un utente, iscriversi a `Events::COURSE_DELETED`, `Events::SESSION_DELETED` o `Events::USER_DELETED`. Questo è l'unico modo per effettuare la pulizia — i vecchi metodi `doWhenDeleting*` non esistono più. Per questi listener valgono tre regole:

* **Agire su `AbstractEvent::TYPE_PRE`** — l'evento viene emesso prima della rimozione della riga, l'unico momento in cui la chiave esterna è ancora risolvibile e i dati sono ancora leggibili. `USER_DELETED` viene emesso anche come `TYPE_POST`, quindi il controllo non è opzionale in quel caso.
* **Proteggere in base all'installazione, non all'abilitazione** — usare `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Le righe sopravvivono alla disattivazione del plugin, o all'abilitazione solo su un altro URL di accesso, e la chiave esterna blocca comunque la cancellazione.
* **Su `USER_DELETED`, verificare `$event->isHardDelete()`** — una cancellazione soft mantiene l'utente ripristinabile, quindi i suoi dati devono sopravvivere.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

Il plugin `StudentFollowUp` è il riferimento per gli utenti; `Bbb`, `BuyCourses` e `EmbedRegistry` contengono gli equivalenti per corso e sessione.

## Passo 8: Hook del ciclo di vita

Sovrascrivere questi metodi nella classe del plugin per rispondere alle azioni della piattaforma:

| Metodo | Attivato quando |
|--------|----------------|
| `install()` | Il plugin viene attivato |
| `uninstall()` | Il plugin viene rimosso |
| `performActionsAfterConfigure()` | L'amministratore salva il modulo di configurazione |
| `course_settings_updated(array $values)` | Cambiano le impostazioni a livello di corso |
| `validateCourseSetting(string $variable)` | Impostazione del corso salvata (restituire `false` per rifiutare) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` e `doWhenDeletingSession()` sono stati rimossi, insieme al trigger `AppPlugin::performActionsWhenDeletingItem()` che li invocava — sovrascriverli ora non ha alcun effetto. Usare invece gli eventi di cancellazione del [Passo 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Passo 9: Attivazione

Accedere come amministratore e andare al blocco **Piattaforma** della dashboard di amministrazione, quindi **Plugin** — si apre la pagina **Gestione plugin**. Trovare il plugin e fare clic su **Installa**; una volta installato, fare clic su **Abilita** per attivarlo (un plugin abilitato mostra invece un pulsante **Disabilita**).

## Consigli

* **Seguire i plugin esistenti come esempi** — `public/plugin/HelloWorld/` e `public/plugin/TopLinks/` sono buoni riferimenti semplici
* **Usare le traduzioni** — Usare sempre il sistema `lang/` per i testi rivolti all'utente
* **Pulire in disinstallazione** — Rimuovere tabelle del database e impostazioni nello script di disinstallazione
* **Verificare lo stato di abilitazione** — Nei subscriber di eventi, chiamare `$this->plugin->isEnabled()` prima di eseguire la logica. L'eccezione è la pulizia in cancellazione: proteggere in base all'installazione, poiché le righe sopravvivono alla disabilitazione del plugin