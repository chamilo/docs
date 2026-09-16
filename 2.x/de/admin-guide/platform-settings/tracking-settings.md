# Tracking-Einstellungen

Standardwerte für das Tracking – was aufgezeichnet wird, welche Berichte verfügbar sind, Regeln zur Zeitberechnung.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Tracking** zu. Diese Kategorie enthält **10 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `block_my_progress_page`

**Zugriff auf 'Mein Fortschritt' verhindern**

In bestimmten Implementierungen wie Online-Prüfungen möchten Sie möglicherweise den Zugriff der Benutzer auf die Seite 'Mein Fortschritt' verhindern.

*Standard: `false`*

### `footer_extra_content`

**Zusätzlicher Inhalt im Footer**

Sie können HTML-Code wie Meta-Tags hinzufügen.

### `header_extra_content`

**Zusätzlicher Inhalt im Header**

Sie können HTML-Code wie Meta-Tags hinzufügen.

### `meta_description`

**Meta-Beschreibung**

Dies zeigt eine OpenGraph-Beschreibungs-Meta (og:description) in den Headern Ihrer Website an.

### `meta_image_path`

**Pfad zum Meta-Bild**

Dieser Meta-Bildpfad ist der Pfad zu einer Datei innerhalb Ihres Chamilo-Verzeichnisses (z. B. home/image.png), die in einer Twitter-Karte oder einer OpenGraph-Karte angezeigt werden soll, wenn ein Link zu Ihrem LMS geteilt wird. Twitter empfiehlt ein Bild von 120 x 120 Pixeln, das manchmal auf 120x90 zugeschnitten werden kann.

### `meta_title`

**OpenGraph-Meta-Titel**

Dies zeigt eine OpenGraph-Titel-Meta (og:title) in den Headern Ihrer Website an.

### `meta_twitter_creator`

**Twitter-Erstellerkonto**

Der Twitter-Ersteller ist ein Twitter-Konto (z. B. @ywarnier), das die *Person* repräsentiert, die die Website erstellt hat. Dieses Feld ist optional.

### `meta_twitter_site`

**Twitter-Website-Konto**

Die Twitter-Website ist ein Twitter-Konto (z. B. @chamilo_news), das mit Ihrer Website in Verbindung steht. Es ist in der Regel ein vorübergehenderes Konto als das Twitter-Erstellerkonto oder repräsentiert eine Entität (anstelle einer Person). Dieses Feld ist erforderlich, wenn die Meta-Felder der Twitter-Karte angezeigt werden sollen.

### `my_progress_course_tools_order`

**Reihenfolge der Tools auf der Seite 'Mein Fortschritt'**

Ändern Sie die Reihenfolge der Tools, die Lernenden auf der Seite 'Mein Fortschritt' angezeigt werden. Optionen umfassen 'quizzes', 'learning_paths' und 'skills'.

### `tracking_skip_generic_data`

**Generische Daten auf der Selbst-Tracking-Seite des Lernenden überspringen**

Wenn das Laden der Seite 'Mein Fortschritt' zu lange dauert, möchten Sie möglicherweise die Verarbeitung generischer Statistiken für den Benutzer entfernen. Aktivieren Sie in diesem Fall diese Einstellung.

*Standard: `false`*