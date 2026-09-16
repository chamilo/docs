# Bewertungen

Die Bewertungen (früher *gradebook*) fassen Punktzahlen aus Tests, Aufgaben und anderen benoteten Aktivitäten in einer einheitlichen Übersicht der Leistung jedes Lernenden zusammen. Sie steuern außerdem die Zertifikatsvergabe.

## Funktionsweise der Bewertungen

Die Bewertungen sind gewichtete Punktesysteme. Sie legen fest:

1. **Welche Aktivitäten** in die Note einfließen (Tests, Aufgaben, Anwesenheit usw.)
2. **Das Gewicht** jeder Aktivität (wie stark sie in die Endnote eingeht)
3. **Die Mindestpunktzahl für das Zertifikat** (die Schwelle zum Erwerb eines Zertifikats)
4. **Eine Mindestpunktzahl pro Aktivität** — Jede Aktivität im Notenbuch kann eine eigene **Mindestpunktzahl** haben. Lernende, die bei einer zentralen Aktivität unter dieser Mindestpunktzahl bleiben, können am Erreichen der Ziele und am Erwerb des Zertifikats gehindert werden, selbst wenn ihre gewichtete Gesamtpunktzahl ansonsten ausreichen würde.

Aktivitäten können von 2 Typen sein:
* **Präsenzaktivität** (oder Aktivität vor Ort), bei der Noten aus einer anderen Quelle importiert werden müssen
* **Online-Aktivität**, die aus dem Kurs ausgewählt wird, wobei die Noten durch das Absolvieren der Aktivität im Kurs entstehen

Chamilo berechnet die Gesamtnote jedes Lernenden auf Grundlage dieser Gewichte.

## Einrichten der Bewertung

1. Öffnen Sie das Werkzeug **Bewertungen** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> auf der Kursstartseite
2. Sie sehen die Bewertungsübersicht, die zunächst leer ist

### Aktivitäten hinzufügen

1. Klicken Sie auf **Online-Aktivität hinzufügen**
2. Wählen Sie den Typ:
   * **Test** — Eine bestimmte Übung aus dem Kurs verknüpfen
   * **Aufgabe** — Einen Ordner für Studierendenveröffentlichungen verknüpfen
   * **Lernpfad** — Den Abschluss eines Lernpfads verknüpfen
   * **Anwesenheit** — Eine Anwesenheitsliste verknüpfen
   * **Forumsbeitrag** — Einen Forumsbeitrag verknüpfen (der manuell benotet werden muss)
   * **Umfrage** — Eine Umfrage verknüpfen
3. Wählen Sie die konkrete Aktivität innerhalb des gewählten Typs
4. Legen Sie das **Gewicht** für diese Aktivität fest (z. B. 30 % für die Zwischenprüfung, 40 % für das Abschlussprojekt)
5. Legen Sie bei Bedarf die **Mindestpunktzahl** fest
6. Speichern

Die Summe der Gewichte aller Aktivitäten sollte 100 % ergeben.

### Unterkategorien

Für komplexe Bewertungsschemata können Sie **Unterkategorien** anlegen, um zusammengehörige Aktivitäten zu gruppieren:

* **Beispiel**: Eine Unterkategorie „Hausaufgaben“ (Gewicht: 30 %), die fünf einzelne Aufgaben enthält, die jeweils 20 % der Unterkategorie ausmachen
* Unterkategorien ermöglichen eine hierarchische Organisation der Bewertung, während die Gesamtrechnung einfach bleibt

## Noten anzeigen

![Die Übersichtstabelle des Notenbuchs mit Namen der Lernenden, Aktivitätspunktzahlen und gewichteten Gesamtwerten](/.gitbook/assets/gradebook-overview.png)

Die Bewertung zeigt eine Tabelle mit:

* dem Namen jedes Lernenden
* Punktzahlen für jede Aktivität
* dem gewichteten Gesamtwert
* der Angabe, ob der Lernende für ein Zertifikat qualifiziert ist

Sie können nach jeder Spalte sortieren, um schnell Spitzenleistungen oder Lernende mit Schwierigkeiten zu erkennen.

