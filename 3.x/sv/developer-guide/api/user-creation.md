# Skapa användare

`POST /api/access_urls/{id}/user` skapar en plattformsanvändare och lägger till dem på åtkomst-URL:en `{id}`. Det är Chamilo 3-ersättningen för åtgärden `save_user_json` i webbtjänsten `webservices/api/v2.php` i 1.11.x, och är avsett för integrationer som skapar elevkonton (butiker, HR-system, registreringsportaler).

## Åtkomst

| Anropare | Tillåtet |
|--------|---------|
| `ROLE_ADMIN` | Ja |
| `ROLE_SESSION_MANAGER` | Ja |
| Alla andra | `403 Forbidden` |

Autentisera med en JWT eller en extern API-nyckel, enligt beskrivningen i [Autentisering](authentication.md).

## Begäran

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

| Fält | Obligatoriskt | Beskrivning |
|-------|----------|-------------|
| `username` | Ja | Inloggningsnamn för den nya användaren. Får inte redan användas av ett annat konto (jämförelsen är skiftlägesokänslig). |
| `email` | Ja | En giltig e-postadress. Flera konton kan dela samma adress, om inte `checkEmailDuplicates` är `true`. |
| `firstname`, `lastname` | Nej | För- och efternamn. |
| `password` | Nej | Ursprungligt lösenord. När det är tomt och `sendEmail` är `true` innehåller e-postmeddelandet i stället en länk för att ange ett lösenord. |
| `locale` | Nej | Gränssnittsspråk, t.ex. `fr_FR`. Standard är plattformens språk. |
| `timezone` | Nej | Standard är plattformens tidszon. |
| `status` | Nej | `5` (elev) som standard; `1` för en lärare. |
| `sendEmail` | Nej | `true` som standard. Skickar ett meddelande och ett e-postmeddelande till användaren med dennes åtkomstuppgifter. |
| `checkEmailDuplicates` | Nej | `false` som standard. När värdet är `true` avvisas begäran med `409 email_already_exists` om något konto redan använder denna e-postadress (jämförelsen är skiftlägesokänslig). Samma beteende som parametern `check_email_duplicates` i `save_user_json`. |
| `extraFields` | Nej | Värden för användarens extrafält, nycklade efter fältets variabel. Varje variabel måste vara ett befintligt extrafält för användare. |

### Delade e-postadresser

Chamilo kräver inte att e-postadresser är unika: administratörens formulär för att skapa användare accepterar en adress som ett annat konto redan använder, användarimporten avvisar den endast när alternativet **Kontrollera unik e-post** är markerat, och det finns ingen plattformsinställning för att ändra detta. Ett vanligt fall är en elev som registreras på nytt under en ny identifierare men behåller samma adress. Skicka `checkEmailDuplicates: true` endast när din integration ska behandla en befintlig adress som ett fel.

När inställningen **Inloggning är e-post** är aktiverad är användarnamnet e-postadressen, så kontrollen av användarnamnet avvisar redan dubbletter.

## Svar

`201 Created` med den nya användaren (serialiseringsgruppen `user:read`), inklusive dess `id`.

## Fel

| Status | Innehåll | När |
|--------|------|------|
| `401` | | Inga eller ogiltiga autentiseringsuppgifter |
| `403` | | Anroparen är varken administratör eller sessionsadministratör |
| `409` | `{"error": "username_already_exists"}` | Användarnamnet används redan |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` är `true` och e-postadressen används redan |
| `422` | | `username` eller `email` saknas, eller ogiltig e-postadress |

## Implementering

* Operation: resursen `AccessUrlUser` som deklareras i `src/CoreBundle/Entity/User.php`
* Indata: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Styrenhet: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Sessionsadministratörens sida **Registrera student** (`/admin-dashboard/register/{courseId}`) använder denna slutpunkt med `checkEmailDuplicates: true`, så den varnar när adressen redan används.