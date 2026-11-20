# Tracking-Einstellungen

Tracking-bezogene Standardwerte — was aufgezeichnet wird, welche Berichte bereitgestellt werden und welche Regeln für die Zeitberechnung gelten.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Tracking**. Diese Kategorie enthält **14 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `block_my_progress_page`

**Zugriff auf „Mein Fortschritt“ verhindern**

In bestimmten Implementierungen wie Online-Prüfungen möchten Sie möglicherweise den Benutzerzugriff auf die Seite „Mein Fortschritt“ verhindern.

*Standard: `false`*

### `footer_extra_content`

**Zusätzlicher Inhalt in der Fußzeile**

Sie können HTML-Code wie Meta-Tags hinzufügen

### `header_extra_content`

**Zusätzlicher Inhalt in der Kopfzeile**

Sie können HTML-Code wie Meta-Tags hinzufügen

### `meta_description`

**Meta-Beschreibung**

Dies zeigt eine OpenGraph-Beschreibungs-Meta (og:description) in den Kopfzeilen Ihrer Website an

### `meta_image_path`

**Pfad zum Meta-Bild**

Dieser Pfad zum Meta-Bild ist der Pfad zu einer Datei innerhalb Ihres Chamilo-Verzeichnisses (z. B. home/image.png), die in einer Twitter-Karte oder einer OpenGraph-Karte angezeigt werden soll, wenn ein Link zu Ihrem LMS gezeigt wird. Twitter empfiehlt ein Bild von 120 × 120 Pixeln, das manchmal auf 120×90 zugeschnitten werden kann.

### `meta_title`

**OpenGraph-Meta-Titel**

Dies zeigt eine OpenGraph-Titel-Meta (og:title) in den Kopfzeilen Ihrer Website an

### `meta_twitter_creator`

**Twitter-Creator-Konto**

Der Twitter Creator ist ein Twitter-Konto (z. B. @ywarnier), das die *Person* repräsentiert, die die Website erstellt hat. Dieses Feld ist optional.

### `meta_twitter_site`

**Twitter-Site-Konto**

Die Twitter-Site ist ein Twitter-Konto (z. B. @chamilo_news), das mit Ihrer Website verbunden ist. Es ist in der Regel ein eher temporäres Konto als das Twitter-Creator-Konto oder repräsentiert eine Organisation (anstelle einer Person). Dieses Feld ist erforderlich, wenn die Meta-Felder der Twitter-Karte angezeigt werden sollen.

### `my_progress_course_tools_order`

**Reihenfolge der Werkzeuge auf der Seite „Mein Fortschritt“**

Ändern Sie die Reihenfolge der Werkzeuge, die Lernenden auf der Seite „Mein Fortschritt“ angezeigt werden. Zu den Optionen gehören 'quizzes', 'learning_paths' und 'skills'.

### `tracking_skip_generic_data`

**Generische Daten auf der Selbst-Tracking-Seite für Lernende überspringen**

Wenn das Laden der Seite „Mein Fortschritt“ zu lange dauert, möchten Sie möglicherweise die Verarbeitung generischer Statistiken für den Benutzer entfernen. Aktivieren Sie in diesem Fall diese Einstellung.

*Standard: `false`*

### `hide_ip_address`

**IP-Adresse in Berichten ausblenden**

IP-Adressen in visuellen Berichten und Berichtsexporten ausblenden. Die Einstellung ist standardmäßig aktiviert; das Ausblenden von Werten in Berichten löscht bereits gespeicherte IP-Adressen nicht und verhindert den Zugriff über autorisierte Verfahren für personenbezogene Daten nicht.

*Standard: `true`*

Siehe [IP-Sichtbarkeit PR #9312](https://github.com/chamilo/chamilo-lms/pull/9312).

### `maximum_inactive_time_to_consider`

**Maximale zu berücksichtigende Inaktivitätszeit (Minuten)**

Eine geöffnete Kursseite kann automatische Anfragen erzeugen. Nach diesem Intervall ohne eine bedeutsame Benutzeraktion trägt der Zeitraum nicht mehr zur erfassten Kursaktivitätszeit bei. Dies ist eine Berichtsregel, kein automatischer Abmeldemechanismus.

*Standard: `15` Minuten*

### `max_time_spent_per_session_threshold`

**Schwellenwert für die maximale Zeit pro Sitzung (Minuten)**

Begrenzt den Anteil einer einzelnen Anmeldesitzung, der in Berichten als Aktivität gezählt wird, damit eine außergewöhnlich lange offene Sitzung die Gesamtstudienzeit nicht aufbläht. Separate Anmeldesitzungen können weiterhin zur Gesamtzeit beitragen. Dies beendet keine Lernendensitzung.

*Standard: `360` Minuten*

Siehe [Sitzungszeit-Obergrenze PR #9445](https://github.com/chamilo/chamilo-lms/pull/9445).

### `recycle_bin_retention_hours`

**Aufbewahrung im Papierkorb (Stunden)**

Mindestalter gelöschter Übungsversuche und des Lernpfad-Fortschritts, bevor eine dauerhafte Bereinigung zulässig ist. Der Bereinigungsbefehl `chamilo:recycle-bin:purge` zeigt standardmäßig eine Vorschau an; die dauerhafte Bereinigung erfordert `--execute`. Die Einstellung plant nicht von selbst eine automatische Bereinigung.

*Standard: `720` Stunden (30 Tage)*

Siehe [Papierkörbe für Übungen und Lernpfade PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).