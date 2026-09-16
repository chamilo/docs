# Agenda-Einstellungen

Vorgaben und Verhalten des **Agenda**-Werkzeugs (Kalender / Termine).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Agenda**. Diese Kategorie enthält **11 Einstellungen**, die nachfolgend mit Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `agenda_colors`

**Agenda-Farben**

Legen Sie HTML-Farbcodes für jeden Ereignistyp fest, um die Farbe bei der Anzeige des Ereignisses zu ändern.

### `agenda_legend`

**Agenda-Farblegenden**

Fügen Sie einen kurzen Text als Legende hinzu, der die für die Ereignisse verwendeten Farben beschreibt.

### `agenda_on_hover_info`

**Agenda-Hover-Info**

Passen Sie die Agenda beim Überfahren mit dem Cursor an. Agenda-Kommentar und/oder Beschreibung anzeigen.

### `agenda_reminders_sender_id`

**ID des Benutzers, der offiziell die Agenda-Erinnerungen sendet**

Legt fest, welcher Benutzer als Absender der Agenda-Erinnerungs-E-Mails erscheint.

*Standard: `0`*

### `allow_agenda_edit_for_hrm`

**HRM-Rolle das Bearbeiten oder Löschen von Agenda-Ereignissen erlauben**

Dies gibt der HRM etwas mehr Rechte, indem sie Agenda-Ereignisse in der Kurs-Session bearbeiten/löschen darf.

*Standard: `false`*

### `allow_careers_in_global_agenda`

**Globale Kalenderereignisse mit Karrieren und Promotionen verknüpfen**

Wenn aktiviert, können globale Kalenderereignisse mit Karrieren und Promotionen verknüpft werden, was eine gezielte Terminplanung ermöglicht.

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

Zusätzliche Einstellungen für die Agenda, mit denen Sie die verwendete Kalenderbibliothek konfigurieren können.

### `personal_agenda_show_all_session_events`

**Alle Agenda-Ereignisse in der persönlichen Agenda anzeigen**

Ereignisse aus abgelaufenen Sessions nicht ausblenden.

*Standard: `false`*

### `personal_calendar_show_sessions_occupation`

**Session-Belegungen in der persönlichen Agenda anzeigen**

Wenn aktiviert, werden Session-Zeitpläne und Belegungen in den persönlichen Kalendern der Benutzer angezeigt.

*Standard: `false`*