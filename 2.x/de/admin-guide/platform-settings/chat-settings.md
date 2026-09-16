# Chat-Einstellungen

Verhalten des Kurs-**Chat**-Tools.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Chat** zu. Diese Kategorie enthält **5 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_global_chat`

**Globalen Chat erlauben**

Benutzer können miteinander chatten

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Kurs-Chat auf Tutoren beschränken**

Erlaubt es Schülern nur, mit den Tutoren im Kurs zu sprechen (nicht mit anderen Schülern).

*Standard: `false`*

### `hide_chat_video`

**Videochat-Option im globalen Chat ausblenden**

Wenn aktiviert, ist die Videochat-Funktion deaktiviert und im globalen Chat-Tool nicht verfügbar.

*Standard: `true`*

### `save_private_conversations_in_documents`

**Private Unterhaltungen in Dokumenten speichern**

Wenn aktiviert, werden 1:1-private Chat-Nachrichten in den Kurs-Chatverlaufsdokumenten gespiegelt. Aus Datenschutzgründen wird empfohlen, dies deaktiviert zu lassen.

*Standard: `false`*

### `show_chat_folder`

**Ordner mit Chatverläufen anzeigen**

Dies zeigt dem Lehrer den Ordner an, der alle im Chat durchgeführten Sitzungen enthält. Der Lehrer kann diese für Lernende sichtbar machen oder nicht und sie als Ressource nutzen.

*Standard: `true`*