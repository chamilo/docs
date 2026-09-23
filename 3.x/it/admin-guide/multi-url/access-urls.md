# URL di accesso

Le URL di accesso consentono a una singola installazione di Chamilo di servire più portali distinti.

Questo strumento è raggiungibile anche dal blocco [Piattaforma](../platform/README.md) della dashboard di amministrazione, come **Configura URL di accesso multiple**.


## Casi d'uso

* **Deploy multi-tenant** — Ospitare portali di formazione distinti per organizzazioni diverse su un unico server
* **Portali dipartimentali** — Assegnare a ciascun dipartimento un proprio portale con identità visiva (ad es. `hr.training.company.com`, `it.training.company.com`)
* **Portali regionali** — Portali distinti per regioni o lingue diverse

## Funzionamento

Ogni URL di accesso è un punto di ingresso distinto alla stessa installazione di Chamilo:

* Gli utenti possono essere assegnati a una o più URL di accesso
* Corsi e sessioni appartengono a URL di accesso specifiche
* Le impostazioni della piattaforma possono essere personalizzate per ciascuna URL di accesso
* Branding e temi possono differire per URL
* Gli utenti di un portale non possono vedere utenti o corsi di un altro (salvo condivisione esplicita)

## Configurazione

### Abilitazione del Multi-URL

Il Multi-URL deve essere abilitato nella configurazione di Chamilo (in genere nelle impostazioni dell'ambiente). Di solito ciò avviene durante l'installazione iniziale.

### Creazione di una URL di accesso

1. Dal pannello di amministrazione, accedere a **URL di accesso**
2. Fare clic su **Aggiungi URL**
3. Inserire l'URL (ad es. `https://portal2.yoursite.com`) e una descrizione
4. Facoltativamente scegliere una **URL padre** per nidificare questa URL sotto un'altra — vedere [Gerarchia delle URL](#url-hierarchy) di seguito
5. Salvare

### Assegnazione di utenti e corsi

* **Utenti** — Assegnare gli utenti a URL di accesso specifiche. Un utente può appartenere a più URL.
* **Corsi** — Assegnare i corsi a URL di accesso specifiche
* **Sessioni** — Assegnare le sessioni a URL di accesso specifiche

### Impostazioni per URL

Ogni URL di accesso può avere:

* **Tema colore** — Branding visivo distinto
* **Nome e logo della piattaforma** — Identità personalizzata
* **Sovrascritture delle impostazioni** — Alcune impostazioni della piattaforma possono essere personalizzate per URL

## Gerarchia delle URL

Le URL di accesso possono essere organizzate in un albero padre/figlio invece che in un elenco piatto. Durante la creazione o la modifica di una URL, un Amministratore globale senza restrizioni (vedere [Amministratori di sottoalbero](#subtree-administrators) di seguito) può scegliere qualsiasi altra URL come **URL padre**:

![Finestra di dialogo Modifica URL con il menu a discesa URL padre aperto, che elenca le altre URL di accesso disponibili come padre](../../.gitbook/assets/admin-access-url-parent-select.png)

* Il menu a discesa non propone mai la URL in corso di modifica, né alcuno dei suoi discendenti, come possibile padre — ciò impedisce di creare un ciclo. Il backend rivalida comunque questa condizione, indipendentemente da quanto mostrato dall'interfaccia.
* Se una URL viene creata senza scegliere un padre, per impostazione predefinita viene usata la **URL solo login** se esiste (vedere [Impostazioni per URL](#per-url-settings) sopra), altrimenti la prima URL di accesso — lo stesso comportamento predefinito esistente prima di questa funzionalità.
* La URL più in alto di un albero — quella senza padre — è la **radice** di quell'albero. Una singola installazione di Chamilo può ospitare più di un albero indipendente.

Ovunque siano elencate le URL di accesso — la dashboard Multi-URL e la pagina di gestione delle URL di accesso — l'albero è mostrato tramite indentazione, un padre seguito immediatamente dai propri figli (fratelli ordinati in ordine alfabetico), invece di una colonna «Padre» separata:

![Elenco delle URL di accesso che mostra una URL radice con due URL figlie, una delle quali ha a sua volta una URL figlia, indentate per riflettere la gerarchia](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Amministratori di sottoalbero

La gerarchia delle URL determina anche ciò che un [Amministratore globale](../users/user-roles.md) può gestire:

* Chi è registrato sulla URL **radice** di un albero è **senza restrizioni**: gestisce ogni URL di accesso, esattamente come prima di questa funzionalità.
* Chi è registrato solo su una URL **non radice** è **con ambito limitato**: le pagine Multi-URL e URL di accesso mostrano solo quella URL e i suoi discendenti, e il grafico degli accessi sulla dashboard Multi-URL recita «Accessi (le tue URL)» invece di «Accessi (tutte le URL combinate)».

Indipendentemente dall'ambito, le seguenti operazioni restano riservate a un Amministratore globale **senza restrizioni** — un amministratore con ambito limitato non può eseguirle nemmeno per le URL del proprio sottoalbero:

* Creare una nuova URL di accesso
* Modificare l'URL, la descrizione o il padre di una URL di accesso
* Attivare o disattivare una URL di accesso
* Eliminare una URL di accesso (la URL radice dell'intera installazione non può mai essere eliminata, da nessuno)
* Registrare se stessi in tutte le URL di accesso contemporaneamente

Un amministratore con ambito limitato può comunque gestire tutto ciò che è *assegnato* alle URL del proprio sottoalbero — utenti, corsi, sessioni, branding e impostazioni — ma non le voci delle URL di accesso in sé.

## Consigli

* **Decidere per tempo** — Se si sceglie una configurazione multi-URL, è opportuno farlo all'inizio del progetto Chamilo, poiché è necessario lasciare il primo URL relativamente privo di contenuti. Abilitare il multi-URL in un secondo momento è più complesso (richiede modifiche manuali ai database).
* **Pianificare la struttura degli URL** — Decidere lo schema degli URL prima di creare gli URL di accesso, poiché modificarli in seguito influisce su tutti i collegamenti e i segnalibri esistenti
* **Configurazione DNS** — Ogni URL di accesso deve risolvere verso lo stesso server Chamilo. Configurare di conseguenza i record DNS.
* **Amministratore globale** — Utilizzare il ruolo Global Administrator per gestire tutti gli URL di accesso. Per delegare invece la gestione di un solo ramo, registrare l'amministratore su un URL non radice — vedere [Amministratori di sottoalbero](#subtree-administrators)