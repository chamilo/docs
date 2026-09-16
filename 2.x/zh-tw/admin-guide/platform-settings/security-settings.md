# 安全性設定

登入保護、密碼政策、內容安全性標頭、雙因素驗證，以及輕量級入侵偵測系統。

在 **管理 > 設定值 > 安全性** 下存取這些設定。此類別包含 **31 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `2fa_enable`

**啟用 2FA**

在密碼更新頁面新增欄位，以使用 TOTP 驗證應用程式啟用 2FA。當全域停用時，使用者將不會看到 2FA 欄位，且即使先前已啟用，也不會在登入時被提示輸入 2FA。

*預設值：`false`*

### `access_to_personal_file_for_all`

**所有人可存取個人檔案**

允許無限制存取所有個人檔案

*預設值：`false`*


### `admins_can_set_users_pass`

**管理員可手動設定使用者密碼**

[推斷] 啟用時，管理員可直接手動設定使用者密碼，而無需使用者重設。

### `allow_captcha`

**CAPTCHA**

在登入表單、註冊表單和遺失密碼表單上啟用 CAPTCHA，以避免密碼暴力破解

*預設值：`false`*

### `allow_online_users_by_status`

**篩選可見為線上狀態的使用者**

將線上使用者可見性限制為特定使用者角色。

### `allow_strength_pass_checker`

**密碼強度檢查器**

啟用此選項可在使用者變更密碼時新增密碼強度的視覺指示器。此功能不會防止新增弱密碼，僅作為視覺輔助。

*預設值：`true`*


### `anonymous_autoprovisioning`

**自動供應更多匿名使用者**

動態建立新的匿名使用者，以支援高訪客流量。

*預設值：`false`*


### `captcha_number_mistakes_to_block_account`

**CAPTCHA 錯誤容許次數**

使用者在 CAPTCHA 方塊中犯錯的次數上限，超過後帳戶將被鎖定。

### `captcha_time_to_block`

**CAPTCHA 帳戶鎖定時間**

若使用者達到登入錯誤的最大容許次數（使用 CAPTCHA 時），其帳戶將被鎖定此數量的分鐘。

### `check_password`

**檢查密碼需求**

在建立或更新密碼時，啟用上述密碼需求的驗證。

*預設值：`false`*


### `filter_terms`

**篩選詞彙**

提供一行一個詞彙的清單，從網頁和電子郵件中篩選這些詞彙。這些詞彙將被取代為 ***。

### `force_renew_password_at_first_login`

**首次登入時強制更新密碼**

這是一項簡單的安全性措施，透過要求使用者立即變更密碼來提升入口網站的安全性，使透過電子郵件傳送的密碼失效，使用者將使用自己設想的且僅自己知道的密碼。

*預設值：`false`*


### `hide_breadcrumb_if_not_allowed`

**不允許時隱藏麵包屑導航**

若使用者不被允許存取特定頁面，則一併隱藏麵包屑導航。此舉可透過避免顯示不必要資訊來提升安全性。

*預設值：`false`*


### `login_max_attempt_before_blocking_account`

**鎖定前最大登入嘗試次數**

容許失敗登入嘗試次數上限，超過後使用者帳戶將被鎖定，需由管理員解鎖。

*預設值：`0`*

### `password_requirements`

**最小密碼語法需求**

