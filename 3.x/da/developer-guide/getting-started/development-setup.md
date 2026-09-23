# Udviklingsopsætning

## Forudsætninger

* PHP 8.3, 8.4 eller 8.5 med udvidelserne: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js og npm (eller Yarn — projektet bruger Yarn 4; se `package.json` for den nøjagtige fastlåste version)
* MySQL 5.7+ eller MariaDB 10.11+
* Git

## Installationstrin

### 1. Klon lageret

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installer PHP-afhængigheder

```bash
composer install
```

### 3. Konfigurer miljøet

Lageret medfølger `.env.dist` som reference. Opret en tom `.env`-fil, som webinstallationsprogrammet vil udfylde — at holde den tom sikrer, at opgraderinger aldrig overskriver din lokale konfiguration:

```bash
touch .env
```

Gør derefter `.env` og `config/` skrivbare for webserveren, så installationsprogrammet kan skrive din lokale konfiguration:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installer frontend-afhængigheder og byg

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Start udviklingsserveren

```bash
symfony server:start
```

Eller brug Apache/Nginx, der peger på mappen `public/`.

### 6. Opsæt databasen

Kør den webbaserede installationsguide ved at navigere til din Chamilo-URL i en browser.

### 7. Generer JWT-nøgler

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Sikr dit system

Filen `.env` og mappen `config/` behøver kun at være skrivbare under selve installationen. Sikr dem bagefter:

```bash
sudo chown -R root: .env config/
```

Mappen `var/` skal forblive skrivbar for webserveren.


## Byggekommandoer

| Kommando | Formål |
|---------|---------|
| `yarn encore dev` | Byg frontend til udvikling |
| `yarn encore dev --watch` | Byg og overvåg ændringer |
| `yarn encore production` | Byg optimeret til produktion |
| `php bin/console cache:clear` | Ryd Symfony-cachen |

## Udviklingstips

* Sæt `APP_ENV=dev` og `APP_DEBUG=1` i `.env` for detaljerede fejlmeddelelser
* Symfony-fejlfindingsværktøjslinjen vises nederst på siderne i udviklingsmodus
* API-dokumentation er tilgængelig på `/api`, når `APP_ENABLE_API_ENTRYPOINT=true` (efter en cache-rydning — se [Konfiguration](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Brug `yarn encore dev --watch` til automatisk at genbygge frontend-ændringer