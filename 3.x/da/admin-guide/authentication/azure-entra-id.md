# Azure Entra ID

Microsoft omdøbte Azure Active Directory (Azure AD) til **Microsoft Entra ID** i 2023 — det er den samme tjeneste, og Chamilos kode og konfiguration refererer stadig til den som `azure`. Denne side dækker de Azure-specifikke dele af integrationen: appregistring, gruppebaseret rollemapping, certifikatautentificering og de dedikerede synkroniseringskommandoer til brugere/grupper. For de konfigurationsnøgler, der er fælles for alle udbydere (`enabled`, `title`, `allow_create_new_users` osv.), og den generelle struktur i `authentication.yaml`, se [OAuth2](oauth2.md).

## Registrering af Chamilo i Microsoft Entra ID

1. Opret en **App registration** til Chamilo i Entra-administrationscentret.
2. Angiv omdirigerings-URI'en (platformtype **Web**) til:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Notér **Application (client) ID** og **Directory (tenant) ID** — du skal bruge begge.
4. Under **Certificates & secrets** skal du enten oprette en klienthemmelighed eller uploade et certifikat (se [Certifikatautentificering](#certificate-authentication) nedenfor).
5. Under **API permissions** skal du tilføje Microsoft Graph-tilladelserne nedenfor og give administratorsamtykke.

| Tilladelse | Type | Nødvendig til |
|------------|------|-------------|
| `User.Read` | Delegated | Grundlæggende login |
| `GroupMember.Read.All` | Delegated | Gruppebaseret rollemapping ved login |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` eller `Group.Read.All` | Application | `app:azure-sync-users` og `app:azure-sync-usergroups` |

Application-tilladelser kræver administratorsamtykke og bruges kun af synkroniseringskonsolkommandoerne (via grant-typen `client_credentials`), aldrig af en interaktiv brugers login.

## Grundlæggende konfiguration

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

### Multi-tenant vs. single-tenant

Værdien `tenant` skal svare til, hvordan appregistringens "supported account types" blev angivet:

* En specifik tenant-GUID — single-tenant, kun den organisations konti kan logge ind
* `organizations` — enhver Entra ID-tenant
* `common` — enhver Entra ID-tenant plus personlige Microsoft-konti

## Påkrævede brugerattributter

Enhver Entra ID-bruger, der skal logge ind i Chamilo, skal have `mail` og `mailNickname` udfyldt — login kaster en fejl, hvis en af dem er tom (sammen med det uforanderlige Entra-objekt-ID, som altid er til stede). Feltmapping fra Microsoft Graph til Chamilo er **fast** for Azure (i modsætning til den generiske OAuth2-udbyder, som lader dig konfigurere feltmapping):

| Chamilo-felt | Microsoft Graph-kilde |
|---------------|------------------------|
| Fornavn | `givenName` |
| Efternavn | `surname` |
| E-mail | `mail` |
| Brugernavn | `userPrincipalName` |
| Telefon | `telephoneNumber`, derefter `businessPhones[0]`, derefter `mobilePhone` |
| Aktiv | `accountEnabled` |
| Grænsefladesprog | `preferredLanguage` (matchet til et installeret Chamilo-sprog, med tilbagefald til platformens standard) |

Tre ekstra felter skrives også ved hvert vellykket login: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) og `azure_uid` (= Entra-objekt-ID'et). Disse understøtter kontomatchningslogikken nedenfor.

## Matchning af logins til eksisterende Chamilo-konti

Angiv `existing_user_verification_order` til en kommasepareret liste af cifrene `1`–`3` for at styre, hvordan et indkommende Entra ID-login matches til en eksisterende Chamilo-konto:

| Værdi | Matcher mod |
|-------|------------------|
| `1` | Ekstra felt `organisationemail` == Entra `mail` |
| `2` | Ekstra felt `azure_id` == Entra `mailNickname` |
| `3` | Ekstra felt `azure_uid` == Entra-objekt-ID |

Positionerne afprøves i den angivne rækkefølge; det første aktive (ikke blødt slettede) match vinder. En ugyldig eller tom værdi falder tilbage til `1,2,3`. Hvis ingen af de konfigurerede positioner matcher — hvilket altid er tilfældet første gang en given bruger logger ind, da disse ekstra felter kun udfyldes *efter* et vellykket login — falder Chamilo tilbage til at matche Chamilos eget `email`-felt mod Entra `mail`, derefter `username` mod `userPrincipalName`, uanset hvad du har konfigureret.

## Gruppebaseret rolletilknytning

Tilknyt Entra ID-sikkerhedsgrupper til Chamilo-roller med deres Object ID'er (GUID'er):

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

Ved hvert login kalder Chamilo Microsoft Graph `/v1.0/me/memberOf` med brugerens eget access token og sammenholder de returnerede grupper med disse tre ID'er, i rækkefølgen **admin → session_admin → teacher**. Det første match vinder — en bruger, der er i både admin- og teacher-gruppen, ophøjes kun til admin. Alle, der ikke er i nogen konfigureret gruppe, beholder deres eksisterende rolle (eller standardrollen student ved første login). Dette kræver den delegerede tilladelse `GroupMember.Read.All`, der er anført ovenfor.

## Certifikatautentificering

Som et alternativ til `client_secret` kan du autentificere med et certifikat i stedet:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Upload det tilsvarende offentlige certifikat under **Certificates & secrets** i appregistreringen, og kopiér dets thumbprint (vist i hex i portalen) til `client_certificate_thumbprint`. Når begge nøgler er sat, opbygger Chamilo en signeret JWT-klientassertion (RS256) i stedet for at sende `client_secret` — dette gælder både interaktive logins og synkroniseringskommandoernes app-only-autentificering.

## Synkronisering af brugere og grupper fra Entra ID

To konsolkommandoer opretter og vedligeholder Chamilo-konti direkte fra Entra ID, uafhængigt af om nogen logger ind interaktivt. Begge autentificerer app-only (`client_credentials`), så de har brug for de **application**-Graph-tilladelser, der er anført ovenfor, og begge er beregnet til at blive planlagt i cron frem for at køre manuelt.

### `app:azure-sync-users`

Henter brugere fra Microsoft Graph og opretter/opdaterer de tilsvarende Chamilo-konti med samme feltmapping og kontomatchningslogik som ved et interaktivt login.

* Som standard hentes den fulde brugerliste (`/v1.0/users`, pagineret). Sæt `script_users_delta: true` for i stedet at bruge `/v1.0/users/delta` — Chamilo gemmer delta-linket mellem kørsler, så efterfølgende kørsler kun henter det, der er ændret.
* Sæt `deactivate_nonexisting_users: true` for at deaktivere Chamilo-konti (med auth-kilde Azure), der ikke længere vises i Entra ID-hentningen. Dette virker kun i fuld-hentningstilstand — delta-tilstand returnerer aldrig den komplette brugerliste, så denne indstilling ignoreres, når `script_users_delta` er aktiveret.
* Grupperolletilknytning (ovenfor) genanvendes for hver synkroniseret bruger under denne kørsel, ikke kun ved login.

### `app:azure-sync-usergroups`

Henter Entra ID-grupper og spejler dem som Chamilo-klasser (`Usergroup`).

* Henter den fulde gruppeliste (`/v1.0/groups`) eller, med `script_usergroups_delta: true`, delta-endepunktet, med sit eget separat sporede delta-link.
* `group_filter_regex` begrænser, hvilke grupper der synkroniseres, matchet mod gruppens visningsnavn.
* **Hver kørsel rydder først alle eksisterende medlemmer af den matchende Chamilo-klasse**, og tilmelder derefter de medlemmer, Graph aktuelt returnerer. Medlemmer matches kun til *eksisterende* Chamilo-brugere med samme [kontomatchningslogik](#matching-logins-to-existing-chamilo-accounts) som ved login — denne kommando opretter aldrig nye brugerkonti, og ethvert gruppemedlem, den ikke kan matche til en eksisterende Chamilo-konto, springes stille over.

## Kendte begrænsninger

* **Ingen enkelt logout.** Når man logger ud af Chamilo, logges brugeren ikke ud af Entra ID eller andre tilknyttede applikationer. Der findes en konfigurationsnøgle `force_logout` i `authentication.yaml`, men den er ikke implementeret i øjeblikket — betragt den som reserveret, ikke funktionel.
* **Nulstilling af adgangskode er meningsløs for Azure-konti.** Da autentificering sker udelukkende via Entra ID, vedligeholder Chamilo ikke en brugbar lokal adgangskode for disse konti.

## Fejlfinding

* Loginfejl (manglende påkrævede attributter, Graph API-fejl) vises for brugeren som en flash-besked på login-siden.
* Synkroniseringskommandoerne logger problemer pr. post med advarsler og fortsætter med at behandle resten af batchen i stedet for at afbryde ved den første fejl — tjek kommandoens konsoloutput (eller hvor din cron fanger det) efter hver kørsel.
* Hold den almindelige Chamilo-loginformular aktiveret, så administratorer altid har en vej ind, hvis Entra ID-integrationen opfører sig forkert.