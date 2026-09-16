# Impostazioni delle sessioni

Valori predefiniti e comportamento per le **Sessioni** — ciclo di vita della sessione, finestre di accesso dei tutor, visibilità dei corsi all'interno di una sessione e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Sessioni**. Questa categoria contiene **68 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_users_by_coach`

**Consentire ai tutor di registrare utenti**

I tutor possono creare utenti sulla piattaforma e iscrivere utenti a una sessione.

*Predefinito: `false`*

### `allow_career_diagram`

**Abilitare i diagrammi di carriera**

I diagrammi di carriera consentono di visualizzare diagrammi di carriere, competenze e corsi.

*Predefinito: `false`*


### `allow_career_users`

**Abilitare i diagrammi di carriera per gli utenti**

Se i diagrammi di carriera sono abilitati, gli utenti possono vederli (e solo i diagrammi corrispondenti ai propri studi) solo se si abilita questa opzione.

*Predefinito: `false`*

### `allow_coach_to_edit_course_session`

**Consentire ai tutor di modificare all'interno delle sessioni dei corsi**

Consentire ai tutor di modificare all'interno delle sessioni dei corsi

*Predefinito: `true`*

### `allow_delete_user_for_session_admin`

**Gli amministratori di sessione possono eliminare gli utenti**

Gli amministratori di sessione possono rimuovere gli utenti dalla piattaforma durante la gestione della/e propria/e sessione/i.

*Predefinito: `false`*


### `allow_disable_user_for_session_admin`

**Gli amministratori di sessione possono disabilitare gli utenti**

Gli amministratori di sessione possono disabilitare gli account utente per impedire l'accesso mantenendo i record di iscrizione nella/e propria/e sessione/i.

*Predefinito: `false`*


### `allow_edit_tool_visibility_in_session`

**Consentire la modifica della visibilità degli strumenti nelle sessioni**

Quando si utilizzano le sessioni, il comportamento predefinito è usare la visibilità degli strumenti definita nel corso base. Questa impostazione lo modifica per consentire ai tutor nei corsi in sessione di adattare le visibilità degli strumenti alle proprie esigenze.

*Predefinito: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Reindirizzare alla sessione dopo la registrazione nella pagina «Informazioni» della sessione**

Reindirizzare automaticamente i nuovi utenti alla pagina della propria sessione dopo aver completato la registrazione tramite la pagina Informazioni di una sessione.

*Predefinito: `false`*


### `allow_search_diagnostic`

**Abilitare la diagnosi di ricerca delle sessioni**

Consentire ai tutor di ottenere una diagnosi che permetta loro di cercare le sessioni più adatte per gli studenti.

*Predefinito: `false`*


### `allow_session_admin_extra_access`

**L'amministratore di sessione può accedere all'importazione, all'aggiornamento e all'esportazione batch degli utenti**

Gli amministratori di sessione possono accedere alle funzionalità di importazione, aggiornamento ed esportazione batch degli utenti, in aggiunta alle proprie autorizzazioni standard.

*Predefinito: `false`*


### `allow_session_admin_login_as_teacher`

**Gli amministratori di sessione possono «accedere come» docenti**

Gli amministratori di sessione possono impersonare gli account dei docenti per visualizzare in anteprima i contenuti del corso e l'esperienza dello studente all'interno della/e propria/e sessione/i.

*Predefinito: `false`*


### `allow_session_admin_read_careers`

**Gli amministratori di sessione possono visualizzare le carriere**

[inferred] Gli amministratori di sessione possono visualizzare e accedere ai percorsi di carriera e ai flussi di promozione collegati alle sessioni da loro gestite.

*Predefinito: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Consentire agli amministratori di sessione di vedere tutte le sessioni**

Quando questa opzione non è abilitata (predefinito), gli amministratori di sessione possono vedere solo le sessioni che hanno creato. Ciò è fonte di confusione in un ambiente aperto in cui gli amministratori di sessione potrebbero dover condividere il tempo di supporto tra due sessioni.

*Predefinito: `false`*

### `allow_session_course_copy_for_teachers`

**Consentire la copia da sessione a sessione per i docenti**

Abilitare questa opzione per consentire ai docenti di copiare i propri contenuti da un corso in una sessione a un corso in un'altra sessione. Per impostazione predefinita, questa opzione è disponibile solo per gli amministratori della piattaforma.

*Predefinito: `false`*

### `allow_teachers_to_create_sessions`

**Consentire ai docenti di creare sessioni**

