# Übungen

Das Übungs-Tool (auch „Tests“ genannt) ermöglicht die Erstellung von Quizzen und Prüfungen mit automatischer Bewertung. Chamilo unterstützt eine große Vielfalt an Fragetypen, von einfachen Multiple-Choice-Fragen bis hin zu interaktiven Hotspot-Fragen.

## Eine Übung erstellen

1. Öffnen Sie das Tool **Übungen** <img src="../../.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Übungen" data-size="line"> auf der Kursstartseite
2. Klicken Sie auf **Neue Übung**
3. Geben Sie einen **Titel** und optional eine **Beschreibung** ein
4. Konfigurieren Sie die Übungseinstellungen (siehe unten)
5. Speichern Sie und fügen Sie anschließend Fragen hinzu

## Übungseinstellungen

![Das Panel der Übungseinstellungen mit Optionen für Anzeige, Zeit, Versuche und Feedback](../../.gitbook/assets/exercise-settings.png)

### Anzeige und Navigation

| Einstellung | Optionen | Beschreibung |
|---------|---------|-------------|
| **Fragenlayout** | Alle auf einer Seite / Eine pro Seite | Alle Fragen auf einmal oder jeweils eine anzeigen |
| **Fragentitel ausblenden** | Ja / Nein | Ob Fragentitel den Lernenden angezeigt werden |
| **Schaltfläche „Zurück“ anzeigen** | Ja / Nein | Lernenden erlauben, zu vorherigen Fragen zurückzugehen |
| **Rückwärtsnavigation verhindern** | Ja / Nein | Lernende zwingen, der Reihe nach zu antworten, ohne zurückzugehen |

### Zeit und Verfügbarkeit

| Einstellung | Beschreibung |
|---------|-------------|
| **Zeitlimit** | Maximale Zeit (in Minuten) zum Absolvieren der Übung. Den Lernenden wird ein Countdown-Timer angezeigt |
| **Startdatum** | Ab wann die Übung für Lernende verfügbar ist |
| **Enddatum** | Ab wann die Übung nicht mehr verfügbar ist |

### Versuche und Bewertung

| Einstellung | Beschreibung |
|---------|-------------|
| **Maximale Versuche** | Wie oft ein Lernender die Übung ablegen kann (0 = unbegrenzt) |
| **Bestehensprozentsatz** | Die Mindestpunktzahl zum Bestehen (z. B. 70 %). Lernende, die diesen Schwellenwert nicht erreichen, sehen eine Nichtbestanden-Meldung |
| **Negative Bewertung fortpflanzen** | Ob Minuspunkte bei einzelnen Fragen die Gesamtpunktzahl unter null senken |

### Feedback

| Einstellung | Optionen |
|---------|---------|
| **Am Ende** | Ergebnisse und richtige Antworten nach dem Absenden durch den Lernenden anzeigen |
| **Sofort** | Feedback nach jeder Frage anzeigen (nützlich für Lernübungen) |
| **Prüfungsmodus** | Kein Feedback und keine Ergebnisse anzeigen |

### Ergebnisanzeige

Steuern Sie, was Lernende nach Abschluss der Übung sehen:

* Punktzahl und erwartete Antworten anzeigen
* Nur Punktzahl anzeigen
* Punktzahl mit Aufschlüsselung nach Kategorien anzeigen
* Rangfolge unter den anderen Lernenden anzeigen
* Nur beim letzten Versuch anzeigen
* Radar-Diagramm-Visualisierung anzeigen

### Abschlussmeldungen

* **Erfolgsmeldung** — Benutzerdefinierter Text, der angezeigt wird, wenn der Lernende besteht
* **Nichtbestanden-Meldung** — Benutzerdefinierter Text, der angezeigt wird, wenn der Lernende den Bestehensprozentsatz nicht erreicht

### Fragenrandomisierung

| Einstellung | Beschreibung |
|---------|-------------|
| **Zufällige Fragenreihenfolge** | Die Reihenfolge der Fragen bei jedem Versuch mischen |
| **Zufällige Antworten** | Antwortoptionen innerhalb jeder Frage mischen |
| **Zufällig nach Kategorie** | Zufällige Fragen aus jeder Fragenkategorie auswählen |

Sie können außerdem erweiterte Auswahlstrategien konfigurieren, die Kategorien und Randomisierung kombinieren.

## Fragetypen

![Überblick über die verfügbaren Fragetypen in der Oberfläche zur Übungserstellung](../../.gitbook/assets/exercise-question-types.png)

Chamilo bietet eine umfangreiche Auswahl an Fragetypen, die in mehrere Kategorien gegliedert sind:

### Einfachauswahl

* **Multiple Choice (eine Antwort)** — Der Lernende wählt eine richtige Antwort aus einer Liste von Optionen
* **Einzelantwort mit Bildern** — Wie oben, die Antwortoptionen werden jedoch als Bilder dargestellt

### Mehrfachauswahl

