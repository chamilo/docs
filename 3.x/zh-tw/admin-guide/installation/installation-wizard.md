# 安裝精靈

Chamilo 3.0 內建以網頁為基礎的安裝精靈，可引導您完成初始設定。當您首次存取平台時，精靈會自動執行。

## 開始之前

請確認已滿足下列先決條件：

1. 您的伺服器符合所有[伺服器需求](server-requirements.md)。
2. 您已下載 Chamilo 的套件版本（zip 或 tar.gz）。
3. 您的網頁伺服器已設定以 `public/` 目錄作為文件根目錄。
4. 您的 `.env` 檔案已存在且為空白（精靈將引導資料庫設定）。

## 步驟 1：安裝語言

![安裝精靈步驟 1 — 語言選擇](../../.gitbook/assets/install-step1-language.png)

第一個步驟可讓您選擇安裝過程所使用的語言。請從下拉選單中選擇您偏好的語言。

若 Chamilo 偵測到既有安裝（用於升級），將顯示遷移狀態，並提供升級路徑，而非全新安裝。

## 步驟 2：需求檢查

![安裝精靈步驟 2 — 需求檢查，顯示 PHP 版本、擴充功能與目錄權限](../../.gitbook/assets/install-step2-requirements.png)

精靈會檢查您的伺服器環境：

* **PHP version** 為 8.3、8.4 或 8.5
* **Required PHP extensions** 已安裝（intl、gd、curl、zip、mbstring、xml 等）
* **Recommended PHP settings** — 已設定 `date.timezone`，並具備足夠的上傳／記憶體限制
* **Directory and file permissions** — `var/`、`config/` 與 `public/upload/` 可由網頁伺服器寫入

若有任何需求未滿足，精靈會顯示警告或錯誤。請先排除問題再繼續。

## 步驟 3：授權條款

![安裝精靈步驟 3 — 授權條款接受](../../.gitbook/assets/install-step3-license.png)

此步驟會顯示 GNU/GPLv3 授權條款。您必須勾選 **「I accept」** 核取方塊才能繼續。

您也可以選擇展開 **Contact information** 區段，提供貴機構的詳細資料（名稱、電子郵件、公司、國家）。此為自願填寫，有助於 Chamilo 社群了解平台使用者，同時也讓我們能*極少次數*地與您聯繫，告知您附近即將舉辦的活動。

## 步驟 4：資料庫設定

![安裝精靈步驟 4 — 資料庫連線設定](../../.gitbook/assets/install-step4-database.png)

請輸入您的資料庫連線詳細資料：

| 欄位 | 說明 |
|-------|-------------|
| **Database host** | 資料庫伺服器的主機名稱或 IP（例如 `localhost` 或 `127.0.0.1`） |
| **Database port** | 預設：MySQL/MariaDB 為 3306 |
| **Database name** | 要使用的資料庫名稱（僅限英數字與底線） |
| **Database user** | 對指定資料庫具有完整權限的資料庫使用者 |
| **Database password** | 該資料庫使用者的密碼 |

按一下 **Check database connection** 進行測試。連線成功前，精靈不會讓您繼續。若資料庫已存在，會顯示警告。

## 步驟 5：組態設定

![安裝精靈步驟 5 — 管理員帳號、入口網站設定與電子郵件組態](../../.gitbook/assets/install-step5-config.png)

此步驟整合管理員帳號建立、入口網站設定與電子郵件組態。

### 管理員帳號

| 欄位 | 說明 |
|-------|-------------|
| **Login** | 管理員使用者名稱 |
| **Password** | 請選擇強固密碼 — 此帳號擁有完整平台存取權 |
| **First name** | 管理員的名字 |
| **Last name** | 管理員的姓氏 |
| **Email** | 用於系統通知與密碼重設 |
| **Phone** | 選填聯絡電話 |

這些管理員資料也會由 Chamilo 用來填入支援聯絡資訊，因此請務必在安裝完成後於設定中重新調整。

### 入口網站設定

| 欄位 | 說明 |
|-------|-------------|
| **Language** | 預設介面語言 |
| **Portal name** | 您的平台名稱（例如「My Organization LMS」） |
| **Company short name** | 貴機構的簡稱 |
| **Company URL** | 貴機構的網站 |
| **Encryption method** | 密碼雜湊演算法 — 建議使用 **bcrypt** |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### 電子郵件組態

電子郵件設定區段可讓您設定郵件傳輸方式（SMTP、Amazon SES、Mailjet 等）並測試郵件傳送。詳情請參閱[電子郵件組態](email-configuration.md)。

以上所有設定之後皆可從管理面板變更。

## 步驟 6：安裝前最後檢查

![安裝精靈步驟 6 — 安裝前檢視所有設定](../../.gitbook/assets/install-step6-review.png)

此步驟會顯示您所輸入全部內容的摘要，供您檢視：

* 管理員憑證（密碼預設為隱藏 — 點擊眼睛圖示即可顯示）
* 入口網站設定
* 資料庫連線詳細資料

請仔細檢視，然後點擊 **Install Chamilo** 以執行安裝。精靈會建立所有資料庫資料表、填入初始資料，並設定平台。

## 步驟 7：安裝完成

![安裝精靈步驟 7 — 完成畫面，含安全性建議與入口網站連結](../../.gitbook/assets/install-step7-complete.png)

安裝成功完成後，精靈會顯示：

* **入門建議** — 建議建立您的第一門課程以探索平台（身為管理員，您需從管理面板進行此操作）
* **安全性建議**：
  * 將 `config/` 目錄設為唯讀（`chmod 0555`）
  * 刪除 `public/main/install/` 目錄
* 一個**通往您入口網站的連結**，以便使用您剛建立的管理員憑證登入

## 安裝後作業

完成精靈後：

* **移除或限制安裝程式的存取** -- 安裝完成後不應再能存取精靈。Chamilo 通常會自動鎖定，但請確認再次造訪安裝 URL 會重新導向至登入頁面。
* **設定電子郵件傳送** -- 請參閱 [電子郵件設定](email-configuration.md)。
* **設定備份** -- 在新增內容之前，請設定自動化的資料庫與檔案備份（Chamilo 不提供此解決方案，但複製 var/ 資料夾與資料庫是最重要的兩項）。
* **檢視安全性設定** -- 請參閱 [安全性設定](../platform-settings/security-settings.md)。

## 疑難排解

| 問題 | 解決方法 |
|---------|----------|
| 安裝 URL 出現空白頁 | 檢查 PHP 錯誤記錄。暫時在 .env 中改為 `APP_ENV=dev`，以便在瀏覽器中查看錯誤。 |
| 資料庫連線失敗 | 驗證憑證、確認資料庫存在，並檢查資料庫伺服器是否允許來自網頁伺服器主機的連線。 |
| 權限被拒錯誤 | 確保網頁伺服器使用者對 `var/` 具有寫入權限。 |
| 資產無法載入（沒有 CSS/JS） | 執行 `yarn install && yarn build` 以編譯前端資產。 |