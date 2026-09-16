# Agenda-Einstellungen

Standardwerte und Verhalten des **Agenda**-Tools (Kalender / Ereignisse).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Agenda** zu. Diese Kategorie enthält **11 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `agenda_colors`

**Agenda-Farben**

Legen Sie HTML-Farbcodes für jeden Ereignistyp fest, um die Farbe bei der Anzeige des Ereignisses zu ändern.

### `agenda_legend`

**Agenda-Farblegende**

Fügen Sie einen kurzen Text als Legende hinzu, der die für die Ereignisse verwendeten Farben beschreibt.

### `agenda_on_hover_info`

**Agenda-Hover-Info**

Passen Sie die Agenda bei Mauszeiger-Hover an. Zeigen Sie Agenda-Kommentar und/oder Beschreibung an.

### `agenda_reminders_sender_id`

**ID des Benutzers, der offiziell die Agenda-Erinnerungen sendet**

Legt fest, welcher Benutzer als Absender der Agenda-Erinnerungs-E-Mails erscheint.

*Standard: `0`*

### `allow_agenda_edit_for_hrm`

**HRM-Rolle erlauben, Agenda-Ereignisse zu bearbeiten oder zu löschen**

Gibt der HRM-Rolle etwas mehr Befugnisse, indem sie Agenda-Ereignisse im Kurs-Session bearbeiten/löschen dürfen.

*Standard: `false`*

### `allow_careers_in_global_agenda`

**Globale Kalenderereignisse mit Karrieren und Beförderungen verknüpfen**

Wenn aktiviert, können globale Kalenderereignisse mit Karrieren und Beförderungen verknüpft werden, um gezielte Planungen zu ermöglichen.

*Standard: `false`*

### `allow_personal_agenda`

**Persönliche Agenda**

Kann der Lernende persönliche Ereignisse zur Agenda hinzufügen?

*Standard: `true`*

### `default_calendar_view`

**Standard-Kalenderanzeigemodus**

Setzen Sie dies auf dayGridMonth, basicWeek, agendaWeek oder agendaDay, um die Standardansicht des Kalenders zu ändern.

*Standard: `month`*

### `fullcalendar_settings`

**Kalenderanpassung**

Zusätzliche Einstellungen für die Agenda, mit denen Sie die spezifische Kalenderbibliothek, die wir verwenden, konfigurieren können.

### `personal_agenda_show_all_session_events`

**Alle Agenda-Ereignisse in der persönlichen Agenda anzeigen**

Ereignisse aus abgelaufenen Sitzungen nicht ausblenden.

*Standard: `false`*

### `personal_calendar_show_sessions_occupation`

**Sitzungsbelegungen in der persönlichen Agenda anzeigen**

Wenn aktiviert, werden Sitzungspläne und Belegungen in den persönlichen Kalendern der Benutzer angezeigt.

*Standard: `false`*