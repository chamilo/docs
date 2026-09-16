# Plattformeinstellungen

Plattformweite Identität und Verhalten — Name der Institution, Zeitzone, Registrierungsrichtlinie, Online-Benutzer, Leistungsflags.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Plattform** zu. Diese Kategorie enthält **29 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungsfixtures (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_my_files`

**Abschnitt 'Meine Dateien' aktivieren**

Ermöglicht Benutzern, Dateien in einen persönlichen Bereich auf der Plattform hochzuladen.

*Standard: `true`*

### `chamilo_database_version`

**Aktuelle Version des Datenbankschemas, das von Chamilo verwendet wird**

Zeigt die aktuelle Datenbankversion an, die mit der Chamilo-Core-Version übereinstimmt.

### `cookie_warning`

**Datenschutzhinweis zu Cookies**

Wenn aktiviert, zeigt diese Option ein Banner oben auf Ihrer Plattform an, das Benutzer auffordert, zu bestätigen, dass die Plattform Cookies verwendet, die für die Benutzererfahrung notwendig sind. Das Banner kann vom Benutzer leicht bestätigt und ausgeblendet werden. Dies ermöglicht Chamilo, den EU-Vorschriften zu Web-Cookies zu entsprechen.

*Standard: `false`*

### `disable_copy_paste`

**Kopieren und Einfügen deaktivieren**

Wenn aktiviert, deaktiviert diese Option so weit wie möglich die Mechanismen zum Kopieren und Einfügen. Nützlich bei restriktiven Prüfungssituationen.

*Standard: `false`*

### `donotlistcampus`

**Diesen Campus nicht auf chamilo.org auflisten**

Standardmäßig werden Chamilo-Portale automatisch in einer öffentlichen Liste auf chamilo.org registriert, wobei nur der Titel verwendet wird, den Sie diesem Portal gegeben haben (nicht die URL oder private Daten). Aktivieren Sie dieses Kontrollkästchen, um zu verhindern, dass der Titel Ihres Portals angezeigt wird.

*Standard: `false`*

### `generate_random_login`

**Zufälligen Benutzernamen generieren**

Beim Importieren von Benutzern (Stapelprozesse) wird automatisch eine zufällige Zeichenfolge für den Benutzernamen generiert. Andernfalls wird der Benutzername auf Basis des Vor- und Nachnamens oder des Präfixes der E-Mail-Adresse erstellt.

*Standard: `false`*

### `hosting_limit_identical_email`

**Verwendung identischer E-Mail-Adressen begrenzen**

Maximale Anzahl von Konten, die dieselbe E-Mail-Adresse teilen dürfen. Setzen Sie den Wert auf 0, um diese Begrenzung zu deaktivieren.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Globale Begrenzung der Benutzer pro Kurs**

Definiert eine globale maximale Anzahl von Benutzern (einschließlich Lehrkräften), die sich für einen einzelnen Kurs auf der Plattform anmelden dürfen. Setzen Sie diesen Wert auf 0, um die Begrenzung zu deaktivieren. Dies hilft, eine Überlastung von Kursen in offenen Portalen zu vermeiden.

*Standard: `0`*

### `institution`

**Name der Organisation**

Der Name der Organisation (erscheint im Header rechts)

*Standard: `Chamilo.org`*

### `institution_address`

**Adresse der Institution**

Adresse

### `institution_url`

**URL der Organisation (Webadresse)**

Die URL der Institution (der Link, der im Header rechts erscheint)

*Standard: `http://www.chamilo.org`*

### `max_courses_per_user`

**Maximale Kurse pro Benutzer**

Maximale Anzahl von Kursen, die ein Lehrer/Trainer erstellen kann. Setzen Sie den Wert auf 0, um die Begrenzung zu deaktivieren. Kann pro Benutzer durch den Kauf eines BuyCourses-Dienstes überschrieben werden.

*Standard: `0`*

### `notification_event`

**Benachrichtigungstool für einen wirkungsvolleren Kommunikationskanal mit Studierenden aktivieren**

Aktiviert Popup- oder Systembenachrichtigungen für wichtige Plattformereignisse.

*Standard: `false`*

### `pdf_img_dpi`

**Auflösung beim PDF-Export**

Dies stellt die Auflösung der generierten PDF-Dateien dar (in Punkten pro Zoll, oder dpi). Der Standardwert ist 96. Eine Erhöhung führt zu PDF-Dateien mit besserer Auflösung, erhöht jedoch auch das Gewicht und die Generierungszeit der Dateien.

*Standard: `96`*

### `platform_logo_url`

**URL für alternatives Plattform-Logo**

Ersetzt das Chamilo-Logo durch das Laden einer (möglicherweise entfernten) URL. Stellen Sie sicher, dass dies durch Ihre Sicherheitsrichtlinien erlaubt ist.

*Standard: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Erweiterte Freigabe im Portfolio aktivieren**

Entscheiden Sie, wer die Beiträge und Kommentare im Portfolio sehen kann.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Beiträge des Basiskurses im Sitzungskurs anzeigen**

Entscheiden Sie, wer die Beiträge und Kommentare im Portfolio sehen kann.

*Standard: `false`*

### `push_notification_settings`

**Einstellungen für Push-Benachrichtigungen (JSON)**

JSON-Konfiguration für die Integration von Push-Benachrichtigungen.

### `server_type`

**Servertyp**

Definiert den Umgebungstyp: "prod" (normale Produktion), "validation" (wie Produktion, aber ohne Statistikberichte) oder "test" (Debug-Modus mit Entwicklerwerkzeugen wie Indikatoren für nicht übersetzte Zeichenfolgen).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Sitzungsadministratoren erlauben, alle Benutzer auf allen URLs zu sehen**

Wenn aktiviert, können Sitzungsadministratoren Benutzer von allen Zugriffs-URLs suchen und auflisten, unabhängig von ihrer aktuellen URL.

*Standard: `false`*

---
### `site_name`

**Name des E-Learning-Portals**

Der Name Ihres Chamilo-Portals (erscheint im Header)

*Standard: `Chamilo site`*

### `timepicker_increment`

**Zeitwähler-Inkrement**

Minimales Zeitinkrement (in Minuten) bei der Auswahl eines Datums und einer Uhrzeit mit dem Zeitwähler-Widget. Zum Beispiel könnte es nicht sinnvoll sein, weniger als 5 oder 15 Minuten Inkrement zu haben, wenn es um die Abgabe von Aufgaben, die Verfügbarkeit eines Tests, die Startzeit einer Sitzung usw. geht.

*Standard: `15`*

### `timezone`

**Standardzeitzone**

Wählen Sie die Standardzeitzone für dieses Portal aus. Dies hilft, die Zeitzone (falls die Funktion aktiviert ist) für jeden neuen Benutzer oder für jeden Benutzer, der noch keine spezifische Zeitzone eingestellt hat, festzulegen. Zeitzonen helfen dabei, alle zeitbezogenen Informationen auf dem Bildschirm in der spezifischen Zeitzone jedes Benutzers anzuzeigen.

*Standard: `Europe/Paris`*

### `unoconv_binaries`

**UNO-Konverter-Binärdateien**

Geben Sie den Systempfad zur UNO-Konverter-Bibliothek an, um einige zusätzliche Exportfunktionen zu aktivieren.

*Standard: `/usr/bin/unoconv`*

### `use_career_external_id_as_identifier_in_diagrams`

**Externe Karriere-ID in Diagrammen verwenden**

Falls Karrierediagramme verwendet werden, wird ein zusätzliches Feld anstelle der internen Karriere-ID angezeigt.

*Standard: `false`*

### `use_custom_pages`

**Benutzerdefinierte Seiten verwenden**

Aktivieren Sie diese Funktion, um spezifische Login-Seiten nach Rolle zu konfigurieren.

*Standard: `false`*

### `use_virtual_keyboard`

**Virtuelle Tastatur verwenden**

Lassen Sie eine virtuelle Tastatur erscheinen. Dies ist nützlich, wenn restriktive Prüfungen in einem physischen Raum eingerichtet werden, in dem die Studierenden keine Tastatur haben, um ihre Möglichkeit zu schummeln einzuschränken.

*Standard: `false`*

### `user_status_show_option`

**Anzeigeoptionen für Rollen**

Ein Array von Rolle => true/false, das definiert, ob diese Rolle angezeigt oder ausgeblendet werden soll.

### `user_status_show_options_enabled`

**Selektive Anzeige von Rollen**

Aktivieren Sie diese Option, um ein Array zu verwenden, das definiert, welche Rollen deutlich angezeigt und welche ausgeblendet werden sollen.

*Standard: `false`*