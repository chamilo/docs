# 升級

注意：在此頁面中，我們使用 2.0.0 作為嚴格的版本號，而 2.x 則指代所有以數字 2 開頭的版本（例如 2.0.0、2.0.1、2.1.0 等）。

從 1.11.x 升級到 2.x 的過程在您的 Chamilo 程式碼中的 `public/documentation/installation_guide.html` 檔案中有詳細描述。此處的資訊大部分是重複的。您可以在 `https://campus.chamilo.net/documentation/installation_guide.html` 在線查看。儘管我們已經對類似的遷移進行了廣泛測試，但由於 1.11.x 的某些設定在 2.0.0 中尚未得到支援，我們建議等待 2.1 版本再升級 1.11.x 系統，或者在這一過程中尋求 [官方 Chamilo 提供商](https://chamilo.org/providers) 的專業協助。

## 從 1.11.x 升級到 2.x

從 Chamilo 1.11.x 升級到 2.x 是一次**重大遷移**，而不僅僅是簡單的更新。Chamilo 2.0 基於 Symfony 框架重建，資料庫結構進行了重組，引入了新的 API，並調整了檔案組織結構。請仔細規劃此次遷移，並在生產環境部署前先在測試環境中進行嘗試。

### 開始之前

1. **閱讀發行說明**：了解 Chamilo 2.x 的變化、新功能以及 1.11.x 中可能尚未提供的功能。
2. **備份所有內容**：
   - 完整資料庫轉儲（使用 `mysqldump` 或類似工具）。
   - Chamilo 1.11.x 安裝目錄中的所有檔案，特別是 `app/upload/`、`app/courses/` 和 `main/`。
   - 您的 `configuration.php` 檔案。
3. **先在測試伺服器上進行測試。** 切勿直接在生產伺服器上運行遷移。
4. **驗證伺服器要求。** Chamilo 2.x 的要求與 1.11.x 不同（特別是需要 PHP 8.2+）。請參閱[伺服器要求](server-requirements.md)。

### 可能需要手動處理的事項

| 領域 | 說明 |
|------|-------|
| **自訂插件** | 1.11.x 的插件與 2.x 不相容。必須重寫或替換插件，部分工作已在 2.0 中完成，官方插件預計將在 2.1 版本中完全適配。 |
| **自訂主題** | 1.11.x 的主題在 2.x 中無法使用。需使用 2.x 的主題系統重新建立品牌樣式。 |
| **自訂資料庫修改** | 任何在 Chamilo 之外直接對資料庫進行的修改可能無法遷移。 |
| **SCORM 套件** | SCORM 內容應能遷移，但需逐個測試套件以驗證播放效果。 |
| **外部整合** | 任何使用 1.11.x API 或 Web 服務的整合需更新為使用 2.x 的純 REST API，基於 [API Platform](https://github.com/api-platform/api-platform)。 |

## 更新 Chamilo 2.0.x

在 2.0 分支內的次要更新相對簡單。

### 更新流程

#### 使用安裝包

1. **備份**資料庫和檔案。

2. **從 [chamilo.org](https://chamilo.org/download) 下載最新的 2.0.x 版本**：

3. **本地解壓**

例如（根據下載的版本進行調整）：
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **將檔案複製到現有的 Chamilo 安裝目錄**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **運行資料庫遷移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除快取：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **更改權限**

根據您的 Web 伺服器使用者進行調整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **驗證**平台是否正常載入，並抽查關鍵功能。

#### 使用 Git

如果您使用 Git 安裝了 Chamilo，可以按照以下說明操作。

1. **備份**資料庫和檔案。

2. **拉取最新程式碼**（或下載新版本）：
   ```bash
   git pull origin 2.0
   ```

3. **更新 PHP 依賴：**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **更新 JavaScript 依賴並重新建置資源：**
   ```bash
   yarn install && yarn build
   ```

5. **運行資料庫遷移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除快取：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **更改權限**

根據您的 Web 伺服器使用者進行調整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **驗證**平台是否正常載入，並抽查關鍵功能。

### 自動化更新

對於管理多個 Chamilo 實例的組織，可以考慮編寫腳本以自動化更新過程：

```bash
#!/bin/bash
set -e

# 拉取程式碼
git pull origin 2.0

# 依賴
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# 資料庫
php bin/console doctrine:migrations:migrate --no-interaction

# 快取
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "更新完成。"
```

---

---
## 提示

* **升級前務必進行備份。** 資料庫遷移無法透過 Chamilo 介面進行撤銷。
* **首先在測試環境中進行測試** —— 特別是從 1.11.x 升級到 2.0 的遷移，涉及大量資料轉換。
* **在維護窗口期間安排升級**，此時使用者不會積極使用平台。
* **訂閱 GitHub 發行版本**，在 [Github](https://github.com/chamilo/chamilo-lms/releases) 上使用鈴鐺圖示，以便接收新版本和安全補丁的通知。
* **Web 更新** 在 Chamilo 2.0 中尚未提供，但這是一個正在進行的專案，我們希望很快能發布。