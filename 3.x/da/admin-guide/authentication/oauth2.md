# OAuth2

OAuth2-godkendelse konfigureres i `config/authentication.yaml`. Chamilo har indbygget understøttelse af Azure AD, Keycloak, Facebook og enhver generisk OAuth2-kompatibel udbyder.

## Trin 1 — Registrér Chamilo hos din identitetsudbyder

Opret en applikation i udbyderens administrationspanel, og sæt **redirect URI** til:

```
https://your-chamilo-url/connect/<provider>/check
```

Hvor `<provider>` er `azure`, `keycloak`, `facebook` eller det navn, du giver en generisk udbyder. Notér **Client ID** og **Client Secret**.

## Trin 2 — Konfigurér authentication.yaml

Aktivér udbyderen, og angiv dens legitimationsoplysninger. Alle udbydere deler disse fælles nøgler:

| Nøgle | Beskrivelse |
|-----|-------------|
| `enabled` | `true` for at aktivere |
| `title` | Etiket vist på login-knappen |
| `client_id` | Fra din identitetsudbyder |
| `client_secret` | Fra din identitetsudbyder |
| `allow_create_new_users` | Opret automatisk en Chamilo-konto ved første login |
| `allow_update_user_info` | Synkronisér brugerdata ved hvert login |
| `force_as_login_method` | Skjul de øvrige metoder, og vis kun denne udbyders knap |
| `force_redirect` | Send en anonym besøgende automatisk til denne udbyder, uden at der skal klikkes på en knap |
| `skip_force_redirect_in` | Liste over URL-fragmenter, som `force_redirect` lader være i fred |

### Azure AD (Microsoft Entra ID)

Azure har sin egen dedikerede side, der dækker appregistring, gruppebaseret rollemapping, certifikatgodkendelse og kommandoerne til synkronisering af kontoprovisionering — se [Azure Entra ID](azure-entra-id.md).

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

### Generisk OAuth2

Brug dette til Google, GitLab eller enhver OAuth2-kompatibel udbyder:

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

Feltmapping (hvordan udbyderens attributter mappes til Chamilos `firstname`, `lastname`, `email` osv.) og rollemapping kan også konfigureres. Se [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) for den fulde liste over mappingnøgler.

## Valgfrit — Send alle besøgende automatisk til udbyderen

To nøgler styrer, hvor meget af login-siden en besøgende stadig ser. De er uafhængige og dækker forskellige behov:

| Nøgle | Hvad den besøgende ser |
|-----|-----------------------|
| `force_as_login_method: true` | Login-siden, reduceret til denne udbyders knap. Den besøgende klikker på den. |
| `force_redirect: true` | Ingen login-side overhovedet. Browseren går selv til udbyderen. |

Brug `force_redirect`, når identitetsudbyderen ejer alle konti, og den lokale loginformular ikke har noget formål:

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

Kun én udbyder kan tvinge omdirigeringen. Hvis flere angiver den, vinder den første aktiverede. LDAP kan ikke angive den, fordi den godkender via den lokale formular.

Omdirigeringen gælder for en side, som browseren viser, og for intet andet. Disse anmodninger bliver altid, hvor de er:

* Et API-, SCIM-, MCP- eller XHR-kald, som ikke kan følge et handshake beregnet til en browser.
* Et billede, et stylesheet eller en filoverførsel.
* Enhver skrivning (POST, PUT, DELETE), fordi en browser afspiller en omdirigeret skrivning som en GET og kasserer brødteksten.
* Selve udbyderens handshake (`/connect/...`) og `/logout`, som ellers ville skabe en uendelig løkke.
* En besøgende, der allerede har en session, herunder den anonyme konto for et offentligt kursus.

Tilføj et URL-fragment til `skip_force_redirect_in` for hvert offentligt område, der skal forblive åbent, f.eks. et kursuskatalog.

### Nødudgangen

En utilgængelig udbyder ville låse alle konti ude, inklusive den lokale administrator. Tilføj `skipForcedRedirect=1` til enhver URL for alligevel at nå den lokale loginformular:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Valget forbliver i sessionen, så de efterfølgende sider fortsætter med at vise formularen. Det annullerer også `force_as_login_method` for den session, hvilket sætter alle loginmetoder tilbage på siden. For at give platformen tilbage til udbyderen skal du bruge `?skipForcedRedirect=0` eller lukke browsersessionen.

Parameteren hører udelukkende til `force_redirect`. Så længe ingen udbyder erklærer den nøgle, gør parameteren slet ingenting, og `force_as_login_method` beholder sin enkelte knap.

Gem denne URL sammen med dine gendannelsesnoter. Test den, før du aktiverer `force_redirect` i produktion.

## Trin 3 — Ryd cache og test

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Log ud af Chamilo. Den konfigurerede udbyders knap bør vises på loginsiden. Test med en dedikeret konto, før du ruller ud til alle brugere.

## Tips

* Hold den almindelige loginformular aktiveret, så administratorer altid kan logge ind, hvis OAuth2 har problemer. Hvis du indstiller `force_redirect`, skal du i stedet lære URL'en `?skipForcedRedirect=1`: det er den eneste vej tilbage til den formular.
* Rolletildeling er som standard studerende; brug gruppekortlægning (Azure) til automatisk at forfremme brugere til lærer- eller administratorroller — se [Azure Entra ID](azure-entra-id.md) for detaljer om det og om at matche indkommende brugere med eksisterende konti.