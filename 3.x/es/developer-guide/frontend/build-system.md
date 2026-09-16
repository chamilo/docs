# Sistema de compilación

Chamilo utiliza **Webpack 5** a través de **Symfony Webpack Encore** para compilar los recursos del frontend. La configuración completa de la compilación se encuentra en `webpack.config.js` en la raíz del proyecto.

La salida se escribe en `public/build/` y se sirve bajo la ruta pública `/build`.

## Puntos de entrada

### JavaScript

| Entrada | Origen | Propósito |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Aplicación principal de Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Asistente de instalación |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript heredado |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Reproductor de ejercicios |
| `legacy_lp` | `assets/js/legacy/lp.js` | Reproductor de itinerarios de aprendizaje |
| `legacy_document` | `assets/js/legacy/document.js` | Visor de documentos |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de cuadrícula heredado |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Cargador frame-ready para iframes heredados |
| `translatehtml` | `assets/js/translatehtml.js` | Ayudante de traducción HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Resaltado automático de términos del glosario |

### CSS

| Entrada | Origen |
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

## Funcionalidades de la compilación

* **Vue 3 SFC** — componentes de un solo archivo `.vue` compilados por `vue-loader`; el compilador en tiempo de ejecución está desactivado (`runtimeCompilerBuild: false`), por lo que todas las plantillas deben precompilarse
* **TypeScript** — modo solo transpilación (`transpileOnly: true`) para compilaciones rápidas, sin comprobación de tipos durante la compilación
* **Sass/SCSS** — soporte completo de SCSS mediante `sass-loader`
* **Tailwind CSS** — CSS utility-first procesado en línea mediante PostCSS (configurado dentro de `webpack.config.js`; no hay un `postcss.config.js` independiente)
* **Babel** — transpilación ES6+ con `@babel/preset-env` y polyfills de `core-js@3` (`useBuiltIns: "usage"`)
* **Provisión automática de jQuery** — `autoProvidejQuery()` hace que `$` y `jQuery` estén disponibles globalmente sin importaciones explícitas, en apoyo del código heredado
* **Mapas de origen** — habilitados solo en desarrollo
* **Chunk de runtime único** — runtime compartido para todas las entradas
* **Caché de sistema de archivos** — la caché persistente de sistema de archivos de Webpack está habilitada para acelerar las recompilaciones incrementales
* **Espacio de nombres de chunks** — `output.uniqueName` y `output.chunkLoadingGlobal` se establecen en `"chamilo"` / `"webpackChunkChamilo"` para evitar colisiones de carga de chunks cuando coexisten varios bundles de Webpack en una página

## Funcionalidades solo de producción

* **Versionado** — sufijos de hash de contenido en todos los nombres de archivo de salida (`enableVersioning()`)
* **Subresource Integrity** — atributos `integrity` en las etiquetas `<script>` y `<link>` (`enableIntegrityHashes()`)
* **Limpieza de la salida** — `public/build/` se vacía antes de cada compilación de producción

### Copias de recursos sin hash (`CopyUnhashedAssetsPlugin`)

Algunas páginas PHP heredadas referencian recursos por un nombre de archivo fijo y no pueden usar el manifiesto de Webpack. Un `CopyUnhashedAssetsPlugin` personalizado (definido al final de `webpack.config.js`) copia determinados archivos de producción con hash a una ruta adicional sin hash después de cada compilación:

| Archivo con hash | Copia sin hash |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Recursos de bibliotecas copiados

`copyFiles()` copia varios paquetes npm directamente en `public/build/libs/` sin empaquetarlos, para su uso mediante etiquetas `<script>` / `<link>` en plantillas heredadas:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* locales de `moment`
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Comandos de compilación

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Configuración de Tailwind

Tailwind se configura en `tailwind.config.js`. Puntos clave:

* **`important: true`** — Todas las utilidades generadas incluyen `!important`, lo que les permite anular los estilos de los componentes de PrimeVue sin trucos extra de especificidad
* **Rutas de contenido** — Tailwind analiza `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` y `src/CoreBundle/Resources/views/**/*.html.twig` en busca del uso de clases
* **Sistema de color con variables CSS** — Cada token de color (primary, secondary, tertiary, success, info, warning, danger) se respalda en una propiedad personalizada CSS (p. ej. `--color-primary-base`) definida por tema en `var/themes/[theme-name]/colors.css`. Los valores son tripletes de canales RGB separados por espacios, lo que habilita las utilidades de opacidad de Tailwind (`bg-primary/50`)
* **Escala tipográfica personalizada** — Los pares de tamaño/altura de línea `body-1`, `body-2`, `caption`, `tiny` se añaden mediante `theme.extend.fontSize`
* **Plugins** — Están habilitados `@tailwindcss/forms` y `@tailwindcss/typography`

PostCSS (Tailwind + Autoprefixer) se configura en línea dentro de `webpack.config.js` mediante `enablePostCssLoader()` — no existe un archivo independiente `postcss.config.js`.