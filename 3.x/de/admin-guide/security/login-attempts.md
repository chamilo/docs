# Anmeldeversuche

Der Bericht „Anmeldeversuche“ zeigt eine Aufzeichnung fehlgeschlagener Anmeldeversuche mit Diagrammen, die Ihnen helfen, Brute-Force- oder Credential-Stuffing-Muster zu erkennen.

## Zugriff auf Anmeldeversuche

Klicken Sie im Administrationsbereich auf **Sicherheit > Anmeldeversuche**.

## Was angezeigt wird

![Die Seite „Anmeldeversuche“ mit Diagrammen zu Versuchen nach Tag, Top-IPs, fehlgeschlagenen Versuchen nach Monat, erfolgreichen gegenüber fehlgeschlagenen Anmeldungen, Versuchen nach Stunde und eindeutigen IPs pro Tag, gefolgt von einer Tabelle fehlgeschlagener Anmeldeversuche](../../.gitbook/assets/admin-security-login-attempts.png)

* **Versuche nach Tag (letzte 7 Tage)** — Tägliche Anzahl fehlgeschlagener Versuche
* **Top-IPs (letzte 30 Tage)** — Welche IP-Adressen die meisten Versuche erzeugt haben
* **Fehlgeschlagene Versuche nach Monat (letzte 12 Monate)** — Längerfristiger Trend
* **Erfolgreich gegenüber fehlgeschlagen (letzte 30 Tage)** — Tägliche Aufschlüsselung erfolgreicher gegenüber fehlgeschlagenen Anmeldungen
* **Versuche nach Stunde (letzte 7 Tage)** — Verteilung nach Tageszeit, nützlich zum Erkennen automatisierter bzw. skriptgesteuerter Versuche
* **Eindeutige IPs pro Tag (letzte 30 Tage)** — Wie viele unterschiedliche IPs an jedem Tag Anmeldeversuche unternommen haben
* **Tabelle fehlgeschlagener Anmeldeversuche** — Jeder fehlgeschlagene Versuch mit Datum, IP-Adresse und versuchtem Benutzernamen

Verwenden Sie die Felder **Benutzername**, **IP** und den Datumsbereich oberhalb der Diagramme, um den Bericht zu filtern.

## Zugehörige Einstellungen

Dieser Bericht ist ein Überwachungswerkzeug; die eigentlichen Brute-Force-Schutzmaßnahmen werden unter [Sicherheitseinstellungen](../platform-settings/security-settings.md) konfiguriert:

* **Maximale Anmeldeversuche vor der Sperre** (`login_max_attempt_before_blocking_account`) — Sperrt ein Konto nach zu vielen fehlgeschlagenen Versuchen
* **CAPTCHA** (`allow_captcha`) und **Zulässige CAPTCHA-Fehler** (`captcha_number_mistakes_to_block_account`) — Verlangsamt automatisierte Versuche und sperrt Konten, die das CAPTCHA wiederholt nicht bestehen

Siehe auch den [Sicherheitsleitfaden](../appendix/security-guide.md) zum Brute-Force-Schutz auf Serverebene (fail2ban).