# Impostazioni dei Documenti

Comportamento dello strumento **Documenti** del corso — caricamenti, estensioni consentite, condivisione e modelli.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Documenti**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `access_url_specific_files`

**Abilita file specifici per URL**

Quando questa funzionalità è abilitata in una configurazione multi-URL, puoi accedere all'URL principale e fornire versioni specifiche per URL di qualsiasi file (nello strumento documenti). Il file originale verrà sostituito dalla versione alternativa ogni volta che lo si visualizza da un URL diverso. Questo ti consente di personalizzare ulteriormente ogni URL, godendo del vantaggio di riutilizzare gli stessi corsi più volte.

*Predefinito: `false`*

### `default_document_quotum`

**Spazio su disco rigido predefinito**

Qual è lo spazio su disco disponibile per un corso? Puoi sovrascrivere la quota per un corso specifico tramite: amministrazione della piattaforma > Corsi > modifica

*Predefinito: `1000`*

### `default_group_quotum`

**Spazio su disco disponibile per i gruppi**

Qual è lo spazio su disco rigido predefinito disponibile per lo strumento documenti dei gruppi?

*Predefinito: `250`*

### `documents_custom_cloud_link_list`

**Imposta un elenco rigoroso di host per i collegamenti cloud**

Lo strumento documenti può integrare collegamenti a file nel cloud. L'elenco dei servizi cloud è limitato a una lista predefinita, ma puoi definire l'array 'links' che conterrà un elenco dei tuoi servizi/URL personalizzati. L'elenco definito qui sostituirà l'elenco predefinito.

### `documents_default_visibility_defined_in_course`

**Visibilità dei documenti definita nel corso**

La visibilità predefinita dei documenti per tutti i corsi

*Predefinito: `false`*

### `documents_hide_download_icon`

**Nascondi l'icona di download dei documenti**

Nello strumento documenti, nascondi l'icona di download agli utenti.

*Predefinito: `false`*

### `enable_x_sendfile_headers`

**Abilita intestazioni X-sendfile**

Abilita questa opzione se hai X-sendfile abilitato a livello di server web e desideri aggiungere le intestazioni necessarie affinché i browser le riconoscano.

*Predefinito: `false`*

### `group_category_document_access`

**Abilita opzioni di condivisione per i documenti all'interno della categoria di gruppo**

Quando abilitata, gli amministratori possono impostare l'accesso ai documenti e le autorizzazioni di condivisione per i gruppi di documenti per categoria.

*Predefinito: `false`*

### `group_document_access`

**Abilita opzioni di condivisione per i documenti di gruppo**

Quando abilitata, le autorizzazioni di condivisione e accesso ai documenti possono essere configurate a livello di gruppo.

*Predefinito: `false`*

### `pdf_export_watermark_by_course`

**Abilita definizione della filigrana per corso**

Quando questa opzione è abilitata, i docenti possono definire la propria filigrana per i documenti nei loro corsi.

*Predefinito: `false`*

### `pdf_export_watermark_enable`

**Abilita filigrana nell'esportazione PDF**

Abilitando questa opzione, puoi caricare un'immagine o un testo che verrà automaticamente aggiunto come filigrana a tutte le esportazioni PDF dei documenti sul sistema.

*Predefinito: `false`*

### `pdf_export_watermark_text`

**Testo della filigrana PDF**

Questo testo verrà aggiunto come filigrana alle esportazioni dei documenti in formato PDF.

### `permanently_remove_deleted_files`

**I file eliminati non possono essere ripristinati**

Eliminare un file nello strumento documenti lo elimina permanentemente. Il file non può essere ripristinato.

*Predefinito: `false`*

### `permissions_for_new_directories`

**Permessi per nuove directory**

La possibilità di definire le impostazioni dei permessi da assegnare a ogni directory appena creata ti consente di migliorare la sicurezza contro attacchi di hacker che caricano contenuti pericolosi sul tuo portale. L'impostazione predefinita (0770) dovrebbe essere sufficiente per fornire al tuo server un livello di protezione ragionevole. Il formato fornito utilizza la terminologia UNIX di Proprietario-Gruppo-Altri con permessi di Lettura-Scrittura-Esecuzione.

*Predefinito: `0770`*

### `permissions_for_new_files`

**Permessi per nuovi file**

La possibilità di definire le impostazioni dei permessi da assegnare a ogni file appena creato ti consente di migliorare la sicurezza contro attacchi di hacker che caricano contenuti pericolosi sul tuo portale. L'impostazione predefinita (0550) dovrebbe essere sufficiente per fornire al tuo server un livello di protezione ragionevole. Il formato fornito utilizza la terminologia UNIX di Proprietario-Gruppo-Altri con permessi di Lettura-Scrittura-Esecuzione. Se utilizzi Oogie, assicurati che l'utente che avvia LibreOffice possa scrivere file nella cartella del corso.

*Predefinito: `0660`*

### `send_notification_when_document_added`

**Invia notifica agli studenti quando viene aggiunto un documento**

Ogni volta che qualcuno crea un nuovo elemento nello strumento documenti, invia una notifica agli utenti.

*Predefinito: `false`*

