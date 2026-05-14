# Konfiguration

Chamilo 2.0 verwendet Umgebungsvariablen und Symfony-Konfigurationsdateien für seine grundlegenden Einstellungen. Diese Seite behandelt die wichtigsten Konfigurationsdateien und Variablen.

## Umgebungsvariablen (.env)

Die primäre Konfigurationsdatei ist `.env` im Chamilo-Stammverzeichnis. Diese Datei enthält umgebungsspezifische Einstellungen, die nicht in die Versionskontrolle aufgenommen werden sollten.

Eine Standarddatei `.env.dist` wird mit Chamilo ausgeliefert und enthält dokumentierte Standardwerte. Erstellen Sie `.env` (erforderlich, um die Installation zu starten), um Werte für Ihre Umgebung zu überschreiben.

### Wichtige Variablen

| Variable | Beschreibung | Beispiel |
|----------|--------------|----------|
| `APP_ENV` | Die Anwendungsumgebung auf Symfony-Ebene. Verwenden Sie `prod` für Produktion, `dev` für Entwicklung, 'test' für Tests. | `prod` |
| `APP_SECRET` | Eine zufällige Zeichenfolge, die für CSRF-Token, Cookie-Signierung und andere kryptografische Operationen verwendet wird. Chamilo generiert für jede Installation einen eindeutigen Wert. Ändern Sie diesen nicht. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Der Datenbank-Host. Standardmäßig localhost. | `localhost` |
| `DATABASE_PORT` | Der Datenbank-Port. Standardmäßig 3306 für MySQL/MariaDB. | `3306` |
| `DATABASE_NAME` | Der Datenbankname, wie von Ihnen im Installationsassistenten angegeben. | Siehe unten. |
| `DATABASE_USER` | Der Datenbank-Benutzername, wie von Ihnen im Installationsassistenten angegeben. | Siehe unten. |
| `DATABASE_PASSWORD` | Das Passwort des Datenbank-Benutzers, wie von Ihnen im Installationsassistenten angegeben. | Siehe unten. |
| `TRUSTED_PROXIES` | (Optional) Wenn Sie Chamilo hinter einem Reverse-Proxy hosten, müssen Sie hier die IP(s) des Reverse-Proxys angeben, damit Chamilo Aufrufe korrekt interpretieren und Antworten generieren kann. | |

Andere Einstellungen in .env werden relativ selten geändert.

Beachten Sie, dass in zukünftigen Versionen die DATABASE_*-Einstellungen in eine einzige `DATABASE_URL`-Variable zusammengefasst werden.

Die Konfiguration für das Senden von E-Mails wird während der Installation angezeigt, kann aber später im Abschnitt `Plattformeinstellungen` des Administrations-Dashboards geändert werden.

## Symfony-Konfiguration (config/-Verzeichnis)

Die Konfiguration auf Symfony-Ebene befindet sich im Verzeichnis `config/`. Diese YAML-Dateien steuern das Verhalten des Frameworks, Dienstdefinitionen und paket-spezifische Einstellungen.

Es ist nicht häufig notwendig, diese Dateien zu ändern, und Änderungen können Ihr Portal funktionsunfähig machen. Versuchen Sie daher nicht, diese zu ändern, wenn Sie die Verfügbarkeit des Systems sicherstellen müssen.

### Wichtige Konfigurationsdateien

| Datei | Zweck |
|------|-------|
| `config/authentication.yaml` | Konfiguration der Authentifizierungsmethoden. |
| `config/packages/doctrine.yaml` | Datenbank- und ORM-Konfiguration. |
| `config/packages/security.yaml` | Authentifizierung, Firewalls, Zugriffskontrolle und Rollenhierarchien. |
| `config/packages/cache.yaml` | Cache-Adapter-Konfiguration (Dateisystem, APCu, Redis). |
| `config/packages/framework.yaml` | Allgemeine Symfony-Framework-Einstellungen (Sitzung, CSRF, Router, HTTP-Caching). |
| `config/packages/twig.yaml` | Konfiguration der Template-Engine. |
| `config/services.yaml` | Definitionen von Anwendungsdiensten und Dependency Injection. |

### Umgebungsspezifische Überschreibungen

Symfony unterstützt umgebungsspezifische Konfigurationen. Dateien in `config/packages/prod/` überschreiben die Standardwerte, wenn `APP_ENV=prod`, und `config/packages/dev/` überschreibt, wenn `APP_ENV=dev`.

Zum Beispiel konfiguriert `config/packages/prod/monolog.yaml` in der Regel eine weniger ausführliche Protokollierung als das Entwicklungspendant.

Chamilo definiert in der Software selbst keine Konfiguration in `config/packages/prod/`. Wenn Sie also Einstellungen aus `config/packages/*.yaml` anpassen möchten, erstellen Sie einfach eine Kopie der YAML-Datei in diesem Verzeichnis und ändern Sie dort die Einstellungen.

## Dateiberechtigungen

Wir haben in Version 2.0+ darauf geachtet, dass nur ein einziges Verzeichnis Berechtigungen benötigt. Dies ist das Verzeichnis `var/`. Um komplexe Probleme zu vermeiden, reicht es aus, das gesamte Verzeichnis für den Webserver-Systembenutzer schreibbar zu machen.

Setzen Sie die Berechtigungen unter Debian-basierten Systemen entsprechend:

```bash
# Für Systeme, bei denen der Webserver als www-data läuft
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Häufige Konfigurationsaufgaben

### Wechsel in den Produktionsmodus

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Leeren und erwärmen Sie dann den Cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Konfiguration vertrauenswürdiger Proxies

Wenn Chamilo hinter einem Reverse-Proxy oder Load-Balancer läuft, konfigurieren Sie vertrauenswürdige Proxies, damit die HTTPS-Erkennung und die Auflösung der Client-IP korrekt funktionieren:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Konfiguration der Sitzungsspeicherung

Standardmäßig werden Sitzungen im Dateisystem gespeichert. Für Multi-Server-Bereitstellungen konfigurieren Sie Redis- oder datenbankgestützte Sitzungen:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Tipps

* **Bearbeiten Sie niemals `.env.dist` direkt** -- Verwenden Sie immer `.env` für Ihre Anpassungen. Die Datei `.env.dist` kann bei Upgrades überschrieben werden.
* **Behalten Sie `APP_DEBUG=0` in der Produktion** -- Der Debug-Modus gibt sensible Informationen auf Fehlerseiten preis.
* **Sichern Sie `.env` separat** vom Codebase, da sie Zugangsdaten enthält und vom Versionskontrollsystem ausgeschlossen ist.