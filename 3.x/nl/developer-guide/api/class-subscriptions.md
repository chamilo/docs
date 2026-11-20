# API voor klaslidmaatschap en inschrijving

Voor integraties biedt Chamilo eindpunten om de leden, sessies en cursussen te lezen en te synchroniseren die aan een bestaande **klas** zijn gekoppeld. Een klas is een `Usergroup` van het type *normale klas*; deze routes zijn **niet** van toepassing op sociale groepen.

In tegenstelling tot de API voor sessiestudenten vervangen de drie klasacties met `PUT` **de volledige opgegeven lijst**. Weggelaten ID's worden uit die relatie verwijderd. Lees de bestaande lijst voordat u deze bijwerkt, en vermijd het gebruik van `PUT` om slechts één lid toe te voegen, tenzij u ook iedereen indient die moet blijven.

## Autorisatie

Alle onderstaande routes vereisen de geauthenticeerde platformrol `ROLE_ADMIN`. De doelklas moet beschikbaar zijn in de huidige toegangs-URL. Een ontbrekende of buiten bereik vallende klas retourneert `404`; een usergroup die geen normale klas is, retourneert `409 Conflict`.

De controller controleert of de ingediende gebruikers-, cursus- en sessie-ID's bestaan. In een multi-URL-installatie worden ingediende **cursus- en sessie-ID's** gefilterd op het huidige portaal; de huidige implementatie past datzelfde portafilter echter **niet** toe op **gebruikers-ID's**. Integrators mogen dit eindpunt niet beschouwen als een garantie voor portaalisolatie op gebruikersniveau. Zie de notities van de opleveringsreview voor deze openstaande beveiligingsoverweging.

## Klasrelaties lezen

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Voorbeeldantwoord:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Eén relatielijst vervangen

| Methode | Eindpunt | Aanvraageigenschap |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Bijvoorbeeld om de volledige ledenlijst van de klas in te stellen:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Voorbeeldantwoord:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` vermeldt geaccepteerde ID's, niet noodzakelijk nieuw toegevoegde ID's. `ignored` identificeert aangevraagde ID's die niet konden worden toegepast (bijvoorbeeld een onbekend ID of een cursus/sessie buiten het huidige portaal). Niet-positieve waarden worden weggelaten, duplicaten worden verwijderd, en ongeldige JSON of een aanvraageigenschap die geen array is, retourneert `400`.

Om in plaats daarvan de gekoppelde sessies te vervangen, roept u `PUT /api/usergroups/31/sessions` aan met `{ "sessionIds": [42, 57] }`. Om gekoppelde cursussen te vervangen, roept u `PUT /api/usergroups/31/courses` aan met `{ "courseIds": [8, 11] }`.

**Belangrijk:** Chamilo past deze wijzigingen toe via de synchronisatiemethoden van `UsergroupHelper`. Het wijzigen van de ledenlijst van de klas of de sessie-/cursuskoppelingen kan ook gerelateerde inschrijvingen wijzigen. Manipuleer usergroup-relatietabellen niet rechtstreeks en beoordeel het effect van het vervangen van lijsten voordat u een productie-integratie uitvoert.

Voor de interface en het concept, zie [Klassen](../../admin-guide/sessions/classes.md). Om specifieke cursisten aan één sessie toe te voegen of te verwijderen *zonder* alle leden te vervangen, gebruikt u de [API voor inschrijving van sessiestudenten](session-students.md).

**Implementatie:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Toegevoegd in Chamilo LMS-commit `d8809925a4`.