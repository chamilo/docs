# Impostazioni degli Incarichi (Lavori)

Impostazioni predefinite e comportamento dello strumento **Incarichi (Pubblicazioni degli Studenti)**.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Incarichi (Lavori)**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_compilatio_tool`

**Abilita Compilatio**

Compilatio è un servizio anti-plagio che confronta il testo tra due consegne e segnala se esiste un'alta probabilità che il contenuto (di solito incarichi) non sia autentico.

*Predefinito: `false`*

### `allow_my_student_publication_page`

**Abilita la pagina I miei incarichi**

[dedotto] Abilita una pagina dedicata per gli studenti per visualizzare e gestire i propri incarichi consegnati.

*Predefinito: `false`*

### `allow_only_one_student_publication_per_user`

**Gli studenti possono caricare solo un incarico**

[dedotto] Limita gli studenti a consegnare un solo incarico per attività, impedendo consegne multiple.

*Predefinito: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Reindirizza alla homepage dello strumento incarichi dopo il caricamento o un commento**

Reindirizza all'elenco degli incarichi dopo aver caricato un incarico o aggiunto un commento.

*Predefinito: `false`*

### `assignment_prevent_duplicate_upload`

**Impedisci caricamenti duplicati negli incarichi**

[dedotto] Impedisci agli studenti di caricare file identici per la stessa consegna di un incarico.

*Predefinito: `false`*

### `block_student_publication_add_documents`

**Impedisci l'aggiunta di documenti agli incarichi**

[dedotto] Impedisci agli studenti di aggiungere o allegare documenti durante la consegna degli incarichi.

*Predefinito: `false`*

### `block_student_publication_edition`

**Impedisci la modifica degli incarichi**

[dedotto] Impedisci agli studenti di modificare o aggiornare i propri incarichi consegnati dopo la consegna iniziale.

*Predefinito: `false`*

### `block_student_publication_score_edition`

**Impedisci agli insegnanti di modificare i punteggi degli incarichi**

[dedotto] Impedisci agli insegnanti di modificare i punteggi degli incarichi dopo che sono stati registrati.

*Predefinito: `false`*

### `compilatio_tool`

**Impostazioni di Compilatio**

Configura qui i dettagli di connessione a Compilatio.

### `considered_working_time`

**Abilita il tempo di impegno per gli incarichi**

Questo permetterà agli insegnanti di fornire una stima del tempo di impegno (nel formato hh:mm:ss) per completare l'incarico. Una volta consegnato l'incarico e approvato dall'insegnante (l'incarico riceve un punteggio), allo studente verrà automaticamente assegnato il tempo corrispondente.

*Predefinito: `work_time`*

### `force_download_doc_before_upload_work`

**Forza il download del documento prima del caricamento dell'incarico**

Obbliga gli utenti a scaricare il documento fornito nella definizione dell'incarico prima di poter caricare il proprio incarico.

*Predefinito: `true`*

### `my_courses_show_pending_work`

**Mostra il collegamento agli incarichi 'in sospeso' dalla pagina I miei corsi**

[dedotto] Mostra un collegamento o un conteggio degli incarichi in sospeso nella pagina I miei corsi dello studente per un accesso rapido.

*Predefinito: `false`*