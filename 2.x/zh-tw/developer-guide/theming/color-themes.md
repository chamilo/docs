# 色彩主題

Chamilo 2.0 使用資料庫驅動的色彩主題系統。主題透過管理員 UI 進行管理，儲存在資料庫中，並以 CSS 檔案的形式寫入磁碟。它們可以依據存取 URL 進行自訂，允許多 URL 安裝具有不同的視覺識別。

## 資料模型

兩個實體驅動主題系統：

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Primary key |
| `title` | string | Human-readable name |
| `slug` | string | Auto-generated from `title` (e.g. `"My Theme"` → `my-theme`); used as the directory name in `var/themes/` |
| `variables` | array (JSON) | Map of CSS custom property name → value (e.g. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

將 `ColorTheme` 與 `AccessUrl` 關聯。`active` 布林旗標標記該 URL 目前啟用的主題。每個存取 URL 一次只能啟用一個主題。

## 主題儲存方式

當透過 API 建立或更新主題時，`ColorThemeStateProcessor` 會產生 CSS 檔案並寫入 Flysystem `themes_filesystem`（以 `var/themes/` 為後端）：

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

產生的 `colors.css` 將所有變數包裝在 `:root` 區塊中：

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

值為以空格分隔的 RGB 通道三元組（非 `rgb()`），這允許 Tailwind 組成不透明度變體，例如 `bg-primary/50`，無需額外設定。

## 主題解析優先順序

`ThemeHelper::getVisualTheme()` 解析在任何給定頁面應套用的主題 slug，按以下順序：

1. **目前 AccessUrl 的啟用主題** — `active = true` 的 `AccessUrlRelColorTheme` 記錄
2. **使用者選擇的主題** — 若啟用 `profile.user_selected_theme` 平台設定，則為儲存在 `User` 實體上的主題
3. **課程主題** — 若啟用 `course.allow_course_theme` 平台設定，則為 `course_theme` 課程設定
4. **學習路徑主題** — 若啟用 `allow_learning_path_theme` 課程設定，則為 LP 的 `$lp_theme_css` 值
5. **`THEME_FALLBACK` 環境變數** — 在 `.env` 中設定為 `THEME_FALLBACK='chamilo'`
6. **預設** — `chamilo`（硬編碼為 `ThemeHelper::DEFAULT_THEME`）

## 資產提供

主題資產由 `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) 在 `/themes` 前綴下提供。

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Serve any theme asset (CSS, JS, images); falls back to `chamilo` theme if not found in the requested theme |
| `GET /themes/{slug}/logo/{type}` | Serve the preferred logo (`header` or `email`), with SVG → PNG fallback |
| `POST /themes/{slug}/logos` | Upload header/email logos (SVG and/or PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Delete a specific logo |

一般資產路由 (`/{name}/{path}`) 會在請求主題缺少檔案時自動回退至 `chamilo` 預設主題，因此主題僅需包含其實際覆寫的檔案。

## 主題在範本中的載入方式

`head.html.twig` 版面範本透過 Twig 輔助函數載入啟用主題的資產：

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

三個 Twig 函數（在 `ChamiloExtension` 中註冊）透過 `ThemeHelper` 解析資產路徑，套用上述相同回退鏈：

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL to the asset in the resolved theme |
| `theme_asset_link_tag('path')` | Full `<link rel="stylesheet">` tag |
| `theme_asset_script_tag('path')` | Full `<script src="...">` tag |
| `theme_asset_base64('path')` | Base64-encoded data URI of the asset |
| `theme_logo('header'\|'email')` | URL to the best available logo |

## API 端點

主題管理透過 API Platform REST API 公開（僅限管理員）：

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Create a new theme |
| `PUT` | `/api/color_themes/{id}` | Update an existing theme |
| `POST` | `/api/access_url_rel_color_themes` | Associate/activate a theme for an access URL |
| `GET` | `/api/access_url_rel_color_themes` | List theme associations for the current access URL |

---
## 建立自訂主題

標準工作流程是透過管理介面（**管理 → 色彩主題**），這會呼叫上述 API 端點。要以程式方式建立主題：

1. `POST /api/color_themes` 並使用 JSON 內文：

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

這會持久化實體並寫入 `var/themes/my-theme/colors.css`。

2. `POST /api/access_url_rel_color_themes` 以將其關聯並啟用於目前的存取 URL：

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

要新增自訂圖片（logo、favicon、背景），可透過 `POST /themes/{slug}/logos` 上傳，或直接放置於 `var/themes/{slug}/images/`。

## 色彩變數參考

預設 Tailwind 配置所預期的所有變數：

| Variable | Purpose |
|----------|---------|
| `--color-primary-base` | Primary brand color |
| `--color-primary-gradient` | Darker gradient stop for primary |
| `--color-primary-button-text` | Text color on primary buttons |
| `--color-primary-button-alternative-text` | Alternative text color on primary buttons |
| `--color-secondary-base` | Secondary accent color |
| `--color-secondary-gradient` | Gradient stop for secondary |
| `--color-secondary-button-text` | Text color on secondary buttons |
| `--color-tertiary-base` | Tertiary color |
| `--color-tertiary-gradient` | Gradient stop for tertiary |
| `--color-tertiary-button-text` | Text color on tertiary buttons |
| `--color-success-base` | Success state color |
| `--color-success-gradient` | Gradient stop for success |
| `--color-success-button-text` | Text color on success buttons |
| `--color-info-base` | Info state color |
| `--color-info-gradient` | Gradient stop for info |
| `--color-info-button-text` | Text color on info buttons |
| `--color-warning-base` | Warning state color |
| `--color-warning-gradient` | Gradient stop for warning |
| `--color-warning-button-text` | Text color on warning buttons |
| `--color-danger-base` | Danger/error state color |
| `--color-danger-gradient` | Gradient stop for danger |
| `--color-danger-button-text` | Text color on danger buttons |
| `--color-form-base` | Form element accent color |