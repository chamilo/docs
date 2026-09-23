# Arvioinnit

Arvioinnit (aiemmin *gradebook*) kokoavat pisteet harjoituksista, tehtävistä ja muista arvioiduista aktiviteeteista yhtenäiseksi näkymäksi kunkin oppijan suorituksesta. Ne ohjaavat myös todistusten luontia.

## Miten arvioinnit toimivat

Arvioinnit ovat painotettuja pisteytysjärjestelmiä. Määrittelet:

1. **Mitkä aktiviteetit** vaikuttavat arvosanaan (harjoitukset, tehtävät, läsnäolo jne.)
2. **Painon** kullekin aktiviteetille (kuinka paljon se vaikuttaa lopulliseen arvosanaan)
3. **Vähimmäistodistuspisteet** (kynnys todistuksen saamiseksi)
4. **Vähimmäispisteet aktiviteettia kohden** — Jokaisella arvioinnin aktiviteetilla voi olla oma **vähimmäispistemäärä**. Oppijat, jotka jäävät alle tämän vähimmäisen keskeisessä aktiviteetissa, voidaan estää saavuttamasta tavoitteita ja saamasta todistusta, vaikka heidän kokonaispainotettu summansa olisi muuten riittävän korkea.

Aktiviteetteja on kahdenlaisia:
* **Luokka-aktiviteetti** (tai lähiaktiviteetti), jossa arvosanat on tuotava jostain muusta lähteestä
* **Verkkoaktiviteetti**, joka valitaan kurssista ja jonka arvosanat saadaan aktiviteetin suorittamisesta kurssilla

Chamilo laskee kunkin oppijan kokonaisarvosanan näiden painojen perusteella.

## Arvioinnin määrittäminen

1. Avaa **Arvioinnit**-työkalu <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Arviointi" data-size="line"> kurssin etusivulta
2. Näet arviointien yleiskatsauksen, aluksi tyhjänä

### Aktiviteettien lisääminen

1. Napsauta **Lisää verkkoaktiviteetti**
2. Valitse tyyppi:
   * **Testi** — Linkitä tietty harjoitus kurssista
   * **Tehtävä** — Linkitä opiskelijajulkaisukansio
   * **Oppimispolku** — Linkitä oppimispolun suoritus
   * **Läsnäolo** — Linkitä läsnäololista
   * **Foorumiketju** — Linkitä foorumiketju (joka on arvioitava manuaalisesti)
   * **Kysely** — Linkitä kysely
3. Valitse tietty aktiviteetti valitun tyypin sisältä
4. Aseta **paino** tälle aktiviteetille (esim. 30 % välikokeelle, 40 % lopputyölle)
5. Aseta **vähimmäispisteet**, jos sovellettavissa
6. Tallenna

Kaikkien aktiviteettien painojen summan tulisi olla 100 %.

### Alakategoriat

Monimutkaisissa arviointimalleissa voit luoda **alakategorioita** liittyvien aktiviteettien ryhmittelyyn:

* **Esimerkki**: "Kotitehtävät"-alakategoria (paino: 30 %), joka sisältää viisi erillistä tehtävää, joista kukin on 20 % alakategoriasta
* Alakategoriat mahdollistavat arvioinnin hierarkkisen organisoinnin pitäen kokonaislaskennan yksinkertaisena

## Arvosanojen tarkastelu

![Arvioinnin yleiskatsaustaulukko, jossa näkyvät oppijoiden nimet, aktiviteettipisteet ja painotetut kokonaissummat](../../.gitbook/assets/gradebook-overview.png)

Arviointi näyttää taulukon, jossa on:

* Kunkin oppijan nimi
* Pisteet kullekin aktiviteetille
* Painotettu kokonaissumma
* Täyttääkö oppija todistuksen ehdot

Voit lajitella minkä tahansa sarakkeen mukaan tunnistaaksesi nopeasti parhaat suorittajat tai vaikeuksissa olevat oppijat.

### Pistejakaumakaaviot

Taulukon alapuolella ja **Graafinen näkymä** -sivulla arviointi piirtää yhden pylväskaavion aktiviteettia kohden sekä yhden kokonaissummalle. Kukin kaavio on pylväskaavio: vaaka-akseli luettelee pisterajat alimmasta korkeimpaan, ja kunkin pylvään korkeus on oppijoiden määrä kyseisessä vaihteluvälissä.

**Kokonaissumma**-kaavio merkitsee myös luokan keskiarvon. Punainen piste sijaitsee vaihteluvälillä, jossa keskiarvo on, ja selite antaa tarkan prosenttiosuuden.

Nämä kaaviot näkyvät vain, kun pisteiden näyttösäännöt on asetettu. Jos näet viestin *To view graph score rule must be enabled*, määritä vaihteluvälit ensin arvioinnin pisteytysasetuksissa.

## Todistukset

Todistusten luonnin ottaminen käyttöön:

1. Arviointiasetuksissa aseta **vähimmäistodistuspisteet** (esim. 70 %)
2. Kun oppijan painotettu kokonaissumma täyttää tai ylittää tämän kynnyksen (eikä hän ole epäonnistunut missään aktiviteettikohtaisessa vähimmäispistemäärässä), hän voi ladata todistuksensa
3. Todistus luodaan mallista, jonka alustan ylläpitäjä on määrittänyt

Kun **Luo todistuksia** on käytössä juurikategoriassa, näkyviin tulee kenttä **Todistuksen voimassaolo (päivää)**. Jätä se arvoon `0` todistuksille, jotka eivät vanhene, tai aseta päivien määrä, jonka jälkeen todistus vanhenee — Chamilo voi sen jälkeen muistuttaa oppijoita vanhenemispäivän lähestyessä, joko automaattisesti (cron, ylläpitäjän määrittämä) tai manuaalisesti todistuslistasta.

![Kategorian muokkausikkuna, jossa Luo todistuksia on käytössä ja Todistuksen voimassaolo (päivää) -kenttä on asetettu arvoon 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Katso lisätietoja kohdasta [Todistukset ja taidot](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).

## Linkittäminen taitoihin

Voit liittää **taitoja** arviointiin. Kun oppija saavuttaa asetetut tavoitteet arvioinnin suorittamiseksi, hän voi saada todistuksen, taidon tai molemmat. Taidot näkyvät hänen profiilissaan sosiaalisessa verkostotilassa. Tämä rakentaa osaamisrekisteriä ajan myötä.

## Arvosanojen vieminen

Napsauta **Vie**-painiketta <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Vie" data-size="line"> ladataksesi arvosanat taulukkolaskentatiedostona. Tämä on hyödyllistä, kun:

* Jaetaan arvosanoja hallintojärjestelmien kanssa
* Tehdään lisäanalyysiä Chamilon ulkopuolella
* Säilytetään offline-tietueita

## Vinkkejä

* **Suunnittele painotukset ajoissa** — Määritä arviointijärjestelmä kurssin alussa, jotta oppijat tietävät, mitä odottaa
* **Käytä alakategorioita monimutkaisilla kursseilla** — Ryhmittele tehtävät, tentit ja osallistuminen selkeisiin kategorioihin
* **Aseta merkitykselliset läpäisykynnykset** — Sertifiointipisteiden tulee kuvastaa todellista osaamista, ei pelkkää osallistumista
* **Tarkista säännöllisesti** — Käy arviointikirjaa läpi säännöllisesti varmistaaksesi, että kaikki aktiviteetit on linkitetty oikein ja pisteet kirjataan