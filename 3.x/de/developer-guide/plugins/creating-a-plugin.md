# Ein Plugin erstellen

Diese Anleitung führt Sie durch die Erstellung eines einfachen Chamilo-Plugins. Weitere Details finden Sie auf der [Wiki-Seite zur Plugin-Entwicklung](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Schritt 1: Das Plugin-Verzeichnis anlegen

Legen Sie ein Verzeichnis in `public/plugin/` an. Der Verzeichnisname sollte mit dem Bezeichner Ihres Plugins übereinstimmen:

```
public/plugin/MyPlugin/
```

## Schritt 2: Die Plugin-Klasse definieren

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

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

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

Einstellungen zur Laufzeit abrufen:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
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

Implementieren Sie die eigentliche Schema-Erstellung bzw. -Löschung in der Klasse mithilfe von Doctrines `SchemaTool`.

## Schritt 5: Übersetzungen hinzufügen

Erstellen Sie Sprachdateien in `lang/` mit Locale-Codes (z. B. `en_US.php`, `fr_FR.php`, `es.php`). Die Rückfallebene ist `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Übersetzungen über `$plugin->get_lang('key')` abrufen.

## Schritt 6: Inhalte über Anzeigebereiche (Display Regions) einfügen

Plugins können HTML in 18 vordefinierte Bereiche der Oberfläche einfügen. Welcher Mechanismus einen Bereich rendert, hängt vom jeweiligen Bereich ab:

* **`course_tool_plugin`** ist der einzige Bereich, der durch Überschreiben von `renderRegion(string $region): string` in Ihrer Plugin-Klasse gerendert wird. Er wird (über `PluginRegionController`) nur für ein kursbezogenes Plugin (`is_course_plugin`) aufgerufen, während eine Kursseite geöffnet ist:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **Die 16 allgemeinen Bereiche** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — werden gerendert, indem die eigene `index.php` des Plugins eingebunden wird, nicht über `renderRegion()`. Das Framework setzt `$plugin_info['current_region']`, bevor diese Datei eingebunden wird, sodass sie entweder HTML für diesen Bereich direkt per `echo` ausgeben oder Twig-Templates über `$plugin_info['templates']` deklarieren kann:

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

  `public/plugin/HelloWorld/index.php` ist ein vollständiges funktionierendes Beispiel — HelloWorld überschreibt `renderRegion()` überhaupt nicht; jeder Bereich, den es füllt, läuft über `index.php`.

* **`menu_administrator`** ist ein Sonderfall, der für ausschließlich administrative Links im klassischen Administrations-Dashboard reserviert ist, nicht für die beiden oben genannten Mechanismen. `Dashboard` und `CleanDeletedFiles` sind echte Plugins, die ihn nutzen.

Unabhängig vom verwendeten Mechanismus muss ein Administrator die Region(en) für Ihr Plugin weiterhin über die Schaltfläche **Regions** neben dem Plugin auf der Seite **Manage plugins** aktivieren (siehe [Schritt 9](#step-9-activate)) — ein Plugin rendert in einer Region nichts, die dort nicht ausdrücklich aktiviert wurde.

## Schritt 7: Auf Plattformereignisse reagieren (optional)

Plugins können über Symfony-Event-Subscriber auf Plattformereignisse reagieren. Legen Sie eine Datei mit der Endung `EventSubscriber.php` in `src/EventSubscriber/` an — sie wird über `PluginEventSubscriberPass` automatisch registriert.

Zwei Voraussetzungen, sonst wird der Subscriber stillschweigend übersprungen: Die Klasse muss im **globalen Namensraum** liegen (der Pass löst sie aus dem Dateinamen auf), und nach dem Hinzufügen müssen Sie `composer dump-autoload` ausführen (`public/plugin` ist ein Classmap-Eintrag). Prüfen Sie das Ergebnis mit `php bin/console debug:event-dispatcher <event.name>`.

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

Die vollständige Liste der verfügbaren Ereignisse (Benutzer, Kurs, Session, LP, Übung, Portfolio, Authentifizierung und mehr) finden Sie in `src/CoreBundle/Event/Events.php`.

### Aufräumen, wenn ein Kurs, eine Session oder ein Benutzer gelöscht wird

Wenn Ihr Plugin Zeilen speichert, die über einen Kurs, eine Session oder einen Benutzer indiziert sind, abonnieren Sie `Events::COURSE_DELETED`, `Events::SESSION_DELETED` oder `Events::USER_DELETED`. Das ist der einzige Weg zum Aufräumen — die alten `doWhenDeleting*`-Methoden existieren nicht mehr. Für diese Listener gelten drei Regeln:

* **Auf `AbstractEvent::TYPE_PRE` reagieren** — das Ereignis wird ausgelöst, bevor die Zeile entfernt wird, der einzige Moment, in dem Ihr Fremdschlüssel noch auflösbar und die Daten noch lesbar sind. `USER_DELETED` wird auch als `TYPE_POST` ausgelöst, daher ist die Prüfung dort nicht optional.
* **Auf installiert prüfen, nicht auf aktiviert** — verwenden Sie `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Ihre Zeilen überleben die Deaktivierung des Plugins oder die Aktivierung nur auf einer anderen Zugriffs-URL, und ihr Fremdschlüssel blockiert die Löschung in beiden Fällen.
* **Bei `USER_DELETED` `$event->isHardDelete()` prüfen** — eine Soft-Löschung lässt den Benutzer wiederherstellbar, daher müssen seine Daten erhalten bleiben.

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

Das Plugin `StudentFollowUp` ist die Referenz für Benutzer; `Bbb`, `BuyCourses` und `EmbedRegistry` enthalten die Entsprechungen für Kurs und Session.

## Schritt 8: Lebenszyklus-Hooks

Überschreiben Sie diese Methoden in Ihrer Plugin-Klasse, um auf Plattformaktionen zu reagieren:

| Methode | Ausgelöst, wenn |
|--------|----------------|
| `install()` | Plugin wird aktiviert |
| `uninstall()` | Plugin wird entfernt |
| `performActionsAfterConfigure()` | Administrator speichert das Konfigurationsformular |
| `course_settings_updated(array $values)` | Kursbezogene Einstellungen ändern sich |
| `validateCourseSetting(string $variable)` | Kurseinstellung gespeichert (geben Sie `false` zurück, um abzulehnen) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` und `doWhenDeletingSession()` wurden entfernt, ebenso der Trigger `AppPlugin::performActionsWhenDeletingItem()`, der sie aufrief — ein Überschreiben bewirkt jetzt nichts. Verwenden Sie stattdessen die Löschereignisse aus [Schritt 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Schritt 9: Aktivieren

Melden Sie sich als Administrator an und navigieren Sie im Administrations-Dashboard zum Block **Plattform**, dann zu **Plugins** — damit öffnet sich die Seite **Plugins verwalten**. Suchen Sie Ihr Plugin und klicken Sie auf **Installieren**; nach der Installation klicken Sie auf **Aktivieren**, um es zu aktivieren (ein aktiviertes Plugin zeigt stattdessen eine Schaltfläche **Deaktivieren**).

## Tipps

* **Bestehende Plugins als Beispiele nutzen** — `public/plugin/HelloWorld/` und `public/plugin/TopLinks/` sind gute, einfache Referenzen
* **Übersetzungen verwenden** — Verwenden Sie für benutzerseitigen Text stets das System `lang/`
* **Beim Deinstallieren aufräumen** — Entfernen Sie Datenbanktabellen und Einstellungen im Deinstallationsskript
* **Aktivierungsstatus prüfen** — Rufen Sie in Event-Subscribern `$this->plugin->isEnabled()` auf, bevor Sie Logik ausführen. Ausnahme ist das Aufräumen beim Löschen: prüfen Sie auf installiert, da die Zeilen die Deaktivierung des Plugins überdauern