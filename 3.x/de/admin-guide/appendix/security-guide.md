# Sicherheitsleitfaden

Dieser Leitfaden behandelt bewährte Sicherheitspraktiken für den Betrieb einer Chamilo-3.0-Plattform in der Produktion. Sicherheit ist eine gemeinsame Verantwortung zwischen der Plattformsoftware, Ihrer Serverkonfiguration und fortlaufenden betrieblichen Praktiken.

Zu den integrierten Überwachungs- und Audit-Werkzeugen, auf die in diesem Leitfaden durchgehend verwiesen wird (Protokolle von Anmeldeversuchen, Intrusion Detection, Prüfungen der Passwortstärke und Integritätsprüfungen von Dateien), siehe das Kapitel [Sicherheit](../security/README.md).

## Installationsordner entfernen

Der Installationsordner (`public/main/install`) hat sehr spezifische Anforderungen, da er Chamilo installieren und aktualisieren können muss, manchmal auf einer Plattform, die noch nicht vollständig konfiguriert ist. Aus diesem Grund war er historisch ein Angriffsziel.

Sobald Chamilo installiert ist, wird er für den täglichen Betrieb nicht mehr benötigt. Es ist besser, ihn vollständig zu entfernen:

```
rm -rf public/main/install
```

Aus diesem Grund warnt Sie auch der Block [Health Check](../health-check.md) der Administrationsseite, solange der Ordner noch vorhanden ist. Wenn Sie ein Update ausführen müssen, stellen Sie den Ordner aus einer frischen Kopie des Pakets wieder her und entfernen Sie ihn anschließend erneut.

## Chamilo aktuell halten

Die wichtigste Sicherheitspraktik besteht darin, Ihre Chamilo-Installation aktuell zu halten.

* Abonnieren Sie das Chamilo-Sicherheitskonto auf X (@chamilosecurity) oder beobachten Sie das GitHub-Repository auf Release-Ankündigungen.
* Wenden Sie Sicherheitspatches zeitnah an. Kleinere Updates innerhalb des 3.0-Zweigs sind so ausgelegt, dass sie sicher angewendet werden können.
* Befolgen Sie für jedes Update den [Upgrade-Prozess](../installation/upgrading.md).

## HTTPS

Stellen Sie Chamilo in der Produktion stets über HTTPS bereit.

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
| `.env` | root oder Deploy-Benutzer | 640 | Enthält Geheimnisse. Der Webserver benötigt im normalen Betrieb nur Lesezugriff, während der Installation jedoch Schreibzugriff. |
| `config/` | root oder Deploy-Benutzer | 750 | Enthält Geheimnisse. Der Webserver benötigt im normalen Betrieb nur Lesezugriff, während der Installation jedoch Schreibzugriff. |

Setzen Sie Berechtigungen niemals auf 777. Führen Sie den Webserver niemals als root aus.

## Passwortrichtlinien

Konfigurieren Sie strenge Passwortanforderungen unter [Sicherheitseinstellungen](../platform-settings/security-settings.md):

* Mindestlänge von 8 Zeichen (12+ empfohlen).
* Fordern Sie eine Mischung aus Großbuchstaben, Kleinbuchstaben, Zahlen und Sonderzeichen.
* Erwägen Sie die Aktivierung des Passwortablaufs für compliance-gesteuerte Umgebungen.
* Schulen Sie Benutzer darin, starke, eindeutige Passwörter zu wählen.

## Ratenbegrenzung und Schutz vor Brute-Force-Angriffen

### Anwendungsebene

* Setzen Sie **Maximale Anmeldeversuche vor Kontosperrung** (`login_max_attempt_before_blocking_account`) auf einen kleinen Wert (zum Beispiel 5).
* Aktivieren Sie **CAPTCHA** auf der Anmeldeseite. CAPTCHA ist ein-/ausgeschaltet — es wird nicht automatisch nach N fehlgeschlagenen Anmeldungen eingeschaltet. Kombinieren Sie es mit **CAPTCHA-Fehler vor Sperrung** (`captcha_number_mistakes_to_block_account`), um ein Konto zu sperren, das das CAPTCHA wiederholt nicht besteht.
* Prüfen Sie den Bericht [Anmeldeversuche](../security/login-attempts.md) regelmäßig, um Brute-Force-Muster zu erkennen, und den Bericht [Simple IDS](../security/simple-ids.md) auf andere markierte Anfragen (XSS-Versuche, Path Traversal und Ähnliches).

### Serverebene

Verwenden Sie **fail2ban**, um fehlgeschlagene Anmeldungen zu überwachen und angreifende IP-Adressen zu sperren:

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

