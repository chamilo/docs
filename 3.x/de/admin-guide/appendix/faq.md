# FAQ

Häufig gestellte Fragen für Administratoren von Chamilo 3.0.

## Installation and Setup

**Q: Welche PHP-Version benötigt Chamilo 3.0?**
A: PHP 8.3, 8.4 oder 8.5. Siehe [Serveranforderungen](../installation/server-requirements.md).

**Q: Kann ich Chamilo auf Shared Hosting betreiben?**
A: Es ist möglich, wird aber nicht empfohlen. Chamilo 3.0 benötigt Composer, Node.js im Entwicklungsmodus sowie Kommandozeilenzugriff für Installation und Wartung. Ein VPS oder dedizierter Server bietet eine deutlich bessere Erfahrung.

**Q: Welche Datenbank sollte ich verwenden?**
A: MySQL 8.0+ oder MariaDB 10.4+ werden am häufigsten eingesetzt und sind am besten getestet.

**Q: Kann ich Chamilo ohne Kommandozeile installieren?**
A: Ja, wenn Sie die paketierte Version (.zip oder .tar.gz) verwenden. Andernfalls benötigen Sie die Kommandozeile, um Composer-Abhängigkeiten zu installieren, Frontend-Assets zu bauen und Datenbankmigrationen auszuführen. Der webbasierte Assistent übernimmt die Datenbankeinrichtung und die Erstkonfiguration, die umgebenden Schritte erfordern im Entwicklungsmodus jedoch Shell-Zugriff.

## Users and Authentication

**Q: Wie setze ich das Passwort eines Benutzers zurück?**
A: Gehen Sie zu **Administration > Benutzerliste**, suchen Sie den Benutzer, klicken Sie auf Bearbeiten und legen Sie ein neues Passwort fest. Alternativ kann der Benutzer den Link „Passwort vergessen“ auf der Anmeldeseite nutzen (sofern E-Mail konfiguriert ist).

**Q: Kann ich Benutzer im Stapel importieren?**
A: Ja. Gehen Sie zu **Administration > Benutzer importieren** und laden Sie eine CSV- oder XML-Datei mit Benutzerdaten hoch. Der Import unterstützt das Anlegen neuer Benutzer und das Aktualisieren bestehender.

**Q: Wie integriere ich LDAP oder Active Directory?**
A: Konfigurieren Sie die LDAP-Einstellungen in der Authentifizierungskonfiguration. Siehe [LDAP](../authentication/ldap.md). Benutzer werden bei der Anmeldung oder über eine geplante Synchronisation abgeglichen.

**Q: Können Benutzer gleichzeitig mehreren Sessions angehören?**
A: Ja. Benutzer können in beliebig vielen Sessions gleichzeitig eingeschrieben sein. Jede Session erfasst den Fortschritt unabhängig.

## Courses and Content

**Q: Wie sichere ich einen einzelnen Kurs?**
A: Gehen Sie innerhalb des Kurses zu **Wartung > Sicherung erstellen**. Dadurch wird ein herunterladbares Archiv mit Kursinhalten und -einstellungen erzeugt. Sie können es auf derselben oder einer anderen Chamilo-Instanz wiederherstellen.

**Q: Kann ich einen Kurs kopieren?**
A: Ja. Verwenden Sie **Administration > Kurs kopieren** oder das Kurswartungswerkzeug innerhalb des Kurses. Sie können Inhalte zwischen Kursen kopieren oder aus einem bestehenden Kurs einen neuen erstellen.

**Q: Welche SCORM-Versionen werden unterstützt?**
A: Chamilo unterstützt SCORM 1.2. SCORM-Pakete werden als Lernpfade importiert.

**Q: Wie begrenze ich, wer Kurse anlegen darf?**
A: Gehen Sie zu **Administration > Konfigurationseinstellungen > Kurs** und deaktivieren Sie **Nicht-Administratoren (Lehrende) das Anlegen neuer Kurse erlauben** (`allow_users_to_create_courses`). Ist die Option deaktiviert, können nur Administratoren Kurse anlegen. Alternativ können Sie eine Obergrenze für die Anzahl der Kurse festlegen, die ein Lehrender erstellen darf.

