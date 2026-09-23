# Asennusvelho

Chamilo 3.0 sisältää selainpohjaisen asennusvelhon, joka opastaa alkumäärityksessä. Velho käynnistyy automaattisesti, kun avaat alustan ensimmäistä kertaa.

## Ennen kuin aloitat

Varmista, että seuraavat edellytykset täyttyvät:

1. Palvelimesi täyttää kaikki [palvelinvaatimukset](server-requirements.md).
2. Olet ladannut pakatun (zip tai tar.gz) Chamilo-version.
3. Verkkopalvelimesi on määritetty palvelemaan `public/`-hakemistoa dokumenttijuurena.
4. `.env`-tiedostosi on olemassa ja tyhjä (velho opastaa tietokannan määrityksessä).

## Vaihe 1: Asennuskieli

![Asennusvelho vaihe 1 — kielen valinta](../../.gitbook/assets/install-step1-language.png)

Ensimmäisessä vaiheessa valitset asennusprosessin kielen. Valitse haluamasi kieli avattavasta valikosta.

Jos Chamilo havaitsee olemassa olevan asennuksen (päivitystä varten), se näyttää migraation tilan ja tarjoaa päivityspolun uuden asennuksen sijaan.

## Vaihe 2: Vaatimusten tarkistus

![Asennusvelho vaihe 2 — vaatimusten tarkistus, jossa näkyvät PHP-versio, laajennukset ja hakemisto-oikeudet](../../.gitbook/assets/install-step2-requirements.png)

Velho tarkistaa palvelinympäristösi:

* **PHP-versio** on 8.3, 8.4 tai 8.5
* **Vaaditut PHP-laajennukset** on asennettu (intl, gd, curl, zip, mbstring, xml jne.)
* **Suositellut PHP-asetukset** — `date.timezone` on määritetty, riittävät lataus-/muistirajat
* **Hakemisto- ja tiedosto-oikeudet** — `var/`, `config/` ja `public/upload/` ovat verkkopalvelimen kirjoitettavissa

Jos jokin vaatimus ei täyty, velho näyttää varoituksia tai virheitä. Korjaa ne ennen jatkamista.

## Vaihe 3: Lisenssi

![Asennusvelho vaihe 3 — lisenssin hyväksyntä](../../.gitbook/assets/install-step3-license.png)

Tässä vaiheessa näytetään GNU/GPLv3-lisenssi. Sinun on rastitettava **"Hyväksyn"** -valintaruutu jatkaaksesi.

Valinnaisesti voit avata **Yhteystiedot**-osion ja antaa tietoja organisaatiostasi (nimi, sähköposti, yritys, maa). Tämä on vapaaehtoista ja auttaa Chamilo-yhteisöä ymmärtämään, kuka alustaa käyttää, mutta mahdollistaa myös sen, että voimme ottaa sinuun *hyvin harvoin* yhteyttä lähelläsi järjestettävistä tapahtumista.

## Vaihe 4: Tietokanta-asetukset

![Asennusvelho vaihe 4 — tietokantayhteyden määritys](../../.gitbook/assets/install-step4-database.png)

Anna tietokantayhteyden tiedot:

| Kenttä | Kuvaus |
|-------|-------------|
| **Tietokantaisäntä** | Tietokantapalvelimen isäntänimi tai IP (esim. `localhost` tai `127.0.0.1`) |
| **Tietokantaportti** | Oletus: 3306 MySQL/MariaDB:lle |
| **Tietokannan nimi** | Käytettävän tietokannan nimi (vain aakkosnumeeriset merkit ja alaviivat) |
| **Tietokantakäyttäjä** | Tietokantakäyttäjä, jolla on täydet oikeudet määritettyyn tietokantaan |
| **Tietokannan salasana** | Tietokantakäyttäjän salasana |

Napsauta **Tarkista tietokantayhteys** testataksesi. Velho ei anna jatkaa, ennen kuin yhteys onnistuu. Jos tietokanta on jo olemassa, näytetään varoitus.

## Vaihe 5: Määritysasetukset

![Asennusvelho vaihe 5 — ylläpitäjätili, portaalin asetukset ja sähköpostin määritys](../../.gitbook/assets/install-step5-config.png)

Tässä vaiheessa yhdistetään ylläpitäjätilin luonti, portaalin asetukset ja sähköpostin määritys.

### Ylläpitäjätili

| Kenttä | Kuvaus |
|-------|-------------|
| **Käyttäjätunnus** | Ylläpitäjän käyttäjänimi |
| **Salasana** | Valitse vahva salasana — tällä tilillä on täysi pääsy alustaan |
| **Etunimi** | Ylläpitäjän etunimi |
| **Sukunimi** | Ylläpitäjän sukunimi |
| **Sähköposti** | Käytetään järjestelmäilmoituksiin ja salasanan nollauksiin |
| **Puhelin** | Valinnainen yhteysnumero |

