# Serveranforderungen

Bevor Sie Chamilo 2.0 installieren, stellen Sie sicher, dass Ihr Server die folgenden Anforderungen erfüllt.

## Softwareanforderungen

### PHP

| Anforderung | Minimum | Empfohlen |
|-------------|---------|-----------|
| **PHP-Version** | 8.2 | 8.3 oder höher |

### Erforderliche PHP-Erweiterungen

| Erweiterung | Zweck |
|-------------|-------|
| **curl** | HTTP-Anfragen (API-Integrationen, externe Dienste) |
| **fileinfo** | MIME-Typ-Erkennung für hochgeladene Dateien |
| **gd** | Bildverarbeitung (Vorschaubilder, CAPTCHA) |
| **intl** | Internationalisierung (Formatierung von Datum, Zahlen und Zeichenfolgen) |
| **json** | JSON-Kodierung/Dekodierung |
| **ldap** | LDAP-Konnektor. Obwohl Sie LDAP wahrscheinlich nicht verwenden werden, benötigt Chamilo es |
| **mbstring** | Handhabung von Multibyte-Zeichenfolgen (UTF-8-Unterstützung) |
| **openssl** | Kryptografische Operationen (HTTPS, Passwort-Hashing, Token) |
| **pdo_mysql** oder **pdo_pgsql** | Datenbankverbindung (installieren Sie die passende Erweiterung für Ihre Datenbank) |
| **xml** | XML-Parsing (SCORM, RSS, SOAP) |
| **zip** | Handhabung von ZIP-Archiven (SCORM-Pakete, Massenimporte/-exporte) |
| **apcu** | Benutzer-Caching (empfohlen) |
| **opcache** | Opcode-Caching (dringend empfohlen für die Leistung) |
| **xapian** | Volltextsuche (optional, nur wenn Sie die Suche nutzen) |

### Datenbank

| Datenbank | Mindestversion |
|-----------|----------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Webserver

| Server | Hinweise |
|--------|----------|
| **Apache** | Erfordert aktiviertes `mod_rewrite`. |
| **Nginx** | Erfordert manuelle Konfiguration für URL-Rewriting. Siehe die Symfony Nginx-Dokumentation für eine Referenzkonfiguration. |

### Build-Tools

| Tool | Zweck |
|------|-------|
| **Composer** | PHP-Abhängigkeitsverwaltung. Erforderlich, um die PHP-Bibliotheken von Chamilo zu installieren. |
| **Node.js** (18+) | JavaScript-Laufzeitumgebung. Erforderlich, um Frontend-Assets zu erstellen. |
| **npm** | JavaScript-Paketmanager. Wird mit Node.js installiert. |

## Hardwareanforderungen

| Ressource | Minimum | Empfohlen |
|-----------|---------|-----------|
| **RAM** | 2 GB | 4 GB oder mehr |
| **CPU** | 1 Kern | 2+ Kerne |
| **Speicherplatz** | 2 GB (nur Anwendung) | 20+ GB (einschließlich hochgeladener Inhalte) |
| **Festplattentyp** | HDD | SSD (verbessert die Datenbank- und Cache-Leistung erheblich) |

Dies sind Grundwerte. Die tatsächlichen Anforderungen hängen von der Anzahl gleichzeitiger Benutzer und dem Umfang der gehosteten Inhalte ab.

## Betriebssystem

| Betriebssystem | Hinweise |
|----------------|----------|
| **Linux** | Empfohlen. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+ oder gleichwertig. |
| **Windows** | Möglich, aber nicht gründlich getestet. Verwenden Sie WSL2 für die Entwicklung. |
| **macOS** | Nur für Entwicklung / ungetestet. |

## Netzwerkanforderungen

* Eine Domain, die auf Ihren Server verweist.
* Ein SSL/TLS-Zertifikat für HTTPS (Let's Encrypt bietet kostenlose Zertifikate).
* Ausgehender SMTP-Zugriff, wenn E-Mails direkt gesendet werden (oder nutzen Sie einen Drittanbieter-E-Mail-Dienst).
* Port 443 (HTTPS) und optional Port 80 (HTTP, für Weiterleitung zu HTTPS).

## Überprüfung der Anforderungen

Nachdem Sie den Chamilo-Quellcode auf Ihrem Server platziert haben, können Sie Ihre PHP-Konfiguration direkt überprüfen:

```bash
php -m          # Liste der installierten Erweiterungen
php -i          # Vollständige PHP-Informationen
```

## Tipps

* **Verwenden Sie PHP-FPM** mit Apache oder Nginx für bessere Leistung als mod_php.
* **Trennen Sie Ihre Datenbank** auf einen dedizierten Server für Plattformen mit mehr als 500 gleichzeitigen Benutzern.
* **Verwenden Sie SSD-Speicher** – Datenbankintensive Anwendungen wie Chamilo profitieren erheblich von schnellem Festplatten-I/O.