# Agenda-innstillinger

Standardverdier og atferd for verktøyet **Agenda** (kalender / hendelser).

Få tilgang til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Agenda**. Denne kategorien inneholder **11 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `agenda_colors`

**Agenda-farger**

Angi HTML-kodefarger for hver hendelsestype for å endre fargen når hendelsen vises.

### `agenda_legend`

**Agenda-fargeforklaringer**

Legg til en kort tekst som forklaring som beskriver fargene som brukes for hendelsene.

### `agenda_on_hover_info`

**Agenda-pekeinfo**

Tilpass agendaen ved musepeking. Vis agenda-kommentar og/eller beskrivelse.

### `agenda_reminders_sender_id`

**ID for brukeren som offisielt sender agenda-påminnelser**

Angir hvilken bruker som vises som avsender av e-poster med agenda-påminnelser.

*Standard: `0`*

### `allow_agenda_edit_for_hrm`

**Tillat HRM-rollen å redigere eller slette agenda-hendelser**

Dette gir HRM litt mer makt ved å la dem redigere/slette agenda-hendelser i kursøkten.

*Standard: `false`*

### `allow_careers_in_global_agenda`

**Koble globale kalenderhendelser til karrierer og opprykk**

Når dette er aktivert, kan globale kalenderhendelser knyttes til karrierer og opprykk, slik at man kan planlegge målrettet.

*Standard: `false`*

### `allow_personal_agenda`

**Personlig agenda**

Kan lærende legge til personlige hendelser i Agenda?

*Standard: `true`*

### `default_calendar_view`

**Standard visningsmodus for kalender**

Sett denne til dayGridMonth, basicWeek, agendaWeek eller agendaDay for å endre standardvisningen av kalenderen.

*Standard: `month`*

### `fullcalendar_settings`

**Kalendertilpasning**

Ekstra innstillinger for agendaen, som lar deg konfigurere det spesifikke kalenderbiblioteket vi bruker.

### `personal_agenda_show_all_session_events`

**Vis alle agenda-hendelser i personlig agenda**

Ikke skjul hendelser fra utløpte økter.

*Standard: `false`*

### `personal_calendar_show_sessions_occupation`

**Vis øktbelegg i personlig agenda**

Når dette er aktivert, vises øktplaner og belegg i brukernes personlige kalendere.

*Standard: `false`*