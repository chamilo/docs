# Impostazioni documenti

Comportamento dello strumento **Documenti** del corso — caricamenti, estensioni consentite, condivisione e modelli.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Documenti**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per gli script tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `access_url_specific_files`

**Abilita file specifici per URL**

Quando questa funzionalità è abilitata in una configurazione multi-URL, è possibile recarsi all'URL principale e fornire versioni specifiche per URL di qualsiasi file (nello strumento documenti). Il file originale verrà sostituito dall'alternativa ogni volta che lo si visualizza da un URL diverso. Ciò consente di personalizzare ulteriormente ciascun URL, pur godendo del vantaggio di riutilizzare più volte gli stessi corsi.

*Predefinito: `false`*

### `default_document_quotum`

**Spazio su disco rigido predefinito**

Qual è lo spazio su disco disponibile per un corso? È possibile sovrascrivere la quota per un corso specifico tramite: amministrazione della piattaforma > Corsi > modifica

*Predefinito: `1000`*


### `default_group_quotum`

**Spazio su disco disponibile per i gruppi**

Qual è lo spazio su disco rigido predefinito disponibile per lo strumento documenti di un gruppo?

*Predefinito: `250`*


### `documents_custom_cloud_link_list`

**Imposta un elenco rigoroso di host per i collegamenti cloud**

Lo strumento documenti può integrare collegamenti a file nel cloud. L'elenco dei servizi cloud è limitato a un elenco hardcoded, ma è possibile definire l'array ‘links’ che conterrà un elenco dei propri servizi/URL. L'elenco definito qui sostituirà l'elenco predefinito.

### `documents_default_visibility_defined_in_course`

**Visibilità dei documenti definita nel corso**

La visibilità predefinita dei documenti per tutti i corsi

*Predefinito: `false`*

### `documents_hide_download_icon`

**Nascondi l'icona di download dei documenti**

Nello strumento documenti, nascondere l'icona di download agli utenti.

*Predefinito: `false`*


### `enable_x_sendfile_headers`

**Abilita le intestazioni X-sendfile**

Abilitare questa opzione se X-sendfile è abilitato a livello di server web e si desidera aggiungere le intestazioni necessarie affinché i browser le rilevino.

*Predefinito: `false`*

### `group_category_document_access`

**Abilita le opzioni di condivisione per i documenti all'interno della categoria di gruppo**

Se abilitata, gli amministratori possono impostare l'accesso ai documenti e i permessi di condivisione per i gruppi di documenti per categoria.

*Predefinito: `false`*


### `group_document_access`

**Abilita le opzioni di condivisione per i documenti di gruppo**

Se abilitata, la condivisione dei documenti e i permessi di accesso possono essere configurati a livello di gruppo.

*Predefinito: `false`*


### `pdf_export_watermark_by_course`

**Abilita la definizione della filigrana per corso**

Quando questa opzione è abilitata, i docenti possono definire una propria filigrana per i documenti dei propri corsi.

*Predefinito: `false`*


### `pdf_export_watermark_enable`

**Abilita la filigrana nell'esportazione PDF**

Abilitando questa opzione, è possibile caricare un'immagine o un testo che verrà aggiunto automaticamente come filigrana a tutte le esportazioni PDF dei documenti sul sistema.

*Predefinito: `false`*

### `pdf_export_watermark_text`

**Testo della filigrana PDF**

Questo testo verrà aggiunto come filigrana alle esportazioni dei documenti in PDF.

### `permanently_remove_deleted_files`

**I file eliminati non possono essere ripristinati**

L'eliminazione di un file nello strumento documenti lo elimina in modo permanente. Il file non può essere ripristinato

*Predefinito: `false`*

### `permissions_for_new_directories`

**Permessi per le nuove directory**

La possibilità di definire le impostazioni dei permessi da assegnare a ogni directory appena creata consente di migliorare la sicurezza contro attacchi di hacker che caricano contenuti pericolosi sul portale. L'impostazione predefinita (0770) dovrebbe essere sufficiente per conferire al server un livello di protezione ragionevole. Il formato indicato utilizza la terminologia UNIX Proprietario-Gruppo-Altri con permessi di Lettura-Scrittura-Esecuzione.

*Predefinito: `0770`*


### `permissions_for_new_files`

**Permessi per i nuovi file**

La possibilità di definire le impostazioni dei permessi da assegnare a ogni file appena creato consente di migliorare la sicurezza contro attacchi di hacker che caricano contenuti pericolosi sul portale. L'impostazione predefinita (0550) dovrebbe essere sufficiente per conferire al server un livello di protezione ragionevole. Il formato indicato utilizza la terminologia UNIX Proprietario-Gruppo-Altri con permessi di Lettura-Scrittura-Esecuzione. Se si utilizza Oogie, prestare attenzione affinché l'utente che avvia LibreOffice possa scrivere file nella cartella del corso.

*Predefinito: `0660`*


### `send_notification_when_document_added`

**Invia una notifica agli studenti quando viene aggiunto un documento**

Ogni volta che qualcuno crea un nuovo elemento nello strumento documenti, inviare una notifica agli utenti.

*Predefinito: `false`*

