# Kursverktygsplugin

Kursverktygsplugin lägger till nya verktyg på kurssidan tillsammans med inbyggda verktyg som Dokument, Övningar och Forum.

## Så fungerar kursverktygsplugin

När ett plugin registrerar sig som ett kursverktyg:

1. Det visas i kurssidans verktygsrutnät
2. Lärare kan visa/dölja det precis som vilket annat verktyg som helst
3. Ett klick på verktyget öppnar pluginets gränssnitt i kurskontexten

## Registrera som kursverktyg

I din pluginklass sätter du `$isCoursePlugin = true`. För att automatiskt lägga till en verktygsikon på kurssidan sätter du även `$addCourseTool = true`:

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

## Inställningar per kurs

Definiera konfigurationsfält på kursnivå via egenskapen `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Dessa visas i kursinställningspanelen och kan valideras genom att åsidosätta `validateCourseSetting(string $variable)` (returnera `false` för att avvisa ett värde) eller hanteras via `course_settings_updated(array $values)`.

## Installation och avinstallation

För att registrera pluginfälten i alla befintliga kurser vid installation:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

För att installera i en enskild kurs (t.ex. när en ny kurs skapas):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

För att ta bort fält från en specifik kurs:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integrationspunkter

Kursverktygsplugin integreras via:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registrerar pluginet som ett verktyg i kursen
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Avgör vilka verktyg (inklusive pluginverktyg) som visas på kurssidan
* Verktyget visas i samlingen `CTool` för kursen

## Kurskontext

När en deltagare klickar på ditt plugins verktyg körs din pluginkod i kurskontexten. Du kan komma åt:

* Den aktuella kursen (via `api_get_course_id()` eller CID-request store)
* Den aktuella sessionen (om tillämpligt)
* Den aktuella användaren
* Plugininställningar på kursnivå

## Exempel

Inbyggda kursverktygsplugin:

* **BigBlueButton** (`Bbb/`) — Videokonferens i kurser
* **Zoom** (`Zoom/`) — Zoom-möten i kurser
* **OnlyOffice** (`Onlyoffice/`) — Dokumentredigering i kurser