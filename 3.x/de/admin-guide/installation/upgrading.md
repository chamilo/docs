# Aktualisierung

Hinweis: Auf dieser Seite verwenden wir 3.0.0 als strenge Versionsnummer und 3.x, um alle Versionen zu bezeichnen, die mit der Zahl 3 beginnen (3.0.0, 3.0.1, 3.1.0 usw.). Dieselbe Konvention gilt für 2.x.

Der Aktualisierungsprozess von 1.11.x ist auch in Ihrer Datei `public/documentation/installation_guide.html` innerhalb Ihres Chamilo-Codes beschrieben.
Die Informationen hier sind weitgehend redundant. Sie können sie online unter `https://campus.chamilo.net/documentation/installation_guide.html` einsehen.

**Aktualisieren Sie auf 3.0, nicht auf 2.x.** Version 3.0 ist die aktuelle Veröffentlichung, und einige Einstellungen von 1.11.x hatten in 2.0.0 noch kein Äquivalent. Ein System der Version 1.11.x geht daher direkt auf 3.0. Wir haben ähnliche Migrationen umfangreich getestet, aber jede Plattform trägt ihre eigene Geschichte: Probieren Sie es zuerst in einer Testumgebung aus und erwägen Sie, sich bei diesem Vorhaben professionell von [offiziellen Chamilo-Anbietern](https://chamilo.org/providers) begleiten zu lassen.

## Aktualisierung von 1.11.x auf 3.0

Die Aktualisierung von Chamilo 1.11.x auf 3.0 ist eine **umfangreiche Migration**, keine einfache Aktualisierung. Chamilo 2.0 wurde auf dem Symfony-Framework mit einem neu strukturierten Datenbankschema, einer neuen API und einer anderen Dateiorganisation neu aufgebaut, und 3.0 setzt diese Linie fort. Planen Sie diese Migration sorgfältig und testen Sie sie in einer Testumgebung, bevor Sie sie in der Produktion ausrollen.

### Bevor Sie beginnen

1. **Lesen Sie die Versionshinweise** für Chamilo 3.x, um zu verstehen, was sich geändert hat, was neu ist und welche Funktionen aus 1.11.x möglicherweise noch nicht verfügbar sind.
2. **Sichern Sie alles**:
   - Vollständiger Datenbank-Dump (`mysqldump` oder gleichwertig).
   - Alle Dateien im Installationsverzeichnis von Chamilo 1.11.x, insbesondere `app/upload/`, `app/courses/` und `main/`.
   - Ihre Datei `configuration.php`.
3. **Testen Sie zuerst auf einem Staging-Server.** Führen Sie die Migration niemals direkt auf Ihrem Produktionsserver aus.
4. **Prüfen Sie die Serveranforderungen.** Chamilo 3.x hat andere Anforderungen als 1.11.x (insbesondere PHP 8.3 oder neuer — das Installationsprogramm lehnt alles Ältere ab). Siehe [Serveranforderungen](server-requirements.md).
5. **Entscheiden Sie, was mit der Tabelle `version` der Datenbank von 1.11.x geschieht.** Chamilo 2.x und spätere Versionen speichern den Doctrine-Migrationsverlauf in einer Tabelle dieses Namens mit anderen Spalten, sodass die beiden nicht nebeneinander bestehen können. Der Web-Assistent erledigt dies für Sie: Er benennt die Tabelle von 1.11.x in `version_1_11` um, bevor er die erste Migration ausführt. Die Befehlszeile tut dies nicht, daher **löschen oder benennen Sie diese Tabelle selbst um, bevor Sie `doctrine:migrations:migrate` ausführen**. Die Tabelle ist für den Betrieb von Chamilo 1.11.x nicht erforderlich.
6. **Entpacken Sie den neuen Code in einem neuen Verzeichnis.** Die Dateien von 1.11.x bleiben an ihrem Ort. Das Installationsprogramm liest sie als Quelle Ihrer Kurse und Uploads und schreibt das Ergebnis in den neuen Verzeichnisbaum.
7. **Wenn Sie Untersprachen verwendet haben, ist nichts Zusätzliches erforderlich.** Die Aktualisierung konvertiert sie und schreibt ihre Begriffe nach `var/translations/`, wohin Ihr Webserver bereits schreiben können muss. Die Oberfläche liest sie von dort, ohne Neuaufbau.

### Ausführen der Aktualisierung

Sie können die Aktualisierung über den Web-Assistenten oder über die Befehlszeile ausführen.

#### Web-Assistent

1. Richten Sie das `DocumentRoot` Ihres virtuellen Hosts auf das Unterverzeichnis `public/` des neuen Verzeichnisbaums.
2. Erstellen Sie eine leere Datei `UPGRADE_ENABLED` im Projektstammverzeichnis, neben `.env` und `composer.json` — siehe unten.
3. Öffnen Sie Ihre URL. Der Assistent startet, weil der neue Verzeichnisbaum noch keine Datei `.env` hat.
4. Wählen Sie in Schritt 2 die Aktualisierungsoption und geben Sie den Stammverzeichnispfad Ihrer Installation von 1.11.x an.
5. Folgen Sie dem Assistenten bis zum Ende.

Der Assistent hat keine eigene Anmeldung, daher benötigt eine Aktualisierung eine Autorisierung auf dem Server: diese Datei `UPGRADE_ENABLED`. **Nur Sie erstellen sie.** Der Assistent schreibt sie niemals selbst, denn der gesamte Wert der Datei besteht darin, dass ihre Anwesenheit beweist, dass eine Person auf dem Server entschieden hat.

Ihr neuer Verzeichnisbaum hat noch keine `.env`, daher öffnet sich der Assistent auch ohne die Datei. Er fragt im Schritt der Anforderungen danach, wenn Sie die Aktualisierung wählen und bevor er nach Ihrer Datenbank fragt. Erstellen Sie die Datei dann und fahren Sie fort; Sie starten den Assistenten nicht neu.

Das Installationsprogramm löscht die Datei, wenn die Aktualisierung abgeschlossen ist. Wenn Ihr Projektstammverzeichnis schreibgeschützt ist, teilt es dies stattdessen mit, und Sie löschen die Datei von Hand. Solange sie vorhanden ist, bleibt das Installationsprogramm geöffnet, und die Administrationsseite meldet sie unter den Plattform-Integritätsprüfungen.

#### Befehlszeile

Setzen Sie `UPDATE_PATH` auf das Stammverzeichnis Ihrer Installation von 1.11.x und führen Sie dann die Migrationen aus:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Erhöhen Sie zuerst `memory_limit` und `max_execution_time`. Die Migration liest jede Kursdatei und benötigt daher weit mehr als die Standardwerte.

#### Wie lange es dauert

Die Dauer richtet sich nach der Größe Ihrer Datenbank und Ihrer Kursdateien. Als Anhaltspunkt: Eine Plattform der Version 1.11.28 mit 238 Tabellen, 11 Kursen, 63 Benutzern und 1489 Kursdateien benötigte **6 Minuten** und 1,7 GB Arbeitsspeicher und führte 393 Migrationen aus. Eine große Produktionsplattform benötigt Stunden. Planen Sie ein Wartungsfenster ein und lesen Sie das [Chamilo-Forum](https://chamilo.org) oder wenden Sie sich an einen [offiziellen Anbieter](https://chamilo.org/providers), bevor Sie das Upgrade in der Produktion ausführen.

### Was manuelle Aufmerksamkeit erfordern kann

| Bereich | Hinweise |
|------|-------|
| **Benutzerdefinierte Plugins** | Plugins für 1.11.x funktionieren nicht in 2.x oder 3.x. Sie müssen neu geschrieben oder ersetzt werden. Die offiziellen Plugins wurden seit 2.0 schrittweise portiert — prüfen Sie die Plugin-Liste Ihrer Version, um zu sehen, welche verfügbar sind. |
| **Benutzerdefinierte Themes** | Themes für 1.11.x funktionieren nicht in 2.x oder 3.x. Erstellen Sie Ihr Branding mit dem Theming-System von 3.x neu. |
| **Benutzerdefinierte Datenbankänderungen** | Direkte Datenbankänderungen außerhalb von Chamilo werden möglicherweise nicht migriert. |
| **SCORM-Pakete** | SCORM-Inhalte sollten migriert werden, testen Sie die Pakete jedoch einzeln, um die Wiedergabe zu überprüfen. |
| **Externe Integrationen** | Integrationen, die die API oder Webservices von 1.11.x verwenden, müssen auf die ausschließlich REST-basierte API von 2.x mit [API Platform](https://github.com/api-platform/api-platform) aktualisiert werden. |
| **Profileinstellungen** | Überprüfen Sie nach einem Legacy-Upgrade, ob `changeable_options` und `visible_options` weiterhin die erwarteten Regeln für die Bearbeitbarkeit und Sichtbarkeit von Profilen widerspiegeln. Der Upgrade-Code übernimmt ihre Werte aus den Legacy-Einstellungen, anstatt sie als Einträge in `configuration.php` zu behandeln ([PR #9161](https://github.com/chamilo/chamilo-lms/pull/9161)). |

### Prüfung der Quiz-Fragen-Beziehungen nach einer Legacy-Migration

Wenn migrierte Übungen fehlende Fragen zu haben scheinen, verwenden Sie den in [PR #9157](https://github.com/chamilo/chamilo-lms/pull/9157) eingeführten Konsolenbefehl, um **vor einem Reparaturversuch zu prüfen**. Führen Sie ihn im Stammverzeichnis der Chamilo-Anwendung gegen eine Staging-Kopie der migrierten Datenbank aus.

Ein erster Durchlauf untersucht nur die Zieldatenbank und **ändert keine Daten**:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy
```

Leere Quizze allein beweisen nicht, dass Beziehungen verloren gegangen sind. Um mit den alten Chamilo-Daten zu vergleichen, stellen Sie die Legacy-Datenbank auf **demselben Datenbankserver** mit geeigneten Leseberechtigungen bereit und geben Sie ihren Datenbanknamen an:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy --source-database=legacy_chamilo_db
```

Sie können jede der beiden Prüfungen mit der wiederholbaren Option `--quiz=123` auf bestimmte *Ziel-Quiz-IIDs* eingrenzen. Ohne `--apply` bleiben beide Formen schreibgeschützt. Der Vergleich meldet fehlende Beziehungen, betroffene Quizze sowie mögliche Konflikte oder unaufgelöste Referenzen.

**Wenden Sie eine Reparatur nicht allein aufgrund einer Anzahl leerer Quizze an.** Bewahren Sie geprüfte Datenbanksicherungen auf und überprüfen Sie die verglichenen Quell- und Zieldaten. Eine Reparatur erfordert `--source-database`, `--apply` sowie `--expected-missing-relations` und `--expected-affected-quizzes`, jeweils auf die **exakten Anzahlen aus dem vorhergehenden schreibgeschützten Vergleich** gesetzt. Der Befehl verweigert das Schreiben, wenn sich diese Anzahlen geändert haben oder wenn betroffene Quizze unsichere Konflikte aufweisen. Wenden Sie die Reparatur erst an, nachdem Sie die Ergebnisse an einer Staging-Kopie validiert haben; wiederholen Sie anschließend die schreibgeschützte Prüfung, um zu bestätigen, dass keine verifizierten fehlenden Beziehungen verbleiben.

## Upgrade von 2.x auf 3.0

Bei diesem Upgrade bleiben Ihr bestehendes Verzeichnis und Ihre bestehende Datenbank erhalten. Sie kopieren den neuen Code über den alten Verzeichnisbaum und führen anschließend die Migrationen aus, entweder über den Web-Assistenten oder über die Befehlszeile.

### Migrationshistorie zuerst initialisieren

Chamilo installiert das Datenbankschema direkt aus den Entity-Definitionen. Eine vom Installer erstellte Installation enthält daher das endgültige Schema, aber eine **leere Migrationshistorie**. Installationen, die vor Chamilo 3.0 erstellt wurden, haben diese Historie nie erhalten. Zwei Dinge hängen davon ab:

* `doctrine:migrations:migrate` entscheidet anhand der Historie, was ausgeführt wird. Bei einer leeren Historie versucht es, jede Migration von Anfang an über ein Schema abzuspielen, das bereits aktuell ist.
* Der Web-Installer entscheidet anhand der Historie, ob ein Upgrade aussteht. Bei einer leeren Historie lehnt er die Anfrage ab, weil nichts belegt, dass ein Upgrade fällig ist.

Initialisieren Sie sie daher einmal und beachten Sie die untenstehende Reihenfolge.

> **Warnung: Initialisieren Sie die Historie, bevor Sie den neuen Code kopieren.** Die Befehle markieren jede Migration, die der **bereitgestellte** Code enthält, als bereits ausgeführt. Wenn Sie sie ausführen, nachdem Sie den 3.0-Code kopiert haben, markieren sie auch die 3.0-Migrationen, und Ihr Upgrade wird nie ausgeführt.

Führen Sie bei noch vorhandener aktueller Version Folgendes aus:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Der erste Befehl erstellt die Historientabelle. Der zweite markiert die Migrationen Ihrer aktuellen Version. `doctrine:migrations:version` schlägt allein fehl, wenn die Tabelle noch nicht existiert; überspringen Sie daher den ersten Befehl nicht.

**Keine Shell auf Ihrem Hosting?** Die Administrationsseite erledigt dasselbe: der Eintrag **No migration history: click to fix** der Plattform-Integritätsprüfungen. Er benötigt die oben genannte Reihenfolge nicht, weil er Ihr Schema statt des Codes auf der Festplatte liest: Er zeichnet nur die Migrations-Namespaces auf, deren Vorhandensein Ihre Datenbank bereits belegt, und lässt die neueren ausstehend. Sie können den 3.0-Code also zuerst kopieren und den Link danach verwenden — siehe unten *Wenn Sie den 3.0-Code bereits kopiert haben*.

Prüfen Sie das Ergebnis:

```bash
php bin/console doctrine:migrations:status
```

`Executed` muss `Available` entsprechen, und `New` muss 0 sein. Kopieren Sie nun den 3.0-Code.

### Wenn Sie den 3.0-Code bereits kopiert haben

Zwei Symptome kennzeichnen diesen Fall. Der Web-Assistent antwortet mit **„Chamilo is already installed“**, obwohl Ihre Plattform eine 2.x-Installation ist, und `doctrine:migrations:status` meldet `Executed` 0.

Ihre Historie ist weiterhin leer, und der Code auf der Festplatte ist nicht mehr der Code, der Ihre Datenbank erstellt hat. Initialisieren Sie sie daher von hier aus **nicht** mit `--add --all`: Das markiert jede Migration, die der bereitgestellte Code enthält, und zeichnet damit die Migrationen, die Ihr Upgrade noch benötigt, als bereits erledigt auf. Sie werden dann nie ausgeführt, und nichts warnt Sie danach — Ihrer Datenbank fehlen einfach die Spalten, die sie erstellen.

Es gibt zwei Auswege, und der erste benötigt keine Shell.

**Weg eins, über die Administrationsseite.** Öffnen Sie die Plattform-Integritätsprüfungen und verwenden Sie den Eintrag **No migration history: click to fix**. Er liest Ihr Schema, zeichnet nur die Namespaces auf, deren Vorhandensein Ihre Datenbank bereits belegt, und lässt die neueren Migrationen ausstehend. Die Benachrichtigung meldet beide Zahlen: Bei einer 2.0.x-Datenbank unter dem 3.0-Code sind 347 aufgezeichnet und 46 noch ausstehend. Führen Sie anschließend das Upgrade wie unten beschrieben aus.

**Weg zwei, über eine Shell.** Initialisieren Sie alles und entfernen Sie anschließend aus der Historie die Namespaces, die Ihre vorherige Version nicht enthielt.

Jedes 2.0.x-Release, von 2.0.0 bis 2.0.3, enthält dieselben **344** Migrationen, alle im Namespace `V200`. Chamilo 3.0.0 enthält **393**: die Namespaces `V210` und `V300` sowie drei `V200`-Migrationen. Diese drei sind datierte Kopien von Migrationen, die auch in `V210` und `V300` vorhanden sind; sie wurden hinzugefügt, damit der 1.11.x-Pfad ihre Spalten frühzeitig erstellt, und jede prüft das Schema, bevor sie handelt. Das Aufzeichnen des gesamten `V200`-Namespace verliert also nichts — ihre Zwillinge bleiben ausstehend und erledigen die Arbeit.

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Entfernen Sie anschließend in Ihrer Datenbank die Migrationen, die noch ausgeführt werden müssen:

```sql
DELETE FROM version WHERE version LIKE '%V210%' OR version LIKE '%V300%';
```

Prüfen Sie das Ergebnis:

```bash
php bin/console doctrine:migrations:status
```

Bei einer 2.0.x-Quelle und Chamilo 3.0.0 muss `Executed` 347, `Available` 393 und `New` 46 sein. Fahren Sie nun mit dem Upgrade unten fort.

### Das Upgrade autorisieren, wenn Sie den Web-Assistenten verwenden

Ihre Plattform ist bereits installiert, daher lehnt der Assistent sie ab, bis Sie das Upgrade auf dem Server autorisieren. Die Autorisierung ist eine leere Datei namens `UPGRADE_ENABLED` im Projektstammverzeichnis, neben `.env` und `composer.json`:

```bash
cd /var/www/chamilo
touch UPGRADE_ENABLED
```

Sie gehört in das Projektstammverzeichnis, nicht in `public/`: Von dort aus kann niemand per HTTP abfragen, ob Ihre Plattform derzeit für ein Upgrade geöffnet ist. Ohne sie antwortet der Assistent mit `No UPGRADE_ENABLED found in the project root`. Der Installer löscht die Datei, wenn das Upgrade abgeschlossen ist; bei einem schreibgeschützten Projektstammverzeichnis teilt er dies stattdessen mit, und Sie löschen sie von Hand. Die Befehlszeile benötigt keine solche Datei.

### Upgrade ausführen

Kopieren Sie den neuen Code und öffnen Sie anschließend entweder Ihre URL und folgen Sie dem Assistenten, oder führen Sie die Migrationen über die Befehlszeile aus:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Der Web-Assistent öffnet sich nur, solange Migrationen ausstehen. Sobald das Upgrade abgeschlossen ist, antwortet er erneut mit `409 Conflict`, was ihn schützt: Der Assistent verfügt über keine eigene Anmeldung.

## Chamilo 3.0.x aktualisieren

Kleinere Aktualisierungen innerhalb des 3.0-Zweigs sind unkomplizierter.

### Aktualisierungsprozess

#### Mit einem Paket

1. **Sichern** Sie die Datenbank und die Dateien.

2. **Laden Sie die neueste Version 3.0.x herunter** von [chamilo.org](https://chamilo.org/download):

3. **Lokal entpacken**

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

8. **Prüfen** Sie, dass die Plattform korrekt geladen wird, und kontrollieren Sie stichprobenartig die wichtigsten Funktionen.

#### Mit Git

Wenn Sie Chamilo mit Git installiert haben, können Sie stattdessen diese Anweisungen befolgen.

1. **Sichern** Sie die Datenbank und die Dateien.

2. **Aktuellen Code abrufen** (oder das neue Release herunterladen):
   ```bash
   git pull origin 3.0
   ```

3. **PHP-Abhängigkeiten aktualisieren:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **JavaScript-Abhängigkeiten aktualisieren und Assets neu erstellen:**
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

8. **Prüfen** Sie, dass die Plattform korrekt geladen wird, und kontrollieren Sie stichprobenartig die wichtigsten Funktionen.

### Aktualisierungen automatisieren

Für Organisationen, die mehrere Chamilo-Instanzen verwalten, empfiehlt es sich, den Aktualisierungsprozess zu skripten:

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

## Chamilo 3.1: Migration der Kurssprache

In [PR #9176](https://github.com/chamilo/chamilo-lms/pull/9176) wurden die Kurssprachen von der textuellen Spalte `course.course_language` auf `course.language_id` normalisiert, die auf `language.id` verweist. Die API und die unterstützten Aufrufer stellen die Kurssprache weiterhin als ISO-Code bereit. Es handelt sich um eine Änderung der Datenbankbeziehung, nicht um eine neue Sprachauswahl für Lehrkräfte.

Prüfen Sie vor der Ausführung der betreffenden V310-Migration (`Version20261005120000`), dass jeder Kurssprachcode **genau einem** Wert von `language.isocode` entspricht. Diese schreibgeschützte Abfrage erkennt fehlende oder mehrdeutige Übereinstimmungen, solange die Legacy-Spalte noch vorhanden ist:

```sql
SELECT c.course_language, COUNT(DISTINCT l.id) AS language_matches
FROM course c
LEFT JOIN language l ON l.isocode = c.course_language
GROUP BY c.course_language
HAVING COUNT(DISTINCT l.id) <> 1;
```

Eine erfolgreiche Vorprüfung liefert keine Zeilen. Wenn sie Zeilen zurückgibt, prüfen und korrigieren Sie die Quelldaten sorgfältig, bevor Sie die Migration ausführen. Die Migration lehnt nicht zugeordnete oder mehrdeutige Codes ab und weist außerdem ein widersprüchliches Teilschema zurück (`course_language` und `language_id` sind beide vorhanden). Sichern Sie die Datenbank und testen Sie auf einer Staging-Umgebung; entfernen Sie die Legacy-Spalte nicht und deaktivieren Sie diese Prüfungen nicht manuell.

## Chamilo 3.1: Registrierung der AI Toolbox in aktualisierten Kursen

Wenn die AI Toolbox in Kursen fehlt, die vor einem Upgrade bestanden, prüfen Sie, ob die relevanten **V310-Migrationen** erfolgreich ausgeführt wurden. Die Reparaturmigration `Version20261008113000` stellt sicher, dass das Toolbox-Werkzeug und der Ressourcentyp `toolbox_items` vorhanden sind, und legt fehlende Toolbox-Kurswerkzeugeinträge **als Entwürfe** an; sie veröffentlicht sie nicht automatisch. Nachfolgende Verbesserungen der Migrationen betreffen die Zuverlässigkeit und die Leistung von Upgrades. Dies ist eine Upgrade-Reparatur und kein Ersatz für die normale Werkzeugsichtbarkeit und die Berechtigungen der Plattform.

Wenn das Werkzeug weiterhin fehlt, prüfen Sie den Migrationsstatus und die Toolbox-Konfiguration, bevor Sie Kursdatensätze ändern. Fügen Sie **nicht** manuell Werkzeug- oder Ressourcenverknüpfungszeilen ein und führen Sie Migrationen nicht wiederholt aus, ohne das tatsächliche Schema und die Migrationshistorie zu prüfen. Siehe [PR #9195](https://github.com/chamilo/chamilo-lms/pull/9195) und die Folgeänderung [PR #9229](https://github.com/chamilo/chamilo-lms/pull/9229).

## Chamilo 3.1: Normalisierung des Legacy-Datenbankschemas

Die Schema-Bereinigung vom Oktober 2026 ändert einige **Spaltennamen, Typen und Relationen** der Datenbank, behält jedoch Felder bei, die weiterhin aktiv verwendet werden. Insbesondere wird `course_rel_class.course_code` durch `course_rel_class.c_id` ersetzt (mit Verweis auf `course.id`), und `course_request.category_code` wird durch `course_request.category_id` ersetzt (mit Verweis auf `course_category.id`). Ausgewählte Spalten vom Typ `title`, `url` und lange `VARCHAR`-Spalten werden in `LONGTEXT` umgewandelt, während andere von Chamilo verwaltete `VARCHAR`-Felder, soweit zutreffend, auf die Länge 255 normalisiert werden. Spalten, die externen Paketen gehören, werden bewusst gesondert behandelt.

Bei Installationen mit benutzerdefinierten SQL-Berichten, Plugins oder Integrationen **prüfen Sie deren Abfragen und Schemaannahmen**, bevor Sie diese Migrationen bereitstellen. Die Umwandlungen von Klasse/Kurs und Kursanfrage/Kategorie lehnen unaufgelöste Referenzen ab, anstatt sie stillschweigend zu verwerfen. Die Bereinigung entfernt außerdem veraltete FOS-Gruppentabellen, nachdem aus Gruppen abgeleitete Benutzerrollen sicher erhalten wurden; inkompatible oder ungültige Legacy-Gruppendaten führen dazu, dass die Migration zur Prüfung angehalten wird. Löschen Sie diese Tabellen nicht und schreiben Sie die Zuordnungen nicht im Voraus manuell um.

Diese Änderungen sind in [PR #9212](https://github.com/chamilo/chamilo-lms/pull/9212) dokumentiert (Issue #7445). Sichern Sie die Datenbank und überprüfen Sie das Upgrade an einer Staging-Kopie, insbesondere wenn benutzerdefinierter Code diese Legacy-Tabellen liest oder feste Textlängen erwartet.

## Sicherheitshinweise

### Sicherheitswartung vom Oktober 2026 im Entwicklungszweig 3.x

Mehrere von **christianbeeznest** verfasste Sicherheitskorrekturen wurden zwischen dem **16. und 18. Oktober 2026** in den `master`-Zweig von Chamilo übernommen. Dabei handelt es sich um Schutzmaßnahmen auf Code-Ebene, **nicht um neue Einstellungen**. Ein zusammengeführter Pull Request garantiert nicht, dass die Änderung in einem bestimmten getaggten Release oder in einer Installation enthalten ist, die nicht aktualisiert wurde. Prüfen Sie die Versionshinweise oder die bereitgestellte Git-Revision, bevor Sie eine Bereitstellung als gepatcht kennzeichnen.

Die Änderungen umfassen:

* **HTML-Filterung:** robustere Entfernung unsicherer Ereignisattribute aus von Benutzern bereitgestelltem HTML ([PR #9247](https://github.com/chamilo/chamilo-lms/pull/9247)).
* **Lernpfadfortschritt und Übungsanmerkungen:** verstärkte serverseitige Verarbeitung von Anfragen zum Lernpfadfortschritt und des Zugriffs auf die annotierten Versuchsantworten eines Lernenden ([PR #9251](https://github.com/chamilo/chamilo-lms/pull/9251), [PR #9259](https://github.com/chamilo/chamilo-lms/pull/9259)).
* **Links zu sozialen Profilen und Linkprüfung:** strengere URL-Validierung und Schutz der Kurslinkprüfung vor unsicheren Änderungen bei der DNS-Auflösung ([PR #9263](https://github.com/chamilo/chamilo-lms/pull/9263), [PR #9271](https://github.com/chamilo/chamilo-lms/pull/9271)).
* **CSV-Exporte:** Abschwächung der Interpretation von Tabellenkalkulationsformeln in exportierten Daten über mehrere Legacy- und moderne Berichts-/Exportpfade hinweg ([PR #9267](https://github.com/chamilo/chamilo-lms/pull/9267)).

**Nach der Bereitstellung von Code, der diese Korrekturen enthält**, führen Sie eine Staging-Regressionsprüfung durch: Erstellen und Anzeigen formatierten HTML-Inhalts; Speichern und Fortsetzen eines Lernpfads; Überprüfen, dass Lernende nur ihre eigenen autorisierten Übungsanmerkungen lesen können; Prüfen zulässiger sozialer Links und Kurslinks; und Öffnen repräsentativer CSV-Exporte in einem Tabellenkalkulationsprogramm, um zu bestätigen, dass von Benutzern gesteuerter Text nicht als Formel interpretiert wird. Beziehen Sie, soweit relevant, die Rollen Lehrkraft, Lernender und Administrator ein. Behalten Sie bestehende Authentifizierung, Zugriffskontrollen und Einschränkungen für ausgehende Netzwerke bei. Diese Prüfungen helfen, Regressionen zu erkennen, ersetzen jedoch keine Sicherheitsüberprüfung.

### Vorhersehbare Passwörter von SSO- und SCIM-Benutzern

Vor Chamilo 3.0.2 hatten einige Konten, die von einem externen Identitätssystem bereitgestellt oder aktualisiert wurden, ein festes, öffentlich erratbares Passwort. Jeder, der den Benutzernamen kannte, konnte sich über das reguläre Anmeldeformular anmelden, wenn das Konto die Authentifizierungsquelle `platform` beibehielt.

Chamilo 3.0.2 behebt den Code. Es ändert **nicht** bereits vorhandene Passwörter. Überprüfen Sie daher diese Konten nach der Aktualisierung:

* **SCIM:** Benutzer, die über `POST /scim/v2/Users` erstellt wurden, haben das Passwort `scim`.
* **Azure Entra ID, Facebook, Keycloak:** Benutzer, die sich über diese Anbieter angemeldet haben, hatten ihr Passwort durch `azure`, `facebook` oder `keycloak` ersetzt. Nur Benutzer, die zusätzlich die Authentifizierungsquelle `platform` haben, können sich damit anmelden.
* **Generisches OAuth2:** Benutzer, die vom Anbieter erstellt wurden, haben ihren Benutzernamen als Passwort.

So schließen Sie die Sicherheitslücke:

1. Aktualisieren Sie auf Chamilo 3.0.2 oder neuer.
2. Bearbeiten Sie unter **Administration > Benutzer** jeden betroffenen Benutzer und legen Sie ein neues Passwort fest. Benutzer, die sich nur über den Identitätsanbieter anmelden, müssen es nicht kennen.
3. Wenn Sie SCIM verwenden, setzen Sie `auth_source` in `authentication.yaml` auf einen anderen Wert als `platform` und leeren Sie anschließend den Cache. Siehe [SCIM](../authentication/scim.md). Bestehende Benutzer behalten die Authentifizierungsquellen, die sie bereits haben.
4. Bitten Sie Benutzer, die sich mit einem Passwort anmelden, dieses zu ändern.

Neue Benutzer, die nach der Aktualisierung erstellt werden, erhalten ein zufälliges Passwort, und eine SSO-Anmeldung überschreibt das Passwort eines bestehenden Benutzers nicht mehr. Benutzer, die ein Passwort für das reguläre Anmeldeformular benötigen, können eines über **Passwort vergessen?** auf der Anmeldeseite anfordern.

## Tipps

* **Erstellen Sie vor dem Upgrade immer eine Sicherung.** Datenbankmigrationen lassen sich über die Chamilo-Oberfläche nicht rückgängig machen.
* **Testen Sie zuerst auf einer Staging-Umgebung** -- insbesondere bei der Migration von 1.11.x auf 3.0, die eine erhebliche Datentransformation umfasst.
* **Planen Sie Upgrades während Wartungsfenstern**, wenn Benutzer die Plattform nicht aktiv nutzen.
* **Abonnieren Sie GitHub-Releases** auf [Github](https://github.com/chamilo/chamilo-lms/releases) über das Glockensymbol, um über neue Versionen und Sicherheitspatches benachrichtigt zu werden.
* **Wenn der Assistent mit `Chamilo is already installed` antwortet**, wurde keine ausstehende Migration gefunden. Führen Sie zur Prüfung `php bin/console doctrine:migrations:status` aus. Wenn `Executed` auf einer funktionierenden Plattform 0 ist, wurde Ihre Migrationshistorie nie initialisiert — siehe [Migrationshistorie zuerst initialisieren](#seed-the-migration-history-first).
* **Der automatische Download neuer Versionen** ist in Chamilo 3.0 noch nicht verfügbar, dies ist jedoch ein laufendes Projekt, das wir hoffentlich bald veröffentlichen. Das Upgrade selbst läuft bereits über den Web-Assistenten.