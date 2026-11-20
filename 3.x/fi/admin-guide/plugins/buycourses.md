# BuyCourses: Maksut ja toistuvat palvelut

**BuyCourses**-lisäosa myy pääsyn kursseille ja istuntoihin ja voi tarjota maksullisia palveluita. Maksutavat riippuvat siitä, mitkä maksuyhdyskäytävät asennukseen on määritetty.

## Maksujen määritys

Avaa **Hallinta > Lisäosat > BuyCourses** ja siirry sen maksujen määritysalueelle. Säilytä yhdyskäytävän tunnukset palvelimella, älä oppijalle näkyvällä sivulla. Olemassa olevat menetelmät, kuten Stripe ja PayPal, toimivat edelleen BTCPay Serveristä riippumatta.

### BTCPay Server (kurssi- ja istunto-ostot)

Lisäosa tukee myös **BTCPay Serveriä** kurssien ja istuntojen ostoihin:

1. Ota BTCPay-maksutapa käyttöön BuyCourses-määrityksessä.
2. Aseta BTCPayn **Server URL**, **Store ID**, **Greenfield API key** ja **webhook secret**.
3. Käytä maksujen määrityksen **yhteystestiä** vahvistaaksesi Greenfield API -käytön.
4. Määritä webhook BTCPayn päässä käyttäen lisäosan näyttämää webhook-URL-osoitetta ja samaa salaisuutta.
5. Tee pieni testioosto ennen kuin tarjoat tätä vaihtoehtoa oppijoille.

Ostaja ohjataan BTCPayn isännöimään kassaan. Chamilo tarkistaa webhook-allekirjoitukset ja hakee laskun uudelleen vahvistaakseen **kaupan, summan, valuutan ja tilauksen tiedot** ennen kuin tilaus merkitään maksetuksi ja ostaja ilmoitetaan. Selaimen paluu voi täsmäyttää puuttuneen tai viivästyneen webhookin. Toistuvat ilmoitukset eivät luo päällekkäistä toimitusta.

Vain vahvistetut selvitytetyt maksut (mukaan lukien hyväksytyt ylimaksut ja nimenomaisesti ylläpitäjän selvitytetyiksi merkitsemät laskut) myöntävät pääsyn. **Osittaisia, myöhästyneitä, vanhentuneita tai virheellisiä maksuja ei saa käsitellä automaattisesti toimitettuina**; poikkeukselliset maksut edellyttävät manuaalista tarkistusta.

**Olemassa olevat asennukset:** Suorita lisäosan päivitystoimenpide kerran luodaksesi taulun `plugin_buycourses_btcpay_account`. Ylläpitäjä voi avata polun `/plugin/BuyCourses/update.php` tai tallentaa BTCPay-maksujen määrityksen, mikä myös varmistaa, että lisäosan taulu on olemassa. Tämä päivitys koskee vain BuyCoursesia, ei yleistä tietokantamigraatiota.

BTCPayta **ei** ole tässä dokumentoitu toistuvien palveluiden yhdyskäytäväksi; älä oleta, että se toteuttaa Stripen tai PayPalin kaltaiset automaattiset tilausten uusinnat.

## Toistuvan palvelun elinkaari

Oppijat voivat käyttää **Omat palvelut** -näkymää tarkastellakseen aktiivisia toistuvia palveluitaan sekä osto- ja maksuhistoriaansa. Palveluille, joilla on tuettu automaattinen uusinta:

* Jokaisella uusintamaksulla on oma historiatietueensa ja kuittinsa.
* Uusinnan peruuttaminen estää tulevat veloitukset, mutta jättää maksetun palvelun käytettäväksi, kunnes nykyinen maksettu jakso päättyy.
* Ylläpitäjät voivat myös peruuttaa uusintoja **palvelumyyntiraportista**.
* Aktiivinen, odottava tai muuten voimassa oleva toistuva tilaus on suojattu päällekkäisiltä ostoilta.
* Vanhentuneen tai kokonaan peruutetun palvelun voi ostaa uudelleen.

