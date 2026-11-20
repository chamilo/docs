# Tilkoblingstid for bruker

`GET /api/users/{id}/connection-time` returnerer den totale tiden en bruker har vært tilkoblet plattformen. Den erstatter handlingen `get_user_total_connexion_time` i 1.11.x-webtjenesten `webservices/api/v2.php`, og kan begrenses til en periode.

## Tilgang

| Anroper | Tillatt |
|--------|---------|
| `ROLE_ADMIN` | Enhver bruker av gjeldende tilgangs-URL |
| Enhver autentisert bruker | Kun egen tilkoblingstid |
| Alle andre | `403 Forbidden` |

Endepunktet tar brukerens numeriske id. For å starte fra et brukernavn, slå først opp brukeren med `GET /api/users?username=...`.

## Forespørsel

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Spørringsparameter | Påkrevd | Beskrivelse |
|-----------------|----------|-------------|
| `startDate` | Nei | ISO 8601 dato-tid. Bare tilkoblinger som **startet** på eller etter dette tidspunktet, telles. |
| `endDate` | Nei | ISO 8601 dato-tid, ikke før `startDate`. Bare tilkoblinger som **sluttet** på eller før dette tidspunktet, telles. |

Uten noen av parameterne telles alle tilkoblinger. Med bare `startDate` telles tilkoblinger fra den datoen og fremover, uten sluttgrense. Med bare `endDate` telles tilkoblinger frem til den datoen, uten startgrense.

En tilkobling som overlapper en grense (for eksempel en som startet før `startDate`), telles ikke i det hele tatt: tilkoblingstider deles aldri. Dette er samme regel som det egendefinerte periodefilteret i 1.11.x-rapporteringen.

Ta med tidssoneforskyvningen. I en URL må `+` kodes som `%2B`. En verdi uten forskyvning leses i serverens tidssone.

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
| `totalConnectionTime` | Totalt i sekunder |
| `totalConnectionTimeFormatted` | Samme total som `HH:MM:SS`, formatet som 1.11.x-webtjenesten returnerte. Timer kan overstige 24. |

## Feil

| Status | Når |
|--------|------|
| `400` | En dato som ikke kan tolkes, eller `endDate` før `startDate` |
| `401` | Manglende eller ugyldige legitimasjonsopplysninger |
| `403` | Anroperen er verken administrator eller den aktuelle brukeren |
| `404` | Brukeren finnes ikke, eller tilhører ikke gjeldende tilgangs-URL |

## Hvordan tiden beregnes

Totalen er summen av `logout_date − login_date` over brukerens rader i tabellen `track_e_login`.

En tilkobling starter ved innlogging og forlenges mens brukeren er aktiv: siden brukeren har åpen, sender et tilstedeværelsessignal hvert minutt mens fanen er synlig, slik hver sidevisning gjorde i Chamilo 1.11.x. Etter lengre inaktivitet enn øktens levetid åpner neste aktivitet en ny tilkobling, slik at den inaktive perioden ikke telles. Utlogging avslutter den gjeldende tilkoblingen. Tid brukt av en administrator som bruker **Logg inn som**, legges ikke til brukeren.

> **Merk:** Tilkoblinger registrert før denne sporingen ble gjenopprettet, kan mangle utloggingsdato. De telles som null, så totaler over perioder før oppgraderingen kan være lavere enn tiden som faktisk ble brukt.