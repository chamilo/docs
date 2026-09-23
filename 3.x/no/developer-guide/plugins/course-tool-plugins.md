# Kursverktøy-plugins

Kursverktøy-plugins legger til nye verktøy på kursets hjemmeside sammen med innebygde verktøy som Dokumenter, Øvelser og Forum.

## Hvordan kursverktøy-plugins fungerer

Når en plugin registrerer seg som et kursverktøy:

1. Den vises i verktøyrutenettet på kursets hjemmeside
2. Lærere kan vise/skjule den som ethvert annet verktøy
3. Når man klikker på verktøyet, åpnes pluginens grensesnitt i kurskonteksten

## Registrering som kursverktøy

I plugin-klassen din setter du `$isCoursePlugin = true`. For automatisk å legge til et verktøyikon på kursets hjemmeside setter du også `$addCourseTool = true`:

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

## Innstillinger per kurs

Definer konfigurasjonsfelt på kursnivå via egenskapen `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Disse vises i panelet for kursinnstillinger og kan valideres ved å overstyre `validateCourseSetting(string $variable)` (returner `false` for å avvise en verdi) eller håndteres via `course_settings_updated(array $values)`.

## Installasjon og avinstallasjon

For å registrere plugin-feltene i alle eksisterende kurs ved installasjon:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

For å installere i et enkelt kurs (f.eks. når et nytt kurs opprettes):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

For å fjerne felt fra et bestemt kurs:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integrasjonspunkter

Kursverktøy-plugins integreres gjennom:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registrerer pluginen som et verktøy i kurset
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Avgjør hvilke verktøy (inkludert plugin-verktøy) som vises på kursets hjemmeside
* Verktøyet vises i `CTool`-samlingen for kurset

## Kurskontekst

Når en student klikker på pluginens verktøy, kjører plugin-koden din i kurskonteksten. Du kan få tilgang til:

* Det gjeldende kurset (via `api_get_course_id()` eller CID-forespørselslageret)
* Den gjeldende sesjonen (hvis aktuelt)
* Den gjeldende brukeren
* Plugin-innstillinger på kursnivå

## Eksempler

Innebygde kursverktøy-plugins:

* **BigBlueButton** (`Bbb/`) — Videokonferanse i kurs
* **Zoom** (`Zoom/`) — Zoom-møter i kurs
* **OnlyOffice** (`Onlyoffice/`) — Dokumentredigering i kurs