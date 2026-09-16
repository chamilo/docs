# Impostazioni dei corsi

Valori predefiniti e policy che si applicano ai corsi su tutta la piattaforma: visibilità, diritti di creazione, strumenti consentiti, autorizzazioni degli studenti e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Corso**. Questa categoria contiene **45 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per gli script tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `active_tools_on_create`

**Strumenti attivi alla creazione del corso**

Selezionare gli strumenti che saranno *attivi* dopo la creazione di un corso.

*Predefinito:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Utilizzare le categorie di corso dall'URL principale**

In configurazioni multi-URL, consente ad amministratori e docenti di assegnare alle corsi degli URL figli le categorie provenienti dall'URL principale.

*Predefinito: `false`*

### `allow_course_theme`

**Consentire i temi dei corsi**

Consente i temi grafici dei corsi e rende possibile cambiare il foglio di stile utilizzato da un corso con uno qualsiasi dei fogli di stile disponibili in Chamilo. Quando un utente entra nel corso, il foglio di stile del corso avrà priorità sul foglio di stile dell'utente e su quello predefinito della piattaforma.

*Predefinito: `true`*

### `allow_public_course_with_no_terms_conditions`

**Accesso ai corsi pubblici con termini e condizioni**

Con questa opzione abilitata, se un corso ha visibilità pubblica e termini e condizioni, tali termini sono disattivati finché il corso è pubblico.

*Predefinito: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloccare l'accesso ai corsi pubblici per gli utenti autenticati**

Mostra solo i corsi pubblici. Non consente agli utenti registrati di accedere ai corsi con visibilità «aperta» a meno che non siano iscritti a ciascuno di tali corsi.

*Predefinito: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb della homepage del corso**

Il breadcrumb è il sistema di navigazione a collegamenti orizzontali, di solito in alto a sinistra della pagina. Questa opzione seleziona ciò che si desidera visualizzare nel breadcrumb sulle homepage dei corsi

*Predefinito: `course_title`*

### `course_about_teacher_name_hide`

**Nascondere le informazioni sul docente nella pagina dei dettagli del corso**

Nella pagina dei dettagli del corso, nasconde le informazioni sul docente.

*Predefinito: `false`*

### `course_category_code_to_use_as_model`

**Limitare i modelli di corso a una sola categoria di corsi**

Indicare un codice categoria da utilizzare come modelli di corso. Solo quei corsi appariranno nel menu a tendina al momento della creazione del corso e gli utenti non vedranno i corsi di questa categoria nel catalogo dei corsi.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campi extra da mostrare nelle impostazioni del corso**

I campi definiti in questo array appariranno nella pagina delle impostazioni del corso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campi extra da mostrare nel modulo di creazione del corso**

I campi definiti in questo array appariranno come campi aggiuntivi nel modulo di creazione del corso.

### `course_creation_donate_link`

**Collegamento per le donazioni nella pagina di creazione del corso**

La pagina a cui il messaggio di donazione deve puntare (URL completo).

### `course_creation_donate_message_show`

**Mostrare il messaggio di donazione nella pagina di creazione del corso**

Aggiunge una casella di messaggio nella pagina di creazione del corso per i docenti, invitandoli a donare al progetto.

*Predefinito: `false`*

### `course_creation_form_hide_course_code`

**Rimuovere il campo codice corso dal modulo di creazione del corso**

Se non fornito, il codice del corso viene generato per impostazione predefinita in base al titolo del corso; abilitare questa opzione per rimuovere del tutto il campo codice dal modulo di creazione del corso.

*Predefinito: `false`*

### `course_creation_form_set_course_category_mandatory`

**Rendere obbligatoria la categoria del corso**

In fase di creazione di un corso, rende la categoria del corso un'impostazione obbligatoria.

*Predefinito: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campi extra da richiedere nel modulo di creazione del corso**

I campi definiti in questo array saranno obbligatori nel modulo di creazione del corso.

