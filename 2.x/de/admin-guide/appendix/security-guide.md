# Sicherheitsleitfaden

Dieser Leitfaden behandelt bewährte Sicherheitspraktiken für den Betrieb einer Chamilo 2.0-Plattform im Produktivbetrieb. Sicherheit ist eine gemeinsame Verantwortung zwischen der Plattformsoftware, Ihrer Serverkonfiguration und den laufenden Betriebspraktiken.

## Chamilo aktuell halten

Die wichtigste Sicherheitsmaßnahme ist, Ihre Chamilo-Installation stets auf dem neuesten Stand zu halten.

* Abonnieren Sie den Chamilo-Sicherheitsaccount auf X (@chamilosecurity) oder beobachten Sie das GitHub-Repository für Ankündigungen zu neuen Releases.
* Wenden Sie Sicherheitspatches zeitnah an. Kleinere Updates innerhalb der 2.0-Branch sind so gestaltet, dass sie sicher angewendet werden können.
* Folgen Sie dem [Upgrade-Prozess](../installation/upgrading.md) für jedes Update.

## HTTPS

Betreiben Sie Chamilo im Produktivbetrieb immer über HTTPS.

* Besorgen Sie sich ein SSL/TLS-Zertifikat (Let's Encrypt bietet kostenlose Zertifikate über Certbot an).
* Konfigurieren Sie Ihren Webserver so, dass der gesamte HTTP-Verkehr auf HTTPS umgeleitet wird.
* Aktivieren Sie den HSTS-Header (HTTP Strict Transport Security), um Downgrade-Angriffe zu verhindern:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Ohne HTTPS werden Anmeldedaten, Sitzungscookies und alle Benutzerdaten unverschlüsselt übertragen und können im Netzwerk abgefangen werden.

## Dateiberechtigungen

Beschränken Sie Dateiberechtigungen auf das absolut notwendige Minimum.

| Pfad | Eigentümer | Berechtigungen | Hinweise |
|------|------------|----------------|----------|
| Anwendungsdateien (Quellcode) | root oder Deploy-Benutzer | 755 (Verzeichnisse), 644 (Dateien) | Webserver benötigt nur Lesezugriff. |
| `var/` | Webserver-Benutzer | 775 | Muss für Symfony-Cache, Logs und Datei-Uploads beschreibbar sein. |
| `.env` | root oder Deploy-Benutzer | 640 | Enthält sensible Daten. Webserver benötigt nur Lesezugriff im normalen Betrieb, aber Schreibzugriff während der Installation. |
| `config/` | root oder Deploy-Benutzer | 750 | Enthält sensible Daten. Webserver benötigt nur Lesezugriff im normalen Betrieb, aber Schreibzugriff während der Installation. |

Setzen Sie niemals Berechtigungen auf 777. Betreiben Sie den Webserver niemals als root.

## Passwortrichtlinien

Konfigurieren Sie strenge Passwortanforderungen in den [Sicherheitseinstellungen](../platform-settings/security-settings.md):

* Mindestlänge von 8 Zeichen (12+ empfohlen).
* Fordern Sie eine Mischung aus Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen.
* Erwägen Sie die Aktivierung eines Passwortablaufs für Umgebungen mit Compliance-Anforderungen.
* Schulen Sie Benutzer darin, starke und einzigartige Passwörter zu wählen.

## Rate Limiting und Schutz vor Brute-Force-Angriffen

### Anwendungsebene

* Setzen Sie **Maximale Anmeldeversuche vor Kontosperrung** (`login_max_attempt_before_blocking_account`) auf einen kleinen Wert (z. B. 5).
* Aktivieren Sie **CAPTCHA** auf der Anmeldeseite. CAPTCHA ist entweder ein- oder ausgeschaltet – es wird nicht automatisch nach einer bestimmten Anzahl fehlgeschlagener Anmeldungen aktiviert. Kombinieren Sie es mit **CAPTCHA-Fehler vor Sperrung** (`captcha_number_mistakes_to_block_account`), um ein Konto zu sperren, das wiederholt am CAPTCHA scheitert.

### Serverebene

Verwenden Sie **fail2ban**, um Anmeldefehler zu überwachen und angreifende IP-Adressen zu blockieren:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Erstellen Sie einen passenden Filter in `/etc/fail2ban/filter.d/chamilo-auth.conf`, um fehlgeschlagene Authentifizierungsversuche in den Logeinträgen zu erkennen.

## Sitzungsmanagement

* Legen Sie eine angemessene **Sitzungslebensdauer** fest (z. B. 3600 Sekunden / 1 Stunde) in den Sicherheitseinstellungen.
* Konfigurieren Sie **Sitzungscookie-Flags** in Ihrer Symfony-Konfiguration:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Nur über HTTPS senden
          cookie_httponly: true     # Nicht über JavaScript zugänglich
          cookie_samesite: lax     # CSRF-Schutz
  ```

* Erwägen Sie, die Option "Angemeldet bleiben" auf Plattformen mit sensiblen Inhalten zu deaktivieren.

## HTTP-Sicherheitsheader

Konfigurieren Sie Ihren Webserver so, dass Sicherheitsheader gesendet werden:

| Header | Wert | Zweck |
|--------|------|-------|
| `X-Content-Type-Options` | `nosniff` | Verhindert MIME-Type-Sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Verhindert Clickjacking über IFrames. |
| `X-XSS-Protection` | `1; mode=block` | Älterer XSS-Schutz für ältere Browser. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Kontrolliert das Auslaufen von Referrer-Informationen. |
| `Content-Security-Policy` | Variiert | Kontrolliert, welche Ressourcen geladen werden können. Erfordert sorgfältige Anpassung für Chamilo. |

Beispiel für Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Beispiel für Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Sicherheit bei Datei-Uploads

* Blockieren Sie ausführbare Dateierweiterungen (exe, bat, sh, php, phtml, cgi) in den [Sicherheitseinstellungen](../platform-settings/security-settings.md).
* Konfigurieren Sie Ihren Webserver so, dass **hochgeladene Dateien niemals ausgeführt werden**. Für Apache fügen Sie Folgendes zum gesamten var/-Verzeichnis hinzu:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scannen Sie hochgeladene Dateien mit einem Antivirus-Programm (ClamAV), falls dies in Ihrer Umgebung erforderlich ist.

## Datenbanksicherheit

* Verwenden Sie einen **dedizierten Datenbankbenutzer** für Chamilo mit nur den benötigten Berechtigungen (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX auf die Chamilo-Datenbank).
* Verwenden Sie nicht das Root-Datenbankkonto.
* Stellen Sie sicher, dass die Datenbank nicht über das öffentliche Internet zugänglich ist. Binden Sie sie an localhost oder ein privates Netzwerk.
* Aktivieren Sie die Datenbank-Audit-Protokollierung für umgebungen mit hohen Compliance-Anforderungen.

## Backups

* Planen Sie **tägliche automatisierte Backups** sowohl der Datenbank als auch der hochgeladenen Dateien.
* Speichern Sie Backups an einem separaten Ort vom Server (offsite oder Cloud-Speicher).
* Testen Sie regelmäßig die Wiederherstellung von Backups, um sicherzustellen, dass sie verwendbar sind.
* Verschlüsseln Sie Backups, wenn sie sensible Daten enthalten.

Siehe [Backups](../maintenance/backups.md) für detaillierte Anweisungen.

## Überwachung

* Überwachen Sie die Chamilo-Protokolle unter `var/log/prod.log` auf Fehler und verdächtige Aktivitäten.
* Richten Sie eine Serverüberwachung (CPU, Speicher, Festplatte) ein, um Ressourcenengpässe zu erkennen.
* Konfigurieren Sie Benachrichtigungen für wiederholte fehlgeschlagene Authentifizierungsversuche.
* Überprüfen Sie regelmäßig Benutzerkonten auf unbefugte oder inaktive Konten.

## Checkliste

Verwenden Sie diese Checkliste bei der Bereitstellung oder Überprüfung einer Chamilo-Installation:

- [ ] HTTPS aktiviert mit gültigem Zertifikat
- [ ] HTTP zu HTTPS Weiterleitung konfiguriert
- [ ] `APP_ENV=prod` und `APP_DEBUG=0` in `.env`
- [ ] Einzigartiger `APP_SECRET` generiert
- [ ] Dateiberechtigungen eingeschränkt (kein 777)
- [ ] Passwortrichtlinie konfiguriert
- [ ] Maximale Anmeldeversuche und CAPTCHA aktiviert
- [ ] Ausführbare Dateierweiterungen blockiert
- [ ] Sicherheits-Header auf dem Webserver konfiguriert
- [ ] Session-Cookie-Flags gesetzt (secure, httponly, samesite)
- [ ] Datenbankbenutzer hat minimale Berechtigungen
- [ ] Automatisierte Backups geplant und getestet
- [ ] Protokollüberwachung eingerichtet
- [ ] Chamilo-Version ist aktuell