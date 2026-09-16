# Impostazioni dei Percorsi di Apprendimento

Impostazioni predefinite e comportamento dello strumento **Percorsi di Apprendimento** — avvio automatico, vista predefinita, prerequisiti, comportamento SCORM e simili.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Percorsi di Apprendimento**. Questa categoria contiene **51 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_all_files_in_lp_export`

**Esporta tutti i file durante l'esportazione di un percorso di apprendimento**

Durante l'esportazione di un percorso di apprendimento, verranno esportati anche tutti i file e le cartelle nello stesso percorso di un file HTML.

*Predefinito: `false`*

### `allow_htaccess_import_from_scorm`

**Consenti file .htaccess dai pacchetti SCORM**

Normalmente, tutti i file .htaccess vengono filtrati e rimossi durante l'importazione di contenuti in Chamilo. Questa funzione consente di importare file .htaccess se presenti in un pacchetto SCORM.

*Predefinito: `false`*

### `allow_import_scorm_package_in_course_builder`

**Importazione SCORM durante l'importazione di un corso**

Abilita per copiare la struttura delle directory dei pacchetti SCORM durante il ripristino di un corso (dallo strumento di manutenzione del corso).

*Predefinito: `false`*

### `allow_lp_chamilo_export`

**Esporta i percorsi di apprendimento nel formato di backup di Chamilo**

Abilita la possibilità di esportare uno qualsiasi dei tuoi percorsi di apprendimento in un formato di backup del corso di Chamilo.

*Predefinito: `false`*

### `allow_lp_return_link`

**Mostra il link di ritorno nei percorsi di apprendimento**

Disabilita questa opzione per nascondere il pulsante 'Torna alla homepage' nei percorsi di apprendimento.

*Predefinito: `true`*

### `allow_lp_subscription_to_usergroups`

**Iscrizione ai percorsi di apprendimento per classi**

Abilita l'iscrizione ai percorsi di apprendimento e alle categorie di percorsi di apprendimento per gruppi/classi.

*Predefinito: `false`*

### `allow_session_lp_category`

**Le categorie dei percorsi di apprendimento possono essere gestite nelle sessioni**

[inferito] Abilita agli studenti e agli insegnanti di organizzare e gestire i percorsi di apprendimento per categorie all'interno dei corsi di sessione.

*Predefinito: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Gli insegnanti possono accedere ai percorsi di apprendimento bloccati**

Gli insegnanti non devono completare i percorsi di apprendimento per avere accesso a un percorso di apprendimento bloccato da prerequisiti.

*Predefinito: `false`*

### `disable_js_in_lp_view`

**Disabilita JS nella visualizzazione dei percorsi di apprendimento**

Disabilita i file JS che Chamilo solitamente aggiunge ai file HTML nei percorsi di apprendimento (durante la loro visualizzazione).

*Predefinito: `false`*

### `disable_my_lps_page`

**Nascondi la pagina 'I miei percorsi di apprendimento'**

La pagina 'I miei percorsi di apprendimento' è stata aggiunta nella versione 1.11. Usa questa opzione per nasconderla.

*Predefinito: `false`*

### `download_files_after_all_lp_finished`

**Pulsante di download dopo aver completato i percorsi di apprendimento**

Mostra il pulsante per scaricare i file dopo aver completato tutti i percorsi di apprendimento. Esempio: se ABC è il codice del corso, e 1 e 100 sono gli ID dei documenti, scegli: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Modifica dei test inclusi nei percorsi di apprendimento**

Abilita la modifica dei test anche se sono stati inclusi in un percorso di apprendimento. L'impostazione predefinita impedisce la modifica se il test è in un percorso di apprendimento, perché ciò potrebbe influire sulla coerenza del monitoraggio tra molti studenti se le modifiche al test sono significative.

*Predefinito: `false`*

### `hide_accessibility_label_on_lp_item`

**Nascondi l'etichetta dei requisiti nei percorsi di apprendimento**

Nascondi il tooltip dei prerequisiti sugli elementi del percorso di apprendimento. Questa è principalmente una scelta estetica.

*Predefinito: `true`*

### `hide_lp_time`

**Nascondi il tempo dai registri dei percorsi di apprendimento**

Nascondi il tempo trascorso nei percorsi di apprendimento nei rapporti in generale.

*Predefinito: `false`*

### `hide_scorm_copy_link`

**Nascondi Copia SCORM**

Nascondi l'icona di Copia del Percorso di Apprendimento dall'elenco dei Percorsi di Apprendimento.

*Predefinito: `false`*

### `hide_scorm_export_link`

**Nascondi Esportazione SCORM**

Nascondi l'icona di Esportazione SCORM dall'elenco dei Percorsi di Apprendimento.

*Predefinito: `false`*

### `hide_scorm_pdf_link`

**Nascondi Esportazione PDF del Percorso di Apprendimento**

Nascondi l'icona di Esportazione PDF del Percorso di Apprendimento dall'elenco dei Percorsi di Apprendimento.

*Predefinito: `true`*

### `lp_allow_export_to_students`

**Gli studenti possono esportare i percorsi di apprendimento**

Abilita questa opzione per consentire agli studenti di scaricare i percorsi di apprendimento come pacchetti SCORM.

*Predefinito: `false`*

### `lp_enable_flow`

**Naviga tra i percorsi di apprendimento**

Aggiungi la possibilità di selezionare un percorso di apprendimento 'successivo' e mostra pulsanti all'interno del percorso di apprendimento per passare da uno all'altro.

*Predefinito: `false`*

### `lp_fixed_encoding`

**Codifica fissa nei percorsi di apprendimento**

Riduci l'uso delle risorse ignorando un controllo sulla codifica del testo nei percorsi di apprendimento importati.

*Predefinito: `false`*

### `lp_item_prerequisite_dates`

**Prerequisiti degli elementi del percorso di apprendimento basati su date**

Aggiunge l'opzione di definire prerequisiti con date di inizio e fine per gli elementi del percorso di apprendimento.

*Predefinito: `false`*

---
### `lp_menu_location`

**Posizione del menu del percorso di apprendimento**

Imposta su 'left' o 'right' per cambiare il lato del menu del percorso di apprendimento.

*Default: `left`*

### `lp_minimum_time`

**Tempo minimo per completare il percorso di apprendimento**

Aggiunge un campo per il tempo minimo ai percorsi di apprendimento. Se l'utente non ha trascorso almeno quel tempo sul percorso di apprendimento, l'ultimo elemento del percorso non può essere completato.

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Sblocca elemento del percorso di apprendimento se raggiunto il numero massimo di tentativi per il test prerequisito**

[inferito] Sblocca automaticamente gli elementi successivi del percorso di apprendimento quando uno studente esaurisce il numero massimo di tentativi per un test prerequisito.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Sblocca i prerequisiti dopo l'ultimo tentativo di test**

Consente agli utenti di proseguire in un percorso di apprendimento dopo aver utilizzato tutti i tentativi di un test usato come prerequisito per altri elementi.

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usa solo l'ultimo punteggio nei prerequisiti dei test del percorso di apprendimento**

Quando un test è usato come prerequisito per un elemento nel percorso di apprendimento, considera solo l'ultimo tentativo del test come validazione per il prerequisito (di default si usa il miglior tentativo).

*Default: `false`*

### `lp_prevents_beforeunload`

**Impedisci l'evento JS beforeunload nel percorso di apprendimento**

Questo aiuta con la compatibilità del browser impedendo l'esecuzione di eventi JS complessi.

*Default: `false`*

### `lp_score_as_progress_enable`

**Usa il punteggio del percorso di apprendimento come progresso**

Questo è utile quando si utilizza contenuto SCORM con un solo SCO di grandi dimensioni. SCORM non comunica il progresso, quindi questo è un trucco per usare il punteggio come progresso. Abilitando questa opzione, sarà possibile configurarla per ogni percorso di apprendimento.

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostra il progresso massimo invece della media per i report dei percorsi di apprendimento**

[inferito] Calcola il progresso del percorso di apprendimento in base al completamento massimo degli elementi piuttosto che alla media di tutti gli elementi.

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Seleziona progresso massimo o media per i percorsi di apprendimento a livello di corso**

Abilita la ridefinizione dell'impostazione per mostrare il miglior progresso invece delle medie nei report dei percorsi di apprendimento a livello di corso.

*Default: `false`*

### `lp_show_reduced_report`

**Percorsi di apprendimento: mostra report ridotto**

All'interno dello strumento dei percorsi di apprendimento, quando un utente rivede il proprio progresso (tramite l'icona delle statistiche), mostra una versione abbreviata (meno dettagliata) del report di progresso.

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostra la disponibilità dei percorsi di apprendimento agli studenti**

Mostra i percorsi di apprendimento agli studenti con le loro date di disponibilità, invece di nasconderli fino alla data prevista.

*Default: `false`*

### `lp_subscription_settings`

**Impostazioni di iscrizione ai percorsi di apprendimento**

Configura opzioni aggiuntive per la funzionalità di iscrizione ai percorsi di apprendimento. Le opzioni includono 'allow_add_users_to_lp' e 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Elementi dei percorsi di apprendimento pieghevoli**

[inferito] Mostra gli elementi del percorso di apprendimento in formato accordion pieghevole per migliorare la navigazione e l'organizzazione dei contenuti.

*Default: `false`*

### `lp_view_settings`

**Impostazioni di visualizzazione del percorso di apprendimento**

Configura opzioni aggiuntive per la visualizzazione dei percorsi di apprendimento. Le opzioni includono 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' e 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usa campo extra come student_id nella comunicazione SCORM**

Fornisci il nome del campo extra da utilizzare come student_id per tutte le comunicazioni SCORM.

### `scorm_api_username_as_student_id`

**Usa il nome utente come student_id nella comunicazione SCORM**

[inferito] Usa il nome utente dello studente come identificatore dello studente nella comunicazione API SCORM invece dell'ID dello studente.

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**Aggiorna lo stato SCO autonomamente**

Se lo SCO non invia uno stato, prendi il controllo e aggiorna lo stato in base a ciò che può essere osservato in Chamilo.

*Default: `false`*

### `scorm_upload_from_cache`

**Carica SCORM dalla directory cache**

Consenti agli amministratori di caricare un pacchetto SCORM (in formato zip) nella directory cache e di utilizzarlo come fonte di importazione nella pagina di caricamento SCORM.

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostra i test dei percorsi di apprendimento anche se invisibili**

Mostra gli esercizi nascosti che sono stati aggiunti a un percorso di apprendimento nell'elenco degli esercizi. Se ci troviamo in una sessione, il test è invisibile nel corso base, è incluso in un percorso di apprendimento e l'impostazione per mostrarlo non è specificamente impostata su true, allora nascondilo.

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostra i test nell'elenco dei test del percorso di apprendimento anche se invisibili**

[inferito] Include i test nascosti nell'elenco dei test disponibili quando si visualizzano i contenuti del percorso di apprendimento.

*Default: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Test invisibili visibili nei percorsi di apprendimento**

Rende visibili i test contrassegnati come 'invisibili' nello strumento dei test quando sono inclusi in un percorso di apprendimento.

*Default: `false`*

### `show_invisible_lp_in_course_home`

**Mostra il collegamento al percorso di apprendimento nella home del corso quando è invisibile**

Se un percorso di apprendimento è impostato come invisibile ma l'insegnante o il coach ha deciso di renderlo disponibile dalla homepage del corso, questa opzione impedisce a Chamilo di nascondere il collegamento nella homepage del corso.

*Default: `false`*

### `show_prerequisite_as_blocked`

**Prerequisiti del percorso di apprendimento**

Nelle liste dei percorsi di apprendimento, mostra un elemento visivo per indicare che altri percorsi di apprendimento sono attualmente bloccati da una regola di prerequisiti.

*Default: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Aggiungi colonna di acquisizione nella pagina di monitoraggio dello studente**

Aggiunge una colonna alla pagina di monitoraggio dello studente per mostrare lo stato di acquisizione di un percorso di apprendimento da parte dello studente.

*Default: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Aggiungi informazioni sulla visibilità dei percorsi di apprendimento nella pagina di monitoraggio dello studente**

[inferred] Mostra un indicatore dello stato di visibilità per i percorsi di apprendimento nella pagina di monitoraggio dei progressi dello studente.

*Default: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informazioni di sblocco nella lista dei percorsi di apprendimento**

Aggiunge una colonna 'sbloccato' nella lista dei percorsi di apprendimento se lo studente è iscritto al dato percorso di apprendimento e ha accesso ad esso.

*Default: `false`*

### `student_follow_page_hide_lp_tests_average`

**Nascondi il simbolo di percentuale nella media dei test nei percorsi di apprendimento nel monitoraggio dello studente**

Nasconde l'icona della percentuale nell'indicazione 'Media dei test nei Percorsi di Apprendimento' nel monitoraggio di uno studente.

*Default: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Includi i percorsi di apprendimento non sottoscritti nella pagina di monitoraggio dello studente**

[inferred] Mostra i percorsi di apprendimento nelle pagine dei progressi anche quando gli studenti non sono iscritti ad essi.

*Default: `false`*

### `ticket_lp_quiz_info_add`

**Aggiungi informazioni sui percorsi di apprendimento e sui test al reporting dei ticket**

[inferred] Include informazioni sui percorsi di apprendimento e sui test nel reporting dei ticket di supporto per un migliore monitoraggio dei problemi.

*Default: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usa lo stato degli elementi del percorso di apprendimento da altre sessioni**

Consente agli utenti di completare i prerequisiti in un percorso di apprendimento se l'elemento corrispondente è stato già completato in un'altra sessione.

*Default: `false`*