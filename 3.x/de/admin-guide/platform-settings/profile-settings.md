# Benutzerprofileinstellungen

Welche Felder im Benutzerprofil erscheinen, welche der Benutzer bearbeiten kann, und zugehörige Einstellungen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Benutzerprofil**. Diese Kategorie enthält **29 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `account_valid_duration`

**Kontogültigkeit**

Ein Benutzerkonto ist für diese Anzahl von Tagen nach der Erstellung gültig

*Standard: `3660`*


### `add_user_course_information_in_mailto`

**E-Mail mit Benutzer- und Kursinformationen im Fußzeilenkontakt vorausfüllen**

Betreff und Textkörper in den mailto:-Link der Fußzeile einfügen.

*Standard: `false`*


### `allow_show_linkedin_url`

**Anzeige der LinkedIn-URL des Benutzers zulassen**

Einen Link im sozialen Block des Benutzers hinzufügen, der den Besuch des LinkedIn-Profils des Benutzers ermöglicht

### `allow_show_skype_account`

**Anzeige des Skype-Kontos des Benutzers zulassen**

Einen Link im sozialen Block des Benutzers hinzufügen, der den Start eines Chats über Skype ermöglicht

### `allow_social_map_fields`

**Benutzer-Geolokalisierung auf einer Karte**

Anzeige einer Karte im sozialen Netzwerk aktivieren, mit der andere Benutzer lokalisiert werden können. Dies umfasst mehrere Positionen (aktuell und Ziel), die als Adressen oder Koordinaten in separaten Extrafeldern definiert werden müssen. Die Extrafelder müssen hier als Array angegeben werden.

### `allow_teachers_to_classes`

**Lehrenden die Verwaltung von Klassen erlauben**

Ermöglicht Lehrenden, Klassengruppen und deren Mitgliedschaft im System zu verwalten.

*Standard: `false`*


### `allow_user_headings`

**Benutzerprofilierung innerhalb von Kursen zulassen**

Kann ein Lehrender Lernenden-Profilfelder definieren, um zusätzliche Informationen zu erfassen?

### `allow_users_to_change_email_with_no_password`

**Benutzern das Ändern der E-Mail ohne Passwort erlauben**

Beim Ändern der Kontoinformationen

*Standard: `false`*

### `changeable_options`

**Felder, die Benutzer in ihrem Profil ändern dürfen**

Wählen Sie die Felder aus, die Benutzer auf ihrer Profilseite ändern können.


### `enable_profile_user_address_geolocalization`

**Geolokalisierung des Benutzers aktivieren**

Adressfeld des Benutzers aktivieren und auf einer Karte mittels Geolokalisierungsfunktionen anzeigen

### `extended_profile`

**Portfolio**

Wenn diese Einstellung aktiviert ist, kann ein Benutzer die folgenden (optionalen) Felder ausfüllen: „Mein persönlicher offener Bereich“, „Meine Kompetenzen“, „Meine Diplome“, „Was ich unterrichten kann“

*Standard: `false`*

### `hide_username_in_course_chat`

**Benutzername im Kurschat ausblenden**

Im Kurschat den Benutzernamen ausblenden. Nur die Namen der Personen anzeigen.

*Standard: `false`*


### `hide_username_with_complete_name`

**Benutzername ausblenden, wenn bereits der vollständige Name angezeigt wird**

Einige interne Funktionen geben den Benutzernamen zurück, wenn sie den vollständigen Namen des Benutzers zurückgeben. Mit dieser Option stellen Sie sicher, dass der Benutzername nicht erscheint.

*Standard: `false`*


### `linkedin_organization_id`

**LinkedIn-Organisations-ID**

Beim Teilen eines Abzeichens auf LinkedIn ermöglicht LinkedIn die Angabe einer Organisations-ID, die auf die LinkedIn-Seite Ihrer Organisation verweist (um die Organisation zu verknüpfen, die das Abzeichen vergibt).

*Standard: `false`*


### `login_is_email`

**E-Mail als Benutzername verwenden**

Die E-Mail verwenden, um sich am System anzumelden

*Standard: `false`*

### `my_space_users_items_per_page`

**Standardanzahl der Einträge pro Seite in mySpace**

Anzahl der Datensätze, die pro Seite in den Tracking-Bereichen von MySpace angezeigt werden (Benutzer, Arbeitsstatistiken, Studierendenliste).

*Standard: `10`*


### `pass_reminder_custom_link`

**Benutzerdefinierte Seite für die Passworterinnerung**

Legen Sie Ihre eigene URL zu einer Seite zum Zurücksetzen des Passworts fest. Nützlich bei Verwendung eines föderierten Kontoverwaltungssystems.

### `profile_fields_visibility`

