# Nachrichten-Einstellungen

Verhalten des **Nachrichten- / Posteingang**-Systems.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Nachrichten** zu. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_message_tool`

**Internes Nachrichten-Tool**

Die Aktivierung des internen Nachrichten-Tools ermöglicht es Benutzern, Nachrichten an andere Benutzer der Plattform zu senden und einen Nachrichten-Posteingang zu haben.

*Standard: `true`*

### `allow_send_message_to_all_platform_users`

**Nachrichten an alle Plattform-Benutzer senden erlauben**

Ermöglicht das Senden von Nachrichten an jeden Benutzer der Plattform, nicht nur an Freunde oder Personen, die gerade online sind.

*Standard: `false`*

### `allow_user_message_tracking`

**Administratoren können persönliche Nachrichten einsehen**

Ermöglicht Administratoren, persönliche Nachrichten zwischen einem Lehrer und einem Lernenden einzusehen. Bitte stellen Sie sicher, dass Sie einen Hinweis in Ihren Nutzungsbedingungen aufnehmen, da dies den Datenschutz beeinträchtigen könnte.

*Standard: `false`*

### `filter_interactivity_messages`

**Lehrer können nur innerhalb des Sitzungszeitraums auf Nachrichten von Lernenden zugreifen**

Filtert Nachrichten zwischen einem Lehrer und einem Lernenden zwischen den Start- und Enddaten der Sitzung.

*Standard: `false`*

### `message_max_upload_filesize`

**Maximale Dateigröße für Uploads in Nachrichten**

Maximale Größe für Datei-Uploads im Nachrichten-Tool (in Bytes).

*Standard: `20971520`*

### `private_messages_about_user`

**Private Nachrichten zwischen Lehrern über einen Lernenden erlauben**

Ermöglicht den Austausch von Nachrichten zwischen Lehrern/Vorgesetzten über einen Benutzer von der Tracking-Seite dieses Benutzers aus.

*Standard: `false`*

### `private_messages_about_user_visible_to_user`

**Lernenden erlauben, Nachrichten über sich zwischen Lehrern einzusehen**

Wenn der Austausch von Nachrichten über einen Benutzer aktiviert ist, ermöglicht diese Option dem entsprechenden Benutzer, die Nachrichten einzusehen. Dies dient der Einhaltung von Transparenzregeln, die die Organisation möglicherweise erfüllen muss.

*Standard: `false`*