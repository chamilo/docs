# API for klassemedlemskap og påmelding

For integrasjoner tilbyr Chamilo endepunkter for å lese og synkronisere medlemmene, øktene og kursene som er knyttet til en eksisterende **klasse**. En klasse er en `Usergroup` av typen *normal klasse*; disse rutene gjelder **ikke** for sosiale grupper.

I motsetning til API-et for sesjonsstudenter **erstatter** de tre `PUT`-handlingene for klasser **hele den angitte listen**. Utelatte ID-er fjernes fra den relasjonen. Les den eksisterende listen før du oppdaterer den, og unngå å bruke `PUT` for å legge til bare ett medlem med mindre du også sender inn alle som skal beholdes.

## Autorisasjon

Alle rutene nedenfor krever den autentiserte plattformrollen `ROLE_ADMIN`. Målklassen må være tilgjengelig i gjeldende tilgangs-URL. En manglende eller utenfor omfanget klasse returnerer `404`; en brukergruppe som ikke er en normal klasse, returnerer `409 Conflict`.

Kontrolleren sjekker at innsendte bruker-, kurs- og økt-ID-er finnes. I en multi-URL-installasjon filtreres innsendte **kurs- og økt-ID-er** til gjeldende portal; den nåværende implementeringen bruker imidlertid **ikke** det samme portalfilteret på **bruker-ID-er**. Integratører må ikke behandle dette endepunktet som en garanti for portalisolasjon på brukernivå. Se leveringsgjennomgangsnotatene for denne utestående sikkerhetsvurderingen.

## Les klasserelasjoner

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

## Erstatt én relasjonsliste

| Metode | Endepunkt | Forespørselsegenskap |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

For eksempel, for å angi hele klasselisten:

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

`applied` lister godkjente ID-er, ikke nødvendigvis nylig tillagte ID-er. `ignored` identifiserer forespurte ID-er som ikke kunne brukes (for eksempel en ukjent ID eller et kurs/en økt utenfor gjeldende portal). Ikke-positive verdier utelates, duplikater fjernes, og feilformet JSON eller en forespørselsegenskap som ikke er en matrise, returnerer `400`.

For å erstatte de tilknyttede øktene i stedet, kall `PUT /api/usergroups/31/sessions` med `{ "sessionIds": [42, 57] }`. For å erstatte tilknyttede kurs, kall `PUT /api/usergroups/31/courses` med `{ "courseIds": [8, 11] }`.

**Viktig:** Chamilo bruker disse endringene via synkroniseringsmetodene i `UsergroupHelper`. Endring av klasselisten eller dens økt-/kursbindinger kan også endre relaterte påmeldinger. Ikke manipuler relasjonstabeller for brukergrupper direkte, og gjennomgå effekten av å erstatte lister før du kjører en produksjonsintegrasjon.

For grensesnittet og konseptet, se [Klasser](../../admin-guide/sessions/classes.md). For å legge til eller fjerne bestemte deltakere fra én økt *uten* å erstatte alle medlemmer, bruk [API for påmelding av sesjonsstudenter](session-students.md).

**Implementering:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Lagt til i Chamilo LMS-commit `d8809925a4`.