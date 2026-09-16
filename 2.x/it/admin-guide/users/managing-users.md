# Gestione degli Utenti

Questa pagina tratta le attività quotidiane di creazione, modifica e gestione degli account utente.

## Elenco Utenti

![L'elenco degli utenti che mostra gli account con colonne per nome, email, ruolo e stato](/.gitbook/assets/admin-user-list.png)

Dal pannello di amministrazione, clicca su **Elenco utenti** per visualizzare tutti gli utenti della piattaforma. L'elenco mostra:

* Avatar
* Nome
* Nome utente
* Indirizzo email
* Ruoli
* Stato attivo/inattivo
* Data di registrazione
* Data dell'ultimo accesso

Utilizza lo strumento **Ricerca avanzata** per trovare utenti specifici per nome, email, ruolo o altri criteri.

## Creazione di un Utente

![Il modulo di creazione utente con campi per nome, email, nome utente, password, ruolo e lingua](/.gitbook/assets/admin-user-create-form.png)

1. Clicca su **Aggiungi un utente** dal pannello di amministrazione
2. Compila i campi obbligatori:
   * **Nome** e **Cognome**
   * **Email** — Deve essere unica sulla piattaforma
   * **Nome utente** — Il nome di accesso (deve essere unico)
   * **Password** — Imposta una password iniziale
   * **Ruoli** — Seleziona il/i ruolo/i dell'utente sulla piattaforma (studente, docente, amministratore, ecc.)
   * **Lingua** — La lingua preferita dell'interfaccia utente
3. Facoltativamente, compila campi aggiuntivi:
   * Codice ufficiale (ad esempio, ID univoco nell'organizzazione)
   * Numero di telefono
   * Data di scadenza — Disattiva automaticamente l'account dopo una data
   * Stato attivo/inattivo
   * Campi profilo extra (se configurati)
4. Salva

## Importazione di Utenti

![L'interfaccia di importazione utenti per caricare file CSV o XML con dati utente](/.gitbook/assets/admin-user-import.png)

Per la creazione di utenti in massa, puoi importare utenti da un file:

1. Clicca su **Importa utenti** dal pannello di amministrazione
2. Carica un file **CSV** o **XML** con i dati degli utenti
3. Associa le colonne del file ai campi utente di Chamilo
4. Scegli come gestire gli utenti esistenti (aggiornare o ignorare)
5. Importa

Il file di importazione dovrebbe contenere almeno le colonne per: nome, cognome, email, nome utente e password.

Nota: La colonna **Status** è il nome legacy per **Ruolo** e accetta solo alcuni valori, come 1 per docente, 5 per studente. Ulteriori personalizzazioni dei ruoli possono essere effettuate solo manualmente in seguito, modificando l'utente.

## Esportazione di Utenti

Clicca su **Esporta utenti** per scaricare l'elenco degli utenti come file CSV o XML. Puoi filtrare quali utenti esportare per ruolo, data di registrazione o altri criteri.

## Modifica di un Utente

Clicca sul nome di un utente nell'elenco utenti per modificare il suo account. Puoi modificare:

* Informazioni personali (nome, email, telefono)
* Ruoli
* Password (reimpostazione)
* Stato attivo/inattivo
* Data di scadenza
* Campi profilo extra

## Eliminazione di un Utente

Quando si eliminano utenti (di solito docenti) che hanno creato contenuti sulla piattaforma, il sistema potrebbe impedire l'eliminazione permanente degli utenti e mostrerà un messaggio di avviso che spiega che l'utente è ancora collegato ad alcune risorse. Se confermi l'eliminazione, il sistema non cancellerà i contenuti stessi, ma li assocerà a un utente neutrale (lo chiamiamo "Fallback user") per motivi di coerenza dei dati.

Per evitare ciò, verifica i dettagli dell'utente, elimina ciascuno dei suoi corsi uno per uno, quindi elimina l'utente.

## Azioni Utente

| Azione | Descrizione |
|--------|-------------|
| **Disattiva** | Disabilita l'account di un utente senza eliminarlo. L'utente non può accedere, ma i suoi dati vengono conservati. |
| **Attiva** | Riabilita un account precedentemente disattivato. |
| **Accedi come** | Accedi alla piattaforma come questo utente (impersonificazione). Utile per la risoluzione dei problemi. |
| **Anonimizza** | Cancella tutte le informazioni personali dell'account, come definito dal GDPR dell'UE. |
| **Elimina** | Elimina temporaneamente l'account utente. Usa la scheda **Utenti eliminati** per eliminare definitivamente l'account e i dati associati. |

> **Accedi come** è una funzionalità potente. Usala responsabilmente e solo per scopi di supporto legittimi.

## Operazioni in Batch

Seleziona più utenti nell'elenco utenti per eseguire azioni in batch:

* Attiva o disattiva più utenti contemporaneamente
* Elimina più utenti
* Assegna utenti a un corso o a una sessione

## Suggerimenti

* **Usa l'importazione CSV per iscrizioni numerose** — Quando si integrano molti utenti all'inizio di un programma di formazione, prepara un file CSV e importa in massa
* **Imposta date di scadenza** — Per utenti temporanei (partecipanti a workshop, utenti di prova), imposta una data di scadenza per disattivare automaticamente i loro account
* **Disattiva invece di eliminare** — Quando un utente lascia la piattaforma, disattiva prima il suo account. Questo conserva i suoi record di formazione. Elimina solo se sei sicuro che i dati non siano più necessari.