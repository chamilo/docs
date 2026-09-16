# 效能調校

效能設定有助於優化 Chamilo，以加快頁面載入並更有效地運用資源，尤其適用於同時線上使用者眾多的平台。

> **補充參考**：您的 Chamilo 安裝內含一份較完整的優化指南。請在瀏覽器中開啟 `/documentation/optimization.html`（例如 `https://your-chamilo-site/documentation/optimization.html`），以取得針對您版本的伺服器層級建議。

## Symfony Cache

Chamilo 3.0 建置於 Symfony 之上，後者會針對路由、相依性注入與範本使用編譯後的快取。妥善管理此快取對效能至關重要。

### 清除快取

在變更設定、部署或升級之後，請清除 Symfony 快取：

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

在正式環境中，請務必在 `.env.local` 檔案中設定 `APP_ENV=prod`。開發環境（`APP_ENV=dev`）會帶來大量除錯負擔，絕不可用於正式環境。

### 快取預熱

清除快取後，請進行預熱以預先編譯範本與設定：

```bash
php bin/console cache:warmup --env=prod
```

## 快取策略

| 策略 | 說明 |
|----------|-------------|
| **OPcache** | PHP 內建的 opcode 快取。請確認已在 `php.ini` 中啟用，並配置足夠記憶體（`opcache.memory_consumption=256`）。這是影響最大的單一效能優化。 |
| **APCu** | Symfony 用來儲存中繼資料的記憶體內鍵值快取。請安裝 APCu PHP 擴充，並在 Symfony 快取設定中加以配置。 |
| **Redis / Memcached** | 對於高流量平台，請配置外部快取後端。在 `config/packages/cache.yaml` 中設定快取配接器。 |

### 建議的 OPcache 設定

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

當 `validate_timestamps` 設為 0 時，部署新程式碼後必須清除 OPcache（重新啟動 PHP-FPM 或呼叫 `opcache_reset()`）。

## 延遲載入

| 設定 | 說明 |
|---------|-------------|
| **延遲載入圖片** | 在圖片上啟用 `loading="lazy"` 屬性，使畫面外的圖片僅在捲動進入可視範圍時才載入。可縮短初始頁面載入時間。 |
| **延遲載入 JavaScript** | 以非同步方式載入非關鍵 JavaScript 檔案，避免阻擋頁面轉譯。 |

## CDN（內容傳遞網路）

對於服務多個地理區域使用者的平台，CDN 可大幅改善靜態資產（CSS、JavaScript、圖片）的載入時間。

設定 CDN 的步驟：

1. 建立 CDN 發佈（例如 CloudFront、Cloudflare 或其他供應商），並指向您的 Chamilo 伺服器。
2. 在環境或 Symfony 設定中配置資產基礎 URL，使靜態資產經由 CDN 提供。
3. 為靜態檔案設定適當的快取標頭（對已版本化的資產使用較長的過期時間）。

## 資料庫優化

| 動作 | 說明 |
|--------|-------------|
| **使用資料庫連線集區** | 對於高並行平台，請配置連線集區，以降低建立資料庫連線的負擔。 |
| **優化查詢** | Chamilo 已為常見查詢提供資料庫索引。請定期在 MySQL/MariaDB 上執行 `ANALYZE TABLE`，以維持查詢規劃器統計資料的時效性。 |
| **獨立資料庫伺服器** | 對於大型安裝，請將資料庫放在專用伺服器上執行，而非與網頁伺服器共用資源。 |

## 網頁伺服器設定

| 優化項目 | 說明 |
|--------------|-------------|
| **啟用 gzip/brotli 壓縮** | 壓縮 HTML、CSS 與 JavaScript 回應。多數網頁伺服器原生支援此功能。 |
| **靜態檔案快取** | 為靜態資產設定較長的 `Cache-Control` 與 `Expires` 標頭。 |
| **PHP-FPM 調校** | 依可用 RAM 與預期並行量調整 `pm.max_children`、`pm.start_servers` 與 `pm.max_requests`。 |
| **HTTP/2** | 在網頁伺服器中啟用 HTTP/2，以支援多工連線與標頭壓縮。 |

## 提示

* **OPcache 是效益最大的單一措施**——在進行其他優化之前，請先確認已啟用並配置適當大小。
* **絕不可在正式環境使用 `APP_ENV=dev`**——除錯工具列與分析器會為每個請求增加可觀負擔。
* **先監控再調校**——使用 New Relic、Blackfire 或 Symfony 內建分析器（於開發模式）等工具找出實際瓶頸，而非憑猜測。
* **每次部署後預熱快取**，以免第一位使用者碰到尚未快取的緩慢請求。