* **Mehrfachantwort** — Der Lernende wählt eine oder mehrere richtige Antworten
* **Mehrfachantwort (Dropdown)** — Antwortoptionen werden als Dropdown-Menüs dargestellt
* **Wahr/Falsch** — Eine Reihe von Aussagen, die der Lernende als wahr oder falsch markiert
* **Wahr/Falsch mit Sicherheitsgrad** — Wahr/Falsch mit zusätzlichem Konfidenzniveau, ermöglicht eine differenziertere Bewertung

### Lückentext

* **Lückentext** — Der Lernende ergänzt fehlende Wörter in einem Text. Sie definieren die Lücken und akzeptierten Antworten beim Erstellen der Frage.

### Zuordnung

* **Zuordnung** — Der Lernende verbindet Elemente aus zwei Spalten
* **Zuordnung (ziehbar)** — Dasselbe Konzept, jedoch mit Drag-and-Drop-Oberfläche
* **Ziehbar** — Elemente an die richtigen Positionen ziehen

### Offene Fragen

* **Freie Antwort (Aufsatz)** — Der Lernende schreibt eine Textantwort. Erfordert manuelle Bewertung (oder KI-unterstützte Bewertung, falls konfiguriert)
* **Mündlicher Ausdruck** — Der Lernende nimmt eine Audioantwort mit dem Mikrofon auf
* **Antwort hochladen** — Der Lernende lädt eine Datei als Antwort hoch

### Hotspot

* **Hotspot** — Der Lernende klickt auf bestimmte Bereiche eines Bildes, um zu antworten
* **Hotspot-Abgrenzung** — Der Lernende zeichnet Grenzen um Bereiche auf einem Bild

### Berechnet

* **Berechnete Antwort** — Numerische Fragen mit Formel und Toleranzbereich. Nützlich für Mathematik- und Naturwissenschaftskurse.

### Speziell

* **Leseverständnis** — Tests auf Basis eines gelesenen Textabschnitts
* **Annotation** — Die Lehrkraft lädt ein Bild hoch und die Lernenden annotieren es
* **Antwort in Office-Dokument** — Wenn das OnlyOffice-Plugin aktiviert ist, beantworten die Lernenden die Frage, indem sie ein eingebettetes Office-Dokument (Word, Excel, PowerPoint) bearbeiten. Ihre Antwort wird als separate Datei unter der Übung gespeichert, sodass sie zusammen mit dem Rest des Versuchs geprüft werden kann.

## Fragen zu einer Übung hinzufügen

1. Öffnen Sie die Übung und klicken Sie auf **Frage hinzufügen**
2. Wählen Sie den Fragetyp
3. Geben Sie den **Fragetext** ein (unterstützt Rich Text mit Bildern und Formatierung)
4. Definieren Sie die **Antworten** und deren Bewertung:
   * Geben Sie für jede Antwortoption an, ob sie korrekt ist und wie viele Punkte sie wert ist
   * Sie können falschen Antworten Minuspunkte zuweisen, um Raten zu erschweren
5. Optional **Feedback** hinzufügen — Erklärungen, die den Lernenden nach der Beantwortung angezeigt werden
6. Legen Sie den **Schwierigkeitsgrad** und die **Kategorie** fest (nützlich für Zufallsauswahl und Berichte)
7. Speichern

## Fragekategorien

Sie können Fragen in Kategorien organisieren (z. B. „Modul 1“, „Wortschatz“, „Fortgeschritten“). Kategorien sind nützlich für:

* Die Organisation großer Fragenpools
* Die zufällige Auswahl nach Kategorie (z. B. „5 Fragen aus Modul 1, 3 aus Modul 2“)
* Die Anzeige von nach Kategorie aufgeschlüsselten Punktzahlen in Berichten

## Wiederverwendung von Fragen

Fragen können innerhalb desselben Kurses in mehreren Übungen wiederverwendet werden. Beim Hinzufügen einer Frage können Sie eine neue erstellen oder eine vorhandene Frage aus dem Fragenpool auswählen.

## Übungen importieren

Chamilo unterstützt den Import von Übungen aus externen Formaten:

* **IMS QTI / Common Cartridge** — Das Standardformat für E-Learning-Quiz
* **Moodle-Format** — Import von Quiz aus Moodle-Exporten

Zum Importieren suchen Sie in der Übungsfunktion nach der Option **Importieren** und laden Sie Ihre Datei hoch.

## Tipps

* **Fragetypen mischen** — Kombinieren Sie Multiple Choice, Lückentext und offene Fragen für eine umfassende Bewertung
* **Kategorien nutzen** — Organisieren Sie Fragen nach Thema, um eine gezielte Zufallsauswahl zu ermöglichen
* **Bestehensprozentsatz festlegen** — Geben Sie den Lernenden ein klares Ziel und verknüpfen Sie es über das Gradebook mit der Zertifikatsvergabe
* **Sofortiges Feedback für Übungen nutzen** — Erstellen Sie unbenotete Übungsaufgaben mit sofortigem Feedback, damit Lernende aus Fehlern lernen
* **Zufall für Integrität** — Aktivieren Sie zufällige Fragenreihenfolge und zufällige Antworten, um das Abschreiben zu erschweren