# Backups

Regelmäßige Backups sind unerlässlich, um Ihre Chamilo-Daten zu schützen. Diese Seite beschreibt, was gesichert werden sollte und wie.

## What to Back Up

### 1. Database

Die Chamilo-Datenbank enthält alle Plattformdaten: Benutzer, Kurse, Tracking, Noten, Nachrichten und Einstellungen. Dies ist die wichtigste Komponente, die gesichert werden muss.

**How to back up:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Files

Chamilo speichert hochgeladene Dateien (Dokumente, Bilder, SCORM-Pakete) im Dateisystem. Die wichtigsten zu sichernden Verzeichnisse:

* `var/` — Hochgeladene Dateien und Ressourcen
* `public/plugin/` — Plugin-Dateien (nur wenn Sie benutzerdefinierte Plugins hinzugefügt haben)

Wenn Sie Cloud-Speicher (S3, Azure Blob) verwenden, stellen Sie sicher, dass Backup/Versionierung bei Ihrem Cloud-Anbieter aktiviert ist.

### 3. Configuration

* `.env` — Ihre Umgebungskonfiguration
* `config/` — Alle benutzerdefinierten Konfigurationsdateien

## Backup Schedule

| Component | Recommended frequency |
|-----------|---------------------|
| Database | Täglich |
| Files | Täglich oder wöchentlich (abhängig von der Upload-Aktivität) |
| Configuration | Nach jeder Konfigurationsänderung |

## Restoration

So stellen Sie aus einem Backup wieder her:

1. Stellen Sie die Datenbank aus dem SQL-Dump wieder her
2. Stellen Sie die Dateiverzeichnisse wieder her
3. Stellen Sie die Konfigurationsdateien wieder her
4. Leeren Sie den Symfony-Cache: `php bin/console cache:clear`

## Tips

* **Automate backups** — Verwenden Sie Cron-Jobs, um Backups automatisch auszuführen
* **Store off-site** — Bewahren Sie Backup-Kopien auf einem separaten Server oder in Cloud-Speicher auf
* **Test restoration** — Testen Sie regelmäßig, dass Sie erfolgreich aus einem Backup wiederherstellen können
* **Document your process** — Halten Sie schriftliche Anweisungen für den Wiederherstellungsprozess bereit, damit jedes Teammitglied ihn durchführen kann