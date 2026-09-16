# Configurazione dell'ambiente di sviluppo

## Prerequisiti

* PHP 8.3, 8.4 o 8.5 con le estensioni: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js e npm (o Yarn — il progetto usa Yarn 4; vedere `package.json` per la versione esatta fissata)
* MySQL 5.7+ o MariaDB 10.11+
* Git

## Passaggi di installazione

### 1. Clonare il repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installare le dipendenze PHP

```bash
composer install
```

### 3. Configurare l'ambiente

Il repository include `.env.dist` come riferimento. Creare un file `.env` vuoto che verrà popolato dall'installatore web — lasciarlo vuoto garantisce che gli aggiornamenti non sovrascrivano mai la configurazione locale:

```bash
touch .env
```

Rendere quindi `.env` e `config/` scrivibili dal server web, in modo che l'installatore possa scrivere la configurazione locale:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installare le dipendenze frontend e compilare

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Avviare il server di sviluppo

```bash
symfony server:start
```

Oppure usare Apache/Nginx puntando alla directory `public/`.

### 6. Configurare il database

Eseguire la procedura guidata di installazione basata sul web navigando all'URL di Chamilo nel browser.

### 7. Generare le chiavi JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Mettere in sicurezza il sistema

Il file `.env` e la directory `config/` devono essere scrivibili solo per la durata dell'installazione. Metterli in sicurezza in seguito:

```bash
sudo chown -R root: .env config/
```

La directory `var/` deve rimanere scrivibile dal server web.


## Comandi di build

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Compila il frontend per lo sviluppo |
| `yarn encore dev --watch` | Compila e osserva le modifiche |
| `yarn encore production` | Compila in modo ottimizzato per la produzione |
| `php bin/console cache:clear` | Svuota la cache di Symfony |

## Consigli per lo sviluppo

* Impostare `APP_ENV=dev` e `APP_DEBUG=1` in `.env` per messaggi di errore dettagliati
* La barra di debug di Symfony compare in fondo alle pagine in modalità di sviluppo
* La documentazione API è disponibile all'indirizzo `/api` quando `APP_ENABLE_API_ENTRYPOINT=true` (dopo uno svuotamento della cache — vedere [Configurazione](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Usare `yarn encore dev --watch` per ricompilare automaticamente le modifiche al frontend