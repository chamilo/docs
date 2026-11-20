# API til klassemedlemskab og tilmelding

Til integrationer stiller Chamilo slutpunkter til rådighed til at læse og synkronisere de medlemmer, sessioner og kurser, der er knyttet til en eksisterende **klasse**. En klasse er en `Usergroup` af typen *normal class*; disse ruter gælder **ikke** for sociale grupper.

I modsætning til API'et for sessionsstuderende erstatter de tre `PUT`-handlinger for klasser **hele den angivne liste**. Udeladte ID'er fjernes fra den pågældende relation. Læs den eksisterende liste, før du opdaterer den, og undgå at bruge `PUT` til kun at tilføje ét medlem, medmindre du også indsender alle, der skal forblive.

## Autorisation

Alle ruter nedenfor kræver den godkendte platformsrolle `ROLE_ADMIN`. Målklassen skal være tilgængelig i den aktuelle adgangs-URL. En manglende klasse eller en klasse uden for omfanget returnerer `404`; en usergroup, der ikke er en normal klasse, returnerer `409 Conflict`.

Controlleren kontrollerer, at indsendte bruger-, kursus- og sessions-ID'er findes. I en installation med flere URL'er filtreres indsendte **kursus- og sessions-ID'er** til den aktuelle portal; den nuværende implementering anvender dog **ikke** det samme portalfilter på **bruger-ID'er**. Integratorer må ikke betragte dette slutpunkt som en garanti for portalisolation på brugerniveau. Se noterne fra leveringsgennemgangen vedrørende denne udestående sikkerhedsovervejelse.

## Læs klasserelationer

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Eksempelsvar:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Erstat én relationsliste

| Metode | Slutpunkt | Anmodningsegenskab |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

For eksempel for at angive den fulde klasseliste:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Eksempelsvar:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` angiver accepterede ID'er, ikke nødvendigvis nyligt tilføjede ID'er. `ignored` identificerer anmodede ID'er, der ikke kunne anvendes (for eksempel et ukendt ID eller et kursus/en session uden for den aktuelle portal). Ikke-positive værdier udelades, dubletter fjernes, og forkert udformet JSON eller en anmodningsegenskab, der ikke er et array, returnerer `400`.

For i stedet at erstatte de tilknyttede sessioner skal du kalde `PUT /api/usergroups/31/sessions` med `{ "sessionIds": [42, 57] }`. For at erstatte tilknyttede kurser skal du kalde `PUT /api/usergroups/31/courses` med `{ "courseIds": [8, 11] }`.

**Vigtigt:** Chamilo anvender disse ændringer via synkroniseringsmetoderne i `UsergroupHelper`. Ændring af klasselisten eller dens sessions-/kursustilknytninger kan også ændre relaterede tilmeldinger. Manipuler ikke usergroup-relationstabeller direkte, og gennemgå effekten af at erstatte lister, før du kører en produktionsintegration.

For grænsefladen og begrebet, se [Klasser](../../admin-guide/sessions/classes.md). For at tilføje eller fjerne bestemte kursister fra én session *uden* at erstatte alle medlemmer, brug [API til tilmelding af sessionsstuderende](session-students.md).

**Implementering:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Tilføjet i Chamilo LMS-commit `d8809925a4`.