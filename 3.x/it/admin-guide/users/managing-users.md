# Gestione degli utenti

Questa pagina descrive le attività quotidiane di creazione, modifica e gestione degli account utente.

## Elenco utenti

![L'elenco utenti che mostra gli account con le colonne nome, email, ruolo e stato](../../.gitbook/assets/admin-user-list.png)

Dal pannello di amministrazione, fare clic su **Elenco utenti** per visualizzare tutti gli utenti della piattaforma. L'elenco mostra:

* Avatar
* Nome
* Nome utente
* Indirizzo email
* Ruoli
* Stato attivo/inattivo
* Data di registrazione
* Data dell'ultimo accesso

Utilizzare lo strumento **Ricerca avanzata** per trovare utenti specifici per nome, email, ruolo o altri criteri.

## Creazione di un utente

![Il modulo di creazione utente con i campi per nome, email, nome utente, password, ruolo e lingua](../../.gitbook/assets/admin-user-create-form.png)

1. Fare clic su **Aggiungi un utente** dal pannello di amministrazione
2. Compilare i campi obbligatori:
   * **Nome** e **Cognome**
   * **Email** — Deve essere univoca sulla piattaforma
   * **Nome utente** — Il nome di accesso (deve essere univoco)
   * **Password** — Impostare una password iniziale
   * **Ruoli** — Selezionare il/i ruolo/i della piattaforma dell'utente (studente, docente, amministratore, ecc.)
   * **Lingua** — La lingua preferita dell'interfaccia dell'utente
3. Facoltativamente compilare i campi aggiuntivi:
   * Codice ufficiale (ad es. ID univoco nell'organizzazione)
   * Numero di telefono
   * Data di scadenza — Disattiva automaticamente l'account dopo una data
   * Stato attivo/inattivo
   * Campi extra del profilo (se configurati)
4. Salvare

## Importazione degli utenti

![L'interfaccia di importazione utenti per il caricamento di file CSV o XML con i dati utente](../../.gitbook/assets/admin-user-import.png)

Per la creazione massiva di utenti, è possibile importare gli utenti da un file:

1. Fare clic su **Importa utenti** dal pannello di amministrazione
2. Caricare un file **CSV** o **XML** con i dati utente
3. Mappare le colonne del file sui campi utente di Chamilo
4. Scegliere come gestire gli utenti esistenti (aggiornare o saltare)
5. Importare

Il file di importazione deve contenere almeno le colonne: nome, cognome, email, nome utente e password.

Nota: la colonna **Status** è il nome legacy di **Ruolo** e accetta solo alcuni valori, come 1 per docente, 5 per studente. Un'ulteriore regolazione dei ruoli può essere effettuata solo successivamente a mano, modificando l'utente.

## Esportazione degli utenti

Fare clic su **Esporta utenti** per scaricare l'elenco utenti come file CSV o XML. È possibile filtrare quali utenti esportare per ruolo, data di registrazione o altri criteri.

## Modifica di un utente

Fare clic sul nome di un utente nell'elenco utenti per modificarne l'account. È possibile modificare:

* Informazioni personali (nome, email, telefono)
* Ruoli
* Password (reimpostazione)
* Stato attivo/inattivo
* Data di scadenza
* Campi extra del profilo

## Eliminazione di un utente

Quando si eliminano utenti (di solito docenti) che hanno creato contenuti sulla piattaforma, il sistema potrebbe impedire l'eliminazione permanente e mostrare un messaggio di avviso che spiega che l'utente è ancora collegato ad alcune risorse. Se si conferma l'eliminazione, il sistema non eliminerà i contenuti stessi ma li collegherà a un utente neutro (chiamato "utente Fallback") per motivi di coerenza dei dati.

Per evitarlo, controllare i dettagli dell'utente, eliminare uno per uno ciascuno dei suoi corsi, quindi eliminare l'utente.

## Azioni utente

| Azione | Descrizione |
|--------|-------------|
| **Disattiva** | Disabilita l'account di un utente senza eliminarlo. L'utente non può accedere ma i suoi dati sono conservati. |
| **Attiva** | Riabilita un account precedentemente disattivato. |
| **Accedi come** | Accedere alla piattaforma come questo utente (impersonificazione). Utile per la risoluzione dei problemi. |
| **Anonimizza** | Cancella tutte le informazioni personali dell'account, come definito dal GDPR dell'UE. |
| **Elimina** | Eliminazione logica dell'account utente. Utilizzare la scheda **Utenti eliminati** per eliminare definitivamente l'account e i dati associati. |

> **Accedi come** è una funzione potente. Utilizzarla in modo responsabile e solo per scopi di supporto legittimi.

## Operazioni in batch

Selezionare più utenti nell'elenco utenti per eseguire azioni in batch:

* Attivare o disattivare più utenti contemporaneamente
* Eliminare più utenti
* Assegnare utenti a un corso o a una sessione

## Consigli

* **Utilizzare l'importazione CSV per iscrizioni numerose** — Quando si inseriscono molti utenti all'inizio di un programma formativo, preparare un file CSV e importare in blocco
* **Impostare date di scadenza** — Per utenti temporanei (partecipanti a workshop, utenti di prova), impostare una data di scadenza per disattivare automaticamente i loro account
* **Disattivare piuttosto che eliminare** — Quando un utente se ne va, disattivare prima il suo account. Questo conserva i suoi record formativi. Eliminare solo se si è certi che i dati non siano più necessari.