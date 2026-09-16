# FAQ

Häufig gestellte Fragen für Chamilo 2.0-Administratoren.

## Installation und Einrichtung

**F: Welche PHP-Version benötigt Chamilo 2.0?**  
A: PHP 8.2 oder höher. PHP 8.3 wird empfohlen. Siehe [Serveranforderungen](../installation/server-requirements.md).

**F: Kann ich Chamilo auf Shared Hosting betreiben?**  
A: Es ist möglich, wird jedoch nicht empfohlen. Chamilo 2.0 benötigt Composer, Node.js im Entwicklungsmodus und Kommandozeilen-Zugriff für Installation und Wartung. Ein VPS oder dedizierter Server bietet eine deutlich bessere Erfahrung.

**F: Welche Datenbank sollte ich verwenden?**  
A: MySQL 8.0+ oder MariaDB 10.4+ sind am häufigsten verwendet und am besten getestet.

**F: Kann ich Chamilo ohne Kommandozeile installieren?**  
A: Ja, wenn Sie die gepackte Version (.zip oder .tar.gz) verwenden. Andernfalls benötigen Sie die Kommandozeile, um Composer-Abhängigkeiten zu installieren, Frontend-Assets zu erstellen und Datenbankmigrationen durchzuführen. Der webbasierte Assistent übernimmt die Datenbankeinrichtung und die anfängliche Konfiguration, aber die umgebenden Schritte erfordern Shell-Zugriff im Entwicklungsmodus.

## Benutzer und Authentifizierung

**F: Wie setze ich das Passwort eines Benutzers zurück?**  
A: Gehen Sie zu **Verwaltung > Benutzerliste**, suchen Sie den Benutzer, klicken Sie auf Bearbeiten und setzen Sie ein neues Passwort. Alternativ kann der Benutzer den Link „Passwort vergessen“ auf der Anmeldeseite verwenden (sofern E-Mail konfiguriert ist).

**F: Kann ich Benutzer massenhaft importieren?**  
A: Ja. Gehen Sie zu **Verwaltung > Benutzer importieren** und laden Sie eine CSV- oder XML-Datei mit Benutzerdaten hoch. Der Import unterstützt das Erstellen neuer Benutzer und das Aktualisieren bestehender Benutzer.

**F: Wie integriere ich Chamilo mit LDAP oder Active Directory?**  
A: Konfigurieren Sie die LDAP-Einstellungen in der Authentifizierungskonfiguration. Siehe [LDAP](../authentication/ldap.md). Benutzer werden beim Login oder über einen geplanten Synchronisationsprozess synchronisiert.

**F: Können Benutzer gleichzeitig an mehreren Sitzungen teilnehmen?**  
A: Ja. Benutzer können gleichzeitig an beliebig vielen Sitzungen eingeschrieben sein. Jede Sitzung verfolgt den Fortschritt unabhängig voneinander.

## Kurse und Inhalte

**F: Wie sichere ich einen einzelnen Kurs?**  
A: Gehen Sie innerhalb des Kurses zu **Wartung > Backup erstellen**. Dies erzeugt ein herunterladbares Archiv mit Kursinhalten und Einstellungen. Sie können es auf derselben oder einer anderen Chamilo-Instanz wiederherstellen.

**F: Kann ich einen Kurs kopieren?**  
A: Ja. Verwenden Sie **Verwaltung > Kurs kopieren** oder das Wartungstool innerhalb des Kurses. Sie können Inhalte zwischen Kursen kopieren oder einen neuen Kurs aus einem bestehenden erstellen.

**F: Welche SCORM-Versionen werden unterstützt?**  
A: Chamilo unterstützt SCORM 1.2. SCORM-Pakete werden als Lernpfade importiert.

**F: Wie beschränke ich, wer Kurse erstellen darf?**  
A: Gehen Sie zu **Verwaltung > Konfigurationseinstellungen > Kurs** und deaktivieren Sie **Nicht-Administratoren (Lehrer) dürfen neue Kurse erstellen** (`allow_users_to_create_courses`). Wenn deaktiviert, können nur Administratoren Kurse erstellen. Alternativ können Sie eine Begrenzung der Anzahl von Kursen festlegen, die ein Lehrer erstellen darf.

