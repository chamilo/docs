# Lisäosan luominen

Tämä opas käy läpi perus-Chamilo-lisäosan luomisen. Lisätietoja on [Plugin development -wikisivulla](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Vaihe 1: Luo lisäosan hakemisto

Luo hakemisto polkuun `public/plugin/`. Hakemiston nimen tulee vastata lisäosan tunnistetta:

```
public/plugin/MyPlugin/
```

## Vaihe 2: Määritä lisäosan luokka

Luo `src/MyPluginPlugin.php`. Luokka perii luokan `Plugin` ja noudattaa singleton-mallia:

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

### Käytettävissä olevat asetus­tyypit

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

`select`-asetuksille:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Asetusten käyttö ajonaikaisesti:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Vaihe 3: Luo plugin.php

Lisäosan juuressa oleva `plugin.php` on **pakollinen**. Sen on asetettava `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Vaihe 4: Luo asennus- ja poisto­skriptit

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

Toteuta varsinainen skeeman luonti/poisto luokan sisällä Doctrine-kirjaston `SchemaTool`-työkalulla.

## Vaihe 5: Lisää käännökset

Luo kielitiedostot hakemistoon `lang/` käyttäen kielialuekoodeja (esim. `en_US.php`, `fr_FR.php`, `es.php`). Varatiedosto on `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Käännöksiin pääsee metodilla `$plugin->get_lang('key')`.

## Vaihe 6: Sisällön injektointi näyttöalueiden kautta

Lisäosat voivat injektoida HTML:ää 18 ennalta määritettyyn käyttöliittymän alueeseen. Alueen renderöintitapa riippuu alueesta:

* **`course_tool_plugin`** on ainoa alue, joka renderöidään ylikirjoittamalla `renderRegion(string $region): string` lisäosan luokassa. Sitä kutsutaan (luokan `PluginRegionController` kautta) vain kurssikohtaiselle lisäosalle (`is_course_plugin`), kun kurssisivu on auki:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **16 yleistä aluetta** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — renderöidään vaatimalla lisäosan oma `index.php`, ei `renderRegion()`-metodia. Kehys asettaa `$plugin_info['current_region']` ennen tiedoston vaatimista, joten tiedosto voi joko `echo`-tulostaa HTML:ää suoraan kyseiselle alueelle tai ilmoittaa Twig-mallit renderöitäväksi `$plugin_info['templates']`-avaimen kautta:

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

  `public/plugin/HelloWorld/index.php` on täydellinen toimiva esimerkki — HelloWorld ei ylikirjoita `renderRegion()`-metodia lainkaan; jokainen sen täyttämä alue kulkee `index.php`-tiedoston kautta.

* **`menu_administrator`** on erikoistapaus, joka on varattu vain ylläpitäjille näkyville linkeille vanhassa hallintapaneelissa, ei kahdelle yllä olevalle mekanismille. `Dashboard` ja `CleanDeletedFiles` ovat oikeita lisäosia, jotka käyttävät sitä.

Riippumatta käyttämästäsi mekanismista ylläpitäjän on silti otettava alue(et) käyttöön lisäosallesi **Alueet**-painikkeesta sen vieressä **Hallitse lisäosia** -sivulla (ks. [Vaihe 9](#step-9-activate)) — lisäosa ei renderöi mitään alueella, jota ei ole nimenomaisesti otettu siellä käyttöön.

## Vaihe 7: Reagointi alustan tapahtumiin (valinnainen)

Lisäosat voivat reagoida alustan tapahtumiin Symfony-tapahtumatilaajien avulla. Luo tiedosto, jonka nimi päättyy `EventSubscriber.php`, hakemistoon `src/EventSubscriber/` — se rekisteröidään automaattisesti `PluginEventSubscriberPass`-luokan kautta.

Kaksi vaatimusta, muuten tilaaja ohitetaan hiljaisesti: luokan on oltava **globaalissa nimiavaruudessa** (passi selvittää sen tiedostonimestä), ja `composer dump-autoload` on ajettava lisäyksen jälkeen (`public/plugin` on classmap-merkintä). Tarkista tulos komennolla `php bin/console debug:event-dispatcher <event.name>`.

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

Katso `src/CoreBundle/Event/Events.php` saatavilla olevien tapahtumien täydellisestä luettelosta (käyttäjä, kurssi, istunto, LP, harjoitus, portfolio, autentikointi ja muita).

### Siivous kurssin, istunnon tai käyttäjän poiston yhteydessä

Jos lisäosasi tallentaa rivejä, jotka on avainnettu kurssiin, istuntoon tai käyttäjään, tilaa `Events::COURSE_DELETED`, `Events::SESSION_DELETED` tai `Events::USER_DELETED`. Nämä ovat ainoa tapa siivota — vanhat `doWhenDeleting*`-metodit eivät enää ole olemassa. Näihin kuuntelijoihin pätee kolme sääntöä:

* **Toimi `AbstractEvent::TYPE_PRE`-tyypillä** — tapahtuma laukeaa ennen rivin poistamista, ainoana hetkenä jolloin vierasavain vielä ratkeaa ja data on luettavissa. `USER_DELETED` laukeaa myös `TYPE_POST`-tyyppinä, joten tarkistus ei ole siellä valinnainen.
* **Suojaa asennettu-tilalla, ei käytössä-tilalla** — käytä `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Rivisi säilyvät, vaikka lisäosa poistettaisiin käytöstä tai se olisi käytössä vain toisessa access URL:ssa, ja niiden vierasavain estää poiston joka tapauksessa.
* **`USER_DELETED`-tapahtumassa tarkista `$event->isHardDelete()`** — pehmeä poisto pitää käyttäjän palautettavana, joten sen datan on säilyttävä.

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

`StudentFollowUp`-lisäosa on viite käyttäjille; `Bbb`, `BuyCourses` ja `EmbedRegistry` sisältävät kurssin ja istunnon vastineet.

## Vaihe 8: Elinkaaren koukut

Ylikirjoita nämä metodit lisäosaluokassasi vastataksesi alustan toimiin:

| Metodi | Laukeaa kun |
|--------|----------------|
| `install()` | Lisäosa aktivoidaan |
| `uninstall()` | Lisäosa poistetaan |
| `performActionsAfterConfigure()` | Ylläpitäjä tallentaa asetusten lomakkeen |
| `course_settings_updated(array $values)` | Kurssitason asetukset muuttuvat |
| `validateCourseSetting(string $variable)` | Kurssiasetus tallennetaan (palauta `false` hylätäksesi) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` ja `doWhenDeletingSession()` poistettiin, samoin `AppPlugin::performActionsWhenDeletingItem()`-laukaisin, joka kutsui niitä — niiden ylikirjoittaminen ei enää tee mitään. Käytä sen sijaan poistotapahtumia [vaiheesta 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Vaihe 9: Aktivointi

Kirjaudu ylläpitäjänä ja siirry hallintapaneelin **Alusta**-lohkoon, sitten **Lisäosat** — tämä avaa **Hallitse lisäosia** -sivun. Etsi lisäosasi ja napsauta **Asenna**; asennuksen jälkeen napsauta **Ota käyttöön** aktivoidaksesi sen (käytössä oleva lisäosa näyttää **Poista käytöstä** -painikkeen).

## Vinkkejä

* **Seuraa olemassa olevia lisäosia esimerkkeinä** — `public/plugin/HelloWorld/` ja `public/plugin/TopLinks/` ovat hyviä yksinkertaisia viitteitä
* **Käytä käännöksiä** — Käytä aina `lang/`-järjestelmää käyttäjälle näkyvälle tekstille
* **Siivoa poiston yhteydessä** — Poista tietokantataulut ja asetukset asennuksen poistoskriptissä
* **Tarkista käytössä-tila** — Tapahtumatilaajissa kutsu `$this->plugin->isEnabled()` ennen logiikan suorittamista. Poikkeus on siivous poiston yhteydessä: suojaa asennettu-tilalla, koska rivit säilyvät lisäosan käytöstä poistamisen jälkeen