# CSS and Tailwind

## Stylesheet Architecture

Chamilo's styles are organized as:

1. **Tailwind CSS** — Utility classes for layout and spacing
2. **PrimeFlex** — PrimeVue's CSS utility framework (used alongside Tailwind)
3. **SCSS** — Custom styles in `assets/css/`
4. **PrimeVue theme** — Component-level styling

## Main Stylesheet

`assets/css/app.scss` is the main entry point, which imports:

* PrimeIcons CSS
* Custom SCSS files
* Component-specific styles

## Tailwind Configuration

`tailwind.config.js` defines:

```javascript
module.exports = {
  content: [
    './assets/vue/**/*.vue',
    './assets/vue/**/*.js',
    './src/**/*.html.twig',
  ],
  // Standard Tailwind configuration
}
```

Content paths ensure Tailwind scans all Vue components and Twig templates for class usage, enabling tree-shaking of unused utilities.

## Specialized Stylesheets

| File | Purpose |
|------|---------|
| `app.scss` | Main application styles |
| `chat.scss` | Chat interface styles |
| `document.scss` | Document viewer styles |
| `editor.scss` | TinyMCE editor integration |
| `editor_content.scss` | Styles for editor content area |
| `scorm.scss` | SCORM player styles |
| `print.scss` | Print-friendly styles |
| `responsive.scss` | Mobile/responsive adjustments |
| `markdown.scss` | Markdown rendering |

## Using Styles in Components

In Vue components:

```vue
<template>
  <div class="flex gap-2 p-4">
    <Button class="bg-primary text-white" />
  </div>
</template>
```

Both Tailwind utilities (`flex`, `gap-2`, `p-4`) and PrimeFlex utilities are available.
