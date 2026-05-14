# Agenda-instellingen

Standaardinstellingen en gedrag van de **Agenda**-tool (kalender / evenementen).

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Agenda**. Deze categorie bevat **11 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `agenda_colors`

**Agenda-kleuren**

Stel HTML-kleurcodes in voor elk type evenement om de kleur te wijzigen bij het weergeven van het evenement.

### `agenda_legend`

**Agenda-kleurenlegenda**

Voeg een korte tekst toe als legenda die de gebruikte kleuren voor de evenementen beschrijft.

### `agenda_on_hover_info`

**Agenda-hoverinformatie**

Pas de agenda aan bij het hoveren met de cursor. Toon agendacommentaar en/of beschrijving.

### `agenda_reminders_sender_id`

**ID van de gebruiker die officieel de agenda-herinneringen verzendt**

Bepaalt welke gebruiker wordt weergegeven als de verzender van e-mails met agenda-herinneringen.

*Standaard: `0`*

### `allow_agenda_edit_for_hrm`

**HRM-rol toestaan om agenda-evenementen te bewerken of te verwijderen**

Dit geeft de HRM meer bevoegdheden door hen toe te staan agenda-evenementen in de cursus-sessie te bewerken/verwijderen.

*Standaard: `false`*

### `allow_careers_in_global_agenda`

**Globale kalender-evenementen koppelen aan carrières en promoties**

Wanneer ingeschakeld, kunnen globale kalender-evenementen worden gekoppeld aan carrières en promoties, wat gerichte planning mogelijk maakt.

*Standaard: `false`*

### `allow_personal_agenda`

**Persoonlijke Agenda**

Kan de leerling persoonlijke evenementen toevoegen aan de Agenda?

*Standaard: `true`*

### `default_calendar_view`

**Standaard weergavemodus van de kalender**

Stel dit in op dayGridMonth, basicWeek, agendaWeek of agendaDay om de standaardweergave van de kalender te wijzigen.

*Standaard: `month`*

### `fullcalendar_settings`

**Kalenderaanpassing**

Extra instellingen voor de agenda, waarmee u de specifieke kalenderbibliotheek die we gebruiken kunt configureren.

### `personal_agenda_show_all_session_events`

**Alle agenda-evenementen weergeven in persoonlijke agenda**

Verberg geen evenementen van verlopen sessies.

*Standaard: `false`*

### `personal_calendar_show_sessions_occupation`

**Sessieschema's weergeven in persoonlijke agenda**

Wanneer ingeschakeld, worden sessieschema's en bezettingen weergegeven in de persoonlijke kalenders van gebruikers.

*Standaard: `false`*