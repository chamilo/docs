# Skapa ett plugin

Den här guiden går igenom hur du skapar ett grundläggande Chamilo-plugin. För mer detaljer, se [wikisidan om pluginutveckling](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Steg 1: Skapa plugin-katalogen

Skapa en katalog i `public/plugin/`. Katalognamnet ska matcha pluginets identifierare:

```
public/plugin/MyPlugin/
```

## Steg 2: Definiera plugin-klassen

Skapa `src/MyPluginPlugin.php`. Klassen ärver `Plugin` och följer singleton-mönstret:

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

### Tillgängliga inställningstyper

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

För `select`-inställningar:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Åtkomst till inställningar vid körning:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Steg 3: Skapa plugin.php

`plugin.php` i pluginets rotkatalog är **obligatorisk**. Den måste tilldela `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Steg 4: Skapa installations- och avinstallationsskript

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

Implementera den faktiska skapandet/borttagningen av schemat inuti klassen med Doctrines `SchemaTool`.

## Steg 5: Lägg till översättningar

Skapa språkfiler i `lang/` med språkkoder (t.ex. `en_US.php`, `fr_FR.php`, `es.php`). Reservfilen är `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Åtkomst till översättningar via `$plugin->get_lang('key')`.

## Steg 6: Infoga innehåll via visningsregioner

Plugin kan infoga HTML i 18 fördefinierade regioner i gränssnittet. Vilken mekanism som renderar en region beror på vilken region det är:

* **`course_tool_plugin`** är den enda region som renderas genom att åsidosätta `renderRegion(string $region): string` i din plugin-klass. Den anropas (via `PluginRegionController`) endast för ett kursomfattande plugin (`is_course_plugin`) medan en kurssida är öppen:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **De 16 allmänna regionerna** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — renderas genom att inkludera pluginets egen `index.php`, inte `renderRegion()`. Ramverket sätter `$plugin_info['current_region']` innan filen inkluderas, så den kan antingen `echo` HTML direkt för den regionen eller deklarera Twig-mallar som ska renderas via `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` är ett komplett fungerande exempel — HelloWorld åsidosätter inte `renderRegion()` alls; varje region den fyller går via `index.php`.

* **`menu_administrator`** är ett specialfall reserverat för administratörslänkar som visas i den äldre administrationspanelen, inte de två mekanismerna ovan. `Dashboard` och `CleanDeletedFiles` är verkliga plugin som använder den.

Oavsett vilken mekanism du använder måste en administratör fortfarande aktivera regionen/regionerna för ditt plugin via knappen **Regioner** bredvid det på sidan **Hantera plugin** (se [Steg 9](#step-9-activate)) — ett plugin renderar ingenting i en region som inte uttryckligen har aktiverats där.

## Steg 7: Reagera på plattformshändelser (valfritt)

Tillägg kan reagera på plattformshändelser med Symfony event subscribers. Skapa en fil som slutar på `EventSubscriber.php` i `src/EventSubscriber/` — den registreras automatiskt via `PluginEventSubscriberPass`.

Två krav, annars hoppas subscribern över tyst: klassen måste ligga i det **globala namnutrymmet** (passet löser den från filnamnet), och du måste köra `composer dump-autoload` efter att du lagt till den (`public/plugin` är en classmap-post). Kontrollera resultatet med `php bin/console debug:event-dispatcher <event.name>`.

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

Se `src/CoreBundle/Event/Events.php` för den fullständiga listan över tillgängliga händelser (användare, kurs, session, LP, övning, portfolio, autentisering med mera).

### Städa upp när en kurs, session eller användare raderas

Om tillägget lagrar rader nycklade på en kurs, session eller användare, prenumerera på `Events::COURSE_DELETED`, `Events::SESSION_DELETED` eller `Events::USER_DELETED`. Det är det enda sättet att städa upp — de gamla metoderna `doWhenDeleting*` finns inte längre. Tre regler gäller för dessa lyssnare:

* **Agera på `AbstractEvent::TYPE_PRE`** — händelsen utlöses innan raden tas bort, det enda tillfället då din främmande nyckel fortfarande går att lösa och data fortfarande är läsbara. `USER_DELETED` utlöses även som `TYPE_POST`, så kontrollen är inte valfri där.
* **Skydda mot installerat, inte aktiverat** — använd `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Dina rader överlever att tillägget inaktiveras, eller att det bara är aktiverat på en annan åtkomst-URL, och den främmande nyckeln blockerar raderingen i båda fallen.
* **Vid `USER_DELETED`, kontrollera `$event->isHardDelete()`** — en mjuk radering behåller användaren återställbar, så dess data måste överleva.

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

Tillägget `StudentFollowUp` är referensen för användare; `Bbb`, `BuyCourses` och `EmbedRegistry` har motsvarigheterna för kurs och session.

## Steg 8: Livscykelhooks

Åsidosätt dessa metoder i din tilläggsklass för att reagera på plattformens åtgärder:

| Metod | Utlöses när |
|--------|----------------|
| `install()` | Tillägget aktiveras |
| `uninstall()` | Tillägget tas bort |
| `performActionsAfterConfigure()` | Administratören sparar konfigurationsformuläret |
| `course_settings_updated(array $values)` | Kursnivåinställningar ändras |
| `validateCourseSetting(string $variable)` | Kursinställning sparas (returnera `false` för att avvisa) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` och `doWhenDeletingSession()` togs bort, tillsammans med utlösaren `AppPlugin::performActionsWhenDeletingItem()` som anropade dem — att åsidosätta dem gör nu ingenting. Använd raderingshändelserna från [Steg 7](#cleaning-up-when-a-course-session-or-user-is-deleted) i stället.

## Steg 9: Aktivera

Logga in som administratör och gå till administrationspanelen, blocket **Plattform**, sedan **Tillägg** — detta öppnar sidan **Hantera tillägg**. Hitta ditt tillägg och klicka på **Installera**; när det är installerat klickar du på **Aktivera** för att slå på det (ett aktiverat tillägg visar i stället knappen **Inaktivera**).

## Tips

* **Följ befintliga tillägg som exempel** — `public/plugin/HelloWorld/` och `public/plugin/TopLinks/` är bra enkla referenser
* **Använd översättningar** — Använd alltid systemet `lang/` för text som visas för användaren
* **Städa upp vid avinstallation** — Ta bort databastabeller och inställningar i avinstallationsskriptet
* **Kontrollera aktiverat tillstånd** — I event subscribers, anropa `$this->plugin->isEnabled()` innan logiken körs. Undantaget är städning vid radering: skydda mot installerat i stället, eftersom raderna överlever att tillägget inaktiveras