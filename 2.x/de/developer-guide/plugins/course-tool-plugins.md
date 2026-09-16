# Kurswerkzeug-Plugins

Kurswerkzeug-Plugins fügen der Kurs-Startseite neue Werkzeuge hinzu, neben den integrierten Werkzeugen wie Dokumente, Übungen und Foren.

## Funktionsweise von Kurswerkzeug-Plugins

Wenn sich ein Plugin als Kurswerkzeug registriert:

1. Erscheint es im Werkzeugraster der Kurs-Startseite
2. Lehrer können es wie jedes andere Werkzeug ein- oder ausblenden
3. Ein Klick auf das Werkzeug öffnet die Benutzeroberfläche des Plugins im Kontext des Kurses

## Registrierung als Kurswerkzeug

Setzen Sie in Ihrer Plugin-Klasse `$isCoursePlugin = true`. Um automatisch ein Werkzeugsymbol zur Kurs-Startseite hinzuzufügen, setzen Sie zusätzlich `$addCourseTool = true`:

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

## Kursspezifische Einstellungen

Definieren Sie Konfigurationsfelder auf Kursebene über die Eigenschaft `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Diese erscheinen im Einstellungsbereich des Kurses und können durch Überschreiben von `validateCourseSetting(string $variable)` validiert werden (geben Sie `false` zurück, um einen Wert abzulehnen) oder durch `course_settings_updated(array $values)` darauf reagiert werden.

## Installation und Deinstallation

Um die Plugin-Felder bei der Installation in allen bestehenden Kursen zu registrieren:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Um in einen einzelnen Kurs zu installieren (z. B. wenn ein neuer Kurs erstellt wird):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Um Felder aus einem bestimmten Kurs zu entfernen:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integrationspunkte

Kurswerkzeug-Plugins integrieren sich über:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registriert das Plugin als Werkzeug im Kurs
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Bestimmt, welche Werkzeuge (einschließlich Plugin-Werkzeuge) auf der Kurs-Startseite angezeigt werden
* Das Werkzeug erscheint in der `CTool`-Sammlung für den Kurs

## Kurskontext

Wenn ein Lernender auf das Werkzeug Ihres Plugins klickt, wird Ihr Plugin-Code im Kontext des Kurses ausgeführt. Sie können auf Folgendes zugreifen:

* Den aktuellen Kurs (über `api_get_course_id()` oder den CID-Request-Store)
* Die aktuelle Sitzung (falls zutreffend)
* Den aktuellen Benutzer
* Kursspezifische Plugin-Einstellungen

## Beispiele

Integrierte Kurswerkzeug-Plugins:

* **BigBlueButton** (`Bbb/`) — Videokonferenzen innerhalb von Kursen
* **Zoom** (`Zoom/`) — Zoom-Meetings innerhalb von Kursen
* **OnlyOffice** (`Onlyoffice/`) — Dokumentenbearbeitung innerhalb von Kursen