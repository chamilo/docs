# SSO-konfiguration

Den här sidan behandlar ämnen som gäller oberoende av autentiseringsmetod.

## Flera leverantörer

Du kan aktivera mer än en autentiseringsmetod samtidigt. Varje aktiverad leverantör visar en egen knapp på inloggningssidan tillsammans med det vanliga formuläret för användarnamn/lösenord. Användare väljer den metod de föredrar.

Behåll det vanliga formuläret aktiverat så att plattformsadministratörer alltid kan logga in, även om en extern leverantör är felkonfigurerad.

## Autentiseringsprioritet

När flera metoder är aktiva kontrollerar systemet inloggningsuppgifter i följande ordning:

1. LDAP (om `force_as_login_method` är inställt)
2. OAuth2-leverantörer (i den ordning de förekommer i `authentication.yaml`)
3. Intern Chamilo-databas

## JWT-token för API-åtkomst

Chamilo använder JWT (JSON Web Tokens) för sitt REST API. Tokenlivslängd och uppdateringsbeteende konfigureras i `config/packages/lexik_jwt_authentication.yaml`. Detta är skilt från SSO-inloggningsflödet och gäller endast API-klienter.

## Felsökning

### Inloggningsknappen visas inte efter konfiguration

Cachen måste rensas efter varje ändring av `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Användare kan inte logga in via SSO

* **Avvikelse i omdirigerings-URI** — Den URI som är registrerad hos din identitetsleverantör måste exakt matcha `https://your-chamilo-url/connect/<provider>/check`.
* **Klockavvikelse** — SSO-token är tidskänsliga. Se till att serverns klocka är synkroniserad (NTP).
* **SSL-certifikat** — Chamilo måste lita på identitetsleverantörens certifikat. Kontrollera problem med självsignerade certifikat.
* **Loggar** — Granska `var/log/` och identitetsleverantörens loggar efter specifika felmeddelanden.

### Användare skapas med fel roll

Kontrollera rollmappningskonfigurationen för leverantören. Nya användare får som standard studentrollen om inte en grupp- eller attributmappning höjer dem.

### Användare finns hos leverantören men kan inte komma åt Chamilo

* Om `allow_create_new_users` är false måste användaren redan ha ett Chamilo-konto vars e-postadress eller användarnamn matchar leverantörens data.
* Kontrollera att användaren inte är inaktiverad i Chamilo.
* För Azure, granska `existing_user_verification_order` för att förstå hur Chamilo matchar inkommande användare mot befintliga konton.