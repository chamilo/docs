# Duplicering av sessioner

`POST /api/sessions/{id}/duplicate` skapar en ny session utifrån en befintlig **modellsession**. Det är Chamilo 3-ersättningen för åtgärden `create_session_from_model` i webbtjänsten `webservices/api/v2.php` i 1.11.x, och är avsedd för integrationer som öppnar en ny utbildningsomgång utifrån en mallsession.

## Åtkomst

| Anropare | Tillåtet |
|--------|---------|
| `ROLE_ADMIN` | Valfri session |
| `ROLE_SESSION_MANAGER` | Endast sessioner som de administrerar (de är sessionsadministratör för modellen), om inte inställningen **Tillåt sessionsadministratörer att se alla sessioner** är aktiverad |
| Alla andra | `403 Forbidden` |

Autentisera med en JWT eller en extern API-nyckel, enligt beskrivningen i [Autentisering](authentication.md).

## Begäran

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

| Fält | Obligatoriskt | Beskrivning |
|-------|----------|-------------|
| `title` | Ja | Titel på den nya sessionen. Får inte redan användas av en annan session (max. 150 tecken). |
| `startDate` | Ja | Datum och tid enligt ISO 8601. Används som startdatum för åtkomst, visning och coachåtkomst. |
| `endDate` | Ja | Datum och tid enligt ISO 8601, inte före `startDate`. Används som slutdatum för åtkomst, visning och coachåtkomst. |
| `extraFields` | Nej | Värden för sessionens extrafält, nycklade efter fältets variabel. De åsidosätter värden som kopierats från modellen. Varje variabel måste vara ett befintligt extrafält för sessioner. |
| `copySessionContent` | Nej | `false` som standard. När värdet är `true` dupliceras det sessionsspecifika innehållet i varje kurs (dokument, lärvägar, test, kalenderhändelser, meddelanden, betygsbok …) till den nya sessionen. Kursens basinnehåll delas alltid och kopieras aldrig. Denna flagga är oberoende av plattformsinställningen **Aktivera kopiering av sessionsspecifikt innehåll till en annan session**. |

## Vad som kopieras

| Kopieras från modellen | Kopieras inte |
|-----------------------|------------|
| Kategori, synlighet, varaktighet, beskrivning och ”visa beskrivning” | Kurscoacher |
| Värden för sessionens extrafält | HR-ansvariga (DRH) |
| Kurser, i samma ordning | Studenter |
| Allmänna coacher | |
| Sessionsadministratörer (om modellen inte har några blir anroparen sessionsadministratör) | |
| Alternativet ”Skicka prenumerationsavisering” | |
| Kampanj | |
| Sessionsspecifikt kursinnehåll, endast när `copySessionContent` är `true` | |

Studenter utelämnas medvetet: varje omgång får sina egna deltagare. Prenumerera dem i efterhand med `POST /api/course-sessions/actions/subscribe-users`.

Den nya sessionen kopplas till den aktuella åtkomst-URL:en.

## Svar

`201 Created` med den nya sessionen:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Fel

| Status | När |
|--------|------|
| `401` | Inga eller ogiltiga autentiseringsuppgifter |
| `403` | Anroparen får inte administrera modellsessionen |
| `404` | Modellsessionen finns inte |
| `422` | Saknat eller ogiltigt fält, `endDate` före `startDate`, titeln används redan eller okänd variabel för extrafält |

Alla kontroller körs innan något skapas, så en avvisad begäran lämnar aldrig en ofullständig session efter sig.

## Implementering

* Åtgärd: `duplicate_session` på resursen `Session` (`src/CoreBundle/Entity/Session.php`)
* Indata: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, som anropar `SessionManager::copy()` (används även av åtgärden **Kopiera** i sessionslistan) och därefter tillämpar den begärda titeln, datumen och extrafälten samt modellens kampanj, sessionsadministratörer, aviseringsalternativ och kursordning.