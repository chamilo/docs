# 開發環境設定

## 先決條件

* PHP 8.2+ 並包含以下擴充套件：intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js 和 npm（或 Yarn — 專案使用 Yarn 4；請參閱 `package.json` 以取得確切的固定版本）
* MySQL 5.7+ 或 MariaDB 10.11+
* Git

## 安裝步驟

### 1. 複製儲存庫

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. 安裝 PHP 相依性

```bash
composer install
```

### 3. 設定環境

儲存庫提供 `.env.dist` 作為參考檔案。請建立一個空的 `.env` 檔案，由網頁安裝程式來填入內容 — 保持其為空狀態可確保升級時不會覆寫您的本機設定：

```bash
touch .env
```

然後將 `.env` 和 `config/` 設為可由網頁伺服器寫入，以便安裝程式能寫入您的本機設定：

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. 安裝前端相依性並建置

```bash
# 安裝 JavaScript 相依性
yarn install

# 建置開發用前端資源
yarn encore dev

# 或在開發期間監看變更
yarn encore dev --watch
```

### 5. 啟動開發伺服器

```bash
symfony server:start
```

或使用指向 `public/` 目錄的 Apache/Nginx。

### 6. 設定資料庫

在瀏覽器中前往您的 Chamilo URL 以執行基於網頁的安裝精靈。

### 7. 產生 JWT 金鑰

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. 保護您的系統

`.env` 檔案和 `config/` 目錄僅在安裝期間需要可寫入權限。安裝後請加以保護：

```bash
sudo chown -R root: .env config/
```

`var/` 目錄需要持續保持可由網頁伺服器寫入。


## 建置指令

| 指令 | 用途 |
|---------|---------|
| `yarn encore dev` | 建置開發用前端 |
| `yarn encore dev --watch` | 建置並監看變更 |
| `yarn encore production` | 建置生產環境最佳化版本 |
| `php bin/console cache:clear` | 清除 Symfony 快取 |

## 開發提示

* 在 `.env` 中設定 `APP_ENV=dev` 和 `APP_DEBUG=1` 以取得詳細的錯誤訊息
* Symfony 除錯工具列會在開發模式下顯示於頁面底部
* 當 `APP_ENABLE_API_ENTRYPOINT=1` 時，API 文件可在 `/api` 取得
* 使用 `yarn encore dev --watch` 以自動重新建置前端變更