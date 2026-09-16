# Installation

Dieser Abschnitt behandelt alles, was Sie benötigen, um Chamilo 3.0 auf Ihrem Server zu installieren und zu konfigurieren.

Chamilo 3.0 ist eine PHP-Anwendung, die auf dem Symfony-Framework aufbaut. Sie kann auf den meisten Linux-basierten Servern betrieben werden, wurde auf Windows Server mit IIS installiert und läuft dort, und unterstützt MySQL- und MariaDB-Backends.

## Installation Steps

1. **[Serveranforderungen](server-requirements.md)** — Prüfen Sie, ob Ihr Server die Mindestanforderungen erfüllt
2. **[Installationsassistent](installation-wizard.md)** — Führen Sie den webbasierten Installationsassistenten aus
3. **[Konfiguration](configuration.md)** — Konfigurieren Sie Umgebungsvariablen und Symfony-Einstellungen
4. **[Cloud-Speicher](cloud-storage.md)** — Richten Sie Cloud-Speicher-Backends ein (optional)
5. **[E-Mail-Konfiguration](email-configuration.md)** — Konfigurieren Sie die E-Mail-Zustellung
6. **[Aktualisierung](upgrading.md)** — Aktualisieren Sie von einer früheren Version

## Quick Overview

Der grundlegende Installationsprozess lautet:

1. Laden Sie den Chamilo-Quellcode herunter oder klonen Sie ihn
2. Installieren Sie PHP-Abhängigkeiten mit Composer, wenn Sie aus dem Quellcode vorbereiten
3. Installieren Sie JavaScript-Abhängigkeiten mit npm/yarn und bauen Sie die Frontend-Assets
4. Erstellen Sie eine leere `.env`-Datei, um später Ihre Datenbankzugangsdaten und andere Einstellungen zu speichern
5. Ändern Sie die Berechtigungen (schreibbar durch den Webserver) für *var/*, *config/* und *.env*
6. Führen Sie den webbasierten Installationsassistenten aus
7. Melden Sie sich mit Ihrem ersten Administratorkonto an
8. Setzen Sie die Berechtigungen für *config/* und *.env* wieder zurück

Ausführliche Anweisungen zu jedem Schritt finden Sie auf den oben verlinkten Seiten.