### Diagramme zur Punkteverteilung

Unterhalb der Tabelle und auf der Seite **Grafische Ansicht** zeichnet die Bewertung ein Balkendiagramm pro Aktivität sowie eines für die Gesamtpunktzahl. Jedes Diagramm ist ein Säulendiagramm: Die horizontale Achse listet Ihre Punktebereiche vom niedrigsten zum höchsten, und die Höhe jeder Säule entspricht der Anzahl der Lernenden in diesem Bereich.

Das Diagramm **Gesamt** markiert außerdem den Klassendurchschnitt. Ein roter Punkt sitzt auf dem Bereich, der den Durchschnitt enthält, und die Legende gibt den genauen Prozentsatz an.

Diese Diagramme erscheinen nur, wenn die Regeln zur Punkteanzeige festgelegt sind. Wenn Sie die Meldung *To view graph score rule must be enabled* sehen, definieren Sie zuerst Ihre Bereiche in den Bewertungseinstellungen.

## Zertifikate

So aktivieren Sie die Zertifikatsvergabe:

1. Legen Sie in den Bewertungseinstellungen eine **Mindestpunktzahl für das Zertifikat** fest (z. B. 70 %)
2. Wenn die gewichtete Gesamtpunktzahl eines Lernenden diese Schwelle erreicht oder überschreitet (und er keine aktivitätsspezifische Mindestpunktzahl verfehlt hat), kann er sein Zertifikat herunterladen
3. Das Zertifikat wird aus einer Vorlage erzeugt, die der Plattformadministrator konfiguriert hat

Sobald **Zertifikate erzeugen** in der Stammkategorie aktiviert ist, erscheint das Feld **Gültigkeit des Zertifikats (Tage)**. Lassen Sie es auf `0` für Zertifikate, die nie ablaufen, oder setzen Sie eine Anzahl von Tagen, nach denen das Zertifikat abläuft — Chamilo kann Lernende dann an das nahende Ablaufdatum erinnern, entweder automatisch (Cron, vom Administrator konfiguriert) oder manuell aus der Zertifikatsliste.

![Der Dialog zum Bearbeiten der Kategorie mit aktivierter Option Zertifikate erzeugen und dem Feld Gültigkeit des Zertifikats (Tage) auf 365 gesetzt](/.gitbook/assets/gradebook-certificate-validity-field.png)

Weitere Einzelheiten finden Sie unter [Zertifikate und Kompetenzen](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).

## Verknüpfung mit Kompetenzen

Sie können der Bewertung **Kompetenzen** (*skills*) zuordnen. Wenn ein Lernender die festgelegten Ziele zum Abschluss der Bewertung erreicht, kann er ein Zertifikat, eine Kompetenz oder beides erhalten. Kompetenzen sind in seinem Profil im sozialen Netzwerk sichtbar. So entsteht im Laufe der Zeit ein Kompetenznachweis.

## Noten exportieren

Klicken Sie auf die Schaltfläche **Exportieren** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exportieren" data-size="line">, um Noten als Tabellenkalkulation herunterzuladen. Dies ist nützlich für:

* den Austausch von Noten mit Verwaltungssystemen
* zusätzliche Analysen außerhalb von Chamilo
* die Aufbewahrung offline verfügbarer Aufzeichnungen

## Tipps

* **Gewichte frühzeitig planen** — Definieren Sie das Bewertungsschema zu Beginn des Kurses, damit Lernende wissen, was sie erwartet
* **Unterkategorien für komplexe Kurse nutzen** — Gruppieren Sie Aufgaben, Tests und Mitarbeit in klaren Kategorien
* **Sinnvolle Bestehensschwellen festlegen** — Die Zertifizierungsnote sollte tatsächliche Kompetenz widerspiegeln, nicht nur die Teilnahme
* **Regelmäßig prüfen** — Überprüfen Sie das Notenbuch regelmäßig, um sicherzustellen, dass alle Aktivitäten korrekt verknüpft sind und Ergebnisse erfasst werden