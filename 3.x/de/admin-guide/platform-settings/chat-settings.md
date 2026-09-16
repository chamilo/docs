# Chat-Einstellungen

Verhalten des **Chat**-Tools im Kurs.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Chat**. Diese Kategorie enthält **5 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_global_chat`

**Globalen Chat zulassen**

Benutzer können miteinander chatten

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Kurs-Chat auf Tutoren beschränken**

Erlaubt Studierenden nur, mit den Tutoren im Kurs zu sprechen (nicht mit anderen Studierenden).

*Standard: `false`*

### `hide_chat_video`

**Videochat-Option im globalen Chat ausblenden**

Wenn aktiviert, ist die Videochat-Funktion deaktiviert und im globalen Chat-Tool nicht verfügbar.

*Standard: `true`*

### `save_private_conversations_in_documents`

**Private Unterhaltungen in Dokumenten speichern**

Wenn aktiviert, werden 1:1-private Chat-Nachrichten in den Chat-Verlaufsdokumenten des Kurses gespiegelt. Aus Datenschutzgründen wird empfohlen, dies deaktiviert zu lassen.

*Standard: `false`*

### `show_chat_folder`

**Den Verlaufsordner der Chat-Unterhaltungen anzeigen**

Dies zeigt der Lehrkraft den Ordner an, der alle Sitzungen enthält, die im Chat stattgefunden haben. Die Lehrkraft kann sie für Lernende sichtbar machen oder nicht und sie als Ressource verwenden

*Standard: `true`*