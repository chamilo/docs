# Configurazione per lo Sviluppo

## Prerequisiti

* PHP 8.2+ con estensioni: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js e npm (o Yarn — il progetto utilizza Yarn 4; consulta `package.json` per la versione esatta bloccata)
* MySQL 5.7+ o MariaDB 10.11+
* Git

## Passaggi per l'Installazione

### 1. Clonare il Repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installare le Dipendenze PHP

```bash
composer install
```

### 3. Configurare l'Ambiente

Il repository include `.env.dist` come riferimento. Crea un file `.env` vuoto che il programma di installazione web popolerà — mantenerlo vuoto assicura che gli aggiornamenti non sovrascrivano mai la tua configurazione locale:

```bash
touch .env
```

Quindi rendi `.env` e `config/` scrivibili dal server web affinché il programma di installazione possa scrivere la tua configurazione locale:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installare le Dipendenze Frontend e Compilare

```bash
# Installa le dipendenze JavaScript
yarn install

# Compila le risorse frontend per lo sviluppo
yarn encore dev

# Oppure osserva le modifiche durante lo sviluppo
yarn encore dev --watch
```

### 5. Avviare il Server di Sviluppo

```bash
symfony server:start
```

Oppure utilizza Apache/Nginx puntando alla directory `public/`.

### 6. Configurare il Database

Esegui il wizard di installazione basato sul web navigando all'URL di Chamilo nel browser.

### 7. Generare le Chiavi JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Proteggere il Sistema

Il file `.env` e la directory `config/` devono essere scrivibili solo durante l'installazione. Proteggili successivamente:

```bash
sudo chown -R root: .env config/
```

La directory `var/` deve rimanere scrivibile dal server web.

## Comandi di Compilazione

| Comando | Scopo |
|---------|-------|
| `yarn encore dev` | Compila il frontend per lo sviluppo |
| `yarn encore dev --watch` | Compila e osserva le modifiche |
| `yarn encore production` | Compila ottimizzato per la produzione |
| `php bin/console cache:clear` | Cancella la cache di Symfony |

## Suggerimenti per lo Sviluppo

* Imposta `APP_ENV=dev` e `APP_DEBUG=1` in `.env` per messaggi di errore dettagliati
* La barra degli strumenti di debug di Symfony appare in fondo alle pagine in modalità sviluppo
* La documentazione API è disponibile su `/api` quando `APP_ENABLE_API_ENTRYPOINT=1`
* Usa `yarn encore dev --watch` per ricompilare automaticamente le modifiche al frontend