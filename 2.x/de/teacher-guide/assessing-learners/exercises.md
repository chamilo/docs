# Übungen

Das Übungstool (auch als "Tests" bezeichnet) ermöglicht es Ihnen, Quizze und Prüfungen mit automatischer Bewertung zu erstellen. Chamilo unterstützt eine Vielzahl von Fragetypen, von einfachen Multiple-Choice-Fragen bis hin zu interaktiven Hotspot-Fragen.

## Eine Übung erstellen

1. Öffnen Sie das Tool **Übungen** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Übungen" data-size="line"> auf der Kursstartseite
2. Klicken Sie auf **Neue Übung**
3. Geben Sie einen **Titel** und optional eine **Beschreibung** ein
4. Konfigurieren Sie die Übungseinstellungen (siehe unten)
5. Speichern Sie und fügen Sie dann Fragen hinzu

## Übungseinstellungen

![Das Einstellungspanel für Übungen mit Optionen für Anzeige, Zeit, Versuche und Feedback](/.gitbook/assets/exercise-settings.png)

### Anzeige und Navigation

| Einstellung | Optionen | Beschreibung |
|-------------|----------|--------------|
| **Fragenlayout** | Alle auf einer Seite / Eine pro Seite | Alle Fragen auf einmal oder einzeln anzeigen |
| **Fragentitel ausblenden** | Ja / Nein | Ob die Fragentitel für Lernende sichtbar sind |
| **Zurück-Button anzeigen** | Ja / Nein | Lernenden erlauben, zu vorherigen Fragen zurückzukehren |
| **Rückwärtsnavigation verhindern** | Ja / Nein | Lernende zwingen, der Reihenfolge zu folgen, ohne zurückzugehen |

### Zeit und Verfügbarkeit

| Einstellung | Beschreibung |
|-------------|--------------|
| **Zeitlimit** | Maximale Zeit (in Minuten), um die Übung abzuschließen. Ein Countdown-Timer wird dem Lernenden angezeigt |
| **Startdatum** | Wann die Übung für Lernende verfügbar wird |
| **Enddatum** | Wann die Übung nicht mehr verfügbar ist |

### Versuche und Bewertung

| Einstellung | Beschreibung |
|-------------|--------------|
| **Maximale Versuche** | Wie oft ein Lernender die Übung machen kann (0 = unbegrenzt) |
| **Bestehensprozentsatz** | Der Mindestpunktwert zum Bestehen (z. B. 70 %). Lernende, die diesen Schwellenwert nicht erreichen, sehen eine Fehlermeldung |
| **Negative Bewertung weitergeben** | Ob negative Punkte bei einzelnen Fragen die Gesamtpunktzahl unter null reduzieren |

### Feedback

| Einstellung | Optionen |
|-------------|----------|
| **Am Ende** | Ergebnisse und richtige Antworten nach dem Absenden anzeigen |
| **Sofort** | Feedback nach jeder Frage anzeigen (nützlich für Lernübungen) |
| **Prüfungsmodus** | Kein Feedback oder Ergebnisse anzeigen |

### Ergebnisanzeige

Steuern Sie, was Lernende nach Abschluss der Übung sehen:

* Punktzahl und erwartete Antworten anzeigen
* Nur Punktzahl anzeigen
* Punktzahl mit Kategorieaufteilung anzeigen
* Rangfolge unter anderen Lernenden anzeigen
* Nur beim letzten Versuch anzeigen
* Radar-Diagramm-Visualisierung anzeigen

### Abschlussnachrichten

* **Erfolgsnachricht** — Benutzerdefinierter Text, der beim Bestehen angezeigt wird
* **Fehlernachricht** — Benutzerdefinierter Text, der angezeigt wird, wenn der Bestehensprozentsatz nicht erreicht wird

### Fragenrandomisierung

| Einstellung | Beschreibung |
|-------------|--------------|
| **Zufällige Fragenreihenfolge** | Reihenfolge der Fragen bei jedem Versuch mischen |
| **Zufällige Antworten** | Antwortoptionen innerhalb jeder Frage mischen |
| **Zufällig nach Kategorie** | Zufällige Fragen aus jeder Fragenkategorie auswählen |

Sie können auch fortgeschrittene Auswahlstrategien konfigurieren, die Kategorien und Randomisierung kombinieren.

## Fragetypen

![Übersicht der verfügbaren Fragetypen in der Übungserstellungsoberfläche](/.gitbook/assets/exercise-question-types.png)

Chamilo bietet eine umfangreiche Auswahl an Fragetypen, die in mehrere Kategorien unterteilt sind:

### Einfachauswahl

* **Multiple Choice (eine Antwort)** — Lernender wählt eine richtige Antwort aus einer Liste von Optionen
* **Einzelantwort mit Bildern** — Wie oben, aber Antwortoptionen werden als Bilder angezeigt

### Mehrfachauswahl

