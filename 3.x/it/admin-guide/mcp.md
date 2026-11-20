# MCP (Model Context Protocol)

Chamilo 3.0 espone un server MCP in modo che gli assistenti e gli agenti IA (Claude, connettori ChatGPT o qualsiasi client compatibile MCP) possano agire all'interno della piattaforma per conto di un utente autenticato, utilizzando i permessi di quell'utente — non esiste un account di servizio separato né un accesso con privilegi elevati.

## Cosa aggiunge MCP a Chamilo

MCP (Model Context Protocol) è uno standard aperto che consente ai client IA di invocare un insieme definito di «strumenti» esposti da un server. Il server MCP di Chamilo è raggiungibile a un unico endpoint, `/mcp`, ed espone un insieme curato di strumenti di gestione dei corsi orientati ai docenti, piuttosto che l'intera superficie API.

## Funzionalità disponibili

Ogni chiamata viene eseguita come l'utente connesso, quindi uno strumento vede e modifica solo i corsi che quell'utente gestisce. L'insieme attuale di strumenti:

| Strumento | Cosa fa |
|------|---------------|
| Current user | Restituisce l'identità e i ruoli dell'utente autenticato |
| Teacher courses | Elenca i corsi che l'utente gestisce come docente |
| Course overview | Restituisce le informazioni di base del corso e i conteggi delle risorse |
| Create course | Crea un nuovo corso applicando le regole di creazione corsi della piattaforma |
| Create course assignment | Crea un compito in bozza o pubblicato, con una descrizione e un punteggio massimo |
| Create course test | Crea un test a scelta multipla assistito da IA a partire da una descrizione dell'argomento o da un documento esistente |
| Get course test response status | Riporta quali studenti hanno risposto, sono in corso o sono in attesa su un test |
| Get user course test score | Restituisce i punteggi più recente e migliore completati di uno studente su un test |
| Create training satisfaction survey | Crea un questionario di soddisfazione a sette domande |
| Create course learning path | Crea un percorso di apprendimento a partire dalle pagine fornite dal client MCP |
| List documents | Elenca i documenti nello strumento Documenti di un corso |
| Read course document | Restituisce il contenuto HTML, il titolo e i metadati di un documento modificabile |
| Edit course document | Sostituisce l'intero contenuto HTML di un documento modificabile esistente |
| Create course document | Crea un documento HTML assistito da IA nella cartella radice Documenti |
| Create course illustration | Genera un'illustrazione IA per un argomento e la salva come documento |
| Illustrate document paragraph | Inserisce un'immagine o un video esistente prima o dopo un paragrafo in un documento |
| Find recent course forum activity | Trova i messaggi recenti e visibili del forum relativi a un argomento |
| Review course quality | Analizza i percorsi di apprendimento, i documenti, i test, i compiti e i questionari di un corso e restituisce raccomandazioni di miglioramento |

Questo elenco è curato dal team core di Chamilo e non è estendibile dagli utenti dall'interno della piattaforma — i docenti non possono aggiungere i propri strumenti.

## Come si connettono gli utenti

### Chiave API MCP personale

Ogni utente genera la propria chiave in **Rete sociale** > **Chiave API MCP**:

