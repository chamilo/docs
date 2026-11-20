# Verbindingstijd van de gebruiker

`GET /api/users/{id}/connection-time` geeft de totale tijd terug die een gebruiker verbonden was met het platform. Het vervangt de actie `get_user_total_connexion_time` van de 1.11.x-webservice `webservices/api/v2.php` en kan worden beperkt tot een periode.

## Toegang

| Aanroeper | Toegestaan |
|--------|---------|
| `ROLE_ADMIN` | Elke gebruiker van de huidige toegangs-URL |
| Elke geauthenticeerde gebruiker | Alleen de eigen verbindingstijd |
| Iedereen anders | `403 Forbidden` |

Het eindpunt neemt het numerieke id van de gebruiker. Om vanuit een gebruikersnaam te starten, zoek de gebruiker eerst op met `GET /api/users?username=...`.

## Aanvraag

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Queryparameter | Verplicht | Beschrijving |
|-----------------|----------|-------------|
| `startDate` | Nee | ISO 8601-datum-tijd. Alleen verbindingen die op of na dit moment **zijn gestart**, worden geteld. |
| `endDate` | Nee | ISO 8601-datum-tijd, niet vóór `startDate`. Alleen verbindingen die op of vóór dit moment **zijn beëindigd**, worden geteld. |

Zonder een van beide parameters wordt elke verbinding geteld. Met alleen `startDate` worden verbindingen vanaf die datum geteld, zonder eindlimiet. Met alleen `endDate` worden verbindingen tot die datum geteld, zonder startlimiet.

Een verbinding die een grens overlapt (bijvoorbeeld een die vóór `startDate` is gestart) wordt helemaal niet geteld: verbindingstijden worden nooit gesplitst. Dit is dezelfde regel als het aangepaste periodefilter van de 1.11.x-rapportage.

Neem de tijdzone-offset op. In een URL moet `+` worden gecodeerd als `%2B`. Een waarde zonder offset wordt gelezen in de tijdzone van de server.

## Antwoord

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Veld | Beschrijving |
|-------|-------------|
| `totalConnectionTime` | Totaal in seconden |
| `totalConnectionTimeFormatted` | Hetzelfde totaal als `HH:MM:SS`, het formaat dat de 1.11.x-webservice teruggaf. Uren kunnen 24 overschrijden. |

## Fouten

| Status | Wanneer |
|--------|------|
| `400` | Een datum die niet kan worden geparseerd, of `endDate` vóór `startDate` |
| `401` | Geen of ongeldige referenties |
| `403` | De aanroeper is noch een beheerder noch de betreffende gebruiker |
| `404` | De gebruiker bestaat niet, of behoort niet tot de huidige toegangs-URL |

## Hoe de tijd wordt berekend

Het totaal is de som van `logout_date − login_date` over de rijen van de gebruiker in de tabel `track_e_login`.

Een verbinding begint bij het aanmelden en wordt verlengd zolang de gebruiker actief is: de pagina die de gebruiker open heeft, stuurt elke minuut een aanwezigheidssignaal zolang het tabblad zichtbaar is, zoals elke paginaweergave deed in Chamilo 1.11.x. Na een langere inactiviteit dan de sessieduur opent de volgende activiteit een nieuwe verbinding, zodat de inactieve periode niet wordt geteld. Afmelden sluit de huidige verbinding. Tijd die een beheerder besteedt met **Inloggen als** wordt niet aan de gebruiker toegevoegd.

> **Opmerking:** Verbindingen die zijn vastgelegd voordat deze tracking werd hersteld, hebben mogelijk geen afmelddatum. Ze tellen als nul, zodat totalen over perioden vóór de upgrade lager kunnen zijn dan de werkelijk bestede tijd.