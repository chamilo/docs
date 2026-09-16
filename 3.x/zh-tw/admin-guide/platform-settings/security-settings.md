# 安全性設定

登入保護、密碼政策、內容安全標頭、雙因素驗證，以及輕量級入侵偵測系統。

本頁說明安全性*政策*。關於依此政策監控平台的工具（登入嘗試紀錄、入侵偵測事件、密碼強度掃描與檔案完整性檢查），請參閱 [安全性](../security/README.md)。

請至 **管理 > 組態設定 > 安全性** 存取這些設定。此分類包含 **32 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 來變更這些設定時，請使用該名稱。

## 設定

### `2fa_enable`

**啟用 2FA**

在密碼更新頁面新增欄位，以便使用 TOTP 驗證器應用程式啟用 2FA。若全域停用，使用者將看不到 2FA 欄位，登入時也不會被要求進行 2FA，即使先前已啟用亦然。

*預設值：`false`*

### `access_to_personal_file_for_all`

**所有人皆可存取個人檔案**

允許不受限制地存取所有個人檔案

*預設值：`false`*


### `admins_can_set_users_pass`

**管理員可手動設定使用者密碼**

[推斷] 啟用後，管理員可直接手動設定使用者密碼，無需要求使用者重設。

### `allow_captcha`

**CAPTCHA**

在登入表單、註冊表單與忘記密碼表單啟用 CAPTCHA，以避免密碼暴力嘗試

*預設值：`false`*

### `allow_online_users_by_status`

**篩選可顯示為線上的使用者**

將線上使用者可見性限制為特定使用者角色。

### `allow_strength_pass_checker`

**密碼強度檢查器**

啟用此選項後，當使用者變更密碼時會顯示密碼強度的視覺指示。這**不會**阻止弱密碼被設定，僅作為視覺輔助。

*預設值：`true`*


### `anonymous_autoprovisioning`

**自動佈建更多匿名使用者**

動態建立新的匿名使用者，以支援高訪客流量。

*預設值：`false`*


### `captcha_number_mistakes_to_block_account`

**CAPTCHA 錯誤容許次數**

使用者在 CAPTCHA 欄位可犯錯的次數，超過後帳號將被鎖定。

### `captcha_time_to_block`

**CAPTCHA 帳號鎖定時間**

若使用者達到登入錯誤的最大容許次數（使用 CAPTCHA 時），其帳號將鎖定此分鐘數。

### `check_password`

**檢查密碼需求**

在建立或更新密碼時，啟用對上述密碼需求的驗證。

*預設值：`false`*


### `file_integrity_check_notify_admins` **v3**

**檔案完整性檢查通知收件人**

以逗號分隔的電子郵件地址清單，當檔案完整性掃描偵測到變更時通知。留空則改為通知所有全域管理員。

### `filter_terms`

**過濾詞彙**

提供詞彙清單（每行一個），將從網頁與電子郵件中過濾。這些詞彙會被 *** 取代。

### `force_renew_password_at_first_login`

**首次登入強制更新密碼**

這是提升入口網站安全性的簡單措施：要求使用者立即變更密碼，使透過電子郵件傳送的密碼失效，之後改用他們自行想出、且只有自己知道的密碼。

*預設值：`false`*


### `hide_breadcrumb_if_not_allowed`

**若「不允許」則隱藏麵包屑**

若使用者無權存取特定頁面，亦隱藏麵包屑。這可避免顯示不必要的資訊，從而提升安全性。

*預設值：`false`*


### `login_max_attempt_before_blocking_account`

**鎖定前的最大登入嘗試次數**

在使用者帳號被鎖定且須由管理員解鎖之前，可容忍的失敗登入次數。

*預設值：`0`*

### `password_requirements`

**密碼語法最低需求**

