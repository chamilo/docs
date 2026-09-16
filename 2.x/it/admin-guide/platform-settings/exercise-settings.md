# Impostazioni degli Esercizi (Test)

Impostazioni predefinite e comportamento dello strumento **Esercizi (Test)** — visualizzazione delle domande, punteggio, tentativi e simili.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Esercizi (Test)**. Questa categoria contiene **63 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_exercise_best_attempt_in_report`

**Abilita la visualizzazione del miglior tentativo di punteggio**

Fornisci un elenco di ID di corsi e test che mostreranno il miglior tentativo di punteggio per qualsiasi studente nei rapporti.

### `allow_coach_feedback_exercises`

**Consenti ai coach di commentare nella revisione degli esercizi**

Permetti ai coach di modificare il feedback durante la revisione degli esercizi.

*Predefinito: `true`*

### `allow_edit_exercise_in_lp`

**Consenti agli insegnanti di modificare i test nei percorsi di apprendimento**

Per impostazione predefinita, Chamilo impedisce di modificare i test inclusi in un percorso di apprendimento. Questo per evitare modifiche che potrebbero influire in modo diverso sui risultati e/o sul progresso degli studenti (passati e futuri) nel percorso di apprendimento. Questa opzione consente agli insegnanti di bypassare questa restrizione.

### `allow_exercise_categories`

**Abilita le categorie di test**

Le categorie di test non sono abilitate per impostazione predefinita perché aggiungono un livello di complessità. Abilita questa funzionalità per mostrare tutte le icone di gestione relative alle categorie di test.

*Predefinito: `false`*

### `allow_mandatory_question_in_category`

**Abilita la selezione di domande obbligatorie**

Consenti la selezione di domande obbligatorie in un test quando si utilizzano categorie casuali.

*Predefinito: `false`*

### `allow_notification_setting_per_exercise`

**Impostazioni di notifica dei test a livello di test**

Abilita la configurazione delle notifiche di invio dei test a livello di test anziché a livello di corso. Torna alle impostazioni a livello di corso se non definite a livello di test.

*Predefinito: `false`*

### `allow_quick_question_description_popup`

**Aggiunta rapida di immagini alla domanda**

Abilita un'icona aggiuntiva nell'elenco delle domande del test per aggiungere un'immagine come descrizione della domanda. Questo accelera notevolmente la modifica delle domande quando le domande sono nel titolo e la descrizione include solo un'immagine.

*Predefinito: `false`*

### `allow_quiz_question_feedback`

**Aggiungi feedback alla domanda in caso di risposta errata**

Per impostazione predefinita, Chamilo consente di mostrare feedback su ogni risposta in una domanda. Con questa opzione, viene creato un campo aggiuntivo per fornire feedback predefinito all'intera domanda. Questo feedback apparirà solo se l'utente ha risposto in modo errato.

*Predefinito: `false`*

### `allow_quiz_results_page_config`

**Abilita la configurazione della pagina dei risultati del test**

Definisci un array di impostazioni che desideri applicare a tutte le pagine dei risultati dei test. Le impostazioni possono essere ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ e possibilmente altre in futuro. Cerca ‘getPageConfigurationAttribute’ nel codice per vedere cosa è in uso.

*Predefinito: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostra il pulsante 'precedente' nel test per navigare tra le domande**

Imposta su false per disabilitare il pulsante 'precedente' durante la risposta alle domande in un test, costringendo così gli utenti a procedere sempre avanti.

*Predefinito: `false`*

### `allow_teacher_comment_audio`

**Feedback audio alle risposte inviate**

Consenti agli insegnanti di fornire feedback agli utenti tramite audio (in alternativa al testo) su ogni domanda in un test.

*Predefinito: `true`*

### `allow_time_per_question`

**Abilita il tempo per domanda nei test**

Per impostazione predefinita, è possibile limitare il tempo solo per test. Limitarlo per domanda aggiunge un ulteriore livello di possibilità, e puoi (con cautela) combinare entrambi.

*Predefinito: `false`*

### `block_category_questions`

**Blocca le domande delle categorie precedenti in un test**

Quando si utilizza questa opzione, apparirà un'opzione aggiuntiva nella configurazione del test. Quando si utilizza un test con più categorie di domande e si richiede una distribuzione per categoria, ciò consentirà all'utente di navigare tra le domande per categoria. Una volta terminata una categoria, passerà alla categoria successiva e non potrà tornare alla categoria precedente.

*Predefinito: `false`*

### `block_quiz_mail_notification_general_coach`

**Blocca l'invio di notifiche di test al coach generale**

Gli studenti che completano un test di solito inviano notifiche ai coach, incluso il coach generale della sessione. Abilita questa opzione per escludere il coach generale da queste notifiche.

*Predefinito: `false`*

---
### `configure_exercise_visibility_in_course`

**Abilita per ignorare la configurazione dell'esercizio invisibile in sessione a livello di corso base**

Consente di configurare l'invisibilità dell'esercizio in sessione nel corso base per ignorare la configurazione globale. Se non impostato, viene utilizzato il parametro globale.

*Default: `false`*

### `disable_clean_exercise_results_for_teachers`

**Disabilita 'pulisci risultati' per i docenti**

Disabilita l'opzione di eliminare i risultati dei test dall'elenco dei test. Questo è spesso utilizzato quando i docenti meno attenti gestiscono i corsi, per evitare errori critici.

*Default: `true`*

### `email_alert_manager_on_new_quiz`

**Impostazione predefinita per l'avviso via e-mail su un nuovo quiz**

Indica se si desidera che i gestori del corso (docenti) ricevano una notifica via e-mail quando un quiz viene completato da uno studente. Questo è il valore predefinito per tutti i nuovi corsi, ma ogni docente può comunque modificare questa impostazione nel proprio corso.

*Default: `true`*

### `enable_quiz_scenario`

**Abilita scenario Quiz**

Da qui sarà possibile creare esercizi che propongono domande diverse in base alle risposte dell'utente.

*Default: `true`*

### `exercise_additional_teacher_modify_actions`

**Collegamenti aggiuntivi per i docenti nell'elenco dei test**

Configura elementi di callback per generare nuove icone di azione per i docenti sul lato destro dell'elenco dei test, sotto forma di array, ad esempio ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostra nome utente nella pagina dei risultati del test**

Mostra il nome utente (invece di, o insieme alle informazioni dell'utente) nella pagina dei risultati del test.

*Default: `false`*

### `exercise_category_report_user_extra_fields`

**Aggiungi campi extra utente nel rapporto della categoria di esercizio**

Definisci un array con l'elenco dei campi extra utente da aggiungere al rapporto.

### `exercise_category_round_score_in_export`

**Arrotonda il punteggio nelle esportazioni dei test**

Quando abilitato, i punteggi dei test vengono arrotondati al numero intero più vicino durante l'esportazione dei rapporti degli esercizi.

*Default: `false`*

### `exercise_embeddable_extra_types`

**Tipi di domande incorporabili**

Per impostazione predefinita, solo le domande a risposta singola e multipla vengono considerate quando si decide se un test può essere incorporato in un video o meno. Con questa opzione, è possibile decidere che siano disponibili più tipi di domande. Tieni presente che non tutti i tipi di domande si adattano bene allo spazio assegnato ai video. I tipi di domande sono disponibili nel codice in question.class.php.

### `exercise_hide_ip`

**Nascondi l'IP dell'utente dai rapporti dei test**

Per impostazione predefinita, mostriamo le informazioni dell'utente e il suo indirizzo IP, ma questo potrebbe essere considerato un dato personale, quindi questa opzione consente di rimuovere queste informazioni da tutti i rapporti dei test.

*Default: `false`*

### `exercise_hide_label`

**Nascondi il nastro delle domande (giusto/sbagliato) nei risultati del test**

Nei risultati del test, per impostazione predefinita appare un nastro per indicare se la risposta era giusta o sbagliata. Abilita questa opzione per rimuovere il nastro a livello globale.

*Default: `false`*

### `exercise_invisible_in_session`

**Esercizio invisibile in Sessione**

Se un esercizio è visibile nel corso base, appare invisibile nella sessione. Se un esercizio è invisibile nel corso base, non appare nella sessione.

*Default: `false`*

### `exercise_max_editors_in_page`

**Numero massimo di editor nella schermata dei risultati dell'esercizio**

A causa dell'elevato numero di domande che potrebbero apparire in un esercizio, la schermata di correzione, che consente al docente di aggiungere commenti a ogni risposta, potrebbe caricarsi molto lentamente. Imposta questo numero a 5 per chiedere alla piattaforma di mostrare solo editor WYSIWYG fino a un certo numero di risposte sullo schermo. Questo accelererà notevolmente il tempo di caricamento della pagina di correzione, ma rimuoverà gli editor WYSIWYG lasciando solo un editor di testo semplice.

*Default: `0`*

### `exercise_max_score`

**Punteggio massimo degli esercizi**

Definisci un punteggio massimo (generalmente 10, 20 o 100) per tutti gli esercizi sulla piattaforma. Questo definirà come i risultati finali vengono mostrati agli utenti e ai docenti.

*Default: `20`*

### `exercise_min_score`

**Punteggio minimo degli esercizi**

Definisci un punteggio minimo (generalmente 0) per tutti gli esercizi sulla piattaforma. Questo definirà come i risultati finali vengono mostrati agli utenti e ai docenti.

*Default: `0`*

### `exercise_result_end_text_html_strict_filtering`

**Ignora il filtraggio HTML nei messaggi di fine test**

Considera i messaggi alla fine dei test sempre sicuri. Rimuovere il filtro rende possibile l'uso di JavaScript in quel contesto.

*Default: `false`*

### `exercise_score_format`

**Formato del punteggio dei test**

Seleziona tra le seguenti forme per la visualizzazione del punteggio degli utenti in vari rapporti: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Usa l'ID numerico della forma che desideri utilizzare.

*Default: `0`*

### `exercises_disable_new_attempts`

**Disabilita nuovi tentativi di test**

Disabilita globalmente nuovi tentativi di test. Solitamente utilizzato quando c'è un problema generale con i test e si desidera del tempo per analizzare senza bloccare l'intera piattaforma.

*Default: `false`*

---
### `hide_free_question_score`

**Nascondi il punteggio delle domande aperte**

Nasconde il fatto che le domande aperte (inclusi audio e annotazioni) abbiano un punteggio, occultando la visualizzazione del punteggio in tutti i rapporti visibili agli studenti.

*Predefinito: `false`*


### `hide_user_info_in_quiz_result`

**Nascondi le informazioni dell'utente nella pagina dei risultati del test**

La pagina dei risultati del test predefinita mostra una scheda dati dell'utente (foto, nome, ecc.) che, in alcuni contesti, potrebbe essere considerata al limite del trattamento dei dati personali. Abilita questa opzione per rimuovere i dettagli dell'utente dai risultati del test.

*Predefinito: `false`*


### `limit_exercise_teacher_access`

**Limita i permessi degli insegnanti sui test**

Quando abilitata, gli insegnanti non possono eliminare test o domande, modificare la visibilità dei test, scaricare in formato QTI, cancellare i risultati, ecc.

*Predefinito: `false`*


### `my_courses_show_pending_exercise_attempts`

**Elenco globale dei test in sospeso**

Abilita per mostrare all'utente finale una pagina con l'elenco dei test in sospeso in tutti i corsi.

*Predefinito: `false`*


### `question_exercise_html_strict_filtering`

**Bypassa il filtraggio HTML nelle domande dei test**

Considera il testo delle domande nei test sempre sicuro. Rimuovendo il filtro, è possibile utilizzare JavaScript al suo interno.

*Predefinito: `false`*


### `question_pagination_length`

**Lunghezza della paginazione delle domande per gli insegnanti**

Numero di domande da mostrare in ogni pagina quando si utilizza l'opzione di paginazione delle domande per gli insegnanti.

*Predefinito: `20`*


### `quiz_answer_extra_recording`

**Abilita la registrazione extra delle risposte ai test**

Abilita la registrazione di tutte le risposte (anche temporanee) nella tabella track_e_attempt_recording. Questa funzionalità è sperimentale e può creare problemi nelle pagine di report quando si tenta di valutare un test.

*Predefinito: `false`*


### `quiz_check_all_answers_before_end_test`

**Controlla tutte le risposte prima di inviare il test**

Mostra un popup con l'elenco delle domande risposte/non risposte prima di inviare il test.

*Predefinito: `false`*


### `quiz_check_button_enable`

**Aggiungi un controllo del processo di salvataggio delle risposte prima del test**

Assicurati che gli utenti siano pronti a iniziare il test fornendo una simulazione del processo di salvataggio delle domande prima di accedere al test. Questo consente di rilevare precocemente alcuni problemi di connessione e riduce le difficoltà nell'esperienza utente.

*Predefinito: `false`*


### `quiz_confirm_saved_answers`

**Aggiungi una casella di controllo per la conferma del conteggio delle risposte**

Questa opzione aggiunge una casella di controllo alla fine di ogni test che chiede all'utente di confermare il numero di risposte salvate. Ciò fornisce dati di audit migliori per i test critici.

*Predefinito: `false`*


### `quiz_discard_orphan_in_course_export`

**Scarta le domande orfane nell'esportazione del corso**

Durante l'esportazione di un corso, non esportare le domande che non fanno parte di alcun test.

*Predefinito: `false`*


### `quiz_generate_certificate_ending`

**Genera un certificato al termine del test**

Genera un certificato al termine di un quiz. Il quiz deve essere collegato allo strumento del registro voti e avere configurata una percentuale di superamento.

*Predefinito: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Nascondi la tabella dei tentativi nella pagina iniziale del test**

Nasconde la tabella che mostra tutti i tentativi precedenti nella pagina iniziale del test.

*Predefinito: `false`*


### `quiz_hide_question_number`

**Nascondi il numero della domanda**

Nasconde la numerazione incrementale delle domande durante l'esecuzione di un test.

*Predefinito: `false`*


### `quiz_image_zoom`

**Abilita lo zoom delle immagini nei test**

Abilita questa funzionalità per consentire agli utenti di ingrandire le immagini utilizzate nei test.


### `quiz_keep_alive_ping_interval`

**Mantieni la sessione attiva nei test**

Mantieni la sessione attiva inviando un segnale ping regolare al server ogni x secondi, definito qui. Si consiglia un intervallo di 300 secondi.

*Predefinito: `0`*


### `quiz_open_question_decimal_score`

**Punteggio decimale nei tipi di domande aperte**

Consenti all'insegnante di valutare i tipi di domande aperte, di espressione orale e di annotazione con un punteggio decimale.

*Predefinito: `false`*


### `quiz_prevent_copy_paste`

**Blocca il copia-incolla nei test**

Blocca i tasti copia/incolla/salva/stampa e i clic con il tasto destro negli esercizi.

*Predefinito: `false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Elimina automaticamente le domande quando si elimina un test**

