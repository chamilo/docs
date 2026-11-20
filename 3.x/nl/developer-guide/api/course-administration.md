# API voor cursusbeheer

Met Chamilo 3.1 kunnen beheerdersintegraties cursusmetadata bijwerken en cursussen verwijderen via de API-resource `Course`. Deze bewerkingen zijn toegevoegd voor synchronisatie met externe beheersystemen, zoals een ERP.

## Machtigingen

| Bewerking | Methode en endpoint | Vereiste rol |
|-----------|---------------------|---------------|
| Cursussen weergeven | `GET /api/courses` | Docent of platformbeheerder |
| Een cursus bekijken | `GET /api/courses/{id}` | Machtiging om die cursus te bekijken |
| Een cursus aanmaken | `POST /api/courses` | Docent of platformbeheerder |
| Een cursus bijwerken | `PATCH /api/courses/{id}` | **Platformbeheerder (`ROLE_ADMIN`)** |
| Een cursus verwijderen | `DELETE /api/courses/{id}` | **Platformbeheerder (`ROLE_ADMIN`)** |

`PUT` is niet geconfigureerd als bewerking op deze resource. Docenten moeten hun eigen cursussen blijven bewerken via de interface voor cursusinstellingen; de nieuwe schrijfbewerkingen van de API zijn uitsluitend voor beheerders.

Gebruik een geverifieerd account of integratiegegevens met de vereiste machtigingen. Zie [API-authenticatie](authentication.md).

## Cursusmetadata bijwerken

Verstuur een JSON Merge Patch-verzoek van API Platform om alleen de eigenschappen te wijzigen die in de body zijn opgegeven:

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

Het verzoek werkt de bestaande cursus bij in plaats van een nieuwe aan te maken. De API accepteert schrijfbare eigenschappen die zijn gedefinieerd door de serialisatiegroep `course:write`, onder voorbehoud van entiteitsvalidatie. Voorbeelden zijn `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` en `duration`. Relatie-eigenschappen zoals `categories` vereisen de resourceweergave die de API verwacht; raadpleeg de OpenAPI-documentatie in plaats van willekeurige database-ID's te versturen.

**Belangrijk:** de interne cursuscode `code` is **niet** schrijfbaar via deze PATCH-bewerking. Probeer de interne code van een cursus niet te hernoemen door een veld `code` of `visualCode` te versturen.

## Een cursus verwijderen

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Dit is een **destructieve** beheerbewerking. Chamilo roept dezelfde hulpfunctie voor cursusverwijdering aan die door cursusonderhoud wordt gebruikt, in plaats van de Doctrine-entiteit rechtstreeks te verwijderen. Daarbij worden gekoppelde inschrijvingen, sessie- en klasseverbanden, trackinggegevens en gerelateerde zoekindexering opgeschoond, voor zover van toepassing.

In een installatie met **meerdere URL's** kan verwijdering de cursus alleen loskoppelen van de huidige toegangs-URL, in plaats van deze overal te verwijderen. Cursusdocumenten worden niet verwijderd met de afzonderlijke optie *exclusieve documenten verwijderen* uit de onderhoudsinterface. Beschouw een verwijdering via de API niet als garantie dat elk document fysiek wordt verwijderd.

Als een actieve afhankelijkheid verwijdering verhindert (bijvoorbeeld een resourcesequentie), kan het endpoint reageren met `409 Conflict`. Controleer cursusafhankelijkheden en back-ups voordat u DELETE-verzoeken verstuurt, vooral bij batchintegraties.

## Fouten en operationele opmerkingen

* Een aanroeper zonder de vereiste beheerdersrol wordt geweigerd; gebruik een correct geautoriseerd account in plaats van docentgegevens voor PATCH of DELETE.
* Ongeldige verzoekgegevens kunnen de entiteitsvalidatie laten mislukken. Haal de huidige cursus op voordat u deze patcht, en verstuur alleen eigenschappen die u wilt wijzigen.
* Deze bewerkingen worden beschikbaar gesteld door API Platform; raadpleeg de OpenAPI-documentatie van de geïnstalleerde instantie voor het exacte antwoordschema en de geaccepteerde veldindelingen.
* Test cursusverwijdering op een wegwerpcursus, niet op een cursus die productiegegevens van lerenden bevat.

Voor cursusbeheer in de interface, zie [Cursussen beheren](../../admin-guide/courses/managing-courses.md). Voor integraties van sessie-inschrijvingen, zie [Inschrijving van sessiedeelnemers](session-students.md).

**Implementatie:** `src/CoreBundle/Entity/Course.php` (bewerkingen `Patch` en `Delete`), en `src/CoreBundle/State/CourseDeleteProcessor.php`. Toegevoegd in Chamilo LMS-commit `8cc9d4b33d`.