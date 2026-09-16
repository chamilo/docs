# xAPI

**xAPI** (Experience API, auch bekannt als Tin Can API) ist ein Standard zur Erfassung von Lernerfahrungen. Chamilo kann xAPI-Statements sowohl erzeugen als auch verarbeiten.

## Was xAPI leistet

xAPI erfasst Lernaktivitäten als **Statements** im Format: „Akteur hat Verb an Objekt ausgeführt.“ Zum Beispiel:

* „Jane hat Modul 1 abgeschlossen“
* „John hat 85 % in der Abschlussprüfung erreicht“
* „Maria hat das Einführungsvideo angesehen“

Diese Statements werden in einem **Learning Record Store (LRS)** gespeichert und liefern ein umfassendes Protokoll der Lernaktivitäten.

## Konfiguration

1. Konfigurieren Sie in den Plattformeinstellungen den **LRS-Endpunkt**:
   * **LRS URL** — Die Adresse Ihres Learning Record Store
   * **LRS authentication** — Zugangsdaten für das Senden von Daten an den LRS
2. Aktivieren Sie die xAPI-Erfassung für die gewünschten Aktivitäten

## Was Chamilo über xAPI erfasst

Chamilo kann xAPI-Statements erzeugen für:

* Kurszugriff und Kursabschluss
* Übungsversuche und Punktzahlen
* Fortschritt bei Lernpfad-Elementen
* Portfolio-Elemente

Andere Werkzeuge (etwa Dokumente und Foren) werden vom Plugin derzeit nicht als xAPI-Ereignisse ausgegeben.

## Anwendungsfälle

* **Plattformübergreifende Erfassung** — Lernaktivitäten über mehrere Werkzeuge und Plattformen hinweg in einem einzigen LRS erfassen
* **Erweiterte Analytik** — LRS-Analysetools nutzen, um Erkenntnisse zu gewinnen, die über die integrierte Berichterstattung von Chamilo hinausgehen
* **Compliance-Berichte** — Prüfprotokolle zum Abschluss von Schulungen für regulatorische Anforderungen erstellen