# Tracking-Einstellungen

Tracking-bezogene Standardwerte — was aufgezeichnet wird, welche Berichte bereitgestellt werden, Regeln zur Zeitberechnung.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Tracking**. Diese Kategorie enthält **10 Einstellungen**, die nachfolgend mit Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `block_my_progress_page`

**Zugriff auf „Mein Fortschritt“ verhindern**

In speziellen Implementierungen wie Online-Prüfungen möchten Sie den Benutzerzugriff auf die Seite „Mein Fortschritt“ möglicherweise verhindern.

*Standard: `false`*

### `footer_extra_content`

**Zusätzlicher Inhalt in der Fußzeile**

Sie können HTML-Code wie Meta-Tags hinzufügen

### `header_extra_content`

**Zusätzlicher Inhalt in der Kopfzeile**

Sie können HTML-Code wie Meta-Tags hinzufügen

### `meta_description`

**Meta-Beschreibung**

Dies zeigt eine OpenGraph-Description-Meta (og:description) in den Headern Ihrer Website an

### `meta_image_path`

**Meta-Bildpfad**

Dieser Meta-Bildpfad ist der Pfad zu einer Datei in Ihrem Chamilo-Verzeichnis (z. B. home/image.png), die in einer Twitter-Karte oder einer OpenGraph-Karte angezeigt werden soll, wenn ein Link zu Ihrem LMS gezeigt wird. Twitter empfiehlt ein Bild von 120 × 120 Pixeln, das gelegentlich auf 120 × 90 zugeschnitten werden kann.

### `meta_title`

**OpenGraph-Meta-Titel**

Dies zeigt eine OpenGraph-Title-Meta (og:title) in den Headern Ihrer Website an

### `meta_twitter_creator`

**Twitter-Creator-Konto**

Der Twitter Creator ist ein Twitter-Konto (z. B. @ywarnier), das die *Person* repräsentiert, die die Website erstellt hat. Dieses Feld ist optional.

### `meta_twitter_site`

**Twitter-Site-Konto**

Die Twitter-Site ist ein Twitter-Konto (z. B. @chamilo_news), das mit Ihrer Website in Verbindung steht. Es handelt sich in der Regel um ein eher temporäres Konto als das Twitter-Creator-Konto oder repräsentiert eine Organisation (statt einer Person). Dieses Feld ist erforderlich, wenn die Twitter-Card-Meta-Felder angezeigt werden sollen.

### `my_progress_course_tools_order`

**Reihenfolge der Werkzeuge auf der Seite „Mein Fortschritt“**

Ändern Sie die Reihenfolge der Werkzeuge, die Lernenden auf der Seite „Mein Fortschritt“ angezeigt werden. Optionen umfassen „quizzes“, „learning_paths“ und „skills“.

### `tracking_skip_generic_data`

**Generische Daten auf der Selbst-Tracking-Seite der Lernenden überspringen**

Wenn das Laden der Seite „Mein Fortschritt“ zu lange dauert, möchten Sie möglicherweise die Verarbeitung generischer Statistiken für den Benutzer entfernen. Aktivieren Sie in diesem Fall diese Einstellung.

*Standard: `false`*