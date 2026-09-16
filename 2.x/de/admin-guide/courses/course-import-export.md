# Kursimport und -export

Chamilo unterstützt den Import und Export von Kursen für Sicherungszwecke, Migration und den Austausch von Inhalten.

Diese Funktionen finden Sie innerhalb des Kurses im **Wartungstool**, das sich unter dem Zahnradsymbol oben auf der Kurs-Startseite befindet.

## Einen Kurs exportieren

Lehrkräfte können ihre eigenen Kurse über das Wartungstool des Kurses exportieren. Als Administrator können Sie jeden Kurs exportieren:

1. Rufen Sie den Kurs auf
2. Greifen Sie auf das **Kurswartungstool** zu
3. Wählen Sie **Sicherung erstellen**
4. Wählen Sie aus, was eingeschlossen werden soll (Inhalte, Benutzerdaten usw.)
5. Laden Sie die Exportdatei herunter

Der Export erstellt ein Paket, das die Dokumente, Übungen, Foren, Lernpfade und Konfigurationen des Kurses enthält.

## Einen Kurs importieren

Um einen Kurs aus einer Chamilo-Exportdatei zu importieren:

1. Rufen Sie den Kurs auf
2. Greifen Sie auf das **Kurswartungstool** zu
3. Laden Sie im Abschnitt **Sicherung importieren** die Exportdatei hoch
4. Wählen Sie aus, was eingeschlossen werden soll (Inhalte, Benutzerdaten usw.)
5. Konfigurieren Sie die Importoptionen:
   * Ob vorhandene Inhalte überschrieben werden sollen
   * Ob Benutzerdaten eingeschlossen werden sollen
6. Führen Sie den Import durch

## Einen Kurs kopieren

Um die Inhalte eines anderen Kurses in Ihren Kurs zu kopieren, benötigen Sie zunächst einen Quellkurs und einen Zielkurs.

1. Rufen Sie den Zielkurs auf
2. Greifen Sie auf das **Kurswartungstool** zu
3. Wählen Sie im Abschnitt **Kurs kopieren** den **Quellkurs** aus
4. Bestätigen Sie die Optionen
5. Klicken Sie auf **Weiter** und folgen Sie den Anweisungen

## Common Cartridge

Chamilo unterstützt den Standard **IMS Common Cartridge 1.3** (IMS CC 1.3) für die Interoperabilität mit anderen Lernmanagementsystemen. Sie können:

* **Common Cartridge-Pakete** (.imscc-Dateien) **importieren**
* Kursinhalte im **Common Cartridge-Format exportieren**

Dies ermöglicht den Inhaltsaustausch mit anderen Plattformen, die den Common Cartridge-Standard unterstützen (Moodle, Canvas, Blackboard usw.).

## Einen Kurs recyceln

Die Kursrecycling-Funktion ermöglicht es Ihnen, die Struktur des Kurses beizubehalten, aber dessen Inhalte zu löschen.

## Einen Kurs löschen

Dies wird Ihren Kurs vollständig löschen, einschließlich aller Inhalte und Benutzeraktivitäten darin.

Um einen Kurs dauerhaft zu löschen:

1. Rufen Sie den Zielkurs auf
2. Greifen Sie auf das **Kurswartungstool** zu
3. Geben Sie im Abschnitt **Diesen Kurs vollständig löschen** den Code des Kurses manuell ein, um Ihre Absicht zu bestätigen
4. Bestätigen Sie

Sie werden anschließend zur Portal-Startseite weitergeleitet, da der Kurs nicht mehr existiert.

## Moodle-Import

Chamilo kann Kurssicherungen von **Moodle** importieren. Der Importer konvertiert die Inhaltsstruktur von Moodle in das Format von Chamilo, einschließlich Quizfragen, Dokumenten und Kurseinstellungen.

> **In Bearbeitung.** Obwohl bereits ein breites Spektrum abgedeckt wird, umfasst der Moodle-Importer derzeit nicht jeden Aktivitätstyp und Inhaltsformat von Moodle. Betrachten Sie ihn als Ausgangspunkt, der nach dem Import möglicherweise noch manuelle Anpassungen erfordert. Wenn Sie fehlende oder fehlerhafte Elemente beim Import oder Export feststellen, melden Sie dies bitte über unseren [Github-Bereich](https://github.com/chamilo/chamilo-lms/issues), indem Sie oben auf **New issue** klicken und so viele Details wie möglich angeben (einschließlich der Kurssicherung selbst, falls sie nicht vertraulich ist).

## Tipps

* **Regelmäßige Sicherungen** — Ermutigen Sie Lehrkräfte, ihre Kurse regelmäßig als Sicherung zu exportieren
* **Testimporte** — Wenn Sie Inhalte von einer anderen Plattform importieren, testen Sie den Import zunächst in einem Testkurs, um sicherzustellen, dass alles korrekt übertragen wurde
* **Inhaltsportabilität** — Verwenden Sie das Common Cartridge-Format, wenn Sie Inhalte mit anderen LMS-Plattformen teilen möchten