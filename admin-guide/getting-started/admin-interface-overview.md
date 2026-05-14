# Panoramica dell'Interfaccia di Amministrazione

Il pannello di amministrazione è il tuo centro di comando per gestire la piattaforma Chamilo. Accedici cliccando su **Amministrazione** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Amministratore" data-size="line"> nella barra laterale.

## Dashboard di Amministrazione

![La dashboard di amministrazione che mostra i blocchi funzionali per Utenti, Corsi, Sessioni e Impostazioni](/.gitbook/assets/admin-dashboard-overview.png)

La dashboard di amministrazione è organizzata in blocchi funzionali. Ogni blocco raggruppa strumenti di gestione correlati:

### Utenti

* **Elenco utenti** — Visualizza, cerca, modifica e gestisci tutti gli utenti sulla piattaforma
* **Aggiungi un utente** — Crea account utente individuali
* **Gruppi di utenti** — Gestisci gruppi di utenti per scopi organizzativi
* **Classi** — Gestisci le classi degli utenti per l'iscrizione in blocco alle sessioni

### Corsi

* **Elenco corsi** — Visualizza e gestisci tutti i corsi sulla piattaforma
* **Crea un corso** — Crea un nuovo corso
* **Categorie di corsi** — Organizza i corsi in categorie per il catalogo

### Sessioni

* **Elenco sessioni** — Visualizza e gestisci le sessioni di formazione
* **Crea una sessione** — Configura una nuova sessione con corsi e iscrizioni
* **Categorie di sessioni** — Organizza le sessioni in categorie
* **Carriere e promozioni** — Gestisci percorsi di carriera e flussi di promozione

### Impostazioni della Piattaforma

* **Impostazioni di configurazione** — Accedi al pannello completo delle impostazioni della piattaforma con categorie per portale, corsi, sessioni, utenti, sicurezza e altro ancora

### Plugin

* **Gestisci plugin** — Installa, attiva, configura e disattiva i plugin della piattaforma

### Sistema

* **Stato del sistema** — Controlla la configurazione PHP, lo stato del database e la salute del server
* **Pulizia archivi** — Gestisci file temporanei e cache

### Branding

* **Colori** — Personalizza l'aspetto visivo della piattaforma
* **Personalizzazione del portale** — Configura la homepage del portale, le notizie e gli elementi di branding

Ogni sezione è trattata in dettaglio nel capitolo corrispondente di questa guida.

I metodi di autenticazione come OAuth2, LDAP, CAS e altri provider di autenticazione esterni non vengono configurati nella dashboard di amministrazione, ma in `config/authentication.yaml`.