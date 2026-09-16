# CSS und Tailwind

## Stylesheet-Architektur

Die Styles von Chamilo sind in dieser Reihenfolge geschichtet:

1. **Tailwind CSS** — Utility-Klassen für Layout, Abstände und Farbe. Konfiguriert mit `important: true`, sodass Utilities die Standardwerte von PrimeVue-Komponenten überschreiben.
2. **SCSS** — Eigene Styles in `assets/css/scss/`, organisiert in den Schichten Atoms, Molecules, Organisms, Layout und Components.
3. **PrimeVue-Komponentenstyles** — Pro Komponente überschrieben in `assets/css/scss/atoms/`.
4. **Theme `colors.css`** — CSS Custom Properties für das aktive Farbschema, zuletzt geladen, damit sie über alles andere kaskadieren.

PrimeFlex wurde aus `package.json` entfernt — Tailwind deckt alle Utility-Anforderungen ab.

## Hauptstylesheet (`assets/css/app.scss`)

`app.scss` ist der Webpack-Einstiegspunkt für das Hauptstylesheet. Es importiert:

1. `_tailwind.scss` — Tailwinds Direktiven `@tailwind base / components / utilities`
2. `scss/index.scss` — Barrel-Datei, die alle SCSS-Partials importiert
3. Drittanbieter-CSS (cropper, select2, daterangepicker, TinyMCE-Skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Styles, die in den Body des TinyMCE-Editor-Iframes injiziert werden

## Tailwind-Konfiguration (`tailwind.config.js`)

Wichtige Einstellungen:

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

Die Content-Pfade scannen Vue-Komponenten, ältere PHP-Seiten, Plugin-Dateien und Twig-Templates, sodass ungenutzte Utilities bei Produktions-Builds entfernt (purged) werden.

### CSS-Variablen-Farbsystem

Alle Farb-Tokens basieren auf CSS Custom Properties statt fest kodierter Werte:

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

Der Helper `colorWithOpacity` erzeugt `rgb(var(--color-primary-base) / <opacity>)` und ermöglicht so Opacity-Varianten wie `bg-primary/50`. Die tatsächlichen RGB-Werte werden pro Theme in `var/themes/{slug}/colors.css` definiert und zur Laufzeit geladen — siehe [Farbschemas](color-themes.md).

### Tailwind-Plugins

`@tailwindcss/forms` und `@tailwindcss/typography` sind aktiviert.

### Eigene Typografie-Skala

Vier zusätzliche Paare aus Schriftgröße und Zeilenhöhe werden über `theme.extend.fontSize` hinzugefügt:

| Klasse | Größe / Zeilenhöhe |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) ist inline in `webpack.config.js` über `enablePostCssLoader()` konfiguriert. Es gibt keine eigenständige Datei `postcss.config.js`.

## Spezialisierte Stylesheets

| Datei | Webpack-Einstieg | Zweck |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Hauptanwendungsstyles |
| `assets/css/chat.scss` | `css/chat` | Styles der Chat-Oberfläche |
| `assets/css/document.scss` | `css/document` | Styles des Dokumenten-Viewers |
| `assets/css/editor.scss` | `css/editor` | Styles der TinyMCE-Editor-Hülle |
| `assets/css/editor_content.scss` | `css/editor_content` | Styles, die in den Body des Editor-Iframes injiziert werden |
| `assets/css/markdown.scss` | `css/markdown` | Als Markdown gerenderte Inhalte |
| `assets/css/print.scss` | `css/print` | Druckstylesheet |
| `assets/css/responsive.scss` | `css/responsive` | Responsive Überschreibungen |
| `assets/css/scorm.scss` | `css/scorm` | Styles des SCORM-Players |

## SCSS-Modulstruktur (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Tailwind in Vue-Komponenten verwenden

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Da in `tailwind.config.js` `important: true` gesetzt ist, überschreiben Tailwind-Utilities die Styles von PrimeVue-Komponenten zuverlässig, ohne zusätzliche Spezifität.