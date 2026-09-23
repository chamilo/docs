# Taitojen hallinta

Tämä sivu käsittelee kolmea kojitusnäkymän kohtaa, joilla rakennetaan alustan taitoluettelo: taitojen joukkoon tuonti, taitomäärittelyjen hallinta sekä kunkin taidon liittäminen tasoasteikkoon.

## Taitojen tuonti

**Skills > Skills import** mahdollistaa taitohierarkian joukkotuonnin CSV- tai XML-tiedostosta sen sijaan, että taidot luotaisiin yksi kerrallaan. Jokaisella rivillä on oltava vähintään `id`, `parent_id` (puun rakentamiseen) ja `title`. Tiedoston pohjaksi on saatavilla mallipohja.

## Taitojen hallinta

**Skills > Manage skills** on pääasiallinen taitoluettelo: taitoja voi luoda, muokata, ottaa käyttöön/poistaa käytöstä ja poistaa. Jokaisella taidolla on otsikko, lyhyt koodi, kuvaus, kuvake ja valinnainen kriteerikuvaus (mitä oppijan on tehtävä ansaitakseen taidon). Taitoja voi sisäkkäistää — taidolla voi olla alataitoja — minkä [Skills Wheel](skills-wheel.md) visualisoi.

## Taitotasojen hallinta

**Skills > Manage skills levels** on erillinen, pienempi näyttö: se listaa olemassa olevat taidot ja antaa liittää kunkin **tasoprofiiliin** — nimettyyn, järjestettyyn tasojoukkoon (esimerkiksi Pronssi/Hopea/Kulta), jota vasten taitoa mitataan. Lyhyesti: käytä **Manage skills** -näkymää määrittämään, *mikä* taito on, ja **Manage skills levels** -näkymää määrittämään, millä asteikolla sitä mitataan.

## Miten taidot myönnetään

Taito myönnetään käyttäjälle (kirjataan myönnettynä taitona päivämäärineen) yhtä seuraavista reiteistä pitkin:

* Automaattisesti, kun oppija täyttää arviointikirjan kategorian kynnysarvon — määritetään [Skills and Assessments](skills-assessments.md) -sivulla
* Automaattisesti, kun suoritetaan tietyt kurssit, joihin taito on liitetty
* Manuaalisesti opettajan toimesta (jos **Teachers can assign skills** on käytössä) tai ylläpitäjän toimesta