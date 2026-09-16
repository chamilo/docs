# Een plugin maken

Deze gids beschrijft stap voor stap het maken van een basale Chamilo-plugin. Voor meer details, zie de [wiki-pagina Plugin development](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Stap 1: Maak de plugindirectory

Maak een directory in `public/plugin/`. De directorynaam moet overeenkomen met de identifier van uw plugin:

```
public/plugin/MyPlugin/
```

## Stap 2: Definieer de pluginclass

Maak `src/MyPluginPlugin.php`. De class erft van `Plugin` en volgt het singleton-patroon:

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

### Beschikbare instellingstypen

| Type | Beschrijving |
|------|-------------|
| `boolean` | Selectievakje aan/uit |
| `text` | Tekstinvoer op één regel |
| `select` | Keuzelijst (geef een `options`-array op) |
| `wysiwyg` | Rich-texteditor |
| `html` | Veld voor ruwe HTML |
| `checkbox` | Selectievakje |
| `user` | Gebruikerskiezer |

Voor `select`-instellingen:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Instellingen tijdens runtime ophalen:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Stap 3: Maak plugin.php

`plugin.php` in de pluginroot is **verplicht**. Het moet `$plugin_info` toewijzen:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Stap 4: Maak installatie- en deïnstallatiescripts

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

Implementeer de daadwerkelijke schema-aanmaak/-verwijdering in de class met Doctrine's `SchemaTool`.

## Stap 5: Voeg vertalingen toe

Maak taalbestanden in `lang/` met locale-codes (bijv. `en_US.php`, `fr_FR.php`, `es.php`). De fallback is `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Vertalingen ophalen via `$plugin->get_lang('key')`.

## Stap 6: Inhoud injecteren via weergaveregio's

Plugins kunnen HTML injecteren in 18 vooraf gedefinieerde regio's van de interface. Welk mechanisme een regio rendert, hangt af van welke regio het is:

* **`course_tool_plugin`** is de enige regio die wordt gerenderd door `renderRegion(string $region): string` in uw pluginclass te overschrijven. Deze wordt (via `PluginRegionController`) alleen aangeroepen voor een cursusgebonden plugin (`is_course_plugin`) terwijl een cursuspagina open is:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **De 16 algemene regio's** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — worden gerenderd door de eigen `index.php` van de plugin te includen, niet via `renderRegion()`. Het framework zet `$plugin_info['current_region']` voordat dat bestand wordt geladen, zodat het ofwel HTML rechtstreeks voor die regio kan `echo`'en, of Twig-templates kan declareren om te renderen via `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` is een volledig werkend voorbeeld — HelloWorld overschrijft `renderRegion()` helemaal niet; elke regio die het vult, loopt via `index.php`.

* **`menu_administrator`** is een speciaal geval, gereserveerd voor links die alleen voor beheerders zichtbaar zijn in het legacy-beheerdersdashboard, niet via de twee bovenstaande mechanismen. `Dashboard` en `CleanDeletedFiles` zijn echte plugins die dit gebruiken.

Welk mechanisme u ook gebruikt, een beheerder moet de regio('s) voor uw plugin nog steeds inschakelen via de knop **Regio's** ernaast op de pagina **Plugins beheren** (zie [Stap 9](#step-9-activate)) — een plugin rendert niets in een regio die daar niet expliciet is ingeschakeld.

## Stap 7: Reageren op platformgebeurtenissen (optioneel)

Plugins kunnen reageren op platformgebeurtenissen via Symfony-eventsubscribers. Maak een bestand dat eindigt op `EventSubscriber.php` in `src/EventSubscriber/` — het wordt automatisch geregistreerd via `PluginEventSubscriberPass`.

Twee vereisten, anders wordt de subscriber stilzwijgend overgeslagen: de klasse moet in de **globale namespace** staan (de pass lost deze op vanuit de bestandsnaam), en u moet `composer dump-autoload` uitvoeren nadat u deze hebt toegevoegd (`public/plugin` is een classmap-item). Controleer het resultaat met `php bin/console debug:event-dispatcher <event.name>`.

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

Zie `src/CoreBundle/Event/Events.php` voor de volledige lijst van beschikbare gebeurtenissen (gebruiker, cursus, sessie, LP, oefening, portfolio, authenticatie en meer).

### Opruimen wanneer een cursus, sessie of gebruiker wordt verwijderd

Als uw plugin rijen opslaat die gekoppeld zijn aan een cursus, sessie of gebruiker, abonneer u dan op `Events::COURSE_DELETED`, `Events::SESSION_DELETED` of `Events::USER_DELETED`. Dit is de enige manier om op te ruimen — de oude `doWhenDeleting*`-methoden bestaan niet meer. Voor deze listeners gelden drie regels:

* **Reageer op `AbstractEvent::TYPE_PRE`** — de gebeurtenis wordt afgevuurd voordat de rij wordt verwijderd, het enige moment waarop uw foreign key nog kan worden opgelost en de gegevens nog leesbaar zijn. `USER_DELETED` wordt ook afgevuurd als `TYPE_POST`, dus de controle is daar niet optioneel.
* **Bewaak op geïnstalleerd, niet op ingeschakeld** — gebruik `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Uw rijen blijven bestaan wanneer de plugin wordt gedeactiveerd, of alleen op een andere access-URL is ingeschakeld, en hun foreign key blokkeert de verwijdering in beide gevallen.
* **Bij `USER_DELETED`, controleer `$event->isHardDelete()`** — een soft delete houdt de gebruiker herstelbaar, dus de bijbehorende gegevens moeten behouden blijven.

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

De plugin `StudentFollowUp` is de referentie voor gebruikers; `Bbb`, `BuyCourses` en `EmbedRegistry` bevatten de equivalenten voor cursus en sessie.

## Stap 8: Lifecycle-hooks

Overschrijf deze methoden in uw plugin-klasse om te reageren op platformacties:

| Methode | Wordt geactiveerd wanneer |
|--------|----------------|
| `install()` | Plugin wordt geactiveerd |
| `uninstall()` | Plugin wordt verwijderd |
| `performActionsAfterConfigure()` | Beheerder slaat het configuratieformulier op |
| `course_settings_updated(array $values)` | Instellingen op cursusniveau wijzigen |
| `validateCourseSetting(string $variable)` | Cursusinstelling opgeslagen (retourneer `false` om te weigeren) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` en `doWhenDeletingSession()` zijn verwijderd, evenals de trigger `AppPlugin::performActionsWhenDeletingItem()` die ze aanriep — ze overschrijven doet nu niets. Gebruik in plaats daarvan de verwijderingsgebeurtenissen uit [Stap 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Stap 9: Activeren

Meld u aan als beheerder en ga naar het blok **Platform** op het beheerdersdashboard, vervolgens **Plugins** — dit opent de pagina **Plugins beheren**. Zoek uw plugin en klik op **Installeren**; klik na installatie op **Inschakelen** om deze te activeren (een ingeschakelde plugin toont in plaats daarvan een knop **Uitschakelen**).

## Tips

* **Volg bestaande plugins als voorbeelden** — `public/plugin/HelloWorld/` en `public/plugin/TopLinks/` zijn goede eenvoudige referenties
* **Gebruik vertalingen** — Gebruik altijd het `lang/`-systeem voor tekst die de gebruiker te zien krijgt
* **Ruim op bij de-installatie** — Verwijder databasetabellen en instellingen in het uninstall-script
* **Controleer de ingeschakelde status** — Roep in eventsubscribers `$this->plugin->isEnabled()` aan voordat u logica uitvoert. De uitzondering is opruimen bij verwijdering: bewaak op geïnstalleerd, omdat de rijen blijven bestaan nadat de plugin is uitgeschakeld