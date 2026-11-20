# Server di autorizzazione OAuth 2.1 e client MCP

Chamilo può fungere da **server di autorizzazione OAuth** per i client che si connettono alle sue risorse protette. Si tratta di una funzionalità diversa dall'[accesso OAuth2](oauth2.md), in cui Chamilo utilizza un provider di identità esterno per autenticare gli utenti.

## Abilitazione e configurazione

In **Amministrazione > Impostazioni di configurazione > Sicurezza**, abilitare `security.oauth_server_enabled`. L'accesso MCP dipende inoltre dalla configurazione esistente `security.mcp_enabled` e dal ruolo MCP consentito all'utente.

Il server espone le route standard di autorizzazione, token, registrazione e revoca (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) e i metadati di discovery. Per i client di produzione si deve utilizzare esclusivamente HTTPS.

## Registrare un client

Chamilo supporta i client pubblici con codice di autorizzazione PKCE e i client riservati registrati. La registrazione dinamica dei client (DCR) utilizza `/oauth/register` ed è soggetta a limitazione di frequenza. L'impostazione `security.dynamic_client_registration` è **disabilitata per impostazione predefinita**; l'endpoint rimane disponibile per il flusso di registrazione MCP supportato, mentre l'impostazione controlla gli ambiti (scope) aggiuntivi dei client accettati dalla registrazione. Non si deve presumere che l'attivazione dell'impostazione renda disponibili API protette arbitrarie.

I client registrati dispongono di un elenco lato server di **risorse consentite**. Attualmente il registro delle risorse definisce solo la risorsa **MCP** e l'ambito `mcp`. Le nuove risorse protette richiedono un'implementazione esplicita sul server e decisioni sulle autorizzazioni, non la semplice aggiunta di un URL non riconosciuto a una richiesta. Chamilo convalida i parametri `resource` secondo la RFC 8707 durante l'intera gestione dell'autorizzazione e dei token.

## Consenso dell'utente e audit

1. Un client avvia una richiesta di codice di autorizzazione con PKCE (`S256`) e l'ambito/risorsa richiesti.
2. L'utente si autentica con il proprio accesso ordinario a Chamilo, se necessario.
3. Chamilo mostra l'identità del client, i dettagli di registrazione e l'accesso richiesto in una schermata di consenso.
4. L'utente seleziona **Consenti** o **Nega**. Un'approvazione viene registrata come parte della cronologia dei consensi del server e le informazioni sulle approvazioni precedenti possono essere visualizzate nelle richieste successive.

Il consenso è vincolato alla richiesta mostrata all'utente. Una richiesta approvata non concede altre risorse protette né un accesso arbitrario oltre le autorizzazioni richieste.

## Note di distribuzione e sicurezza

Gli aggiornamenti di OAuth 2.1 introducono un campo delle risorse consentite per i client e registrazioni persistenti del consenso dei client. Applicare le **migrazioni specifiche del database di Chamilo** fornite con la release prima di abilitare il flusso aggiornato. Mantenere privati gli URL di callback e i segreti dei client OAuth. La registrazione dei client non concede un accesso illimitato agli utenti o ai corsi di Chamilo.

Riferimento di implementazione: [Registrazione dei client OAuth e consenso, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).