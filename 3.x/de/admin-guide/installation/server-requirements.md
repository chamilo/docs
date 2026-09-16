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
| **bcmath** | Mathematik mit beliebiger Genauigkeit |
| **ctype** | Prüfung von Zeichentypen |
| **curl** | HTTP-Anfragen (API-Integrationen, externe Dienste) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-Parsing und DOM-Verarbeitung (SCORM, RSS, SOAP, LTI) |
| **exif** | Lesen von Bildmetadaten (z. B. automatische Ausrichtung hochgeladener Fotos) |
| **fileinfo** | MIME-Typ-Erkennung für hochgeladene Dateien |
| **gd** | Bildverarbeitung (Miniaturansichten, CAPTCHA) |
| **iconv** | Zeichensatzkonvertierung |
| **intl** | Internationalisierung (Datums-, Zahlen- und Zeichenkettenformatierung) |
| **json** | JSON-Kodierung/-Dekodierung |
| **ldap** | LDAP-Konnektor. Obwohl Sie LDAP wahrscheinlich nicht nutzen, setzt Chamilo ihn voraus |
| **mbstring** | Verarbeitung mehrbytiger Zeichenketten (UTF-8-Unterstützung) |
| **openssl** | Kryptografische Operationen (HTTPS, Passwort-Hashing, JWT-Token) |
| **pdo**, plus **pdo_mysql** oder **pdo_pgsql** | Datenbankanbindung (installieren Sie den Treiber, der zu Ihrer Datenbank passt) |
| **soap** | Verarbeitung von SOAP-Webdiensten |
| **zip** | Verarbeitung von ZIP-Archiven (SCORM-Pakete, Massenimporte/-exporte) |
| **zlib** | Kompression, die intern von mehreren Abhängigkeiten genutzt wird |
| **apcu** | Caching auf Benutzerebene (empfohlen, vom Installer geprüft, aber nicht erzwungen) |
| **opcache** | Opcode-Caching (für die Leistung dringend empfohlen, vom Installer geprüft, aber nicht erzwungen) |
| **xapian** | Volltextsuche (optional, nur wenn Sie die Suche nutzen) |

### Datenbank

| Datenbank | Mindestversion | Empfohlen |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 oder höher |
| **MySQL** | 5.7 | 8.0 oder höher |

MariaDB-Versionen älter als 10.2.2 (und MySQL-Versionen älter als 5.7) benötigen vor der Installation von Chamilo manuell aktivierte Unterstützung für große Indizes/Präfixe in der Serverkonfiguration.

### Webserver

| Server | Hinweise |
|--------|-------|
| **Apache** | Erfordert aktiviertes `mod_rewrite` (sowie `ssl`, `headers`, `expires`). Chamilo liefert einen Beispiel-vhost unter `public/main/install/apache.dist.conf`. |
| **Nginx** | Erfordert manuelle Konfiguration für URL-Rewriting — Chamilo liefert keine Beispiel-Nginx-Konfiguration. Siehe die Symfony-Nginx-Dokumentation für eine Referenzkonfiguration. |

### Build-Werkzeuge

| Werkzeug | Zweck |
|------|---------|
| **Composer** (^2.8) | PHP-Abhängigkeitsverwaltung. Erforderlich zur Installation der PHP-Bibliotheken von Chamilo. |
| **Node.js** (20+ LTS) | JavaScript-Laufzeitumgebung. Erforderlich zum Erstellen der Frontend-Assets. |
| **Yarn** (^4, via Corepack) | JavaScript-Paketmanager zum Erstellen der Frontend-Assets (`yarn install`, `yarn encore production`). |

## Hardwareanforderungen

| Ressource | Minimum | Empfohlen |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB oder mehr (das Erstellen der Frontend-Assets aus dem Quellcode benötigt allein mindestens 4 GB) |
| **CPU** | 2 vCPUs | 2+ Kerne |
| **Festplattenspeicher** | 4 GB (nur Anwendung) | 20+ GB (einschließlich hochgeladener Inhalte); das Erstellen aus dem Quellcode benötigt während des Builds ca. 10 GB freien Speicher |
| **Festplattentyp** | HDD | SSD (verbessert Datenbank- und Cache-Leistung deutlich) |

Dies sind Basiswerte aus dem eigenen Installationsleitfaden von Chamilo. Der tatsächliche Bedarf hängt von der Anzahl gleichzeitiger Benutzer und dem Umfang der gehosteten Inhalte ab.

## Betriebssystem

| OS | Hinweise |
|----|-------|
| **Linux** | Empfohlen. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ oder vergleichbar. |
| **Windows** | Möglich, aber nicht umfassend getestet. Für die Entwicklung WSL2 verwenden. |
| **macOS** | Nur Entwicklung / ungetestet. |

## Netzwerkanforderungen

* Ein Domainname, der auf Ihren Server zeigt.
* Ein SSL/TLS-Zertifikat für HTTPS (Let's Encrypt stellt kostenlose Zertifikate bereit).
* Ausgehender SMTP-Zugang, wenn E-Mails direkt versendet werden (oder einen Drittanbieter-E-Mail-Dienst nutzen).
* Port 443 (HTTPS) und optional Port 80 (HTTP, zur Umleitung auf HTTPS).

## Anforderungen prüfen

Nachdem Sie den Chamilo-Quellcode auf Ihrem Server abgelegt haben, können Sie Ihre PHP-Konfiguration direkt prüfen:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tipps

* **PHP-FPM verwenden** mit Apache oder Nginx für bessere Leistung als mit mod_php.
* **Datenbank auslagern** auf einen dedizierten Server für Plattformen mit mehr als 500 gleichzeitigen Benutzern.
* **SSD-Speicher verwenden** -- Datenbanklastige Anwendungen wie Chamilo profitieren erheblich von schnellem Festplatten-I/O.