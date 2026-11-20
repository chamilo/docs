# Sessieduplicatie

`POST /api/sessions/{id}/duplicate` maakt een nieuwe sessie aan op basis van een bestaande **modelsessie**. Het is de vervanging in Chamilo 3 voor de actie `create_session_from_model` van de webservice `webservices/api/v2.php` uit 1.11.x, en is bedoeld voor integraties die een nieuwe trainingsronde openen vanuit een sjabloonsessie.

## Toegang

| Aanroeper | Toegestaan |
|--------|---------|
| `ROLE_ADMIN` | Elke sessie |
| `ROLE_SESSION_MANAGER` | Alleen sessies die zij beheren (zij zijn sessiebeheerder van het model), tenzij de instelling **Sessiebeheerders toestaan alle sessies te zien** is ingeschakeld |
| Iedereen anders | `403 Forbidden` |

Authenticeer met een JWT of een externe API-sleutel, zoals beschreven in [Authenticatie](authentication.md).

## Verzoek

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

| Veld | Verplicht | Beschrijving |
|-------|----------|-------------|
| `title` | Ja | Titel van de nieuwe sessie. Mag nog niet in gebruik zijn door een andere sessie (max. 150 tekens). |
| `startDate` | Ja | Datum en tijd volgens ISO 8601. Wordt gebruikt als startdatum voor toegang, weergave en toegang van de coach. |
| `endDate` | Ja | Datum en tijd volgens ISO 8601, niet vóór `startDate`. Wordt gebruikt als einddatum voor toegang, weergave en toegang van de coach. |
| `extraFields` | Nee | Waarden van extra sessievelden, gekoppeld aan de variabele van het veld. Zij overschrijven de waarden die uit het model zijn gekopieerd. Elke variabele moet een bestaand extra sessieveld zijn. |
| `copySessionContent` | Nee | Standaard `false`. Wanneer `true`, wordt de sessiespecifieke inhoud van elke cursus (documenten, leerpaden, toetsen, agenda-items, aankondigingen, cijferboek…) gedupliceerd naar de nieuwe sessie. De basisinhoud van de cursus wordt altijd gedeeld, nooit gekopieerd. Deze vlag is onafhankelijk van de platforminstelling **Het kopiëren van sessiespecifieke inhoud naar een andere sessie inschakelen**. |

## Wat wordt gekopieerd

| Gekopieerd uit het model | Niet gekopieerd |
|-----------------------|------------|
| Categorie, zichtbaarheid, duur, beschrijving en "beschrijving tonen" | Cursuscoaches |
| Waarden van extra sessievelden | HR-managers (DRH) |
| Cursussen, in dezelfde volgorde | Studenten |
| Algemene coaches | |
| Sessiebeheerders (als het model er geen heeft, wordt de aanroeper de sessiebeheerder) | |
| Optie "Abonnementsmelding verzenden" | |
| Promotie | |
| Sessiespecifieke cursusinhoud, alleen wanneer `copySessionContent` `true` is | |

Studenten worden bewust weggelaten: elke ronde krijgt haar eigen cursisten. Schrijf hen daarna in met `POST /api/course-sessions/actions/subscribe-users`.

De nieuwe sessie wordt gekoppeld aan de huidige toegangs-URL.

## Antwoord

`201 Created` met de nieuwe sessie:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Fouten

| Status | Wanneer |
|--------|------|
| `401` | Geen of ongeldige referenties |
| `403` | De aanroeper mag de modelsessie niet beheren |
| `404` | De modelsessie bestaat niet |
| `422` | Ontbrekend of ongeldig veld, `endDate` vóór `startDate`, titel al in gebruik, of onbekende variabele van een extra veld |

Alle controles worden uitgevoerd voordat er iets wordt aangemaakt, zodat een afgewezen verzoek nooit een gedeeltelijke sessie achterlaat.

## Implementatie

* Bewerking: `duplicate_session` op de resource `Session` (`src/CoreBundle/Entity/Session.php`)
* Invoer: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, die `SessionManager::copy()` aanroept (ook gebruikt door de actie **Kopiëren** van de sessielijst) en vervolgens de gevraagde titel, datums en extra velden toepast, evenals de promotie, sessiebeheerders, meldingsoptie en cursusvolgorde van het model.