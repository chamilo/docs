# Cursus Tool Plugins

Cursus tool plugins voegen nieuwe tools toe aan de cursusstartpagina naast ingebouwde tools zoals Documenten, Oefeningen en Forums.

## Hoe Cursus Tool Plugins Werken

Wanneer een plugin zichzelf registreert als een cursus tool:

1. Verschijnt deze in het toolraster op de cursusstartpagina
2. Kunnen docenten deze weergeven of verbergen zoals elke andere tool
3. Door op de tool te klikken, wordt de interface van de plugin geopend binnen de cursuscontext

## Registreren als een Cursus Tool

Stel in je plugin-klasse `$isCoursePlugin = true` in. Om automatisch een toolpictogram toe te voegen aan de cursusstartpagina, stel ook `$addCourseTool = true` in:

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

## Instellingen per Cursus

Definieer configuratievelden op cursusniveau via de eigenschap `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Deze verschijnen in het cursusinstellingenpaneel en kunnen worden gevalideerd door `validateCourseSetting(string $variable)` te overschrijven (retourneer `false` om een waarde te weigeren) of door actie te ondernemen via `course_settings_updated(array $values)`.

## Installatie en De-installatie

Om de pluginvelden te registreren voor alle bestaande cursussen bij installatie:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Om te installeren in een enkele cursus (bijvoorbeeld wanneer een nieuwe cursus wordt aangemaakt):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Om velden uit een specifieke cursus te verwijderen:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integratiepunten

Cursus tool plugins integreren via:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registreert de plugin als een tool in de cursus
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Bepaalt welke tools (inclusief plugin tools) verschijnen op de cursusstartpagina
* De tool verschijnt in de `CTool`-collectie voor de cursus

## Cursuscontext

Wanneer een leerling op de tool van je plugin klikt, wordt je plug-incode uitgevoerd binnen de cursuscontext. Je hebt toegang tot:

* De huidige cursus (via `api_get_course_id()` of de CID request store)
* De huidige sessie (indien van toepassing)
* De huidige gebruiker
* Plugin-instellingen op cursusniveau

## Voorbeelden

Ingebouwde cursus tool plugins:

* **BigBlueButton** (`Bbb/`) — Videoconferenties binnen cursussen
* **Zoom** (`Zoom/`) — Zoom-vergaderingen binnen cursussen
* **OnlyOffice** (`Onlyoffice/`) — Documentbewerking binnen cursussen