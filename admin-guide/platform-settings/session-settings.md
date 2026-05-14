# Impostazioni delle Sessioni

Impostazioni predefinite e comportamento per le **Sessioni** — ciclo di vita delle sessioni, finestre di accesso per i coach, visibilità dei corsi all'interno di una sessione e simili.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Sessioni**. Questa categoria contiene **68 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_users_by_coach`

**Registrazione utenti da parte del Coach**

Gli utenti coach possono creare utenti sulla piattaforma e iscrivere utenti a una sessione.

*Predefinito: `false`*

### `allow_career_diagram`

**Abilita diagrammi di carriera**

I diagrammi di carriera consentono di visualizzare diagrammi di carriere, competenze e corsi.

*Predefinito: `false`*

### `allow_career_users`

**Abilita diagrammi di carriera per gli utenti**

Se i diagrammi di carriera sono abilitati, gli utenti possono vederli (e solo i diagrammi corrispondenti ai loro studi) se abiliti questa opzione.

*Predefinito: `false`*

### `allow_coach_to_edit_course_session`

**Consenti ai coach di modificare all'interno delle sessioni dei corsi**

Consenti ai coach di effettuare modifiche all'interno delle sessioni dei corsi.

*Predefinito: `true`*

### `allow_delete_user_for_session_admin`

**Gli amministratori di sessione possono eliminare utenti**

Gli amministratori di sessione possono rimuovere utenti dalla piattaforma durante la gestione delle loro sessioni.

*Predefinito: `false`*

### `allow_disable_user_for_session_admin`

**Gli amministratori di sessione possono disabilitare utenti**

Gli amministratori di sessione possono disabilitare account utente per impedire l'accesso, mantenendo i record di iscrizione nelle loro sessioni.

*Predefinito: `false`*

### `allow_edit_tool_visibility_in_session`

**Consenti la modifica della visibilità degli strumenti nelle sessioni**

Quando si utilizzano le sessioni, il comportamento predefinito è quello di utilizzare la visibilità degli strumenti definita nel corso base. Questa impostazione cambia tale comportamento per consentire ai coach nei corsi di sessione di adattare la visibilità degli strumenti alle loro esigenze.

*Predefinito: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Reindirizza alla sessione dopo la registrazione nella pagina 'Informazioni' della sessione**

Reindirizza automaticamente i nuovi utenti alla pagina della loro sessione dopo aver completato la registrazione tramite la pagina Informazioni di una sessione.

*Predefinito: `false`*

### `allow_search_diagnostic`

**Abilita la diagnosi di ricerca delle sessioni**

Consenti ai tutor di ottenere una diagnosi che permetta loro di cercare le migliori sessioni per gli studenti.

*Predefinito: `false`*

### `allow_session_admin_extra_access`

**Gli amministratori di sessione possono accedere all'importazione, aggiornamento ed esportazione batch di utenti**

Gli amministratori di sessione possono accedere alle funzionalità di importazione, aggiornamento ed esportazione batch di utenti oltre ai loro permessi standard.

*Predefinito: `false`*

### `allow_session_admin_login_as_teacher`

**Gli amministratori di sessione possono 'accedere come' insegnanti**

Gli amministratori di sessione possono impersonare account di insegnanti per visualizzare in anteprima i contenuti del corso e l'esperienza degli studenti all'interno delle loro sessioni.

*Predefinito: `false`*

### `allow_session_admin_read_careers`

**Gli amministratori di sessione possono visualizzare le carriere**

[dedotto] Gli amministratori di sessione possono visualizzare e accedere ai percorsi di carriera e ai flussi di promozione collegati alle sessioni da loro gestite.

*Predefinito: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Consenti agli amministratori di sessione di vedere tutte le sessioni**

Quando questa opzione non è abilitata (predefinito), gli amministratori di sessione possono vedere solo le sessioni che hanno creato. Questo può essere confusionario in un ambiente aperto dove gli amministratori di sessione potrebbero dover condividere il tempo di supporto tra due sessioni.

*Predefinito: `false`*

### `allow_session_course_copy_for_teachers`

**Consenti la copia da sessione a sessione per gli insegnanti**

Abilita questa opzione per permettere agli insegnanti di copiare i loro contenuti da un corso in una sessione a un corso in un'altra sessione. Per impostazione predefinita, questa opzione è disponibile solo per gli amministratori della piattaforma.

*Predefinito: `false`*

### `allow_teachers_to_create_sessions`

**Consenti agli insegnanti di creare sessioni**

Gli insegnanti possono creare, modificare ed eliminare le proprie sessioni.