I docenti possono creare, modificare ed eliminare le proprie sessioni.

*Predefinito: `false`*

### `allow_tutors_to_assign_students_to_session`

**I tutor possono assegnare gli studenti alle sessioni**

Se abilitata, i tutor dei corsi nelle sessioni possono iscrivere nuovi utenti alla propria sessione. Questa opzione è altrimenti disponibile solo per gli amministratori e gli amministratori di sessione.

*Predefinito: `false`*

### `allow_user_session_collabsable`

**Consentire all'utente di comprimere le sessioni in Le mie sessioni**

Gli utenti possono comprimere le schede o i gruppi di sessioni nella pagina Le mie sessioni per ridurre il disordine visivo e migliorare la navigazione.

*Predefinito: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Il docente del corso base può vedere i compiti di tutte le sessioni**

Mostrare tutte le pubblicazioni degli studenti (dal corso base e da tutte le sessioni) nella pagina work/pending.php del corso base.

*Predefinito: `false`*

### `career_diagram_disclaimer`

**Mostra una dichiarazione di non responsabilità sotto il diagramma della carriera**

Aggiunge una dichiarazione di non responsabilità sotto il diagramma della carriera. Deve esistere una variabile di lingua chiamata 'Career diagram disclaimer' nella sotto-lingua.

*Default: `false`*

### `career_diagram_legend`

**Mostra una legenda sotto il diagramma della carriera**

Aggiunge una legenda della carriera sotto il diagramma della carriera. Deve esistere una variabile di lingua chiamata 'Career diagram legend' nella sotto-lingua.

*Default: `false`*

### `courses_list_session_title_link`

**Tipo di collegamento per il titolo della sessione**

Nella pagina corsi/sessioni, il titolo della sessione può essere uno dei seguenti: 0 = nessun collegamento (nascondi il titolo della sessione) ; 1 = collega il titolo a una pagina speciale della sessione ; 2 = collega al corso se c'è un solo corso ; 3 = il titolo della sessione rende pieghevole l'elenco dei corsi ; 4 = nessun collegamento (mostra il titolo della sessione).

*Default: `1`*

### `default_session_list_view`

**Vista predefinita dell'elenco delle sessioni**

Seleziona la scheda predefinita che si desidera visualizzare all'apertura dell'elenco delle sessioni come amministratore.

*Default: `all`*


### `drh_can_access_all_session_content`

**I direttori delle risorse umane accedono a tutti i contenuti della sessione**

Se abilitata, i direttori delle risorse umane otterranno l'accesso a tutti i contenuti e agli utenti delle sessioni che seguono.

*Default: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Abilita la copia del contenuto specifico della sessione in un'altra sessione**

Consente la duplicazione delle risorse create nella sessione durante la duplicazione della sessione.

*Default: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Aggiungi il collegamento di reimpostazione della password all'e-mail di notifica dell'iscrizione alla sessione**

Include un collegamento di reimpostazione della password nelle e-mail di conferma dell'iscrizione inviate agli utenti quando vengono iscritti a una sessione.

*Default: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Aggiungi il nome utente all'e-mail di notifica dell'iscrizione alla sessione**

Include il nome utente dell'utente nelle e-mail di conferma dell'iscrizione inviate quando vengono iscritti a una sessione.

*Default: `false`*


### `enable_auto_reinscription`

**Abilita la reiscrizione automatica**

Abilita o disabilita la reiscrizione automatica alla scadenza della validità del corso. Deve essere attivato anche il relativo cron job.

*Default: `false`*


### `enable_session_replication`

**Abilita la replica delle sessioni**

Abilita o disabilita la replica automatica delle sessioni. Deve essere attivato anche il relativo cron job.

*Default: `false`*


### `extend_rights_for_coach`

**Estendi i diritti per i tutor**

Abilita questa opzione per assegnare ai tutor le stesse autorizzazioni dei formatori sugli strumenti di authoring

*Default: `false`*

### `hide_courses_in_sessions`

**Nascondi l'elenco dei corsi nelle sessioni**

Quando si mostra il blocco della sessione nella pagina dei corsi, nasconde l'elenco dei corsi all'interno di quella sessione (li mostra solo nella schermata specifica della sessione).

*Default: `false`*

### `hide_reporting_session_list`

**Nascondi l'elenco delle sessioni nello strumento di reporting**

Le sessioni che includono il corso sono elencate nello strumento di reporting all'interno del corso stesso, il che può aggiungere un peso considerevole se lo stesso corso è utilizzato in centinaia di sessioni. Questa opzione rimuove tale elenco.

