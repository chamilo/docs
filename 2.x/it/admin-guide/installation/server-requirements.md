# Requisiti del Server

Prima di installare Chamilo 2.0, verifica che il tuo server soddisfi i seguenti requisiti.

## Requisiti Software

### PHP

| Requisito | Minimo | Consigliato |
|-----------|--------|-------------|
| **Versione PHP** | 8.2 | 8.3 o successiva |

### Estensioni PHP Richieste

| Estensione | Scopo |
|------------|-------|
| **curl** | Richieste HTTP (integrazioni API, servizi esterni) |
| **fileinfo** | Rilevamento del tipo MIME per i file caricati |
| **gd** | Elaborazione delle immagini (miniature, CAPTCHA) |
| **intl** | Internazionalizzazione (formattazione di date, numeri e stringhe) |
| **json** | Codifica/decodifica JSON |
| **ldap** | Connettore LDAP. Anche se probabilmente non utilizzerai LDAP, Chamilo lo richiede |
| **mbstring** | Gestione delle stringhe multibyte (supporto UTF-8) |
| **openssl** | Operazioni crittografiche (HTTPS, hashing delle password, token) |
| **pdo_mysql** o **pdo_pgsql** | Connettività al database (installa quello corrispondente al tuo database) |
| **xml** | Analisi XML (SCORM, RSS, SOAP) |
| **zip** | Gestione degli archivi ZIP (pacchetti SCORM, importazioni/esportazioni massive) |
| **apcu** | Cache a livello utente (consigliato) |
| **opcache** | Cache degli opcode (fortemente consigliato per le prestazioni) |
| **xapian** | Ricerca full-text (opzionale, solo se utilizzi la funzione di ricerca) |

### Database

| Database | Versione Minima |
|----------|-----------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Server Web

| Server | Note |
|--------|------|
| **Apache** | Richiede `mod_rewrite` abilitato. |
| **Nginx** | Richiede configurazione manuale per la riscrittura degli URL. Consulta la documentazione di Symfony Nginx per una configurazione di riferimento. |

### Strumenti di Build

| Strumento | Scopo |
|-----------|-------|
| **Composer** | Gestione delle dipendenze PHP. Necessario per installare le librerie PHP di Chamilo. |
| **Node.js** (18+) | Runtime JavaScript. Necessario per costruire gli asset frontend. |
| **npm** | Gestore di pacchetti JavaScript. Installato con Node.js. |

## Requisiti Hardware

| Risorsa | Minimo | Consigliato |
|---------|--------|-------------|
| **RAM** | 2 GB | 4 GB o più |
| **CPU** | 1 core | 2+ core |
| **Spazio su disco** | 2 GB (solo applicazione) | 20+ GB (incluso contenuto caricato) |
| **Tipo di disco** | HDD | SSD (migliora significativamente le prestazioni del database e della cache) |

Questi sono valori di base. I requisiti effettivi dipendono dal numero di utenti concorrenti e dal volume di contenuti ospitati.

## Sistema Operativo

| SO | Note |
|----|------|
| **Linux** | Consigliato. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+ o equivalenti. |
| **Windows** | Possibile ma non testato a fondo. Usa WSL2 per lo sviluppo. |
| **macOS** | Solo per sviluppo / non testato. |

## Requisiti di Rete

* Un nome di dominio che punta al tuo server.
* Un certificato SSL/TLS per HTTPS (Let's Encrypt fornisce certificati gratuiti).
* Accesso SMTP in uscita se invii email direttamente (o utilizza un servizio email di terze parti).
* Porta 443 (HTTPS) e, opzionalmente, porta 80 (HTTP, per reindirizzamento a HTTPS).

## Verifica dei Requisiti

Dopo aver posizionato il codice sorgente di Chamilo sul tuo server, puoi verificare direttamente la configurazione PHP:

```bash
php -m          # Elenca le estensioni installate
php -i          # Informazioni complete su PHP
```

## Suggerimenti

* **Usa PHP-FPM** con Apache o Nginx per prestazioni migliori rispetto a mod_php.
* **Separa il tuo database** su un server dedicato per piattaforme che prevedono più di 500 utenti concorrenti.
* **Usa storage SSD** -- Le applicazioni con un uso intensivo del database come Chamilo beneficiano significativamente di un I/O su disco veloce.