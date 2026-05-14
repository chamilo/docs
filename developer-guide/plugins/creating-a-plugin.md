# Ein Plugin erstellen

Dieser Leitfaden führt durch die Erstellung eines einfachen Chamilo-Plugins. Für weitere Details siehe die [Plugin-Entwicklung Wiki-Seite](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Schritt 1: Plugin-Verzeichnis erstellen

Erstellen Sie ein Verzeichnis in `public/plugin/`. Der Verzeichnisname sollte mit dem Identifikator Ihres Plugins übereinstimmen:

```
public/plugin/MyPlugin/
```

## Schritt 2: Plugin-Klasse definieren

Erstellen Sie `src/MyPluginPlugin.php`. Die Klasse erweitert `Plugin` und folgt dem Singleton-Muster:

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

### Verfügbare Einstellungstypen

| Typ        | Beschreibung                |
|------------|-----------------------------|
| `boolean`  | Kontrollkästchen an/aus     |
| `text`     | Einzeiliges Texteingabefeld |
| `select`   | Dropdown (Array `options` bereitstellen) |
| `wysiwyg`  | Rich-Text-Editor            |
| `html`     | Rohes HTML-Feld             |
| `checkbox` | Kontrollkästchen            |
| `user`     | Benutzerauswahl             |

Für `select`-Einstellungen:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Zugriff auf Einstellungen zur Laufzeit:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // einzelner Wert
$all  = $plugin->get_settings();       // alle Einstellungen
```

## Schritt 3: plugin.php erstellen

`plugin.php` im Plugin-Stammverzeichnis ist **erforderlich**. Es muss `$plugin_info` zuweisen:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Schritt 4: Installations- und Deinstallationsskripte erstellen

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

Implementieren Sie die tatsächliche Schema-Erstellung/-Löschung innerhalb der Klasse mit Doctrine's `SchemaTool`.

## Schritt 5: Übersetzungen hinzufügen

Erstellen Sie Sprachdateien in `lang/` unter Verwendung von Lokalisierungscodes (z. B. `en_US.php`, `fr_FR.php`, `es_ES.php`). Die Standarddatei ist `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Zugriff auf Übersetzungen über `$plugin->get_lang('key')`.

## Schritt 6: Inhalte über Anzeigebereiche einfügen

Plugins können HTML in 18 vordefinierte Bereiche des Vue-Frontends einfügen. Überschreiben Sie `renderRegion()` in Ihrer Klasse:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Verfügbare Bereiche umfassen: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Schritt 7: Auf Plattformereignisse reagieren (optional)

Plugins können auf Plattformereignisse mit Symfony-Event-Subscribern reagieren. Erstellen Sie eine Datei, die auf `EventSubscriber.php` endet, in `src/EventSubscriber/` — sie wird automatisch über `PluginEventSubscriberPass` registriert.

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
        // Plugin-Klassen sind keine Symfony-Dienste — verwenden Sie das create()-Singleton.
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
        // Ihre Logik hier
    }
}
```

Eine vollständige Liste der verfügbaren Ereignisse (Benutzer, Kurs, Sitzung, LP, Übung, Portfolio, Authentifizierung und mehr) finden Sie in `src/CoreBundle/Event/Events.php`.

## Schritt 8: Lifecycle-Hooks

Überschreiben Sie diese Methoden in Ihrer Plugin-Klasse, um auf Plattformaktionen zu reagieren:

| Methode | Ausgelöst, wenn |
|--------|----------------|
| `install()` | Plugin wird aktiviert |
| `uninstall()` | Plugin wird entfernt |
| `performActionsAfterConfigure()` | Administrator speichert das Konfigurationsformular |
| `course_settings_updated(array $values)` | Einstellungen auf Kursebene ändern sich |
| `validateCourseSetting(string $variable)` | Kurseinstellung wird gespeichert (geben Sie `false` zurück, um abzulehnen) |
| `doWhenDeletingUser(int $userId)` | Ein Benutzer wird gelöscht |
| `doWhenDeletingCourse(int $courseId)` | Ein Kurs wird gelöscht |
| `doWhenDeletingSession(int $sessionId)` | Eine Sitzung wird gelöscht |

## Schritt 9: Aktivieren

Melden Sie sich als Administrator an, navigieren Sie zu **Plugins verwalten**, suchen Sie Ihr Plugin und klicken Sie auf **Aktivieren**.

## Tipps

* **Folgen Sie bestehenden Plugins als Beispiele** — `public/plugin/HelloWorld/` und `public/plugin/TopLinks/` sind gute einfache Referenzen
* **Verwenden Sie Übersetzungen** — Nutzen Sie immer das `lang/`-System für benutzerorientierte Texte
* **Aufräumen bei Deinstallation** — Entfernen Sie Datenbanktabellen und Einstellungen im Deinstallationsskript
* **Überprüfen Sie den Aktivierungsstatus** — Rufen Sie in Event-Subscribern immer `$this->plugin->isEnabled()` auf, bevor Sie Logik ausführen