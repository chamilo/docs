# Kursimport und -export

Chamilo unterstützt den Import und Export von Kursen zu Zwecken der Sicherung, Migration und Inhaltsfreigabe.

Diese Funktionen befinden sich innerhalb des Kurses im Werkzeug **Wartung**, das unter dem Zahnradsymbol oben auf der Kursstartseite zu finden ist.

## Einen Kurs exportieren

Lehrkräfte können ihre eigenen Kurse über das Werkzeug Kurswartung exportieren. Als Administrator können Sie jeden Kurs exportieren:

1. Betreten Sie den Kurs
2. Rufen Sie das Werkzeug **Kurswartung** auf
3. Wählen Sie **Sicherung erstellen**
4. Wählen Sie aus, was einbezogen werden soll (Inhalte, Benutzerdaten usw.)
5. Laden Sie die Exportdatei herunter

Der Export erstellt ein Paket, das die Dokumente, Übungen, Foren, Lernpfade und die Konfiguration des Kurses enthält.

## Einen Kurs importieren

So importieren Sie einen Kurs aus einer Chamilo-Exportdatei:

1. Betreten Sie den Kurs
2. Rufen Sie das Werkzeug **Kurswartung** auf
3. Laden Sie im Abschnitt **Sicherung importieren** die Exportdatei hoch
4. Wählen Sie aus, was einbezogen werden soll (Inhalte, Benutzerdaten usw.)
5. Konfigurieren Sie die Importoptionen:
   * Ob vorhandene Inhalte überschrieben werden sollen
   * Ob Benutzerdaten einbezogen werden sollen
6. Führen Sie den Import aus

## Einen Kurs kopieren

Um die Inhalte eines anderen Kurses in Ihren Kurs zu kopieren, müssen zunächst ein Quellkurs und ein Zielkurs erstellt werden.

1. Betreten Sie den Zielkurs
2. Rufen Sie das Werkzeug **Kurswartung** auf
3. Wählen Sie im Abschnitt **Kurs kopieren** den Kurs **Quelle** aus
4. Bestätigen Sie die Optionen
5. Klicken Sie auf **Weiter** und folgen Sie den Anweisungen

## Common Cartridge

Chamilo unterstützt den Standard **IMS Common Cartridge 1.3** (IMS CC 1.3) für die Interoperabilität mit anderen Lernmanagementsystemen. Sie können:

* Common-Cartridge-Pakete **importieren** (.imscc-Dateien)
* Kursinhalte im Common-Cartridge-Format **exportieren**

Dies ermöglicht den Austausch von Inhalten mit anderen Plattformen, die den Common-Cartridge-Standard unterstützen (Moodle, Canvas, Blackboard usw.).

## Einen Kurs recyceln

Die Funktion zum Recyceln eines Kurses ermöglicht es Ihnen lediglich, die Hülle des Kurses beizubehalten, dessen Inhalte jedoch zu löschen.

## Einen Kurs löschen

Dadurch wird Ihr Kurs vollständig gelöscht, einschließlich aller Inhalte und der Benutzeraktivitäten darin.

So löschen Sie einen Kurs dauerhaft:

1. Betreten Sie den Zielkurs
2. Rufen Sie das Werkzeug **Kurswartung** auf
3. Geben Sie im Abschnitt **Diesen Kurs vollständig löschen** den Kurscode manuell ein, um Ihre Absicht zu bestätigen
4. Bestätigen Sie

Anschließend werden Sie zur Startseite des Portals weitergeleitet, da der Kurs nicht mehr existiert.

## Moodle-Import

Chamilo kann Kurssicherungen aus **Moodle** importieren. Der Importer wandelt die Inhaltsstruktur von Moodle in das Format von Chamilo um, einschließlich Quizzen, Dokumenten und Kurseinstellungen.

