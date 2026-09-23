# Huoneiden hallinta

Huoneet Chamilossa on järjestetty toimipisteiden alle: toimipiste on fyysinen sijainti, ja kukin huone kuuluu täsmälleen yhteen toimipisteeseen.

## Toimipisteet

**Huoneet > Toimipisteet** hallinnoi organisaatiosi fyysisiä sijainteja — rakennusta, kampusta tai toimistoa. Toimipisteitä voi sisäistää (toimipisteellä voi olla alatoimipisteitä), joten voit mallintaa esimerkiksi rakenteen "Pääkampus > Rakennus A."

Kentät, jotka voit asettaa toimipisteelle:

* **Otsikko** ja **Kuvaus**
* **Ylätoimipiste** — Toimipisteiden hierarkkiseen järjestämiseen
* **IP-osoite** — Valinnainen, verkkopohjaista tunnistusta varten
* **Leveysaste / Pituusaste** — Karttaa varten
* **Lataus- / Lähetysnopeus** ja **Viive** — Valinnainen verkon laatua kuvaava metadata
* **Ylläpitäjän sähköposti, nimi ja puhelin** — Yhteystiedot sen henkilön osalta, joka hallinnoi kyseistä sijaintia

## Huoneet

**Huoneet > Huoneet** hallinnoi varsinaisia varattavia tiloja toimipisteen sisällä — tyypillisesti luokkahuonetta tai koulutustilaa. Jokaisen huoneen on kuuluttava toimipisteeseen.

Kentät, jotka voit asettaa huoneelle:

* **Otsikko** ja **Kuvaus**
* **Toimipiste** — Mihin toimipisteeseen tämä huone kuuluu (pakollinen)
* **Kerrosnumero**
* **Kapasiteetti** — On oltava positiivinen luku
* **Sijaintitieto**, **IP-osoite** ja **IP-maski** — Valinnaisia edistyneitä kenttiä

Jokaisella huoneella on myös "Käyttö"-kalenterinäkymä, joka näyttää sen varaukset, sekä sitä käyttävien kurssien määrä.

## Liittyvää

Jos haluat etsiä vapaata huonetta tietylle aikavälille sen sijaan, että selaat listaa, katso [Huoneen saatavuuden haku](room-availability-finder.md).