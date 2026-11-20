# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> esporta gli studenti che hanno superato il vostro corso, con il punteggio del libro dei voti, nel file importato da un ente di certificazione esterno: un file di testo a formato fisso oppure un foglio di calcolo dell'elenco.

## Apertura del blocco di esportazione

Una volta abilitata, la barra degli strumenti dello strumento **Valutazioni** (libro dei voti) del vostro corso presenta un'icona **Esporta**. Fare clic su di essa per visualizzare il blocco **Grading Electronic** nella stessa pagina; fare clic di nuovo per nasconderlo.

Il blocco presenta tre campi:

* **Anteprima** — selezionata per impostazione predefinita. Finché è selezionata, non viene salvato nulla: il blocco mostra soltanto ciò che conterrebbe l'esportazione
* **Intervallo di date** — le date di inizio e di fine del corso. La data di inizio viene inserita nella riga di intestazione del file di testo, la data di fine è la data in cui ciascuno studente ha superato il corso
* **ID del corso** — l'identificativo del corso presso l'ente di certificazione. È precompilato con il valore utilizzato per l'esportazione precedente

## Anteprima dell'esportazione

Con **Anteprima** selezionata, il blocco offre un unico pulsante **Anteprima**. Elenca tutti gli studenti del corso (o della sessione in cui vi trovate) con il relativo punteggio e uno stato **PASS** o **SKIP**, e mostra il contenuto del file di testo. Solo gli studenti che soddisfano i criteri di superamento del libro dei voti sono contrassegnati con **PASS**; gli altri sono esclusi dall'esportazione.

## Generazione del file

Deselezionare **Anteprima** per sostituire il pulsante **Anteprima** con due pulsanti:

* **Genera TXT** — scarica il file di testo a formato fisso: una riga di intestazione con l'ID del fornitore, l'ID del corso e la data di inizio, quindi una riga per ogni studente che ha superato il corso
* **Genera XLSX** — scarica il foglio di calcolo dell'elenco, con una riga per ogni studente che ha superato il corso e le colonne **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** e **Comment**

Entrambi i pulsanti fanno la stessa cosa oltre al file: salvano l'**ID del corso** per l'esportazione successiva e, se il libro dei voti genera certificati, generano il certificato di ogni studente che ha superato il corso.

## Contenuto del foglio di calcolo

* **FireTRAQ ID** — l'ID dello studente presso l'ente di certificazione, letto dal campo del profilo `fcdice_or_acadis_student_id`
* **Score** — il punteggio del libro dei voti come percentuale intera (da 0 a 100), indipendentemente dal peso totale del libro dei voti
* **Grade** — sempre **Pass**, poiché vengono esportati solo gli studenti che hanno superato il corso. La cella offre comunque le scelte **Pass**, **Fail** e **Incomplete** se dovete modificare il file
* **Date Earned** — la data di fine dell'intervallo di date
* **Comment** — lasciato vuoto

## Suggerimenti

* **Controllare prima gli ID degli studenti** — Uno studente senza ID nel profilo viene comunque esportato, con un **FireTRAQ ID** vuoto. Usare l'anteprima per individuarli prima di generare il file
* **L'ID del fornitore e le ore del corso** provengono dai campi aggiuntivi del corso, impostati dal vostro amministratore al momento dell'installazione del plugin