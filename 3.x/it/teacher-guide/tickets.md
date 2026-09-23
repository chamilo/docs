# Ticket di supporto

Lo strumento **Tickets** è un sistema di helpdesk integrato che consente agli utenti di inviare richieste di supporto e di seguirne la risoluzione. A seconda della configurazione della piattaforma, è possibile utilizzarlo come **richiedente** (inviando ticket per sé o per i propri studenti) o come **agente di supporto** (rispondendo ai ticket assegnati alla propria categoria).

## Come è organizzato il sistema

I ticket appartengono a **progetti**, a loro volta suddivisi in **categorie**. A ciascuna categoria possono essere assegnati uno o più agenti di supporto. Quando un ticket viene inviato, viene automaticamente instradato a un agente disponibile nella categoria selezionata.

Le categorie predefinite includono:

| Category | Description |
|----------|-------------|
| Enrollment | Domande e problemi relativi all'iscrizione a corsi o sessioni |
| General information | Domande generali sulla piattaforma |
| Requests and paperwork | Richieste amministrative e documentazione |
| Academic Incidents | Problemi relativi a esami, compiti o attività |
| Virtual campus | Problemi tecnici della piattaforma |
| Online evaluation | Problemi relativi a una valutazione specifica di un corso (richiede la selezione di un corso) |

## Accesso allo strumento Ticket

Se l'amministratore ha abilitato il collegamento ai ticket, un'icona ticket <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line"> compare nella barra di navigazione superiore. Fare clic su di essa per accedere direttamente al modulo di invio del ticket.

È inoltre possibile accedere ai propri ticket dal menu principale sotto **Supporto** o **Ticket**, a seconda della configurazione della piattaforma.

## Invio di un ticket

Per aprire una nuova richiesta di supporto:

1. Fare clic su **Nuovo ticket** (o sull'icona ticket nella barra superiore).
2. Selezionare la **categoria** che meglio corrisponde al problema.
3. Se la categoria lo richiede (ad esempio, Online evaluation), selezionare il **corso** pertinente.
4. Inserire un **oggetto** — un breve riepilogo del problema.
5. Scrivere il **messaggio** descrivendo il problema in dettaglio.
6. Facoltativamente, allegare file (screenshot, documenti) per aiutare l'agente di supporto a comprendere il problema.
7. Fare clic su **Invia**.

Al ticket viene assegnato un ID e viene instradato a un agente di supporto. Si riceverà una notifica quando l'agente risponderà.

## Monitoraggio dei propri ticket

Dall'elenco dei ticket è possibile visualizzare tutti i ticket inviati e il loro stato attuale:

| Status | Meaning |
|--------|---------|
| New | Appena inviato, non ancora esaminato |
| Pending | In esame da parte di un agente di supporto |
| Unconfirmed | In attesa di conferma o di informazioni aggiuntive |
| Forwarded | Trasferito a un altro team o agente |
| Closed | Risolto |

Fare clic su un ticket qualsiasi per leggere l'intera conversazione e aggiungere una risposta.

## Risposta a un ticket

Una volta aperto un ticket, il richiedente e l'agente di supporto scambiano messaggi nello stesso thread. Per aggiungere una risposta:

1. Aprire il ticket dall'elenco.
2. Scorrere fino al campo di risposta in basso.
3. Scrivere la risposta e allegare file se necessario.
4. Fare clic su **Invia**.

Entrambe le parti ricevono notifiche quando un nuovo messaggio viene aggiunto al thread.

## Gestione dei ticket come agente di supporto

Se l'amministratore ha assegnato l'utente a una o più categorie di ticket, i ticket in arrivo da studenti o colleghi compariranno nella coda.

Per rispondere a un ticket assegnato:

1. Aprire l'elenco dei ticket — i ticket assegnati compaiono insieme a quelli inviati.
2. Fare clic su un ticket per leggere il messaggio del richiedente.
3. Scrivere una risposta e fare clic su **Invia**. Lo stato del ticket si aggiorna automaticamente.
4. Quando il problema è risolto, cambiare lo stato in **Closed**.

È inoltre possibile modificare la **priorità** di un ticket (Low, Normal, High) per aiutare a gestire la coda.

> L'accesso alle categorie di ticket è controllato dall'amministratore della piattaforma. Se è necessario essere aggiunti come agente di supporto per una categoria, contattare l'amministratore. Vedere [Impostazioni dei ticket](../admin-guide/platform-settings/ticket-settings.md) della Guida amministratore per le opzioni di configurazione.