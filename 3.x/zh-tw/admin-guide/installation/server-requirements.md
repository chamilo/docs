# 伺服器需求

在安裝 Chamilo 3.0 之前，請確認您的伺服器符合下列需求。

## 軟體需求

### PHP

| 需求 | 最低 | 建議 |
|-------------|---------|-------------|
| **PHP version** | 8.3 | 8.5 |

### 必要 PHP 擴充套件

| 擴充套件 | 用途 |
|-----------|---------|
| **bcmath** | 任意精度數學運算 |
| **ctype** | 字元類型檢查 |
| **curl** | HTTP 請求（API 整合、外部服務） |
| **dom**、**libxml**、**simplexml**、**xml**、**xmlreader** | XML 剖析與 DOM 處理（SCORM、RSS、SOAP、LTI） |
| **exif** | 讀取影像中繼資料（例如自動校正上傳相片方向） |
| **fileinfo** | 偵測上傳檔案的 MIME 類型 |
| **gd** | 影像處理（縮圖、CAPTCHA） |
| **iconv** | 字元集轉換 |
| **intl** | 國際化（日期、數字與字串格式化） |
| **json** | JSON 編碼／解碼 |
| **ldap** | LDAP 連接器。即使您可能不會使用 LDAP，Chamilo 仍要求安裝此擴充套件 |
| **mbstring** | 多位元組字串處理（UTF-8 支援） |
| **openssl** | 加密作業（HTTPS、密碼雜湊、JWT 權杖） |
| **pdo**，以及 **pdo_mysql** 或 **pdo_pgsql** | 資料庫連線（請安裝與您資料庫相符的驅動程式） |
| **soap** | SOAP 網路服務處理 |
| **zip** | 處理 ZIP 封存（SCORM 套件、批次匯入／匯出） |
| **zlib** | 多個相依套件內部使用的壓縮功能 |
| **apcu** | 使用者層級快取（建議安裝；安裝程式會檢查但不強制） |
| **opcache** | Opcode 快取（強烈建議以提升效能；安裝程式會檢查但不強制） |
| **xapian** | 全文搜尋（選用，僅在您使用搜尋功能時需要） |

### 資料庫

| 資料庫 | 最低版本 | 建議 |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 或更高 |
| **MySQL** | 5.7 | 8.0 或更高 |

MariaDB 10.2.2 以前的版本（以及 MySQL 5.7 以前的版本）需在安裝 Chamilo 前，於伺服器設定中手動啟用大型索引／前置碼支援。

### 網頁伺服器

| 伺服器 | 說明 |
|--------|-------|
| **Apache** | 需啟用 `mod_rewrite`（以及 `ssl`、`headers`、`expires`）。Chamilo 於 `public/main/install/apache.dist.conf` 提供範例虛擬主機設定。 |
| **Nginx** | 需手動設定 URL 重寫——Chamilo 未附帶 Nginx 範例設定。請參閱 Symfony Nginx 文件以取得參考設定。 |

### 建置工具

| 工具 | 用途 |
|------|---------|
| **Composer** (^2.8) | PHP 相依套件管理。安裝 Chamilo 的 PHP 函式庫時為必要。 |
| **Node.js** (20+ LTS) | JavaScript 執行環境。建置前端資產時為必要。 |
| **Yarn** (^4，透過 Corepack) | 用於建置前端資產的 JavaScript 套件管理器（`yarn install`、`yarn encore production`）。 |

## 硬體需求

| 資源 | 最低 | 建議 |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB 或更多（從原始碼建置前端資產本身至少需要 4 GB） |
| **CPU** | 2 vCPUs | 2 核心以上 |
| **磁碟空間** | 4 GB（僅應用程式） | 20 GB 以上（含上傳內容）；從原始碼建置期間約需 10 GB 可用空間 |
| **磁碟類型** | HDD | SSD（可顯著提升資料庫與快取效能） |

以上為 Chamilo 安裝指南中的基準數值。實際需求取決於同時線上使用者數量及所託管內容的規模。

## 作業系統

| 作業系統 | 說明 |
|----|-------|
| **Linux** | 建議使用。Ubuntu 24.04 LTS+、Debian 12+、AlmaLinux 9+ 或同等發行版。 |
| **Windows** | 可行但未經充分測試。開發時請使用 WSL2。 |
| **macOS** | 僅供開發／未經測試。 |

## 網路需求

* 一個指向您伺服器的網域名稱。
* 用於 HTTPS 的 SSL/TLS 憑證（Let's Encrypt 提供免費憑證）。
* 若直接寄送電子郵件，需具備對外 SMTP 存取（或使用第三方電子郵件服務）。
* 連接埠 443（HTTPS），以及可選的連接埠 80（HTTP，用於重新導向至 HTTPS）。

## 檢查需求

將 Chamilo 原始碼放置於伺服器後，您可直接檢查 PHP 設定：

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## 提示

* **使用 PHP-FPM** 搭配 Apache 或 Nginx，效能優於 mod_php。
* **將資料庫獨立**至專用伺服器，適用於預期超過 500 名同時線上使用者的平台。
* **使用 SSD 儲存**——像 Chamilo 這類高度依賴資料庫的應用程式，可從快速磁碟 I/O 獲得顯著效益。