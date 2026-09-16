# Een Plugin Maken

Deze handleiding leidt u door het proces van het maken van een eenvoudige Chamilo-plugin. Voor meer details, zie de [Plugin development wiki-pagina](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Stap 1: Maak de Plugin-map

Maak een map in `public/plugin/`. De mapnaam moet overeenkomen met de identifier van uw plugin:

```
public/plugin/MyPlugin/
```

## Stap 2: Definieer de Plugin-klasse

Maak `src/MyPluginPlugin.php` aan. De klasse erft van `Plugin` en volgt het singleton-patroon:

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

### Beschikbare Instellingstypen

| Type      | Beschrijving                |
|-----------|-----------------------------|
| `boolean` | Aan/uit-vinkvakje          |
| `text`    | Tekstinvoer op één regel   |
| `select`  | Dropdown (lever een `options`-array) |
| `wysiwyg` | Rich text editor           |
| `html`    | Ruw HTML-veld              |
| `checkbox`| Vinkvakje                 |
| `user`    | Gebruikersselector         |

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

Toegang tot instellingen tijdens runtime:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // enkele waarde
$all  = $plugin->get_settings();       // alle instellingen
```

## Stap 3: Maak plugin.php

`plugin.php` in de hoofdmap van de plugin is **vereist**. Het moet `$plugin_info` toewijzen:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Stap 4: Maak Installatie- en De-installatiescripts

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

Implementeer de daadwerkelijke schema-aanmaak/verwijdering binnen de klasse met behulp van Doctrine's `SchemaTool`.

## Stap 5: Voeg Vertalingen Toe

Maak taalbestanden in `lang/` met behulp van locale-codes (bijv. `en_US.php`, `fr_FR.php`, `es_ES.php`). De fallback is `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Toegang tot vertalingen via `$plugin->get_lang('key')`.

## Stap 6: Injecteer Inhoud via Weergavegebieden

Plugins kunnen HTML injecteren in 18 vooraf gedefinieerde gebieden van de Vue-frontend. Overschrijf `renderRegion()` in uw klasse:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Beschikbare gebieden zijn onder andere: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Stap 7: Reageer op Platformgebeurtenissen (Optioneel)

Plugins kunnen reageren op platformgebeurtenissen met behulp van Symfony event subscribers. Maak een bestand aan dat eindigt op `EventSubscriber.php` in `src/EventSubscriber/` — het wordt automatisch geregistreerd via `PluginEventSubscriberPass`.

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
        // Plugin-klassen zijn geen Symfony-services — gebruik de create() singleton.
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
        // uw logica hier
    }
}
```

Zie `src/CoreBundle/Event/Events.php` voor de volledige lijst van beschikbare gebeurtenissen (gebruiker, cursus, sessie, LP, oefening, portfolio, authenticatie en meer).

## Stap 8: Levenscyclus-hooks

 Overschrijf deze methoden in je plugin-klasse om te reageren op platformacties:

| Methode | Getriggerd wanneer |
|--------|---------------------|
| `install()` | Plugin wordt geactiveerd |
| `uninstall()` | Plugin wordt verwijderd |
| `performActionsAfterConfigure()` | Beheerder slaat het configuratieformulier op |
| `course_settings_updated(array $values)` | Instellingen op cursusniveau wijzigen |
| `validateCourseSetting(string $variable)` | Cursusinstelling opgeslagen (retourneer `false` om te weigeren) |
| `doWhenDeletingUser(int $userId)` | Een gebruiker wordt verwijderd |
| `doWhenDeletingCourse(int $courseId)` | Een cursus wordt verwijderd |
| `doWhenDeletingSession(int $sessionId)` | Een sessie wordt verwijderd |

## Stap 9: Activeren

Log in als beheerder, navigeer naar **Plugins beheren**, zoek je plugin en klik op **Activeren**.

## Tips

* **Volg bestaande plugins als voorbeeld** — `public/plugin/HelloWorld/` en `public/plugin/TopLinks/` zijn goede eenvoudige referenties
* **Gebruik vertalingen** — Gebruik altijd het `lang/`-systeem voor tekst die gebruikers zien
* **Ruim op bij de-installatie** — Verwijder databasetabellen en instellingen in het de-installatiescript
* **Controleer de ingeschakelde status** — Roep in gebeurtenisabonnees altijd `$this->plugin->isEnabled()` aan voordat je logica uitvoert