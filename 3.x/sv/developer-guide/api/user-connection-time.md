# Anslutningstid för användare

`GET /api/users/{id}/connection-time` returnerar den totala tid en användare varit ansluten till plattformen. Den ersätter åtgärden `get_user_total_connexion_time` i webbtjänsten `webservices/api/v2.php` för 1.11.x och kan begränsas till en period.

## Åtkomst

| Anropare | Tillåtet |
|--------|---------|
| `ROLE_ADMIN` | Valfri användare för den aktuella åtkomst-URL:en |
| Valfri autentiserad användare | Endast sin egen anslutningstid |
| Alla andra | `403 Forbidden` |

Slutpunkten tar användarens numeriska id. För att utgå från ett användarnamn, slå först upp användaren med `GET /api/users?username=...`.

## Begäran

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Frågeparameter | Obligatorisk | Beskrivning |
|-----------------|----------|-------------|
| `startDate` | Nej | Datum och tid enligt ISO 8601. Endast anslutningar som **startade** vid eller efter denna tidpunkt räknas. |
| `endDate` | Nej | Datum och tid enligt ISO 8601, inte före `startDate`. Endast anslutningar som **avslutades** vid eller före denna tidpunkt räknas. |

Utan någon av parametrarna räknas varje anslutning. Med endast `startDate` räknas anslutningar från det datumet och framåt, utan slutgräns. Med endast `endDate` räknas anslutningar fram till det datumet, utan startgräns.

En anslutning som överlappar en gräns (till exempel en som startade före `startDate`) räknas inte alls: anslutningstider delas aldrig upp. Detta är samma regel som det anpassade periodfiltret i rapporteringen för 1.11.x.

Ange tidszonsförskjutningen. I en URL måste `+` kodas som `%2B`. Ett värde utan förskjutning läses i serverns tidszon.

## Svar

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Fält | Beskrivning |
|-------|-------------|
| `totalConnectionTime` | Totalt i sekunder |
| `totalConnectionTimeFormatted` | Samma total som `HH:MM:SS`, det format som webbtjänsten i 1.11.x returnerade. Timmar kan överstiga 24. |

## Fel

| Status | När |
|--------|------|
| `400` | Ett datum som inte kan tolkas, eller `endDate` före `startDate` |
| `401` | Inga eller ogiltiga autentiseringsuppgifter |
| `403` | Anroparen är varken administratör eller den aktuella användaren |
| `404` | Användaren finns inte, eller tillhör inte den aktuella åtkomst-URL:en |

## Hur tiden beräknas

Totalen är summan av `logout_date − login_date` över användarens rader i tabellen `track_e_login`.

En anslutning startar vid inloggning och förlängs medan användaren är aktiv: sidan som användaren har öppen skickar en närvarosignal varje minut medan fliken är synlig, på samma sätt som varje sidvisning gjorde i Chamilo 1.11.x. Efter en längre inaktivitet än sessionens livslängd öppnar nästa aktivitet en ny anslutning, så den inaktiva perioden räknas inte. Utloggning stänger den aktuella anslutningen. Tid som en administratör tillbringar med **Logga in som** läggs inte till användaren.

> **Obs:** Anslutningar som registrerades innan denna spårning återställdes kan sakna utloggningsdatum. De räknas som noll, så totaler för perioder före uppgraderingen kan vara lägre än den tid som faktiskt tillbringades.