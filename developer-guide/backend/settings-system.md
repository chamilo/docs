# 設定系統

Chamilo 的配置透過一組設定架構（約 40 個，依版本而異）來管理，這些架構定義了平台的所有可配置面向。它們位於 `src/CoreBundle/Settings/` — 那裡的確切清單即為真相來源。

## 運作方式

設定會：

1. **定義**於架構類別中（`src/CoreBundle/Settings/*SettingsSchema.php`）
2. **儲存**於資料庫中（`settings_current` 表格）
3. **存取**透過 `SettingsManager` 服務
4. **管理**透過管理網頁介面

## 設定架構

每個架構檔案定義一類設定。主要架構：

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | 機構資訊、時區、伺服器類型、入口網站功能 |
| `SecuritySettingsSchema` | 登入嘗試次數、CAPTCHA、密碼政策、HTTP 標頭、2FA |
| `RegistrationSettingsSchema` | 自我註冊、必要欄位、自動訂閱 |
| `CourseSettingsSchema` | 課程建立預設值、工具、目錄 |
| `SessionSettingsSchema` | 工作階段預設值、可見性 |
| `MailSettingsSchema` | 電子郵件配置、DKIM、通知 |
| `AiHelpersSettingsSchema` | AI 提供者、每個 AI 工具的功能開關 |
| `ExerciseSettingsSchema` | 測驗計分、回饋、題目選項 |
| `LearningPathSettingsSchema` | LP 顯示、先決條件、SCORM 設定 |
| `DocumentSettingsSchema` | 上傳限制、允許檔案類型、儲存 |
| `DisplaySettingsSchema` | UI 分頁、側邊欄項目、主題 |
| `LanguageSettingsSchema` | 可用語言、預設地區設定 |
| `AdminSettingsSchema` | 管理員電子郵件、管理員專屬選項 |

## 存取設定

在 PHP 程式碼中：

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

在範本中：

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## 設定結構

每個設定具有：

* **Namespace** — 架構類別（例如 `platform`、`security`、`ai_helpers`）
* **Variable** — 設定名稱（例如 `site_name`、`allow_registration`）
* **Value** — 目前值
* **Type** — 資料類型（string、boolean、array 等）

## 課程層級設定

某些設定可在課程層級覆寫。這些設定定義於 `src/CourseBundle/Settings/` 中，包括：

* 每個課程的測驗設定
* 每個課程的作業設定
* 每個課程的 AI 功能開關

## 多 URL 設定

在多 URL 設定中，某些設定可依存取 URL 自訂，允許從相同安裝產生不同的入口網站配置。

這些設定會在 `settings` 表格中出現多次，並具有不同的 `access_url` 值。預設情況下，所有設定均關聯至 `access_url=1`。

## 新增設定

1. 將設定定義新增至適當的架構類別
2. 提供預設值
3. 如有需要，執行資料庫遷移
4. 透過 `SettingsManager` 存取設定