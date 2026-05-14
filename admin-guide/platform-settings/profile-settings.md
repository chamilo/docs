# Benutzerprofil-Einstellungen

Welche Felder im Benutzerprofil angezeigt werden, welche der Benutzer bearbeiten kann und damit verbundene Präferenzen.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Benutzerprofil** zu. Diese Kategorie enthält **29 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene durch Bearbeiten von [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) ändern müssen.

## Einstellungen

### `account_valid_duration`

**Konto-Gültigkeit**

Ein Benutzerkonto ist nach der Erstellung für diese Anzahl von Tagen gültig

*Standard: `3660`*

### `add_user_course_information_in_mailto`

**E-Mail mit Benutzer- und Kursinformationen im Fußbereich vorfüllen**

Betreff und Textkörper in der mailto:-Fußzeile hinzufügen.

*Standard: `false`*

### `allow_show_linkedin_url`

**Anzeige der LinkedIn-URL des Benutzers erlauben**

Einen Link im sozialen Block des Benutzers hinzufügen, der den Besuch des LinkedIn-Profils des Benutzers ermöglicht

### `allow_show_skype_account`

**Anzeige des Skype-Kontos des Benutzers erlauben**

Einen Link im sozialen Block des Benutzers hinzufügen, der das Starten eines Chats über Skype ermöglicht

### `allow_social_map_fields`

**Geolokalisierung der Benutzer auf einer Karte**

Anzeige einer Karte im sozialen Netzwerk aktivieren, um andere Benutzer zu lokalisieren. Dies umfasst mehrere Positionen (aktuell und Ziel), die als Adressen oder Koordinaten in separaten Zusatzfeldern definiert werden müssen. Die Zusatzfelder müssen hier als Array festgelegt werden.

### `allow_teachers_to_classes`

**Lehrern die Verwaltung von Klassen erlauben**

Ermöglicht Lehrern, Klassengruppen und deren Mitgliedschaft innerhalb des Systems zu verwalten.

*Standard: `false`*

### `allow_user_headings`

**Benutzerprofilierung innerhalb von Kursen erlauben**

Kann ein Lehrer Profilfelder für Lernende definieren, um zusätzliche Informationen abzufragen?

### `allow_users_to_change_email_with_no_password`

**Benutzern erlauben, E-Mail ohne Passwort zu ändern**

Beim Ändern der Kontoinformationen

*Standard: `false`*

### `changeable_options`

**Felder, die Benutzer in ihrem Profil ändern dürfen**

Wählen Sie die Felder aus, die Benutzer auf ihrer Profilseite ändern können.

### `enable_profile_user_address_geolocalization`

**Geolokalisierung des Benutzers aktivieren**

Adressfeld des Benutzers aktivieren und auf einer Karte mit Geolokalisierungsfunktionen anzeigen

### `extended_profile`

**Portfolio**

Wenn diese Einstellung aktiviert ist, kann ein Benutzer die folgenden (optionalen) Felder ausfüllen: 'Mein persönlicher offener Bereich', 'Meine Kompetenzen', 'Meine Diplome', 'Was ich unterrichten kann'

*Standard: `false`*

### `hide_username_in_course_chat`

**Benutzernamen im Kurs-Chat ausblenden**

Im Kurs-Chat den Benutzernamen ausblenden. Nur die Namen der Personen anzeigen.

*Standard: `false`*

### `hide_username_with_complete_name`

**Benutzernamen ausblenden, wenn der vollständige Name angezeigt wird**

Einige interne Funktionen geben den Benutzernamen zurück, wenn der vollständige Name des Benutzers zurückgegeben wird. Mit dieser Option stellen Sie sicher, dass der Benutzername nicht angezeigt wird.

*Standard: `false`*

### `linkedin_organization_id`

**LinkedIn-Organisations-ID**

Beim Teilen eines Abzeichens auf LinkedIn können Sie eine Organisations-ID festlegen, die mit der LinkedIn-Seite Ihrer Organisation verknüpft ist (um die Organisation zu verknüpfen, die das Abzeichen vergibt).

*Standard: `false`*

### `login_is_email`

**E-Mail als Benutzername verwenden**

Die E-Mail-Adresse verwenden, um sich im System anzumelden

*Standard: `false`*

### `my_space_users_items_per_page`

**Standardanzahl von Einträgen pro Seite in meinem Bereich**

Anzahl der Datensätze, die pro Seite in den Tracking-Bereichen von Mein Bereich angezeigt werden (Benutzer, Arbeitsstatistiken, Schülerliste).

*Standard: `10`*

### `pass_reminder_custom_link`

**Benutzerdefinierte Seite für Passwort-Erinnerung**

Legen Sie Ihre eigene URL für eine Passwort-Zurücksetzungsseite fest. Nützlich bei der Verwendung eines föderierten Kontoverwaltungssystems.

