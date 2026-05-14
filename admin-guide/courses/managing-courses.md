# Gestione dei Corsi

In qualità di amministratore, puoi gestire tutti i corsi sulla piattaforma indipendentemente da chi li ha creati.

## Elenco dei Corsi

![L'elenco dei corsi che mostra tutti i corsi con titolo, codice, categoria, utenti iscritti e stato di visibilità](/.gitbook/assets/admin-course-list.png)

Dal pannello di amministrazione, clicca su **Elenco dei corsi** per visualizzare tutti i corsi. L'elenco mostra:

* Titolo e codice del corso
* Lingua
* Categorie
* Stato di visibilità

Utilizza lo strumento **Ricerca avanzata** per trovare corsi specifici.

## Creazione di un Corso

In qualità di amministratore, puoi creare corsi e assegnarli a qualsiasi docente:

1. Clicca su **Aggiungi corso** dal pannello di amministrazione
2. Compila i dettagli del corso (titolo, codice, categoria, lingua)
3. Assegna un docente al corso
4. Salva

Nota: In Chamilo 1.11.x, il codice del corso veniva mostrato come parte dell'URL del corso ed era impossibile modificarlo dopo la creazione del corso. Questo comportamento sta cambiando nella versione 2.x. Il codice del corso non è più visibile nell'URL e le versioni future potrebbero consentire ai docenti di modificare il codice del corso successivamente, poiché diventa meno essenziale per la piattaforma.

## Gestione di un Corso Esistente

Trova un corso nell'elenco per accedere alle opzioni di gestione nella colonna *Azioni*:

* **Informazioni** — Mostra informazioni sul corso
* **Homepage del corso** — Ti porta direttamente alla homepage del corso
* **Rapporti** — Visualizza dati su coinvolgimento e prestazioni
* **Modifica** — Cambia titolo, categoria, visibilità e altre impostazioni del corso
* **Crea un backup** — Vai alla sezione di manutenzione del corso, dove puoi creare copie e fare altre operazioni
* **Aggiungi al catalogo** — Aggiungi questo corso al catalogo dei corsi
* **Elimina** — Rimuovi permanentemente il corso e tutto il suo contenuto

> L'eliminazione di un corso rimuove permanentemente tutti i contenuti, i dati degli studenti, i voti e le informazioni di tracciamento. Considera di esportare il corso prima come backup.

## Operazioni in Blocco

Seleziona più corsi nell'elenco per eseguire azioni in blocco, come eliminarli. Per esportare un corso, entra nel corso e utilizza lo strumento **Manutenzione** — non esiste un'azione di esportazione in blocco nell'elenco dei corsi dell'amministratore.

## Impostazioni di Visibilità del Corso

Gli amministratori possono sovrascrivere la visibilità impostata dai docenti:

| Visibilità | Effetto |
|------------|---------|
| **Pubblico** | Accessibile a tutti, inclusi i visitatori anonimi |
| **Aperto** | Accessibile a tutti gli utenti autenticati |
| **Privato** | Solo gli utenti iscritti possono accedere al corso |
| **Chiuso** | Nessuno può accedere al corso (tranne il docente e gli amministratori) |
| **Nascosto** | Nessuno può visualizzare o accedere al corso (tranne gli amministratori) |