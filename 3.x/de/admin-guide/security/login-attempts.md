# Anmeldeversuche

Der Bericht „Anmeldeversuche“ zeigt eine Aufzeichnung fehlgeschlagener Anmeldeversuche, ergänzt um Diagramme, mit denen Sie Muster von Brute-Force-Angriffen oder Credential Stuffing erkennen können.

## Zugriff auf Anmeldeversuche

Klicken Sie im Administrationsbereich auf **Sicherheit > Anmeldeversuche**.

## Was angezeigt wird

![Die Seite „Anmeldeversuche“ mit Diagrammen zu Versuchen pro Tag, Top-IPs, fehlgeschlagenen Versuchen pro Monat, erfolgreichen vs. fehlgeschlagenen Anmeldungen, Versuchen nach Stunde und eindeutigen IPs pro Tag, gefolgt von einer Tabelle fehlgeschlagener Anmeldeversuche](/.gitbook/assets/admin-security-login-attempts.png)

* **Versuche pro Tag (letzte 7 Tage)** — Tägliche Anzahl fehlgeschlagener Versuche
* **Top-IPs (letzte 30 Tage)** — Welche IP-Adressen die meisten Versuche erzeugt haben
* **Fehlgeschlagene Versuche pro Monat (letzte 12 Monate)** — Längerfristiger Trend
* **Erfolgreich vs. fehlgeschlagen (letzte 30 Tage)** — Tägliche Aufschlüsselung erfolgreicher gegenüber fehlgeschlagenen Anmeldungen
* **Versuche nach Stunde (letzte 7 Tage)** — Verteilung nach Tageszeit, nützlich zum Erkennen automatisierter/skriptbasierter Versuche
* **Eindeutige IPs pro Tag (letzte 30 Tage)** — Wie viele unterschiedliche IPs jeweils an einem Tag Anmeldungen versucht haben
* **Tabelle fehlgeschlagener Anmeldeversuche** — Jeder fehlgeschlagene Versuch mit Datum, IP-Adresse und verwendetem Benutzernamen

Verwenden Sie die Felder **Benutzername**, **IP** und den Datumsbereich oberhalb der Diagramme, um den Bericht zu filtern.

## Zugehörige Einstellungen

Dieser Bericht ist ein Überwachungswerkzeug; die eigentlichen Brute-Force-Schutzmaßnahmen werden in den [Sicherheitseinstellungen](../platform-settings/security-settings.md) konfiguriert:

* **Max. Anmeldeversuche vor Sperre** (`login_max_attempt_before_blocking_account`) — Sperrt ein Konto nach zu vielen fehlgeschlagenen Versuchen
* **CAPTCHA** (`allow_captcha`) und **Zulässige CAPTCHA-Fehler** (`captcha_number_mistakes_to_block_account`) — Verlangsamt automatisierte Versuche und sperrt Konten, die das CAPTCHA wiederholt nicht bestehen

Siehe auch den [Sicherheitsleitfaden](../appendix/security-guide.md) zum Brute-Force-Schutz auf Serverebene (fail2ban).