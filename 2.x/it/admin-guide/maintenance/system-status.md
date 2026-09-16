# Stato del Sistema

La pagina di stato del sistema ti aiuta a verificare che il tuo server Chamilo sia configurato correttamente e a identificare eventuali problemi.

## Accesso allo Stato del Sistema

Dal pannello di amministrazione, clicca su **Stato del sistema** (o **Informazioni di sistema**).

## Cosa Mostra

![La pagina di stato del sistema che mostra la configurazione PHP, lo stato del database, i permessi dei file e le informazioni sul server](/.gitbook/assets/admin-system-status.png)

### Configurazione PHP

* **Versione PHP** — Chamilo 2.0 richiede PHP 8.2 o superiore
* **Estensioni richieste** — Verifica che tutte le estensioni PHP necessarie siano installate
* **Impostazioni PHP** — Controlla impostazioni PHP importanti come il limite di memoria, i limiti di caricamento e il tempo di esecuzione

### Stato del Database

* **Connessione al database** — Conferma che il database sia accessibile
* **Versione del database** — Mostra la versione del server del database

### Permessi dei File

* **Directory scrivibili** — Verifica che Chamilo possa scrivere nelle directory richieste (cache, upload, log)

### Informazioni sul Server

* **Sistema operativo** — Dettagli sul sistema operativo del server
* **Server web** — Apache, Nginx o altro
* **Spazio su disco** — Spazio di archiviazione disponibile

## Controlli Raccomandati

Esegui questi controlli regolarmente:

* **Dopo l'installazione** — Verifica che tutti i requisiti siano soddisfatti
* **Dopo gli aggiornamenti** — Assicurati che la versione di PHP e le estensioni siano ancora compatibili
* **Quando sorgono problemi** — Controlla prima lo stato del sistema quando risolvi problemi