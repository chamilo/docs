# Impostazioni degli esercizi (test)

Valori predefiniti e comportamento dello strumento **Esercizi (test)** — visualizzazione delle domande, punteggio, tentativi e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Esercizi (test)**. Questa categoria contiene **64 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_exercise_best_attempt_in_report`

**Abilitare la visualizzazione del tentativo con il punteggio migliore**

Fornire un elenco di ID di corsi e test che mostreranno il tentativo con il punteggio migliore di qualsiasi discente nei report.

### `allow_coach_feedback_exercises`

**Consentire ai tutor di commentare durante la revisione degli esercizi**

Consentire ai tutor di modificare il feedback durante la revisione degli esercizi

*Predefinito: `true`*

### `allow_edit_exercise_in_lp`

**Consentire ai docenti di modificare i test nei percorsi di apprendimento**

Per impostazione predefinita, Chamilo impedisce di modificare i test inclusi in un percorso di apprendimento. Ciò serve a evitare modifiche che influenzerebbero in modo diverso i discenti (passati e futuri) rispetto ai risultati e/o ai progressi nel percorso di apprendimento. Questa opzione consente ai docenti di aggirare tale restrizione.


### `allow_exercise_categories`

**Abilitare le categorie di test**

Le categorie di test non sono abilitate per impostazione predefinita perché aggiungono un livello di complessità. Abilitare questa funzionalità per far comparire tutte le icone di gestione relative alle categorie di test.

*Predefinito: `false`*

### `allow_mandatory_question_in_category`

**Abilitare la selezione di domande obbligatorie**

Abilitare la selezione di domande obbligatorie in un test quando si utilizzano categorie casuali.

*Predefinito: `false`*

### `allow_notification_setting_per_exercise`

**Impostazioni di notifica del test a livello di test**

Abilitare la configurazione delle notifiche di invio del test a livello di test anziché a livello di corso. Se non definite a livello di test, si ricorre alle impostazioni a livello di corso.

*Predefinito: `false`*

### `allow_quick_question_description_popup`

**Aggiunta rapida di un'immagine alla domanda**

Abilitare un'icona aggiuntiva nell'elenco delle domande del test per aggiungere un'immagine come descrizione della domanda. Ciò accelera notevolmente la modifica delle domande quando le domande sono nel titolo e la descrizione include solo un'immagine.

*Predefinito: `false`*

### `allow_quiz_question_feedback`

**Aggiungere un feedback alla domanda in caso di risposta errata**

Per impostazione predefinita, Chamilo consente di mostrare un feedback su ciascuna risposta di una domanda. Con questa opzione viene creato un campo aggiuntivo per fornire un feedback predefinito all'intera domanda. Questo feedback comparirà solo se l'utente ha risposto in modo errato.

*Predefinito: `false`*

### `allow_quiz_results_page_config`

**Abilitare la configurazione della pagina dei risultati del test**

Definire un array di impostazioni da applicare a tutte le pagine dei risultati dei test. Le impostazioni possono essere ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ e eventualmente altre in futuro. Cercare ‘getPageConfigurationAttribute’ nel codice per vedere cosa è in uso.

*Predefinito: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrare il pulsante "precedente" nel test per navigare tra le domande**

Impostare su false per disabilitare il pulsante "precedente" durante la risposta alle domande in un test, costringendo così gli utenti a procedere sempre in avanti.

*Predefinito: `false`*

### `allow_teacher_comment_audio`

**Feedback audio alle risposte inviate**

Consentire ai docenti di fornire feedback agli utenti tramite audio (in alternativa al testo) su ciascuna domanda di un test.

*Predefinito: `true`*

### `allow_time_per_question`

**Abilitare il tempo per domanda nei test**

Per impostazione predefinita è possibile limitare solo il tempo per test. Limitare il tempo per domanda aggiunge un ulteriore livello di possibilità e si possono (con attenzione) combinare entrambi.

*Predefinito: `false`*

### `block_category_questions`

**Bloccare le domande delle categorie precedenti in un test**

Utilizzando questa opzione, comparirà un'opzione aggiuntiva nella configurazione del test. Quando si utilizza un test con più categorie di domande e si richiede una distribuzione per categoria, ciò consentirà all'utente di navigare le domande per categoria. Una volta terminata una categoria, passa alla categoria successiva e non può tornare alla categoria precedente.

*Predefinito: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloccare l'invio delle notifiche del test al tutor generale**

Quando i discenti completano un test, le notifiche vengono di solito inviate ai tutor, incluso il tutor generale della sessione. Abilitare questa opzione per escludere il tutor generale da tali notifiche.

*Predefinito: `false`*

### `configure_exercise_visibility_in_course`

**Abilita l'override della configurazione di Esercizio invisibile in sessione a livello di corso base**

Abilita la configurazione dell'invisibilità dell'esercizio in sessione nel corso base per ignorare la configurazione globale. Se non impostata, viene utilizzato il parametro globale.

*Default: `false`*

### `disable_clean_exercise_results_for_teachers`

**Disabilita «pulisci risultati» per i docenti**

Disabilita l'opzione per eliminare i risultati dei test dall'elenco dei test. Viene spesso utilizzata quando i corsi sono gestiti da docenti meno attenti, per evitare errori critici.

*Default: `true`*

### `email_alert_manager_on_new_quiz`

**Impostazione predefinita di avviso e-mail su nuovo quiz**

Indica se si desidera che i responsabili del corso (docenti) siano notificati via e-mail quando uno studente risponde a un quiz. Questo è il valore predefinito da assegnare a tutti i nuovi corsi, ma ciascun docente può comunque modificare questa impostazione nel proprio corso.

*Default: `true`*

### `enable_quiz_scenario`

**Abilita scenario Quiz**

Da qui sarà possibile creare esercizi che propongono domande diverse in base alle risposte dell'utente.

*Default: `true`*

### `exercise_additional_teacher_modify_actions`

**Collegamenti aggiuntivi per i docenti nell'elenco dei test**

Configura elementi di callback per generare nuove icone di azione per i docenti sul lato destro dell'elenco dei test, sotto forma di array, ad es. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostra il nome utente nella pagina dei risultati del test**

Mostra il nome utente (al posto delle, o insieme alle, informazioni utente) nella pagina dei risultati del test.

*Default: `false`*

### `exercise_category_report_user_extra_fields`

**Aggiungi campi extra utente nel report per categoria di esercizio**

Definisce un array con l'elenco dei campi extra utente da aggiungere al report.

### `exercise_category_round_score_in_export`

**Arrotonda il punteggio nelle esportazioni dei test**

Se abilitata, i punteggi dei test vengono arrotondati all'intero più vicino durante l'esportazione dei report degli esercizi.

*Default: `false`*

### `exercise_embeddable_extra_types`

**Tipi di domanda incorporabili**

Per impostazione predefinita, solo le domande a risposta singola e a risposta multipla vengono considerate nel decidere se un test può essere incorporato in un video. Con questa opzione è possibile decidere che siano disponibili ulteriori tipi di domanda. Si tenga presente che non tutti i tipi di domanda si adattano bene allo spazio assegnato ai video. I tipi di domanda sono disponibili nel codice in question.class.php.

### `exercise_hide_ip`

**Nascondi l'IP dell'utente dai report dei test**

Per impostazione predefinita mostriamo le informazioni dell'utente e il relativo indirizzo IP, ma ciò potrebbe essere considerato dato personale, quindi questa opzione consente di rimuovere tali informazioni da tutti i report dei test.

*Default: `false`*

### `exercise_hide_label`

**Nascondi il nastro della domanda (giusto/sbagliato) nei risultati del test**

Nei risultati del test, per impostazione predefinita compare un nastro che indica se la risposta era giusta o sbagliata. Abilitare questa opzione per rimuovere il nastro a livello globale.

*Default: `false`*

### `exercise_invisible_in_session`

**Esercizio invisibile in Sessione**

Se un esercizio è visibile nel corso base, allora compare invisibile nella sessione. Se un esercizio è invisibile nel corso base, allora non compare nella sessione.

*Default: `false`*

### `exercise_max_editors_in_page`

**Numero massimo di editor nella schermata dei risultati dell'esercizio**

A causa dell'elevato numero di domande che possono comparire in un esercizio, la schermata di correzione, che consente al docente di aggiungere commenti a ciascuna risposta, potrebbe caricarsi molto lentamente. Impostare questo numero a 5 per chiedere alla piattaforma di mostrare gli editor WYSIWYG solo fino a un certo numero di risposte sullo schermo. Ciò accelererà notevolmente il tempo di caricamento della pagina di correzione, ma rimuoverà gli editor WYSIWYG lasciando solo un editor di testo semplice.

*Default: `0`*


### `exercise_max_score`

**Punteggio massimo degli esercizi**

Definisce un punteggio massimo (generalmente 10, 20 o 100) per tutti gli esercizi della piattaforma. Questo definirà come i risultati finali vengono mostrati a utenti e docenti.

*Default: `20`*


### `exercise_min_score`

**Punteggio minimo degli esercizi**

Definisce un punteggio minimo (generalmente 0) per tutti gli esercizi della piattaforma. Questo definirà come i risultati finali vengono mostrati a utenti e docenti.

*Default: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Ignora il filtro HTML nei messaggi di fine test**

Considera i messaggi alla fine dei test sempre sicuri. Rimuovere il filtro rende possibile l'uso di JavaScript in tali messaggi.

*Default: `false`*


### `exercise_score_format`

**Formato del punteggio dei test**

Selezionare tra le seguenti forme per la visualizzazione del punteggio degli utenti in vari report: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Utilizzare l'ID numerico della forma che si desidera usare.

*Default: `0`*

### `exercises_disable_new_attempts`

**Disabilita nuovi tentativi di test**

Disabilita globalmente i nuovi tentativi di test. Di solito si usa quando c'è un problema con i test in generale e si desidera del tempo per analizzare senza bloccare l'intera piattaforma.

*Default: `false`*

### `hide_free_question_score`

**Nascondi il punteggio delle domande aperte**

Nasconde il fatto che le domande aperte (incluse audio e annotazioni) abbiano un punteggio, nascondendo la visualizzazione del punteggio in tutti i report rivolti allo studente.

*Default: `false`*


### `hide_user_info_in_quiz_result`

**Nascondi le informazioni utente nella pagina dei risultati del test**

La pagina predefinita dei risultati del test mostra una scheda utente (foto, nome, ecc.) che, in alcuni contesti, potrebbe essere considerata al limite del trattamento dei dati personali. Abilitare questa opzione per rimuovere i dettagli utente dai risultati del test.

*Default: `false`*


### `limit_exercise_teacher_access`

**Limitare i permessi dei docenti sui test**

Se abilitata, i docenti non possono eliminare test né domande, modificare la visibilità dei test, scaricare in QTI, pulire i risultati, ecc.

*Default: `false`*


### `my_courses_show_pending_exercise_attempts`

**Elenco globale dei test in sospeso**

Abilitare per mostrare all'utente finale una pagina con l'elenco dei test in sospeso in tutti i corsi.

*Default: `false`*


### `question_exercise_html_strict_filtering`

**Ignorare il filtro HTML nelle domande dei test**

Considerare il testo delle domande nei test sempre sicuro. Rimuovere il filtro rende possibile l'uso di JavaScript.

*Default: `false`*


### `question_pagination_length`

**Lunghezza della paginazione delle domande per i docenti**

Numero di domande da mostrare in ogni pagina quando si usa l'opzione di paginazione delle domande per i docenti.

*Default: `20`*


### `quiz_answer_extra_recording`

**Abilitare la registrazione extra delle risposte ai test**

Abilita la registrazione di tutte le risposte (anche temporanee) nella tabella track_e_attempt_recording. Questa funzionalità è sperimentale e può creare problemi nelle pagine di reportistica quando si tenta di valutare un test.

*Default: `false`*


### `quiz_check_all_answers_before_end_test`

**Controllare tutte le risposte prima di inviare il test**

Mostra un popup con l'elenco delle domande risposte/non risposte prima di inviare il test.

*Default: `false`*


### `quiz_check_button_enable`

**Aggiungere un controllo del processo di salvataggio delle risposte prima del test**

Assicurarsi che gli utenti siano pronti ad avviare il test fornendo una simulazione del processo di salvataggio delle domande prima di entrare nel test. Ciò consente di rilevare in anticipo alcuni problemi di connessione e riduce gli attriti nell'esperienza utente.

*Default: `false`*


### `quiz_confirm_saved_answers`

**Aggiungere una casella di controllo per la conferma del numero di risposte**

Questa opzione aggiunge una casella di controllo alla fine di ogni test che chiede all'utente di confermare il numero di risposte salvate. Fornisce dati di audit migliori per i test critici.

*Default: `false`*


### `quiz_discard_orphan_in_course_export`

**Scartare le domande orfane nell'esportazione del corso**

Quando si esporta un corso, non esportare le domande che non fanno parte di alcun test.

*Default: `false`*


### `quiz_generate_certificate_ending`

**Generare il certificato al termine del test**

Genera il certificato al termine di un quiz. Il quiz deve essere collegato nello strumento gradebook e avere una percentuale di superamento configurata.

*Default: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Nascondere la tabella dei tentativi nella pagina di avvio del test**

Nasconde la tabella che mostra tutti i tentativi precedenti nella pagina di avvio del test.

*Default: `false`*


### `quiz_hide_question_number`

**Nascondere il numero della domanda**

Nasconde la numerazione incrementale delle domande durante lo svolgimento di un test.

*Default: `false`*


### `quiz_image_zoom`

**Abilitare lo zoom delle immagini nei test**

Abilitare questa funzionalità per consentire agli utenti di ingrandire le immagini utilizzate nei test.

### `quiz_keep_alive_ping_interval`

**Mantenere la sessione attiva nei test**

Mantiene la sessione attiva inviando un segnale ping regolare al server ogni x secondi, da definire qui. Si raccomanda una volta ogni 300 secondi.

*Default: `0`*


### `quiz_open_question_decimal_score`

**Punteggio decimale nei tipi di domanda aperta**

Consente al docente di valutare i tipi di domanda aperta, espressione orale e annotazione con un punteggio decimale.

*Default: `false`*


### `quiz_prevent_copy_paste`

**Bloccare il copia-incolla nei test**

Blocca i tasti copia/incolla/salva/stampa e i clic destro negli esercizi.

*Default: `false`*

### `quiz_question_category_destinations` **v3**

**Abilitare i test adattivi progressivi per destinazione di categoria**

Abilita i test adattivi progressivi in cui ogni categoria di domande può reindirizzare gli studenti a un'altra categoria in base al loro punteggio.

*Default: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Eliminare automaticamente le domande all'eliminazione del test**

Il comportamento predefinito è rendere orfane le domande quando viene eliminato l'unico test che le utilizza. Se abilitata, questa opzione garantisce che tutte le domande che altrimenti finirebbero orfane vengano eliminate.

*Default: `false`*


### `quiz_results_answers_report`

**Mostrare il collegamento per scaricare i risultati del test**

Nella pagina dei risultati del test, mostra un collegamento per scaricare i risultati come file.

*Default: `false`*


### `quiz_show_description_on_results_page`

**Mostrare sempre la descrizione del test nella pagina dei risultati**

Se abilitata, la descrizione del test viene sempre visualizzata nella pagina dei risultati dopo il completamento del test.

*Default: `false`*

### `score_grade_model`

**Modello di voti per il punteggio**

Definisce un array di intervalli di punteggio e colori per visualizzare i report utilizzando questo modello. Consente di mostrare i colori anziché i voti numerici.

### `send_score_in_exam_notification_mail_to_manager`

**Aggiungere il punteggio nella notifica e-mail di invio del test**

Aggiunge il punteggio dello studente alla notifica e-mail inviata al docente dopo l'invio di un test.

*Predefinito: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrare i tentativi di test di tutte le sessioni nel report dei test in sospeso**

Mostra i tentativi di test degli utenti in tutte le sessioni a cui il tutor generale ha accesso nel report dei test in sospeso.

*Predefinito: `false`*


### `show_exercise_expected_choice`

**Mostrare la scelta attesa nei risultati del test**

Mostra la scelta attesa e uno stato (corretto/errato) per ogni risposta nella pagina dei risultati del test (se il test è stato configurato per mostrare i risultati).

*Predefinito: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrare il punteggio per le domande sul grado di certezza**

Per impostazione predefinita, Chamilo non mostra un punteggio per i tipi di domanda sul grado di certezza.

*Predefinito: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrare i tentativi di test di tutte le sessioni nel corso di base**

Mostra al docente, nel corso di base, i tentativi di test degli utenti in tutte le sessioni.

*Predefinito: `false`*


### `show_official_code_exercise_result_list`

**Visualizzare il codice ufficiale nei risultati degli esercizi**

Indica se mostrare il codice ufficiale degli studenti nei report dei risultati degli esercizi

*Predefinito: `false`*

### `show_question_id`

**Mostrare gli ID delle domande nei test**

Mostra gli ID interni delle domande per consentire agli utenti di annotare i problemi su domande specifiche e segnalarli in modo più efficiente.

*Predefinito: `false`*


### `show_question_pagination`

**Mostrare la paginazione delle domande per i docenti**

Per i test con molte domande, utilizza la paginazione se il numero di domande è superiore a questa impostazione. Impostare su 0 per non utilizzare la paginazione.

*Predefinito: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrare i test eliminati in «I miei progressi»**

Abilitare questa opzione per visualizzare, nella pagina «I miei progressi», i risultati di tutti i test sostenuti, anche quelli che sono stati eliminati.

*Predefinito: `false`*