*Default: `false`*


### `hide_search_form_in_session_list`

**Nascondi il modulo di ricerca nell'elenco delle sessioni**

Rimuove il campo di input di ricerca dalla vista dell'elenco delle sessioni nell'interfaccia di amministrazione.

*Default: `false`*


### `hide_session_graph_in_my_progress`

**Nascondi il grafico della sessione in I miei progressi**

Nasconde i grafici e le visualizzazioni dei progressi della sessione dalla pagina I miei progressi nelle dashboard degli studenti.

*Default: `false`*


### `hide_tab_list`

**Nascondi le schede nella pagina della sessione**

Rimuove le schede di navigazione dalla pagina di dettaglio della sessione per semplificare l'interfaccia.

### `limit_session_admin_list_users`

**Agli amministratori di sessione è vietato l'accesso all'elenco degli utenti**

Impedisce agli amministratori di sessione di accedere all'elenco globale degli utenti nell'interfaccia di amministrazione.

*Default: `false`*


### `limit_session_admin_role`

**Limita le autorizzazioni degli amministratori di sessione**

Se abilitata, gli amministratori di sessione vedranno solo il blocco Utente con l'opzione 'Aggiungi utente' e il blocco Sessioni con l'opzione 'Elenco sessioni'.

*Default: `false`*

### `my_courses_session_order`

**Modifica l'ordinamento predefinito delle sessioni in Le mie sessioni**

Per impostazione predefinita, le sessioni sono ordinate per data di inizio. Modificare questo valore fornendo un array di tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Visualizza i miei corsi per sessione**

Abilita una pagina aggiuntiva 'I miei corsi' in cui le sessioni appaiono come parte dei corsi, piuttosto che il contrario.

*Default: `false`*

### `my_progress_session_show_all_courses`

**I miei progressi: mostra i dettagli del corso nella sessione**

Mostra tutti i dettagli di ciascun corso nella sessione quando si fa clic sui dettagli della sessione.

*Default: `false`*


### `prevent_session_admins_to_manage_all_users`

**Impedisci agli amministratori di sessione di gestire tutti gli utenti**

Abilitando questa opzione, gli amministratori di sessione potranno vedere, nella pagina di amministrazione, solo gli utenti che hanno creato.

*Default: `false`*

### `remove_session_url`

**Nascondi il collegamento alla pagina della sessione**

Nasconde il collegamento alla pagina della sessione dall'elenco delle sessioni.

*Default: `false`*


### `session_admins_access_all_content`

**Gli amministratori di sessione possono accedere a tutti i contenuti del corso**

Gli amministratori di sessione possono visualizzare tutti i contenuti del corso all'interno delle proprie sessioni, compresi i materiali con restrizioni o archiviati.

*Default: `false`*

### `session_admins_edit_courses_content`

**Gli amministratori di sessione possono modificare i contenuti del corso**

Gli amministratori di sessione possono modificare i contenuti del corso (documenti, esercizi, strumenti) nei corsi assegnati alle loro sessioni.

*Default: `false`*

### `session_automatic_creation_user_id`

**ID del creatore delle sessioni create automaticamente**

Imposta l'utente da utilizzare come creatore delle sessioni create automaticamente (per evitare di assegnare ogni sessione all'utente '1', che spesso è l'amministratore del portale).

*Default: `1`*


### `session_classes_tab_disable`

**Disabilita l'aggiunta di classi nel corso di sessione per i non amministratori**

Disabilita la scheda per aggiungere classi nel corso di sessione per i non amministratori.

*Default: `false`*


### `session_coach_access_after_duration_end`

**Sessioni per durata sempre disponibili per i tutor**

In caso contrario, i tutor di sessione hanno accesso alle sessioni per durata solo durante la durata attiva.

*Default: `false`*


### `session_course_ordering`

**Ordinamento manuale dei corsi di sessione**

Abilitare questa opzione per consentire agli amministratori di sessione di ordinare manualmente i corsi all'interno di una sessione. Se disabilitata, i corsi sono ordinati in ordine alfabetico in base al titolo del corso.

*Default: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitare le iscrizioni al corso ai soli utenti della sessione**

Restringe l'elenco degli studenti da iscrivere nel corso di sessione. E disabilita la registrazione degli utenti in tutti i corsi dalla pagina Riepilogo sessione.

*Default: `false`*


### `session_courses_read_only_mode`

