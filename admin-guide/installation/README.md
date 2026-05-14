# Installazione

Questa sezione copre tutto ciò che è necessario per installare e configurare Chamilo 2.0 sul tuo server.

Chamilo 2.0 è un'applicazione PHP costruita sul framework Symfony. Può essere eseguita sulla maggior parte dei server basati su Linux, è stata installata e funziona su Windows Server con IIS e supporta backend MySQL e MariaDB.

## Passaggi per l'Installazione

1. **[Requisiti del Server](server-requirements.md)** — Verifica che il tuo server soddisfi i requisiti minimi
2. **[Procedura Guidata di Installazione](installation-wizard.md)** — Esegui la procedura guidata di installazione basata sul web
3. **[Configurazione](configuration.md)** — Configura le variabili di ambiente e le impostazioni di Symfony
4. **[Archiviazione Cloud](cloud-storage.md)** — Configura i backend di archiviazione cloud (opzionale)
5. **[Configurazione Email](email-configuration.md)** — Configura l'invio delle email
6. **[Aggiornamento](upgrading.md)** — Esegui l'aggiornamento da una versione precedente

## Panoramica Rapida

Il processo di installazione di base è il seguente:

1. Scarica o clona il codice sorgente di Chamilo
2. Installa le dipendenze PHP con Composer se stai preparando dal sorgente
3. Installa le dipendenze JavaScript con npm/yarn e costruisci gli asset del frontend
4. Crea un file `.env` vuoto per memorizzare le credenziali del database e altre impostazioni successivamente
5. Modifica i permessi (scrivibili dal server web) su *var/*, *config/* e *.env*
6. Esegui la procedura guidata di installazione basata sul web
7. Connettiti con il tuo primo account amministratore
8. Ripristina i permessi su *config/* e *.env*

Istruzioni dettagliate per ogni passaggio sono disponibili nelle pagine collegate sopra.