> **In Arbeit.** Obwohl bereits ein breites Spektrum abgedeckt wird, unterstützt der Moodle-Importer derzeit nicht jeden Moodle-Aktivitätstyp und jedes Inhaltsformat. Betrachten Sie ihn als Ausgangspunkt, der nach Abschluss des Imports möglicherweise noch manuelle Anpassungen erfordert. Wenn Sie ein fehlerhaftes oder fehlendes Element beim Import oder Export feststellen, melden Sie es uns bitte über unseren [GitHub-Bereich](https://github.com/chamilo/chamilo-lms/issues), indem Sie oben auf **Neues Issue** klicken und so viele Details wie möglich angeben (einschließlich der Kurssicherung selbst, sofern diese nicht vertraulich ist).

## Abhängigkeiten von Kurssicherung und -wiederherstellung prüfen (September 2026)

Aktuelle Korrekturen an der Kurssicherung von Chamilo sowie am Moodle-kompatiblen MBZ-Import und -Export verbessern die Wiederherstellung **zusammenhängender Ressourcen**, nicht nur der Liste der Aktivitäten. Beim Testen eines vollständigen Sicherungszyklus sollten sowohl die importierten Inhalte als auch die Verknüpfungen zwischen den Ressourcen geprüft werden:

1. **Übungen:** Öffnen Sie wiederhergestellte Tests und prüfen Sie, ob die vom Test verwendeten Fragen vorhanden sind und in der erwarteten Reihenfolge stehen. Der Export berücksichtigt nun Abhängigkeiten zwischen Tests und Fragen, anstatt davon auszugehen, dass jede referenzierte Frage unabhängig ausgewählt wurde ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
2. **Dokumente und Videos in Lernpfaden:** Spielen Sie den wiederhergestellten Lernpfad ab und öffnen Sie die Schritte mit Dokumenten, HTML und Videos. Ressourcenverweise werden mit den importierten Ressourcen abgeglichen; ein Lernpfad kann auf ein Dokument verweisen, das bei der gewöhnlichen Auswahl der Kursdokumente nicht aufgeführt war ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
3. **Reihenfolge des Abschlusselements:** Wenn der ursprüngliche Lernpfad ein abschließendes **Abschlusselement** enthält (beispielsweise eine Abschlussseite mit Zertifikatsinformationen), prüfen Sie, ob es **nach den regulären Schritten** bleibt. Archive aus älteren Inhalten können den letzten Schritt mit einer veralteten Position kodieren; der Export-/Importablauf normalisiert diese Position ([PR #9121](https://github.com/chamilo/chamilo-lms/pull/9121)).
4. **Verweise auf Foren und das Notenbuch:** Öffnen Sie wiederhergestellte Forumsdiskussionen und Beiträge und prüfen Sie anschließend Einträge unter **Bewertungen (Notenbuch)**, die mit Forumsthemen oder der Teilnahme verknüpft sind. Die wiederhergestellten Verknüpfungen müssen auf das **Zielthema** verweisen, nicht auf eine Kennung des Quellkurses. Dies wurde im MBZ-Forumsimport verbessert ([PR #9143](https://github.com/chamilo/chamilo-lms/pull/9143)).
5. **Voraussetzungen und Bilder:** Prüfen Sie alle Voraussetzungen von Lernpfaden und stellen Sie sicher, dass Bilddateien als Bilder angezeigt werden und nicht fälschlich als HTML erkannt werden. Importkorrekturen betreffen die Neuzuordnung von IDs und die Dokumentklassifizierung. Eine separate Migration repariert ausgewählte **mitgelieferte Demokurse**; gehen Sie nicht davon aus, dass sie beliebige benutzerdefinierte Kurse automatisch repariert ([PR #9137](https://github.com/chamilo/chamilo-lms/pull/9137)).

**Empfohlene Prüfung:** Exportieren Sie einen repräsentativen Kurs, bewahren Sie das Originalarchiv auf, stellen Sie es in einem **separaten Testkurs** wieder her und vergleichen Sie Übungsfragen, die Navigation im Lernpfad, das Verhalten der Voraussetzungen, Forumsdiskussionen und verknüpfte Notenbuchressourcen. Überschreiben Sie keinen Produktivkurs, um die Portabilität zu testen. Interne IDs von Quelle und Ziel können sich legitimerweise unterscheiden; beurteilen Sie das Ergebnis anhand der wiederhergestellten Ressource und ihrer funktionierenden Verknüpfungen. Der Moodle-Import deckt weiterhin nicht jeden Aktivitätstyp ab. Prüfen Sie daher nicht unterstützte Elemente manuell und melden Sie einen reproduzierbaren Fall fehlender Ressourcen mit einem **bereinigten** Testarchiv.

## Tipps

* **Regelmäßige Sicherungen** — Ermutigen Sie Lehrkräfte, ihre Kurse regelmäßig als Sicherung zu exportieren
* **Importe testen** — Wenn Sie Inhalte von einer anderen Plattform importieren, testen Sie den Import zunächst in einem Versuchskurs, um zu prüfen, ob alles korrekt übertragen wurde
* **Inhaltsportabilität** — Verwenden Sie das Common-Cartridge-Format, wenn Sie Inhalte mit anderen LMS-Plattformen teilen müssen