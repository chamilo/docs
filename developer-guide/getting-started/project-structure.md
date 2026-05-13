# Estructura del Proyecto

## Directorios de Nivel Superior

```
chamilo/
├── assets/          # Código fuente frontend
│   ├── vue/         # Aplicación Vue 3 (componentes, vistas, enrutador, almacenes)
│   ├── css/         # Hojas de estilo SCSS
│   └── js/          # JavaScript legado
├── config/          # Configuración de Symfony (rutas, servicios, paquetes)
├── public/          # Raíz web (index.php, páginas PHP legado, complementos)
│   ├── main/        # Módulos PHP legado (un subdirectorio por herramienta)
│   └── plugin/      # Complementos incluidos y personalizados
├── src/             # Código fuente PHP (bundles de Symfony)
│   ├── CoreBundle/  # Lógica central de la plataforma
│   ├── CourseBundle/# Funcionalidades específicas de cursos
│   └── LtiBundle/   # Integración LTI 1.3
├── templates/       # Plantillas Twig
├── var/             # Caché, registros, subidas (generado)
├── vendor/          # Dependencias de Composer (generado)
├── node_modules/    # Dependencias de npm (generado)
└── translations/    # Archivos de traducción
```

## Código Fuente (`src/`)

### CoreBundle

El bundle más grande. Subdirectorios destacados:

| Directorio | Contenido |
|-----------|----------|
| `Entity/` | Entidades Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Controladores de administración, acciones API y páginas (la subcarpeta Api/ contiene acciones personalizadas de API Platform) |
| `Settings/` | Archivos de esquema de configuraciones (configuración de la plataforma) |
| `Repository/` | Repositorios Doctrine |
| `AiProvider/` | Implementaciones de proveedores de IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definiciones de herramientas de curso |
| `Security/` | Votantes, autenticadores, autorización |
| `EventListener/` | Oyentes de eventos |
| `EventSubscriber/` | Suscriptores de eventos |
| `Command/` | Comandos de consola Symfony |
| `Migrations/` | Migraciones de base de datos |
| `Twig/` | Extensiones Twig |
| `Storage/` | Adaptadores de almacenamiento Flysystem |

### CourseBundle

Entidades y lógica específicas de cursos:

