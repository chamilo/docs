# Agenda-inställningar

Standardvärden och beteende för verktyget **Agenda** (kalender / händelser).

Åtkomst till dessa inställningar under **Administration > Konfigurationsinställningar > Agenda**. Denna kategori innehåller **11 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:t eller när du behöver ändra inställningarna på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `agenda_colors`

**Agendafärger**

Ange HTML-färgkoder för varje händelsetyp för att ändra färgen när händelsen visas.

### `agenda_legend`

**Agendans färgteckningar**

Lägg till en kort text som förklaring som beskriver färgerna som används för händelserna.

### `agenda_on_hover_info`

**Information vid hovring i agendan**

Anpassa agendan när muspekaren hovrar. Visa agendakommentar och/eller beskrivning.

### `agenda_reminders_sender_id`

**ID för användaren som officiellt skickar agendapåminnelser**

Anger vilken användare som visas som avsändare av e-postmeddelanden med agendapåminnelser.

*Standard: `0`*

### `allow_agenda_edit_for_hrm`

**Tillåt HRM-rollen att redigera eller ta bort agendahändelser**

Detta ger HRM lite mer befogenhet genom att tillåta dem att redigera/ta bort agendahändelser i kurssessionen.

*Standard: `false`*

### `allow_careers_in_global_agenda`

**Koppla globala kalenderhändelser till karriärer och promotioner**

När funktionen är aktiverad kan globala kalenderhändelser kopplas till karriärer och promotioner, vilket möjliggör riktad schemaläggning.

*Standard: `false`*

### `allow_personal_agenda`

**Personlig agenda**

Kan eleven lägga till personliga händelser i agendan?

*Standard: `true`*

### `default_calendar_view`

**Standardvisningsläge för kalendern**

Ange dayGridMonth, basicWeek, agendaWeek eller agendaDay för att ändra kalenderns standardvy.

*Standard: `month`*

### `fullcalendar_settings`

**Kalenderanpassning**

Extra inställningar för agendan, som gör att du kan konfigurera det specifika kalenderbibliotek vi använder.

### `personal_agenda_show_all_session_events`

**Visa alla agendahändelser i den personliga agendan**

Dölj inte händelser från utgångna sessioner.

*Standard: `false`*

### `personal_calendar_show_sessions_occupation`

**Visa sessioners beläggning i den personliga agendan**

När funktionen är aktiverad visas sessionsscheman och beläggning i användarnas personliga kalendrar.

*Standard: `false`*