# Sistema de Construcción

Chamilo utiliza **Webpack 5** a través de **Symfony Webpack Encore** para construir los activos del frontend. La configuración completa de construcción se encuentra en `webpack.config.js` en la raíz del proyecto.

La salida se escribe en `public/build/`, servida bajo la ruta pública `/build`.

## Puntos de Entrada

### JavaScript

| Entrada | Fuente | Propósito |
|---------|--------|-----------|
| `vue` | `assets/vue/main.js` | Aplicación principal de Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Asistente de instalación |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript heredado |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Reproductor de ejercicios |
| `legacy_lp` | `assets/js/legacy/lp.js` | Reproductor de rutas de aprendizaje |
| `legacy_document` | `assets/js/legacy/document.js` | Visor de documentos |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de cuadrícula heredado |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Cargador de frames listos para iframes heredados |
| `translatehtml` | `assets/js/translatehtml.js` | Ayudante de traducción de HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Resaltado automático de términos de glosario |

### CSS

| Entrada | Fuente |
|---------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Características de Construcción

* **Vue 3 SFC** — Componentes de archivo único `.vue` compilados por `vue-loader`; el compilador en tiempo de ejecución está deshabilitado (`runtimeCompilerBuild: false`), por lo que todas las plantillas deben estar precompiladas
* **TypeScript** — Modo de solo transpilación (`transpileOnly: true`) para construcciones rápidas, sin verificación de tipos durante la construcción
* **Sass/SCSS** — Soporte completo para SCSS a través de `sass-loader`
* **Tailwind CSS** — CSS basado en utilidades procesado en línea mediante PostCSS (configurado dentro de `webpack.config.js`; no hay un archivo separado `postcss.config.js`)
* **Babel** — Transpilación de ES6+ con `@babel/preset-env` y polyfills de `core-js@3` (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` hace que `$` y `jQuery` estén disponibles globalmente sin importaciones explícitas, soportando código heredado
* **Source maps** — Habilitados solo en desarrollo
* **Single runtime chunk** — Runtime compartido para todas las entradas
* **Filesystem cache** — La caché persistente del sistema de archivos de Webpack está habilitada para acelerar las reconstrucciones incrementales
* **Chunk namespacing** — `output.uniqueName` y `output.chunkLoadingGlobal` están configurados como `"chamilo"` / `"webpackChunkChamilo"` para evitar colisiones de carga de fragmentos cuando múltiples paquetes de Webpack coexisten en una página

## Características Solo para Producción

* **Versionado** — Sufijos de hash de contenido en todos los nombres de archivo de salida (`enableVersioning()`)
* **Integridad de Subrecursos** — Atributos `integrity` en etiquetas `<script>` y `<link>` (`enableIntegrityHashes()`)
* **Limpieza de Salida** — `public/build/` se borra antes de cada construcción de producción

### Copias de activos sin hash (`CopyUnhashedAssetsPlugin`)

Algunas páginas PHP heredadas hacen referencia a activos por un nombre de archivo fijo y no pueden usar el manifiesto de Webpack. Un complemento personalizado `CopyUnhashedAssetsPlugin` (definido al final de `webpack.config.js`) copia ciertos archivos de producción con hash a una ruta adicional sin hash después de cada construcción:

| Archivo con hash | Copia sin hash |
|------------------|----------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Activos de Bibliotecas Copiados

`copyFiles()` copia una serie de paquetes npm directamente a `public/build/libs/` sin empaquetarlos, para su uso mediante etiquetas `<script>` / `<link>` en plantillas heredadas:

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

## Comandos de Construcción

```bash
# Construcción de desarrollo
yarn encore dev

# Construcción de desarrollo con observación de archivos
yarn encore dev --watch

# Construcción de producción (minificado, versionado, hashes de integridad)
yarn encore production
```

---
## Configuración de Tailwind

Tailwind está configurado en `tailwind.config.js`. Puntos clave:

* **`important: true`** — Todas las utilidades generadas incluyen `!important`, lo que les permite sobrescribir los estilos de los componentes de PrimeVue sin necesidad de trucos adicionales de especificidad
* **Rutas de contenido** — Tailwind escanea `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` y `src/CoreBundle/Resources/views/**/*.html.twig` en busca de uso de clases
* **Sistema de colores con variables CSS** — Cada token de color (primario, secundario, terciario, éxito, información, advertencia, peligro) está respaldado por una propiedad personalizada de CSS (por ejemplo, `--color-primary-base`) definida por tema en `var/themes/[theme-name]/colors.css`. Los valores son tripletas de canales RGB separadas por espacios, lo que habilita las utilidades de opacidad de Tailwind (`bg-primary/50`)
* **Escala de fuente personalizada** — Se añaden pares de tamaño/altura de línea `body-1`, `body-2`, `caption`, `tiny` a través de `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` y `@tailwindcss/typography` están habilitados

PostCSS (Tailwind + Autoprefixer) está configurado de manera inline dentro de `webpack.config.js` mediante `enablePostCssLoader()` — no existe un archivo independiente `postcss.config.js`.