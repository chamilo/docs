# 安裝

本節涵蓋了在您的伺服器上安裝和配置 Chamilo 2.0 所需的一切內容。

Chamilo 2.0 是一個基於 Symfony 框架的 PHP 應用程式。它可以在大多數基於 Linux 的伺服器上運行，也曾在 Windows Server 與 IIS 上安裝並運行，並支援 MySQL 和 MariaDB 後端。

## 安裝步驟

1. **[伺服器需求](server-requirements.md)** — 確認您的伺服器符合最低要求
2. **[安裝精靈](installation-wizard.md)** — 執行基於網頁的安裝精靈
3. **[配置](configuration.md)** — 配置環境變數和 Symfony 設定
4. **[雲端儲存](cloud-storage.md)** — 設定雲端儲存後端（可選）
5. **[電子郵件配置](email-configuration.md)** — 配置電子郵件傳送
6. **[升級](upgrading.md)** — 從舊版本升級

## 快速概覽

基本安裝過程如下：

1. 下載或克隆 Chamilo 原始碼
2. 如果從原始碼準備，則使用 Composer 安裝 PHP 依賴項
3. 使用 npm/yarn 安裝 JavaScript 依賴項並構建前端資產
4. 創建一個空的 `.env` 檔案，以便稍後儲存您的資料庫憑證和其他設定
5. 更改 *var/*、*config/* 和 *.env* 的權限（讓網頁伺服器可寫入）
6. 執行基於網頁的安裝精靈
7. 使用您的第一個管理員帳戶進行連接
8. 將 *config/* 和 *.env* 的權限改回原狀

每個步驟的詳細說明請參閱上面連結的頁面。