**Impostare il corso in sola lettura nella sessione**

Consente ai docenti di impostare alcuni corsi in modalità sola lettura quando aperti tramite le sessioni. Nelle proprietà del corso, selezionare l'opzione 'Blocca corso in sessione'.

*Default: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Impostare campi extra obbligatori nel modulo di creazione sessione**

Rende obbligatori i campi elencati durante la creazione della sessione.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Precompilare i campi della sessione con i campi utente**

Array di relazioni tra i campi extra dell'utente e i campi extra della sessione, in modo che la sessione possa essere precompilata con dati corrispondenti a quelli dell'utente.

### `session_days_after_coach_access`

**Giorni di accesso predefiniti del tutor dopo la sessione**

Numero predefinito di giorni in cui un tutor può accedere a una sessione dopo la data ufficiale di fine sessione

### `session_days_before_coach_access`

**Giorni di accesso predefiniti del tutor prima della sessione**

Numero predefinito di giorni in cui un tutor può accedere a una sessione prima della data ufficiale di inizio sessione

### `session_import_settings`

**Opzioni per l'importazione delle sessioni**

Array di opzioni da applicare come parametri predefiniti nell'importazione CSV/XML delle sessioni.

### `session_list_order`

**Le sessioni supportano l'ordinamento manuale**

Abilita il riordinamento manuale delle sessioni nell'elenco sessioni dell'amministrazione tramite trascinamento o meccanismo analogo.

*Default: `false`*


### `session_list_show_count_users`

**Mostra il numero di utenti nell'elenco delle sessioni**

L'amministratore può vedere il numero di utenti in ciascuna sessione. Questo aggiunge un carico aggiuntivo all'elenco delle sessioni, quindi se lo si usa spesso, valutare attentamente se si desidera il tempo di attesa extra.

*Default: `false`*


### `session_list_view_remaining_days`

**Mostra i giorni rimanenti in Le mie sessioni**

Se abilitata, le date della sessione nella pagina "Le mie sessioni" saranno sostituite dal numero di giorni rimanenti.

*Default: `false`*

### `session_model_list_field_ordered_by_id`

**Ordina i modelli di sessione per id nel modulo di creazione sessione**

[inferred] Ordina i modelli di sessione in base al loro ID numerico nel menu a discesa del modulo di creazione sessione invece che in ordine alfabetico per nome.

*Default: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Impedire lo svuotamento degli utenti iscritti nell'iscrizione alla sessione**

Quando si utilizza l'iscrizione multipla di studenti a una sessione, impedisce il comportamento normale che consiste nel disiscrivere gli utenti che non si trovano nel riquadro di destra al clic su invio. Mantiene tutti gli utenti presenti.

*Default: `false`*


### `show_all_sessions_on_my_course_page`

**Mostra tutte le sessioni nella pagina 'I miei corsi'**

Se abilitata, questa opzione mostra tutte le sessioni dell'utente in una vista basata sul calendario.

*Default: `true`*


### `show_session_coach`

**Mostra il tutor di sessione**

Mostra il nome del tutor generale della sessione nella casella del titolo della sessione nell'elenco dei corsi

*Default: `false`*

### `show_session_data`

**Mostra il titolo dei dati di sessione**

Mostra il commento dei dati di sessione

*Default: `false`*

### `show_session_description`

**Mostra la descrizione della sessione**

Mostra la descrizione della sessione ovunque questa opzione sia implementata (pagine di tracciamento delle sessioni, ecc.)

*Default: `false`*

### `show_simple_session_info`

**Mostra informazioni sessione semplificate**

Aggiunge il tutor e le date al sottotitolo della sessione nell'elenco delle sessioni.

*Default: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostra solo gli utenti delle sessioni attive nel tracking**

Mostra solo gli utenti delle sessioni attualmente attive nelle viste di tracking e reporting degli studenti.

*Default: `false`*


### `tracking_columns`

**Personalizza le colonne di tracking corso-sessione**

Definisce un array di colonne per i seguenti report: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durata delle sessioni create automaticamente**

Durata (in giorni) delle sessioni a utente singolo create automaticamente. Dopo la scadenza, l'utente non può iscriversi allo stesso corso (non viene creata un'altra sessione).

*Default: `1095`*


### `user_session_display_mode`

**Modalità di visualizzazione Le mie sessioni**

Scegliere come viene visualizzata la pagina "Le mie sessioni": come vista a blocchi visivi moderni (card) o nello stile elenco classico.

*Default: `list`*