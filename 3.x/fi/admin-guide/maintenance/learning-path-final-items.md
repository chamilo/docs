# Jumissa olevien oppimispolun viimeisten kohtien viimeistely

Oppimispolun viimeinen vaihe — "Onnittelut"-sivu, jolla ovat todistus- ja taitolohkot — lasketaan suoritetuksi vasta, kun oppija todella avaa sen. Oppija, joka suorittaa kaikki muut vaiheet mutta ei koskaan siirry tälle viimeiselle sivulle, jää ikuisesti juuri alle 100 %:n, ja koska saavutustodistuksen kelpoisuus (ja taitojen myöntäminen) edellyttää, että oppimispolku saavuttaa 100 %, hän ei koskaan saa todistusta tai taitoa, jonka hän on muuten ansainnut.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Jokaiselle alustan oppimispolulle, jonka viimeinen vaihe on tyyppiä **Final item**, komento tarkistaa jokaisen oppijan, jolla on kesken oleva yritys (alle 100 %) ja joka on suorittanut kaikki muut vaiheet — kaikissa kursseissa ja kaikissa istunnoissa, jotka käyttävät oppimispolkua uudelleen. Jos näin on, se viimeistelee viimeisen kohdan heidän puolestaan täsmälleen niin kuin he olisivat avanneet sen itse: se kirjaa saman kohdan katselun, suorittaa saman edistymisen uudelleenlaskennan ja käynnistää saman todistuksen luonnin ja taitojen myöntämisen kuin oikea käynti.

Kuten `chamilo:gradebook:process-achievement-certificates` (katso [Saavutustodistukset](achievement-certificates.md)), se toimii rajatuissa erissä, tukee kuiva-ajoa ja sen voi jatkaa turvallisesti keskeytyksen jälkeen — oppijaa, jonka viimeinen kohta on jo suoritettu, ei kosketa uudelleen myöhemmällä ajolla.

## Valitsimet

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Arvioi ja raportoi suorittamatta mitään. Aja tämä aina ensin.                                                     |
| `--sender-id=<id>`      | Aktiivisen alustan ylläpitäjän tunnus, jota käytetään resurssin luojana, kun viimeisen kohdan viimeistely käynnistää todistuksen luonnin tai taitojen myöntämisen. Pakollinen oikeassa (ei kuiva-ajo) suorituksessa. |
| `--limit=<n>`           | Yhdellä ajolla suoritettujen (tai kuiva-ajossa raportoitujen) viimeisten kohtien enimmäismäärä. `0` = rajoittamaton. Oletus `500`. |
| `--scan-limit=<n>`      | Yhdellä ajolla skannattujen oppijan edistymistietueiden enimmäismäärä kaikissa oppimispoluissa. `0` = rajoittamaton. Oletus `5000`. |
| `--batch-size=<n>`      | Yhdessä tietokantaerässä ladattujen oppijan edistymistietueiden määrä yhden oppimispolun sisällä. Oletus `50`.     |
| `--lp-batch-size=<n>`   | Yhdessä tietokantaerässä ladattujen oppimispolkujen määrä. Oletus `50`.                                            |
| `--after-lp-id=<id>`    | Jatka skannausta tämän oppimispolun tunnuksen jälkeen.                                                             |

## Esimerkit

Aja ensin koko alustan kuiva-ajo nähdäksesi, ketkä suoritettaisiin:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Oikea ajo, jossa ylläpitäjä tunnuksella 1 on resurssin luoja:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Jatka keskeytynyttä ajoa oppimispolun 480 jälkeen:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Paluukoodit

Komento päättyy epäonnistumistilaan, jos vähintään yksi viimeinen kohta todella epäonnistui suorituksessa oikean ajon aikana — yhteenvetotaulukko nimeää oppimispolun ja oppijan sekä syyn; sovelluslokissa on koko poikkeus. Oppija, joka on oikein jätetty pois (viimeinen kohta on jo tehty tai jokin toinen vaihe on yhä kesken), ei ole virhe eikä koskaan aiheuta epäonnistumisen paluukoodia.

## Arvosanakirjan pisteet suorituksen jälkeen

Oppimispolulle arvosanakirjan taulukossa näytettyä pistemäärää ei koskaan tallenneta — se lasketaan livenä oppijan nykyisestä edistymisestä aina, kun sivu latautuu, joten se heijastaa 100 %:a välittömästi ilman lisävaihetta.

Oppijan **todistus**, jos sellainen oli jo olemassa ennen kuin hän saavutti 100 % (ja siihen oli leivottu vanhempi, matalampi pistemäärä), saa tallennetun pistemääränsä ja renderöidyn HTML:n päivitettyä vain, jos todistuksen uudelleenluonti itsessään onnistuu, kun tämä komento viimeistelee hänen viimeisen kohtansa — sama kutsu, jonka oikea käynti käynnistäisi. Jos todistuksen luonti epäonnistuu mistä tahansa syystä (katso [Saavutustodistukset](achievement-certificates.md) yleisistä syistä, esim. tiedostotallennuksen oikeudet), oppijan edistyminen saavuttaa silti oikein 100 % ja arvosanakirjan taulukko näyttää sen yhä — vain hänen todistuksensa jää näyttämään vanhaa pistemäärää, ja koska komento ei koskaan palaa oppijaan, joka on jo 100 %:ssa, se ei yritä uudelleen myöhemmällä ajolla. Luo kyseinen todistus uudelleen manuaalisesti (Todistukset-luettelon **Generate**-toiminto), kun taustalla oleva ongelma on korjattu.

`--sender-id` on olemassa nimenomaan yhden yleisen epäonnistumisen syyn välttämiseksi: viimeisen kohdan viimeistelyllä oikean pyynnön ulkopuolella ei ole kirjautunutta käyttäjää, jonka todistusresurssi voisi kirjata luojakseen, ja luonti epäonnistuu suoraan ilman sellaista.