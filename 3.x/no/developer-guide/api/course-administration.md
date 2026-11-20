# API for kursadministrasjon

Chamilo 3.1 lar administratorintegrasjoner oppdatere kursmetadata og slette kurs via API-ressursen `Course`. Disse operasjonene ble lagt til for synkronisering med eksterne administrasjonssystemer, for eksempel et ERP-system.

## Tillatelser

| Operasjon | Metode og endepunkt | Påkrevd rolle |
|-----------|---------------------|---------------|
| Liste kurs | `GET /api/courses` | Lærer eller plattformadministrator |
| Vis et kurs | `GET /api/courses/{id}` | Tillatelse til å vise det aktuelle kurset |
| Opprett et kurs | `POST /api/courses` | Lærer eller plattformadministrator |
| Oppdater et kurs | `PATCH /api/courses/{id}` | **Plattformadministrator (`ROLE_ADMIN`)** |
| Slett et kurs | `DELETE /api/courses/{id}` | **Plattformadministrator (`ROLE_ADMIN`)** |

`PUT` er ikke konfigurert som en operasjon på denne ressursen. Lærere bør fortsette å redigere sine egne kurs via grensesnittet for kursinnstillinger; de nye skriveoperasjonene i API-et er kun for administratorer.

Bruk en autentisert konto eller integrasjonslegitimasjon med nødvendige tillatelser. Se [API-autentisering](authentication.md).

## Oppdater kursmetadata

Send en JSON Merge Patch-forespørsel via API Platform for å endre bare egenskapene som er oppgitt i brødteksten:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

Forespørselen oppdaterer det eksisterende kurset i stedet for å opprette et nytt. API-et godtar skrivbare egenskaper definert av serialiseringsgruppen `course:write`, underlagt entitetsvalidering. Eksempler inkluderer `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` og `duration`. Relasjonsegenskaper som `categories` krever API-ets forventede ressursrepresentasjon; sjekk OpenAPI-dokumentasjonen i stedet for å sende vilkårlige database-ID-er.

**Viktig:** den interne kurskoden `code` er **ikke** skrivbar via denne PATCH-operasjonen. Ikke forsøk å gi et kurs nytt internt kodenavn ved å sende et `code`- eller `visualCode`-felt.

## Slett et kurs

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Dette er en **destruktiv** administrasjonsoperasjon. Chamilo kaller den samme hjelpefunksjonen for kurssletting som brukes av kursvedlikehold, i stedet for å slette Doctrine-entiteten direkte. Den rydder opp i tilknyttede registreringer, økt- og klassekoblinger, sporingsdata og relatert søkeindeksering der det er aktuelt.

I en installasjon med **flere URL-er** kan sletting bare løsne kurset fra gjeldende tilgangs-URL i stedet for å slette det overalt. Kursdokumenter slettes ikke ved hjelp av det separate alternativet *slett eksklusive dokumenter* fra vedlikeholdsgrensesnittet. Ikke tolk en API-sletting som en garanti for at hvert dokument fysisk fjernes.

Hvis en aktiv avhengighet hindrer sletting (for eksempel en ressurssekvens), kan endepunktet svare med `409 Conflict`. Gå gjennom kursavhengigheter og sikkerhetskopier før du sender DELETE-forespørsler, særlig i batchintegrasjoner.

## Feil og driftsmerknader

* En anroper uten den påkrevde administratorrollen avvises; bruk en korrekt autorisert konto i stedet for lærerlegitimasjon for PATCH eller DELETE.
* Ugyldige forespørselsdata kan feile entitetsvalidering. Hent det gjeldende kurset før du patcher det, og send bare egenskaper du har til hensikt å endre.
* Disse operasjonene eksponeres av API Platform; se OpenAPI-dokumentasjonen for den installerte instansen for nøyaktig responsskjema og godkjente feltformater.
* Test kurssletting på et engangskurs, ikke på et kurs som inneholder produksjonsdata om deltakere.

For kursadministrasjon i grensesnittet, se [Administrere kurs](../../admin-guide/courses/managing-courses.md). For integrasjoner for øktpåmelding, se [Påmelding av studenter til økt](session-students.md).

**Implementering:** `src/CoreBundle/Entity/Course.php` (`Patch`- og `Delete`-operasjoner), og `src/CoreBundle/State/CourseDeleteProcessor.php`. Lagt til i Chamilo LMS-commit `8cc9d4b33d`.