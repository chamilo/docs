# OAuth2

OAuth2-authenticatie wordt geconfigureerd in `config/authentication.yaml`. Chamilo biedt ingebouwde ondersteuning voor Azure AD, Keycloak, Facebook en elke generieke OAuth2-compatibele provider.

## Stap 1 — Registreer Chamilo bij uw identiteitsprovider

Maak een toepassing aan in het beheerpaneel van uw provider en stel de **redirect URI** in op:

```
https://uw-chamilo-url/connect/<provider>/check
```

Waarbij `<provider>` gelijk is aan `azure`, `keycloak`, `facebook` of de naam die u geeft aan een generieke provider. Noteer de **Client ID** en **Client Secret**.

## Stap 2 — Configureer authentication.yaml

Schakel de provider in en voeg de benodigde inloggegevens toe. Alle providers delen deze gemeenschappelijke sleutels:

| Sleutel | Beschrijving |
|---------|--------------|
| `enabled` | `true` om te activeren |
| `title` | Label dat wordt weergegeven op de inlogknop |
| `client_id` | Van uw identiteitsprovider |
| `client_secret` | Van uw identiteitsprovider |
| `allow_create_new_users` | Automatisch een Chamilo-account aanmaken bij eerste inlog |
| `allow_update_user_info` | Gebruikersgegevens synchroniseren bij elke inlog |
| `force_as_login_method` | Andere methoden uitschakelen en deze forceren |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

Azure ondersteunt ook groepgebaseerde roltoewijzing (het koppelen van Azure-groep-ID's aan Chamilo-rollen zoals docent of beheerder), commando's voor gebruikers-delta-synchronisatie en certificaat-authenticatie in plaats van een clientgeheim. Zie de [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) voor deze opties.

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

### Generieke OAuth2

Gebruik dit voor Google, GitLab of een andere OAuth2-compatibele provider:

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

Veldtoewijzing (hoe provider-attributen worden gekoppeld aan Chamilo's `firstname`, `lastname`, `email`, enz.) en roltoewijzing zijn ook configureerbaar. Zie de [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) voor de volledige lijst met toewijzingssleutels.

## Stap 3 — Cache legen en testen

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Log uit bij Chamilo. De knop van de geconfigureerde provider zou moeten verschijnen op de inlogpagina. Test met een speciaal account voordat u dit uitrolt naar alle gebruikers.

## Tips

* Houd het standaard inlogformulier ingeschakeld zodat beheerders altijd kunnen inloggen als er problemen zijn met OAuth2.
* Bij gebruik van Azure met bestaande gebruikers, configureer `existing_user_verification_order` om te bepalen hoe Chamilo inkomende gebruikers koppelt aan bestaande accounts.
* Roltoewijzing is standaard ingesteld op student; gebruik groepstoewijzing om gebruikers automatisch te promoveren naar docent- of beheerdersrollen.