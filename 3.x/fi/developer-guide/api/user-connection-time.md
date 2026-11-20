# Käyttäjän yhteysaika

`GET /api/users/{id}/connection-time` palauttaa kokonaisajan, jonka käyttäjä on ollut yhteydessä alustaan. Se korvaa version 1.11.x `webservices/api/v2.php`-verkkopalvelun `get_user_total_connexion_time`-toiminnon, ja sitä voidaan rajata ajanjaksoon.

## Käyttöoikeus

| Kutsuja | Sallittu |
|--------|---------|
| `ROLE_ADMIN` | Mikä tahansa nykyisen käyttö-URL-osoitteen käyttäjä |
| Mikä tahansa todennettu käyttäjä | Vain oma yhteysaika |
| Kuka tahansa muu | `403 Forbidden` |

Päätepiste ottaa käyttäjän numeerisen tunnisteen. Jos aloitat käyttäjänimestä, hae käyttäjä ensin kutsulla `GET /api/users?username=...`.

## Pyyntö

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Kyselyparametri | Pakollinen | Kuvaus |
|-----------------|----------|-------------|
| `startDate` | Ei | ISO 8601 -päivämäärä ja -aika. Vain yhteydet, jotka **alkoivat** tällä hetkellä tai sen jälkeen, lasketaan. |
| `endDate` | Ei | ISO 8601 -päivämäärä ja -aika, ei ennen `startDate`-arvoa. Vain yhteydet, jotka **päättyivät** tällä hetkellä tai sitä ennen, lasketaan. |

Ilman kumpaakaan parametria jokainen yhteys lasketaan. Vain `startDate`-parametrilla yhteydet lasketaan kyseisestä päivämäärästä alkaen ilman päättymisrajaa. Vain `endDate`-parametrilla yhteydet lasketaan kyseiseen päivämäärään asti ilman alkamisrajaa.

Raja-arvon kanssa limittäin olevaa yhteyttä (esimerkiksi sellaista, joka alkoi ennen `startDate`-arvoa) ei lasketa lainkaan: yhteysaikoja ei koskaan jaeta. Tämä on sama sääntö kuin version 1.11.x raportoinnin mukautetussa ajanjaksosuodattimessa.

Sisällytä aikavyöhykkeen siirtymä. URL-osoitteessa `+` on koodattava muodossa `%2B`. Arvo ilman siirtymää luetaan palvelimen aikavyöhykkeessä.

## Vastaus

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Kenttä | Kuvaus |
|-------|-------------|
| `totalConnectionTime` | Kokonaismäärä sekunteina |
| `totalConnectionTimeFormatted` | Sama kokonaismäärä muodossa `HH:MM:SS`, jonka version 1.11.x verkkopalvelu palautti. Tunnit voivat ylittää 24. |

## Virheet

| Tila | Milloin |
|--------|------|
| `400` | Päivämäärää ei voida jäsentää, tai `endDate` on ennen `startDate`-arvoa |
| `401` | Tunnistetiedot puuttuvat tai ovat virheelliset |
| `403` | Kutsuja ei ole järjestelmänvalvoja eikä kyseinen käyttäjä |
| `404` | Käyttäjää ei ole olemassa, tai hän ei kuulu nykyiseen käyttö-URL-osoitteeseen |

## Miten aika lasketaan

Kokonaismäärä on summa `logout_date − login_date` käyttäjän riveistä `track_e_login`-taulussa.

Yhteys alkaa kirjautumisesta ja jatkuu, kun käyttäjä on aktiivinen: käyttäjän avoinna oleva sivu lähettää läsnäolosignaalin minuutin välein, kun sen välilehti on näkyvissä, kuten jokainen sivun katselu teki Chamilo 1.11.x:ssä. Jos passiivisuus kestää pidempään kuin istunnon elinaika, seuraava toiminto avaa uuden yhteyden, joten joutoaikaa ei lasketa. Uloskirjautuminen sulkee nykyisen yhteyden. Aikaa, jonka järjestelmänvalvoja käyttää toiminnolla **Kirjaudu käyttäjänä**, ei lisätä käyttäjälle.

> **Huomautus:** Ennen tämän seurannan palauttamista tallennetuilla yhteyksillä ei välttämättä ole uloskirjautumispäivämäärää. Ne lasketaan nollaksi, joten päivitystä edeltävien ajanjaksojen kokonaismäärät voivat olla pienempiä kuin todellisuudessa käytetty aika.