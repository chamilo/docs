# Azure Entra ID

Microsoft heeft Azure Active Directory (Azure AD) in 2023 hernoemd tot **Microsoft Entra ID** — het is dezelfde dienst, en de code en configuratie van Chamilo verwijzen er nog steeds naar als `azure`. Deze pagina behandelt de Azure-specifieke onderdelen van de integratie: app-registratie, groepsgebaseerde roltoewijzing, certificaatauthenticatie en de speciale synchronisatiecommando's voor gebruikers/groepen. Voor de configuratiesleutels die alle providers gemeen hebben (`enabled`, `title`, `allow_create_new_users`, enzovoort) en de algemene structuur van `authentication.yaml`, zie [OAuth2](oauth2.md).

## Chamilo registreren in Microsoft Entra ID

1. Maak in het Entra-beheercentrum een **App-registratie** voor Chamilo.
2. Stel de omleidings-URI (platformtype **Web**) in op:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Noteer de **Application (client) ID** en **Directory (tenant) ID** — u hebt beide nodig.
4. Maak onder **Certificates & secrets** een clientgeheim aan of upload een certificaat (zie [Certificaatauthenticatie](#certificate-authentication) hieronder).
5. Voeg onder **API permissions** de onderstaande Microsoft Graph-machtigingen toe en verleen beheerdersinstemming.

| Machtiging | Type | Nodig voor |
|------------|------|-------------|
| `User.Read` | Delegated | Basisaanmelding |
| `GroupMember.Read.All` | Delegated | Groepsgebaseerde roltoewijzing bij aanmelding |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` of `Group.Read.All` | Application | `app:azure-sync-users` en `app:azure-sync-usergroups` |

Application-machtigingen vereisen beheerdersinstemming en worden alleen gebruikt door de synchronisatieconsolecommando's (via de `client_credentials`-grant), nooit door de interactieve aanmelding van een gebruiker.

## Basisconfiguratie

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

### Multi-tenant versus single-tenant

De waarde van `tenant` moet overeenkomen met hoe de "supported account types" van de app-registratie zijn ingesteld:

* Een specifieke tenant-GUID — single-tenant, alleen accounts van die organisatie kunnen zich aanmelden
* `organizations` — elke Entra ID-tenant
* `common` — elke Entra ID-tenant plus persoonlijke Microsoft-accounts

## Vereiste gebruikerskenmerken

Elke Entra ID-gebruiker die zich bij Chamilo moet kunnen aanmelden, moet `mail` en `mailNickname` ingevuld hebben — de aanmelding geeft een fout als een van beide leeg is (samen met de onveranderlijke Entra-object-ID, die altijd aanwezig is). De veldtoewijzing van Microsoft Graph naar Chamilo is voor Azure **vast** (in tegenstelling tot de generieke OAuth2-provider, waarbij u de veldtoewijzing kunt configureren):

| Chamilo-veld | Microsoft Graph-bron |
|---------------|------------------------|
| Voornaam | `givenName` |
| Achternaam | `surname` |
| E-mail | `mail` |
| Gebruikersnaam | `userPrincipalName` |
| Telefoon | `telephoneNumber`, vervolgens `businessPhones[0]`, vervolgens `mobilePhone` |
| Actief | `accountEnabled` |
| Interfacetaal | `preferredLanguage` (gekoppeld aan een geïnstalleerde Chamilo-taal, met terugval naar de platformstandaard) |

Drie extra velden worden ook bij elke geslaagde aanmelding weggeschreven: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) en `azure_uid` (= de Entra-object-ID). Deze ondersteunen de accountkoppelingslogica hieronder.

## Aanmeldingen koppelen aan bestaande Chamilo-accounts

Stel `existing_user_verification_order` in op een door komma's gescheiden lijst van de cijfers `1`–`3` om te bepalen hoe een binnenkomende Entra ID-aanmelding wordt gekoppeld aan een bestaand Chamilo-account:

| Waarde | Koppelt aan |
|-------|------------------|
| `1` | Extra veld `organisationemail` == Entra `mail` |
| `2` | Extra veld `azure_id` == Entra `mailNickname` |
| `3` | Extra veld `azure_uid` == Entra-object-ID |

Posities worden in de opgegeven volgorde geprobeerd; de eerste actieve (niet soft-deleted) overeenkomst wint. Een ongeldige of lege waarde valt terug op `1,2,3`. Als geen van de geconfigureerde posities overeenkomt — wat altijd het geval is de allereerste keer dat een bepaalde gebruiker zich aanmeldt, omdat die extra velden pas *na* een geslaagde aanmelding worden ingevuld — valt Chamilo terug op het koppelen van het eigen `email`-veld van Chamilo aan Entra `mail`, en vervolgens `username` aan `userPrincipalName`, ongeacht wat u hebt geconfigureerd.

## Groepsgebaseerde roltoewijzing

Koppel beveiligingsgroepen van Entra ID aan Chamilo-rollen met hun Object ID's (GUID's):

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

Bij elke aanmelding roept Chamilo Microsoft Graph `/v1.0/me/memberOf` aan met het eigen access token van de gebruiker en toetst de teruggegeven groepen aan deze drie ID's, in de volgorde **admin → session_admin → teacher**. De eerste overeenkomst wint — een gebruiker die zowel in de admin- als in de teacher-groep zit, wordt alleen tot admin bevorderd. Iedereen die in geen van de geconfigureerde groepen zit, behoudt de bestaande rol (of de standaard studentrol, bij de eerste aanmelding). Dit vereist de gedelegeerde machtiging `GroupMember.Read.All` die hierboven is vermeld.

## Certificaatauthenticatie

Als alternatief voor `client_secret` kunt u authenticeren met een certificaat:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Upload het bijbehorende publieke certificaat onder **Certificates & secrets** in de app-registratie en kopieer de thumbprint (in hex weergegeven in het portaal) naar `client_certificate_thumbprint`. Wanneer beide sleutels zijn ingesteld, bouwt Chamilo een ondertekende JWT-client assertion (RS256) in plaats van `client_secret` te versturen — dit geldt zowel voor interactieve aanmeldingen als voor de app-only authenticatie van de synchronisatiecommando's.

## Gebruikers en groepen synchroniseren vanuit Entra ID

Twee consolecommando's voorzien Chamilo-accounts rechtstreeks vanuit Entra ID en onderhouden ze, onafhankelijk van interactieve aanmelding. Beide authenticeren app-only (`client_credentials`), dus ze hebben de **application**-Graph-machtigingen nodig die hierboven zijn vermeld, en beide zijn bedoeld om in cron te worden gepland in plaats van handmatig te worden uitgevoerd.

### `app:azure-sync-users`

Haalt gebruikers op uit Microsoft Graph en voorziet/werkt de bijbehorende Chamilo-accounts bij met dezelfde veldtoewijzing en accountkoppelingslogica als bij een interactieve aanmelding.

* Standaard wordt de volledige gebruikerslijst opgehaald (`/v1.0/users`, gepagineerd). Stel `script_users_delta: true` in om in plaats daarvan `/v1.0/users/delta` te gebruiken — Chamilo bewaart de deltalink tussen runs, zodat volgende runs alleen ophalen wat is gewijzigd.
* Stel `deactivate_nonexisting_users: true` in om Chamilo-accounts (met authenticatiebron Azure) te deactiveren die niet meer in de Entra ID-ophaling voorkomen. Dit werkt alleen in de volledige-ophalingsmodus — de deltamodus geeft nooit de volledige gebruikerslijst terug, dus deze instelling wordt genegeerd wanneer `script_users_delta` is ingeschakeld.
* Groepsroltoewijzing (hierboven) wordt tijdens deze run opnieuw toegepast voor elke gesynchroniseerde gebruiker, niet alleen bij aanmelding.

### `app:azure-sync-usergroups`

Haalt Entra ID-groepen op en spiegelt ze als Chamilo-klassen (`Usergroup`).

* Haalt de volledige groepslijst op (`/v1.0/groups`) of, met `script_usergroups_delta: true`, het delta-eindpunt, met een eigen, afzonderlijk bijgehouden deltalink.
* `group_filter_regex` beperkt welke groepen worden gesynchroniseerd, getoetst aan de weergavenaam van de groep.
* **Elke run wist eerst alle bestaande leden van de overeenkomende Chamilo-klasse**, en schrijft daarna opnieuw in wie Graph op dat moment teruggeeft. Leden worden alleen gekoppeld aan *bestaande* Chamilo-gebruikers, met dezelfde [accountkoppelingslogica](#matching-logins-to-existing-chamilo-accounts) als bij aanmelding — dit commando maakt nooit nieuwe gebruikersaccounts aan, en elk groeps lid dat niet aan een bestaand Chamilo-account kan worden gekoppeld, wordt stilzwijgend overgeslagen.

## Bekende beperkingen

* **Geen single logout.** Afmelden bij Chamilo meldt de gebruiker niet af bij Entra ID of andere gekoppelde toepassingen. Er bestaat een configuratiesleutel `force_logout` in `authentication.yaml`, maar die is momenteel niet geïmplementeerd — behandel deze als gereserveerd, niet als functioneel.
* **Wachtwoordherstel is zinloos voor Azure-accounts.** Omdat authenticatie volledig via Entra ID verloopt, onderhoudt Chamilo geen bruikbaar lokaal wachtwoord voor deze accounts.

## Probleemoplossing

* Aanmeldfouten (ontbrekende vereiste attributen, Graph API-fouten) worden aan de gebruiker getoond als een flashbericht op de aanmeldpagina.
* De synchronisatiecommando's loggen problemen per record met waarschuwingen en gaan door met de rest van de batch in plaats van bij de eerste fout te stoppen — controleer de console-uitvoer van het commando (of waar uw cron die vastlegt) na elke run.
* Houd het standaard Chamilo-aanmeldformulier ingeschakeld, zodat beheerders altijd een toegangsweg hebben als de Entra ID-integratie niet goed werkt.