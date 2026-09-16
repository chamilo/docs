# 證書設定

學習者從成績冊取得證書時套用的預設值。

請至 **管理 > 組態設定 > 證書** 存取這些設定。此分類包含 **11 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `add_certificate_pdf_footer`

**於 PDF 證書匯出加入頁尾**

啟用後，會在證書的 PDF 匯出加入頁尾。

*預設值：`false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**於 WS 呼叫時自動產生證書**

啟用後，且使用 WSCertificatesList 網路服務時，此選項會確保使用者若在所有課程與時段之成績冊所定義的所有項目中達到足夠分數，皆已產生證書（這可能會消耗伺服器上相當可觀的處理資源）。

*預設值：`false`*

### `allow_certificates_search` **v3**

**允許搜尋證書**

允許使用者與訪客從頂部列選單搜尋已產生的證書。

*預設值：`false`*

### `allow_general_certificate`

**啟用總證書**

總證書是將使用者在其所修習課程中的所有成就彙整而成的證書。

*預設值：`false`*

### `allow_public_certificates`

**允許公開證書**

未註冊使用者可檢視使用者證書。

*預設值：`false`*

### `certificate_filter_by_official_code`

**依正式代碼篩選證書**

在證書清單中加入依學生正式代碼篩選的條件。

*預設值：`false`*

### `certificate_pdf_orientation`

**證書 PDF 方向**

為 PDF 證書設定「portrait」或「landscape」（技術用語）。

*預設值：`landscape`*

### `hide_certificate_export_link`

**證書：對所有人隱藏 PDF 匯出連結**

啟用後可完全移除將證書匯出為 PDF 的可能性（適用於所有使用者）。若啟用，亦包含對學生隱藏該功能。

*預設值：`false`*

### `hide_certificate_export_link_students`

**證書：對學生隱藏匯出連結**

若啟用，學生將無法將其證書匯出為 PDF。提供此選項是因為，視證書範本的精確 HTML 結構而定，PDF 匯出品質可能不佳。在此情況下，最好只向學生顯示 HTML 證書。

*預設值：`false`*

### `hide_my_certificate_link`

**隱藏「我的證書」連結**

對非管理員使用者隱藏證書頁面。

*預設值：`false`*

### `session_admin_can_download_all_certificates`

**允許時段管理員下載私人證書**

若啟用，時段管理員即使證書未公開發布，仍可下載證書。

*預設值：`false`*

## 另請參閱

證書現在可設定有效期間與到期日，並可自動或手動發送到期提醒。此處並不設定這些項目——有效期間是面向教師的成績冊設定，而提醒 cron 的開關位於 **Cron 工作** 分類。請參閱 [證書與技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) 以及 [Cron 工作設定](crons-settings.md#certificate-expiry-reminders)。