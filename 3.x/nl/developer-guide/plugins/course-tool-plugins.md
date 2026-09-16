# Cursustool-plugins

Cursustool-plugins voegen nieuwe tools toe aan de startpagina van de cursus, naast ingebouwde tools zoals Documenten, Oefeningen en Forums.

## Hoe cursustool-plugins werken

Wanneer een plugin zichzelf als cursustool registreert:

1. Verschijnt deze in het toolraster op de startpagina van de cursus
2. Kunnen docenten deze tonen/verbergen zoals elke andere tool
3. Opent een klik op de tool de interface van de plugin binnen de cursuscontext

## Registreren als cursustool

Stel in uw plugin-klasse `$isCoursePlugin = true` in. Om automatisch een toolpictogram aan de startpagina van de cursus toe te voegen, stelt u ook `$addCourseTool = true` in:

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

## Instellingen per cursus

Definieer configuratievelden op cursusniveau via de eigenschap `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Deze verschijnen in het paneel met cursusinstellingen en kunnen worden gevalideerd door `validateCourseSetting(string $variable)` te overschrijven (geef `false` terug om een waarde te weigeren) of worden verwerkt via `course_settings_updated(array $values)`.

## Installatie en de-installatie

Om de pluginvelden bij installatie in alle bestaande cursussen te registreren:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Om in één enkele cursus te installeren (bijv. wanneer een nieuwe cursus wordt aangemaakt):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Om velden uit een specifieke cursus te verwijderen:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integratiepunten

Cursustool-plugins integreren via:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registreert de plugin als tool in de cursus
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Bepaalt welke tools (inclusief plugintools) op de startpagina van de cursus verschijnen
* De tool verschijnt in de `CTool`-collectie van de cursus

## Cursuscontext

Wanneer een cursist op de tool van uw plugin klikt, draait uw plugincode binnen de cursuscontext. U hebt toegang tot:

* De huidige cursus (via `api_get_course_id()` of de CID-request store)
* De huidige sessie (indien van toepassing)
* De huidige gebruiker
* Plugininstellingen op cursusniveau

## Voorbeelden

Ingebouwde cursustool-plugins:

* **BigBlueButton** (`Bbb/`) — Videoconferencing binnen cursussen
* **Zoom** (`Zoom/`) — Zoom-vergaderingen binnen cursussen
* **OnlyOffice** (`Onlyoffice/`) — Documentbewerking binnen cursussen