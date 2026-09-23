# Kursusværktøjsplugins

Kursusværktøjsplugins tilføjer nye værktøjer til kursets startside sammen med indbyggede værktøjer som Dokumenter, Øvelser og Fora.

## Sådan fungerer kursusværktøjsplugins

Når et plugin registrerer sig som et kursusværktøj:

1. Det vises i værktøjsgitteret på kursets startside
2. Undervisere kan vise/skjule det som ethvert andet værktøj
3. Når man klikker på værktøjet, åbnes pluginnets grænseflade i kursuskonteksten

## Registrering som kursusværktøj

I din plugin-klasse sættes `$isCoursePlugin = true`. For automatisk at tilføje et værktøjsikon til kursets startside sættes også `$addCourseTool = true`:

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

## Indstillinger pr. kursus

Definér konfigurationsfelter på kursusniveau via egenskaben `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Disse vises i panelet for kursusindstillinger og kan valideres ved at overskrive `validateCourseSetting(string $variable)` (returnér `false` for at afvise en værdi) eller håndteres via `course_settings_updated(array $values)`.

## Installation og afinstallation

For at registrere pluginfelterne i alle eksisterende kurser ved installation:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

For at installere i et enkelt kursus (f.eks. når et nyt kursus oprettes):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

For at fjerne felter fra et bestemt kursus:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integrationspunkter

Kursusværktøjsplugins integreres via:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registrerer pluginnet som et værktøj i kurset
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Afgør, hvilke værktøjer (herunder pluginværktøjer) der vises på kursets startside
* Værktøjet vises i `CTool`-samlingen for kurset

## Kursuskontekst

Når en kursist klikker på dit plugins værktøj, kører din plugin-kode i kursuskonteksten. Du kan tilgå:

* Det aktuelle kursus (via `api_get_course_id()` eller CID-request store)
* Den aktuelle session (hvis relevant)
* Den aktuelle bruger
* Pluginindstillinger på kursusniveau

## Eksempler

Indbyggede kursusværktøjsplugins:

* **BigBlueButton** (`Bbb/`) — Videokonference i kurser
* **Zoom** (`Zoom/`) — Zoom-møder i kurser
* **OnlyOffice** (`Onlyoffice/`) — Dokumentredigering i kurser