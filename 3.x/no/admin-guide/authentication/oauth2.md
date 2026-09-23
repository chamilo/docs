# OAuth2

OAuth2-autentisering konfigureres i `config/authentication.yaml`. Chamilo har innebygd støtte for Azure AD, Keycloak, Facebook og enhver generisk OAuth2-kompatibel leverandør.

## Trinn 1 — Registrer Chamilo hos identitetsleverandøren din

Opprett en applikasjon i leverandørens administrasjonspanel og sett **redirect URI** til:

```
https://your-chamilo-url/connect/<provider>/check
```

Der `<provider>` er `azure`, `keycloak`, `facebook` eller navnet du gir en generisk leverandør. Noter **Client ID** og **Client Secret**.

## Trinn 2 — Konfigurer authentication.yaml

Aktiver leverandøren og oppgi påloggingsinformasjonen. Alle leverandører deler disse felles nøklene:

| Nøkkel | Beskrivelse |
|-----|-------------|
| `enabled` | `true` for å aktivere |
| `title` | Etikett som vises på innloggingsknappen |
| `client_id` | Fra identitetsleverandøren din |
| `client_secret` | Fra identitetsleverandøren din |
| `allow_create_new_users` | Opprett automatisk en Chamilo-konto ved første innlogging |
| `allow_update_user_info` | Synkroniser brukerdata ved hver innlogging |
| `force_as_login_method` | Skjul de andre metodene, og vis kun denne leverandørens knapp |
| `force_redirect` | Send en anonym besøkende automatisk til denne leverandøren, uten knapp å klikke på |
| `skip_force_redirect_in` | Liste over URL-fragmenter som `force_redirect` lar være i fred |

### Azure AD (Microsoft Entra ID)

Azure har en egen side som dekker appregistring, gruppebasert rollemapping, sertifikatautentisering og kommandoene for synkronisering av kontooppretting — se [Azure Entra ID](azure-entra-id.md).

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

Bruk dette for Google, GitLab eller enhver OAuth2-kompatibel leverandør:

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

Feltmapping (hvordan leverandørattributter mappes til Chamilos `firstname`, `lastname`, `email` osv.) og rollemapping kan også konfigureres. Se [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) for den fullstendige listen over mappingnøkler.

## Valgfritt — Send alle besøkende automatisk til leverandøren

To nøkler styrer hvor mye av innloggingssiden en besøkende fortsatt ser. De er uavhengige og dekker ulike behov:

| Nøkkel | Hva den besøkende ser |
|-----|-----------------------|
| `force_as_login_method: true` | Innloggingssiden, redusert til denne leverandørens knapp. Den besøkende klikker på den. |
| `force_redirect: true` | Ingen innloggingsside i det hele tatt. Nettleseren går til leverandøren av seg selv. |

Bruk `force_redirect` når identitetsleverandøren eier alle kontoer, og det lokale innloggingsskjemaet ikke har noen funksjon:

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

Bare én leverandør kan tvinge omdirigeringen. Hvis flere erklærer den, vinner den første aktiverte. LDAP kan ikke erklære den, fordi den autentiserer via det lokale skjemaet.

Omdirigeringen gjelder en side nettleseren viser, og ingenting annet. Disse forespørslene blir alltid der de er:

* Et API-, SCIM-, MCP- eller XHR-kall, som ikke kan følge en håndtrykk ment for en nettleser.
* Et bilde, et stilark eller en filnedlasting.
* Enhver skriveoperasjon (POST, PUT, DELETE), fordi en nettleser spiller av en omdirigert skriveoperasjon som GET og dropper kroppen.
* Selve leverandørhåndtrykket (`/connect/...`) og `/logout`, som ellers ville bygge en evig løkke.
* En besøkende som allerede har en økt, inkludert den anonyme kontoen til et offentlig kurs.

Legg til et URL-fragment i `skip_force_redirect_in` for hvert offentlig område som må forbli åpent, for eksempel et kurskatalog.

### Nødutgangen

En utilgjengelig leverandør ville låse alle kontoer ute, inkludert den lokale administratoren. Legg til `skipForcedRedirect=1` på en hvilken som helst URL for likevel å nå det lokale innloggingsskjemaet:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Valget beholdes i økten, slik at sidene som følger fortsetter å vise skjemaet. Det avbryter også `force_as_login_method` for den økten, noe som gjør at alle innloggingsmetoder vises på siden igjen. For å gi plattformen tilbake til leverandøren, bruk `?skipForcedRedirect=0`, eller lukk nettleserøkten.

Parameteren tilhører kun `force_redirect`. Så lenge ingen leverandør deklarerer den nøkkelen, gjør parameteren ingenting, og `force_as_login_method` beholder sin ene knapp.

Oppbevar denne URL-en sammen med gjenopprettingsnotatene dine. Test den før du aktiverer `force_redirect` i produksjon.

## Trinn 3 — Tøm hurtigbuffer og test

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Logg ut av Chamilo. Knappen for den konfigurerte leverandøren skal vises på innloggingssiden. Test med en dedikert konto før du ruller ut til alle brukere.

## Tips

* Hold det vanlige innloggingsskjemaet aktivert slik at administratorer alltid kan logge inn hvis OAuth2 har problemer. Hvis du setter `force_redirect`, lær deg URL-en `?skipForcedRedirect=1` i stedet: det er den eneste veien tilbake til det skjemaet.
* Rolletilordning er som standard student; bruk gruppekobling (Azure) for automatisk å fremme brukere til lærer- eller administratorroller — se [Azure Entra ID](azure-entra-id.md) for detaljer om dette og om matching av innkommende brukere mot eksisterende kontoer.