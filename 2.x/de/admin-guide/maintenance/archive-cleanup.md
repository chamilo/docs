# Archivbereinigung

Im Laufe der Zeit sammelt Chamilo temporäre Dateien in seinen Cache- und Archivverzeichnissen an. Eine regelmäßige Bereinigung verhindert Probleme mit dem Speicherplatz.

## Was kann bereinigt werden

* **Symfony-Cache** — Kompilierte Vorlagen, zwischengespeicherte Konfigurationen und Routing-Daten
* **Temporäre Dateien** — Dateien, die während des Exports, Imports und anderer Operationen generiert werden
* **Sitzungsdaten** — Abgelaufene PHP-Sitzungsdateien
* **Protokolldateien** — Alte Protokolldateien, die nicht mehr benötigt werden

## Durchführung der Bereinigung

### Über das Administrationspanel

Navigieren Sie im Administrationspanel zu **Archivbereinigung**. Klicken Sie auf die Schaltfläche zur Bereinigung, um temporäre Dateien zu entfernen.

### Über die Kommandozeile

Für mehr Kontrolle verwenden Sie Symfony-Konsolenbefehle:

```bash
# Symfony-Cache leeren
php bin/console cache:clear

# Nur den Produktions-Cache leeren
php bin/console cache:clear --env=prod
```

## Tipps

* **Regelmäßige Bereinigungen planen** — Richten Sie einen wöchentlichen oder monatlichen Cron-Job ein, um temporäre Dateien zu löschen
* **Speicherplatzverbrauch überwachen** — Behalten Sie die Größe des Verzeichnisses `var/` im Auge, da es mit Cache- und Protokolldateien wächst
* **Vorsicht bei Protokollen** — Überprüfen Sie vor dem Löschen von Protokolldateien, ob sie Informationen enthalten, die Sie für die Fehlerbehebung benötigen könnten