Näitä ylläpitäjätietoja Chamilo käyttää myös tukiyhteystietojen täyttämiseen, joten muista määrittää ne uudelleen asetuksissa asennuksen päätyttyä.

### Portaalin asetukset

| Kenttä | Kuvaus |
|-------|-------------|
| **Kieli** | Käyttöliittymän oletuskieli |
| **Portaalin nimi** | Alustasi nimi (esim. "Organisaationi LMS") |
| **Yrityksen lyhyt nimi** | Organisaatiosi lyhennetty nimi |
| **Yrityksen URL** | Organisaatiosi verkkosivusto |
| **Salaustapa** | Salasanan tiivistealgoritmi — **bcrypt** on suositeltu |
| **Salli itserekisteröityminen** | Kyllä / Ei / Hyväksynnän jälkeen |
| **Salli itserekisteröityminen kouluttajaksi** | Kyllä / Ei |

### Sähköpostin määritys

Sähköpostiasetusten osiossa voit määrittää sähköpostin siirron (SMTP, Amazon SES, Mailjet jne.) ja testata sähköpostin toimitusta. Katso lisätietoja kohdasta [Sähköpostin määritys](email-configuration.md).

Kaikki nämä asetukset voidaan muuttaa myöhemmin hallintapaneelista.

## Vaihe 6: Viimeinen tarkistus ennen asennusta

![Asennustoiminto, vaihe 6 — kaikkien asetusten tarkistus ennen asennusta](../../.gitbook/assets/install-step6-review.png)

Tässä vaiheessa näytetään yhteenveto kaikesta syöttämästäsi tarkistusta varten:

* Ylläpitäjän tunnukset (salasana on oletuksena piilotettu — paljasta se napsauttamalla silmäkuvaketta)
* Portaalin asetukset
* Tietokantayhteyden tiedot

Tarkista huolellisesti ja napsauta sitten **Install Chamilo** asennuksen suorittamiseksi. Toiminto luo kaikki tietokantataulut, täyttää alkutiedot ja määrittää alustan.

## Vaihe 7: Asennus valmis

![Asennustoiminto, vaihe 7 — valmistuminen, tietoturvaohjeet ja portaalin linkki](../../.gitbook/assets/install-step7-complete.png)

Kun asennus on onnistunut, toiminto näyttää:

* **Aloitusohjeet** — Suositellaan ensimmäisen kurssin luomista alustan tutkimiseksi (ylläpitäjänä tämä tehdään ylläpitopaneelista)
* **Tietoturvasuositukset**:
  * Tee `config/`-hakemistosta vain luku (`chmod 0555`)
  * Poista `public/main/install/`-hakemisto
* **Linkki portaaliisi**, jolla kirjaudut juuri luomillasi ylläpitäjän tunnuksilla

## Asennuksen jälkeen

Kun toiminto on valmis:

* **Poista asennustoiminto tai rajoita sen käyttöä** -- Toiminto ei saa olla käytettävissä asennuksen jälkeen. Chamilo yleensä lukitsee sen automaattisesti, mutta varmista, että asennus-URL:n uudelleenkäynti ohjaa kirjautumissivulle.
* **Määritä sähköpostin toimitus** -- Katso [Sähköpostin määritys](email-configuration.md).
* **Ota varmuuskopiot käyttöön** -- Ennen sisällön lisäämistä määritä automaattiset tietokanta- ja tiedostovarmuuskopiot (Chamilo ei tarjoa tähän ratkaisua, mutta var/-kansion ja tietokannan kopiointi ovat kaksi tärkeintä osaa).
* **Tarkista tietoturva-asetukset** -- Katso [Tietoturva-asetukset](../platform-settings/security-settings.md).

## Vianmääritys

| Ongelma | Ratkaisu |
|---------|----------|
| Tyhjä sivu asennus-URL:ssa | Tarkista PHP-virhelokit. Vaihda tilapäisesti `APP_ENV=dev` .env-tiedostossa nähdäksesi virheet selaimessa. |
| Tietokantayhteys epäonnistuu | Varmista tunnukset, että tietokanta on olemassa ja että tietokantapalvelin sallii yhteydet verkkopalvelimen isännästä. |
| Käyttöoikeus evätty -virheet | Varmista, että `var/` on kirjoitettavissa verkkopalvelimen käyttäjälle. |
| Resurssit eivät lataudu (ei CSS/JS) | Suorita `yarn install && yarn build` käyttöliittymän resurssien kääntämiseksi. |