定義使用者密碼的必要結構。例如：{"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。使用 "specials"（複數）來要求特殊字元。

### `password_rotation_days`

**密碼輪換間隔（天）**

使用者必須輪換密碼前的天數（0 = 停用）。

*預設值：`0`*


### `prevent_multiple_simultaneous_login`

**防止同時登入**

防止使用者以相同帳戶多次連線。這是按存取付費入口網站的良好選項，但在測試期間可能過於限制，因為每個帳戶僅能有一個瀏覽器連線。

*預設值：`false`*


### `proxy_settings`

**Proxy 設定**

Chamilo 的某些功能將從伺服器連線至外部。例如，在建立連結或在學習路徑中顯示嵌入頁面時，確認外部內容是否存在。若您的 Chamilo 伺服器使用 proxy 離開其網路，此處即為設定位置。

### `security_block_inactive_users_immediately`

**立即封鎖停用使用者**

立即封鎖管理員透過使用者管理停用的使用者。否則，被停用的使用者將保留先前權限，直至登出。

*預設值：`false`*

---
### `security_content_policy`

**內容安全性政策**

內容安全性政策是一種有效保護網站免受 XSS 攻擊的措施。透過白名單批准內容來源，您可以防止瀏覽器載入惡意資產。此設定在使用所見即所得編輯器時特別複雜，但如果您在 child-src 語句中加入所有希望授權用於 iframe 包含的網域，此範例應可適用。您可以透過在 'script-src' 參數中使用嚴格清單，防止來自外部來源（包括 SVG 圖像內部）的 JavaScript 執行。留空以停用。範例設定：default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**內容安全性政策僅回報**

此設定允許您透過回報但不強制執行某些內容安全性政策來進行實驗。

### `security_public_key_pins`

**HTTP 公鑰固定**

HTTP 公鑰固定可保護您的網站免受使用惡意 X.509 憑證的 MiTM 攻擊。透過僅白名單瀏覽器應信任的身份，您用戶在憑證授權機構遭入侵時將受到保護。

### `security_public_key_pins_report_only`

**HTTP 公鑰固定僅回報**

此設定允許您透過回報但不強制執行某些 HTTP 公鑰固定來進行實驗。

### `security_referrer_policy`

**安全性 Referrer 政策**

Referrer 政策是一個新標頭，允許網站控制瀏覽器在離開文件時導航包含多少資訊，所有網站都應設定此政策。

*預設：`origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**工作階段 Cookie samesite**

啟用工作階段 Cookie 的 samesite:None 參數。更多資訊：[https://www.chromium.org/updates/same-site](https://www.chromium.org/updates/same-site) 和 [https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure](https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure)

*預設：`false`*


### `security_strict_transport`

**HTTP 嚴格傳輸安全性**

HTTP 嚴格傳輸安全性是支援網站的絕佳功能，可透過讓使用者代理強制使用 HTTPS 來強化您的 TLS 實作。建議值：'strict-transport-security: max-age=63072000; includeSubDomains'。請參閱 [https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security)。您可以加入 'preload' 後綴，但這對頂級網域 (TLD) 有後果，因此不宜輕率使用。請參閱 [https://hstspreload.org/](https://hstspreload.org/)。留空以停用。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options 會停止瀏覽器嘗試 MIME 嗅探內容類型，並強制其堅持宣告的內容類型。此標頭的唯一有效值為 'nosniff'。

*預設：`nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options 告知瀏覽器您是否希望允許您的網站被框架化。透過防止瀏覽器框架化您的網站，您可以防禦如點擊劫持等攻擊。若在此定義 URL，應定義您的內容應可見的 URL（而非您的網站接受內容的 URL）。例如，若您的主要 URL（上述 root_web）為 https://11.chamilo.org/，則此設定應為：'ALLOW-FROM https://11.chamilo.org'。這些標頭僅適用於 Chamilo 負責產生 HTTP 標頭的頁面（即 '.php' 檔案）。不適用於靜態檔案。若使用此功能，請確保同時更新您的網頁伺服器設定，以為靜態檔案加入正確標頭。請參閱上述 CDN 設定文件（搜尋 'add_header'）以取得更多資訊。若啟用，此設定的建議（嚴格）值：'SAMEORIGIN'。

*預設：`SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection 設定大多數瀏覽器內建的跨網站指令碼篩選器配置。建議值 '1; mode=block'。

*預設：`1; mode=block`*


### `user_reset_password`

**啟用密碼重設權杖**

此選項允許產生一個過期的一次性權杖，透過電子郵件發送給使用者以重設其密碼。

*預設：`false`*


### `user_reset_password_token_limit`

**密碼重設權杖時間限制**

產生權杖自動過期且無法再使用前的秒數（需要產生新權杖）。

*預設：`3600`*