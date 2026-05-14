# Plattformeinstellungen

Chamilo verfügt über ein umfangreiches Konfigurationssystem mit Einstellungen, die in Kategorien organisiert sind. Die unten aufgeführten Kategorien spiegeln die Seite **Konfigurationseinstellungen** im Admin-Panel wider — sowie die zugrunde liegende Datei `SettingsCurrentFixtures.php` im Quellcode, die die maßgebliche Quelle für Variablennamen, Titel und Beschreibungen ist.

Greifen Sie auf die Plattformeinstellungen über das Administrationspanel zu, indem Sie auf **Konfigurationseinstellungen** klicken.

![Die Plattformeinstellungsseite zeigt Konfigurationskategorien, organisiert nach Funktionsbereichen](/.gitbook/assets/admin-settings-categories.png)

## Alle Kategorien

Es gibt insgesamt **39 Konfigurationskategorien**, die unten alphabetisch aufgelistet sind. Die Zahl nach jedem Link gibt die Anzahl der Einstellungen in dieser Kategorie an.

### Plattformweit

* **[Administrator-Identität](admin-settings.md)** (12) — Identität und Kontaktdaten des Plattformadministrators.
* **[Plattform](platform-settings.md)** (29) — Plattformweite Identität, Zeitzone, Registrierungsrichtlinie, Online-Benutzer, Leistungsflags.
* **[Anzeige](display-settings.md)** (24) — Layout der Startseite, Gravatar, Menüs, Branding-Verhalten.
* **[Editor](editor-settings.md)** (26) — Rich-Text-Editor (TinyMCE) Werkzeugleisten, Plugins, KI-Hilfsprogramme.
* **[Sprachen](language-settings.md)** (12) — Verfügbare Sprachen, Standardsprache, Fallbacks.
* **[E-Mail](mail-settings.md)** (18) — Layout ausgehender E-Mails, Absenderidentität, Signatur.
* **[Workflows](workflows-settings.md)** (23) — Plattformübergreifende Workflow-Schalter (Kurscreation, Einschreibungsvalidierung…).

### Authentifizierung, Sicherheit & Datenschutz

* **[Sicherheit](security-settings.md)** (31) — Login-Schutz, Passwortrichtlinie, Header, 2FA, IDS.
* **[Registrierung](registration-settings.md)** (20) — Selbstregistrierungsrichtlinie und Weiterleitungen nach der Registrierung.
* **[Datenschutz](privacy-settings.md)** (6) — Einwilligung, Datenexport, Anfragen zur Kontolöschung.
* **[CAS](cas-settings.md)** (7) — Veraltete CAS-Konfiguration, übernommen aus Version 1.x.

### Kurs- und Sitzungslebenszyklus

* **[Kurs](course-settings.md)** (45) — Standardeinstellungen und Richtlinien, die plattformweit für Kurse gelten.
* **[Sitzungen](session-settings.md)** (68) — Lebenszyklus von Sitzungen, Zugriffsfenster für Trainer, Sichtbarkeit.
* **[Kurskatalog](catalog-settings.md)** (13) — Verhalten des öffentlichen Kurskatalogs.
* **[Profil](profile-settings.md)** (29) — Welche Felder im Benutzerprofil angezeigt werden.

### Kurstools

* **[Agenda](agenda-settings.md)** (11)
* **[Ankündigungen](announcement-settings.md)** (9)
* **[Aufgaben (Arbeit)](work-settings.md)** (12)
* **[Anwesenheit](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Dokumente](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Übungen (Tests)](exercise-settings.md)** (63)
* **[Foren](forum-settings.md)** (9)
* **[Glossar](glossary-settings.md)** (3)
* **[Gruppen](group-settings.md)** (3)
* **[Lernpfade](lp-settings.md)** (51)
* **[Umfragen](survey-settings.md)** (12)

### Bewertung & Anerkennung

* **[Notenbuch (Bewertungen)](gradebook-settings.md)** (34) — Anzeige von Punktzahlen, Dezimalstellen, Zertifikatsschwellen.
* **[Zertifikate](certificate-settings.md)** (9) — Standardeinstellungen, die angewendet werden, wenn ein Lernender ein Zertifikat erhält.
* **[Fähigkeiten](skill-settings.md)** (13) — Fähigkeitsbaum, Vergaberegeln, Profilintegration.
* **[Nachverfolgung](tracking-settings.md)** (10) — Was aufgezeichnet wird, welche Berichte verfügbar sind.

### Kommunikation & Gemeinschaft

* **[Nachrichten](message-settings.md)** (7)
* **[Soziales Netzwerk](social-settings.md)** (7)

### KI

* **[KI-Hilfsprogramme](ai-helpers-settings.md)** (13) — Anbieter pro Aufgabentyp (Text, Bild, Video, Tutor, Bewertung).

### Betrieb & Integration

* **[Cron-Jobs](crons-settings.md)** (3)
* **[Suche](search-settings.md)** (3) — Xapian-Volltextsuchkonfiguration.
* **[Tickets](ticket-settings.md)** (7) — Helpdesk-System.
* **[Webdienste](webservice-settings.md)** (7) — Veraltete SOAP/REST-Endpunkte.

## Wie Einstellungen funktionieren

* Einstellungen werden in der Datenbank (`settings`-Tabelle) gespeichert und über die Weboberfläche verwaltet.
* Einige Einstellungen sind in Multi-URL-Setups **URL-gebunden** (ihr Wert gilt plattformweit und kann nicht pro URL überschrieben werden - siehe `access_url_locked` und `access_url_changeable` Spalten in der `settings`-Tabelle); andere (die meisten) können pro Zugriffs-URL überschrieben werden.
* Änderungen treten sofort in Kraft (kein Serverneustart erforderlich), obwohl Ihre Benutzersitzung einige davon im Speicher halten könnte. Wenn Änderungen nicht sofort sichtbar sind, melden Sie sich ab und wieder an, um Ihre Sitzung zu aktualisieren.
* Einige Einstellungen haben Abhängigkeiten — die Änderung einer Einstellung kann das Verhalten anderer beeinflussen.
* Die auf jeder Seite angezeigten Variablennamen (z. B. `2fa_enable`) entsprechen der Zeile in der `settings`-Datenbanktabelle (`variable`-Spalte) und den Schlüsseln, die in Überschreibungen verwendet werden (`config/settings_overrides.yaml`), falls zutreffend.

Für weitere Informationen besuchen Sie [Konfigurationen](https://github.com/chamilo/chamilo-lms/wiki/Configurations) in unserem Wiki.

---
## Tipps

* **Dokumentieren Sie Ihre Einstellungen** — Führen Sie Aufzeichnungen über nicht-standardmäßige Einstellungen und warum Sie diese geändert haben
* **Ändern Sie nur eine Sache auf einmal** — Bei der Fehlersuche ändern Sie jeweils nur eine Einstellung, damit Sie die Auswirkung identifizieren können
* **Testen Sie in einer Staging-Umgebung** — Bei bedeutenden Änderungen der Einstellungen testen Sie diese zuerst auf einem Staging-Server