*Predefinito: `false`*

### `allow_tutors_to_assign_students_to_session`

**I tutor possono assegnare studenti alle sessioni**

Quando abilitata, i coach/tutor dei corsi nelle sessioni possono iscrivere nuovi utenti alla loro sessione. Questa opzione è altrimenti disponibile solo per gli amministratori e gli amministratori di sessione.

*Predefinito: `false`*

### `allow_user_session_collapsable`

**Consenti agli utenti di comprimere le sessioni in Le mie sessioni**

Gli utenti possono comprimere le schede o i gruppi di sessioni nella pagina Le mie sessioni per ridurre l'ingombro visivo e migliorare la navigazione.

*Predefinito: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**L'insegnante del corso base può vedere gli incarichi di tutte le sessioni**

Mostra tutte le pubblicazioni degli studenti (dal corso base e da tutte le sessioni) nella pagina work/pending.php del corso base.

*Predefinito: `false`*

---
### `career_diagram_disclaimer`

**Mostra un disclaimer sotto il diagramma della carriera**

Aggiungi un disclaimer sotto il diagramma della carriera. Deve esistere una variabile di lingua chiamata 'Career diagram disclaimer' nella tua sotto-lingua.

*Default: `false`*

### `career_diagram_legend`

**Mostra una legenda sotto il diagramma della carriera**

Aggiungi una legenda della carriera sotto il diagramma della carriera. Deve esistere una variabile di lingua chiamata 'Career diagram legend' nella tua sotto-lingua.

*Default: `false`*

### `courses_list_session_title_link`

**Tipo di collegamento per il titolo della sessione**

Nella pagina dei corsi/sessioni, il titolo della sessione può essere uno dei seguenti: 0 = nessun collegamento (nascondi il titolo della sessione); 1 = collega il titolo a una pagina speciale della sessione; 2 = collega al corso se c'è un solo corso; 3 = il titolo della sessione rende pieghevole l'elenco dei corsi; 4 = nessun collegamento (mostra il titolo della sessione).

*Default: `1`*

### `default_session_list_view`

**Vista predefinita dell'elenco delle sessioni**

Seleziona la scheda predefinita che desideri vedere quando apri l'elenco delle sessioni come amministratore.

*Default: `all`*

### `drh_can_access_all_session_content`

**I direttori delle risorse umane accedono a tutti i contenuti della sessione**

Se abilitato, i direttori delle risorse umane avranno accesso a tutti i contenuti e agli utenti delle sessioni che seguono.

*Default: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Abilita la copia di contenuti specifici della sessione in un'altra sessione**

Consente la duplicazione delle risorse create nella sessione durante la duplicazione della sessione stessa.

*Default: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Aggiungi il link per reimpostare la password alla notifica e-mail di iscrizione alla sessione**

Include un link per reimpostare la password nelle e-mail di conferma di iscrizione inviate agli utenti quando vengono iscritti a una sessione.

*Default: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Aggiungi il nome utente alla notifica e-mail di iscrizione alla sessione**

Include il nome utente dell'utente nelle e-mail di conferma di iscrizione inviate quando vengono iscritti a una sessione.

*Default: `false`*

### `enable_auto_reinscription`

**Abilita la reiscrizione automatica**

Abilita o disabilita la reiscrizione automatica quando la validità del corso scade. Deve essere attivato anche il relativo cron job.

*Default: `false`*

### `enable_session_replication`

**Abilita la replica della sessione**

Abilita o disabilita la replica automatica della sessione. Deve essere attivato anche il relativo cron job.

*Default: `false`*

### `extend_rights_for_coach`

**Estendi i diritti per il coach**

Attivando questa opzione, il coach avrà gli stessi permessi del formatore sugli strumenti di creazione.

*Default: `false`*

### `hide_courses_in_sessions`

**Nascondi l'elenco dei corsi nelle sessioni**

Quando mostri il blocco della sessione nella pagina dei corsi, nascondi l'elenco dei corsi all'interno di quella sessione (mostrali solo nella schermata specifica della sessione).

*Default: `false`*

### `hide_reporting_session_list`

**Nascondi l'elenco delle sessioni nello strumento di reporting**

Le sessioni che includono il corso sono elencate nello strumento di reporting all'interno del corso stesso, il che può aggiungere un peso considerevole se lo stesso corso è utilizzato in centinaia di sessioni. Questa opzione rimuove quell'elenco.

*Default: `false`*

### `hide_search_form_in_session_list`

**Nascondi il modulo di ricerca nell'elenco delle sessioni**

