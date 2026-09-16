# Kursimport und -export

Chamilo unterstützt den Import und Export von Kursen für Backup-, Migrations- und Inhaltsaustauschzwecke.

Diese Funktionen befinden sich innerhalb des Kurses im Werkzeug **Wartung**, das über das Zahnradsymbol oben auf der Kursstartseite erreichbar ist.

## Einen Kurs exportieren

Lehrende können ihre eigenen Kurse über das Kurswartungswerkzeug exportieren. Als Administrator können Sie jeden Kurs exportieren:

1. Den Kurs betreten
2. Das Werkzeug **Kurswartung** öffnen
3. **Backup erstellen** auswählen
4. Auswählen, was einbezogen werden soll (Inhalte, Benutzerdaten usw.)
5. Die Exportdatei herunterladen

Der Export erzeugt ein Paket mit den Dokumenten, Übungen, Foren, Lernpfaden und der Konfiguration des Kurses.

## Einen Kurs importieren

So importieren Sie einen Kurs aus einer Chamilo-Exportdatei:

1. Den Kurs betreten
2. Das Werkzeug **Kurswartung** öffnen
3. Im Abschnitt **Backup importieren** die Exportdatei hochladen
4. Auswählen, was einbezogen werden soll (Inhalte, Benutzerdaten usw.)
5. Importoptionen konfigurieren:
   * Ob vorhandene Inhalte überschrieben werden sollen
   * Ob Benutzerdaten einbezogen werden sollen
6. Den Import ausführen

## Einen Kurs kopieren

Um Inhalte aus einem anderen Kurs in Ihren Kurs zu kopieren, müssen zunächst ein Quellkurs und ein Zielkurs angelegt sein.

1. Den Zielkurs betreten
2. Das Werkzeug **Kurswartung** öffnen
3. Im Abschnitt **Kurs kopieren** den **Quellkurs** auswählen
4. Die Optionen bestätigen
5. Auf **Weiter** klicken und den Anweisungen folgen

## Common Cartridge

Chamilo unterstützt den Standard **IMS Common Cartridge 1.3** (IMS CC 1.3) für die Interoperabilität mit anderen Lernmanagementsystemen. Sie können:

* Common-Cartridge-Pakete (.imscc-Dateien) **importieren**
* Kursinhalte im Common-Cartridge-Format **exportieren**

Dadurch ist der Inhaltstausch mit anderen Plattformen möglich, die den Common-Cartridge-Standard unterstützen (Moodle, Canvas, Blackboard usw.).

## Einen Kurs recyceln

Die Funktion zum Recyceln eines Kurses ermöglicht es, die Hülle des Kurses zu behalten, den Inhalt jedoch zu löschen.

## Einen Kurs löschen

Dadurch wird Ihr Kurs vollständig gelöscht, einschließlich aller Inhalte und der Benutzeraktivitäten darin.

So löschen Sie einen Kurs dauerhaft:

1. Den Zielkurs betreten
2. Das Werkzeug **Kurswartung** öffnen
3. Im Abschnitt **Diesen Kurs vollständig löschen** den Kurs-Code manuell eingeben, um Ihre Absicht zu bestätigen
4. Bestätigen

Anschließend werden Sie zur Portal-Startseite weitergeleitet, weil der Kurs nicht mehr existiert.

## Moodle-Import

Chamilo kann Kurs-Backups aus **Moodle** importieren. Der Importer wandelt die Inhaltsstruktur von Moodle in das Chamilo-Format um, einschließlich Tests, Dokumenten und Kurseinstellungen.

> **In Arbeit.** Obwohl bereits eine breite Basis abgedeckt ist, unterstützt der Moodle-Importer derzeit nicht jeden Moodle-Aktivitätstyp und jedes Inhaltsformat. Betrachten Sie ihn als Ausgangspunkt, der nach Abschluss des Imports noch manuelle Anpassungen erfordern kann. Wenn Sie fehlende oder fehlerhafte Elemente beim Import oder Export feststellen, melden Sie uns dies bitte über unseren [Github-Bereich](https://github.com/chamilo/chamilo-lms/issues), indem Sie oben auf **New issue** klicken und möglichst viele Details angeben (einschließlich des Kurs-Backups selbst, sofern es nicht vertraulich ist).

## Tipps

* **Regelmäßige Backups** — Ermutigen Sie Lehrende, ihre Kurse regelmäßig als Backup zu exportieren
* **Importe testen** — Beim Import von Inhalten aus einer anderen Plattform den Import zuerst in einem Testkurs prüfen, um sicherzustellen, dass alles korrekt übertragen wurde
* **Inhaltsportabilität** — Verwenden Sie das Common-Cartridge-Format, wenn Sie Inhalte mit anderen LMS-Plattformen austauschen müssen