# Esportazione sondaggio CSV

Survey Export CSV <img src="../../.gitbook/assets/icons/mdi-file-delimited-outline.svg" alt="Esportazione sondaggio CSV" data-size="line"> aggiunge un'esportazione con un clic dei risultati di un sondaggio in un file CSV compatto, con una riga per rispondente e una colonna per domanda.

## Esportare un sondaggio

Una volta abilitato, l'elenco dello strumento **Sondaggio** del corso ottiene una colonna **Esporta** con un'icona CSV su ogni riga del sondaggio. Fare clic per scaricare immediatamente i risultati — nessun passaggio aggiuntivo.

## Cosa contiene il file

* I sondaggi anonimi vengono esportati senza colonne di identità
* I sondaggi non anonimi includono l'identità del rispondente insieme alle sue risposte
* L'inclusione o meno delle risposte incomplete (non terminate) è controllata dall'amministratore, non da questo pulsante di esportazione

## Consigli

* **I sondaggi di grandi dimensioni possono richiedere un momento** — Insiemi di risposte molto grandi possono essere più lenti da esportare; si tratta di una considerazione sulle prestazioni del database che l'amministratore può ottimizzare se necessario
* **Combinare con Survey Export TXT** — Se è abilitato anche il plugin [Survey Export TXT](survey-export-txt.md), verranno visualizzate due icone di esportazione; scegliere il formato più adatto all'uso previsto dei dati