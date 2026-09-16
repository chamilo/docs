# 安裝

本節涵蓋在伺服器上安裝與設定 Chamilo 3.0 所需的一切內容。

Chamilo 3.0 是以 Symfony 框架建置的 PHP 應用程式。它可在大多數以 Linux 為基礎的伺服器上執行，亦曾在搭載 IIS 的 Windows Server 上安裝並運作，並支援 MySQL 與 MariaDB 後端。

## 安裝步驟

1. **[伺服器需求](server-requirements.md)** — 確認伺服器符合最低需求
2. **[安裝精靈](installation-wizard.md)** — 執行網頁版安裝精靈
3. **[設定](configuration.md)** — 設定環境變數與 Symfony 組態
4. **[雲端儲存](cloud-storage.md)** — 設定雲端儲存後端（選用）
5. **[電子郵件設定](email-configuration.md)** — 設定電子郵件傳送
6. **[升級](upgrading.md)** — 從舊版本升級

## 快速概覽

基本安裝流程如下：

1. 下載或複製 Chamilo 原始碼
2. 若從原始碼準備，請以 Composer 安裝 PHP 相依套件
3. 以 npm/yarn 安裝 JavaScript 相依套件並建置前端資產
4. 建立空白的 `.env` 檔，稍後用來存放資料庫憑證及其他設定
5. 變更權限（讓網頁伺服器可寫入）於 *var/*、*config/* 與 *.env*
6. 執行網頁版安裝精靈
7. 以第一個管理員帳號登入
8. 將 *config/* 與 *.env* 的權限改回

各步驟的詳細說明請見上方連結的頁面。