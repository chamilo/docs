# Entwicklungseinrichtung

## Voraussetzungen

* PHP 8.2+ mit den Erweiterungen: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js und npm (oder Yarn — das Projekt verwendet Yarn 4; siehe `package.json` für die genaue festgelegte Version)
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

Das Repository enthält `.env.dist` als Referenz. Erstellen Sie eine leere `.env`-Datei, die vom Web-Installer ausgefüllt wird — wenn sie leer bleibt, wird Ihre lokale Konfiguration bei Upgrades nicht überschrieben:

```bash
touch .env
```

Machen Sie dann `.env` und `config/` für den Webserver beschreibbar, damit der Installer Ihre lokale Konfiguration schreiben kann:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Frontend-Abhängigkeiten installieren und bauen

```bash
# JavaScript-Abhängigkeiten installieren
yarn install

# Frontend-Assets für die Entwicklung bauen
yarn encore dev

# Oder Änderungen während der Entwicklung überwachen
yarn encore dev --watch
```

### 5. Entwicklungsserver starten

```bash
symfony server:start
```

Oder verwenden Sie Apache/Nginx, die auf das Verzeichnis `public/` verweisen.

### 6. Datenbank einrichten

Führen Sie den webbasierten Installationsassistenten aus, indem Sie in einem Browser zu Ihrer Chamilo-URL navigieren.

### 7. JWT-Schlüssel generieren

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. System sichern

Die `.env`-Datei und das `config/`-Verzeichnis müssen nur während der Installation beschreibbar sein. Sichern Sie sie anschließend:

```bash
sudo chown -R root: .env config/
```

Das Verzeichnis `var/` muss für den Webserver weiterhin beschreibbar bleiben.

## Build-Befehle

| Befehl | Zweck |
|---------|---------|
| `yarn encore dev` | Frontend für die Entwicklung bauen |
| `yarn encore dev --watch` | Bauen und Änderungen überwachen |
| `yarn encore production` | Optimiert für die Produktion bauen |
| `php bin/console cache:clear` | Symfony-Cache leeren |

## Entwicklungstipps

* Setzen Sie `APP_ENV=dev` und `APP_DEBUG=1` in `.env` für detaillierte Fehlermeldungen
* Die Symfony-Debug-Toolbar erscheint im Entwicklungsmodus unten auf den Seiten
* API-Dokumentation ist unter `/api` verfügbar, wenn `APP_ENABLE_API_ENTRYPOINT=1`
* Verwenden Sie `yarn encore dev --watch`, um Frontend-Änderungen automatisch neu zu bauen