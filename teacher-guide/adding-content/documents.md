# Documenti

Lo strumento Documenti è il repository di file del tuo corso. Puoi caricare file, creare documenti in formato HTML, organizzare i contenuti in cartelle e fornire agli studenti l'accesso a tutti i materiali di cui hanno bisogno.

## Accesso allo Strumento Documenti

Apri lo strumento **Documenti** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documenti" data-size="line"> dalla homepage del corso. Vedrai un browser di file che mostra la cartella principale della libreria di documenti del tuo corso.

![Il browser di file dei documenti che mostra cartelle e file con icone di azione](/.gitbook/assets/documents-file-browser.png)

## Caricamento di File

1. Fai clic sul pulsante **Carica** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Carica" data-size="line">
2. Seleziona uno o più file dal tuo computer (puoi trascinare e rilasciare i file nell'area di caricamento)
3. I file vengono caricati e appaiono nella cartella corrente

Chamilo supporta la maggior parte dei tipi di file comuni: PDF, documenti office (.docx, .odt), presentazioni (.pptx, .odp), fogli di calcolo (.xlsx, .ods), immagini (PNG, JPG, SVG, GIF), file audio, file video (incluso WEBM), file HTML e altro ancora.

Alcuni formati potrebbero essere vietati dall'amministratore del portale tramite un'impostazione di filtro whitelist/blacklist nella sezione sicurezza dell'amministrazione.

Per una migliore leggibilità da parte degli studenti, consigliamo di caricare file che un browser possa visualizzare o aprire senza strumenti aggiuntivi. Questo rende il tuo corso più portatile e, di conseguenza, più accessibile da dispositivi mobili e più leggibile per persone con abilità speciali.

## Creazione di Contenuti

Oltre a caricare file, puoi creare contenuti direttamente in Chamilo:

### Pagine Web

1. Fai clic su **Nuovo documento**
2. Usa l'editor di testo ricco per scrivere i tuoi contenuti con formattazione, immagini, tabelle e link
3. Inserisci un **titolo** per la pagina
4. Salva

L'editor di testo ricco (TinyMCE) offre funzionalità simili a un elaboratore di testi, tra cui:

* Formattazione del testo (grassetto, corsivo, intestazioni, elenchi)
* Tabelle
* Immagini (carica o collega a immagini esistenti)
* Video e audio incorporati
* Link ad altre risorse
* Modifica del codice sorgente HTML per utenti avanzati

### Generazione di contenuti multimediali con AI

Quando gli assistenti AI sono abilitati sulla piattaforma, puoi chiedere all'AI di generare un'**immagine** o un **breve video** per illustrare un paragrafo nel documento che stai modificando. Seleziona un paragrafo, apri la finestra di dialogo **Genera contenuti multimediali con AI** e l'AI produrrà un elemento multimediale che potrai rivedere e inserire. La finestra di dialogo rispetta i permessi a livello di corso e appare solo nei corsi in cui la generazione di contenuti multimediali con AI è consentita.

### Registrazione Audio

Se il tuo browser lo supporta, puoi registrare audio direttamente nello strumento Documenti, utile per creare istruzioni audio o contenuti per l'apprendimento delle lingue. Questo richiede una configurazione HTTPS per Chamilo, poiché la registrazione audio utilizza una tecnologia che il browser consente solo se la connessione è sicura.

## Organizzazione con Cartelle

Mantieni organizzata la tua libreria di documenti utilizzando le cartelle:

1. Fai clic su **Nuova cartella** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nuova cartella" data-size="line">
2. Inserisci un nome per la cartella
3. Salva

Puoi creare cartelle nidificate per costruire una gerarchia logica dei contenuti (ad esempio, `Modulo 1 > Settimana 1 > Letture`).

### Spostamento di File

* Individua il tuo file nell'elenco
* Fai clic su **Sposta** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Sposta" data-size="line">
* Seleziona la cartella di destinazione
* Conferma

## Gestione dei Documenti

Per ogni file o cartella, puoi:

| Azione | Icona | Descrizione |
|--------|-------|-------------|
| **Modifica** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Modifica" data-size="line"> | Rinominare il file o modificarne il contenuto (per le pagine web) |
| **Elimina** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Elimina" data-size="line"> | Rimuovere il file o la cartella |
| **Scarica** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Scarica" data-size="line"> | Scaricare il file sul tuo computer |
| **Visibilità** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilità" data-size="line"> | Nascondere o mostrare il file agli studenti |
| **Sostituisci** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Sostituisci" data-size="line"> | Sostituire il file con una versione aggiornata |
| **Sposta** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Sposta" data-size="line"> | Spostare in una cartella diversa |

Sostituire un file è una funzionalità importante quando utilizzi i documenti per costruire percorsi di apprendimento, poiché sostituire il documento permetterà di aggiornarlo senza che gli studenti perdano i progressi salvati per quel documento.

### Azioni in Blocco

Seleziona più file utilizzando le caselle di controllo, quindi utilizza la barra degli strumenti per eliminare o scaricare tutti gli elementi selezionati contemporaneamente.

---
## Integrazione con OnlyOffice

Se il tuo amministratore ha configurato il plugin **OnlyOffice**, puoi modificare file Word, Excel e PowerPoint (o LibreOffice) direttamente nel browser senza scaricarli. Cerca l'opzione **Modifica con OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> quando visualizzi un file supportato.

I documenti sono archiviati in Chamilo; OnlyOffice viene utilizzato solo per **visualizzare** o modificare i documenti nel browser, senza la necessità di strumenti aggiuntivi.

## File su Cloud

Se utilizzi un archivio cloud (Azure Blob, AWS S3 o Google Cloud) per i tuoi file, questi vengono memorizzati nel cloud ma puoi collegarli da qui. Questo processo è trasparente per te e per i tuoi studenti: lo strumento per i documenti funziona allo stesso modo indipendentemente dal backend di archiviazione.

## Suggerimenti

* **Organizza in anticipo** — Crea la struttura delle cartelle prima di caricare i contenuti, così non dovrai riorganizzare in seguito. Se hai creato altri corsi con la struttura corretta, puoi usarli come modello in futuro
* **Usa nomi di file descrittivi** — Aiuta gli studenti a trovare ciò di cui hanno bisogno con nomi chiari e significativi
* **Nascondi i lavori in corso** — Usa l'interruttore di visibilità per nascondere i documenti che stai ancora preparando
* **Collega ai percorsi di apprendimento** — Fai riferimento ai documenti all'interno dei tuoi percorsi di apprendimento per creare sequenze di apprendimento guidate
* **Controlla la quota disco** — Se il tuo corso ha un limite di archiviazione, rimuovi i file obsoleti per liberare spazio