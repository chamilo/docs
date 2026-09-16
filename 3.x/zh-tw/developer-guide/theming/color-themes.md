# 色彩主題

Chamilo 3.0 採用以資料庫驅動的色彩主題系統。主題透過管理介面進行管理，儲存在資料庫中，並以 CSS 檔案寫入磁碟。主題可依存取 URL 自訂，使多 URL 安裝能擁有不同的視覺識別。

## 資料模型

主題系統由兩個實體驅動：

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | 主鍵 |
| `title` | string | 人類可讀名稱 |
| `slug` | string | 由 `title` 自動產生（例如 `"My Theme"` → `my-theme`）；用作 `var/themes/` 中的目錄名稱 |
| `variables` | array (JSON) | CSS 自訂屬性名稱 → 值的對應（例如 `{"--color-primary-base": "46 117 163"}`） |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

將 `ColorTheme` 與 `AccessUrl` 關聯。`active` 布林旗標標示該 URL 目前啟用的主題。每個存取 URL 同一時間只能有一個啟用中的主題。

## 主題如何儲存

當透過 API 建立或更新主題時，`ColorThemeStateProcessor` 會產生 CSS 檔案，並寫入 Flysystem 的 `themes_filesystem`（後端為 `var/themes/`）：

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

產生的 `colors.css` 將所有變數包在 `:root` 區塊中：

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

值為以空格分隔的 RGB 通道三元組（而非 `rgb()`），使 Tailwind 能在無需額外設定的情況下組合透明度變體，例如 `bg-primary/50`。

## 主題解析優先順序

`ThemeHelper::getVisualTheme()` 依下列順序解析任一頁面應套用的主題 slug：

1. **目前 AccessUrl 的啟用主題** — `active = true` 的 `AccessUrlRelColorTheme` 紀錄
2. **使用者選取的主題** — 儲存在 `User` 實體上的主題（若已啟用 `profile.user_selected_theme` 平台設定）
3. **課程主題** — `course_theme` 課程設定（若已啟用 `course.allow_course_theme` 平台設定）
4. **學習路徑主題** — LP 的 `$lp_theme_css` 值（若已啟用 `allow_learning_path_theme` 課程設定）
5. **`THEME_FALLBACK` 環境變數** — 在 `.env` 中設為 `THEME_FALLBACK='chamilo'`
6. **預設** — `chamilo`（硬編碼為 `ThemeHelper::DEFAULT_THEME`）

## 資產提供

主題資產由 `ThemeController`（`src/CoreBundle/Controller/ThemeController.php`）在 `/themes` 前綴下提供。

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | 提供任何主題資產（CSS、JS、圖片）；若在所請求主題中找不到，則回退至 `chamilo` 主題 |
| `GET /themes/{slug}/logo/{type}` | 提供偏好標誌（`header` 或 `email`），並具 SVG → PNG 回退 |
| `POST /themes/{slug}/logos` | 上傳頁首／電子郵件標誌（SVG 及／或 PNG） |
| `DELETE /themes/{slug}/logos/{type}` | 刪除特定標誌 |

一般資產路由（`/{name}/{path}`）在所請求主題缺少檔案時，會自動回退至 `chamilo` 預設主題，因此主題只需包含實際覆寫的檔案。

## 主題如何在範本中載入

`head.html.twig` 版面範本透過 Twig 輔助函式載入啟用主題的資產：

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

這三個 Twig 函式（於 `ChamiloExtension` 中註冊）透過 `ThemeHelper` 解析資產路徑，並套用與上述相同的回退鏈：

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | 解析後主題中該資產的 URL |
| `theme_asset_link_tag('path')` | 完整的 `<link rel="stylesheet">` 標籤 |
| `theme_asset_script_tag('path')` | 完整的 `<script src="...">` 標籤 |
| `theme_asset_base64('path')` | 資產的 Base64 編碼 data URI |
| `theme_logo('header'\|'email')` | 最佳可用標誌的 URL |

## API 端點

主題管理透過 API Platform REST API 開放（僅限管理員）：

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | 建立新主題 |
| `PUT` | `/api/color_themes/{id}` | 更新既有主題 |
| `POST` | `/api/access_url_rel_color_themes` | 為存取 URL 關聯／啟用主題 |
| `GET` | `/api/access_url_rel_color_themes` | 列出目前存取 URL 的主題關聯 |

## 建立自訂主題

標準工作流程是透過管理介面（**Admin → Color Themes**），該介面會呼叫上述 API 端點。若要以程式化方式建立主題：

1. 以 JSON 主體對 `POST /api/color_themes` 發出請求：

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

此操作會持久化實體，並寫入 `var/themes/my-theme/colors.css`。

2. 對 `POST /api/access_url_rel_color_themes` 發出請求，將主題與目前的 access URL 關聯並啟用：

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

若要加入自訂圖片（標誌、favicon、背景），可透過 `POST /themes/{slug}/logos` 上傳，或直接放置於 `var/themes/{slug}/images/`。

## 色彩變數參考

預設 Tailwind 設定所預期的全部變數：

| 變數 | 用途 |
|----------|---------|
| `--color-primary-base` | 主要品牌色彩 |
| `--color-primary-gradient` | 主要色彩的較深漸層端點 |
| `--color-primary-button-text` | 主要按鈕上的文字色彩 |
| `--color-primary-button-alternative-text` | 主要按鈕上的替代文字色彩 |
| `--color-secondary-base` | 次要強調色彩 |
| `--color-secondary-gradient` | 次要色彩的漸層端點 |
| `--color-secondary-button-text` | 次要按鈕上的文字色彩 |
| `--color-tertiary-base` | 第三色彩 |
| `--color-tertiary-gradient` | 第三色彩的漸層端點 |
| `--color-tertiary-button-text` | 第三按鈕上的文字色彩 |
| `--color-success-base` | 成功狀態色彩 |
| `--color-success-gradient` | 成功狀態的漸層端點 |
| `--color-success-button-text` | 成功按鈕上的文字色彩 |
| `--color-info-base` | 資訊狀態色彩 |
| `--color-info-gradient` | 資訊狀態的漸層端點 |
| `--color-info-button-text` | 資訊按鈕上的文字色彩 |
| `--color-warning-base` | 警告狀態色彩 |
| `--color-warning-gradient` | 警告狀態的漸層端點 |
| `--color-warning-button-text` | 警告按鈕上的文字色彩 |
| `--color-danger-base` | 危險／錯誤狀態色彩 |
| `--color-danger-gradient` | 危險狀態的漸層端點 |
| `--color-danger-button-text` | 危險按鈕上的文字色彩 |
| `--color-form-base` | 表單元件強調色彩 |