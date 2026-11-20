# Brukeroppretting

`POST /api/access_urls/{id}/user` oppretter en plattformbruker og legger vedkommende til i tilgangs-URL-en `{id}`. Det er Chamilo 3-erstatningen for handlingen `save_user_json` i webtjenesten `webservices/api/v2.php` fra 1.11.x, og er ment for integrasjoner som oppretter elevkontoer (nettbutikker, HR-systemer, påmeldingsportaler).

## Tilgang

| Anroper | Tillatt |
|--------|---------|
| `ROLE_ADMIN` | Ja |
| `ROLE_SESSION_MANAGER` | Ja |
| Alle andre | `403 Forbidden` |

Autentiser med en JWT eller en ekstern API-nøkkel, som beskrevet i [Autentisering](authentication.md).

## Forespørsel

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

| Felt | Obligatorisk | Beskrivelse |
|-------|----------|-------------|
| `username` | Ja | Påloggingsnavn for den nye brukeren. Må ikke allerede være i bruk av en annen konto (sammenlignes uten hensyn til store og små bokstaver). |
| `email` | Ja | En gyldig e-postadresse. Flere kontoer kan dele samme adresse, med mindre `checkEmailDuplicates` er `true`. |
| `firstname`, `lastname` | Nei | Fornavn og etternavn. |
| `password` | Nei | Innledende passord. Når det er tomt og `sendEmail` er `true`, inneholder e-posten i stedet en lenke for å angi et passord. |
| `locale` | Nei | Grensesnittspråk, f.eks. `fr_FR`. Standard er plattformspråket. |
| `timezone` | Nei | Standard er plattformens tidssone. |
| `status` | Nei | `5` (elev) som standard; `1` for en lærer. |
| `sendEmail` | Nei | `true` som standard. Sender brukeren en melding og en e-post med tilgangsdetaljene. |
| `checkEmailDuplicates` | Nei | `false` som standard. Når `true`, avvises forespørselen med `409 email_already_exists` hvis en konto allerede bruker denne e-postadressen (sammenlignes uten hensyn til store og små bokstaver). Samme oppførsel som parameteren `check_email_duplicates` i `save_user_json`. |
| `extraFields` | Nei | Verdier for brukerens tilleggsfelt, nøklet etter feltets variabel. Hver variabel må være et eksisterende tilleggsfelt for brukere. |

### Delte e-postadresser

Chamilo krever ikke at e-postadresser er unike: administratorens skjema for brukeroppretting godtar en adresse som en annen konto allerede bruker, brukerimporten avviser den bare når alternativet **Kontroller unik e-post** er avkrysset, og det finnes ingen plattforminnstilling som endrer dette. Et vanlig tilfelle er en elev som meldes på på nytt under en ny identifikator og beholder samme adresse. Send `checkEmailDuplicates: true` bare når integrasjonen din skal behandle en eksisterende adresse som en feil.

Når innstillingen **Pålogging er e-post** er aktivert, er brukernavnet e-postadressen, så brukernavnkontrollen avviser allerede duplikater.

## Svar

`201 Created` med den nye brukeren (serialiseringsgruppen `user:read`), inkludert dens `id`.

## Feil

| Status | Innhold | Når |
|--------|------|------|
| `401` | | Ingen eller ugyldige legitimasjonsopplysninger |
| `403` | | Anroperen er verken administrator eller øktadministrator |
| `409` | `{"error": "username_already_exists"}` | Brukernavnet er allerede i bruk |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` er `true` og e-postadressen er allerede i bruk |
| `422` | | Mangler `username` eller `email`, eller ugyldig e-postadresse |

## Implementering

* Operasjon: ressursen `AccessUrlUser` deklarert i `src/CoreBundle/Entity/User.php`
* Inndata: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Kontroller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Øktadministratorens side **Registrer student** (`/admin-dashboard/register/{courseId}`) bruker dette endepunktet med `checkEmailDuplicates: true`, slik at den advarer når adressen allerede er i bruk.