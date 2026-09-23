# OAuth2

OAuth2-autentisering konfigureras i `config/authentication.yaml`. Chamilo har inbyggt stöd för Azure AD, Keycloak, Facebook och valfri generell OAuth2-kompatibel leverantör.

## Step 1 — Register Chamilo in your identity provider

Skapa en applikation i leverantörens administratörspanel och ange **redirect URI** till:

```
https://your-chamilo-url/connect/<provider>/check
```

Där `<provider>` är `azure`, `keycloak`, `facebook` eller det namn du ger en generell leverantör. Notera **Client ID** och **Client Secret**.

## Step 2 — Configure authentication.yaml

Aktivera leverantören och ange dess uppgifter. Alla leverantörer delar dessa gemensamma nycklar:

| Key | Description |
|-----|-------------|
| `enabled` | `true` för att aktivera |
| `title` | Etikett som visas på inloggningsknappen |
| `client_id` | Från din identitetsleverantör |
| `client_secret` | Från din identitetsleverantör |
| `allow_create_new_users` | Skapa automatiskt ett Chamilo-konto vid första inloggningen |
| `allow_update_user_info` | Synkronisera användardata vid varje inloggning |
| `force_as_login_method` | Dölj de övriga metoderna och visa endast denna leverantörs knapp |
| `force_redirect` | Skicka en anonym besökare till denna leverantör automatiskt, utan någon knapp att klicka på |
| `skip_force_redirect_in` | Lista över URL-fragment som `force_redirect` lämnar orörda |

### Azure AD (Microsoft Entra ID)

Azure har en egen dedikerad sida som täcker appregistrering, grupbaserad rollmappning, certifikatautentisering och kommandona för synkronisering av kontoprovisionering — se [Azure Entra ID](azure-entra-id.md).

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

Använd detta för Google, GitLab eller valfri OAuth2-kompatibel leverantör:

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

Fältmappning (hur leverantörsattribut mappas till Chamilos `firstname`, `lastname`, `email` med mera) och rollmappning är också konfigurerbara. Se [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) för den fullständiga listan över mappningsnycklar.

## Optional — Send every visitor to the provider automatically

Två nycklar styr hur mycket av inloggningssidan en besökare fortfarande ser. De är oberoende av varandra och svarar mot olika behov:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | Inloggningssidan, reducerad till denna leverantörs knapp. Besökaren klickar på den. |
| `force_redirect: true` | Ingen inloggningssida alls. Webbläsaren går till leverantören av sig själv. |

Använd `force_redirect` när identitetsleverantören äger varje konto och det lokala inloggningsformuläret saknar syfte:

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

Endast en leverantör kan tvinga omdirigeringen. Om flera deklarerar den vinner den första aktiverade. LDAP kan inte deklarera den, eftersom autentiseringen sker via det lokala formuläret.

Omdirigeringen gäller en sida som webbläsaren visar, och ingenting annat. Dessa begäranden stannar alltid där de är:

* Ett API-, SCIM-, MCP- eller XHR-anrop, som inte kan följa en handskakning avsedd för en webbläsare.
* En bild, ett formatmall eller en filnedladdning.
* All skrivning (POST, PUT, DELETE), eftersom en webbläsare spelar upp en omdirigerad skrivning som GET och släpper kroppen.
* Leverantörens egen handskakning (`/connect/...`) och `/logout`, som annars skulle skapa en oändlig loop.
* En besökare som redan har en session, inklusive det anonyma kontot för en publik kurs.

Lägg till ett URL-fragment i `skip_force_redirect_in` för varje publikt område som måste förbli öppet, till exempel en kurskatalog.

### Nödutgången

En oåtkomlig leverantör skulle låsa ute alla konton, inklusive den lokala administratören. Lägg till `skipForcedRedirect=1` till valfri URL för att ändå nå det lokala inloggningsformuläret:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Valet sparas i sessionen, så de efterföljande sidorna fortsätter att visa formuläret. Det avbryter också `force_as_login_method` för den sessionen, vilket gör att alla inloggningsmetoder visas på sidan igen. För att lämna tillbaka plattformen till leverantören, använd `?skipForcedRedirect=0`, eller stäng webbläsarsessionen.

Parametern tillhör enbart `force_redirect`. Så länge ingen leverantör deklarerar den nyckeln gör parametern ingenting alls, och `force_as_login_method` behåller sin enda knapp.

Spara den här URL:en tillsammans med dina återställningsanteckningar. Testa den innan du aktiverar `force_redirect` i produktion.

## Steg 3 — Rensa cache och testa

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Logga ut från Chamilo. Den konfigurerade leverantörens knapp ska visas på inloggningssidan. Testa med ett dedikerat konto innan du rullar ut till alla användare.

## Tips

* Behåll det vanliga inloggningsformuläret aktiverat så att administratörer alltid kan logga in om OAuth2 har problem. Om du sätter `force_redirect`, lär dig URL:en `?skipForcedRedirect=1` i stället: det är det enda sättet tillbaka till det formuläret.
* Rolltilldelning är som standard student; använd gruppmappning (Azure) för att automatiskt höja användare till lärar- eller administratörsroller — se [Azure Entra ID](azure-entra-id.md) för detaljer om det och om att matcha inkommande användare mot befintliga konton.