| Directorio | Contenido |
|-----------|----------|
| `Entity/` | Entidades de contenido de curso (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Controladores de curso |
| `Settings/` | Esquemas de configuraciones a nivel de curso |
| `Component/CourseCopy/` | Importación/exportación de cursos (Common Cartridge, Moodle) |

### LtiBundle

Integración LTI 1.3:

| Directorio | Contenido |
|-----------|----------|
| `Entity/` | Entidades de plataforma, herramienta y despliegue LTI |
| `Controller/` | Puntos finales de lanzamiento y configuración LTI |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Punto de entrada de la aplicación
├── main_installer.js    # Punto de entrada del instalador
├── components/          # Componentes reutilizables de Vue
│   ├── accessurl/       # Componentes de múltiples URL (portal)
│   ├── admin/           # Componentes específicos para administradores
│   ├── assignments/     # Formularios y listas de tareas
│   ├── attendance/      # Componentes de hoja de asistencia
│   ├── basecomponents/  # Componentes base compartidos (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) y ChamiloIcons.js
│   ├── blog/            # Componentes de blog
│   ├── branch/          # Componentes de campus de red/sucursal
│   ├── ccalendarevent/  # Componentes de eventos del calendario del curso
│   ├── chat/            # Chat y tutor de IA
│   ├── course/          # Tarjetas de curso, catálogos, formularios
│   ├── coursecategory/  # Componentes de categoría de curso
│   ├── coursemaintenance/ # Componentes de respaldo/restauración de cursos
│   ├── ctoolintro/      # Componentes de introducción a herramientas de curso
│   ├── documents/       # Componentes de gestión de documentos
│   ├── dropbox/         # Componentes de Dropbox (intercambio de archivos)
│   ├── filemanager/     # Componentes de explorador de archivos
│   ├── glossary/        # Componentes de glosario
│   ├── installer/       # Asistente de instalación
│   ├── layout/          # Barra lateral, barra superior, diseño de shell
│   ├── links/           # Componentes de enlaces externos
│   ├── login/           # Componentes de formulario de inicio de sesión
│   ├── lp/              # Componentes de ruta de aprendizaje
│   ├── message/         # Componentes de mensajería
│   ├── page/            # Componentes de página estática
│   ├── pageLayout/      # Componentes envolventes de diseño de página
│   ├── personalfile/    # Componentes de espacio de archivos personales
│   ├── platform/        # Componentes de interfaz de usuario a nivel de plataforma
│   ├── resource_links/  # Componentes de gestión de enlaces de recursos
│   ├── room/            # Componentes de sala virtual
│   ├── session/         # Componentes de sesión (campaña de aprendizaje)
│   ├── sessionadmin/    # Componentes de administración de sesiones
│   ├── skill/           # Componentes de habilidades y competencias
│   ├── social/          # Componentes de red social
│   ├── systemannouncement/ # Componentes de anuncios del sistema
│   ├── user/            # Componentes de perfil y gestión de usuarios
│   ├── usergroup/       # Componentes de grupo de usuarios (clase)
│   └── userreluser/     # Componentes de relación entre usuarios (amigo/seguir)
├── views/               # Vistas de página de nivel Vue (refleja la estructura de components/)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + un módulo por área de funcionalidad)
├── store/               # Almacenes de Pinia
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Funciones de composición compartidas (subdirectorios por funcionalidad)
├── services/            # Capa de servicio de API (un archivo por entidad/dominio)
├── utils/               # Ayudantes de utilidad (fechas, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Configuración en tiempo de ejecución (api.js, env.js)
├── constants/           # Constantes compartidas
│   └── entity/          # Constantes específicas de entidades (sesión, mensaje, campo extra, etc.)
├── layouts/             # Componentes de diseño de nivel superior (MyCourses.vue)
├── pages/               # Componentes de página independientes (Home, Login, Faq, Demo)
├── mixins/              # Mixins de estilo Vue 2 heredados (ListMixin, CreateMixin, etc.)
├── hooks/               # Hooks componibles (useSidebar, useState)
├── plugins/             # Registros de plugins de Vue (httpErrors, vuetify)
├── validators/          # Validadores personalizados de Vuelidate
└── error/               # Componentes de límite de error
```

---
## Configuración (`config/`)

```
config/
├── packages/            # Configuración de paquetes y framework (un archivo YAML por paquete)
│   ├── security.yaml    # Jerarquía de roles, cortafuegos, control de acceso
│   ├── doctrine.yaml    # Configuraciones de Doctrine ORM y DBAL
│   ├── api_platform.yaml# Configuración de API Platform
│   ├── framework.yaml   # Configuraciones principales de Symfony
│   ├── lexik_jwt_authentication.yaml  # Configuraciones de tokens JWT
│   ├── nelmio_cors.yaml # Encabezados CORS para consumidores de API
│   ├── oneup_flysystem.yaml  # Adaptadores de almacenamiento en la nube
│   ├── webpack_encore.yaml   # Integración de Webpack Encore
│   ├── ... (más de 30 archivos de paquetes)
│   ├── dev/             # Sobrescrituras solo para desarrollo (perfilador web, depuración, enrutamiento)
│   ├── prod/            # Sobrescrituras solo para producción (actualmente marcador de posición vacío)
│   └── test/            # Sobrescrituras para entorno de pruebas (JWT, validador, perfilador web)
├── routes/              # Definiciones de rutas
│   ├── api_platform.yaml     # Prefijo de rutas de API Platform
│   ├── attributes.yaml       # Rutas basadas en anotaciones de controladores
│   ├── fos_js_routing.yaml   # Exposición de rutas FOS JS
│   ├── legacy.yaml           # Rutas para páginas PHP heredadas bajo public/main/
│   ├── security.yaml         # Rutas de inicio de sesión/cierre de sesión/OAuth2
│   ├── dev/                  # Rutas solo para desarrollo (perfilador, bundle Maker)
│   └── test/                 # Sobrescrituras de rutas solo para pruebas
├── jwt/                 # Par de claves JWT (claves privada/pública)
└── jwt-test/            # Claves JWT para el entorno de pruebas
```

Symfony fusiona automáticamente los archivos base `packages/*.yaml` con los del subdirectorio de entorno correspondiente (`dev/`, `prod/` o `test/`), por lo que los archivos específicos de cada entorno solo necesitan sobrescribir los valores que difieren.

## Configuración de Compilación

| Archivo | Propósito |
|------|---------|
| `webpack.config.js` | Configuración de Webpack Encore (entradas, cargadores, complementos) |
| `tailwind.config.js` | Configuración de Tailwind CSS (rutas de contenido, extensiones de tema, complementos) |
| `tsconfig.json` | Configuración de TypeScript |
| `eslint.config.mjs` | Reglas de ESLint (configuración plana) |
| `.prettierrc.json` | Reglas de formato de Prettier |

Todos los archivos se encuentran en la raíz del proyecto. Los complementos de PostCSS (Tailwind + Autoprefixer) se configuran en línea dentro de `webpack.config.js` a través de `enablePostCssLoader()` — no hay un archivo independiente `postcss.config.js`. `webpack.config.js` lee `tailwind.config.js` indirectamente a través de PostCSS, por lo que los cambios en las secciones `content` o `theme` de Tailwind surten efecto en la próxima ejecución de `yarn encore dev` / `yarn encore production`.

## Puntos de Entrada de Webpack

La compilación produce estos paquetes:

**JavaScript:**
* `vue` — Aplicación principal de Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Asistente de instalación (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS heredado para páginas aún no migradas a Vue

**CSS:**
* `app` — Hoja de estilo principal (`assets/css/app.scss`)
* Además de hojas especializadas: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Estructura de CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Punto de entrada — importa Tailwind, el índice SCSS y CSS de terceros
├── _tailwind.scss       # Directivas de Tailwind (@tailwind base / components / utilities)
├── chat.scss            # Estilos del panel de chat y tutor de IA
├── document.scss        # Estilos del visor de documentos
├── editor.scss          # Estilos del entorno del editor TinyMCE
├── editor_content.scss  # Estilos inyectados en el cuerpo del iframe del editor
├── markdown.scss        # Estilos de contenido renderizado en Markdown
├── print.scss           # Hoja de estilo para impresión
├── responsive.scss      # Sobrescrituras responsivas
├── scorm.scss           # Estilos del reproductor SCORM
├── legacy/              # Estilos para páginas PHP heredadas (por ejemplo, frameReadyLoader.scss)
└── scss/                # Parciales modulares de SCSS
    ├── index.scss           # Archivo barril — importa todos los parciales a continuación
    ├── abstracts/           # Mixins y funciones compartidas
    ├── settings/            # Tokens de diseño (tipografía, base de componentes)
    ├── atoms/               # Sobrescrituras de PrimeVue por componente (botones, entradas, calendario, etc.)
    ├── molecules/           # Pequeños patrones de UI compuestos (chips, barras de herramientas, estados vacíos)
    ├── organisms/           # Áreas de características más grandes (barra lateral, tabla de datos, diálogo, panel LP, etc.)
    ├── layout/              # Parciales del esqueleto de la página (barra superior, contenedor principal, migas de pan)
    ├── components/          # Archivos específicos de componentes heredados (blog, ejercicio, social, habilidad, etc.)
    └── libs/                # Sobrescrituras de bibliotecas de terceros (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

Tailwind está integrado a través de PostCSS. `assets/css/_tailwind.scss` genera las capas base, de componentes y de utilidades; `assets/css/app.scss` lo importa primero para que las utilidades de Tailwind estén disponibles en todos los demás parciales. La configuración de Tailwind —rutas de contenido para la purga, extensiones de tema y complementos— se encuentra en `tailwind.config.js` en la raíz del proyecto (`/var/www/chamilo/tailwind.config.js`).

Las clases de utilidad personalizadas y las clases de componentes definidas con `@layer` (visibles en `app.scss`) siguen la convención de capas de Tailwind, de modo que las clases definidas por el usuario respetan las mismas reglas de especificidad que las utilidades generadas.

### Temas de Color

Chamilo soporta un sistema de temas de color que puede configurarse directamente desde la interfaz de administración (**Administración > Temas de Color**). Cada tema guardado escribe sus archivos en un directorio dedicado bajo `var/themes/`:

```
var/themes/
└── [nombre-del-tema]/
    ├── colors.css       # Propiedades personalizadas de CSS para la paleta de colores completa
    ├── default.css      # Reglas CSS personalizadas adicionales opcionales
    ├── learnpath.css    # Sobrescrituras específicas para rutas de aprendizaje
    ├── tiny-settings.js # Configuraciones de la paleta de colores del editor TinyMCE
    └── images/          # Imágenes del tema (logo, favicon, fondos, íconos PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Imágenes de fondo, imágenes de bloques de administración, etc.
```

`colors.css` define propiedades personalizadas de CSS como tripletas de canales RGB separadas por espacios en lugar de valores `rgb()`, lo que permite a Tailwind componer variantes de opacidad (por ejemplo, `bg-primary/50`) sin configuración adicional:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

La capa de tema se sitúa sobre el paquete compilado de Tailwind/SCSS: el navegador carga `colors.css` después de la hoja de estilo principal, por lo que los cambios de tema tienen efecto inmediato sin necesidad de un paso de compilación.