# Gestione dei corsi

In qualità di amministratore, è possibile gestire tutti i corsi della piattaforma indipendentemente da chi li ha creati.

## Elenco dei corsi

![L'elenco dei corsi che mostra tutti i corsi con titolo, codice, categoria, utenti iscritti e stato di visibilità](/.gitbook/assets/admin-course-list.png)

Dal pannello di amministrazione, fare clic su **Elenco dei corsi** per visualizzare tutti i corsi. L'elenco mostra:

* Titolo e codice del corso
* Lingua
* Categorie
* Stato di visibilità

Utilizzare lo strumento **Ricerca avanzata** per trovare corsi specifici.

## Creazione di un corso

In qualità di amministratore, è possibile creare corsi e assegnarli a qualsiasi docente:

1. Fare clic su **Aggiungi corso** dal pannello di amministrazione
2. Compilare i dettagli del corso (titolo, codice, categoria, lingua)
3. Assegnare un docente al corso
4. Salvare

Nota: in Chamilo 1.11.x, il codice del corso veniva mostrato come parte dell'URL del corso ed era impossibile modificarlo dopo la creazione del corso. Questo comportamento è cambiato a partire dalla versione 2.x. Il codice del corso non è più visibile nell'URL e le versioni future potrebbero consentire ai docenti di modificare successivamente il codice del corso, poiché diventa meno essenziale per la piattaforma.

## Gestione di un corso esistente

Trovare un corso nell'elenco per accedere alle opzioni di gestione nella colonna *Azioni*:

* **Informazioni** — Mostra le informazioni sul corso 
* **Home del corso** — Porta direttamente alla homepage del corso 
* **Report** — Visualizza i dati di coinvolgimento e rendimento
* **Modifica** — Cambia titolo del corso, categoria, visibilità e altre impostazioni
* **Crea un backup** — Vai alla sezione di manutenzione del corso, dove è possibile creare copie e fare altre operazioni
* **Aggiungi al catalogo** — Aggiungi questo corso al catalogo dei corsi
* **Elimina** — Rimuovi definitivamente il corso e tutti i suoi contenuti

> L'eliminazione di un corso rimuove in modo permanente tutti i contenuti, i dati degli studenti, i voti e le informazioni di tracciamento. Valutare di esportare prima il corso come backup.

## Operazioni in blocco

Selezionare più corsi nell'elenco per eseguire azioni in batch, ad esempio eliminarli. Per esportare un corso, entrare nel corso e utilizzare lo strumento **Manutenzione** — non esiste un'azione di esportazione in blocco nell'elenco dei corsi dell'amministratore.

## Impostazioni di visibilità del corso

Gli amministratori possono sovrascrivere la visibilità impostata dai docenti:

| Visibilità | Effetto |
|-----------|--------|
| **Pubblico** | Accessibile a tutti, compresi i visitatori anonimi |
| **Aperto** | Accessibile a tutti gli utenti autenticati |
| **Privato** | Solo gli utenti iscritti possono accedere al corso |
| **Chiuso** | Nessuno può accedere al corso (tranne il docente e gli amministratori) |
| **Nascosto** | Nessuno può visualizzare o accedere al corso (tranne gli amministratori) |