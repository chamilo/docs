# URL di Accesso

Gli URL di accesso consentono a una singola installazione di Chamilo di servire più portali separati.

## Casi d'Uso

* **Implementazioni multi-tenant** — Ospitare portali di formazione separati per diverse organizzazioni su un unico server
* **Portali dipartimentali** — Fornire a ciascun dipartimento il proprio portale personalizzato (ad esempio, `hr.training.company.com`, `it.training.company.com`)
* **Portali regionali** — Portali separati per diverse regioni o lingue

## Come Funziona

Ogni URL di accesso rappresenta un punto di ingresso separato alla stessa installazione di Chamilo:

* Gli utenti possono essere assegnati a uno o più URL di accesso
* I corsi e le sessioni appartengono a specifici URL di accesso
* Le impostazioni della piattaforma possono essere personalizzate per ciascun URL di accesso
* Il branding e i temi possono differire per URL
* Gli utenti di un portale non possono vedere gli utenti o i corsi di un altro portale (a meno che non siano esplicitamente condivisi)

## Configurazione

### Abilitazione del Multi-URL

La funzionalità Multi-URL deve essere abilitata nella configurazione di Chamilo (generalmente nelle impostazioni dell'ambiente). Questo viene solitamente fatto durante la configurazione iniziale.

### Creazione di un URL di Accesso

1. Dal pannello di amministrazione, navigare su **URL di Accesso**
2. Fare clic su **Aggiungi un URL**
3. Inserire l'URL (ad esempio, `https://portal2.yoursite.com`)
4. Configurare le impostazioni specifiche per questo URL
5. Salvare

### Assegnazione di Utenti e Corsi

* **Utenti** — Assegnare utenti a specifici URL di accesso. Un utente può appartenere a più URL.
* **Corsi** — Assegnare corsi a specifici URL di accesso
* **Sessioni** — Assegnare sessioni a specifici URL di accesso

### Impostazioni per URL

Ogni URL di accesso può avere le proprie:

* **Tema colore** — Branding visivo diverso
* **Nome e logo della piattaforma** — Identità personalizzata
* **Sovrascrittura delle impostazioni** — Alcune impostazioni della piattaforma possono essere personalizzate per URL

## Suggerimenti

* **Decidere presto** — Se si opta per una configurazione multi-URL, è consigliabile farlo all'inizio del progetto Chamilo, poiché richiede di lasciare il primo URL relativamente privo di contenuti. Abilitare il multi-URL successivamente è più complesso (richiede modifiche manuali al database).
* **Pianificare la struttura degli URL** — Decidere lo schema degli URL prima di creare gli URL di accesso, poiché modificarli successivamente influenzerà tutti i collegamenti e i segnalibri esistenti
* **Configurazione DNS** — Ogni URL di accesso deve risolversi allo stesso server Chamilo. Configurare i record DNS di conseguenza.
* **Amministratore globale** — Utilizzare il ruolo di Amministratore Globale per gestire tutti gli URL di accesso