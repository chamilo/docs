# 配置

Chamilo 2.0 使用環境變數和 Symfony 配置文件來進行核心設置。本頁面涵蓋了主要的配置文件和變數。

## 環境變數 (.env)

主要的配置文件是位於 Chamilo 根目錄下的 `.env` 檔案。此檔案包含特定環境的設置，不應提交到版本控制中。

Chamilo 提供了一個預設的 `.env.dist` 檔案，其中包含了有說明文件的預設值。請創建 `.env` 檔案（啟動安裝時必須有此檔案）以覆蓋您環境中的值。

### 主要變數

| 變數 | 描述 | 範例 |
|----------|-------------|---------|
| `APP_ENV` | 應用程式環境，在 Symfony 層級上。生產環境使用 `prod`，開發環境使用 `dev`，測試環境使用 `test`。 | `prod` |
| `APP_SECRET` | 用於 CSRF 令牌、Cookie 簽名和其他加密操作的隨機字串。Chamilo 會為每次安裝生成唯一值，請勿修改。 | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | 資料庫主機，預設為 localhost。 | `localhost` |
| `DATABASE_PORT` | 資料庫端口，MySQL/MariaDB 預設為 3306。 | `3306` |
| `DATABASE_NAME` | 資料庫名稱，由您在安裝精靈中提供。 | 見下文。 |
| `DATABASE_USER` | 資料庫使用者名稱，由您在安裝精靈中提供。 | 見下文。 |
| `DATABASE_PASSWORD` | 資料庫使用者的密碼，由您在安裝精靈中提供。 | 見下文。 |
| `TRUSTED_PROXIES` | （可選）如果您將 Chamilo 託管在反向代理後面，需在此提供反向代理的 IP 地址，以便 Chamilo 正確解釋請求並生成回應。 | |

.env 中的其他設置相對較少被修改。

請注意，在未來的版本中，DATABASE_* 設置將合併為單一的 `DATABASE_URL` 變數。

電子郵件發送配置會在安裝過程中顯示，但稍後可在管理儀表板的「平台設置」部分進行修改。

## Symfony 配置 (config/ 目錄)

Symfony 層級的配置位於 `config/` 目錄中。這些 YAML 檔案控制框架行為、服務定義和套件特定設置。

修改這些檔案並不常見，且更改可能導致您的入口網站無法運作，因此如果您必須確保系統的可用性，請勿嘗試修改這些檔案。

### 主要配置文件

| 檔案 | 用途 |
|------|---------|
| `config/authentication.yaml` | 認證方法配置。 |
| `config/packages/doctrine.yaml` | 資料庫和 ORM 配置。 |
| `config/packages/security.yaml` | 認證、防火牆、存取控制和角色層級。 |
| `config/packages/cache.yaml` | 快取適配器配置（檔案系統、APCu、Redis）。 |
| `config/packages/framework.yaml` | 一般 Symfony 框架設置（會話、CSRF、路由器、HTTP 快取）。 |
| `config/packages/twig.yaml` | 模板引擎配置。 |
| `config/services.yaml` | 應用程式服務定義和依賴注入。 |

### 環境特定覆蓋

Symfony 支援針對不同環境的配置。當 `APP_ENV=prod` 時，`config/packages/prod/` 中的檔案會覆蓋預設值；當 `APP_ENV=dev` 時，`config/packages/dev/` 中的檔案會覆蓋預設值。

例如，`config/packages/prod/monolog.yaml` 通常配置的日誌詳細程度比開發環境的對應檔案低。

Chamilo 本身在軟體中未定義 `config/packages/prod/` 中的任何配置，因此如果您想自訂 `config/packages/*.yaml` 中的設置，只需在該目錄內創建 yaml 檔案的副本並更改設置即可。

## 檔案權限

我們在 2.0+ 版本中努力確保只有單一目錄需要權限。這是 `var/` 目錄，為了避免複雜問題，只需將整個資料夾設置為可由網頁伺服器系統使用者寫入即可。

在基於 Debian 的系統上適當設置權限：

```bash
# 對於網頁伺服器以 www-data 身份運行的系統
chown -R www-data:www-data var/
chmod -R 775 var/
```

## 常見配置任務

### 切換到生產模式

```bash
# 在 .env 中
APP_ENV=prod
APP_DEBUG=0
```

然後清除並預熱快取：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### 配置受信任的代理

如果 Chamilo 在反向代理或負載平衡器後面運行，配置受信任的代理以便 HTTPS 檢測和客戶端 IP 解析正確運作：

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### 配置會話儲存

預設情況下，會話儲存在檔案系統上。對於多伺服器部署，配置 Redis 或資料庫支持的會話：

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## 提示

* **切勿直接編輯 `.env.dist`** -- 請始終使用 `.env` 來進行您的覆蓋設定。`.env.dist` 文件可能在升級過程中被覆蓋。
* **在生產環境中保持 `APP_DEBUG=0`** -- 除錯模式會在錯誤頁面中暴露敏感資訊。
* **單獨備份 `.env`**，因為它包含憑證資訊且被排除在版本控制之外，應與程式碼庫分開保存。