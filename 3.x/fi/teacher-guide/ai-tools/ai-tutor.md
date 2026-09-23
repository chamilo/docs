# Tekoälytutori

Tekoälytutori on Chamiloon integroitu chatbot, jonka kanssa oppijat voivat keskustella saadakseen välittömiä, tekoälyn tuottamia vastauksia. Se toimii kahdessa kontekstissa, kussakin eri painotuksella:

* **Kurssin sisällä** — tekoälytutori keskittyy kyseiseen kurssiin: se vastaa kysymyksiin sen sisällöstä, selittää sen käsittelemiä käsitteitä ja ohjaa oppijoita materiaalin läpi.
* **Kurssin ulkopuolella** (yleisellä alustalla) — tekoälytutori käsittelee sen sijaan yleisiä alustan käyttöön liittyviä kysymyksiä, kuten miten löytää jokin asia tai käyttää jotakin ominaisuutta, eikä kurssisisältöä.

## Miten se toimii

Kun tekoälytutori on otettu käyttöön kurssilla, oppijat näkevät keskustelukäyttöliittymän, jossa he voivat:

* **Esittää kysymyksiä** kurssisisällöstä
* **Saada selityksiä** kurssilla käsiteltävistä käsitteistä
* **Saada ohjausta** odottamatta opettajan vastausta

Kurssin sisällä tekoälytutori käyttää kyseisen kurssin kontekstia tarjotakseen relevantteja vastauksia. Se on suunniteltu täydentämään opetustasi, ei korvaamaan sitä.

## Tekoälytutorin käyttöönotto

Tekoälytutori edellyttää kahden tason määritystä:

1. **Alustataso** — Ylläpitäjän on otettava tekoälyavustajat käyttöön ja määritettävä vähintään yksi tekoälypalveluntarjoaja (ks. [Tekoälyn määritys](../../admin-guide/integrations/ai-configuration.md))
2. **Kurssitaso** — Tekoälytutori on otettava käyttöön kurssin asetuksissa (yksinkertainen päälle/pois-kytkin). Keskustelussa käytettävä palveluntarjoaja on se, jonka ylläpitäjä on määrittänyt.

## Keskustelukäyttöliittymä

![Tekoälytutorin keskustelukäyttöliittymä, jossa näkyy oppijan ja tekoälyn välinen keskustelu](/.gitbook/assets/ai-tutor-chat.png)

Tekoälytutori näkyy **telakoituna keskustelupaneelina** kurssin sisällä. Oppijat voivat:

* Kirjoittaa viestejä ja vastaanottaa tekoälyn tuottamia vastauksia
* Tarkastella keskusteluhistoriaansa
* Nollata keskustelun aloittaakseen alusta

Keskustelukäyttöliittymä näyttää oppijan ja tekoälyn vaihdon tutussa viestimuodossa.

## Tärkeä toiminta

* **Rajattu avauspaikkaan** — Kurssin sisällä tekoälytutori vastaa vain kyseisestä kurssista; avattuna minkään kurssin ulkopuolelta se siirtyy yleisiin alustan käyttöön liittyviin kysymyksiin. Alustanlaajuinen (kurssin ulkopuolinen) tila on erillinen kytkin, jota ylläpitäjä hallitsee riippumatta kurssikohtaisesta kytkimestä.
* **Pois käytöstä tenttien aikana** — Tekoälytutori poistetaan automaattisesti käytöstä, kun oppija tekee harjoitusta, vilpin estämiseksi
* **Keskustelu oppijakohtaisesti** — Jokaisella oppijalla on oma yksityinen keskustelu tekoälytutorin kanssa, ja kehotteen konteksti sisältää vain tuoreimmat viestit
* **Palveluntarjoajan varajärjestelmä** — Jos määritetty palveluntarjoaja epäonnistuu, Chamilo siirtyy toiseen käytettävissä olevaan palveluntarjoajaan, jotta keskustelu jatkuu

## Opettajana

Sinun on hyvä tietää, että:

* Tekoälytutori ei aina anna täydellisiä vastauksia — kannusta oppijoita tarkistamaan tärkeät tiedot
* Voit tarkastella tekoälytutorin käyttöä alustan seurannan kautta
* Tekoälytutori täydentää opetustasi, ei korvaa sitä. Käytä sitä foorumien, tiedotteiden ja suoran viestinnän rinnalla kattavan oppijatukeen.

## Vinkkejä

* **Aseta odotukset** — Kerro oppijoille kurssin alussa, että tekoälytutori on käytettävissä, ja selitä, miten sitä käytetään asianmukaisesti
* **Kannusta kriittiseen ajatteluun** — Muistuta oppijoita suhtautumaan kriittisesti tekoälyn tuottamiin vastauksiin
* **Käytä usein kysyttyihin kysymyksiin** — Tekoälytutori on erityisen hyödyllinen yleisten kysymysten käsittelyyn, joihin muuten vastaisit toistuvasti