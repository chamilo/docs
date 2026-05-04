# Agenda Settings

Defaults and behaviour of the **Agenda** tool (calendar / events).

Access these settings under **Administration > Configuration settings > Agenda**. This category contains **11 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `agenda_colors`

**Agenda colours**

Set HTML-code colours for each type of event to change the colour when displaying the event.

### `agenda_legend`

**Agenda colour legends**

Add a small text as legend describing the colours used for the events.

### `agenda_on_hover_info`

**Agenda hover info**

Customize the agenda on cursor hovering. Show agenda comment and/or description.

### `agenda_reminders_sender_id`

**ID of the user who officially sends the agenda reminders**

Sets which user appears as the sender of agenda reminder emails.

### `allow_agenda_edit_for_hrm`

**Allow HRM role to edit or delete agenda events**

This gives the HRM a little more power by allowing them to edit/delete agenda events in the course-session.

### `allow_careers_in_global_agenda`

**Link global calendar events with careers and promotions**

When enabled, global calendar events can be associated with careers and promotions, allowing targeted scheduling.

### `allow_personal_agenda`

**Personal Agenda**

Can the learner add personal events to the Agenda?

### `default_calendar_view`

**Default calendar display mode**

Set this to dayGridMonth, basicWeek, agendaWeek or agendaDay to change the default view of the calendar.

### `fullcalendar_settings`

**Calendar customization**

Extra settings for the agenda, allowing you to configure the specific calendar library we use.

### `personal_agenda_show_all_session_events`

**Display all agenda events in personal agenda**

Do not hide events from expired sessions.

### `personal_calendar_show_sessions_occupation`

**Display sessions occupations in personal agenda**

When enabled, session schedules and occupations are displayed in users' personal calendars.

