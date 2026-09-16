# Impostazioni Compiti (Work)

Valori predefiniti e comportamento dello strumento **Compiti (Pubblicazioni degli studenti)**.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Compiti (Work)**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_compilatio_tool`

**Abilita Compilatio**

Compilatio è un servizio anti-plagio che confronta il testo tra due consegne e segnala se esiste un'alta probabilità che il contenuto (di solito i compiti) non sia originale.

*Predefinito: `false`*

### `allow_my_student_publication_page`

**Abilita la pagina I miei compiti**

[inferred] Abilita una pagina dedicata affinché gli studenti possano visualizzare e gestire i propri compiti consegnati.

*Predefinito: `false`*

### `allow_only_one_student_publication_per_user`

**Gli studenti possono caricare un solo compito**

[inferred] Limita gli studenti alla consegna di un solo compito per attività, impedendo consegne multiple.

*Predefinito: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Reindirizza alla homepage dello strumento compiti dopo il caricamento o un commento**

Reindirizza all'elenco dei compiti dopo il caricamento di un compito o l'aggiunta di un commento

*Predefinito: `false`*

### `assignment_prevent_duplicate_upload`

**Impedisci i caricamenti duplicati nei compiti**

[inferred] Impedisce agli studenti di caricare file identici per la stessa consegna di un compito.

*Predefinito: `false`*

### `block_student_publication_add_documents`

**Impedisci l'aggiunta di documenti ai compiti**

[inferred] Impedisce agli studenti di aggiungere o allegare documenti al momento della consegna dei compiti.

*Predefinito: `false`*

### `block_student_publication_edition`

**Impedisci la modifica dei compiti**

[inferred] Impedisce agli studenti di modificare o aggiornare i compiti già consegnati dopo la prima consegna.

*Predefinito: `false`*

### `block_student_publication_score_edition`

**Impedisci al docente di modificare i punteggi dei compiti**

[inferred] Impedisce ai docenti di modificare i punteggi dei compiti dopo che sono stati registrati.

*Predefinito: `false`*

### `compilatio_tool`

**Impostazioni Compilatio**

Configurare qui i dettagli di connessione a Compilatio.

### `considered_working_time`

**Abilita lo sforzo temporale per i compiti**

Questo consente ai docenti di assegnare uno sforzo temporale stimato (in formato hh:mm:ss) per completare il compito. Alla consegna del compito e all'approvazione da parte del docente (al compito viene assegnato un punteggio), allo studente verrà automaticamente attribuito il tempo corrispondente.

*Predefinito: `work_time`*

### `force_download_doc_before_upload_work`

**Forza il download del documento prima del caricamento del compito**

Obbliga gli utenti a scaricare il documento fornito nella definizione del compito prima di poter caricare il proprio compito.

*Predefinito: `true`*

### `my_courses_show_pending_work`

**Mostra il collegamento ai compiti "in sospeso" dalla pagina I miei corsi**

[inferred] Mostra un collegamento o un conteggio dei compiti in sospeso nella pagina I miei corsi dello studente per un accesso rapido.

*Predefinito: `false`*