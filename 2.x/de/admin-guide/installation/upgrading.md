# Aktualisierung

Hinweis: Auf dieser Seite verwenden wir 2.0.0 als strikte Versionsnummer und 2.x, um alle Versionen zu bezeichnen, die mit der Zahl 2 beginnen (2.0.0, 2.0.1, 2.1.0, usw.).

Der Aktualisierungsprozess von 1.11.x auf 2.x ist in Ihrer Datei `public/documentation/installation_guide.html` innerhalb Ihres Chamilo-Codes beschrieben. Die Informationen hier sind weitgehend redundant. Sie können sie online unter `https://campus.chamilo.net/documentation/installation_guide.html` einsehen. Obwohl wir umfangreiche Tests zu ähnlichen Migrationen durchgeführt haben, empfehlen wir, mit der Aktualisierung eines 1.11.x-Systems auf Version 2.1 zu warten oder sich bei diesem Vorhaben professionell von [offiziellen Chamilo-Anbietern](https://chamilo.org/providers) begleiten zu lassen, da einige Einstellungen von 1.11.x in 2.0.0 noch nicht unterstützt wurden.

## Aktualisierung von 1.11.x auf 2.x

Die Aktualisierung von Chamilo 1.11.x auf 2.x ist eine **große Migration**, kein einfaches Update. Chamilo 2.0 wurde auf dem Symfony-Framework neu aufgebaut, mit einem überarbeiteten Datenbankschema, einer neuen API und einer anderen Dateiorganisation. Planen Sie diese Migration sorgfältig und testen Sie sie zunächst in einer Testumgebung, bevor Sie sie in der Produktionsumgebung ausrollen.

### Bevor Sie beginnen

1. **Lesen Sie die Versionshinweise** für Chamilo 2.x, um zu verstehen, was sich geändert hat, was neu ist und welche Funktionen von 1.11.x möglicherweise noch nicht verfügbar sind.
2. **Sichern Sie alles**:
   - Vollständiger Datenbank-Dump (`mysqldump` oder Äquivalent).
   - Alle Dateien im Chamilo 1.11.x-Installationsverzeichnis, insbesondere `app/upload/`, `app/courses/` und `main/`.
   - Ihre `configuration.php`-Datei.
3. **Testen Sie zunächst auf einem Staging-Server.** Führen Sie die Migration niemals direkt auf Ihrem Produktionsserver durch.
4. **Überprüfen Sie die Serveranforderungen.** Chamilo 2.x hat andere Anforderungen als 1.11.x (insbesondere PHP 8.2+). Siehe [Serveranforderungen](server-requirements.md).

### Was möglicherweise manuelle Bearbeitung erfordert

| Bereich | Hinweise |
|--------|----------|
| **Benutzerdefinierte Plugins** | Plugins von 1.11.x sind nicht mit 2.x kompatibel. Sie müssen neu geschrieben oder ersetzt werden, was teilweise in 2.0 geschehen ist und bis 2.1 für offizielle Plugins abgeschlossen sein sollte. |
| **Benutzerdefinierte Themes** | Themes von 1.11.x funktionieren nicht in 2.x. Erstellen Sie Ihr Branding mit dem 2.x-Theming-System neu. |
| **Benutzerdefinierte Datenbankänderungen** | Direkte Datenbankänderungen außerhalb von Chamilo werden möglicherweise nicht migriert. |
| **SCORM-Pakete** | SCORM-Inhalte sollten migriert werden, testen Sie jedoch einzelne Pakete, um die Wiedergabe zu überprüfen. |
| **Externe Integrationen** | Integrationen, die die 1.11.x-API oder Webdienste nutzen, müssen aktualisiert werden, um die reine REST-API von 2.x mit [API Platform](https://github.com/api-platform/api-platform) zu verwenden. |

## Aktualisierung von Chamilo 2.0.x

Kleinere Updates innerhalb der 2.0-Branche sind einfacher.

### Aktualisierungsprozess

#### Verwendung eines Pakets

1. **Sichern Sie** die Datenbank und Dateien.

2. **Laden Sie die neueste 2.0.x-Version** von [chamilo.org](https://chamilo.org/download) herunter:

3. **Entpacken Sie lokal**

Zum Beispiel (passen Sie an die heruntergeladene Version an):
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Kopieren Sie die Dateien in Ihre bestehende Chamilo-Installation**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Führen Sie Datenbankmigrationen durch:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Leeren Sie den Cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ändern Sie die Berechtigungen**

Passen Sie an Ihren Webserver-Benutzer an:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Überprüfen Sie**, ob die Plattform korrekt lädt und testen Sie wichtige Funktionen stichprobenartig.

#### Verwendung von Git

Wenn Sie Chamilo mit Git installiert haben, können Sie stattdessen diese Anweisungen befolgen.

1. **Sichern Sie** die Datenbank und Dateien.

2. **Ziehen Sie den neuesten Code** (oder laden Sie die neue Version herunter):
   ```bash
   git pull origin 2.0
   ```

3. **Aktualisieren Sie PHP-Abhängigkeiten:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Aktualisieren Sie JavaScript-Abhängigkeiten und erstellen Sie Assets neu:**
   ```bash
   yarn install && yarn build
   ```

5. **Führen Sie Datenbankmigrationen durch:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Leeren Sie den Cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ändern Sie die Berechtigungen**

Passen Sie an Ihren Webserver-Benutzer an:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Überprüfen Sie**, ob die Plattform korrekt lädt und testen Sie wichtige Funktionen stichprobenartig.

### Automatisierung von Updates

Für Organisationen, die mehrere Chamilo-Instanzen verwalten, sollten Sie den Aktualisierungsprozess skripten:

```bash
#!/bin/bash
set -e

# Code ziehen
git pull origin 2.0

# Abhängigkeiten
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Datenbank
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Aktualisierung abgeschlossen."
```

---
## Tipps

* **Sichern Sie immer vor einem Upgrade.** Datenbankmigrationen sind über die Chamilo-Oberfläche nicht rückgängig zu machen.
* **Testen Sie zunächst auf einer Staging-Umgebung** – insbesondere für die Migration von 1.11.x zu 2.0, die eine umfangreiche Datenumwandlung beinhaltet.
* **Planen Sie Upgrades während Wartungsfenstern**, wenn die Plattform nicht aktiv von Nutzern verwendet wird.
* **Abonnieren Sie GitHub-Releases** auf [Github](https://github.com/chamilo/chamilo-lms/releases) über das Glockensymbol, um über neue Versionen und Sicherheits-Patches informiert zu werden.
* **Web-Updates** sind in Chamilo 2.0 noch nicht verfügbar, aber dies ist ein laufendes Projekt, das wir hoffentlich bald veröffentlichen werden.