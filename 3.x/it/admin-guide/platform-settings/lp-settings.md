# Impostazioni dei Percorsi formativi

Valori predefiniti e comportamento dello strumento **Percorsi formativi** — avvio automatico, vista predefinita, prerequisiti, comportamento SCORM e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Percorsi formativi**. Questa categoria contiene **51 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_all_files_in_lp_export`

**Esportare tutti i file durante l'esportazione di un percorso formativo**

Durante l'esportazione di un LP, tutti i file e le cartelle nello stesso percorso di un html verranno esportati anch'essi.

*Predefinito: `false`*


### `allow_htaccess_import_from_scorm`

**Consentire .htaccess dai pacchetti SCORM**

Normalmente, tutti i file .htaccess vengono filtrati e rimossi durante l'importazione di contenuti in Chamilo. Questa funzionalità consente di importare .htaccess se è presente in un pacchetto SCORM.

*Predefinito: `false`*


### `allow_import_scorm_package_in_course_builder`

**Importazione SCORM all'interno dell'importazione del corso**

Abilita la copia della struttura di directory dei pacchetti SCORM durante il ripristino di un corso (dallo strumento di manutenzione del corso).

*Predefinito: `false`*


### `allow_lp_chamilo_export`

**Esportare i percorsi formativi nel formato di backup Chamilo**

Abilita la possibilità di esportare uno qualsiasi dei propri percorsi formativi in un formato di backup del corso Chamilo.

*Predefinito: `false`*


### `allow_lp_return_link`

**Mostrare il collegamento di ritorno dei percorsi formativi**

Disabilitare questa opzione per nascondere il pulsante «Ritorna alla homepage» nei percorsi formativi

*Predefinito: `true`*


### `allow_lp_subscription_to_usergroups`

**Iscrizione ai percorsi formativi per le classi**

Abilita l'iscrizione a percorsi formativi e categorie di percorsi formativi per gruppi/classi.

*Predefinito: `false`*


### `allow_session_lp_category`

**Le categorie dei percorsi formativi possono essere gestite nelle sessioni**

[inferred] Consente a discenti e docenti di organizzare e gestire i percorsi formativi per categorie all'interno dei corsi di sessione.

*Predefinito: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**I docenti possono accedere ai percorsi formativi bloccati**

I docenti non devono completare interamente i percorsi formativi per avere accesso a un percorso formativo bloccato da prerequisiti.

*Predefinito: `false`*


### `disable_js_in_lp_view`

**Disabilitare JS nella vista dei percorsi formativi**

Disabilita i file JS che Chamilo di solito aggiunge ai file HTML nel percorso formativo (durante la visualizzazione).

*Predefinito: `false`*


### `disable_my_lps_page`

**Nascondere la pagina «I miei percorsi formativi»**

La pagina «Il mio percorso formativo» è stata aggiunta in 1.11. Utilizzare questa opzione per nasconderla.

*Predefinito: `false`*

### `download_files_after_all_lp_finished`

**Pulsante di download dopo il completamento dei percorsi formativi**

Mostra il pulsante di download dei file dopo aver completato tutti i LP. Esempio: se ABC è il codice del corso e 1 e 100 sono gli id dei documenti, scegliere: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Modifica dei test inclusi nei percorsi formativi**

Abilita la modifica dei test anche se sono stati inclusi in un percorso formativo. Il comportamento predefinito è impedire la modifica se il test è in un percorso formativo, perché ciò può influire sulla coerenza del tracciamento tra molti discenti se le modifiche al test sono significative.

*Predefinito: `false`*

### `hide_accessibility_label_on_lp_item`

**Nascondere l'etichetta dei requisiti nei percorsi formativi**

Nasconde il tooltip dei prerequisiti sugli elementi del percorso formativo. Si tratta principalmente di una scelta estetica.

*Predefinito: `true`*

### `hide_lp_time`

**Nascondere il tempo dai registri dei percorsi formativi**

Nasconde il tempo trascorso nei percorsi formativi nei report in generale.

*Predefinito: `false`*

### `hide_scorm_copy_link`

**Nascondere Copia SCORM**

Nasconde l'icona Copia percorso formativo dall'elenco dei Percorsi formativi

*Predefinito: `false`*

### `hide_scorm_export_link`

**Nascondere Esportazione SCORM**

Nasconde l'icona Esportazione SCORM dall'elenco dei Percorsi formativi

*Predefinito: `false`*

### `hide_scorm_pdf_link`

**Nascondere l'esportazione PDF del percorso formativo**

Nasconde l'icona Esportazione PDF del percorso formativo dall'elenco dei Percorsi formativi

*Predefinito: `true`*

### `lp_allow_export_to_students`

**I discenti possono esportare i percorsi formativi**

Abilitare questa opzione per consentire ai discenti di scaricare i percorsi formativi come pacchetti SCORM.

*Predefinito: `false`*

### `lp_enable_flow`

**Navigare tra i percorsi formativi**

Aggiunge la possibilità di selezionare un percorso formativo «successivo» e mostra pulsanti all'interno del percorso formativo per passare da uno all'altro.

*Predefinito: `false`*

### `lp_fixed_encoding`

**Codifica fissa nel percorso formativo**

Riduce l'utilizzo delle risorse ignorando un controllo sulla codifica del testo nei percorsi formativi importati.

*Predefinito: `false`*

### `lp_item_prerequisite_dates`

**Prerequisiti basati su date per gli elementi del percorso formativo**

Aggiunge l'opzione di definire prerequisiti con date di inizio e fine per gli elementi del learnpath.

*Predefinito: `false`*

### `lp_menu_location`

**Posizione del menu del percorso formativo**

Impostare su 'left' o 'right' per cambiare il lato del menu del percorso formativo.

*Default: `left`*

### `lp_minimum_time`

**Tempo minimo per completare il percorso formativo**

Aggiunge un campo di tempo minimo ai percorsi formativi. Se l'utente non ha trascorso quel tempo sul percorso formativo, l'ultimo elemento del percorso formativo non può essere completato.

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Sbloccare l'elemento del percorso formativo se è stato raggiunto il numero massimo di tentativi per il prerequisito del test**

[inferred] Sblocca automaticamente gli elementi successivi del percorso formativo quando un discente esaurisce i tentativi massimi del quiz per un test prerequisito.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Sbloccare i prerequisiti dopo l'ultimo tentativo del test**

Consente agli utenti di proseguire in un percorso formativo dopo aver utilizzato tutti i tentativi del quiz di un test usato come prerequisito per altri elementi.

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usare l'ultimo punteggio nei prerequisiti dei test del percorso formativo**

Quando un test è usato come prerequisito per un elemento nel percorso formativo, usa solo l'ultimo tentativo del test come convalida del prerequisito (il valore predefinito è usare il tentativo migliore).

*Default: `false`*

### `lp_prevents_beforeunload`

**Impedire l'evento JS beforeunload nel percorso formativo**

Aiuta la compatibilità con i browser impedendo l'esecuzione di eventi JS problematici.

*Default: `false`*

### `lp_score_as_progress_enable`

**Usare il punteggio del percorso formativo come progresso**

Utile quando si usa contenuto SCORM con un solo SCO di grandi dimensioni. SCORM non comunica il progresso, quindi questo è un espediente per usare il punteggio come progresso. Abilitando questa opzione sarà possibile configurarla per ciascun percorso formativo.

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrare il progresso massimo invece della media nei report dei percorsi formativi**

[inferred] Calcola il progresso del percorso formativo in base al completamento massimo degli elementi piuttosto che alla media di tutti gli elementi.

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Selezionare progresso massimo o media per i percorsi formativi a livello di corso**

Abilita la ridefinizione dell'impostazione per mostrare il progresso migliore invece delle medie nei report dei percorsi formativi a livello di corso.

*Default: `false`*

### `lp_show_reduced_report`

**Percorsi formativi: mostrare report ridotto**

All'interno dello strumento dei percorsi formativi, quando un utente consulta i propri progressi (tramite l'icona delle statistiche), mostra una versione abbreviata (meno dettagliata) del report di progresso.

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostrare la disponibilità del percorso formativo ai discenti**

Mostra i percorsi formativi ai discenti con le relative date di disponibilità, invece di nasconderli fino al raggiungimento della data.

*Default: `false`*

### `lp_subscription_settings`

**Impostazioni di iscrizione ai percorsi formativi**

Configura opzioni aggiuntive per la funzione di iscrizione ai percorsi formativi. Le opzioni includono 'allow_add_users_to_lp' e 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Elementi pieghevoli dei percorsi formativi**

[inferred] Visualizza gli elementi del percorso formativo in formato accordion comprimibile per una navigazione e un'organizzazione dei contenuti migliorate.

*Default: `false`*

### `lp_view_settings`

**Impostazioni di visualizzazione del percorso formativo**

Configura opzioni aggiuntive per la visualizzazione dei percorsi formativi. Le opzioni includono 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' e 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usare un campo extra come student\_id nella comunicazione SCORM**

Indicare il nome del campo extra da usare come student_id per tutta la comunicazione SCORM.

### `scorm_api_username_as_student_id`

**Usare il nome utente come student\_id nella comunicazione SCORM**

[inferred] Usa il nome utente del discente come identificatore studente nella comunicazione API SCORM invece dell'ID del discente.

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**Aggiornare lo stato dello SCO in modo autonomo**

Se lo SCO non invia uno stato, subentra e aggiorna lo stato in base a quanto osservabile in Chamilo.

*Default: `false`*

### `scorm_upload_from_cache`

**Caricare SCORM dalla directory cache**

Consente agli amministratori di caricare un pacchetto SCORM (in formato zip) nella directory cache e di usarlo come origine di importazione nella pagina di caricamento SCORM.

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostrare i test dei percorsi formativi anche se invisibili**

Mostra gli esercizi nascosti che sono stati aggiunti a un LP nell'elenco degli esercizi. Se si è in una sessione, il test è invisibile nel corso di base, è incluso in un LP e l'impostazione per mostrarlo non è impostata specificamente su true, allora nasconderlo.

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostrare i test nell'elenco dei test del percorso formativo anche se invisibili**

[inferred] Include i test nascosti nell'elenco dei test disponibili quando si visualizzano i contenuti del percorso formativo.

*Default: `false`*

### `show_invisible_exercise_in_lp_toc`

**Test invisibili visibili nei percorsi di apprendimento**

Fa sì che i test contrassegnati come «invisibili» nello strumento test appaiano quando sono inclusi in un percorso di apprendimento.

*Default: `false`*

### `show_invisible_lp_in_course_home`

**Mostra il collegamento al percorso di apprendimento nella home del corso quando è invisibile**

Se un percorso di apprendimento è impostato come invisibile ma il docente/tutor ha deciso di renderlo disponibile dalla homepage del corso, questa opzione impedisce a Chamilo di nascondere il collegamento sulla homepage del corso.

*Default: `false`*

### `show_prerequisite_as_blocked`

**Prerequisiti dei percorsi di apprendimento**

Nelle liste dei percorsi di apprendimento, mostra un elemento visivo per indicare che altri percorsi di apprendimento sono attualmente bloccati da una regola di prerequisiti.

*Default: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Aggiungi colonna di acquisizione nel follow-up dello studente**

Aggiunge una colonna alla pagina di follow-up dello studente per mostrare lo stato di acquisizione di un percorso di apprendimento da parte dello studente.

*Default: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Aggiungi informazioni di visibilità per i percorsi di apprendimento nella pagina di follow-up dello studente**

[inferred] Mostra un indicatore dello stato di visibilità dei percorsi di apprendimento nella pagina di monitoraggio dei progressi dello studente.

*Default: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informazioni di sblocco nell'elenco dei percorsi di apprendimento**

Aggiunge una colonna «sbloccato» nell'elenco dei percorsi di apprendimento se lo studente è iscritto al percorso di apprendimento indicato e vi ha accesso.

*Default: `false`*

### `student_follow_page_hide_lp_tests_average`

**Nascondi il segno di percentuale nella media dei test nei percorsi di apprendimento nel follow-up dello studente**

Nasconde l'icona della percentuale nell'indicazione «Media dei test nei percorsi di apprendimento» nel monitoraggio dello studente

*Default: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Includi i percorsi di apprendimento non sottoscritti nella pagina di follow-up dello studente**

[inferred] Mostra i percorsi di apprendimento nelle pagine di progresso anche quando gli studenti non vi sono iscritti.

*Default: `false`*

### `ticket_lp_quiz_info_add`

**Aggiungi informazioni su percorsi di apprendimento e test alla segnalazione dei ticket**

[inferred] Include le informazioni sui percorsi di apprendimento e sui test nella segnalazione dei ticket di supporto per un migliore tracciamento dei problemi.

*Default: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usa lo stato degli elementi del percorso di apprendimento da altre sessioni**

Consente agli utenti di soddisfare i prerequisiti in un percorso di apprendimento se l'elemento corrispondente è già stato completato in un'altra sessione.

*Default: `false`*