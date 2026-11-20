# Saavutustodistukset (erägenerointi)

Chamilo voi luoda automaattisesti kurssin saavutustodistuksen jokaiselle opiskelijalle, joka on
suorittanut sen — sekä peruskurssissa että kaikissa sen uudelleen käyttävissä istunnoissa — ilman että opettajan
tarvitsee avata jokaista kurssia erikseen. Kaksi konsolikomentoa kattaa tämän: yksi yksittäiselle kurssille
ja yksi koko alustalle. Kumpikaan ei ole tietokantaa raskaasti kuormittava toimenpide, jota olisi valvottava jatkuvasti:
molemmat toimivat rajatuissa erissä, tukevat kuiva-ajoa ja ne voidaan jatkaa turvallisesti, jos suoritus keskeytyy.

## Alustanlaajuinen komento

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Jokaiselle kurssille, jolla on kelvollinen arvosanakirjan juurikategoria — ylimmän tason, ei alakategoria,
ja **Luo todistukset** on käytössä — komento arvioi jokaisen ilmoittautuneen opiskelijan, jolla ei
ole jo todistusta kyseiselle kategorialle, ja luo todistuksen jokaiselle, joka on täyttänyt
suoritusvaatimuksen. Kurssi voi tuottaa **useamman kuin yhden** kontekstin: perusilmoittautumisen ja
erikseen yhden kontekstin kutakin istuntoa kohden, joka käyttää kurssia uudelleen, koska istunnolla voi olla oma juurikategoria
ja oma läpäisyraja.

Kurssi tai jokin sen istuntokonteksteista ohitetaan — sitä ei käsitellä virheenä — kun se ei ole
kelvollinen automaattiseen käsittelyyn: suoritusääntöä ei ole määritetty, kontekstilla on useampi kuin yksi kelvollinen juurikategoria
(epäselvä, vaatii manuaalisen valinnan) tai todistusilmoituksen sisältö puuttuu. Ajon lopussa oleva yhteenveto raportoi, kuinka moneen tapaukseen kontekstit jakautuivat, joten mitään ei
ohiteta ilman että se tulee näkyviin.

### Suorituslähde

* `--completion-mode=course-rule` (oletus): käyttää kurssille määritettyä suoritusääntöä.
* `--completion-mode=gradebook`: käyttää kyseisen kontekstin natiivia arvosanakirjan pistemäärää suoraan.
  Vain konteksti, jolla on täsmälleen yksi kelvollinen juurikategoria, kelpaa tässä tilassa — useamman sisältävä
  ohitetaan ja raportoidaan, jotta se voidaan käsitellä erikseen (katso alla).

### Turvallisuusasetukset

| Option                     | Purpose                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Arvioi ja raportoi luomatta todistuksia tai lähettämättä ilmoituksia. Suorita tämä aina ensin.                                      |
| `--send-notification`       | Vaaditaan todelliseen (ei kuiva-ajo) suoritukseen. Lähettää kurssille määritetyn sisäisen viestin ja sähköpostin jokaisen todistuksen luomisen jälkeen. |
| `--sender-id=<id>`          | Aktiivinen alustan ylläpitäjä, jota käytetään ilmoituksen lähettäjänä. Vaaditaan yhdessä `--send-notification`-valitsimen kanssa.                            |
| `--limit=<n>`                | Yhdessä ajossa luotavien (tai kuiva-ajossa raportoitavien) todistusten enimmäismäärä. `0` = rajoittamaton. Oletus `100`.                                    |
| `--scan-limit=<n>`           | Yhdessä ajossa arvioitavien opiskelijoiden enimmäismäärä kaikilla kursseilla ja istunnoissa. `0` = rajoittamaton. Oletus `1000`.                                 |
| `--batch-size=<n>`           | Yhdessä kurssi-/istuntokontekstissa tietokantaerässä ladattavien opiskelijoiden määrä. Oletus `25`.                                                     |
| `--course-batch-size=<n>`    | Tietokantaerässä ladattavien kurssien määrä. Oletus `50`.                                                                                         |
| `--after-course-id=<id>`     | Jatka skannausta tämän kurssitunnuksen jälkeen. Turvallista käyttää uudelleen keskeytyneen ajon jälkeen — kurssi ei koskaan luo uudelleen todistusta opiskelijalle, jolla sellainen jo on. |
| `--user-id=<id>`             | Rajaa ajo yhteen opiskelijaan, joka tarkistetaan kaikilla kelvollisilla kursseilla ja istunnoissa — hyödyllinen toiminnan varmistamiseen ennen alustanlaajuista ajoa. |
| `--regenerate-empty`         | Käsittele myös opiskelijat, joiden todistustietue on olemassa mutta tallennettua todistustiedostoa ei ole — esimerkiksi osittain epäonnistuneen generoinnin jälkeen — ja luo kyseinen todistus uudelleen. Opiskelijoita, joilla on täydellinen todistus, ei koskaan kosketa. |

