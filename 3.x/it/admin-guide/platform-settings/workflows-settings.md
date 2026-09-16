# Impostazioni dei flussi di lavoro

Interruttori di flusso di lavoro trasversali — creazione dei corsi, convalida delle iscrizioni, flussi di lavoro dei compiti e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Flussi di lavoro**. Questa categoria contiene **23 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_user_course_subscription_by_course_admin`

**Consentire l'iscrizione degli utenti al corso da parte dell'amministratore del corso**

L'attivazione di questa opzione consente all'amministratore del corso di iscrivere gli utenti all'interno di un corso

*Predefinito: `true`*


### `allow_users_to_create_courses`

**Consentire ai non amministratori di creare corsi**

Consentire ai non amministratori (docenti) di creare nuovi corsi sul server

*Predefinito: `false`*


### `allow_working_time_edition`

**Abilitare la modifica del tempo di lavoro nel corso**

Abilitare questa funzionalità per consentire ai docenti di aggiornare manualmente il tempo trascorso nel corso dagli studenti.

*Predefinito: `false`*


### `course_visibility_change_only_admin`

**Modifiche della visibilità del corso solo per gli amministratori**

Rimuovere la possibilità per i non amministratori di modificare la visibilità del corso. La visibilità può costituire un problema quando i docenti da controllare direttamente sono troppi. Forzare le visibilità consente all'organizzazione di gestire meglio i cataloghi dei corsi.

*Predefinito: `false`*


### `default_menu_entry_for_course_or_session`

**Voce di menu predefinita per i corsi**

Definire i sotto-elementi predefiniti della voce «Corsi» da visualizzare se l'utente non è iscritto ad alcun corso né ad alcuna sessione.

*Predefinito: `my_courses`*


### `disable_user_conditions_sender_id`

**ID interno dell'utente utilizzato per inviare le notifiche di account disabilitato**

Evitare un approccio troppo personale con gli utenti utilizzando un account «bot» per inviare e-mail agli utenti quando il loro account viene disabilitato per qualche motivo.

*Predefinito: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Disabilitare la possibilità di modificare i tutor del corso**

Se disabilitata, gli amministratori non dispongono di un collegamento per assegnare rapidamente i tutor ai corsi di sessione nella pagina di modifica del corso.

*Predefinito: `false`*


### `drh_allow_access_to_all_students`

**L'HRM può accedere a tutti gli studenti dalle pagine di reportistica**

[inferito] Concedere ai responsabili HR/DRH l'accesso alle pagine di reportistica per tutti gli studenti della piattaforma.

*Predefinito: `false`*


### `gamification_mode`

**Modalità gamification**

Attivare il conseguimento delle stelle nei percorsi di apprendimento

### `go_to_course_after_login`

**Andare direttamente al corso dopo l'accesso**

Quando un utente è iscritto a un solo corso, andare direttamente al corso dopo l'accesso

*Predefinito: `false`*


### `load_term_conditions_section`

**Caricare la sezione delle condizioni d'uso**

L'accordo legale apparirà durante l'accesso o all'ingresso in un corso.

*Predefinito: `login`*


### `multiple_url_hide_disabled_settings`

**Nascondere le impostazioni disabilitate nei sotto-URL**

Impostare su sì per nascondere completamente le impostazioni in un sotto-URL se l'impostazione è disabilitata nell'URL principale (dove il campo access_url_changeable = 0)

*Predefinito: `false`*


### `plugin_redirection_enabled`

**Abilitare il plugin di reindirizzamento**

Abilitare solo se si sta utilizzando il plugin Redirection

*Predefinito: `false`*


### `redirect_index_to_url_for_logged_users`

**Reindirizzare index.php a un URL indicato per gli utenti autenticati**

Se non si desidera utilizzare la pagina indice (annunci, corsi popolari, ecc.), è possibile definire qui lo script (a partire dalla radice dei documenti) verso cui gli utenti verranno reindirizzati quando tentano di caricare l'indice.

### `send_all_emails_to`

**Inviare tutte le e-mail a**

Fornire un elenco di indirizzi e-mail a cui verranno inviate *tutte* le e-mail inviate dalla piattaforma. Le e-mail vengono inviate a questi indirizzi come destinazione visibile.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo extra utente utilizzato per cercare e nominare le sessioni**

Questa impostazione definisce la chiave del campo extra utente (ad es. «company») che verrà utilizzata per cercare gli utenti e per definire il nome della sessione al momento della registrazione degli studenti da /admin-dashboard/register.

### `teacher_can_select_course_template`

**Il docente può selezionare un corso come modello**

Consentire di scegliere un corso come modello per il nuovo corso che il docente sta creando

*Predefinito: `true`*


### `update_student_expiration_x_date`

**Impostare la data di scadenza al primo accesso**

Array che definisce i «giorni» e i «mesi» per impostare la data di scadenza dell'account al primo accesso dell'utente.

### `user_edition_extra_field_to_check`

**Impostare un campo extra come attivatore per la registrazione come ex-studente**

Indicare qui l'etichetta di un campo extra. Se questo campo extra viene aggiornato per un qualsiasi utente, viene avviato un processo per verificare l'accesso di tale utente ai corsi con lo stesso campo extra indicato.

### `user_number_of_days_for_default_expiration_date_per_role`

**Giorni di scadenza predefiniti per ruolo**

Un array di ruolo => numero che rappresenta il numero di giorni di validità di un account prima della scadenza, in base al ruolo.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Disabilita la disiscrizione dell'utente da corso/sessione alla disiscrizione dell'utente da gruppo/classe**

[inferred] Quando si rimuove un utente da un gruppo/classe, non disiscriverlo automaticamente dai corsi o dalle sessioni associati.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Disabilita la disiscrizione dell'utente dal corso alla rimozione del corso da gruppo/classe**

[inferred] Quando un corso viene rimosso da un gruppo/classe, non disiscrivere automaticamente gli utenti da quel corso.

*Default: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Disabilita la disiscrizione dell'utente dalla sessione alla rimozione della sessione da gruppo/classe**

[inferred] Quando una sessione viene rimossa da un gruppo/classe, non disiscrivere automaticamente gli utenti da quella sessione.

*Default: `false`*