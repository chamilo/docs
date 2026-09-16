# Sicherheitsleitfaden

Dieser Leitfaden behandelt bewährte Sicherheitspraktiken für den produktiven Betrieb einer Chamilo-3.0-Plattform. Sicherheit ist eine gemeinsame Verantwortung der Plattformsoftware, Ihrer Serverkonfiguration und der laufenden betrieblichen Praktiken.

Zu den in diesem Leitfaden durchgängig genannten integrierten Überwachungs- und Audit-Werkzeugen (Protokolle der Anmeldeversuche, Intrusion Detection, Prüfungen der Passwortstärke und der Dateiintegrität) siehe das Kapitel [Sicherheit](../security/README.md).

## Chamilo aktuell halten

Die wichtigste Sicherheitsmaßnahme besteht darin, Ihre Chamilo-Installation auf dem neuesten Stand zu halten.

* Abonnieren Sie das Chamilo-Sicherheits-X-Konto (@chamilosecurity) oder beobachten Sie das GitHub-Repository auf Veröffentlichungsankündigungen.
* Spielen Sie Sicherheitspatches zeitnah ein. Kleinere Updates innerhalb des 3.0-Zweigs sind so konzipiert, dass sie gefahrlos angewendet werden können.
* Folgen Sie für jedes Update dem [Upgrade-Prozess](../installation/upgrading.md).

## HTTPS

Betreiben Sie Chamilo in der Produktion stets über HTTPS.

