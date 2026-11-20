# Duplisering av sesjon

`POST /api/sessions/{id}/duplicate` oppretter en ny sesjon fra en eksisterende **modellsesjon**. Det er Chamilo 3-erstatningen for handlingen `create_session_from_model` i 1.11.x-webtjenesten `webservices/api/v2.php`, og er ment for integrasjoner som starter en ny opplæringsgjennomføring fra en mal-sesjon.

## Tilgang

| Anroper | Tillatt |
|--------|---------|
| `ROLE_ADMIN` | Enhver sesjon |
| `ROLE_SESSION_MANAGER` | Bare sesjoner de administrerer (de er sesjonsadministrator for modellen), med mindre innstillingen **Tillat sesjonsadministratorer å se alle sesjoner** er aktivert |
| Alle andre | `403 Forbidden` |

Autentiser med en JWT eller en ekstern API-nøkkel, som beskrevet i [Autentisering](authentication.md).

## Forespørsel

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

| Felt | Påkrevd | Beskrivelse |
|-------|----------|-------------|
| `title` | Ja | Tittel på den nye sesjonen. Må ikke allerede være i bruk av en annen sesjon (maks. 150 tegn). |
| `startDate` | Ja | ISO 8601-dato og -tid. Brukes som startdato for tilgang, visning og veileder-tilgang. |
| `endDate` | Ja | ISO 8601-dato og -tid, ikke før `startDate`. Brukes som sluttdato for tilgang, visning og veileder-tilgang. |
| `extraFields` | Nei | Verdier for ekstra sesjonsfelt, nøklet etter feltets variabel. De overstyrer verdiene som er kopiert fra modellen. Hver variabel må være et eksisterende ekstra sesjonsfelt. |
| `copySessionContent` | Nei | `false` som standard. Når `true`, dupliseres det sesjonsspesifikke innholdet i hvert kurs (dokumenter, læringsstier, tester, kalenderhendelser, kunngjøringer, karakterbok …) til den nye sesjonen. Grunninnholdet i kurset deles alltid, og kopieres aldri. Dette flagget er uavhengig av plattforminnstillingen **Aktiver kopiering av sesjonsspesifikt innhold til en annen sesjon**. |

## Hva som kopieres

| Kopiert fra modellen | Ikke kopiert |
|-----------------------|------------|
| Kategori, synlighet, varighet, beskrivelse og «vis beskrivelse» | Kursveiledere |
| Verdier for ekstra sesjonsfelt | HR-ledere (DRH) |
| Kurs, i samme rekkefølge | Studenter |
| Generelle veiledere | |
| Sesjonsadministratorer (hvis modellen ikke har noen, blir anroperen sesjonsadministrator) | |
| Alternativet «Send abonnementsvarsel» | |
| Promosjon | |
| Sesjonsspesifikt kursinnhold, bare når `copySessionContent` er `true` | |

Studenter utelates med vilje: hver gjennomføring får sine egne deltakere. Abonner dem i etterkant med `POST /api/course-sessions/actions/subscribe-users`.

Den nye sesjonen knyttes til gjeldende tilgangs-URL.

## Svar

`201 Created` med den nye sesjonen:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Feil

| Status | Når |
|--------|------|
| `401` | Ingen eller ugyldige legitimasjonsopplysninger |
| `403` | Anroperen kan ikke administrere modellsesjonen |
| `404` | Modellsesjonen finnes ikke |
| `422` | Manglende eller ugyldig felt, `endDate` før `startDate`, tittel allerede i bruk, eller ukjent variabel for ekstra felt |

Alle kontrollene kjøres før noe opprettes, slik at en avvist forespørsel aldri etterlater en delvis sesjon.

## Implementering

* Operasjon: `duplicate_session` på ressursen `Session` (`src/CoreBundle/Entity/Session.php`)
* Inndata: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Prosessor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, som kaller `SessionManager::copy()` (også brukt av handlingen **Kopier** i sesjonslisten) og deretter bruker den forespurte tittelen, datoene og ekstra feltene, samt modellens promosjon, sesjonsadministratorer, varslingsalternativ og kursrekkefølge.