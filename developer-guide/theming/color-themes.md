# Temas de Color

Chamilo 2.0 utiliza un sistema de temas de color basado en base de datos. Los temas se gestionan a través de la interfaz de administración, se almacenan en la base de datos y se escriben en disco como archivos CSS. Pueden personalizarse por URL de acceso, permitiendo que instalaciones multi-URL tengan identidades visuales diferentes.

## Modelo de Datos

Dos entidades impulsan el sistema de temas:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | int | Clave primaria |
| `title` | string | Nombre legible por humanos |
| `slug` | string | Generado automáticamente a partir de `title` (por ejemplo, `"Mi Tema"` → `mi-tema`); usado como nombre del directorio en `var/themes/` |
| `variables` | array (JSON) | Mapa de nombre de propiedad CSS personalizada → valor (por ejemplo, `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Asocia un `ColorTheme` con un `AccessUrl`. La bandera booleana `active` marca qué tema está actualmente activo para esa URL. Solo un tema puede estar activo por URL de acceso a la vez.

## Cómo se Almacenan los Temas

Cuando un tema se crea o actualiza a través de la API, `ColorThemeStateProcessor` genera el archivo CSS y lo escribe en el `themes_filesystem` de Flysystem (respaldado por `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generado a partir de ColorTheme.variables
```

El archivo `colors.css` generado envuelve todas las variables en un bloque `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Los valores son tripletas de canales RGB separadas por espacios (no `rgb()`), lo que permite a Tailwind componer variantes de opacidad como `bg-primary/50` sin configuración adicional.

## Precedencia en la Resolución de Temas

`ThemeHelper::getVisualTheme()` resuelve qué slug de tema aplicar en cualquier página dada, en este orden:

1. **Tema activo para la AccessUrl actual** — el registro `AccessUrlRelColorTheme` con `active = true`
2. **Tema seleccionado por el usuario** — el tema almacenado en la entidad `User`, si la configuración de plataforma `profile.user_selected_theme` está habilitada
3. **Tema del curso** — la configuración de curso `course_theme`, si la configuración de plataforma `course.allow_course_theme` está habilitada
4. **Tema de la ruta de aprendizaje** — el valor `$lp_theme_css` de la LP, si la configuración de curso `allow_learning_path_theme` está habilitada
5. **Variable de entorno `THEME_FALLBACK`** — establecida en `.env` como `THEME_FALLBACK='chamilo'`
6. **Predeterminado** — `chamilo` (codificado como `ThemeHelper::DEFAULT_THEME`)

## Servicio de Activos

Los activos de tema son servidos por `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) bajo el prefijo `/themes`.

| Ruta | Propósito |
|-------|---------|
| `GET /themes/{name}/{path}` | Sirve cualquier activo de tema (CSS, JS, imágenes); recurre al tema `chamilo` si no se encuentra en el tema solicitado |
| `GET /themes/{slug}/logo/{type}` | Sirve el logotipo preferido (`header` o `email`), con fallback de SVG a PNG |
| `POST /themes/{slug}/logos` | Sube logotipos de encabezado/correo electrónico (SVG y/o PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Elimina un logotipo específico |

La ruta de activos general (`/{name}/{path}`) recurre automáticamente al tema predeterminado `chamilo` cuando falta un archivo en el tema solicitado, por lo que los temas solo necesitan incluir los archivos que realmente sobrescriben.

## Cómo se Cargan los Temas en las Plantillas

La plantilla de diseño `head.html.twig` carga los activos del tema activo mediante funciones de ayuda de Twig:

```twig
{# Inyecta las variables de color del tema #}
{{ theme_asset_link_tag('colors.css') }}

{# Inyecta la paleta de colores de TinyMCE #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Referencia otros activos del tema #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Las tres funciones de Twig (registradas en `ChamiloExtension`) resuelven la ruta del activo a través de `ThemeHelper`, aplicando la misma cadena de fallback que arriba:

| Función | Retorna |
|----------|---------|
| `theme_asset('path')` | URL al activo en el tema resuelto |
| `theme_asset_link_tag('path')` | Etiqueta completa `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Etiqueta completa `<script src="...">` |
| `theme_asset_base64('path')` | URI de datos codificado en Base64 del activo |
| `theme_logo('header'\|'email')` | URL al mejor logotipo disponible |

## Puntos Finales de la API

La gestión de temas se expone a través de la API REST de API Platform (solo para administradores):

| Método | Punto Final | Propósito |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Crear un nuevo tema |
| `PUT` | `/api/color_themes/{id}` | Actualizar un tema existente |
| `POST` | `/api/access_url_rel_color_themes` | Asociar/activar un tema para una URL de acceso |
| `GET` | `/api/access_url_rel_color_themes` | Listar asociaciones de temas para la URL de acceso actual |

## Creación de un Tema Personalizado

El flujo de trabajo estándar es a través de la interfaz de administración (**Admin → Temas de Color**), que invoca los endpoints de la API mencionados anteriormente. Para crear un tema de manera programática:

1. `POST /api/color_themes` con un cuerpo JSON:

```json
{
  "title": "Mi Tema",
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

Esto guarda la entidad y escribe `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` para asociarlo y activarlo para la URL de acceso actual:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Para agregar imágenes personalizadas (logotipo, favicon, fondos), súbelas mediante `POST /themes/{slug}/logos` o colócalas directamente en `var/themes/{slug}/images/`.

## Referencia de Variables de Color

Todas las variables esperadas por la configuración predeterminada de Tailwind:

| Variable | Propósito |
|----------|-----------|
| `--color-primary-base` | Color de marca principal |
| `--color-primary-gradient` | Punto de gradiente más oscuro para el color principal |
| `--color-primary-button-text` | Color del texto en botones principales |
| `--color-primary-button-alternative-text` | Color de texto alternativo en botones principales |
| `--color-secondary-base` | Color de acento secundario |
| `--color-secondary-gradient` | Punto de gradiente para el color secundario |
| `--color-secondary-button-text` | Color del texto en botones secundarios |
| `--color-tertiary-base` | Color terciario |
| `--color-tertiary-gradient` | Punto de gradiente para el color terciario |
| `--color-tertiary-button-text` | Color del texto en botones terciarios |
| `--color-success-base` | Color para estados de éxito |
| `--color-success-gradient` | Punto de gradiente para éxito |
| `--color-success-button-text` | Color del texto en botones de éxito |
| `--color-info-base` | Color para estados de información |
| `--color-info-gradient` | Punto de gradiente para información |
| `--color-info-button-text` | Color del texto en botones de información |
| `--color-warning-base` | Color para estados de advertencia |
| `--color-warning-gradient` | Punto de gradiente para advertencia |
| `--color-warning-button-text` | Color del texto en botones de advertencia |
| `--color-danger-base` | Color para estados de peligro/error |
| `--color-danger-gradient` | Punto de gradiente para peligro |
| `--color-danger-button-text` | Color del texto en botones de peligro |
| `--color-form-base` | Color de acento para elementos de formulario |