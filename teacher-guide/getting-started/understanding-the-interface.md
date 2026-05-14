# Comprendere l'Interfaccia

Chamilo 2.0 presenta un'interfaccia pulita e moderna progettata per mantenere la navigazione semplice. Questa pagina spiega in dettaglio ogni parte dell'interfaccia.

## La Barra Superiore

![La barra superiore con elementi annotati inclusi logo, casella di posta, ticket di supporto e avatar dell'utente](/.gitbook/assets/top-bar-annotated.png)

La barra superiore è sempre visibile nella parte superiore di ogni pagina. Contiene:

* **Logo della piattaforma** — Cliccaci sopra per tornare alla pagina iniziale in qualsiasi momento.
* **Icona della casella di posta** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Casella di posta" data-size="line"> — Mostra i tuoi messaggi. Un badge rosso indica messaggi non letti. Clicca per aprire la tua casella di posta.
* **Icona del ticket di supporto** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Supporto" data-size="line"> — Se abilitata dall'amministratore, ti dà accesso al sistema di ticket di supporto.
* **Il tuo avatar** — Un'immagine circolare nell'angolo in alto a destra. Cliccaci sopra per aprire un menu a tendina con collegamenti al tuo profilo, alle impostazioni dell'account e alla disconnessione.

## La Barra Laterale

La barra laterale a sinistra è la tua principale strumento di navigazione. Può essere ridotta per lasciare più spazio all'area dei contenuti. Clicca sulla freccia di commutazione sul bordo destro per espanderla o ridurla. Chamilo ricorda la tua preferenza.

La barra laterale contiene i seguenti collegamenti (alcuni potrebbero essere nascosti a seconda della configurazione della tua piattaforma):

![Il pannello di navigazione della barra laterale nello stato espanso che mostra tutti gli elementi del menu](/.gitbook/assets/sidebar-expanded.png)

| Elemento del menu | Icona | Descrizione |
|-------------------|-------|-------------|
| **Home** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Torna alla dashboard principale |
| **I miei corsi** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Corsi" data-size="line"> | Elenca tutti i corsi a cui sei iscritto |
| **Le mie sessioni** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessioni" data-size="line"> | Elenca le tue sessioni di formazione (attuali, passate, future) |
| **Esplora altri corsi** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogo" data-size="line"> | Sfoglia il catalogo dei corsi per trovare nuovi corsi |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Il tuo calendario personale e dei corsi |
| **Reporting** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Accedi al monitoraggio degli studenti e ai rapporti sui corsi |
| **Rete sociale** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Rete sociale" data-size="line"> | Connettiti con altri utenti, invia messaggi, unisciti a gruppi |
| **Videoconferenza** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Accedi a sessioni video dal vivo (se configurato) |
| **Amministrazione** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Amministrazione della piattaforma (visibile solo agli amministratori) |

In fondo alla barra laterale, troverai un'opzione **Disconnetti** per uscire rapidamente quando hai finito. Questa opzione è disponibile anche dal menu a tendina dell'icona del tuo avatar nell'angolo in alto a destra.
Se la piattaforma è gestita tramite metodi di autenticazione esterni, queste opzioni di disconnessione potrebbero non essere disponibili.

## L'Area dei Contenuti Principale

L'area centrale dello schermo mostra il contenuto della pagina corrente. In alto, spesso vedrai un **percorso di navigazione** che indica la tua posizione attuale nella piattaforma (ad esempio: Home > Musica rock > Documenti). Usa il percorso di navigazione per tornare a una pagina genitore.

## La Homepage del Corso

Quando entri in un corso, vedi la **homepage del corso**. Questo argomento è trattato in dettaglio nella sezione [Creare il Tuo Corso](../creating-your-course/), ma ecco una rapida panoramica:

* **Titolo del corso** — Mostrato in modo prominente in alto
* **Introduzione al corso** — Una descrizione opzionale in formato rich-text che puoi modificare
* **Griglia degli strumenti** — Una griglia di icone che rappresentano gli strumenti del corso (Documenti, Esercizi, Forum, ecc.)

Come docente, vedrai controlli aggiuntivi:

* **Vista studente** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Vista studente" data-size="line"> — Attiva questa opzione per vedere il corso come lo vedrebbe uno studente
* **Modifica introduzione** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Modifica" data-size="line"> — Modifica il testo introduttivo del corso
* **Mostra tutto / Nascondi tutto** — Cambia rapidamente la visibilità di tutti gli strumenti per gli studenti
* **Ordina** — Abilita il trascinamento per riordinare gli strumenti nella homepage

## Colori delle icone

Questa funzionalità è ancora sperimentale e non completamente implementata in Chamilo 2.0, ma stiamo cercando di applicare le seguenti regole per tutti i pulsanti e le icone di azione nell'interfaccia:

* **Verde** per le azioni di creazione. Questo include aggiungere, creare, importare, valutare, salvare e copiare contenuti.
* **Blu** per le azioni di visualizzazione. Questo include esportare, visualizzare, fare un'anteprima in elenchi o in viste dettagliate, cercare e scaricare.
* **Arancione** per le azioni di modifica. Questo include modificare, spostare, configurare, abilitare/disabilitare, nascondere e mostrare.
* **Rosso** per le azioni di eliminazione/rimozione. Questo include eliminare, rimuovere, annullare l'iscrizione.
* **Grigio** per le azioni di annullamento. Significa semplicemente lasciare le cose nello stato attuale.

## Design Responsivo

Chamilo 2.0 si adatta a diverse dimensioni dello schermo. Su un dispositivo mobile o una finestra del browser stretta:

* La barra laterale è nascosta per impostazione predefinita e può essere aperta toccando l'icona del menu
* Le schede dei corsi vengono visualizzate in una singola colonna invece che in una griglia
* Le tabelle diventano scorrevoli orizzontalmente

Questo significa che tu e i tuoi studenti potete accedere alla piattaforma da un telefono, un tablet o un computer, ma potreste sperimentare l'interfaccia in modo leggermente diverso.