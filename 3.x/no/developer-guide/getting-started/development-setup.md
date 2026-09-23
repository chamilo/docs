# Utviklingsoppsett

## Forutsetninger

* PHP 8.3, 8.4 eller 8.5 med utvidelsene: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js og npm (eller Yarn — prosjektet bruker Yarn 4; se `package.json` for den nøyaktig låste versjonen)
* MySQL 5.7+ eller MariaDB 10.11+
* Git

## Installasjonstrinn

### 1. Klon repositoriet

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installer PHP-avhengigheter

```bash
composer install
```

### 3. Konfigurer miljøet

Repositoriet leveres med `.env.dist` som referanse. Opprett en tom `.env`-fil som den nettbaserte installasjonsveiviseren vil fylle ut — å holde den tom sikrer at oppgraderinger aldri overskriver din lokale konfigurasjon:

```bash
touch .env
```

Gjør deretter `.env` og `config/` skrivbare for webserveren slik at installasjonsveiviseren kan skrive din lokale konfigurasjon:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installer frontend-avhengigheter og bygg

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Start utviklingsserveren

```bash
symfony server:start
```

Eller bruk Apache/Nginx som peker mot `public/`-katalogen.

### 6. Sett opp databasen

Kjør den nettbaserte installasjonsveiviseren ved å gå til Chamilo-URL-en din i en nettleser.

### 7. Generer JWT-nøkler

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Sikre systemet

`.env`-filen og `config/`-katalogen trenger bare å være skrivbare under selve installasjonen. Sikre dem etterpå:

```bash
sudo chown -R root: .env config/
```

`var/`-katalogen må forbli skrivbar for webserveren.


## Byggekommandoer

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Bygg frontend for utvikling |
| `yarn encore dev --watch` | Bygg og overvåk endringer |
| `yarn encore production` | Bygg optimalisert for produksjon |
| `php bin/console cache:clear` | Tøm Symfony-hurtigbufferen |

## Utviklingstips

* Sett `APP_ENV=dev` og `APP_DEBUG=1` i `.env` for detaljerte feilmeldinger
* Symfony-feilsøkingsverktøylinjen vises nederst på sidene i utviklingsmodus
* API-dokumentasjon er tilgjengelig på `/api` når `APP_ENABLE_API_ENTRYPOINT=true` (etter tømming av hurtigbufferen — se [Konfigurasjon](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Bruk `yarn encore dev --watch` for automatisk gjenbygging av frontend-endringer