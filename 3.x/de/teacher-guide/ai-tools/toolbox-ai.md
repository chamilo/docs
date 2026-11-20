# KI-Werkzeugkasten

Der **KI-Werkzeugkasten** ist ein Kurswerkzeug, das aus den Anweisungen einer Lehrkraft interaktive Lernanwendungen erzeugt. Chamilo verpackt jede erzeugte Anwendung als **SCORM 1.2**, sodass Lernfortschritt, Punktzahl und Wiederaufnahmedaten von der Plattform erfasst werden.

> Die Administration muss sowohl `ai_helpers.enable_ai_helpers` als auch `ai_helpers.toolbox` unter **Administration > Konfigurationseinstellungen > KI-Hilfen** aktivieren, und mindestens ein Text-KI-Anbieter muss konfiguriert sein.

## Eine interaktive Anwendung erstellen

1. Öffnen Sie den **KI-Werkzeugkasten** im Kurs.
2. Klicken Sie auf **Erstellen**.
3. Geben Sie einen **Titel** und optional eine **Beschreibung** ein.
4. Beschreiben Sie unter **Was soll die Anwendung tun?** die vollständige Aktivität, die Sie wünschen. Geben Sie das Lernziel, die Regeln, die Stufen, die Bewertung und an, was geschehen soll, wenn die lernende Person fertig ist.
5. Wählen Sie den **KI-Anbieter**, wenn mehr als einer verfügbar ist.
6. Klicken Sie auf **Generieren**.

Die erste Generierung wird als **Version 1** gespeichert. Sie beginnt als Entwurf, sodass Sie sie in der Vorschau prüfen können, bevor Sie sie für Lernende sichtbar machen.

## Verbessern und Versionierung

Öffnen Sie die **Einstellungen** einer Anwendung, um sie zu verwalten. Sie können:

* die aktuelle Anwendung in der Vorschau anzeigen oder herunterladen;
* **Mit KI verbessern** verwenden, um eine Änderung zu beschreiben und eine neue Version zu erzeugen;
* den **Versionsverlauf** prüfen;
* eine frühere Version in der Vorschau anzeigen, herunterladen oder wiederherstellen;
* die Anwendung veröffentlichen oder ausblenden;
* **Berichte** öffnen, um die Nachverfolgung der Lernenden zu prüfen.

Das Erzeugen einer Verbesserung löscht frühere Versionen nicht. Das Wiederherstellen einer früheren Version macht diese Version wieder zur aktuellen Version.

## Eine Anwendung zu einem Lernpfad hinzufügen

Im [Lernpfad-Editor](../adding-content/learning-paths.md) können Lehrkräfte eine erzeugte Anwendung des KI-Werkzeugkastens als Ressource auswählen. Die Anwendung muss eine erzeugte Version haben, muss aber nicht veröffentlicht sein, bevor die Lehrkraft sie zum Lernpfad hinzufügt. Eine unveröffentlichte Anwendung steht Lernenden weiterhin erst zur Verfügung, wenn sie veröffentlicht wurde.

Wenn eine berechtigte Lehrkraft den Inhalt des Werkzeugkastens im **Vorschaumodus** öffnet, zeigt Chamilo **„Fortschritt und Punktzahl werden im Vorschaumodus nicht gespeichert.“** an. Das Testen der Aktivität auf diese Weise erzeugt keine Nachverfolgung der Lernenden und aktualisiert keine Punktzahl. Verwenden Sie die normale Lernerfahrung, um den SCORM-Fortschritt und die Punktzahlen nach der Veröffentlichung zu prüfen.

## Validierung der Generierung und Fehlerbehebung

Nach der KI-Generierung prüft Chamilo den Quellcode der erzeugten Anwendung, bevor eine Version verfügbar gemacht wird. Dazu gehören Prüfungen der JavaScript-Syntax oder -Struktur sowie Einschränkungen für unsichere Browser-APIs. Schlägt die Validierung fehl, fordert Chamilo den KI-Anbieter auf, **das Ergebnis einmal zu reparieren**; schlägt die reparierte Version weiterhin fehl, wird die Generierung mit einem Fehler beendet. Eine erfolgreiche Validierung ersetzt nicht das Testen der Lernregeln der Aktivität, der Barrierefreiheit und der SCORM-Bewertung vor der Veröffentlichung.

Meldet die Generierung **HTTP 504**, hat der Webserver oder das Gateway nicht mehr auf die Anfrage gewartet. Dies unterscheidet sich von einem Timeout, das vom Text-KI-Anbieter vorgegeben wird. Der Fehler kann die ungefähre verstrichene Zeit enthalten; versuchen Sie eine einfachere Aktivitätsanfrage und bitten Sie die Administration, die Timeouts von Gateway, PHP/Webserver und Anbieter zu prüfen. Ein Timeout oder ein Ratenbegrenzungsfehler des Anbieters erfordert stattdessen die Prüfung des konfigurierten Modells und der Anbietereinstellungen. Gehen Sie nach einem Fehler nicht davon aus, dass die Anwendung erfolgreich gespeichert wurde.

Diese Verbesserungen der Validierung und Diagnose wurden in [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198) eingeführt.

## Lernerfahrung

Lernende sehen nur Anwendungen, die veröffentlicht wurden. Aus dem Werkzeugkasten können sie eine Anwendung öffnen, ab ihrem letzten SCORM-Status fortfahren und ihren **Fortschritt** und ihre **Punktzahl** sehen. Wenn ein neuer Versuch zulässig ist, startet **Erneut versuchen** einen neuen Versuch.

Anwendungen des Werkzeugkastens laufen innerhalb der Lernpfad-Laufzeitumgebung in einem eingeschränkten iframe und melden ihren SCORM-Status an Chamilo zurück. Sie werden über den Werkzeugkasten verwaltet und nicht über die normale Liste der Lernpfade.

Berechtigte MCP-Clients können Anwendungen des Werkzeugkastens auch erstellen oder aktualisieren, wenn dieselben Einstellungen des KI-Werkzeugkastens aktiviert sind.