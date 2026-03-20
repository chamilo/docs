# Build System

Chamilo uses **Webpack 5** via **Symfony Webpack Encore** for building frontend assets.

## Configuration

The build is configured in `webpack.config.js`.

### Entry Points

**JavaScript entries:**

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Main Vue 3 application |
| `vue_installer` | `assets/vue/main_installer.js` | Installation wizard |
| `legacy_app` | `assets/js/legacy/app.js` | Legacy JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Exercise player |
| `legacy_lp` | `assets/js/legacy/lp.js` | Learning path player |
| `legacy_document` | `assets/js/legacy/document.js` | Document viewer |
| `translatehtml` | `assets/js/translatehtml.js` | HTML translation |

**CSS entries:**

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/scorm` | `assets/css/scorm.scss` |
| `css/print` | `assets/css/print.scss` |

### Build Features

* **Vue 3 SFC** — `.vue` single file components with `vue-loader`
* **TypeScript** — Transpile-only mode for fast builds
* **Sass/SCSS** — CSS preprocessor support
* **Tailwind CSS** — Utility-first CSS via PostCSS
* **Babel** — ES6+ transpilation with core-js polyfills
* **Source maps** — Enabled in development
* **Single runtime chunk** — Shared runtime for all entries

## Build Commands

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, optimized)
yarn encore production
```

## Tailwind Configuration

Tailwind is configured in `tailwind.config.js`:

* Scans Vue components, Twig templates, and JS files for class usage
* PrimeVue component classes are included in the content paths
* Standard Tailwind utilities are available throughout the frontend

## PostCSS

`postcss.config.js` enables:

* Tailwind CSS processing
* Autoprefixer for browser compatibility
