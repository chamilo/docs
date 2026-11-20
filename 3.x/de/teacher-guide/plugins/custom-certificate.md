# Individuelles Zertifikat

Das Plugin Individuelles Zertifikat <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Individuelles Zertifikat" data-size="line"> ermöglicht es, das standardmäßige [Notenbuch-Zertifikat](../assessing-learners/gradebook.md) durch ein eigenes Design zu ersetzen — Logos, ein Siegel, bis zu vier Unterschriftsbilder mit Beschriftungen, ein Hintergrundbild, Ränder sowie Inhalte, die aus Platzhalter-Tags aufgebaut werden.

## Für Ihren Kurs aktivieren

Nachdem Ihre Administration das Plugin aktiviert und eine Standardvorlage festgelegt hat, schalten Sie es pro Kurs unter **Kurseinstellungen** ein:

* **Individuelles Zertifikat im Kurs aktivieren** — Aktiviert die Funktion für diesen Kurs
* **Standardmäßiges individuelles Zertifikat verwenden** — Verwendet die Standardvorlage der Plattform, anstatt ein eigenes Design zu erstellen (diese beiden Optionen schließen sich gegenseitig aus; Chamilo warnt Sie, wenn Sie versuchen, beide zu aktivieren)

Dadurch steht in Ihrem Kurs das Werkzeug **Zertifikatseinstellung** zur Verfügung, in dem Sie die Vorlage gestalten oder bearbeiten.

## Das Zertifikat gestalten

Der Zertifikateditor verwendet Tags, die beim Erzeugen des Zertifikats einer lernenden Person durch echte Daten ersetzt werden, zum Beispiel `((user_firstname))`, `((course_title))`, `((gradebook_grade))` und `((date_certificate))`. Über den Inhalt hinaus können Sie Folgendes festlegen:

* Bis zu drei Logos, ein Siegelbild und ein Hintergrundbild
* Bis zu vier Unterschriftsbilder, jeweils mit eigener Beschriftung
* Ränder sowie das auf dem Zertifikat angezeigte Ausstellungsdatum und den Ausstellungsort

Verwenden Sie **Zertifikat**, um Ihr Design in der Vorschau anzuzeigen, oder **Zertifikat löschen**, um die individuelle Vorlage eines Kurses zu entfernen.

## Tipps

* **Lernende sehen keinen Unterschied** — Sie laden ihr Zertifikat weiterhin auf dem üblichen Weg aus dem Notenbuch herunter; es verwendet lediglich Ihre Vorlage
* **Vor der Nutzung in der Vorschau prüfen** — Prüfen Sie die Vorschau mit echten Platzhalterdaten, um Layoutprobleme zu erkennen, bevor Lernende Zertifikate erzeugen
* **Mit Ihrer Administration abstimmen** — Wenn Sie eine plattformweite Standardvorlage anstelle einer einmaligen Vorlage pro Kurs wünschen, wird diese zuerst von Ihrer Administration eingerichtet