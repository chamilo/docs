# Agenda-indstillinger

Standardværdier og adfærd for værktøjet **Agenda** (kalender / begivenheder).

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Agenda**. Denne kategori indeholder **11 indstillinger**, som er oplistet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `agenda_colors`

**Agendafarver**

Angiv HTML-farvekoder for hver begivenhedstype for at ændre farven, når begivenheden vises.

### `agenda_legend`

**Agendafarveforklaringer**

Tilføj en kort tekst som forklaring, der beskriver de farver, der bruges til begivenhederne.

### `agenda_on_hover_info`

**Agenda-hover-info**

Tilpas agendaen, når markøren holdes over. Vis agendakommentar og/eller beskrivelse.

### `agenda_reminders_sender_id`

**ID på den bruger, der officielt sender agendapåmindelser**

Angiver, hvilken bruger der vises som afsender af e-mails med agendapåmindelser.

*Standard: `0`*

### `allow_agenda_edit_for_hrm`

**Tillad HRM-rollen at redigere eller slette agendabegivenheder**

Dette giver HRM lidt mere beføjelse ved at tillade dem at redigere/slette agendabegivenheder i kursus-sessionen.

*Standard: `false`*

### `allow_careers_in_global_agenda`

**Knyt globale kalenderbegivenheder til karrierer og promotioner**

Når funktionen er aktiveret, kan globale kalenderbegivenheder knyttes til karrierer og promotioner, så der kan planlægges målrettet.

*Standard: `false`*

### `allow_personal_agenda`

**Personlig agenda**

Kan den studerende tilføje personlige begivenheder til agendaen?

*Standard: `true`*

### `default_calendar_view`

**Standardvisning for kalenderen**

Angiv dayGridMonth, basicWeek, agendaWeek eller agendaDay for at ændre kalenderens standardvisning.

*Standard: `month`*

### `fullcalendar_settings`

**Kalendertilpasning**

Ekstra indstillinger til agendaen, så du kan konfigurere det specifikke kalenderbibliotek, vi bruger.

### `personal_agenda_show_all_session_events`

**Vis alle agendabegivenheder i den personlige agenda**

Skjul ikke begivenheder fra udløbne sessioner.

*Standard: `false`*

### `personal_calendar_show_sessions_occupation`

**Vis sessionsbelægning i den personlige agenda**

Når funktionen er aktiveret, vises sessionernes tidsplaner og belægning i brugernes personlige kalendere.

*Standard: `false`*