### Esimerkkejä

Suorita ensin koko alustalle kuivaharjoitus, jotta näet, mitä luotaisiin:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Varsinainen ajo, jossa opiskelijoille lähetetään ilmoitus ja lähettäjänä on järjestelmänvalvoja, jonka tunnus on 1:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Jatka keskeytynyttä ajoa kurssin 480 jälkeen:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Luo uudelleen ne todistukset, joiden tietue on olemassa mutta joiden tiedostoa ei koskaan tallennettu (suorita ensin kuivaharjoitus
niiden listaamiseksi):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Ajastaminen cron-tehtäväksi

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Yhden kurssin käsittely erikseen

`chamilo:migration:process-achievement-certificates --course-id=<id>` tarjoaa samat kuivaharjoitus-,
ilmoitus- ja sivutusasetukset kuin koko alustan kattava komento, mutta rajattuna vain peruskurssiin
(ei sen istuntoihin), ja siinä on eksplisiittinen `--category-id` erottelua varten, kun kurssilla on useampi kuin
yksi kelvollinen juurikategoria:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Käytä sitä yksittäisen kurssin testaamiseen ennen koko alustan kattavaa ajoa tai sellaisen kurssin käsittelyyn, jonka koko alustan
ajo ilmoitti ohitetuksi epäselvän kategorian vuoksi.

## Paluukoodit

Molemmat komennot päättyvät virhetilaan, jos vähintään yhden todistuksen luonti todella epäonnistui
varsinaisen ajon aikana (tarkista `var/log/dev.log` — tai vastaava tuotantoloki — taustalla olevaa
virhettä varten). Rakenteellisista syistä ohitetut kontekstit (ei sääntöä, epäselvä kategoria, puuttuva ilmoitus-
määritys) eivät aiheuta virheellistä paluukoodia; ne raportoidaan sen sijaan yhteenvedossa.

## Liittyvä: oppijat, jotka jäävät alle 100 %:n edellytysoppimispolulla

Jos kurssin suorittamissääntö edellyttää, että oppimispolku saavuttaa 100 %, oppija, joka on suorittanut jokaisen
vaiheen mutta ei ole koskaan avannut polun viimeistä "Onnittelut"-sivua, jää juuri alle 100 %:n eikä koskaan
tule täällä kelvolliseksi. Katso
[Juuttuneiden oppimispolkujen viimeisten kohtien suorittaminen](learning-path-final-items.md) — suorita se ensin, jos
opiskelijoilta puuttuu todistuksia, jotka odottaisit heidän ansainneen.

## Korvattu: vanha cron-skripti

`public/main/cron/add_gradebook_certificates.php` ei ole enää suositeltava. Se lataa jokaisen
alustan arvosanakirjan tuloksen muistiin yhdessä rajoittamattomassa kyselyssä eikä koskaan vapauta sitä
silmukan aikana, joten se voi kuluttaa muistin loppuun instanssissa, jossa on ei-triviaali määrä kursseja tai
harjoituksia, eikä se koskaan lähetä ilmoitusta "ansaitset todistuksen". Käytä sen sijaan
komentoa `chamilo:gradebook:process-achievement-certificates`.