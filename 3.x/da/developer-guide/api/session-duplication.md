# Sessionsduplikering

`POST /api/sessions/{id}/duplicate` opretter en ny session ud fra en eksisterende **modelsession**. Det er Chamilo 3-erstatningen for handlingen `create_session_from_model` i 1.11.x-webservicen `webservices/api/v2.php` og er beregnet til integrationer, der åbner et nyt undervisningsforløb ud fra en skabelonsession.

## Adgang

| Kalder | Tilladt |
|--------|---------|
| `ROLE_ADMIN` | Enhver session |
| `ROLE_SESSION_MANAGER` | Kun sessioner, de administrerer (de er sessionsadministrator for modellen), medmindre indstillingen **Tillad sessionsadministratorer at se alle sessioner** er aktiveret |
| Alle andre | `403 Forbidden` |

Autentificer med en JWT eller en ekstern API-nøgle, som beskrevet i [Godkendelse](authentication.md).

## Anmodning

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Felt | Påkrævet | Beskrivelse |
|-------|----------|-------------|
| `title` | Ja | Titel på den nye session. Må ikke allerede være brugt af en anden session (maks. 150 tegn). |
| `startDate` | Ja | ISO 8601-dato og -tid. Bruges som startdato for adgang, visning og coachadgang. |
| `endDate` | Ja | ISO 8601-dato og -tid, ikke før `startDate`. Bruges som slutdato for adgang, visning og coachadgang. |
| `extraFields` | Nej | Værdier for ekstra sessionsfelter med feltets variabel som nøgle. De tilsidesætter de værdier, der kopieres fra modellen. Hver variabel skal være et eksisterende ekstra sessionsfelt. |
| `copySessionContent` | Nej | `false` som standard. Når `true`, duplikeres det sessionspecifikke indhold i hvert kursus (dokumenter, læringsstier, prøver, kalenderbegivenheder, meddelelser, karakterbog…) til den nye session. Kursets basisindhold deles altid og kopieres aldrig. Dette flag er uafhængigt af platformsindstillingen **Aktivér kopiering af sessionspecifikt indhold til en anden session**. |

## Hvad der kopieres

| Kopieret fra modellen | Ikke kopieret |
|-----------------------|------------|
| Kategori, synlighed, varighed, beskrivelse og "vis beskrivelse" | Kursuscoaches |
| Værdier for ekstra sessionsfelter | HR-ansvarlige (DRH) |
| Kurser i samme rækkefølge | Studerende |
| Generelle coaches | |
| Sessionsadministratorer (hvis modellen ikke har nogen, bliver den kaldende sessionsadministrator) | |
| Indstillingen "Send tilmeldingsmeddelelse" | |
| Promotion | |
| Sessionspecifikt kursusindhold, kun når `copySessionContent` er `true` | |

Studerende udelades med vilje: hvert forløb får sine egne studerende. Tilmeld dem bagefter med `POST /api/course-sessions/actions/subscribe-users`.

Den nye session knyttes til den aktuelle adgangs-URL.

## Svar

`201 Created` med den nye session:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Fejl

| Status | Hvornår |
|--------|------|
| `401` | Ingen eller ugyldige legitimationsoplysninger |
| `403` | Den kaldende må ikke administrere modelsessionen |
| `404` | Modelsessionen findes ikke |
| `422` | Manglende eller ugyldigt felt, `endDate` før `startDate`, titel allerede i brug eller ukendt variabel for ekstra felt |

Alle kontroller udføres, før noget oprettes, så en afvist anmodning aldrig efterlader en delvis session.

## Implementering

* Operation: `duplicate_session` på ressourcen `Session` (`src/CoreBundle/Entity/Session.php`)
* Input: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, som kalder `SessionManager::copy()` (også brugt af handlingen **Kopiér** på sessionslisten) og derefter anvender den anmodede titel, datoer og ekstra felter samt modellens promotion, sessionsadministratorer, notifikationsindstilling og kursusrækkefølge.