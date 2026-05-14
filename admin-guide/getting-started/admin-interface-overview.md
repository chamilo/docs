# Überblick über die Admin-Oberfläche

Das Verwaltungspanel ist Ihr Kontrollzentrum für die Verwaltung der Chamilo-Plattform. Greifen Sie darauf zu, indem Sie in der Seitenleiste auf **Verwaltung** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> klicken.

## Verwaltungs-Dashboard

![Das Verwaltungs-Dashboard mit Funktionsblöcken für Benutzer, Kurse, Sitzungen und Einstellungen](/.gitbook/assets/admin-dashboard-overview.png)

Das Admin-Dashboard ist in Funktionsblöcke unterteilt. Jeder Block gruppiert verwandte Verwaltungswerkzeuge:

### Benutzer

* **Benutzerliste** — Anzeigen, Suchen, Bearbeiten und Verwalten aller Benutzer auf der Plattform
* **Benutzer hinzufügen** — Erstellen individueller Benutzerkonten
* **Benutzergruppen** — Verwalten von Benutzergruppen für organisatorische Zwecke
* **Klassen** — Verwalten von Benutzerklassen für die Massenanmeldung zu Sitzungen

### Kurse

* **Kursliste** — Anzeigen und Verwalten aller Kurse auf der Plattform
* **Kurs erstellen** — Erstellen eines neuen Kurses
* **Kurskategorien** — Organisieren von Kursen in Kategorien für den Katalog

### Sitzungen

* **Sitzungsliste** — Anzeigen und Verwalten von Trainingssitzungen
* **Sitzung erstellen** — Einrichten einer neuen Sitzung mit Kursen und Anmeldung
* **Sitzungskategorien** — Organisieren von Sitzungen in Kategorien
* **Karrieren und Beförderungen** — Verwalten von Karrierewegen und Beförderungsabläufen

### Plattformeinstellungen

* **Konfigurationseinstellungen** — Zugriff auf das umfassende Einstellungspanel der Plattform mit Kategorien für Portal, Kurse, Sitzungen, Benutzer, Sicherheit und mehr

### Plugins

* **Plugins verwalten** — Installieren, Aktivieren, Konfigurieren und Deaktivieren von Plattform-Plugins

### System

* **Systemstatus** — Überprüfen der PHP-Konfiguration, des Datenbankstatus und der Servergesundheit
* **Archivbereinigung** — Verwalten temporärer Dateien und Caches

### Branding

* **Farben** — Anpassen des visuellen Erscheinungsbildes der Plattform
* **Portal-Anpassung** — Konfigurieren der Portal-Startseite, Neuigkeiten und Branding-Elemente

Jeder Abschnitt wird in einem entsprechenden Kapitel dieses Leitfadens ausführlich behandelt.

Authentifizierungsmethoden wie OAuth2, LDAP, CAS und andere externe Authentifizierungsanbieter werden nicht im Verwaltungs-Dashboard konfiguriert, sondern in `config/authentication.yaml`.