# Opprette en plugin

Denne veiledningen går gjennom opprettelsen av en grunnleggende Chamilo-plugin. For mer detaljer, se [wiki-siden om plugin-utvikling](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Trinn 1: Opprett plugin-katalogen

Opprett en katalog i `public/plugin/`. Katalognavnet skal samsvare med pluginens identifikator:

```
public/plugin/MyPlugin/
```

## Trinn 2: Definer plugin-klassen

Opprett `src/MyPluginPlugin.php`. Klassen utvider `Plugin` og følger singleton-mønsteret:

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

### Tilgjengelige innstillingstyper

| Type | Beskrivelse |
|------|-------------|
| `boolean` | Avkrysningsboks på/av |
| `text` | Tekstfelt på én linje |
| `select` | Nedtrekksliste (oppgi `options`-tabell) |
| `wysiwyg` | Riktekstredigerer |
| `html` | Rått HTML-felt |
| `checkbox` | Avkrysningsboks |
| `user` | Brukervelger |

For `select`-innstillinger:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Tilgang til innstillinger ved kjøretid:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Trinn 3: Opprett plugin.php

`plugin.php` i pluginens rotkatalog er **påkrevd**. Den må tilordne `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Trinn 4: Opprett installasjons- og avinstallasjonsskript

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

Implementer selve opprettelsen/slettingen av skjema inne i klassen ved hjelp av Doctrines `SchemaTool`.

## Trinn 5: Legg til oversettelser

Opprett språkfiler i `lang/` med språkkoder (f.eks. `en_US.php`, `fr_FR.php`, `es.php`). Tilbakefallsspråket er `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Hent oversettelser via `$plugin->get_lang('key')`.

## Trinn 6: Injiser innhold via visningsområder

Plugins kan injisere HTML i 18 forhåndsdefinerte områder i grensesnittet. Hvilken mekanisme som renderer et område, avhenger av hvilket område det er:

* **`course_tool_plugin`** er det eneste området som renderer ved å overstyre `renderRegion(string $region): string` i plugin-klassen. Den kalles (via `PluginRegionController`) kun for en kursavgrenset plugin (`is_course_plugin`) mens en kursside er åpen:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **De 16 generelle områdene** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — renderer ved å inkludere pluginens egen `index.php`, ikke `renderRegion()`. Rammeverket setter `$plugin_info['current_region']` før filen inkluderes, slik at den enten kan `echo` HTML direkte for det området eller deklarere Twig-maler som renderer via `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` er et komplett, fungerende eksempel — HelloWorld overstyrer ikke `renderRegion()` i det hele tatt; hvert område den fyller, går gjennom `index.php`.

* **`menu_administrator`** er et spesialtilfelle reservert for administratorlenker som vises i det eldre administrasjonspanelet, ikke de to mekanismene over. `Dashboard` og `CleanDeletedFiles` er reelle plugins som bruker det.

Uansett hvilken mekanisme du bruker, må en administrator likevel slå området/områdene på for pluginen din via knappen **Regions** ved siden av den på siden **Manage plugins** (se [Trinn 9](#step-9-activate)) — en plugin renderer ingenting i et område som ikke er eksplisitt aktivert der.

## Steg 7: Reager på plattformhendelser (valgfritt)

Programtillegg kan reagere på plattformhendelser ved hjelp av Symfony event subscribers. Opprett en fil som slutter på `EventSubscriber.php` inne i `src/EventSubscriber/` — den registreres automatisk via `PluginEventSubscriberPass`.

To krav, ellers hoppes subscriberen over uten melding: klassen må ligge i det **globale navnerommet** (passet løser den ut fra filnavnet), og du må kjøre `composer dump-autoload` etter at du har lagt den til (`public/plugin` er en classmap-oppføring). Kontroller resultatet med `php bin/console debug:event-dispatcher <event.name>`.

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

Se `src/CoreBundle/Event/Events.php` for den komplette listen over tilgjengelige hendelser (bruker, kurs, økt, LP, øvelse, portefølje, autentisering og mer).

### Opprydding når et kurs, en økt eller en bruker slettes

Hvis programtillegget ditt lagrer rader nøklet på et kurs, en økt eller en bruker, abonner på `Events::COURSE_DELETED`, `Events::SESSION_DELETED` eller `Events::USER_DELETED`. Dette er den eneste måten å rydde opp på — de gamle `doWhenDeleting*`-metodene finnes ikke lenger. Tre regler gjelder for disse lytterne:

* **Handle på `AbstractEvent::TYPE_PRE`** — hendelsen utløses før raden fjernes, det eneste øyeblikket der fremmednøkkelen din fortsatt løses og dataene fortsatt er lesbare. `USER_DELETED` utløses også som `TYPE_POST`, så sjekken er ikke valgfri der.
* **Beskytt på installert, ikke aktivert** — bruk `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Radene dine overlever at programtillegget deaktiveres, eller at det bare er aktivert på en annen tilgangs-URL, og fremmednøkkelen deres blokkerer slettingen uansett.
* **På `USER_DELETED`, sjekk `$event->isHardDelete()`** — en myk sletting holder brukeren gjenopprettbar, så dataene må overleve.

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

Programtillegget `StudentFollowUp` er referansen for brukere; `Bbb`, `BuyCourses` og `EmbedRegistry` har tilsvarende for kurs og økt.

## Steg 8: Livssykluskroker

Overstyr disse metodene i programtilleggsklassen din for å respondere på plattformhandlinger:

| Metode | Utløses når |
|--------|----------------|
| `install()` | Programtillegget aktiveres |
| `uninstall()` | Programtillegget fjernes |
| `performActionsAfterConfigure()` | Administrator lagrer konfigurasjonsskjemaet |
| `course_settings_updated(array $values)` | Innstillinger på kursnivå endres |
| `validateCourseSetting(string $variable)` | Kursinnstilling lagres (returner `false` for å avvise) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` og `doWhenDeletingSession()` ble fjernet, sammen med utløseren `AppPlugin::performActionsWhenDeletingItem()` som kalte dem — å overstyre dem gjør nå ingenting. Bruk slettehendelsene fra [Steg 7](#cleaning-up-when-a-course-session-or-user-is-deleted) i stedet.

## Steg 9: Aktiver

Logg inn som administrator og naviger til administrasjonsdashbordets **Plattform**-blokk, deretter **Programtillegg** — dette åpner siden **Administrer programtillegg**. Finn programtillegget ditt og klikk **Installer**; når det er installert, klikk **Aktiver** for å slå det på (et aktivert programtillegg viser en **Deaktiver**-knapp i stedet).

## Tips

* **Følg eksisterende programtillegg som eksempler** — `public/plugin/HelloWorld/` og `public/plugin/TopLinks/` er gode, enkle referanser
* **Bruk oversettelser** — Bruk alltid `lang/`-systemet for tekst som vises til brukeren
* **Rydd opp ved avinstallering** — Fjern databasetabeller og innstillinger i avinstalleringsskriptet
* **Sjekk aktivert tilstand** — I event subscribers, kall `$this->plugin->isEnabled()` før du kjører logikk. Unntaket er opprydding ved sletting: beskytt på installert i stedet, siden radene overlever at programtillegget deaktiveres