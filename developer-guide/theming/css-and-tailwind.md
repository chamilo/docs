# CSS und Tailwind

## Stylesheet-Architektur

Die Stile von Chamilo sind in folgender Reihenfolge aufgebaut:

1. **Tailwind CSS** — Utility-Klassen für Layout, Abstände und Farben. Konfiguriert mit `important: true`, sodass die Utilities die Standardwerte der PrimeVue-Komponenten überschreiben.
2. **SCSS** — Benutzerdefinierte Stile in `assets/css/scss/`, organisiert in Schichten für Atome, Moleküle, Organismen, Layout und Komponenten.
3. **PrimeVue-Komponentenstile** — Werden pro Komponente in `assets/css/scss/atoms/` überschrieben.
4. **Theme `colors.css`** — CSS Custom Properties für das aktive Farbthema, die zuletzt geladen werden, sodass sie alles andere überschreiben.

PrimeFlex ist in `package.json` aufgeführt, wird jedoch nicht importiert — Tailwind deckt alle Utility-Bedürfnisse ab.

## Haupt-Stylesheet (`assets/css/app.scss`)

`app.scss` ist der Webpack-Einstiegspunkt für das Haupt-Stylesheet. Es importiert:

1. `_tailwind.scss` — Tailwind-Direktiven `@tailwind base / components / utilities`
2. `scss/index.scss` — Barrel-Datei, die alle SCSS-Partials importiert
3. Drittanbieter-CSS (cropper, select2, daterangepicker, TinyMCE-Skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stile, die in den TinyMCE-Editor-Iframe-Body eingefügt werden

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

Die Inhaltspfade scannen Vue-Komponenten, legacy PHP-Seiten, Plugin-Dateien und Twig-Templates, sodass ungenutzte Utilities bei Produktions-Builds entfernt werden.

### CSS-Variablen-Farbsystem

Alle Farb-Token basieren auf CSS Custom Properties anstelle von fest codierten Werten:

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

Die `colorWithOpacity`-Hilfsfunktion gibt `rgb(var(--color-primary-base) / <opacity>)` aus, was Opazitätsvarianten wie `bg-primary/50` ermöglicht. Die tatsächlichen RGB-Werte werden pro Thema in `var/themes/{slug}/colors.css` definiert und zur Laufzeit geladen — siehe [Farbschemata](color-themes.md).

### Tailwind-Plugins

`@tailwindcss/forms` und `@tailwindcss/typography` sind aktiviert.

### Benutzerdefinierte Schriftgrößen-Skala

Vier zusätzliche Schriftgrößen-/Zeilenhöhen-Paare werden über `theme.extend.fontSize` hinzugefügt:

| Klasse | Größe / Zeilenhöhe |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) wird inline in `webpack.config.js` über `enablePostCssLoader()` konfiguriert. Es gibt keine eigenständige `postcss.config.js`-Datei.

## Spezialisierte Stylesheets

| Datei | Webpack-Einstieg | Zweck |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Haupt-Anwendungsstile |
| `assets/css/chat.scss` | `css/chat` | Stile für die Chat-Oberfläche |
| `assets/css/document.scss` | `css/document` | Stile für den Dokumenten-Viewer |
| `assets/css/editor.scss` | `css/editor` | Stile für die TinyMCE-Editor-Shell |
| `assets/css/editor_content.scss` | `css/editor_content` | Stile, die in den Editor-Iframe-Body eingefügt werden |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-gerenderte Inhalte |
| `assets/css/print.scss` | `css/print` | Druck-Stylesheet |
| `assets/css/responsive.scss` | `css/responsive` | Responsive-Überschreibungen |
| `assets/css/scorm.scss` | `css/scorm` | Stile für den SCORM-Player |

## SCSS-Modulstruktur (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — importiert alles darunter
├── abstracts/        # Mixins und gemeinsame Funktionen
├── settings/         # Design-Token (Typografie, Komponentenbasis)
├── atoms/            # PrimeVue-Überschreibungen pro Komponente
├── molecules/        # Kleine zusammengesetzte Muster (Chips, Toolbars, leere Zustände)
├── organisms/        # Größere Bereiche (Seitenleiste, Datatable, Dialog, LP-Panel)
├── layout/           # Seitenskelett (Topbar, Hauptcontainer, Breadcrumb)
├── components/       # Funktionsspezifische Stile (Blog, Übung, Soziales, Fähigkeit, …)
└── libs/             # Drittanbieter-Überschreibungen (FullCalendar, MediaElement.js)
```

## Verwendung von Tailwind in Vue-Komponenten

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Da `important: true` in `tailwind.config.js` gesetzt ist, überschreiben Tailwind-Utilities zuverlässig die PrimeVue-Komponentenstile, ohne dass zusätzliche Spezifität erforderlich ist.