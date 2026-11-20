# Dateiintegrität

*Neu in Chamilo 3.0.*

Die Dateiintegrität vergleicht die auf Ihrem Server installierten Dateien mit einer vertrauenswürdigen Baseline, um unerwartete Hinzufügungen, Änderungen, Löschungen und Berechtigungsänderungen zu erkennen — die Art von Änderung, die ein erfolgreicher Einbruch, eine kompromittierte Abhängigkeit oder eine versehentliche manuelle Bearbeitung hinterlassen würde.

## Zugriff auf die Dateiintegrität

Klicken Sie im Administrationsbereich auf **Sicherheit > Dateiintegrität**.

## Was angezeigt wird

![Die Seite „Dateiintegrität“ mit Informationen zum letzten Scan, Bereichen für hinzugefügte, geänderte, gelöschte und in den Berechtigungen geänderte Dateien, einer Liste der Alarmhistorie sowie Aktionen zum Ausführen eines Scans, Pausieren von Alarmen oder Festlegen einer neuen Baseline](../../.gitbook/assets/admin-security-file-integrity.png)

* **Letzter Scan** — Wann der letzte Scan ausgeführt wurde und wie viele Dateien er geprüft hat
* **Hinzugefügt / Geändert / Gelöscht** — Dateien, die von der Baseline abweichen, ermittelt durch den Vergleich von SHA-256-Prüfsummen (jede Liste ist auf 500 Pfade begrenzt, mit einem Hinweis, falls die vollständige Liste länger ist — die vollständige Liste finden Sie im CEF-Protokoll unten)
* **Berechtigungen geändert** — Dateien, deren Berechtigungen von der Baseline abweichen. Unter Linux werden die POSIX-Modusbits direkt verglichen (beispielsweise wird eine Datei markiert, die für alle beschreibbar wird); unter Windows wird nur das Schreibschutzattribut verfolgt, da `fileperms()` keine echten NTFS-ACLs abbildet
* **Alarmhistorie** — Ein dauerhaftes, nur zum Anhängen bestimmtes Protokoll jedes Scans, der etwas gefunden hat (bis zu den letzten 50). Im Gegensatz zum obigen Bericht wird diese Liste weder durch einen sauberen Scan noch durch eine neue Baseline geleert, sodass vergangene Alarme sichtbar bleiben, auch nachdem die gemeldete Abweichung behoben wurde

Die Prüfung durchläuft den gesamten installierten Dateibaum mit Ausnahme der Verzeichnisse `var/` und `.git/` — mit einer Ausnahme: `.git/config` wird weiterhin einzeln überwacht, insbesondere um zu erkennen, wenn ein Git-Remote stillschweigend auf einen feindlichen Server umgeleitet wird. Symbolische Links werden niemals verfolgt, um Traversalschleifen oder das Verlassen des Installationsverzeichnisses zu vermeiden.

Da ein vollständiger Scan einer großen Installation mehrere Minuten dauern kann, erfolgt der Durchlauf in Abschnitten (jeweils ein Verzeichnis der obersten Ebene), und der Fortschritt wird in einer Sperrdatei festgehalten — sodass die Seite gefahrlos neu geladen werden kann, um den Fortschritt zu prüfen, und ein abgestürzter oder abgebrochener Scan niemals mit einem noch laufenden verwechselt wird.

## Aktionen

* **Jetzt einen Scan ausführen** — Vergleicht den aktuellen Dateibaum sofort mit der Baseline
* **Für 1 Stunde pausieren** — Setzt die Alarmierung vorübergehend aus (beispielsweise während Sie ein Update bereitstellen). Erfordert die erneute Eingabe Ihres eigenen Passworts. Während der Pause übernimmt ein Scan stillschweigend den aktuellen Baum als neue Baseline, anstatt zu alarmieren, sodass das Pausefenster ohne verbleibende Alarme endet. Die maximale Pause beträgt 24 Stunden
* **Neue Baseline festlegen** — Übernimmt den aktuellen Dateibaum als neue vertrauenswürdige Referenz. Erfordert die erneute Eingabe Ihres eigenen Passworts

Das Pausieren von Alarmen oder das Festlegen einer neuen Baseline kann einen laufenden Einbruch verbergen, weshalb beide Aktionen erneut Ihr Passwort erfordern — eine übernommene Administratorsitzung allein reicht nicht aus, um die Erkennung zum Schweigen zu bringen, während Dateien manipuliert werden.

## Ausführung über Cron

Dieselben Prüfungen stehen als Konsolenbefehle zur Verfügung und sind dafür vorgesehen, mit Cron geplant zu werden, anstatt nach einem Zeitplan von der Administrationsseite aus ausgeführt zu werden:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Wenn eine Pause aktiv ist, legt `app:file-integrity:scan` stillschweigend eine neue Baseline fest, anstatt zu alarmieren, entsprechend dem Verhalten eines von der Administrationsseite ausgelösten Scans.

## Einstellungen

Eine zugehörige Einstellung befindet sich unter **Konfigurationseinstellungen > Sicherheit**:

* **`file_integrity_check_notify_admins`** — Eine Liste von E-Mail-Adressen, die benachrichtigt werden, wenn eine Abweichung festgestellt wird; bleibt sie leer, wird jeder Global Administrator benachrichtigt

## SIEM-Integration

Jeder Scan schreibt außerdem CEF-Protokollzeilen (Common Event Format) nach `var/logs/security/file_integrity.log`, geeignet für die Aufnahme durch ein SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat und ähnliche Werkzeuge). Jede Zeile ist mit einer Signatur-ID gekennzeichnet, die die Art der Änderung identifiziert:

| Signatur | Bedeutung |
|-----------|---------|
| `FIM-ADDED` | Eine neue Datei ist erschienen |
| `FIM-MODIFIED` | Der Inhalt einer Datei hat sich geändert |
| `FIM-DELETED` | Eine Datei ist verschwunden |
| `FIM-GITCONFIG` | `.git/config` hat sich geändert (möglicherweise ein übernommener Remote) |
| `FIM-PERMS` | Die Berechtigungen einer Datei haben sich geändert |
| `FIM-TRUNCATED` | Der Bericht für eine Kategorie wurde begrenzt; die vollständige Liste finden Sie im Protokoll |

## Empfohlene Verwendung

1. Erstellen Sie unmittelbar nach der Installation eine Baseline und erneut nach jedem manuellen Update oder Deployment
2. Planen Sie `app:file-integrity:scan` in cron ein (beispielsweise nächtlich)
3. Verwenden Sie vor einem geplanten Wartungsfenster, das Dateien verändert (ein Update, eine Migration), **Für 1 Stunde pausieren**, anstatt den Cron-Job vollständig zu entfernen
4. Leiten Sie `var/logs/security/file_integrity.log` in Ihre bestehende Protokollüberwachung oder Ihr SIEM ein, sofern Sie eines betreiben