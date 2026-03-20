# Performance Tuning

Performance settings help optimize Chamilo for faster page loads and better resource utilization, especially on platforms with many concurrent users. Access relevant settings from **Administration > Configuration settings**.

## Symfony Cache

Chamilo 2.0 is built on Symfony, which uses a compiled cache for routing, dependency injection, and templates. Managing this cache is essential for performance.

### Clearing the Cache

After configuration changes, deployment, or upgrades, clear the Symfony cache:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

In production, always ensure `APP_ENV=prod` is set in your `.env.local` file. The development environment (`APP_ENV=dev`) includes extensive debugging overhead and should never be used in production.

### Cache Warmup

After clearing cache, warm it up to pre-compile templates and configuration:

```bash
php bin/console cache:warmup --env=prod
```

## Caching Strategies

| Strategy | Description |
|----------|-------------|
| **OPcache** | PHP's built-in opcode cache. Ensure it is enabled in your `php.ini` with adequate memory (`opcache.memory_consumption=256`). This is the single most impactful performance optimization. |
| **APCu** | An in-memory key-value cache used by Symfony for storing metadata. Install the APCu PHP extension and configure it in your Symfony cache configuration. |
| **Redis / Memcached** | For high-traffic platforms, configure an external cache backend. Set the cache adapter in `config/packages/cache.yaml`. |

### Recommended OPcache Settings

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

When `validate_timestamps` is set to 0, you must clear OPcache after deploying new code (restart PHP-FPM or call `opcache_reset()`).

## Lazy Loading

| Setting | Description |
|---------|-------------|
| **Lazy-load images** | Enables the `loading="lazy"` attribute on images so that off-screen images load only when scrolled into view. Reduces initial page load time. |
| **Deferred JavaScript loading** | Load non-critical JavaScript files asynchronously to avoid blocking page rendering. |

## CDN (Content Delivery Network)

For platforms serving users across multiple geographic regions, a CDN can significantly improve load times for static assets (CSS, JavaScript, images).

To configure a CDN:

1. Set up a CDN distribution (e.g., CloudFront, Cloudflare, or another provider) pointing to your Chamilo server.
2. Configure the asset base URL in your environment or Symfony configuration so that static assets are served through the CDN.
3. Set appropriate cache headers for static files (long expiry for versioned assets).

## Database Optimization

| Action | Description |
|--------|-------------|
| **Use database connection pooling** | For high-concurrency platforms, configure connection pooling to reduce overhead of establishing database connections. |
| **Optimize queries** | Chamilo includes database indexes for common queries. Run `ANALYZE TABLE` periodically on MySQL/MariaDB to keep query planner statistics current. |
| **Separate database server** | For large installations, run the database on a dedicated server rather than sharing resources with the web server. |

## Web Server Configuration

| Optimization | Description |
|--------------|-------------|
| **Enable gzip/brotli compression** | Compress HTML, CSS, and JavaScript responses. Most web servers support this natively. |
| **Static file caching** | Set long `Cache-Control` and `Expires` headers for static assets. |
| **PHP-FPM tuning** | Adjust `pm.max_children`, `pm.start_servers`, and `pm.max_requests` based on available RAM and expected concurrency. |
| **HTTP/2** | Enable HTTP/2 in your web server for multiplexed connections and header compression. |

## Tips

* **OPcache is the single biggest win** -- Ensure it is enabled and properly sized before pursuing other optimizations.
* **Never run production with `APP_ENV=dev`** -- The debug toolbar and profiler add significant overhead to every request.
* **Monitor before tuning** -- Use tools like New Relic, Blackfire, or Symfony's built-in profiler (in dev mode) to identify actual bottlenecks rather than guessing.
* **Warm the cache after every deployment** to avoid the first user hitting a slow uncached request.
