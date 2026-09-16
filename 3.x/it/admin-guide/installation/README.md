# Installazione

Questa sezione copre tutto ciò che è necessario per installare e configurare Chamilo 3.0 sul proprio server.

Chamilo 3.0 è un'applicazione PHP basata sul framework Symfony. Può essere eseguita sulla maggior parte dei server basati su Linux, è stata installata ed è in esecuzione su Windows Server con IIS e supporta i backend MySQL e MariaDB.

## Passaggi di installazione

1. **[Requisiti del server](server-requirements.md)** — Verificare che il server soddisfi i requisiti minimi
2. **[Installazione guidata](installation-wizard.md)** — Eseguire la procedura guidata di installazione basata sul web
3. **[Configurazione](configuration.md)** — Configurare le variabili d'ambiente e le impostazioni di Symfony
4. **[Archiviazione cloud](cloud-storage.md)** — Impostare i backend di archiviazione cloud (opzionale)
5. **[Configurazione e-mail](email-configuration.md)** — Configurare la consegna delle e-mail
6. **[Aggiornamento](upgrading.md)** — Aggiornare da una versione precedente

## Panoramica rapida

Il processo di installazione di base è:

1. Scaricare o clonare il codice sorgente di Chamilo
2. Installare le dipendenze PHP con Composer se si prepara dal codice sorgente
3. Installare le dipendenze JavaScript con npm/yarn e compilare gli asset del frontend
4. Creare un file `.env` vuoto per memorizzare in seguito le credenziali del database e altre impostazioni
5. Modificare i permessi (scrivibili dal server web) su *var/*, *config/* e *.env*
6. Eseguire la procedura guidata di installazione basata sul web
7. Connettersi con il primo account amministratore
8. Ripristinare i permessi su *config/* e *.env*

Le istruzioni dettagliate per ciascun passaggio si trovano nelle pagine collegate sopra.