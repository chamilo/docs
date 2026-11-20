# Konfiguration

Chamilo 3.0 verwendet Umgebungsvariablen und Symfony-Konfigurationsdateien für seine zentralen Einstellungen. Diese Seite behandelt die wichtigsten Konfigurationsdateien und Variablen.

## Umgebungsvariablen (.env)

Die primäre Konfigurationsdatei ist `.env` im Stammverzeichnis von Chamilo. Diese Datei enthält umgebungsspezifische Einstellungen, die nicht in die Versionsverwaltung übernommen werden sollten.

Eine Standarddatei `.env.dist` wird mit Chamilo ausgeliefert und enthält dokumentierte Standardwerte. Erstellen Sie `.env` (erforderlich, um die Installation zu starten), um Werte für Ihre Umgebung zu überschreiben.

### Wichtige Variablen

| Variable | Beschreibung | Beispiel |
|----------|-------------|---------|
| `APP_ENV` | Die Anwendungsumgebung auf Symfony-Ebene. Verwenden Sie `prod` für den Produktivbetrieb, `dev` für die Entwicklung und 'test' für Tests. | `prod` |
| `APP_SECRET` | Eine zufällige Zeichenkette, die für CSRF-Token, die Signierung von Cookies und andere kryptografische Vorgänge verwendet wird. Chamilo erzeugt für jede Installation einen eindeutigen Wert. Ändern Sie ihn nicht. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Der Datenbankhost. Standardmäßig localhost | `localhost` |
| `DATABASE_PORT` | Der Datenbankport. Standardmäßig 3306 für MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Der Datenbankname, wie Sie ihn im Installationsassistenten angegeben haben. | Siehe unten. |
| `DATABASE_USER` | Der Datenbankbenutzername, wie Sie ihn im Installationsassistenten angegeben haben. | Siehe unten. |
| `DATABASE_PASSWORD` | Das Passwort des Datenbankbenutzers, wie Sie es im Installationsassistenten angegeben haben. | Siehe unten. |
| `TRUSTED_PROXIES` | (Optional) Wenn Sie Chamilo hinter einem Reverse-Proxy betreiben, müssen Sie hier die IP-Adresse(n) des Reverse-Proxys angeben, damit Chamilo Aufrufe korrekt interpretieren und Antworten korrekt erzeugen kann. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optional) Stellt die interaktive API-Dokumentation (Swagger/OpenAPI) unter `/api` bereit. Standardmäßig deaktiviert. Erfordert ein Leeren des Caches, damit die Änderung wirksam wird — siehe [API-Dokumentation aktivieren](#enable-the-api-documentation) unten. | `true` |

Andere Einstellungen in .env werden vergleichsweise selten geändert.

Beachten Sie, dass die DATABASE_*-Einstellungen in zukünftigen Versionen zu einer einzigen Variable `DATABASE_URL` zusammengefasst werden.

Die Konfiguration des E-Mail-Versands wird während der Installation angezeigt, kann jedoch später im Bereich `Platform settings` des Administrations-Dashboards geändert werden.

## Symfony-Konfiguration (Verzeichnis config/)

Die Konfiguration auf Symfony-Ebene befindet sich im Verzeichnis `config/`. Diese YAML-Dateien steuern das Verhalten des Frameworks, Dienstdefinitionen und paketspezifische Einstellungen.

Das gesamte Verzeichnis `config/` wird mit jedem Chamilo-Paket und jedem Update ausgeliefert — anders als beispielsweise `.env` wird es bei einem Upgrade nicht ausgeschlossen oder gesondert beibehalten. **Jede Änderung, die direkt an einer Datei unter `config/` oder `config/packages/` vorgenommen wird, wird beim nächsten Update von Chamilo stillschweigend überschrieben.** Siehe [Umgebungsspezifische Überschreibungen](#environment-specific-overrides) unten für die unterstützte Möglichkeit, die Konfiguration anzupassen, ohne Ihre Änderungen zu verlieren.

Es ist nicht häufig erforderlich, diese Dateien zu ändern, und Änderungen daran können Ihr Portal funktionsunfähig machen. Versuchen Sie daher bitte nicht, sie zu ändern, wenn Sie die Verfügbarkeit des Systems sicherstellen müssen.

### Wichtige Konfigurationsdateien

| Datei | Zweck |
|------|---------|
| `config/authentication.yaml` | Konfiguration der Authentifizierungsmethoden. |
| `config/packages/doctrine.yaml` | Datenbank- und ORM-Konfiguration. |
| `config/packages/security.yaml` | Authentifizierung, Firewalls, Zugriffskontrolle und Rollenhierarchien. |
| `config/packages/cache.yaml` | Konfiguration des Cache-Adapters (Dateisystem, APCu, Redis). |
| `config/packages/framework.yaml` | Allgemeine Symfony-Framework-Einstellungen (Sitzung, CSRF, Router, HTTP-Caching). |
| `config/packages/twig.yaml` | Konfiguration der Template-Engine. |
| `config/services.yaml` | Anwendungsdienstdefinitionen und Dependency Injection. |

### Umgebungsspezifische Überschreibungen

Symfony unterstützt eine umgebungsspezifische Konfiguration. Dateien in `config/packages/prod/` überschreiben die Standardwerte, wenn `APP_ENV=prod` ist, und `config/packages/dev/` überschreibt sie, wenn `APP_ENV=dev` ist.

Beispielsweise konfiguriert `config/packages/prod/monolog.yaml` in der Regel eine weniger ausführliche Protokollierung als das entsprechende Pendant für die Entwicklung.

Chamilo definiert in der Software selbst keine Konfiguration in `config/packages/prod/`. Wenn Sie also eine Einstellung aus `config/packages/*.yaml` anpassen möchten, **bearbeiten Sie nicht die Basisdatei** — erstellen Sie stattdessen eine gleichnamige Datei in `config/packages/prod/` (oder `dev/`/`test/`, entsprechend der Umgebung, die Sie beeinflussen möchten), die nur die Schlüssel enthält, die Sie überschreiben möchten, und nehmen Sie Ihre Änderungen dort vor.

Dies ist wichtig, weil die Basisdateien `config/packages/*.yaml` Teil des Chamilo-Pakets sind: Jedes Update liefert sie erneut aus und überschreibt den vorhandenen Inhalt, sodass direkte Änderungen daran ein Upgrade nicht überstehen. Da Chamilo niemals etwas unter `config/packages/prod/` (oder `dev/`/`test/`) ausliefert, ist dieses Verzeichnis vor dem Überschreiben durch ein Update geschützt und der unterstützte Ort, um lokale Anpassungen beizubehalten.

## Dateiberechtigungen

In Version 2.0+ haben wir uns bemüht sicherzustellen, dass nur ein einziges Verzeichnis Berechtigungen benötigt, und das gilt auch in 3.0. Es handelt sich um das Verzeichnis `var/`. Um komplexe Probleme zu vermeiden, genügt es, den gesamten Ordner für den Systembenutzer des Webservers beschreibbar zu machen.

Setzen Sie die Berechtigungen unter Debian-basierten Systemen entsprechend:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Häufige Konfigurationsaufgaben

### In den Produktionsmodus wechseln

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

Die interaktive API-Dokumentation (Swagger/OpenAPI) ist dann unter `/api` verfügbar. Das Bearbeiten von `.env` allein reicht nicht aus: Der aufgelöste Wert wird in den kompilierten Cache von Symfony übernommen, sodass `/api` seinen vorherigen Zustand (aktiviert oder nicht) beibehält, bis der Cache geleert wird. Die Aktion **System > Temporäre Dateien bereinigen** im Administrationsbereich erledigt dies *nicht* — siehe [Systemwerkzeuge](../system/system-tools.md#clean-temporary-files), warum — daher erfordert diese spezielle Änderung Shell-Zugriff, um `cache:clear` auszuführen.

### Vertrauenswürdige Proxys konfigurieren

Wenn Chamilo hinter einem Reverse-Proxy oder Load Balancer betrieben wird, konfigurieren Sie vertrauenswürdige Proxys, damit die HTTPS-Erkennung und die Auflösung der Client-IP korrekt funktionieren:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Sitzungsspeicher konfigurieren

Chamilo verwendet standardmäßig den nativen PHP-Sitzungshandler (typischerweise Dateisystemspeicher, abhängig von der PHP-Konfiguration). Bei Bereitstellungen, in denen mehrere Anwendungsserver eine gemeinsame Datenbank nutzen, kann Chamilo PHP-Sitzungen stattdessen in seiner Tabelle `php_session` speichern. Diese datenbankgestützte Option wurde in [Chamilo LMS PR #9146](https://github.com/chamilo/chamilo-lms/pull/9146) wiederhergestellt.

Stellen Sie vor der Aktivierung sicher, dass die Datenbanktabelle `php_session` vorhanden ist. Sie wird durch die Migration `V310` `Version20260928234500` erstellt (oder durch das Schema bei einer Neuinstallation). Prüfen Sie den Migrationsstatus und die Tabelle zuerst in einer Staging-Umgebung; aktivieren Sie die Datenbankspeicherung nicht für eine Datenbank ohne diese Tabelle.

Setzen Sie Folgendes in der `.env` der Bereitstellung oder in der entsprechenden Umgebungskonfiguration:

```dotenv
SESSION_STORED_IN_DB=true
```

Lassen Sie `SESSION_STORED_IN_DB` ungesetzt oder setzen Sie es auf `false`, um den nativen PHP-Sitzungshandler beizubehalten. Die Symfony-Konfiguration wählt bereits `Chamilo\CoreBundle\Session\ConfigurableSessionHandler`, der an das passende Backend delegiert. **Ersetzen Sie `framework.session.handler_id` nicht durch einen ungeprüften Redis-DSN**: Dadurch würde die Chamilo-Konfiguration umgangen, und dies ist nicht der dokumentierte Wechsel zur Datenbanksitzung.

Erstellen Sie nach der Änderung der Umgebungseinstellung den Symfony-Anwendungscache gemäß Ihrem Bereitstellungsverfahren neu bzw. leeren Sie ihn, und testen Sie Anmeldung, Navigation und Abmeldung. Planen Sie die Änderung während eines Wartungsfensters: Vorhandene Sitzungsdaten werden nicht zwischen dem nativen PHP-Speicher und der Datenbank übertragen, sodass sich Benutzer möglicherweise erneut anmelden müssen. Beziehen Sie `php_session` bei Aktivierung in die Planung von Datenbanksicherung und Aufbewahrung ein.

## Tipps

* **Bearbeiten Sie `.env.dist` niemals direkt** -- Verwenden Sie für Ihre Überschreibungen stets `.env`. Die Datei `.env.dist` kann bei Upgrades überschrieben werden.
* **Behalten Sie `APP_DEBUG=0` in der Produktion bei** -- Der Debug-Modus legt in Fehlerseiten sensible Informationen offen.
* **Sichern Sie `.env`** getrennt von der Codebasis, da sie Zugangsdaten enthält und von der Versionsverwaltung ausgeschlossen ist.