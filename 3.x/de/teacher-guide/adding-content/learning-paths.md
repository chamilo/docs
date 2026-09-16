# Lernpfade

Lernpfade ermöglichen es Ihnen, strukturierte Abfolgen von Lernaktivitäten zu erstellen. Ein Lernpfad führt Ihre Lernenden in einer bestimmten Reihenfolge durch Dokumente, Übungen, Links und andere Ressourcen, optional mit Voraussetzungen und Fortschrittsverfolgung.

Dieses Werkzeug ist wohl das am häufigsten genutzte Kurswerkzeug, weil es als Komponist für viele andere Werkzeuge dient und für Lernende sehr wohl das ***einzige*** sichtbare Werkzeug sein kann.

## Warum Lernpfade verwenden?

Lernpfade sind nützlich, wenn Sie Folgendes möchten:

* **Die Reihenfolge** der Inhaltsnutzung **steuern** — sicherstellen, dass Lernende Grundlagenmaterial abschließen, bevor sie fortfahren
* **Fortschritt verfolgen** — genau sehen, wo sich jeder Lernende in der Abfolge befindet
* **Voraussetzungen festlegen** — von Lernenden verlangen, eine Übung zu bestehen, bevor sie auf den nächsten Abschnitt zugreifen
* **Abschluss vergeben** — den Abschluss eines Lernpfads mit dem Notenbuch und Zertifikaten verknüpfen
* **Inhalte paketieren** — in sich geschlossene Lernmodule erstellen, die Lernende in ihrem eigenen Tempo durcharbeiten können

## Einen Lernpfad erstellen

1. Öffnen Sie das Werkzeug **Lernpfade** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Lernpfade" data-size="line"> von der Kursstartseite
2. Klicken Sie auf **Einen Lernpfad erstellen**
3. Geben Sie einen **Titel** und optional eine Beschreibung ein
4. Speichern — Sie gelangen zum Lernpfad-Editor

## Der Lernpfad-Editor

![Der Lernpfad-Editor mit dem Elementbaum links und der Inhaltsvorschau rechts](/.gitbook/assets/learning-path-editor.png)

Der Editor hat zwei Hauptbereiche:

* **Linkes Panel** — Die Liste der Elemente (Schritte) im Lernpfad, als Baumstruktur dargestellt
* **Rechtes Panel** — Der Inhalt des ausgewählten Elements

### Elemente hinzufügen

Klicken Sie auf **Ein Element hinzufügen** und wählen Sie, was hinzugefügt werden soll:

| Elementtyp | Beschreibung |
|-----------|-------------|
| **Abschnitt** | Eine Überschrift, die zusammengehörige Elemente gruppiert (wie ein Kapitelüberschrift). Abschnitte enthalten selbst keinen Inhalt. |
| **Dokument** | Eine Datei oder Webseite aus dem Dokumenten-Werkzeug Ihres Kurses |
| **Übung** | Ein Quiz oder Test aus dem Übungs-Werkzeug |
| **Link** | Eine externe URL |
| **Aufgabe** | Eine Studierendenveröffentlichung aus dem Aufgaben-Werkzeug |
| **Forum** | Ein Link zu einem Kursforum |
| **Umfrage** | Ein Link zu einer Umfrage |
| **Zertifikat** | Eine spezielle Seite, um die Erstellung eines Abschlusszertifikats oder die Vergabe von Kompetenzen auszulösen |

### Elemente organisieren

* **Ziehen und ablegen** Sie Elemente, um sie neu anzuordnen
* **Verschachteln Sie Elemente** unter Abschnitten, indem Sie sie nach rechts ziehen
* **Löschen** Sie Elemente, die Sie nicht mehr benötigen

### Voraussetzungen festlegen

Voraussetzungen stellen sicher, dass Lernende bestimmte Schritte abschließen, bevor sie auf andere zugreifen:

1. Wählen Sie ein Element im Lernpfad aus
2. Öffnen Sie dessen Einstellungen für **Voraussetzungen**
3. Wählen Sie, welches/welche vorangehende(n) Element(e) zuerst abgeschlossen sein muss/müssen
4. Bei Übungen können Sie eine **Mindestpunktzahl** verlangen (z. B. „Muss mindestens 70 % in Quiz 1 erreichen, bevor auf Modul 2 zugegriffen werden kann“)

