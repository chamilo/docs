# Backups

Regelmäßige Backups sind unerlässlich, um Ihre Chamilo-Daten zu schützen. Diese Seite behandelt, was gesichert werden sollte und wie dies durchgeführt wird.

## Was sollte gesichert werden?

### 1. Datenbank

Die Chamilo-Datenbank enthält alle Plattformdaten: Benutzer, Kurse, Tracking, Noten, Nachrichten und Einstellungen. Dies ist die wichtigste Komponente, die gesichert werden muss.

**So sichern Sie die Datenbank:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Dateien

Chamilo speichert hochgeladene Dateien (Dokumente, Bilder, SCORM-Pakete) im Dateisystem. Die wichtigsten Verzeichnisse, die gesichert werden sollten:

* `var/` — Hochgeladene Dateien und Ressourcen
* `public/plugin/` — Plugin-Dateien (nur wenn Sie benutzerdefinierte Plugins hinzugefügt haben)

Wenn Sie Cloud-Speicher (S3, Azure Blob) verwenden, stellen Sie sicher, dass die Backup-/Versionierungsfunktion Ihres Cloud-Anbieters aktiviert ist.

### 3. Konfiguration

* `.env` — Ihre Umgebungskonfiguration
* `config/` — Alle benutzerdefinierten Konfigurationsdateien

## Backup-Zeitplan

| Komponente | Empfohlene Häufigkeit |
|------------|-----------------------|
| Datenbank | Täglich |
| Dateien | Täglich oder wöchentlich (je nach Upload-Aktivität) |
| Konfiguration | Nach jeder Konfigurationsänderung |

## Wiederherstellung

Um aus einem Backup wiederherzustellen:

1. Stellen Sie die Datenbank aus dem SQL-Dump wieder her
2. Stellen Sie die Dateiverzeichnisse wieder her
3. Stellen Sie die Konfigurationsdateien wieder her
4. Leeren Sie den Symfony-Cache: `php bin/console cache:clear`

## Tipps

* **Backups automatisieren** — Verwenden Sie Cron-Jobs, um Backups automatisch auszuführen
* **Off-Site speichern** — Bewahren Sie Backup-Kopien auf einem separaten Server oder in einem Cloud-Speicher auf
* **Wiederherstellung testen** — Überprüfen Sie regelmäßig, ob Sie erfolgreich aus einem Backup wiederherstellen können
* **Prozess dokumentieren** — Halten Sie schriftliche Anweisungen für den Wiederherstellungsprozess bereit, damit jedes Teammitglied diesen durchführen kann