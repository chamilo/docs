# Twig Templates

Chamilo uses Twig for server-side rendered pages. Templates live in `src/CoreBundle/Resources/views/` and are referenced with the `@ChamiloCore/` namespace prefix (e.g. `@ChamiloCore/Layout/base-layout.html.twig`).

There is no top-level `templates/` directory — all Twig templates are under `src/CoreBundle/Resources/views/`.

## How Twig and Vue Coexist

Most pages follow this flow:

1. A Symfony controller renders a Twig template that extends a layout.
2. The layout includes `vue_setup.html.twig`, which emits `<div id="app">` and injects runtime globals (`window.user`, `window.breadcrumb`, etc.) via `vue_js_setup.html.twig`.
3. Vue mounts on `#app` and handles all UI rendering inside that element.
4. The Vue app communicates with the backend via the REST API.

For legacy pages not yet migrated to Vue, Symfony renders the full page HTML via Twig and the content is placed inside `#sectionMainContent`. Vue still mounts (providing the sidebar and topbar shell), but the main content area is server-rendered HTML.

## Layout Templates

All layouts extend `@ChamiloCore/Layout/base-layout.html.twig`, which provides the `<html>`, `<head>`, and `<body>` structure. Available layout variants:

| Template | Purpose |
|----------|---------|
| `Layout/base-layout.html.twig` | Root template — `<html>` shell, imports Macros, emits `<head>` and `<body>` |
| `Layout/layout.html.twig` | Standard full layout with sidebar, topbar, and content area |
| `Layout/layout_one_col.html.twig` | Single-column layout (no sidebar) |
| `Layout/layout_two_col.html.twig` | Two-column layout |
| `Layout/layout_content.html.twig` | Content-only wrapper |
| `Layout/layout_empty.html.twig` | Empty layout with minimal chrome |
| `Layout/no_layout.html.twig` | No header/footer; content goes directly inside `<body>` |
| `Layout/no_layout_scorm.html.twig` | Bare layout for SCORM content frames |
| `Layout/blank.html.twig` | Completely blank page |
| `Layout/skill_layout.html.twig` | Layout for the skills wheel page |

## Key Partials

| Template | Purpose |
|----------|---------|
| `Layout/head.html.twig` | `<head>` content: meta tags, all Encore CSS entries, theme `colors.css`, legacy JS entries, OpenGraph/Twitter tags |
| `Layout/foot.html.twig` | End-of-body: Vue JS entry point, `tracking.footer_extra_content` injection |
| `Layout/vue_setup.html.twig` | Emits `<div id="app">` and includes `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injects `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | GDPR cookie consent banner |
| `Layout/footer.html.twig` | Page footer bar |
| `Layout/course_navigation.html.twig` | Course tool navigation breadcrumb |

## Webpack Encore Integration

`head.html.twig` loads CSS for all entries; `foot.html.twig` loads the Vue JS bundle:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Legacy JS entries (`legacy_app`, `legacy_lp`, etc.) are loaded in `<head>` because legacy PHP pages depend on them being available before the DOM is ready.

## Macros

Reusable Twig macros are in `Macros/` and imported at the top of `base-layout.html.twig`:

| Macro file | Provides |
|-----------|---------|
| `Macros/box.html.twig` | Content box helpers |
| `Macros/actions.html.twig` | Action button rendering |
| `Macros/buttons.html.twig` | Button HTML helpers |
| `Macros/headers.html.twig` | Page header helpers |
| `Macros/image.html.twig` | Image rendering helpers |
| `Macros/modals.html.twig` | Modal dialog helpers |

Usage inside any template that extends `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Custom Vue Templates

Chamilo supports per-installation Vue page overrides via the `APP_CUSTOM_VUE_TEMPLATE` environment variable. When set, the Webpack build exposes a `ENV_CUSTOM_VUE_TEMPLATE` constant via `DefinePlugin`, and the Vue router conditionally imports override components from `var/vue_templates/`.

Current override locations:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Only the files present in `var/vue_templates/` are overridden — all other pages and components use the core originals.

## Twig Functions Reference

Key Twig functions available in all templates (registered in `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Read a platform setting |
| `chamilo_settings_has('ns.key')` | Check if a setting exists |
| `chamilo_settings_all()` | Get all settings as an array |
| `theme_asset('path')` | URL to an asset in the active theme |
| `theme_asset_link_tag('path')` | `<link>` tag for a theme CSS file |
| `theme_asset_script_tag('path')` | `<script>` tag for a theme JS file |
| `theme_asset_base64('path')` | Base64 data URI for a theme asset |
| `theme_logo('header'\|'email')` | URL to the preferred logo |
| `is_allowed_to_edit(...)` | Permission check helper |
