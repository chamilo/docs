# Build-System

Chamilo verwendet **Webpack 5** über **Symfony Webpack Encore** zum Erstellen der Frontend-Assets. Die vollständige Build-Konfiguration befindet sich in `webpack.config.js` im Projektstammverzeichnis.

Die Ausgabe wird nach `public/build/` geschrieben und unter dem öffentlichen Pfad `/build` ausgeliefert.

## Einstiegspunkte

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Hauptanwendung Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Installationsassistent |
| `legacy_app` | `assets/js/legacy/app.js` | Legacy-JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Übungsplayer |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lernpfad-Player |
| `legacy_document` | `assets/js/legacy/document.js` | Dokumentenbetrachter |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Legacy-Raster-Widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-Ready-Loader für Legacy-Iframes |
| `translatehtml` | `assets/js/translatehtml.js` | HTML-Übersetzungshelfer |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatische Hervorhebung von Glossarbegriffen |

### CSS

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Build-Funktionen

* **Vue 3 SFC** — `.vue`-Single-File-Components, kompiliert durch `vue-loader`; der Runtime-Compiler ist deaktiviert (`runtimeCompilerBuild: false`), daher müssen alle Templates vorkompiliert sein
* **TypeScript** — Nur-Transpile-Modus (`transpileOnly: true`) für schnelle Builds, keine Typprüfung während des Builds
* **Sass/SCSS** — Vollständige SCSS-Unterstützung über `sass-loader`
* **Tailwind CSS** — Utility-First-CSS, inline über PostCSS verarbeitet (konfiguriert in `webpack.config.js`; es gibt keine separate `postcss.config.js`)
* **Babel** — ES6+-Transpilation mit `@babel/preset-env` und `core-js@3`-Polyfills (`useBuiltIns: "usage"`)
* **jQuery Auto-Provision** — `autoProvidejQuery()` stellt `$` und `jQuery` global ohne explizite Imports bereit und unterstützt so Legacy-Code
* **Source Maps** — Nur in der Entwicklung aktiviert
* **Einzelner Runtime-Chunk** — Gemeinsame Runtime für alle Einstiegspunkte
* **Dateisystem-Cache** — Der persistente Dateisystem-Cache von Webpack ist aktiviert, um inkrementelle Rebuilds zu beschleunigen
* **Chunk-Namensräume** — `output.uniqueName` und `output.chunkLoadingGlobal` sind auf `"chamilo"` / `"webpackChunkChamilo"` gesetzt, um Kollisionen beim Laden von Chunks zu vermeiden, wenn mehrere Webpack-Bundles auf einer Seite koexistieren

## Nur-Produktions-Funktionen

* **Versionierung** — Content-Hash-Suffixe an allen Ausgabedateinamen (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-Attribute an `<script>`- und `<link>`-Tags (`enableIntegrityHashes()`)
* **Ausgabe-Bereinigung** — `public/build/` wird vor jedem Produktions-Build geleert

### Ungehashte Asset-Kopien (`CopyUnhashedAssetsPlugin`)

Einige Legacy-PHP-Seiten referenzieren Assets über einen festen Dateinamen und können das Webpack-Manifest nicht nutzen. Ein benutzerdefiniertes `CopyUnhashedAssetsPlugin` (am Ende von `webpack.config.js` definiert) kopiert bestimmte gehashte Produktionsdateien nach jedem Build an einen zusätzlichen ungehashten Pfad:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Kopierte Bibliotheks-Assets

`copyFiles()` kopiert eine Reihe von npm-Paketen direkt nach `public/build/libs/`, ohne sie zu bündeln, zur Verwendung über `<script>`- / `<link>`-Tags in Legacy-Templates:

* `flatpickr` (JS + CSS + Locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment`-Locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Build-Befehle

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-Konfiguration

Tailwind wird in `tailwind.config.js` konfiguriert. Wichtige Punkte:

* **`important: true`** — Alle generierten Utilities enthalten `!important`, sodass sie PrimeVue-Komponentenstile ohne zusätzliche Spezifitätstricks überschreiben können
* **Content-Pfade** — Tailwind durchsucht `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` und `src/CoreBundle/Resources/views/**/*.html.twig` nach Klassenverwendung
* **CSS-Variablen-Farbsystem** — Jedes Farb-Token (primary, secondary, tertiary, success, info, warning, danger) basiert auf einer CSS Custom Property (z. B. `--color-primary-base`), die pro Theme in `var/themes/[theme-name]/colors.css` definiert ist. Die Werte sind durch Leerzeichen getrennte RGB-Kanal-Tripel und ermöglichen Tailwind-Opacity-Utilities (`bg-primary/50`)
* **Benutzerdefinierte Schriftgrößenskala** — Die Paare aus Größe und Zeilenhöhe `body-1`, `body-2`, `caption`, `tiny` werden über `theme.extend.fontSize` hinzugefügt
* **Plugins** — `@tailwindcss/forms` und `@tailwindcss/typography` sind aktiviert

PostCSS (Tailwind + Autoprefixer) wird inline in `webpack.config.js` über `enablePostCssLoader()` konfiguriert — es gibt keine eigenständige Datei `postcss.config.js`.