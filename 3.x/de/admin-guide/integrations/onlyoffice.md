# OnlyOffice

Die Integration von **OnlyOffice** ermöglicht es Benutzern, Dokumente (Word, Excel, PowerPoint) direkt im Browser innerhalb von Chamilo zu bearbeiten, ohne sie herunterzuladen.

## Was OnlyOffice bietet

* **Dokumentbearbeitung** — .docx-, .xlsx- und .pptx-Dateien im Browser bearbeiten
* **Formatkompatibilität** — Vollständige Kompatibilität mit Microsoft-Office-Formaten
* **Keine Desktop-Software erforderlich** — Alles läuft im Browser

> Die Echtzeit-Zusammenarbeit hängt vom OnlyOffice Document Server selbst ab; das Plugin von Chamilo öffnet und speichert Dokumente über den Server, fügt diese Funktion jedoch weder hinzu noch schränkt es sie ein.

## Konfiguration

1. Installieren Sie **OnlyOffice Document Server** auf Ihrem Server (oder nutzen Sie den Cloud-Dienst von OnlyOffice)
2. Konfigurieren Sie in den Plattformeinstellungen von Chamilo:
   * **OnlyOffice Document Server URL** — Die Adresse Ihres OnlyOffice-Servers
   * **Secret key** — Für die sichere Kommunikation zwischen Chamilo und OnlyOffice
3. Aktivieren Sie die Integration

## Funktionsweise

Nach der Konfiguration sehen Benutzer beim Anzeigen unterstützter Dokumenttypen im Dokumentenwerkzeug die Option **Mit OnlyOffice bearbeiten**. Ein Klick darauf öffnet das Dokument im OnlyOffice-Editor innerhalb der Chamilo-Oberfläche.

Änderungen werden automatisch wieder im Dokumentenspeicher von Chamilo gespeichert.

## Aktualisierung der Dokumentversion und Speichervorgänge

Wenn der Dokumentenserver signalisiert, dass eine neuere gespeicherte Version verfügbar ist, kann der Editor von Chamilo eine aktualisierte **signierte Dokumentkonfiguration** anfordern und die Dateiaktualisierungsfunktion von OnlyOffice nutzen, ohne dass der Benutzer ein anderes Dokument öffnen muss. Chamilo prüft, dass die aktualisierte Konfiguration zum selben Dokument gehört, bevor der Editor auf die neue Version umschaltet.

Ein **Force-Save**, während die Bearbeitung noch läuft, erhöht den Dokumentversions-Schlüssel nicht. Der Callback des endgültigen Speicherns aktualisiert die Metadaten des gespeicherten Dokuments, sodass beim nächsten Öffnen die abgeschlossene Version verwendet werden kann. Diese Unterscheidung verhindert, dass ein laufender Speichervorgang als eigene Dokumentversion behandelt wird.

Schlägt eine Aktualisierung fehl, prüfen Sie, ob OnlyOffice Document Server die Datei- und Callback-URLs von Chamilo erreichen kann, und kontrollieren Sie die Editor- bzw. Serverprotokolle. Öffnen Sie das Dokument erst erneut, nachdem Sie bestätigt haben, dass die Arbeit gespeichert wurde; eine unterbrochene oder veraltete Editorsitzung ist kein Nachweis dafür, dass die endgültige Version Chamilo erreicht hat.

Dieses Verhalten wurde in [PR #9178](https://github.com/chamilo/chamilo-lms/pull/9178) korrigiert.

## Tipps

* **Separater Server empfohlen** — Wie bei BigBlueButton sollte OnlyOffice Document Server für die beste Leistung auf einem eigenen Server laufen
* **HTTPS erforderlich** — Sowohl Chamilo als auch OnlyOffice sollten über HTTPS bereitgestellt werden, damit die Integration funktioniert
* **Formate prüfen** — OnlyOffice funktioniert am besten mit Office-Formaten (.docx, .xlsx, .pptx). Andere Formate bieten möglicherweise nur eingeschränkte Bearbeitungsunterstützung.