### `course_creation_splash_screen`

**Schermata iniziale per i corsi**

Mostra una schermata iniziale durante la creazione di un nuovo corso.

*Predefinito: `true`*

### `course_creation_use_template`

**Usa un corso modello per i nuovi corsi**

Impostare questa opzione per utilizzare lo stesso corso modello (identificato dal suo ID numerico del corso nel database) per tutti i nuovi corsi che verranno creati sulla piattaforma. Si noti che, se non pianificata correttamente, questa impostazione potrebbe avere un impatto notevole sull’utilizzo dello spazio. Il corso modello verrà utilizzato come se il docente avesse effettuato una copia del corso con gli strumenti di backup del corso, quindi non viene copiato alcun contenuto degli utenti, ma solo il materiale del docente. Si applicano tutte le altre regole del backup dei corsi. Lasciare vuoto (o impostare a 0) per disabilitare.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Precompilare i campi del corso con i campi dell’utente**

Se non è vuoto, il processo di creazione del corso cercherà alcuni campi nel profilo utente e li compilerà automaticamente per il corso. Ad esempio, un docente specializzato in digital marketing potrebbe impostare automaticamente un flag « digital marketing » su ciascun corso che crea.

### `course_hide_tools`

**Nascondere gli strumenti ai docenti**

Selezionare gli strumenti che si desidera nascondere ai docenti. Ciò impedirà l’accesso allo strumento.

### `course_images_in_courses_list`

**Icone personalizzate dei corsi**

Utilizzare le immagini del corso come icona del corso negli elenchi dei corsi (al posto dell’icona predefinita della lavagna verde).

*Default: `true`*

### `course_log_default_extra_fields`

**Campi extra utente predefiniti nella pagina delle statistiche del corso**

Configurare questo array con gli ID interni dei campi extra che si desidera mostrare per impostazione predefinita nella pagina principale delle statistiche del corso.

### `course_log_hide_columns`

**Nascondere colonne dai log del corso**

Questo array consente di configurare quali colonne nascondere nella pagina principale delle statistiche del corso e nel report del tempo totale.

### `course_sequence_valid_only_in_same_session`

**Convalidare i prerequisiti solo all’interno della stessa sessione**

Se abilitata, un corso sarà considerato convalidato solo se superato all’interno della sessione corrente. Se disabilitata, anche i corsi superati in altre sessioni sbloccheranno i corsi dipendenti.

*Default: `false`*


### `course_student_info`

**Visualizzazione delle informazioni dello studente sul corso**

Nelle pagine « I miei corsi »/« Le mie sessioni », mostrare informazioni aggiuntive relative al punteggio, ai progressi e/o all’ottenimento del certificato da parte dello studente.

### `course_validation`

**Validazione dei corsi**

Quando la funzionalità « Validazione dei corsi » è abilitata, un docente non è in grado di creare un corso da solo. Compila una richiesta di corso. L’amministratore della piattaforma esamina la richiesta e la approva o la rifiuta.<br />Questa funzionalità si basa sulla messaggistica e-mail automatica; impostare Chamilo per accedere a un server e-mail e per utilizzare un account e-mail dedicato.

*Default: `false`*


### `course_validation_terms_and_conditions_url`

**Validazione dei corsi - un collegamento ai termini e alle condizioni**

Questo è l’URL del documento « Termini e condizioni » valido per l’invio di una richiesta di corso. Se l’indirizzo è impostato qui, l’utente deve leggere e accettare questi termini e condizioni prima di inviare una richiesta di corso.<br />Se si abilita il modulo « Termini e condizioni » di Chamilo e si desidera che venga utilizzato il relativo URL, lasciare questa impostazione vuota.

### `courses_default_creation_visibility`

**Visibilità predefinita del corso**

Visibilità predefinita del corso durante la creazione di un nuovo corso

*Default: `2`*


