# Archivbereinigung

Im Laufe der Zeit sammelt Chamilo temporäre Dateien in seinen Cache- und Archivverzeichnissen an. Regelmäßige Bereinigung verhindert Probleme mit dem Speicherplatz.

## Was bereinigt werden kann

* **Temporäre Upload-Dateien** — Dateien, die bei Export, Import und anderen Vorgängen erzeugt werden, sowie veraltete Build-Dateien des Legacy-Frontends
* **Symfony-Anwendungscache** — Kompilierter Container, zwischengespeicherte Konfiguration und Routing-Daten. Dies wird *nicht* von der unten beschriebenen Aktion im Administrationsbereich abgedeckt — siehe [Über die Kommandozeile](#from-the-command-line).
* **Sitzungsdaten** — Abgelaufene PHP-Sitzungsdateien
* **Protokolldateien** — Alte Protokolldateien, die nicht mehr benötigt werden

## Bereinigung durchführen

### Über den Administrationsbereich

Navigieren Sie im Administrationsbereich zu **System > Temporäre Dateien bereinigen** (siehe [Systemwerkzeuge](../system/system-tools.md#clean-temporary-files)). Es wird angezeigt, wie viele temporäre Dateien vorhanden sind und wie viel Speicherplatz sie belegen; anschließend können Sie alles oder nur Dateien löschen, die älter als ein gewähltes Alter sind, mit einer Vorschau im Dry-Run. Außerdem werden veraltete Legacy-Build-Dateien entfernt und kompilierte CSS-Assets neu erzeugt.

Diese Aktion schließt bewusst die eigenen Cache-Verzeichnisse von Symfony aus (`var/cache/dev`, `var/cache/prod`, `var/cache/test` und Cache-Pools), sodass eine Änderung an `.env` oder `config/` dadurch nicht wirksam wird — verwenden Sie dafür die Kommandozeile.

### Über die Kommandozeile

Für mehr Kontrolle und um den Symfony-Anwendungscache tatsächlich zu leeren, verwenden Sie Symfony-Konsolenbefehle:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tipps

* **Regelmäßige Bereinigungen planen** — Richten Sie einen wöchentlichen oder monatlichen Cron-Job ein, um temporäre Dateien zu löschen
* **Speicherplatz überwachen** — Behalten Sie die Größe des Verzeichnisses `var/` im Blick, da es mit Cache- und Protokolldateien wächst
* **Vorsicht bei Protokollen** — Prüfen Sie vor dem Löschen von Protokolldateien, ob sie Informationen enthalten, die Sie für die Fehlersuche benötigen könnten