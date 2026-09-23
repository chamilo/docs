# Alustan asetukset

Chamilolla on laaja asetusten hallintajärjestelmä, jossa asetukset on jaettu kategorioihin. Alla oleva täydellinen kategorioiden joukko vastaa hallintapaneelin **Asetukset**-sivua — sekä lähdekoodin `SettingsCurrentFixtures.php`-tiedostoa, joka on muuttujien nimien, otsikoiden ja kuvausten lähde.

Avaa alustan asetukset hallintapaneelista napsauttamalla **Asetukset**.

![Alustan asetussivu, jossa näkyvät konfigurointikategoriat toiminnallisen alueen mukaan järjestettyinä](/.gitbook/assets/admin-settings-categories.png)

## Kaikki kategoriat

Yhteensä on **39 asetuskategoriaa**, jotka on lueteltu alla aakkosjärjestyksessä. Linkin jälkeinen luku on kyseisen kategorian asetusten määrä.

### Koko alusta

* **[Ylläpitäjän identiteetti](admin-settings.md)** (12) — Alustan ylläpitäjän identiteetti- ja yhteystiedot.
* **[Alusta](platform-settings.md)** (29) — Alustatason identiteetti, aikavyöhyke, rekisteröitymispolitiikka, verkossa olevat käyttäjät, suorituskykyliput.
* **[Näyttö](display-settings.md)** (24) — Etusivun asettelu, gravatar, valikot, brändäyksen käyttäytyminen.
* **[Editori](editor-settings.md)** (26) — Rikkaan tekstin editorin (TinyMCE) työkalurivit, liitännäiset, tekoälyavustajat.
* **[Kielet](language-settings.md)** (12) — Käytettävissä olevat kielet, oletuskieli, varakielet.
* **[Sähköposti](mail-settings.md)** (18) — Lähtevän sähköpostin asettelu, lähettäjän identiteetti, allekirjoitus.
* **[Työnkulut](workflows-settings.md)** (23) — Poikkileikkaavat työnkulun kytkimet (kurssin luonti, ilmoittautumisen validointi…).

### Todentaminen, tietoturva ja tietosuoja

* **[Tietoturva](security-settings.md)** (31) — Kirjautumissuojaus, salasanapolitiikka, otsakkeet, 2FA, IDS.
* **[Rekisteröityminen](registration-settings.md)** (20) — Itsepalvelurekisteröitymisen politiikka ja rekisteröitymisen jälkeiset uudelleenohjaukset.
* **[Tietosuoja](privacy-settings.md)** (6) — Suostumus, tietojen vienti, tilin poistopyynnöt.
* **[CAS](cas-settings.md)** (7) — 1.x-versiosta periytyvä vanha CAS-konfiguraatio.

### Kurssin ja session elinkaari

* **[Kurssi](course-settings.md)** (45) — Oletukset ja politiikat, jotka koskevat kursseja koko alustalla.
* **[Sessiot](session-settings.md)** (68) — Session elinkaari, tuutorin käyttöikkunat, näkyvyys.
* **[Kurssikatalogi](catalog-settings.md)** (13) — Julkisen kurssikatalogin käyttäytyminen.
* **[Profiili](profile-settings.md)** (29) — Mitkä kentät näkyvät käyttäjäprofiilissa.

### Kurssityökalut

* **[Agenda](agenda-settings.md)** (11)
* **[Ilmoitukset](announcement-settings.md)** (9)
* **[Tehtävät (Work)](work-settings.md)** (12)
* **[Läsnäolo](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Dokumentit](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Harjoitukset (Testit)](exercise-settings.md)** (63)
* **[Foorumit](forum-settings.md)** (9)
* **[Sanasto](glossary-settings.md)** (3)
* **[Ryhmät](group-settings.md)** (3)
* **[Oppimispolut](lp-settings.md)** (51)
* **[Kyselyt](survey-settings.md)** (12)

### Arviointi ja tunnustus

* **[Arviointikirja (Assessments)](gradebook-settings.md)** (34) — Pisteiden näyttö, desimaalit, todistuskynnykset.
* **[Todistukset](certificate-settings.md)** (9) — Oletukset, joita sovelletaan, kun oppija saa todistuksen.
* **[Taidot](skill-settings.md)** (13) — Taitopuu, myöntösäännöt, profiili-integraatio.
* **[Seuranta](tracking-settings.md)** (10) — Mitä tallennetaan, mitkä raportit ovat näkyvissä.

### Viestintä ja yhteisö

* **[Viestintä](message-settings.md)** (7)
* **[Sosiaalinen verkosto](social-settings.md)** (7)

### Tekoäly

* **[Tekoälyavustajat](ai-helpers-settings.md)** (13) — Palveluntarjoajat tehtävätyypeittäin (teksti, kuva, video, tuutori, arviointi).

### Toiminnot ja integraatio

* **[Cron-työt](crons-settings.md)** (3)
* **[Haku](search-settings.md)** (3) — Xapian-kokotekstihakukonfiguraatio.
* **[Tiketit](ticket-settings.md)** (7) — Helpdesk-järjestelmä.
* **[Web-palvelut](webservice-settings.md)** (7) — Vanhat SOAP/REST-päätepisteet.

## Miten asetukset toimivat

* Asetukset tallennetaan tietokantaan (`settings`-taulu) ja niitä hallitaan web-käyttöliittymän kautta
* Jotkin asetukset ovat **URL-lukittuja** usean URL:n asennuksissa (niiden arvo pätee koko alustaan eikä sitä voi ohittaa URL-kohtaisesti — katso `access_url_locked`- ja `access_url_changeable`-sarakkeet `settings`-taulussa); toisia (useimpia) voidaan ohittaa käyttö-URL-kohtaisesti
* Muutokset tulevat voimaan heti (palvelinta ei tarvitse käynnistää uudelleen), vaikka käyttäjäistuntosi saattaa pitää osaa niistä muistissa. Jos muutokset eivät näy heti, kirjaudu ulos ja sisään istunnon tyhjentämiseksi.
* Joillakin asetuksilla on riippuvuuksia — yhden muuttaminen voi vaikuttaa toisten käyttäytymiseen
* Kullakin sivulla näytetyt muuttujien nimet (esim. `2fa_enable`) vastaavat `settings`-tietokantataulun riviä (`variable`-sarake) sekä ohituksissa käytettyjä avaimia (`config/settings_overrides.yaml`) soveltuvin osin.

Lisätietoja on wikissämme kohdassa [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations).

## Vinkkejä

* **Dokumentoi asetuksesi** — Pidä kirjaa oletuksesta poikkeavista asetuksista ja siitä, miksi muutit niitä
* **Muuta yhtä asiaa kerrallaan** — Vianmäärityksessä muuta yhtä asetusta kerrallaan, jotta vaikutus on tunnistettavissa
* **Testaa testiympäristössä** — Merkittävissä asetusmuutoksissa testaa ensin testiympäristön palvelimella