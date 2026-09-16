# Plantillas Twig

Chamilo utiliza Twig para las páginas renderizadas en el servidor. Las plantillas se encuentran en `src/CoreBundle/Resources/views/` y se referencian con el prefijo de espacio de nombres `@ChamiloCore/` (p. ej. `@ChamiloCore/Layout/base-layout.html.twig`).

No existe un directorio de nivel superior `templates/` — todas las plantillas Twig están bajo `src/CoreBundle/Resources/views/`.

## Cómo coexisten Twig y Vue

La mayoría de las páginas siguen este flujo:

1. Un controlador de Symfony renderiza una plantilla Twig que extiende un layout.
2. El layout incluye `vue_setup.html.twig`, que emite `<div id="app">` e inyecta globales de tiempo de ejecución (`window.user`, `window.breadcrumb`, etc.) mediante `vue_js_setup.html.twig`.
3. Vue se monta en `#app` y gestiona todo el renderizado de la interfaz dentro de ese elemento.
4. La aplicación Vue se comunica con el backend a través de la API REST.

En las páginas heredadas que aún no se han migrado a Vue, Symfony renderiza el HTML completo de la página mediante Twig y el contenido se coloca dentro de `#sectionMainContent`. Vue sigue montándose (proporcionando el contenedor de la barra lateral y la barra superior), pero el área de contenido principal es HTML renderizado en el servidor.

## Plantillas de layout

Todos los layouts extienden `@ChamiloCore/Layout/base-layout.html.twig`, que proporciona la estructura de `<html>`, `<head>` y `<body>`. Variantes de layout disponibles:

| Plantilla | Propósito |
|----------|---------|
| `Layout/base-layout.html.twig` | Plantilla raíz — envoltorio `<html>`, importa Macros, emite `<head>` y `<body>` |
| `Layout/layout.html.twig` | Layout completo estándar con barra lateral, barra superior y área de contenido |
| `Layout/layout_one_col.html.twig` | Layout de una sola columna (sin barra lateral) |
| `Layout/layout_two_col.html.twig` | Layout de dos columnas |
| `Layout/layout_content.html.twig` | Envoltorio solo de contenido |
| `Layout/layout_empty.html.twig` | Layout vacío con cromado mínimo |
| `Layout/no_layout.html.twig` | Sin cabecera/pie; el contenido va directamente dentro de `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout desnudo para marcos de contenido SCORM |
| `Layout/blank.html.twig` | Página completamente en blanco |
| `Layout/skill_layout.html.twig` | Layout para la página de la rueda de competencias |

## Parciales clave

| Plantilla | Propósito |
|----------|---------|
| `Layout/head.html.twig` | Contenido de `<head>`: metaetiquetas, todas las entradas CSS de Encore, `colors.css` del tema, entradas JS heredadas, etiquetas OpenGraph/Twitter |
| `Layout/foot.html.twig` | Final del body: punto de entrada JS de Vue, inyección de `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emite `<div id="app">` e incluye `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Inyecta `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | Banner de consentimiento de cookies GDPR |
| `Layout/footer.html.twig` | Barra de pie de página |
| `Layout/course_navigation.html.twig` | Migas de pan de navegación de herramientas del curso |

## Integración con Webpack Encore

`head.html.twig` carga el CSS de todas las entradas; `foot.html.twig` carga el paquete JS de Vue:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Las entradas JS heredadas (`legacy_app`, `legacy_lp`, etc.) se cargan en `<head>` porque las páginas PHP heredadas dependen de que estén disponibles antes de que el DOM esté listo.

## Macros

Las macros Twig reutilizables están en `Macros/` y se importan al inicio de `base-layout.html.twig`:

| Archivo de macro | Proporciona |
|-----------|---------|
| `Macros/box.html.twig` | Ayudantes de cajas de contenido |
| `Macros/actions.html.twig` | Renderizado de botones de acción |
| `Macros/buttons.html.twig` | Ayudantes HTML de botones |
| `Macros/headers.html.twig` | Ayudantes de cabecera de página |
| `Macros/image.html.twig` | Ayudantes de renderizado de imágenes |
| `Macros/modals.html.twig` | Ayudantes de diálogos modales |

Uso dentro de cualquier plantilla que extienda `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Plantillas Vue personalizadas

Chamilo admite sobrescrituras de páginas Vue por instalación mediante la variable de entorno `APP_CUSTOM_VUE_TEMPLATE`. Cuando está definida, la compilación de Webpack expone una constante `ENV_CUSTOM_VUE_TEMPLATE` a través de `DefinePlugin`, y el enrutador de Vue importa condicionalmente componentes de sobrescritura desde `var/vue_templates/`.

Ubicaciones de sobrescritura actuales:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Solo se sobrescriben los archivos presentes en `var/vue_templates/` — el resto de páginas y componentes utilizan los originales del núcleo.

## Referencia de funciones Twig

Funciones Twig clave disponibles en todas las plantillas (registradas en `ChamiloExtension`):

| Función | Propósito |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Leer un ajuste de la plataforma |
| `chamilo_settings_has('ns.key')` | Comprobar si existe un ajuste |
| `chamilo_settings_all()` | Obtener todos los ajustes como un array |
| `theme_asset('path')` | URL de un recurso en el tema activo |
| `theme_asset_link_tag('path')` | Etiqueta `<link>` para un archivo CSS del tema |
| `theme_asset_script_tag('path')` | Etiqueta `<script>` para un archivo JS del tema |
| `theme_asset_base64('path')` | URI de datos Base64 para un recurso del tema |
| `theme_logo('header'\|'email')` | URL del logotipo preferido |
| `is_allowed_to_edit(...)` | Ayudante de comprobación de permisos |