---
### `show_default_folders`

**Mostra nello strumento documenti tutte le cartelle contenenti risorse multimediali fornite di default**

Cartelle di file multimediali contenenti file forniti di default organizzati in categorie di video, audio, immagini e animazioni flash da utilizzare nei corsi. Anche se le rendi invisibili nello strumento documenti, puoi comunque utilizzare queste risorse nell'editor web della piattaforma.

*Default: `true`*

### `show_documents_preview`

**Mostra anteprima dei documenti**

Mostrare le anteprime dei documenti nello strumento documenti evita di caricare una nuova pagina solo per visualizzare un documento, ma può risultare instabile con alcuni browser più vecchi o schermi di larghezza ridotta.

*Default: `false`*

### `show_users_folders`

**Mostra le cartelle degli utenti nello strumento documenti**

Questa opzione consente di mostrare o nascondere agli insegnanti le cartelle che il sistema genera per ogni utente che visita lo strumento documenti o invia un file tramite l'editor web. Se mostri queste cartelle agli insegnanti, essi possono renderle visibili o meno agli studenti e consentire a ciascun studente di avere uno spazio specifico nel corso dove non solo archiviare documenti, ma anche creare e modificare pagine web, esportare in PDF, fare disegni, creare modelli web personali, inviare file, nonché creare, spostare ed eliminare directory e file e fare copie di sicurezza delle proprie cartelle. Ogni utente del corso dispone di un gestore di documenti completo. Inoltre, ricorda che qualsiasi utente può copiare un file visibile da qualsiasi cartella nello strumento documenti (indipendentemente dal proprietario) nei propri portfolio o nell'area documenti personali della rete sociale, che sarà disponibile per il suo utilizzo in altri corsi.

*Default: `true`*

### `students_download_folders`

**Consenti agli studenti di scaricare directory**

Permetti agli studenti di comprimere e scaricare un'intera directory dallo strumento documenti.

*Default: `true`*

### `students_export2pdf`

**Consenti agli studenti di esportare documenti web in formato PDF negli strumenti documenti e wiki**

Questa funzionalità è abilitata di default, ma in caso di abuso o sovraccarico del server, o in specifici ambienti di apprendimento, potresti volerla disabilitare per tutti i corsi.

*Default: `true`*

### `thematic_pdf_orientation`

**Orientamento PDF per il progresso del corso**

Nello strumento di progresso del corso, puoi stampare un PDF dei diversi elementi. Imposta 'portrait' o 'landscape' (termini tecnici) per modificarlo.

*Default: `landscape`*

### `upload_extensions_blacklist`

**Blacklist - impostazione**

La blacklist viene utilizzata per filtrare le estensioni dei file rimuovendo (o rinominando) qualsiasi file la cui estensione figuri nella blacklist sottostante. Le estensioni devono essere indicate senza il punto iniziale (.) e separate da punto e virgola (;) come nel seguente esempio: exe;com;bat;scr;php. I file senza estensione sono accettati. La distinzione tra maiuscole e minuscole non ha importanza.

### `upload_extensions_list_type`

**Tipo di filtraggio per il caricamento dei documenti**

Specifica se desideri utilizzare il filtraggio tramite blacklist o whitelist. Consulta la descrizione di blacklist o whitelist di seguito per maggiori dettagli.

*Default: `blacklist`*

### `upload_extensions_replace_by`

**Estensione di sostituzione**

Inserisci l'estensione che desideri utilizzare per sostituire le estensioni pericolose rilevate dal filtro. Necessario solo se hai selezionato un filtro con sostituzione.

*Default: `dangerous`*

### `upload_extensions_skip`

**Comportamento del filtraggio (salta/rinomina)**

Se scegli di saltare, i file filtrati tramite blacklist o whitelist non verranno caricati nel sistema. Se scegli di rinominarli, la loro estensione verrà sostituita con quella definita nell'impostazione di sostituzione dell'estensione. Attenzione: rinominare non offre una protezione reale e potrebbe causare conflitti di nomi se esistono più file con lo stesso nome ma estensioni diverse.

*Default: `true`*

### `upload_extensions_whitelist`

**Whitelist - impostazione**

La whitelist viene utilizzata per filtrare le estensioni dei file rimuovendo (o rinominando) qualsiasi file la cui estensione *NON* figuri nella whitelist sottostante. È generalmente considerata un approccio più sicuro ma più restrittivo al filtraggio. Le estensioni devono essere indicate senza il punto iniziale (.) e separate da punto e virgola (;) come nel seguente esempio: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. I file senza estensione sono accettati. La distinzione tra maiuscole e minuscole non ha importanza.

### `users_copy_files`

**Consenti agli utenti di copiare file da un corso nella propria area file personale**

Permette agli utenti di copiare file da un corso nella propria area file personale, visibile attraverso la rete sociale o tramite l'editor HTML quando non si trovano all'interno di un corso.

*Default: `true`*

### `video_features`

**Funzionalità video**

Array di funzionalità extra che puoi abilitare per il lettore video in Chamilo. Le opzioni includono 'speed', che consente di modificare la velocità di riproduzione di un video.