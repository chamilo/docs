# 證書設定

當學習者從成績簿獲得證書時所應用的預設值。

在 **管理 > 設定 > 證書** 下存取這些設定。此類別包含 **9 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `add_certificate_pdf_footer`

**新增 PDF 證書匯出頁尾**

啟用時，會在證書的 PDF 匯出中新增頁尾。

*預設值：`false`*

### `allow_general_certificate`

**啟用一般證書**

一般證書是彙整使用者在所修課程中所有成就的證書。

*預設值：`false`*

### `allow_public_certificates`

**允許公開證書**

使用者證書可供未註冊使用者檢視。

*預設值：`false`*

### `certificate_filter_by_official_code`

**證書依官方代碼篩選**

在證書清單中新增依學生官方代碼篩選的功能。

*預設值：`false`*

### `certificate_pdf_orientation`

**證書 PDF 方向**

為 PDF 證書設定「portrait」或「landscape」（技術術語）。

*預設值：`landscape`*

### `hide_certificate_export_link`

**證書：隱藏所有使用者的 PDF 匯出連結**

啟用以完全移除將證書匯出為 PDF 的可能性（適用於所有使用者）。啟用時，包括對學生隱藏該功能。

*預設值：`false`*

### `hide_certificate_export_link_students`

**證書：對學生隱藏匯出連結**

啟用時，學生無法將其證書匯出為 PDF。此選項之所以提供，是因為視證書範本的精確 HTML 結構而定，PDF 匯出的品質可能較低。在此情況下，最好僅向學生顯示 HTML 證書。

*預設值：`false`*

### `hide_my_certificate_link`

**隱藏「我的證書」連結**

隱藏非管理員使用者的證書頁面。

*預設值：`false`*

### `session_admin_can_download_all_certificates`

**允許課程期間管理員下載私人證書**

啟用時，課程期間管理員即使證書未公開發布，亦可下載證書。

*預設值：`false`*