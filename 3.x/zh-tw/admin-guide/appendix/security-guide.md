# 安全性指南

本指南涵蓋在正式環境中運作 Chamilo 3.0 平台的安全性最佳實務。安全性是平台軟體、伺服器組態與持續營運實務之間的共同責任。

本指南中反覆提及的內建監控與稽核工具（登入嘗試紀錄、入侵偵測、密碼強度掃描與檔案完整性檢查），請參閱 [安全性](../security/README.md) 章節。

## 保持 Chamilo 更新

最重要的安全性實務是讓 Chamilo 安裝保持最新。

* 訂閱 Chamilo 安全性 X 帳號（@chamilosecurity），或關注 GitHub 儲存庫以取得發行公告。
* 儘速套用安全性修補程式。3.0 分支內的次要更新設計為可安全套用。
* 每次更新請遵循 [升級流程](../installation/upgrading.md)。

## HTTPS

正式環境中務必以 HTTPS 提供 Chamilo 服務。

* 取得 SSL/TLS 憑證（Let's Encrypt 可透過 Certbot 提供免費憑證）。
* 設定網頁伺服器，將所有 HTTP 流量重新導向至 HTTPS。
* 啟用 HSTS（HTTP Strict Transport Security）標頭以防止降級攻擊：

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

若未使用 HTTPS，登入憑證、工作階段 Cookie 與所有使用者資料都會以明文傳輸，可能在網路上被攔截。

## 檔案權限

將檔案權限限制在必要的最低限度。

| 路徑 | 擁有者 | 權限 | 備註 |
|------|-------|-------------|-------|
| 應用程式檔案（原始碼） | root 或部署使用者 | 755（目錄）、644（檔案） | 網頁伺服器只需唯讀存取。 |
| `var/` | 網頁伺服器使用者 | 775 | 必須可寫入，供 Symfony 快取、日誌與檔案上傳使用 |
| `.env` | root 或部署使用者 | 640 | 含有機密。正常使用時網頁伺服器只需讀取權限，安裝期間則需寫入權限。 |
| `config/` | root 或部署使用者 | 750 | 含有機密。正常使用時網頁伺服器只需讀取權限，安裝期間則需寫入權限。 |

切勿將權限設為 777。切勿以 root 身分執行網頁伺服器。

## 密碼政策

在 [安全性設定](../platform-settings/security-settings.md) 中設定嚴格的密碼要求：

* 最短長度 8 個字元（建議 12 個以上）。
* 要求混合大寫、小寫、數字與特殊字元。
* 在受合規驅動的環境中，可考慮啟用密碼到期。
* 教育使用者選擇強而獨特的密碼。

## 速率限制與暴力破解防護

### 應用程式層級

* 將 **封鎖帳號前的最大登入嘗試次數**（`login_max_attempt_before_blocking_account`）設為較小的值（例如 5）。
* 在登入頁啟用 **CAPTCHA**。CAPTCHA 為開／關設定——不會在 N 次登入失敗後自動開啟。請搭配 **封鎖前的 CAPTCHA 錯誤次數**（`captcha_number_mistakes_to_block_account`），以鎖定持續無法通過 CAPTCHA 的帳號。
* 定期檢視 [登入嘗試](../security/login-attempts.md) 報告以發現暴力破解模式，並檢視 [簡易 IDS](../security/simple-ids.md) 報告以查看其他被標記的請求（XSS 嘗試、路徑遍歷等）。

### 伺服器層級

使用 **fail2ban** 監控登入失敗並封鎖來源 IP 位址：

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

在 `/etc/fail2ban/filter.d/chamilo-auth.conf` 建立對應的篩選器，以比對驗證失敗的日誌項目。

## 工作階段管理

* 在安全性設定中設定合理的 **工作階段存活時間**（例如 3600 秒／1 小時）。
* 在 Symfony 組態中設定 **工作階段 Cookie 旗標**：

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* 對於含有敏感內容的平台，可考慮停用「記住我」。

## HTTP 安全性標頭

請設定您的網頁伺服器以傳送安全性標頭：

| 標頭 | 值 | 用途 |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | 防止 MIME 類型探測。 |
| `X-Frame-Options` | `SAMEORIGIN` | 防止透過 iframe 進行點擊劫持。 |
| `X-XSS-Protection` | `1; mode=block` | 舊版瀏覽器的傳統 XSS 防護。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | 控制 Referrer 資訊外洩。 |
| `Content-Security-Policy` | 依情況而定 | 控制可載入的資源。Chamilo 需謹慎調整。 |

Apache 範例：

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Nginx 範例：

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## 檔案上傳安全性

* 在 [安全性設定](../platform-settings/security-settings.md) 中封鎖可執行檔副檔名（exe、bat、sh、php、phtml、cgi）。
* 設定網頁伺服器**絕不執行已上傳的檔案**。若使用 Apache，請對整個 var/ 目錄加入：

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 若環境有此需求，請以防毒軟體（ClamAV）掃描上傳檔案。

## 資料庫安全性

* 為 Chamilo 使用**專用資料庫使用者**，僅授予所需權限（對 Chamilo 資料庫的 SELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* 請勿使用 root 資料庫帳號。
* 確保資料庫無法從公開網際網路存取。請綁定至 localhost 或私有網路。
* 在需符合法規的環境中啟用資料庫稽核記錄。

## 備份

* 排程資料庫與上傳檔案的**每日自動備份**。
* 將備份存放於與伺服器分開的位置（異地或雲端儲存）。
* 定期測試還原備份，以確認備份可用。
* 若備份含敏感資料，請加密備份。

詳細說明請參閱 [備份](../maintenance/backups.md)。

## 監控

* 監控 `var/log/prod.log` 的 Chamilo 日誌，以掌握錯誤與可疑活動。
* 設定伺服器監控（CPU、記憶體、磁碟），以偵測資源耗盡。
* 針對重複的驗證失敗設定警示。
* 定期檢視使用者帳號，找出未經授權或閒置帳號。
* 在 cron 中排程 [檔案完整性](../security/file-integrity.md) 檢查（Chamilo 3.0+），以便在已安裝檔案意外變更時收到通知，並定期執行 [密碼強度檢查器](../security/password-strength-checker.md)，尤其是大量匯入使用者之後。

## 檢查清單

部署或稽核 Chamilo 安裝時，請使用此檢查清單：

- [ ] 已啟用 HTTPS 並使用有效憑證
- [ ] 已設定 HTTP 至 HTTPS 重新導向
- [ ] `.env` 中為 `APP_ENV=prod` 且 `APP_DEBUG=0`
- [ ] 已產生唯一的 `APP_SECRET`
- [ ] 檔案權限已限制（無 777）
- [ ] 已設定密碼政策
- [ ] 已啟用最大登入嘗試次數與 CAPTCHA
- [ ] 已封鎖可執行檔副檔名
- [ ] 已在網頁伺服器設定安全性標頭
- [ ] 已設定工作階段 Cookie 旗標（secure、httponly、samesite）
- [ ] 資料庫使用者僅具最小權限
- [ ] 已排程並測試自動備份
- [ ] 已建立檔案完整性基準並在 cron 中排程掃描（Chamilo 3.0+）
- [ ] 已設置日誌監控
- [ ] Chamilo 版本為最新版