**Ostohistoria** ja **maksuhistoria** ovat erillisiä: yhdellä palveluostolla voi olla useita uusintamaksuja. Älä päättele, että uusittu maksu on toinen osto.

## Palvelumyynnin maksusummat

Ylläpitäjän **palvelumyyntiraportissa** kaksi saraketta auttaa erottamaan alkuperäisen tilaussumman ajan kuluessa kerätyistä maksuista:

* **Viimeisin maksu** näyttää kyseisen palvelumyynnin viimeisimmän kirjatun onnistuneen maksun päivämäärän. Jos maksupäivää ei ole saatavilla, raportti näyttää viivan.
* **Kerätty yhteensä** näyttää alun perin kerätyn ostosumman sekä kirjatut onnistuneet uusintasummat palvelun valuutassa muotoiltuna. Se ei ole sama kuin yhden laskutusjakson hinta.

Laskenta käyttää palvelumyynnin auditointihistoriaa, välttää päällekkäisten uusintatapahtumien laskemisen ja huomioi alkuperäisen Stripe-tilausveloituksen laskematta sitä kahdesti. Poikkeuksellisissa maksu- tai hyvitystapauksissa täsmäytä raportti maksupalveluntarjoajan kanssa; näytetty summa ei ole yhdyskäytävän maksusuoritus eikä erillinen hyvityskirjanpito.

## Historialliset Stripe-tilaukset

BuyCourses voi täsmäyttää Stripen laskuhistorian vanhemmille toistuville palveluille, joiden uusintatapahtumia ei ole kirjattu täysin lisäosan auditointilokiin. **Omat palvelut** -näkymä ja palvelumyyntiraportti voivat päivittää nämä tietueet sekä paikallisesti tunnetun maksetun jakson ja summat. Ylläpitäjien tulee tarkistaa poikkeukselliset maksuhistoriaerot Stripeä vasten sen sijaan, että muokkaisivat myyntejä suoraan.

## Myyntiraporttien suodattaminen

**Kurssi- ja istuntomyyntiraporttia** voi suodattaa tilauksen tilan, käyttäjän, aikavälin tai sähköpostin mukaan. Valinnaiset tuotesuodattimet mahdollistavat tulosten rajaamisen tuotetyypin ja tuotenimen mukaan. **Palvelumyyntiraportti** tukee tilasuodatusta sekä käyttäjä-, sähköposti-, nimi- ja tilausviitehakua sekä palvelunimen hakua. Tarkista aktiiviset suodattimet ennen myyntien vientiä tai täsmäytystä; kahdella raporttinäytöllä on erilaiset suodatinohjaimet.

