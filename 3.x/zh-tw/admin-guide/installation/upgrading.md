# 升級

注意：本頁以 3.0.0 作為嚴格版本號，並以 3.x 指稱所有以數字 3 開頭的版本（3.0.0、3.0.1、3.1.0 等）。2.x 亦採用相同慣例。

從 1.11.x 升級的流程，亦記載於您 Chamilo 程式碼中的 `public/documentation/installation_guide.html` 檔案。此處資訊大致重複。您可於線上查看：`https://campus.chamilo.net/documentation/installation_guide.html`。

**請升級至 3.0，而非 2.x。** 3.0 為目前發行版本，且部分 1.11.x 設定在 2.0.0 中尚無對應項目。因此 1.11.x 系統應直接升級至 3.0。我們已廣泛測試類似遷移，但每套平台都有其自身歷史：請先在測試環境嘗試，並考慮由[官方 Chamilo 供應商](https://chamilo.org/providers)專業陪同進行此項作業。

## 從 1.11.x 升級至 3.0

從 Chamilo 1.11.x 升級至 3.0 是一次**重大遷移**，而非單純更新。Chamilo 2.0 以 Symfony 框架重建，資料庫結構、新 API 與檔案組織皆已重整，3.0 延續此路線。請審慎規劃此次遷移，並在正式上線前先於測試環境演練。

### 開始之前

1. **閱讀發行說明**，了解 Chamilo 3.x 的變更、新功能，以及 1.11.x 中哪些功能可能尚未提供。
2. **完整備份**：
   - 完整資料庫傾印（`mysqldump` 或同等工具）。
   - Chamilo 1.11.x 安裝目錄中的所有檔案，尤其是 `app/upload/`、`app/courses/` 與 `main/`。
   - 您的 `configuration.php` 檔案。
3. **務必先在預備伺服器上測試。** 切勿直接在正式伺服器上執行遷移。
4. **確認伺服器需求。** Chamilo 3.x 的需求與 1.11.x 不同（尤其是 PHP 8.3 或更新版本——安裝程式會拒絕任何較舊版本）。請參閱[伺服器需求](server-requirements.md)。
5. **從 1.11.x 資料庫刪除 `version` 資料表。** 此步驟為必要。Chamilo 2.x 及之後版本以同名資料表（欄位不同）儲存 Doctrine 遷移歷史。若保留 1.11.x 的該表，升級會立即停止。Chamilo 1.11.x 運作並不需要此表。
6. **將新程式碼解壓至新目錄。** 1.11.x 檔案維持原位。安裝程式會將其讀取為課程與上傳檔案的來源，並將結果寫入新目錄樹。

### 執行升級

您可透過網頁精靈或命令列執行升級。

#### 網頁精靈

1. 將虛擬主機的 `DocumentRoot` 指向新目錄樹的 `public/` 子目錄。
2. 開啟您的 URL。因新目錄樹尚無 `.env` 檔，精靈會啟動。
3. 在步驟 2 選擇升級選項，並提供您 1.11.x 安裝的根路徑。
4. 依精靈完成至結束。

#### 命令列

將 `UPDATE_PATH` 設為您 1.11.x 安裝的根目錄，然後執行遷移：

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

請先提高 `memory_limit` 與 `max_execution_time`。遷移會讀取每一個課程檔案，因此所需資源遠高於預設值。

#### 所需時間

時間取決於資料庫與課程檔案的規模。作為參考，一套 1.11.28 平台（238 張資料表、11 門課程、63 位使用者、1489 個課程檔案）耗時 **6 分鐘**、記憶體 1.7 GB，並執行了 393 次遷移。大型正式平台可能需要數小時。請規劃維護時段，並在正式環境執行前閱讀 [Chamilo 論壇](https://chamilo.org) 或聯絡[官方供應商](https://chamilo.org/providers)。

### 可能需要人工處理的項目

| 範圍 | 說明 |
|------|-------|
| **自訂外掛** | 1.11.x 外掛無法在 2.x 或 3.x 運作，必須改寫或替換。官方外掛自 2.0 起已逐步移植——請查看您版本的外掛清單以確認可用項目。 |
| **自訂佈景主題** | 1.11.x 佈景主題無法在 2.x 或 3.x 運作。請使用 3.x 主題系統重新建立品牌識別。 |
| **自訂資料庫修改** | 任何在 Chamilo 之外直接修改的資料庫內容可能不會被遷移。 |
| **SCORM 套件** | SCORM 內容應可遷移，但請個別測試套件以確認播放。 |
| **外部整合** | 任何使用 1.11.x API 或網路服務的整合，需改為使用以 [API Platform](https://github.com/api-platform/api-platform) 為基礎的 2.x 僅 REST API。 |

## 從 2.x 升級至 3.0

此次升級沿用既有目錄與既有資料庫。您將新程式碼覆蓋至舊目錄樹，然後透過網頁精靈或命令列執行遷移。

### 先填入遷移歷史

Chamilo 會直接從實體定義安裝資料庫結構，因此由安裝程式建立的安裝會擁有最終結構，但遷移歷史為**空**。Chamilo 3.0 之前建立的安裝從未寫入該歷史。有兩件事依賴它：

* `doctrine:migrations:migrate` 依此決定要執行哪些遷移。歷史為空時，它會嘗試從頭重放每一筆遷移，而結構其實已經是最新的。
* 網頁安裝程式依此判斷是否有待執行的升級。歷史為空時會拒絕請求，因為沒有任何證據顯示需要升級。

因此只需填入一次，並遵守下列順序。

> **警告：請在複製新程式碼之前先填入歷史。** 這些指令會把**目前部署**的程式碼所攜帶的每一筆遷移標記為已執行。若在複製 3.0 程式碼之後才執行，它們也會標記 3.0 的遷移，升級就永遠不會執行。

在目前版本仍就位時執行：

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

第一道指令建立歷史資料表。第二道標記目前版本的遷移。若資料表尚不存在，`doctrine:migrations:version` 本身會失敗，因此請勿略過第一道。

檢查結果：

```bash
php bin/console doctrine:migrations:status
```

`Executed` 必須等於 `Available`，且 `New` 必須為 0。此時再複製 3.0 程式碼。

### 執行升級

複製新程式碼後，可開啟您的 URL 並依精靈操作，或從命令列執行遷移：

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

網頁精靈僅在遷移待執行時開啟。升級完成後，它會再次回應 `409 Conflict`，這正是保護機制：精靈本身沒有登入。

## 更新 Chamilo 3.0.x

3.0 分支內的次要更新較為直接。

### 更新流程

#### 使用套件

1. **備份**資料庫與檔案。

2. 從 [chamilo.org](https://chamilo.org/download) **下載最新的 3.0.x 版本**：

3. **在本機解壓縮**

例如（依下載的版本調整）
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **將檔案複製到現有的 Chamilo 安裝之上**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **執行資料庫遷移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除快取：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **變更權限**

依您的網頁伺服器使用者調整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **驗證**平台能正確載入，並抽查關鍵功能。

#### 使用 Git

若您是以 Git 安裝 Chamilo，可改依下列說明操作。

1. **備份**資料庫與檔案。

2. **拉取最新程式碼**（或下載新發行版）：
   ```bash
   git pull origin 3.0
   ```

3. **更新 PHP 相依套件：**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **更新 JavaScript 相依套件並重建資產：**
   ```bash
   yarn install && yarn build
   ```

5. **執行資料庫遷移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除快取：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **變更權限**

依您的網頁伺服器使用者調整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **驗證**平台能正確載入，並抽查關鍵功能。

### 自動化更新

對於管理多個 Chamilo 實例的機構，可考慮將更新流程腳本化：

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## 提示

* **升級前務必先備份。** 資料庫遷移無法透過 Chamilo 介面還原。
* **請先在測試環境驗證** —— 尤其是從 1.11.x 遷移至 3.0 時，會涉及大量資料轉換。
* **請在維護時段進行升級**，避免使用者正在使用平台。
* **訂閱 GitHub 發行版本**，於 [Github](https://github.com/chamilo/chamilo-lms/releases) 使用鈴鐺圖示，以便收到新版本與安全性修補的通知。
* **若精靈顯示 `Chamilo is already installed`**，表示未發現待執行的遷移。請執行 `php bin/console doctrine:migrations:status` 進行檢查。若平台運作正常但 `Executed` 為 0，代表遷移歷史從未被植入 —— 請參閱 [先植入遷移歷史](#seed-the-migration-history-first)。
* **Chamilo 3.0 尚未提供自動下載新版本的功能**，但這是持續進行中的專案，我們希望能盡快推出。升級本身已可透過網頁精靈執行。