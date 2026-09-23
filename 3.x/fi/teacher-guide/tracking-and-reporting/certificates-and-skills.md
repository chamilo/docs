# Todistukset ja taidot

Chamilo mahdollistaa todistusten myöntämisen oppijoille, jotka täyttävät määritellyt saavutuskriteerit, sekä näihin saavutuksiin liittyvien taitojen vahvistamisen.

## Miten todistukset toimivat

Todistukset on kytketty **Arviointeihin** (kutsutaan myös nimellä Gradebook). Kun oppijan arvosana täyttää tai ylittää määrittämäsi vähimmäiskynnyksen, todistus tulee hänelle ladattavaksi.

Työnkulku on seuraava:

1. Määritä [Arvioinnit](../assessing-learners/gradebook.md) harjoituksineen, tehtävineen ja muine arvioitavine aktiviteetteineen
2. Määritä **vähimmäispistemäärä todistukselle** (esim. 70 %)
3. Kun oppija saavuttaa kyseisen pistemäärän, hän voi ladata todistuksensa (joko itse Arvioinnit-työkalusta tai oppimispolusta, jos olet määrittänyt sen viimeiseksi vaiheeksi). Opettajana voit myös käyttää arvosanakirjassa toimintoa **Luo todistukset** luodaksesi PDF-tiedostot eränä kaikille kelpoisille oppijoille.

## Todistuspohjat

Todistukset käyttävät alustan ylläpitäjän määrittelemiä pohjia. Pohja sisältää tyypillisesti:

* Oppijan nimen
* Kurssin nimen
* Suorituspäivän
* Saavutetun pistemäärän
* QR-koodin tai URL-osoitteen verkossa tapahtuvaa vahvistusta varten

## Todistuksen voimassaolo ja vanheneminen

Todistukset voidaan asettaa vanhenemaan tietyn päivämäärän kuluttua. [Arviointien](../assessing-learners/gradebook.md) juurikategorian asetuksissa, kun **Luo todistukset** on käytössä, näkyy kenttä **Todistuksen voimassaolo (päivää)**. Jätä se arvoon `0` (oletus), jos todistukset eivät vanhene koskaan, tai aseta päivien määrä, jonka kuluttua todistus vanhenee sen myöntämisestä.

Kunkin todistuksen oma vanhenemispäivä lasketaan automaattisesti tästä asetuksesta, kun todistus luodaan (tai luodaan uudelleen) — et aseta sitä todistuskohtaisesti. **Todistukset**-luettelossa näkyy kullekin oppijalle sarake **Vanhenemispäivä**, jossa lukee **Ei vanhene koskaan**, kun voimassaoloaikaa ei ole.

Jos kategorialle ei ole määritetty voimassaoloaikaa, voit silti asettaa (tai muuttaa) yksittäisen oppijan vanhenemispäivän käsin: napsauta kynäkuvaketta **Muokkaa vanhenemispäivää** hänen rivinsä vieressä ja valitse päivämäärä. Tämä painike on käytettävissä vain, kun kategorialla itsellään ei ole voimassaoloaikaa — kun voimassaoloaika on asetettu, vanhenemispäiviä hallitaan automaattisesti eikä niitä voi enää muokata todistuskohtaisesti.

