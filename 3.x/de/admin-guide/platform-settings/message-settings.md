# Messaging-Einstellungen

Verhalten des **Messaging-/Posteingangs**-Systems.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Messaging**. Diese Kategorie enthält **7 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Settings-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_message_tool`

**Internes Messaging-Tool**

Die Aktivierung des internen Messaging-Tools ermöglicht es Benutzern, Nachrichten an andere Benutzer der Plattform zu senden und über einen Messaging-Posteingang zu verfügen.

*Standard: `true`*

### `allow_send_message_to_all_platform_users`

**Versand von Nachrichten an beliebige Plattformbenutzer erlauben**

Ermöglicht das Senden von Nachrichten an beliebige Benutzer der Plattform, nicht nur an Ihre Freunde oder die derzeit online befindlichen Personen.

*Standard: `false`*

### `allow_user_message_tracking`

**Administratoren können persönliche Nachrichten einsehen**

Erlaubt Administratoren, persönliche Nachrichten zwischen einem Lehrenden und einem Lernenden einzusehen. Bitte stellen Sie sicher, dass Sie einen Hinweis in Ihre Nutzungsbedingungen aufnehmen, da dies den Datenschutz betreffen kann.

*Standard: `false`*


### `filter_interactivity_messages`

**Lehrende können auf Nachrichten von Lernenden nur innerhalb des Session-Zeitraums zugreifen**

Filtert Nachrichten zwischen einem Lehrenden und einem Lernenden zwischen dem Start- und Enddatum der Session.

*Standard: `false`*


### `message_max_upload_filesize`

**Maximale Upload-Dateigröße in Nachrichten**

Maximale Größe für Datei-Uploads im Messaging-Tool (in Bytes)

*Standard: `20971520`*

### `private_messages_about_user`

**Private Nachrichten zwischen Lehrenden über einen Lernenden erlauben**

Erlaubt den Austausch von Nachrichten von Lehrenden/Vorgesetzten über einen Benutzer von der Tracking-Seite dieses Benutzers aus.

*Standard: `false`*


### `private_messages_about_user_visible_to_user`

**Lernenden erlauben, Nachrichten über sie zwischen Lehrenden zu sehen**

Wenn der Austausch von Nachrichten über einen Benutzer aktiviert ist, erlaubt diese Option dem betreffenden Benutzer, die Nachrichten einzusehen. Dies dient der Einhaltung von Transparenzregeln, denen die Organisation möglicherweise nachkommen muss.

*Standard: `false`*