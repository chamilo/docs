# Valutazioni

Le valutazioni (precedentemente *gradebook*) aggregano i punteggi di esercizi, compiti e altre attività valutate in una visione unificata delle prestazioni di ogni studente. Controllano inoltre la generazione dei certificati.

## Come Funzionano le Valutazioni

Le valutazioni sono sistemi di punteggio ponderati. È possibile definire:

1. **Quali attività** contribuiscono al voto (esercizi, compiti, presenze, ecc.)
2. **Il peso** di ogni attività (quanto conta per il voto finale)
3. **Il punteggio minimo per la certificazione** (la soglia per ottenere un certificato)
4. **Un punteggio minimo per attività** — Ogni attività nel registro delle valutazioni può avere il proprio **Punteggio minimo**. Gli studenti che ottengono un punteggio inferiore a questo minimo in un'attività chiave possono essere esclusi dal raggiungimento degli obiettivi e dall'ottenimento del certificato, anche se il loro totale ponderato complessivo è sufficientemente alto.

Le attività possono essere di 2 tipi:
* **Attività in aula** (o attività in presenza), dove i voti devono essere importati da un'altra fonte
* **Attività online** selezionata dal corso, dove i voti sono ottenuti attraverso il completamento dell'attività nel corso

Chamilo calcola il voto complessivo di ogni studente in base a questi pesi.

## Configurazione delle Valutazioni

1. Apri lo strumento **Valutazioni** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Registro delle valutazioni" data-size="line"> dalla homepage del corso
2. Vedrai una panoramica delle valutazioni, inizialmente vuota

### Aggiunta di Attività

1. Fai clic su **Aggiungi attività online**
2. Scegli il tipo:
   * **Test** — Collega un esercizio specifico del corso
   * **Compito** — Collega una cartella di pubblicazioni degli studenti
   * **Percorso di apprendimento** — Collega il completamento di un percorso di apprendimento
   * **Presenze** — Collega un foglio di presenze
   * **Discussione nel forum** — Collega una discussione nel forum (che deve essere valutata manualmente)
   * **Sondaggio** — Collega un sondaggio
3. Seleziona l'attività specifica all'interno del tipo scelto
4. Imposta il **Peso** per questa attività (ad esempio, 30% per l'esame di metà corso, 40% per il progetto finale)
5. Imposta il **Punteggio minimo** se applicabile
6. Salva

Il peso totale di tutte le attività dovrebbe sommare al 100%.

### Sottocategorie

Per schemi di valutazione complessi, è possibile creare **sottocategorie** per raggruppare attività correlate:

* **Esempio**: Una sottocategoria "Compiti a casa" (peso: 30%) contenente cinque compiti individuali, ciascuno con un valore del 20% della sottocategoria
* Le sottocategorie consentono di organizzare la valutazione in modo gerarchico, mantenendo il calcolo complessivo semplice

## Visualizzazione dei Voti

![La tabella panoramica del registro delle valutazioni che mostra i nomi degli studenti, i punteggi delle attività e i totali ponderati](/.gitbook/assets/gradebook-overview.png)

La valutazione mostra una tabella con:

* Il nome di ogni studente
* I punteggi per ogni attività
* Il totale ponderato
* Se lo studente si qualifica per un certificato

È possibile ordinare per qualsiasi colonna per identificare rapidamente i migliori performer o gli studenti in difficoltà.

## Certificati

Per abilitare la generazione di certificati:

1. Nelle impostazioni delle valutazioni, imposta un **punteggio minimo per la certificazione** (ad esempio, 70%)
2. Quando il totale ponderato di uno studente raggiunge o supera questa soglia (e non ha fallito alcun punteggio minimo per attività), può scaricare il proprio certificato
3. Il certificato viene generato da un modello configurato dall'amministratore della piattaforma

Consulta [Certificati e Competenze](../tracking-and-reporting/certificates-and-skills.md) per maggiori dettagli.

## Collegamento alle Competenze

È possibile associare **competenze** alla valutazione. Quando uno studente raggiunge gli obiettivi stabiliti per completare la valutazione, può ottenere un certificato, una competenza o entrambi. Le competenze sono visibili sul profilo dello studente nello spazio della rete sociale. Questo costruisce un registro di competenze nel tempo.

## Esportazione dei Voti

Fai clic sul pulsante **Esporta** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Esporta" data-size="line"> per scaricare i voti come foglio di calcolo. Questo è utile per:

* Condividere i voti con sistemi amministrativi
* Eseguire analisi aggiuntive al di fuori di Chamilo
* Mantenere registri offline

## Suggerimenti

* **Pianifica i pesi in anticipo** — Definisci lo schema di valutazione all'inizio del corso in modo che gli studenti sappiano cosa aspettarsi
* **Usa sottocategorie per corsi complessi** — Raggruppa compiti, quiz e partecipazione in categorie chiare
* **Imposta soglie di superamento significative** — Il punteggio per la certificazione dovrebbe riflettere una competenza reale, non solo la partecipazione
* **Controlla regolarmente** — Rivedi periodicamente il registro delle valutazioni per assicurarti che tutte le attività siano correttamente collegate e che i punteggi vengano registrati correttamente