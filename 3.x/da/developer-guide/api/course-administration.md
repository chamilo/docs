# API til kursusadministration

Chamilo 3.1 giver administratorintegrationer mulighed for at opdatere kursusmetadata og slette kurser via API-ressourcen `Course`. Disse operationer blev tilføjet med henblik på synkronisering med eksterne administrationssystemer, f.eks. et ERP-system.

## Tilladelser

| Operation | Metode og endpoint | Påkrævet rolle |
|-----------|---------------------|---------------|
| Vis kurser | `GET /api/courses` | Underviser eller platformsadministrator |
| Vis et kursus | `GET /api/courses/{id}` | Tilladelse til at se det pågældende kursus |
| Opret et kursus | `POST /api/courses` | Underviser eller platformsadministrator |
| Opdater et kursus | `PATCH /api/courses/{id}` | **Platformsadministrator (`ROLE_ADMIN`)** |
| Slet et kursus | `DELETE /api/courses/{id}` | **Platformsadministrator (`ROLE_ADMIN`)** |

`PUT` er ikke konfigureret som en operation på denne ressource. Undervisere bør fortsat redigere deres egne kurser via grænsefladen til kursusindstillinger; de nye skriveoperationer i API'et er kun for administratorer.

Brug en godkendt konto eller integrationslegitimationsoplysninger med de nødvendige tilladelser. Se [API-godkendelse](authentication.md).

## Opdater kursusmetadata

Send en JSON Merge Patch-anmodning via API Platform for kun at ændre de egenskaber, der er angivet i brødteksten:

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

Anmodningen opdaterer det eksisterende kursus i stedet for at oprette et nyt. API'et accepterer skrivbare egenskaber defineret af serializer-gruppen `course:write`, underlagt entitetsvalidering. Eksempler omfatter `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` og `duration`. Relationsegenskaber såsom `categories` kræver den ressourcegengivelse, som API'et forventer; se OpenAPI-dokumentationen i stedet for at sende vilkårlige database-id'er.

**Vigtigt:** det interne kursus-`code` er **ikke** skrivbart via denne PATCH-operation. Forsøg ikke at omdøbe et kursus' interne kode ved at sende et `code`- eller `visualCode`-felt.

## Slet et kursus

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Dette er en **destruktiv** administrationsoperation. Chamilo kalder den samme hjælpefunktion til kurssletning, som bruges af kursusvedligeholdelse, i stedet for at slette Doctrine-entiteten direkte. Den rydder op i tilknyttede tilmeldinger, sessions- og klassekoblinger, sporingsdata og relateret søgeindeksering, hvor det er relevant.

I en **multi-URL**-installation kan sletning kun frakoble kurset fra den aktuelle adgangs-URL i stedet for at slette det overalt. Kursusdokumenter slettes ikke ved hjælp af den separate indstilling *slet eksklusive dokumenter* fra vedligeholdelsesgrænsefladen. Fortolk ikke en API-sletning som en garanti for, at alle dokumenter fjernes fysisk.

Hvis en aktiv afhængighed forhindrer sletning (f.eks. en ressourcesekvens), kan endpointet svare med `409 Conflict`. Gennemgå kursusafhængigheder og sikkerhedskopier, før du sender DELETE-anmodninger, især i batchintegrationer.

## Fejl og driftsnoter

* En kalder uden den påkrævede administratorrolle afvises; brug en korrekt autoriseret konto frem for undervisers legitimationsoplysninger til PATCH eller DELETE.
* Ugyldige anmodningsdata kan fejle entitetsvalidering. Hent det aktuelle kursus, før du patcher det, og send kun de egenskaber, du har til hensigt at ændre.
* Disse operationer eksponeres af API Platform; se den installerede instans' OpenAPI-dokumentation for det nøjagtige svarskema og accepterede feltformater.
* Test kurssletning på et engangskursus, ikke på et kursus, der indeholder produktionsdata om kursister.

For kursusadministration i grænsefladen, se [Administration af kurser](../../admin-guide/courses/managing-courses.md). For integrationer af sessionstilmelding, se [Tilmelding af kursister til sessioner](session-students.md).

**Implementering:** `src/CoreBundle/Entity/Course.php` (`Patch`- og `Delete`-operationer) og `src/CoreBundle/State/CourseDeleteProcessor.php`. Tilføjet i Chamilo LMS-commit `8cc9d4b33d`.