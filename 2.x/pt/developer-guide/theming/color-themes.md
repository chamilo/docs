# Color Themes

Chamilo 2.0 uses a database-driven color theme system. Themes are managed through the admin UI, stored in the database, and written to disk as CSS files. They can be customized per access URL, allowing multi-URL installations to have different visual identities.

## Data Model

Two entities drive the theme system:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Primary key |
| `title` | string | Human-readable name |
| `slug` | string | Auto-generated from `title` (e.g. `"My Theme"` → `my-theme`); used as the directory name in `var/themes/` |
| `variables` | array (JSON) | Map of CSS custom property name → value (e.g. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associates a `ColorTheme` with an `AccessUrl`. The `active` boolean flag marks which theme is currently active for that URL. Only one theme can be active per access URL at a time.

## How Themes Are Stored

When a theme is created or updated via the API, `ColorThemeStateProcessor` generates the CSS file and writes it to the Flysystem `themes_filesystem` (backed by `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

The generated `colors.css` wraps all variables in a `:root` block:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Values are space-separated RGB channel triplets (not `rgb()`), which allows Tailwind to compose opacity variants such as `bg-primary/50` without additional configuration.

## Theme Resolution Precedence

`ThemeHelper::getVisualTheme()` resolves which theme slug to apply on any given page, in this order:

1. **Active theme for the current AccessUrl** — the `AccessUrlRelColorTheme` record with `active = true`
2. **User-selected theme** — the theme stored on the `User` entity, if the `profile.user_selected_theme` platform setting is enabled
3. **Course theme** — the `course_theme` course setting, if the `course.allow_course_theme` platform setting is enabled
4. **Learning path theme** — the LP's `$lp_theme_css` value, if the `allow_learning_path_theme` course setting is enabled
5. **`THEME_FALLBACK` env var** — set in `.env` as `THEME_FALLBACK='chamilo'`
6. **Default** — `chamilo` (hardcoded as `ThemeHelper::DEFAULT_THEME`)

## Asset Serving

Theme assets are served by `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) under the `/themes` prefix.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Serve any theme asset (CSS, JS, images); falls back to `chamilo` theme if not found in the requested theme |
| `GET /themes/{slug}/logo/{type}` | Serve the preferred logo (`header` or `email`), with SVG → PNG fallback |
| `POST /themes/{slug}/logos` | Upload header/email logos (SVG and/or PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Delete a specific logo |

The general asset route (`/{name}/{path}`) automatically falls back to the `chamilo` default theme when a file is missing from the requested theme, so themes only need to include files they actually override.

## How Themes Are Loaded in Templates

The `head.html.twig` layout template loads the active theme's assets via Twig helper functions:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

The three Twig functions (registered in `ChamiloExtension`) resolve the asset path through `ThemeHelper`, applying the same fallback chain as above:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL to the asset in the resolved theme |
| `theme_asset_link_tag('path')` | Full `<link rel="stylesheet">` tag |
| `theme_asset_script_tag('path')` | Full `<script src="...">` tag |
| `theme_asset_base64('path')` | Base64-encoded data URI of the asset |
| `theme_logo('header'\|'email')` | URL to the best available logo |

## API Endpoints

Theme management is exposed via the API Platform REST API (admin-only):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Create a new theme |
| `PUT` | `/api/color_themes/{id}` | Update an existing theme |
| `POST` | `/api/access_url_rel_color_themes` | Associate/activate a theme for an access URL |
| `GET` | `/api/access_url_rel_color_themes` | List theme associations for the current access URL |

## Creating a Custom Theme

The standard workflow is through the admin UI (**Admin → Color Themes**), which calls the API endpoints above. To create a theme programmatically:

1. `POST /api/color_themes` with a JSON body:

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

This persists the entity and writes `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` to associate and activate it for the current access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

To add custom images (logo, favicon, backgrounds), upload them via `POST /themes/{slug}/logos` or place them directly in `var/themes/{slug}/images/`.

## Color Variable Reference

All variables expected by the default Tailwind configuration:

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
