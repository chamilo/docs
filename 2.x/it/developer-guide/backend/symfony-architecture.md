# Architettura di Symfony

## Bundle

Chamilo 2.0 è strutturato in tre bundle Symfony:

### CoreBundle (`src/CoreBundle/`)

Il bundle più grande, che gestisce tutte le questioni a livello di piattaforma:

* **Utenti e autenticazione** — Entità Utente, ruoli, token JWT, provider OAuth2
* **Sistema di risorse** — ResourceNode e ResourceFile (l'astrazione unificata dei contenuti)
* **Impostazioni della piattaforma** — Schemi di impostazioni in `src/CoreBundle/Settings/` che coprono ogni aspetto configurabile
* **Amministrazione** — Controller di amministrazione per la gestione di utenti, corsi, sessioni e plugin
* **Provider AI** — Pattern Factory per OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Archiviazione file** — Adattatori di archiviazione basati su Flysystem (locale, S3, Azure, GCS)
* **Sicurezza** — Voters, controllo degli accessi, gerarchia dei ruoli
* **Strumenti** — Definizioni degli strumenti del corso registrati tramite il sistema degli strumenti

### CourseBundle (`src/CourseBundle/`)

Tutto ciò che riguarda specificamente i contenuti del corso:

* **Entità dei contenuti** — 101 entità per documenti, esercizi, percorsi di apprendimento, forum, glossari, sondaggi, presenze, blog, compiti e altro ancora
* **Copia del corso** — Importazione/esportazione con supporto per Common Cartridge 1.3 e formato Moodle
* **Impostazioni del corso** — Schemi di impostazioni a livello di corso

### LtiBundle (`src/LtiBundle/`)

Implementazione dello standard LTI 1.3:

* **Registrazione di piattaforma e strumenti** — Gestione delle connessioni con strumenti esterni
* **Gestione del lancio** — Controller per il flusso di lancio LTI
* **Restituzione dei voti** — Restituzione dei voti da strumenti esterni a Chamilo

## Container dei Servizi

Chamilo utilizza il container di dependency injection di Symfony. I servizi sono configurati in:

* `config/services.yaml` — Definizioni dei servizi globali
* Directory `DependencyInjection/` di ciascun bundle — Servizi specifici del bundle

## Architettura di Sicurezza

Il sistema di sicurezza è configurato in `config/packages/security.yaml`:

* **Hashing delle password** — Supporta bcrypt (predefinito), con migrazione da SHA1 e MD5 legacy
* **Gerarchia dei ruoli** — 18 ruoli organizzati gerarchicamente (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; ruoli aggiuntivi includono ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Ruoli sensibili al contesto** — Ruoli a livello di corso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) calcolati per richiesta in base all'iscrizione
* **Firewall** — Autenticazione JWT per API, basata su sessione per l'interfaccia web
* **Voters** — Controllo degli accessi a livello di risorsa tramite i voters di Symfony

## Codice Legacy

Alcune funzionalità utilizzano ancora codice PHP legacy in `public/main/`:

* Rendering e interazione degli esercizi
* Player dei percorsi di apprendimento
* Alcuni strumenti di amministrazione

Queste funzionalità vengono progressivamente migrate all'architettura Symfony+Vue. Le pagine legacy vengono servite tramite un livello di compatibilità che avvia il kernel di Symfony.