Rimuovi il campo di input di ricerca dalla vista dell'elenco delle sessioni nell'interfaccia di amministrazione.

*Default: `false`*

### `hide_session_graph_in_my_progress`

**Nascondi il grafico della sessione in Il mio progresso**

Nascondi i grafici e le visualizzazioni del progresso della sessione dalla pagina Il mio progresso nei dashboard degli studenti.

*Default: `false`*

### `hide_tab_list`

**Nascondi le schede nella pagina della sessione**

Rimuovi le schede di navigazione dalla pagina dei dettagli della sessione per semplificare l'interfaccia.

### `limit_session_admin_list_users`

**Gli amministratori di sessione non possono accedere all'elenco degli utenti**

Impedisci agli amministratori di sessione di accedere all'elenco globale degli utenti nell'interfaccia di amministrazione.

*Default: `false`*

### `limit_session_admin_role`

**Limita i permessi degli amministratori di sessione**

Se abilitato, gli amministratori di sessione vedranno solo il blocco Utenti con l'opzione 'Aggiungi utente' e il blocco Sessioni con l'opzione 'Elenco sessioni'.

*Default: `false`*

### `my_courses_session_order`

**Modifica l'ordinamento predefinito delle sessioni in Le mie sessioni**

Per impostazione predefinita, le sessioni sono ordinate per data di inizio. Modifica questo fornendo un array del tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Visualizza i miei corsi per sessione**

Abilita una pagina aggiuntiva 'I miei corsi' in cui le sessioni appaiono come parte dei corsi, anziché il contrario.

*Default: `false`*

### `my_progress_session_show_all_courses`

**Il mio progresso: mostra i dettagli del corso nella sessione**

Mostra tutti i dettagli di ogni corso nella sessione quando si clicca sui dettagli della sessione.

*Default: `false`*

### `prevent_session_admins_to_manage_all_users`

**Impedisci agli amministratori di sessione di gestire tutti gli utenti**

Abilitando questa opzione, gli amministratori di sessione potranno vedere, nella pagina di amministrazione, solo gli utenti che hanno creato.

*Default: `false`*

---
### `remove_session_url`

**Nascondi il link alla pagina della sessione**

Nascondi il link alla pagina della sessione dall'elenco delle sessioni.

*Predefinito: `false`*


### `session_admins_access_all_content`

**Gli amministratori della sessione possono accedere a tutti i contenuti del corso**

Gli amministratori della sessione possono visualizzare tutti i contenuti del corso all'interno delle loro sessioni, inclusi materiali riservati o archiviati.

*Predefinito: `false`*


### `session_admins_edit_courses_content`

**Gli amministratori della sessione possono modificare i contenuti del corso**

Gli amministratori della sessione possono modificare i contenuti del corso (documenti, esercizi, strumenti) nei corsi assegnati alle loro sessioni.

*Predefinito: `false`*


### `session_automatic_creation_user_id`

**ID del creatore delle sessioni create automaticamente**

Imposta l'utente da utilizzare come creatore delle sessioni create automaticamente (per evitare di assegnare ogni sessione all'utente '1', che spesso è l'amministratore del portale).

*Predefinito: `1`*


### `session_classes_tab_disable`

**Disabilita l'aggiunta di classi nei corsi della sessione per i non amministratori**

Disabilita la scheda per aggiungere classi nei corsi della sessione per gli utenti non amministratori.

*Predefinito: `false`*


### `session_coach_access_after_duration_end`

**Sessioni per durata sempre disponibili per i coach**

In caso contrario, i coach delle sessioni hanno accesso alle sessioni per durata solo durante il periodo attivo.

*Predefinito: `false`*


### `session_course_ordering`

**Ordinamento manuale dei corsi della sessione**

Abilita questa opzione per consentire agli amministratori della sessione di ordinare manualmente i corsi all'interno di una sessione. Se disabilitata, i corsi vengono ordinati alfabeticamente in base al titolo del corso.

*Predefinito: `false`*


### `session_course_users_subscription_limited_to_session_users`

**Limita le iscrizioni al corso solo agli utenti della sessione**

Restringi l'elenco degli studenti che possono iscriversi alla sessione del corso. Disabilita inoltre la registrazione degli utenti a tutti i corsi dalla pagina Riepilogo Sessione.

*Predefinito: `false`*


### `session_courses_read_only_mode`

**Imposta il corso in modalità sola lettura nella sessione**

Consenti agli insegnanti di impostare alcuni corsi in modalità sola lettura quando vengono aperti tramite sessioni. Nelle proprietà del corso, seleziona l'opzione 'Blocca corso nella sessione'.

