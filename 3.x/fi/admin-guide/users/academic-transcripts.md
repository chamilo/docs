# Akateemiset opintosuoritusotteet

Chamilo voi tuottaa **epävirallisen akateemisen opintosuoritusotteen** oppijan suorittamista, sertifioiduista kursseista ja antaa valtuutetun henkilöstön myöntää **virallisen allekirjoitetun opintosuoritusotteen**. Tämä toiminto eroaa yksittäisen kurssin todistuksesta tai sen valinnaisesta Sepolia-testiverkon varmennuksesta.

## Ota toiminto käyttöön

Kohdassa **Hallinta > Asetukset > Todistukset** ota käyttöön **Akateemiset opintosuoritusotteet** (`certificate.transcript_enabled`). Se on oletuksena pois käytöstä. Tarkista ohjelmaa, arvosteluasteikkoa, kurssitunteja, opiskelijanumeroa, osoitetta ja allekirjoittajaa koskevat lisäasetukset kohdasta [Todistusasetukset](../platform-settings/certificate-settings.md#transcript_enabled).

Opintosuoritusote käyttää kelvollisten kurssien ja istuntojen **juuritason arvosanakirjakategorian** luomia todistuksia. Se sisältää vain ne nykyisen käyttö-URL-osoitteen kurssit, joihin oppija on yhä ilmoittautunut. Kurssi, jolla ei ole kelvollista todistusta, ei tuota riviä.

Näytetty loppuarvosana on lueteltujen kurssien prosenttipisteiden keskiarvo; GPA on vastaavien arvosanapisteiden painottamaton keskiarvo. Molemmat riippuvat katselu- tai myöntämishetkellä mukaan otetuista kursseista.

## Opintosuoritusotteen sarakkeet

| Sarake | Sisältö |
|--------|---------|
| **Kurssi** | Kurssikoodi tai kurssin laitoksen nimi (`transcript_course_code_source`) |
| **Kuvaus** | Kurssin nimi ja istunnon nimi, jos kurssi on suoritettu istunnossa |
| **Ilmoittautuminen** | Ajankohta, jolloin oppija ilmoittautui kurssille tai istuntoon |
| **Vaaditut tunnit** | Kurssin lisäkentän arvo, joka on asetettu kohdassa `transcript_hours_extra_field`, tai kurssin kesto |
| **Suorituspäivä** | Todistuksen päivämäärä |
| **Suoritetut tunnit** | Aika, jonka oppija on viettänyt kurssilla, tai vaaditut tunnit, kun `transcript_completed_hours_are_required_hours` on käytössä |
| **Loppuarvosana** | Todistuksen pistemäärä |
| **Arvosana** | Pistemäärää vastaava `transcript_grading_scale`-asteikon kirjain |

## Avaa oppijan opintosuoritusote

1. Siirry kohtaan **Hallinta > Käyttäjät > Käyttäjäluettelo** ja etsi oppija. **Opintosuoritusote**-toiminto on käytettävissä valtuutetuille ylläpitäjille ja istuntojen ylläpitäjille, kun toiminto on käytössä.
2. Vaihtoehtoisesti käytä **Opintosuoritusote**-toimintoa kelvollisen oppijan yleisen raportoinnin tietosivulta.
3. Tarkista oppijan kurssiluettelo, arvosanat, päivämäärät, tunnit, loppuarvosana ja GPA.
4. Valitse **Lataa epävirallinen opintosuoritusote**, niin saat PDF-tiedoston, joka on muodostettu oppijan nykyisistä tiedoista.

Opintosuoritusotesivu on myös suoraan käytettävissä osoitteessa `/transcript?userId=<user-id>` henkilölle, jolla on oikeus tarkastella kyseisen oppijan tietoja. Älä pidä URL-osoitteen tai käyttäjätunnisteen tietämistä käyttöoikeutena: pääsy tarkistetaan palvelinpuolella.

Oppija voi tarkastella **omaa** opintosuoritusotettaan, mutta ei voi myöntää tai mitätöidä virallista otetta. Valtuutetut myöntäjät ovat:

* Alustan/portaalin ylläpitäjät, jotka toimivat hallinnoimansa käyttäjä-/käyttö-URL-osoitealueen puitteissa.
* HR-päälliköt oppijoille, joita he seuraavat.
* Istuntojen ylläpitäjät oppijoille, jotka on rekisteröity heidän hallinnoimaansa istuntoon.

Nämä oikeudet arvioidaan oppijakohtaisesti; henkilöstörooli itsessään ei anna pääsyä kaikkiin opintosuoritusotteisiin.

![Ylläpitäjän näkemä oppijan opintosuoritusote, jossa näkyvät kurssit, loppuarvosana, GPA ja arvosteluasteikko, virallisten opintosuoritusotteiden luettelo sekä allekirjoituskuvan lohko](../../.gitbook/assets/admin-transcript-user.png)

## Myönnä ja varmenna virallinen opintosuoritusote

1. Tarkista valtuutetun oppijan opintosuoritusotesivulla parhaillaan näytettävät kurssit, arvosanat ja henkilötiedot.
2. Valitse **Myönnä virallinen opintosuoritusote** ja vahvista. Chamilo tallentaa allekirjoitetun tilannekuvan tiedoista kyseisellä hetkellä.
3. Uusi merkintä näkyy kohdassa **Viralliset opintosuoritusotteet** myöntämispäivämäärineen ja myöntäjineen.
4. Käytä **Lataa**-toimintoa virallista PDF-tiedostoa varten tai **Varmenna**-toimintoa julkisen varmennussivun avaamiseen.
5. Tarvittaessa valtuutettu myöntäjä voi **Mitätöidä** kyseisen virallisen opintosuoritusotteen. Varmennussivu ilmoittaa tällöin, että se on mitätöity.

Jokainen myönnetty opintosuoritusote tallennetaan erikseen: uudemman version myöntäminen ei hiljaisesti kirjoita aiempaa allekirjoitettua tietuetta uudelleen. Varmennuslinkit noudattavat muotoa `/transcripts/verify/<token>` ja tarjoavat myös `.json`-vastauksen. Varmennuslinkin haltija voi tarkistaa voimassaolon kirjautumatta sisään; pidä nämä linkit asianmukaisesti hallinnassa, koska voimassa oleva varmennus paljastaa allekirjoitetun opintosuoritusotteen tiedot. Virheellisiä tai mitätöityjä tietueita ei esitetä voimassa olevina asiakirjoina.

![Voimassa olevan virallisen opintosuoritusotteen julkinen varmennussivu, jossa näkyvät sen tiedot ja kurssit](../../.gitbook/assets/admin-transcript-verification.png)

Virallisen opintosuoritusotteen allekirjoittaa digitaalisesti Chamilo oppilaitoksen allekirjoitusavaimella. **Se ei ole lohkoketjutapahtuma**; Sepolia-toiminto dokumentoi erillisen prosessin arvosanakirjan todistustunnuksille.

## Allekirjoituskuva ja allekirjoittajan tiedot

Alustan ylläpitäjä voi ladata **PNG- tai JPEG**-muotoisen allekirjoituskuvan oppijan opintosuoritusotteen sivun **Virallisten opintosuoritusotteiden allekirjoitus** -osioon. Kuva kuuluu nykyiseen käyttö-URL-osoitteeseen, ja sitä käytetään virallisissa PDF-tiedostoissa. Allekirjoittajan nimi ja titteli tulevat asetuksista `certificate.transcript_signatory_name` ja `certificate.transcript_signatory_title`.

Vain alustan ylläpitäjät hallinnoivat allekirjoituskuvaa; muut valtuutetut opintosuoritusotteen myöntäjät eivät saa tätä oikeutta automaattisesti. Suojaa oppilaitoksen allekirjoitusavaimet ja yksityinen allekirjoituskuvien tallennus osana portaalin varmuuskopiointi- ja käyttöoikeusmenettelyjä. Molemmat säilytetään julkisen verkkokansion ulkopuolella hakemistossa `var/certificate-issuer/` yhdessä avaimen kanssa, joka allekirjoittaa myös arvosanakirjan todistustunnukset: sisällytä tämä kansio [varmuuskopioihisi](../maintenance/backups.md), muuten jokaista jo myönnettyä opintosuoritusotetta ja tunnusta ei voida enää todentaa.

## Vianmääritys

* **Opintosuoritusotteen linkki puuttuu:** tarkista `certificate.transcript_enabled` ja nykyisen käyttäjän laajuus.
* **Ei suoritettuja kursseja:** oppijalla on oltava kelpoinen juuritason arvosanakirjan todistus sekä vastaava nykyinen kurssi- tai istuntoilmoittautuminen tällä käyttö-URL-osoitteella.
* **Virheellinen opiskelijanumero, tuntimäärä, arvosanakirjaimet tai ohjelman nimi:** tarkista kyseiset `certificate.transcript_*`-asetukset ennen virallisen opintosuoritusotteen myöntämistä.
* **Todentaminen ilmoittaa peruutetusta tai virheellisestä tuloksesta:** älä käytä tietuetta uudelleen todisteena nykyisestä virallisesta opintosuoritusotteesta; valtuutettu henkilöstö voi myöntää uuden, kun se on asianmukaista.

Katso myös [Todistukset ja taidot](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) ja [Oma opintosuoritusote](../../student-guide/account-and-security/my-transcript.md).