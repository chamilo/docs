# Tehtävägeneraattori

Tekoälypohjainen tehtävägeneraattori auttaa luomaan tenttikysymyksiä automaattisesti tekoälyn avulla. Annat aiheen tai sisällön, ja tekoäly tuottaa kysymyksiä, joita voit tarkistaa, muokata ja lisätä tehtäviisi.

## Tehtävägeneraattorin avaaminen

Tehtävägeneraattori on käytettävissä tehtävää luotaessa tai muokattaessa, kun seuraavat ehdot täyttyvät:

1. Tekoälyavustajat on otettu käyttöön alustatasolla
2. Vähintään yksi tekoälytekstipalveluntarjoaja on määritetty

Etsi **AI Generator** -painiketta tai -osiota tehtävän luontikäyttöliittymästä.

## Kysymysten tuottaminen

![Tekoälypohjaisen tehtävägeneraattorin lomake, jossa on kentät aiheelle ja kysymysten määrälle](../../.gitbook/assets/ai-exercise-generator.png)

Generaattori tarjoaa kaksi tilaa, jotka ovat käytettävissä välilehtinä:

* **Test from topic** — Tuota kysymyksiä tekstuaalisesta aihekuvauksesta
* **Test from document** — Tuota kysymyksiä kurssin asiakirjasta (käytettävissä vain, kun asiakirjoja tukeva palveluntarjoaja on määritetty). Tässä tilassa aihekenttä on valinnainen ja sitä käsitellään lisävinkkinä.

1. Avaa AI Generator -lomake tehtävässä ja valitse tila
2. Määritä tuotannon parametrit:
   * **Quiz title** — Tuloksena olevan tehtävän otsikko
   * **Questions topic** — Kuvaa, mistä kysymysten tulisi käsitellä (tai asiakirjatilassa valinnainen vinkki)
   * **Number of questions** — Kuinka monta kysymystä tuotetaan (enintään 100)
   * **Question type** — Tällä hetkellä tarjolla on vain **Multiple answer**
   * **AI provider** — Valitse käytettävä tekoälypalveluntarjoaja (näkyy vain, kun useampi kuin yksi on määritetty)
3. Napsauta **Generate**
4. Tekoäly tuottaa joukon kysymyksiä vastausvaihtoehtoineen ja merkittyine oikeine vastauksineen. Kun tekoälyn paljastaminen on käytössä, tuotetut kysymykset saavat etuliitteen **\[AI-assisted\]**.

## Tarkistaminen ja muokkaaminen

![Tekoälyn tuottamat kysymykset näytetään tarkistettaviksi, ja kullekin on vaihtoehdot muokata, hyväksyä tai poistaa](../../.gitbook/assets/ai-exercise-generator-results.png)

Tuotetut kysymykset esitetään **ehdotuksina**. Sinun tulisi:

* **Tarkistaa jokainen kysymys** tarkkuuden ja relevanssin osalta
* **Muokata sanamuotoa** tarvittaessa — säätää kysymyksiä, vastausvaihtoehtoja ja palautetta
* **Varmistaa oikeat vastaukset** — varmistaa, että tekoäly on tunnistanut oikeat vastaukset
* **Poistaa sopimattomat kysymykset** — poistaa kaikki, jotka eivät täytä standardejasi
* **Säätää pisteytystä** — asettaa kullekin kysymykselle sopivat pistemäärät

Kun olet tyytyväinen, lisää kysymykset tehtävääsi.

Huomaa, että tietyistä muotopyynnöistämme huolimatta jotkin mallit palauttavat kysymysten otsikot numerolla etuliitteellä. Emme suosittele jättämään sitä numeroa paikalleen, koska se haittaa kysymysten sekoittamista testeissä, joissa kysymykset valitaan satunnaisesti. Joskus et myöskään saa niin monta kysymystä kuin pyysit, joten tarkista tämä ja tuota tarvittaessa lisää kysymyksiä tai vaihda mallia, jos se on mahdollista.

## Tekoälyllä tuotetun sisällön paljastaminen

Tekoälyn tuottama sisältö merkitään paljastamisilmoituksella, joka osoittaa, että se on luotu tekoälyn avulla. Tämä läpinäkyvyys auttaa oppijoita ymmärtämään materiaalin alkuperän.

## Vinkkejä

* **Anna tarkkoja aiheita** — Mitä tarkempi aihekuvauksesi on, sitä relevantimpia tuotetut kysymykset ovat.
* **Tarkista aina** — Tekoälyn tuottama sisältö voi sisältää virheitä. Älä koskaan julkaise kysymyksiä tarkistamatta niitä ensin.
* **Käytä lähtökohtana** — Tuotetut kysymykset säästävät aikaa, eivät ole valmis tuote. Muokkaa niitä vastaamaan opetusotettasi ja kurssisisältöäsi.
* **Yhdistä manuaalisiin kysymyksiin** — Yhdistä tekoälyn tuottamia kysymyksiä manuaalisesti luotuihin parhaan tuloksen saamiseksi.
* **Kokeile eri palveluntarjoajia** — Jos useita tekoälypalveluntarjoajia on käytettävissä, kokeile eri vaihtoehtoja nähdäksesi, mikä tuottaa parhaat kysymykset aihealueellesi.