# Brugeroprettelse

`POST /api/access_urls/{id}/user` opretter en platformbruger og tilføjer vedkommende til adgangs-URL'en `{id}`. Det er Chamilo 3-erstatningen for `save_user_json`-handlingen i 1.11.x-webservice'en `webservices/api/v2.php` og er beregnet til integrationer, der opretter kursistkonti (webshops, HR-systemer, tilmeldingsportaler).

## Adgang

| Kalder | Tilladt |
|--------|---------|
| `ROLE_ADMIN` | Ja |
| `ROLE_SESSION_MANAGER` | Ja |
| Alle andre | `403 Forbidden` |

Godkend med en JWT eller en ekstern API-nøgle, som beskrevet i [Godkendelse](authentication.md).

## Anmodning

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Felt | Påkrævet | Beskrivelse |
|-------|----------|-------------|
| `username` | Ja | Login for den nye bruger. Må ikke allerede være brugt af en anden konto (sammenlignes uden hensyntagen til store og små bogstaver). |
| `email` | Ja | En gyldig e-mailadresse. Flere konti kan dele den samme adresse, medmindre `checkEmailDuplicates` er `true`. |
| `firstname`, `lastname` | Nej | For- og efternavn. |
| `password` | Nej | Indledende adgangskode. Når den er tom, og `sendEmail` er `true`, indeholder e-mailen i stedet et link til at angive en adgangskode. |
| `locale` | Nej | Grænsefladesprog, f.eks. `fr_FR`. Standard er platformens sprog. |
| `timezone` | Nej | Standard er platformens tidszone. |
| `status` | Nej | `5` (kursist) som standard; `1` for en underviser. |
| `sendEmail` | Nej | `true` som standard. Sender brugeren en besked og en e-mail med vedkommendes adgangsoplysninger. |
| `checkEmailDuplicates` | Nej | `false` som standard. Når `true`, afvises anmodningen med `409 email_already_exists`, hvis en konto allerede bruger denne e-mailadresse (sammenlignes uden hensyntagen til store og små bogstaver). Samme adfærd som parameteren `check_email_duplicates` i `save_user_json`. |
| `extraFields` | Nej | Værdier for brugerens ekstra felter, nøgleindekseret efter feltets variabel. Hver variabel skal være et eksisterende ekstra brugerfelt. |

### Delte e-mailadresser

Chamilo kræver ikke, at e-mailadresser er unikke: administratorens formular til brugeroprettelse accepterer en adresse, som en anden konto allerede bruger, brugerimporten afviser den kun, når indstillingen **Kontrollér unik e-mail** er markeret, og der findes ingen platformsindstilling til at ændre dette. Et almindeligt tilfælde er en kursist, der genindskrives under en ny identifikator og beholder den samme adresse. Send kun `checkEmailDuplicates: true`, når din integration vil behandle en eksisterende adresse som en fejl.

Når indstillingen **Login er e-mail** er aktiveret, er brugernavnet e-mailadressen, så brugernavnskontrollen allerede afviser dubletter.

## Svar

`201 Created` med den nye bruger (serialiseringsgruppen `user:read`), inklusive dens `id`.

## Fejl

| Status | Brødtekst | Hvornår |
|--------|------|------|
| `401` | | Ingen eller ugyldige legitimationsoplysninger |
| `403` | | Kalderen er hverken administrator eller sessionsadministrator |
| `409` | `{"error": "username_already_exists"}` | Brugernavnet er allerede i brug |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` er `true`, og e-mailadressen er allerede i brug |
| `422` | | Manglende `username` eller `email`, eller ugyldig e-mailadresse |

## Implementering

* Operation: ressourcen `AccessUrlUser`, der er erklæret i `src/CoreBundle/Entity/User.php`
* Input: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Sessionsadministratorens side **Registrer studerende** (`/admin-dashboard/register/{courseId}`) bruger dette endpoint med `checkEmailDuplicates: true`, så den advarer, når adressen allerede er i brug.