### `show_default_folders`

**Mostra nello strumento documenti tutte le cartelle contenenti risorse multimediali fornite di default**

Cartelle di file multimediali contenenti file forniti di default, organizzati in categorie di video, audio, immagini e animazioni flash da utilizzare nei corsi. Anche se le si rende invisibili nello strumento documenti, è comunque possibile utilizzare queste risorse nell'editor web della piattaforma.

*Default: `true`*

### `show_documents_preview`

**Mostra l'anteprima dei documenti**

Mostrare le anteprime dei documenti nello strumento documenti eviterà di caricare una nuova pagina solo per visualizzare un documento, ma può risultare instabile con alcuni browser più datati o con schermi di larghezza ridotta.

*Default: `false`*

### `show_users_folders`

**Mostra le cartelle degli utenti nello strumento documenti**

Questa opzione consente di mostrare o nascondere ai docenti le cartelle che il sistema genera per ciascun utente che visita lo strumento documenti o invia un file tramite l'editor web. Se si mostrano queste cartelle ai docenti, essi potranno renderle visibili o meno agli studenti e consentire a ciascun studente di disporre di uno spazio specifico nel corso in cui non solo archiviare documenti, ma anche creare e modificare pagine web ed esportarle in PDF, realizzare disegni, creare modelli web personali, inviare file, nonché creare, spostare ed eliminare directory e file e fare copie di sicurezza dalle proprie cartelle. Ogni utente del corso dispone così di un gestore documenti completo. Si ricorda inoltre che qualsiasi utente può copiare un file visibile da qualsiasi cartella dello strumento documenti (che ne sia o meno il proprietario) nel proprio portfolio o nell'area documenti personali della rete sociale, che resterà disponibile per l'uso in altri corsi.

*Default: `true`*

### `students_download_folders`

**Consenti agli studenti di scaricare le directory**

Consenti agli studenti di comprimere e scaricare una directory completa dallo strumento documenti

*Default: `true`*


### `students_export2pdf`

**Consenti agli studenti di esportare i documenti web in formato PDF negli strumenti documenti e wiki**

Questa funzionalità è abilitata di default, ma in caso di abuso che sovraccarichi il server, o in ambienti di apprendimento specifici, si potrebbe volerla disabilitare per tutti i corsi.

*Default: `true`*

### `thematic_pdf_orientation`

**Orientamento PDF per l'avanzamento del corso**

Nello strumento avanzamento del corso è possibile stampare un PDF dei diversi elementi. Impostare ‘portrait’ o ‘landscape’ (termini tecnici) per modificarlo.

*Default: `landscape`*


### `upload_extensions_blacklist`

**Blacklist - impostazione**

La blacklist viene utilizzata per filtrare le estensioni dei file rimuovendo (o rinominando) qualsiasi file la cui estensione figuri nella blacklist sottostante. Le estensioni devono figurare senza il punto iniziale (.) e separate da punto e virgola (;) come nel seguente esempio:  exe;com;bat;scr;php. I file senza estensione sono accettati. Non ha importanza se le lettere sono maiuscole o minuscole.

### `upload_extensions_list_type`

**Tipo di filtro sui caricamenti di documenti**

Se si desidera utilizzare il filtro blacklist o whitelist. Vedere la descrizione della blacklist o della whitelist di seguito per maggiori dettagli.

*Default: `blacklist`*


### `upload_extensions_replace_by`

**Estensione di sostituzione**

Inserire l'estensione che si desidera utilizzare per sostituire le estensioni pericolose rilevate dal filtro. Necessaria solo se è stato selezionato un filtro per sostituzione.

*Default: `dangerous`*


### `upload_extensions_skip`

**Comportamento del filtro (salta/rinomina)**

Se si sceglie di saltare, i file filtrati tramite blacklist o whitelist non verranno caricati nel sistema. Se si sceglie di rinominarli, la loro estensione verrà sostituita da quella definita nell'impostazione di sostituzione dell'estensione. Attenzione: la rinomina non protegge realmente e può causare collisioni di nomi se esistono più file con lo stesso nome ma estensioni diverse.

*Default: `true`*


### `upload_extensions_whitelist`

**Whitelist - impostazione**

La whitelist viene utilizzata per filtrare le estensioni dei file rimuovendo (o rinominando) qualsiasi file la cui estensione *NON* figuri nella whitelist sottostante. È generalmente considerata un approccio più sicuro ma più restrittivo al filtraggio. Le estensioni devono figurare senza il punto iniziale (.) e separate da punto e virgola (;) come nel seguente esempio:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. I file senza estensione sono accettati. Non ha importanza se le lettere sono maiuscole o minuscole.

### `users_copy_files`

**Consenti agli utenti di copiare file da un corso nell'area file personale**

Consente agli utenti di copiare file da un corso nell'area file personale, visibile tramite la rete sociale o tramite l'editor HTML quando si trovano al di fuori di un corso

*Default: `true`*


### `video_features`

**Funzionalità video**

Array di funzionalità extra che è possibile abilitare per il lettore video in Chamilo. Le opzioni includono 'speed', che consente di modificare la velocità di riproduzione di un video.