# Lernpfade

Lernpfade ermöglichen es Ihnen, strukturierte Sequenzen von Lernaktivitäten zu erstellen. Ein Lernpfad führt Ihre Lernenden durch eine bestimmte Reihenfolge von Dokumenten, Übungen, Links und anderen Ressourcen, mit optionalen Voraussetzungen und Fortschrittsverfolgung.

Dieses Werkzeug ist wohl das am häufigsten verwendete Kurswerkzeug, da es als Komponist für viele andere Werkzeuge fungiert und sehr wohl das ***einzige*** Werkzeug sein kann, das den Lernenden gegenübersteht.

## Warum Lernpfade verwenden?

Lernpfade sind nützlich, wenn Sie Folgendes möchten:

* **Reihenfolge steuern** – sicherstellen, dass Lernende grundlegendes Material abschließen, bevor sie weitergehen
* **Fortschritt verfolgen** – genau sehen, wo sich jeder Lernende in der Sequenz befindet
* **Voraussetzungen festlegen** – verlangen, dass Lernende eine Übung bestehen, bevor sie den nächsten Abschnitt freischalten
* **Abschluss belohnen** – den Abschluss eines Lernpfads mit dem Notenbuch und Zertifikaten verknüpfen
* **Inhalte bündeln** – eigenständige Lernmodule erstellen, die Lernende in ihrem eigenen Tempo durcharbeiten können

## Einen Lernpfad erstellen

1. Öffnen Sie das Werkzeug **Lernpfade** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Lernpfade" data-size="line"> auf der Kurs-Startseite
2. Klicken Sie auf **Lernpfad erstellen**
3. Geben Sie einen **Titel** und eine optionale Beschreibung ein
4. Speichern Sie – Sie werden zum Lernpfad-Editor weitergeleitet

## Der Lernpfad-Editor

![Der Lernpfad-Editor mit dem Elementbaum auf der linken Seite und der Inhaltsvorschau auf der rechten Seite](/.gitbook/assets/learning-path-editor.png)

Der Editor hat zwei Hauptbereiche:

* **Linkes Panel** – Die Liste der Elemente (Schritte) im Lernpfad, dargestellt als Baumstruktur
* **Rechtes Panel** – Der Inhalt des ausgewählten Elements

### Elemente hinzufügen

Klicken Sie auf **Element hinzufügen** und wählen Sie aus, was Sie hinzufügen möchten:

| Elementtyp | Beschreibung |
|------------|--------------|
| **Abschnitt** | Eine Überschrift, die verwandte Elemente gruppiert (wie ein Kapitelüberschrift). Abschnitte enthalten selbst keinen Inhalt. |
| **Dokument** | Eine Datei oder Webseite aus dem Dokumenten-Werkzeug Ihres Kurses |
| **Übung** | Ein Quiz oder Test aus dem Übungen-Werkzeug |
| **Link** | Eine externe URL |
| **Aufgabe** | Eine Veröffentlichung von Studierenden aus dem Aufgaben-Werkzeug |
| **Forum** | Ein Link zu einem Kursforum |
| **Umfrage** | Ein Link zu einer Umfrage |
| **Zertifikat** | Eine spezielle Seite, um die Erstellung eines Abschlusszertifikats oder die Vergabe von Fähigkeiten auszulösen |

### Elemente organisieren

* **Ziehen und Ablegen**, um Elemente neu zu ordnen
* **Elemente verschachteln** unter Abschnitten, indem Sie sie nach rechts ziehen
* **Löschen** Sie Elemente, die Sie nicht mehr benötigen

### Voraussetzungen festlegen

Voraussetzungen stellen sicher, dass Lernende bestimmte Schritte abschließen, bevor sie auf andere zugreifen können:

1. Wählen Sie ein Element im Lernpfad aus
2. Öffnen Sie die **Voraussetzungen**-Einstellungen
3. Wählen Sie aus, welche vorhergehenden Elemente zuerst abgeschlossen werden müssen
4. Bei Übungen können Sie eine **Mindestpunktzahl** festlegen (z. B. „Muss mindestens 70 % bei Quiz 1 erreichen, bevor Modul 2 freigeschaltet wird“)

## Lernerfahrung

Wenn ein Lernender einen Lernpfad öffnet:

