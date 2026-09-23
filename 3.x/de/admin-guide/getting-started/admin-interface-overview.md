# Übersicht der Administrationsoberfläche

Das Administrationspanel ist Ihre Schaltzentrale für die Verwaltung der Chamilo-Plattform. Sie erreichen es, indem Sie in der Seitenleiste auf **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> klicken.

## Administrations-Dashboard

![Das Administrations-Dashboard mit Funktionsblöcken für Benutzer, Kurse, Sitzungen und Einstellungen](../../.gitbook/assets/admin-dashboard-overview.png)

Das Admin-Dashboard ist in Funktionsblöcke gegliedert. Jeder Block fasst zusammengehörige Verwaltungswerkzeuge zusammen:

### Benutzer

* **Benutzerliste** — Alle Benutzer der Plattform anzeigen, suchen, bearbeiten und verwalten
* **Benutzer hinzufügen** — Einzelne Benutzerkonten anlegen
* **Klassen** — Benutzerklassen für die Sammelanmeldung zu Sitzungen verwalten

Einzelheiten finden Sie im Kapitel [Benutzer](../users/README.md).

### Kurse

* **Kursliste** — Alle Kurse der Plattform anzeigen und verwalten
* **Kurs erstellen** — Einen neuen Kurs anlegen
* **Kurskategorien** — Kurse für den Katalog in Kategorien organisieren

Einzelheiten finden Sie im Kapitel [Kurse](../courses/README.md).

### Sitzungen

* **Sitzungsliste** — Trainingssitzungen anzeigen und verwalten
* **Sitzung erstellen** — Eine neue Sitzung mit Kursen und Einschreibung einrichten
* **Sitzungskategorien** — Sitzungen in Kategorien organisieren
* **Karrieren und Promotionen** — Karrierepfade und Promotion-Workflows verwalten

Einzelheiten finden Sie im Kapitel [Sitzungen](../sessions/README.md).

### Plattform

* **Konfigurationseinstellungen**, **Sprachen**, **Portal-Nachrichten**, **Globale Agenda**, **Seiten**, **Zusatzfelder**, **E-Mail-Vorlagen**, **Kontaktformular-Kategorien** und mehr — siehe das Kapitel [Plattform](../platform/README.md). Der Link „Konfigurationseinstellungen“ ist der Einstieg in das separate Kapitel [Plattformeinstellungen](../platform-settings/README.md).

### Analytik

* **Globale Statistiken**, **Berichtskatalog**, **Lernanalytik**, **Quartalsbericht**, **Lehrer-Zeitbericht**, **Unternehmensbericht**, **Spezielle Exporte**, **Tickets** — Plattformstatistiken und Berichte; siehe das Kapitel [Analytik](../analytics/README.md)

### Kompetenzen

* **Kompetenzrad**, **Kompetenzen importieren**, **Kompetenzen verwalten**, **Kompetenzstufen verwalten**, **Kompetenzranking**, **Kompetenzen und Bewertungen** — Kompetenz-Badges, die mit Notenbuch-Ergebnissen verknüpft sind; siehe das Kapitel [Kompetenzen](../skills/README.md)

### System

* **Temporäre Dateien bereinigen**, **Systemstatus**, **Systemaktualisierung**, **Farben**, **Dateiinformationen**, **Ressourcen nach Typ**, **Symbole auflisten** — Serverwartung, Selbstaktualisierung und Branding; siehe das Kapitel [System](../system/README.md)

### Räume

* **Standorte**, **Räume**, **Raumbereitschaftssuche** — Physische Standorte und buchbare Schulungsräume; siehe das Kapitel [Räume](../rooms/README.md)

### Sicherheit

* **Aktivitätsprotokoll**, **Anmeldeversuche**, **Einfaches IDS**, **Passwortstärke-Prüfung**, **Dateiintegrität** — Sicherheitsüberwachung und Audit-Werkzeuge; siehe das Kapitel [Sicherheit](../security/README.md)

### Plugins

* Verknüpfungen zu installierten Plugins, die eine Admin-Menüseite deklarieren, sowie allgemeine Plugin-Verwaltung — siehe das Kapitel [Plugins](../plugins/README.md)

### Health Check

* Live-Prüfungen mit Bestanden/Nicht bestanden (E-Mail-Einstellungen, Zuweisung der Admin-URL, Dateiberechtigungen) — siehe die Seite [Health Check](../health-check.md)

### Weitere Blöcke

* **Chamilo.org**, **Versionsprüfung**, **Professioneller Support**, **Nachrichten von Chamilo** — Links und Statusfelder mit Inhalten des Chamilo-Projekts; siehe [Weitere Admin-Blöcke](../other-admin-blocks/README.md)

Jeder Abschnitt wird im entsprechenden Kapitel dieses Leitfadens ausführlich behandelt.

Authentifizierungsmethoden wie OAuth2, LDAP, CAS und andere externe Authentifizierungsanbieter werden nicht im Administrations-Dashboard konfiguriert, sondern in `config/authentication.yaml`.