# Impostazioni Agenda

Valori predefiniti e comportamento dello strumento **Agenda** (calendario / eventi).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Agenda**. Questa categoria contiene **11 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `agenda_colors`

**Colori dell'agenda**

Impostare i colori in codice HTML per ciascun tipo di evento per cambiare il colore nella visualizzazione dell'evento.

### `agenda_legend`

**Legende dei colori dell'agenda**

Aggiungere un breve testo come legenda che descrive i colori utilizzati per gli eventi.

### `agenda_on_hover_info`

**Informazioni al passaggio del mouse sull'agenda**

Personalizzare l'agenda al passaggio del cursore. Mostrare il commento e/o la descrizione dell'agenda.

### `agenda_reminders_sender_id`

**ID dell'utente che invia ufficialmente i promemoria dell'agenda**

Imposta quale utente compare come mittente delle e-mail di promemoria dell'agenda.

*Predefinito: `0`*

### `allow_agenda_edit_for_hrm`

**Consentire al ruolo HRM di modificare o eliminare gli eventi dell'agenda**

Conferisce all'HRM un po' più di potere consentendo di modificare/eliminare gli eventi dell'agenda nella sessione del corso.

*Predefinito: `false`*

### `allow_careers_in_global_agenda`

**Collegare gli eventi del calendario globale a carriere e promozioni**

Se abilitato, gli eventi del calendario globale possono essere associati a carriere e promozioni, consentendo una pianificazione mirata.

*Predefinito: `false`*

### `allow_personal_agenda`

**Agenda personale**

Lo studente può aggiungere eventi personali all'Agenda?

*Predefinito: `true`*

### `default_calendar_view`

**Modalità di visualizzazione predefinita del calendario**

Impostare su dayGridMonth, basicWeek, agendaWeek o agendaDay per cambiare la vista predefinita del calendario.

*Predefinito: `month`*

### `fullcalendar_settings`

**Personalizzazione del calendario**

Impostazioni aggiuntive per l'agenda, che consentono di configurare la specifica libreria di calendario utilizzata.

### `personal_agenda_show_all_session_events`

**Visualizzare tutti gli eventi dell'agenda nell'agenda personale**

Non nascondere gli eventi delle sessioni scadute.

*Predefinito: `false`*

### `personal_calendar_show_sessions_occupation`

**Visualizzare le occupazioni delle sessioni nell'agenda personale**

Se abilitato, gli orari e le occupazioni delle sessioni vengono visualizzati nei calendari personali degli utenti.

*Predefinito: `false`*