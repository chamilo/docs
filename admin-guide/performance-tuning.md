# 性能调优

性能设置有助于优化 Chamilo，以实现更快的页面加载速度和更好的资源利用率，特别是在有大量并发用户的平台上。

> **额外参考**：您的 Chamilo 安装包含一个扩展的优化指南。在浏览器中打开 `/documentation/optimization.html`（例如 `https://your-chamilo-site/documentation/optimization.html`），以获取针对您版本的服务器级建议。

## Symfony 缓存

Chamilo 2.0 基于 Symfony 构建，Symfony 使用编译缓存来处理路由、依赖注入和模板。管理此缓存对性能至关重要。

### 清除缓存

在配置更改、部署或升级后，清除 Symfony 缓存：

```bash
# 清除当前环境的缓存
php bin/console cache:clear

# 专门针对生产环境
php bin/console cache:clear --env=prod
```

在生产环境中，始终确保在 `.env.local` 文件中设置 `APP_ENV=prod`。开发环境（`APP_ENV=dev`）包含大量的调试开销，绝不应该在生产环境中使用。

### 缓存预热

清除缓存后，进行预热以预编译模板和配置：

```bash
php bin/console cache:warmup --env=prod
```

## 缓存策略

| 策略 | 描述 |
|----------|-------------|
| **OPcache** | PHP 内置的操作码缓存。确保在 `php.ini` 中启用并分配足够的内存（`opcache.memory_consumption=256`）。这是对性能影响最大的单一优化措施。 |
| **APCu** | Symfony 用于存储元数据的内存键值缓存。安装 APCu PHP 扩展并在 Symfony 缓存配置中进行设置。 |
| **Redis / Memcached** | 对于高流量平台，配置外部缓存后端。在 `config/packages/cache.yaml` 中设置缓存适配器。 |

### 推荐的 OPcache 设置

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; 在生产环境中设置为 0 以获得最佳性能
opcache.revalidate_freq=0
```

当 `validate_timestamps` 设置为 0 时，您必须在部署新代码后清除 OPcache（重启 PHP-FPM 或调用 `opcache_reset()`）。

## 延迟加载

| 设置 | 描述 |
|---------|-------------|
| **延迟加载图片** | 在图片上启用 `loading="lazy"` 属性，使屏幕外的图片仅在滚动到视图中时加载。减少初始页面加载时间。 |
| **延迟加载 JavaScript** | 异步加载非关键 JavaScript 文件，以避免阻塞页面渲染。 |

## CDN（内容分发网络）

对于服务于多个地理区域用户的平台，CDN 可以显著提高静态资源（CSS、JavaScript、图片）的加载速度。

配置 CDN 的步骤：

1. 设置一个指向您的 Chamilo 服务器的 CDN 分发（例如 CloudFront、Cloudflare 或其他提供商）。
2. 在您的环境或 Symfony 配置中配置资源基础 URL，以便通过 CDN 提供静态资源。
3. 为静态文件设置适当的缓存头（对版本化资源设置较长的过期时间）。

## 数据库优化

| 行动 | 描述 |
|--------|-------------|
| **使用数据库连接池** | 对于高并发平台，配置连接池以减少建立数据库连接的开销。 |
| **优化查询** | Chamilo 为常见查询提供了数据库索引。定期在 MySQL/MariaDB 上运行 `ANALYZE TABLE` 以保持查询计划器统计数据的最新状态。 |
| **分离数据库服务器** | 对于大型安装，将数据库运行在专用服务器上，而不是与 Web 服务器共享资源。 |

## Web 服务器配置

| 优化 | 描述 |
|--------------|-------------|
| **启用 gzip/brotli 压缩** | 压缩 HTML、CSS 和 JavaScript 响应。大多数 Web 服务器原生支持此功能。 |
| **静态文件缓存** | 为静态资源设置较长的 `Cache-Control` 和 `Expires` 头。 |
| **PHP-FPM 调优** | 根据可用 RAM 和预期并发量调整 `pm.max_children`、`pm.start_servers` 和 `pm.max_requests`。 |
| **HTTP/2** | 在 Web 服务器中启用 HTTP/2，以实现多路复用连接和头部压缩。 |

## 小贴士

* **OPcache 是最大的性能提升点** -- 在进行其他优化之前，确保它已启用并正确配置大小。
* **切勿在生产环境中运行 `APP_ENV=dev`** -- 调试工具栏和分析器会为每个请求增加显著的开销。
* **调优前先监控** -- 使用 New Relic、Blackfire 或 Symfony 内置的分析器（在开发模式下）等工具来识别实际瓶颈，而不是凭猜测。
* **每次部署后预热缓存**，以避免第一个用户遇到未缓存的慢速请求。