## Lernerlebnis

Wenn ein Lernender einen Lernpfad öffnet:

* Sieht er die Liste der Elemente im linken Panel
* Abgeschlossene Elemente sind mit einem Häkchen markiert
* Elemente mit nicht erfüllten Voraussetzungen sind gesperrt
* Der Fortschritt wird automatisch verfolgt — wenn ein Lernender den Pfad verlässt und zurückkehrt, setzt er dort fort, wo er aufgehört hat
* Eine Fortschrittsleiste zeigt den gesamten Abschlussprozentsatz

## SCORM-Inhalte

Das Lernpfad-Werkzeug von Chamilo kann **SCORM 1.2**-Pakete importieren — den am weitesten verbreiteten E-Learning-Standard. Laden Sie eine SCORM-ZIP-Datei hoch, und Chamilo erstellt daraus einen Lernpfad und verfolgt Fortschritt und Punktzahlen gemäß der SCORM-Spezifikation.

So importieren Sie ein SCORM-Paket:

1. Öffnen Sie im Werkzeug Lernpfade das Aktionsmenü und klicken Sie auf **Hochladen**
2. Laden Sie die ZIP-Datei hoch
3. Chamilo entpackt sie und erstellt den Lernpfad automatisch

### CMI5- / xAPI-Pakete

CMI5-Pakete (der moderne, auf xAPI basierende Nachfolger von SCORM) werden über das **XApi**-Plugin unterstützt. Sobald das Plugin von Ihrem Administrator aktiviert ist, können Sie ein CMI5-Paket importieren, und Lernende können es aus dem Kurs starten; ihre Statements werden an den konfigurierten Learning Record Store weitergeleitet.

## Inhaltserstellung mit C-Studio

*Verfügbar, wenn Ihr Administrator das C-Studio-Plugin aktiviert hat.*

C-Studio fügt einen integrierten visuellen Drag-and-Drop-Editor hinzu, um interaktive Inhalte direkt in einem Lernpfad zu erstellen — eine Alternative zum Import eines SCORM-Pakets, wenn Sie kein separates Autorentool wie Articulate oder iSpring haben (oder keines erlernen möchten). Sie erstellen den Inhalt Seite für Seite direkt in Chamilo, und er wird wie jedes andere Lernpfad-Element gespeichert und verfolgt.

### Ein C-Studio-Projekt starten

Wenn das Plugin aktiv ist, zeigt die Liste der Lernpfade neben dem üblichen Aktionsmenü eine zusätzliche Schaltfläche, gekennzeichnet mit einem „+“ und dem Tooltip „Studio Tools“:

![Die Liste der Lernpfade mit der C-Studio-Schaltfläche „Studio Tools“ neben dem Standard-Aktionsmenü](/.gitbook/assets/cstudio-lp-button.png)

Klicken Sie darauf, um zu starten. Sie werden aufgefordert, ein neues Projekt von Grund auf zu erstellen oder ein vorhandenes zu importieren:

![Der C-Studio-Startbildschirm mit der Möglichkeit, ein neues Projekt zu erstellen oder ein vorhandenes zu importieren](/.gitbook/assets/cstudio-start-screen.png)

Dieser Bildschirm ist derzeit nur auf Französisch verfügbar, unabhängig von Ihrer Plattform- oder Kurssprache — eine bekannte Einschränkung der verwendeten Plugin-Version. Geben Sie Ihrem Projekt einen Titel, und es öffnet sich direkt im Editor.

### Der Editor

![Der visuelle C-Studio-Editor mit der Seitenleinwand, der Werkzeugpalette rechts und dem Projektbereich links](/.gitbook/assets/cstudio-editor.png)

Der Editor ist ein visueller Builder Seite für Seite:

* **Linkes Panel** — die Seiten Ihres Projekts, mit einem „+“ zum Hinzufügen weiterer Seiten und einem Abschnitt **Tools** unten (Clean data, Preview, Colors, Options, Quit)
* **Mittlere Leinwand** — die Seite, die Sie erstellen; klicken Sie auf ein Element, um es an Ort und Stelle zu bearbeiten
* **Rechtes Panel** — die Komponentenpalette, die auf die Leinwand gezogen wird

