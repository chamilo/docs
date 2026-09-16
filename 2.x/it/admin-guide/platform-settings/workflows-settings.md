# Impostazioni dei Flussi di Lavoro

Interruttori trasversali per i flussi di lavoro — creazione di corsi, validazione delle iscrizioni, flussi di lavoro per i compiti e simili.

Accedi a queste impostazioni sotto **Amministrazione > Impostazioni di configurazione > Flussi di lavoro**. Questa categoria contiene **23 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Usalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_user_course_subscription_by_course_admin`

**Consenti l'iscrizione degli utenti al corso da parte dell'amministratore del corso**

Attivando questa opzione, l'amministratore del corso potrà iscrivere utenti all'interno di un corso.

*Default: `true`*

### `allow_users_to_create_courses`

**Consenti ai non amministratori di creare corsi**

Permetti ai non amministratori (docenti) di creare nuovi corsi sul server.

*Default: `false`*

### `allow_working_time_edition`

**Abilita la modifica del tempo di lavoro del corso**

Attiva questa funzionalità per consentire ai docenti di aggiornare manualmente il tempo trascorso nel corso dagli studenti.

*Default: `false`*

### `course_visibility_change_only_admin`

**Modifiche alla visibilità del corso solo per gli amministratori**

Rimuovi la possibilità per i non amministratori di modificare la visibilità del corso. La visibilità può essere un problema quando ci sono troppi docenti da controllare direttamente. Forzare le visibilità consente all'organizzazione di gestire meglio i cataloghi dei corsi.

*Default: `false`*

### `default_menu_entry_for_course_or_session`

**Voce di menu predefinita per i corsi**

Definisci gli elementi secondari predefiniti della voce 'Corsi' da mostrare se l'utente non è iscritto a nessun corso o sessione.

*Default: `my_courses`*

### `disable_user_conditions_sender_id`

**ID interno dell'utente utilizzato per inviare notifiche di account disabilitati**

Evita di essere troppo personale con gli utenti utilizzando un account 'bot' per inviare e-mail agli utenti quando il loro account viene disabilitato per qualche motivo.

*Default: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Disabilita la possibilità di modificare i coach del corso**

Quando disabilitato, gli amministratori non avranno un link per assegnare rapidamente coach alle sessioni-corsi nella pagina di modifica del corso.

*Default: `false`*

### `drh_allow_access_to_all_students`

**HRM può accedere a tutti gli studenti dalle pagine di report**

[dedotto] Concedi ai manager HR/DRH l'accesso alle pagine di report per tutti gli studenti sulla piattaforma.

*Default: `false`*

### `gamification_mode`

**Modalità di gamification**

Attiva il conseguimento di stelle nei percorsi di apprendimento.

### `go_to_course_after_login`

**Vai direttamente al corso dopo il login**

Quando un utente è iscritto a un corso, vai direttamente al corso dopo il login.

*Default: `false`*

### `load_term_conditions_section`

**Carica la sezione dei termini e condizioni**

L'accordo legale apparirà durante il login o quando si accede a un corso.

*Default: `login`*

### `multiple_url_hide_disabled_settings`

**Nascondi le impostazioni disabilitate negli URL secondari**

Imposta su sì per nascondere completamente le impostazioni in un URL secondario se l'impostazione è disabilitata nell'URL principale (dove il campo access_url_changeable = 0).

*Default: `false`*

### `plugin_redirection_enabled`

**Abilita il plugin di reindirizzamento**

Abilita solo se stai utilizzando il plugin Redirection.

*Default: `false`*

### `redirect_index_to_url_for_logged_users`

**Reindirizza index.php a un URL specifico per gli utenti autenticati**

Se non desideri utilizzare la pagina indice (annunci, corsi popolari, ecc.), puoi definire qui lo script (dalla radice del documento) dove gli utenti verranno reindirizzati quando tentano di caricare l'indice.

### `send_all_emails_to`

**Invia tutte le e-mail a**

Fornisci un elenco di indirizzi e-mail a cui verranno inviate *tutte* le e-mail spedite dalla piattaforma. Le e-mail vengono inviate a questi indirizzi come destinazione visibile.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo utente extra utilizzato per cercare e nominare le sessioni**

Questa impostazione definisce la chiave del campo utente extra (ad esempio, "company") che verrà utilizzata per cercare utenti e definire il nome della sessione quando si registrano studenti da /admin-dashboard/register.

### `teacher_can_select_course_template`

**Il docente può selezionare un corso come modello**

Consenti di scegliere un corso come modello per il nuovo corso che il docente sta creando.

*Default: `true`*

### `update_student_expiration_x_date`

**Imposta la data di scadenza al primo login**

Array che definisce i 'giorni' e i 'mesi' per impostare la data di scadenza dell'account quando l'utente effettua il primo login.

### `user_edition_extra_field_to_check`

**Imposta un campo extra come trigger per la registrazione come ex-studente**

Inserisci qui un'etichetta di campo extra. Se questo campo extra viene aggiornato per qualsiasi utente, viene avviato un processo per verificare l'accesso di questo utente ai corsi con lo stesso campo extra specificato.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Giorni di scadenza predefiniti per ruolo**

Un array di ruolo => numero che rappresenta il numero di giorni che un account ha prima della scadenza, a seconda del ruolo.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Disabilita la cancellazione dell'iscrizione dell'utente da corso/sessione quando l'utente viene rimosso da un gruppo/classe**

[inferito] Quando si rimuove un utente da un gruppo/classe, non cancellare automaticamente la sua iscrizione dai corsi o dalle sessioni associate.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Disabilita la cancellazione dell'iscrizione dell'utente da un corso quando il corso viene rimosso da un gruppo/classe**

[inferito] Quando un corso viene rimosso da un gruppo/classe, non cancellare automaticamente l'iscrizione degli utenti a quel corso.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Disabilita la cancellazione dell'iscrizione dell'utente da una sessione quando la sessione viene rimossa da un gruppo/classe**

[inferito] Quando una sessione viene rimossa da un gruppo/classe, non cancellare automaticamente l'iscrizione degli utenti a quella sessione.

*Default: `false`*