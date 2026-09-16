# Configuración del Catálogo de Cursos

Comportamiento del catálogo de cursos (la lista pública donde los usuarios pueden navegar e inscribirse por sí mismos).

Acceda a estas configuraciones en **Administración > Configuraciones > Catálogo de Cursos**. Esta categoría contiene **13 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_session_auto_subscription`

**Suscripción Automática a Sesiones**

Habilita la suscripción automática a sesiones para los usuarios.

*Predeterminado: `false`*

### `allow_students_to_browse_courses`

**Permitir Navegación a Estudiantes**

Permite a los estudiantes navegar y filtrar el catálogo de cursos.

*Predeterminado: `true`*

### `course_catalog_display_in_home`

**Mostrar Catálogo en la Página Principal**

Muestra el bloque del catálogo de cursos en la página principal de la plataforma.

*Predeterminado: `false`*

### `course_catalog_hide_private`

**Ocultar Cursos Privados**

Excluye los cursos privados de la visualización en el catálogo.

*Predeterminado: `true`*

### `course_catalog_published`

**Publicar Catálogo de Cursos**

Hace que el catálogo de cursos esté disponible para usuarios anónimos (el público en general) sin necesidad de iniciar sesión.

*Predeterminado: `false`*

### `course_catalog_settings`

**Configuraciones del Catálogo de Cursos**

Configuración JSON para el catálogo de cursos: configuraciones de enlaces, filtros, opciones de ordenamiento y más.

### `course_subscription_in_user_s_session`

**Suscripción en Vista de Sesión**

Permite a los usuarios suscribirse a cursos directamente desde su página de sesión.

*Predeterminado: `false`*

### `hide_public_link`

**Ocultar Enlace Público**

Elimina el enlace URL público de las tarjetas de cursos.

*Predeterminado: `false`*

### `only_show_course_from_selected_category`

**Mostrar Solo Categorías Coincidentes en el Catálogo de Cursos**

Cuando no está vacío, solo los cursos de las categorías especificadas aparecerán en el catálogo de cursos.

### `only_show_selected_courses`

**Solo Cursos Seleccionados**

Muestra solo los cursos seleccionados manualmente en el catálogo.

*Predeterminado: `false`*

### `session_catalog_settings`

**Configuraciones del Catálogo de Sesiones**

Configuración JSON para el catálogo de sesiones: filtros y opciones de visualización.

### `show_courses_descriptions_in_catalog`

**Mostrar Descripciones de Cursos**

Muestra las descripciones de los cursos dentro del listado del catálogo.

*Predeterminado: `false`*

### `show_courses_sessions`

**Mostrar Cursos y Sesiones**

Incluye tanto cursos como sesiones en los resultados del catálogo.

*Predeterminado: `0`*