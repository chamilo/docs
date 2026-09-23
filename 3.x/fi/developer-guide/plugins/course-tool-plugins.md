# Kurssityökalulaajennukset

Kurssityökalulaajennukset lisäävät uusia työkaluja kurssin etusivulle valmiiden työkalujen, kuten Documents, Exercises ja Forums, rinnalle.

## Miten kurssityökalulaajennukset toimivat

Kun laajennus rekisteröi itsensä kurssityökaluksi:

1. Se näkyy kurssin etusivun työkaluruudukossa
2. Opettajat voivat näyttää tai piilottaa sen kuten minkä tahansa muun työkalun
3. Työkalua napsauttamalla avautuu laajennuksen käyttöliittymä kurssin kontekstissa

## Rekisteröinti kurssityökaluksi

Aseta laajennusluokassasi `$isCoursePlugin = true`. Jos haluat lisätä työkalukuvakkeen automaattisesti kurssin etusivulle, aseta myös `$addCourseTool = true`:

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## Kurssikohtaiset asetukset

Määritä kurssitason konfigurointikentät `$course_settings`-ominaisuuden kautta:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Nämä näkyvät kurssin asetusten paneelissa, ja niitä voidaan validoida ylikirjoittamalla `validateCourseSetting(string $variable)` (palauta `false` hylätäksesi arvon) tai käsitellä `course_settings_updated(array $values)`-menetelmällä.

## Asennus ja poisto

Rekisteröidäksesi laajennuksen kentät kaikkiin olemassa oleviin kursseihin asennuksen yhteydessä:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Asentaaksesi yksittäiseen kurssiin (esim. kun uusi kurssi luodaan):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Poistaaksesi kentät tietystä kurssista:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integraatiopisteet

Kurssityökalulaajennukset integroituvat seuraavien kautta:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Rekisteröi laajennuksen työkaluksi kurssiin
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Selvittää, mitkä työkalut (mukaan lukien laajennustyökalut) näkyvät kurssin etusivulla
* Työkalu näkyy kurssin `CTool`-kokoelmassa

## Kurssikonteksti

Kun oppija napsauttaa laajennuksesi työkalua, laajennuskoodisi suoritetaan kurssin kontekstissa. Voit käyttää:

* Nykyistä kurssia (via `api_get_course_id()` tai CID-pyyntösäilö)
* Nykyistä istuntoa (jos sovellettavissa)
* Nykyistä käyttäjää
* Kurssitason laajennusasetuksia

## Esimerkkejä

Valmiit kurssityökalulaajennukset:

* **BigBlueButton** (`Bbb/`) — Videoneuvottelu kursseissa
* **Zoom** (`Zoom/`) — Zoom-kokoukset kursseissa
* **OnlyOffice** (`Onlyoffice/`) — Asiakirjojen muokkaus kursseissa