# Panoramica dell'interfaccia di amministrazione

Il pannello di amministrazione è il centro di comando per la gestione della piattaforma Chamilo. Vi si accede facendo clic su **Amministrazione** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Amministrazione" data-size="line"> nella barra laterale.

## Dashboard di amministrazione

![Il dashboard di amministrazione che mostra i blocchi funzionali per Utenti, Corsi, Sessioni e Impostazioni](../../.gitbook/assets/admin-dashboard-overview.png)

Il dashboard di amministrazione è organizzato in blocchi funzionali. Ogni blocco raggruppa gli strumenti di gestione correlati:

### Utenti

* **Elenco utenti** — Visualizzare, cercare, modificare e gestire tutti gli utenti della piattaforma
* **Aggiungere un utente** — Creare account utente individuali
* **Classi** — Gestire le classi di utenti per l'iscrizione in blocco alle sessioni

Per i dettagli, consultare il capitolo [Utenti](../users/README.md).

### Corsi

* **Elenco corsi** — Visualizzare e gestire tutti i corsi della piattaforma
* **Creare un corso** — Creare un nuovo corso
* **Categorie di corsi** — Organizzare i corsi in categorie per il catalogo

Per i dettagli, consultare il capitolo [Corsi](../courses/README.md).

### Sessioni

* **Elenco sessioni** — Visualizzare e gestire le sessioni formative
* **Creare una sessione** — Impostare una nuova sessione con corsi e iscrizioni
* **Categorie di sessioni** — Organizzare le sessioni in categorie
* **Carriere e promozioni** — Gestire i percorsi di carriera e i flussi di promozione

Per i dettagli, consultare il capitolo [Sessioni](../sessions/README.md).

### Piattaforma

* **Impostazioni di configurazione**, **Lingue**, **Notizie del portale**, **Agenda globale**, **Pagine**, **Campi extra**, **Modelli di posta**, **Categorie del modulo di contatto** e altro — consultare il capitolo [Piattaforma](../platform/README.md) per i dettagli. Il collegamento «Impostazioni di configurazione» è il punto di ingresso al capitolo separato [Impostazioni della piattaforma](../platform-settings/README.md).

### Analisi

* **Statistiche globali**, **Catalogo dei report**, **Analisi dell'apprendimento**, **Report trimestrale**, **Report del tempo dei docenti**, **Report aziendale**, **Esportazioni speciali**, **Ticket** — Statistiche e reportistica della piattaforma; consultare il capitolo [Analisi](../analytics/README.md) per i dettagli

### Competenze

* **Ruota delle competenze**, **Importazione delle competenze**, **Gestire le competenze**, **Gestire i livelli di competenza**, **Classifica delle competenze**, **Competenze e valutazioni** — Badge di competenza collegati ai risultati del registro dei voti; consultare il capitolo [Competenze](../skills/README.md) per i dettagli

### Sistema

* **Pulire i file temporanei**, **Stato del sistema**, **Aggiornamento del sistema**, **Colori**, **Informazioni sui file**, **Risorse per tipo**, **Elenco icone** — Manutenzione del server, auto-aggiornamento e branding; consultare il capitolo [Sistema](../system/README.md) per i dettagli

### Aule

* **Sedi**, **Aule**, **Ricerca disponibilità aule** — Sedi fisiche e aule formative prenotabili; consultare il capitolo [Aule](../rooms/README.md) per i dettagli

### Sicurezza

* **Audit delle attività**, **Tentativi di accesso**, **IDS semplice**, **Verifica della robustezza delle password**, **Integrità dei file** — Strumenti di monitoraggio e audit della sicurezza; consultare il capitolo [Sicurezza](../security/README.md) per i dettagli

### Plugin

* Collegamenti rapidi ai plugin installati che dichiarano una pagina di menu di amministrazione, oltre alla gestione generale dei plugin — consultare il capitolo [Plugin](../plugins/README.md) per i dettagli

### Controllo dello stato di salute

* Controlli live di superamento/fallimento (impostazioni di posta, assegnazione URL di amministrazione, permessi sui file) — consultare la pagina [Controllo dello stato di salute](../health-check.md) per i dettagli

### Altri blocchi

* **Chamilo.org**, **Controllo versione**, **Supporto professionale**, **Notizie da Chamilo** — collegamenti e pannelli di stato che recuperano contenuti dal progetto Chamilo; consultare [Altri blocchi di amministrazione](../other-admin-blocks/README.md) per i dettagli

Ogni sezione è trattata in dettaglio nel capitolo corrispondente di questa guida.

I metodi di autenticazione come OAuth2, LDAP, CAS e altri provider di autenticazione esterna non si configurano nel dashboard di amministrazione, ma in `config/authentication.yaml`.