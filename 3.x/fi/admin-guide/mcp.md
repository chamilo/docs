# MCP (Model Context Protocol)

Chamilo 3.0 tarjoaa MCP-palvelimen, jotta tekoälyavustajat ja -agentit (Claude, ChatGPT-liitännät tai mikä tahansa MCP-yhteensopiva asiakas) voivat toimia alustalla autentikoidun käyttäjän puolesta käyttäen kyseisen käyttäjän omia oikeuksia — erillistä palvelutiliä tai korotettuja käyttöoikeuksia ei ole.

## Mitä MCP tuo Chamiloon

MCP (Model Context Protocol) on avoin standardi, jonka avulla tekoälyasiakkaat voivat kutsua palvelimen tarjoamaa määriteltyä "työkalujen" joukkoa. Chamilon MCP-palvelin on saavutettavissa yhdestä päätepisteestä, `/mcp`, ja se tarjoaa valikoidun joukon opettajille suunnattuja kurssinhallintatyökaluja koko API-pinnan sijaan.

## Käytettävissä olevat ominaisuudet

Jokainen kutsu suoritetaan yhdistetyn käyttäjän nimissä, joten työkalu näkee ja muokkaa vain kursseja, joita kyseinen käyttäjä hallinnoi. Nykyinen työkalujoukko:

| Työkalu | Mitä se tekee |
|------|---------------|
| Nykyinen käyttäjä | Palauttaa autentikoidun käyttäjän identiteetin ja roolit |
| Opettajan kurssit | Listaa kurssit, joita käyttäjä hallinnoi opettajana |
| Kurssin yleiskatsaus | Palauttaa peruskurssin tiedot ja resurssien määrät |
| Luo kurssi | Luo uuden kurssin alustan kurssinluontisääntöjen mukaisesti |
| Luo kurssitehtävä | Luo luonnoksen tai julkaistun tehtävän kuvauksella ja enimmäispisteillä |
| Luo kurssitesti | Luo tekoälyavusteisen monivalintatestin aihekuvauksesta tai olemassa olevasta dokumentista |
| Hae kurssitestin vastaustila | Raportoi, ketkä opiskelijat ovat vastanneet, ovat kesken tai odottavat testiä |
| Hae käyttäjän kurssitestin pistemäärä | Palauttaa opiskelijan viimeisimmät ja parhaat suoritetut pistemäärät testissä |
| Luo koulutuksen tyytyväisyyskysely | Luo seitsemän kysymyksen tyytyväisyyskyselyn |
| Luo kurssin oppimispolku | Luo oppimispolun MCP-asiakkaan toimittamista sivuista |
| Listaa dokumentit | Listaa kurssin Dokumentit-työkalun dokumentit |
| Lue kurssin dokumentti | Palauttaa muokattavan dokumentin HTML-sisällön, otsikon ja metatiedot |
| Muokkaa kurssin dokumenttia | Korvaa olemassa olevan muokattavan dokumentin koko HTML-sisällön |
| Luo kurssin dokumentti | Luo tekoälyavusteisen HTML-dokumentin Dokumentit-kansion juureen |
| Luo kurssin kuvitus | Luo aiheelle tekoälykuvituksen ja tallentaa sen dokumenttina |
| Kuvita dokumentin kappale | Lisää olemassa olevan kuvan tai videon kappaleen eteen tai jälkeen dokumentissa |
| Etsi kurssin foorumin tuoreita tapahtumia | Etsi tuoreita, näkyviä foorumiviestejä, jotka liittyvät aiheeseen |
| Arvioi kurssin laatua | Analysoi kurssin oppimispolut, dokumentit, testit, tehtävät ja kyselyt ja palauttaa parannussuosituksia |

Tämän listan kuratoi Chamilon ydintiimi, eikä sitä voi laajentaa käyttäjän toimesta alustan sisältä — opettajat eivät voi lisätä omia työkalujaan.

## Miten käyttäjät yhdistävät

### Henkilökohtainen MCP API -avain

Jokainen käyttäjä luo oman avaimensa kohdassa **Sosiaalinen verkosto** > **MCP API -avain**:

![MCP API -avaimen sivu, jossa näkyy passiivinen avain, Luo API-avain -painike sekä Etä-MCP-yhteys-lohko päätepisteen URL-osoitteella ja Authorization-otsikon muodolla](../.gitbook/assets/admin-mcp-api-key.png)

* **Luo API-avain** -painikkeen napsauttaminen luo avaimen ja näyttää sen kerran — Chamilo tallentaa sen jälkeen vain peitetyn version, joten koko avain on kopioitava ja tallennettava turvallisesti heti.
* Uuden avaimen luominen kumoaa edellisen välittömästi.
* Sivu näyttää avaimen tilan (aktiivinen/passiivinen), asiakkaaseen määritettävän MCP-päätepisteen sekä luonti- ja viimeisimmän käyttöpäivän.
* **Etä-MCP-yhteys** -paneeli kertoo täsmälleen, mitä MCP-asiakkaaseen laitetaan: päätepisteen URL ja `Authorization: Bearer <your MCP API key>` -otsikko.

