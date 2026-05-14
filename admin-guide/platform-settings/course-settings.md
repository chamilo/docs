# Impostazioni dei Corsi

Impostazioni predefinite e politiche che si applicano ai corsi su tutta la piattaforma — visibilità, diritti di creazione, strumenti consentiti, permessi degli studenti e simili.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Corso**. Questa categoria contiene **45 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `active_tools_on_create`

**Strumenti attivi alla creazione del corso**

Seleziona gli strumenti che saranno *attivi* dopo la creazione di un corso.

*Predefinito:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Usa categorie di corsi dall'URL principale**

Nelle impostazioni multi-URL, consente agli amministratori e agli insegnanti di assegnare categorie dall'URL principale ai corsi negli URL secondari.

*Predefinito: `false`*

### `allow_course_theme`

**Consenti temi per i corsi**

Permette l'uso di temi grafici per i corsi e rende possibile cambiare il foglio di stile utilizzato da un corso con uno qualsiasi dei fogli di stile disponibili su Chamilo. Quando un utente accede al corso, il foglio di stile del corso avrà la priorità rispetto al foglio di stile personale dell'utente e al foglio di stile predefinito della piattaforma.

*Predefinito: `true`*

### `allow_public_course_with_no_terms_conditions`

**Accesso a corsi pubblici con termini e condizioni**

Con questa opzione abilitata, se un corso ha visibilità pubblica e termini e condizioni, tali termini vengono disabilitati mentre il corso è pubblico.

*Predefinito: `false`*

### `block_registered_users_access_to_open_course_contents`

**Blocca l'accesso ai corsi pubblici per gli utenti autenticati**

Mostra solo i corsi pubblici. Non consentire agli utenti registrati di accedere ai corsi con visibilità 'aperta' a meno che non siano iscritti a ciascuno di questi corsi.

*Predefinito: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb nella homepage del corso**

Il breadcrumb è il sistema di navigazione tramite collegamenti orizzontali solitamente posizionato in alto a sinistra della pagina. Questa opzione seleziona cosa desideri che appaia nel breadcrumb nelle homepage dei corsi.

*Predefinito: `course_title`*

### `course_about_teacher_name_hide`

**Nascondi informazioni sull'insegnante nella pagina dei dettagli del corso**

Nella pagina dei dettagli del corso, nasconde le informazioni sull'insegnante.

*Predefinito: `false`*

### `course_category_code_to_use_as_model`

**Limita i modelli di corso a una categoria di corso**

Fornisci un codice di categoria da utilizzare come modelli di corso. Solo questi corsi saranno mostrati nel menu a tendina durante la creazione del corso e gli utenti non vedranno i corsi di questa categoria nel catalogo dei corsi.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campi extra da mostrare nelle impostazioni del corso**

I campi definiti in questo array appariranno nella pagina delle impostazioni del corso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campi extra da mostrare nel modulo di creazione del corso**

I campi definiti in questo array appariranno come campi aggiuntivi nel modulo di creazione del corso.

### `course_creation_donate_link`

**Collegamento per donazioni nella pagina di creazione del corso**

La pagina a cui il messaggio di donazione dovrebbe collegarsi (URL completo).

### `course_creation_donate_message_show`

**Mostra messaggio di donazione nella pagina di creazione del corso**

Aggiunge una casella di messaggio nella pagina di creazione del corso per gli insegnanti, chiedendo loro di donare al progetto.

*Predefinito: `false`*

### `course_creation_form_hide_course_code`

**Rimuovi il campo del codice del corso dal modulo di creazione del corso**

Se non fornito, il codice del corso viene generato automaticamente in base al titolo del corso, quindi abilita questa opzione per rimuovere completamente il campo del codice dal modulo di creazione del corso.

*Predefinito: `false`*

### `course_creation_form_set_course_category_mandatory`

**Rendi obbligatoria la categoria del corso**

Durante la creazione di un corso, rende obbligatoria l'impostazione della categoria del corso.

