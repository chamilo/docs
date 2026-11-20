# API för kursadministration

Chamilo 3.1 låter administratörsintegrationer uppdatera kursmetadata och ta bort kurser via API-resursen `Course`. Dessa operationer lades till för synkronisering med externa administrationssystem, till exempel ett ERP.

## Behörigheter

| Operation | Metod och slutpunkt | Krävd roll |
|-----------|---------------------|------------|
| Lista kurser | `GET /api/courses` | Lärare eller plattformsadministratör |
| Visa en kurs | `GET /api/courses/{id}` | Behörighet att visa den kursen |
| Skapa en kurs | `POST /api/courses` | Lärare eller plattformsadministratör |
| Uppdatera en kurs | `PATCH /api/courses/{id}` | **Plattformsadministratör (`ROLE_ADMIN`)** |
| Ta bort en kurs | `DELETE /api/courses/{id}` | **Plattformsadministratör (`ROLE_ADMIN`)** |

`PUT` är inte konfigurerad som en operation på den här resursen. Lärare bör fortsätta att redigera sina egna kurser via gränssnittet för kursinställningar; de nya skrivoperationerna i API:et är endast för administratörer.

Använd ett autentiserat konto eller en integrationsuppgift med nödvändiga behörigheter. Se [API-autentisering](authentication.md).

## Uppdatera kursmetadata

Skicka en JSON Merge Patch-begäran via API Platform för att endast ändra de egenskaper som anges i kroppen:

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

Begäran uppdaterar den befintliga kursen i stället för att skapa en ny. API:et accepterar skrivbara egenskaper som definieras av serialiseringsgruppen `course:write`, med förbehåll för entitetsvalidering. Exempel är `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` och `duration`. Relationsegenskaper som `categories` kräver den resursrepresentation som API:et förväntar sig; kontrollera OpenAPI-dokumentationen i stället för att skicka godtyckliga databas-ID:n.

**Viktigt:** den interna kurskoden `code` är **inte** skrivbar via den här PATCH-operationen. Försök inte byta namn på en kurs interna kod genom att skicka ett fält `code` eller `visualCode`.

## Ta bort en kurs

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Detta är en **destruktiv** administrationsoperation. Chamilo anropar samma hjälpfunktion för kursborttagning som används av kursunderhåll, i stället för att direkt ta bort Doctrine-entiteten. Den rensar tillhörande registreringar, sessions- och klasslänkar, spårningsdata och relaterad sökindexering i tillämpliga fall.

I en installation med **flera URL:er** kan borttagning endast koppla loss kursen från den aktuella åtkomst-URL:en i stället för att ta bort den överallt. Kursdokument tas inte bort med det separata alternativet *ta bort exklusiva dokument* från underhållsgränssnittet. Tolka inte en API-borttagning som en garanti för att varje dokument fysiskt tas bort.

Om ett aktivt beroende förhindrar borttagning (till exempel en resurssekvens) kan slutpunkten svara med `409 Conflict`. Granska kursberoenden och säkerhetskopior innan du skickar DELETE-begäranden, särskilt i batchintegrationer.

## Fel och driftsanteckningar

* En anropare utan den krävda administratörsrollen nekas; använd ett korrekt auktoriserat konto i stället för en läraruppgift för PATCH eller DELETE.
* Ogiltiga begärandedata kan misslyckas vid entitetsvalidering. Hämta den aktuella kursen innan du patchar den, och skicka endast egenskaper som du avser att ändra.
* Dessa operationer exponeras av API Platform; konsultera den installerade instansens OpenAPI-dokumentation för dess exakta svarsschema och accepterade fältformat.
* Testa kursborttagning på en engångskurs, inte på en kurs som innehåller produktionsdata om deltagare.

För kursadministration i gränssnittet, se [Hantera kurser](../../admin-guide/courses/managing-courses.md). För integrationer av sessionsregistrering, se [Sessionsregistrering av studenter](session-students.md).

**Implementering:** `src/CoreBundle/Entity/Course.php` (operationerna `Patch` och `Delete`) och `src/CoreBundle/State/CourseDeleteProcessor.php`. Tillagd i Chamilo LMS-commit `8cc9d4b33d`.