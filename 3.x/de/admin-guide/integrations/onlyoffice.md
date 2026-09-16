# OnlyOffice

Die **OnlyOffice**-Integration ermöglicht es Nutzern, Dokumente (Word, Excel, PowerPoint) direkt im Browser innerhalb von Chamilo zu bearbeiten, ohne sie herunterzuladen.

## Was OnlyOffice bereitstellt

* **Dokumentbearbeitung** — Bearbeiten von .docx-, .xlsx- und .pptx-Dateien im Browser
* **Formatkompatibilität** — Volle Kompatibilität mit Microsoft-Office-Formaten
* **Keine Desktop-Software erforderlich** — Alles läuft im Browser

> Die Echtzeit-Zusammenarbeit hängt vom OnlyOffice Document Server selbst ab; das Plugin von Chamilo öffnet und speichert Dokumente über den Server, fügt diese Fähigkeit jedoch weder hinzu noch schränkt sie ein.

## Konfiguration

1. Installieren Sie den **OnlyOffice Document Server** auf Ihrem Server (oder nutzen Sie den OnlyOffice-Cloud-Dienst)
2. Konfigurieren Sie in den Plattformeinstellungen von Chamilo:
   * **OnlyOffice Document Server URL** — Die Adresse Ihres OnlyOffice-Servers
   * **Secret key** — Für die sichere Kommunikation zwischen Chamilo und OnlyOffice
3. Aktivieren Sie die Integration

## Funktionsweise

Nach der Konfiguration sehen Nutzer beim Anzeigen unterstützter Dokumenttypen im Dokumenten-Werkzeug die Option **Mit OnlyOffice bearbeiten**. Ein Klick darauf öffnet das Dokument im OnlyOffice-Editor innerhalb der Chamilo-Oberfläche.

Änderungen werden automatisch im Dokumentenspeicher von Chamilo gespeichert.

## Tipps

* **Separater Server empfohlen** — Wie BigBlueButton sollte der OnlyOffice Document Server für beste Leistung auf einem eigenen Server laufen
* **HTTPS erforderlich** — Sowohl Chamilo als auch OnlyOffice sollten über HTTPS bereitgestellt werden, damit die Integration funktioniert
* **Formate prüfen** — OnlyOffice funktioniert am besten mit Office-Formaten (.docx, .xlsx, .pptx). Andere Formate können nur eingeschränkt bearbeitbar sein.