Die Palette umfasst grundlegende Bausteine (Spalten, Bilder, Audio, Titel, Text, Schaltflächen, Karten) sowie mehrere interaktive Übungstypen: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** und **Sort paragraphs**, plus einen **iframe**-Block zum Einbetten externer Inhalte und einen **Quiz**-Block.

### Sprache

Die eigene Oberfläche von C-Studio kann beim ersten Öffnen standardmäßig auf Französisch stehen, unabhängig von Ihrer Chamilo-Oberflächensprache oder der Kurssprache. Gehen Sie in diesem Fall zu **File > UI language** und wählen Sie Ihre Sprache — der Editor wird sofort neu geladen und merkt sich Ihre Wahl danach.

![Das geöffnete Dateimenü mit der Option „UI language“](/.gitbook/assets/cstudio-file-menu.png)

### Speichern und Exportieren

Verwenden Sie während der Arbeit **File > Save**. **File > Export...** packt Ihr Projekt als SCORM-Datei, die Sie herunterladen, sichern oder über **Import...** an anderer Stelle wiederverwenden können. **File > Quit** bringt Sie zurück zur Lernpfadliste, in der Ihr C-Studio-Projekt nun als regulärer Eintrag erscheint.

## Einstellungen des Lernpfads

Konfigurieren Sie das Verhalten des Lernpfads:

| Einstellung | Beschreibung |
|---------|-------------|
| **Sichtbarkeit** | Den Lernpfad für Lernende ausblenden oder anzeigen |
| **Voraussetzungen** | Abschluss anderer Lernpfade vor diesem verlangen |
| **Automatischer Start** | Diesen Lernpfad automatisch öffnen, wenn Lernende den Kurs betreten |
| **Akkumulierte SCORM-Zeit** | Ob die Zeit über mehrere Sitzungen hinweg akkumuliert werden soll |

## Verknüpfung mit dem Notenbuch

Sie können den Abschluss eines Lernpfads als benotete Aktivität ins Notenbuch aufnehmen. Dadurch kann der Fortschritt im Lernpfad zur Gesamtnote des Lernenden und zur Zertifikatsberechtigung beitragen.

## KI nutzen

Wenn der Administrator die KI-gestützte Generierung von Lernpfaden aktiviert hat, finden Sie im Dropdown-Aktionsmenü eine Option für den KI-Generator. Geben Sie der KI so präzisen Kontext, wie Sie ihn für Ihren Lernpfad wünschen, fordern Sie eine Anzahl von Seiten und eine ungefähre Wortzahl pro Seite an, und geben Sie an, ob Tests eingefügt werden sollen, und starten Sie. Wenige Minuten später liegt ein vollständiger, textbasierter Lernpfad vor.

Bearbeiten Sie die Dokumente, um mit weiterer KI Illustrationen zu erzeugen — danach bleibt nur noch eine Überprüfung, bevor Sie den Pfad mit Ihren Lernenden teilen können.

## Tipps

* **Mit einer Gliederung beginnen** — Planen Sie Ihre Abschnitte und Elemente, bevor Sie den Pfad aufbauen
* **Abschnitte als Kapitel nutzen** — Gruppieren Sie zusammengehörige Elemente unter Abschnittsüberschriften für mehr Klarheit
* **Voraussetzungen für Bewertungen setzen** — Verlangen Sie, dass Lernende die Inhalte studieren, bevor sie ein Quiz ablegen
* **Inhaltstypen mischen** — Kombinieren Sie Lesematerialien, Videos, interaktive Übungen und externe Ressourcen für ein ansprechendes Lernerlebnis
* **Die Lernendenansicht prüfen** — Nutzen Sie die Funktion Student View, um den Lernpfad so zu erleben, wie ihn ein Lernender sieht
* **SCORM für Interaktivität nutzen** — Wenn Sie Zugang zu SCORM-Autorentools haben (wie Articulate, iSpring oder ähnliche), erstellen Sie reichhaltige interaktive Inhalte und importieren Sie sie in Chamilo. Wenn Ihr Administrator das C-Studio-Plugin aktiviert hat, können Sie ähnliche interaktive Inhalte direkt in Chamilo erstellen — siehe [Inhaltserstellung mit C-Studio](#content-authoring-with-c-studio) oben