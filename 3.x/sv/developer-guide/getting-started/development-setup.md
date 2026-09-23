# Utvecklingsmiljö

## Förutsättningar

* PHP 8.3, 8.4 eller 8.5 med tillägg: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js och npm (eller Yarn — projektet använder Yarn 4; se `package.json` för den exakta låsta versionen)
* MySQL 5.7+ eller MariaDB 10.11+
* Git

## Installationssteg

### 1. Klona arkivet

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installera PHP-beroenden

```bash
composer install
```

### 3. Konfigurera miljön

Arkivet levereras med `.env.dist` som referens. Skapa en tom `.env`-fil som webbinstallationen fyller i — att lämna den tom säkerställer att uppgraderingar aldrig skriver över din lokala konfiguration:

```bash
touch .env
```

Gör därefter `.env` och `config/` skrivbara för webbservern så att installationsprogrammet kan skriva din lokala konfiguration:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installera frontend-beroenden och bygg

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Starta utvecklingsservern

```bash
symfony server:start
```

Eller använd Apache/Nginx som pekar mot katalogen `public/`.

### 6. Konfigurera databasen

Kör den webbaserade installationsguiden genom att gå till din Chamilo-URL i en webbläsare.

### 7. Generera JWT-nycklar

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Säkra ditt system

Filen `.env` och katalogen `config/` behöver bara vara skrivbara under installationen. Säkra dem efteråt:

```bash
sudo chown -R root: .env config/
```

Katalogen `var/` måste förbli skrivbar för webbservern.


## Byggkommandon

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Bygg frontend för utveckling |
| `yarn encore dev --watch` | Bygg och bevaka ändringar |
| `yarn encore production` | Bygg optimerat för produktion |
| `php bin/console cache:clear` | Rensa Symfony-cache |

## Utvecklingstips

* Sätt `APP_ENV=dev` och `APP_DEBUG=1` i `.env` för detaljerade felmeddelanden
* Symfony:s felsökningsverktygsfält visas längst ned på sidorna i utvecklingsläge
* API-dokumentation finns tillgänglig på `/api` när `APP_ENABLE_API_ENTRYPOINT=true` (efter cache-rensning — se [Konfiguration](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Använd `yarn encore dev --watch` för att automatiskt bygga om frontend-ändringar