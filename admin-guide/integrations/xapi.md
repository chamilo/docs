# xAPI

**xAPI** (Experience API, auch bekannt als Tin Can API) ist ein Standard zur Verfolgung von Lernerfahrungen. Chamilo kann sowohl xAPI-Statements generieren als auch konsumieren.

## Was xAPI leistet

xAPI verfolgt Lernaktivitäten als **Statements** im Format: "Akteur hat Verb an Objekt ausgeführt." Zum Beispiel:

* "Jane hat Modul 1 abgeschlossen"
* "John hat 85% im Abschlussexamen erreicht"
* "Maria hat das Einführungsvideo angesehen"

Diese Statements werden in einem **Learning Record Store (LRS)** gespeichert und bieten eine umfassende Aufzeichnung der Lernaktivitäten.

## Konfiguration

1. Konfigurieren Sie in den Plattformeinstellungen den **LRS-Endpunkt**:
   * **LRS-URL** — Die Adresse Ihres Learning Record Store
   * **LRS-Authentifizierung** — Zugangsdaten für das Senden von Daten an den LRS
2. Aktivieren Sie die xAPI-Verfolgung für die gewünschten Aktivitäten

## Was Chamilo über xAPI verfolgt

Chamilo kann xAPI-Statements generieren für:

* Kurszugriff und -abschluss
* Übungsversuche und Ergebnisse
* Fortschritt bei Lernpfad-Elementen
* Portfolio-Elemente

Andere Tools (wie Dokumente und Foren) werden derzeit nicht als xAPI-Ereignisse durch das Plugin ausgegeben.

## Anwendungsfälle

* **Plattformübergreifende Verfolgung** — Verfolgen Sie Lernaktivitäten über mehrere Tools und Plattformen hinweg in einem einzigen LRS
* **Erweiterte Analysen** — Nutzen Sie LRS-Analysetools, um Erkenntnisse zu gewinnen, die über die integrierten Berichte von Chamilo hinausgehen
* **Compliance-Berichterstattung** — Erstellen Sie Prüfprotokolle über den Abschluss von Schulungen für regulatorische Anforderungen