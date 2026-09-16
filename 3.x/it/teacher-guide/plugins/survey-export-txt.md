# Esportazione sondaggio TXT

Esportazione sondaggio TXT <img src="/.gitbook/assets/icons/mdi-file-outline.svg" alt="Esportazione sondaggio TXT" data-size="line"> esporta i risultati di un sondaggio in un file di testo semplice leggibile — un blocco per rispondente, con l’elenco di ciascuna domanda, la/e risposta/e scelta/e e qualsiasi risposta in testo libero, invece delle righe e colonne di un CSV.

## Esportare un sondaggio

Una volta abilitata, l’elenco dello strumento **Sondaggio** del corso mostra un’icona **Esporta** su ogni riga del sondaggio. Fare clic per scaricare i risultati come file `.txt`.

## Contenuto del file

* I sondaggi anonimi mostrano "Anonymous" al posto dei dettagli di identità; i sondaggi non anonimi includono nome e nome utente del rispondente
* Le risposte di ciascun rispondente sono separate da una riga divisoria, rendendo il file facile da leggere dall’alto verso il basso
* Se nessuna risposta è idonea all’esportazione, il file lo indica semplicemente invece di fallire

## Consigli

* **Meglio per la lettura, CSV per l’analisi** — Usare questo formato quando si vogliono leggere le risposte direttamente; usare [Esportazione sondaggio CSV](survey-export-csv.md) se si prevede di aprire i risultati in un foglio di calcolo