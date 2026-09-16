# Konfiguration

Chamilo 3.0 verwendet Umgebungsvariablen und Symfony-Konfigurationsdateien für seine Kern-Einstellungen. Diese Seite behandelt die wichtigsten Konfigurationsdateien und Variablen.

## Umgebungsvariablen (.env)

Die primäre Konfigurationsdatei ist `.env` im Chamilo-Stammverzeichnis. Diese Datei enthält umgebungsspezifische Einstellungen, die nicht ins Versionskontrollsystem übernommen werden sollten.

Mit Chamilo wird eine Standarddatei `.env.dist` ausgeliefert, die dokumentierte Standardwerte enthält. Erstellen Sie `.env` (erforderlich, um die Installation zu starten), um Werte für Ihre Umgebung zu überschreiben.

### Wichtige Variablen

| Variable | Beschreibung | Beispiel |
|----------|-------------|---------|
| `APP_ENV` | Die Anwendungsumgebung auf Symfony-Ebene. Verwenden Sie `prod` für Produktion, `dev` für Entwicklung, 'test' für Tests. | `prod` |
| `APP_SECRET` | Eine zufällige Zeichenkette, die für CSRF-Token, Cookie-Signierung und andere kryptografische Operationen verwendet wird. Chamilo erzeugt für jede Installation einen eindeutigen Wert. Ändern Sie ihn nicht. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Der Datenbank-Host. Standard ist localhost | `localhost` |
| `DATABASE_PORT` | Der Datenbank-Port. Standard ist 3306 für MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Der Datenbankname, wie Sie ihn im Installationsassistenten angegeben haben. | Siehe unten. |
| `DATABASE_USER` | Der Datenbank-Benutzername, wie Sie ihn im Installationsassistenten angegeben haben. | Siehe unten. |
| `DATABASE_PASSWORD` | Das Passwort des Datenbankbenutzers, wie Sie es im Installationsassistenten angegeben haben. | Siehe unten. |
| `TRUSTED_PROXIES` | (Optional) Wenn Sie Chamilo hinter einem Reverse-Proxy betreiben, müssen Sie hier die IP-Adresse(n) des Reverse-Proxys angeben, damit Chamilo Aufrufe korrekt interpretieren und Antworten korrekt erzeugen kann. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optional) Stellt die interaktive API-Dokumentation (Swagger/OpenAPI) unter `/api` bereit. Standardmäßig deaktiviert. Erfordert das Leeren des Caches, um wirksam zu werden — siehe [API-Dokumentation aktivieren](#enable-the-api-documentation) unten. | `true` |

Weitere Einstellungen in .env werden vergleichsweise selten geändert.

Beachten Sie, dass in zukünftigen Versionen die DATABASE_*-Einstellungen zu einer einzigen Variable `DATABASE_URL` zusammengefasst werden.

Die Konfiguration des E-Mail-Versands wird während der Installation angezeigt, kann aber später im Abschnitt `Platform settings` des Administrations-Dashboards geändert werden.

## Symfony-Konfiguration (Verzeichnis config/)

Die Konfiguration auf Symfony-Ebene liegt im Verzeichnis `config/`. Diese YAML-Dateien steuern das Framework-Verhalten, Service-Definitionen und paket-spezifische Einstellungen.

Das gesamte Verzeichnis `config/` wird mit jedem Chamilo-Paket und jedem Update ausgeliefert — im Gegensatz etwa zu `.env` wird es bei einem Upgrade nicht ausgeschlossen oder besonders geschützt. **Jede Änderung, die Sie direkt an einer Datei unter `config/` oder `config/packages/` vornehmen, wird beim nächsten Update von Chamilo stillschweigend überschrieben.** Siehe [Umgebungsspezifische Überschreibungen](#environment-specific-overrides) unten für die unterstützte Methode, die Konfiguration anzupassen, ohne Ihre Änderungen zu verlieren.

Es ist selten erforderlich, diese Dateien zu ändern, und Änderungen können Ihr Portal funktionsunfähig machen. Versuchen Sie daher bitte nicht, sie zu ändern, wenn Sie die Verfügbarkeit des Systems sicherstellen müssen.

### Wichtige Konfigurationsdateien

| Datei | Zweck |
|------|---------|
| `config/authentication.yaml` | Konfiguration der Authentifizierungsmethoden. |
| `config/packages/doctrine.yaml` | Datenbank- und ORM-Konfiguration. |
| `config/packages/security.yaml` | Authentifizierung, Firewalls, Zugriffskontrolle und Rollenhierarchien. |
| `config/packages/cache.yaml` | Konfiguration des Cache-Adapters (Dateisystem, APCu, Redis). |
| `config/packages/framework.yaml` | Allgemeine Symfony-Framework-Einstellungen (Sitzung, CSRF, Router, HTTP-Caching). |
| `config/packages/twig.yaml` | Konfiguration der Template-Engine. |
| `config/services.yaml` | Anwendungs-Service-Definitionen und Dependency Injection. |

### Umgebungsspezifische Überschreibungen

Symfony unterstützt eine umgebungsspezifische Konfiguration. Dateien in `config/packages/prod/` überschreiben die Standardwerte, wenn `APP_ENV=prod`, und `config/packages/dev/` überschreibt, wenn `APP_ENV=dev`.

Beispielsweise konfiguriert `config/packages/prod/monolog.yaml` typischerweise eine weniger ausführliche Protokollierung als das Entwicklungsäquivalent.

Chamilo selbst definiert in der Software keine Konfiguration in `config/packages/prod/`. Wenn Sie also eine Einstellung aus `config/packages/*.yaml` anpassen möchten, **bearbeiten Sie nicht die Basisdatei** — legen Sie eine gleichnamige Datei in `config/packages/prod/` (oder `dev/`/`test/`, passend zu der Umgebung, die Sie beeinflussen möchten) an, die nur die Schlüssel enthält, die Sie überschreiben wollen, und nehmen Sie Ihre Änderungen dort vor.

Das ist wichtig, weil die Basisdateien `config/packages/*.yaml` Teil des Chamilo-Pakets sind: Jedes Update liefert sie erneut aus und überschreibt, was dort steht, sodass direkte Änderungen ein Upgrade nicht überstehen. Da Chamilo unter `config/packages/prod/` (oder `dev/`/`test/`) nichts ausliefert, ist dieses Verzeichnis vor dem Überschreiben durch ein Update geschützt und der unterstützte Ort für lokale Anpassungen.

## Dateiberechtigungen

Wir haben in 2.0+ darauf geachtet, dass nur ein einziges Verzeichnis Berechtigungen benötigt, und das gilt weiterhin in 3.0. Es handelt sich um das Verzeichnis `var/`. Um komplexe Probleme zu vermeiden, reicht es aus, den gesamten Ordner für den Systembenutzer des Webservers beschreibbar zu machen.

Setzen Sie die Berechtigungen unter Debian-basierten Systemen entsprechend:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Häufige Konfigurationsaufgaben

### Auf den Produktionsmodus umschalten

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Leeren und wärmen Sie anschließend den Cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Die API-Dokumentation aktivieren

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Leeren Sie anschließend den Cache, damit die Änderung wirksam wird:

```bash
php bin/console cache:clear
```

Die interaktive API-Dokumentation (Swagger/OpenAPI) ist dann unter `/api` verfügbar. Das Bearbeiten von `.env` allein reicht nicht aus: Der aufgelöste Wert wird in den kompilierten Cache von Symfony eingebettet, sodass `/api` den vorherigen Zustand (aktiviert oder nicht) beibehält, bis der Cache geleert wird. Die Aktion **System > Temporäre Dateien bereinigen** im Administrationsbereich tut dies *nicht* — siehe [Systemwerkzeuge](../system/system-tools.md#clean-temporary-files) für die Begründung — daher erfordert diese spezielle Änderung Shell-Zugriff, um `cache:clear` auszuführen.

### Vertrauenswürdige Proxys konfigurieren

Wenn Chamilo hinter einem Reverse-Proxy oder Load Balancer betrieben wird, konfigurieren Sie vertrauenswürdige Proxys, damit die HTTPS-Erkennung und die Auflösung der Client-IP korrekt funktionieren:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Die Sitzungsspeicherung konfigurieren

Standardmäßig werden Sitzungen im Dateisystem gespeichert. Für Multi-Server-Bereitstellungen konfigurieren Sie Redis- oder datenbankgestützte Sitzungen:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tipps

* **Bearbeiten Sie `.env.dist` niemals direkt** -- Verwenden Sie für Ihre Überschreibungen stets `.env`. Die Datei `.env.dist` kann bei Upgrades überschrieben werden.
* **Belassen Sie `APP_DEBUG=0` in der Produktion** -- Der Debug-Modus legt in Fehlerseiten sensible Informationen offen.
* **Sichern Sie `.env`** getrennt vom Codebestand, da die Datei Zugangsdaten enthält und von der Versionskontrolle ausgeschlossen ist.