Erstellen Sie einen passenden Filter in `/etc/fail2ban/filter.d/chamilo-auth.conf`, der Protokolleinträge zu fehlgeschlagener Authentifizierung erkennt.

## Sitzungsverwaltung

* Legen Sie in den Sicherheitseinstellungen eine angemessene **Sitzungsdauer** fest (z. B. 3600 Sekunden / 1 Stunde).
* Konfigurieren Sie **Sitzungscookie-Flags** in Ihrer Symfony-Konfiguration:

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
| `X-Frame-Options` | `SAMEORIGIN` | Verhindert Clickjacking über iframes. |
| `X-XSS-Protection` | `1; mode=block` | Legacy-XSS-Schutz für ältere Browser. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Steuert das Durchsickern von Referrer-Informationen. |
| `Content-Security-Policy` | Variiert | Steuert, welche Ressourcen geladen werden dürfen. Erfordert eine sorgfältige Abstimmung für Chamilo. |

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

## Sicherheit beim Datei-Upload

* Blockieren Sie ausführbare Dateierweiterungen (exe, bat, sh, php, phtml, cgi) in den [Sicherheitseinstellungen](../platform-settings/security-settings.md).
* Konfigurieren Sie Ihren Webserver so, dass er **hochgeladene Dateien niemals ausführt**. Fügen Sie für Apache Folgendes zum gesamten Verzeichnis var/ hinzu:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scannen Sie hochgeladene Dateien mit einem Antivirusprogramm (ClamAV), wenn Ihre Umgebung dies erfordert.

## Datenbanksicherheit

* Verwenden Sie einen **dedizierten Datenbankbenutzer** für Chamilo, der nur über die erforderlichen Berechtigungen verfügt (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX für die Chamilo-Datenbank).
* Verwenden Sie nicht das Root-Datenbankkonto.
* Stellen Sie sicher, dass die Datenbank nicht aus dem öffentlichen Internet erreichbar ist. Binden Sie sie an localhost oder ein privates Netzwerk.
* Aktivieren Sie die Datenbank-Auditprotokollierung für compliance-sensible Umgebungen.

## Sicherungen

* Planen Sie **tägliche automatisierte Sicherungen** sowohl der Datenbank als auch der hochgeladenen Dateien.
* Speichern Sie Sicherungen an einem vom Server getrennten Ort (extern oder in einem Cloud-Speicher).
* Testen Sie die Wiederherstellung von Sicherungen regelmäßig, um zu überprüfen, dass die Sicherungen verwendbar sind.
* Verschlüsseln Sie Sicherungen, wenn sie sensible Daten enthalten.

Siehe [Sicherungen](../maintenance/backups.md) für ausführliche Anweisungen.

## Überwachung

* Überwachen Sie die Chamilo-Protokolle unter `var/log/prod.log` auf Fehler und verdächtige Aktivitäten.
* Richten Sie eine Serverüberwachung (CPU, Arbeitsspeicher, Festplatte) ein, um Ressourcenerschöpfung zu erkennen.
* Konfigurieren Sie Warnungen bei wiederholten Authentifizierungsfehlern.
* Überprüfen Sie Benutzerkonten regelmäßig auf unbefugte oder inaktive Konten.
* Planen Sie Prüfungen der [Dateiintegrität](../security/file-integrity.md) (Chamilo 3.0+) in cron, um benachrichtigt zu werden, wenn installierte Dateien unerwartet geändert werden, und führen Sie den [Prüfer für die Passwortstärke](../security/password-strength-checker.md) regelmäßig aus, insbesondere nach Massenimporten von Benutzern.

## Checkliste

Verwenden Sie diese Checkliste bei der Bereitstellung oder Prüfung einer Chamilo-Installation:

- [ ] HTTPS mit gültigem Zertifikat aktiviert
- [ ] Weiterleitung von HTTP zu HTTPS konfiguriert
- [ ] `APP_ENV=prod` und `APP_DEBUG=0` in `.env`
- [ ] Eindeutiges `APP_SECRET` erzeugt
- [ ] Dateiberechtigungen eingeschränkt (kein 777)
- [ ] Passwortrichtlinie konfiguriert
- [ ] Maximale Anmeldeversuche und CAPTCHA aktiviert
- [ ] Ausführbare Dateierweiterungen blockiert
- [ ] Sicherheitsheader auf dem Webserver konfiguriert
- [ ] Session-Cookie-Flags gesetzt (secure, httponly, samesite)
- [ ] Datenbankbenutzer hat minimale Berechtigungen
- [ ] Automatisierte Sicherungen geplant und getestet
- [ ] Basislinie der Dateiintegrität erstellt und Scan in cron geplant (Chamilo 3.0+)
- [ ] Protokollüberwachung eingerichtet
- [ ] Chamilo-Version ist aktuell