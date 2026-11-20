# API for påmelding av studenter i økter

Integrasjoner kan liste, melde på og fjerne deltakere i en økt ved hjelp av endepunkter som kun er tilgjengelige for administratorer. Disse handlingene bruker påmeldingsatferden for økter fra Chamilos administrasjonsskjermer. De er atskilt fra `/api/course-sessions/actions/*`, som tilhører en annen veilederorientert arbeidsflyt.

## Autentisering og tilgang

Hver operasjon nedenfor krever autentisering med plattformrollen `ROLE_ADMIN`. Å være øktadministrator alene gir **ikke** tilgang. Bruk autentiseringsmetoden beskrevet i [Autentisering](authentication.md).

I installasjoner med flere URL-er må den forespurte økten tilhøre gjeldende tilgangs-URL; ellers svarer endepunktet med `404`.

## Ruter

| Metode | Endepunkt | Formål |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Liste bruker-ID-er for deltakere som er påmeldt denne økten |
| `POST` | `/api/sessions/{id}/students/subscribe` | Legg til de angitte deltakerne og behold eksisterende deltakere |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Fjern bare de angitte deltakerne |

Erstatt `{id}` med den numeriske økt-ID-en. For begge POST-forespørsler, send JSON som inneholder matrisen `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

En vellykket påmelding gir et svar med følgende struktur; ID-er avhenger av installasjonen din:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` inneholder nylig påmeldte deltakere; `alreadyThere` inneholder deltakere som allerede er påmeldt; `ignored` lister opp ugyldige eller utilgjengelige ID-er. Ved påmelding melder Chamilo også de tilføyde deltakerne på øktens kurs. Den **erstatter ikke** hele deltakerlisten for økten.

For å inspisere medlemskap:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

For å fjerne valgte deltakere:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Svaret på avmelding inneholder `success`, `applied` (fjernede ID-er) og `ignored` (ID-er som ikke er påmeldt). Andre deltakere forblir i økten.

## Validering og begrensninger

* `userIds` må være en matrise med numeriske ID-er (heltall eller strenger som bare inneholder sifre). Gjentatte ID-er dedupliseres; ikke-positive verdier utelates.
* For påmelding må kvalifiserte brukere finnes, ikke være mykt slettet, ikke være anonyme eller HR-ledere, og tilhøre gjeldende tilgangs-URL.
* Manglende eller feilformet JSON eller `userIds` returnerer `400 Bad Request`.
* Manglende økter eller økter utenfor omfanget returnerer `404 Not Found`; kallere uten administratortillatelse kan ikke bruke disse rutene.
* Rutene for studentpåmelding er **ikke** generiske CRUD-endepunkter for entiteten `Session`, og godtar ikke en deltakerliste for økten som et erstatningsdokument.

For det tilsvarende administrasjonsgrensesnittet, se [Administrere økter](../../admin-guide/sessions/managing-sessions.md). For å kopiere en maløkt før du melder på studenter, se [Duplisering av økter](session-duplication.md).

**Implementasjon:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Lagt til i Chamilo LMS-commit `bdfb2dd661`.