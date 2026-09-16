# Plattformeinstellungen

Identität und Verhalten auf Plattformebene — Name der Einrichtung, Zeitzone, Registrierungsrichtlinie, Online-Benutzer, Leistungsflags.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Plattform**. Diese Kategorie enthält **29 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_my_files`

**Bereich „Meine Dateien“ aktivieren**

Erlaubt Benutzern, Dateien in einen persönlichen Bereich auf der Plattform hochzuladen.

*Standard: `true`*

### `chamilo_database_version`

**Aktuelle Version des von Chamilo verwendeten Datenbankschemas**

Zeigt die aktuelle DB-Version an, um sie mit der Chamilo-Kernversion abzugleichen.

### `cookie_warning`

**Cookie-Datenschutzhinweis**

Wenn aktiviert, zeigt diese Option oben auf Ihrer Plattform ein Banner an, das Benutzer auffordert zu bestätigen, dass die Plattform Cookies verwendet, die für die Bereitstellung der Benutzererfahrung erforderlich sind. Das Banner kann vom Benutzer leicht bestätigt und ausgeblendet werden. Damit kann Chamilo den EU-Vorschriften zu Web-Cookies entsprechen.

*Standard: `false`*

### `disable_copy_paste`

**Kopieren und Einfügen deaktivieren**

Wenn aktiviert, deaktiviert diese Option die Kopier-und-Einfüge-Mechanismen so weit wie möglich. Nützlich in restriktiven Prüfungsumgebungen.

*Standard: `false`*

### `donotlistcampus`

**Diesen Campus nicht auf chamilo.org auflisten**

Standardmäßig werden Chamilo-Portale automatisch in einer öffentlichen Liste auf chamilo.org registriert, wobei lediglich der Titel verwendet wird, den Sie diesem Portal gegeben haben (nicht die URL und keine privaten Daten). Aktivieren Sie dieses Kontrollkästchen, um zu verhindern, dass der Titel Ihres Portals erscheint.

*Standard: `false`*

### `generate_random_login`

**Zufälligen Benutzernamen erzeugen**

Beim Import von Benutzern (Stapelverarbeitung) automatisch eine Zufallszeichenfolge als Benutzernamen erzeugen. Andernfalls wird der Benutzername auf Basis von Vor- und Nachname oder dem Präfix der E-Mail-Adresse erzeugt.

*Standard: `false`*

### `hosting_limit_identical_email`

**Nutzung identischer E-Mail-Adressen begrenzen**

Maximale Anzahl von Konten, die dieselbe E-Mail-Adresse teilen dürfen. Auf 0 setzen, um dieses Limit zu deaktivieren.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Globales Limit von Benutzern pro Kurs**

Definiert eine globale Höchstzahl von Benutzern (einschließlich Lehrenden), die in einem einzelnen Kurs der Plattform eingeschrieben sein dürfen. Setzen Sie diesen Wert auf 0, um das Limit zu deaktivieren. Dies hilft, eine Überlastung von Kursen in offenen Portalen zu vermeiden.

*Standard: `0`*

### `institution`

**Name der Organisation**

Der Name der Organisation (erscheint im Header rechts)

*Standard: `Chamilo.org`*


### `institution_address`

**Adresse der Einrichtung**

Adresse

### `institution_url`

**URL der Organisation (Webadresse)**

Die URL der Einrichtungen (der Link, der im Header rechts erscheint)

*Standard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maximale Kurse pro Benutzer**

Maximale Anzahl von Kursen, die ein Lehrender/Trainer anlegen kann. Auf 0 setzen, um das Limit zu deaktivieren. Kann pro Benutzer über einen Kauf im BuyCourses-Dienst überschrieben werden.

*Standard: `0`*

### `notification_event`

**Benachrichtigungswerkzeug für einen wirkungsvolleren Kommunikationskanal mit Studierenden aktivieren**

Aktiviert Popup- oder Systembenachrichtigungen für wichtige Plattformereignisse.

*Standard: `false`*

### `pdf_img_dpi`

**Auflösung des PDF-Exports**

Dies entspricht der Auflösung der erzeugten PDF-Dateien (in Punkten pro Zoll bzw. dpi). Der Standardwert ist 96. Eine Erhöhung ergibt PDF-Dateien mit besserer Auflösung, erhöht aber auch die Dateigröße und die Erzeugungszeit.

*Standard: `96`*

### `platform_logo_url`

**URL für alternatives Plattformlogo**

Ersetzt das Chamilo-Logo durch das Laden einer (möglicherweise entfernten) URL. Stellen Sie sicher, dass dies durch Ihre Sicherheitsrichtlinien erlaubt ist.

*Standard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Erweitertes Teilen im Portfolio aktivieren**

Legen Sie fest, wer die Beiträge und Kommentare des Portfolios einsehen kann.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Beiträge des Basiskurses im Session-Kurs anzeigen**

Legen Sie fest, wer die Beiträge und Kommentare des Portfolios einsehen kann.

*Standard: `false`*

### `push_notification_settings`

**Einstellungen für Push-Benachrichtigungen (JSON)**

JSON-Konfiguration für die Integration von Push-Benachrichtigungen.

### `server_type`

**Servertyp**

Definiert den Umgebungstyp: „prod“ (normale Produktion), „validation“ (wie Produktion, jedoch ohne Statistikberichte) oder „test“ (Debug-Modus mit Entwicklerwerkzeugen wie Indikatoren für nicht übersetzte Zeichenketten).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Session-Administratoren erlauben, alle Benutzer auf allen URLs zu sehen**

Wenn aktiviert, können Session-Administratoren Benutzer von allen Zugriffs-URLs suchen und auflisten, unabhängig von ihrer aktuellen URL.

*Standard: `false`*

### `site_name`

**Name des E-Learning-Portals**

Der Name Ihres Chamilo-Portals (erscheint in der Kopfzeile)

*Default: `Chamilo site`*


### `timepicker_increment`

**Schrittweite des Timepickers**

Minimale Zeitschrittweite (in Minuten) bei der Auswahl von Datum und Uhrzeit mit dem Timepicker-Widget. Es kann beispielsweise wenig sinnvoll sein, bei Abgabefristen von Aufgaben, der Verfügbarkeit eines Tests, der Startzeit einer Session usw. kleinere Schritte als 5 oder 15 Minuten anzubieten.

*Default: `15`*

### `timezone`

**Standard-Zeitzone**

Wählen Sie die Standard-Zeitzone für dieses Portal. Damit wird die Zeitzone (sofern die Funktion aktiviert ist) für jeden neuen Benutzer bzw. für jeden Benutzer gesetzt, der noch keine eigene Zeitzone festgelegt hat. Zeitzonen sorgen dafür, dass alle zeitbezogenen Informationen auf dem Bildschirm in der jeweiligen Zeitzone des Benutzers angezeigt werden.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**UNO-Konverter-Binaries**

Geben Sie den Systempfad zur UNO-Konverter-Bibliothek an, um zusätzliche Exportfunktionen zu aktivieren.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Externe Karriere-ID in Diagrammen verwenden**

Wenn Karrierediagramme verwendet werden, ein zusätzliches Feld anstelle der internen Karriere-ID anzeigen.

*Default: `false`*

### `use_custom_pages`

**Benutzerdefinierte Seiten verwenden**

Aktivieren Sie diese Funktion, um rollenspezifische Anmeldeseiten zu konfigurieren

*Default: `false`*

### `use_virtual_keyboard`

**Virtuelle Tastatur verwenden**

Eine virtuelle Tastatur einblenden. Dies ist nützlich bei restriktiven Prüfungen in einem physischen Raum, in dem Studierende keine Tastatur haben, um Betrugsmöglichkeiten einzuschränken.

*Default: `false`*

### `user_status_show_option`

**Anzeigeoptionen für Rollen**

Ein Array aus Rolle => true/false, das festlegt, ob die jeweilige Rolle angezeigt oder ausgeblendet werden soll.

### `user_status_show_options_enabled`

**Selektive Anzeige von Rollen**

Aktivieren, um ein Array zu verwenden, das festlegt, welche Rollen klar angezeigt und welche ausgeblendet werden sollen.

*Default: `false`*