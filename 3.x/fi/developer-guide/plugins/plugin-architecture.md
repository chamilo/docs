# Liitännäisarkkitehtuuri

## Liitännäisten sijainti

Liitännäiset sijaitsevat hakemistossa `public/plugin/`. Jokaisella liitännäisellä on oma hakemistonsa:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Liitännäisen rakenne

Tyypillinen liitännäishakemisto sisältää:

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

## Liitännäisluokka

Jokainen liitännäinen perii `Plugin`-kantaluokan (`public/main/inc/lib/plugin.class.php`) ja noudattaa singleton-mallia:

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

### Keskeiset luokkaominaisuudet

| Ominaisuus | Tyyppi | Vaikutus |
|----------|------|--------|
| `$isCoursePlugin` | bool | Rekisteröi liitännäisen kurssityökaluksi |
| `$isAdminPlugin` | bool | Lisää ylläpitosivun |
| `$isMailPlugin` | bool | Integroituu sähköpostijärjestelmään |
| `$addCourseTool` | bool | Lisää kuvakkeen kurssin etusivulle |
| `$course_settings` | array | Määrittää kurssikohtaiset asetuskentät |

## Liitännäisen elinkaari

1. **Asennus** — Ylläpitäjä aktivoi liitännäisen, jolloin suoritetaan `install.php`
2. **Määritys** — Asetukset määritellään ja hallitaan ylläpitopaneelissa; ne tallennetaan tauluun `access_url_rel_plugin` (tukee monivuokralaisuutta)
3. **Suoritus** — Liitännäinen lisää sisältöä näyttöalueisiin tai reagoi alustan tapahtumiin
4. **Deaktivointi** — Liitännäinen poistetaan käytöstä, mutta sen tiedot säilytetään
5. **Poisto** — Suoritetaan `uninstall.php` tietojen ja taulujen siivoamiseksi

## Näyttöalueet

Liitännäiset lisäävät HTML:ää 18 ennalta määritettyyn Vue-käyttöliittymän alueeseen ylikirjoittamalla metodin `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Käytettävissä olevat alueet: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Symfony-integraatio

### Tapahtumatilaajat

Tiedostot, joiden nimi päättyy `EventSubscriber.php` ja jotka sijaitsevat hakemistossa `src/EventSubscriber/`, rekisteröidään automaattisesti luokan `PluginEventSubscriberPass` kautta. Ne toteuttavat rajapinnan `EventSubscriberInterface` ja reagoivat tapahtumiin, jotka on määritelty tiedostossa `src/CoreBundle/Event/Events.php`.

Koska liitännäisluokka (`MyPluginPlugin`) ei ole Symfony-palvelu, sitä ei voi autowireata tilaajan konstruktoriin. Käytä sen sijaan `create()`-singletonia:

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

### Doctrine-entiteetit

Hakemistoon `src/Entity/` sijoitetut Doctrine-entiteetit löydetään automaattisesti luokan `PluginEntityPass` avulla. Käytä PHP 8 -attribuutteja kartoitukseen. Nimiavaruuden on noudatettava muotoa `Chamilo\PluginBundle\{PluginName}`. Käytä yksilöllisiä taulunimien etuliitteitä (esim. `my_plugin_*`) törmäysten välttämiseksi.

### PluginHelper-palvelu

Kun pluginin tilaa tarvitaan ytimen Symfony-palveluista, injektoi `PluginHelper` sen sijaan, että instansoisit plugin-luokan suoraan:

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

Käytettävissä olevat metodit:

| Metodi | Tarkoitus |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Tarkistaa, onko plugin asennettu ja aktiivinen nykyiselle access URL:lle |
| `loadLegacyPlugin(string $name): ?object` | Instansoi ja palauttaa pluginin singletonin |
| `getPluginSetting(string $name, string $key): mixed` | Lukee yksittäisen plugin-asetuksen arvon |
| `getPluginOverrides(string $name): array` | Hakee pluginin `plugin.yaml`-ohitukset (oletukset + access URL -kohtaiset) |

## Ytimen tiedostoviitteet

| Tiedosto | Tarkoitus |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Pluginin perusluokka |
| `public/main/inc/lib/plugin.lib.php` | Plugin-hallinta |
| `src/CoreBundle/Entity/Plugin.php` | Pluginin Doctrine-entiteetti |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper-palvelu |
| `src/CoreBundle/Event/Events.php` | Tapahtumavakiot |
| `public/plugin/HelloWorld/` | Minimaalinen esimerkkplugin |
| `public/plugin/TopLinks/` | Yksinkertainen esimerkkplugin |