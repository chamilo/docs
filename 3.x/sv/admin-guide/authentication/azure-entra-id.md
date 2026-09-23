# Azure Entra ID

Microsoft bytte namn på Azure Active Directory (Azure AD) till **Microsoft Entra ID** 2023 — det är samma tjänst, och Chamilos kod och konfiguration refererar fortfarande till den som `azure`. Den här sidan täcker de Azure-specifika delarna av integrationen: appregistrering, grupbaserad rollmappning, certifikatautentisering och de dedikerade synkroniseringskommandona för användare/grupper. För de konfigurationsnycklar som delas av varje leverantör (`enabled`, `title`, `allow_create_new_users` och så vidare) och den allmänna strukturen för `authentication.yaml`, se [OAuth2](oauth2.md).

## Registrera Chamilo i Microsoft Entra ID

1. I Entra-administrationscentret, skapa en **App registration** för Chamilo.
2. Ange omdirigerings-URI (plattformstyp **Web**) till:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Notera **Application (client) ID** och **Directory (tenant) ID** — du kommer att behöva båda.
4. Under **Certificates & secrets**, skapa antingen en klienthemlighet eller ladda upp ett certifikat (se [Certifikatautentisering](#certificate-authentication) nedan).
5. Under **API permissions**, lägg till Microsoft Graph-behörigheterna nedan och bevilja administratörssamtycke.

| Behörighet | Typ | Behövs för |
|------------|------|-------------|
| `User.Read` | Delegated | Grundläggande inloggning |
| `GroupMember.Read.All` | Delegated | Grupbaserad rollmappning vid inloggning |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` eller `Group.Read.All` | Application | `app:azure-sync-users` och `app:azure-sync-usergroups` |

Programbehörigheter kräver administratörssamtycke och används endast av synkroniseringskommandona i konsolen (via grant-typen `client_credentials`), aldrig av en interaktiv användares inloggning.

## Grundläggande konfiguration

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

### Multi-tenant kontra single-tenant

Värdet `tenant` måste stämma överens med hur appregistreringens "supported account types" ställdes in:

* Ett specifikt tenant-GUID — single-tenant, endast den organisationens konton kan logga in
* `organizations` — valfri Entra ID-tenant
* `common` — valfri Entra ID-tenant plus personliga Microsoft-konton

## Obligatoriska användarattribut

Varje Entra ID-användare som behöver logga in i Chamilo måste ha `mail` och `mailNickname` ifyllda — inloggningen ger ett fel om något av dem är tomt (tillsammans med det oföränderliga Entra-objekt-ID:t, som alltid finns). Fältmappning från Microsoft Graph till Chamilo är **fast** för Azure (till skillnad från den generiska OAuth2-leverantören, som låter dig konfigurera fältmappning):

| Chamilo-fält | Microsoft Graph-källa |
|---------------|------------------------|
| Förnamn | `givenName` |
| Efternamn | `surname` |
| E-post | `mail` |
| Användarnamn | `userPrincipalName` |
| Telefon | `telephoneNumber`, därefter `businessPhones[0]`, därefter `mobilePhone` |
| Aktiv | `accountEnabled` |
| Gränssnittsspråk | `preferredLanguage` (matchas mot ett installerat Chamilo-språk, med plattformens standard som reserv) |

Tre extra fält skrivs också vid varje lyckad inloggning: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) och `azure_uid` (= Entra-objekt-ID:t). Dessa ligger till grund för kontomatchningslogiken nedan.

## Matcha inloggningar mot befintliga Chamilo-konton

Ange `existing_user_verification_order` till en kommaseparerad lista av siffrorna `1`–`3` för att styra hur en inkommande Entra ID-inloggning matchas mot ett befintligt Chamilo-konto:

| Värde | Matchar mot |
|-------|------------------|
| `1` | Extrafältet `organisationemail` == Entra `mail` |
| `2` | Extrafältet `azure_id` == Entra `mailNickname` |
| `3` | Extrafältet `azure_uid` == Entra-objekt-ID |

Positionerna prövas i den angivna ordningen; den första aktiva (inte mjukraderade) matchningen vinner. Ett ogiltigt eller tomt värde blir som standard `1,2,3`. Om ingen av de konfigurerade positionerna matchar — vilket alltid är fallet första gången en given användare loggar in, eftersom extrafälten endast fylls i *efter* en lyckad inloggning — faller Chamilo tillbaka på att matcha Chamilos eget `email`-fält mot Entra `mail`, därefter `username` mot `userPrincipalName`, oavsett vad du konfigurerade.

## Gruppbaserad rollmappning

Mappa Entra ID-säkerhetsgrupper till Chamilo-roller med deras Object ID:n (GUID:er):

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

Vid varje inloggning anropar Chamilo Microsoft Graph `/v1.0/me/memberOf` med användarens egen åtkomsttoken och jämför de returnerade grupperna mot dessa tre ID:n, i ordningen **admin → session_admin → teacher**. Första träffen vinner — en användare som ingår i både admin- och teacher-grupperna upphöjs endast till admin. Den som inte ingår i någon konfigurerad grupp behåller sin befintliga roll (eller standardrollen student vid första inloggningen). Detta kräver den delegerade behörigheten `GroupMember.Read.All` som anges ovan.

## Certifikatautentisering

Som ett alternativ till `client_secret` kan du autentisera med ett certifikat istället:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Ladda upp det matchande publika certifikatet under **Certificates & secrets** i appregistreringen och kopiera dess tumavtryck (visas i hex i portalen) till `client_certificate_thumbprint`. När båda nycklarna är satta bygger Chamilo en signerad JWT-klientassertion (RS256) istället för att skicka `client_secret` — detta gäller både interaktiva inloggningar och synkroniseringskommandonas app-only-autentisering.

## Synkronisering av användare och grupper från Entra ID

Två konsolkommandon provisionerar och underhåller Chamilo-konton direkt från Entra ID, oberoende av att någon loggar in interaktivt. Båda autentiserar app-only (`client_credentials`), så de behöver de **applikations**-Graph-behörigheter som anges ovan, och båda är avsedda att schemaläggas i cron snarare än att köras manuellt.

### `app:azure-sync-users`

Hämtar användare från Microsoft Graph och provisionerar/uppdaterar de matchande Chamilo-kontona med samma fältmappning och kontomatchningslogik som vid interaktiv inloggning.

* Som standard hämtas hela användarlistan (`/v1.0/users`, sidindelad). Sätt `script_users_delta: true` för att istället använda `/v1.0/users/delta` — Chamilo sparar deltalänken mellan körningar, så efterföljande körningar hämtar bara det som har ändrats.
* Sätt `deactivate_nonexisting_users: true` för att inaktivera Chamilo-konton (med autentiseringskälla Azure) som inte längre förekommer i Entra ID-hämtningen. Detta fungerar endast i full-pull-läge — deltaläge returnerar aldrig den kompletta användarlistan, så inställningen ignoreras när `script_users_delta` är aktiverat.
* Grupprollmappningen (ovan) tillämpas på nytt för varje synkroniserad användare under denna körning, inte bara vid inloggning.

### `app:azure-sync-usergroups`

Hämtar Entra ID-grupper och speglar dem som Chamilo-klasser (`Usergroup`).

* Hämtar hela grupplistan (`/v1.0/groups`) eller, med `script_usergroups_delta: true`, delta-ändpunkten, med en egen separat spårad deltalänk.
* `group_filter_regex` begränsar vilka grupper som synkroniseras, matchat mot gruppens visningsnamn.
* **Varje körning rensar först alla befintliga medlemmar i den matchande Chamilo-klassen**, och prenumererar sedan på de medlemmar som Graph för närvarande returnerar. Medlemmar matchas endast mot *befintliga* Chamilo-användare, med samma [kontomatchningslogik](#matching-logins-to-existing-chamilo-accounts) som vid inloggning — det här kommandot skapar aldrig nya användarkonton, och varje gruppmedlem som inte kan matchas mot ett befintligt Chamilo-konto hoppas över tyst.

## Kända begränsningar

* **Ingen enkel utloggning.** Att logga ut från Chamilo loggar inte ut användaren från Entra ID eller andra anslutna program. En konfigurationsnyckel `force_logout` finns i `authentication.yaml` men är för närvarande inte implementerad — behandla den som reserverad, inte funktionell.
* **Lösenordsåterställning saknar mening för Azure-konton.** Eftersom autentiseringen sker helt via Entra ID underhåller Chamilo inget användbart lokalt lösenord för dessa konton.

## Felsökning

* Inloggningsfel (saknade obligatoriska attribut, Graph API-fel) visas för användaren som ett flashmeddelande på inloggningssidan.
* Synkroniseringskommandona loggar problem per post med varningar och fortsätter att behandla resten av batchen istället för att avbryta vid första felet — kontrollera kommandots konsolutdata (eller var din cron fångar den) efter varje körning.
* Behåll det vanliga Chamilo-inloggningsformuläret aktiverat så att administratörer alltid har en väg in om Entra ID-integrationen beter sig fel.