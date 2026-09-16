# Requisiti del server

Prima di installare Chamilo 3.0, verificare che il server soddisfi i seguenti requisiti.

## Requisiti software

### PHP

| Requisito | Minimo | Consigliato |
|-------------|---------|-------------|
| **Versione PHP** | 8.3 | 8.5 |

### Estensioni PHP richieste

| Estensione | Scopo |
|-----------|---------|
| **bcmath** | Matematica a precisione arbitraria |
| **ctype** | Controllo del tipo di carattere |
| **curl** | Richieste HTTP (integrazioni API, servizi esterni) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Analisi XML e gestione DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Lettura dei metadati delle immagini (ad es. orientamento automatico delle foto caricate) |
| **fileinfo** | Rilevamento del tipo MIME per i file caricati |
| **gd** | Elaborazione delle immagini (miniature, CAPTCHA) |
| **iconv** | Conversione dei set di caratteri |
| **intl** | Internazionalizzazione (formattazione di date, numeri e stringhe) |
| **json** | Codifica/decodifica JSON |
| **ldap** | Connettore LDAP. Anche se probabilmente non si utilizzerà LDAP, Chamilo lo richiede |
| **mbstring** | Gestione delle stringhe multibyte (supporto UTF-8) |
| **openssl** | Operazioni crittografiche (HTTPS, hashing delle password, token JWT) |
| **pdo**, più **pdo_mysql** o **pdo_pgsql** | Connettività al database (installare il driver corrispondente al proprio database) |
| **soap** | Gestione dei web service SOAP |
| **zip** | Gestione degli archivi ZIP (pacchetti SCORM, importazioni/esportazioni in blocco) |
| **zlib** | Compressione utilizzata internamente da diverse dipendenze |
| **apcu** | Cache a livello utente (consigliata, verificata ma non imposta dall'installer) |
| **opcache** | Cache degli opcode (fortemente consigliata per le prestazioni, verificata ma non imposta dall'installer) |
| **xapian** | Ricerca full-text (opzionale, solo se si utilizza la ricerca) |

### Database

| Database | Versione minima | Consigliato |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 o superiore |
| **MySQL** | 5.7 | 8.0 o superiore |

Le versioni di MariaDB precedenti alla 10.2.2 (e le versioni di MySQL precedenti alla 5.7) necessitano del supporto per indici/prefissi di grandi dimensioni abilitato manualmente nella configurazione del server prima di installare Chamilo.

### Server web

| Server | Note |
|--------|-------|
| **Apache** | Richiede `mod_rewrite` (e `ssl`, `headers`, `expires`) abilitati. Chamilo include un vhost di esempio in `public/main/install/apache.dist.conf`. |
| **Nginx** | Richiede una configurazione manuale per la riscrittura degli URL — Chamilo non include una configurazione Nginx di esempio. Consultare la documentazione Nginx di Symfony per una configurazione di riferimento. |

### Strumenti di build

| Strumento | Scopo |
|------|---------|
| **Composer** (^2.8) | Gestione delle dipendenze PHP. Necessario per installare le librerie PHP di Chamilo. |
| **Node.js** (20+ LTS) | Runtime JavaScript. Necessario per compilare gli asset del frontend. |
| **Yarn** (^4, tramite Corepack) | Gestore di pacchetti JavaScript utilizzato per compilare gli asset del frontend (`yarn install`, `yarn encore production`). |

## Requisiti hardware

| Risorsa | Minimo | Consigliato |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB o più (la compilazione degli asset del frontend dal codice sorgente richiede da sola almeno 4 GB) |
| **CPU** | 2 vCPU | 2+ core |
| **Spazio su disco** | 4 GB (solo applicazione) | 20+ GB (inclusi i contenuti caricati); la compilazione dal codice sorgente richiede ~10 GB liberi durante la build |
| **Tipo di disco** | HDD | SSD (migliora in modo significativo le prestazioni del database e della cache) |

Queste sono cifre di riferimento della guida di installazione di Chamilo. I requisiti effettivi dipendono dal numero di utenti simultanei e dal volume di contenuti ospitati.

## Sistema operativo

| SO | Note |
|----|-------|
| **Linux** | Consigliato. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ o equivalente. |
| **Windows** | Possibile ma non testato in modo approfondito. Utilizzare WSL2 per lo sviluppo. |
| **macOS** | Solo per lo sviluppo / non testato. |

## Requisiti di rete

* Un nome di dominio che punti al server.
* Un certificato SSL/TLS per HTTPS (Let's Encrypt fornisce certificati gratuiti).
* Accesso SMTP in uscita se si inviano e-mail direttamente (oppure utilizzare un servizio di e-mail di terze parti).
* Porta 443 (HTTPS) e, facoltativamente, porta 80 (HTTP, per il reindirizzamento a HTTPS).

## Verifica dei requisiti

Dopo aver collocato il codice sorgente di Chamilo sul server, è possibile verificare direttamente la configurazione PHP:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Consigli

* **Utilizzare PHP-FPM** con Apache o Nginx per prestazioni migliori rispetto a mod_php.
* **Separare il database** su un server dedicato per le piattaforme che prevedono più di 500 utenti simultanei.
* **Utilizzare storage SSD** -- Le applicazioni intensive sul database come Chamilo traggono un vantaggio significativo da un I/O disco veloce.