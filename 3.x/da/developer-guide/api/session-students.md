# API til tilmelding af studerende i sessioner

Integrationer kan vise, tilmelde og fjerne kursister i en session via slutpunkter, der kun er tilgængelige for administratorer. Disse handlinger anvender den samme tilmeldingsadfærd for sessioner som Chamilo's administrationsskærme. De er adskilt fra `/api/course-sessions/actions/*`, som hører til et andet tutororienteret arbejdsgang.

## Godkendelse og adgang

Alle handlinger nedenfor kræver godkendelse med platformrollen `ROLE_ADMIN`. At være sessionsadministrator alene giver **ikke** adgang. Brug den godkendelsesmetode, der er beskrevet i [Godkendelse](authentication.md).

I installationer med flere URL'er skal den anmodede session tilhøre den aktuelle adgangs-URL; ellers svarer slutpunktet med `404`.

## Ruter

| Metode | Slutpunkt | Formål |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Vis bruger-id'er for kursister, der er tilmeldt denne session |
| `POST` | `/api/sessions/{id}/students/subscribe` | Tilføj de angivne kursister, og behold eksisterende kursister |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Fjern kun de angivne kursister |

Erstat `{id}` med det numeriske sessions-id. Send for begge POST-anmodninger JSON, der indeholder arrayet `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

En vellykket tilmelding giver et svar med følgende struktur; id'er afhænger af din installation:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` indeholder nyligt tilmeldte kursister; `alreadyThere` indeholder kursister, der allerede er tilmeldt; `ignored` viser ikke-berettigede eller utilgængelige id'er. Ved tilmelding tilmelder Chamilo også de tilføjede kursister til sessionens kurser. Den **erstatter ikke** hele sessionslisten.

For at inspicere medlemskab:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

For at fjerne valgte kursister:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Svaret på afmelding indeholder `success`, `applied` (fjernede id'er) og `ignored` (id'er, der ikke er tilmeldt). Øvrige kursister forbliver i sessionen.

## Validering og begrænsninger

* `userIds` skal være et array af numeriske id'er (heltal eller strenge, der kun består af cifre). Gentagne id'er deduplikeres; ikke-positive værdier udelades.
* Ved tilmelding skal berettigede brugere eksistere, ikke være soft-deleted, ikke være anonyme eller HR-chefer og tilhøre den aktuelle adgangs-URL.
* Manglende eller forkert udformet JSON eller `userIds` returnerer `400 Bad Request`.
* Manglende sessioner eller sessioner uden for omfanget returnerer `404 Not Found`; kaldere uden administratorrettigheder kan ikke bruge disse ruter.
* Ruterne til tilmelding af studerende er **ikke** generiske CRUD-slutpunkter for entiteten `Session` og accepterer ikke en sessionsliste som erstatningsdokument.

For den tilsvarende administrationsgrænseflade, se [Administration af sessioner](../../admin-guide/sessions/managing-sessions.md). For kopiering af en modelsession før tilmelding af studerende, se [Duplikering af sessioner](session-duplication.md).

**Implementering:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Tilføjet i Chamilo LMS-commit `bdfb2dd661`.