* **Mehrfachantwort** — Lernender wählt eine oder mehrere richtige Antworten
* **Mehrfachantwort (Dropdown)** — Antwortoptionen werden als Dropdown-Menüs präsentiert
* **Wahr/Falsch** — Eine Reihe von Aussagen, die der Lernende als wahr oder falsch markiert
* **Wahr/Falsch mit Gewissheitsgrad** — Wahr/Falsch mit zusätzlichem Vertrauensniveau, das eine nuanciertere Bewertung ermöglicht

### Lückentext

* **Lückentext ausfüllen** — Lernender vervollständigt fehlende Wörter in einem Text. Sie definieren die Lücken und akzeptierten Antworten beim Erstellen der Frage.

### Zuordnung

* **Zuordnung** — Lernender verbindet Elemente aus zwei Spalten
* **Zuordnung (ziehbar)** — Dasselbe Konzept, aber mit einer Drag-and-Drop-Oberfläche
* **Ziehbar** — Elemente an die richtigen Positionen ziehen

### Offene Fragen

* **Freie Antwort (Essay)** — Lernender schreibt eine Textantwort. Erfordert manuelle Bewertung (oder KI-unterstützte Bewertung, falls konfiguriert)
* **Mündlicher Ausdruck** — Lernender nimmt eine Audioantwort mit seinem Mikrofon auf
* **Antwort hochladen** — Lernender lädt eine Datei als Antwort hoch

### Hotspot

* **Hotspot** — Lernender klickt auf bestimmte Bereiche eines Bildes, um zu antworten
* **Hotspot-Abgrenzung** — Lernender zeichnet Grenzen um Bereiche auf einem Bild

### Berechnet

* **Berechnete Antwort** — Numerische Fragen mit einer Formel und einem Toleranzbereich. Nützlich für Mathematik- und Naturwissenschaftskurse.

---
### Speziell

* **Leseverständnis** — Tests basierend auf dem Lesen eines Textabschnitts
* **Annotation** — Der Lehrer lädt ein Bild hoch und der Lernende annotiert es
* **Antwort in Office-Dokument** — Wenn das OnlyOffice-Plugin aktiviert ist, beantwortet der Lernende die Frage, indem er ein eingebettetes Office-Dokument (Word, Excel, PowerPoint) bearbeitet. Die Antwort wird als separate Datei unter der Übung gespeichert, sodass sie zusammen mit dem restlichen Versuch überprüft werden kann.

## Fragen zu einer Übung hinzufügen

1. Öffnen Sie die Übung und klicken Sie auf **Frage hinzufügen**
2. Wählen Sie den Fragetyp aus
3. Geben Sie den **Fragetext** ein (unterstützt Rich Text mit Bildern und Formatierung)
4. Definieren Sie die **Antworten** und deren Bewertung:
   * Geben Sie für jede Antwortoption an, ob sie korrekt ist und wie viele Punkte sie wert ist
   * Sie können falschen Antworten negative Punkte zuweisen, um Raten zu entmutigen
5. Fügen Sie optional **Feedback** hinzu — Erklärungen, die dem Lernenden nach der Beantwortung angezeigt werden
6. Legen Sie den **Schwierigkeitsgrad** und die **Kategorie** fest (nützlich für Zufallsauswahl und Berichterstellung)
7. Speichern

## Fragenkategorien

Sie können Fragen in Kategorien organisieren (z. B. "Modul 1", "Vokabeln", "Fortgeschritten"). Kategorien sind nützlich für:

* Die Organisation großer Fragenbanken
* Die Ermöglichung einer Zufallsauswahl nach Kategorie (z. B. "5 Fragen aus Modul 1, 3 aus Modul 2")
* Die Anzeige von Ergebnissen nach Kategorien in Berichten

## Wiederverwendung von Fragen

Fragen können innerhalb desselben Kurses in verschiedenen Übungen wiederverwendet werden. Beim Hinzufügen einer Frage können Sie entweder eine neue erstellen oder eine bestehende Frage aus der Fragenbank auswählen.

## Übungen importieren

Chamilo unterstützt den Import von Übungen aus externen Formaten:

* **IMS QTI / Common Cartridge** — Das Standardformat für E-Learning-Quizze
* **Moodle-Format** — Importieren Sie Quizze aus Moodle-Exporten

Um zu importieren, suchen Sie nach der Option **Importieren** im Übungstool und laden Sie Ihre Datei hoch.

## Tipps

* **Fragetypen mischen** — Kombinieren Sie Multiple-Choice-, Lückentext- und offene Fragen für eine umfassende Bewertung
* **Kategorien verwenden** — Organisieren Sie Fragen nach Thema, um gezielte Zufallsauswahl zu ermöglichen
* **Bestandsprozentsatz festlegen** — Geben Sie den Lernenden ein klares Ziel und verknüpfen Sie es mit der Zertifikatsgenerierung über das Gradebook
* **Sofortiges Feedback für Übungszwecke nutzen** — Erstellen Sie unbewertete Übungsaufgaben mit sofortigem Feedback, um den Lernenden zu helfen, aus ihren Fehlern zu lernen
* **Zufällige Reihenfolge für Integrität** — Aktivieren Sie zufällige Fragenreihenfolge und zufällige Antworten, um die Möglichkeit des Abschreibens zu verringern