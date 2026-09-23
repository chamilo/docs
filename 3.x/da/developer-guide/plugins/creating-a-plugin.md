# Oprettelse af et plugin

Denne vejledning gennemgår oprettelsen af et grundlæggende Chamilo-plugin. Yderligere detaljer findes på [wiki-siden om plugin-udvikling](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Trin 1: Opret plugin-mappen

Opret en mappe i `public/plugin/`. Mappenavnet skal svare til pluginnets identifikator:

```
public/plugin/MyPlugin/
```

## Trin 2: Definer plugin-klassen

Opret `src/MyPluginPlugin.php`. Klassen udvider `Plugin` og følger singleton-mønstret:

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

### Tilgængelige indstillingstyper

| Type | Beskrivelse |
|------|-------------|
| `boolean` | Afkrydsningsfelt til/fra |
| `text` | Enlinjet tekstfelt |
| `select` | Rullemenu (angiv `options`-array) |
| `wysiwyg` | Rich text-editor |
| `html` | Rå HTML-felt |
| `checkbox` | Afkrydsningsfelt |
| `user` | Brugervælger |

For `select`-indstillinger:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Adgang til indstillinger ved kørsel:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Trin 3: Opret plugin.php

`plugin.php` i pluginnets rodmappe er **påkrævet**. Den skal tildele `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Trin 4: Opret installations- og afinstallationsscripts

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

Implementér den egentlige oprettelse/sletning af skemaet inde i klassen ved hjælp af Doctrines `SchemaTool`.

## Trin 5: Tilføj oversættelser

Opret sprogfiler i `lang/` med landekoder (f.eks. `en_US.php`, `fr_FR.php`, `es.php`). Fallback er `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Tilgå oversættelser via `$plugin->get_lang('key')`.

## Trin 6: Indsæt indhold via visningsregioner

Plugins kan indsætte HTML i 18 foruddefinerede regioner i grænsefladen. Hvilken mekanisme der renderer en region, afhænger af hvilken region det er:

* **`course_tool_plugin`** er den eneste region, der renderes ved at overskrive `renderRegion(string $region): string` i din plugin-klasse. Den kaldes (via `PluginRegionController`) kun for et kursusafgrænset plugin (`is_course_plugin`), mens en kursusside er åben:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **De 16 generelle regioner** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — renderes ved at inkludere pluginnets egen `index.php`, ikke `renderRegion()`. Frameworket sætter `$plugin_info['current_region']` før filen inkluderes, så den enten kan `echo` HTML direkte for den region eller erklære Twig-skabeloner, der skal renderes via `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` er et komplet, fungerende eksempel — HelloWorld overskriver slet ikke `renderRegion()`; alle regioner, det udfylder, går gennem `index.php`.

* **`menu_administrator`** er et særtilfælde forbeholdt administrator-only-links, der vises i det ældre administrationsdashboard, og ikke de to mekanismer ovenfor. `Dashboard` og `CleanDeletedFiles` er reelle plugins, der bruger det.

Uanset hvilken mekanisme du bruger, skal en administrator stadig slå regionen/regionerne til for dit plugin via knappen **Regions** ved siden af det på siden **Manage plugins** (se [Trin 9](#step-9-activate)) — et plugin renderer intet i en region, der ikke eksplicit er aktiveret dér.

## Trin 7: Reagér på platformhændelser (valgfrit)

Plugins kan reagere på platformhændelser ved hjælp af Symfony event subscribers. Opret en fil, der ender på `EventSubscriber.php`, inde i `src/EventSubscriber/` — den registreres automatisk via `PluginEventSubscriberPass`.

To krav, ellers springes subscriberen over uden advarsel: klassen skal være i det **globale namespace** (passet opløser den ud fra filnavnet), og du skal køre `composer dump-autoload` efter at have tilføjet den (`public/plugin` er en classmap-post). Kontrollér resultatet med `php bin/console debug:event-dispatcher <event.name>`.

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

Se `src/CoreBundle/Event/Events.php` for den fulde liste over tilgængelige hændelser (bruger, kursus, session, LP, øvelse, portfolio, autentificering og mere).

### Oprydning, når et kursus, en session eller en bruger slettes

Hvis dit plugin gemmer rækker nøglede på et kursus, en session eller en bruger, skal du abonnere på `Events::COURSE_DELETED`, `Events::SESSION_DELETED` eller `Events::USER_DELETED`. Dette er den eneste måde at rydde op på — de gamle `doWhenDeleting*`-metoder findes ikke længere. Tre regler gælder for disse lyttere:

* **Handl på `AbstractEvent::TYPE_PRE`** — hændelsen udløses, før rækken fjernes, det eneste øjeblik hvor din fremmednøgle stadig kan opløses, og dataene stadig er læsbare. `USER_DELETED` udløses også som `TYPE_POST`, så kontrollen er ikke valgfri dér.
* **Beskyt på installeret, ikke aktiveret** — brug `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Dine rækker overlever, at pluginnet deaktiveres, eller at det kun er aktiveret på en anden adgangs-URL, og deres fremmednøgle blokerer sletningen under alle omstændigheder.
* **Ved `USER_DELETED`, tjek `$event->isHardDelete()`** — en blød sletning holder brugeren gendannelsesbar, så dens data skal overleve.

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

Pluginnet `StudentFollowUp` er referencen for brugere; `Bbb`, `BuyCourses` og `EmbedRegistry` rummer de tilsvarende for kursus og session.

## Trin 8: Livscykluskroge

Overskriv disse metoder i din plugin-klasse for at reagere på platformhandlinger:

| Metode | Udløses når |
|--------|----------------|
| `install()` | Pluginnet aktiveres |
| `uninstall()` | Pluginnet fjernes |
| `performActionsAfterConfigure()` | Administratoren gemmer konfigurationsformularen |
| `course_settings_updated(array $values)` | Indstillinger på kursusniveau ændres |
| `validateCourseSetting(string $variable)` | Kursusindstilling gemmes (returnér `false` for at afvise) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` og `doWhenDeletingSession()` blev fjernet, sammen med triggeren `AppPlugin::performActionsWhenDeletingItem()`, der kaldte dem — at overskrive dem gør nu ingenting. Brug i stedet sletningshændelserne fra [Trin 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Trin 9: Aktivér

Log ind som administrator, og gå til administrationsdashboardets **Platform**-blok, derefter **Plugins** — dette åbner siden **Administrer plugins**. Find dit plugin, og klik **Installér**; når det er installeret, klik **Aktivér** for at slå det til (et aktiveret plugin viser i stedet en **Deaktivér**-knap).

## Tips

* **Følg eksisterende plugins som eksempler** — `public/plugin/HelloWorld/` og `public/plugin/TopLinks/` er gode, enkle referencer
* **Brug oversættelser** — Brug altid `lang/`-systemet til brugerrettet tekst
* **Ryd op ved afinstallation** — Fjern databasetabeller og indstillinger i afinstallationsscriptet
* **Tjek aktiveret tilstand** — I event subscribers skal du kalde `$this->plugin->isEnabled()` før du udfører logik. Undtagelsen er oprydning ved sletning: beskyt på installeret i stedet, da rækkerne overlever, at pluginnet deaktiveres