### `display_coursecode_in_courselist`

**Mostrare il codice nel nome del corso**

Mostrare il codice del corso nell’elenco dei corsi

*Default: `false`*


### `display_teacher_in_courselist`

**Mostrare il docente nel nome del corso**

Mostrare il docente nell’elenco dei corsi

*Default: `true`*


### `enable_tool_introduction`

**Abilitare l’introduzione dello strumento**

Abilitare le introduzioni nella homepage di ciascun strumento

*Default: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Mostrare il pulsante di disiscrizione in « I miei corsi »**

Aggiungere un pulsante per disiscriversi da un corso nella pagina « I miei corsi ».

*Default: `false`*

### `example_material_course_creation`

**Materiale di esempio alla creazione del corso**

Creare automaticamente materiale di esempio durante la creazione di un nuovo corso

*Default: `true`*


### `hide_course_rating`

**Nascondere la valutazione del corso**

La funzionalità di valutazione del corso è presente per impostazione predefinita in diversi punti. Se non la si desidera, abilitare questa opzione.

*Default: `false`*

### `hide_course_sidebar`

**Nascondere il blocco dei corsi nella barra laterale**

Nelle schermate in cui è visibile il menu di sinistra, non visualizzare la sezione « Corsi ».

*Default: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostrare il marcatore dei corsi condivisi multi-URL**

Aggiunge un’icona di collegamento ai corsi condivisi tra URL, in modo che gli utenti (in particolare i docenti) sappiano di dover prestare particolare attenzione durante la modifica del contenuto del corso.

*Default: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostrare solo i corsi nella lingua dell’utente**

Se abilitata, questa opzione nasconderà tutti i corsi non impostati nella lingua dell’utente.

*Default: `false`*

### `profiling_filter_adding_users`

**Filtrare gli utenti in base ai campi del profilo all'iscrizione al corso**

Consente ai docenti di filtrare gli utenti in base ai campi extra nella pagina di iscrizione degli utenti al proprio corso.

*Predefinito: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostrare le dipendenze nell'introduzione del corso**

Quando si utilizza il sequenziamento delle risorse con corsi o sessioni, mostra le dipendenze del corso nella homepage del corso.

*Predefinito: `false`*

### `scorm_cumulative_session_time`

**Tempo di sessione cumulativo per SCORM**

Se abilitato, il tempo di sessione per i Learning Path SCORM sarà cumulativo; in caso contrario, verrà contato solo a partire dall'ultimo aggiornamento. Si tratta di un'impostazione globale. Viene utilizzata in fase di creazione di un nuovo Learning Path, ma può poi essere ridefinita per ciascuno di essi.

*Predefinito: `true`*


### `send_email_to_admin_when_create_course`

**Avviso e-mail alla creazione di un corso**

Invia un'e-mail all'amministratore della piattaforma ogni volta che un docente crea un nuovo corso

*Predefinito: `false`*


### `show_course_duration`

**Mostrare la durata dei corsi**

Visualizza la durata del corso accanto al titolo del corso nel catalogo dei corsi e nell'elenco dei corsi.

*Predefinito: `false`*

### `show_navigation_menu`

**Visualizzare il menu di navigazione del corso**

Visualizza un menu di navigazione che accelera l'accesso agli strumenti

*Predefinito: `false`*


### `show_toolshortcuts`

**Scorciatoie degli strumenti**

Mostrare le scorciatoie degli strumenti nel banner?

*Predefinito: `false`*

### `student_view_enabled`

**Abilitare la vista studente**

Abilita la vista studente, che consente a un docente o a un amministratore di vedere un corso come lo vedrebbe uno studente

*Predefinito: `true`*


### `view_grid_courses`

**Visualizzare i corsi in un layout a griglia**

Visualizza i corsi in un layout con più corsi per riga. In caso contrario, il layout mostrerà un corso per riga.

*Predefinito: `true`*