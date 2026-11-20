# API för klassmedlemskap och inskrivning

För integrationer tillhandahåller Chamilo ändpunkter för att läsa och synkronisera medlemmar, sessioner och kurser som är kopplade till en befintlig **klass**. En klass är en `Usergroup` av typen *normal class*; dessa rutter gäller **inte** sociala grupper.

Till skillnad från API:et för sessionsstudenter ersätter de tre `PUT`-åtgärderna för klasser **hela den angivna listan**. Utelämnade ID:n tas bort från den relationen. Läs den befintliga listan innan du uppdaterar den, och undvik att använda `PUT` för att lägga till endast en medlem om du inte också skickar in alla som ska finnas kvar.

## Auktorisering

Alla rutter nedan kräver den autentiserade plattformsrollen `ROLE_ADMIN`. Målklassen måste vara tillgänglig i den aktuella åtkomst-URL:en. En saknad klass eller en klass utanför omfattningen returnerar `404`; en användargrupp som inte är en normal klass returnerar `409 Conflict`.

Controllern kontrollerar att inskickade användar-, kurs- och sessions-ID:n finns. I en installation med flera URL:er filtreras inskickade **kurs- och sessions-ID:n** till den aktuella portalen; den nuvarande implementationen tillämpar dock **inte** samma portalfilter på **användar-ID:n**. Integratörer får inte betrakta denna ändpunkt som en garanti för portalisolering på användarnivå. Se leveransgranskningsanteckningarna för denna utestående säkerhetsaspekt.

## Läsa klassrelationer

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Exempelsvar:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Ersätta en relationslista

| Metod | Ändpunkt | Egenskap i begäran |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Till exempel, för att ange hela klasslistan:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Exempelsvar:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` listar accepterade ID:n, inte nödvändigtvis nyligen tillagda ID:n. `ignored` identifierar begärda ID:n som inte kunde tillämpas (till exempel ett okänt ID eller en kurs/session utanför den aktuella portalen). Icke-positiva värden utelämnas, dubbletter tas bort, och felaktig JSON eller en begäransegenskap som inte är en array returnerar `400`.

För att i stället ersätta de länkade sessionerna, anropa `PUT /api/usergroups/31/sessions` med `{ "sessionIds": [42, 57] }`. För att ersätta länkade kurser, anropa `PUT /api/usergroups/31/courses` med `{ "courseIds": [8, 11] }`.

**Viktigt:** Chamilo tillämpar dessa ändringar via synkroniseringsmetoderna i `UsergroupHelper`. Att ändra klasslistan eller dess sessions-/kurskopplingar kan också ändra relaterade inskrivningar. Manipulera inte relationstabeller för användargrupper direkt, och granska effekten av att ersätta listor innan du kör en produktionsintegration.

För gränssnittet och begreppet, se [Klasser](../../admin-guide/sessions/classes.md). För att lägga till eller ta bort specifika deltagare från en session *utan* att ersätta alla medlemmar, använd [API för inskrivning av sessionsstudenter](session-students.md).

**Implementation:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Tillagd i Chamilo LMS-commit `d8809925a4`.