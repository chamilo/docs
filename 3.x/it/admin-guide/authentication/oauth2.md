# OAuth2

L'autenticazione OAuth2 si configura in `config/authentication.yaml`. Chamilo include il supporto integrato per Azure AD, Keycloak, Facebook e qualsiasi provider generico conforme a OAuth2.

## Step 1 — Registrare Chamilo nel provider di identità

Creare un'applicazione nel pannello di amministrazione del provider e impostare l'**URI di reindirizzamento** su:

```
https://your-chamilo-url/connect/<provider>/check
```

Dove `<provider>` è `azure`, `keycloak`, `facebook` o il nome assegnato a un provider generico. Annotare il **Client ID** e il **Client Secret**.

## Step 2 — Configurare authentication.yaml

Abilitare il provider e fornire le relative credenziali. Tutti i provider condividono queste chiavi comuni:

| Key | Description |
|-----|-------------|
| `enabled` | `true` per attivare |
| `title` | Etichetta mostrata sul pulsante di accesso |
| `client_id` | Dal provider di identità |
| `client_secret` | Dal provider di identità |
| `allow_create_new_users` | Crea automaticamente un account Chamilo al primo accesso |
| `allow_update_user_info` | Sincronizza i dati utente a ogni accesso |
| `force_as_login_method` | Nasconde gli altri metodi e mostra solo il pulsante di questo provider |
| `force_redirect` | Invia automaticamente un visitatore anonimo a questo provider, senza pulsante da cliccare |
| `skip_force_redirect_in` | Elenco di frammenti di URL che `force_redirect` lascia invariati |

### Azure AD (Microsoft Entra ID)

Azure dispone di una pagina dedicata che copre la registrazione dell'app, il mapping dei ruoli basato sui gruppi, l'autenticazione con certificato e i comandi di sincronizzazione per il provisioning degli account — vedere [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generic OAuth2

Utilizzare questa opzione per Google, GitLab o qualsiasi provider conforme a OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Il mapping dei campi (come gli attributi del provider corrispondono a `firstname`, `lastname`, `email` di Chamilo, ecc.) e il mapping dei ruoli sono anch'essi configurabili. Vedere il [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) per l'elenco completo delle chiavi di mapping.

## Optional — Inviare automaticamente ogni visitatore al provider

Due chiavi controllano quanto della pagina di accesso un visitatore continua a vedere. Sono indipendenti e rispondono a esigenze diverse:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | La pagina di accesso, ridotta al pulsante di questo provider. Il visitatore lo clicca. |
| `force_redirect: true` | Nessuna pagina di accesso. Il browser va al provider da solo. |

Utilizzare `force_redirect` quando il provider di identità possiede ogni account e il modulo di accesso locale non ha scopo:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Un solo provider può forzare il reindirizzamento. Se più provider lo dichiarano, prevale il primo abilitato. LDAP non può dichiararlo, perché autentica tramite il modulo locale.

Il reindirizzamento si applica a una pagina visualizzata dal browser e a nient'altro. Queste richieste restano sempre dove sono:

* Una chiamata API, SCIM, MCP o XHR, che non può seguire un handshake pensato per un browser.
* Un'immagine, un foglio di stile o un download di file.
* Qualsiasi scrittura (POST, PUT, DELETE), perché un browser riproduce una scrittura reindirizzata come GET e scarta il corpo.
* L'handshake del provider stesso (`/connect/...`) e `/logout`, che altrimenti genererebbero un ciclo infinito.
* Un visitatore che ha già una sessione, incluso l'account anonimo di un corso pubblico.

Aggiungere un frammento di URL a `skip_force_redirect_in` per ogni area pubblica che deve restare aperta, ad esempio un catalogo dei corsi.

### La via di fuga

Un provider irraggiungibile bloccherebbe tutti gli account, incluso quello dell'amministratore locale. Aggiungere `skipForcedRedirect=1` a qualsiasi URL per raggiungere comunque il modulo di accesso locale:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

La scelta resta nella sessione, quindi le pagine successive continuano a mostrare il modulo. Annulla inoltre `force_as_login_method` per quella sessione, il che riporta tutti i metodi di accesso sulla pagina. Per restituire la piattaforma al provider, usare `?skipForcedRedirect=0`, oppure chiudere la sessione del browser.

Il parametro appartiene esclusivamente a `force_redirect`. Finché nessun provider dichiara quella chiave, il parametro non ha alcun effetto e `force_as_login_method` mantiene il proprio unico pulsante.

Conservare questo URL insieme alle note di ripristino. Provarlo prima di abilitare `force_redirect` in produzione.

## Passo 3 — Svuotare la cache e verificare

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Uscire da Chamilo. Il pulsante del provider configurato dovrebbe comparire sulla pagina di accesso. Provare con un account dedicato prima di estendere a tutti gli utenti.

## Consigli

* Mantenere abilitato il modulo di accesso standard in modo che gli amministratori possano sempre accedere se OAuth2 presenta problemi. Se si imposta `force_redirect`, imparare invece l'URL `?skipForcedRedirect=1`: è l'unico modo per tornare a quel modulo.
* L'assegnazione dei ruoli è per impostazione predefinita studente; usare il mapping dei gruppi (Azure) per promuovere automaticamente gli utenti ai ruoli di docente o amministratore — vedere [Azure Entra ID](azure-entra-id.md) per i dettagli su questo e sull'associazione degli utenti in arrivo agli account esistenti.