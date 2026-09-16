# Upgrade

Hinweis: Auf dieser Seite verwenden wir 3.0.0 als strikte Versionsnummer und 3.x zur Bezeichnung aller Versionen, die mit der Zahl 3 beginnen (3.0.0, 3.0.1, 3.1.0 usw.). Dieselbe Konvention gilt für 2.x.

Der Upgrade-Prozess von 1.11.x ist auch in Ihrer Datei `public/documentation/installation_guide.html` innerhalb Ihres Chamilo-Codes beschrieben.
Die Informationen hier sind weitgehend redundant. Sie können sie online unter `https://campus.chamilo.net/documentation/installation_guide.html` einsehen.

**Upgrade auf 3.0, nicht auf 2.x.** Version 3.0 ist die aktuelle Veröffentlichung, und einige Einstellungen von 1.11.x hatten in 2.0.0 noch kein Äquivalent. Ein System 1.11.x geht daher direkt auf 3.0. Wir haben ähnliche Migrationen umfangreich getestet, aber jede Plattform hat ihre eigene Geschichte: Probieren Sie es zuerst in einer Testumgebung aus und erwägen Sie eine professionelle Begleitung durch [offizielle Chamilo-Anbieter](https://chamilo.org/providers) bei diesem Vorhaben.

## Upgrade von 1.11.x auf 3.0

Das Upgrade von Chamilo 1.11.x auf 3.0 ist eine **große Migration**, kein einfaches Update. Chamilo 2.0 wurde auf dem Symfony-Framework mit umstrukturiertem Datenbankschema, neuer API und anderer Dateiorganisation neu aufgebaut, und 3.0 setzt diese Linie fort. Planen Sie diese Migration sorgfältig und testen Sie sie in einer Testumgebung, bevor Sie sie in der Produktion ausrollen.

### Bevor Sie beginnen

1. **Lesen Sie die Versionshinweise** für Chamilo 3.x, um zu verstehen, was sich geändert hat, was neu ist und welche Funktionen aus 1.11.x möglicherweise noch nicht verfügbar sind.
2. **Sichern Sie alles**:
   - Vollständiger Datenbank-Dump (`mysqldump` oder gleichwertig).
   - Alle Dateien im Installationsverzeichnis von Chamilo 1.11.x, insbesondere `app/upload/`, `app/courses/` und `main/`.
   - Ihre Datei `configuration.php`.
3. **Testen Sie zuerst auf einem Staging-Server.** Führen Sie die Migration niemals direkt auf Ihrem Produktionsserver aus.
4. **Prüfen Sie die Serveranforderungen.** Chamilo 3.x hat andere Anforderungen als 1.11.x (insbesondere PHP 8.3 oder neuer — der Installer lehnt alles Ältere ab). Siehe [Serveranforderungen](server-requirements.md).
5. **Löschen Sie die Tabelle `version` aus der Datenbank 1.11.x.** Dieser Schritt ist verpflichtend. Chamilo 2.x und später speichern die Doctrine-Migrationshistorie in einer Tabelle dieses Namens mit anderen Spalten. Wenn Sie die Tabelle 1.11.x belassen, bricht das Upgrade sofort ab. Die Tabelle ist für den Betrieb von Chamilo 1.11.x nicht erforderlich.
6. **Entpacken Sie den neuen Code in ein neues Verzeichnis.** Die Dateien 1.11.x bleiben an ihrem Ort. Der Installer liest sie als Quelle Ihrer Kurse und Uploads und schreibt das Ergebnis in den neuen Baum.

### Das Upgrade ausführen

Sie können das Upgrade über den Web-Assistenten oder über die Kommandozeile ausführen.

#### Web-Assistent

1. Setzen Sie den `DocumentRoot` Ihres virtuellen Hosts auf das Unterverzeichnis `public/` des neuen Baums.
2. Öffnen Sie Ihre URL. Der Assistent startet, weil der neue Baum noch keine Datei `.env` hat.
3. Wählen Sie in Schritt 2 die Upgrade-Option und geben Sie den Wurzelpfad Ihrer Installation 1.11.x an.
4. Folgen Sie dem Assistenten bis zum Ende.

#### Kommandozeile

Setzen Sie `UPDATE_PATH` auf die Wurzel Ihrer Installation 1.11.x und führen Sie dann die Migrationen aus:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Erhöhen Sie zuerst `memory_limit` und `max_execution_time`. Die Migration liest jede Kursdatei und benötigt daher weit mehr als die Standardwerte.

#### Wie lange es dauert

Die Dauer richtet sich nach der Größe Ihrer Datenbank und Ihrer Kursdateien. Als Referenzpunkt: Eine Plattform 1.11.28 mit 238 Tabellen, 11 Kursen, 63 Benutzerinnen und Benutzern und 1489 Kursdateien dauerte **6 Minuten**, benötigte 1,7 GB Speicher und führte 393 Migrationen aus. Eine große Produktionsplattform dauert Stunden. Planen Sie ein Wartungsfenster und lesen Sie das [Chamilo-Forum](https://chamilo.org) oder kontaktieren Sie einen [offiziellen Anbieter](https://chamilo.org/providers), bevor Sie es in der Produktion ausführen.

### Was manuelle Aufmerksamkeit erfordern kann

| Bereich | Hinweise |
|------|-------|
| **Benutzerdefinierte Plugins** | Plugins von 1.11.x funktionieren nicht in 2.x oder 3.x. Sie müssen neu geschrieben oder ersetzt werden. Die offiziellen wurden seit 2.0 schrittweise portiert — prüfen Sie die Plugin-Liste Ihrer Version, um zu sehen, welche verfügbar sind. |
| **Benutzerdefinierte Themes** | Themes von 1.11.x funktionieren nicht in 2.x oder 3.x. Erstellen Sie Ihr Branding mit dem Theme-System von 3.x neu. |
| **Benutzerdefinierte Datenbankänderungen** | Direkte Datenbankänderungen außerhalb von Chamilo werden möglicherweise nicht migriert. |
| **SCORM-Pakete** | SCORM-Inhalte sollten migrieren, testen Sie Pakete jedoch einzeln, um die Wiedergabe zu prüfen. |
| **Externe Integrationen** | Integrationen, die die API oder Webdienste von 1.11.x nutzen, müssen auf die ausschließlich REST-basierte API von 2.x mit [API Platform](https://github.com/api-platform/api-platform) aktualisiert werden. |

## Upgrade von 2.x auf 3.0

Dieses Upgrade behält Ihr bestehendes Verzeichnis und Ihre bestehende Datenbank. Sie kopieren den neuen Code über den alten Baum und führen dann die Migrationen aus, entweder über den Web-Assistenten oder über die Kommandozeile.

### Zuerst die Migrationshistorie befüllen

Chamilo installiert das Datenbankschema direkt aus den Entity-Definitionen. Eine vom Installer angelegte Installation besitzt daher das endgültige Schema, aber eine **leere Migrationshistorie**. Installationen, die vor Chamilo 3.0 entstanden, haben diese Historie nie erhalten. Zwei Dinge hängen davon ab:

* `doctrine:migrations:migrate` entscheidet anhand der Historie, was ausgeführt wird. Bei leerer Historie versucht der Befehl, jede Migration von Anfang an auf einem Schema abzuspielen, das bereits aktuell ist.
* Der Web-Installer entscheidet anhand der Historie, ob ein Upgrade aussteht. Bei leerer Historie lehnt er die Anfrage ab, weil nichts belegt, dass ein Upgrade fällig ist.

Befüllen Sie die Historie daher einmal und halten Sie sich an die folgende Reihenfolge.

> **Warnung: Befüllen Sie die Historie, bevor Sie den neuen Code kopieren.** Die Befehle markieren jede Migration, die der **aktuell bereitgestellte** Code mitführt, als bereits ausgeführt. Führen Sie sie aus, nachdem Sie den 3.0-Code kopiert haben, markieren sie auch die 3.0-Migrationen, und Ihr Upgrade wird nie ausgeführt.

Führen Sie bei noch vorhandener aktueller Version aus:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Der erste Befehl legt die Historientabelle an. Der zweite markiert die Migrationen Ihrer aktuellen Version. `doctrine:migrations:version` schlägt allein fehl, wenn die Tabelle noch nicht existiert; überspringen Sie den ersten Befehl daher nicht.

Prüfen Sie das Ergebnis:

```bash
php bin/console doctrine:migrations:status
```

`Executed` muss gleich `Available` sein, und `New` muss 0 sein. Kopieren Sie nun den 3.0-Code.

### Das Upgrade ausführen

Kopieren Sie den neuen Code und öffnen Sie anschließend Ihre URL und folgen Sie dem Assistenten, oder führen Sie die Migrationen von der Kommandozeile aus:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Der Web-Assistent öffnet sich nur, solange Migrationen ausstehen. Sobald das Upgrade abgeschlossen ist, antwortet er wieder mit `409 Conflict` – das schützt ihn: Der Assistent hat keine eigene Anmeldung.

## Aktualisieren von Chamilo 3.0.x

Kleinere Updates innerhalb des 3.0-Zweigs sind unkomplizierter.

### Update-Prozess

#### Mit einem Paket

1. **Sichern Sie** die Datenbank und die Dateien.

2. **Laden Sie die neueste 3.0.x-Version** von [chamilo.org](https://chamilo.org/download) herunter:

3. **Entpacken Sie lokal**

Zum Beispiel (an die heruntergeladene Version anpassen)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopieren Sie die Dateien über Ihre bestehende Chamilo-Installation**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Datenbankmigrationen ausführen:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Cache leeren:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Berechtigungen ändern**

An den Benutzer Ihres Webservers anpassen:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Prüfen Sie**, dass die Plattform korrekt lädt, und kontrollieren Sie stichprobenartig zentrale Funktionen.

#### Mit Git

Wenn Sie Chamilo mit Git installiert haben, können Sie stattdessen diese Anweisungen befolgen.

1. **Sichern Sie** die Datenbank und die Dateien.

2. **Den neuesten Code holen** (oder die neue Version herunterladen):
   ```bash
   git pull origin 3.0
   ```

3. **PHP-Abhängigkeiten aktualisieren:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **JavaScript-Abhängigkeiten aktualisieren und Assets neu bauen:**
   ```bash
   yarn install && yarn build
   ```

5. **Datenbankmigrationen ausführen:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Cache leeren:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Berechtigungen ändern**

An den Benutzer Ihres Webservers anpassen:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Prüfen Sie**, dass die Plattform korrekt lädt, und kontrollieren Sie stichprobenartig zentrale Funktionen.

### Updates automatisieren

Organisationen, die mehrere Chamilo-Instanzen betreiben, sollten den Update-Prozess skripten:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Tipps

* **Erstellen Sie vor dem Upgrade immer eine Sicherungskopie.** Datenbankmigrationen sind über die Chamilo-Oberfläche nicht rückgängig zu machen.
* **Testen Sie zuerst auf einer Staging-Umgebung** -- insbesondere bei der Migration von 1.11.x nach 3.0, die eine erhebliche Datentransformation umfasst.
* **Planen Sie Upgrades in Wartungsfenstern**, in denen Benutzer die Plattform nicht aktiv nutzen.
* **Abonnieren Sie GitHub-Releases** auf [Github](https://github.com/chamilo/chamilo-lms/releases) über das Glockensymbol, um über neue Versionen und Sicherheitspatches benachrichtigt zu werden.
* **Wenn der Assistent `Chamilo is already installed` antwortet**, hat er keine ausstehende Migration gefunden. Führen Sie `php bin/console doctrine:migrations:status` aus, um dies zu prüfen. Wenn `Executed` auf einer funktionierenden Plattform 0 ist, wurde Ihre Migrationshistorie nie initialisiert — siehe [Zuerst die Migrationshistorie initialisieren](#seed-the-migration-history-first).
* **Der automatische Download neuer Versionen** ist in Chamilo 3.0 noch nicht verfügbar, aber dies ist ein laufendes Projekt, das wir hoffentlich bald veröffentlichen. Das Upgrade selbst läuft bereits über den Web-Assistenten.