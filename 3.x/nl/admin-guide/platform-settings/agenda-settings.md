# Agenda-instellingen

Standaardwaarden en gedrag van de tool **Agenda** (kalender / evenementen).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Agenda**. Deze categorie bevat **11 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `agenda_colors`

**Agendakleuren**

Stel HTML-kleurcodes in voor elk type evenement om de kleur bij weergave van het evenement te wijzigen.

### `agenda_legend`

**Agendakleurlegenda**

Voeg een korte tekst toe als legenda die de kleuren beschrijft die voor de evenementen worden gebruikt.

### `agenda_on_hover_info`

**Agenda-informatie bij hover**

Pas de agenda aan bij hoveren met de cursor. Toon agenda-opmerking en/of beschrijving.

### `agenda_reminders_sender_id`

**ID van de gebruiker die officieel de agenda-herinneringen verstuurt**

Bepaalt welke gebruiker als afzender van agenda-herinneringsmails wordt weergegeven.

*Standaard: `0`*

### `allow_agenda_edit_for_hrm`

**HRM-rol toestaan om agenda-evenementen te bewerken of te verwijderen**

Dit geeft de HRM iets meer bevoegdheid door hen toe te staan agenda-evenementen in de cursussessie te bewerken/verwijderen.

*Standaard: `false`*

### `allow_careers_in_global_agenda`

**Globale kalenderevenementen koppelen aan carrières en promoties**

Wanneer ingeschakeld, kunnen globale kalenderevenementen worden gekoppeld aan carrières en promoties, zodat gerichte planning mogelijk is.

*Standaard: `false`*

### `allow_personal_agenda`

**Persoonlijke agenda**

Kan de cursist persoonlijke evenementen toevoegen aan de Agenda?

*Standaard: `true`*

### `default_calendar_view`

**Standaard weergavemodus van de kalender**

Stel dit in op dayGridMonth, basicWeek, agendaWeek of agendaDay om de standaardweergave van de kalender te wijzigen.

*Standaard: `month`*

### `fullcalendar_settings`

**Kalenderaanpassing**

Extra instellingen voor de agenda, waarmee u de specifieke kalenderbibliotheek die we gebruiken kunt configureren.

### `personal_agenda_show_all_session_events`

**Alle agenda-evenementen weergeven in de persoonlijke agenda**

Verberg evenementen van verlopen sessies niet.

*Standaard: `false`*

### `personal_calendar_show_sessions_occupation`

**Sessiebezetting weergeven in de persoonlijke agenda**

Wanneer ingeschakeld, worden sessieroosters en -bezetting weergegeven in de persoonlijke kalenders van gebruikers.

*Standaard: `false`*