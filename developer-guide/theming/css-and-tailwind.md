# CSS y Tailwind

## Arquitectura de Hojas de Estilo

Los estilos de Chamilo están organizados en este orden:

1. **Tailwind CSS** — Clases de utilidad para diseño, espaciado y color. Configurado con `important: true` para que las utilidades sobrescriban los valores predeterminados de los componentes de PrimeVue.
2. **SCSS** — Estilos personalizados en `assets/css/scss/`, organizados en capas de átomos, moléculas, organismos, diseño y componentes.
3. **Estilos de componentes de PrimeVue** — Sobrescritos por componente dentro de `assets/css/scss/atoms/`.
4. **Tema `colors.css`** — Propiedades personalizadas de CSS para el tema de color activo, cargadas al final para que se apliquen sobre todo lo demás.

PrimeFlex está listado en `package.json` pero no se importa — Tailwind cubre todas las necesidades de utilidades.

## Hoja de Estilo Principal (`assets/css/app.scss`)

`app.scss` es el punto de entrada de Webpack para la hoja de estilo principal. Importa:

1. `_tailwind.scss` — Directivas de Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — Archivo barril que importa todos los parciales de SCSS
3. CSS de terceros (cropper, select2, daterangepicker, skin de TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Estilos inyectados en el cuerpo del iframe del editor TinyMCE

## Configuración de Tailwind (`tailwind.config.js`)

Configuraciones clave:

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

Las rutas de contenido escanean componentes Vue, páginas PHP heredadas, archivos de complementos y plantillas Twig para que las utilidades no utilizadas se eliminen en las compilaciones de producción.

### Sistema de Colores con Variables CSS

Todos los tokens de color están respaldados por propiedades personalizadas de CSS en lugar de valores codificados:

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

La función auxiliar `colorWithOpacity` emite `rgb(var(--color-primary-base) / <opacity>)`, permitiendo variantes de opacidad como `bg-primary/50`. Los valores RGB reales se definen por tema en `var/themes/{slug}/colors.css` y se cargan en tiempo de ejecución — consulta [Temas de Color](color-themes.md).

### Complementos de Tailwind

`@tailwindcss/forms` y `@tailwindcss/typography` están habilitados.

### Escala de Tipografía Personalizada

Se añaden cuatro pares adicionales de tamaño de fuente/altura de línea mediante `theme.extend.fontSize`:

| Clase | Tamaño / Altura de línea |
|-------|--------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) se configura en línea dentro de `webpack.config.js` mediante `enablePostCssLoader()`. No existe un archivo independiente `postcss.config.js`.

## Hojas de Estilo Especializadas

| Archivo | Entrada de Webpack | Propósito |
|------|--------------------|-----------|
| `assets/css/app.scss` | `app` | Estilos principales de la aplicación |
| `assets/css/chat.scss` | `css/chat` | Estilos de la interfaz de chat |
| `assets/css/document.scss` | `css/document` | Estilos del visor de documentos |
| `assets/css/editor.scss` | `css/editor` | Estilos del entorno del editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Estilos inyectados en el cuerpo del iframe del editor |
| `assets/css/markdown.scss` | `css/markdown` | Contenido renderizado en Markdown |
| `assets/css/print.scss` | `css/print` | Hoja de estilo para impresión |
| `assets/css/responsive.scss` | `css/responsive` | Sobrescrituras responsivas |
| `assets/css/scorm.scss` | `css/scorm` | Estilos del reproductor SCORM |

## Estructura de Módulos SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barril — importa todo lo que está debajo
├── abstracts/        # Mixins y funciones compartidas
├── settings/         # Tokens de diseño (tipografía, base de componentes)
├── atoms/            # Sobrescrituras de PrimeVue por componente
├── molecules/        # Patrones pequeños compuestos (chips, barras de herramientas, estados vacíos)
├── organisms/        # Áreas más grandes (barra lateral, tabla de datos, diálogo, panel de LP)
├── layout/           # Esqueleto de página (barra superior, contenedor principal, migajas de pan)
├── components/       # Estilos específicos de funciones (blog, ejercicio, social, habilidad, …)
└── libs/             # Sobrescrituras de terceros (FullCalendar, MediaElement.js)
```

## Uso de Tailwind en Componentes Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Debido a que `important: true` está configurado en `tailwind.config.js`, las utilidades de Tailwind sobrescriben de manera confiable los estilos de componentes de PrimeVue sin necesidad de especificidad adicional.