## Leistung und Wartung

**F: Die Plattform ist langsam. Was sollte ich zuerst überprüfen?**  
A: In der Reihenfolge der Auswirkungen: (1) Stellen Sie sicher, dass `APP_ENV=prod` und `APP_DEBUG=0` in `.env` gesetzt sind. (2) Überprüfen Sie, ob PHP OPcache aktiviert ist. (3) Prüfen Sie die Datenbankleistung. (4) Siehe [Leistungsoptimierung](../platform-settings/performance-tuning.md).

**F: Wie leere ich den Cache?**  
A: Führen Sie `php bin/console cache:clear --env=prod` über die Kommandozeile aus. Löschen Sie das Verzeichnis `var/cache/` nicht manuell, während die Anwendung läuft.

**F: Wie viel Speicherplatz benötigt Chamilo?**  
A: Die Anwendung selbst benötigt etwa 2 GB unkomprimiert. Der gesamte Speicherbedarf hängt von hochgeladenen Inhalten (Dokumente, Videos, SCORM-Pakete) ab. Überwachen Sie die Speichernutzung und planen Sie entsprechend.

**F: Wie richte ich automatische Backups ein?**  
A: Siehe [Backups](../maintenance/backups.md). Planen Sie mindestens einen täglichen Datenbank-Dump und regelmäßige Datei-Backups des Upload-Verzeichnisses ein.

## E-Mail

**F: Benutzer erhalten keine E-Mails. Was sollte ich überprüfen?**  
A: (1) Überprüfen Sie `MAILER_DSN` in `.env`. (2) Führen Sie `php bin/console mailer:test someone@example.com` aus, um zu testen. (3) Überprüfen Sie Spam-Ordner. (4) Verifizieren Sie SPF/DKIM-DNS-Einträge. Siehe [E-Mail-Konfiguration](../installation/email-configuration.md).

**F: Kann ich Gmail zum Versenden von E-Mails verwenden?**  
A: Ja, für kleine Plattformen oder Entwicklungszwecke. Verwenden Sie ein App-Passwort und beachten Sie die täglichen Versandlimits von Gmail (500 E-Mails/Tag für reguläre Konten).

## Sicherheit

**F: Wie erzwinge ich HTTPS?**  
A: Konfigurieren Sie Ihren Webserver so, dass HTTP zu HTTPS umgeleitet wird. Aktivieren Sie zusätzlich die Einstellung „HTTPS erzwingen“ unter **Verwaltung > Konfigurationseinstellungen > Sicherheit**. Siehe [Sicherheitseinstellungen](../platform-settings/security-settings.md).

**F: Wie blockiere ich Brute-Force-Anmeldeangriffe?**  
A: Konfigurieren Sie die maximale Anzahl an Anmeldeversuchen und CAPTCHA in den Sicherheitseinstellungen. Erwägen Sie zusätzlich die Verwendung von fail2ban auf Serverebene für weiteren Schutz.

**F: Ein Benutzer hat sein Passwort vergessen und E-Mail funktioniert nicht. Wie kann ich helfen?**  
A: Als Administrator können Sie das Benutzerkonto direkt bearbeiten und ein neues Passwort setzen. Gehen Sie zu **Verwaltung > Benutzerliste**, suchen Sie das Konto und aktualisieren Sie das Passwortfeld.

---
## Upgrades

**F: Kann ich direkt von Chamilo 1.11.x auf 2.0 aktualisieren?**
A: Ja, aber es handelt sich um eine umfassende Migration, nicht um ein einfaches Update. Siehe [Aktualisierung](../installation/upgrading.md). Testen Sie immer zuerst auf einem Staging-Server.

**F: Werden meine Plugins nach dem Upgrade auf 2.0 funktionieren?**
A: Nein. Plugins von 1.11.x sind nicht mit 2.0 kompatibel und müssen neu geschrieben oder durch gleichwertige 2.0-Funktionalitäten ersetzt werden.