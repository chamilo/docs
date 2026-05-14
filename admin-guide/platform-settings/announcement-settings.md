# Einstellungen für Ankündigungen

Verhalten des Kurs-Tools **Ankündigungen** — wie Ankündigungen gesendet und geplant werden.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Ankündigungen** zu. Diese Kategorie enthält **9 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_careers_in_global_announcements`

**Globale Ankündigungen mit Karrieren und Beförderungen verknüpfen**

Wenn aktiviert, können globale Ankündigungen mit Karrieren und Beförderungen verknüpft werden, um eine gezielte Verteilung zu ermöglichen.

*Standard: `false`*

### `allow_coach_to_edit_announcements`

**Coaches erlauben, Ankündigungen immer zu bearbeiten**

Erlaubt Coaches, Ankündigungen in aktiven oder vergangenen Sitzungen immer zu bearbeiten.

*Standard: `false`*

### `allow_scheduled_announcements`

**Geplante Ankündigungen in Sitzungen aktivieren**

Ermöglicht Sitzungsmanagern, Ankündigungen so einzustellen, dass sie an bestimmten Daten oder nach/vor einer bestimmten Anzahl von Tagen nach Beginn/Ende der Sitzung ausgelöst werden. Die Aktivierung dieser Funktion erfordert die Einrichtung einer Cron-Aufgabe.

*Standard: `false`*

### `announcements_hide_send_to_hrm_users`

**Option zum Senden von Ankündigungen an HR-Benutzer ausblenden**

Entfernt das Kontrollkästchen, um das Senden von Ankündigungen an Benutzer mit HR-Rollen zu aktivieren (erfordert dennoch eine Bestätigung im Ankündigungs-Tool).

*Standard: `true`*

### `course_announcement_scheduled_by_date`

**Datumsbasierte Ankündigungen**

Erlaubt Lehrern, Ankündigungen zu konfigurieren, die zu bestimmten Daten gesendet werden. Dies erfordert die Einrichtung einer Cron-Aufgabe auf cron/course_announcement.php, die mindestens einmal täglich ausgeführt wird.

*Standard: `false`*

### `disable_announcement_attachment`

**Anhänge an Ankündigungen deaktivieren**

Obwohl Anhänge in dieser Version elegant gehandhabt werden und sich nicht auf der Festplatte vervielfältigen, möchten Sie möglicherweise Anhänge komplett deaktivieren, um Übermäßigkeiten zu vermeiden.

*Standard: `false`*

### `disable_delete_all_announcements`

**Schaltfläche zum Löschen aller Ankündigungen deaktivieren**

Wählen Sie 'Ja', um die Schaltfläche zum Löschen aller Ankündigungen zu entfernen, da diese versehentlich von Lehrern verwendet werden kann.

*Standard: `false`*

### `hide_announcement_sent_to_users_info`

**'Gesendet an' in Ankündigungen ausblenden**

Wählen Sie 'Ja', um zu vermeiden, dass angezeigt wird, an wen eine Ankündigung gesendet wurde.

*Standard: `false`*

### `hide_send_to_hrm_users`

**Option zum Senden einer Ankündigungskopie an HRM ausblenden**

Im Ankündigungsformular erscheint normalerweise eine Option, die es Lehrern ermöglicht, eine Kopie der Ankündigung an den HRM des Benutzers zu senden. Setzen Sie dies auf 'Ja', um die Option zu entfernen (und *keine* Kopie zu senden).