Il comportamento predefinito è rendere le domande orfane quando l'unico test che le utilizza viene eliminato. Quando abilitata, questa opzione assicura che tutte le domande che altrimenti diventerebbero orfane vengano eliminate.

*Predefinito: `false`*


### `quiz_results_answers_report`

**Mostra il link per scaricare i risultati del test**

Nella pagina dei risultati del test, mostra un link per scaricare i risultati come file.

*Predefinito: `false`*


### `quiz_show_description_on_results_page`

**Mostra sempre la descrizione del test nella pagina dei risultati**

Quando abilitata, la descrizione del test viene sempre mostrata nella pagina dei risultati dopo il completamento del test.

*Predefinito: `false`*


### `score_grade_model`

**Modello di voti per i punteggi**

Definisci un array di intervalli di punteggio e colori per visualizzare i rapporti utilizzando questo modello. Ciò consente di mostrare colori anziché voti numerici.

---
### `send_score_in_exam_notification_mail_to_manager`

**Aggiungi il punteggio nella notifica via e-mail di invio del test**

Aggiunge il punteggio dello studente alla notifica via e-mail inviata al docente dopo che un test è stato inviato.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostra i tentativi di test di tutte le sessioni nel rapporto sui test in sospeso**

Mostra i tentativi di test degli utenti in tutte le sessioni a cui il coach generale ha accesso nel rapporto sui test in sospeso.

