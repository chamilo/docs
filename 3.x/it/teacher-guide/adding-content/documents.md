# Documenti

Lo strumento Documenti è il repository di file del corso. È possibile caricare file, creare documenti in formato HTML, organizzare i contenuti in cartelle e dare ai discenti accesso a tutti i materiali di cui hanno bisogno.

## Accesso allo strumento Documenti

Aprire lo strumento **Documenti** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documenti" data-size="line"> dalla homepage del corso. Verrà visualizzato un file browser che mostra la cartella radice della libreria di documenti del corso.

![Il file browser dei documenti che mostra cartelle e file con le icone delle azioni](/.gitbook/assets/documents-file-browser.png)

## Caricamento dei file

1. Fare clic sul pulsante **Carica** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Carica" data-size="line">
2. Selezionare uno o più file dal computer (è possibile trascinare e rilasciare i file nell'area di caricamento)
3. I file vengono caricati e appaiono nella cartella corrente

Chamilo supporta la maggior parte dei tipi di file comuni: PDF, documenti da ufficio (.docx, .odt), presentazioni (.pptx, .odp), fogli di calcolo (.xlsx, .ods), immagini (PNG, JPG, SVG, GIF), file audio, file video (incluso WEBM), file HTML e altro ancora.

Alcuni formati potrebbero essere vietati dall'amministratore del portale tramite un'impostazione di filtraggio whitelist/blacklist nella sezione di sicurezza dell'amministrazione.

Per una migliore leggibilità da parte dei discenti, si raccomanda di caricare file che un browser possa visualizzare o aprire senza strumenti aggiuntivi. Questo rende il corso più portabile e, di conseguenza, più accessibile ai dispositivi mobili e più leggibile per le persone con abilità particolari.

## Creazione di contenuti

Oltre a caricare file, è possibile creare contenuti direttamente in Chamilo:

### Pagine web

1. Fare clic su **Nuovo documento**
2. Utilizzare l'editor di testo avanzato per scrivere i contenuti con formattazione, immagini, tabelle e collegamenti
3. Inserire un **titolo** per la pagina
4. Salvare

L'editor di testo avanzato (TinyMCE) offre funzionalità simili a un elaboratore di testi, tra cui:

* Formattazione del testo (grassetto, corsivo, titoli, elenchi)
* Tabelle
* Immagini (caricamento o collegamento a immagini esistenti)
* Video e audio incorporati
* Collegamenti ad altre risorse
* Modifica del codice sorgente HTML per gli utenti avanzati

### Generazione di media con l'IA

Quando gli assistenti IA sono abilitati sulla piattaforma, è possibile chiedere all'IA di generare un'**immagine** o un **video breve** per illustrare un paragrafo nel documento in corso di modifica. Selezionare un paragrafo, aprire la finestra di dialogo **Genera media con l'IA** e l'IA produrrà un elemento multimediale che è possibile rivedere e inserire. La finestra di dialogo rispetta i permessi a livello di corso e compare solo nei corsi in cui la generazione di media con l'IA è consentita.

### Registrazione audio

Se il browser lo supporta, è possibile registrare audio direttamente nello strumento Documenti — utile per creare istruzioni audio o contenuti per l'apprendimento delle lingue. Ciò richiede una configurazione HTTPS per Chamilo, poiché la registrazione audio utilizza una tecnologia che il browser consente solo se la connessione è sicura.

## Organizzazione con le cartelle

Mantenere organizzata la libreria di documenti utilizzando le cartelle:

1. Fare clic su **Nuova cartella** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nuova cartella" data-size="line">
2. Inserire un nome per la cartella
3. Salvare

È possibile creare cartelle nidificate per costruire una gerarchia logica dei contenuti (ad es. `Module 1 > Week 1 > Readings`).

### Spostamento dei file

* Individuare il file nell'elenco
* Fare clic su **Sposta** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Sposta" data-size="line">
* Selezionare la cartella di destinazione
* Confermare

## Gestione dei documenti

Per ogni file o cartella è possibile:

| Azione | Icona | Descrizione |
|--------|------|-------------|
| **Modifica** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Modifica" data-size="line"> | Rinominare il file o modificarne il contenuto (per le pagine web) |
| **Elimina** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Elimina" data-size="line"> | Rimuovere il file o la cartella |
| **Scarica** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Scarica" data-size="line"> | Scaricare il file sul computer |
| **Visibilità** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilità" data-size="line"> | Nascondere o mostrare il file ai discenti |
| **Sostituisci** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Sostituisci" data-size="line"> | Sostituire il file con una versione aggiornata |
| **Sposta** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Sposta" data-size="line"> | Spostare in un'altra cartella |

Sostituire un file è una funzionalità importante quando si usano i documenti per costruire i percorsi di apprendimento, poiché la sostituzione del documento consente di aggiornarlo senza che i discenti perdano i progressi salvati per quel documento.

### Azioni in blocco

Selezionare più file utilizzando le caselle di controllo, quindi usare la barra degli strumenti per eliminare o scaricare tutti gli elementi selezionati in una sola volta.

## Integrazione OnlyOffice

Se l'amministratore ha configurato il plugin **OnlyOffice**, è possibile modificare file Word, Excel e PowerPoint (o LibreOffice) direttamente nel browser senza scaricarli. Cercare l'opzione **Modifica con OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> durante la visualizzazione di un file supportato.

I documenti sono memorizzati in Chamilo; OnlyOffice viene utilizzato solo per **visualizzare** o modificare i documenti nel browser, senza bisogno di alcun strumento aggiuntivo.

## File nel cloud

Se si utilizza un archivio cloud (Azure Blob, AWS S3 o Google Cloud) per i file, questi sono memorizzati nel cloud ma è possibile collegarli da qui. L'operazione è trasparente per voi e per gli studenti: lo strumento documenti funziona allo stesso modo indipendentemente dal backend di archiviazione.

## Consigli

* **Organizzare per tempo** — Creare la struttura delle cartelle prima di caricare i contenuti, così da non dover riorganizzare in seguito. Se sono stati creati altri corsi con la struttura corretta, è possibile utilizzarli in seguito come modello
* **Usare nomi di file descrittivi** — Aiutare gli studenti a trovare ciò di cui hanno bisogno con nomi chiari e significativi
* **Nascondere i lavori in corso** — Usare l'interruttore di visibilità per nascondere i documenti ancora in preparazione
* **Collegare dai percorsi di apprendimento** — Fare riferimento ai documenti all'interno dei percorsi di apprendimento per creare sequenze di apprendimento guidate
* **Controllare la quota disco** — Se il corso ha un limite di archiviazione, rimuovere i file obsoleti per liberare spazio