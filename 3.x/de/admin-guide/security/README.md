# Sicherheit

Der Block **Sicherheit** auf dem Administrations-Dashboard fasst die integrierten Werkzeuge zur Sicherheitsüberwachung und -prüfung der Plattform zusammen. Er ist getrennt von den [Sicherheitseinstellungen](../platform-settings/security-settings.md), die die Sicherheits*richtlinie* konfigurieren (Passwortregeln, CAPTCHA, HTTP-Sicherheitsheader und so weiter) — dieser Block stellt die *Berichte und Werkzeuge* bereit, die die Plattform auf verdächtige Aktivitäten und unerwünschte Änderungen überwachen.

![Der Block Sicherheit auf dem Administrations-Dashboard mit den Einträgen Aktivitätenprüfung, Anmeldeversuche, Simple IDS, Passwortstärke-Prüfer und Dateiintegrität](/.gitbook/assets/admin-security-block.png)

Der Block wurde in Chamilo 2.0 mit vier Werkzeugen eingeführt und in Chamilo 3.0 um ein fünftes erweitert, **Dateiintegrität**.

## Zugriff auf den Sicherheitsblock

Im Administrationsbereich erscheint der Block **Sicherheit** neben den anderen Dashboard-Blöcken (Benutzer, Kurse, Plattformverwaltung, System und so weiter). Klicken Sie auf einen der Links, um das entsprechende Werkzeug zu öffnen.

## Inhalt des Blocks

* **[Aktivitätenprüfung](activities-audit.md)** — Wichtige administrative und plattformbezogene Ereignisse (Änderungen an Benutzern, Kursen, Sitzungen und anderen) nach Ereignistyp durchsuchen
* **[Anmeldeversuche](login-attempts.md)** — Fehlgeschlagene und erfolgreiche Anmeldeversuche prüfen, mit Diagrammen und einem durchsuchbaren Protokoll
* **[Simple IDS](simple-ids.md)** — Von Chamilos integriertem, schlankem Intrusion-Detection-System markierte Anfragen einsehen
* **[Passwortstärke-Prüfer](password-strength-checker.md)** — Aktive Benutzer auf Passwörter prüfen, die einer Liste häufig verwendeter Passwörter entsprechen
* **[Dateiintegrität](file-integrity.md)** *(neu in Chamilo 3.0)* — Unerwartete Hinzufügungen, Änderungen, Löschungen oder Berechtigungsänderungen an den installierten Dateien erkennen

## Wer darauf zugreifen kann

Alle fünf Werkzeuge erfordern den Zugriff als **Portal-Administrator**. Die Aktionen Scannen, Pausieren und neue Baseline der Dateiintegrität erfordern zusätzlich den Zugriff als **Globaler Administrator**; das Pausieren von Warnungen oder das Festlegen einer neuen Baseline erfordert die erneute Eingabe Ihres eigenen Passworts — Einzelheiten siehe [Dateiintegrität](file-integrity.md#actions).