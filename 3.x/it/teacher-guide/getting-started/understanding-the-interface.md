# Comprendere l'interfaccia

Chamilo 3.0 ha un'interfaccia pulita e moderna, progettata per mantenere la navigazione semplice. Questa pagina spiega in dettaglio ogni parte dell'interfaccia.

## La barra superiore

![La barra superiore con elementi annotati, tra cui logo, casella di posta, ticket di supporto e avatar utente](/.gitbook/assets/top-bar-annotated.png)

La barra superiore è sempre visibile in cima a ogni pagina. Contiene:

* **Logo della piattaforma** — Fare clic per tornare in qualsiasi momento alla pagina iniziale.
* **Icona della casella di posta** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Mostra i messaggi. Un badge rosso indica i messaggi non letti. Fare clic per aprire la casella di posta.
* **Icona del ticket di supporto** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Se abilitata dall'amministratore, consente di accedere al sistema dei ticket di supporto.
* **Il proprio avatar** — Un'immagine circolare nell'angolo in alto a destra. Fare clic per aprire un menu a discesa con i collegamenti al profilo, alle impostazioni dell'account e all'uscita.

## La barra laterale

La barra laterale a sinistra è la navigazione principale. Può essere compressa per lasciare più spazio all'area dei contenuti. Fare clic sulla freccia di commutazione sul bordo destro per espanderla o comprimerla. Chamilo memorizza la preferenza.

La barra laterale contiene i seguenti collegamenti (alcuni potrebbero essere nascosti a seconda della configurazione della piattaforma):

![Il pannello di navigazione della barra laterale nello stato espanso, con tutte le voci di menu](/.gitbook/assets/sidebar-expanded.png)

| Voce di menu | Icona | Descrizione |
|-----------|------|-------------|
| **Home** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Torna alla dashboard principale |
| **I miei corsi** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Elenca tutti i corsi in cui si è iscritti |
| **Le mie sessioni** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Elenca le sessioni formative (in corso, passate, future) |
| **Esplora altri corsi** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Sfoglia il catalogo dei corsi per trovarne di nuovi |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Il calendario personale e dei corsi |
| **Reporting** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Accede al tracciamento degli studenti e ai report dei corsi |
| **Rete sociale** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Connettersi con altri utenti, inviare messaggi, unirsi a gruppi |
| **Videoconferenza** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Accede alle sessioni video in diretta (se configurate) |
| **Amministrazione** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Amministrazione della piattaforma (visibile solo agli amministratori) |

In fondo alla barra laterale si trova l'opzione **Esci**, per uscire rapidamente al termine del lavoro. Questa opzione è disponibile anche dal menu a discesa dell'icona dell'avatar, nell'angolo in alto a destra.
Se la piattaforma è gestita tramite metodi di autenticazione esterni, queste opzioni di uscita potrebbero non essere disponibili.

## L'area dei contenuti principale

L'area centrale dello schermo mostra il contenuto della pagina corrente. In alto si vede spesso un **percorso di navigazione (breadcrumb)** che indica la posizione attuale nella piattaforma (ad esempio: Home > Rock music > Documents). Usare i breadcrumb per tornare a una pagina superiore.

## La homepage del corso

Quando si entra in un corso, si visualizza la **homepage del corso**. Questo argomento è trattato in dettaglio nella sezione [Creare il proprio corso](../creating-your-course/), ma ecco una rapida panoramica:

* **Titolo del corso** — Visualizzato in evidenza in alto
* **Introduzione del corso** — Una descrizione facoltativa in testo formattato che è possibile modificare
* **Griglia degli strumenti** — Una griglia di icone che rappresentano gli strumenti del corso (Documents, Exercises, Forums, ecc.)

Come docente, si vedranno controlli aggiuntivi:

* **Vista studente** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Attivare per vedere il corso come lo vedrebbe uno studente
* **Modifica introduzione** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Modifica il testo di introduzione del corso
* **Mostra tutto / Nascondi tutto** — Cambia rapidamente la visibilità di tutti gli strumenti per gli studenti
* **Ordina** — Abilita il trascinamento per riordinare gli strumenti sulla homepage

## Colori delle icone

Questa funzionalità è ancora sperimentale e non del tutto completa in Chamilo 3.0, ma stiamo cercando di applicare le seguenti regole a tutti i pulsanti e alle icone di azione dell'interfaccia:

* **Verde** per le azioni di creazione. Include l'aggiunta, la creazione, l'importazione, la valutazione, il salvataggio e la copia di contenuti.
* **Blu** per le azioni di visualizzazione. Include l'esportazione, la visualizzazione, l'anteprima in elenchi o in viste di dettaglio, la ricerca e il download.
* **Arancione** per le azioni di modifica. Include la modifica, lo spostamento, la configurazione, l'abilitazione/disabilitazione, l'occultamento e la visualizzazione.
* **Rosso** per le azioni di eliminazione/rimozione. Include l'eliminazione, la rimozione, la disiscrizione.
* **Grigio** per le azioni di annullamento. Consiste semplicemente nel lasciare le cose nello status quo.

## Design responsive

Chamilo 3.0 si adatta a schermi di dimensioni diverse. Su un dispositivo mobile o in una finestra del browser stretta:

* La barra laterale è nascosta per impostazione predefinita e può essere aperta toccando l'icona del menu
* Le schede dei corsi vengono visualizzate in una singola colonna invece che in una griglia
* Le tabelle diventano scorrevoli in orizzontale

Ciò significa che voi e i vostri studenti potete accedere alla piattaforma da telefono, tablet o computer, ma potreste percepire l'interfaccia in modo leggermente diverso.