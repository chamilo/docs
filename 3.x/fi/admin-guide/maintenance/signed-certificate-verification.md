# Allekirjoitetun todistuksen varmennus

Chamilo voi myöntää **digitaalisesti allekirjoitettuja tunnuksia** arvosanakirjan todistuksille ja valinnaisesti ankkuroida tunnuksen sormenjäljen **Sepolia Ethereum -testiverkkoon**. Allekirjoitus ja varmennussivu eroavat tavallisista PDF-todistuksista.

## Ota allekirjoitetut tunnukset käyttöön

Kohdassa **Hallinta > Määritysasetukset > Todistukset** ota käyttöön `certificate.blockchain_verification_enabled`, jos oppilaitoksesi aikoo käyttää tätä ominaisuutta. Se on oletuksena pois käytöstä. Portaalin on käytettävä HTTPS-protokollaa tunnusten myöntämiseen.

## Oppijan suostumus tulee ensin

Todistuksen omistaja avaa kohdan **Omat todistukset** ja valitsee nimenomaisesti **Hyväksy julkaisu**. Suostumus kattaa julkisesti varmennettavan tunnuksen, jossa näkyvät haltijan nimi, kurssi, pistemäärä ja myöntämispäivä sekä valinnaisesti SHA-256-sormenjälki Sepoliassa. Hyväksyntä ei ole automaattinen. Oppija voi myöhemmin valita **Peru suostumus**; peruutus vaikuttaa varmennussivun näyttämään voimassaoloon, mutta **jo vahvistettua lohkoketjusormenjälkeä ei voi poistaa**.

## Myöntäminen, varmennus ja peruutus

Suoraan todennettu alustan ylläpitäjä voi käyttää arvosanakirjan **Todistukset**-luetteloa allekirjoitetun tunnuksen myöntämiseen, kun sen omistaja on antanut suostumuksensa. Tuloksena oleva varmennuslinkki käyttää muotoa `/certificates/verify/{token}`; saatavilla on myös `.json`-varmennusvastaus. Sivu tarkistaa kryptografisen allekirjoituksen, suostumuksen, peruutuksen, vanhenemisen ja sen, vastaavatko taustalla olevat todistustiedot edelleen allekirjoitettua lähdettä.

Jos tunnus peruutetaan, suostumus perutaan, todistus muuttuu tai allekirjoitus on virheellinen, varmennin ilmoittaa kyseisen tilan sen sijaan, että raportoisi tunnuksen voimassa olevaksi.

## Valinnainen Sepolia-ankkurointi

Ylläpitäjä voi valita **Ankkuroi Sepolia-testiverkkoon** tuetulla selainlompakolla tai **Vahvista olemassa oleva Sepolia-tapahtuma** vireillä olevan tapahtuman täsmäyttämiseksi. Lompakon on oltava yhdistettynä Sepoliaan (ketjutunnus `11155111`). Sovellus vahvistaa tapahtuman palvelimelle määritetyllä **HTTPS Sepolia RPC -päätepisteellä** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Pyynnössä toimitettua RPC-URL-osoitetta ei hyväksytä.

Vain tunnuksen sormenjälki ankkuroidaan; henkilötietoja ei lähetetä tapahtumatietoina. Sepolia on **testiverkko**. Sen tietueita ja saatavuutta ei saa esittää tuotantotason julkisen lohkoketjun takeena. Säilytä oppilaitoksen avaimet ja RPC-määritys turvallisesti ja suunnittele avainten palautus- ja tunnusten peruutusmenettelyt.

Toteutus: [Todistustunnusten varmennus #9298](https://github.com/chamilo/chamilo-lms/pull/9298).