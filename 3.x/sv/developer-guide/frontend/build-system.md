# Byggsystem

Chamilo använder **Webpack 5** via **Symfony Webpack Encore** för att bygga frontend-resurser. Den fullständiga byggkonfigurationen finns i `webpack.config.js` i projektets rot.

Utdata skrivs till `public/build/` och serveras under den publika sökvägen `/build`.

## Ingångspunkter

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Huvudapplikation i Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Installationsguide |
| `legacy_app` | `assets/js/legacy/app.js` | Äldre JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Övningsspelare |
| `legacy_lp` | `assets/js/legacy/lp.js` | Spelare för lärstigar |
| `legacy_document` | `assets/js/legacy/document.js` | Dokumentvisare |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Äldre rutnätswidget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready-laddare för äldre iframes |
| `translatehtml` | `assets/js/translatehtml.js` | Hjälpfunktion för HTML-översättning |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatisk markering av ordlistetermer |

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

## Byggfunktioner

* **Vue 3 SFC** — `.vue`-komponenter i en fil kompileras av `vue-loader`; runtime-kompilatorn är inaktiverad (`runtimeCompilerBuild: false`), så alla mallar måste vara förkompilerade
* **TypeScript** — Endast transpilering (`transpileOnly: true`) för snabba byggen, ingen typkontroll under bygget
* **Sass/SCSS** — Fullständigt SCSS-stöd via `sass-loader`
* **Tailwind CSS** — Utility-first-CSS som bearbetas inline via PostCSS (konfigurerat i `webpack.config.js`; det finns ingen separat `postcss.config.js`)
* **Babel** — Transpilering av ES6+ med `@babel/preset-env` och `core-js@3`-polyfills (`useBuiltIns: "usage"`)
* **Automatisk tillhandahållning av jQuery** — `autoProvidejQuery()` gör `$` och `jQuery` globalt tillgängliga utan explicita importer, vilket stöder äldre kod
* **Source maps** — Aktiverade endast i utvecklingsläge
* **En enda runtime-chunk** — Delad runtime för alla ingångspunkter
* **Filsystemscache** — Webpacks persistenta filsystemscache är aktiverad för att snabba upp inkrementella ombyggnader
* **Namnrymd för chunks** — `output.uniqueName` och `output.chunkLoadingGlobal` är satta till `"chamilo"` / `"webpackChunkChamilo"` för att undvika kollisioner vid chunk-laddning när flera Webpack-buntar samexisterar på en sida

## Funktioner endast för produktion

* **Versionering** — Suffix med innehållshash på alla utdatafilnamn (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-attribut på `<script>`- och `<link>`-taggar (`enableIntegrityHashes()`)
* **Rensning av utdata** — `public/build/` rensas före varje produktionsbygge

### Kopior av ohashade resurser (`CopyUnhashedAssetsPlugin`)

Vissa äldre PHP-sidor refererar till resurser med ett fast filnamn och kan inte använda Webpack-manifestet. Ett anpassat `CopyUnhashedAssetsPlugin` (definierat längst ned i `webpack.config.js`) kopierar vissa hashade produktionsfiler till en extra ohashad sökväg efter varje bygge:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Kopierade biblioteksresurser

`copyFiles()` kopierar ett antal npm-paket direkt till `public/build/libs/` utan att bunta dem, för användning via `<script>`- / `<link>`-taggar i äldre mallar:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Byggkommandon

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-konfiguration

Tailwind konfigureras i `tailwind.config.js`. Viktiga punkter:

* **`important: true`** — Alla genererade utilities inkluderar `!important`, vilket gör att de kan åsidosätta PrimeVue-komponentstilar utan extra specificitetsknep
* **Innehållssökvägar** — Tailwind skannar `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` och `src/CoreBundle/Resources/views/**/*.html.twig` efter klassanvändning
* **Färgsystem med CSS-variabler** — Varje färgtoken (primary, secondary, tertiary, success, info, warning, danger) backas upp av en CSS custom property (t.ex. `--color-primary-base`) som definieras per tema i `var/themes/[theme-name]/colors.css`. Värdena är mellanslagsseparerade RGB-kanaltripletter, vilket möjliggör Tailwinds opacitet-utilities (`bg-primary/50`)
* **Anpassad typsnittsskala** — `body-1`, `body-2`, `caption`, `tiny` storlek/radavstånd-par läggs till via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` och `@tailwindcss/typography` är aktiverade

PostCSS (Tailwind + Autoprefixer) konfigureras inline i `webpack.config.js` via `enablePostCssLoader()` — det finns ingen fristående `postcss.config.js`-fil.