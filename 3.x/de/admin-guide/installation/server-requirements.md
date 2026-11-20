# Serveranforderungen

Bevor Sie Chamilo 3.0 installieren, prüfen Sie, ob Ihr Server die folgenden Anforderungen erfüllt.

## Softwareanforderungen

### PHP

| Anforderung | Minimum | Empfohlen |
|-------------|---------|-------------|
| **PHP-Version** | 8.3 | 8.5 |

### Erforderliche PHP-Erweiterungen

| Erweiterung | Zweck |
|-----------|---------|
| **bcmath** | Arithmetik mit beliebiger Genauigkeit |
| **ctype** | Prüfung von Zeichentypen |
| **curl** | HTTP-Anfragen (API-Integrationen, externe Dienste) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-Parsing und DOM-Verarbeitung (SCORM, RSS, SOAP, LTI) |
| **exif** | Auslesen von Bildmetadaten (z. B. automatische Ausrichtung hochgeladener Fotos) |
| **fileinfo** | MIME-Typ-Erkennung für hochgeladene Dateien |
| **gd** | Bildverarbeitung (Vorschaubilder, CAPTCHA) |
| **iconv** | Zeichensatzkonvertierung |
| **intl** | Internationalisierung (Formatierung von Datum, Zahlen und Zeichenketten) |
| **json** | JSON-Kodierung und -Dekodierung |
| **ldap** | LDAP-Konnektor. Auch wenn Sie LDAP voraussichtlich nicht nutzen, benötigt Chamilo diese Erweiterung |
| **mbstring** | Verarbeitung von Multibyte-Zeichenketten (UTF-8-Unterstützung) |
| **openssl** | Kryptografische Operationen (HTTPS, Passwort-Hashing, JWT-Tokens) |
| **pdo**, plus **pdo_mysql** | Datenbankkonnektivität (der PDO-Treiber für MySQL/MariaDB) |
| **soap** | Verarbeitung von SOAP-Webdiensten |
| **zip** | Verarbeitung von ZIP-Archiven (SCORM-Pakete, Massenimporte und -exporte) |
| **zlib** | Komprimierung, die intern von mehreren Abhängigkeiten verwendet wird |
| **apcu** | Caching auf Benutzerebene (empfohlen, vom Installer geprüft, aber nicht erzwungen) |
| **opcache** | Opcode-Caching (für die Leistung dringend empfohlen, vom Installer geprüft, aber nicht erzwungen) |
| **xapian** | Volltextsuche (optional, nur bei Nutzung der Suche) |

### Datenbank

| Datenbank | Mindestversion | Empfohlen |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 oder höher |
| **MySQL** | 5.7 | 8.0 oder höher |

MariaDB-Versionen älter als 10.2.2 (und MySQL-Versionen älter als 5.7) erfordern, dass die Unterstützung für große Indizes bzw. Präfixe vor der Installation von Chamilo manuell in der Serverkonfiguration aktiviert wird.

### Webserver

| Server | Hinweise |
|--------|-------|
| **Apache** | Erfordert aktiviertes `mod_rewrite` (sowie `ssl`, `headers`, `expires`). Chamilo liefert eine Beispiel-vhost-Datei unter `public/main/install/apache.dist.conf`. |
| **Nginx** | Erfordert eine manuelle Konfiguration für das URL-Rewriting — Chamilo liefert keine Beispielkonfiguration für Nginx. Eine Referenzkonfiguration finden Sie in der Symfony-Dokumentation zu Nginx. |

### Build-Werkzeuge

| Werkzeug | Zweck |
|------|---------|
| **Composer** (^2.8) | Verwaltung von PHP-Abhängigkeiten. Erforderlich zur Installation der PHP-Bibliotheken von Chamilo. |
| **Node.js** (20+ LTS) | JavaScript-Laufzeitumgebung. Erforderlich zum Erstellen der Frontend-Assets. |
| **Yarn** (^4, via Corepack) | JavaScript-Paketmanager zum Erstellen der Frontend-Assets (`yarn install`, `yarn encore production`). |

## Hardwareanforderungen

| Ressource | Minimum | Empfohlen |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB oder mehr (das Erstellen der Frontend-Assets aus dem Quellcode benötigt allein mindestens 4 GB) |
| **CPU** | 2 vCPUs | 2 oder mehr Kerne |
| **Speicherplatz** | 4 GB (nur Anwendung) | 20+ GB (einschließlich hochgeladener Inhalte); das Erstellen aus dem Quellcode benötigt während des Builds ca. 10 GB freien Speicher |
| **Speichertyp** | HDD | SSD (verbessert die Leistung von Datenbank und Cache erheblich) |

Dies sind Ausgangswerte aus dem eigenen Installationsleitfaden von Chamilo. Die tatsächlichen Anforderungen hängen von der Anzahl gleichzeitiger Benutzer und vom Umfang der gehosteten Inhalte ab.

## Betriebssystem

| OS | Hinweise |
|----|-------|
| **Linux** | Empfohlen. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ oder gleichwertig. |
| **Windows** | Möglich, aber nicht umfassend getestet. Verwenden Sie WSL2 für die Entwicklung. |
| **macOS** | Nur für die Entwicklung / ungetestet. |

## Netzwerkanforderungen

* Ein Domainname, der auf Ihren Server verweist.
* Ein SSL/TLS-Zertifikat für HTTPS (Let's Encrypt stellt kostenlose Zertifikate bereit).
* Ausgehender SMTP-Zugang, wenn E-Mails direkt versendet werden (oder Nutzung eines E-Mail-Dienstes eines Drittanbieters).
* Port 443 (HTTPS) und optional Port 80 (HTTP, zur Weiterleitung auf HTTPS).

## Anforderungen prüfen

Nachdem Sie den Chamilo-Quellcode auf Ihrem Server abgelegt haben, können Sie Ihre PHP-Konfiguration direkt prüfen:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tipps

* **Verwenden Sie PHP-FPM** mit Apache oder Nginx für eine bessere Leistung als mit mod_php.
* **Trennen Sie Ihre Datenbank** auf einen dedizierten Server, wenn die Plattform mehr als 500 gleichzeitige Benutzer erwartet.
* **Verwenden Sie SSD-Speicher** -- Datenbankintensive Anwendungen wie Chamilo profitieren erheblich von schnellem Festplatten-I/O.