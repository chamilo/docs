# Entwicklungsumgebung einrichten

## Voraussetzungen

* PHP 8.3, 8.4 oder 8.5 mit den Erweiterungen: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js und npm (oder Yarn — das Projekt verwendet Yarn 4; die exakt festgelegte Version finden Sie in `package.json`)
* MySQL 5.7+ oder MariaDB 10.11+
* Git

## Installationsschritte

### 1. Repository klonen

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. PHP-Abhängigkeiten installieren

```bash
composer install
```

### 3. Umgebung konfigurieren

Das Repository enthält `.env.dist` als Referenz. Legen Sie eine leere `.env`-Datei an, die der Web-Installer befüllt — wenn sie leer bleibt, überschreiben Upgrades Ihre lokale Konfiguration nicht:

```bash
touch .env
```

Machen Sie anschließend `.env` und `config/` für den Webserver beschreibbar, damit der Installer Ihre lokale Konfiguration schreiben kann:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Frontend-Abhängigkeiten installieren und bauen

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Entwicklungsserver starten

```bash
symfony server:start
```

Oder verwenden Sie Apache/Nginx mit dem Verzeichnis `public/` als Document Root.

### 6. Datenbank einrichten

Führen Sie den webbasierten Installationsassistenten aus, indem Sie in einem Browser zu Ihrer Chamilo-URL navigieren.

### 7. JWT-Schlüssel erzeugen

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. System absichern

Die Datei `.env` und das Verzeichnis `config/` müssen nur während der Installation beschreibbar sein. Sichern Sie sie anschließend:

```bash
sudo chown -R root: .env config/
```

Das Verzeichnis `var/` muss für den Webserver beschreibbar bleiben.


## Build-Befehle

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Frontend für die Entwicklung bauen |
| `yarn encore dev --watch` | Bauen und auf Änderungen überwachen |
| `yarn encore production` | Optimiert für die Produktion bauen |
| `php bin/console cache:clear` | Symfony-Cache leeren |

## Tipps für die Entwicklung

* Setzen Sie `APP_ENV=dev` und `APP_DEBUG=1` in `.env` für detaillierte Fehlermeldungen
* Die Symfony-Debug-Leiste erscheint im Entwicklungsmodus am unteren Rand der Seiten
* Die API-Dokumentation ist unter `/api` verfügbar, wenn `APP_ENABLE_API_ENTRYPOINT=true` gesetzt ist (nach dem Leeren des Caches — siehe [Konfiguration](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Verwenden Sie `yarn encore dev --watch`, um Frontend-Änderungen automatisch neu zu bauen