定義使用者密碼的必要結構。範例：{"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。使用 "specials"（複數）以要求特殊字元。

### `password_rotation_days`

**密碼輪替間隔（天）**

使用者必須輪替密碼的天數（0 = 停用）。

*預設值：`0`*


### `prevent_multiple_simultaneous_login`

**防止同時登入**

防止使用者以同一帳號連線超過一次。這對按次付費入口網站是良好選項，但在測試期間可能較為限制，因為任何帳號同時只能有一個瀏覽器連線。

*預設值：`false`*

### `proxy_settings`

**Proxy 設定**

Chamilo 的部分功能會從伺服器連線到外部。例如在建立連結時確認外部內容是否存在，或在學習路徑中顯示嵌入頁面。若您的 Chamilo 伺服器需透過 proxy 才能連出其網路，請在此處進行設定。

### `security_block_inactive_users_immediately`

**立即封鎖已停用使用者**

立即封鎖管理員透過使用者管理停用的使用者。否則，已停用的使用者在登出前仍會保有先前的權限。

*預設值：`false`*


### `security_content_policy`

**內容安全政策（Content Security Policy）**

內容安全政策是保護網站免受 XSS 攻擊的有效措施。透過將核准內容的來源列入白名單，您可以防止瀏覽器載入惡意資產。此設定搭配 WYSIWYG 編輯器時特別複雜，但若您在 child-src 陳述式中加入所有要授權嵌入 iframe 的網域，下列範例應可運作。您可在 'script-src' 參數中使用嚴格清單，以防止從外部來源（包括 SVG 圖片內部）執行 JavaScript。留空即可停用。範例設定：default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**僅回報內容安全政策**

此設定可讓您以僅回報、不強制執行的方式試驗部分內容安全政策。

### `security_public_key_pins`

**HTTP 公開金鑰釘選（HTTP Public Key Pinning）**

HTTP 公開金鑰釘選可保護您的網站免受使用偽造 X.509 憑證的中間人（MiTM）攻擊。透過僅將瀏覽器應信任的身分列入白名單，即使憑證授權單位遭到入侵，您的使用者也能受到保護。

### `security_public_key_pins_report_only`

**僅回報 HTTP 公開金鑰釘選**

此設定可讓您以僅回報、不強制執行的方式試驗部分 HTTP 公開金鑰釘選。

### `security_referrer_policy`

**安全性 Referrer 政策**

Referrer Policy 是一種新的標頭，可讓網站控制瀏覽器在離開文件進行導覽時包含多少資訊，所有網站都應設定此標頭。

*預設值：`origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**工作階段 cookie 的 samesite**

為工作階段 cookie 啟用 samesite:None 參數。更多資訊：https://www.chromium.org/updates/same-site 以及 https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*預設值：`false`*

### `security_strict_transport`

**HTTP 嚴格傳輸安全（HTTP Strict Transport Security）**

HTTP 嚴格傳輸安全是您網站上極佳的支援功能，可透過讓使用者代理程式強制使用 HTTPS 來強化 TLS 實作。建議值：'strict-transport-security: max-age=63072000; includeSubDomains'。請參閱 https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security。您可以加入 'preload' 後綴，但這會對頂級網域（TLD）造成影響，因此不宜輕率為之。請參閱 https://hstspreload.org/。留空即可停用。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options 可阻止瀏覽器嘗試對內容類型進行 MIME 嗅探，並強制其沿用已宣告的 content-type。此標頭唯一有效的值為 'nosniff'。

*預設值：`nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options 告訴瀏覽器您是否允許網站被嵌入框架。透過防止瀏覽器將您的網站放入框架，您可以防禦如點擊劫持（clickjacking）等攻擊。若在此定義 URL，應定義您的內容應從哪些 URL 可見，而非您的網站接受內容的來源 URL。例如，若您的主要 URL（上方的 root_web）為 https://11.chamilo.org/，則此設定應為：'ALLOW-FROM https://11.chamilo.org'。這些標頭僅適用於由 Chamilo 負責產生 HTTP 標頭的頁面（即 '.php' 檔案）。不適用於靜態檔案。若要使用此功能，請務必同時更新網頁伺服器設定，為靜態檔案加入正確的標頭。更多資訊請參閱上方的 CDN 設定文件（搜尋 'add_header'）。若啟用此設定，建議（嚴格）值為：'SAMEORIGIN'。

*預設值：`SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection 設定大多數瀏覽器內建跨網站指令碼篩選器的組態。建議值為 '1; mode=block'。

*預設值：`1; mode=block`*


### `user_reset_password`

**啟用密碼重設權杖**

此選項可產生會過期的一次性權杖，並以電子郵件傳送給使用者，以便重設其密碼。

*預設值：`false`*

### `user_reset_password_token_limit`

**密碼重設權杖的時間限制**

產生的權杖在自動過期且無法再使用之前的秒數（需重新產生新權杖）。

*預設值：`3600`*