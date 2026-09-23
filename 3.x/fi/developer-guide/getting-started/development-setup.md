# Kehitysympäristön asennus

## Esivaatimukset

* PHP 8.3, 8.4 tai 8.5 laajennuksilla: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js ja npm (tai Yarn — projekti käyttää Yarn 4:ää; tarkka kiinnitetty versio on tiedostossa `package.json`)
* MySQL 5.7+ tai MariaDB 10.11+
* Git

## Asennusvaiheet

### 1. Kloonaa tietovarasto

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Asenna PHP-riippuvuudet

```bash
composer install
```

### 3. Määritä ympäristö

Tietovarasto sisältää tiedoston `.env.dist` viitteeksi. Luo tyhjä `.env`-tiedosto, jonka verkkopohjainen asennusohjelma täyttää — tyhjänä pitäminen varmistaa, etteivät päivitykset koskaan ylikirjoita paikallista määritystäsi:

```bash
touch .env
```

Tee sen jälkeen `.env` ja `config/` kirjoitettaviksi verkkopalvelimelle, jotta asennusohjelma voi kirjoittaa paikallisen määrityksesi:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Asenna käyttöliittymän riippuvuudet ja rakenna

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Käynnistä kehityspalvelin

```bash
symfony server:start
```

Tai käytä Apachea/Nginxia osoittamaan hakemistoon `public/`.

### 6. Määritä tietokanta

Suorita verkkopohjainen asennusvelho siirtymällä selaimessa Chamilo-osoitteeseesi.

### 7. Luo JWT-avaimet

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Suojaa järjestelmäsi

Tiedoston `.env` ja hakemiston `config/` tarvitsee olla kirjoitettavissa vain asennuksen ajan. Suojaa ne sen jälkeen:

```bash
sudo chown -R root: .env config/
```

Hakemiston `var/` on pysyttävä verkkopalvelimen kirjoitettavana.


## Rakennuskomennot

| Komento | Tarkoitus |
|---------|---------|
| `yarn encore dev` | Rakenna käyttöliittymä kehitystä varten |
| `yarn encore dev --watch` | Rakenna ja seuraa muutoksia |
| `yarn encore production` | Rakenna optimoituna tuotantoa varten |
| `php bin/console cache:clear` | Tyhjennä Symfony-välimuisti |

## Kehitysvinkkejä

* Aseta `.env`-tiedostoon `APP_ENV=dev` ja `APP_DEBUG=1` saadaksesi yksityiskohtaiset virheilmoitukset
* Symfony-virheenkorjaustyökalurivi näkyy sivujen alareunassa kehitystilassa
* API-dokumentaatio on saatavilla osoitteessa `/api`, kun `APP_ENABLE_API_ENTRYPOINT=true` (välimuistin tyhjennyksen jälkeen — katso [Määritys](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Käytä komentoa `yarn encore dev --watch` rakentaaksesi käyttöliittymän muutokset automaattisesti uudelleen