### `profile_fields_visibility`

**Sichtbare Felder auf der Profilseite**

Array von Feldern und ob (Boolean) sie auf der Profilseite des Benutzers sichtbar sind oder nicht (funktioniert auch mit Beschriftungen von Zusatzfeldern).

### `registration_add_helptext_for_2_names`

**Hilfetext für zwei Namen bei der Registrierung hinzufügen**

Hilfetext für Benutzer hinzufügen, um zwei Namen im Registrierungsformular einzugeben, wenn doppelte Nachnamen üblich sind.

*Standard: `false`*

### `send_notification_when_user_added`

**E-Mail an Admin senden, wenn Benutzer erstellt wird**

E-Mail-Benachrichtigung an den Admin senden, wenn ein Benutzer erstellt wird.

### `show_conditions_to_user`

**Spezifische Registrierungsbedingungen anzeigen**

Mehrere Bedingungen während des Anmeldeprozesses dem Benutzer anzeigen. Stellen Sie ein Array bereit, bei dem jedes Element 'variable' (interner Name des Zusatzfelds), 'display_text' (einfacher Text für ein Kontrollkästchen) und 'text_area' (langer Text der Bedingungen) enthält.

### `show_official_code_whoisonline`

**Offizieller Code auf 'Wer ist online'**

Offiziellen Code auf der Seite 'Wer ist online' unter dem Benutzernamen anzeigen.

*Standard: `false`*

---
### `show_terms_if_profile_completed`

**Nutzungsbedingungen nur bei vollständigem Profil anzeigen**

Durch Aktivierung dieser Option werden die Nutzungsbedingungen für den Benutzer erst dann verfügbar, wenn die zusätzlichen Profilfelder, die mit 'terms_' beginnen und als sichtbar eingestellt sind, ausgefüllt wurden.

*Standard: `false`*

### `split_users_upload_directory`

**Upload-Verzeichnis der Benutzer aufteilen**

Auf stark frequentierten Portalen, auf denen viele Benutzer registriert sind und ihre Bilder hochladen, kann das Upload-Verzeichnis (main/upload/users/) zu viele Dateien für das Dateisystem enthalten, um damit umzugehen (es wurde von über 36000 Dateien auf einem Debian-Server berichtet). Durch Änderung dieser Option wird eine einstufige Aufteilung der Verzeichnisse im Upload-Verzeichnis aktiviert. Es werden 9 Verzeichnisse im Basisverzeichnis verwendet, und alle nachfolgenden Benutzerverzeichnisse werden in eines dieser 9 Verzeichnisse gespeichert. Die Änderung dieser Option wirkt sich nicht auf die Verzeichnisstruktur auf der Festplatte aus, sondern beeinflusst das Verhalten des Chamilo-Codes. Wenn Sie diese Option ändern, müssen Sie die neuen Verzeichnisse selbst erstellen und die vorhandenen Verzeichnisse auf dem Server verschieben. Beachten Sie, dass Sie beim Erstellen und Verschieben dieser Verzeichnisse die Verzeichnisse der Benutzer 1 bis 9 in Unterverzeichnisse mit demselben Namen verschieben müssen. Wenn Sie sich bei dieser Option unsicher sind, ist es am besten, sie nicht zu aktivieren.

*Standard: `true`*

### `use_users_timezone`

**Benutzerzeitzonen aktivieren**

Ermöglicht es Benutzern, ihre eigene Zeitzone auszuwählen. Nach der Konfiguration können Benutzer Abgabefristen für Aufgaben und andere Zeitangaben in ihrer eigenen Zeitzone sehen, was Fehler bei der Abgabe reduziert.

*Standard: `true`*

### `user_import_settings`

**Optionen für den Benutzerimport**

Array von Optionen, die als Standardparameter beim CSV/XML-Benutzerimport angewendet werden.

### `user_search_on_extra_fields`

**Benutzer anhand zusätzlicher Felder in der Benutzerliste für Administratoren suchen**

Schließt die angegebenen zusätzlichen Felder (Array von Bezeichnungen zusätzlicher Felder) standardmäßig in die Benutzersuche ein.

### `user_selected_theme`

**Benutzerthema-Auswahl**

Erlaubt Benutzern, ihr eigenes visuelles Thema in ihrem Profil auszuwählen. Dies ändert das Erscheinungsbild von Chamilo für sie, lässt jedoch den Standardstil des Portals unverändert. Wenn einem bestimmten Kurs oder einer Sitzung ein spezifisches Thema zugewiesen ist, hat dieses Vorrang vor benutzerdefinierten Themen.

*Standard: `false`*

### `visible_options`

**Liste der sichtbaren Felder im Profil**

Steuert, welche Profilfelder für Benutzer und andere sichtbar sind.