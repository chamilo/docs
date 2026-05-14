# OnlyOffice

Die Integration von **OnlyOffice** ermöglicht es Benutzern, Dokumente (Word, Excel, PowerPoint) direkt im Browser innerhalb von Chamilo zu bearbeiten, ohne sie herunterladen zu müssen.

## Was OnlyOffice bietet

* **Dokumentbearbeitung** — Bearbeiten Sie .docx-, .xlsx- und .pptx-Dateien im Browser
* **Formatkompatibilität** — Volle Kompatibilität mit Microsoft Office-Formaten
* **Keine Desktop-Software erforderlich** — Alles läuft im Browser

> Die Echtzeit-Kollaborationsbearbeitung hängt vom OnlyOffice Document Server selbst ab; das Chamilo-Plugin öffnet und speichert Dokumente über den Server, fügt jedoch keine zusätzlichen Funktionen hinzu oder schränkt diese ein.

## Konfiguration

1. Installieren Sie den **OnlyOffice Document Server** auf Ihrem Server (oder nutzen Sie den OnlyOffice-Cloud-Dienst)
2. Konfigurieren Sie in den Chamilo-Plattformeinstellungen:
   * **OnlyOffice Document Server URL** — Die Adresse Ihres OnlyOffice-Servers
   * **Secret Key** — Für die sichere Kommunikation zwischen Chamilo und OnlyOffice
3. Aktivieren Sie die Integration

## Funktionsweise

Nach der Konfiguration sehen Benutzer die Option **Mit OnlyOffice bearbeiten**, wenn sie unterstützte Dokumenttypen im Dokumenten-Tool anzeigen. Ein Klick darauf öffnet das Dokument im OnlyOffice-Editor innerhalb der Chamilo-Oberfläche.

Änderungen werden automatisch in den Dokumentenspeicher von Chamilo zurückgespeichert.

## Tipps

* **Separater Server empfohlen** — Wie bei BigBlueButton sollte der OnlyOffice Document Server zur optimalen Leistung auf einem eigenen Server laufen
* **HTTPS erforderlich** — Sowohl Chamilo als auch OnlyOffice sollten über HTTPS bereitgestellt werden, damit die Integration funktioniert
* **Formate überprüfen** — OnlyOffice funktioniert am besten mit Office-Formaten (.docx, .xlsx, .pptx). Andere Formate können eingeschränkte Bearbeitungsmöglichkeiten haben.