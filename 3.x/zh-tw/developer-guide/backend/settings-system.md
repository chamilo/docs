# 設定系統

Chamilo 的組態是透過一組設定結構描述（約 40 個，會隨版本而異）來管理，這些結構描述定義了平台每一項可設定的面向。它們位於 `src/CoreBundle/Settings/` — 該目錄中的實際清單即為權威來源。

## 運作方式

設定會：

1. **定義**於結構描述類別（`src/CoreBundle/Settings/*SettingsSchema.php`）
2. **儲存**於資料庫（`settings_current` 資料表）
3. **存取**透過 `SettingsManager` 服務
4. **管理**透過管理後台網頁介面

## 設定結構描述

每個結構描述檔案定義一類設定。主要結構描述：

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | 機構資訊、時區、伺服器類型、入口網站功能 |
| `SecuritySettingsSchema` | 登入嘗試、CAPTCHA、密碼政策、HTTP 標頭、2FA |
| `RegistrationSettingsSchema` | 自行註冊、必填欄位、自動訂閱 |
| `CourseSettingsSchema` | 課程建立預設值、工具、目錄 |
| `SessionSettingsSchema` | 學期預設值、可見性 |
| `MailSettingsSchema` | 電子郵件組態、DKIM、通知 |
| `AiHelpersSettingsSchema` | AI 供應商、各 AI 工具的功能開關 |
| `ExerciseSettingsSchema` | 測驗計分、回饋、題目選項 |
| `LearningPathSettingsSchema` | 學習路徑顯示、先修條件、SCORM 設定 |
| `DocumentSettingsSchema` | 上傳限制、允許的檔案類型、儲存 |
| `DisplaySettingsSchema` | 介面分頁、側邊欄項目、主題 |
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

在模板中：

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

每一項設定包含：

* **Namespace** — 結構描述類別（例如 `platform`、`security`、`ai_helpers`）
* **Variable** — 設定名稱（例如 `site_name`、`allow_registration`）
* **Value** — 目前的值
* **Type** — 資料類型（字串、布林值、陣列等）

## 課程層級設定

部分設定可在課程層級覆寫。這些定義於 `src/CourseBundle/Settings/`，包括：

* 各課程的測驗設定
* 各課程的作業設定
* 各課程的 AI 功能開關

## 多網址設定

在多網址（multi-URL）環境中，部分設定可依存取網址自訂，讓同一套安裝提供不同的入口網站組態。

這些設定會在 `settings` 資料表中出現多次，並帶有不同的 `access_url` 值。預設情況下，所有設定皆關聯至 `access_url=1`。

## 新增一項設定

1. 將設定定義加入適當的結構描述類別
2. 提供預設值
3. 如有需要則執行資料庫遷移
4. 透過 `SettingsManager` 存取該設定