# 安全指南

本指南涵蓋在生產環境中運行 Chamilo 2.0 平台的安全最佳實踐。安全性是平台軟件、伺服器配置和持續運營實踐之間的共同責任。

## 保持 Chamilo 更新

保持 Chamilo 安裝版本最新的做法是最重要的安全措施。

* 訂閱 Chamilo 安全 X 帳號（@chamilosecurity）或關注 GitHub 儲存庫以獲取版本發布公告。
* 及時應用安全補丁。2.0 分支內的次要更新設計為安全可應用。
* 遵循每次更新的[升級流程](../installation/upgrading.md)。

## HTTPS

在生產環境中始終透過 HTTPS 提供 Chamilo 服務。

* 獲取 SSL/TLS 證書（Let's Encrypt 透過 Certbot 提供免費證書）。
* 配置您的網頁伺服器將所有 HTTP 流量重定向至 HTTPS。
* 啟用 HSTS（HTTP 嚴格傳輸安全）標頭以防止降級攻擊：

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

若不使用 HTTPS，登入憑證、會話 cookie 和所有用戶數據將以明文傳輸，並可能在網絡上被攔截。

## 檔案權限

將檔案權限限制在必要的最低限度。

| 路徑 | 擁有者 | 權限 | 備註 |
|------|-------|-------------|-------|
| 應用程式檔案（原始碼） | root 或部署用戶 | 755（目錄），644（檔案） | 網頁伺服器需要唯讀訪問權限。 |
| `var/` | 網頁伺服器用戶 | 775 | 必須可寫，用於 Symfony 快取、日誌和檔案上傳。 |
| `.env` | root 或部署用戶 | 640 | 包含機密資訊。網頁伺服器在正常使用期間僅需讀取權限，但在安裝期間需要寫入權限。 |
| `config/` | root 或部署用戶 | 750 | 包含機密資訊。網頁伺服器在正常使用期間僅需讀取權限，但在安裝期間需要寫入權限。 |

切勿將權限設置為 777。切勿以 root 身份運行網頁伺服器。

## 密碼政策

在[安全設置](../platform-settings/security-settings.md)中配置強大的密碼要求：

* 最小長度為 8 個字符（建議 12 個以上）。
* 要求包含大寫字母、小寫字母、數字和特殊字符的組合。
* 考慮在符合規範的環境中啟用密碼過期功能。
* 教育用戶選擇強大且獨特的密碼。

## 速率限制與暴力破解防護

### 應用程式層級

* 將**帳號封鎖前的最大登入嘗試次數**（`login_max_attempt_before_blocking_account`）設置為較小的值（例如 5）。
* 在登入頁面啟用**驗證碼（CAPTCHA）**。驗證碼是開/關設置——不會在 N 次登入失敗後自動啟用。將其與**驗證碼錯誤次數後封鎖帳號**（`captcha_number_mistakes_to_block_account`）搭配使用，以鎖定持續無法通過驗證碼的帳號。

### 伺服器層級

使用 **fail2ban** 監控登入失敗並封鎖違規 IP 地址：

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

在 `/etc/fail2ban/filter.d/chamilo-auth.conf` 中創建匹配的過濾器，以匹配認證失敗的日誌條目。

## 會話管理

* 在安全設置中設置合理的**會話存活時間**（例如 3600 秒 / 1 小時）。
* 在您的 Symfony 配置中配置**會話 cookie 標誌**：

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # 僅透過 HTTPS 發送
          cookie_httponly: true     # 無法透過 JavaScript 訪問
          cookie_samesite: lax     # CSRF 防護
  ```

* 考慮在包含敏感內容的平台上禁用「記住我」功能。

## HTTP 安全標頭

配置您的網頁伺服器以發送安全標頭：

| 標頭 | 值 | 目的 |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | 防止 MIME 類型嗅探。 |
| `X-Frame-Options` | `SAMEORIGIN` | 防止透過 iframe 進行點擊劫持。 |
| `X-XSS-Protection` | `1; mode=block` | 為舊版瀏覽器提供遺留 XSS 防護。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | 控制 referrer 資訊洩露。 |
| `Content-Security-Policy` | 因情況而異 | 控制可載入的資源。需要針對 Chamilo 進行仔細調整。 |

Apache 示例：

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Nginx 示例：

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## 檔案上傳安全性

* 在[安全性設定](../platform-settings/security-settings.md)中封鎖可執行檔案副檔名（exe、bat、sh、php、phtml、cgi）。
* 設定您的網頁伺服器以**永不執行上傳的檔案**。對於 Apache，請在整個 var/ 目錄中新增以下設定：

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 如果您的環境有此需求，請使用防毒軟體（ClamAV）掃描上傳的檔案。

## 資料庫安全性

* 為 Chamilo 使用**專用資料庫使用者**，僅賦予其所需的權限（在 Chamilo 資料庫上執行 SELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* 不要使用 root 資料庫帳戶。
* 確保資料庫無法從公共網際網路存取。將其綁定到 localhost 或私人網路。
* 在符合合規性要求的環境中啟用資料庫審計日誌。

## 備份

* 安排**每日自動備份**資料庫和上傳的檔案。
* 將備份儲存在與伺服器分開的位置（異地或雲端儲存）。
* 定期測試備份還原，以驗證備份是否可用。
* 如果備份包含敏感資料，則對備份進行加密。

詳細說明請參閱[備份](../maintenance/backups.md)。

## 監控

* 監控位於 `var/log/prod.log` 的 Chamilo 日誌，檢查錯誤和可疑活動。
* 設定伺服器監控（CPU、記憶體、磁碟），以檢測資源耗盡的情況。
* 針對重複的身份驗證失敗設定警報。
* 定期檢查使用者帳戶，確認是否存在未經授權或長期未使用的帳戶。

## 檢查清單

在部署或審核 Chamilo 安裝時使用此檢查清單：

- [ ] 已啟用 HTTPS 並使用有效憑證
- [ ] 已設定 HTTP 到 HTTPS 的重新導向
- [ ] 在 `.env` 中設定 `APP_ENV=prod` 和 `APP_DEBUG=0`
- [ ] 已生成唯一的 `APP_SECRET`
- [ ] 檔案權限已受限（無 777 權限）
- [ ] 已設定密碼政策
- [ ] 已啟用最大登入嘗試次數和 CAPTCHA
- [ ] 已封鎖可執行檔案副檔名
- [ ] 網頁伺服器上已設定安全性標頭
- [ ] 已設定會話 Cookie 標誌（secure、httponly、samesite）
- [ ] 資料庫使用者擁有最小的權限
- [ ] 已安排並測試自動備份
- [ ] 已實施日誌監控
- [ ] Chamilo 版本為最新版本