![La pagina della chiave API MCP, che mostra una chiave inattiva, il pulsante Genera chiave API e il blocco Connessione MCP remota con l'URL dell'endpoint e il formato dell'intestazione Authorization](/.gitbook/assets/admin-mcp-api-key.png)

* Facendo clic su **Genera chiave API** si crea una chiave e la si visualizza una sola volta — Chamilo memorizza in seguito solo una versione mascherata, quindi la chiave completa deve essere copiata e conservata in modo sicuro immediatamente.
* La generazione di una nuova chiave revoca immediatamente quella precedente.
* La pagina mostra lo stato della chiave (attiva/inattiva), l'endpoint MCP da configurare nel client e le date di creazione e di ultimo utilizzo.
* Il pannello **Connessione MCP remota** indica esattamente cosa inserire nel client MCP: l'URL dell'endpoint e un'intestazione `Authorization: Bearer <your MCP API key>`.

Come nota la pagina stessa, la chiave autentica il client come l'account di quell'utente — non concede alcun permesso che l'account non possieda già.

### OAuth 2.1 (client remoti e connettori)

Per i client MCP che supportano il discovery OAuth e la registrazione dinamica del client (anziché una chiave incollata manualmente), Chamilo agisce anche come authorization server OAuth 2.1: il client scopre gli endpoint di Chamilo, si registra e reindirizza l'utente a `/oauth/authorize` per approvare l'accesso. Le applicazioni approvate compaiono in **Rete sociale** > **Applicazioni autorizzate**, dove l'utente può revocare quelle che non usa più o che non riconosce.

## Considerazioni sulla sicurezza

* **Nessuna escalation di privilegi.** Ogni chiamata a uno strumento MCP e ogni applicazione autorizzata tramite OAuth viene eseguita con i permessi Chamilo dell'utente che si connette — una chiave API personale o un'applicazione autorizzata non possono mai fare più di quanto quell'utente potrebbe già fare manualmente.
* **Solo Bearer, con rate limiting.** `/mcp` accetta esclusivamente una credenziale Bearer — una chiave API MCP personale, un token di accesso OAuth o (in sviluppo) un JWT. I tentativi di autenticazione sono soggetti a rate limiting per indirizzo IP, per rallentare gli attacchi di indovinamento delle credenziali.
* **Superficie pubblica ridotta.** L'unico traffico non autenticato che `/mcp` accetta è il preflight `OPTIONS`; ogni chiamata effettiva richiede `ROLE_USER`. Gli endpoint di discovery OAuth, di registrazione dinamica del client e dei token sono intenzionalmente pubblici, come richiesto dalle specifiche OAuth 2.1 / MCP — questo di per sé non concede l'accesso, consente soltanto a un client di apprendere come avviare il flusso di autorizzazione.
* **La protezione dal DNS rebinding è deliberatamente disabilitata per `/mcp`.** Il bundle che implementa MCP normalmente restringe l'endpoint a `localhost`, a meno che non sia configurato un elenco statico di hostname consentiti — una soluzione poco adatta a un portale Chamilo multi-URL raggiungibile sotto molti hostname. Chamilo disabilita tale controllo perché qui è ridondante: ogni richiesta a `/mcp` richiede già una credenziale Bearer indipendentemente dall'header `Host`/`Origin`, e un attacco di DNS rebinding (che si basa su un'autenticazione ambientale di tipo cookie che viaggia insieme a un Host contraffatto) non può falsificare un bearer token che non possiede già.

## Configurazione del server MCP

A differenza della maggior parte delle integrazioni di questa guida, MCP non dispone di una pagina di impostazioni nel pannello di amministrazione — è configurato a livello di file, in `config/packages/mcp.yaml`, e richiede l'accesso alla shell del server:

| Chiave | Scopo |
|-----|---------|
| `app`, `version`, `description` | Identità che Chamilo comunica ai client MCP in connessione |
| `client_transports.stdio` / `client_transports.http` | Quali transport sono attivi; Chamilo abilita entrambi per impostazione predefinita |
| `http.path` | L'endpoint HTTP MCP (`/mcp` per impostazione predefinita) |
| `http.allowed_hosts` | Allowlist degli host per il DNS rebinding — impostata su `false` in Chamilo (vedere Considerazioni sulla sicurezza sopra) |
| `http.session.store`, `.directory`, `.ttl` | Dove viene persistito lo stato di sessione MCP e per quanto tempo |

Per disabilitare completamente il server MCP, impostare `client_transports.http: false` (e `stdio: false` se anche il transport CLI deve essere disattivato) e svuotare la cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Consigli

* Trattare una chiave API MCP come una password — chiunque la possieda può agire come quell'utente tramite qualsiasi client MCP.
* Incoraggiare gli utenti a rivedere periodicamente **Applicazioni autorizzate** e a revocare tutto ciò che non riconoscono.
* Vedere [Configurazione AI](integrations/ai-configuration.md) per i provider AI che supportano gli strumenti di generazione dei contenuti (creazione di test, creazione di documenti, illustrazioni) elencati sopra.