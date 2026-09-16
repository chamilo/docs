# Ontwikkelomgeving instellen

## Vereisten

* PHP 8.3, 8.4 of 8.5 met extensies: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js en npm (of Yarn — het project gebruikt Yarn 4; zie `package.json` voor de exacte vastgepinde versie)
* MySQL 5.7+ of MariaDB 10.11+
* Git

## Installatiestappen

### 1. Clone the Repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. PHP-afhankelijkheden installeren

```bash
composer install
```

### 3. Omgeving configureren

De repository bevat `.env.dist` als referentie. Maak een leeg `.env`-bestand aan dat de webinstaller zal invullen — leeg houden zorgt ervoor dat upgrades uw lokale configuratie nooit overschrijven:

```bash
touch .env
```

Maak daarna `.env` en `config/` beschrijfbaar voor de webserver, zodat de installer uw lokale configuratie kan wegschrijven:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Frontend-afhankelijkheden installeren en bouwen

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. De ontwikkelingsserver starten

```bash
symfony server:start
```

Of gebruik Apache/Nginx die naar de map `public/` wijst.

### 6. De database instellen

Voer de webgebaseerde installatiewizard uit door in een browser naar uw Chamilo-URL te gaan.

### 7. JWT-sleutels genereren

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Beveilig uw systeem

Het bestand `.env` en de map `config/` hoeven alleen tijdens de installatie beschrijfbaar te zijn. Beveilig ze daarna:

```bash
sudo chown -R root: .env config/
```

De map `var/` moet beschrijfbaar blijven voor de webserver.


## Bouwcommando's

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Frontend bouwen voor ontwikkeling |
| `yarn encore dev --watch` | Bouwen en wijzigingen volgen |
| `yarn encore production` | Geoptimaliseerd bouwen voor productie |
| `php bin/console cache:clear` | Symfony-cache legen |

## Tips voor ontwikkeling

* Stel `APP_ENV=dev` en `APP_DEBUG=1` in in `.env` voor gedetailleerde foutmeldingen
* De Symfony-debugwerkbalk verschijnt onderaan de pagina's in de ontwikkelmodus
* API-documentatie is beschikbaar op `/api` wanneer `APP_ENABLE_API_ENTRYPOINT=true` (na het legen van de cache — zie [Configuratie](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Gebruik `yarn encore dev --watch` om frontendwijzigingen automatisch opnieuw te bouwen