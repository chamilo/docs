# Temas de color

Chamilo 3.0 utiliza un sistema de temas de color basado en base de datos. Los temas se gestionan a través de la interfaz de administración, se almacenan en la base de datos y se escriben en disco como archivos CSS. Pueden personalizarse por URL de acceso, lo que permite que las instalaciones multi-URL tengan identidades visuales distintas.

## Modelo de datos

Dos entidades impulsan el sistema de temas:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Clave primaria |
| `title` | string | Nombre legible para humanos |
| `slug` | string | Generado automáticamente a partir de `title` (p. ej. `"My Theme"` → `my-theme`); se usa como nombre de directorio en `var/themes/` |
| `variables` | array (JSON) | Mapa de nombre de propiedad personalizada CSS → valor (p. ej. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Asocia un `ColorTheme` con un `AccessUrl`. El indicador booleano `active` marca qué tema está activo actualmente para esa URL. Solo un tema puede estar activo por URL de acceso a la vez.

## Cómo se almacenan los temas

Cuando se crea o actualiza un tema a través de la API, `ColorThemeStateProcessor` genera el archivo CSS y lo escribe en el Flysystem `themes_filesystem` (respaldado por `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

El `colors.css` generado envuelve todas las variables en un bloque `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Los valores son tripletes de canales RGB separados por espacios (no `rgb()`), lo que permite a Tailwind componer variantes de opacidad como `bg-primary/50` sin configuración adicional.

## Precedencia de resolución de temas

`ThemeHelper::getVisualTheme()` resuelve qué slug de tema aplicar en cualquier página, en este orden:

1. **Tema activo para el AccessUrl actual** — el registro `AccessUrlRelColorTheme` con `active = true`
2. **Tema seleccionado por el usuario** — el tema almacenado en la entidad `User`, si el ajuste de plataforma `profile.user_selected_theme` está habilitado
3. **Tema del curso** — el ajuste de curso `course_theme`, si el ajuste de plataforma `course.allow_course_theme` está habilitado
4. **Tema de itinerario de aprendizaje** — el valor `$lp_theme_css` del LP, si el ajuste de curso `allow_learning_path_theme` está habilitado
5. **Variable de entorno `THEME_FALLBACK`** — definida en `.env` como `THEME_FALLBACK='chamilo'`
6. **Predeterminado** — `chamilo` (codificado de forma fija como `ThemeHelper::DEFAULT_THEME`)

## Servicio de recursos

Los recursos de tema los sirve `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) bajo el prefijo `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Servir cualquier recurso de tema (CSS, JS, imágenes); recurre al tema `chamilo` si no se encuentra en el tema solicitado |
| `GET /themes/{slug}/logo/{type}` | Servir el logotipo preferido (`header` o `email`), con reserva SVG → PNG |
| `POST /themes/{slug}/logos` | Subir logotipos de cabecera/correo (SVG y/o PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Eliminar un logotipo concreto |

La ruta general de recursos (`/{name}/{path}`) recurre automáticamente al tema predeterminado `chamilo` cuando falta un archivo en el tema solicitado, de modo que los temas solo necesitan incluir los archivos que realmente sobrescriben.

## Cómo se cargan los temas en las plantillas

La plantilla de diseño `head.html.twig` carga los recursos del tema activo mediante funciones auxiliares de Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Las tres funciones Twig (registradas en `ChamiloExtension`) resuelven la ruta del recurso a través de `ThemeHelper`, aplicando la misma cadena de reserva que arriba:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL del recurso en el tema resuelto |
| `theme_asset_link_tag('path')` | Etiqueta completa `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Etiqueta completa `<script src="...">` |
| `theme_asset_base64('path')` | URI de datos del recurso codificada en Base64 |
| `theme_logo('header'\|'email')` | URL del mejor logotipo disponible |

## Endpoints de la API

La gestión de temas se expone a través de la API REST de API Platform (solo administradores):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Crear un tema nuevo |
| `PUT` | `/api/color_themes/{id}` | Actualizar un tema existente |
| `POST` | `/api/access_url_rel_color_themes` | Asociar/activar un tema para una URL de acceso |
| `GET` | `/api/access_url_rel_color_themes` | Listar las asociaciones de temas para la URL de acceso actual |

## Creación de un tema personalizado

El flujo de trabajo estándar se realiza a través de la interfaz de administración (**Administración → Temas de color**), que invoca los endpoints de la API descritos más arriba. Para crear un tema de forma programática:

1. `POST /api/color_themes` con un cuerpo JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Esto persiste la entidad y escribe `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` para asociarlo y activarlo en la URL de acceso actual:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Para añadir imágenes personalizadas (logotipo, favicon, fondos), súbalas mediante `POST /themes/{slug}/logos` o colóquelas directamente en `var/themes/{slug}/images/`.

## Referencia de variables de color

Todas las variables esperadas por la configuración predeterminada de Tailwind:

| Variable | Propósito |
|----------|---------|
| `--color-primary-base` | Color principal de marca |
| `--color-primary-gradient` | Parada de degradado más oscura para el color principal |
| `--color-primary-button-text` | Color del texto en los botones principales |
| `--color-primary-button-alternative-text` | Color de texto alternativo en los botones principales |
| `--color-secondary-base` | Color de acento secundario |
| `--color-secondary-gradient` | Parada de degradado para el color secundario |
| `--color-secondary-button-text` | Color del texto en los botones secundarios |
| `--color-tertiary-base` | Color terciario |
| `--color-tertiary-gradient` | Parada de degradado para el color terciario |
| `--color-tertiary-button-text` | Color del texto en los botones terciarios |
| `--color-success-base` | Color de estado de éxito |
| `--color-success-gradient` | Parada de degradado para el estado de éxito |
| `--color-success-button-text` | Color del texto en los botones de éxito |
| `--color-info-base` | Color de estado informativo |
| `--color-info-gradient` | Parada de degradado para el estado informativo |
| `--color-info-button-text` | Color del texto en los botones informativos |
| `--color-warning-base` | Color de estado de advertencia |
| `--color-warning-gradient` | Parada de degradado para el estado de advertencia |
| `--color-warning-button-text` | Color del texto en los botones de advertencia |
| `--color-danger-base` | Color de estado de peligro/error |
| `--color-danger-gradient` | Parada de degradado para el estado de peligro |
| `--color-danger-button-text` | Color del texto en los botones de peligro |
| `--color-form-base` | Color de acento de los elementos de formulario |