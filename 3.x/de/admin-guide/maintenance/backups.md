# Datensicherungen

Regelmäßige Sicherungen sind unerlässlich, um Ihre Chamilo-Daten zu schützen. Diese Seite behandelt, was gesichert werden sollte und wie.

## Was gesichert werden sollte

### 1. Datenbank

Die Chamilo-Datenbank enthält alle Plattformdaten: Benutzer, Kurse, Tracking, Noten, Nachrichten und Einstellungen. Dies ist die wichtigste Komponente, die gesichert werden muss.

**So erstellen Sie eine Sicherung:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Dateien

Chamilo speichert hochgeladene Dateien (Dokumente, Bilder, SCORM-Pakete) im Dateisystem. Die wichtigsten zu sichernden Verzeichnisse:

* `var/` — Hochgeladene Dateien und Ressourcen. Es umfasst `var/certificate-issuer/`, den Schlüssel, der Zertifikatsnachweise und [offizielle Transcripts](../users/academic-transcripts.md) signiert: ohne ihn können die bereits ausgestellten Dokumente nicht mehr verifiziert werden
* `public/plugin/` — Plugin-Dateien (nur wenn Sie benutzerdefinierte Plugins hinzugefügt haben)

Wenn Sie Cloud-Speicher (S3, Azure Blob) verwenden, stellen Sie sicher, dass die Sicherungs- bzw. Versionierungsfunktion Ihres Cloud-Anbieters aktiviert ist.

### 3. Konfiguration

* `.env` — Ihre Umgebungskonfiguration
* `config/` — Alle benutzerdefinierten Konfigurationsdateien

## Sicherungsplan

| Komponente | Empfohlene Häufigkeit |
|-----------|---------------------|
| Datenbank | Täglich |
| Dateien | Täglich oder wöchentlich (je nach Upload-Aktivität) |
| Konfiguration | Nach jeder Konfigurationsänderung |

## Wiederherstellung

So stellen Sie aus einer Sicherung wieder her:

1. Stellen Sie die Datenbank aus dem SQL-Dump wieder her
2. Stellen Sie die Dateiverzeichnisse wieder her
3. Stellen Sie die Konfigurationsdateien wieder her
4. Leeren Sie den Symfony-Cache: `php bin/console cache:clear`

## Tipps

* **Sicherungen automatisieren** — Verwenden Sie Cron-Jobs, um Sicherungen automatisch auszuführen
* **Extern speichern** — Bewahren Sie Sicherungskopien auf einem separaten Server oder in einem Cloud-Speicher auf
* **Wiederherstellung testen** — Testen Sie regelmäßig, ob Sie erfolgreich aus einer Sicherung wiederherstellen können
* **Prozess dokumentieren** — Halten Sie schriftliche Anweisungen für den Wiederherstellungsprozess bereit, damit jedes Teammitglied ihn durchführen kann