*Predefinito: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campi extra da rendere obbligatori nel modulo di creazione del corso**

I campi definiti in questo array saranno obbligatori nel modulo di creazione del corso.

### `course_creation_splash_screen`

**Schermata iniziale per i corsi**

Mostra una schermata iniziale quando si crea un nuovo corso.

*Predefinito: `true`*

---
### `course_creation_use_template`

**Usa un corso modello per i nuovi corsi**

Imposta questa opzione per utilizzare lo stesso corso modello (identificato dal suo ID numerico nel database) per tutti i nuovi corsi che verranno creati sulla piattaforma. Si prega di notare che, se non pianificato adeguatamente, questa impostazione potrebbe avere un impatto significativo sull'uso dello spazio. Il corso modello verrà utilizzato come se l'insegnante avesse effettuato una copia del corso con gli strumenti di backup del corso, quindi non verrà copiato alcun contenuto degli utenti, solo il materiale dell'insegnante. Si applicano tutte le altre regole di backup del corso. Lascia vuoto (o imposta a 0) per disabilitare.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Precompila i campi del corso con i campi dell'utente**

Se non vuoto, il processo di creazione del corso cercherà alcuni campi nel profilo utente e li compilerà automaticamente per il corso. Ad esempio, un insegnante specializzato in marketing digitale potrebbe impostare automaticamente un flag «marketing digitale» su ogni corso che crea.

### `course_hide_tools`

**Nascondi strumenti agli insegnanti**

Seleziona gli strumenti che desideri nascondere agli insegnanti. Questo impedirà l'accesso allo strumento.

### `course_images_in_courses_list`

**Icone personalizzate dei corsi**

