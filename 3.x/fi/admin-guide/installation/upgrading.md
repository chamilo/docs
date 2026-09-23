# Päivitys

Huomautus: Tällä sivulla käytämme 3.0.0:aa tarkkana versionumerona ja 3.x:ää tunnistamaan kaikki versiot, jotka alkavat numerolla 3 (3.0.0, 3.0.1, 3.1.0 jne.). Sama käytäntö koskee 2.x:ää.

Päivitysprosessi versiosta 1.11.x on kuvattu myös tiedostossa `public/documentation/installation_guide.html` Chamilo-koodissasi.
Tässä olevat tiedot ovat suurelta osin päällekkäisiä. Voit nähdä ne verkossa osoitteessa `https://campus.chamilo.net/documentation/installation_guide.html`.

**Päivitä versioon 3.0, älä versioon 2.x.** Versio 3.0 on nykyinen julkaisu, eikä joillakin 1.11.x-asetuksilla ollut vielä vastinetta versiossa 2.0.0. 1.11.x-järjestelmä siirtyy siksi suoraan versioon 3.0. Olemme testanneet vastaavia migraatioita laajasti, mutta jokaisella alustalla on oma historiansa: kokeile ensin testiympäristössä ja harkitse ammattimaista tukea [virallisilta Chamilo-toimittajilta](https://chamilo.org/providers) tässä hankkeessa.

## Päivitys versiosta 1.11.x versioon 3.0

Päivitys Chamilo 1.11.x:stä versioon 3.0 on **merkittävä migraatio**, ei yksinkertainen päivitys. Chamilo 2.0 rakennettiin uudelleen Symfony-kehykselle uudelleenjärjestetyllä tietokantakaavalla, uudella API:lla ja erilaisella tiedostorakenteella, ja 3.0 jatkaa samaa linjaa. Suunnittele tämä migraatio huolellisesti ja kokeile sitä testiympäristössä ennen tuotantoon viemistä.

### Ennen kuin aloitat

1. **Lue julkaisutiedot** Chamilo 3.x:lle ymmärtääksesi, mikä on muuttunut, mikä on uutta ja mitkä 1.11.x:n ominaisuudet eivät ehkä ole vielä saatavilla.
2. **Varmuuskopioi kaikki**:
   - Täydellinen tietokantavedos (`mysqldump` tai vastaava).
   - Kaikki tiedostot Chamilo 1.11.x -asennushakemistossa, erityisesti `app/upload/`, `app/courses/` ja `main/`.
   - `configuration.php`-tiedostosi.
3. **Testaa ensin staging-palvelimella.** Älä koskaan suorita migraatiota suoraan tuotantopalvelimella.
4. **Tarkista palvelinvaatimukset.** Chamilo 3.x:llä on erilaiset vaatimukset kuin 1.11.x:llä (erityisesti PHP 8.3 tai uudempi — asennusohjelma hylkää kaiken vanhemman). Katso [Palvelinvaatimukset](server-requirements.md).
5. **Poista `version`-taulu 1.11.x-tietokannasta.** Tämä vaihe on pakollinen. Chamilo 2.x ja myöhemmät tallentavat Doctrine-migraatiohistorian samannimiseen tauluun, jossa on muita sarakkeita. Jos jätät 1.11.x-taulun paikalleen, päivitys pysähtyy heti. Taulu ei ole tarpeen Chamilo 1.11.x:n toiminnalle.
6. **Pura uusi koodi uuteen hakemistoon.** 1.11.x-tiedostot jäävät paikoilleen. Asennusohjelma lukee ne kurssiesi ja lataustesi lähteenä ja kirjoittaa tuloksen uuteen puuhun.

### Päivityksen suorittaminen

Voit suorittaa päivityksen verkkovelhon tai komentorivin kautta.

#### Verkkovelho

1. Osoita virtuaali-isäntäsi `DocumentRoot` uuden puun `public/`-alihakemistoon.
2. Avaa URL-osoitteesi. Velho käynnistyy, koska uudessa puussa ei ole vielä `.env`-tiedostoa.
3. Vaiheessa 2 valitse päivitysvaihtoehto ja anna 1.11.x-asennuksesi juuripolku.
4. Seuraa velhoa loppuun asti.

#### Komentorivi

Aseta `UPDATE_PATH` 1.11.x-asennuksesi juureen ja suorita sitten migraatiot:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Nosta ensin `memory_limit` ja `max_execution_time`. Migraatio lukee jokaisen kurssitiedoston, joten se tarvitsee huomattavasti enemmän kuin oletusarvot.

#### Kuinka kauan se kestää

Kesto riippuu tietokantasi ja kurssitiedostojesi koosta. Vertailukohtana 1.11.28-alusta, jossa oli 238 taulua, 11 kurssia, 63 käyttäjää ja 1489 kurssitiedostoa, kesti **6 minuuttia** ja 1,7 Gt muistia ja suoritti 393 migraatiota. Suuri tuotantoalusta vie tunteja. Suunnittele huoltoikkuna ja lue [Chamilo-foorumi](https://chamilo.org) tai ota yhteyttä [viralliseen toimittajaan](https://chamilo.org/providers) ennen kuin suoritat sen tuotannossa.

### Mikä voi vaatia manuaalista huomiota

| Alue | Huomautukset |
|------|-------|
| **Mukautetut liitännäiset** | 1.11.x-liitännäiset eivät toimi 2.x:ssä tai 3.x:ssä. Ne on kirjoitettava uudelleen tai korvattava. Viralliset on siirretty asteittain versiosta 2.0 lähtien — tarkista versiosi liitännäislista nähdäksesi, mitkä ovat saatavilla. |
| **Mukautetut teemat** | 1.11.x-teemat eivät toimi 2.x:ssä tai 3.x:ssä. Luo brändäyksesi uudelleen 3.x-teemajärjestelmällä. |
| **Mukautetut tietokantamuutokset** | Mitkä tahansa suorat tietokantamuutokset Chamilon ulkopuolella eivät välttämättä siirry. |
| **SCORM-paketit** | SCORM-sisällön pitäisi siirtyä, mutta testaa paketit yksitellen toiston varmistamiseksi. |
| **Ulkoiset integraatiot** | Kaikki 1.11.x API:ta tai verkkopalveluita käyttävät integraatiot on päivitettävä käyttämään 2.x:n pelkkää REST-API:ta [API Platformin](https://github.com/api-platform/api-platform) avulla. |

## Päivitys versiosta 2.x versioon 3.0

Tämä päivitys säilyttää olemassa olevan hakemistosi ja olemassa olevan tietokantasi. Kopioit uuden koodin vanhan puun päälle ja suoritat sitten migraatiot joko verkkovelhon tai komentorivin kautta.

### Siementä migraatiohistoria ensin

Chamilo asentaa tietokantakaavion suoraan entiteettimäärittelyistä, joten asennusohjelman luoma asennus sisältää lopullisen kaavion mutta **tyhjän migraatiohistorian**. Ennen Chamilo 3.0:aa luoduille asennuksille tätä historiaa ei koskaan annettu. Kaksi asiaa riippuu siitä:

* `doctrine:migrations:migrate` päättää sen perusteella, mitä suoritetaan. Tyhjällä historialla se yrittää toistaa jokaisen migraation alusta alkaen kaaviolle, joka on jo ajan tasalla.
* Verkkoasennusohjelma päättää sen perusteella, onko päivitys odottamassa. Tyhjällä historialla se hylkää pyynnön, koska mikään ei osoita, että päivitys olisi tarpeen.

Siementä se siis kerran ja noudata alla olevaa järjestystä.

> **Varoitus: siementä historia ennen uuden koodin kopioimista.** Komennot merkitsevät jokaisen migraation, jonka **käyttöön otettu** koodi sisältää, jo suoritetuksi. Jos suoritat ne sen jälkeen, kun olet kopioinut 3.0-koodin, ne merkitsevät myös 3.0-migraatiot, eikä päivityksesi koskaan suoritu.

Kun nykyinen versiosi on vielä paikallaan, suorita:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Ensimmäinen komento luo historiatiedon. Toinen merkitsee nykyisen versiosi migraatiot. `doctrine:migrations:version` epäonnistuu itsessään, jos taulua ei vielä ole, joten älä ohita ensimmäistä.

Tarkista tulos:

```bash
php bin/console doctrine:migrations:status
```

`Executed`-arvon on oltava yhtä suuri kuin `Available`, ja `New`-arvon on oltava 0. Kopioi nyt 3.0-koodi.

### Suorita päivitys

Kopioi uusi koodi ja avaa sitten URL-osoitteesi ja seuraa ohjattua toimintoa tai suorita migraatiot komentoriviltä:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Verkko-ohjattu toiminto avautuu vain, kun migraatiot ovat odottamassa. Kun päivitys on valmis, se vastaa jälleen `409 Conflict`, mikä suojaa sitä: ohjatulla toiminnolla ei ole omaa kirjautumista.

## Chamilo 3.0.x:n päivittäminen

Pienet päivitykset 3.0-haarassa ovat suoraviivaisempia.

### Päivitysprosessi

#### Pakettia käyttäen

1. **Varmuuskopioi** tietokanta ja tiedostot.

2. **Lataa uusin 3.0.x-versio** osoitteesta [chamilo.org](https://chamilo.org/download):

3. **Pura paikallisesti**

Esimerkiksi (sovita ladattuun versioon)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopioi tiedostot olemassa olevan Chamilo-asennuksesi päälle**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Suorita tietokantamigraatiot:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Tyhjennä välimuisti:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Muuta käyttöoikeuksia**

Sovita verkkopalvelimesi käyttäjään:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Varmista**, että alusta latautuu oikein, ja tarkista pistokokein keskeiset toiminnot.

#### Gitiä käyttäen

Jos asensit Chamilon Gitillä, voit noudattaa näitä ohjeita sen sijaan.

1. **Varmuuskopioi** tietokanta ja tiedostot.

2. **Hae uusin koodi** (tai lataa uusi julkaisu):
   ```bash
   git pull origin 3.0
   ```

3. **Päivitä PHP-riippuvuudet:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Päivitä JavaScript-riippuvuudet ja rakenna assetit uudelleen:**
   ```bash
   yarn install && yarn build
   ```

5. **Suorita tietokantamigraatiot:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Tyhjennä välimuisti:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Muuta käyttöoikeuksia**

Sovita verkkopalvelimesi käyttäjään:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Varmista**, että alusta latautuu oikein, ja tarkista pistokokein keskeiset toiminnot.

### Päivitysten automatisointi

Organisaatioille, jotka hallinnoivat useita Chamilo-instansseja, harkitse päivitysprosessin skriptaamista:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Vinkkejä

* **Varmuuskopioi aina ennen päivitystä.** Tietokantamigraatioita ei voi perua Chamilon käyttöliittymän kautta.
* **Testaa ensin testiympäristössä** -- erityisesti 1.11.x:stä 3.0:aan siirtymisessä, joka sisältää merkittävää tietojen muuntamista.
* **Ajoita päivitykset huoltoikkunoihin**, jolloin käyttäjät eivät käytä alustaa aktiivisesti.
* **Tilaa GitHub-julkaisut** [Githubissa](https://github.com/chamilo/chamilo-lms/releases) kellokuvakkeella, jotta saat ilmoitukset uusista versioista ja tietoturvakorjauksista.
* **Jos ohjattu toiminto vastaa `Chamilo is already installed`**, se ei löytänyt odottavia migraatioita. Suorita `php bin/console doctrine:migrations:status` tarkistaaksesi. Jos `Executed` on 0 toimivalla alustalla, migraatiohistoriaa ei ole koskaan alustettu — katso [Alusta migraatiohistoria ensin](#seed-the-migration-history-first).
* **Uusien versioiden automaattista latausta** ei vielä tarjota Chamilo 3.0:ssa, mutta tämä on käynnissä oleva hanke, jonka toivomme julkaisevamme pian. Itse päivitys suoritetaan jo verkkopohjaisesta ohjatusta toiminnosta.