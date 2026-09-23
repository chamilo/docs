# Azure Entra ID

Microsoft omdøpte Azure Active Directory (Azure AD) til **Microsoft Entra ID** i 2023 — det er samme tjeneste, og Chamilos kode og konfigurasjon refererer fortsatt til den som `azure`. Denne siden dekker de Azure-spesifikke delene av integrasjonen: appregistrering, gruppebasert rolletilordning, sertifikatautentisering og de dedikerte synkroniseringskommandoene for brukere/grupper. For konfigurasjonsnøklene som er felles for alle leverandører (`enabled`, `title`, `allow_create_new_users` og så videre) og den generelle strukturen i `authentication.yaml`, se [OAuth2](oauth2.md).

## Registrere Chamilo i Microsoft Entra ID

1. I Entra-administrasjonssenteret oppretter du en **App registration** for Chamilo.
2. Sett omdirigerings-URI (plattformtype **Web**) til:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Noter **Application (client) ID** og **Directory (tenant) ID** — du trenger begge.
4. Under **Certificates & secrets** oppretter du enten en klienthemmelighet eller laster opp et sertifikat (se [Sertifikatautentisering](#certificate-authentication) nedenfor).
5. Under **API permissions** legger du til Microsoft Graph-tillatelsene nedenfor og gir administratorsamtykke.

| Tillatelse | Type | Nødvendig for |
|------------|------|-------------|
| `User.Read` | Delegated | Grunnleggende innlogging |
| `GroupMember.Read.All` | Delegated | Gruppebasert rolletilordning ved innlogging |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` eller `Group.Read.All` | Application | `app:azure-sync-users` og `app:azure-sync-usergroups` |

Application-tillatelser krever administratorsamtykke og brukes kun av synkroniseringskommandoene i konsollen (via `client_credentials`-grant), aldri av en interaktiv brukers innlogging.

## Grunnleggende konfigurasjon

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

### Flerleietaker kontra énleietaker

Verdien `tenant` må samsvare med hvordan appregistreringens «supported account types» ble satt:

* En spesifikk leietaker-GUID — énleietaker, kun den organisasjonens kontoer kan logge inn
* `organizations` — hvilken som helst Entra ID-leietaker
* `common` — hvilken som helst Entra ID-leietaker pluss personlige Microsoft-kontoer

## Påkrevde brukerattributter

Hver Entra ID-bruker som skal logge inn i Chamilo, må ha `mail` og `mailNickname` utfylt — innlogging gir feil hvis en av dem er tom (sammen med den uforanderlige Entra-objekt-ID-en, som alltid er til stede). Feltkartlegging fra Microsoft Graph til Chamilo er **fast** for Azure (i motsetning til den generiske OAuth2-leverandøren, som lar deg konfigurere feltkartlegging):

| Chamilo-felt | Microsoft Graph-kilde |
|---------------|------------------------|
| Fornavn | `givenName` |
| Etternavn | `surname` |
| E-post | `mail` |
| Brukernavn | `userPrincipalName` |
| Telefon | `telephoneNumber`, deretter `businessPhones[0]`, deretter `mobilePhone` |
| Aktiv | `accountEnabled` |
| Grensesnittspråk | `preferredLanguage` (tilordnet et installert Chamilo-språk, med plattformens standard som reserve) |

Tre ekstra felt skrives også ved hver vellykkede innlogging: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) og `azure_uid` (= Entra-objekt-ID-en). Disse understøtter kontotilpasningslogikken nedenfor.

## Tilpasse innlogginger til eksisterende Chamilo-kontoer

Sett `existing_user_verification_order` til en kommaseparert liste av sifrene `1`–`3` for å styre hvordan en innkommende Entra ID-innlogging tilpasses en eksisterende Chamilo-konto:

| Verdi | Matcher mot |
|-------|------------------|
| `1` | Ekstra felt `organisationemail` == Entra `mail` |
| `2` | Ekstra felt `azure_id` == Entra `mailNickname` |
| `3` | Ekstra felt `azure_uid` == Entra-objekt-ID |

Posisjonene prøves i den oppgitte rekkefølgen; den første aktive (ikke mykt slettede) treffen vinner. En ugyldig eller tom verdi faller tilbake til `1,2,3`. Hvis ingen av de konfigurerte posisjonene treffer — som alltid er tilfellet første gang en gitt bruker logger inn, siden disse ekstra feltene bare fylles ut *etter* en vellykket innlogging — faller Chamilo tilbake til å matche Chamilos eget `email`-felt mot Entra `mail`, deretter `username` mot `userPrincipalName`, uavhengig av hva du har konfigurert.

## Rollekartlegging basert på grupper

Knytt Entra ID-sikkerhetsgrupper til Chamilo-roller ved hjelp av Object ID-ene deres (GUID-er):

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

Ved hver innlogging kaller Chamilo Microsoft Graph `/v1.0/me/memberOf` med brukerens eget tilgangstoken og sjekker de returnerte gruppene mot disse tre ID-ene, i rekkefølgen **admin → session_admin → teacher**. Første treff vinner — en bruker som er med i både admin- og teacher-gruppen, blir kun hevet til admin. Alle som ikke er med i noen konfigurert gruppe, beholder den eksisterende rollen (eller standard studentrolle ved første innlogging). Dette krever den delegerte tillatelsen `GroupMember.Read.All` som er oppført ovenfor.

## Sertifikatautentisering

Som et alternativ til `client_secret` kan du autentisere med et sertifikat i stedet:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Last opp det tilhørende offentlige sertifikatet under **Certificates & secrets** i appregistreringen, og kopier tommelavtrykket (vist i heksadesimal i portalen) inn i `client_certificate_thumbprint`. Når begge nøklene er satt, bygger Chamilo en signert JWT-klientpåstand (RS256) i stedet for å sende `client_secret` — dette gjelder både interaktive innlogginger og app-only-autentiseringen til synkroniseringskommandoene.

## Synkronisering av brukere og grupper fra Entra ID

To konsollkommandoer oppretter og vedlikeholder Chamilo-kontoer direkte fra Entra ID, uavhengig av om noen logger inn interaktivt. Begge autentiserer app-only (`client_credentials`), så de trenger **application**-Graph-tillatelsene som er oppført ovenfor, og begge er ment å kjøres i cron i stedet for manuelt.

### `app:azure-sync-users`

Henter brukere fra Microsoft Graph og oppretter/oppdaterer de tilsvarende Chamilo-kontoene med samme feltkartlegging og kontotilpasningslogikk som ved interaktiv innlogging.

* Som standard hentes hele brukerlisten (`/v1.0/users`, paginert). Sett `script_users_delta: true` for å bruke `/v1.0/users/delta` i stedet — Chamilo lagrer delta-lenken mellom kjøringer, slik at senere kjøringer bare henter det som er endret.
* Sett `deactivate_nonexisting_users: true` for å deaktivere Chamilo-kontoer (med autentiseringskilde Azure) som ikke lenger vises i Entra ID-henting. Dette fungerer bare i full-hentingsmodus — deltamodus returnerer aldri den komplette brukerlisten, så denne innstillingen ignoreres når `script_users_delta` er aktivert.
* Gruppe-rollekartlegging (ovenfor) brukes på nytt for hver synkroniserte bruker under denne kjøringen, ikke bare ved innlogging.

### `app:azure-sync-usergroups`

Henter Entra ID-grupper og speiler dem som Chamilo-klasser (`Usergroup`).

* Henter hele gruppelisten (`/v1.0/groups`) eller, med `script_usergroups_delta: true`, delta-endepunktet, med en egen separat sporet delta-lenke.
* `group_filter_regex` begrenser hvilke grupper som synkroniseres, matchet mot gruppens visningsnavn.
* **Hver kjøring tømmer først alle eksisterende medlemmer av den tilsvarende Chamilo-klassen**, og abonnerer deretter på nytt de medlemmene Graph for øyeblikket returnerer. Medlemmer matches kun mot *eksisterende* Chamilo-brukere, med samme [kontotilpasningslogikk](#matching-logins-to-existing-chamilo-accounts) som ved innlogging — denne kommandoen oppretter aldri nye brukerkontoer, og ethvert gruppemedlem som ikke kan matches mot en eksisterende Chamilo-konto, hoppes stille over.

## Kjente begrensninger

* **Ingen enkelt utlogging.** Å logge ut av Chamilo logger ikke brukeren ut av Entra ID eller andre tilkoblede applikasjoner. En konfigurasjonsnøkkel `force_logout` finnes i `authentication.yaml`, men er foreløpig ikke implementert — behandle den som reservert, ikke funksjonell.
* **Passordtilbakestilling er meningsløs for Azure-kontoer.** Siden autentiseringen skjer helt gjennom Entra ID, vedlikeholder ikke Chamilo et brukbart lokalt passord for disse kontoene.

## Feilsøking

* Innloggingsfeil (manglende påkrevde attributter, Graph API-feil) vises for brukeren som en flash-melding på innloggingssiden.
* Synkroniseringskommandoene logger problemer per post med advarsler og fortsetter å behandle resten av batchen i stedet for å avbryte ved første feil — sjekk kommandoens konsollutdata (eller der cronen din fanger det) etter hver kjøring.
* Hold det vanlige Chamilo-innloggingsskjemaet aktivert, slik at administratorer alltid har en vei inn hvis Entra ID-integrasjonen oppfører seg feil.