# Dateiintegrität

*Neu in Chamilo 3.0.*

Die Dateiintegrität vergleicht die auf Ihrem Server installierten Dateien mit einer vertrauenswürdigen Baseline, um Hinzufügungen, Änderungen, Löschungen und Berechtigungsänderungen zu erkennen, die Sie nicht erwartet haben — die Art von Änderung, die ein erfolgreicher Einbruch, eine kompromittierte Abhängigkeit oder eine versehentliche manuelle Bearbeitung hinterlassen würde.

## Zugriff auf die Dateiintegrität

Klicken Sie im Administrationsbereich auf **Sicherheit > Dateiintegrität**.

## Was angezeigt wird

![Die Seite Dateiintegrität mit Informationen zum letzten Scan, Bereichen für hinzugefügte, geänderte, gelöschte Dateien und Dateien mit geänderten Berechtigungen, einer Liste der Alarmhistorie sowie Aktionen zum Ausführen eines Scans, Pausieren von Alarmen oder Festlegen einer neuen Baseline](/.gitbook/assets/admin-security-file-integrity.png)

* **Letzter Scan** — Wann der letzte Scan ausgeführt wurde und wie viele Dateien geprüft wurden
* **Hinzugefügt / Geändert / Gelöscht** — Dateien, die von der Baseline abweichen, ermittelt durch Vergleich von SHA-256-Prüfsummen (jede Liste ist auf 500 Pfade begrenzt, mit einem Hinweis, falls die vollständige Liste länger ist — siehe das CEF-Protokoll unten für die vollständige Liste)
* **Berechtigungen geändert** — Dateien, deren Berechtigungen von der Baseline abweichen. Unter Linux werden POSIX-Modusbits direkt verglichen (beispielsweise wird eine Datei, die weltweit beschreibbar wird, gekennzeichnet); unter Windows wird nur das schreibgeschützte Attribut verfolgt, da `fileperms()` die tatsächlichen NTFS-ACLs nicht widerspiegelt
* **Alarmhistorie** — Ein dauerhaftes, nur anhängendes Protokoll jedes Scans, der etwas gefunden hat (bis zu den letzten 50). Im Gegensatz zum Bericht oben wird diese Liste niemals durch einen sauberen Scan oder eine neue Baseline gelöscht, sodass frühere Alarme sichtbar bleiben, auch nachdem die gemeldete Abweichung behoben wurde

Die Prüfung durchläuft den gesamten installierten Dateibaum mit Ausnahme der Verzeichnisse `var/` und `.git/` — mit einer Ausnahme: `.git/config` wird weiterhin einzeln überwacht, speziell um zu erkennen, wenn ein Git-Remote stillschweigend auf einen feindlichen Server umgestellt wird. Symbolische Links werden niemals verfolgt, um Traversierungsschleifen oder das Verlassen des Installationsverzeichnisses zu vermeiden.

Da ein vollständiger Scan einer großen Installation mehrere Minuten dauern kann, wird der Durchlauf in Abschnitten ausgeführt (jeweils ein Verzeichnis der obersten Ebene) und der Fortschritt in einer Sperrdatei festgehalten — sodass die Seite sicher neu geladen werden kann, um den Fortschritt zu prüfen, und ein abgestürzter oder abgebrochener Scan niemals mit einem noch laufenden verwechselt wird.

## Aktionen

* **Jetzt scannen** — Vergleicht den aktuellen Dateibaum sofort mit der Baseline
* **1 Stunde pausieren** — Setzt die Alarmierung vorübergehend aus (beispielsweise während Sie ein Update einspielen). Erfordert die erneute Eingabe Ihres eigenen Passworts. Während der Pause übernimmt ein Scan stillschweigend den aktuellen Baum als neue Baseline, statt zu alarmieren, sodass das Pausefenster ohne verbleibende Alarme schließt. Die maximale Pause beträgt 24 Stunden
* **Neue Baseline festlegen** — Übernimmt den aktuellen Dateibaum als neue vertrauenswürdige Referenz. Erfordert die erneute Eingabe Ihres eigenen Passworts

Das Pausieren von Alarmen oder das Festlegen einer neuen Baseline kann einen laufenden Einbruch verbergen, weshalb beides erneut Ihr Passwort erfordert — eine übernommene Administratorsitzung allein reicht nicht aus, um die Erkennung stummzuschalten, während Dateien manipuliert werden.

## Ausführung per Cron

Dieselben Prüfungen stehen als Konsolenbefehle zur Verfügung und sind dafür gedacht, per Cron geplant zu werden, statt von der Administrationsseite aus zeitgesteuert ausgeführt zu werden:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Wenn eine Pause aktiv ist, setzt `app:file-integrity:scan` die Baseline stillschweigend neu, statt zu alarmieren, entsprechend dem Verhalten eines von der Administrationsseite ausgelösten Scans.

## Einstellungen

Eine zugehörige Einstellung befindet sich unter **Konfigurationseinstellungen > Sicherheit**:

* **`file_integrity_check_notify_admins`** — Eine Liste von E-Mail-Adressen, die benachrichtigt werden, wenn Abweichungen gefunden werden; bleibt sie leer, wird jeder globale Administrator benachrichtigt

## SIEM-Integration

Jeder Scan schreibt außerdem CEF-Protokollzeilen (Common Event Format) nach `var/logs/security/file_integrity.log`, geeignet zur Übernahme durch ein SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat und vergleichbare Werkzeuge). Jede Zeile ist mit einer Signatur-ID versehen, die die Art der Änderung kennzeichnet:

| Signatur | Bedeutung |
|-----------|---------|
| `FIM-ADDED` | Eine neue Datei ist erschienen |
| `FIM-MODIFIED` | Der Inhalt einer Datei hat sich geändert |
| `FIM-DELETED` | Eine Datei ist verschwunden |
| `FIM-GITCONFIG` | `.git/config` hat sich geändert (möglicherweise übernommener Remote) |
| `FIM-PERMS` | Die Berechtigungen einer Datei haben sich geändert |
| `FIM-TRUNCATED` | Der Bericht für eine Kategorie wurde begrenzt; das Protokoll enthält die vollständige Liste |

## Empfohlene Verwendung

1. Erstellen Sie unmittelbar nach der Installation eine Baseline und erneut nach jedem manuellen Update oder Deployment
2. Planen Sie `app:file-integrity:scan` per Cron (beispielsweise nächtlich)
3. Vor einem geplanten Wartungsfenster, das Dateien ändert (ein Update, eine Migration), verwenden Sie **Pause for 1 hour**, anstatt den Cron-Job vollständig zu entfernen
4. Leiten Sie `var/logs/security/file_integrity.log` in Ihre vorhandene Protokollüberwachung oder Ihr SIEM ein, sofern vorhanden