Utilizza le immagini del corso come icona del corso negli elenchi dei corsi (invece dell'icona predefinita della lavagna verde).

*Default: `true`*

### `course_log_default_extra_fields`

**Campi extra utente predefiniti nella pagina delle statistiche del corso**

Configura questo array con gli ID interni dei campi extra che desideri mostrare per impostazione predefinita nella pagina principale delle statistiche del corso.

### `course_log_hide_columns`

**Nascondi colonne dai log del corso**

Questo array ti offre la possibilità di configurare quali colonne nascondere nella pagina principale delle statistiche del corso e nel rapporto sul tempo totale.

### `course_sequence_valid_only_in_same_session`

**Convalida i prerequisiti solo all'interno della stessa sessione**

Quando abilitata, un corso sarà considerato convalidato solo se superato all'interno della sessione corrente. Se disabilitata, i corsi superati in altre sessioni sbloccheranno anche i corsi dipendenti.

*Default: `false`*

### `course_student_info`

**Visualizzazione delle informazioni dello studente nel corso**

Nelle pagine «I miei corsi»/«Le mie sessioni», mostra informazioni aggiuntive relative al punteggio, al progresso e/o all'acquisizione del certificato da parte dello studente.

### `course_validation`

**Convalida dei corsi**

Quando la funzione «Convalida dei corsi» è abilitata, un insegnante non può creare un corso da solo. Compila una richiesta di corso. L'amministratore della piattaforma esamina la richiesta e la approva o la rifiuta.<br />Questa funzione si basa sulla messaggistica e-mail automatizzata; configura Chamilo per accedere a un server e-mail e utilizzare un account e-mail dedicato.

*Default: `false`*

### `course_validation_terms_and_conditions_url`

**Convalida del corso - un link ai termini e condizioni**

Questo è l'URL del documento «Termini e Condizioni» valido per fare una richiesta di corso. Se l'indirizzo è impostato qui, l'utente deve leggere e accettare questi termini e condizioni prima di inviare una richiesta di corso.<br />Se abiliti il modulo «Termini e Condizioni» di Chamilo e desideri che venga utilizzato il suo URL, lascia questa impostazione vuota.

### `courses_default_creation_visibility`

**Visibilità predefinita del corso**

Visibilità predefinita del corso durante la creazione di un nuovo corso

*Default: `2`*

### `display_coursecode_in_courselist`

**Mostra il codice del corso nel nome del corso**

Mostra il codice del corso nell'elenco dei corsi

*Default: `false`*

### `display_teacher_in_courselist`

**Mostra l'insegnante nel nome del corso**

Mostra l'insegnante nell'elenco dei corsi

*Default: `true`*

### `enable_tool_introduction`

**Abilita introduzione agli strumenti**

Abilita le introduzioni nella homepage di ogni strumento

*Default: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Mostra il pulsante di annullamento dell'iscrizione nella pagina «I miei corsi»**

Aggiungi un pulsante per annullare l'iscrizione a un corso nella pagina «I miei corsi».

*Default: `false`*

### `example_material_course_creation`

**Materiale di esempio alla creazione del corso**

Crea automaticamente materiale di esempio durante la creazione di un nuovo corso

*Default: `true`*

### `hide_course_rating`

**Nascondi la valutazione del corso**

La funzione di valutazione del corso è presente per impostazione predefinita in diversi punti. Se non la desideri, abilita questa opzione.

*Default: `false`*

### `hide_course_sidebar`

**Nascondi il blocco dei corsi nella barra laterale**

Quando su schermi in cui il menu a sinistra è visibile, non mostrare la sezione «Corsi».

*Default: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostra il marker del corso condiviso multi-URL**

Aggiunge un'icona di collegamento ai corsi condivisi tra URL, in modo che gli utenti (in particolare gli insegnanti) sappiano che devono prestare particolare attenzione durante la modifica del contenuto del corso.

*Default: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostra solo i corsi nella lingua dell'utente**

Se abilitata, questa opzione nasconderà tutti i corsi non impostati nella lingua dell'utente.

*Default: `false`*

---
### `profiling_filter_adding_users`

**Filtra gli utenti in base ai campi del profilo durante l'iscrizione al corso**

Consente agli insegnanti di filtrare gli utenti in base a campi aggiuntivi nella pagina per iscrivere gli utenti al loro corso.

*Predefinito: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostra le dipendenze nell'introduzione del corso**

Quando si utilizza la sequenza di risorse con corsi o sessioni, mostra le dipendenze del corso nella homepage del corso.

*Predefinito: `false`*


### `scorm_cumulative_session_time`

**Tempo di sessione cumulativo per SCORM**

Quando abilitato, il tempo di sessione per i Percorsi di Apprendimento SCORM sarà cumulativo; altrimenti, verrà conteggiato solo dall'ultimo aggiornamento. Questa è un'impostazione globale. Viene utilizzata quando si crea un nuovo Percorso di Apprendimento, ma può essere ridefinita per ciascuno di essi.

*Predefinito: `true`*


### `send_email_to_admin_when_create_course`

**Avviso via email alla creazione di un corso**

Invia un'email all'amministratore della piattaforma ogni volta che un insegnante crea un nuovo corso.

*Predefinito: `false`*


### `show_course_duration`

**Mostra la durata dei corsi**

Visualizza la durata del corso accanto al titolo del corso nel catalogo dei corsi e nell'elenco dei corsi.

*Predefinito: `false`*


### `show_navigation_menu`

**Mostra il menu di navigazione del corso**

Visualizza un menu di navigazione che velocizza l'accesso agli strumenti.

*Predefinito: `false`*


### `show_toolshortcuts`

**Scorciatoie per gli strumenti**

Mostrare le scorciatoie per gli strumenti nel banner?

*Predefinito: `false`*


### `student_view_enabled`

**Abilita la visualizzazione per gli studenti**

Abilita la visualizzazione per gli studenti, che consente a un insegnante o amministratore di vedere un corso come lo vedrebbe uno studente.

*Predefinito: `true`*


### `view_grid_courses`

**Visualizza i corsi in una griglia**

Visualizza i corsi in un layout con più corsi per riga. Altrimenti, il layout mostrerà un corso per riga.

*Predefinito: `true`*