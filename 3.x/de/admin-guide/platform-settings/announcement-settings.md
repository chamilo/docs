# Ankündigungseinstellungen

Verhalten des Kurswerkzeugs **Ankündigungen** — wie Ankündigungen versendet und geplant werden.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Ankündigungen**. Diese Kategorie enthält **10 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_careers_in_global_announcements`

**Globale Ankündigungen mit Karrieren und Promotionen verknüpfen**

Wenn aktiviert, können globale Ankündigungen mit Karrieren und Promotionen für eine gezielte Verteilung verknüpft werden.

*Standard: `false`*

### `allow_coach_to_edit_announcements`

**Tutoren das ständige Bearbeiten von Ankündigungen erlauben**

Tutoren das ständige Bearbeiten von Ankündigungen in aktiven oder vergangenen Sessions erlauben.

*Standard: `false`*

### `allow_scheduled_announcements`

**Geplante Ankündigungen in Sessions aktivieren**

Ermöglicht den Session-Managern, Ankündigungen festzulegen, die an bestimmten Daten oder nach/vor einer Anzahl von Tagen relativ zum Beginn/Ende der Session ausgelöst werden. Die Aktivierung dieser Funktion erfordert die Einrichtung einer Cron-Aufgabe.

*Standard: `false`*

### `announcements_hide_send_to_hrm_users`

**Option zum Senden von Ankündigungen an HR-Benutzer ausblenden**

Das Kontrollkästchen zum Aktivieren des Versands von Ankündigungen an Benutzer mit HR-Rollen entfernen (eine Bestätigung im Ankündigungswerkzeug ist weiterhin erforderlich).

*Standard: `true`*

### `course_announcement_scheduled_by_date`

**Datumsbasierte Ankündigungen**

Lehrenden das Konfigurieren von Ankündigungen erlauben, die an bestimmten Daten versendet werden. Dies erfordert die Einrichtung einer Cron-Aufgabe auf cron/course_announcement.php, die mindestens einmal täglich ausgeführt wird.

*Standard: `false`*

### `disable_announcement_attachment`

**Anhänge an Ankündigungen deaktivieren**

Obwohl Anhänge in dieser Version elegant behandelt werden und sich nicht auf der Festplatte vervielfachen, möchten Sie Anhänge möglicherweise vollständig deaktivieren, um Exzesse zu vermeiden.

*Standard: `false`*

### `disable_delete_all_announcements`

**Schaltfläche zum Löschen aller Ankündigungen deaktivieren**

Wählen Sie „Ja“, um die Schaltfläche zum Löschen aller Ankündigungen zu entfernen, da diese von Lehrenden versehentlich verwendet werden kann.

*Standard: `false`*

### `hide_announcement_sent_to_users_info`

**„Gesendet an“ in Ankündigungen ausblenden**

Wählen Sie „Ja“, um zu vermeiden, dass angezeigt wird, an wen eine Ankündigung gesendet wurde.

*Standard: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Globale Ankündigungen für anonyme Benutzer ausblenden**

Plattformankündigungen vor anonymen Benutzern ausblenden und nur authentifizierten Benutzern anzeigen.

*Standard: `false`*

### `hide_send_to_hrm_users`

**Option zum Senden einer Ankündigungskopie an HRM ausblenden**

Im Ankündigungsformular erscheint normalerweise eine Option, mit der Lehrende eine Kopie der Ankündigung an den HRM des Benutzers senden können. Setzen Sie dies auf „Ja“, um die Option zu entfernen (und die Kopie *nicht* zu senden).