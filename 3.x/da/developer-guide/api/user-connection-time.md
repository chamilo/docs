# Brugerens forbindelsestid

`GET /api/users/{id}/connection-time` returnerer den samlede tid, en bruger har været forbundet til platformen. Den erstatter handlingen `get_user_total_connexion_time` i 1.11.x-webtjenesten `webservices/api/v2.php` og kan begrænses til en periode.

## Adgang

| Kalder | Tilladt |
|--------|---------|
| `ROLE_ADMIN` | Enhver bruger på den aktuelle adgangs-URL |
| Enhver autentificeret bruger | Kun deres egen forbindelsestid |
| Alle andre | `403 Forbidden` |

Slutpunktet tager brugerens numeriske id. For at starte ud fra et brugernavn skal brugeren først slås op med `GET /api/users?username=...`.

## Forespørgsel

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Forespørgselsparameter | Påkrævet | Beskrivelse |
|-----------------|----------|-------------|
| `startDate` | Nej | ISO 8601-dato og -tid. Kun forbindelser, der **startede** på eller efter dette tidspunkt, tælles med. |
| `endDate` | Nej | ISO 8601-dato og -tid, ikke før `startDate`. Kun forbindelser, der **sluttede** på eller før dette tidspunkt, tælles med. |

Uden nogen af parametrene tælles alle forbindelser med. Med kun `startDate` tælles forbindelser fra den dato og frem, uden slutgrænse. Med kun `endDate` tælles forbindelser op til den dato, uden startgrænse.

En forbindelse, der overlapper en grænse (for eksempel en, der startede før `startDate`), tælles slet ikke med: forbindelsestider opdeles aldrig. Dette er den samme regel som det brugerdefinerede periodefilter i 1.11.x-rapporteringen.

Medtag tidszoneforskydningen. I en URL skal `+` kodes som `%2B`. En værdi uden forskydning læses i serverens tidszone.

## Svar

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Felt | Beskrivelse |
|-------|-------------|
| `totalConnectionTime` | Total i sekunder |
| `totalConnectionTimeFormatted` | Den samme total som `HH:MM:SS`, det format som 1.11.x-webtjenesten returnerede. Timer kan overstige 24. |

## Fejl

| Status | Hvornår |
|--------|------|
| `400` | En dato, der ikke kan fortolkes, eller `endDate` før `startDate` |
| `401` | Ingen eller ugyldige legitimationsoplysninger |
| `403` | Kalderen er hverken administrator eller den pågældende bruger |
| `404` | Brugeren findes ikke eller tilhører ikke den aktuelle adgangs-URL |

## Sådan beregnes tiden

Totalen er summen af `logout_date − login_date` over brugerens rækker i tabellen `track_e_login`.

En forbindelse starter ved login og forlænges, mens brugeren er aktiv: den side, brugeren har åben, sender et tilstedeværelsessignal hvert minut, mens fanen er synlig, sådan som hver sidevisning gjorde i Chamilo 1.11.x. Efter en inaktivitet, der er længere end sessionens levetid, åbner den næste aktivitet en ny forbindelse, så den inaktive periode ikke tælles med. Logud lukker den aktuelle forbindelse. Tid, som en administrator bruger med **Log ind som**, lægges ikke til brugeren.

> **Bemærk:** Forbindelser, der er registreret, før denne sporing blev genoprettet, har muligvis ingen logud-dato. De tæller som nul, så totaler over perioder før opgraderingen kan være lavere end den tid, der faktisk er brugt.