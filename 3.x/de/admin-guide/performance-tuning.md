# Leistungsoptimierung

Leistungseinstellungen helfen, Chamilo für schnellere Seitenladezeiten und eine bessere Ressourcennutzung zu optimieren, insbesondere auf Plattformen mit vielen gleichzeitigen Nutzern.

> **Zusätzliche Referenz**: Ihre Chamilo-Installation enthält eine erweiterte Optimierungsanleitung. Öffnen Sie `/documentation/optimization.html` in einem Browser (z. B. `https://your-chamilo-site/documentation/optimization.html`) für serverseitige Empfehlungen, die für Ihre Version spezifisch sind.

## Symfony-Cache

Chamilo 3.0 basiert auf Symfony, das einen kompilierten Cache für Routing, Dependency Injection und Templates verwendet. Die Verwaltung dieses Caches ist für die Leistung wesentlich.

### Cache leeren

Nach Konfigurationsänderungen, Bereitstellungen oder Upgrades leeren Sie den Symfony-Cache:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Stellen Sie in der Produktion stets sicher, dass `APP_ENV=prod` in Ihrer Datei `.env.local` gesetzt ist. Die Entwicklungsumgebung (`APP_ENV=dev`) enthält umfangreichen Debugging-Overhead und darf niemals in der Produktion verwendet werden.

### Cache-Warmup

Nach dem Leeren des Caches wärmen Sie ihn auf, um Templates und Konfiguration vorzukompilieren:

```bash
php bin/console cache:warmup --env=prod
```

## Caching-Strategien

| Strategie | Beschreibung |
|----------|-------------|
| **OPcache** | Der integrierte Opcode-Cache von PHP. Stellen Sie sicher, dass er in Ihrer `php.ini` mit ausreichend Speicher aktiviert ist (`opcache.memory_consumption=256`). Dies ist die wirkungsvollste einzelne Leistungsoptimierung. |
| **APCu** | Ein In-Memory-Key-Value-Cache, den Symfony zum Speichern von Metadaten verwendet. Installieren Sie die APCu-PHP-Erweiterung und konfigurieren Sie sie in Ihrer Symfony-Cache-Konfiguration. |
| **Redis / Memcached** | Für Plattformen mit hohem Traffic konfigurieren Sie ein externes Cache-Backend. Setzen Sie den Cache-Adapter in `config/packages/cache.yaml`. |

### Empfohlene OPcache-Einstellungen

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Wenn `validate_timestamps` auf 0 gesetzt ist, müssen Sie den OPcache nach der Bereitstellung neuen Codes leeren (PHP-FPM neu starten oder `opcache_reset()` aufrufen).

## Lazy Loading

| Einstellung | Beschreibung |
|---------|-------------|
| **Lazy-load images** | Aktiviert das Attribut `loading="lazy"` bei Bildern, sodass Bilder außerhalb des sichtbaren Bereichs erst geladen werden, wenn sie in den Viewport gescrollt werden. Reduziert die initiale Seitenladezeit. |
| **Deferred JavaScript loading** | Lädt nicht kritische JavaScript-Dateien asynchron, um das Rendern der Seite nicht zu blockieren. |

## CDN (Content Delivery Network)

Für Plattformen, die Nutzer in mehreren geografischen Regionen bedienen, kann ein CDN die Ladezeiten für statische Assets (CSS, JavaScript, Bilder) erheblich verbessern.

So konfigurieren Sie ein CDN:

1. Richten Sie eine CDN-Distribution ein (z. B. CloudFront, Cloudflare oder einen anderen Anbieter), die auf Ihren Chamilo-Server zeigt.
2. Konfigurieren Sie die Asset-Basis-URL in Ihrer Umgebung oder Symfony-Konfiguration, sodass statische Assets über das CDN ausgeliefert werden.
3. Setzen Sie geeignete Cache-Header für statische Dateien (lange Ablaufzeiten für versionierte Assets).

## Datenbankoptimierung

| Maßnahme | Beschreibung |
|--------|-------------|
| **Use database connection pooling** | Für Plattformen mit hoher Parallelität konfigurieren Sie Connection Pooling, um den Overhead beim Aufbau von Datenbankverbindungen zu reduzieren. |
| **Optimize queries** | Chamilo enthält Datenbankindizes für gängige Abfragen. Führen Sie periodisch `ANALYZE TABLE` auf MySQL/MariaDB aus, um die Statistiken des Query Planners aktuell zu halten. |
| **Separate database server** | Bei großen Installationen betreiben Sie die Datenbank auf einem dedizierten Server, statt Ressourcen mit dem Webserver zu teilen. |

## Webserver-Konfiguration

| Optimierung | Beschreibung |
|--------------|-------------|
| **Enable gzip/brotli compression** | Komprimieren Sie HTML-, CSS- und JavaScript-Antworten. Die meisten Webserver unterstützen dies nativ. |
| **Static file caching** | Setzen Sie lange `Cache-Control`- und `Expires`-Header für statische Assets. |
| **PHP-FPM tuning** | Passen Sie `pm.max_children`, `pm.start_servers` und `pm.max_requests` an den verfügbaren RAM und die erwartete Parallelität an. |
| **HTTP/2** | Aktivieren Sie HTTP/2 in Ihrem Webserver für multiplexierte Verbindungen und Header-Kompression. |

## Tipps

* **OPcache ist der größte einzelne Gewinn** -- Stellen Sie sicher, dass er aktiviert und angemessen dimensioniert ist, bevor Sie andere Optimierungen verfolgen.
* **Betreiben Sie die Produktion niemals mit `APP_ENV=dev`** -- Die Debug-Leiste und der Profiler verursachen erheblichen Overhead bei jeder Anfrage.
* **Überwachen Sie, bevor Sie tunen** -- Nutzen Sie Tools wie New Relic, Blackfire oder den integrierten Profiler von Symfony (im Dev-Modus), um tatsächliche Engpässe zu identifizieren, statt zu raten.
* **Wärmen Sie den Cache nach jeder Bereitstellung auf**, damit der erste Nutzer nicht auf eine langsame, nicht gecachte Anfrage trifft.