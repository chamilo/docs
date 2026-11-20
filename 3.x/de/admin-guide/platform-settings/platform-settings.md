# Plattform-Einstellungen

Identität und Verhalten auf Plattformebene — Name der Einrichtung, Zeitzone, Registrierungsrichtlinie, Online-Benutzer, Leistungsflags.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Plattform**. Diese Kategorie enthält **30 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_my_files`

**Bereich „Meine Dateien“ aktivieren**

Ermöglicht Benutzern, Dateien in einen persönlichen Bereich auf der Plattform hochzuladen.

*Standard: `true`*

### `chamilo_database_version`

**Aktuelle Version des von Chamilo verwendeten Datenbankschemas**

Zeigt die aktuelle DB-Version an, damit sie mit der Chamilo-Kernversion übereinstimmt.

### `cookie_warning`

**Cookie-Datenschutzhinweis**

Wenn diese Option aktiviert ist, wird oben auf Ihrer Plattform ein Banner angezeigt, das Benutzer auffordert zu bestätigen, dass die Plattform Cookies verwendet, die für die Benutzererfahrung erforderlich sind. Das Banner kann vom Benutzer leicht bestätigt und ausgeblendet werden. Dadurch kann Chamilo die EU-Vorschriften zu Web-Cookies einhalten.

*Standard: `false`*

### `disable_copy_paste`

**Kopieren und Einfügen deaktivieren**

Wenn diese Option aktiviert ist, werden die Mechanismen zum Kopieren und Einfügen so weit wie möglich deaktiviert. Nützlich bei restriktiven Prüfungskonfigurationen.

*Standard: `false`*

### `donotlistcampus`

**Diesen Campus nicht auf chamilo.org auflisten**

Standardmäßig werden Chamilo-Portale automatisch in einer öffentlichen Liste auf chamilo.org registriert, wobei nur der Titel verwendet wird, den Sie diesem Portal gegeben haben (nicht die URL und keine privaten Daten). Aktivieren Sie dieses Kontrollkästchen, um zu verhindern, dass der Titel Ihres Portals erscheint.

*Standard: `false`*

### `generate_random_login`

**Zufälligen Benutzernamen erzeugen**

Beim Importieren von Benutzern (Stapelprozesse) wird automatisch eine zufällige Zeichenfolge als Benutzername erzeugt. Andernfalls wird der Benutzername auf Grundlage von Vor- und Nachname oder dem Präfix der E-Mail-Adresse erzeugt.

*Standard: `false`*

### `hosting_limit_identical_email`

**Verwendung identischer E-Mail-Adressen begrenzen**

Maximale Anzahl von Konten, die dieselbe E-Mail-Adresse verwenden dürfen. Setzen Sie den Wert auf 0, um diese Begrenzung zu deaktivieren.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Globale Begrenzung der Benutzer pro Kurs**

Legt eine globale Höchstzahl von Benutzern (einschließlich Lehrkräften) fest, die in einem einzelnen Kurs der Plattform eingeschrieben sein dürfen. Setzen Sie diesen Wert auf 0, um die Begrenzung zu deaktivieren. Dies hilft zu vermeiden, dass Kurse in offenen Portalen überlastet werden.

*Standard: `0`*

### `institution`

**Name der Organisation**

Der Name der Organisation (erscheint in der Kopfzeile rechts)

*Standard: `Chamilo.org`*


### `institution_address`

**Adresse der Einrichtung**

Adresse

### `institution_url`

**URL der Organisation (Webadresse)**

Die URL der Einrichtungen (der Link, der in der Kopfzeile rechts erscheint)

*Standard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maximale Anzahl Kurse pro Benutzer**

Maximale Anzahl von Kursen, die eine Lehrkraft/ein Trainer erstellen kann. Setzen Sie den Wert auf 0, um die Begrenzung zu deaktivieren. Kann pro Benutzer über einen Kauf des Dienstes BuyCourses überschrieben werden.

*Standard: `0`*

### `notification_event`

**Benachrichtigungswerkzeug für einen wirkungsvolleren Kommunikationskanal mit Lernenden aktivieren**

Aktiviert Popup- oder Systembenachrichtigungen für wichtige Plattformereignisse.

*Standard: `false`*

### `pdf_img_dpi`

**Auflösung des PDF-Exports**

Dies bezeichnet die Auflösung der erzeugten PDF-Dateien (in Punkten pro Zoll bzw. dpi). Der Standardwert ist 96. Eine Erhöhung ergibt PDF-Dateien mit besserer Auflösung, erhöht jedoch auch die Dateigröße und die Erzeugungszeit.

*Standard: `96`*

### `platform_logo_url`

**URL für alternatives Plattformlogo**

Ersetzt das Chamilo-Logo durch Laden einer (möglicherweise entfernten) URL. Stellen Sie sicher, dass dies durch Ihre Sicherheitsrichtlinien zulässig ist.

*Standard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Erweiterte Freigabe des Portfolios aktivieren**

Legen Sie fest, wer die Beiträge und Kommentare des Portfolios anzeigen kann.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Beiträge des Basiskurses im Sitzungskurs anzeigen**

Legen Sie fest, wer die Beiträge und Kommentare des Portfolios anzeigen kann.

*Standard: `false`*

### `push_notification_settings`

**Einstellungen für Push-Benachrichtigungen (JSON)**

JSON-Konfiguration für die Integration von Push-Benachrichtigungen.

### `server_type`

**Servertyp**

Definiert den Umgebungstyp: „prod“ (normaler Produktivbetrieb), „validation“ (wie Produktion, jedoch ohne Statistikberichte) oder „test“ (Debug-Modus mit Entwicklerwerkzeugen wie Indikatoren für nicht übersetzte Zeichenfolgen).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Sitzungsadministratoren erlauben, alle Benutzer auf allen URLs zu sehen**

Wenn aktiviert, können Sitzungsadministratoren Benutzer von allen Zugriffs-URLs suchen und auflisten, unabhängig von ihrer aktuellen URL.

*Standard: `false`*

### `site_name`

**Name des E-Learning-Portals**

Der Name Ihres Chamilo-Portals (erscheint in der Kopfzeile)

*Standard: `Chamilo site`*


### `timepicker_increment`

**Schrittweite der Zeitauswahl**

Minimale Zeitschrittweite (in Minuten) bei der Auswahl von Datum und Uhrzeit mit dem Zeitauswahl-Widget. Beispielsweise ist es bei der Abgabe von Aufgaben, der Verfügbarkeit eines Tests, der Startzeit einer Sitzung usw. oft nicht sinnvoll, Schrittweiten unter 5 oder 15 Minuten zu verwenden.

*Standard: `15`*

### `timezone`

**Standardzeitzone**

Wählen Sie die Standardzeitzone für dieses Portal. Damit wird die Zeitzone (sofern die Funktion aktiviert ist) für jeden neuen Benutzer oder für Benutzer festgelegt, die noch keine eigene Zeitzone gesetzt haben. Zeitzonen sorgen dafür, dass alle zeitbezogenen Angaben auf dem Bildschirm in der jeweiligen Zeitzone des Benutzers angezeigt werden.

*Standard: `Europe/Paris`*


### `unoconv_binaries`

**UNO-Konverter-Binärdateien**

Geben Sie den Systempfad zur UNO-Konverterbibliothek an, um zusätzliche Exportfunktionen zu aktivieren.

*Standard: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Externe Karriere-ID in Diagrammen verwenden**

Wenn Karrierediagramme verwendet werden, wird anstelle der internen Karriere-ID ein zusätzliches Feld angezeigt.

*Standard: `false`*

### `use_custom_pages`

**Benutzerdefinierte Seiten verwenden**

Aktivieren Sie diese Funktion, um rollenspezifische Anmeldeseiten zu konfigurieren.

*Standard: `false`*

### `use_virtual_keyboard`

**Virtuelle Tastatur verwenden**

Lässt eine virtuelle Tastatur erscheinen. Dies ist nützlich bei restriktiven Prüfungen in einem physischen Raum, in dem Studierende keine Tastatur haben, um die Möglichkeit zum Betrug einzuschränken.

*Standard: `false`*

### `user_status_show_option`

**Anzeigeoptionen für Rollen**

Ein Array der Form Rolle => true/false, das festlegt, ob die jeweilige Rolle angezeigt oder ausgeblendet werden soll.

### `user_status_show_options_enabled`

**Selektive Anzeige von Rollen**

Aktivieren, um über ein Array festzulegen, welche Rollen deutlich angezeigt und welche ausgeblendet werden sollen.

*Standard: `false`*

### `personal_files_quota_mb`

**Meine Dateien: Gesamtspeicherkontingent pro Benutzer (MB)**

Maximale Gesamtgröße der persönlichen Dateien jedes Benutzers. Dieses Limit gilt nicht für Kursdokumente, Dropbox oder BuyCourses-Vorteile.

*Standard: `0` (unbegrenzt)*

Siehe [Speicherkontingente PR #9358](https://github.com/chamilo/chamilo-lms/pull/9358).