**Auf der Profilseite sichtbare Felder**

Array von Feldern und ob (boolesch) sie auf der Profilseite des Benutzers sichtbar sind oder nicht (funktioniert auch mit Bezeichnungen von Extrafeldern).

### `registration_add_helptext_for_2_names`

**Hilfetext zum Eintragen zweier Namen bei der Registrierung hinzufügen**

Hilfetext hinzufügen, damit Benutzer im Registrierungsformular zwei Namen eingeben, wenn doppelte Nachnamen üblich sind.

*Standard: `false`*


### `send_notification_when_user_added`

**E-Mail an den Administrator senden, wenn ein Benutzer erstellt wird**

E-Mail-Benachrichtigung an den Administrator senden, wenn ein Benutzer erstellt wird.

### `show_conditions_to_user`

**Spezifische Registrierungsbedingungen anzeigen**

Mehrere Bedingungen während des Anmeldeprozesses anzeigen. Ein Array bereitstellen, wobei jedes Element „variable“ (interner Extrafeldname), „display_text“ (einfacher Text für ein Kontrollkästchen), „text_area“ (langer Bedingungstext) enthält.

### `show_official_code_whoisonline`

**Offizielle Kennung auf „Wer ist online“**

Offizielle Kennung auf der Seite „Wer ist online“ unter dem Benutzernamen anzeigen.

*Standard: `false`*

### `show_terms_if_profile_completed`

**Nutzungsbedingungen nur bei vollständigem Profil**

Wenn Sie diese Option aktivieren, stehen dem Benutzer die Nutzungsbedingungen erst dann zur Verfügung, wenn die zusätzlichen Profilfelder, die mit „terms_“ beginnen und als sichtbar festgelegt sind, ausgefüllt wurden.

*Standard: `false`*


### `split_users_upload_directory`

**Upload-Verzeichnis der Benutzer aufteilen**

Auf stark belasteten Portalen, auf denen viele Benutzer registriert sind und ihre Bilder hochladen, kann das Upload-Verzeichnis (main/upload/users/) zu viele Dateien für das Dateisystem enthalten (es wurde von mehr als 36.000 Dateien auf einem Debian-Server berichtet). Das Ändern dieser Option aktiviert eine einstufige Aufteilung der Verzeichnisse im Upload-Verzeichnis. Im Basisverzeichnis werden 9 Verzeichnisse verwendet, und alle nachfolgenden Benutzerverzeichnisse werden in einem dieser 9 Verzeichnisse gespeichert. Die Änderung dieser Option wirkt sich nicht auf die Verzeichnisstruktur auf der Festplatte aus, beeinflusst jedoch das Verhalten des Chamilo-Codes. Wenn Sie diese Option ändern, müssen Sie die neuen Verzeichnisse selbst auf dem Server anlegen und die vorhandenen Verzeichnisse verschieben. Beachten Sie, dass Sie beim Anlegen und Verschieben dieser Verzeichnisse die Verzeichnisse der Benutzer 1 bis 9 in Unterverzeichnisse gleichen Namens verschieben müssen. Wenn Sie sich bei dieser Option unsicher sind, sollten Sie sie besser nicht aktivieren.

*Standard: `true`*

### `use_users_timezone`

**Benutzer-Zeitzonen aktivieren**

Aktiviert die Möglichkeit für Benutzer, ihre eigene Zeitzone auszuwählen. Nach der Konfiguration können Benutzer Abgabefristen und andere Zeitangaben in ihrer eigenen Zeitzone sehen, was Fehler zum Zeitpunkt der Abgabe reduziert.

*Standard: `true`*

### `user_import_settings`

**Optionen für den Benutzerimport**

Array von Optionen, die als Standardparameter beim CSV/XML-Benutzerimport angewendet werden.

### `user_search_on_extra_fields`

**Benutzer anhand zusätzlicher Felder in der Benutzerliste für Administratoren suchen**

Die angegebenen zusätzlichen Felder (Array von Bezeichnungen zusätzlicher Felder) werden in den Benutzersuchen natürlich einbezogen.

### `user_selected_theme`

**Themenauswahl durch den Benutzer**

Ermöglicht Benutzern, in ihrem Profil ein eigenes visuelles Theme auszuwählen. Dadurch ändert sich das Erscheinungsbild von Chamilo für sie, der Standardstil des Portals bleibt jedoch unverändert. Wenn einem bestimmten Kurs oder einer bestimmten Session ein bestimmtes Theme zugewiesen ist, hat dieses Vorrang vor benutzerdefinierten Themes.

*Standard: `false`*

### `visible_options`

**Liste der sichtbaren Felder im Profil**

Steuert, welche Profilfelder für Benutzer und andere sichtbar sind.