# 系統狀態

系統狀態頁面有助於您驗證 Chamilo 伺服器是否正確配置，並識別潛在問題。

## 存取系統狀態

從管理面板，點擊 **System status**（或 **System information**）。

## 顯示內容

![顯示 PHP 配置、資料庫狀態、檔案權限和伺服器資訊的系統狀態頁面](/.gitbook/assets/admin-system-status.png)

### PHP 配置

* **PHP version** — Chamilo 2.0 需要 PHP 8.2 或更高版本
* **Required extensions** — 檢查所有必要的 PHP 擴充套件是否已安裝
* **PHP settings** — 驗證重要的 PHP 設定，例如記憶體限制、上傳限制和執行時間

### 資料庫狀態

* **Database connection** — 確認資料庫可存取
* **Database version** — 顯示資料庫伺服器版本

### 檔案權限

* **Writable directories** — 檢查 Chamilo 是否能寫入必要的目錄（快取、上傳、記錄）

### 伺服器資訊

* **Operating system** — 伺服器作業系統詳細資訊
* **Web server** — Apache、Nginx 或其他
* **Disk space** — 可用儲存空間

## 建議檢查

定期執行這些檢查：

* **After installation** — 驗證所有需求均已滿足
* **After upgrades** — 確保 PHP 版本和擴充套件仍相容
* **When issues arise** — 疑難排解問題時，首先檢查系統狀態