# Leistungsoptimierung

Leistungseinstellungen helfen dabei, Chamilo für schnellere Seitenladezeiten und eine bessere Ressourcennutzung zu optimieren, insbesondere auf Plattformen mit vielen gleichzeitigen Nutzern.

> **Zusätzliche Referenz**: Ihre Chamilo-Installation enthält einen erweiterten Optimierungsleitfaden. Öffnen Sie `/documentation/optimization.html` in einem Browser (z. B. `https://your-chamilo-site/documentation/optimization.html`), um serverseitige Empfehlungen spezifisch für Ihre Version zu erhalten.

## Symfony-Cache

Chamilo 2.0 basiert auf Symfony, das einen kompilierten Cache für Routing, Dependency Injection und Templates verwendet. Die Verwaltung dieses Caches ist für die Leistung essenziell.

### Cache leeren

Nach Konfigurationsänderungen, Bereitstellungen oder Upgrades sollten Sie den Symfony-Cache leeren:

```bash
# Cache für die aktuelle Umgebung leeren
php bin/console cache:clear

# Speziell für Produktionsumgebungen
php bin/console cache:clear --env=prod
```

In Produktionsumgebungen stellen Sie sicher, dass `APP_ENV=prod` in Ihrer `.env.local`-Datei gesetzt ist. Die Entwicklungsumgebung (`APP_ENV=dev`) enthält umfangreiche Debugging-Overheads und sollte niemals in der Produktion verwendet werden.

### Cache-Aufwärmen

Nach dem Leeren des Caches sollten Sie ihn aufwärmen, um Templates und Konfigurationen vorzukompilieren:

```bash
php bin/console cache:warmup --env=prod
```

## Caching-Strategien

| Strategie | Beschreibung |
|-----------|--------------|
| **OPcache** | Der integrierte Opcode-Cache von PHP. Stellen Sie sicher, dass er in Ihrer `php.ini` aktiviert ist und ausreichend Speicher hat (`opcache.memory_consumption=256`). Dies ist die wirkungsvollste Leistungsoptimierung. |
| **APCu** | Ein In-Memory-Key-Value-Cache, der von Symfony für die Speicherung von Metadaten verwendet wird. Installieren Sie die APCu-PHP-Erweiterung und konfigurieren Sie sie in Ihrer Symfony-Cache-Konfiguration. |
| **Redis / Memcached** | Für Plattformen mit hohem Traffic konfigurieren Sie einen externen Cache-Backend. Setzen Sie den Cache-Adapter in `config/packages/cache.yaml`. |

### Empfohlene OPcache-Einstellungen

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Setzen Sie auf 0 in der Produktion für beste Leistung
opcache.revalidate_freq=0
```

Wenn `validate_timestamps` auf 0 gesetzt ist, müssen Sie den OPcache nach der Bereitstellung neuen Codes leeren (starten Sie PHP-FPM neu oder rufen Sie `opcache_reset()` auf).

## Lazy Loading

| Einstellung | Beschreibung |
|-------------|--------------|
| **Lazy-Load-Bilder** | Aktiviert das Attribut `loading="lazy"` bei Bildern, sodass Bilder außerhalb des sichtbaren Bereichs erst geladen werden, wenn sie ins Blickfeld gescrollt werden. Reduziert die anfängliche Seitenladezeit. |
| **Verzögertes Laden von JavaScript** | Lädt nicht-kritische JavaScript-Dateien asynchron, um das Blockieren des Seitenrenderns zu vermeiden. |

## CDN (Content Delivery Network)

Für Plattformen, die Nutzer in verschiedenen geografischen Regionen bedienen, kann ein CDN die Ladezeiten für statische Inhalte (CSS, JavaScript, Bilder) erheblich verbessern.

So konfigurieren Sie ein CDN:

1. Richten Sie eine CDN-Distribution ein (z. B. CloudFront, Cloudflare oder einen anderen Anbieter), die auf Ihren Chamilo-Server verweist.
2. Konfigurieren Sie die Basis-URL für Assets in Ihrer Umgebung oder Symfony-Konfiguration, sodass statische Inhalte über das CDN ausgeliefert werden.
3. Setzen Sie geeignete Cache-Header für statische Dateien (lange Ablaufzeiten für versionierte Assets).

## Datenbankoptimierung

| Aktion | Beschreibung |
|--------|--------------|
| **Datenbank-Verbindungspooling verwenden** | Für Plattformen mit hoher Parallelität konfigurieren Sie Verbindungspooling, um den Overhead beim Herstellen von Datenbankverbindungen zu reduzieren. |
| **Abfragen optimieren** | Chamilo enthält Datenbankindizes für häufige Abfragen. Führen Sie regelmäßig `ANALYZE TABLE` auf MySQL/MariaDB aus, um die Statistiken des Query-Planners aktuell zu halten. |
| **Separater Datenbankserver** | Bei großen Installationen betreiben Sie die Datenbank auf einem dedizierten Server, anstatt Ressourcen mit dem Webserver zu teilen. |

## Webserver-Konfiguration

| Optimierung | Beschreibung |
|-------------|--------------|
| **gzip/brotli-Komprimierung aktivieren** | Komprimieren Sie HTML-, CSS- und JavaScript-Antworten. Die meisten Webserver unterstützen dies nativ. |
| **Caching statischer Dateien** | Setzen Sie lange `Cache-Control`- und `Expires`-Header für statische Assets. |
| **PHP-FPM-Tuning** | Passen Sie `pm.max_children`, `pm.start_servers` und `pm.max_requests` basierend auf verfügbarem RAM und erwarteter Parallelität an. |
| **HTTP/2** | Aktivieren Sie HTTP/2 in Ihrem Webserver für multiplexte Verbindungen und Header-Komprimierung. |

## Tipps

* **OPcache ist der größte Gewinn** -- Stellen Sie sicher, dass er aktiviert und richtig dimensioniert ist, bevor Sie andere Optimierungen verfolgen.
* **Betreiben Sie die Produktion niemals mit `APP_ENV=dev`** -- Die Debug-Toolbar und der Profiler verursachen erheblichen Overhead bei jeder Anfrage.
* **Überwachen Sie vor dem Tuning** -- Verwenden Sie Tools wie New Relic, Blackfire oder den integrierten Profiler von Symfony (im Entwicklungsmodus), um tatsächliche Engpässe zu identifizieren, anstatt zu raten.
* **Wärmen Sie den Cache nach jeder Bereitstellung auf**, um zu vermeiden, dass der erste Nutzer eine langsame, nicht gecachte Anfrage trifft.