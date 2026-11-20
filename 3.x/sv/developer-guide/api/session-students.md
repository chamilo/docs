# API för inskrivning av deltagare i sessioner

Integrationer kan lista, skriva in och ta bort deltagare i en session via slutpunkter som endast är tillgängliga för administratörer. Dessa åtgärder använder samma inskrivningsbeteende som Chamilo:s administrationsvyer. De är skilda från `/api/course-sessions/actions/*`, som hör till ett annat arbetsflöde avsett för handledare.

## Autentisering och åtkomst

Varje åtgärd nedan kräver autentisering med plattformsrollen `ROLE_ADMIN`. Att enbart vara sessionsadministratör ger **inte** åtkomst. Använd den autentiseringsmetod som beskrivs i [Autentisering](authentication.md).

I installationer med flera URL:er måste den begärda sessionen tillhöra den aktuella åtkomst-URL:en; annars svarar slutpunkten med `404`.

## Rutter

| Metod | Slutpunkt | Syfte |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Lista användar-ID:n för deltagare som är inskrivna i denna session |
| `POST` | `/api/sessions/{id}/students/subscribe` | Lägg till de angivna deltagarna och behåll befintliga deltagare |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Ta endast bort de angivna deltagarna |

Ersätt `{id}` med sessionens numeriska ID. För båda POST-begärandena skickas JSON som innehåller arrayen `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

En lyckad inskrivning ger ett svar med följande struktur; ID:n beror på din installation:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` innehåller nyligen inskrivna deltagare; `alreadyThere` innehåller deltagare som redan är inskrivna; `ignored` listar ogiltiga eller otillgängliga ID:n. Vid inskrivning skriver Chamilo även in de tillagda deltagarna i sessionens kurser. Den **ersätter inte** hela sessionslistan.

Så här granskar du medlemskap:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Så här tar du bort valda deltagare:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Svaret vid avregistrering innehåller `success`, `applied` (borttagna ID:n) och `ignored` (ID:n som inte var inskrivna). Övriga deltagare finns kvar i sessionen.

## Validering och begränsningar

* `userIds` måste vara en array med numeriska ID:n (heltal eller strängar som endast består av siffror). Upprepade ID:n avdupliceras; icke-positiva värden utelämnas.
* För inskrivning måste giltiga användare finnas, inte vara mjukraderade, inte vara anonyma eller HR-ansvariga, och tillhöra den aktuella åtkomst-URL:en.
* Saknad eller felaktig JSON eller `userIds` returnerar `400 Bad Request`.
* Saknade sessioner eller sessioner utanför omfattningen returnerar `404 Not Found`; anropare utan administratörsbehörighet kan inte använda dessa rutter.
* Rutterna för inskrivning av deltagare är **inte** generiska CRUD-slutpunkter för entiteten `Session` och accepterar inte en sessionslista som ersättningsdokument.

För motsvarande administrationsgränssnitt, se [Hantera sessioner](../../admin-guide/sessions/managing-sessions.md). För att kopiera en modellsession innan deltagare skrivs in, se [Sessionsduplicering](session-duplication.md).

**Implementation:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Tillagd i Chamilo LMS-commit `bdfb2dd661`.