* Beschaffen Sie ein SSL/TLS-Zertifikat (Let's Encrypt stellt über Certbot kostenlose Zertifikate bereit).
* Konfigurieren Sie Ihren Webserver so, dass der gesamte HTTP-Verkehr auf HTTPS umgeleitet wird.
* Aktivieren Sie den HSTS-Header (HTTP Strict Transport Security), um Downgrade-Angriffe zu verhindern:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Ohne HTTPS werden Anmeldedaten, Sitzungscookies und alle Benutzerdaten im Klartext übertragen und können im Netzwerk abgefangen werden.

## Dateiberechtigungen

Beschränken Sie Dateiberechtigungen auf das notwendige Minimum.

| Pfad | Eigentümer | Berechtigungen | Hinweise |
|------|-------|-------------|-------|
| Anwendungsdateien (Quellcode) | root oder Deploy-Benutzer | 755 (Verzeichnisse), 644 (Dateien) | Der Webserver benötigt nur Lesezugriff. |
| `var/` | Webserver-Benutzer | 775 | Muss für Symfony-Cache, Protokolle und Datei-Uploads beschreibbar sein |
| `.env` | root oder Deploy-Benutzer | 640 | Enthält Geheimnisse. Der Webserver benötigt im Normalbetrieb nur Lesezugriff, während der Installation jedoch Schreibzugriff. |
| `config/` | root oder Deploy-Benutzer | 750 | Enthält Geheimnisse. Der Webserver benötigt im Normalbetrieb nur Lesezugriff, während der Installation jedoch Schreibzugriff. |

Setzen Sie Berechtigungen niemals auf 777. Betreiben Sie den Webserver niemals als root.

## Passwortrichtlinien

Konfigurieren Sie strenge Passwortanforderungen unter [Sicherheitseinstellungen](../platform-settings/security-settings.md):

* Mindestlänge von 8 Zeichen (12+ empfohlen).
* Fordern Sie eine Mischung aus Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen.
* Erwägen Sie die Aktivierung der Passwortablaufzeit in umgebungen mit Compliance-Anforderungen.
* Schulen Sie Benutzer darin, starke, eindeutige Passwörter zu wählen.

## Ratenbegrenzung und Schutz vor Brute-Force-Angriffen

### Anwendungsebene

* Setzen Sie **Maximale Anmeldeversuche vor Kontosperrung** (`login_max_attempt_before_blocking_account`) auf einen kleinen Wert (beispielsweise 5).
* Aktivieren Sie **CAPTCHA** auf der Anmeldeseite. CAPTCHA ist ein/aus — es wird nicht automatisch nach N fehlgeschlagenen Anmeldungen eingeschaltet. Kombinieren Sie es mit **CAPTCHA-Fehler vor Sperrung** (`captcha_number_mistakes_to_block_account`), um ein Konto zu sperren, das das CAPTCHA wiederholt nicht besteht.
* Prüfen Sie den Bericht [Anmeldeversuche](../security/login-attempts.md) regelmäßig, um Brute-Force-Muster zu erkennen, sowie den Bericht [Simple IDS](../security/simple-ids.md) auf weitere markierte Anfragen (XSS-Versuche, Path Traversal und Ähnliches).

### Serverebene

Verwenden Sie **fail2ban**, um Anmeldefehler zu überwachen und angreifende IP-Adressen zu sperren:

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

Erstellen Sie einen passenden Filter in `/etc/fail2ban/filter.d/chamilo-auth.conf`, der Protokolleinträge zu Authentifizierungsfehlern erkennt.

## Sitzungsverwaltung

* Legen Sie in den Sicherheitseinstellungen eine angemessene **Sitzungslebensdauer** fest (z. B. 3600 Sekunden / 1 Stunde).
* Konfigurieren Sie **Sitzungs-Cookie-Flags** in Ihrer Symfony-Konfiguration:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Erwägen Sie, „Angemeldet bleiben“ auf Plattformen mit sensiblen Inhalten zu deaktivieren.

## HTTP-Sicherheitsheader

Konfigurieren Sie Ihren Webserver so, dass er Sicherheitsheader sendet:

| Header | Wert | Zweck |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Verhindert MIME-Type-Sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Verhindert Clickjacking über Iframes. |
| `X-XSS-Protection` | `1; mode=block` | Legacy-XSS-Schutz für ältere Browser. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Steuert das Durchsickern von Referrer-Informationen. |
| `Content-Security-Policy` | Variabel | Steuert, welche Ressourcen geladen werden dürfen. Erfordert eine sorgfältige Abstimmung für Chamilo. |

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
* Konfigurieren Sie Ihren Webserver so, dass **hochgeladene Dateien niemals ausgeführt** werden. Für Apache fügen Sie für das gesamte Verzeichnis var/ hinzu:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scannen Sie hochgeladene Dateien mit einem Antivirus (ClamAV), wenn Ihre Umgebung dies erfordert.

## Datenbanksicherheit

* Verwenden Sie einen **dedizierten Datenbankbenutzer** für Chamilo mit nur den benötigten Rechten (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX auf der Chamilo-Datenbank).
* Verwenden Sie nicht das Root-Datenbankkonto.
* Stellen Sie sicher, dass die Datenbank nicht aus dem öffentlichen Internet erreichbar ist. Binden Sie sie an localhost oder ein privates Netzwerk.
* Aktivieren Sie die Datenbank-Audit-Protokollierung für umgebungen mit Compliance-Anforderungen.

## Backups

* Planen Sie **tägliche automatisierte Backups** sowohl der Datenbank als auch der hochgeladenen Dateien.
* Speichern Sie Backups an einem vom Server getrennten Ort (Offsite oder Cloud-Speicher).
* Testen Sie die Wiederherstellung von Backups regelmäßig, um zu prüfen, dass die Backups verwendbar sind.
* Verschlüsseln Sie Backups, wenn sie sensible Daten enthalten.

Siehe [Backups](../maintenance/backups.md) für detaillierte Anweisungen.

## Überwachung

* Überwachen Sie die Chamilo-Protokolle unter `var/log/prod.log` auf Fehler und verdächtige Aktivitäten.
* Richten Sie eine Serverüberwachung (CPU, Speicher, Festplatte) ein, um Ressourcenerschöpfung zu erkennen.
* Konfigurieren Sie Warnungen bei wiederholten Authentifizierungsfehlern.
* Prüfen Sie Benutzerkonten regelmäßig auf unautorisierte oder inaktive Konten.
* Planen Sie [Dateiintegritäts](../security/file-integrity.md)-Prüfungen (Chamilo 3.0+) in cron, um benachrichtigt zu werden, wenn installierte Dateien unerwartet geändert werden, und führen Sie den [Passwortstärke-Prüfer](../security/password-strength-checker.md) regelmäßig aus, insbesondere nach Massenimporten von Benutzern.

## Checkliste

Verwenden Sie diese Checkliste beim Bereitstellen oder Prüfen einer Chamilo-Installation:

- [ ] HTTPS mit gültigem Zertifikat aktiviert
- [ ] HTTP-zu-HTTPS-Umleitung konfiguriert
- [ ] `APP_ENV=prod` und `APP_DEBUG=0` in `.env`
- [ ] Eindeutiges `APP_SECRET` erzeugt
- [ ] Dateiberechtigungen eingeschränkt (kein 777)
- [ ] Passwortrichtlinie konfiguriert
- [ ] Maximale Anmeldeversuche und CAPTCHA aktiviert
- [ ] Ausführbare Dateierweiterungen blockiert
- [ ] Sicherheitsheader auf dem Webserver konfiguriert
- [ ] Session-Cookie-Flags gesetzt (secure, httponly, samesite)
- [ ] Datenbankbenutzer hat minimale Rechte
- [ ] Automatisierte Backups geplant und getestet
- [ ] Dateiintegritäts-Baseline erstellt und Scan in cron geplant (Chamilo 3.0+)
- [ ] Protokollüberwachung eingerichtet
- [ ] Chamilo-Version ist aktuell