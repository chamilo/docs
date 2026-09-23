# Määritykset

Chamilo 3.0 käyttää ympäristömuuttujia ja Symfony-määritystiedostoja ydinasetuksilleen. Tällä sivulla käsitellään keskeiset määritystiedostot ja muuttujat.

## Ympäristömuuttujat (.env)

Ensisijainen määritystiedosto on `.env` Chamilon juurihakemistossa. Tämä tiedosto sisältää ympäristökohtaisia asetuksia, joita ei tule tallentaa versionhallintaan.

Chamilon mukana toimitetaan oletusarvoinen `.env.dist`-tiedosto, jossa on dokumentoidut oletusarvot. Luo `.env` (pakollinen asennuksen käynnistämiseksi) ohittaaksesi arvot omassa ympäristössäsi.

### Keskeiset muuttujat

| Muuttuja | Kuvaus | Esimerkki |
|----------|-------------|---------||
| `APP_ENV` | Sovellusympäristö Symfony-tasolla. Käytä `prod` tuotannossa, `dev` kehityksessä, 'test' testauksessa. | `prod` |
| `APP_SECRET` | Satunnainen merkkijono, jota käytetään CSRF-tunnisteisiin, evästeiden allekirjoitukseen ja muihin salausoperaatioihin. Chamilo luo yksilöllisen arvon kullekin asennukselle. Älä muuta sitä. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Tietokantapalvelimen isäntä. Oletuksena localhost | `localhost` |
| `DATABASE_PORT` | Tietokannan portti. Oletuksena 3306 MySQL/MariaDB:lle | `3306` |
| `DATABASE_NAME` | Tietokannan nimi, jonka annoit asennusvelholle. | Katso alla. |
| `DATABASE_USER` | Tietokannan käyttäjänimi, jonka annoit asennusvelholle. | Katso alla. |
| `DATABASE_PASSWORD` | Tietokantakäyttäjän salasana, jonka annoit asennusvelholle. | Katso alla. |
| `TRUSTED_PROXIES` | (Valinnainen) Jos Chamilo on käänteisen välityspalvelimen takana, sinun on annettava käänteisen välityspalvelimen IP-osoite(t) tähän, jotta Chamilo voi tulkita kutsut ja luoda vastaukset oikein. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Valinnainen) Julkaisee interaktiivisen API-dokumentaation (Swagger/OpenAPI) osoitteessa `/api`. Oletuksena pois päältä. Vaikutus edellyttää välimuistin tyhjennystä — katso [Ota API-dokumentaatio käyttöön](#enable-the-api-documentation) alla. | `true` |

Muut .env-tiedoston asetukset muuttuvat suhteellisen harvoin.

Huomaa, että tulevissa versioissa DATABASE_*-asetukset yhdistetään yhdeksi `DATABASE_URL`-muuttujaksi.

Sähköpostin lähetyksen määritykset esitetään asennuksen aikana, mutta niitä voi myöhemmin muuttaa hallintapaneelin `Alustan asetukset` -osiossa.

## Symfony-määritykset (config/-hakemisto)

Symfony-tason määritykset sijaitsevat `config/`-hakemistossa. Nämä YAML-tiedostot ohjaavat kehyksen toimintaa, palvelumäärityksiä ja pakettikohtaisia asetuksia.

Koko `config/`-hakemisto toimitetaan jokaisen Chamilo-paketin ja jokaisen päivityksen mukana — toisin kuin esimerkiksi `.env`, sitä ei suljeta pois eikä säilytetä erikseen päivityksen aikana. **Mikä tahansa suoraan `config/`- tai `config/packages/`-tiedostoon tehty muutos ylikirjoitetaan hiljaisesti seuraavan Chamilo-päivityksen yhteydessä.** Katso [Ympäristökohtaiset ohitukset](#environment-specific-overrides) alla tuetusta tavasta mukauttaa määrityksiä menettämättä muutoksia.

Näitä tiedostoja tarvitsee harvoin muokata, ja niiden muuttaminen voi tehdä portaalista toimintakyvyttömän, joten älä yritä muokata niitä, jos järjestelmän käytettävyys on varmistettava.

### Keskeiset määritystiedostot

| Tiedosto | Tarkoitus |
|------|---------|
| `config/authentication.yaml` | Todennusmenetelmien määritykset. |
| `config/packages/doctrine.yaml` | Tietokannan ja ORM:n määritykset. |
| `config/packages/security.yaml` | Todennus, palomuurit, käyttöoikeuksien hallinta ja roolihierarkiat. |
| `config/packages/cache.yaml` | Välimuistisovittimen määritykset (tiedostojärjestelmä, APCu, Redis). |
| `config/packages/framework.yaml` | Yleiset Symfony-kehyksen asetukset (istunto, CSRF, reititin, HTTP-välimuisti). |
| `config/packages/twig.yaml` | Mallimoottorin määritykset. |
| `config/services.yaml` | Sovelluspalveluiden määritykset ja riippuvuusinjektio. |

### Ympäristökohtaiset ohitukset

Symfony tukee ympäristökohtaisia määrityksiä. Tiedostot hakemistossa `config/packages/prod/` ohittavat oletukset, kun `APP_ENV=prod`, ja `config/packages/dev/` ohittaa, kun `APP_ENV=dev`.

Esimerkiksi `config/packages/prod/monolog.yaml` määrittää tyypillisesti vähemmän yksityiskohtaisen lokituksen kuin kehitysympäristön vastine.

Chamilo ei itse määritä mitään määrityksiä hakemistossa `config/packages/prod/`, joten jos haluat mukauttaa asetusta tiedostosta `config/packages/*.yaml`, **älä muokkaa perusTiedostoa** — luo samanniminen tiedosto hakemistoon `config/packages/prod/` (tai `dev/`/`test/`, sen ympäristön mukaan, johon vaikutus halutaan) sisältäen vain ohitettavat avaimet, ja tee muutokset sinne.

Tämä on tärkeää, koska perusTiedostot `config/packages/*.yaml` kuuluvat Chamilo-pakettiin: jokainen päivitys toimittaa ne uudelleen ja ylikirjoittaa sen, mitä siellä on, joten suoraan niihin tehdyt muokkaukset eivät säily päivityksessä. Koska Chamilo ei koskaan toimita mitään hakemistoihin `config/packages/prod/` (tai `dev/`/`test/`), kyseinen hakemisto on turvassa päivityksen ylikirjoitukselta ja on tuettu paikka paikallisille mukautuksille.

## Tiedostojen käyttöoikeudet

Teimme 2.0+:ssa työtä sen eteen, että käyttöoikeuksia tarvitaan vain yhdelle hakemistolle, ja tämä pätee edelleen versiossa 3.0. Kyseessä on `var/`-hakemisto, ja monimutkaisten ongelmien välttämiseksi riittää, että koko kansio asetetaan kirjoitettavaksi verkkopalvelimen järjestelmäkäyttäjälle.

Aseta käyttöoikeudet Debian-pohjaisissa järjestelmissä seuraavasti:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Yleisiä määritystehtäviä

### Vaihto tuotantotilaan

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Tyhjennä ja lämmitä sen jälkeen välimuisti:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### API-dokumentaation ottaminen käyttöön

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Tyhjennä sen jälkeen välimuisti, jotta muutos tulee voimaan:

```bash
php bin/console cache:clear
```

Vuorovaikutteinen API-dokumentaatio (Swagger/OpenAPI) on sen jälkeen saatavilla osoitteessa `/api`. Pelkkä `.env`-tiedoston muokkaaminen ei riitä: ratkaistu arvo on leivottu Symfonyn käännettyyn välimuistiin, joten `/api` palauttaa aiemman tilansa (käytössä tai ei) kunnes välimuisti tyhjennetään. Hallintapaneelin toiminto **Järjestelmä > Puhdista väliaikaiset tiedostot** *ei* tee tätä — ks. [Järjestelmätyökalut](../system/system-tools.md#clean-temporary-files) miksi — joten tämä muutos edellyttää komentorivikäyttöä komennon `cache:clear` suorittamiseen.

### Luotettujen välityspalvelimien määritys

Jos Chamilo toimii käänteisen välityspalvelimen tai kuormantasaajan takana, määritä luotetut välityspalvelimet, jotta HTTPS-tunnistus ja asiakkaan IP-osoitteen selvitys toimivat oikein:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Istuntosäilön määritys

Oletuksena istunnot tallennetaan tiedostojärjestelmään. Monipalvelinympäristöissä määritä Redis- tai tietokantapohjaiset istunnot:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Vinkkejä

* **Älä koskaan muokkaa `.env.dist`-tiedostoa suoraan** -- Käytä aina `.env`-tiedostoa omille ohituksillesi. `.env.dist`-tiedosto saatetaan ylikirjoittaa päivitysten yhteydessä.
* **Pidä `APP_DEBUG=0` tuotannossa** -- Virheenkorjaustila paljastaa virhesivuilla arkaluonteisia tietoja.
* **Varmuuskopioi `.env`** erikseen koodipohjasta, koska se sisältää tunnistetietoja eikä kuulu versionhallintaan.