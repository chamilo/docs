# OAuth2

OAuth2-authenticatie wordt geconfigureerd in `config/authentication.yaml`. Chamilo biedt ingebouwde ondersteuning voor Azure AD, Keycloak, Facebook en elke generieke OAuth2-conforme provider.

## Stap 1 — Registreer Chamilo bij uw identity provider

Maak een toepassing aan in het beheerderspaneel van uw provider en stel de **redirect URI** in op:

```
https://your-chamilo-url/connect/<provider>/check
```

Waarbij `<provider>` `azure`, `keycloak`, `facebook` is, of de naam die u aan een generieke provider geeft. Noteer de **Client ID** en **Client Secret**.

## Stap 2 — Configureer authentication.yaml

Schakel de provider in en geef de inloggegevens op. Alle providers delen deze gemeenschappelijke sleutels:

| Key | Description |
|-----|-------------|
| `enabled` | `true` om te activeren |
| `title` | Label dat op de inlogknop wordt getoond |
| `client_id` | Van uw identity provider |
| `client_secret` | Van uw identity provider |
| `allow_create_new_users` | Automatisch een Chamilo-account aanmaken bij de eerste aanmelding |
| `allow_update_user_info` | Gebruikersgegevens synchroniseren bij elke aanmelding |
| `force_as_login_method` | De andere methoden verbergen en alleen de knop van deze provider tonen |
| `force_redirect` | Een anonieme bezoeker automatisch naar deze provider sturen, zonder knop om op te klikken |
| `skip_force_redirect_in` | Lijst van URL-fragmenten die `force_redirect` ongemoeid laat |

### Azure AD (Microsoft Entra ID)

Azure heeft een eigen speciale pagina over app-registratie, groepsgebaseerde roltoewijzing, certificaatauthenticatie en de commando's voor accountprovisioning-synchronisatie — zie [Azure Entra ID](azure-entra-id.md).

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

Gebruik dit voor Google, GitLab of elke OAuth2-conforme provider:

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

Veldtoewijzing (hoe providerattributen worden gekoppeld aan `firstname`, `lastname`, `email` enz. van Chamilo) en roltoewijzing zijn eveneens configureerbaar. Zie de [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) voor de volledige lijst van toewijzingssleutels.

## Optioneel — Elke bezoeker automatisch naar de provider sturen

Twee sleutels bepalen hoeveel van de inlogpagina een bezoeker nog ziet. Ze zijn onafhankelijk en beantwoorden verschillende behoeften:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | De inlogpagina, teruggebracht tot de knop van deze provider. De bezoeker klikt erop. |
| `force_redirect: true` | Helemaal geen inlogpagina. De browser gaat zelf naar de provider. |

Gebruik `force_redirect` wanneer de identity provider elk account beheert en het lokale inlogformulier geen doel dient:

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

Slechts één provider kan de omleiding forceren. Als meerdere het declareren, wint de eerste ingeschakelde. LDAP kan het niet declareren, omdat het via het lokale formulier authenticeert.

De omleiding geldt voor een pagina die de browser weergeeft, en voor niets anders. Deze verzoeken blijven altijd waar ze zijn:

* Een API-, SCIM-, MCP- of XHR-aanroep, die een handshake die voor een browser bedoeld is niet kan volgen.
* Een afbeelding, een stylesheet of een bestandsdownload.
* Elke schrijfactie (POST, PUT, DELETE), omdat een browser een omgeleide schrijfactie als GET herhaalt en de body weglaat.
* De handshake van de provider zelf (`/connect/...`) en `/logout`, die anders een eindeloze lus zouden vormen.
* Een bezoeker die al een sessie heeft, inclusief het anonieme account van een openbare cursus.

Voeg een URL-fragment toe aan `skip_force_redirect_in` voor elk openbaar gebied dat open moet blijven, zoals een cursuscatalogus.

### De nooduitgang

Een onbereikbare provider zou ieder account buitensluiten, inclusief de lokale beheerder. Voeg `skipForcedRedirect=1` toe aan elke URL om toch het lokale inlogformulier te bereiken:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

De keuze blijft in de sessie, zodat de pagina's die volgen het formulier blijven tonen. Het annuleert ook `force_as_login_method` voor die sessie, waardoor elke inlogmethode weer op de pagina verschijnt. Om het platform weer aan de provider te geven, gebruikt u `?skipForcedRedirect=0`, of sluit u de browsersessie.

De parameter hoort uitsluitend bij `force_redirect`. Zolang geen enkele provider die sleutel declareert, doet de parameter niets, en behoudt `force_as_login_method` zijn enkele knop.

Bewaar deze URL bij uw herstelnotities. Test hem voordat u `force_redirect` in productie inschakelt.

## Stap 3 — Cache legen en testen

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Log uit bij Chamilo. De knop van de geconfigureerde provider zou op de inlogpagina moeten verschijnen. Test met een dedicated account voordat u dit voor alle gebruikers uitrolt.

## Tips

* Houd het standaard inlogformulier ingeschakeld zodat beheerders altijd kunnen inloggen als OAuth2 problemen heeft. Als u `force_redirect` instelt, leer dan in plaats daarvan de URL `?skipForcedRedirect=1`: dat is de enige weg terug naar dat formulier.
* Roltoewijzing is standaard student; gebruik groepsmapping (Azure) om gebruikers automatisch tot leraar- of beheerdersrollen te promoveren — zie [Azure Entra ID](azure-entra-id.md) voor details daarover en over het koppelen van binnenkomende gebruikers aan bestaande accounts.