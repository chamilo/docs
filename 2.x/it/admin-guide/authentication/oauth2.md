# OAuth2

L'autenticazione OAuth2 è configurata nel file `config/authentication.yaml`. Chamilo include il supporto integrato per Azure AD, Keycloak, Facebook e qualsiasi provider generico conforme a OAuth2.

## Passo 1 — Registra Chamilo nel tuo provider di identità

Crea un'applicazione nel pannello di amministrazione del tuo provider e imposta l'**URI di reindirizzamento** su:

```
https://your-chamilo-url/connect/<provider>/check
```

Dove `<provider>` è `azure`, `keycloak`, `facebook` o il nome che assegni a un provider generico. Prendi nota del **Client ID** e del **Client Secret**.

## Passo 2 — Configura authentication.yaml

Abilita il provider e fornisci le sue credenziali. Tutti i provider condividono queste chiavi comuni:

| Chiave | Descrizione |
|--------|-------------|
| `enabled` | `true` per attivare |
| `title` | Etichetta mostrata sul pulsante di accesso |
| `client_id` | Fornito dal tuo provider di identità |
| `client_secret` | Fornito dal tuo provider di identità |
| `allow_create_new_users` | Crea automaticamente un account Chamilo al primo accesso |
| `allow_update_user_info` | Sincronizza i dati utente a ogni accesso |
| `force_as_login_method` | Disabilita altri metodi e forza questo |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Accedi con Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure supporta anche la mappatura dei ruoli basata sui gruppi (mappatura degli ID dei gruppi Azure ai ruoli di Chamilo come docente o amministratore), comandi di sincronizzazione delta degli utenti e autenticazione tramite certificato invece di un client secret. Consulta il [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) per queste opzioni.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Accedi con Keycloak"
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
        title: "Accedi con Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 Generico

Usa questo per Google, GitLab o qualsiasi provider conforme a OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Accedi con MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

La mappatura dei campi (come gli attributi del provider vengono mappati ai campi di Chamilo come `firstname`, `lastname`, `email`, ecc.) e la mappatura dei ruoli sono anch'esse configurabili. Consulta il [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) per l'elenco completo delle chiavi di mappatura.

## Passo 3 — Svuota la cache e testa

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Esci da Chamilo. Il pulsante del provider configurato dovrebbe apparire nella pagina di accesso. Testa con un account dedicato prima di implementarlo per tutti gli utenti.

## Suggerimenti

* Mantieni attivo il modulo di accesso standard in modo che gli amministratori possano sempre accedere se ci sono problemi con OAuth2.
* Quando utilizzi Azure con utenti esistenti, configura `existing_user_verification_order` per controllare come Chamilo associa gli utenti in arrivo agli account esistenti.
* L'assegnazione dei ruoli è impostata di default su studente; utilizza la mappatura dei gruppi per promuovere automaticamente gli utenti a ruoli di docente o amministratore.