## Performance and Maintenance

**Q: Die Plattform ist langsam. Was sollte ich zuerst prüfen?**
A: In der Reihenfolge der Auswirkung: (1) Stellen Sie sicher, dass `APP_ENV=prod` und `APP_DEBUG=0` in `.env` gesetzt sind. (2) Prüfen Sie, ob PHP OPcache aktiviert ist. (3) Prüfen Sie die Datenbankleistung. (4) Siehe [Leistungsoptimierung](../platform-settings/performance-tuning.md).

**Q: Wie leere ich den Cache?**
A: Führen Sie `php bin/console cache:clear --env=prod` von der Kommandozeile aus. Löschen Sie das Verzeichnis `var/cache/` nicht manuell, während die Anwendung läuft.

**Q: Wie viel Speicherplatz benötigt Chamilo?**
A: Die Anwendung selbst benötigt unkomprimiert etwa 2 GB. Der Gesamtbedarf hängt von hochgeladenen Inhalten ab (Dokumente, Videos, SCORM-Pakete). Überwachen Sie die Festplattennutzung und planen Sie entsprechend.

**Q: Wie richte ich automatisierte Sicherungen ein?**
A: Siehe [Sicherungen](../maintenance/backups.md). Planen Sie mindestens einen täglichen Datenbankdump und regelmäßige dateibasierte Sicherungen des Upload-Verzeichnisses.

## Email

**Q: Benutzer erhalten keine E-Mails. Was sollte ich prüfen?**
A: (1) Prüfen Sie `MAILER_DSN` in `.env`. (2) Führen Sie `php bin/console mailer:test someone@example.com` zum Testen aus. (3) Prüfen Sie Spam-Ordner. (4) Prüfen Sie SPF-/DKIM-DNS-Einträge. Siehe [E-Mail-Konfiguration](../installation/email-configuration.md).

**Q: Kann ich Gmail zum Versand von E-Mails nutzen?**
A: Ja, für kleine Plattformen oder die Entwicklung. Verwenden Sie ein App-Passwort und beachten Sie die täglichen Versandlimits von Gmail (500 E-Mails/Tag für reguläre Konten).

## Security

**Q: Wie erzwinge ich HTTPS?**
A: Konfigurieren Sie Ihren Webserver so, dass HTTP auf HTTPS umgeleitet wird. Aktivieren Sie zusätzlich die Einstellung „HTTPS erzwingen“ unter **Administration > Konfigurationseinstellungen > Sicherheit**. Siehe [Sicherheitseinstellungen](../platform-settings/security-settings.md).

**Q: Wie blockiere ich Brute-Force-Anmeldeversuche?**
A: Konfigurieren Sie die maximale Anzahl von Anmeldeversuchen und CAPTCHA in den Sicherheitseinstellungen. Erwägen Sie zusätzlich fail2ban auf Serverebene für weiteren Schutz.

**Q: Ein Benutzer hat das Passwort vergessen und E-Mail funktioniert nicht. Wie helfe ich?**
A: Als Administrator bearbeiten Sie das Benutzerkonto direkt und setzen ein neues Passwort. Gehen Sie zu **Administration > Benutzerliste**, suchen Sie das Konto und aktualisieren Sie das Passwortfeld.

## Upgrades

**F: Kann ich direkt von Chamilo 2.x auf 3.0 aktualisieren?**
A: Ja, aber es handelt sich um eine umfangreiche Migration, nicht um ein einfaches Update. Siehe [Aktualisieren](../installation/upgrading.md). Testen Sie dies stets zuerst auf einem Staging-Server.

**F: Funktionieren meine Plugins nach dem Upgrade auf 3.0 noch?**
A: Nein. Plugins aus Version 2.x sind nicht mit 3.0 kompatibel und müssen neu geschrieben oder durch entsprechende Funktionen von 3.0 ersetzt werden.