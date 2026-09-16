# Architettura Symfony

## Bundle

Chamilo 3.0 è strutturato in tre bundle Symfony:

### CoreBundle (`src/CoreBundle/`)

Il bundle più grande, che gestisce tutte le problematiche a livello di piattaforma:

* **Utenti e autenticazione** — Entità User, ruoli, token JWT, provider OAuth2
* **Sistema delle risorse** — ResourceNode e ResourceFile (l'astrazione unificata dei contenuti)
* **Impostazioni della piattaforma** — schemi di impostazioni in `src/CoreBundle/Settings/` che coprono ogni aspetto configurabile
* **Amministrazione** — Controller di amministrazione per la gestione di utenti, corsi, sessioni e plugin
* **Provider di IA** — Pattern factory per OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Archiviazione dei file** — Adattatori di storage basati su Flysystem (locale, S3, Azure, GCS)
* **Sicurezza** — Voter, controllo degli accessi, gerarchia dei ruoli
* **Strumenti** — definizioni degli strumenti di corso registrate tramite il sistema degli strumenti

### CourseBundle (`src/CourseBundle/`)

Tutto ciò che è specifico dei contenuti del corso:

* **Entità di contenuto** — 101 entità per documenti, esercizi, percorsi di apprendimento, forum, glossari, sondaggi, presenze, blog, compiti e altro
* **Copia del corso** — Importazione/esportazione con supporto a Common Cartridge 1.3 e al formato Moodle
* **Impostazioni del corso** — Schemi di impostazioni a livello di corso

### LtiBundle (`src/LtiBundle/`)

Implementazione dello standard LTI 1.3:

* **Registrazione di piattaforma e tool** — Gestione delle connessioni ai tool esterni
* **Gestione del launch** — Controller del flusso di launch LTI
* **Grade passback** — Restituzione dei voti dai tool esterni a Chamilo

## Service Container

Chamilo utilizza il contenitore di dependency injection di Symfony. I servizi sono configurati in:

* `config/services.yaml` — Definizioni globali dei servizi
* Directory `DependencyInjection/` di ciascun bundle — Servizi specifici del bundle

## Architettura di sicurezza

Il sistema di sicurezza è configurato in `config/packages/security.yaml`:

* **Hashing delle password** — Supporta bcrypt (predefinito), con migrazione da SHA1 e MD5 legacy
* **Gerarchia dei ruoli** — 18 ruoli organizzati in modo gerarchico (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; ruoli aggiuntivi includono ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Ruoli sensibili al contesto** — I ruoli a livello di corso (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) sono calcolati per ciascuna richiesta in base all'iscrizione
* **Firewall** — Autenticazione JWT per l'API, basata su sessione per l'interfaccia web
* **Voter** — Controllo degli accessi a livello di risorsa tramite i voter Symfony

## Codice legacy

Alcune funzionalità usano ancora codice PHP legacy in `public/main/`:

* Rendering e interazione degli esercizi
* Player dei percorsi di apprendimento
* Alcuni strumenti di amministrazione

Queste funzionalità vengono progressivamente migrate all'architettura Symfony+Vue. Le pagine legacy sono servite tramite un livello di compatibilità che avvia il kernel Symfony.