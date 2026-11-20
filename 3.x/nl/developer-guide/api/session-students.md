# API voor inschrijving van cursisten in een sessie

Integraties kunnen cursisten in een sessie weergeven, inschrijven en verwijderen via eindpunten die uitsluitend voor beheerders zijn. Deze acties gebruiken het inschrijvingsgedrag voor sessies van de beheerschermen van Chamilo. Ze staan los van `/api/course-sessions/actions/*`, dat bij een andere, op tutors gerichte workflow hoort.

## Authenticatie en toegang

Elke onderstaande bewerking vereist authenticatie met de platformrol `ROLE_ADMIN`. Alleen sessiebeheerder zijn verleent **geen** toegang. Gebruik de authenticatiemethode die wordt beschreven in [Authenticatie](authentication.md).

In installaties met meerdere URL's moet de opgevraagde sessie bij de huidige toegangs-URL horen; anders antwoordt het eindpunt met `404`.

## Routes

| Methode | Eindpunt | Doel |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Gebruikers-ID's van cursisten weergeven die in deze sessie zijn ingeschreven |
| `POST` | `/api/sessions/{id}/students/subscribe` | De opgegeven cursisten toevoegen, met behoud van bestaande cursisten |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Alleen de opgegeven cursisten verwijderen |

Vervang `{id}` door het numerieke sessie-ID. Stuur voor beide POST-verzoeken JSON met de array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Een geslaagde inschrijving levert een antwoord op met de volgende structuur; de ID's hangen af van uw installatie:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` bevat nieuw ingeschreven cursisten; `alreadyThere` bevat cursisten die al waren ingeschreven; `ignored` vermeldt niet-in aanmerking komende of niet-beschikbare ID's. Bij het inschrijven schrijft Chamilo de toegevoegde cursisten ook in voor de cursussen van de sessie. Het vervangt de volledige sessierooster **niet**.

Om het lidmaatschap te inspecteren:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Om geselecteerde cursisten te verwijderen:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Het antwoord op uitschrijven bevat `success`, `applied` (verwijderde ID's) en `ignored` (ID's die niet waren ingeschreven). Andere cursisten blijven in de sessie.

## Validatie en beperkingen

* `userIds` moet een array van numerieke ID's zijn (gehele getallen of tekenreeksen die alleen uit cijfers bestaan). Herhaalde ID's worden ontdubbeld; niet-positieve waarden worden weggelaten.
* Voor inschrijving moeten in aanmerking komende gebruikers bestaan, niet zacht verwijderd zijn, geen anonieme gebruikers of HR-managers zijn en bij de huidige toegangs-URL horen.
* Ontbrekende of ongeldige JSON of `userIds` levert `400 Bad Request` op.
* Ontbrekende of buiten het bereik vallende sessies leveren `404 Not Found` op; aanroepers zonder beheerdersrechten kunnen deze routes niet gebruiken.
* De routes voor inschrijving van cursisten zijn **geen** generieke CRUD-eindpunten voor de entiteit `Session` en accepteren geen sessierooster als vervangend document.

Zie voor de bijbehorende beheerinterface [Sessies beheren](../../admin-guide/sessions/managing-sessions.md). Zie voor het kopiëren van een modelsessie vóór het inschrijven van cursisten [Sessieduplicatie](session-duplication.md).

**Implementatie:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Toegevoegd in Chamilo LMS-commit `bdfb2dd661`.