Katso [BuyCourses-myyntisuodattimet PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Tilaukseen sidottu kurssin elinkaari ja poiston suojaukset

BuyCourses voi sulkea, piilottaa ja aktivoida uudelleen toistuviin palvelutilauksiin liittyviä kursseja niiden maksutilan muuttuessa. Palvelun **Subscription behavior JSON** -asetuksessa `hide_after_days` määrittää viiveen sulkemisen jälkeen ennen kurssin piilottamista (oletus 30 päivää), kun taas `delete_after_days` määrittää viiveen piilottamisen jälkeen ennen pysyvää poistoa. Poisto on oletuksena pois käytöstä (`null`); vain positiivinen arvo tekee kurssista kelvollisen.

Ylläpitäjät voivat tarkastella kelvollisia, odottavia ja estettyjä kursseja osoitteessa `/admin/buycourses/course-lifecycle`. Käyttöliittymä tukee tuhoamatonta simulaatiota ja kohdennettua poistoa, jossa poistetaan **yksi kelvollinen kurssi suoritusta kohden**, ja poisto edellyttää nimenomaista vahvistusta. CLI-käsittelijä `chamilo:buycourses:process-recurring-subscriptions` tukee myös valitsimia `--dry-run`, `--delete-expired` ja `--max-deletions` (1–25). Ilman valitsinta `--delete-expired` se ei poista kursseja pysyvästi.

**Pysyvä poisto on tuhoava.** Säilytä varmuuskopiot ja testaa ensin kertakäyttöisillä kursseilla. Kelpoisuustarkistukset suojaavat aktiivisia myyntejä, istuntoon sidottuja kursseja ja ristiriitaista omistajuutta; automaattinen poisto on estetty usean käyttö-URL:n asennuksissa. Tarkista samanaikainen uusimis- ja poistokäyttäytyminen ennen tuhoavan siivouksen ajastamista tuotannossa. Katso [tilauksen kurssin elinkaari PR #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Toiminnalliset tarkistukset

Päivityksen jälkeen testaa täydellinen kurssin osto, istunnon osto jos sitä myydään, viivästynyt tai uudelleentoistettu webhook, vanhentuneet ja osittaiset BTCPay-laskut, automaattinen uusiminen sekä peruutus, jossa käyttöoikeus säilyy maksetun jakson loppuun. Pidä tunnukset ja webhook-salaisuudet poissa kuvakaappauksista, lokeista ja tukipyynnöistä.

## Maksujen koventaminen

### Maksuyhdyskäytävän summan tarkistus (Redsys / Cecabank)

Kun pankki ilmoittaa alustalle maksun onnistuneen, BuyCourses vertaa pankin veloittamaa summaa (senteissä, allekirjoitetusta ilmoituksesta) myynnin hintaan. Jos ne eroavat, ilmoitus hylätään, myynti pysyy odottavana ja PHP-virhelokiin kirjoitetaan rivi `[BuyCourses] Redsys notification refused` tai `[BuyCourses] Cecabank notification refused`. Normaalit maksut eivät muutu.

Jos myynti pysyy odottavana vaikka ostaja on maksanut, tarkista loki: tilauksen luomisen jälkeen muuttunut hinta tai osittainen maksu näkyy siellä. Viimeistele tällainen myynti manuaalisesti myyntiraportista, kun se on vahvistettu.

### Turvatunnukset

* Kuponkilomakkeet (lisää / määritä), julkisten suunnitelmakorttien lomake ja maksusuoritustoiminnot käyttävät samaa BuyCourses-ylläpitotunnusta kuin kaikki muutkin lisäosan ylläpitosivut. Pitkään auki jätetty lomake toimii edelleen niin kauan kuin istunto on voimassa; ulos- ja sisäänkirjautumisen jälkeen lataa sivu uudelleen ennen tallentamista (muuten näytetään viesti "Not validated").
* "Pyydä lasku" -sivu (`request_invoice.php`) ja `process_recurring_subscriptions.php`-tiedoston web-käynnistin tarvitsevat tunnuksen linkissä (`buycourses_admin_sec_token=...`). Kirjanmerkkeihin tallennetut tai sähköpostitetut linkit ilman sitä näyttävät viestin "Not validated". Komentorivi-/cron-ajo (`php .../process_recurring_subscriptions.php` tai konsolikomento) on ennallaan eikä tarvitse tunnusta.
* Onnistumissivut (PayPal, Stripe, tilaukset, palvelut) näyttävät myynnin vain sen ostaneelle käyttäjälle.
* Maksusuoritustoiminnot (PayPal-massamaksu, maksusuorituksen peruutus) on rajoitettu alustan ylläpitäjille (istuntoylläpitäjiä ei enää hyväksytä), ja ne on lähetettävä POST-pyyntönä tunnuksen kanssa.

### Päivämäärät

Tilausmyynnin päättymispäivä lasketaan nyt aina UTC-ajassa, kuten myyntipäiväkin, riippumatta palvelimen aikavyöhykkeestä.

### Usean URL:n rajoitukset

Palvelun vanhentuessa sovellettavat kurssien luonti- ja isännöintirajoitukset noudattavat samaa sääntöä kuin muu alusta: pää-URL:ssa lukittu tai muutettavaksi merkitsemätön asetus ei ole toisen URL:n ohitettavissa.

Muutokset: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [toistuvat palvelut #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-täsmäytys #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [palvelumyyntien summat #9220](https://github.com/chamilo/chamilo-lms/pull/9220).