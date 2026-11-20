# Stato del sistema

La pagina dello stato del sistema consente di verificare che il server Chamilo sia configurato correttamente e di individuare eventuali problemi.

## Accesso allo stato del sistema

Dal pannello di amministrazione, fare clic su **Stato del sistema** (o **Informazioni di sistema**).

## Cosa mostra

![La pagina dello stato del sistema che mostra la configurazione PHP, lo stato del database, i permessi sui file e le informazioni sul server](/.gitbook/assets/admin-system-status.png)

### Configurazione PHP

* **Versione PHP** — Chamilo 3.0 supporta PHP 8.3, 8.4 e 8.5
* **Estensioni richieste** — Verifica che tutte le estensioni PHP necessarie siano installate
* **Impostazioni PHP** — Controlla impostazioni PHP importanti come il limite di memoria, i limiti di caricamento e il tempo di esecuzione

### Stato del database

* **Connessione al database** — Conferma che il database è accessibile
* **Versione del database** — Mostra la versione del server di database

### Permessi sui file

* **Directory scrivibili** — Verifica che Chamilo possa scrivere nelle directory richieste (cache, uploads, logs)

### Informazioni sul server

* **Sistema operativo** — Dettagli del sistema operativo del server
* **Server web** — Apache, Nginx o altro
* **Spazio su disco** — Archiviazione disponibile

## Controlli consigliati

Eseguire questi controlli con regolarità:

* **Dopo l'installazione** — Verificare che tutti i requisiti siano soddisfatti
* **Dopo gli aggiornamenti** — Assicurarsi che la versione PHP e le estensioni siano ancora compatibili
* **Quando si verificano problemi** — Controllare prima lo stato del sistema durante la risoluzione dei problemi