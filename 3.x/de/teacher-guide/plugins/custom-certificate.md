# Individuelles Zertifikat

Das Plugin Individuelles Zertifikat <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Individuelles Zertifikat" data-size="line"> ermöglicht es, das standardmäßige [Notenbuch-Zertifikat](../assessing-learners/gradebook.md) durch ein eigenes Design zu ersetzen — Logos, ein Siegel, bis zu vier Unterschriftsbilder mit Beschriftungen, ein Hintergrundbild, Ränder sowie Inhalte, die aus Platzhalter-Tags aufgebaut werden.

## Aktivierung für Ihren Kurs

Nachdem Ihre Administration das Plugin aktiviert und eine Standardvorlage festgelegt hat, schalten Sie es pro Kurs unter **Kurseinstellungen** ein:

* **Custom certificate enable in course** — Aktiviert die Funktion für diesen Kurs
* **Use default custom certificate** — Verwendet die Standardvorlage der Plattform, statt ein eigenes Design zu erstellen (diese beiden Optionen schließen sich gegenseitig aus; Chamilo warnt Sie, wenn Sie versuchen, beide zu aktivieren)

Dadurch steht in Ihrem Kurs das Werkzeug **Zertifikatseinstellung** zur Verfügung, mit dem Sie die Vorlage gestalten oder bearbeiten.

## Gestaltung des Zertifikats

Der Zertifikatseditor verwendet Tags, die beim Erzeugen des Zertifikats einer lernenden Person durch echte Daten ersetzt werden, zum Beispiel `((user_firstname))`, `((course_title))`, `((gradebook_grade))` und `((date_certificate))`. Über den Inhalt hinaus können Sie festlegen:

* Bis zu drei Logos, ein Siegelbild und ein Hintergrundbild
* Bis zu vier Unterschriftsbilder, jeweils mit eigener Beschriftung
* Ränder sowie das auf dem Zertifikat angezeigte Ausstellungs-/Expeditionsdatum und den Ort

Verwenden Sie **Zertifikat**, um Ihr Design in der Vorschau anzuzeigen, oder **Zertifikat löschen**, um die individuelle Vorlage eines Kurses zu entfernen.

## Tipps

* **Studierende sehen keinen Unterschied** — Sie laden ihr Zertifikat weiterhin auf dem üblichen Weg aus dem Notenbuch herunter; es verwendet lediglich Ihre Vorlage
* **Vorschau vor dem produktiven Einsatz** — Prüfen Sie die Vorschau mit echten Platzhalterdaten, um Layoutprobleme zu erkennen, bevor Lernende Zertifikate erzeugen
* **Abstimmung mit Ihrer Administration** — Wenn Sie eine plattformweite Standardvorlage statt einer einmaligen Vorlage pro Kurs wünschen, wird diese zuerst von Ihrer Administration eingerichtet