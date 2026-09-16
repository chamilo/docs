# 組態設定

Chamilo 3.0 使用環境變數與 Symfony 組態檔來管理核心設定。本頁說明重要的組態檔與變數。

## 環境變數（.env）

主要組態檔為 Chamilo 根目錄中的 `.env`。此檔包含不應提交至版本控制的環境專屬設定。

Chamilo 隨附預設的 `.env.dist` 檔，其中含有附說明的預設值。請建立 `.env`（啟動安裝程序時為必要）以覆寫您環境中的值。

### 重要變數

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | Symfony 層級的應用程式環境。正式環境使用 `prod`，開發使用 `dev`，測試使用 'test'。 | `prod` |
| `APP_SECRET` | 用於 CSRF 權杖、Cookie 簽章及其他密碼學作業的隨機字串。Chamilo 會為每次安裝產生唯一值。請勿修改。 | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | 資料庫主機。預設為 localhost | `localhost` |
| `DATABASE_PORT` | 資料庫連接埠。MySQL/MariaDB 預設為 3306 | `3306` |
| `DATABASE_NAME` | 資料庫名稱，由您在安裝精靈中指定。 | 見下文。 |
| `DATABASE_USER` | 資料庫使用者名稱，由您在安裝精靈中指定。 | 見下文。 |
| `DATABASE_PASSWORD` | 資料庫使用者密碼，由您在安裝精靈中指定。 | 見下文。 |
| `TRUSTED_PROXIES` | （選用）若 Chamilo 架設於反向代理之後，需在此提供反向代理的 IP，以便 Chamilo 正確解讀請求並產生回應。 | |
| `APP_ENABLE_API_ENTRYPOINT` | （選用）於 `/api` 公開互動式 API 文件（Swagger/OpenAPI）。預設關閉。需清除快取後才會生效——請見下方 [啟用 API 文件](#enable-the-api-documentation)。 | `true` |

.env 中的其他設定較少需要修改。

請注意，未來版本中 DATABASE_* 設定將合併為單一的 `DATABASE_URL` 變數。

電子郵件傳送組態會在安裝過程中呈現，之後可於管理儀表板的 `Platform settings` 區段修改。

## Symfony 組態（config/ 目錄）

Symfony 層級的組態位於 `config/` 目錄。這些 YAML 檔控制框架行為、服務定義與套件專屬設定。

整個 `config/` 目錄會隨每個 Chamilo 套件與每次更新一併提供——與 `.env` 不同，升級時不會被排除或特別保留。**直接修改 `config/` 或 `config/packages/` 下的檔案，下次更新 Chamilo 時將被靜默覆寫。** 請見下方 [依環境覆寫](#environment-specific-overrides)，以了解在不遺失變更的情況下自訂組態的支援方式。

通常很少需要修改這些檔案，且變更可能導致入口網站無法運作，因此若必須確保系統可用性，請勿嘗試修改。

### 重要組態檔

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | 驗證方法組態。 |
| `config/packages/doctrine.yaml` | 資料庫與 ORM 組態。 |
| `config/packages/security.yaml` | 驗證、防火牆、存取控制與角色階層。 |
| `config/packages/cache.yaml` | 快取配接器組態（filesystem、APCu、Redis）。 |
| `config/packages/framework.yaml` | 一般 Symfony 框架設定（session、CSRF、router、HTTP 快取）。 |
| `config/packages/twig.yaml` | 範本引擎組態。 |
| `config/services.yaml` | 應用程式服務定義與相依注入。 |

### 依環境覆寫

Symfony 支援依環境的組態。當 `APP_ENV=prod` 時，`config/packages/prod/` 中的檔案會覆寫預設值；當 `APP_ENV=dev` 時，則由 `config/packages/dev/` 覆寫。

例如，`config/packages/prod/monolog.yaml` 通常會設定比開發環境更精簡的日誌。

Chamilo 軟體本身並未在 `config/packages/prod/` 中定義任何組態，因此若要自訂 `config/packages/*.yaml` 中的設定，**請勿編輯基礎檔**——請在 `config/packages/prod/`（或 `dev/`／`test/`，對應您要影響的環境）內建立同名檔案，僅包含您要覆寫的鍵，並將變更放在該處。

這一點很重要，因為基礎的 `config/packages/*.yaml` 檔屬於 Chamilo 套件：每次更新都會再次提供並覆寫既有內容，因此直接編輯無法在升級後保留。由於 Chamilo 從不在 `config/packages/prod/`（或 `dev/`／`test/`）下提供任何內容，該目錄不會被更新覆寫，是保存本機自訂的支援位置。

## 檔案權限

我們在 2.0+ 已盡力確保只需為單一目錄設定權限，3.0 仍維持此原則。該目錄即為 `var/`，為避免複雜問題，只要將整個資料夾設為可由網頁伺服器系統使用者寫入即可。

在以 Debian 為基礎的系統上適當設定權限：

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## 常見組態工作

### 切換至正式環境模式

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

接著清除並預熱快取：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### 啟用 API 文件

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

接著清除快取，使變更生效：

```bash
php bin/console cache:clear
```

互動式 API 文件（Swagger/OpenAPI）隨即可於 `/api` 使用。僅編輯 `.env` 並不足夠：解析後的值會寫入 Symfony 編譯後的快取，因此在清除快取之前，`/api` 會持續回傳先前狀態（啟用或未啟用）。管理面板中的 **系統 > 清除暫存檔案** 動作*不會*執行此操作 — 原因請見 [系統工具](../system/system-tools.md#clean-temporary-files) — 因此這項特定變更需要透過 shell 執行 `cache:clear`。

### 設定受信任的 Proxy

若 Chamilo 位於反向代理或負載平衡器之後，請設定受信任的 proxy，使 HTTPS 偵測與用戶端 IP 解析能正確運作：

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### 設定工作階段儲存

預設情況下，工作階段儲存在檔案系統上。對於多伺服器部署，請設定 Redis 或以資料庫為後端的工作階段：

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## 提示

* **切勿直接編輯 `.env.dist`** -- 覆寫設定一律使用 `.env`。升級時 `.env.dist` 檔案可能會被覆寫。
* **正式環境請維持 `APP_DEBUG=0`** -- 除錯模式會在錯誤頁面中暴露敏感資訊。
* **單獨備份 `.env`**，與程式碼庫分開，因為其中含有憑證，且已排除於版本控制之外。