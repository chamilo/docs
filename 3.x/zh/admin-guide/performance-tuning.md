# 性能调优

性能相关设置有助于优化 Chamilo，加快页面加载并更好地利用资源，尤其适用于并发用户较多的平台。

> **补充参考**：您的 Chamilo 安装包含一份扩展优化指南。请在浏览器中打开 `/documentation/optimization.html`（例如 `https://your-chamilo-site/documentation/optimization.html`），以获取针对您所用版本的服务器级建议。

## Symfony 缓存

Chamilo 3.0 基于 Symfony 构建，后者对路由、依赖注入和模板使用编译缓存。管理该缓存对性能至关重要。

### 清除缓存

在配置变更、部署或升级之后，请清除 Symfony 缓存：

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

在生产环境中，务必确保在 `.env.local` 文件中设置 `APP_ENV=prod`。开发环境（`APP_ENV=dev`）包含大量调试开销，绝不应在生产中使用。

### 缓存预热

清除缓存后，进行预热以预编译模板和配置：

```bash
php bin/console cache:warmup --env=prod
```

## 缓存策略

| 策略 | 说明 |
|----------|-------------|
| **OPcache** | PHP 内置的操作码缓存。请确保在 `php.ini` 中启用，并分配足够内存（`opcache.memory_consumption=256`）。这是影响最大的单项性能优化。 |
| **APCu** | Symfony 用于存储元数据的内存键值缓存。安装 APCu PHP 扩展，并在 Symfony 缓存配置中进行设置。 |
| **Redis / Memcached** | 对于高流量平台，配置外部缓存后端。在 `config/packages/cache.yaml` 中设置缓存适配器。 |

### 推荐的 OPcache 设置

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

当 `validate_timestamps` 设为 0 时，部署新代码后必须清除 OPcache（重启 PHP-FPM 或调用 `opcache_reset()`）。

## 延迟加载

| 设置 | 说明 |
|---------|-------------|
| **延迟加载图片** | 为图片启用 `loading="lazy"` 属性，使屏幕外图片仅在滚动进入视口时加载。可缩短初始页面加载时间。 |
| **延迟加载 JavaScript** | 异步加载非关键 JavaScript 文件，避免阻塞页面渲染。 |

## CDN（内容分发网络）

对于服务多个地理区域用户的平台，CDN 可显著改善静态资源（CSS、JavaScript、图片）的加载时间。

配置 CDN：

1. 建立 CDN 分发（例如 CloudFront、Cloudflare 或其他提供商），指向您的 Chamilo 服务器。
2. 在环境或 Symfony 配置中设置资源基础 URL，使静态资源通过 CDN 提供。
3. 为静态文件设置合适的缓存头（对带版本号的资源使用较长过期时间）。

## 数据库优化

| 操作 | 说明 |
|--------|-------------|
| **使用数据库连接池** | 对于高并发平台，配置连接池以降低建立数据库连接的开销。 |
| **优化查询** | Chamilo 为常见查询包含数据库索引。定期在 MySQL/MariaDB 上运行 `ANALYZE TABLE`，以保持查询规划器统计信息最新。 |
| **独立数据库服务器** | 对于大型安装，将数据库运行在专用服务器上，而不是与 Web 服务器共享资源。 |

## Web 服务器配置

| 优化 | 说明 |
|--------------|-------------|
| **启用 gzip/brotli 压缩** | 压缩 HTML、CSS 和 JavaScript 响应。大多数 Web 服务器原生支持。 |
| **静态文件缓存** | 为静态资源设置较长的 `Cache-Control` 和 `Expires` 头。 |
| **PHP-FPM 调优** | 根据可用 RAM 和预期并发调整 `pm.max_children`、`pm.start_servers` 和 `pm.max_requests`。 |
| **HTTP/2** | 在 Web 服务器中启用 HTTP/2，以获得多路复用连接和头部压缩。 |

## 提示

* **OPcache 是收益最大的单项措施** —— 在进行其他优化之前，先确保已启用并合理分配容量。
* **切勿在生产环境使用 `APP_ENV=dev`** —— 调试工具栏和性能分析器会给每个请求带来显著开销。
* **先监控再调优** —— 使用 New Relic、Blackfire 或 Symfony 内置分析器（开发模式）识别真正的瓶颈，而不是凭猜测。
* **每次部署后预热缓存**，避免首位用户遇到未缓存的慢请求。