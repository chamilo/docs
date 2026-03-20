# Twig Templates

Chamilo uses Twig for server-side rendered pages. The Vue SPA handles most of the UI, but Twig templates provide the HTML shell and are used for some legacy pages.

## Template Location

Templates are in `src/CoreBundle/Resources/views/` and `templates/`.

## How Twig and Vue Coexist

The typical page flow:

1. Symfony renders a Twig template that provides the HTML shell
2. The template includes the Vue entry point (`<div id="app">`)
3. Vue mounts and takes over the UI rendering
4. The Vue app communicates with the backend via the REST API

For legacy pages that haven't been migrated to Vue:

1. Symfony renders the full page with Twig
2. Legacy JavaScript provides interactivity
3. The page still uses the Twig layout with the sidebar and topbar

## Key Templates

| Template | Purpose |
|----------|---------|
| `layout/app.html.twig` | Main application layout (includes Vue mount point) |
| `layout/page.html.twig` | Page wrapper with head, scripts, styles |

## Webpack Encore Integration

Twig templates include built assets using Encore's Twig helpers:

```twig
{{ encore_entry_link_tags('app') }}
{{ encore_entry_script_tags('vue') }}
```

These functions generate the correct `<link>` and `<script>` tags for the Webpack-built bundles, including content hashes for cache busting.

## Custom Vue Templates

Chamilo supports custom Vue templates via the `APP_CUSTOM_VUE_TEMPLATE` environment variable. When enabled, the router checks for custom view overrides, allowing installations to customize specific pages without modifying the core code.
