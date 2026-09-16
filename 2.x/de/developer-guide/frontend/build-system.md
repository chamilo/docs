# Build-System

Chamilo verwendet **Webpack 5** über **Symfony Webpack Encore** zum Erstellen von Frontend-Assets. Die vollständige Build-Konfiguration befindet sich in `webpack.config.js` im Projektstammverzeichnis.

Die Ausgabe wird in `public/build/` geschrieben und unter dem öffentlichen Pfad `/build` bereitgestellt.

## Einstiegspunkte

### JavaScript

| Einstieg | Quelle | Zweck |
|----------|--------|-------|
| `vue` | `assets/vue/main.js` | Haupt-Vue-3-Anwendung |
| `vue_installer` | `assets/vue/main_installer.js` | Installationsassistent |
| `legacy_app` | `assets/js/legacy/app.js` | Älteres JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Übungsplayer |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lernpfad-Player |
| `legacy_document` | `assets/js/legacy/document.js` | Dokumentenviewer |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Älteres Grid-Widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-Ready-Loader für ältere IFrames |
| `translatehtml` | `assets/js/translatehtml.js` | HTML-Übersetzungshilfe |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatische Hervorhebung von Glossarbegriffen |

### CSS

| Einstieg | Quelle |
|----------|--------|
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

* **Vue 3 SFC** — `.vue` Single-File-Komponenten, die von `vue-loader` kompiliert werden; der Runtime-Compiler ist deaktiviert (`runtimeCompilerBuild: false`), daher müssen alle Vorlagen vorab kompiliert werden
* **TypeScript** — Transpile-Only-Modus (`transpileOnly: true`) für schnelle Builds, keine Typprüfung während des Builds
* **Sass/SCSS** — Volle SCSS-Unterstützung über `sass-loader`
* **Tailwind CSS** — Utility-First-CSS, das inline über PostCSS verarbeitet wird (konfiguriert in `webpack.config.js`; es gibt keine separate `postcss.config.js`)
* **Babel** — ES6+ Transpilation mit `@babel/preset-env` und `core-js@3` Polyfills (`useBuiltIns: "usage"`)
* **jQuery Auto-Provision** — `autoProvidejQuery()` macht `$` und `jQuery` global verfügbar ohne explizite Imports, um älteren Code zu unterstützen
* **Source Maps** — Nur im Entwicklungsmodus aktiviert
* **Single Runtime Chunk** — Gemeinsamer Runtime für alle Einstiegspunkte
* **Filesystem-Cache** — Der persistente Filesystem-Cache von Webpack ist aktiviert, um inkrementelle Rebuilds zu beschleunigen
* **Chunk-Namespacing** — `output.uniqueName` und `output.chunkLoadingGlobal` sind auf `"chamilo"` / `"webpackChunkChamilo"` gesetzt, um Kollisionen beim Laden von Chunks zu vermeiden, wenn mehrere Webpack-Bundles auf einer Seite koexistieren

## Funktionen nur für Produktion

* **Versionierung** — Content-Hash-Suffixe für alle Ausgabedateinamen (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-Attribute auf `<script>`- und `<link>`-Tags (`enableIntegrityHashes()`)
* **Ausgabebereinigung** — `public/build/` wird vor jedem Produktionsbuild geleert

### Ungehashte Asset-Kopien (`CopyUnhashedAssetsPlugin`)

Einige ältere PHP-Seiten verweisen auf Assets über einen festen Dateinamen und können das Webpack-Manifest nicht verwenden. Ein benutzerdefiniertes `CopyUnhashedAssetsPlugin` (definiert am Ende von `webpack.config.js`) kopiert bestimmte gehashte Produktionsdateien nach jedem Build zusätzlich auf einen ungehashten Pfad:

| Gehashte Datei | Ungehashte Kopie |
|----------------|------------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Kopierte Bibliotheks-Assets

`copyFiles()` kopiert eine Reihe von npm-Paketen direkt nach `public/build/libs/` ohne sie zu bündeln, zur Verwendung über `<script>`- / `<link>`-Tags in älteren Vorlagen:

* `flatpickr` (JS + CSS + Lokalisierungen)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` Lokalisierungen
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Build-Befehle

```bash
# Entwicklungsbuild
yarn encore dev

# Entwicklungsbuild mit Dateiüberwachung
yarn encore dev --watch

# Produktionsbuild (minimiert, versioniert, Integritäts-Hashes)
yarn encore production
```

---
## Tailwind-Konfiguration

Tailwind ist in `tailwind.config.js` konfiguriert. Wichtige Punkte:

* **`important: true`** — Alle generierten Hilfsprogramme enthalten `!important`, wodurch sie PrimeVue-Komponentenstile ohne zusätzliche Spezifitätstricks überschreiben können
* **Inhaltspfade** — Tailwind durchsucht `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` und `src/CoreBundle/Resources/views/**/*.html.twig` nach Klassenverwendungen
* **CSS-Variablen-Farbsystem** — Jeder Farb-Token (primär, sekundär, tertiär, Erfolg, Info, Warnung, Gefahr) wird durch eine benutzerdefinierte CSS-Eigenschaft unterstützt (z. B. `--color-primary-base`), die pro Thema in `var/themes/[theme-name]/colors.css` definiert ist. Die Werte sind durch Leerzeichen getrennte RGB-Kanal-Tripel, die Tailwind-Transparenz-Hilfsprogramme ermöglichen (`bg-primary/50`)
* **Benutzerdefinierte Schriftgröße** — `body-1`, `body-2`, `caption`, `tiny` Größen-/Zeilenhöhen-Paare werden über `theme.extend.fontSize` hinzugefügt
* **Plugins** — `@tailwindcss/forms` und `@tailwindcss/typography` sind aktiviert

PostCSS (Tailwind + Autoprefixer) wird inline innerhalb von `webpack.config.js` über `enablePostCssLoader()` konfiguriert — es gibt keine eigenständige `postcss.config.js`-Datei.