![Todistusluettelo, jossa näkyy Vanhenemispäivä-sarake kolmelle oppijalle](../../.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Oppijoiden muistuttaminen tulevasta tai menneestä vanhenemisesta

Avaa arviointisi **Todistukset**-luettelo ja napsauta painiketta **Vanhenevat todistukset** <img src="../../.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Vanhenevat todistukset" data-size="line"> nähdäksesi, kenen oppijoiden todistukset ovat vanhentuneet tai ovat vanhenemassa. Sivu näyttää oppijakohtaisesti: todistuksen **Vanhenemispäivän**, sen **Tilan** (**Vanhentunut** tai **Vanhenee pian**) sekä milloin siitä lähetettiin **Viimeisin muistutus** (tai **Ei koskaan**). Käytä **Päiviä eteenpäin** laajentaaksesi tai kaventaaaksesi, kuinka pitkälle tulevaisuuteen ”vanhenee pian” ulottuu.

![Vanhenevat todistukset -sivu, jossa on yksi vanhentunut ja yksi pian vanheneva todistus](../../.gitbook/assets/gradebook-certificate-expirations.png)

Ilmoittaaksesi oppijoille itse:

1. Valitse oppijat, joille haluat lähettää muistutuksen (tai valitse kaikki)
2. Napsauta **Lähetä ilmoitus**
3. Tarkista esikatselu lähetettävästä sähköpostista — ”vanhenee pian” ja ”vanhentunut” -sanoituksille näytetään erilliset esikatselut sen mukaan, kumpaan tapaukseen valitsemasi oppijat kuuluvat
4. Vahvista napsauttamalla **Lähetä ilmoitus** uudelleen valintaikkunassa

![Lähetä ilmoitus -vahvistusikkuna, jossa esikatsellaan vanhenevan ja vanhentuneen sähköpostin sanoitusta](../../.gitbook/assets/gradebook-certificate-expiry-notification.png)

Kukin oppija saa ilmoituksen omalla määritetyllä kielellään sekä sähköpostitse että Chamilon sisäisellä viestillä. Uudelleenlähetys samalle todistukselle ja samalle vanhenemispäivälle on turvallista — Chamilo seuraa, mitä kullekin todistukselle on jo lähetetty, eikä spämmää oppijaa päällekkäisillä muistutuksilla, ellet nimenomaisesti lähetä uudelleen.

Ylläpitäjät voivat myös ajastaa nämä samat muistutukset automaattisesti, toistuvasti, ilman että opettajan tarvitsee käynnistää niitä käsin — katso [Cron-töiden asetukset](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Taidot

Taidot edustavat osaamista, jota oppijat hankkivat. Chamilossa:

* Taidot voidaan kytkeä arvosanakirjan saavutuksiin
* Kun oppija saa todistuksen, kaikki liittyvät taidot vahvistetaan automaattisesti
* Taidot kertyvät oppijan profiiliin ja muodostavat osaamisrekisterin
* Taitoja voidaan järjestää hierarkkisesti (esim. ”Data-analyysi” kohdan ”Tutkimusmenetelmät” alle)
* Taitoja voidaan arvioida edelleen vertaisarvioinnilla (360° arviointi)

## Sertifikaattien ja taitojen tilan tarkastelu

Opettajana näet:

* Ketkä oppijat ovat ansainneet sertifikaatteja kurssillasi
* Mitkä taidot on vahvistettu
* Oppijoiden edistymisen kohti sertifiointikynnystä
* Mitkä sertifikaatit ovat vanhentuneet tai vanhentumassa pian, ja onko niistä jo lähetetty muistutus

Oppijat voivat tarkastella omia sertifikaattejaan ja vahvistettuja taitojaan profiilistaan ja käyttää Taitopyörää tarkistaakseen, mitä taitoja organisaatiossa kysytään.

## Vinkkejä

* **Aseta selkeät odotukset** — Kerro oppijoille kurssin alussa, mitä heidän on saavutettava sertifikaatin saamiseksi
* **Käytä merkityksellisiä taitojen nimiä** — Taitojen tulisi kuvata, mitä oppija osaa tehdä, ei pelkästään kurssin nimeä
* **Yhdistä portfolioihin** — Kannusta oppijoita lisäämään sertifikaattinsa portfolioonsa
* **Laajenna sertifikaatteja** — Pyydä ylläpitäjääsi ottamaan käyttöön [Custom Certificate](../plugins/custom-certificate.md) -lisäosa, jotta saat vielä enemmän tehoa sertifikaattipohjien muokkaamiseen
* **Aseta voimassaoloaika vaatimustenmukaisuuteen perustuville sertifioinneille** — Jos sertifiointi vaatii määräajoin uusimista (esim. turvallisuuskoulutus), aseta **Sertifikaatin voimassaolo (päivää)**, jotta oppijat saavat muistutuksen ennen sen umpeutumista