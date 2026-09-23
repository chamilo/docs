# Valutazioni

Le valutazioni (in precedenza *gradebook*) aggregano i punteggi di esercizi, compiti e altre attività valutate in una vista unificata del rendimento di ciascun discente. Controllano inoltre la generazione dei certificati.

## Come funzionano le valutazioni

Le valutazioni sono sistemi di punteggio ponderati. Si definiscono:

1. **Quali attività** contribuiscono al voto (esercizi, compiti, presenze, ecc.)
2. **Il peso** di ciascuna attività (quanto conta nel voto finale)
3. **Il punteggio minimo di certificazione** (la soglia per ottenere un certificato)
4. **Un punteggio minimo per attività** — Ogni attività nel registro dei voti può avere un proprio **Punteggio minimo**. I discenti che ottengono un punteggio inferiore a quel minimo in un'attività chiave possono essere impediti dal raggiungere gli obiettivi e dal conseguire il certificato, anche se il loro totale ponderato complessivo sarebbe altrimenti sufficientemente alto.

Le attività possono essere di 2 tipi:
* **Attività in aula** (o attività in presenza), in cui i voti devono essere importati da un'altra fonte
* **Attività online** selezionata dal corso, in cui i voti si ottengono tramite lo svolgimento dell'attività nel corso

Chamilo calcola il voto complessivo di ciascun discente in base a questi pesi.

## Configurazione della valutazione

1. Aprire lo strumento **Valutazioni** <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> dalla homepage del corso
2. Si visualizza la panoramica delle valutazioni, inizialmente vuota

### Aggiungere attività

1. Fare clic su **Aggiungi attività online**
2. Scegliere il tipo:
   * **Test** — Collegare un esercizio specifico del corso
   * **Compito** — Collegare una cartella di pubblicazione studente
   * **Percorso formativo** — Collegare il completamento di un percorso formativo
   * **Presenze** — Collegare un foglio presenze
   * **Discussione del forum** — Collegare una discussione del forum (che deve essere valutata manualmente)
   * **Sondaggio** — Collegare un sondaggio
3. Selezionare l'attività specifica all'interno del tipo scelto
4. Impostare il **Peso** per questa attività (ad es. 30% per l'esame intermedio, 40% per il progetto finale)
5. Impostare il **Punteggio minimo** se applicabile
6. Salvare

Il peso totale di tutte le attività dovrebbe sommare al 100%.

### Sottocategorie

Per schemi di valutazione complessi, è possibile creare **sottocategorie** per raggruppare attività correlate:

* **Esempio**: una sottocategoria "Compiti a casa" (peso: 30%) contenente cinque compiti individuali, ciascuno del valore del 20% della sottocategoria
* Le sottocategorie consentono di organizzare la valutazione in modo gerarchico mantenendo semplice il calcolo complessivo

## Visualizzazione dei voti

![La tabella panoramica del registro dei voti che mostra i nomi dei discenti, i punteggi delle attività e i totali ponderati](../../.gitbook/assets/gradebook-overview.png)

La valutazione mostra una tabella con:

* Il nome di ciascun discente
* I punteggi di ciascuna attività
* Il totale ponderato
* Se il discente è idoneo a un certificato

È possibile ordinare per qualsiasi colonna per identificare rapidamente i migliori o i discenti in difficoltà.

### Grafici di distribuzione dei punteggi

Sotto la tabella, e nella pagina **Vista grafica**, la valutazione disegna un grafico a barre per ciascuna attività più uno per il totale. Ogni grafico è un grafico a colonne: l'asse orizzontale elenca gli intervalli di punteggio dal più basso al più alto e l'altezza di ciascuna barra è il numero di discenti in quell'intervallo.

Il grafico **Totale** indica anche la media della classe. Un punto rosso si trova sull'intervallo che contiene la media e la legenda riporta la percentuale esatta.

Questi grafici appaiono solo quando sono impostate le regole di visualizzazione dei punteggi. Se si vede il messaggio *To view graph score rule must be enabled*, definire prima gli intervalli nelle impostazioni di punteggio della valutazione.

## Certificati

Per abilitare la generazione dei certificati:

1. Nelle impostazioni della valutazione, impostare un **punteggio minimo di certificazione** (ad es. 70%)
2. Quando il totale ponderato di un discente raggiunge o supera questa soglia (e non ha fallito alcun punteggio minimo per attività), può scaricare il proprio certificato
3. Il certificato è generato da un modello configurato dall'amministratore della piattaforma

Una volta abilitato **Genera certificati** sulla categoria radice, compare un campo **Validità del certificato (giorni)**. Lasciarlo a `0` per certificati che non scadono mai, oppure impostare un numero di giorni dopo i quali il certificato scade — Chamilo può quindi ricordare ai discenti l'avvicinarsi di tale data di scadenza, in modo automatico (cron, configurato dall'amministratore) o manualmente dall'elenco dei certificati.

![La finestra di modifica della categoria con Genera certificati abilitato e il campo Validità del certificato (giorni) impostato a 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Vedere [Certificati e competenze](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) per ulteriori dettagli.

## Collegamento alle competenze

È possibile associare **competenze** alla valutazione. Quando un discente raggiunge gli obiettivi impostati per completare la valutazione, può ottenere un certificato, una competenza o entrambi. Le competenze sono visibili sul loro profilo nello spazio della rete sociale. Questo costruisce nel tempo un registro delle competenze.

## Esportazione dei voti

Fare clic sul pulsante **Esporta** <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Esporta" data-size="line"> per scaricare i voti come foglio di calcolo. Questa funzione è utile per:

* Condividere i voti con i sistemi amministrativi
* Eseguire analisi aggiuntive al di fuori di Chamilo
* Conservare registrazioni offline

## Consigli

* **Pianificare i pesi in anticipo** — Definire lo schema di valutazione all'inizio del corso in modo che gli studenti sappiano cosa aspettarsi
* **Usare le sottocategorie per i corsi complessi** — Raggruppare compiti, quiz e partecipazione in categorie chiare
* **Impostare soglie di superamento significative** — Il punteggio di certificazione dovrebbe riflettere la competenza effettiva, non solo la partecipazione
* **Controllare regolarmente** — Rivedere periodicamente il registro dei voti per assicurarsi che tutte le attività siano correttamente collegate e che i punteggi vengano registrati