# 效能調優

效能設定有助於優化 Chamilo 以實現更快的頁面載入速度和更好的資源利用率，特別是在擁有大量並發使用者的平台上。

> **額外參考**：您的 Chamilo 安裝包含一份擴充的優化指南。在瀏覽器中開啟 `/documentation/optimization.html`（例如 `https://your-chamilo-site/documentation/optimization.html`）以取得適用於您版本的伺服器層級建議。

## Symfony 快取

Chamilo 2.0 建基於 Symfony，後者使用編譯快取來處理路由、依賴注入和範本。管理此快取對於效能至關重要。

### 清除快取

在進行設定變更、部署或升級後，清除 Symfony 快取：

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

在生產環境中，務必確保在您的 `.env.local` 檔案中設定 `APP_ENV=prod`。開發環境（`APP_ENV=dev`）包含大量的除錯開銷，絕對不得用於生產環境。

### 快取預熱

清除快取後，執行預熱以預先編譯範本和設定：

```bash
php bin/console cache:warmup --env=prod
```

## 快取策略

| 策略 | 描述 |
|----------|-------------|
| **OPcache** | PHP 內建的 opcode 快取。確保在您的 `php.ini` 中啟用並分配足夠記憶體（`opcache.memory_consumption=256`）。這是效能優化中最具影響力的單一措施。 |
| **APCu** | Symfony 用於儲存中繼資料的記憶體鍵值快取。安裝 APCu PHP 延伸模組，並在 Symfony 快取設定中加以配置。 |
| **Redis / Memcached** | 對於高流量平台，配置外部快取後端。在 `config/packages/cache.yaml` 中設定快取配接器。 |

### 建議的 OPcache 設定

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

當 `validate_timestamps` 設定為 0 時，您必須在部署新程式碼後清除 OPcache（重新啟動 PHP-FPM 或呼叫 `opcache_reset()`）。

## 延遲載入

| 設定 | 描述 |
|---------|-------------|
| **延遲載入圖片** | 在圖片上啟用 `loading="lazy"` 屬性，使螢幕外圖片僅在滾動進入視窗時載入。減少初始頁面載入時間。 |
| **延遲 JavaScript 載入** | 非關鍵 JavaScript 檔案以非同步方式載入，避免阻礙頁面渲染。 |

## CDN（內容傳遞網路）

對於跨多個地理區域提供服務的使用者平台，CDN 可以大幅改善靜態資產（CSS、JavaScript、圖片）的載入時間。

配置 CDN 的步驟：

1. 設定 CDN 分發（例如 CloudFront、Cloudflare 或其他提供者），指向您的 Chamilo 伺服器。
2. 在環境或 Symfony 設定中配置資產基底 URL，使靜態資產透過 CDN 提供服務。
3. 為靜態檔案設定適當的快取標頭（針對版本化資產設定長到期時間）。

## 資料庫優化

| 動作 | 描述 |
|--------|-------------|
| **使用資料庫連線集區** | 對於高並發平台，配置連線集區以減少建立資料庫連線的開銷。 |
| **優化查詢** | Chamilo 已包含常見查詢的資料庫索引。定期在 MySQL/MariaDB 上執行 `ANALYZE TABLE` 以保持查詢規劃器的統計資料最新。 |
| **獨立資料庫伺服器** | 對於大型安裝，將資料庫運行在專用伺服器上，而非與網頁伺服器共用資源。 |

## 網頁伺服器配置

| 優化措施 | 描述 |
|--------------|-------------|
| **啟用 gzip/brotli 壓縮** | 壓縮 HTML、CSS 和 JavaScript 回應。大多數網頁伺服器原生支援此功能。 |
| **靜態檔案快取** | 為靜態資產設定長期的 `Cache-Control` 和 `Expires` 標頭。 |
| **PHP-FPM 調優** | 根據可用 RAM 和預期並發量調整 `pm.max_children`、`pm.start_servers` 和 `pm.max_requests`。 |
| **HTTP/2** | 在網頁伺服器中啟用 HTTP/2 以支援多工連線和標頭壓縮。 |

## 提示

* **OPcache 是最大的單一獲益** -- 在追求其他優化前，確保其已啟用並適當調整大小。
* **絕對不要以 `APP_ENV=dev` 運行生產環境** -- 除錯工具列和分析器會為每個請求增加大量開銷。
* **調優前先監控** -- 使用 New Relic、Blackfire 或 Symfony 內建分析器（開發模式）等工具來找出實際瓶頸，而非猜測。
* **每次部署後預熱快取** 以避免第一位使用者遇到緩慢的未快取請求。