* Sie sehen die Liste der Elemente im linken Panel
* Abgeschlossene Elemente sind mit einem Häkchen markiert
* Elemente mit nicht erfüllten Voraussetzungen sind gesperrt
* Der Fortschritt wird automatisch verfolgt – wenn ein Lernender den Kurs verlässt und zurückkehrt, setzt er dort fort, wo er aufgehört hat
* Eine Fortschrittsleiste zeigt den Gesamtabschlussprozentsatz an

## SCORM-Inhalte

Das Lernpfad-Werkzeug von Chamilo kann **SCORM 1.2**-Pakete importieren – den am weitesten verbreiteten E-Learning-Standard. Laden Sie eine SCORM-ZIP-Datei hoch, und Chamilo erstellt daraus einen Lernpfad, der Fortschritt und Punktzahlen gemäß der SCORM-Spezifikation verfolgt.

Um ein SCORM-Paket zu importieren:

1. Öffnen Sie im Lernpfad-Werkzeug das Aktionsmenü und klicken Sie auf **Hochladen**
2. Laden Sie die ZIP-Datei hoch
3. Chamilo entpackt und erstellt den Lernpfad automatisch

### CMI5 / xAPI-Pakete

CMI5-Pakete (der moderne, auf xAPI basierende Nachfolger von SCORM) werden über das **XApi**-Plugin unterstützt. Sobald das Plugin von Ihrem Administrator aktiviert wurde, können Sie ein CMI5-Paket importieren, und Lernende können es vom Kurs aus starten; ihre Aussagen werden an den konfigurierten Learning Record Store weitergeleitet.

## Lernpfad-Einstellungen

Konfigurieren Sie, wie sich der Lernpfad verhält:

| Einstellung | Beschreibung |
|-------------|--------------|
| **Sichtbarkeit** | Den Lernpfad für Lernende ausblenden oder anzeigen |
| **Voraussetzungen** | Den Abschluss anderer Lernpfade vor diesem verlangen |
| **Automatischer Start** | Diesen Lernpfad automatisch öffnen, wenn Lernende den Kurs betreten |
| **Akkumulierte SCORM-Zeit** | Ob die Zeit über mehrere Sitzungen hinweg akkumuliert werden soll |

## Verknüpfung mit dem Notenbuch

Sie können den Abschluss eines Lernpfads als bewertete Aktivität im Notenbuch einbeziehen. Dies ermöglicht es, dass der Fortschritt im Lernpfad zur Gesamtnote des Lernenden im Kurs und zur Berechtigung für Zertifikate beiträgt.

---
## Verwendung von KI

Wenn der Administrator die KI-unterstützte Generierung von Lernpfaden aktiviert hat, finden Sie eine Option für den KI-Generator im Dropdown-Menü der Aktionen. Geben Sie der KI einen möglichst präzisen Kontext für Ihren gewünschten Lernpfad, legen Sie die Anzahl der Seiten und die ungefähre Anzahl von Wörtern pro Seite fest und geben Sie an, ob Sie den Lernpfad mit Tests füllen und starten möchten. Einige Minuten später haben Sie einen vollständigen, textbasierten Lernpfad vor sich.

Bearbeiten Sie die Dokumente, um mit weiterer KI-Unterstützung Illustrationen zu generieren, und Sie müssen nur noch einige Überprüfungen vornehmen, bevor Sie den Lernpfad mit Ihren Lernenden teilen können.

## Tipps

* **Beginnen Sie mit einem Entwurf** — Planen Sie Ihre Abschnitte und Elemente, bevor Sie den Lernpfad erstellen
* **Verwenden Sie Abschnitte als Kapitel** — Gruppieren Sie verwandte Elemente unter Abschnittsüberschriften zur besseren Übersichtlichkeit
* **Legen Sie Voraussetzungen für Bewertungen fest** — Fordern Sie die Lernenden auf, den Inhalt zu studieren, bevor sie ein Quiz absolvieren
* **Mischen Sie Inhaltstypen** — Kombinieren Sie Lesematerialien, Videos, interaktive Übungen und externe Ressourcen für ein ansprechendes Lernerlebnis
* **Überprüfen Sie die Lernendenansicht** — Nutzen Sie die Funktion „Studentenansicht“, um den Lernpfad aus der Perspektive eines Lernenden zu erleben
* **Verwenden Sie SCORM für Interaktivität** — Wenn Sie Zugriff auf SCORM-Authoring-Tools (wie Articulate, iSpring oder ähnliche) haben, erstellen Sie umfangreiche interaktive Inhalte und importieren Sie diese in Chamilo