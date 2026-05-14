# Impostazioni dell'Agenda

Impostazioni predefinite e comportamento dello strumento **Agenda** (calendario / eventi).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Agenda**. Questa categoria contiene **11 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `agenda_colors`

**Colori dell'Agenda**

Imposta i colori in codice HTML per ciascun tipo di evento per modificare il colore durante la visualizzazione dell'evento.

### `agenda_legend`

**Legenda dei colori dell'Agenda**

Aggiungi un breve testo come legenda che descriva i colori utilizzati per gli eventi.

### `agenda_on_hover_info`

**Informazioni al passaggio del mouse sull'Agenda**

Personalizza l'agenda al passaggio del cursore. Mostra il commento e/o la descrizione dell'agenda.

### `agenda_reminders_sender_id`

**ID dell'utente che invia ufficialmente i promemoria dell'agenda**

Imposta quale utente appare come mittente delle email di promemoria dell'agenda.

*Predefinito: `0`*

### `allow_agenda_edit_for_hrm`

**Consenti al ruolo HRM di modificare o eliminare eventi dell'agenda**

Concede al ruolo HRM maggiore potere permettendo di modificare/eliminare eventi dell'agenda nel corso-sessione.

*Predefinito: `false`*

### `allow_careers_in_global_agenda`

**Collega gli eventi del calendario globale a carriere e promozioni**

Quando abilitato, gli eventi del calendario globale possono essere associati a carriere e promozioni, consentendo una pianificazione mirata.

*Predefinito: `false`*

### `allow_personal_agenda`

**Agenda Personale**

L'utente può aggiungere eventi personali all'Agenda?

*Predefinito: `true`*

### `default_calendar_view`

**Modalità di visualizzazione predefinita del calendario**

Imposta su dayGridMonth, basicWeek, agendaWeek o agendaDay per cambiare la vista predefinita del calendario.

*Predefinito: `month`*

### `fullcalendar_settings`

**Personalizzazione del calendario**

Impostazioni aggiuntive per l'agenda, che consentono di configurare la specifica libreria del calendario che utilizziamo.

### `personal_agenda_show_all_session_events`

**Mostra tutti gli eventi dell'agenda nell'agenda personale**

Non nascondere gli eventi delle sessioni scadute.

*Predefinito: `false`*

### `personal_calendar_show_sessions_occupation`

**Mostra l'occupazione delle sessioni nell'agenda personale**

Quando abilitato, gli orari delle sessioni e le occupazioni vengono visualizzati nei calendari personali degli utenti.

*Predefinito: `false`*