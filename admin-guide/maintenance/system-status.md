# Systemstatus

Die Systemstatus-Seite hilft Ihnen zu überprüfen, ob Ihr Chamilo-Server korrekt konfiguriert ist und mögliche Probleme zu identifizieren.

## Zugriff auf den Systemstatus

Klicken Sie im Verwaltungspanel auf **Systemstatus** (oder **Systeminformationen**).

## Was wird angezeigt

![Die Systemstatus-Seite zeigt PHP-Konfiguration, Datenbankstatus, Dateiberechtigungen und Serverinformationen](/.gitbook/assets/admin-system-status.png)

### PHP-Konfiguration

* **PHP-Version** — Chamilo 2.0 erfordert PHP 8.2 oder höher
* **Erforderliche Erweiterungen** — Überprüft, ob alle notwendigen PHP-Erweiterungen installiert sind
* **PHP-Einstellungen** — Verifiziert wichtige PHP-Einstellungen wie Speicherlimit, Upload-Grenzen und Ausführungszeit

### Datenbankstatus

* **Datenbankverbindung** — Bestätigt, dass die Datenbank zugänglich ist
* **Datenbankversion** — Zeigt die Version des Datenbankservers an

### Dateiberechtigungen

* **Beschreibbare Verzeichnisse** — Überprüft, ob Chamilo in die erforderlichen Verzeichnisse schreiben kann (Cache, Uploads, Logs)

### Serverinformationen

* **Betriebssystem** — Details zum Server-Betriebssystem
* **Webserver** — Apache, Nginx oder andere
* **Speicherplatz** — Verfügbarer Speicher

## Empfohlene Überprüfungen

Führen Sie diese Überprüfungen regelmäßig durch:

* **Nach der Installation** — Stellen Sie sicher, dass alle Anforderungen erfüllt sind
* **Nach Upgrades** — Vergewissern Sie sich, dass die PHP-Version und Erweiterungen weiterhin kompatibel sind
* **Bei Problemen** — Überprüfen Sie zuerst den Systemstatus, wenn Sie Probleme beheben müssen