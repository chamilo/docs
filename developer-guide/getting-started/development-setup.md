# Ontwikkelomgeving Instellen

## Vereisten

* PHP 8.2+ met extensies: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js en npm (of Yarn — het project gebruikt Yarn 4; zie `package.json` voor de exacte vastgepinde versie)
* MySQL 5.7+ of MariaDB 10.11+
* Git

## Installatiestappen

### 1. Kloont de Repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installeer PHP-afhankelijkheden

```bash
composer install
```

### 3. Configureer de Omgeving

De repository wordt geleverd met `.env.dist` als referentie. Maak een leeg `.env`-bestand aan dat door de webinstaller zal worden ingevuld — door het leeg te houden, wordt voorkomen dat upgrades uw lokale configuratie overschrijven:

```bash
touch .env
```

Maak vervolgens `.env` en `config/` schrijfbaar voor de webserver zodat de installer uw lokale configuratie kan schrijven:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installeer Frontend-afhankelijkheden en Bouw

```bash
# Installeer JavaScript-afhankelijkheden
yarn install

# Bouw frontend-assets voor ontwikkeling
yarn encore dev

# Of kijk naar wijzigingen tijdens ontwikkeling
yarn encore dev --watch
```

### 5. Start de Ontwikkelserver

```bash
symfony server:start
```

Of gebruik Apache/Nginx die verwijst naar de `public/` directory.

### 6. Stel de Database in

Voer de webgebaseerde installatiewizard uit door in een browser naar uw Chamilo-URL te navigeren.

### 7. Genereer JWT-sleutels

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Beveilig uw Systeem

Het `.env`-bestand en de `config/` directory hoeven alleen tijdens de installatie schrijfbaar te zijn. Beveilig ze daarna:

```bash
sudo chown -R root: .env config/
```

De `var/` directory moet schrijfbaar blijven voor de webserver.

## Bouwcommando's

| Commando | Doel |
|---------|------|
| `yarn encore dev` | Bouw frontend voor ontwikkeling |
| `yarn encore dev --watch` | Bouw en kijk naar wijzigingen |
| `yarn encore production` | Bouw geoptimaliseerd voor productie |
| `php bin/console cache:clear` | Wis Symfony-cache |

## Ontwikkeltips

* Stel `APP_ENV=dev` en `APP_DEBUG=1` in in `.env` voor gedetailleerde foutmeldingen
* De Symfony-debugtoolbar verschijnt onderaan pagina's in ontwikkelmodus
* API-documentatie is beschikbaar op `/api` wanneer `APP_ENABLE_API_ENTRYPOINT=1`
* Gebruik `yarn encore dev --watch` om frontend-wijzigingen automatisch opnieuw te bouwen