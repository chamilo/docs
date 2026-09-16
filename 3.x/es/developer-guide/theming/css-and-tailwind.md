# CSS y Tailwind

## Arquitectura de hojas de estilo

Los estilos de Chamilo se superponen en este orden:

1. **Tailwind CSS** — Clases de utilidad para maquetación, espaciado y color. Configurado con `important: true` para que las utilidades prevalezcan sobre los valores predeterminados de los componentes PrimeVue.
2. **SCSS** — Estilos personalizados en `assets/css/scss/`, organizados en capas de átomos, moléculas, organismos, maquetación y componentes.
3. **Estilos de componentes PrimeVue** — Sobrescritos por componente dentro de `assets/css/scss/atoms/`.
4. **`colors.css` del tema** — Propiedades personalizadas CSS del tema de color activo, cargadas en último lugar para que se apliquen en cascada sobre todo lo demás.

PrimeFlex se ha eliminado de `package.json`: Tailwind cubre todas las necesidades de utilidades.

## Hoja de estilo principal (`assets/css/app.scss`)

`app.scss` es el punto de entrada de Webpack de la hoja de estilo principal. Importa:

1. `_tailwind.scss` — Directivas `@tailwind base / components / utilities` de Tailwind
2. `scss/index.scss` — Archivo barril que importa todos los parciales SCSS
3. CSS de terceros (cropper, select2, daterangepicker, skin de TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Estilos inyectados en el cuerpo del iframe del editor TinyMCE

## Configuración de Tailwind (`tailwind.config.js`)

Ajustes clave:

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

Las rutas de contenido recorren componentes Vue, páginas PHP heredadas, archivos de plugins y plantillas Twig para que las utilidades no usadas se eliminen en las compilaciones de producción.

### Sistema de color con variables CSS

Todos los tokens de color se basan en propiedades personalizadas CSS en lugar de valores fijos:

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

El ayudante `colorWithOpacity` emite `rgb(var(--color-primary-base) / <opacity>)`, lo que permite variantes de opacidad como `bg-primary/50`. Los valores RGB reales se definen por tema en `var/themes/{slug}/colors.css` y se cargan en tiempo de ejecución; véase [Temas de color](color-themes.md).

### Plugins de Tailwind

Están habilitados `@tailwindcss/forms` y `@tailwindcss/typography`.

### Escala tipográfica personalizada

Se añaden cuatro pares extra de tamaño de fuente/altura de línea mediante `theme.extend.fontSize`:

| Clase | Tamaño / Altura de línea |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) se configura en línea dentro de `webpack.config.js` mediante `enablePostCssLoader()`. No existe un archivo independiente `postcss.config.js`.

## Hojas de estilo especializadas

| Archivo | Entrada Webpack | Propósito |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Estilos principales de la aplicación |
| `assets/css/chat.scss` | `css/chat` | Estilos de la interfaz de chat |
| `assets/css/document.scss` | `css/document` | Estilos del visor de documentos |
| `assets/css/editor.scss` | `css/editor` | Estilos del contenedor del editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Estilos inyectados en el cuerpo del iframe del editor |
| `assets/css/markdown.scss` | `css/markdown` | Contenido renderizado en Markdown |
| `assets/css/print.scss` | `css/print` | Hoja de estilo de impresión |
| `assets/css/responsive.scss` | `css/responsive` | Sobrescrituras adaptativas |
| `assets/css/scorm.scss` | `css/scorm` | Estilos del reproductor SCORM |

## Estructura de módulos SCSS (`assets/css/scss/`)

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

## Uso de Tailwind en componentes Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Como `important: true` está definido en `tailwind.config.js`, las utilidades de Tailwind sobrescriben de forma fiable los estilos de los componentes PrimeVue sin necesidad de mayor especificidad.