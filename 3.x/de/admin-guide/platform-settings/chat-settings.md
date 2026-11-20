# Chat-Einstellungen

Verhalten des Kurswerkzeugs **Chat**.

Diese Einstellungen erreichen Sie unter **Administration > Konfigurationseinstellungen > Chat**. Diese Kategorie enthält **5 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_global_chat`

**Globalen Chat zulassen**

Benutzer können miteinander chatten

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Kurs-Chat auf Tutoren beschränken**

Studierenden wird nur erlaubt, mit den Tutoren des Kurses zu sprechen (nicht mit anderen Studierenden).

*Standard: `false`*

### `hide_chat_video`

**Videochat-Option im globalen Chat ausblenden**

Wenn aktiviert, ist die Videochat-Funktion deaktiviert und im globalen Chat-Werkzeug nicht verfügbar.

*Standard: `true`*

Der Standardwert `true` blendet die Aktion **Videoanruf starten** im **schwebenden Plattform-Chat** aus. Setzen Sie ihn auf `false`, um Eins-zu-eins-WebRTC-Anrufe für unterstützte Browser zu aktivieren; die Benutzer müssen außerdem Zugriff auf den Plattform-Chat haben, angemeldet sein und über funktionierende Kamera- und Mikrofonberechtigungen verfügen. Dies ist **nicht** die Kurs-Videokonferenz-Integration von BigBlueButton oder Zoom. Den Ablauf für Lernende finden Sie unter [Eins-zu-eins-Videoanrufe](../../student-guide/video-calls.md) (Issue [#3777](https://github.com/chamilo/chamilo-lms/issues/3777)).


### `save_private_conversations_in_documents`

**Private Unterhaltungen in Dokumenten speichern**

Wenn aktiviert, werden private 1:1-Chatnachrichten in den Dokumenten des Kurs-Chatverlaufs gespiegelt. Aus Datenschutzgründen wird empfohlen, diese Einstellung deaktiviert zu lassen.

*Standard: `false`*

### `show_chat_folder`

**Verlaufsordner der Chat-Unterhaltungen anzeigen**

Dies zeigt der Lehrkraft den Ordner, der alle im Chat geführten Sitzungen enthält. Die Lehrkraft kann diese für Lernende sichtbar oder unsichtbar machen und sie als Ressource verwenden.

*Standard: `true`*