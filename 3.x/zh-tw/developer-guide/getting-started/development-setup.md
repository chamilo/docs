# 開發環境設定

## 先決條件

* PHP 8.3、8.4 或 8.5，並啟用擴充：intl、gd、curl、zip、mbstring、xml、json、pdo、ldap、exif、bcmath
* Composer
* Node.js 與 npm（或 Yarn — 本專案使用 Yarn 4；確切鎖定版本請見 `package.json`）
* MySQL 5.7+ 或 MariaDB 10.11+
* Git

## 安裝步驟

### 1. 複製儲存庫

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. 安裝 PHP 相依套件

```bash
composer install
```

### 3. 設定環境

儲存庫附有 `.env.dist` 作為參考。請建立一個空的 `.env` 檔，由網頁安裝程式填入內容 — 保持空白可確保升級時不會覆寫您的本機設定：

```bash
touch .env
```

接著讓網頁伺服器對 `.env` 與 `config/` 具有寫入權限，以便安裝程式寫入本機設定：

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. 安裝前端相依套件並建置

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. 啟動開發伺服器

```bash
symfony server:start
```

或使用 Apache/Nginx，並將文件根目錄指向 `public/`。

### 6. 設定資料庫

在瀏覽器中開啟您的 Chamilo 網址，執行網頁安裝精靈。

### 7. 產生 JWT 金鑰

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. 強化系統安全

`.env` 檔與 `config/` 目錄僅需在安裝期間可寫入。安裝完成後請鎖定權限：

```bash
sudo chown -R root: .env config/
```

`var/` 目錄仍須維持網頁伺服器可寫入。


## 建置指令

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | 建置開發用前端 |
| `yarn encore dev --watch` | 建置並監看變更 |
| `yarn encore production` | 建置最佳化的正式環境版本 |
| `php bin/console cache:clear` | 清除 Symfony 快取 |

## 開發提示

* 在 `.env` 中設定 `APP_ENV=dev` 與 `APP_DEBUG=1`，以顯示詳細錯誤訊息
* 開發模式下，頁面底部會出現 Symfony 除錯工具列
* 當 `APP_ENABLE_API_ENTRYPOINT=true` 時，可於 `/api` 取得 API 文件（需先清除快取 — 請見 [組態設定](../../admin-guide/installation/configuration.md#enable-the-api-documentation)）
* 使用 `yarn encore dev --watch` 可在前端變更時自動重新建置