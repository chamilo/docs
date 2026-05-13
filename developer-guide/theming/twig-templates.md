# Plantillas Twig

Chamilo utiliza Twig para las páginas renderizadas del lado del servidor. Las plantillas se encuentran en `src/CoreBundle/Resources/views/` y se referencian con el prefijo de espacio de nombres `@ChamiloCore/` (por ejemplo, `@ChamiloCore/Layout/base-layout.html.twig`).

No existe un directorio de nivel superior `templates/`; todas las plantillas Twig están bajo `src/CoreBundle/Resources/views/`.

## Cómo Coexisten Twig y Vue

La mayoría de las páginas siguen este flujo:

1. Un controlador de Symfony renderiza una plantilla Twig que extiende un diseño.
2. El diseño incluye `vue_setup.html.twig`, que emite `<div id="app">` e inyecta variables globales en tiempo de ejecución (`window.user`, `window.breadcrumb`, etc.) a través de `vue_js_setup.html.twig`.
3. Vue se monta en `#app` y maneja todo el renderizado de la interfaz de usuario dentro de ese elemento.
4. La aplicación Vue se comunica con el backend a través de la API REST.

Para las páginas heredadas que aún no han sido migradas a Vue, Symfony renderiza el HTML completo de la página a través de Twig y el contenido se coloca dentro de `#sectionMainContent`. Vue todavía se monta (proporcionando la barra lateral y la barra superior), pero el área de contenido principal es HTML renderizado en el servidor.

## Plantillas de Diseño

Todos los diseños extienden `@ChamiloCore/Layout/base-layout.html.twig`, que proporciona la estructura `<html>`, `<head>` y `<body>`. Variantes de diseño disponibles:

| Plantilla | Propósito |
|----------|---------|
| `Layout/base-layout.html.twig` | Plantilla raíz — estructura `<html>`, importa Macros, emite `<head>` y `<body>` |
| `Layout/layout.html.twig` | Diseño completo estándar con barra lateral, barra superior y área de contenido |
| `Layout/layout_one_col.html.twig` | Diseño de una sola columna (sin barra lateral) |
| `Layout/layout_two_col.html.twig` | Diseño de dos columnas |
| `Layout/layout_content.html.twig` | Envoltura solo de contenido |
| `Layout/layout_empty.html.twig` | Diseño vacío con mínimo cromado |
| `Layout/no_layout.html.twig` | Sin encabezado/pie de página; el contenido va directamente dentro de `<body>` |
| `Layout/no_layout_scorm.html.twig` | Diseño básico para marcos de contenido SCORM |
| `Layout/blank.html.twig` | Página completamente en blanco |
| `Layout/skill_layout.html.twig` | Diseño para la página de la rueda de habilidades |

## Parciales Clave

| Plantilla | Propósito |
|----------|---------|
| `Layout/head.html.twig` | Contenido de `<head>`: etiquetas meta, todas las entradas CSS de Encore, `colors.css` del tema, entradas JS heredadas, etiquetas OpenGraph/Twitter |
| `Layout/foot.html.twig` | Final del cuerpo: punto de entrada JS de Vue, inyección de `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emite `<div id="app">` e incluye `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Inyecta `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | Banner de consentimiento de cookies GDPR |
| `Layout/footer.html.twig` | Barra de pie de página |
| `Layout/course_navigation.html.twig` | Migaja de pan de navegación de herramientas del curso |

## Integración con Webpack Encore

`head.html.twig` carga CSS para todas las entradas; `foot.html.twig` carga el paquete JS de Vue:

```twig
{# En head.html.twig — entradas CSS #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# En foot.html.twig — Vue JS (cargado al final del cuerpo) #}
{{ encore_entry_script_tags('vue') }}
```

Las entradas JS heredadas (`legacy_app`, `legacy_lp`, etc.) se cargan en `<head>` porque las páginas PHP heredadas dependen de que estén disponibles antes de que el DOM esté listo.

## Macros

Las macros reutilizables de Twig están en `Macros/` y se importan en la parte superior de `base-layout.html.twig`:

| Archivo de Macro | Proporciona |
|-----------|---------|
| `Macros/box.html.twig` | Ayudantes para cajas de contenido |
| `Macros/actions.html.twig` | Renderizado de botones de acción |
| `Macros/buttons.html.twig` | Ayudantes HTML para botones |
| `Macros/headers.html.twig` | Ayudantes para encabezados de página |
| `Macros/image.html.twig` | Ayudantes para renderizado de imágenes |
| `Macros/modals.html.twig` | Ayudantes para diálogos modales |

Uso dentro de cualquier plantilla que extienda `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Guardar') }}
{{ macro_box.content_box('Título', contenido) }}
```

## Plantillas Vue Personalizadas

Chamilo soporta anulaciones de páginas Vue por instalación a través de la variable de entorno `APP_CUSTOM_VUE_TEMPLATE`. Cuando está configurada, la compilación de Webpack expone una constante `ENV_CUSTOM_VUE_TEMPLATE` a través de `DefinePlugin`, y el enrutador de Vue importa condicionalmente componentes de anulación desde `var/vue_templates/`.

Ubicaciones actuales de anulación:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Reemplaza la página de entrada predeterminada /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Solo los archivos presentes en `var/vue_templates/` son anulados; todas las demás páginas y componentes utilizan los originales del núcleo.

---
## Referencia de Funciones Twig

Funciones clave de Twig disponibles en todas las plantillas (registradas en `ChamiloExtension`):

| Función | Propósito |
|----------|-----------|
| `chamilo_settings_get('ns.key')` | Leer una configuración de la plataforma |
| `chamilo_settings_has('ns.key')` | Verificar si existe una configuración |
| `chamilo_settings_all()` | Obtener todas las configuraciones como un arreglo |
| `theme_asset('path')` | URL a un recurso en el tema activo |
| `theme_asset_link_tag('path')` | Etiqueta `<link>` para un archivo CSS del tema |
| `theme_asset_script_tag('path')` | Etiqueta `<script>` para un archivo JS del tema |
| `theme_asset_base64('path')` | URI de datos Base64 para un recurso del tema |
| `theme_logo('header'\|'email')` | URL al logotipo preferido |
| `is_allowed_to_edit(...)` | Ayudante para verificar permisos |