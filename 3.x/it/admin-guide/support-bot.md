# Bot di supporto (assistente ad albero decisionale)

Il **bot di supporto** è un assistente di aiuto configurabile, costruito a partire da un albero decisionale fisso. È stato implementato nella [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) per l'[issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). **Non è un chatbot di IA generativa**: gli amministratori scrivono domande e risposte selezionabili che guidano gli utenti verso una spiegazione, una pagina o un ticket di supporto.

## Attivarlo

1. In **Amministrazione > Impostazioni di configurazione > Ticket**, attivare `ticket.ticket_support_bot_enabled` (disattivato per impostazione predefinita).
2. Aprire **Amministrazione > Bot di supporto** e creare un albero decisionale in **bozza**. Indicare un titolo e almeno un nodo di ingresso con opzioni.
3. Definire la domanda o l'informazione di ciascun nodo e collegare le opzioni all'azione successiva.
4. Pubblicare un albero valido. Solo un albero pubblicato con un nodo di ingresso valido e opzioni selezionabili è disponibile per gli utenti.

Il motore seleziona l'albero pubblicato per l'URL di accesso corrente; la sua disponibilità è quindi limitata al portale. Un amministratore deve disporre di `ROLE_ADMIN` per gestire gli alberi.

## Progettare un flusso di supporto

Ciascuna opzione può eseguire una delle quattro azioni seguenti:

| Azione | Risultato |
| --- | --- |
| **Passare a un altro nodo** | Continuare la conversazione con un'altra domanda dello stesso albero |
| **Aprire un collegamento** | Collegare a una pagina di Chamilo tramite un percorso relativo dello stesso sito, ad esempio `/tickets` |
| **Terminare la conversazione** | Contrassegnare il problema come risolto e, facoltativamente, visualizzare un messaggio di chiusura |
| **Creare un ticket di supporto** | Inoltrare la conversazione al sistema Ticket |

Per l'inoltro a un ticket, selezionare un **progetto ticket predefinito** e una categoria appartenente a tale progetto. Le categorie che richiedono un corso non possono essere utilizzate per questo inoltro del bot di supporto. Il ticket creato contiene la trascrizione dell'albero decisionale dell'utente, in modo che il personale di supporto possa vedere le scelte che hanno portato all'inoltro.

L'editor convalida la struttura dell'albero prima della pubblicazione. Le versioni **Pubblicata** e **Archiviata** sono di sola lettura; usare **Duplica** per creare una nuova bozza modificabile. La pubblicazione di una sostituzione archivia la versione precedentemente pubblicata nello stesso ambito. Dall'elenco, gli amministratori possono anche importare o esportare un albero e consultarne la cronologia delle conversazioni. Un albero pubblicato deve essere archiviato prima dell'eliminazione e un albero con una cronologia delle conversazioni non può essere eliminato.

## Importare esempi e consultare le conversazioni

Aprire **Amministrazione > Bot di supporto** e selezionare **Importa**. La finestra di importazione offre **Scarica esempio JSON** e **Scarica esempio CSV**. Scaricare un esempio, sostituirne le domande e le opzioni con le proprie, quindi selezionare il file `.json` o `.csv` modificato e importarlo. Ogni albero importato inizia come una **nuova bozza**; esaminarlo e pubblicarlo esplicitamente quando è pronto.

Gli esempi non richiedono un progetto ticket esistente. Se il flusso di lavoro deve creare ticket, configurare il progetto richiesto e la categoria idonea dopo l'importazione.

Nell'elenco degli alberi, usare **Visualizza conversazioni** per esaminare i registri delle conversazioni di un determinato albero, compresi gli alberi il cui numero di conversazioni è pari a zero. Le cronologie delle conversazioni restano limitate all'utente e al portale pertinenti. Vedere la [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Come vi accedono gli utenti

Quando l'impostazione è attiva e il portale dispone di un albero pubblicato valido, gli utenti autenticati vedono un contatto **Bot di supporto** nella chat ancorata. Rispondono scegliendo le opzioni proposte. Il bot può risolvere la conversazione, aprire una pagina dello stesso sito oppure creare un ticket e mostrarne il collegamento. Gli utenti possono avviare una nuova conversazione dopo la conclusione di una precedente.

Questo è distinto dal **Tutor IA**, che risponde a domande di apprendimento a risposta aperta. Il bot di supporto segue soltanto i percorsi e le opzioni configurati dagli amministratori.

## Risoluzione dei problemi e sicurezza

* **Nessun bot nella chat:** verificare l'impostazione Ticket, che un albero sia pubblicato per il portale corrente e che il suo nodo di ingresso abbia delle opzioni.
* **Impossibile pubblicare:** esaminare i nodi mancanti, i nodi di destinazione non risolti e le azioni non valide nella bozza.
* **Impossibile creare il ticket:** controllare il progetto ticket e la categoria selezionati. Non usare una categoria di ticket che richiede un corso.
* **Conversazioni precedenti mancanti:** gli amministratori possono consultare la cronologia delle conversazioni dall'albero corrispondente; le conversazioni sono associate a un utente e a un URL di accesso.

Per l'impostazione correlata, vedere [Impostazioni dei ticket](platform-settings/ticket-settings.md).