*Predefinito: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Rendi obbligatori i campi extra nel modulo di creazione della sessione**

Richiedi i campi elencati durante la creazione della sessione.


### `session_creation_user_course_extra_field_relation_to_prefill`

**Precompila i campi della sessione con i dati dell'utente**

Array di relazioni tra i campi extra dell'utente e i campi extra della sessione, in modo che la sessione possa essere precompilata con i dati corrispondenti dell'utente.


### `session_days_after_coach_access`

**Giorni di accesso predefiniti per il coach dopo la sessione**

Numero predefinito di giorni in cui un coach può accedere alla sua sessione dopo la data di fine ufficiale della sessione.


### `session_days_before_coach_access`

**Giorni di accesso predefiniti per il coach prima della sessione**

Numero predefinito di giorni in cui un coach può accedere alla sua sessione prima della data di inizio ufficiale della sessione.


### `session_import_settings`

**Opzioni per l'importazione delle sessioni**

Array di opzioni da applicare come parametri predefiniti nell'importazione di sessioni in formato CSV/XML.


### `session_list_order`

**Supporto per l'ordinamento manuale delle sessioni**

Abilita il riordino manuale delle sessioni nell'elenco di amministrazione delle sessioni tramite drag-and-drop o meccanismi simili.

*Predefinito: `false`*


### `session_list_show_count_users`

**Mostra il numero di utenti nell'elenco delle sessioni**

L'amministratore può vedere il numero di utenti in ogni sessione. Questo aggiunge un peso aggiuntivo all'elenco delle sessioni, quindi se lo utilizzi spesso, considera attentamente se desideri il tempo di attesa extra.

*Predefinito: `false`*


### `session_list_view_remaining_days`

**Mostra i giorni rimanenti in Le mie sessioni**

Se abilitata, le date della sessione nella pagina "Le mie sessioni" verranno sostituite dal numero di giorni rimanenti.

*Predefinito: `false`*


### `session_model_list_field_ordered_by_id`

**Ordina i modelli di sessione per ID nel modulo di creazione della sessione**

Ordina i modelli di sessione in base al loro ID numerico nel menu a tendina del modulo di creazione della sessione invece che alfabeticamente per nome.

*Predefinito: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Impedisci lo svuotamento degli utenti iscritti nella sottoscrizione alla sessione**

Quando si utilizza la sottoscrizione multipla di studenti a una sessione, impedisci il comportamento normale che consiste nel rimuovere gli utenti che non si trovano nel pannello destro al momento dell'invio. Mantieni tutti gli utenti presenti.

*Predefinito: `false`*


### `show_all_sessions_on_my_course_page`

**Mostra tutte le sessioni nella pagina 'I miei corsi'**

Se abilitata, questa opzione mostra tutte le sessioni dell'utente in una vista basata su calendario.

*Predefinito: `true`*


### `show_session_coach`

**Mostra il coach della sessione**

Mostra il nome del coach globale della sessione nella casella del titolo della sessione nell'elenco dei corsi.

*Predefinito: `false`*


### `show_session_data`

**Mostra il titolo dei dati della sessione**

Mostra il commento sui dati della sessione.

*Predefinito: `false`*


### `show_session_description`

**Mostra la descrizione della sessione**

Mostra la descrizione della sessione ovunque questa opzione sia implementata (pagine di monitoraggio delle sessioni, ecc.).

*Predefinito: `false`*

---
### `show_simple_session_info`

**Mostra informazioni semplici sulla sessione**

Aggiunge l'allenatore e le date al sottotitolo della sessione nell'elenco delle sessioni.

*Default: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostra solo gli utenti delle sessioni attive nel monitoraggio**

Visualizza solo gli utenti delle sessioni attualmente attive nelle viste di monitoraggio e report degli studenti.

*Default: `false`*


### `tracking_columns`

**Personalizza le colonne di monitoraggio del corso-sessione**

Definisce un array di colonne per i seguenti report: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durata delle sessioni create automaticamente**

Durata (in giorni) delle sessioni create automaticamente per un singolo utente. Dopo la scadenza, l'utente non può registrarsi allo stesso corso (non viene creata un'altra sessione).

*Default: `1095`*


### `user_session_display_mode`

**Modalità di visualizzazione delle Mie Sessioni**

Scegli come viene visualizzata la pagina "Le Mie Sessioni": come una moderna vista a blocchi visivi (card) o nello stile classico a elenco.

*Default: `list`*