Kuten sivu itse huomauttaa, avain autentikoi asiakkaan kyseisen käyttäjän tiliksi — se ei myönnä mitään oikeuksia, joita tilillä ei jo ole.

### OAuth 2.1 (etäasiakkaat ja liitännät)

MCP-asiakkaille, jotka tukevat OAuth-löytöä ja dynaamista asiakasrekisteröintiä (manuaalisesti liitetyn avaimen sijaan), Chamilo toimii myös OAuth 2.1 -valtuutuspalvelimena: asiakas löytää Chamilon päätepisteet, rekisteröi itsensä ja ohjaa käyttäjän osoitteeseen `/oauth/authorize` hyväksymään pääsyn. Hyväksytyt sovellukset näkyvät kohdassa **Sosiaalinen verkosto** > **Valtuutetut sovellukset**, jossa käyttäjä voi kumota ne, joita hän ei enää käytä tai tunnista.

## Tietoturvanäkökohdat

* **Ei oikeuksien laajentamista.** Jokainen MCP-työkalukutsu ja jokainen OAuth-valtuutettu sovellus suoritetaan yhdistävän käyttäjän omilla Chamilo-oikeuksilla — henkilökohtainen API-avain tai valtuutettu sovellus ei voi koskaan tehdä enempää kuin käyttäjä voisi jo tehdä käsin.
* **Vain Bearer, nopeusrajoitettu.** `/mcp` hyväksyy vain Bearer-tunnisteen — henkilökohtaisen MCP-API-avaimen, OAuth-käyttöoikeustunnuksen tai (kehityksessä) JWT:n. Todennusyritykset on rajoitettu IP-osoitetta kohden, jotta tunnusten arvailua hidastetaan.
* **Kapea julkinen pinta.** Ainoa tunnistautumaton liikenne, jonka `/mcp` hyväksyy, on `OPTIONS`-esikysely; jokainen varsinainen kutsu edellyttää `ROLE_USER`-roolia. OAuth-löytäminen, dynaaminen asiakasrekisteröinti ja tunnuksen päätepisteet ovat tarkoituksella julkisia, kuten OAuth 2.1 / MCP -määritykset edellyttävät — tämä ei itsessään myönnä pääsyä, vaan antaa asiakkaalle vain tiedon, miten valtuutusvirta aloitetaan.
* **DNS-rebinding-suojaus on tarkoituksella poistettu käytöstä `/mcp`-polulle.** MCP:n toteuttava paketti rajoittaa päätepisteen normaalisti `localhost`-osoitteeseen, ellei sallittujen isäntänimien staattista luetteloa ole määritetty — huono ratkaisu moni-URL-Chamilo-portaalille, johon päästään monilla isäntänimillä. Chamilo poistaa kyseisen tarkistuksen, koska se on tässä tarpeeton: jokainen `/mcp`-pyyntö edellyttää jo Bearer-tunnistetta riippumatta sen `Host`/`Origin`-otsakkeesta, eikä DNS-rebinding-hyökkäys (joka nojaa ympäristön evästetyyppiseen todennukseen väärennetyn Hostin mukana) voi väärentää haltijatunnusta, jota sillä ei jo ole.

## MCP-palvelimen määritys

Toisin kuin useimmissa tämän oppaan integraatioissa, MCP:llä ei ole hallintapaneelin asetus sivua — se määritetään tiedostotasolla tiedostossa `config/packages/mcp.yaml` ja edellyttää komentorivipääsyä palvelimelle:

| Avain | Tarkoitus |
|-----|---------|
| `app`, `version`, `description` | Identiteetti, jonka Chamilo ilmoittaa yhdistäville MCP-asiakkaille |
| `client_transports.stdio` / `client_transports.http` | Mitkä siirtotavat ovat käytössä; Chamilo ottaa molemmat käyttöön oletuksena |
| `http.path` | MCP:n HTTP-päätepiste (oletuksena `/mcp`) |
| `http.allowed_hosts` | DNS-rebindingin isäntien sallintaluettelo — Chamilossa arvoksi `false` (ks. Tietoturvanäkökohdat yllä) |
| `http.session.store`, `.directory`, `.ttl` | Missä MCP-istunnon tila säilytetään ja kuinka kauan |

MCP-palvelimen poistamiseksi kokonaan käytöstä aseta `client_transports.http: false` (ja `stdio: false`, jos myös CLI-siirtotapa halutaan pois) ja tyhjennä välimuisti:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Vinkkejä

* Kohtele MCP-API-avainta kuin salasanaa — sen haltija voi toimia kyseisenä käyttäjänä minkä tahansa MCP-asiakkaan kautta.
* Kannusta käyttäjiä tarkistamaan säännöllisesti **Valtuutetut sovellukset** ja perumaan kaikki, joita he eivät tunnista.
* Katso [Tekoälyn määritys](integrations/ai-configuration.md) tekoälypalveluntarjoajista, jotka tukevat yllä lueteltuja sisällöntuotantotyökaluja (testien luonti, asiakirjojen luonti, kuvitukset).