*Default: `false`*


### `show_exercise_expected_choice`

**Mostra la scelta attesa nei risultati del test**

Mostra la scelta attesa e uno stato (corretto/errato) per ogni risposta nella pagina dei risultati del test (se il test è stato configurato per mostrare i risultati).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostra il punteggio per le domande sul grado di certezza**

Per impostazione predefinita, Chamilo non mostra un punteggio per i tipi di domande sul grado di certezza.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostra i tentativi di test di tutte le sessioni nel corso base**

Mostra i tentativi di test degli utenti in tutte le sessioni al docente nel corso base.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Mostra il codice ufficiale nei risultati degli esercizi**

Determina se mostrare il codice ufficiale degli studenti nei rapporti sui risultati degli esercizi.

*Default: `false`*


### `show_question_id`

**Mostra gli ID delle domande nei test**

Mostra gli ID interni delle domande per consentire agli utenti di prendere nota di problemi su domande specifiche e segnalarli in modo più efficiente.

*Default: `false`*


### `show_question_pagination`

**Mostra la paginazione delle domande per i docenti**

Per i test con molte domande, utilizza la paginazione se il numero di domande è superiore a questa impostazione. Imposta a 0 per evitare l'uso della paginazione.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostra i test eliminati in 'I miei progressi'**

Abilita questa opzione per visualizzare, nella pagina 'I miei progressi', i risultati di tutti i test che hai sostenuto, anche quelli che sono stati eliminati.

*Default: `false`*